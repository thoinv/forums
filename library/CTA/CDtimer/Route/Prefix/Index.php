<?php

class CTA_CDtimer_Route_Prefix_Index implements XenForo_Route_Interface
{
	public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
	{
		return $router->getRouteMatch('CTA_CDtimer_ControllerPublic_Index', $routePath, 'cta');
	}
}