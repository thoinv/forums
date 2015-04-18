<?php /*5e3b1e06ca1944826cbd03ab5b4a024826b9ec97*/

/**
 * @package    GoodForNothing Notification
 * @version    1.0.2 Alpha 1
 * @since      1.0.0 Beta 1
 * @author     GoodForNothing Labs
 * @copyright  Copyright © 2012-2015 GoodForNothing Labs <http://gfnlabs.com/>
 * @license    https://gfnlabs.com/legal/license
 * @link       https://gfnlabs.com/
 */
class GFNNotify_Route_Prefix_Notify implements XenForo_Route_Interface
{
    public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
    {
        return $router->getRouteMatch('GFNNotify_ControllerPublic_Notify', $routePath);
    }
} 