<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Sure you want to reset the "Most Online User" Counter?';
$__output .= '
<form method="post" class="xenForm formOverlay"
action="' . XenForo_Template_Helper_Core::link('misc/reset-most-online', false, array()) . '">
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Reset' . '" accesskey="s" class="button primary" /></dd>
	</dl>
	<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
