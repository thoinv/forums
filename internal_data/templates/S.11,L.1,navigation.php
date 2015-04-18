<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

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
$__output .= '
			<li class="navTab home PopupClosed"><a href="' . htmlspecialchars($homeLink, ENT_QUOTES, 'UTF-8') . '" class="navLink">' . 'Home' . '</a></li>
		';
}
$__output .= '
		-->
		
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
						<div class="muted">' . 'Quick Links' . '</div>
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
					<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__output .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__output .= '</a>
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
						<div class="muted">' . 'Quick Links' . '</div>
					</div>
					<ul class="secondaryContent blockLinksList">
					';
$__compilerVar1 = '';
$__compilerVar1 .= '
						';
if ($visitor['user_id'])
{
$__compilerVar1 .= '<li><a href="' . XenForo_Template_Helper_Core::link('forums/-/mark-read', $forum, array(
'date' => $serverTime
)) . '" class="OverlayTrigger">' . 'Mark Forums Read' . '</a></li>';
}
$__compilerVar1 .= '
						';
if ($canSearch)
{
$__compilerVar1 .= '<li><a href="' . XenForo_Template_Helper_Core::link('search', '', array(
'type' => 'post'
)) . '">' . 'Search Forums' . '</a></li>';
}
$__compilerVar1 .= '
						';
if ($visitor['user_id'])
{
$__compilerVar1 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('watched/forums', false, array()) . '">' . 'Watched Forums' . '</a></li>
							<li><a href="' . XenForo_Template_Helper_Core::link('watched/threads', false, array()) . '">' . 'Watched Threads' . '</a></li>
						';
}
$__compilerVar1 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('find-new/posts', false, array()) . '" rel="nofollow">' . (($visitor['user_id']) ? ('New Posts') : ('Recent Posts')) . ' ';
$__compilerVar2 = '';
if ($visitor['user_id'])
{
$__compilerVar2 .= '
	';
$this->addRequiredExternal('css', 'unread_posts_count');
$__compilerVar2 .= '

	';
$unread = '';
$__compilerVar3 = '';
$unread .= $this->callTemplateCallback('UnreadPostCount_Callback', 'getUnreadCount', $__compilerVar3, array());
unset($__compilerVar3);
$__compilerVar2 .= '
	
	<span class="postItemCount' . (($unread) ? (' alert') : ('')) . '">
		' . XenForo_Template_Helper_Core::numberFormat($unread, '0') . '
	</span>
';
}
$__compilerVar1 .= $__compilerVar2;
unset($__compilerVar2);
$__compilerVar1 .= '</a></li>
					';
$__output .= $this->callTemplateHook('navigation_tabs_forums', $__compilerVar1, array());
unset($__compilerVar1);
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
						<div class="muted">' . 'Quick Links' . '</div>
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
					<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__output .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__output .= '</a>
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
						<div class="muted">' . 'Quick Links' . '</div>
					</div>
					<ul class="secondaryContent blockLinksList">
					';
$__compilerVar4 = '';
$__compilerVar4 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Notable Members' . '</a></li>
						';
if ($xenOptions['enableMemberList'])
{
$__compilerVar4 .= '<li><a href="' . XenForo_Template_Helper_Core::link('members/list', false, array()) . '">' . 'Registered Members' . '</a></li>';
}
$__compilerVar4 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '">' . 'Current Visitors' . '</a></li>
						';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar4 .= '<li><a href="' . XenForo_Template_Helper_Core::link('recent-activity', false, array()) . '">' . 'Recent Activity' . '</a></li>';
}
$__compilerVar4 .= '
<li><a href="' . XenForo_Template_Helper_Core::link('members/usermap', false, array()) . '">' . 'User Map' . '</a></li>
						';
if ($canViewProfilePosts)
{
$__compilerVar4 .= '<li><a href="' . XenForo_Template_Helper_Core::link('find-new/profile-posts', false, array()) . '">' . 'New Profile Posts' . '</a></li>';
}
$__compilerVar4 .= '
					';
$__output .= $this->callTemplateHook('navigation_tabs_members', $__compilerVar4, array());
unset($__compilerVar4);
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
						<div class="muted">' . 'Quick Links' . '</div>
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
					<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__output .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__output .= '</a>
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
	
	';
if ($visitor['user_id'])
{
$__compilerVar5 = '';
$__compilerVar5 .= '

<ul class="visitorTabs">

	';
$__compilerVar6 = '';
$__compilerVar5 .= $this->callTemplateHook('navigation_visitor_tabs_start', $__compilerVar6, array());
unset($__compilerVar6);
$__compilerVar5 .= '

	<!-- account -->
	<li class="navTab account Popup PopupControl PopupClosed ' . (($tabs['account']['selected']) ? ('selected') : ('')) . '">

		';
$visitorHiddenUnread = ($visitor['alerts_unread'] + $visitor['conversations_unread']);
$__compilerVar5 .= '
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
'title' => 'View your profile'
),'')) . '
				
				<h3><a href="' . XenForo_Template_Helper_Core::link('members', $visitor, array()) . '" class="concealed" title="' . 'View your profile' . '">' . htmlspecialchars($visitor['username'], ENT_QUOTES, 'UTF-8') . '</a></h3>
				
				';
