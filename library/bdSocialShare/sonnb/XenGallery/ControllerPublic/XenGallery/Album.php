<?php

class bdSocialShare_sonnb_XenGallery_ControllerPublic_XenGallery_Album extends XFCP_bdSocialShare_sonnb_XenGallery_ControllerPublic_XenGallery_Album
{
	protected $_bdSocialShare_dataIds = array();

	public function actionSave()
	{
		$GLOBALS[bdSocialShare_Listener::XENGALLERY_CONTROLLERPUBLIC_XENGALLERY_SAVE] = $this;

		return parent::actionSave();
	}

	public function bdSocialShare_actionSave(XenForo_DataWriter $dw)
	{
		$dataId = $dw->get('photo_data_id');
		if (empty($dataId))
		{
			// sonnb - XenGallery v2.0.0
			$dataId = $dw->get('content_data_id');
		}

		if ($this->_bdSocialShare_shouldProcessDataId($dataId))
		{
			/* @var $helper bdSocialShare_ControllerHelper_SocialShare */
			$helper = $this->getHelper('bdSocialShare_ControllerHelper_SocialShare');

			if ($dw instanceof sonnb_XenGallery_DataWriter_Photo)
			{
				$helper->publishAsNeeded('sonnbXenGalleryPhotoAttach', new bdSocialShare_Shareable_sonnb_XenGallery_Photo($dw), $dataId);
			}
			else
			{
				$helper->publishAsNeeded('sonnbXenGalleryPhotoAttach', new bdSocialShare_Shareable_sonnb_XenGallery_Video($dw), $dataId);
			}
		}
	}

	public function actionAddPhoto()
	{
		$GLOBALS[bdSocialShare_Listener::XENGALLERY_CONTROLLERPUBLIC_XENGALLERY_ADD_PHOTO] = $this;

		return parent::actionAddPhoto();
	}

	public function bdSocialShare_actionAddPhoto(sonnb_XenGallery_DataWriter_Photo $photoDw)
	{
		$dataId = $photoDw->get('photo_data_id');
		if (empty($dataId))
		{
			// sonnb - XenGallery v2.0.0
			$dataId = $photoDw->get('content_data_id');
		}

		if ($this->_bdSocialShare_shouldProcessDataId($dataId))
		{
			/* @var $helper bdSocialShare_ControllerHelper_SocialShare */
			$helper = $this->getHelper('bdSocialShare_ControllerHelper_SocialShare');
			$helper->publishAsNeeded('sonnbXenGalleryPhotoAttach', new bdSocialShare_Shareable_sonnb_XenGallery_Photo($photoDw), $dataId);
		}
	}

	public function actionAddVideo()
	{
		$GLOBALS[bdSocialShare_Listener::XENGALLERY_CONTROLLERPUBLIC_XENGALLERY_ADD_VIDEO] = $this;

		return parent::actionAddVideo();
	}

	public function bdSocialShare_actionAddVideo(sonnb_XenGallery_DataWriter_Video $videoDw)
	{
		$dataId = $videoDw->get('content_data_id');

		if ($this->_bdSocialShare_shouldProcessDataId($dataId))
		{
			/* @var $helper bdSocialShare_ControllerHelper_SocialShare */
			$helper = $this->getHelper('bdSocialShare_ControllerHelper_SocialShare');
			$helper->publishAsNeeded('sonnbXenGalleryPhotoAttach', new bdSocialShare_Shareable_sonnb_XenGallery_Video($videoDw), $dataId);
		}
	}

	protected function _bdSocialShare_shouldProcessDataId($dataId)
	{
		if (empty($dataId))
		{
			// no data id?!
			return false;
		}

		if (isset($this->_bdSocialShare_dataIds[$dataId]))
		{
			// this data has been processed before
			return false;
		}
		$this->_bdSocialShare_dataIds[$dataId] = true;

		return true;
	}

}
