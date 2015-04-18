<?php

class WidgetPortal_Route_PrefixPublic_PortalWidget implements XenForo_Route_Interface
{
    public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
    {
        $controllerName = '';
        $components = explode('/', $routePath);
        $subPrefix = strtolower(array_shift($components));

        $strParams = '';
        $slice = false;

        // Add additional portal widgets controllers here
        switch ($subPrefix)
        {
            case 'carousel':
                $controllerName = $controllerName . 'Carousel';		$strParams = 'widget_id'; $slice=true;  break;
            default:			$controllerName = 'Portal'; $strParams = 'slug';
        }

        $routePathAction = ($slice ? implode('/', array_slice($components, 0, 2)) : $routePath);

        $action = $router->resolveActionWithStringParam($routePathAction, $request, $strParams);
        return $router->getRouteMatch( 'WidgetPortal_ControllerPublic_Widget_' . $controllerName, $action, 'BuzzTags', $routePath);
    }

    public function buildLink($originalPrefix, $outputPrefix, $action, $extension, $data, array &$extraParams)
    {
        $components = explode('/', $action);
        $subPrefix = strtolower(array_shift($components));

        $strParams = '';
        $title = '';
        $slice = false;

        switch ($subPrefix)
        {
//            case 'options':		$strParams = 'option_id';		$slice = true;	break;
            default:	$strParams = 'slug';
        }

        if ($slice)
        {
            $outputPrefix .= '/'.$subPrefix;
            $action = implode('/', $components);
        }

        $action = XenForo_Link::getPageNumberAsAction($action, $extraParams);
        return XenForo_Link::buildBasicLinkWithStringParam($outputPrefix, $action, $extension, $data, $strParams);
    }
}