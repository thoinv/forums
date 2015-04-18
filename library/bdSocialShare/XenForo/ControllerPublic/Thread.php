<?php

class bdSocialShare_XenForo_ControllerPublic_Thread extends XFCP_bdSocialShare_XenForo_ControllerPublic_Thread
{
	public function actionIndex()
	{
		$customAccessDenied = bdSocialShare_Option::get('customAccessDenied');
		if ($customAccessDenied)
		{
			$forumModel = $this->getModelFromCache('XenForo_Model_Forum');
			$threadModel = $this->getModelFromCache('XenForo_Model_Thread');

			$forumModel->bdSocialShare_setCanViewForum(true);
			$threadModel->bdSocialShare_setCanViewThread(true);
		}

		$response = parent::actionIndex();

		if ($customAccessDenied AND $response instanceof XenForo_ControllerResponse_View)
		{
			$paramsRef = &$response->params;
			$forumModel->bdSocialShare_setCanViewForum(null);
			$threadModel->bdSocialShare_setCanViewThread(null);

			if (!$forumModel->canViewForum($paramsRef['forum'], $errorPhraseKey) OR !$threadModel->canViewThread($paramsRef['thread'], $paramsRef['forum'], $errorPhraseKey))
			{
				$response = $this->getHelper('bdSocialShare_ControllerHelper_Content')->getErrorOrNoPermissionResponse($response, $errorPhraseKey);
			}
		}

		return $response;
	}

	public function actionAddReply()
	{
		$GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_THREAD_ADD_REPLY] = $this;

		return parent::actionAddReply();
	}

	public function bdSocialShare_actionAddReply(XenForo_DataWriter_DiscussionMessage_Post $postDw)
	{
		/* @var $helper bdSocialShare_ControllerHelper_SocialShare */
		$helper = $this->getHelper('bdSocialShare_ControllerHelper_SocialShare');
		$helper->publishAsNeeded('threadReply', new bdSocialShare_Shareable_Post($postDw));

		unset($GLOBALS[bdSocialShare_Listener::XENFORO_CONTROLLERPUBLIC_THREAD_ADD_REPLY]);
	}

}
