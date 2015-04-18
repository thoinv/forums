<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'account');
$__output .= '
' . '

<div class="container">
	<div class="navigationSideBar ToggleTriggerAnchor">
		<h4 class="heading ToggleTrigger" data-target="> ul" data-toggle-if-pointer="yes">' . 'Tài khoản của bạn' . ' <span></span></h4>
		<ul data-toggle-class="menuVisible">
			';
$__compilerVar6 = '';
$__compilerVar6 .= '
			<li class="section">
				<ul>
					';
$__compilerVar7 = '';
$__compilerVar7 .= '
					<li><a
						class="' . (($selectedKey == ('alerts/latest')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '">' . 'Thông báo của bạn' . '</a></li>
					';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar7 .= '<li><a
						class="' . (($selectedKey == ('alerts/newsFeed')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Thông tin bạn' . '</a></li>';
}
$__compilerVar7 .= '
					<li><a
						class="' . (($selectedKey == ('alerts/likes')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/likes', false, array()) . '">' . 'Được thích' . '</a></li>
					<li><a
						class="primaryContent"
						href="' . XenForo_Template_Helper_Core::link('watched/threads', false, array()) . '">' . 'Chủ đề đang theo dõi' . '</a></li>
					<li><a
						class="primaryContent"
						href="' . XenForo_Template_Helper_Core::link('watched/forums', false, array()) . '">' . 'Chủ đề đã đọc' . '</a></li>
					';
$__compilerVar6 .= $this->callTemplateHook('account_wrapper_sidebar_your_account', $__compilerVar7, array());
unset($__compilerVar7);
$__compilerVar6 .= '
				</ul>
			</li>
			
			<!-- slot: pre_conversations -->
			
			<li class="section"><h4 class="subHeading">' . 'Đối thoại' . '</h4>
				<ul>
					';
$__compilerVar8 = '';
$__compilerVar8 .= '
					<li><a
						class="' . (($selectedKey == ('conversations/view')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Xem đối thoại' . '</a></li>
					';
if ($canStartConversation)
{
$__compilerVar8 .= '<li><a
						class="' . (($selectedKey == ('conversations/add')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('conversations/add', false, array()) . '">' . 'Bắt đầu đối thoại mới' . '</a></li>';
}
$__compilerVar8 .= '
					';
$__compilerVar6 .= $this->callTemplateHook('account_wrapper_sidebar_conversations', $__compilerVar8, array());
unset($__compilerVar8);
$__compilerVar6 .= '
				</ul>
			</li>
			
			<!-- slot: pre_settings -->
			
			<li class="section"><h4 class="subHeading">' . 'Thiết lập' . '</h4>
				<ul>
					';
$__compilerVar9 = '';
$__compilerVar9 .= '
					';
if ($canEditProfile)
{
$__compilerVar9 .= '<li><a
						class="' . (($selectedKey == ('account/personalDetails')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Chi tiết cá nhân' . '</a></li>';
}
$__compilerVar9 .= '
					';
if ($canEditSignature)
{
$__compilerVar9 .= '<li><a
						class="' . (($selectedKey == ('account/signature')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/signature', false, array()) . '">' . 'Chữ ký' . '</a></li>';
}
$__compilerVar9 .= '
					<li><a
						class="' . (($selectedKey == ('account/contactDetails')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/contact-details', false, array()) . '">' . 'Chi tiết liên hệ' . '</a></li>
					<li><a
						class="' . (($selectedKey == ('account/privacy')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/privacy', false, array()) . '">' . 'Bảo mật cá nhân' . '</a></li>
					<li><a
						class="' . (($selectedKey == ('account/preferences')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/preferences', false, array()) . '">' . 'Tùy chọn' . '</a></li>
					<li><a
						class="' . (($selectedKey == ('account/alertPreferences')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/alert-preferences', false, array()) . '">' . 'Thiết lập thông báo' . '</a></li>
					<li><a
						class="' . (($selectedKey == ('account/following')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '">' . 'Theo dõi' . '</a></li>
					<li><a
						class="' . (($selectedKey == ('account/ignored')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/ignored', false, array()) . '">' . 'Danh sách đen' . '</a></li>
					';
if ($xenCache['userUpgradeCount'])
{
$__compilerVar9 .= '<li><a
						class="' . (($selectedKey == ('account/upgrades')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/upgrades', false, array()) . '">' . 'Account Upgrades' . '</a></li>';
}
$__compilerVar9 .= '
					';
if ($xenOptions['facebookAppId'] OR $xenOptions['twitterAppKey'] OR $xenOptions['googleClientId'])
{
$__compilerVar9 .= '<li><a
						class="' . (($selectedKey == ('account/externalAccounts')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/external-accounts', false, array()) . '">' . 'External Accounts' . '</a></li>';
}
$__compilerVar9 .= '
					<li><a
						class="' . (($selectedKey == ('account/security')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/security', false, array()) . '">' . 'Mật khẩu' . '</a></li>
					';
$__compilerVar6 .= $this->callTemplateHook('account_wrapper_sidebar_settings', $__compilerVar9, array());
unset($__compilerVar9);
$__compilerVar6 .= '
				</ul>
			</li>
			
			<li class="section">
				<ul>
					<li><a href="' . XenForo_Template_Helper_Core::link('logout', '', array(
'_xfToken' => $visitor['csrf_token_page']
)) . '"
						class="LogOut primaryContent">' . 'Thoát' . '</a></li>
				</ul>
			</li>
			
			
			';
$__output .= $this->callTemplateHook('account_wrapper_sidebar', $__compilerVar6, array());
unset($__compilerVar6);
$__output .= '
		</ul>
	</div>
	
	<div class="mainContentBlock section sectionMain insideSidebar">
		';
$__compilerVar10 = '';
$__compilerVar10 .= $_subView;
$__output .= $this->callTemplateHook('account_wrapper_content', $__compilerVar10, array());
unset($__compilerVar10);
$__output .= '
	</div>
</div>';
