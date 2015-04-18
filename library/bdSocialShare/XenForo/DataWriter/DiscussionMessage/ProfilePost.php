<?php

class bdSocialShare_XenForo_DataWriter_DiscussionMessage_ProfilePost extends XFCP_bdSocialShare_XenForo_DataWriter_DiscussionMessage_ProfilePost
{
	protected function _postSaveAfterTransaction()
	{
		if (isset($GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_MEMBER_POST]))
		{
			$GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_MEMBER_POST]->bdSocialShare_actionPost($this);
		}
		elseif (isset($GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_ACCOUNT_PERSONAL_DETAILS_SAVE]))
		{
			$GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_ACCOUNT_PERSONAL_DETAILS_SAVE]->bdSocialShare_actionPersonalDetailsSave($this);
		}

		return parent::_postSaveAfterTransaction();
	}

}
