<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__output .= '

<li class="primaryContent memberListItem">
	<div class="avatar Av1s">
		<span class="img s" style="background-image: url(\'' . XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $event,
'1' => 's'
)) . '\');"></span>
	</div>

	<div class="extra"><i>' . htmlspecialchars($event['event_venue'], ENT_QUOTES, 'UTF-8') . '</i></div>

	<div class="member">
		<h3 class="username"><a href="' . XenForo_Template_Helper_Core::link('events', $event, array()) . '"><b>' . htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8') . '</b></a></h3>

		<div class="userInfo dimmed">
			';
if ($event['event_address'])
{
$__output .= '
				<i>' . htmlspecialchars($event['event_address'], ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars($event['event_citystate'], ENT_QUOTES, 'UTF-8') . '</i><br />
			';
}
else
{
$__output .= '
				<i>' . htmlspecialchars($event['event_venue'], ENT_QUOTES, 'UTF-8') . '</i><br />
			';
}
$__output .= '
			<b>' . htmlspecialchars($event['formatted_strtime'], ENT_QUOTES, 'UTF-8') . '</b> ' . 'to' . ' <b>' . htmlspecialchars($event['formatted_endtime'], ENT_QUOTES, 'UTF-8') . '</b> (' . htmlspecialchars($event['formatted_timezone'], ENT_QUOTES, 'UTF-8') . ')
		</div>		
	</div>
</li>';
