<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Resend Account Confirmation';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('account-confirmation/resend', false, array()) . '" method="post" class="xenForm formOverlay AutoValidator">

	<p>' . 'Are you sure you want to resend the account confirmation email? Any previous account confirmation emails will no longer function. This email will be sent to ' . htmlspecialchars($visitor['email'], ENT_QUOTES, 'UTF-8') . '.' . '</p>
	
	<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Resend Email' . '" class="button primary" />
			</dd>
		</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
