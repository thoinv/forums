<?php
class DigitalPointBetterAnalytics_Listener_ControllerPostDispatch
{
	protected static $_triggered = false;

	public static function loadControllerListener($controller, $controllerResponse, $controllerName, $action)
	{
		// checking for FrontController because of some Tapatalk stupidity
		if (!self::$_triggered && XenForo_Application::isRegistered('fc') && $controller->getResponseType() === 'html')
		{
			self::$_triggered = true;

			if ($clientId = DigitalPointBetterAnalytics_Listener_ControllerPreDispatch::$backendLogging)
			{
				if (!empty(XenForo_Application::getOptions()->dpAnalyticsInternal['v']))
				{
					/*  Debugging the backend tracker
						$e = new ErrorException('CID = ' . $clientId . '/' . DigitalPointBetterAnalytics_Listener_ControllerPreDispatch::$backendLogging . ', UA = ' . @$_SERVER['HTTP_USER_AGENT'] . ', REF = ' . @$_SERVER['HTTP_REFERER'] . ', user_id = ' . XenForo_Visitor::getUserId());
						XenForo_Error::logException($e, false);
					*/

					$params = array(
						'dl' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . @$_SERVER['HTTP_HOST'] . @$_SERVER['REQUEST_URI'],
						'uip' => @$_SERVER['REMOTE_ADDR'],
						'ua' => @$_SERVER['HTTP_USER_AGENT'],
						'dr' => @$_SERVER['HTTP_REFERER']
					);

					DigitalPointBetterAnalytics_Helper_Analytics::getInstance()->pageview(
						XenForo_Application::getOptions()->googleAnalyticsWebPropertyId,
						$clientId,
						XenForo_Visitor::getUserId(),
						$params
					);
				}
			}
		}
	}
}