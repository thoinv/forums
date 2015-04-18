<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

';
$__compilerVar21 = '';
$__compilerVar21 .= '
<div id="header">
	';
$__compilerVar22 = '';
$__compilerVar22 .= '<div id="logoBlock">
	<div class="pageWidth">
	
		<div class="pageContent">
			';
$__compilerVar23 = '';
$__compilerVar24 = '';
$__compilerVar23 .= $this->callTemplateHook('ad_header', $__compilerVar24, array());
unset($__compilerVar24);
$__compilerVar22 .= $__compilerVar23;
unset($__compilerVar23);
$__compilerVar22 .= '
			';
$__compilerVar25 = '';
$__compilerVar25 .= '
			<div id="logo"><a href="' . htmlspecialchars($logoLink, ENT_QUOTES, 'UTF-8') . '">
				<span></span>
				';
$doodle = XenForo_Template_Helper_Core::callHelper('doodle', array());
$__compilerVar25 .= '
';
if ($doodle)
{
$__compilerVar25 .= '
	';
if ($doodle['link'])
{
$__compilerVar25 .= '
	<a href="' . htmlspecialchars($doodle['link'], ENT_QUOTES, 'UTF-8') . '"><img src="' . htmlspecialchars($doodle['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" /></a>
	';
}
else
{
$__compilerVar25 .= '
	<img src="' . htmlspecialchars($doodle['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__compilerVar25 .= '
';
}
else
{
$__compilerVar25 .= '
	<img src="' . XenForo_Template_Helper_Core::styleProperty('headerLogoPath') . '" alt="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
';
}
$__compilerVar25 .= '
				
			</a></div>
			';
$__compilerVar22 .= $this->callTemplateHook('header_logo', $__compilerVar25, array());
unset($__compilerVar25);
$__compilerVar22 .= '
			<span class="helper"></span>
		</div>
	</div>
	
</div>';
$__compilerVar21 .= $__compilerVar22;
unset($__compilerVar22);
$__compilerVar21 .= '
	';
$__compilerVar26 = '';
$__compilerVar26 .= '

<div id="navigation" class="pageWidth ' . (($canSearch) ? ('withSearch') : ('')) . '">
	<div class="pageContent">
		<nav>

<div class="navTabs">
	<ul class="publicTabs">
	
		<!-- home -->
		<!--
		';
if ($showHomeLink)
{
$__compilerVar26 .= '
			<li class="navTab home PopupClosed"><a href="' . htmlspecialchars($homeLink, ENT_QUOTES, 'UTF-8') . '" class="navLink">' . 'Trang chủ' . '</a></li>
		';
}
$__compilerVar26 .= '
		-->
		
		<!-- extra tabs: home -->
		';
if ($extraTabs['home'])
{
$__compilerVar26 .= '
		';
foreach ($extraTabs['home'] AS $extraTabId => $extraTab)
{
$__compilerVar26 .= '
			';
if ($extraTab['linksTemplate'])
{
$__compilerVar26 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__compilerVar26 .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__compilerVar26 .= '</a>
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="SplitCtrl" rel="Menu"></a>
				
				<div class="' . (($extraTab['selected']) ? ('tabLinks') : ('Menu JsOnly tabMenu')) . ' ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . 'TabLinks">
					<div class="primaryContent menuHeader">
						<h3>' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8') . '</h3>
						<div class="muted">' . 'Liên kết nhanh' . '</div>
					</div>
					' . $extraTab['linksTemplate'] . '
				</div>
			</li>
			';
}
else
{
$__compilerVar26 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('PopupClosed')) . '">
					<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__compilerVar26 .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__compilerVar26 .= '</a>
					';
if ($extraTab['selected'])
{
$__compilerVar26 .= '<div class="tabLinks"></div>';
}
$__compilerVar26 .= '
				</li>
			';
}
$__compilerVar26 .= '
		';
}
$__compilerVar26 .= '
		';
}
$__compilerVar26 .= '
		
		
		<!-- forums -->
		';
