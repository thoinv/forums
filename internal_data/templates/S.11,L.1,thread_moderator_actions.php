<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Moderator Actions';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Moderator Actions';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:threads', $thread, array()), 'value' => XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<div class="section">
	';
if ($logs)
{
$__output .= '
		<div class="overlayScroll primaryContent" style="padding: 0; margin: 0">
			<table class="dataTable" style="padding: 0; margin: 0">
			<tr class="dataRow">
				<th>' . 'Moderator' . '</th>
				<th>' . 'Action' . '</th>
				<th>' . 'Date' . '</th>
				<th>&nbsp;</th>
			</tr>
			';
foreach ($logs AS $entry)
{
$__output .= '
				<tr class="dataRow">
					<td>' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($entry,'',false,array())) . '</td>
					<td>' . XenForo_Template_Helper_Core::rawCondition($entry['actionText'], 'object') . '</td>
					<td style="white-space: nowrap">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($entry['log_date'],array(
'time' => htmlspecialchars($entry['log_date'], ENT_QUOTES, 'UTF-8')
))) . '</td>
					<td class="dataOptions"><a href="' . htmlspecialchars($entry['content_url'], ENT_QUOTES, 'UTF-8') . '" class="secondaryContent">' . 'View' . '</a></td>
				</tr>
			';
}
$__output .= '
			</table>
		</div>
		<div class="sectionFooter">
			' . 'Previous moderation action logs may have been removed.' . '
			<a class="button primary OverlayCloser overlayOnly">' . 'Close' . '</a>
		</div>
	';
}
else
{
$__output .= '
		<div class="primaryContent">' . 'No moderator actions have been logged.' . '</div>
	';
}
$__output .= '
</div>';
