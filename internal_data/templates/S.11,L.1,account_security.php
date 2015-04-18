<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Password';
$__output .= '

';
$this->addRequiredExternal('css', 'account');
$__output .= '

<form method="post" class="xenForm AutoValidator ContactDetailsForm"
	action="' . XenForo_Template_Helper_Core::link('account/security-save', false, array()) . '"
	data-fieldValidatorUrl="' . XenForo_Template_Helper_Core::link('account/validate-field.json', false, array()) . '"
	data-optInOut="OptIn">
	
	';
if ($hasPassword)
{
$__output .= '
		<dl class="ctrlUnit">
			<dt><label for="ctrl_password_original">' . 'Your Existing Password' . ':</label></dt>
			<dd>
				<input type="password" name="old_password" value="" dir="ltr" class="textCtrl" id="ctrl_password_original" autofocus="autofocus" />
				<p class="explain">' . 'For security reasons, you must verify your existing password before you may set a new password.' . '</p>
			</dd>
		</dl>
	
		<fieldset>
			<dl class="ctrlUnit">
				<dt><label for="ctrl_password">' . 'New Password' . ':</label></dt>
				<dd><input type="password" name="password" value="" dir="ltr" class="textCtrl" id="ctrl_password" /></dd>
			</dl>
	
			<dl class="ctrlUnit">
				<dt><label for="ctrl_password_confirm">' . 'Confirm New Password' . ':</label></dt>
				<dd><input type="password" name="password_confirm" value="" class="textCtrl" dir="ltr" id="ctrl_password_confirm" /></dd>
			</dl>
		</fieldset>
	
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd><input type="submit" name="save" value="' . 'Save Changes' . '" accesskey="s" class="button primary" /></dd>
		</dl>
	';
}
else
{
$__output .= '
		<dl class="ctrlUnit fullWidth">
			<dt></dt>
			<dd>' . 'Your account does not currently have a password.' . ' <a href="' . XenForo_Template_Helper_Core::link('account/request-password', false, array()) . '" class="OverlayTrigger">' . 'Request a password be emailed to you' . '</a></dd>
		</dl>
	';
}
$__output .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
