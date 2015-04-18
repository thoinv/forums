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
		<input type="submit" value="' . 'Tới' . '" name="submit" class="button primary" />
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

		&nbsp; &nbsp; <a href="' . XenForo_Template_Helper_Core::link('events/weekly', false, array()) . '" class="button primary">' . 'Hôm nay' . '</a>

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
$__compilerVar8 = '';
$__compilerVar8 .= '<div class="sectionFooter">' . htmlspecialchars($date['weekday'], ENT_QUOTES, 'UTF-8') . '</div>

<div class="dayBlock
	' . (($date['month'] == $today['month'] && $date['day'] == $today['day'] && $date['year'] == $today['year']) ? ('nowToday') : ('')) . '">
	' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '
</div>

';
if ($date['birthdays'])
{
$__compilerVar8 .= '
	<div class="secondaryContent birthdays">
		';
if ($xenOptions['EWRatendo_birthdays'])
{
$__compilerVar8 .= '
			<div style="float: left; padding-top: 5px;">' . 'Birthday(s)' . ':</div>
			';
foreach ($date['birthdays'] AS $user)
{
$__compilerVar8 .= '
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true',
'class' => 'Tooltip',
'text' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . (($user['age']) ? (' (' . htmlspecialchars($user['age'], ENT_QUOTES, 'UTF-8') . ')') : ('')),
'title' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . (($user['age']) ? (', ' . 'Tuổi' . ': ' . htmlspecialchars($user['age'], ENT_QUOTES, 'UTF-8')) : (''))
),'')) . '
			';
}
$__compilerVar8 .= '
		';
}
else
{
$__compilerVar8 .= '
			' . 'Birthday(s)' . ':
			<a href="' . XenForo_Template_Helper_Core::link('events/birthdays', $date, array()) . '" class="OverlayTrigger"><i>' . htmlspecialchars($date['birthdays'], ENT_QUOTES, 'UTF-8') . ' ' . 'Birthday(s)' . '</i></a>
		';
}
$__compilerVar8 .= '
	</div>
';
}
$__compilerVar8 .= '

<div class="primaryContent weekList">
	';
if ($date['events'])
{
$__compilerVar8 .= '
		<ul>
		';
foreach ($date['events'] AS $event)
{
$__compilerVar8 .= '
			';
$__compilerVar9 = '';
$__compilerVar9 .= '<li>
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
$__compilerVar9 .= htmlspecialchars($event['event_citystate'], ENT_QUOTES, 'UTF-8');
}
else
{
$__compilerVar9 .= htmlspecialchars($event['event_venue'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar9 .= ')
	</div>
</li>';
$__compilerVar8 .= $__compilerVar9;
unset($__compilerVar9);
$__compilerVar8 .= '
		';
}
$__compilerVar8 .= '
		</ul>
	';
}
$__compilerVar8 .= '
</div>';
$__output .= $__compilerVar8;
unset($__compilerVar8);
$__output .= '
		';
}
$__output .= '
	';
}
$__output .= '
</div>

';
$__compilerVar10 = '';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '

	<div class="section">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('events/monthly', $mPrev, array()) . '">' . htmlspecialchars($mPrev['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

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
foreach ($mPrev['dates'] AS $date)
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

	<div class="section">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('events/monthly', $mNext, array()) . '">' . htmlspecialchars($mNext['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
$__compilerVar12 = '';
$__compilerVar12 .= '<table width="100%" class="monthBlock sideBlock">
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
$__compilerVar12 .= '
			';
if ($date['spacer'])
{
$__compilerVar12 .= '
				</tr><tr>
			';
}
else
{
$__compilerVar12 .= '
				<td class="primaryContent
					' . (($date['weekday'] >= 6) ? ('weekends') : ('')) . '
					' . (($date['week'] === $today['week'] && $date['year'] == $today['year']) ? ('nowWeek') : ('')) . '
					' . (($date['month'] == $today['month'] && $date['day'] == $today['day'] && $date['year'] == $today['year']) ? ('nowToday') : ('')) . '
					' . ((!$date['month']) ? ('offMonth') : ('')) . '">
					';
if ($date['week'] && $date['count'])
{
$__compilerVar12 .= '
						';
if ($portal)
{
$__compilerVar12 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/daily', $date, array()) . '" title="' . 'Sự kiện' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip OverlayTrigger">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar12 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $date, array()) . '" title="' . 'Sự kiện' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
$__compilerVar12 .= '
					';
}
else if ($date['week'])
{
$__compilerVar12 .= '
						' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '
					';
}
else
{
$__compilerVar12 .= '
						<span class="muted">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</span>
					';
}
$__compilerVar12 .= '
				</td>
			';
}
$__compilerVar12 .= '
		';
}
$__compilerVar12 .= '
	</tr>
</table>';
$__extraData['sidebar'] .= $__compilerVar12;
unset($__compilerVar12);
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
$__compilerVar13 = '';
$__compilerVar13 .= '<table width="100%" class="monthBlock sideBlock">
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
$__compilerVar13 .= '
			';
if ($date['spacer'])
{
$__compilerVar13 .= '
				</tr><tr>
			';
}
else
{
$__compilerVar13 .= '
				<td class="primaryContent
					' . (($date['weekday'] >= 6) ? ('weekends') : ('')) . '
					' . (($date['week'] === $today['week'] && $date['year'] == $today['year']) ? ('nowWeek') : ('')) . '
					' . (($date['month'] == $today['month'] && $date['day'] == $today['day'] && $date['year'] == $today['year']) ? ('nowToday') : ('')) . '
					' . ((!$date['month']) ? ('offMonth') : ('')) . '">
					';
if ($date['week'] && $date['count'])
{
$__compilerVar13 .= '
						';
if ($portal)
{
$__compilerVar13 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/daily', $date, array()) . '" title="' . 'Sự kiện' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip OverlayTrigger">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar13 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $date, array()) . '" title="' . 'Sự kiện' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
$__compilerVar13 .= '
					';
}
else if ($date['week'])
{
$__compilerVar13 .= '
						' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '
					';
}
else
{
$__compilerVar13 .= '
						<span class="muted">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</span>
					';
}
$__compilerVar13 .= '
				</td>
			';
}
$__compilerVar13 .= '
		';
}
$__compilerVar13 .= '
	</tr>
</table>';
$__extraData['sidebar'] .= $__compilerVar13;
unset($__compilerVar13);
$__extraData['sidebar'] .= '
		</div>
	</div>
';
}
$__extraData['sidebar'] .= '

';
$__output .= $__compilerVar10;
unset($__compilerVar10);
$__output .= '
';
$__compilerVar14 = '';
$__compilerVar14 .= '<div class="atendoCopy copyright muted">
	<a href="http://xenforo.com/community/resources/99/">XenAtendo</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar14;
unset($__compilerVar14);
