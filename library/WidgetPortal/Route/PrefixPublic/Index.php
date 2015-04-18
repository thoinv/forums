<?php
/**
 * @title Widget Portal Route PrefixPublic Index
 * @package Widget Portal
 */

/**
 * Route-prefix class which will act as a handler for the homepage.
 *
 * The match() method will return the new default configuration,
 * while the buildLink() method will return the "forum" listing URL.
 * This is necessary for correctly preserving links to the "index" route-prefix.
 *
 * @author Shadab Ansari
 * @package GeekPoint_CustomIndex
 */
class WidgetPortal_Route_PrefixPublic_Index implements XenForo_Route_Interface, XenForo_Route_BuilderInterface
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
        $customIndex = XenForo_Application::get( 'customIndex' );

        if ( $customIndex->params )
        {
            $request->setParams( $customIndex->params->toArray() );
        }

        return $router->getRouteMatch(
            $customIndex->controllerClass, $routePath, $customIndex->majorSection, $customIndex->minorSection
        );
    }

    /**
     * @see XenForo_Route_BuilderInterface::buildLink()
     * @param $originalPrefix
     * @param $outputPrefix
     * @param $action
     * @param $extension
     * @param $data
     * @param array $extraParams
     * @return string
     */
    public function buildLink( $originalPrefix, $outputPrefix, $action, $extension, $data, array &$extraParams )
    {
        return XenForo_Link::buildBasicLink( 'forum', $action, $extension );
    }
}