if ($tabs['forums'])
{
$__compilerVar26 .= '
			<li class="navTab forums ' . (($tabs['forums']['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($tabs['forums']['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($tabs['forums']['title'], ENT_QUOTES, 'UTF-8') . '</a>
				<a href="' . htmlspecialchars($tabs['forums']['href'], ENT_QUOTES, 'UTF-8') . '" class="SplitCtrl" rel="Menu"></a>
				
				<div class="' . (($tabs['forums']['selected']) ? ('tabLinks') : ('Menu JsOnly tabMenu')) . ' forumsTabLinks">
					<div class="primaryContent menuHeader">
						<h3>' . htmlspecialchars($tabs['forums']['title'], ENT_QUOTES, 'UTF-8') . '</h3>
						<div class="muted">' . 'Liên kết nhanh' . '</div>
					</div>
					<ul class="secondaryContent blockLinksList">
					';
$__compilerVar27 = '';
$__compilerVar27 .= '
						';
if ($visitor['user_id'])
{
$__compilerVar27 .= '<li><a href="' . XenForo_Template_Helper_Core::link('forums/-/mark-read', $forum, array(
'date' => $serverTime
)) . '" class="OverlayTrigger">' . 'Đánh dấu đã đọc' . '</a></li>';
}
$__compilerVar27 .= '
						';
if ($canSearch)
{
$__compilerVar27 .= '<li><a href="' . XenForo_Template_Helper_Core::link('search', '', array(
'type' => 'post'
)) . '">' . 'Tìm kiếm diễn đàn' . '</a></li>';
}
$__compilerVar27 .= '
						';
if ($visitor['user_id'])
{
$__compilerVar27 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('watched/forums', false, array()) . '">' . 'Chủ đề đã đọc' . '</a></li>
							<li><a href="' . XenForo_Template_Helper_Core::link('watched/threads', false, array()) . '">' . 'Chủ đề đang theo dõi' . '</a></li>
						';
}
$__compilerVar27 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('find-new/posts', false, array()) . '" rel="nofollow">' . (($visitor['user_id']) ? ('Bài viết mới') : ('Bài viết gần đây')) . ' ';
$__compilerVar28 = '';
if ($visitor['user_id'])
{
$__compilerVar28 .= '
	';
$this->addRequiredExternal('css', 'unread_posts_count');
$__compilerVar28 .= '

	';
$unread = '';
$__compilerVar29 = '';
$unread .= $this->callTemplateCallback('UnreadPostCount_Callback', 'getUnreadCount', $__compilerVar29, array());
unset($__compilerVar29);
$__compilerVar28 .= '
	
	<span class="postItemCount' . (($unread) ? (' alert') : ('')) . '">
		' . XenForo_Template_Helper_Core::numberFormat($unread, '0') . '
	</span>
';
}
$__compilerVar27 .= $__compilerVar28;
unset($__compilerVar28);
$__compilerVar27 .= '</a></li>
					';
$__compilerVar26 .= $this->callTemplateHook('navigation_tabs_forums', $__compilerVar27, array());
unset($__compilerVar27);
$__compilerVar26 .= '
					</ul>
				</div>
			</li>
		';
}
$__compilerVar26 .= '
		
		
		<!-- extra tabs: middle -->
		';
