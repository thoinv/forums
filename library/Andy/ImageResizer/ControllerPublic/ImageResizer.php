<?php

class Andy_ImageResizer_ControllerPublic_ImageResizer extends XenForo_ControllerPublic_Abstract
{		
	public function actionShow()
	{
		//########################################
		// Show attachments that are greater in
		// width or height than allowed by 
		// Image Resizer Option settings.
		//########################################
		
		// get user group permissions
		if (!XenForo_Visitor::getInstance()->hasPermission('imageResizerGroupID', 'imageResizerID'))
		{
			throw $this->getNoPermissionResponseException();
		}								
		
		// get options from Admin CP -> Options -> Image Resizer -> Default Image Processor
		$imPecl = XenForo_Application::get('options')->imageLibrary['class'];
	
		// check option
		if ($imPecl != 'imPecl')
		{
			return $this->responseError(new XenForo_Phrase('imageresizer_imagemagick_with_pecl_required'));
		}
		
		// get options from Admin CP -> Options -> Image Resizer -> Maximum Width   
		$maximumWidth = XenForo_Application::get('options')->imageResizerMaximumWidth;
		
		// check option
		if ($maximumWidth == 0)
		{
			return $this->responseError(new XenForo_Phrase('imageresizer_maximum_width_in_options_not_set'));
		}
		
		// get options from Admin CP -> Options -> Image Resizer -> Maximum Height   
		$maximumHeight = XenForo_Application::get('options')->imageResizerMaximumHeight;
		
		// check option
		if ($maximumHeight == 0)
		{
			return $this->responseError(new XenForo_Phrase('imageresizer_maximum_height_in_options_not_set'));
		}
		
		// get limit
		$limit = $this->_input->filterSingle('limit', XenForo_Input::UINT);
		
		// verify limit set
		if ($limit == '')
		{
			return $this->responseError(new XenForo_Phrase('imageresizer_limit_switch_missing_in_url'));
		}				
		
		//########################################
		// get data
		//########################################
		
		// get database
		$db = XenForo_Application::get('db');
			
		// run query
		$attachments = $db->fetchAll("
		SELECT xf_attachment_data.*, xf_attachment.*, xf_user.username
		FROM xf_attachment_data
		INNER JOIN xf_attachment ON xf_attachment.data_id = xf_attachment_data.data_id
		INNER JOIN xf_user ON xf_user.user_id = xf_attachment_data.user_id
		WHERE xf_attachment.unassociated = 0
		AND xf_attachment.content_type = 'post'
		AND	(xf_attachment_data.width > " . $maximumWidth . "
		OR xf_attachment_data.height > " . $maximumHeight . ")
		ORDER BY xf_attachment_data.width DESC, xf_attachment_data.data_id DESC
		LIMIT " . $limit . "
		");		

		// run query
		$attachTotal = $db->fetchAll("
		SELECT xf_attachment_data.*, xf_attachment.*, xf_user.username
		FROM xf_attachment_data
		INNER JOIN xf_attachment ON xf_attachment.data_id = xf_attachment_data.data_id
		INNER JOIN xf_user ON xf_user.user_id = xf_attachment_data.user_id
		WHERE xf_attachment.unassociated = 0
		AND xf_attachment.content_type = 'post'
		AND	(xf_attachment_data.width > " . $maximumWidth . "
		OR xf_attachment_data.height > " . $maximumHeight . ")
		ORDER BY xf_attachment_data.width DESC, xf_attachment_data.data_id DESC
		");

		//########################################
		// display data
		//########################################	
		
		// get action
		$action = 'show';
		
		// get count
		$attachCount = count($attachTotal);
		
		// prepare viewParams for template
		$viewParams = array(
			'attachments' => $attachments,
			'action' => $action,
			'limit' => $limit,
			'maximumWidth' => $maximumWidth,
			'maximumHeight' => $maximumHeight,
			'attachCount' => $attachCount
		);
		
		// send to template for display
		return $this->responseView('Andy_ImageResizer_ViewPublic_ImageResizer', 'andy_imageresizer', $viewParams);
	}
	
	public function actionUpdate()
	{
		//########################################
		// Update each attachment because
		// the pixel width is over maxWidth
		// setting in options.
		//########################################	
		
		// get user group permissions
		if (!XenForo_Visitor::getInstance()->hasPermission('imageResizerGroupID', 'imageResizerID'))
		{
			throw $this->getNoPermissionResponseException();
		}								
		
		// get options from Admin CP -> Options -> Image Resizer -> Default Image Processor
		$imPecl = XenForo_Application::get('options')->imageLibrary['class'];
	
		// check option
		if ($imPecl != 'imPecl')
		{
			return $this->responseError(new XenForo_Phrase('imageresizer_imagemagick_with_pecl_required'));
		}
		
		// get options from Admin CP -> Options -> Image Resizer -> Maximum Width   
		$maximumWidth = XenForo_Application::get('options')->imageResizerMaximumWidth;
		
		// check option
		if ($maximumWidth == 0)
		{
			return $this->responseError(new XenForo_Phrase('imageresizer_maximum_width_in_options_not_set'));
		}
		
		// get options from Admin CP -> Options -> Image Resizer -> Maximum Height   
		$maximumHeight = XenForo_Application::get('options')->imageResizerMaximumHeight;
		
		// check option
		if ($maximumHeight == 0)
		{
			return $this->responseError(new XenForo_Phrase('imageresizer_maximum_height_in_options_not_set'));
		}
		
		// get limit
		$limit = $this->_input->filterSingle('limit', XenForo_Input::UINT);
		
		// verify limit set
		if ($limit == '')
		{
			return $this->responseError(new XenForo_Phrase('imageresizer_limit_switch_missing_in_url'));
		}
		
		//########################################
		// start update process
		//########################################
		
		// get internalDataPath
		$internalDataPath = XenForo_Helper_File::getInternalDataPath();		
		
		// get data path					
		$externalDataPath = XenForo_Helper_File::getExternalDataPath();
		
		// get database
		$db = XenForo_Application::get('db');
			
		// run query
		$attachments = $db->fetchAll("
		SELECT xf_attachment_data.*, xf_attachment.*, xf_user.username
		FROM xf_attachment_data
		INNER JOIN xf_attachment ON xf_attachment.data_id = xf_attachment_data.data_id
		INNER JOIN xf_user ON xf_user.user_id = xf_attachment_data.user_id
		WHERE xf_attachment.unassociated = 0
		AND xf_attachment.content_type = 'post'
		AND	(xf_attachment_data.width > " . $maximumWidth . "
		OR xf_attachment_data.height > " . $maximumHeight . ")
		ORDER BY xf_attachment_data.width DESC, xf_attachment_data.data_id DESC
		LIMIT " . $limit . "
		");	
		
		foreach ($attachments as $k => $v)
		{ 
			// clear variable
			$skip = '';
			
			//#####################################
			// define last folder name 
			// 0-999 are stored in the 0 directory 
			// 1000-1999 stored in the 1 directory etc 
			//#####################################
			
			$dataId = $v['data_id'];
			
			$fileHash = $v['file_hash'];
			
			$lastFolder = floor($dataId / 1000);
			
			//#####################################
			// define attachment full path
			//#####################################
			
			// attachment path
			$attachmentFullPath = $internalDataPath . '/attachments/' . $lastFolder . '/' . $dataId . '-' . $fileHash . '.data';

			// throw error if file missing
			if (!file_exists($attachmentFullPath))
			{
				throw new XenForo_Exception(new XenForo_Phrase('imageresizer_attachment_missing_from_file_directory') . ' ' . $attachmentFullPath, true);
			}			
			
			//#####################################
			// get file information
			//#####################################	
			
			// get size
			$filesize = filesize($attachmentFullPath);		
							
			// get dimensions
			list($width, $height) = getimagesize($attachmentFullPath);						
			
			//#####################################
			// If file information is different
			// than information in database, update
			// database first.
			//#####################################

			// verify database information is correct
			if ($filesize != $v['file_size'] OR $width != $v['width'] OR $height != $v['height'])
			{
				// run query
				$db->query('
				UPDATE xf_attachment_data SET
					file_size = "' . $filesize . '",
					width = "' . $width . '",
					height = "' . $height . '"
				WHERE data_id = ?
				', $dataId);							
				
				// skip resize
				$skip = 'yes';
			}		
			
			// resize if required
			if ($skip != 'yes')
			{
				//#####################################
				// Database information is correct,
				// resize image.
				//#####################################
				
				// get options from Admin CP -> Options -> Image Resizer -> Maximum Width   
				$maximumWidth = XenForo_Application::get('options')->imageResizerMaximumWidth;
				
				// get options from Admin CP -> Options -> Image Resizer -> Maximum Height   
				$maximumHeight = XenForo_Application::get('options')->imageResizerMaximumHeight;												
				
				// resize based on width
				if ($width > $maximumWidth)
				{
					// resize image - (use the '\>' flag)
					exec("/usr/bin/convert $attachmentFullPath -resize $maximumWidth x $maximumHeight\> $attachmentFullPath");			
				}
				
				// resize based on height
				if ($width <= $maximumWidth AND $height > $maximumHeight)
				{
					// resize based on height only
					exec("/usr/bin/convert $attachmentFullPath -resize x$maximumHeight $attachmentFullPath");			
				}
				
				//#####################################
				// Rename attachment with new file hash
				// in the filename.
				//#####################################	
				
				// get new hash
				$filehashNew = hash_file('md5', $attachmentFullPath);							
				
				// prepare new filename (with new file hash)
				$newFilenameDataPath = $internalDataPath . '/attachments/' . $lastFolder . '/' . $dataId . '-' . $filehashNew . '.data';				
				
				// rename original filename to new filename
				exec("mv $attachmentFullPath $newFilenameDataPath");
				
				//#####################################
				// update xf_attachment_data
				//#####################################					
				
				// get size
				$filesize = filesize($newFilenameDataPath);
				
				// get dimensions
				list($width, $height) = getimagesize($newFilenameDataPath);
				
				// run query
				$db->query('
				UPDATE xf_attachment_data SET
					file_size = "' . $filesize . '",
					file_hash = "' . $filehashNew . '",
					width = "' . $width . '",
					height = "' . $height . '"
				WHERE data_id = ?
				', $dataId);
				
				//#####################################
				// Update thumbnail with new file hash
				// in the filename.
				//#####################################
		
				// thumbpath original name
				$thumbpath = $externalDataPath . '/attachments/' . $lastFolder . '/' . $dataId . '-' . $fileHash . '.jpg';

				// throw error if file missing
				if (!file_exists($thumbpath))
				{
					throw new XenForo_Exception(new XenForo_Phrase('imageresizer_attachment_missing_from_file_directory') . ' ' . $thumbpath, true);
				}

				// thumbpath new name
				$thumbpathNew = $externalDataPath . '/attachments/' . $lastFolder . '/' . $dataId . '-' . $filehashNew . '.jpg';
			
				// rename thumbnail
				exec("mv $thumbpath $thumbpathNew");
			}
		}
		
		// response redirect
		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildPublicLink('imageresizer/updateconfirm')
		);		
	}

	public function actionUpdateConfirm()
	{	
		// response message
		return $this->responseMessage(new XenForo_Phrase('imageresizer_attachments_successfully_update'));
	}
}