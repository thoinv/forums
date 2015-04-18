<?php

/**
 * Route prefix handler for tab rules in the admin control panel.
 */
class Waindigo_Tabs_Route_PrefixAdmin_TabRules implements XenForo_Route_Interface
{

    /**
     * Match a specific route for an already matched prefix.
     *
     * @see XenForo_Route_Interface::match()
     */
    public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
    {
        $action = $router->resolveActionWithIntegerParam($routePath, $request, 'tab_rule_id');
        $action = $router->resolveActionAsPageNumber($action, $request);
        return $router->getRouteMatch('Waindigo_Tabs_ControllerAdmin_TabRule', $action, 'tabRules');
    } /* END match */

    /**
     * Method to build a link to the specified page/action with the provided
     * data and params.
     *
     * @see XenForo_Route_BuilderInterface
     */
    public function buildLink($originalPrefix, $outputPrefix, $action, $extension, $data, array &$extraParams)
    {
        return XenForo_Link::buildBasicLinkWithIntegerParam($outputPrefix, $action, $extension, $data, 'tab_rule_id',
            'title');
    } /* END buildLink */
}