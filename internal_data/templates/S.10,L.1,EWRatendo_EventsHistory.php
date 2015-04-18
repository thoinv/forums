<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Events Archive';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Events Archive';
$__output .= '

';
if ($canPost)
{
$__output .= '
	';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= '<a href="' . XenForo_Template_Helper_Core::link('events/create', false, array()) . '" class="callToAction"><span>' . 'Post New Event' . '</span></a>';
$__output .= '
';
}
$__output .= '

';
$this->addRequiredExternal('css', 'EWRatendo');
$__output .= '

' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($stop, ENT_QUOTES, 'UTF-8'), htmlspecialchars($count, ENT_QUOTES, 'UTF-8'), htmlspecialchars($start, ENT_QUOTES, 'UTF-8'), 'events/history', false, array(), false, array())) . '

<div class="sectionMain eventList">
	<div class="primaryContent">' . 'Events Archive' . '...</div>
	<ul>
		';
foreach ($events AS $event)
{
$__output .= '
			';
$__compilerVar1 = '';
$__compilerVar1 .= '<li>
	<div class="secondaryContent">
		<div class="eventInfo">
			';
if (!$option['hideVenue'])
{
$__compilerVar1 .= '<div class="eventDate"><i>' . htmlspecialchars($event['event_venue'], ENT_QUOTES, 'UTF-8') . '</i></div>';
}
$__compilerVar1 .= '

			<div class="eventName"><a href="' . XenForo_Template_Helper_Core::link('events', $event, array()) . '"><b>' . htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8') . '</b></a></div>

			<div class="eventText">
				';
if ($event['event_address'])
{
$__compilerVar1 .= '
					<i>' . htmlspecialchars($event['event_address'], ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars($event['event_citystate'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($event['event_zipcode'], ENT_QUOTES, 'UTF-8') . '</i><br />
				';
}
else
{
$__compilerVar1 .= '
					<i>' . htmlspecialchars($event['event_venue'], ENT_QUOTES, 'UTF-8') . '</i><br />
				';
}
$__compilerVar1 .= '
				<div class="eventTime">
					' . htmlspecialchars($event['formatted_strtime'], ENT_QUOTES, 'UTF-8') . '
					<span class="muted">(' . htmlspecialchars($event['formatted_timezone'], ENT_QUOTES, 'UTF-8') . ')</span>
				</div>
			</div>
		</div>
	</div>
</li>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
		';
}
$__output .= '
	</ul>
</div>

';
$__compilerVar2 = '';
$__compilerVar2 .= '<div class="atendoCopy copyright muted">
	<a href="http://xenforo.com/community/resources/99/">XenAtendo</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
