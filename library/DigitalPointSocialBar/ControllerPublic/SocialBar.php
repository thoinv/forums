<?php

class DigitalPointSocialBar_ControllerPublic_SocialBar extends XenForo_ControllerPublic_Abstract
{
	protected function _setupSession($action) {}

	public function updateSessionActivity($controllerResponse, $controllerName, $action) {}

	public function canUpdateSessionActivity($controllerName, $action, &$newState)
	{
		return false;
	}

	protected function _assertViewingPermissions($action) {}

	protected function _assertNotBanned() {}

	protected function _isDiscouraged() {}

	public function actionIndex()
	{
		return $this->responseRedirect(XenForo_ControllerResponse_Redirect::SUCCESS, 'https://www.digitalpoint.com');
	}

	public function actionTweets()
	{
		if (!$slug = $this->_input->filterSingle('slug', XenForo_Input::STRING))
		{
			$slug = XenForo_Application::getOptions()->dpTwitterDefaultList;
		}

		$tweets = json_decode(XenForo_Application::getCache()->load('social_bar_' . str_replace('-', '_', preg_replace('#[^a-z0-9\_\-]#' ,'', $slug)), true), true);

		if (!$tweets)
		{
			$tweets = array(
				'd' => XenForo_Application::$time,
				'n' => 'Error',
				'u' => '',
				'i' => '',
				's' => '',
				't' => 'Twitter List not found for "'. $slug . '".'
			);
		}

		header('Content-Type: application/json; charset=UTF-8', true);
		header('Cache-Control: max-age=600', true);
		header('Last-Modified : ' . gmdate('D, d M Y H:i:s' . XenForo_Application::$time) . ' GMT', true);

		echo XenForo_ViewRenderer_Json::jsonEncodeForOutput(array('tweets' => $tweets));
		exit;

	}
}