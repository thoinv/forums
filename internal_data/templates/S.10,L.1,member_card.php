<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '
';
$this->addRequiredExternal('css', 'member_card');
$__output .= '

<div id="memberCard' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') . '" data-overlayClass="memberCard">
	<div class="avatarCropper">
		<a class="avatar NoOverlay Av' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') . 'l" href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '">
			<img src="' . XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $user,
'1' => 'l'
)) . '" alt="" style="' . XenForo_Template_Helper_Core::callHelper('avatarCropCss', array(
'0' => $user
)) . '" />
		</a>
		';
$__compilerVar1 = '';
$__compilerVar1 .= '
					';
if ($canEditUser)
{
$__compilerVar1 .= '<a href="' . XenForo_Template_Helper_Core::link('members/edit', $user, array()) . '">' . 'Edit' . '</a>';
}
$__compilerVar1 .= '
					';
if ($canCleanSpam)
{
$__compilerVar1 .= '<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $user, array()) . '" class="OverlayTrigger">' . 'Spam' . '</a>';
}
$__compilerVar1 .= '
					';
if ($canWarn)
{
$__compilerVar1 .= '<a href="' . XenForo_Template_Helper_Core::link('members/warn', $user, array()) . '">' . 'Warn' . '</a>';
}
$__compilerVar1 .= '
					';
if ($canBanUsers)
{
$__compilerVar1 .= '
						';
if ($user['is_banned'])
{
$__compilerVar1 .= '
							<a href="' . XenForo_Template_Helper_Core::adminLink('banning/users/lift', $user, array()) . '">' . 'Lift Ban' . '</a>
						';
}
else
{
$__compilerVar1 .= '
							<a href="' . XenForo_Template_Helper_Core::adminLink('banning/users/add', $user, array()) . '">' . 'Ban' . '</a>';
}
$__compilerVar1 .= '
						';
}
$__compilerVar1 .= '
				';
if (trim($__compilerVar1) !== '')
{
$__output .= '
			<div class="modControls" style="position:absolute; bottom:0px; right:0px">
				' . $__compilerVar1 . '
			</div>
		';
}
unset($__compilerVar1);
$__output .= '
	</div>
	
	<div class="userInfo">
		<h3 class="username">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',false,array(
'class' => 'NoOverlay'
))) . '</h3>';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar2 = '';
$__compilerVar2 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar2 .= '

	<ul class="ribbon-mc">
    
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1'))
{
$__compilerVar2 .= '
			<li class="ribbon1">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1Title') . '
			</li>
		';
}
$__compilerVar2 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2'))
{
$__compilerVar2 .= '
			<li class="ribbon2">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2Title') . '
			</li>
		';
}
$__compilerVar2 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3'))
{
$__compilerVar2 .= '
			<li class="ribbon3">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3Title') . '
			</li>
		';
}
$__compilerVar2 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4'))
{
$__compilerVar2 .= '
			<li class="ribbon4">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4Title') . '
			</li>
		';
}
$__compilerVar2 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5'))
{
$__compilerVar2 .= '
			<li class="ribbon5">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5Title') . '
			</li>
		';
}
$__compilerVar2 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6'))
{
$__compilerVar2 .= '
			<li class="ribbon6">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6Title') . '
			</li>
		';
}
$__compilerVar2 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7'))
{
$__compilerVar2 .= '
			<li class="ribbon7">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7Title') . '
			</li>
		';
}
$__compilerVar2 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8'))
{
$__compilerVar2 .= '
			<li class="ribbon8">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8Title') . '
			</li>
		';
}
$__compilerVar2 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9'))
{
$__compilerVar2 .= '
			<li class="ribbon9">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9Title') . '
			</li>
		';
}
$__compilerVar2 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10'))
{
$__compilerVar2 .= '
			<li class="ribbon10">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10Title') . '
			</li>
		';
}
$__compilerVar2 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11'))
{
$__compilerVar2 .= '
			<li class="ribbon11">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11Title') . '
			</li>
		';
}
$__compilerVar2 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12'))
{
$__compilerVar2 .= '
			<li class="ribbon12">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12Title') . '
			</li>
		';
}
$__compilerVar2 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13'))
{
$__compilerVar2 .= '
			<li class="ribbon13">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13Title') . '
			</li>
		';
}
$__compilerVar2 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14'))
{
$__compilerVar2 .= '
			<li class="ribbon14">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14Title') . '
			</li>
		';
}
$__compilerVar2 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15'))
{
$__compilerVar2 .= '
			<li class="ribbon15">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15Title') . '
			</li>
		';
}
$__compilerVar2 .= '
		
	</ul>
';
}
$__compilerVar2 .= '

<br /><br />

';
$this->addRequiredExternal('css', 'UserRankRibbons_member_card');
$__compilerVar2 .= '

';
$__output .= $__compilerVar2;
unset($__compilerVar2);
}
$__output .= '
		
		<div class="userTitleBlurb">
			<h4 class="userTitle">' . XenForo_Template_Helper_Core::callHelper('userTitle', array(
