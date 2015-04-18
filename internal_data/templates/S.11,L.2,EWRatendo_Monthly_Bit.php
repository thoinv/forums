<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<td class="primaryContent
	' . (($date['weekday'] >= 6) ? ('weekends') : ('')) . '
	' . (($date['week'] === $today['week'] && $date['year'] == $today['year']) ? ('nowWeek') : ('')) . '
	' . (($date['month'] == $today['month'] && $date['day'] == $today['day'] && $date['year'] == $today['year']) ? ('nowToday') : ('')) . '
	' . ((!$date['month']) ? ('offMonth') : ('')) . '">

	<div class="dayBlock">
		<div class="secondaryContent dayNumber">
			';
if ($date['week'])
{
$__output .= '
				<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $date, array()) . '">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
			';
}
else
{
$__output .= '
				' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '
			';
}
$__output .= '
		</div>

		';
if ($date['events'])
{
$__output .= '
			';
if ($date['count'] > 1)
{
$__output .= '
				<span class="overflow">
					<a href="' . XenForo_Template_Helper_Core::link('events/daily', $date, array()) . '" class="OverlayTrigger">
						<i><span class="count">' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '</span> ' . 'Sự kiện' . '</i>
					</a>
				</span>
			';
}
else
{
$__output .= '
				<ul>
					';
foreach ($date['events'] AS $event)
{
$__output .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('events', $event, array()) . '">' . htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8') . '</a></li>
					';
}
$__output .= '
				</ul>
			';
}
$__output .= '
		';
}
$__output .= '

		';
if ($date['birthdays'])
{
$__output .= '
			<div class="birthDays">
				<a href="' . XenForo_Template_Helper_Core::link('events/birthdays', $date, array()) . '" class="OverlayTrigger"><i>' . htmlspecialchars($date['birthdays'], ENT_QUOTES, 'UTF-8') . ' ' . 'Birthday(s)' . '</i></a>
			</div>
		';
}
$__output .= '
	</div>
</td>';
