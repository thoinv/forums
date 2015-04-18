<?php /*6b7c615d3ab67528d7c72197e78c34846528cca0*/

/**
 * @package    GoodForNothing Notification
 * @version    1.0.4 Beta 1
 * @since      1.0.4 Beta 1
 * @author     GoodForNothing Labs
 * @copyright  Copyright © 2012-2015 GoodForNothing Labs <https://gfnlabs.com/>
 * @license    https://gfnlabs.com/legal/license
 * @link       https://gfnlabs.com/
 */
class GFNNotify_Listener_LoadClass
{
    public static function extend($class, array &$extend)
    {
        $extend[] = 'GFNNotify_Extend_' . $class;
    }
} 