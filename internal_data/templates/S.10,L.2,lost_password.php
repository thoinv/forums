<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Quên mật khẩu';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('lost-password/lost', false, array()) . '" method="post" class="xenForm formOverlay">
	<p>' . 'Nếu bạn đã quên mật khẩu của mình, bạn có thể sử dụng mẫu này để thiết lập lại mật khẩu của bạn. Bạn sẽ nhận được một email hướng dẫn.' . '</p>
	
	<dl class="ctrlUnit">
		<dt><label for="ctrl_username_email">' . 'Tên tài khoản hoặc Email' . ':</label></dt>
		<dd><input type="text" name="username_email" class="textCtrl" id="ctrl_username_email" autofocus="true" /></dd>
	</dl>

	';
$__compilerVar3 = '';
$__compilerVar3 .= '
				';
$__compilerVar4 = '';
if ($captcha)
{
$__compilerVar4 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Mã xác nhận' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
$__compilerVar3 .= '
			';
if (trim($__compilerVar3) !== '')
{
$__output .= '
		<fieldset>
			' . $__compilerVar3 . '
		</fieldset>
	';
}
unset($__compilerVar3);
$__output .= '
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Lấy lại mật khẩu' . '" accesskey="s" class="button primary" /></dd>
	</dl>
	
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
