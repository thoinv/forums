<?php

class bdSocialShare_XenGallery_ControllerPublic_Media extends XFCP_bdSocialShare_XenGallery_ControllerPublic_Media
{
	protected $_bdSocialShare_attachmentIds = array();

	public function actionCategorySaveMedia()
	{
		// this method was kept for backward compatibility
		// it looks like new version of Xen Media Gallery switched
		// to use actionSaveMedia instead 
		$GLOBALS[bdSocialShare_Listener::XENGALLERY_CONTROLLERPUBLIC_MEDIA_SAVE_MEDIA] = $this;

		return parent::actionCategorySaveMedia();
	}
	
	public function actionSaveMedia()
	{
		$GLOBALS[bdSocialShare_Listener::XENGALLERY_CONTROLLERPUBLIC_MEDIA_SAVE_MEDIA] = $this;

		return parent::actionSaveMedia();
	}

	public function bdSocialShare_actionSaveMedia(XenGallery_DataWriter_Media $mediaDw)
	{
		$attachmentId = $mediaDw->get('attachment_id');
		if ($this->_bdSocialShare_shouldProcessAttachmentId($attachmentId))
		{
			/* @var $helper bdSocialShare_ControllerHelper_SocialShare */
			$helper = $this->getHelper('bdSocialShare_ControllerHelper_SocialShare');
			$helper->publishAsNeeded('xenGalleryImageAttach', new bdSocialShare_Shareable_XenGallery_Media($mediaDw), $attachmentId);
		}
	}

	protected function _bdSocialShare_shouldProcessAttachmentId($attachmentId)
	{
		if (empty($attachmentId))
		{
			// no attachment id?!
			return false;
		}

		if (isset($this->_bdSocialShare_attachmentIds[$attachmentId]))
		{
			// this attachment has been processed before
			return false;
		}
		$this->_bdSocialShare_attachmentIds[$attachmentId] = true;

		return true;
	}

}
