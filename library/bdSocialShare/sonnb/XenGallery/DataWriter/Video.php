<?php

class bdSocialShare_sonnb_XenGallery_DataWriter_Video extends XFCP_bdSocialShare_sonnb_XenGallery_DataWriter_Video
{
	protected function _postSaveAfterTransaction()
	{
		if (isset($GLOBALS[bdSocialShare_Listener::XENGALLERY_CONTROLLERPUBLIC_XENGALLERY_SAVE]))
		{
			$GLOBALS[bdSocialShare_Listener::XENGALLERY_CONTROLLERPUBLIC_XENGALLERY_SAVE]->bdSocialShare_actionSave($this);
		}
		elseif (isset($GLOBALS[bdSocialShare_Listener::XENGALLERY_CONTROLLERPUBLIC_XENGALLERY_ADD_VIDEO]))
		{
			$GLOBALS[bdSocialShare_Listener::XENGALLERY_CONTROLLERPUBLIC_XENGALLERY_ADD_VIDEO]->bdSocialShare_actionAddVideo($this);
		}

		return parent::_postSaveAfterTransaction();
	}

}
