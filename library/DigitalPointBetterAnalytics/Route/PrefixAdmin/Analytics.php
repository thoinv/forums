<?php

/**
 * Route prefix handler for Better Analytics.
 */
class DigitalPointBetterAnalytics_Route_PrefixAdmin_Analytics implements XenForo_Route_Interface
{
	/**
	 * Match a specific route for an already matched prefix.
	 *
	 * @see XenForo_Route_Interface::match()
	 */
	public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
	{
		if ($routePath == 'heatmap' || $routePath == 'test-setup')
		{
			$tab = 'tools';
		}
		else
		{
			$tab = 'users';
		}

		return $router->getRouteMatch('DigitalPointBetterAnalytics_ControllerAdmin_Analytics', $routePath, $tab);
	}
}