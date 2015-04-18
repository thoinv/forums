<?php

class Dark_AzuCloud_Route_PrefixAdmin_AzuCloud implements XenForo_Route_Interface
{
	public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
	{
		$action = $router->resolveActionWithIntegerParam($routePath, $request, 'term_id');
		return $router->getRouteMatch('Dark_AzuCloud_ControllerAdmin_AzuCloud', $action, 'azucloud', $routePath);
	}

	public function buildLink($originalPrefix, $outputPrefix, $action, $extension, $data, array &$extraParams)
	{
		return XenForo_Link::buildBasicLinkWithIntegerParam($outputPrefix, $action, $extension, $data, 'term_id');
	}
}