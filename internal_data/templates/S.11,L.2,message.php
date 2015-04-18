<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'message');
$__output .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__output .= '

<li id="' . htmlspecialchars($messageId, ENT_QUOTES, 'UTF-8') . '" class="message ' . (($message['isDeleted']) ? ('deleted') : ('')) . ' ' . (($message['is_staff']) ? ('staff') : ('')) . ' ' . (($message['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($message['username'], ENT_QUOTES, 'UTF-8') . '">

	';
$__compilerVar20 = '';
$this->addRequiredExternal('css', 'message_user_info');
$__compilerVar20 .= '

<div class="messageUserInfo" itemscope="itemscope" itemtype="http://data-vocabulary.org/Person">	
<div class="messageUserBlock ' . (($message['isOnline']) ? ('online') : ('')) . '">
	';
$__compilerVar21 = '';
$__compilerVar21 .= '
		<div class="avatarHolder">
			<span class="helper"></span>
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($message,(true),array(
'user' => '$user',
'size' => 'm',
'img' => 'true'
),'')) . '
			';
if ($message['isOnline'])
{
$__compilerVar21 .= '<span class="Tooltip onlineMarker" title="' . 'Online Now' . '" data-offsetX="-22" data-offsetY="-8"></span>';
}
$__compilerVar21 .= '
			<!-- slot: message_user_info_avatar -->
		</div>
	';
$__compilerVar20 .= $this->callTemplateHook('message_user_info_avatar', $__compilerVar21, array(
'user' => $message,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar21);
$__compilerVar20 .= '

';
if (!$isQuickReply)
{
$__compilerVar20 .= '
	';
$__compilerVar22 = '';
$__compilerVar22 .= '
		<h3 class="userText">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($message,'',(true),array(
'itemprop' => 'name'
))) . '
			';
$__compilerVar23 = '';
$__compilerVar23 .= XenForo_Template_Helper_Core::callHelper('userTitle', array(
'0' => $message,
'1' => '1',
'2' => '1'
));
if (trim($__compilerVar23) !== '')
{
$__compilerVar22 .= '<em class="userTitle" itemprop="title">' . $__compilerVar23 . '</em>';
}
unset($__compilerVar23);
$__compilerVar22 .= '
			' . XenForo_Template_Helper_Core::callHelper('userBanner', array(
'0' => $message,
'1' => 'wrapped'
)) . '
			<!-- slot: message_user_info_text -->
		</h3>
	';
$__compilerVar20 .= $this->callTemplateHook('message_user_info_text', $__compilerVar22, array(
'user' => $message,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar22);
$__compilerVar20 .= '
		
	';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar24 = '';
$__compilerVar24 .= '
';
if (!XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar24 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbons');
$__compilerVar24 .= '
';
}
$__compilerVar24 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar24 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbonsbadge');
$__compilerVar24 .= '
';
}
$__compilerVar24 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsSoftResponsiveFix'))
{
$__compilerVar24 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsSoftResponsiveFix');
$__compilerVar24 .= '
';
}
$__compilerVar24 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsXenMoodsFix'))
{
$__compilerVar24 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsXenMoodsFix');
$__compilerVar24 .= '
';
}
$__compilerVar24 .= '
    
