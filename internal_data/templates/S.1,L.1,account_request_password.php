<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Request Password';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('account/request-password', false, array()) . '" method="post" class="xenForm formOverlay AutoValidator">

	<p>' . 'Your account does not currently have a password. Are you sure you wish to generate a new password? It will be emailed to ' . htmlspecialchars($visitor['email'], ENT_QUOTES, 'UTF-8') . '.' . '</p>
	
	<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Request Password' . '" class="button primary" />
			</dd>
		</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
