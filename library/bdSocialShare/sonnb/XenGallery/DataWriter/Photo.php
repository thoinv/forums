<?php

class bdSocialShare_sonnb_XenGallery_DataWriter_Photo extends XFCP_bdSocialShare_sonnb_XenGallery_DataWriter_Photo
{
	protected function _postSaveAfterTransaction()
	{
		if (isset($GLOBALS[bdSocialShare_Listener::XENGALLERY_CONTROLLERPUBLIC_XENGALLERY_SAVE]))
		{
			$GLOBALS[bdSocialShare_Listener::XENGALLERY_CONTROLLERPUBLIC_XENGALLERY_SAVE]->bdSocialShare_actionSave($this);
		}
		elseif (isset($GLOBALS[bdSocialShare_Listener::XENGALLERY_CONTROLLERPUBLIC_XENGALLERY_ADD_PHOTO]))
		{
			$GLOBALS[bdSocialShare_Listener::XENGALLERY_CONTROLLERPUBLIC_XENGALLERY_ADD_PHOTO]->bdSocialShare_actionAddPhoto($this);
		}

		return parent::_postSaveAfterTransaction();
	}

}