$__compilerVar7 = '';
$__compilerVar7 .= XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $visitor
));
if (trim($__compilerVar7) !== '')
{
$__compilerVar5 .= '<div class="muted">' . $__compilerVar7 . '</div>';
}
unset($__compilerVar7);
$__compilerVar5 .= '
				
				<ul class="links">
					<li class="fl"><a href="' . XenForo_Template_Helper_Core::link('members', $visitor, array()) . '">' . 'Your Profile Page' . '</a></li>
				</ul>
			</div>
			<div class="menuColumns secondaryContent">
				<ul class="col1 blockLinksList">
				';
$__compilerVar8 = '';
$__compilerVar8 .= '
					';
if ($canEditProfile)
{
$__compilerVar8 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Personal Details' . '</a></li>';
}
$__compilerVar8 .= '
					';
if ($canEditSignature)
{
$__compilerVar8 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/signature', false, array()) . '">' . 'Signature' . '</a></li>';
}
$__compilerVar8 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('account/contact-details', false, array()) . '">' . 'Contact Details' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/privacy', false, array()) . '">' . 'Privacy' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/preferences', false, array()) . '" class="OverlayTrigger">' . 'Preferences' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/alert-preferences', false, array()) . '">' . 'Alert Preferences' . '</a></li>
					';
if ($canUploadAvatar)
{
$__compilerVar8 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/avatar', false, array()) . '" class="OverlayTrigger" data-cacheOverlay="true">' . 'Avatar' . '</a></li>';
}
$__compilerVar8 .= '
					';
if ($xenOptions['facebookAppId'] OR $xenOptions['twitterAppKey'] OR $xenOptions['googleClientId'])
{
$__compilerVar8 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/external-accounts', false, array()) . '">' . 'External Accounts' . '</a></li>';
}
$__compilerVar8 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('account/security', false, array()) . '">' . 'Password' . '</a></li>
				';
$__compilerVar5 .= $this->callTemplateHook('navigation_visitor_tab_links1', $__compilerVar8, array());
unset($__compilerVar8);
$__compilerVar5 .= '
				</ul>
				<ul class="col2 blockLinksList">
				';
$__compilerVar9 = '';
$__compilerVar9 .= '
					';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar9 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Your News Feed' . '</a></li>';
}
$__compilerVar9 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Conversations' . '
						<strong class="itemCount ' . (($visitor['conversations_unread']) ? ('') : ('Zero')) . '"
							id="VisitorExtraMenu_ConversationsCounter">
							<span class="Total">' . XenForo_Template_Helper_Core::numberFormat($visitor['conversations_unread'], '0') . '</span>
						</strong></a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '">' . 'Alerts' . '
						<strong class="itemCount ' . (($visitor['alerts_unread']) ? ('') : ('Zero')) . '"
							id="VisitorExtraMenu_AlertsCounter">
							<span class="Total">' . XenForo_Template_Helper_Core::numberFormat($visitor['alerts_unread'], '0') . '</span>
						</strong></a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/likes', false, array()) . '">' . 'Likes You\'ve Received' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id']
)) . '">' . 'Your Content' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '">' . 'People You Follow' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/ignored', false, array()) . '">' . 'People You Ignore' . '</a></li>
					';
if ($xenCache['userUpgradeCount'])
{
$__compilerVar9 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/upgrades', false, array()) . '">' . 'Account Upgrades' . '</a></li>';
}
$__compilerVar9 .= '
';
if ($visitor['permissions']['linkCheckGroupID']['linkCheckID'])
{
$__compilerVar9 .= '
<a href="' . XenForo_Template_Helper_Core::link('linkcheck/', false, array()) . '">' . 'Link Check' . '</a>
';
}
$__compilerVar9 .= '
';
if ($visitor['permissions']['userAgentGroupID']['userAgentID'] AND $xenOptions['userAgentVisitorTabLink'])
{
$__compilerVar9 .= '
<a href="' . XenForo_Template_Helper_Core::link('useragent/', false, array()) . '">' . 'User Agent' . '</a>
';
}
$__compilerVar9 .= '
';
if ($xenOptions['viewMapVisitorTabLink'])
{
$__compilerVar9 .= '
<a href="' . XenForo_Template_Helper_Core::link('viewmap/', false, array()) . '">' . 'View Map' . '</a>
';
}
$__compilerVar9 .= '
				';
$__compilerVar5 .= $this->callTemplateHook('navigation_visitor_tab_links2', $__compilerVar9, array());
unset($__compilerVar9);
$__compilerVar5 .= '
				</ul>
			</div>
			<div class="menuColumns secondaryContent">
				<ul class="col1 blockLinksList">
					<li>				
						<form action="' . XenForo_Template_Helper_Core::link('account/toggle-visibility', false, array()) . '" method="post" class="AutoValidator visibilityForm">
							<label><input type="checkbox" name="visible" value="1" class="SubmitOnChange" ' . (($visitor['visible']) ? ' checked="checked"' : '') . ' />
								' . 'Show online status' . '</label>
							<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
						</form>
					</li>
				</ul>
				<ul class="col2 blockLinksList">
					<li><a href="' . XenForo_Template_Helper_Core::link('logout', '', array(
