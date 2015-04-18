<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($wCurr['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($wCurr['title'], ENT_QUOTES, 'UTF-8');
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

<div class="blockCtrl">
	<form action="' . XenForo_Template_Helper_Core::link('events/weekly', false, array()) . '" method="post">
		<select name="week" class="textCtrl autoSize">
			';
foreach ($weeks AS $w)
{
$__output .= '
				<option value="' . htmlspecialchars($w['number'], ENT_QUOTES, 'UTF-8') . '" ' . (($w['select']) ? ('selected') : ('')) . '>' . htmlspecialchars($w['phrase'], ENT_QUOTES, 'UTF-8') . '</option>
			';
}
$__output .= '
		</select>
		<select name="year" class="textCtrl autoSize">
			';
foreach ($years AS $y)
{
$__output .= '
				<option value="' . htmlspecialchars($y['number'], ENT_QUOTES, 'UTF-8') . '" ' . (($y['select']) ? ('selected') : ('')) . '>' . htmlspecialchars($y['number'], ENT_QUOTES, 'UTF-8') . '</option>
			';
}
$__output .= '
		</select>
		<input type="submit" value="' . 'Go' . '" name="submit" class="button primary" />
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

		&nbsp; &nbsp; <a href="' . XenForo_Template_Helper_Core::link('events/weekly', false, array()) . '" class="button primary">' . 'Today' . '</a>

		&nbsp; &nbsp;
		<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $prev, array()) . '" class="button primary">&lt;</a>
		<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $next, array()) . '" class="button primary">&gt;</a>
	</form>
</div>

<div class="sectionMain weekBlock">
	<div class="subHeading">' . htmlspecialchars($wCurr['title'], ENT_QUOTES, 'UTF-8') . '</div>

	';
