<?php

class XenPlaza_XPLoveMessage_Route_Prefix_XPLoveMessage implements XenForo_Route_Interface
{
	public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
	{	
		//return $router->getRouteMatch('XenPlaza_XPLoveMessage_ControllerPublic_XPLoveMessage', $routePath, 'forums');
		
		$action = $router->resolveActionWithIntegerParam($routePath, $request, 'message_id');
		return $router->getRouteMatch('XenPlaza_XPLoveMessage_ControllerPublic_XPLoveMessage', $action, 'forums');
	}
	
	public function buildLink($originalPrefix, $outputPrefix, $action, $extension, $data, array &$extraParams)
	{
		return XenForo_Link::buildBasicLinkWithIntegerParam($outputPrefix, $action, $extension, $data, 'message_id');
	}
}