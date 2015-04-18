<?php

class EWRutiles_Sitemap_Route_Members extends XFCP_EWRutiles_Sitemap_Route_Members
{
	public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
	{
		$action = $router->resolveActionWithIntegerParam($routePath, $request, 'user_id');
		return $router->getRouteMatch('XenForo_ControllerPublic_Member', $action, 'forums');
	}
}