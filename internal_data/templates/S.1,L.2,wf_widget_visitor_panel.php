<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="widget ' . htmlspecialchars($widget['class'], ENT_QUOTES, 'UTF-8') . '" id="widget-' . htmlspecialchars($widget['widget_id'], ENT_QUOTES, 'UTF-8') . '">
	';
$__compilerVar7 = '';
if ($visitor['user_id'])
{
$__compilerVar7 .= '

<div class="section visitorPanel">
	<div class="secondaryContent">
	
		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 'm',
'img' => 'true'
),'')) . '
		
		<div class="visitorText">
			<h2>' . '<span class="muted">Signed in as</span> ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $visitor,
'1' => 'NoOverlay'
)) . '' . '</h2>		
			<div class="stats">
			';
$__compilerVar8 = '';
$__compilerVar8 .= '
				<dl class="pairsJustified"><dt>' . 'Bài viết' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['message_count'], '0') . '</dd></dl>
				<dl class="pairsJustified"><dt>' . 'Thích' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['like_count'], '0') . '</dd></dl>
				<dl class="pairsJustified"><dt>' . 'Điểm' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['trophy_points'], '0') . '</dd></dl>
			</div>
			';
$__compilerVar7 .= $this->callTemplateHook('sidebar_visitor_panel_stats', $__compilerVar8, array());
unset($__compilerVar8);
$__compilerVar7 .= '
		</div>
		
	</div>
</div>

';
}
else
{
$__compilerVar7 .= '

<div class="section loginButton">		
	<div class="secondaryContent">
		<!--<label for="LoginControl" id="SignupButton"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="inner">' . (($xenOptions['registrationSetup']['enabled']) ? ('Đăng ký!') : ('Đăng nhập')) . '</a></label>
';
$__compilerVar9 = '';
$this->addRequiredExternal('css', 'cta_login');
$__compilerVar9 .= '

';
if ($xenOptions['facebookAppId'])
{
$__compilerVar9 .= '
	';
$this->addRequiredExternal('css', 'facebook');
$__compilerVar9 .= '
	<li class="ctaLoginFacebook"><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin"><span>' . 'Login with Facebook' . '</span></a></li>
';
}
$__compilerVar9 .= '

';
if ($xenOptions['twitterAppKey'])
{
$__compilerVar9 .= '
	';
$this->addRequiredExternal('css', 'twitter');
$__compilerVar9 .= '
	<li class="ctaLoginTwitter"><a href="' . XenForo_Template_Helper_Core::link('register/twitter', '', array(
'reg' => '1'
)) . '" class="twitterLogin"><span>' . 'Log in with Twitter' . '</span></a></li>
';
}
$__compilerVar9 .= '

';
if ($xenOptions['googleClientId'])
{
$__compilerVar9 .= '
	';
$this->addRequiredExternal('css', 'google');
$__compilerVar9 .= '
	<li class="ctaLoginGoogle"><span class="googleLogin GoogleLogin JsOnly" data-client-id="' . htmlspecialchars($xenOptions['googleClientId'], ENT_QUOTES, 'UTF-8') . '" data-redirect-url="' . XenForo_Template_Helper_Core::link('register/google', '', array(
'code' => '__CODE__',
'csrf' => $session['sessionCsrf']
)) . '"><span>' . 'Log in with Google' . '</span></span></li>
';
}
$__compilerVar7 .= $__compilerVar9;
unset($__compilerVar9);
$__compilerVar7 .= '-->
		<label for="LoginControl" id="SignupButton"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="inner">' . 'Đăng ký | Đăng nhập' . '</a></label>
';
$__compilerVar10 = '';
$this->addRequiredExternal('css', 'cta_login');
$__compilerVar10 .= '

';
if ($xenOptions['facebookAppId'])
{
$__compilerVar10 .= '
	';
$this->addRequiredExternal('css', 'facebook');
$__compilerVar10 .= '
	<li class="ctaLoginFacebook"><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin"><span>' . 'Login with Facebook' . '</span></a></li>
';
}
$__compilerVar10 .= '

';
if ($xenOptions['twitterAppKey'])
{
$__compilerVar10 .= '
	';
$this->addRequiredExternal('css', 'twitter');
$__compilerVar10 .= '
	<li class="ctaLoginTwitter"><a href="' . XenForo_Template_Helper_Core::link('register/twitter', '', array(
'reg' => '1'
)) . '" class="twitterLogin"><span>' . 'Log in with Twitter' . '</span></a></li>
';
}
$__compilerVar10 .= '

';
if ($xenOptions['googleClientId'])
{
$__compilerVar10 .= '
	';
$this->addRequiredExternal('css', 'google');
$__compilerVar10 .= '
	<li class="ctaLoginGoogle"><span class="googleLogin GoogleLogin JsOnly" data-client-id="' . htmlspecialchars($xenOptions['googleClientId'], ENT_QUOTES, 'UTF-8') . '" data-redirect-url="' . XenForo_Template_Helper_Core::link('register/google', '', array(
'code' => '__CODE__',
'csrf' => $session['sessionCsrf']
)) . '"><span>' . 'Log in with Google' . '</span></span></li>
';
}
$__compilerVar7 .= $__compilerVar10;
unset($__compilerVar10);
$__compilerVar7 .= '
	</div>
</div>

';
}
$__compilerVar7 .= '

';
$__compilerVar11 = '';
$__compilerVar12 = '';
$__compilerVar11 .= $this->callTemplateHook('ad_sidebar_below_visitor_panel', $__compilerVar12, array());
unset($__compilerVar12);
$__compilerVar7 .= $__compilerVar11;
unset($__compilerVar11);
$__output .= $__compilerVar7;
unset($__compilerVar7);
$__output .= '
</div>';
