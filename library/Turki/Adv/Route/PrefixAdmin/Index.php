<?php

class Turki_Adv_Route_PrefixAdmin_Index implements XenForo_Route_Interface
{
	public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
	{
		$action = $router->resolveActionWithStringParam($routePath, $request, 'adv_id');
		return $router->getRouteMatch('Turki_Adv_ControllerAdmin_Home', $action, 'advxf');
	}

	public function buildLink($originalPrefix, $outputPrefix, $action, $extension, $data, array &$extraParams)
	{
		return XenForo_Link::buildBasicLinkWithStringParam($outputPrefix, $action, $extension, $data, 'adv_id');
	}
}