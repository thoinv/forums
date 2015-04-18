<?php /*a68ebfe19ce3262fc8c2551f0ab85af398330ee7*/

/**
 * @package    GoodForNothing Notification
 * @version    1.0.5
 * @since      1.0.4 Beta 1
 * @author     GoodForNothing Labs
 * @copyright  Copyright © 2012-2015 GoodForNothing Labs <https://gfnlabs.com/>
 * @license    https://gfnlabs.com/legal/license
 * @link       https://gfnlabs.com/
 */
class GFNNotify_Extend_XenForo_DataWriter_User extends XFCP_GFNNotify_Extend_XenForo_DataWriter_User
{
    protected function _getFields()
    {
        $return = parent::_getFields();
        $return['xf_user_option']['show_notification_popup'] = array('type' => self::TYPE_BOOLEAN, 'default' => 1);
        return $return;
    }

    protected function _preSave()
    {
        parent::_preSave();

        if (XenForo_Application::isRegistered('show_notification_popup'))
        {
            $this->set('show_notification_popup', XenForo_Application::get('show_notification_popup'), 'xf_user_option');
        }
    }
} 