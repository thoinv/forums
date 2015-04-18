<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="widget ' . htmlspecialchars($widget['class'], ENT_QUOTES, 'UTF-8') . '" id="widget-' . htmlspecialchars($widget['widget_id'], ENT_QUOTES, 'UTF-8') . '">
	';
$__compilerVar1 = '';
if ($visitor['user_id'])
{
$__compilerVar1 .= '

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
$__compilerVar2 = '';
$__compilerVar2 .= '
				<dl class="pairsJustified"><dt>' . 'Messages' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['message_count'], '0') . '</dd></dl>
				<dl class="pairsJustified"><dt>' . 'Likes' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['like_count'], '0') . '</dd></dl>
				<dl class="pairsJustified"><dt>' . 'Points' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['trophy_points'], '0') . '</dd></dl>
			</div>
			';
$__compilerVar1 .= $this->callTemplateHook('sidebar_visitor_panel_stats', $__compilerVar2, array());
unset($__compilerVar2);
$__compilerVar1 .= '
		</div>
		
	</div>
</div>

';
}
else
{
$__compilerVar1 .= '

<div class="section loginButton">   
    <div class="secondaryContent">
        <label for="LoginControl" id="SignupButton"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="inner">' . (($xenOptions['registrationSetup']['enabled']) ? ('Sign up now!') : ('Log in')) . '</a></label>
';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'cta_login');
$__compilerVar3 .= '

';
if ($xenOptions['facebookAppId'])
{
$__compilerVar3 .= '
	';
$this->addRequiredExternal('css', 'facebook');
$__compilerVar3 .= '
	<li class="ctaLoginFacebook"><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin"><span>' . 'Log in with Facebook' . '</span></a></li>
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
	<li class="ctaLoginTwitter"><a href="' . XenForo_Template_Helper_Core::link('register/twitter', '', array(
'reg' => '1'
)) . '" class="twitterLogin"><span>' . 'Log in with Twitter' . '</span></a></li>
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
	<li class="ctaLoginGoogle"><span class="googleLogin GoogleLogin JsOnly" data-client-id="' . htmlspecialchars($xenOptions['googleClientId'], ENT_QUOTES, 'UTF-8') . '" data-redirect-url="' . XenForo_Template_Helper_Core::link('register/google', '', array(
'code' => '__CODE__',
'csrf' => $session['sessionCsrf']
)) . '"><span>' . 'Log in with Google' . '</span></span></li>
';
}
$__compilerVar1 .= $__compilerVar3;
unset($__compilerVar3);
$__compilerVar1 .= '

        ';
if ($xenOptions['facebookAppId'])
{
$__compilerVar1 .= '
            <div class="cta_fbButton">
                <a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin"><span>' . 'Log in with Facebook' . '</span></a>
            </div>
        ';
}
$__compilerVar1 .= '

    </div>
</div>

';
}
$__compilerVar1 .= '

';
$__compilerVar4 = '';
$__compilerVar5 = '';
$__compilerVar4 .= $this->callTemplateHook('ad_sidebar_below_visitor_panel', $__compilerVar5, array());
unset($__compilerVar5);
$__compilerVar1 .= $__compilerVar4;
unset($__compilerVar4);
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
</div>';
