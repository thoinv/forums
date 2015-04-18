<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($mCurr['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($mCurr['title'], ENT_QUOTES, 'UTF-8');
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
	<form action="' . XenForo_Template_Helper_Core::link('events/monthly', false, array()) . '" method="post">
		<select name="month" class="textCtrl autoSize">
			';
foreach ($months AS $m)
{
$__output .= '
				<option value="' . htmlspecialchars($m['number'], ENT_QUOTES, 'UTF-8') . '" ';
if ($m['select'])
{
$__output .= 'selected';
}
$__output .= '>' . htmlspecialchars($m['phrase'], ENT_QUOTES, 'UTF-8') . '</option>
			';
}
$__output .= '
		</select>
		<select name="year" class="textCtrl autoSize">
			';
foreach ($years AS $y)
{
$__output .= '
				<option value="' . htmlspecialchars($y['number'], ENT_QUOTES, 'UTF-8') . '" ';
if ($y['select'])
{
$__output .= 'selected';
}
$__output .= '>' . htmlspecialchars($y['number'], ENT_QUOTES, 'UTF-8') . '</option>
			';
}
$__output .= '
		</select>
		<input type="submit" value="' . 'Go' . '" name="submit" class="button primary" />
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

		&nbsp; &nbsp;
		<a href="' . XenForo_Template_Helper_Core::link('events/monthly', false, array()) . '" class="button primary">' . 'Today' . '</a>

		&nbsp; &nbsp;
		<a href="' . XenForo_Template_Helper_Core::link('events/monthly', $prev, array()) . '" class="button primary">&lt;</a>
		<a href="' . XenForo_Template_Helper_Core::link('events/monthly', $next, array()) . '" class="button primary">&gt;</a>
	</form>
</div>

<div class="sectionMain">
	<table width="100%" class="monthBlock">
		<tr>
			<td class="subHeading weekday">' . 'Monday' . '</td>
			<td class="subHeading weekday">' . 'Tuesday' . '</td>
			<td class="subHeading weekday">' . 'Wednesday' . '</td>
			<td class="subHeading weekday">' . 'Thursday' . '</td>
			<td class="subHeading weekday">' . 'Friday' . '</td>
			<td class="subHeading weekday">' . 'Saturday' . '</td>
			<td class="subHeading weekday">' . 'Sunday' . '</td>
		</tr>
		<tr>
			';
foreach ($mCurr['dates'] AS $date)
{
$__output .= '
				';
if ($date['spacer'])
{
$__output .= '
					</tr><tr>
				';
}
else
{
$__output .= '
					';
$__compilerVar1 = '';
$__compilerVar1 .= '<td class="primaryContent
	' . (($date['weekday'] >= 6) ? ('weekends') : ('')) . '
	' . (($date['week'] === $today['week'] && $date['year'] == $today['year']) ? ('nowWeek') : ('')) . '
	' . (($date['month'] == $today['month'] && $date['day'] == $today['day'] && $date['year'] == $today['year']) ? ('nowToday') : ('')) . '
	' . ((!$date['month']) ? ('offMonth') : ('')) . '">

	<div class="dayBlock">
		<div class="secondaryContent dayNumber">
			';
if ($date['week'])
{
$__compilerVar1 .= '
				<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $date, array()) . '">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
			';
}
else
{
$__compilerVar1 .= '
				' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '
			';
}
$__compilerVar1 .= '
		</div>

		';
if ($date['events'])
{
$__compilerVar1 .= '
			';
if ($date['count'] > 1)
{
$__compilerVar1 .= '
				<span class="overflow">
					<a href="' . XenForo_Template_Helper_Core::link('events/daily', $date, array()) . '" class="OverlayTrigger">
						<i><span class="count">' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '</span> ' . 'Events' . '</i>
					</a>
				</span>
			';
}
else
{
$__compilerVar1 .= '
				<ul>
					';
foreach ($date['events'] AS $event)
{
$__compilerVar1 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('events', $event, array()) . '">' . htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8') . '</a></li>
					';
}
$__compilerVar1 .= '
				</ul>
			';
}
$__compilerVar1 .= '
		';
}
$__compilerVar1 .= '

		';
if ($date['birthdays'])
{
$__compilerVar1 .= '
			<div class="birthDays">
				<a href="' . XenForo_Template_Helper_Core::link('events/birthdays', $date, array()) . '" class="OverlayTrigger"><i>' . htmlspecialchars($date['birthdays'], ENT_QUOTES, 'UTF-8') . ' ' . 'Birthday(s)' . '</i></a>
			</div>
		';
}
$__compilerVar1 .= '
	</div>
</td>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
				';
}
$__output .= '
			';
}
$__output .= '
		</tr>
	</table>
</div>

';
$__compilerVar2 = '';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '

	<div class="section">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('events/monthly', $mPrev, array()) . '">' . htmlspecialchars($mPrev['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
$__compilerVar3 = '';
$__compilerVar3 .= '<table width="100%" class="monthBlock sideBlock">
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
$__compilerVar3 .= '
			';
if ($date['spacer'])
{
$__compilerVar3 .= '
				</tr><tr>
			';
}
else
{
$__compilerVar3 .= '
				<td class="primaryContent
					' . (($date['weekday'] >= 6) ? ('weekends') : ('')) . '
					' . (($date['week'] === $today['week'] && $date['year'] == $today['year']) ? ('nowWeek') : ('')) . '
					' . (($date['month'] == $today['month'] && $date['day'] == $today['day'] && $date['year'] == $today['year']) ? ('nowToday') : ('')) . '
					' . ((!$date['month']) ? ('offMonth') : ('')) . '">
					';
if ($date['week'] && $date['count'])
{
$__compilerVar3 .= '
						';
if ($portal)
{
$__compilerVar3 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/daily', $date, array()) . '" title="' . 'Events' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip OverlayTrigger">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar3 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $date, array()) . '" title="' . 'Events' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
$__compilerVar3 .= '
					';
}
else if ($date['week'])
{
$__compilerVar3 .= '
						' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '
					';
}
else
{
$__compilerVar3 .= '
						<span class="muted">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</span>
					';
}
$__compilerVar3 .= '
				</td>
			';
}
$__compilerVar3 .= '
		';
}
$__compilerVar3 .= '
	</tr>
</table>';
$__extraData['sidebar'] .= $__compilerVar3;
unset($__compilerVar3);
$__extraData['sidebar'] .= '
		</div>
	</div>

	<div class="section">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('events/monthly', $mNext, array()) . '">' . htmlspecialchars($mNext['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

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
foreach ($mNext['dates'] AS $date)
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

';
if ($mLate)
{
$__extraData['sidebar'] .= '
	<div class="section">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('events/monthly', $mLate, array()) . '">' . htmlspecialchars($mLate['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

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
foreach ($mLate['dates'] AS $date)
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
}
$__extraData['sidebar'] .= '

';
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
';
$__compilerVar6 = '';
$__compilerVar6 .= '<div class="atendoCopy copyright muted">
	<a href="http://xenforo.com/community/resources/99/">XenAtendo</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar6;
unset($__compilerVar6);
