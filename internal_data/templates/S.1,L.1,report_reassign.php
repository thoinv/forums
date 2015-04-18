<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Reassign Report' . ': ' . htmlspecialchars($report['contentTitle'], ENT_QUOTES, 'UTF-8', (false));
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:reports', false, array()), 'value' => 'Reported Items');
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:reports', $report, array()), 'value' => htmlspecialchars($report['contentTitle'], ENT_QUOTES, 'UTF-8', (false)));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('reports/reassign', $report, array()) . '" method="post" class="xenForm formOverlay">

	<dl class="ctrlUnit">
		<dt>' . 'Member' . ':</dt>
		<dd><select name="user_id" class="textCtrl">
			<option value="0" ' . ((!$report['assigned_user_id']) ? ' selected="selected"' : '') . '>(' . 'None' . ')</option>
			';
foreach ($users AS $user)
{
$__output .= '
				<option value="' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($report['assigned_user_id'] == $user['user_id']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</option>
			';
}
$__output .= '
		</select></dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Save Changes' . '" accesskey="s" class="button primary" />
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
