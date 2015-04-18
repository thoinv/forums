<?php

class Dark_PostRating_Route_PrefixAdmin implements XenForo_Route_Interface
{
	public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
	{      
		$action = $router->resolveActionWithIntegerParam($routePath, $request, 'id');
		return $router->getRouteMatch('Dark_PostRating_ControllerAdmin', $action, 'postrating', $routePath);
	}

	public function buildLink($originalPrefix, $outputPrefix, $action, $extension, $data, array &$extraParams)
	{
		return XenForo_Link::buildBasicLinkWithIntegerParam($outputPrefix, $action, $extension, $data, 'id');
	}
}