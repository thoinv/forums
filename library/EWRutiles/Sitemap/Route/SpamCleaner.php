<?php

class EWRutiles_Sitemap_Route_SpamCleaner extends XFCP_EWRutiles_Sitemap_Route_SpamCleaner
{
	public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
	{
		$action = $router->resolveActionWithIntegerParam($routePath, $request, 'user_id');
		return $router->getRouteMatch('XenForo_ControllerPublic_SpamCleaner', $action, 'forums');
	}
}