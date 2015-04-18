<?php

class Nobita_Teams_Model_Cover extends XenForo_Model
{
	protected static $minHeight = 315;

	/**
	 * Processes an cover upload for a user.
	 *
	 * @param XenForo_Upload $upload The uploaded cover.
	 * @param integer $teamId User ID cover belongs to
	 *
	 * @return array Changed cover fields
	 */
	public function uploadCoverPhoto(XenForo_Upload $upload, $teamId, $existingCoverDate)
	{
		if (!$teamId)
		{
			throw new Nobita_Teams_Exception_Abstract("Missing team ID");
		}
		
		if (!$upload->isValid())
		{
			throw new Nobita_Teams_Exception_Abstract($upload->getErrors(), true);
		}
		
		if (!$upload->isImage())
		{
			throw new Nobita_Teams_Exception_Abstract(new XenForo_Phrase('uploaded_file_is_not_valid_image'), true);
		}
		
		$imageType = $upload->getImageInfoField('type');
		if (!in_array($imageType, array(IMAGETYPE_PNG, IMAGETYPE_JPEG)))
		{
			throw new Nobita_Teams_Exception_Abstract(new XenForo_Phrase('uploaded_file_is_not_valid_image'), true);
		}
		
		$baseTempFile = $upload->getTempFile();

		$width = $upload->getImageInfoField('width');
		$height = $upload->getImageInfoField('height');

		if ($height < self::$minHeight)
		{
			throw new Nobita_Teams_Exception_Abstract(new XenForo_Phrase('Teams_upload_image_greater_x', array(
				'min' => self::$minHeight
			)), true);
		}
		
		return $this->applyCover($teamId, $baseTempFile, $imageType, $width, $height, $existingCoverDate);
	}
	
	public function applyCover($teamId, $fileName, $imageType = false, $width = false, $height = false, $existingCoverDate = 0)
	{
		if (!$imageType || !$width || !$height)
		{
			$imageInfo = @getimagesize($fileName);
			if (!$imageInfo)
			{
				throw new Nobita_Teams_Exception_Abstract('Non-image passed in to applyCover');
			}
			$width = $imageInfo[0];
			$height = $imageInfo[1];
			$imageType = $imageInfo[2];
		}
		
		if (!in_array($imageType, array(IMAGETYPE_JPEG, IMAGETYPE_PNG)))
		{
			throw new Nobita_Teams_Exception_Abstract('Invalid image type passed in to applyCover');
		}
		
		if (!XenForo_Image_Abstract::canResize($width, $height))
		{
			throw new Nobita_Teams_Exception_Abstract(new XenForo_Phrase('uploaded_image_is_too_big'), true);
		}

		$maxFileSize = XenForo_Application::getOptions()->Teams_coverFileSize;
		if ($maxFileSize && filesize($fileName) > $maxFileSize)
		{
			@unlink($fileName);
				
			throw new XenForo_Exception(new XenForo_Phrase('Teams_your_cover_file_size_large_smaller_x', array(
				'size' => XenForo_Locale::numberFormat($maxFileSize, 'size')
			)), true);
		}

		if ($existingCoverDate)
		{
			$existedFile = $this->getCoverCropFilePath($teamId, $existingCoverDate);
			@unlink($existedFile);
		}

		$this->_witerCoverPhoto($teamId, $fileName);
		@unlink($fileName);

		$dwData = array(
			'cover_date' => XenForo_Application::$time,
			'cover_crop_details' => array(
				'height' => $height,
				'width' => $width
			)
		);

		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Team');
		$dw->setExistingData($teamId);
		$dw->bulkSet($dwData);
		$dw->save();

		return $dwData;
		
	}

