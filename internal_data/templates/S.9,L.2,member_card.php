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
$__compilerVar5 = '';
$__compilerVar5 .= '
					';
if ($canEditUser)
{
$__compilerVar5 .= '<a href="' . XenForo_Template_Helper_Core::link('members/edit', $user, array()) . '">' . 'Sửa' . '</a>';
}
$__compilerVar5 .= '
					';
if ($canCleanSpam)
{
$__compilerVar5 .= '<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $user, array()) . '" class="OverlayTrigger">' . 'Spam' . '</a>';
}
$__compilerVar5 .= '
					';
if ($canWarn)
{
$__compilerVar5 .= '<a href="' . XenForo_Template_Helper_Core::link('members/warn', $user, array()) . '">' . 'Cảnh cáo' . '</a>';
}
$__compilerVar5 .= '
					';
if ($canBanUsers)
{
$__compilerVar5 .= '
						';
if ($user['is_banned'])
{
$__compilerVar5 .= '
							<a href="' . XenForo_Template_Helper_Core::adminLink('banning/users/lift', $user, array()) . '">' . 'Lift Ban' . '</a>
						';
}
else
{
$__compilerVar5 .= '
							<a href="' . XenForo_Template_Helper_Core::adminLink('banning/users/add', $user, array()) . '">' . 'Ban' . '</a>';
}
$__compilerVar5 .= '
						';
}
$__compilerVar5 .= '
				';
if (trim($__compilerVar5) !== '')
{
$__output .= '
			<div class="modControls" style="position:absolute; bottom:0px; right:0px">
				' . $__compilerVar5 . '
			</div>
		';
}
unset($__compilerVar5);
$__output .= '
	</div>
	
	<div class="userInfo">
		<h3 class="username">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',false,array(
'class' => 'NoOverlay'
))) . '</h3>';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar6 = '';
$__compilerVar6 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar6 .= '

	<ul class="ribbon-mc">
    
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1'))
{
$__compilerVar6 .= '
			<li class="ribbon1">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1Title') . '
			</li>
		';
}
$__compilerVar6 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2'))
{
$__compilerVar6 .= '
			<li class="ribbon2">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2Title') . '
			</li>
		';
}
$__compilerVar6 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3'))
{
$__compilerVar6 .= '
			<li class="ribbon3">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3Title') . '
			</li>
		';
}
$__compilerVar6 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4'))
{
$__compilerVar6 .= '
			<li class="ribbon4">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4Title') . '
			</li>
		';
}
$__compilerVar6 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5'))
{
$__compilerVar6 .= '
			<li class="ribbon5">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5Title') . '
			</li>
		';
}
$__compilerVar6 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6'))
{
$__compilerVar6 .= '
			<li class="ribbon6">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6Title') . '
			</li>
		';
}
$__compilerVar6 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7'))
{
$__compilerVar6 .= '
			<li class="ribbon7">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7Title') . '
			</li>
		';
}
$__compilerVar6 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8'))
{
$__compilerVar6 .= '
			<li class="ribbon8">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8Title') . '
			</li>
		';
}
$__compilerVar6 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9'))
{
$__compilerVar6 .= '
			<li class="ribbon9">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9Title') . '
			</li>
		';
}
$__compilerVar6 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10'))
{
$__compilerVar6 .= '
			<li class="ribbon10">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10Title') . '
			</li>
		';
}
$__compilerVar6 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11'))
{
$__compilerVar6 .= '
			<li class="ribbon11">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11Title') . '
			</li>
		';
}
$__compilerVar6 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12'))
{
$__compilerVar6 .= '
			<li class="ribbon12">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12Title') . '
			</li>
		';
}
$__compilerVar6 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13'))
{
$__compilerVar6 .= '
			<li class="ribbon13">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13Title') . '
			</li>
		';
}
$__compilerVar6 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14'))
{
$__compilerVar6 .= '
			<li class="ribbon14">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14Title') . '
			</li>
		';
}
$__compilerVar6 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $user,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15'))
{
$__compilerVar6 .= '
			<li class="ribbon15">
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15Title') . '
			</li>
		';
}
$__compilerVar6 .= '
		
	</ul>
