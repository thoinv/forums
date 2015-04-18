<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="sectionFooter">' . htmlspecialchars($date['weekday'], ENT_QUOTES, 'UTF-8') . '</div>

<div class="dayBlock
	' . (($date['month'] == $today['month'] && $date['day'] == $today['day'] && $date['year'] == $today['year']) ? ('nowToday') : ('')) . '">
	' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '
</div>

';
if ($date['birthdays'])
{
$__output .= '
	<div class="secondaryContent birthdays">
		';
if ($xenOptions['EWRatendo_birthdays'])
{
$__output .= '
			<div style="float: left; padding-top: 5px;">' . 'Birthday(s)' . ':</div>
			';
foreach ($date['birthdays'] AS $user)
{
$__output .= '
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true',
'class' => 'Tooltip',
'text' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . (($user['age']) ? (' (' . htmlspecialchars($user['age'], ENT_QUOTES, 'UTF-8') . ')') : ('')),
'title' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . (($user['age']) ? (', ' . 'Age' . ': ' . htmlspecialchars($user['age'], ENT_QUOTES, 'UTF-8')) : (''))
),'')) . '
			';
}
$__output .= '
		';
}
else
{
$__output .= '
			' . 'Birthday(s)' . ':
			<a href="' . XenForo_Template_Helper_Core::link('events/birthdays', $date, array()) . '" class="OverlayTrigger"><i>' . htmlspecialchars($date['birthdays'], ENT_QUOTES, 'UTF-8') . ' ' . 'Birthday(s)' . '</i></a>
		';
}
$__output .= '
	</div>
';
}
$__output .= '

<div class="primaryContent weekList">
	';
if ($date['events'])
{
$__output .= '
		<ul>
		';
foreach ($date['events'] AS $event)
{
$__output .= '
			';
$__compilerVar1 = '';
$__compilerVar1 .= '<li>
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
$__compilerVar1 .= htmlspecialchars($event['event_citystate'], ENT_QUOTES, 'UTF-8');
}
else
{
$__compilerVar1 .= htmlspecialchars($event['event_venue'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar1 .= ')
	</div>
</li>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
		';
}
$__output .= '
		</ul>
	';
}
$__output .= '
</div>';
