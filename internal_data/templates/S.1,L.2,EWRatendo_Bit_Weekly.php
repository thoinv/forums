<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li>
	<div class="avatar Av1s">
		<span class="img s" style="background-image: url(\'' . XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $event,
'1' => 's'
)) . '\');"></span>
	</div>

	<div class="eventInfo">
		<b>' . htmlspecialchars($event['formatted_strtime'], ENT_QUOTES, 'UTF-8') . '</b>:
		<a href="' . XenForo_Template_Helper_Core::link('events', $event, array()) . '"><b>' . htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8') . '</b></a>
		(';
if ($event['event_address'])
{
$__output .= htmlspecialchars($event['event_citystate'], ENT_QUOTES, 'UTF-8');
}
else
{
$__output .= htmlspecialchars($event['event_venue'], ENT_QUOTES, 'UTF-8');
}
$__output .= ')
	</div>
</li>';
