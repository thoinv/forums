<?php

class EWRutiles_Sitemap_Route_RecentActivity extends XFCP_EWRutiles_Sitemap_Route_RecentActivity
{
	public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
	{
		return $router->getRouteMatch('XenForo_ControllerPublic_RecentActivity', 'index', 'forums');
	}
}