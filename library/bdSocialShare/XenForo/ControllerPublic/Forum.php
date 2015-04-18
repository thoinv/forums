<?php

class bdSocialShare_XenForo_ControllerPublic_Forum extends XFCP_bdSocialShare_XenForo_ControllerPublic_Forum
{
	public function actionAddThread()
	{
		$GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_FORUM_ADD_THREAD] = $this;

		return parent::actionAddThread();
	}

	public function bdSocialShare_actionAddThread(XenForo_DataWriter_DiscussionMessage_Post $postDw)
	{
		/* @var $helper bdSocialShare_ControllerHelper_SocialShare */
		$helper = $this->getHelper('bdSocialShare_ControllerHelper_SocialShare');
		$helper->publishAsNeeded('threadCreate', new bdSocialShare_Shareable_Post($postDw));

		unset($GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_FORUM_ADD_THREAD]);
	}

}
