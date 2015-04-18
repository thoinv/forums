<?php

/**
 * Route prefix handler for tabs in the public system.
 */
class Waindigo_Tabs_Route_Prefix_Tabs implements XenForo_Route_Interface
{

    /**
     * Match a specific route for an already matched prefix.
     *
     * @see XenForo_Route_Interface::match()
     */
    public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
    {
        return $router->getRouteMatch('Waindigo_Tabs_ControllerPublic_Tab', $routePath);
    } /* END match */
}