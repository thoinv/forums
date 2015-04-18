<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

<div id="navigation" class="pageWidth ' . (($canSearch) ? ('withSearch') : ('')) . '">
	<div class="pageContent">
		<nav>

<div class="navTabs">
	<ul class="publicTabs">
	
		<!-- home -->
		';
if ($showHomeLink)
{
$__output .= '
			<li class="navTab home PopupClosed"><a href="' . htmlspecialchars($homeLink, ENT_QUOTES, 'UTF-8') . '" class="navLink">' . 'Trang chủ' . '</a></li>
		';
}
$__output .= '
		
		
		<!-- extra tabs: home -->
		';
if ($extraTabs['home'])
{
$__output .= '
		';
foreach ($extraTabs['home'] AS $extraTabId => $extraTab)
{
$__output .= '
			';
if ($extraTab['linksTemplate'])
{
$__output .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__output .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__output .= '</a>
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
$__output .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('PopupClosed')) . '">
					<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8') . '</a>
					';
if ($extraTab['selected'])
{
$__output .= '<div class="tabLinks"></div>';
}
$__output .= '
				</li>
			';
}
$__output .= '
		';
}
$__output .= '
		';
}
$__output .= '
		
		
		<!-- forums -->
		';
if ($tabs['forums'])
{
$__output .= '
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
$__compilerVar5 = '';
$__compilerVar5 .= '
						';
if ($visitor['user_id'])
{
$__compilerVar5 .= '<li><a href="' . XenForo_Template_Helper_Core::link('forums/-/mark-read', $forum, array(
'date' => $serverTime
)) . '" class="OverlayTrigger">' . 'Đánh dấu đã đọc' . '</a></li>';
}
$__compilerVar5 .= '
						';
if ($canSearch)
{
$__compilerVar5 .= '<li><a href="' . XenForo_Template_Helper_Core::link('search', '', array(
'type' => 'post'
)) . '">' . 'Tìm kiếm diễn đàn' . '</a></li>';
}
$__compilerVar5 .= '
						';
if ($visitor['user_id'])
{
$__compilerVar5 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('watched/forums', false, array()) . '">' . 'Chủ đề đã đọc' . '</a></li>
							<li><a href="' . XenForo_Template_Helper_Core::link('watched/threads', false, array()) . '">' . 'Chủ đề đang theo dõi' . '</a></li>
						';
}
$__compilerVar5 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('find-new/posts', false, array()) . '" rel="nofollow">' . (($visitor['user_id']) ? ('Bài viết mới') : ('Bài viết gần đây')) . ' ';
$__compilerVar6 = '';
if ($visitor['user_id'])
{
$__compilerVar6 .= '
	';
$this->addRequiredExternal('css', 'unread_posts_count');
$__compilerVar6 .= '

	';
$unread = '';
$__compilerVar7 = '';
$unread .= $this->callTemplateCallback('UnreadPostCount_Callback', 'getUnreadCount', $__compilerVar7, array());
unset($__compilerVar7);
$__compilerVar6 .= '
	
	<span class="postItemCount' . (($unread) ? (' alert') : ('')) . '">
		' . XenForo_Template_Helper_Core::numberFormat($unread, '0') . '
	</span>
';
}
$__compilerVar5 .= $__compilerVar6;
unset($__compilerVar6);
$__compilerVar5 .= '</a></li>
					';
$__output .= $this->callTemplateHook('navigation_tabs_forums', $__compilerVar5, array());
unset($__compilerVar5);
$__output .= '
					</ul>
				</div>
			</li>
		';
}
$__output .= '
		
		
		<!-- extra tabs: middle -->
		';
if ($extraTabs['middle'])
{
$__output .= '
		';
foreach ($extraTabs['middle'] AS $extraTabId => $extraTab)
{
$__output .= '
			';
if ($extraTab['linksTemplate'])
{
$__output .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__output .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__output .= '</a>
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
$__output .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('PopupClosed')) . '">
					<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8') . '</a>
					';
if ($extraTab['selected'])
{
$__output .= '<div class="tabLinks"></div>';
}
$__output .= '
				</li>
			';
}
$__output .= '
		';
}
$__output .= '
		';
}
$__output .= '
		
		
		<!-- members -->
		';
if ($tabs['members'])
{
$__output .= '
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
$__compilerVar8 = '';
$__compilerVar8 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Thành viên tiêu biểu' . '</a></li>
						';
if ($xenOptions['enableMemberList'])
{
$__compilerVar8 .= '<li><a href="' . XenForo_Template_Helper_Core::link('members/list', false, array()) . '">' . 'Thành viên đã đăng ký' . '</a></li>';
}
$__compilerVar8 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '">' . 'Đang truy cập' . '</a></li>
						';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar8 .= '<li><a href="' . XenForo_Template_Helper_Core::link('recent-activity', false, array()) . '">' . 'Hoạt động gần đây' . '</a></li>';
}
$__compilerVar8 .= '
<li><a href="' . XenForo_Template_Helper_Core::link('members/usermap', false, array()) . '">' . 'User Map' . '</a></li>
					';
$__output .= $this->callTemplateHook('navigation_tabs_members', $__compilerVar8, array());
unset($__compilerVar8);
$__output .= '
					</ul>
				</div>
			</li>
		';
}
$__output .= '				
		
		<!-- extra tabs: end -->
		';
if ($extraTabs['end'])
{
$__output .= '
		';
foreach ($extraTabs['end'] AS $extraTabId => $extraTab)
{
$__output .= '
			';
if ($extraTab['linksTemplate'])
{
$__output .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__output .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__output .= '</a>
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
$__output .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('PopupClosed')) . '">
					<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8') . '</a>
					';
if ($extraTab['selected'])
{
$__output .= '<div class="tabLinks"></div>';
}
$__output .= '
				</li>
			';
}
$__output .= '
		';
}
$__output .= '
		';
}
$__output .= '

		<!-- responsive popup -->
		<li class="navTab navigationHiddenTabs Popup PopupControl PopupClosed" style="display:none">	
						
			<a rel="Menu" class="navLink NoPopupGadget"><span class="menuIcon">' . 'Menu' . '</span></a>
			
			<div class="Menu JsOnly blockLinksList primaryContent" id="NavigationHiddenMenu"></div>
		</li>
			
		
		<!-- no selection -->
		';
if (!$selectedTab)
{
$__output .= '
			<li class="navTab selected"><div class="tabLinks"></div></li>
		';
}
$__output .= '
		
	</ul>
	
	
</div>

<span class="helper"></span>
			
		</nav>	
	</div>
</div>';
