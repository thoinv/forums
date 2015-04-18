<?php

/**
 * Controller for handling actions on forums.
 *
 * @package XenForo_Forum
 */
class Brivium_CaptchaPosting_ControllerPublic_Forum extends XFCP_Brivium_CaptchaPosting_ControllerPublic_Forum
{
	public function actionCreateThread()
	{
		$response = parent::actionCreateThread();
		if(!empty($response->params['forum']['node_id']) && $this->_getCaptchaModel()->checkRequiredCaptcha('create_thread_captcha',$response->params['forum']['node_id'])){
			$response->params['captcha'] = XenForo_Captcha_Abstract::createDefault(true);
		}
		return $response;
	}
	
	public function actionAddThread()
	{
		$forumId = $this->_input->filterSingle('node_id', XenForo_Input::UINT);
		$forumName = $this->_input->filterSingle('node_name', XenForo_Input::STRING);

		$ftpHelper = $this->getHelper('ForumThreadPost');
		$forum = $ftpHelper->assertForumValidAndViewable($forumId ? $forumId : $forumName);

		if(!empty($forum['node_id']) && $this->_getCaptchaModel()->checkRequiredCaptcha('edit_thread_captcha',$forum['node_id']) && !XenForo_Captcha_Abstract::validateDefault($this->_input,true)){
			return $this->responseCaptchaFailed();
		}
		return parent::actionAddThread();
	}
	
	protected function _getCaptchaModel()
	{
		return $this->getModelFromCache('Brivium_CaptchaPosting_Model_Captcha');
	}
}