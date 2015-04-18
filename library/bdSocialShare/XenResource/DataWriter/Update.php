<?php

class bdSocialShare_XenResource_DataWriter_Update extends XFCP_bdSocialShare_XenResource_DataWriter_Update
{
	protected function _postSaveAfterTransaction()
	{
		if (isset($GLOBALS[bdSocialShare_Listener::XENRESOURCE_CONTROLLERPUBLIC_RESOURCE_SAVE_VERSION]))
		{
			$GLOBALS[bdSocialShare_Listener::XENRESOURCE_CONTROLLERPUBLIC_RESOURCE_SAVE_VERSION]->bdSocialShare_actionSaveVersion($this);
		}

		return parent::_postSaveAfterTransaction();
	}

}
