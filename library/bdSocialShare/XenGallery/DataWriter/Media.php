<?php

class bdSocialShare_XenGallery_DataWriter_Media extends XFCP_bdSocialShare_XenGallery_DataWriter_Media
{
	protected function _postSaveAfterTransaction()
	{
		if (isset($GLOBALS[bdSocialShare_Listener::XENGALLERY_CONTROLLERPUBLIC_MEDIA_SAVE_MEDIA]))
		{
			$GLOBALS[bdSocialShare_Listener::XENGALLERY_CONTROLLERPUBLIC_MEDIA_SAVE_MEDIA]->bdSocialShare_actionSaveMedia($this);
		}

		return parent::_postSaveAfterTransaction();
	}
}
