<?php

class Turki_Adv_Route_PrefixAdmin_Hook implements XenForo_Route_Interface
{
	public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
	{
		$action = $router->resolveActionWithStringParam($routePath, $request, 'hook_id');
		return $router->getRouteMatch('Turki_Adv_ControllerAdmin_Hooks', $action, 'adfxf-hook');
	}

	public function buildLink($originalPrefix, $outputPrefix, $action, $extension, $data, array &$extraParams)
	{
		return XenForo_Link::buildBasicLinkWithStringParam($outputPrefix, $action, $extension, $data, 'hook_id');
	}
}