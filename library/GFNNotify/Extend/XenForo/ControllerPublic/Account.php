<?php /*135ac7c23b35a088401357fd34bcad70af974714*/

/**
 * @package    GoodForNothing Notification
 * @version    1.0.5
 * @since      1.0.4 Beta 1
 * @author     GoodForNothing Labs
 * @copyright  Copyright © 2012-2015 GoodForNothing Labs <https://gfnlabs.com/>
 * @license    https://gfnlabs.com/legal/license
 * @link       https://gfnlabs.com/
 */
class GFNNotify_Extend_XenForo_ControllerPublic_Account extends XFCP_GFNNotify_Extend_XenForo_ControllerPublic_Account
{
    public function actionPreferencesSave()
    {
        XenForo_Application::set('show_notification_popup', $this->_input->filterSingle('show_notification_popup', XenForo_Input::BOOLEAN));
        return parent::actionPreferencesSave();
    }
} 