	public function applyCoverCrop($teamId, $coverDate, array $crops)
	{
		$filePath = $this->getCoverPhotoFilePath($teamId);
		$imageInfo = @getimagesize($filePath);
		
		$team = $this->getModelFromCache('Nobita_Teams_Model_Team')->getFullTeamById($teamId);
		if (!$team)
		{
			throw new Nobita_Teams_Exception_Abstract("Invalid team ID.");
			return false;
		}

		$outputFile = $this->getCoverCropFilePath($teamId, $coverDate);
		$imageType = $imageInfo[2];

		$image = XenForo_Image_Abstract::createFromFile($filePath, $imageType);
		if (!$image)
		{
			return false;
		}

		$relativeWidth = $crops['crop_w'];
		$relativeHeight = $crops['crop_h'];

		$image->thumbnail($relativeWidth);

		if ($image->getHeight() > $relativeHeight)
		{
			$cropWidth = $relativeWidth;
			$cropHeight = $relativeHeight;

			$image->crop($crops['crop_x'], $crops['crop_y'], $cropWidth, $cropHeight);
		}

		$coverQuality = intval(Nobita_Teams_Setup::getInstance()->getOption('coverQuality'));
		$success = $image->output($imageType, $outputFile, $coverQuality);

		$data = @unserialize($team['cover_crop_details']);

		if ($imageInfo)
		{
			if (!isset($crops['height']))
			{
				$crops['height'] = $imageInfo[1];
			}

			if (!isset($crops['width']))
			{
				$crops['width'] = $imageInfo[0];
			}
		}
		else
		{
			$crops['height'] = $data['height'];
			$crops['width'] = $data['width'];
		}

		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Team');
		$dw->setExistingData($teamId);
		$dw->set('cover_crop_details', $crops);
		$dw->save();

		return $crops;
	}

	protected function _witerCoverPhoto($teamId, $tempFile)
	{
		$filePath = $this->getCoverPhotoFilePath($teamId);
		$directory = dirname($filePath);

		if (XenForo_Helper_File::createDirectory($directory, true) && is_writable($directory))
		{
			if (file_exists($filePath))
			{
				unlink($filePath);
			}

			return XenForo_Helper_File::safeRename($tempFile, $filePath);
		}
		else
		{
			return false;
		}
	}

	public function deleteCoverPhoto($teamId, $updateTeam = true)
	{
		$filePath = $this->getCoverPhotoFilePath($teamId);
		if (file_exists($filePath) && is_writable($filePath))
		{
			unlink($filePath);
		}
		
		$dwData = array(
			'cover_date' => 0,
			'cover_crop_details' => array()
		);
		
		if ($updateTeam)
		{
			$userDw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Team', XenForo_DataWriter::ERROR_SILENT);
			$userDw->setExistingData($teamId);
			$userDw->bulkSet($dwData);
			$userDw->save();
		}

		return $dwData;
	}

	public function deleteCoverCropPhoto($teamId, $coverDate)
	{
		$filePath = $this->getCoverCropFilePath($teamId, $coverDate);
		if (file_exists($filePath) && is_writable($filePath))
		{
			@unlink($filePath);
		}
	}

	public function getCoverCropFilePath($teamId, $coverDate, $externalDataPath = null)
	{
		if ($externalDataPath === null)
		{
			$externalDataPath = XenForo_Helper_File::getExternalDataPath();
		}

		return sprintf('%s/nobita/teams/covers/%d/%d_%d_crop.jpg',
			$externalDataPath,
			floor($teamId / 1000),
			$teamId,
			$coverDate
		);
	}

	public function getCoverPhotoFilePath($teamId, $externalDataPath = null)
	{
		if ($externalDataPath === null)
		{
			$externalDataPath = XenForo_Helper_File::getExternalDataPath();
		}

		return sprintf('%s/nobita/teams/covers/%d/%d.jpg',
			$externalDataPath,
			floor($teamId / 1000),
			$teamId
		);
	}

	public function canUploadCover(array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);

		if (!$viewingUser['user_id'])
		{
			return false;
		}

		if (!$this->getModelFromCache('Nobita_Teams_Model_Team')->canViewTeam($team, $category, $null, $viewingUser))
		{
			return false;
		}

		if (XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'manageCover'))
		{
			return true;
		}

		if (XenForo_Visitor::getInstance()->isBrowsingWith('mobile'))
		{
			$errorPhraseKey = 'Teams_the_function_dont_support_on_mobile_device';
			return false;
		}

		return $this->getModelFromCache('Nobita_Teams_Model_Member')->assertPermissionActionViewable(
			$team, 'manageCover', $errorPhraseKey, $viewingUser
		);
	}


	public function canRepositionCover(array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);

		return (
			   !empty($team['cover_date'])
			&& !empty($viewingUser['user_id'])
			&& $this->canUploadCover($team, $category, $errorPhraseKey, $viewingUser)
		);
	}
}