';
}
$__compilerVar6 .= '

<br /><br />

';
$this->addRequiredExternal('css', 'UserRankRibbons_member_card');
$__compilerVar6 .= '

';
$__output .= $__compilerVar6;
unset($__compilerVar6);
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
$__compilerVar7 = '';
$__compilerVar7 .= '
			<a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '">' . 'Trang hồ sơ' . '</a>
			';
if ($visitor['user_id'] AND $user['user_id'] != $visitor['user_id'])
{
$__compilerVar7 .= '
				';
if ($canStartConversation)
{
$__compilerVar7 .= '<a href="' . XenForo_Template_Helper_Core::link('conversations/add', '', array(
'to' => $user['username']
)) . '">' . 'Bắt đầu đối thoại' . '</a>';
}
$__compilerVar7 .= '
				' . XenForo_Template_Helper_Core::callHelper('followhtml', array($user,array(
'user' => '$user',
'class' => 'Tooltip'
))) . '
				';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $user['user_id']
)))
{
$__compilerVar7 .= '<a href="' . XenForo_Template_Helper_Core::link('members/unignore', $user, array()) . '" class="FollowLink">' . 'Bỏ ra khỏi danh sách đen' . '</a>';
}
else if ($canIgnore)
{
$__compilerVar7 .= '<a href="' . XenForo_Template_Helper_Core::link('members/ignore', $user, array()) . '" class="FollowLink">' . 'Thêm vào danh sách đen' . '</a>';
}
$__compilerVar7 .= '
			';
}
$__compilerVar7 .= '
		';
$__output .= $this->callTemplateHook('member_card_links', $__compilerVar7, array());
unset($__compilerVar7);
$__output .= '
		</div>
		
		<dl class="userStats pairsInline">
		';
$__compilerVar8 = '';
$__compilerVar8 .= '
			<dt>' . 'Làm thành viên từ' . ':</dt> <dd>' . XenForo_Template_Helper_Core::date($user['register_date'], '') . '</dd>
			<!-- slot: pre_messages -->
			<dt>' . 'Bài viết' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $user['user_id']
)) . '" class="concealed" rel="nofollow">' . XenForo_Template_Helper_Core::numberFormat($user['message_count'], '0') . '</a></dd>
			<!-- slot: pre_likes -->
			<dt>' . 'Đã được thích' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($user['like_count'], '0') . '</dd>
			<!-- slot: pre_trophies -->
			<dt>' . 'Điểm thành tích' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('members/trophies', $user, array()) . '" class="concealed OverlayTrigger">' . XenForo_Template_Helper_Core::numberFormat($user['trophy_points'], '0') . '</a></dd>
			';
if ($canViewWarnings)
{
$__compilerVar8 .= '
				<dt>' . 'Điểm cảnh cáo' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '#warnings" class="concealed">' . XenForo_Template_Helper_Core::numberFormat($user['warning_points'], '0') . '</a></dd>
			';
}
$__compilerVar8 .= '
		
';
if ($user['resource_count'] AND $canViewResources)
{
$__compilerVar8 .= '<dt>' . 'Tài nguyên' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('resources/authors', $user, array()) . '" class="concealed">' . XenForo_Template_Helper_Core::numberFormat($user['resource_count'], '0') . '</a></dd>';
}
$__compilerVar8 .= '
';
$__output .= $this->callTemplateHook('member_card_stats', $__compilerVar8, array());
unset($__compilerVar8);
$__output .= '
		</dl>
	
		';
if ($canViewOnlineStatus)
{
$__output .= '
			<dl class="pairsInline lastActivity">
				<dt>' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' được nhìn thấy lần cuối' . ':</dt>
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
							' . 'Đang xem trang không xác định' . ',
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
