<?php

class Andy_Bookmark_Route_Prefix_Bookmark implements XenForo_Route_Interface
{
	public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
	{
		return $router->getRouteMatch('Andy_Bookmark_ControllerPublic_Bookmark', $routePath);
	}
}