if ($extraTabs['middle'])
{
$__compilerVar26 .= '
		';
foreach ($extraTabs['middle'] AS $extraTabId => $extraTab)
{
$__compilerVar26 .= '
			';
if ($extraTab['linksTemplate'])
{
$__compilerVar26 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__compilerVar26 .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__compilerVar26 .= '</a>
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="SplitCtrl" rel="Menu"></a>
				
				<div class="' . (($extraTab['selected']) ? ('tabLinks') : ('Menu JsOnly tabMenu')) . ' ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . 'TabLinks">
					<div class="primaryContent menuHeader">
						<h3>' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8') . '</h3>
						<div class="muted">' . 'Liên kết nhanh' . '</div>
					</div>
					' . $extraTab['linksTemplate'] . '
				</div>
			</li>
			';
}
else
{
$__compilerVar26 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('PopupClosed')) . '">
					<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__compilerVar26 .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__compilerVar26 .= '</a>
					';
if ($extraTab['selected'])
{
$__compilerVar26 .= '<div class="tabLinks"></div>';
}
$__compilerVar26 .= '
				</li>
			';
}
$__compilerVar26 .= '
		';
}
$__compilerVar26 .= '
		';
}
$__compilerVar26 .= '
		
		
		<!-- members -->

		';
if ($tabs['members'])
{
$__compilerVar26 .= '
			<li class="navTab members ' . (($tabs['members']['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($tabs['members']['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($tabs['members']['title'], ENT_QUOTES, 'UTF-8') . '</a>
				<a href="' . htmlspecialchars($tabs['members']['href'], ENT_QUOTES, 'UTF-8') . '" class="SplitCtrl" rel="Menu"></a>
				
				<div class="' . (($tabs['members']['selected']) ? ('tabLinks') : ('Menu JsOnly tabMenu')) . ' membersTabLinks">
					<div class="primaryContent menuHeader">
						<h3>' . htmlspecialchars($tabs['members']['title'], ENT_QUOTES, 'UTF-8') . '</h3>
						<div class="muted">' . 'Liên kết nhanh' . '</div>
					</div>
					<ul class="secondaryContent blockLinksList">
					';
$__compilerVar30 = '';
$__compilerVar30 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Thành viên tiêu biểu' . '</a></li>
						';
if ($xenOptions['enableMemberList'])
{
$__compilerVar30 .= '<li><a href="' . XenForo_Template_Helper_Core::link('members/list', false, array()) . '">' . 'Thành viên đã đăng ký' . '</a></li>';
}
$__compilerVar30 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '">' . 'Đang truy cập' . '</a></li>
						';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar30 .= '<li><a href="' . XenForo_Template_Helper_Core::link('recent-activity', false, array()) . '">' . 'Hoạt động gần đây' . '</a></li>';
}
$__compilerVar30 .= '
<li><a href="' . XenForo_Template_Helper_Core::link('members/usermap', false, array()) . '">' . 'User Map' . '</a></li>
						';
if ($canViewProfilePosts)
{
$__compilerVar30 .= '<li><a href="' . XenForo_Template_Helper_Core::link('find-new/profile-posts', false, array()) . '">' . 'New Profile Posts' . '</a></li>';
}
$__compilerVar30 .= '
					';
$__compilerVar26 .= $this->callTemplateHook('navigation_tabs_members', $__compilerVar30, array());
unset($__compilerVar30);
$__compilerVar26 .= '
					</ul>
				</div>
			</li>
		';
}
$__compilerVar26 .= '				
		
		<!-- extra tabs: end -->
		';
if ($extraTabs['end'])
{
$__compilerVar26 .= '
		';
foreach ($extraTabs['end'] AS $extraTabId => $extraTab)
{
$__compilerVar26 .= '
			';
if ($extraTab['linksTemplate'])
{
$__compilerVar26 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__compilerVar26 .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__compilerVar26 .= '</a>
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="SplitCtrl" rel="Menu"></a>
				
				<div class="' . (($extraTab['selected']) ? ('tabLinks') : ('Menu JsOnly tabMenu')) . ' ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . 'TabLinks">
					<div class="primaryContent menuHeader">
						<h3>' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8') . '</h3>
						<div class="muted">' . 'Liên kết nhanh' . '</div>
					</div>
					' . $extraTab['linksTemplate'] . '
				</div>
			</li>
			';
}
else
{
$__compilerVar26 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('PopupClosed')) . '">
					<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__compilerVar26 .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__compilerVar26 .= '</a>
					';
if ($extraTab['selected'])
{
$__compilerVar26 .= '<div class="tabLinks"></div>';
}
$__compilerVar26 .= '
				</li>
			';
}
$__compilerVar26 .= '
		';
}
$__compilerVar26 .= '
		';
}
$__compilerVar26 .= '
                
                
                <!-- responsive popup -->
		<li class="navTab navigationHiddenTabs Popup PopupControl PopupClosed" style="display:none">	
						
			<a rel="Menu" class="navLink NoPopupGadget"><span class="menuIcon">' . 'Menu' . '</span></a>
			
			<div class="Menu JsOnly blockLinksList primaryContent" id="NavigationHiddenMenu"></div>
		</li>
			
		
		<!-- no selection -->
		';