foreach ($wCurr['dates'] AS $date)
{
$__output .= '
		';
if ($date['spacer'])
{
$__output .= '
			<div class="subHeading">' . htmlspecialchars($date['spacer'], ENT_QUOTES, 'UTF-8') . '</div>
		';
}
else
{
$__output .= '
			';
$__compilerVar1 = '';
$__compilerVar1 .= '<div class="sectionFooter">' . htmlspecialchars($date['weekday'], ENT_QUOTES, 'UTF-8') . '</div>

<div class="dayBlock
	' . (($date['month'] == $today['month'] && $date['day'] == $today['day'] && $date['year'] == $today['year']) ? ('nowToday') : ('')) . '">
	' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '
</div>

';
if ($date['birthdays'])
{
$__compilerVar1 .= '
	<div class="secondaryContent birthdays">
		';
if ($xenOptions['EWRatendo_birthdays'])
{
$__compilerVar1 .= '
			<div style="float: left; padding-top: 5px;">' . 'Birthday(s)' . ':</div>
			';
foreach ($date['birthdays'] AS $user)
{
$__compilerVar1 .= '
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
$__compilerVar1 .= '
		';
}
else
{
$__compilerVar1 .= '
			' . 'Birthday(s)' . ':
			<a href="' . XenForo_Template_Helper_Core::link('events/birthdays', $date, array()) . '" class="OverlayTrigger"><i>' . htmlspecialchars($date['birthdays'], ENT_QUOTES, 'UTF-8') . ' ' . 'Birthday(s)' . '</i></a>
		';
}
$__compilerVar1 .= '
	</div>
';
}
$__compilerVar1 .= '

<div class="primaryContent weekList">
	';
if ($date['events'])
{
$__compilerVar1 .= '
		<ul>
		';
foreach ($date['events'] AS $event)
{
$__compilerVar1 .= '
			';
$__compilerVar2 = '';
$__compilerVar2 .= '<li>
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
$__compilerVar2 .= htmlspecialchars($event['event_citystate'], ENT_QUOTES, 'UTF-8');
}
else
{
$__compilerVar2 .= htmlspecialchars($event['event_venue'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar2 .= ')
	</div>
</li>';
$__compilerVar1 .= $__compilerVar2;
unset($__compilerVar2);
$__compilerVar1 .= '
		';
}
$__compilerVar1 .= '
		</ul>
	';
}
$__compilerVar1 .= '
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
		';
}
$__output .= '
	';
}
$__output .= '
</div>

';
$__compilerVar3 = '';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '

	<div class="section">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('events/monthly', $mPrev, array()) . '">' . htmlspecialchars($mPrev['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
$__compilerVar4 = '';
$__compilerVar4 .= '<table width="100%" class="monthBlock sideBlock">
	<tr>
		<td class="subHeading">M</td>
		<td class="subHeading">T</td>
		<td class="subHeading">W</td>
		<td class="subHeading">T</td>
		<td class="subHeading">F</td>
		<td class="subHeading">S</td>
		<td class="subHeading">S</td>
	</tr>
	<tr>
		';
foreach ($mPrev['dates'] AS $date)
{
$__compilerVar4 .= '
			';
if ($date['spacer'])
{
$__compilerVar4 .= '
				</tr><tr>
			';
}
else
{
$__compilerVar4 .= '
				<td class="primaryContent
					' . (($date['weekday'] >= 6) ? ('weekends') : ('')) . '
					' . (($date['week'] === $today['week'] && $date['year'] == $today['year']) ? ('nowWeek') : ('')) . '
					' . (($date['month'] == $today['month'] && $date['day'] == $today['day'] && $date['year'] == $today['year']) ? ('nowToday') : ('')) . '
					' . ((!$date['month']) ? ('offMonth') : ('')) . '">
					';
if ($date['week'] && $date['count'])
{
$__compilerVar4 .= '
						';
if ($portal)
{
$__compilerVar4 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/daily', $date, array()) . '" title="' . 'Events' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip OverlayTrigger">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar4 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $date, array()) . '" title="' . 'Events' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
$__compilerVar4 .= '
					';
}
else if ($date['week'])
{
$__compilerVar4 .= '
						' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '
					';
}
else
{
$__compilerVar4 .= '
						<span class="muted">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</span>
					';
}
$__compilerVar4 .= '
				</td>
			';
}
$__compilerVar4 .= '
		';
}
$__compilerVar4 .= '
	</tr>
</table>';
$__extraData['sidebar'] .= $__compilerVar4;
unset($__compilerVar4);
$__extraData['sidebar'] .= '
		</div>
	</div>

	<div class="section">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('events/monthly', $mNext, array()) . '">' . htmlspecialchars($mNext['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
$__compilerVar5 = '';
$__compilerVar5 .= '<table width="100%" class="monthBlock sideBlock">
	<tr>
		<td class="subHeading">M</td>
		<td class="subHeading">T</td>
		<td class="subHeading">W</td>
		<td class="subHeading">T</td>
		<td class="subHeading">F</td>
		<td class="subHeading">S</td>
		<td class="subHeading">S</td>
	</tr>
	<tr>
		';
foreach ($mNext['dates'] AS $date)
{
$__compilerVar5 .= '
			';
if ($date['spacer'])
{
$__compilerVar5 .= '
				</tr><tr>
			';
}
else
{
$__compilerVar5 .= '
				<td class="primaryContent
					' . (($date['weekday'] >= 6) ? ('weekends') : ('')) . '
					' . (($date['week'] === $today['week'] && $date['year'] == $today['year']) ? ('nowWeek') : ('')) . '
					' . (($date['month'] == $today['month'] && $date['day'] == $today['day'] && $date['year'] == $today['year']) ? ('nowToday') : ('')) . '
					' . ((!$date['month']) ? ('offMonth') : ('')) . '">
					';
if ($date['week'] && $date['count'])
{
$__compilerVar5 .= '
						';
if ($portal)
{
$__compilerVar5 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/daily', $date, array()) . '" title="' . 'Events' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip OverlayTrigger">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar5 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $date, array()) . '" title="' . 'Events' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
$__compilerVar5 .= '
					';
}
else if ($date['week'])
{
$__compilerVar5 .= '
						' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '
					';
}
else
{
$__compilerVar5 .= '
						<span class="muted">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</span>
					';
}
$__compilerVar5 .= '
				</td>
			';
}
$__compilerVar5 .= '
		';
}
$__compilerVar5 .= '
	</tr>
</table>';
$__extraData['sidebar'] .= $__compilerVar5;
unset($__compilerVar5);
$__extraData['sidebar'] .= '
		</div>
	</div>

';
if ($mLate)
{
$__extraData['sidebar'] .= '
	<div class="section">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('events/monthly', $mLate, array()) . '">' . htmlspecialchars($mLate['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
$__compilerVar6 = '';
$__compilerVar6 .= '<table width="100%" class="monthBlock sideBlock">
	<tr>
		<td class="subHeading">M</td>
		<td class="subHeading">T</td>
		<td class="subHeading">W</td>
		<td class="subHeading">T</td>
		<td class="subHeading">F</td>
		<td class="subHeading">S</td>
		<td class="subHeading">S</td>
	</tr>
	<tr>
		';
foreach ($mLate['dates'] AS $date)
{
$__compilerVar6 .= '
			';
if ($date['spacer'])
{
$__compilerVar6 .= '
				</tr><tr>
			';
}
else
{
$__compilerVar6 .= '
				<td class="primaryContent
					' . (($date['weekday'] >= 6) ? ('weekends') : ('')) . '
					' . (($date['week'] === $today['week'] && $date['year'] == $today['year']) ? ('nowWeek') : ('')) . '
					' . (($date['month'] == $today['month'] && $date['day'] == $today['day'] && $date['year'] == $today['year']) ? ('nowToday') : ('')) . '
					' . ((!$date['month']) ? ('offMonth') : ('')) . '">
					';
if ($date['week'] && $date['count'])
{
$__compilerVar6 .= '
						';
if ($portal)
{
$__compilerVar6 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/daily', $date, array()) . '" title="' . 'Events' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip OverlayTrigger">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar6 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $date, array()) . '" title="' . 'Events' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
$__compilerVar6 .= '
					';
}
else if ($date['week'])
{
$__compilerVar6 .= '
						' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '
					';
}
else
{
$__compilerVar6 .= '
						<span class="muted">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</span>
					';
}
$__compilerVar6 .= '
				</td>
			';
}
$__compilerVar6 .= '
		';
}
$__compilerVar6 .= '
	</tr>
</table>';
$__extraData['sidebar'] .= $__compilerVar6;
unset($__compilerVar6);
$__extraData['sidebar'] .= '
		</div>
	</div>
';
}
$__extraData['sidebar'] .= '

';
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '
';
$__compilerVar7 = '';
$__compilerVar7 .= '<div class="atendoCopy copyright muted">
	<a href="http://xenforo.com/community/resources/99/">XenAtendo</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar7;
unset($__compilerVar7);
