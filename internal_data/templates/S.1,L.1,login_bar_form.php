<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

';
$__compilerVar1 = '';
$__compilerVar1 .= '
';
if ($xenOptions['facebookAppId'])
{
$eAuth = '';
$eAuth .= '1';
}
$__compilerVar1 .= '
';
if ($xenOptions['twitterAppKey'])
{
$eAuth = '';
$eAuth .= '1';
}
$__compilerVar1 .= '
';
if ($xenOptions['googleClientId'])
{
$eAuth = '';
$eAuth .= '1';
}
$__compilerVar1 .= '
';
$__output .= $this->callTemplateHook('login_bar_eauth_set', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('login/login', false, array()) . '" method="post" class="xenForm ' . (($eAuth) ? ('eAuth') : ('')) . '" id="login" style="display:none">

	';
$__compilerVar2 = '';
$__compilerVar2 .= '
				';
$__compilerVar3 = '';
$__compilerVar3 .= '
				';
if ($xenOptions['facebookAppId'])
{
$__compilerVar3 .= '
					';
$this->addRequiredExternal('css', 'facebook');
$__compilerVar3 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin" tabindex="110"><span>' . 'Log in with Facebook' . '</span></a></li>
				';
}
$__compilerVar3 .= '
				
				';
if ($xenOptions['twitterAppKey'])
{
$__compilerVar3 .= '
					';
$this->addRequiredExternal('css', 'twitter');
$__compilerVar3 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('register/twitter', '', array(
'reg' => '1'
)) . '" class="twitterLogin" tabindex="110"><span>' . 'Log in with Twitter' . '</span></a></li>
				';
}
$__compilerVar3 .= '
				
				';
if ($xenOptions['googleClientId'])
{
$__compilerVar3 .= '
					';
$this->addRequiredExternal('css', 'google');
$__compilerVar3 .= '
					<li><span class="googleLogin GoogleLogin JsOnly" tabindex="110" data-client-id="' . htmlspecialchars($xenOptions['googleClientId'], ENT_QUOTES, 'UTF-8') . '" data-redirect-url="' . XenForo_Template_Helper_Core::link('register/google', '', array(
'code' => '__CODE__',
'csrf' => $session['sessionCsrf']
)) . '"><span>' . 'Log in with Google' . '</span></span></li>
				';
}
$__compilerVar3 .= '
				';
$__compilerVar2 .= $this->callTemplateHook('login_bar_eauth_items', $__compilerVar3, array());
unset($__compilerVar3);
$__compilerVar2 .= '
			';
if (trim($__compilerVar2) !== '')
{
$__output .= '
		<ul id="eAuthUnit">
			' . $__compilerVar2 . '
		</ul>
	';
}
unset($__compilerVar2);
$__output .= '

	<div class="ctrlWrapper">
		<dl class="ctrlUnit">
			<dt><label for="LoginControl">' . 'Your name or email address' . ':</label></dt>
			<dd><input type="text" name="login" id="LoginControl" class="textCtrl" tabindex="101" /></dd>
		</dl>
	
	';
if ($xenOptions['registrationSetup']['enabled'])
{
$__output .= '
		<dl class="ctrlUnit">
			<dt>
				<label for="ctrl_password">' . 'Do you already have an account?' . '</label>
			</dt>
			<dd>
				<ul>
					<li><label for="ctrl_not_registered"><input type="radio" name="register" value="1" id="ctrl_not_registered" tabindex="105" />
						' . 'No, create an account now.' . '</label></li>
					<li><label for="ctrl_registered"><input type="radio" name="register" value="0" id="ctrl_registered" tabindex="105" checked="checked" class="Disabler" />
						' . 'Yes, my password is' . ':</label></li>
					<li id="ctrl_registered_Disabler">
						<input type="password" name="password" class="textCtrl" id="ctrl_password" tabindex="102" />
						<div class="lostPassword"><a href="' . XenForo_Template_Helper_Core::link('lost-password', false, array()) . '" class="OverlayTrigger OverlayCloser" tabindex="106">' . 'Forgot your password?' . '</a></div>
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
			<dt>
				<label for="ctrl_password">' . 'Password' . ':</label>
			</dt>
			<dd>
				<input type="password" name="password" class="textCtrl" id="ctrl_password" tabindex="102" />
				<div class="lostPasswordLogin"><a href="' . XenForo_Template_Helper_Core::link('lost-password', false, array()) . '" class="OverlayTrigger OverlayCloser" tabindex="106">' . 'Forgot your password?' . '</a></div>
			</dd>
		</dl>
	';
}
$__output .= '
		
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" class="button primary" value="' . 'Log in' . '" tabindex="104" data-loginPhrase="' . 'Log in' . '" data-signupPhrase="' . 'Sign up' . '" />
				<label for="ctrl_remember" class="rememberPassword"><input type="checkbox" name="remember" value="1" id="ctrl_remember" tabindex="103" /> ' . 'Stay logged in' . '</label>
			</dd>
		</dl>
	</div>

	<input type="hidden" name="cookie_check" value="1" />
	<input type="hidden" name="redirect" value="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

</form>';
