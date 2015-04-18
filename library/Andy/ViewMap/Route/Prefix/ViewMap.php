<?php

class Andy_ViewMap_Route_Prefix_ViewMap implements XenForo_Route_Interface
{
	public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
	{
		return $router->getRouteMatch('Andy_ViewMap_ControllerPublic_ViewMap', $routePath);
	}
}