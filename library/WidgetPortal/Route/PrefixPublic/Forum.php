<?php
/**
 * @title Widget Portal Route PrefixPublic Forum
 * @package Widget Portal
 */

/**
 * New route-prefix class for handling the forum-index.
 *
 * @author Shadab Ansari
 * @package GeekPoint_CustomIndex
 */
class WidgetPortal_Route_PrefixPublic_Forum implements XenForo_Route_Interface
{
    /**
     * @see XenForo_Route_Interface::match()
     * @param $routePath
     * @param \Zend_Controller_Request_Http $request
     * @param \XenForo_Router $router
     * @return \XenForo_RouteMatch
     */
    public function match( $routePath, Zend_Controller_Request_Http $request, XenForo_Router $router )
    {
        return $router->getRouteMatch( 'XenForo_ControllerPublic_Index', $routePath, 'forums' );
    }
}