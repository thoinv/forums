<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Delete recorded information about my mobile';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Are you sure you want to delete your mobile device information?';
$__output .= '

';
$this->addRequiredExternal('css', 'sedo_agent_account_raz');
$__output .= '

';
if ($xenOptions['sedo_at_allowraz'] AND $visitor['user_id'])
{
$__output .= '
<form method="post" class="razConfirmForm formOverlay"
	action="' . XenForo_Template_Helper_Core::link('account/raz_mobileinfo', $visitor, array()) . '">

	<dl class="ctrlUnit">
		<dt><label for="ctrl_razmobileinfo">' . 'Delete all Mobile information for:' . '</label></dt>
		<dd>' . htmlspecialchars($visitor['username'], ENT_QUOTES, 'UTF-8') . '</dd>
	</dl>
	<br />	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Xóa' . '" accesskey="d" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>
';
}
