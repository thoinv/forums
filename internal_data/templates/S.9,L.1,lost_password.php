<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Lost Password';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('lost-password/lost', false, array()) . '" method="post" class="xenForm formOverlay">
	<p>' . 'If you have forgotten your password, you can use this form to reset your password. You will receive an email with instructions.' . '</p>
	
	<dl class="ctrlUnit">
		<dt><label for="ctrl_username_email">' . 'Name or Email' . ':</label></dt>
		<dd><input type="text" name="username_email" class="textCtrl" id="ctrl_username_email" autofocus="true" /></dd>
	</dl>

	';
$__compilerVar1 = '';
$__compilerVar1 .= '
				';
$__compilerVar2 = '';
if ($captcha)
{
$__compilerVar2 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Verification' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__compilerVar1 .= $__compilerVar2;
unset($__compilerVar2);
$__compilerVar1 .= '
			';
if (trim($__compilerVar1) !== '')
{
$__output .= '
		<fieldset>
			' . $__compilerVar1 . '
		</fieldset>
	';
}
unset($__compilerVar1);
$__output .= '
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Reset Password' . '" accesskey="s" class="button primary" /></dd>
	</dl>
	
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
