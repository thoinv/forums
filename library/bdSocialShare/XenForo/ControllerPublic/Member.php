<?php

class bdSocialShare_XenForo_ControllerPublic_Member extends XFCP_bdSocialShare_XenForo_ControllerPublic_Member
{
	public function actionPost()
	{
		$GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_MEMBER_POST] = $this;
		
		return parent::actionPost();
	}
	
	public function bdSocialShare_actionPost(XenForo_DataWriter_DiscussionMessage_ProfilePost $profilePostDw)
	{
		/* @var $helper bdSocialShare_ControllerHelper_SocialShare */
		$helper = $this->getHelper('bdSocialShare_ControllerHelper_SocialShare');
		$helper->publishAsNeeded('status', new bdSocialShare_Shareable_Status($profilePostDw));

		unset($GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_MEMBER_POST]);
	}
}