';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar24 .= '

	<ul class="ribbon">
    
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1'))
{
$__compilerVar24 .= '
			<li class="ribbon1">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2'))
{
$__compilerVar24 .= '
			<li class="ribbon2">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3'))
{
$__compilerVar24 .= '
			<li class="ribbon3">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4'))
{
$__compilerVar24 .= '
			<li class="ribbon4">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5'))
{
$__compilerVar24 .= '
			<li class="ribbon5">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6'))
{
$__compilerVar24 .= '
			<li class="ribbon6">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7'))
{
$__compilerVar24 .= '
			<li class="ribbon7">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8'))
{
$__compilerVar24 .= '
			<li class="ribbon8">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9'))
{
$__compilerVar24 .= '
			<li class="ribbon9">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10'))
{
$__compilerVar24 .= '
			<li class="ribbon10">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11'))
{
$__compilerVar24 .= '
			<li class="ribbon11">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12'))
{
$__compilerVar24 .= '
			<li class="ribbon12">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13'))
{
$__compilerVar24 .= '
			<li class="ribbon13">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14'))
{
$__compilerVar24 .= '
			<li class="ribbon14">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15'))
{
$__compilerVar24 .= '
			<li class="ribbon15">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16'))
{
$__compilerVar24 .= '
			<li class="ribbon16">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17'))
{
$__compilerVar24 .= '
			<li class="ribbon17">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18'))
{
$__compilerVar24 .= '
			<li class="ribbon18">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19'))
{
$__compilerVar24 .= '
			<li class="ribbon19">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20'))
{
$__compilerVar24 .= '
			<li class="ribbon20">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21'))
{
$__compilerVar24 .= '
			<li class="ribbon21">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22'))
{
$__compilerVar24 .= '
			<li class="ribbon22">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23'))
{
$__compilerVar24 .= '
			<li class="ribbon23">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24'))
{
$__compilerVar24 .= '
			<li class="ribbon24">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25'))
{
$__compilerVar24 .= '
			<li class="ribbon25">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26'))
{
$__compilerVar24 .= '
			<li class="ribbon26">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27'))
{
$__compilerVar24 .= '
			<li class="ribbon27">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28'))
{
$__compilerVar24 .= '
			<li class="ribbon28">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29'))
{
$__compilerVar24 .= '
			<li class="ribbon29">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30'))
{
$__compilerVar24 .= '
			<li class="ribbon30">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31'))
{
$__compilerVar24 .= '
			<li class="ribbon31">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32'))
{
$__compilerVar24 .= '
			<li class="ribbon32">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33'))
{
$__compilerVar24 .= '
			<li class="ribbon33">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34'))
{
$__compilerVar24 .= '
			<li class="ribbon34">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35'))
{
$__compilerVar24 .= '
			<li class="ribbon35">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35Title') . '
			</li>
		';
}
$__compilerVar24 .= '
		
	</ul>
';
}
$__compilerVar20 .= $__compilerVar24;
unset($__compilerVar24);
}
$__compilerVar20 .= '
    ';
$__compilerVar25 = '';
$__compilerVar25 .= '
			';
$__compilerVar26 = '';
$__compilerVar26 .= '
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowRegisterDate') AND $message['user_id'])
{
$__compilerVar26 .= '
					<dl class="pairsJustified">
						<dt>' . 'Tham gia ngày' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::date($message['register_date'], '') . '</dd>
					</dl>
				';
}
$__compilerVar26 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowMessageCount') AND $message['user_id'])
{
$__compilerVar26 .= '
					<dl class="pairsJustified">
						<dt>' . 'Bài viết' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $message['user_id']
)) . '" class="concealed" rel="nofollow">' . XenForo_Template_Helper_Core::numberFormat($message['message_count'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar26 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTotalLikes') AND $message['user_id'])
{
$__compilerVar26 .= '
					<dl class="pairsJustified">
						<dt>' . 'Đã được thích' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($message['like_count'], '0') . '</dd>
					</dl>
				';
}
$__compilerVar26 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTrophyPoints') AND $message['user_id'])
{
$__compilerVar26 .= '
					<dl class="pairsJustified">
						<dt>' . 'Điểm thành tích' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('members/trophies', $message, array()) . '" class="OverlayTrigger concealed">' . XenForo_Template_Helper_Core::numberFormat($message['trophy_points'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar26 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowGender') AND $message['gender'])
{
$__compilerVar26 .= '
					<dl class="pairsJustified">
						<dt>' . 'Giới tính' . ':</dt>
						<dd itemprop="gender">';
if ($message['gender'] == ('male'))
{
$__compilerVar26 .= 'Nam';
}
else
{
$__compilerVar26 .= 'Nữ';
}
$__compilerVar26 .= '</dd>
					</dl>
				';
}
$__compilerVar26 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowOccupation') AND $message['occupation'])
{
$__compilerVar26 .= '
					<dl class="pairsJustified">
						<dt>' . 'Nghề nghiệp' . ':</dt>
						<dd itemprop="role">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($message['occupation'], ENT_QUOTES, 'UTF-8')
)) . '</dd>
					</dl>
				';
}
$__compilerVar26 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowLocation') AND $message['location'])
{
$__compilerVar26 .= '
					<dl class="pairsJustified">
						<dt>' . 'Nơi ở' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('misc/location-info', '', array(
'location' => XenForo_Template_Helper_Core::string('censor', array(
'0' => $message['location'],
'1' => '-'
))
)) . '" target="_blank" rel="nofollow" itemprop="address" class="concealed">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($message['location'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar26 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowHomepage') AND $message['homepage'])
{
$__compilerVar26 .= '
					<dl class="pairsJustified">
						<dt>' . 'Web' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($message['homepage'], ENT_QUOTES, 'UTF-8'),
'1' => '-'
)) . '" rel="nofollow" target="_blank" itemprop="url">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($message['homepage'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar26 .= '
							
			';
$__compilerVar25 .= $this->callTemplateHook('message_user_info_extra', $__compilerVar26, array(
'user' => $message,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar26);
$__compilerVar25 .= '			
			';
if (XenForo_Template_Helper_Core::styleProperty('messageShowCustomFields') AND $message['customFields'])
{
$__compilerVar25 .= '
			';
$__compilerVar27 = '';
$__compilerVar27 .= '
			
				';
foreach ($userFieldsInfo AS $fieldId => $fieldInfo)
{
$__compilerVar27 .= '
					';
if ($fieldInfo['viewable_message'] AND ($fieldInfo['display_group'] != ('contact') OR $message['allow_view_identities'] == ('everyone') OR ($message['allow_view_identities'] == ('members') AND $visitor['user_id'])))
{
$__compilerVar27 .= '
						';
$__compilerVar28 = '';
$__compilerVar28 .= XenForo_Template_Helper_Core::callHelper('userFieldValue', array(
'0' => $fieldInfo,
'1' => $message,
'2' => $message['customFields'][$fieldId]
));
if (trim($__compilerVar28) !== '')
{
$__compilerVar27 .= '
							<dl class="pairsJustified userField_' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
								<dt>' . XenForo_Template_Helper_Core::callHelper('userFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
								<dd>' . $__compilerVar28 . '</dd>
							</dl>
						';
}
unset($__compilerVar28);
$__compilerVar27 .= '
					';
}
$__compilerVar27 .= '
				';
}
$__compilerVar27 .= '
				
			';
$__compilerVar25 .= $this->callTemplateHook('message_user_info_custom_fields', $__compilerVar27, array(
'user' => $message,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar27);
$__compilerVar25 .= '
			';
}
$__compilerVar25 .= '
			';
if (trim($__compilerVar25) !== '')
{
$__compilerVar20 .= '
		<div class="extraUserInfo">
			' . $__compilerVar25 . '
		</div>
	';
}
unset($__compilerVar25);
$__compilerVar20 .= '
		
';
}
$__compilerVar20 .= '

	<span class="arrow"><span></span></span>
</div>
</div>';
$__output .= $__compilerVar20;
unset($__compilerVar20);
$__output .= '

	<div class="messageInfo primaryContent">
		';
if ($message['isNew'])
{
$__output .= '<strong class="newIndicator"><span></span>' . 'Mới' . '</strong>';
}
$__output .= '
		
		';
$__compilerVar29 = '';
$__compilerVar29 .= '
					';
$__compilerVar30 = '';
$__compilerVar30 .= '
						';
if ($message['warning_message'])
{
$__compilerVar30 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($message['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar30 .= '
						';
if ($message['isDeleted'])
{
$__compilerVar30 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Bị xóa' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($message['isModerated'])
{
$__compilerVar30 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar30 .= '
						';
if ($message['isIgnored'])
{
$__compilerVar30 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="JsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar30 .= '
					';
$__compilerVar29 .= $this->callTemplateHook('message_notices', $__compilerVar30, array(
'message' => $message
));
unset($__compilerVar30);
$__compilerVar29 .= '
				';
if (trim($__compilerVar29) !== '')
{
$__output .= '
			<ul class="messageNotices">
				' . $__compilerVar29 . '
			</ul>
		';
}
unset($__compilerVar29);
$__output .= '
		
		';
$__compilerVar31 = '';
$__compilerVar31 .= '
		<div class="messageContent">		
			<article>
				<blockquote class="messageText SelectQuoteContainer ugc baseHtml' . (($message['isIgnored']) ? (' ignored') : ('')) . '">
					';
$__compilerVar32 = '';
$__compilerVar33 = '';
$__compilerVar32 .= $this->callTemplateHook('ad_message_body', $__compilerVar33, array());
unset($__compilerVar33);
$__compilerVar31 .= $__compilerVar32;
unset($__compilerVar32);
$__compilerVar31 .= '
					' . $message['messageHtml'] . '
					<div class="messageTextEndMarker">&nbsp;</div>
				</blockquote>
			</article>
			
			' . $messageContentAfterTemplate . '
		</div>
		';
$__output .= $this->callTemplateHook('message_content', $__compilerVar31, array(
'message' => $message
));
unset($__compilerVar31);
$__output .= '
		
		';
if ($message['last_edit_date'])
{
$__output .= '
			<div class="editDate">
			';
if ($message['user_id'] == $message['last_edit_user_id'])
{
$__output .= '
				' . 'Chỉnh sửa cuối' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($message['last_edit_date'],array(
'time' => htmlspecialchars($message['last_edit_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else
{
$__output .= '
				' . 'Last edited by a moderator' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($message['last_edit_date'],array(
'time' => htmlspecialchars($message['last_edit_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
$__output .= '
			</div>
		';
}
$__output .= '
		
		';
if ($visitor['content_show_signature'] && $message['signature'])
{
$__output .= '
			<div class="baseHtml signature messageText ugc' . (($message['isIgnored']) ? (' ignored') : ('')) . '"><aside>' . $message['signatureHtml'] . '</aside></div>
		';
}
$__output .= '
		
		' . $messageAfterTemplate . '
		
		';
$__compilerVar34 = '';
$__output .= $this->callTemplateHook('dark_postrating_likes_bar', $__compilerVar34, array(
'post' => $message,
'message_id' => $messageId
));
unset($__compilerVar34);
$__output .= '
	</div>

	';
$__compilerVar35 = '';
$__output .= $this->callTemplateHook('message_below', $__compilerVar35, array(
'post' => $message,
'message_id' => $messageId
));
unset($__compilerVar35);
$__output .= '
	
	';
$__compilerVar36 = '';
$__compilerVar37 = '';
$__compilerVar36 .= $this->callTemplateHook('ad_message_below', $__compilerVar37, array());
unset($__compilerVar37);
$__output .= $__compilerVar36;
unset($__compilerVar36);
$__output .= '
';
$__compilerVar38 = '';
$__output .= $this->callTemplateCallback('DigitalPointAdPositioning_Callback_AdBelowPost', 'renderAd', $__compilerVar38, array(
'dp_ads' => $dp_ads
));
unset($__compilerVar38);
$__output .= '
</li>';
