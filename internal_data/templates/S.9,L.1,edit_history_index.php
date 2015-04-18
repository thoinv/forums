<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($title, ENT_QUOTES, 'UTF-8', (false)) . ' - ' . 'Edit History';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Edit History';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$this->addRequiredExternal('css', 'edit_history');
$__output .= '

<form method="post" action="' . XenForo_Template_Helper_Core::link('edit-history', false, array()) . '" class="section">
	<table class="dataTable diffVersions">
	<tr class="dataRow">
		<th class="old">' . 'Old' . '</th>
		<th class="new">' . 'New' . '</th>
		<th class="date">' . 'Edit Date' . '</th>
		<th class="member">' . 'Member' . '</th>
		<th class="viewVersion">&nbsp;</th>
	</tr>
	<tr class="dataRow">
		<td class="old">&nbsp;</td>
		<td class="new"><input type="radio" name="new" value="0" ' . (($newId == 0) ? ' checked="checked"' : '') . ' /></td>
		<td class="date dateCurrent">' . 'Current Version' . '</td>
		<td class="member">&nbsp;</td>
		<td class="dataOptions viewVersion">&nbsp;</td>
	</tr>
	';
foreach ($list AS $history)
{
$__output .= '
		<tr class="dataRow">
			<td class="old"><input type="radio" name="old" value="' . htmlspecialchars($history['edit_history_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($oldId == $history['edit_history_id']) ? ' checked="checked"' : '') . ' /></td>
			<td class="new"><input type="radio" name="new" value="' . htmlspecialchars($history['edit_history_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($newId == $history['edit_history_id']) ? ' checked="checked"' : '') . ' /></td>
			<td class="date">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($history['edit_date'],array(
'time' => htmlspecialchars($history['edit_date'], ENT_QUOTES, 'UTF-8')
))) . '</td>
			<td class="member">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($history,'',false,array())) . '</td>
			<td class="dataOptions viewVersion"><a href="' . XenForo_Template_Helper_Core::link('edit-history/view', $history, array()) . '" class="secondaryContent OverlayTrigger">' . 'View pre-edit version' . '</a></td>
		</tr>
	';
}
$__output .= '
	';
if ($content['edit_count'] AND $content['edit_count'] > count($list))
{
$__output .= '
		<tr><td class="secondaryContent" colspan="5">' . 'This content has been edited a total of ' . XenForo_Template_Helper_Core::numberFormat($content['edit_count'], '0') . ' times. Some older edit history records have been removed.' . '</td></tr>
	';
}
$__output .= '
	</table>
	<div class="sectionFooter"><input type="submit" value="' . 'Compare Versions' . '" class="button primary OverlayTrigger" /></div>
	
	<input type="hidden" name="content_type" value="' . htmlspecialchars($contentType, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="content_id" value="' . htmlspecialchars($contentId, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
