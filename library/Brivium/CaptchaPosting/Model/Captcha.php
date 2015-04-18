<?php

class Brivium_CaptchaPosting_Model_Captcha extends XenForo_Model
{
	public function canBypassCaptchaPosting($nodeId, array $viewingUser = null)
	{
		$this->standardizeViewingUserReferenceForNode($nodeId, $viewingUser, $nodePermissions);

		return (XenForo_Permission::hasContentPermission($nodePermissions, 'BRCCP_bypassCaptcha'));
	}
	
	public function checkRequiredCaptcha($position, $nodeId, array $viewingUser = null)
	{
		$this->standardizeViewingUserReferenceForNode($nodeId, $viewingUser, $nodePermissions);
		
		$requiredCaptcha = XenForo_Application::get('options')->BRCCP_requiredCaptcha;
		if($requiredCaptcha && empty($requiredCaptcha[$position])){
			return false;
		}
		
		if($this->canBypassCaptchaPosting($nodeId, $viewingUser)){
			return false;
		}
		
		$criteria = XenForo_Application::get('options')->BRCCP_requireCaptchaCriteria;

		if ($criteria['message_count'] && $viewingUser['message_count'] > $criteria['message_count'])
		{
			return false;
		}

		if ($criteria['register_date'] && $viewingUser['register_date'] < (XenForo_Application::$time - $criteria['register_date'] * 86400))
		{
			return false;
		}

		if ($criteria['like_count'] && $viewingUser['like_count'] > $criteria['like_count'])
		{
			return false;
		}
		return true;

	}

}