<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

';
if ($visitor['show_notification_popup'])
{
$__output .= '
	';
$this->addRequiredExternal('css', 'gfnnotify');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/gfnnotify/notification.js');
$__output .= '
	
	<div id="GFNNotification" data-url="' . XenForo_Template_Helper_Core::link('gfnnotify/get-notifications', false, array()) . '" data-timer="' . XenForo_Template_Helper_Core::styleProperty('notificationOpenTimer') . '" data-interval="' . XenForo_Template_Helper_Core::styleProperty('notificationInterval') . '" data-mark-read="' . XenForo_Template_Helper_Core::link('gfnnotify/mark-read', false, array()) . '"></div>
';
}
