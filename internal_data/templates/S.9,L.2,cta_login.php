<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'cta_login');
$__output .= '

';
if ($xenOptions['facebookAppId'])
{
$__output .= '
	';
$this->addRequiredExternal('css', 'facebook');
$__output .= '
	<li class="ctaLoginFacebook"><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin"><span>' . 'Login with Facebook' . '</span></a></li>
';
}
$__output .= '

';
if ($xenOptions['twitterAppKey'])
{
$__output .= '
	';
$this->addRequiredExternal('css', 'twitter');
$__output .= '
	<li class="ctaLoginTwitter"><a href="' . XenForo_Template_Helper_Core::link('register/twitter', '', array(
'reg' => '1'
)) . '" class="twitterLogin"><span>' . 'Log in with Twitter' . '</span></a></li>
';
}
$__output .= '

';
if ($xenOptions['googleClientId'])
{
$__output .= '
	';
$this->addRequiredExternal('css', 'google');
$__output .= '
	<li class="ctaLoginGoogle"><span class="googleLogin GoogleLogin JsOnly" data-client-id="' . htmlspecialchars($xenOptions['googleClientId'], ENT_QUOTES, 'UTF-8') . '" data-redirect-url="' . XenForo_Template_Helper_Core::link('register/google', '', array(
'code' => '__CODE__',
'csrf' => $session['sessionCsrf']
)) . '"><span>' . 'Log in with Google' . '</span></span></li>
';
}
