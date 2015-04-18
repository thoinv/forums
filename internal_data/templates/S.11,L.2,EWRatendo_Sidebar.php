<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
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
							<a href="' . XenForo_Template_Helper_Core::link('events/daily', $date, array()) . '" title="' . 'Sự kiện' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip OverlayTrigger">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar4 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $date, array()) . '" title="' . 'Sự kiện' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
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
							<a href="' . XenForo_Template_Helper_Core::link('events/daily', $date, array()) . '" title="' . 'Sự kiện' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip OverlayTrigger">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar5 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $date, array()) . '" title="' . 'Sự kiện' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
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
							<a href="' . XenForo_Template_Helper_Core::link('events/daily', $date, array()) . '" title="' . 'Sự kiện' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip OverlayTrigger">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar6 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $date, array()) . '" title="' . 'Sự kiện' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
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
