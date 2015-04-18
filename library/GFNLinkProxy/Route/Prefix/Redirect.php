<?php /*18a7ea84ef605cf69d629414cfa22839b863d81a*/

/**
 * @package    GoodForNothing Link Proxy
 * @version    1.0.0 Alpha 1
 * @since      1.0.0 Alpha 1
 * @author     GoodForNothing Labs
 * @copyright  Copyright © 2012-2015 GoodForNothing Labs <http://gfnlabs.com/>
 * @license    https://gfnlabs.com/legal/license
 * @link       https://gfnlabs.com/
 */
class GFNLinkProxy_Route_Prefix_Redirect implements XenForo_Route_Interface
{
    public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router)
    {
        return $router->getRouteMatch('GFNLinkProxy_ControllerPublic_Redirect');
    }
} 