if (!$selectedTab)
{
$__compilerVar26 .= '
			<li class="navTab selected"><div class="tabLinks"></div></li>
		';
}
$__compilerVar26 .= '
		
	</ul>
	
	';
if ($visitor['user_id'])
{
$__compilerVar31 = '';
$__compilerVar31 .= '

<ul class="visitorTabs">

	';
$__compilerVar32 = '';
$__compilerVar31 .= $this->callTemplateHook('navigation_visitor_tabs_start', $__compilerVar32, array());
unset($__compilerVar32);
$__compilerVar31 .= '

	<!-- account -->
	<li class="navTab account Popup PopupControl PopupClosed ' . (($tabs['account']['selected']) ? ('selected') : ('')) . '">

		';
$visitorHiddenUnread = ($visitor['alerts_unread'] + $visitor['conversations_unread']);
$__compilerVar31 .= '
		<a href="' . XenForo_Template_Helper_Core::link('account', false, array()) . '" class="navLink accountPopup NoPopupGadget" rel="Menu"><img src="' . XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $visitor,
'1' => 's'
)) . '" class="miniMe" alt="' . htmlspecialchars($visitor_username, ENT_QUOTES, 'UTF-8') . '" /><strong class="accountUsername">' . htmlspecialchars($visitor['username'], ENT_QUOTES, 'UTF-8') . '</strong>
			<strong class="itemCount ResponsiveOnly ' . (($visitorHiddenUnread) ? ('') : ('Zero')) . '"
				id="VisitorExtraMenu_Counter">
				<span class="Total">' . XenForo_Template_Helper_Core::numberFormat($visitorHiddenUnread, '0') . '</span>
				<span class="arrow"></span>
			</strong>
		</a>
		
		<div class="Menu JsOnly" id="AccountMenu">
			<div class="primaryContent menuHeader">
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,false,array(
'user' => '$visitor',
'size' => 'm',
'class' => 'NoOverlay plainImage',
'title' => 'Xem hồ sơ của bạn'
),'')) . '
				
				<h3><a href="' . XenForo_Template_Helper_Core::link('members', $visitor, array()) . '" class="concealed" title="' . 'Xem hồ sơ của bạn' . '">' . htmlspecialchars($visitor['username'], ENT_QUOTES, 'UTF-8') . '</a></h3>
				
				';
$__compilerVar33 = '';
$__compilerVar33 .= XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $visitor
));
if (trim($__compilerVar33) !== '')
{
$__compilerVar31 .= '<div class="muted">' . $__compilerVar33 . '</div>';
}
unset($__compilerVar33);
$__compilerVar31 .= '
				
				<ul class="links">
					<li class="fl"><a href="' . XenForo_Template_Helper_Core::link('members', $visitor, array()) . '">' . 'Trang hồ sơ của bạn' . '</a></li>
				</ul>
			</div>
			<div class="menuColumns secondaryContent">
				<ul class="col1 blockLinksList">
				';
$__compilerVar34 = '';
$__compilerVar34 .= '
					';
