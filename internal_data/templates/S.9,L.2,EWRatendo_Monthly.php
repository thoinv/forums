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
		<input type="submit" value="' . 'Tới' . '" name="submit" class="button primary" />
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

		&nbsp; &nbsp;
		<a href="' . XenForo_Template_Helper_Core::link('events/monthly', false, array()) . '" class="button primary">' . 'Hôm nay' . '</a>

		&nbsp; &nbsp;
		<a href="' . XenForo_Template_Helper_Core::link('events/monthly', $prev, array()) . '" class="button primary">&lt;</a>
		<a href="' . XenForo_Template_Helper_Core::link('events/monthly', $next, array()) . '" class="button primary">&gt;</a>
	</form>
</div>

<div class="sectionMain">
	<table width="100%" class="monthBlock">
		<tr>
			<td class="subHeading weekday">' . 'Thứ hai' . '</td>
			<td class="subHeading weekday">' . 'Thứ ba' . '</td>
			<td class="subHeading weekday">' . 'Thứ tư' . '</td>
			<td class="subHeading weekday">' . 'Thứ năm' . '</td>
			<td class="subHeading weekday">' . 'Thứ sáu' . '</td>
			<td class="subHeading weekday">' . 'Thứ bảy' . '</td>
			<td class="subHeading weekday">' . 'Chủ nhật' . '</td>
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
$__compilerVar7 = '';
$__compilerVar7 .= '<td class="primaryContent
	' . (($date['weekday'] >= 6) ? ('weekends') : ('')) . '
	' . (($date['week'] === $today['week'] && $date['year'] == $today['year']) ? ('nowWeek') : ('')) . '
	' . (($date['month'] == $today['month'] && $date['day'] == $today['day'] && $date['year'] == $today['year']) ? ('nowToday') : ('')) . '
	' . ((!$date['month']) ? ('offMonth') : ('')) . '">

	<div class="dayBlock">
		<div class="secondaryContent dayNumber">
			';
if ($date['week'])
{
$__compilerVar7 .= '
				<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $date, array()) . '">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
			';
}
else
{
$__compilerVar7 .= '
				' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '
			';
}
$__compilerVar7 .= '
		</div>

		';
if ($date['events'])
{
$__compilerVar7 .= '
			';
if ($date['count'] > 1)
{
$__compilerVar7 .= '
				<span class="overflow">
					<a href="' . XenForo_Template_Helper_Core::link('events/daily', $date, array()) . '" class="OverlayTrigger">
						<i><span class="count">' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '</span> ' . 'Sự kiện' . '</i>
					</a>
				</span>
			';
}
else
{
$__compilerVar7 .= '
				<ul>
					';
foreach ($date['events'] AS $event)
{
$__compilerVar7 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('events', $event, array()) . '">' . htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8') . '</a></li>
					';
}
$__compilerVar7 .= '
				</ul>
			';
}
$__compilerVar7 .= '
		';
}
$__compilerVar7 .= '

		';
if ($date['birthdays'])
{
$__compilerVar7 .= '
			<div class="birthDays">
				<a href="' . XenForo_Template_Helper_Core::link('events/birthdays', $date, array()) . '" class="OverlayTrigger"><i>' . htmlspecialchars($date['birthdays'], ENT_QUOTES, 'UTF-8') . ' ' . 'Birthday(s)' . '</i></a>
			</div>
		';
}
$__compilerVar7 .= '
	</div>
