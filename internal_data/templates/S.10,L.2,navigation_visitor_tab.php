<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

<ul class="visitorTabs">

	';
$__compilerVar8 = '';
$__output .= $this->callTemplateHook('navigation_visitor_tabs_start', $__compilerVar8, array());
unset($__compilerVar8);
$__output .= '

	<!-- account -->
	<li class="navTab account Popup PopupControl PopupClosed ' . (($tabs['account']['selected']) ? ('selected') : ('')) . '">

		';
$visitorHiddenUnread = ($visitor['alerts_unread'] + $visitor['conversations_unread']);
$__output .= '
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
$__compilerVar9 = '';
$__compilerVar9 .= XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $visitor
));
if (trim($__compilerVar9) !== '')
{
$__output .= '<div class="muted">' . $__compilerVar9 . '</div>';
}
unset($__compilerVar9);
$__output .= '
				
				<ul class="links">
					<li class="fl"><a href="' . XenForo_Template_Helper_Core::link('members', $visitor, array()) . '">' . 'Trang hồ sơ của bạn' . '</a></li>
				</ul>
			</div>
			<div class="menuColumns secondaryContent">
				<ul class="col1 blockLinksList">
				';
$__compilerVar10 = '';
$__compilerVar10 .= '
					';
if ($canEditProfile)
{
$__compilerVar10 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Chi tiết cá nhân' . '</a></li>';
}
$__compilerVar10 .= '
					';
if ($canEditSignature)
{
$__compilerVar10 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/signature', false, array()) . '">' . 'Chữ ký' . '</a></li>';
}
$__compilerVar10 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('account/contact-details', false, array()) . '">' . 'Chi tiết liên hệ' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/privacy', false, array()) . '">' . 'Bảo mật cá nhân' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/preferences', false, array()) . '" class="OverlayTrigger">' . 'Tùy chọn' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/alert-preferences', false, array()) . '">' . 'Thiết lập thông báo' . '</a></li>
					';
if ($canUploadAvatar)
{
$__compilerVar10 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/avatar', false, array()) . '" class="OverlayTrigger" data-cacheOverlay="true">' . 'Avatar' . '</a></li>';
}
$__compilerVar10 .= '
					';
if ($xenOptions['facebookAppId'] OR $xenOptions['twitterAppKey'] OR $xenOptions['googleClientId'])
{
$__compilerVar10 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/external-accounts', false, array()) . '">' . 'External Accounts' . '</a></li>';
}
$__compilerVar10 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('account/security', false, array()) . '">' . 'Mật khẩu' . '</a></li>
				';
$__output .= $this->callTemplateHook('navigation_visitor_tab_links1', $__compilerVar10, array());
unset($__compilerVar10);
$__output .= '
				</ul>
				<ul class="col2 blockLinksList">
				';
$__compilerVar11 = '';
$__compilerVar11 .= '
					';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar11 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Thông tin bạn' . '</a></li>';
}
$__compilerVar11 .= '
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
$__compilerVar11 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/upgrades', false, array()) . '">' . 'Account Upgrades' . '</a></li>';
}
$__compilerVar11 .= '
';
if ($visitor['permissions']['linkCheckGroupID']['linkCheckID'])
{
$__compilerVar11 .= '
<a href="' . XenForo_Template_Helper_Core::link('linkcheck/', false, array()) . '">' . 'Link Check' . '</a>
';
}
$__compilerVar11 .= '
';
if ($visitor['permissions']['userAgentGroupID']['userAgentID'] AND $xenOptions['userAgentVisitorTabLink'])
{
$__compilerVar11 .= '
<a href="' . XenForo_Template_Helper_Core::link('useragent/', false, array()) . '">' . 'User Agent' . '</a>
';
}
$__compilerVar11 .= '
';
if ($xenOptions['viewMapVisitorTabLink'])
{
$__compilerVar11 .= '
<a href="' . XenForo_Template_Helper_Core::link('viewmap/', false, array()) . '">' . 'View Map' . '</a>
';
}
$__compilerVar11 .= '
				';
$__output .= $this->callTemplateHook('navigation_visitor_tab_links2', $__compilerVar11, array());
unset($__compilerVar11);
$__output .= '
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
$__output .= '
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
$__output .= '
		</div>		
	</li>
		
	';
if ($tabs['account']['selected'])
{
$__output .= '
	<li class="navTab selected">
		<div class="tabLinks">
			<ul class="secondaryContent blockLinksList">
			';
$__compilerVar12 = '';
$__compilerVar12 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Chi tiết cá nhân' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Đối thoại' . '</a></li>
				';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar12 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Thông tin bạn' . '</a></li>';
}
$__compilerVar12 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('account/likes', false, array()) . '">' . 'Được thích' . '</a></li>
			';
$__output .= $this->callTemplateHook('navigation_tabs_account', $__compilerVar12, array());
unset($__compilerVar12);
$__output .= '
			</ul>
		</div>
	</li>
	';
}
$__output .= '
	
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
$__output .= '<a href="' . XenForo_Template_Helper_Core::link('conversations/add', false, array()) . '" class="floatLink">' . 'Bắt đầu đối thoại mới' . '</a>';
}
$__output .= '
				<a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Xem tất cả' . '...</a>
			</div>
		</div>
	</li>
	
	';
if ($tabs['inbox']['selected'])
{
$__output .= '
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
$__output .= '
	
	';
$__compilerVar13 = '';
$__output .= $this->callTemplateHook('navigation_visitor_tabs_middle', $__compilerVar13, array());
unset($__compilerVar13);
$__output .= '
	
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
$__compilerVar14 = '';
$__output .= $this->callTemplateHook('navigation_visitor_tabs_end', $__compilerVar14, array());
unset($__compilerVar14);
$__output .= '
</ul>';
