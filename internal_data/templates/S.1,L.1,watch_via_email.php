<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Update Email Notification Settings';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('watched/via-email', false, array()) . '" method="post" class="xenForm">
	<p>' . htmlspecialchars($confirmPhrase, ENT_QUOTES, 'UTF-8') . '</p>
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Update Settings' . '" class="button primary" /></dd>
	</dl>
	
	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="u" value="' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="c" value="' . htmlspecialchars($confirmKey, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="a" value="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="t" value="' . htmlspecialchars($type, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="id" value="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '" />
</form>';
