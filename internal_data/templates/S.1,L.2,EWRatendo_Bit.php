<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li>
	<div class="secondaryContent">
		<div class="eventInfo">
			';
if (!$option['hideVenue'])
{
$__output .= '<div class="eventDate"><i>' . htmlspecialchars($event['event_venue'], ENT_QUOTES, 'UTF-8') . '</i></div>';
}
$__output .= '

			<div class="eventName"><a href="' . XenForo_Template_Helper_Core::link('events', $event, array()) . '"><b>' . htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8') . '</b></a></div>

			<div class="eventText">
				';
if ($event['event_address'])
{
$__output .= '
					<i>' . htmlspecialchars($event['event_address'], ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars($event['event_citystate'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($event['event_zipcode'], ENT_QUOTES, 'UTF-8') . '</i><br />
				';
}
else
{
$__output .= '
					<i>' . htmlspecialchars($event['event_venue'], ENT_QUOTES, 'UTF-8') . '</i><br />
				';
}
$__output .= '
				<div class="eventTime">
					' . htmlspecialchars($event['formatted_strtime'], ENT_QUOTES, 'UTF-8') . '
					<span class="muted">(' . htmlspecialchars($event['formatted_timezone'], ENT_QUOTES, 'UTF-8') . ')</span>
				</div>
			</div>
		</div>
	</div>
</li>';
