<?php /*6878c0bfad1e2921bef57f07c5370206f82e6369*/

/**
 * @package    GoodForNothing Notification
 * @version    1.0.6 Update 2
 * @since      1.0.1 Beta 1
 * @author     GoodForNothing Labs
 * @copyright  Copyright © 2012-2015 GoodForNothing Labs <http://gfnlabs.com/>
 * @license    https://gfnlabs.com/legal/license
 * @link       https://gfnlabs.com/
 */
class GFNNotify_Model_Notify extends XenForo_Model
{
    public function markAsRead(array $alert)
    {
        $hash = hash('sha1', serialize(array(
            $alert['alert_id'], $alert['alerted_user_id'], $alert['content_type'], $alert['content_id'],
            $alert['action'], $alert['event_date'], $alert['view_date']
        )));

        $stmt = $this->_getDb()->query(
            'INSERT IGNORE INTO gfnnotify_notification
              (notification_hash)
            VALUES
              (?)', $hash
        );

        if ($stmt->rowCount() > 0)
        {
            return true;
        }

        return false;
    }

    public function markAlertRead(array $alert)
    {
        $db = $this->_getDb();

        $stmt = $db->query(
            'UPDATE xf_user_alert
            SET view_date = ?
            WHERE alert_id = ?
            AND view_date = 0', array(XenForo_Application::$time, $alert['alert_id'])
        );

        if ($stmt->rowCount() < 1)
        {
            return false;
        }

        $userId = $alert['alerted_user_id'];

        $db->query(
            'UPDATE xf_user
            SET alerts_unread = alerts_unread - 1
            WHERE user_id = ?
            AND alerts_unread > 0', $userId
        );

        // not sure if the right approach... just going with the 'XenForo' way.
        $visitor = XenForo_Visitor::getInstance();
        if ($userId == $visitor['user_id'] && $visitor['alerts_unread'] > 0)
        {
            $visitor['alerts_unread'] = $visitor['alerts_unread'] - 1;
        }

        return true;
    }
} 