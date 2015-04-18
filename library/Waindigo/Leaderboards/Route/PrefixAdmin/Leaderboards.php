<?php

/**
 * Route prefix handler for leaderboards in the admin control panel.
 */
class Waindigo_Leaderboards_Route_PrefixAdmin_Leaderboards implements XenForo_Route_Interface
{

    /**
     * Match a specific route for an already matched prefix.
     *
     * @see XenForo_Route_Interface::match()
     */
    public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
    {
        $action = $router->resolveActionWithIntegerParam($routePath, $request, 'leaderboard_id');
        $action = $router->resolveActionAsPageNumber($action, $request);
        return $router->getRouteMatch('Waindigo_Leaderboards_ControllerAdmin_Leaderboard', $action, 'leaderboards');
    } /* END match */

    /**
     * Method to build a link to the specified page/action with the provided
     * data and params.
     *
     * @see XenForo_Route_BuilderInterface
     */
    public function buildLink($originalPrefix, $outputPrefix, $action, $extension, $data, array &$extraParams)
    {
        return XenForo_Link::buildBasicLinkWithIntegerParam($outputPrefix, $action, $extension, $data, 'leaderboard_id', 'title');
    } /* END buildLink */
}