if ($canEditProfile)
{
$__compilerVar34 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Chi tiết cá nhân' . '</a></li>';
}
$__compilerVar34 .= '
					';
if ($canEditSignature)
{
$__compilerVar34 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/signature', false, array()) . '">' . 'Chữ ký' . '</a></li>';
}
$__compilerVar34 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('account/contact-details', false, array()) . '">' . 'Chi tiết liên hệ' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/privacy', false, array()) . '">' . 'Bảo mật cá nhân' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/preferences', false, array()) . '" class="OverlayTrigger">' . 'Tùy chọn' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/alert-preferences', false, array()) . '">' . 'Thiết lập thông báo' . '</a></li>
					';
if ($canUploadAvatar)
{
$__compilerVar34 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/avatar', false, array()) . '" class="OverlayTrigger" data-cacheOverlay="true">' . 'Avatar' . '</a></li>';
}
$__compilerVar34 .= '
					';
if ($xenOptions['facebookAppId'] OR $xenOptions['twitterAppKey'] OR $xenOptions['googleClientId'])
{
$__compilerVar34 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/external-accounts', false, array()) . '">' . 'External Accounts' . '</a></li>';
}
$__compilerVar34 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('account/security', false, array()) . '">' . 'Mật khẩu' . '</a></li>
				';
$__compilerVar31 .= $this->callTemplateHook('navigation_visitor_tab_links1', $__compilerVar34, array());
unset($__compilerVar34);
$__compilerVar31 .= '
				</ul>
				<ul class="col2 blockLinksList">
				';
$__compilerVar35 = '';
$__compilerVar35 .= '
					';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar35 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Thông tin bạn' . '</a></li>';
}
$__compilerVar35 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Đối thoại' . '
						<strong class="itemCount ' . (($visitor['conversations_unread']) ? ('') : ('Zero')) . '"
							id="VisitorExtraMenu_ConversationsCounter">
							<span class="Total">' . XenForo_Template_Helper_Core::numberFormat($visitor['conversations_unread'], '0') . '</span>
						</strong></a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '">' . 'Thông báo' . '
						<strong class="itemCount ' . (($visitor['alerts_unread']) ? ('') : ('Zero')) . '"
							id="VisitorExtraMenu_AlertsCounter">
							<span class="Total">' . XenForo_Template_Helper_Core::numberFormat($visitor['alerts_unread'], '0') . '</span>
						</strong></a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/likes', false, array()) . '">' . 'Được thích' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id']
)) . '">' . 'Nội dung của bạn' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '">' . 'Theo dõi' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/ignored', false, array()) . '">' . 'Danh sách đen' . '</a></li>
					';
if ($xenCache['userUpgradeCount'])
{
$__compilerVar35 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/upgrades', false, array()) . '">' . 'Account Upgrades' . '</a></li>';
}
$__compilerVar35 .= '
';
if ($visitor['permissions']['linkCheckGroupID']['linkCheckID'])
{
$__compilerVar35 .= '
<a href="' . XenForo_Template_Helper_Core::link('linkcheck/', false, array()) . '">' . 'Link Check' . '</a>
';
}
$__compilerVar35 .= '
';
if ($visitor['permissions']['userAgentGroupID']['userAgentID'] AND $xenOptions['userAgentVisitorTabLink'])
{
$__compilerVar35 .= '
<a href="' . XenForo_Template_Helper_Core::link('useragent/', false, array()) . '">' . 'User Agent' . '</a>
';
}
$__compilerVar35 .= '
';
if ($xenOptions['viewMapVisitorTabLink'])
{
$__compilerVar35 .= '
<a href="' . XenForo_Template_Helper_Core::link('viewmap/', false, array()) . '">' . 'View Map' . '</a>
';
}
$__compilerVar35 .= '
				';
