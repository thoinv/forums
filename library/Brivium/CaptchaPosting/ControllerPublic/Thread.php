<?php

class Brivium_CaptchaPosting_ControllerPublic_Thread extends XFCP_Brivium_CaptchaPosting_ControllerPublic_Thread
{
	public function actionReply()
	{
		$response = parent::actionReply();
		if(!empty($response->params['thread']['node_id']) && $this->_getCaptchaModel()->checkRequiredCaptcha('thread_reply_captcha',$response->params['thread']['node_id'])){
			$response->params['captcha'] = XenForo_Captcha_Abstract::createDefault(true);
		}
		return $response;
	}
	public function actionAddReply()
	{
		$this->_assertPostOnly();

		if ($this->_input->inRequest('more_options'))
		{
			return $this->responseReroute(__CLASS__, 'reply');
		}
		$threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);

		$visitor = XenForo_Visitor::getInstance();

		$ftpHelper = $this->getHelper('ForumThreadPost');
		$threadFetchOptions = array('readUserId' => $visitor['user_id']);
		$forumFetchOptions = array('readUserId' => $visitor['user_id']);
		list($thread, $forum) = $ftpHelper->assertThreadValidAndViewable($threadId, $threadFetchOptions, $forumFetchOptions);
		
		if(!empty($thread['node_id']) && $this->_getCaptchaModel()->checkRequiredCaptcha('thread_reply_captcha',$thread['node_id']) && !XenForo_Captcha_Abstract::validateDefault($this->_input,true)){
			return $this->responseCaptchaFailed();
		}
		
		return parent::actionAddReply();
	}
	public function actionEdit()
	{
		$response = parent::actionEdit();
		if(!empty($response->params['thread']['node_id']) && $this->_getCaptchaModel()->checkRequiredCaptcha('edit_thread_captcha',$response->params['thread']['node_id'])){
			$response->params['captcha'] = XenForo_Captcha_Abstract::createDefault(true);
		}
		return $response;
	}
	public function actionSave()
	{
		$threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);

		$ftpHelper = $this->getHelper('ForumThreadPost');
		list($thread, $forum) = $ftpHelper->assertThreadValidAndViewable($threadId);
		
		if(!empty($thread['node_id']) && $this->_getCaptchaModel()->checkRequiredCaptcha('edit_thread_captcha',$thread['node_id']) && !XenForo_Captcha_Abstract::validateDefault($this->_input,true)){
			return $this->responseCaptchaFailed();
		}
		return parent::actionSave();
	}
	
	protected function _getDefaultViewParams(array $forum, array $thread, array $posts, $page = 1, array $viewParams = array())
	{
		$viewParams = parent::_getDefaultViewParams($forum, $thread, $posts, $page, $viewParams);
		//prd($thread);
		if(!empty($thread['node_id']) && $this->_getCaptchaModel()->checkRequiredCaptcha('thread_reply_captcha',$thread['node_id']))
		{
			$viewParams['captcha'] = XenForo_Captcha_Abstract::createDefault(true);
		}
		
		return $viewParams;
	}
	
	protected function _getCaptchaModel()
	{
		return $this->getModelFromCache('Brivium_CaptchaPosting_Model_Captcha');
	}
}