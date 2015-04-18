<?php

class TopUsers_Route_Prefix_TopUsers implements XenForo_Route_Interface
{
	/**
	 * Match a specific route for an already matched prefix.
	 *
	 * @see XenForo_Route_Interface::match()
	 */
	public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
	{
		$action = $router->resolveActionWithIntegerParam($routePath, $request, 'month_id');
		return $router->getRouteMatch('TopUsers_ControllerPublic_Index', $action, 'members');
	}
}