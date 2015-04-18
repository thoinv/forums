<?php /*277ce6e26546caa4b1ad7f6738f7b7821b61a152*/

/**
 * @package    GoodForNothing Link Proxy
 * @version    1.0.0 Alpha 1
 * @since      1.0.0 Alpha 1
 * @author     GoodForNothing Labs
 * @copyright  Copyright © 2012-2015 GoodForNothing Labs <http://gfnlabs.com/>
 * @license    https://gfnlabs.com/legal/license
 * @link       https://gfnlabs.com/
 */
class GFNLinkProxy_Options
{
    protected static $_instance;

    public static function getInstance()
    {
        if (!self::$_instance)
        {
            self::$_instance = new GFNCore_Helper_Options('gfnlinkproxy');
        }

        return self::$_instance;
    }
} 