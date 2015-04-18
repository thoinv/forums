<?php

/**
 * Model for sigpics.
 *
 */
class TPUSigPic_Model_SigPic extends XenForo_Model
{
	/**
	 * Processes a sigpic upload for a user.
	 *
	 * @param XenForo_Upload $upload The uploaded sigpic.
	 * @param integer $userId User ID sigpic belongs to
	 * @param array|false $permissions User's permissions. False to skip permission checks
	 *
	 * @return array Changed sigpic fields
	 */
	public function uploadSigPic(XenForo_Upload $upload, $userId, $permissions)
	{
		if (!$userId)
		{
			throw new XenForo_Exception('Missing user ID.');
		}

		if ($permissions !== false && !is_array($permissions))
		{
			throw new XenForo_Exception('Invalid permission set.');
		}

		if (!$upload->isValid())
		{
			throw new XenForo_Exception($upload->getErrors(), true);
		}

		if (!$upload->isImage())
		{
			throw new XenForo_Exception(new XenForo_Phrase('uploaded_file_is_not_valid_image'), true);
		};

		$imageType = $upload->getImageInfoField('type');
		if (!in_array($imageType, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG)))
		{
			throw new XenForo_Exception(new XenForo_Phrase('uploaded_file_is_not_valid_image'), true);
		}

		$baseTempFile = $upload->getTempFile();

		$width = $upload->getImageInfoField('width');
		$height = $upload->getImageInfoField('height');
		
		return $this->applySigPic($userId, $baseTempFile, $imageType, $width, $height, $permissions);
	}

	/**
	 * Applies the sigpic file to the specified user.
	 *
	 * @param integer $userId
	 * @param string $fileName
	 * @param constant|false $imageType Type of image (IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG)
	 * @param integer|false $width
	 * @param integer|false $height
	 * @param array|false $permissions
	 *
	 * @return array
	 */
	public function applySigPic($userId, $fileName, $imageType = false, $width = false, $height = false, $permissions = false)
	{
		if (!$imageType || !$width || !$height)
		{
			$imageInfo = getimagesize($fileName);
			if (!$imageInfo)
			{
				throw new XenForo_Exception('Non-image passed in to applySigPic');
			}
			$width = $imageInfo[0];
			$height = $imageInfo[1];
			$imageType = $imageInfo[2];
		}

		if (!in_array($imageType, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG)))
		{
			throw new XenForo_Exception('Invalid image type passed in to applySigPic');
		}
		
		$options = XenForo_Application::getOptions();
		
		if ($options->sigpicMaxFileSize>0)
		{
			$filesize = filesize($fileName)/1024;
			
			if ($filesize>$options->sigpicMaxFileSize)
				throw new XenForo_Exception('Uploaded image file is too big ('.ceil($filesize).' KB). Maximum allowed size is '.$options->sigpicMaxFileSize.' KB.', true);
		}

		if ($options->sigpicMaxDimensions['width']>0)
		{		
			if ($width>$options->sigpicMaxDimensions['width'])
				throw new XenForo_Exception('Uploaded image file is too wide ('.$width.' px). Maximum allowed width is '.$options->sigpicMaxDimensions['width'].' pixels.', true);
		}
			
		if ($options->sigpicMaxDimensions['height']>0)
		{		
			if ($height>$options->sigpicMaxDimensions['height'])
				throw new XenForo_Exception('Uploaded image file is too high ('.$height.' px). Maximum allowed height is '.$options->sigpicMaxDimensions['height'].' pixels.', true);
		}				

		$this->_writeSigPic($userId, $fileName);

		$dwData = array(
			'sigpic_date' => XenForo_Application::$time,
		);

		$dw = XenForo_DataWriter::create('XenForo_DataWriter_User');
		$dw->setExistingData($userId);
		$dw->bulkSet($dwData);
		$dw->save();

		return $dwData;
	}

	/**
	 * Writes out a sigpic.
	 *
	 * @param integer $userId
	 * @param string $tempFile Temporary sigpic file. Will be moved.
	 *
	 * @return boolean
	 */
	protected function _writeSigPic($userId, $tempFile)
	{
		$filePath = $this->getSigPicFilePath($userId);
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

	/**
	 * Get the file path to an sigpic.
	 *
	 * @param integer $userId
	 * @param string External data directory path (optional)
	 *
	 * @return string
	 */
	public function getSigPicFilePath($userId, $externalDataPath = null)
	{
		if ($externalDataPath === null)
		{
			$externalDataPath = XenForo_Helper_File::getExternalDataPath();
		}
		
		return sprintf('%s/sigpics/%d/%d.jpg',
			$externalDataPath,
			floor($userId / 1000),
			$userId
		);
	}

	/**
	 * Deletes a user's sigpic.
	 *
	 * @param integer $userId
	 * @param boolean $updateUser
	 *
	 * @return array Changed sigpic fields
	 */
	public function deleteSigPic($userId, $updateUser = true)
	{
		$filePath = $this->getSigPicFilePath($userId);
		if (file_exists($filePath) && is_writable($filePath))
		{
			unlink($filePath);
		}

		$dwData = array(
			'sigpic_date' => 0,
		);

		if ($updateUser)
		{
			$dw = XenForo_DataWriter::create('XenForo_DataWriter_User', XenForo_DataWriter::ERROR_SILENT);
			$dw->setExistingData($userId);
			$dw->bulkSet($dwData);
			$dw->save();
		}

		return $dwData;
	}
}