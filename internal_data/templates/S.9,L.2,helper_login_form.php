<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if (!$visitor['user_id'])
{
$__output .= '

';
$__extraData['hideLoginBar'] = '';
$__extraData['hideLoginBar'] .= '1';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('login/login', false, array()) . '" method="post" class="xenForm formOverlay" id="pageLogin">
	';
$__compilerVar2 = '';
$__compilerVar2 .= $text;
if (trim($__compilerVar2) !== '')
{
$__output .= '
		<div class="errorPanel"><span class="errors">
			' . $__compilerVar2 . '
		</span></div>
	';
}
unset($__compilerVar2);
$__output .= '
	
	<h2 class="textHeading">' . 'Đăng nhập | Đăng ký' . '</h2>

	<dl class="ctrlUnit">
		<dt><label for="ctrl_pageLogin_login">' . 'Tên tài khoản hoặc địa chỉ Email' . ':</label></dt>
		<dd><input type="text" name="login" value="' . htmlspecialchars($defaultLogin, ENT_QUOTES, 'UTF-8') . '" id="ctrl_pageLogin_login" class="textCtrl" /></dd>
	</dl>

';
if ($xenOptions['registrationSetup']['enabled'])
{
$__output .= '
	<dl class="ctrlUnit">
		<dt><label for="ctrl_pageLogin_password">' . 'Bạn đã có tài khoản rồi?' . '</label></dt>
		<dd>
			<ul>
				<li><label for="ctrl_pageLogin_not_registered"><input type="radio" name="register" value="1" id="ctrl_pageLogin_not_registered" />
					' . 'Tích vào đây để đăng ký' . '</label></li>
				<li><label for="ctrl_pageLogin_registered"><input type="radio" name="register" value="0" id="ctrl_pageLogin_registered" checked="checked" class="Disabler" />
					' . 'Vâng, Mật khẩu của tôi là' . ':</label></li>
				<li id="ctrl_pageLogin_registered_Disabler">
					<input type="password" name="password" class="textCtrl" id="ctrl_pageLogin_password" />					
					<div><label for="ctrl_pageLogin_remember" class="rememberPassword"><input type="checkbox" name="remember" value="1" id="ctrl_pageLogin_remember" /> ' . 'Duy trì đăng nhập' . '</label></div>
				</li>
			</ul>
		</dd>
	</dl>
';
}
else
{
$__output .= '
	<dl class="ctrlUnit">
		<dt><label for="ctrl_pageLogin_password">' . 'Mật khẩu' . ':</label></dt>
		<dd>
			<input type="password" name="password" class="textCtrl" id="ctrl_pageLogin_password" />					
			<div><label for="ctrl_pageLogin_remember" class="rememberPassword"><input type="checkbox" name="remember" value="1" id="ctrl_pageLogin_remember" /> ' . 'Duy trì đăng nhập' . '</label></div>
		</dd>
	</dl>
';
}
$__output .= '
	
	';
if ($captcha)
{
$__output .= '
		<dl class="ctrlUnit">
			<dt>' . 'Mã xác nhận' . ':</dt>
			<dd>' . $captcha . '</dd>
		</dl>
	';
}
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" class="button primary" value="' . 'Đăng nhập' . '" data-loginPhrase="' . 'Đăng nhập' . '" data-signupPhrase="' . 'Đăng ký' . '" />
			<a href="' . XenForo_Template_Helper_Core::link('lost-password', false, array()) . '" class="OverlayTrigger OverlayCloser">' . 'Bạn đã quên mật khẩu?' . '</a>
		</dd>
	</dl>

	';
if ($xenOptions['facebookAppId'])
{
$__output .= '
		';
$this->addRequiredExternal('css', 'facebook');
$__output .= '
		<dl class="ctrlUnit">
			<dt></dt>
			<dd><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin"><span>' . 'Login with Facebook' . '</span></a></dd>
		</dl>
	';
}
$__output .= '
	
	<input type="hidden" name="cookie_check" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="redirect" value="' . (($redirect) ? (htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8'))) . '" />
	';
if ($postData)
{
$__output .= '
		<input type="hidden" name="postData" value="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => $postData
)), ENT_QUOTES, 'UTF-8', true) . '" />
	';
}
$__output .= '

</form>

<script>
	$(function()
	{
		var $button = $(\'#pageLogin input.button.primary\');
		$(\'#pageLogin input[name="register"]\').click(function()
		{
			$button.val(
				$(\'#pageLogin input[name="register"]:checked\').val() == \'1\'
				? $button.data(\'signupphrase\')
				: $button.data(\'loginphrase\')
			);
		});
	});
</script>
';
}