</td>';
$__output .= $__compilerVar7;
unset($__compilerVar7);
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
$__compilerVar8 = '';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '

	<div class="section">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('events/monthly', $mPrev, array()) . '">' . htmlspecialchars($mPrev['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
$__compilerVar9 = '';
$__compilerVar9 .= '<table width="100%" class="monthBlock sideBlock">
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
$__compilerVar9 .= '
			';
if ($date['spacer'])
{
$__compilerVar9 .= '
				</tr><tr>
			';
}
else
{
$__compilerVar9 .= '
				<td class="primaryContent
					' . (($date['weekday'] >= 6) ? ('weekends') : ('')) . '
					' . (($date['week'] === $today['week'] && $date['year'] == $today['year']) ? ('nowWeek') : ('')) . '
					' . (($date['month'] == $today['month'] && $date['day'] == $today['day'] && $date['year'] == $today['year']) ? ('nowToday') : ('')) . '
					' . ((!$date['month']) ? ('offMonth') : ('')) . '">
					';
if ($date['week'] && $date['count'])
{
$__compilerVar9 .= '
						';
if ($portal)
{
$__compilerVar9 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/daily', $date, array()) . '" title="' . 'Sự kiện' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip OverlayTrigger">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar9 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $date, array()) . '" title="' . 'Sự kiện' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
$__compilerVar9 .= '
					';
}
else if ($date['week'])
{
$__compilerVar9 .= '
						' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '
					';
}
else
{
$__compilerVar9 .= '
						<span class="muted">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</span>
					';
}
$__compilerVar9 .= '
				</td>
			';
}
$__compilerVar9 .= '
		';
}
$__compilerVar9 .= '
	</tr>
</table>';
$__extraData['sidebar'] .= $__compilerVar9;
unset($__compilerVar9);
$__extraData['sidebar'] .= '
		</div>
	</div>

	<div class="section">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('events/monthly', $mNext, array()) . '">' . htmlspecialchars($mNext['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
$__compilerVar10 = '';
$__compilerVar10 .= '<table width="100%" class="monthBlock sideBlock">
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
$__compilerVar10 .= '
			';
if ($date['spacer'])
{
$__compilerVar10 .= '
				</tr><tr>
			';
}
else
{
$__compilerVar10 .= '
				<td class="primaryContent
					' . (($date['weekday'] >= 6) ? ('weekends') : ('')) . '
					' . (($date['week'] === $today['week'] && $date['year'] == $today['year']) ? ('nowWeek') : ('')) . '
					' . (($date['month'] == $today['month'] && $date['day'] == $today['day'] && $date['year'] == $today['year']) ? ('nowToday') : ('')) . '
					' . ((!$date['month']) ? ('offMonth') : ('')) . '">
					';
if ($date['week'] && $date['count'])
{
$__compilerVar10 .= '
						';
if ($portal)
{
$__compilerVar10 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/daily', $date, array()) . '" title="' . 'Sự kiện' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip OverlayTrigger">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar10 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $date, array()) . '" title="' . 'Sự kiện' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
$__compilerVar10 .= '
					';
}
else if ($date['week'])
{
$__compilerVar10 .= '
						' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '
					';
}
else
{
$__compilerVar10 .= '
						<span class="muted">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</span>
					';
}
$__compilerVar10 .= '
				</td>
			';
}
$__compilerVar10 .= '
		';
}
$__compilerVar10 .= '
	</tr>
</table>';
$__extraData['sidebar'] .= $__compilerVar10;
unset($__compilerVar10);
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
$__compilerVar11 = '';
$__compilerVar11 .= '<table width="100%" class="monthBlock sideBlock">
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
$__compilerVar11 .= '
			';
if ($date['spacer'])
{
$__compilerVar11 .= '
				</tr><tr>
			';
}
else
{
$__compilerVar11 .= '
				<td class="primaryContent
					' . (($date['weekday'] >= 6) ? ('weekends') : ('')) . '
					' . (($date['week'] === $today['week'] && $date['year'] == $today['year']) ? ('nowWeek') : ('')) . '
					' . (($date['month'] == $today['month'] && $date['day'] == $today['day'] && $date['year'] == $today['year']) ? ('nowToday') : ('')) . '
					' . ((!$date['month']) ? ('offMonth') : ('')) . '">
					';
if ($date['week'] && $date['count'])
{
$__compilerVar11 .= '
						';
if ($portal)
{
$__compilerVar11 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/daily', $date, array()) . '" title="' . 'Sự kiện' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip OverlayTrigger">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar11 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $date, array()) . '" title="' . 'Sự kiện' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
$__compilerVar11 .= '
					';
}
else if ($date['week'])
{
$__compilerVar11 .= '
						' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '
					';
}
else
{
$__compilerVar11 .= '
						<span class="muted">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</span>
					';
}
$__compilerVar11 .= '
				</td>
			';
}
$__compilerVar11 .= '
		';
}
$__compilerVar11 .= '
	</tr>
</table>';
$__extraData['sidebar'] .= $__compilerVar11;
unset($__compilerVar11);
$__extraData['sidebar'] .= '
		</div>
	</div>
';
}
$__extraData['sidebar'] .= '

';
$__output .= $__compilerVar8;
unset($__compilerVar8);
$__output .= '
';
$__compilerVar12 = '';
$__compilerVar12 .= '<div class="atendoCopy copyright muted">
	<a href="http://xenforo.com/community/resources/99/">XenAtendo</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar12;
unset($__compilerVar12);
