<?php

class bdSocialShare_XenForo_DataWriter_DiscussionMessage_Post extends XFCP_bdSocialShare_XenForo_DataWriter_DiscussionMessage_Post
{
	protected function _postSaveAfterTransaction()
	{
		if (isset($GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_FORUM_ADD_THREAD]))
		{
			$GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_FORUM_ADD_THREAD]->bdSocialShare_actionAddThread($this);
		}
		elseif (isset($GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_THREAD_ADD_REPLY]))
		{
			$GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_THREAD_ADD_REPLY]->bdSocialShare_actionAddReply($this);
		}

		return parent::_postSaveAfterTransaction();
	}

}
