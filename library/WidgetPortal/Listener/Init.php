<?php
/**
 * @title Widget Portal Listener Init
 * @package Widget Portal
 */

class WidgetPortal_Listener_Init
{
	public static function listen(XenForo_Dependencies_Abstract $dependencies, array $data)
	{
		if (!$dependencies instanceof XenForo_Dependencies_Public)
		{
			return;
		}

		if (XenForo_Application::get('options')->widgetportal_index)
		{
			$config = new Zend_Config(array(
				'routePrefix'     => 'home',
				'controllerClass' => 'WidgetPortal_ControllerPublic_Portal',
				'majorSection'    => 'home',
				'minorSection'    => 'portal_id'
			));

			WidgetPortal_Helper_Index::setDefaultRoute($config, $data);
		}
	}
}