<?php /*05e38dd0c90c4d9234f69627f6cb66ae41f2764e*/

/**
 * @package    GoodForNothing Notification
 * @version    1.0.5
 * @since      1.0.0 Beta 1
 * @author     GoodForNothing Labs
 * @copyright  Copyright © 2012-2015 GoodForNothing Labs <http://gfnlabs.com/>
 * @license    https://gfnlabs.com/legal/license
 * @link       https://gfnlabs.com/
 */
class GFNNotify_Listener_Template
{
    public static function createPublicContainerTemplate(&$templateName, array &$params, XenForo_Template_Abstract $template)
    {
        if (!($template instanceof XenForo_Template_Public))
        {
            return;
        }

        if (XenForo_Visitor::getInstance()->get('show_notification_popup'))
        {
            if (!isset($params['head']) || !is_array($params['head']))
            {
                $params['head'] = array();
            }

            $params['head']['notifyCssKeyframes'] = '<link rel="stylesheet" href="styles/default/gfnnotify/keyframes.min.css" />';
        }
    }
} 