$__compilerVar31 .= $this->callTemplateHook('navigation_visitor_tab_links2', $__compilerVar35, array());
unset($__compilerVar35);
$__compilerVar31 .= '
				</ul>
			</div>
			<div class="menuColumns secondaryContent">
				<ul class="col1 blockLinksList">
					<li>				
						<form action="' . XenForo_Template_Helper_Core::link('account/toggle-visibility', false, array()) . '" method="post" class="AutoValidator visibilityForm">
							<label><input type="checkbox" name="visible" value="1" class="SubmitOnChange" ' . (($visitor['visible']) ? ' checked="checked"' : '') . ' />
								' . 'Hiển thị online' . '</label>
							<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
						</form>
					</li>
				</ul>
				<ul class="col2 blockLinksList">
					<li><a href="' . XenForo_Template_Helper_Core::link('logout', '', array(
'_xfToken' => $visitor['csrf_token_page']
)) . '" class="LogOut">' . 'Thoát' . '</a></li>
				</ul>
			</div>
			';
if ($canUpdateStatus)
{
$__compilerVar31 .= '
				<form action="' . XenForo_Template_Helper_Core::link('members/post', $visitor, array()) . '" method="post" class="sectionFooter statusPoster AutoValidator" data-optInOut="OptIn">
					<textarea name="message" class="textCtrl StatusEditor UserTagger Elastic" placeholder="' . 'Cập nhật trạng thái' . '..." rows="1" cols="40" style="height:18px" data-statusEditorCounter="#visMenuSEdCount" data-nofocus="true"></textarea>
					<div class="submitUnit">
						<span id="visMenuSEdCount" title="' . 'Số ký tự còn lại' . '"></span>
						<input type="submit" class="button primary MenuCloser" value="' . 'Đăng' . '" />
						<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
						<input type="hidden" name="return" value="1" /> 
					</div>
				</form>
			';
}
$__compilerVar31 .= '
		</div>		
	</li>
		
	';
if ($tabs['account']['selected'])
{
$__compilerVar31 .= '
	<li class="navTab selected">
		<div class="tabLinks">
			<ul class="secondaryContent blockLinksList">
			';
$__compilerVar36 = '';
$__compilerVar36 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Chi tiết cá nhân' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Đối thoại' . '</a></li>
				';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar36 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Thông tin bạn' . '</a></li>';
}
$__compilerVar36 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('account/likes', false, array()) . '">' . 'Được thích' . '</a></li>
			';
$__compilerVar31 .= $this->callTemplateHook('navigation_tabs_account', $__compilerVar36, array());
unset($__compilerVar36);
$__compilerVar31 .= '
			</ul>
		</div>
	</li>
	';
}
$__compilerVar31 .= '
	
	<!-- conversations popup -->
	<li class="navTab inbox Popup PopupControl PopupClosed ' . (($tabs['inbox']['selected']) ? ('selected') : ('')) . '">
					
		<a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '" rel="Menu" class="navLink NoPopupGadget">' . 'Hộp thư' . '
			<strong class="itemCount ' . (($visitor['conversations_unread']) ? ('') : ('Zero')) . '"
				id="ConversationsMenu_Counter" data-text="' . 'Bạn có %d đối thoại mới chưa đọc.' . '">
				<span class="Total">' . XenForo_Template_Helper_Core::numberFormat($visitor['conversations_unread'], '0') . '</span>
				<span class="arrow"></span>
			</strong>
		</a>
		
		<div class="Menu JsOnly navPopup" id="ConversationsMenu"
			data-contentSrc="' . XenForo_Template_Helper_Core::link('conversations/popup', false, array()) . '"
			data-contentDest="#ConversationsMenu .listPlaceholder">
			
			<div class="menuHeader primaryContent">
				<h3>
					<span class="Progress InProgress"></span>
					<a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '" class="concealed">' . 'Đối thoại' . '</a>
				</h3>						
			</div>
			
			<div class="listPlaceholder"></div>
			
			<div class="sectionFooter">
				';
