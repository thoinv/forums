<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Error';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Error';
$__output .= '

';
$__extraData['head']['robots'] = '';
$__extraData['head']['robots'] .= '<meta name="robots" content="noindex" />';
$__output .= '

';
if ($visitor['user_id'])
{
$__output .= $text;
}
$__output .= '

';
$__compilerVar1 = '';
if (!$visitor['user_id'])
{
$__compilerVar1 .= '

';
$__extraData['hideLoginBar'] = '';
$__extraData['hideLoginBar'] .= '1';
$__compilerVar1 .= '

<form action="' . XenForo_Template_Helper_Core::link('login/login', false, array()) . '" method="post" class="xenForm" id="pageLogin">

	';
$__compilerVar2 = '';
$__compilerVar2 .= $text;
if (trim($__compilerVar2) !== '')
{
$__compilerVar1 .= '
		<div class="errorPanel"><span class="errors">
			' . $__compilerVar2 . '
		</span></div>
	';
}
unset($__compilerVar2);
$__compilerVar1 .= '
	
	<h2 class="textHeading">' . 'Log in or Sign up' . '</h2>

	<dl class="ctrlUnit">
		<dt><label for="ctrl_pageLogin_login">' . 'Your name or email address' . ':</label></dt>
		<dd><input type="text" name="login" value="' . htmlspecialchars($defaultLogin, ENT_QUOTES, 'UTF-8') . '" id="ctrl_pageLogin_login" class="textCtrl" tabindex="1" /></dd>
	</dl>

';
if ($xenOptions['registrationSetup']['enabled'])
{
$__compilerVar1 .= '
	<dl class="ctrlUnit">
		<dt><label for="ctrl_pageLogin_password">' . 'Do you already have an account?' . '</label></dt>
		<dd>
			<ul>
				<li><label for="ctrl_pageLogin_not_registered"><input type="radio" name="register" value="1" id="ctrl_pageLogin_not_registered" tabindex="5" />
					' . 'No, create an account now.' . '</label></li>
				<li><label for="ctrl_pageLogin_registered"><input type="radio" name="register" value="0" id="ctrl_pageLogin_registered" checked="checked" class="Disabler" tabindex="5" />
					' . 'Yes, my password is' . ':</label></li>
				<li id="ctrl_pageLogin_registered_Disabler">
					<input type="password" name="password" class="textCtrl" id="ctrl_pageLogin_password" tabindex="2" />					
					<div><a href="' . XenForo_Template_Helper_Core::link('lost-password', false, array()) . '" class="OverlayTrigger OverlayCloser" tabindex="6">' . 'Forgot your password?' . '</a></div>
				</li>
			</ul>
		</dd>
	</dl>
';
}
else
{
$__compilerVar1 .= '
	<dl class="ctrlUnit">
		<dt><label for="ctrl_pageLogin_password">' . 'Password' . ':</label></dt>
		<dd>
			<input type="password" name="password" class="textCtrl" id="ctrl_pageLogin_password" tabindex="2" />					
			<div><a href="' . XenForo_Template_Helper_Core::link('lost-password', false, array()) . '" class="OverlayTrigger OverlayCloser" tabindex="6">' . 'Forgot your password?' . '</a></div>
		</dd>
	</dl>
';
}
$__compilerVar1 .= '
	
	';
if ($captcha)
{
$__compilerVar1 .= '
		<dl class="ctrlUnit">
			<dt>' . 'Verification' . ':</dt>
			<dd>' . $captcha . '</dd>
		</dl>
	';
}
$__compilerVar1 .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" class="button primary" value="' . 'Log in' . '" data-loginPhrase="' . 'Log in' . '" data-signupPhrase="' . 'Sign up' . '" tabindex="4" />
			<label class="rememberPassword"><input type="checkbox" name="remember" value="1" id="ctrl_pageLogin_remember" tabindex="3" /> ' . 'Stay logged in' . '</label>
		</dd>
	</dl>

	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar1 .= '
		';
$this->addRequiredExternal('css', 'facebook');
$__compilerVar1 .= '
		<dl class="ctrlUnit">
			<dt></dt>
			<dd><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin" tabindex="10"><span>' . 'Log in with Facebook' . '</span></a></dd>
		</dl>
	';
}
$__compilerVar1 .= '
	
	';
if ($xenOptions['twitterAppKey'])
{
$__compilerVar1 .= '
		';
$this->addRequiredExternal('css', 'twitter');
$__compilerVar1 .= '
		<dl class="ctrlUnit">
			<dt></dt>
			<dd><a href="' . XenForo_Template_Helper_Core::link('register/twitter', '', array(
'reg' => '1'
)) . '" class="twitterLogin" tabindex="10"><span>' . 'Log in with Twitter' . '</span></a></dd>
		</dl>
	';
}
$__compilerVar1 .= '
	
	';
if ($xenOptions['googleClientId'])
{
$__compilerVar1 .= '
		';
$this->addRequiredExternal('css', 'google');
$__compilerVar1 .= '
		<dl class="ctrlUnit">
			<dt></dt>
			<dd><span class="googleLogin GoogleLogin JsOnly" tabindex="10" data-client-id="' . htmlspecialchars($xenOptions['googleClientId'], ENT_QUOTES, 'UTF-8') . '" data-redirect-url="' . XenForo_Template_Helper_Core::link('register/google', '', array(
'code' => '__CODE__',
'csrf' => $session['sessionCsrf']
)) . '"><span>' . 'Log in with Google' . '</span></span></dd>
		</dl>
	';
}
$__compilerVar1 .= '
	
	<input type="hidden" name="cookie_check" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="redirect" value="' . (($redirect) ? (htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8'))) . '" />
	';
if ($postData)
{
$__compilerVar1 .= '
		<input type="hidden" name="postData" value="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => $postData
)), ENT_QUOTES, 'UTF-8', true) . '" />
	';
}
$__compilerVar1 .= '

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
$__output .= $__compilerVar1;
unset($__compilerVar1);
