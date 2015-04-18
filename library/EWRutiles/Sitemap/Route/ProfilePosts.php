<?php

class EWRutiles_Sitemap_Route_ProfilePosts extends XFCP_EWRutiles_Sitemap_Route_ProfilePosts
{
	public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
	{
		$action = $router->resolveActionWithIntegerParam($routePath, $request, 'profile_post_id');
		return $router->getRouteMatch('XenForo_ControllerPublic_ProfilePost', $action, 'forums');
	}
}