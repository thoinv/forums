<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '

	<div class="section">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('events/monthly', $mPrev, array()) . '">' . htmlspecialchars($mPrev['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
$__compilerVar1 = '';
$__compilerVar1 .= '<table width="100%" class="monthBlock sideBlock">
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
$__compilerVar1 .= '
			';
if ($date['spacer'])
{
$__compilerVar1 .= '
				</tr><tr>
			';
}
else
{
$__compilerVar1 .= '
				<td class="primaryContent
					' . (($date['weekday'] >= 6) ? ('weekends') : ('')) . '
					' . (($date['week'] === $today['week'] && $date['year'] == $today['year']) ? ('nowWeek') : ('')) . '
					' . (($date['month'] == $today['month'] && $date['day'] == $today['day'] && $date['year'] == $today['year']) ? ('nowToday') : ('')) . '
					' . ((!$date['month']) ? ('offMonth') : ('')) . '">
					';
if ($date['week'] && $date['count'])
{
$__compilerVar1 .= '
						';
if ($portal)
{
$__compilerVar1 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/daily', $date, array()) . '" title="' . 'Events' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip OverlayTrigger">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar1 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $date, array()) . '" title="' . 'Events' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
$__compilerVar1 .= '
					';
}
else if ($date['week'])
{
$__compilerVar1 .= '
						' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '
					';
}
else
{
$__compilerVar1 .= '
						<span class="muted">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</span>
					';
}
$__compilerVar1 .= '
				</td>
			';
}
$__compilerVar1 .= '
		';
}
$__compilerVar1 .= '
	</tr>
</table>';
$__extraData['sidebar'] .= $__compilerVar1;
unset($__compilerVar1);
$__extraData['sidebar'] .= '
		</div>
	</div>

	<div class="section">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('events/monthly', $mNext, array()) . '">' . htmlspecialchars($mNext['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
$__compilerVar2 = '';
$__compilerVar2 .= '<table width="100%" class="monthBlock sideBlock">
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
$__compilerVar2 .= '
			';
if ($date['spacer'])
{
$__compilerVar2 .= '
				</tr><tr>
			';
}
else
{
$__compilerVar2 .= '
				<td class="primaryContent
					' . (($date['weekday'] >= 6) ? ('weekends') : ('')) . '
					' . (($date['week'] === $today['week'] && $date['year'] == $today['year']) ? ('nowWeek') : ('')) . '
					' . (($date['month'] == $today['month'] && $date['day'] == $today['day'] && $date['year'] == $today['year']) ? ('nowToday') : ('')) . '
					' . ((!$date['month']) ? ('offMonth') : ('')) . '">
					';
if ($date['week'] && $date['count'])
{
$__compilerVar2 .= '
						';
if ($portal)
{
$__compilerVar2 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/daily', $date, array()) . '" title="' . 'Events' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip OverlayTrigger">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar2 .= '
							<a href="' . XenForo_Template_Helper_Core::link('events/weekly', $date, array()) . '" title="' . 'Events' . ': ' . htmlspecialchars($date['count'], ENT_QUOTES, 'UTF-8') . '" class="hasEvent Tooltip">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
$__compilerVar2 .= '
					';
}
else if ($date['week'])
{
$__compilerVar2 .= '
						' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '
					';
}
else
{
$__compilerVar2 .= '
						<span class="muted">' . htmlspecialchars($date['day'], ENT_QUOTES, 'UTF-8') . '</span>
					';
}
$__compilerVar2 .= '
				</td>
			';
}
$__compilerVar2 .= '
		';
}
$__compilerVar2 .= '
	</tr>
</table>';
$__extraData['sidebar'] .= $__compilerVar2;
unset($__compilerVar2);
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
foreach ($mLate['dates'] AS $date)
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
';
}
$__extraData['sidebar'] .= '

';
