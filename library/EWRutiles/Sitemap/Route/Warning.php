<?php

class EWRutiles_Sitemap_Route_Warning extends XFCP_EWRutiles_Sitemap_Route_Warning
{
	public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
	{
		$action = $router->resolveActionWithIntegerParam($routePath, $request, 'warning_id');
		return $router->getRouteMatch('XenForo_ControllerPublic_Warning', $action, 'forums');
	}
}