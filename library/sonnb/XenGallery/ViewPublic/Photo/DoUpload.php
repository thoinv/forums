<?php

/**
 * @category    XenForo
 * @package     sonnb - XenGallery
 * @version     2.1.3
 * @copyright:  sonnb
 * @link        www.sonnb.com
 * @version     One license is valid for only one nominated domain.
 * @license     You might not copy or redistribute this addon. Any action to public or redistribute must be authorized from author
 */
class sonnb_XenGallery_ViewPublic_Photo_DoUpload extends sonnb_XenGallery_ViewPublic_Abstract
{
	public function renderJson()
	{
		$photo = $this->_preparePhotoForJson($this->_params['content'], $this->_params['album']);
		
		if (!empty($this->_params['message']))
		{
			$photo['message'] = $this->_params['message'];
		}
		
		return XenForo_ViewRenderer_Json::jsonEncodeForOutput($photo);
	}

	protected function _preparePhotoForJson(array $photo, array $album)
	{
		$keys = array('content_data_id', 'upload_date', 'thumbnailUrl');

		$template = $this->createTemplateObject('sonnb_xengallery_upload', array('content' => $photo, 'album' => $album));

		$photo = XenForo_Application::arrayFilterKeys($photo, $keys);
		
		$photo['templateHtml'] = $template;

		return $photo;
	}
}