<?php

class Andy_LinkCheck_Route_Prefix_LinkCheck implements XenForo_Route_Interface
{
	public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
	{
		return $router->getRouteMatch('Andy_LinkCheck_ControllerPublic_LinkCheck', $routePath);
	}
}