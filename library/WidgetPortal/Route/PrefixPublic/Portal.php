<?php
/**
 * @title Widget Portal Route PrefixPublic Portal
 * @package Widget Portal
 */

class WidgetPortal_Route_PrefixPublic_Portal implements XenForo_Route_Interface
{
    public function match( $routePath, Zend_Controller_Request_Http $request, XenForo_Router $router )
    {
        $action = $router->resolveActionWithStringParam( $routePath, $request, 'portal_id' );
        $action = $router->resolveActionAsPageNumber( $action, $request );
        return $router->getRouteMatch( 'WidgetPortal_ControllerPublic_Portal', $action, 'home' );
    }

    public function buildLink( $originalPrefix, $outputPrefix, $action, $extension, $data, array &$extraParams )
    {
        $action = XenForo_Link::getPageNumberAsAction( $action, $extraParams );
        return XenForo_Link::buildBasicLinkWithStringParam( $outputPrefix, $action, $extension, $data, 'portal_id' );
    }
}