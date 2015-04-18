<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="widget ' . htmlspecialchars($widget['class'], ENT_QUOTES, 'UTF-8') . '" id="widget-' . htmlspecialchars($widget['widget_id'], ENT_QUOTES, 'UTF-8') . '">
	';
$__compilerVar6 = '';
if ($visitor['user_id'])
{
$__compilerVar6 .= '

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
$__compilerVar7 = '';
$__compilerVar7 .= '
				<dl class="pairsJustified"><dt>' . 'Bài viết' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['message_count'], '0') . '</dd></dl>
				<dl class="pairsJustified"><dt>' . 'Thích' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['like_count'], '0') . '</dd></dl>
				<dl class="pairsJustified"><dt>' . 'Điểm' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['trophy_points'], '0') . '</dd></dl>
			</div>
			';
$__compilerVar6 .= $this->callTemplateHook('sidebar_visitor_panel_stats', $__compilerVar7, array());
unset($__compilerVar7);
$__compilerVar6 .= '
		</div>
		
	</div>
</div>

';
}
else
{
$__compilerVar6 .= '

<div class="section loginButton">   
    <div class="secondaryContent">
        <label for="LoginControl" id="SignupButton"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="inner">' . (($xenOptions['registrationSetup']['enabled']) ? ('Đăng ký!') : ('Đăng nhập')) . '</a></label>
';
$__compilerVar8 = '';
$this->addRequiredExternal('css', 'cta_login');
$__compilerVar8 .= '

';
if ($xenOptions['facebookAppId'])
{
$__compilerVar8 .= '
	';
$this->addRequiredExternal('css', 'facebook');
$__compilerVar8 .= '
	<li class="ctaLoginFacebook"><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin"><span>' . 'Login with Facebook' . '</span></a></li>
';
}
$__compilerVar8 .= '

';
if ($xenOptions['twitterAppKey'])
{
$__compilerVar8 .= '
	';
$this->addRequiredExternal('css', 'twitter');
$__compilerVar8 .= '
	<li class="ctaLoginTwitter"><a href="' . XenForo_Template_Helper_Core::link('register/twitter', '', array(
'reg' => '1'
)) . '" class="twitterLogin"><span>' . 'Log in with Twitter' . '</span></a></li>
';
}
$__compilerVar8 .= '

';
if ($xenOptions['googleClientId'])
{
$__compilerVar8 .= '
	';
$this->addRequiredExternal('css', 'google');
$__compilerVar8 .= '
	<li class="ctaLoginGoogle"><span class="googleLogin GoogleLogin JsOnly" data-client-id="' . htmlspecialchars($xenOptions['googleClientId'], ENT_QUOTES, 'UTF-8') . '" data-redirect-url="' . XenForo_Template_Helper_Core::link('register/google', '', array(
'code' => '__CODE__',
'csrf' => $session['sessionCsrf']
)) . '"><span>' . 'Log in with Google' . '</span></span></li>
';
}
$__compilerVar6 .= $__compilerVar8;
unset($__compilerVar8);
$__compilerVar6 .= '

        ';
if ($xenOptions['facebookAppId'])
{
$__compilerVar6 .= '
            <div class="cta_fbButton">
                <a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin"><span>' . 'Login with Facebook' . '</span></a>
            </div>
        ';
}
$__compilerVar6 .= '

    </div>
</div>

';
}
$__compilerVar6 .= '

';
$__compilerVar9 = '';
$__compilerVar10 = '';
$__compilerVar9 .= $this->callTemplateHook('ad_sidebar_below_visitor_panel', $__compilerVar10, array());
unset($__compilerVar10);
$__compilerVar6 .= $__compilerVar9;
unset($__compilerVar9);
$__output .= $__compilerVar6;
unset($__compilerVar6);
$__output .= '
</div>';
