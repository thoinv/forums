<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Warnings' . ': ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Warnings';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:members', $user, array()), 'value' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'));
$__output .= '

';
$this->addRequiredExternal('css', 'member_view');
$__output .= '

<div class="warningList">
<table class="dataTable" style="table-layout: fixed">
<tr class="dataRow">
	<th class="warningName" width="50%">' . 'Warning' . '</th>
	<th class="warningDate">' . 'Date' . '</th>
	<th class="warningPoints">' . 'Points' . '</th>
	<th class="warningExpiry">' . 'Expiry' . '</th>
	<th class="warningView">&nbsp;</th>
</tr>
';
foreach ($warnings AS $warning)
{
$__output .= '
	<tr class="dataRow ' . (($warning['is_expired']) ? ('muted') : ('')) . '">
		<td class="warningName">' . htmlspecialchars($warning['title'], ENT_QUOTES, 'UTF-8') . '</td>
		<td class="warningDate">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($warning['warning_date'],array(
'time' => htmlspecialchars($warning['warning_date'], ENT_QUOTES, 'UTF-8')
))) . '</td>
		<td class="warningPoints">' . XenForo_Template_Helper_Core::numberFormat($warning['points'], '0') . '</td>
		<td class="warningExpiry">';
if ($warning['expiry_date'])
{
$__output .= XenForo_Template_Helper_Core::callHelper('datetimehtml', array($warning['expiry_date'],array(
'time' => htmlspecialchars($warning['expiry_date'], ENT_QUOTES, 'UTF-8')
)));
}
else
{
$__output .= 'N/A';
}
$__output .= '</td>
		<td class="warningView dataOptions"><a href="' . XenForo_Template_Helper_Core::link('warnings', $warning, array()) . '" class="OverlayTrigger secondaryContent">' . 'View' . '</a></td>
	</tr>
';
}
$__output .= '
</table>
</div>';
