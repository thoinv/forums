<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Liên hệ';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('misc/contact', false, array()) . '" method="post" class="xenForm formOverlay AutoValidator">

	';
if ($visitor['user_id'] == 0)
{
$__output .= '
		<dl class="ctrlUnit">
			<dt><label for="ctrl__guestUsername">' . 'Tên bạn' . ':</label></dt>
			<dd><input type="text" name="_guestUsername" value="' . htmlspecialchars($visitor['username'], ENT_QUOTES, 'UTF-8') . '" id="ctrl__guestUsername" class="textCtrl" autofocus="true" /></dd>
		</dl>
		
		<dl class="ctrlUnit">
			<dt><label for="ctrl_email">' . 'Địa chỉ email của bạn' . ':</label></dt>
			<dd><input type="text" name="email" id="ctrl_email" class="textCtrl" /></dd>
		</dl>
	';
}
else
{
$__output .= '
		<dl class="ctrlUnit">
			<dt><label>' . 'Tên bạn' . ':</label></dt>
			<dd>' . htmlspecialchars($visitor['username'], ENT_QUOTES, 'UTF-8') . '</dd>
		</dl>
		
		<dl class="ctrlUnit">
			<dt><label for="ctrl_email">' . 'Địa chỉ email của bạn' . ':</label></dt>
			<dd>' . htmlspecialchars($visitor['email'], ENT_QUOTES, 'UTF-8') . '</dd>
		</dl>
	';
}
$__output .= '

	';
$__compilerVar2 = '';
if ($captcha)
{
$__compilerVar2 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Mã xác nhận' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '

	<dl class="ctrlUnit">
		<dt><label for="ctrl_subject">' . 'Tiêu đề' . ':</label></dt>
		<dd><input type="text" name="subject" class="textCtrl" id="ctrl_subject" /></dd>
	</dl>

	<dl class="ctrlUnit">
		<dt><label for="ctrl_message">' . 'Nội dung' . ':</label></dt>
		<dd><textarea name="message" class="textCtrl Elastic" id="ctrl_message" rows="5"></textarea></dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Gửi tin nhắn' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />
</form>';