'0' => $user
)) . '</h4>
			<div class="userBlurb">' . XenForo_Template_Helper_Core::callHelper('userBlurb', array(
'0' => $user,
'1' => '0'
)) . '</div>
		</div>
		
		<blockquote class="status">' . XenForo_Template_Helper_Core::callHelper('bodytext', array(
'0' => $user['status']
)) . '</blockquote>

		<div class="userLinks">
		';
$__compilerVar3 = '';
$__compilerVar3 .= '
			<a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '">' . 'Profile Page' . '</a>
			';
if ($visitor['user_id'] AND $user['user_id'] != $visitor['user_id'])
{
$__compilerVar3 .= '
				';
if ($canStartConversation)
{
$__compilerVar3 .= '<a href="' . XenForo_Template_Helper_Core::link('conversations/add', '', array(
'to' => $user['username']
)) . '">' . 'Start a Conversation' . '</a>';
}
$__compilerVar3 .= '
				' . XenForo_Template_Helper_Core::callHelper('followhtml', array($user,array(
'user' => '$user',
'class' => 'Tooltip'
))) . '
				';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $user['user_id']
)))
{
$__compilerVar3 .= '<a href="' . XenForo_Template_Helper_Core::link('members/unignore', $user, array()) . '" class="FollowLink">' . 'Unignore' . '</a>';
}
else if ($canIgnore)
{
$__compilerVar3 .= '<a href="' . XenForo_Template_Helper_Core::link('members/ignore', $user, array()) . '" class="FollowLink">' . 'Ignore' . '</a>';
}
$__compilerVar3 .= '
			';
}
$__compilerVar3 .= '
		';
$__output .= $this->callTemplateHook('member_card_links', $__compilerVar3, array());
unset($__compilerVar3);
$__output .= '
		</div>
		
		<dl class="userStats pairsInline">
		';
$__compilerVar4 = '';
$__compilerVar4 .= '
			<dt>' . 'Member Since' . ':</dt> <dd>' . XenForo_Template_Helper_Core::date($user['register_date'], '') . '</dd>
			<!-- slot: pre_messages -->
			<dt>' . 'Messages' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $user['user_id']
)) . '" class="concealed" rel="nofollow">' . XenForo_Template_Helper_Core::numberFormat($user['message_count'], '0') . '</a></dd>
			<!-- slot: pre_likes -->
			<dt>' . 'Likes Received' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($user['like_count'], '0') . '</dd>
			<!-- slot: pre_trophies -->
			<dt>' . 'Trophy Points' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('members/trophies', $user, array()) . '" class="concealed OverlayTrigger">' . XenForo_Template_Helper_Core::numberFormat($user['trophy_points'], '0') . '</a></dd>
			';
if ($canViewWarnings)
{
$__compilerVar4 .= '
				<dt>' . 'Warning Points' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '#warnings" class="concealed">' . XenForo_Template_Helper_Core::numberFormat($user['warning_points'], '0') . '</a></dd>
			';
}
$__compilerVar4 .= '
		
';
if ($user['resource_count'] AND $canViewResources)
{
$__compilerVar4 .= '<dt>' . 'Tài nguyên' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('resources/authors', $user, array()) . '" class="concealed">' . XenForo_Template_Helper_Core::numberFormat($user['resource_count'], '0') . '</a></dd>';
}
$__compilerVar4 .= '
';
$__output .= $this->callTemplateHook('member_card_stats', $__compilerVar4, array());
unset($__compilerVar4);
$__output .= '
		</dl>
	
		';
if ($canViewOnlineStatus)
{
$__output .= '
			<dl class="pairsInline lastActivity">
				<dt>' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' was last seen' . ':</dt>
				<dd>
					';
if ($user['activity'] AND $canViewCurrentActivity)
{
$__output .= '
						';
if ($user['activity']['description'])
{
$__output .= '
							' . htmlspecialchars($user['activity']['description'], ENT_QUOTES, 'UTF-8');
if ($user['activity']['itemTitle'])
{
$__output .= ' <em><a href="' . htmlspecialchars($user['activity']['itemUrl'], ENT_QUOTES, 'UTF-8') . '" class="concealed">' . htmlspecialchars($user['activity']['itemTitle'], ENT_QUOTES, 'UTF-8') . '</a></em>';
}
$__output .= ',
						';
}
else
{
$__output .= '
							' . 'Viewing unknown page' . ',
						';
}
$__output .= '
						' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($user['effective_last_activity'],array(
'time' => htmlspecialchars($user['effective_last_activity'], ENT_QUOTES, 'UTF-8'),
'class' => 'muted'
))) . '
					';
}
else
{
$__output .= '
						' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($user['effective_last_activity'],array(
'time' => htmlspecialchars($user['effective_last_activity'], ENT_QUOTES, 'UTF-8')
))) . '
					';
}
$__output .= '
				</dd>
			</dl>
		';
}
$__output .= '
	</div>
	
	<a class="close OverlayCloser"></a>
</div>';
