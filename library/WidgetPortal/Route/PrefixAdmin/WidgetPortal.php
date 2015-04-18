<?php

class WidgetPortal_Route_PrefixAdmin_WidgetPortal implements XenForo_Route_Interface
{
    public function match( $routePath, Zend_Controller_Request_Http $request, XenForo_Router $router )
    {
        $action = $router->resolveActionWithIntegerParam( $routePath, $request, 'widget_id' );
        return $router->getRouteMatch( 'WidgetPortal_ControllerAdmin_Portal', $action, 'widgetPortal' );
    }

    public function buildLink( $originalPrefix, $outputPrefix, $action, $extension, $data, array &$extraParams )
    {
        return XenForo_Link::buildBasicLinkWithIntegerParam( $outputPrefix, $action, $extension, $data, 'widget_id' );
    }
}