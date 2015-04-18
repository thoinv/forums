<?php /*61cd0bcedb84384ae39f4456aa9107f9d6319910*/

/**
 * @package    GoodForNothing Notification
 * @version    1.0.4 Beta 1
 * @since      1.0.4 Beta 1
 * @author     GoodForNothing Labs
 * @copyright  Copyright © 2012-2015 GoodForNothing Labs <https://gfnlabs.com/>
 * @license    https://gfnlabs.com/legal/license
 * @link       https://gfnlabs.com/
 */
class GFNNotify_Extend_XenForo_Model_User extends XFCP_GFNNotify_Extend_XenForo_Model_User
{
    public function getVisitingGuestUser()
    {
        return parent::getVisitingGuestUser() + array('show_notification_popup' => 0);
    }
} 