if ($canStartConversation)
{
$__compilerVar31 .= '<a href="' . XenForo_Template_Helper_Core::link('conversations/add', false, array()) . '" class="floatLink">' . 'Bắt đầu đối thoại mới' . '</a>';
}
$__compilerVar31 .= '
				<a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Xem tất cả' . '...</a>
			</div>
		</div>
	</li>
	
	';
if ($tabs['inbox']['selected'])
{
$__compilerVar31 .= '
	<li class="navTab selected">
		<div class="tabLinks">
			<ul class="secondaryContent blockLinksList">
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Đối thoại' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations/starred', false, array()) . '">' . 'Starred Conversations' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations/yours', false, array()) . '">' . 'Conversations You Started' . '</a></li>
			</ul>
		</div>
	</li>
	';
}
$__compilerVar31 .= '
	
	';
$__compilerVar37 = '';
$__compilerVar31 .= $this->callTemplateHook('navigation_visitor_tabs_middle', $__compilerVar37, array());
unset($__compilerVar37);
$__compilerVar31 .= '
	
	<!-- alerts popup -->
	<li class="navTab alerts Popup PopupControl PopupClosed">	
					
		<a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '" rel="Menu" class="navLink NoPopupGadget">' . 'Thông báo' . '
			<strong class="itemCount ' . (($visitor['alerts_unread']) ? ('') : ('Zero')) . '"
				id="AlertsMenu_Counter" data-text="' . 'Bạn có %d thông báo mới.' . '">
				<span class="Total">' . XenForo_Template_Helper_Core::numberFormat($visitor['alerts_unread'], '0') . '</span>
				<span class="arrow"></span>
			</strong>
		</a>
		
		<div class="Menu JsOnly navPopup" id="AlertsMenu"
			data-contentSrc="' . XenForo_Template_Helper_Core::link('account/alerts-popup', false, array()) . '"
			data-contentDest="#AlertsMenu .listPlaceholder"
			data-removeCounter="#AlertsMenu_Counter">
			
			<div class="menuHeader primaryContent">
				<h3>
					<span class="Progress InProgress"></span>
					<a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '" class="concealed">' . 'Thông báo' . '</a>
				</h3>
			</div>
			
			<div class="listPlaceholder"></div>
			
			<div class="sectionFooter">
				<a href="' . XenForo_Template_Helper_Core::link('account/alert-preferences', false, array()) . '" class="floatLink">' . 'Thiết lập thông báo' . '</a>
				<a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '">' . 'Xem tất cả' . '...</a>
			</div>
		</div>
	</li>
	
	';
$__compilerVar38 = '';
$__compilerVar31 .= $this->callTemplateHook('navigation_visitor_tabs_end', $__compilerVar38, array());
unset($__compilerVar38);
$__compilerVar31 .= '
</ul>';
$__compilerVar26 .= $__compilerVar31;
unset($__compilerVar31);
}
$__compilerVar26 .= '
</div>

<span class="helper"></span>
			
		</nav>	
	</div>
</div>';
$__compilerVar21 .= $__compilerVar26;
unset($__compilerVar26);
$__compilerVar21 .= '
	';
