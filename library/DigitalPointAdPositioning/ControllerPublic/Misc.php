<?php

class DigitalPointAdPositioning_ControllerPublic_Misc extends XFCP_DigitalPointAdPositioning_ControllerPublic_Misc
{	
	protected function _checkCsrfFromToken($token = null, $throw = true)
	{
		return true;
	}
	
	protected function _setupSession($action) {}
	
	public function updateSessionActivity($controllerResponse, $controllerName, $action) {}
	
	public function canUpdateSessionActivity($controllerName, $action, &$newState)
	{
		return false;
	}
	
	protected function _assertViewingPermissions($action) {}
	
	protected function _assertNotBanned() {}
	
	protected function _isDiscouraged() {}
	
	
	public function actionAdsenseAuth()
	{
		$this->_assertPostOnly();
		
		$input = $this->_input->filter(array(
			'username' => XenForo_Input::STRING,
			'password' => XenForo_Input::STRING,
		));

		if ($input['password'] == XenForo_Application::getOptions()->dppa_adsense_password && $input['username'] == 'true')
		{
			XenForo_Helper_Cookie::setCookie('as_username', 'google_adsense', XenForo_Application::$time + 7776000); // 90 day cookie
			XenForo_Helper_Cookie::setCookie('as_password', XenForo_Application::getOptions()->dppa_adsense_password, XenForo_Application::$time + 7776000);
			echo 'Authentication successful.';
		}
		else
		{
			echo 'Authentication failed.';
		}
		exit;
	}
}