<?php

class DigitalPointBetterAnalytics_ControllerPublic_Misc extends XFCP_DigitalPointBetterAnalytics_ControllerPublic_Misc
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

	public function actionA()
	{

		return $this->responseView('DigitalPointBetterAnalytics_ViewPublic_JavaScript', 'better_analytics_javascript');
	}
}