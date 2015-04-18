<?php /*814d23fc62be1c5a6cb335841f192587af388d12*/

/**
 * @package    GoodForNothing Notification
 * @version    1.0.6 Update 2
 * @since      1.0.0 Beta 1
 * @author     GoodForNothing Labs
 * @copyright  Copyright © 2012-2015 GoodForNothing Labs <http://gfnlabs.com/>
 * @license    https://gfnlabs.com/legal/license
 * @link       https://gfnlabs.com/
 */
class GFNNotify_ViewPublic_GetNotification extends XenForo_ViewPublic_Base
{
    public function renderJson()
    {
        $alertHandlers = $this->_params['alertHandlers'];
        $return = array();

        foreach ($this->_params['alerts'] as $item)
        {
            /** @var XenForo_AlertHandler_Abstract $handler */
            $handler = @$alertHandlers[$item['content_type']];

            if (!$handler)
            {
                continue;
            }

            $return[] = $this->createTemplateObject('gfnnotify_item', array(
                'user' => $item['user'],
                'content' => $handler->renderHtml($item, $this),
                'alertId' => $item['alert_id']
            ))->render();
        }

        return array('notifications' => $return);
    }
} 