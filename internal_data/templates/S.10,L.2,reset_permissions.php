<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Reset Permissions';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('misc/reset-permissions', false, array()) . '" method="post" class="xenForm formOverlay">
	<p>' . 'Are you sure you want to return to viewing using your own permission set?' . '</p>
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" class="button primary" value="' . 'Reset Permissions' . '" /></dd>
	</dl>
	
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
