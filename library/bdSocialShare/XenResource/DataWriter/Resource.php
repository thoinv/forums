<?php

class bdSocialShare_XenResource_DataWriter_Resource extends XFCP_bdSocialShare_XenResource_DataWriter_Resource
{
	protected function _postSaveAfterTransaction()
	{
		if (isset($GLOBALS[bdSocialShare_Listener::XENRESOURCE_CONTROLLERPUBLIC_RESOURCE_SAVE]))
		{
			$GLOBALS[bdSocialShare_Listener::XENRESOURCE_CONTROLLERPUBLIC_RESOURCE_SAVE]->bdSocialShare_actionSave($this);
		}
		if (isset($GLOBALS[bdSocialShare_Listener::XENRESOURCE_CONTROLLERPUBLIC_RESOURCE_ICON]))
		{
			$GLOBALS[bdSocialShare_Listener::XENRESOURCE_CONTROLLERPUBLIC_RESOURCE_ICON]->bdSocialShare_actionIcon($this);
		}

		return parent::_postSaveAfterTransaction();
	}

}