if ($canSearch)
{
$__compilerVar39 = '';
$__compilerVar39 .= '

<div id="searchBar" class="pageWidth">
	';
$__compilerVar40 = '';
$__compilerVar40 .= '
	<span id="QuickSearchPlaceholder" title="' . 'Tìm kiếm' . '">' . 'Tìm kiếm' . '</span>
	<fieldset id="QuickSearch">
		<form action="' . XenForo_Template_Helper_Core::link('search/search', false, array()) . '" method="post" class="formPopup">
			
			<div class="primaryControls">
				<!-- block: primaryControls -->
				<input type="search" name="keywords" value="" class="textCtrl" placeholder="' . 'Tìm kiếm' . '..." results="0" title="' . 'Nhập từ khóa và ấn Enter' . '" id="QuickSearchQuery" />				
				<!-- end block: primaryControls -->
			</div>
			
			<div class="secondaryControls">
				<div class="controlsWrapper">
				
					<!-- block: secondaryControls -->
					<dl class="ctrlUnit">
						<dt></dt>
						<dd><ul>
							<li><label><input type="checkbox" name="title_only" value="1"
								id="search_bar_title_only" class="AutoChecker"
								data-uncheck="#search_bar_thread" /> ' . 'Chỉ tìm trong tiêu đề' . '</label></li>
						</ul></dd>
					</dl>
				
					<dl class="ctrlUnit">
						<dt><label for="searchBar_users">' . 'Được gửi bởi thành viên' . ':</label></dt>
						<dd>
							<input type="text" name="users" value="" class="textCtrl AutoComplete" id="searchBar_users" />
							<p class="explain">' . 'Dãn cách tên bằng dấu phẩy(,).' . '</p>
						</dd>
					</dl>
				
					<dl class="ctrlUnit">
						<dt><label for="searchBar_date">' . 'Mới hơn ngày' . ':</label></dt>
						<dd><input type="date" name="date" value="" class="textCtrl" id="searchBar_date" /></dd>
					</dl>
					
					';
if ($searchBar)
{
$__compilerVar40 .= '
					<dl class="ctrlUnit">
						<dt></dt>
						<dd><ul>
								';
foreach ($searchBar AS $constraint)
{
$__compilerVar40 .= '
									<li>' . $constraint . '</li>
								';
}
$__compilerVar40 .= '
						</ul></dd>
					</dl>
					';
}
$__compilerVar40 .= '
				</div>
				<!-- end block: secondaryControls -->
				
				<dl class="ctrlUnit submitUnit">
					<dt></dt>
					<dd>
						<input type="submit" value="' . 'Tìm kiếm' . '" class="button primary Tooltip" title="' . 'Tìm ngay' . '" />
						<div class="Popup" id="commonSearches">
							<a rel="Menu" class="button NoPopupGadget Tooltip" title="' . 'Tìm kiếm hữu ích' . '" data-tipclass="flipped"><span class="arrowWidget"></span></a>
							<div class="Menu">
								<div class="primaryContent menuHeader">
									<h3>' . 'Tìm kiếm hữu ích' . '</h3>
								</div>
								<ul class="secondaryContent blockLinksList">
									<!-- block: useful_searches -->
									<li><a href="' . XenForo_Template_Helper_Core::link('find-new/posts', '', array(
'recent' => '1'
)) . '" rel="nofollow">' . 'Bài viết gần đây' . '</a></li>
									';
if ($visitor['user_id'])
{
$__compilerVar40 .= '
									<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id'],
'content' => 'thread'
)) . '">' . 'Chủ đề của bạn' . '</a></li>
									<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id'],
'content' => 'post'
)) . '">' . 'Bài viết của bạn' . '</a></li>
									<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id'],
'content' => 'profile_post'
)) . '">' . 'Bài viết trong hồ sơ của bạn' . '</a></li>
									';
}
$__compilerVar40 .= '
									<!-- end block: useful_searches -->
								</ul>
							</div>
						</div>
						<a href="' . XenForo_Template_Helper_Core::link('search', false, array()) . '" class="button moreOptions Tooltip" title="' . 'Tìm nâng cao' . '">' . 'Thêm' . '...</a>
					</dd>
				</dl>
				
			</div>
			
			<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		</form>		
	</fieldset>
	';
$__compilerVar39 .= $this->callTemplateHook('quick_search', $__compilerVar40, array());
unset($__compilerVar40);
$__compilerVar39 .= '
</div>';
$__compilerVar21 .= $__compilerVar39;
unset($__compilerVar39);
}
$__compilerVar21 .= '
</div>
';
$__output .= $this->callTemplateHook('header', $__compilerVar21, array());
unset($__compilerVar21);
