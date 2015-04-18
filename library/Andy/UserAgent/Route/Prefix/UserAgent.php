<?php

class Andy_UserAgent_Route_Prefix_UserAgent implements XenForo_Route_Interface
{
	public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
	{
		return $router->getRouteMatch('Andy_UserAgent_ControllerPublic_UserAgent', $routePath);
	}
}