'_xfToken' => $visitor['csrf_token_page']
)) . '" class="LogOut">' . 'Log Out' . '</a></li>
				</ul>
			</div>
			';
if ($canUpdateStatus)
{
$__compilerVar5 .= '
				<form action="' . XenForo_Template_Helper_Core::link('members/post', $visitor, array()) . '" method="post" class="sectionFooter statusPoster AutoValidator" data-optInOut="OptIn">
					<textarea name="message" class="textCtrl StatusEditor UserTagger Elastic" placeholder="' . 'Update your status' . '..." rows="1" cols="40" style="height:18px" data-statusEditorCounter="#visMenuSEdCount" data-nofocus="true"></textarea>
					<div class="submitUnit">
						<span id="visMenuSEdCount" title="' . 'Characters remaining' . '"></span>
						<input type="submit" class="button primary MenuCloser" value="' . 'Post' . '" />
						<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
						<input type="hidden" name="return" value="1" /> 
					</div>
				</form>
			';
}
$__compilerVar5 .= '
		</div>		
	</li>
		
	';
if ($tabs['account']['selected'])
{
$__compilerVar5 .= '
	<li class="navTab selected">
		<div class="tabLinks">
			<ul class="secondaryContent blockLinksList">
			';
$__compilerVar10 = '';
$__compilerVar10 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Personal Details' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Conversations' . '</a></li>
				';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar10 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Your News Feed' . '</a></li>';
}
$__compilerVar10 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('account/likes', false, array()) . '">' . 'Likes You\'ve Received' . '</a></li>
			';
$__compilerVar5 .= $this->callTemplateHook('navigation_tabs_account', $__compilerVar10, array());
unset($__compilerVar10);
$__compilerVar5 .= '
			</ul>
		</div>
	</li>
	';
}
$__compilerVar5 .= '
	
	<!-- conversations popup -->
	<li class="navTab inbox Popup PopupControl PopupClosed ' . (($tabs['inbox']['selected']) ? ('selected') : ('')) . '">
					
		<a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '" rel="Menu" class="navLink NoPopupGadget">' . 'Inbox' . '
			<strong class="itemCount ' . (($visitor['conversations_unread']) ? ('') : ('Zero')) . '"
				id="ConversationsMenu_Counter" data-text="' . 'You have %d new unread conversation(s).' . '">
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
					<a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '" class="concealed">' . 'Conversations' . '</a>
				</h3>						
			</div>
			
			<div class="listPlaceholder"></div>
			
			<div class="sectionFooter">
				';
if ($canStartConversation)
{
$__compilerVar5 .= '<a href="' . XenForo_Template_Helper_Core::link('conversations/add', false, array()) . '" class="floatLink">' . 'Start a New Conversation' . '</a>';
}
$__compilerVar5 .= '
				<a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Show All' . '...</a>
			</div>
		</div>
	</li>
	
	';
if ($tabs['inbox']['selected'])
{
$__compilerVar5 .= '
	<li class="navTab selected">
		<div class="tabLinks">
			<ul class="secondaryContent blockLinksList">
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Conversations' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations/starred', false, array()) . '">' . 'Starred Conversations' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations/yours', false, array()) . '">' . 'Conversations You Started' . '</a></li>
			</ul>
		</div>
	</li>
	';
}
$__compilerVar5 .= '
	
	';
$__compilerVar11 = '';
$__compilerVar5 .= $this->callTemplateHook('navigation_visitor_tabs_middle', $__compilerVar11, array());
unset($__compilerVar11);
$__compilerVar5 .= '
	
	<!-- alerts popup -->
	<li class="navTab alerts Popup PopupControl PopupClosed">	
					
		<a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '" rel="Menu" class="navLink NoPopupGadget">' . 'Alerts' . '
			<strong class="itemCount ' . (($visitor['alerts_unread']) ? ('') : ('Zero')) . '"
				id="AlertsMenu_Counter" data-text="' . 'You have %d new alert(s).' . '">
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
					<a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '" class="concealed">' . 'Alerts' . '</a>
				</h3>
			</div>
			
			<div class="listPlaceholder"></div>
			
			<div class="sectionFooter">
				<a href="' . XenForo_Template_Helper_Core::link('account/alert-preferences', false, array()) . '" class="floatLink">' . 'Alert Preferences' . '</a>
				<a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '">' . 'Show All' . '...</a>
			</div>
		</div>
	</li>
	
	';
$__compilerVar12 = '';
$__compilerVar5 .= $this->callTemplateHook('navigation_visitor_tabs_end', $__compilerVar12, array());
unset($__compilerVar12);
$__compilerVar5 .= '
</ul>';
$__output .= $__compilerVar5;
unset($__compilerVar5);
}
$__output .= '
</div>

<span class="helper"></span>
			
		</nav>	
	</div>
</div>';
