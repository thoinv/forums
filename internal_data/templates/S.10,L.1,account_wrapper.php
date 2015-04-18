<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'account');
$__output .= '
' . '

<div class="container">
	<div class="navigationSideBar ToggleTriggerAnchor">
		<h4 class="heading ToggleTrigger" data-target="> ul" data-toggle-if-pointer="yes">' . 'Your Account' . ' <span></span></h4>
		<ul data-toggle-class="menuVisible">
			';
$__compilerVar1 = '';
$__compilerVar1 .= '
			<li class="section">
				<ul>
					';
$__compilerVar2 = '';
$__compilerVar2 .= '
					<li><a
						class="' . (($selectedKey == ('alerts/latest')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '">' . 'Your Alerts' . '</a></li>
					';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar2 .= '<li><a
						class="' . (($selectedKey == ('alerts/newsFeed')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Your News Feed' . '</a></li>';
}
$__compilerVar2 .= '
					<li><a
						class="' . (($selectedKey == ('alerts/likes')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/likes', false, array()) . '">' . 'Likes You\'ve Received' . '</a></li>
					<li><a
						class="primaryContent"
						href="' . XenForo_Template_Helper_Core::link('watched/threads', false, array()) . '">' . 'Watched Threads' . '</a></li>
					<li><a
						class="primaryContent"
						href="' . XenForo_Template_Helper_Core::link('watched/forums', false, array()) . '">' . 'Watched Forums' . '</a></li>
					';
$__compilerVar1 .= $this->callTemplateHook('account_wrapper_sidebar_your_account', $__compilerVar2, array());
unset($__compilerVar2);
$__compilerVar1 .= '
				</ul>
			</li>
			
			<!-- slot: pre_conversations -->
			
			<li class="section"><h4 class="subHeading">' . 'Conversations' . '</h4>
				<ul>
					';
$__compilerVar3 = '';
$__compilerVar3 .= '
					<li><a
						class="' . (($selectedKey == ('conversations/view')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'View Conversations' . '</a></li>
					';
if ($canStartConversation)
{
$__compilerVar3 .= '<li><a
						class="' . (($selectedKey == ('conversations/add')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('conversations/add', false, array()) . '">' . 'Start a New Conversation' . '</a></li>';
}
$__compilerVar3 .= '
					';
$__compilerVar1 .= $this->callTemplateHook('account_wrapper_sidebar_conversations', $__compilerVar3, array());
unset($__compilerVar3);
$__compilerVar1 .= '
				</ul>
			</li>
			
			<!-- slot: pre_settings -->
			
			<li class="section"><h4 class="subHeading">' . 'Settings' . '</h4>
				<ul>
					';
$__compilerVar4 = '';
$__compilerVar4 .= '
					';
if ($canEditProfile)
{
$__compilerVar4 .= '<li><a
						class="' . (($selectedKey == ('account/personalDetails')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Personal Details' . '</a></li>';
}
$__compilerVar4 .= '
					';
if ($canEditSignature)
{
$__compilerVar4 .= '<li><a
						class="' . (($selectedKey == ('account/signature')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/signature', false, array()) . '">' . 'Signature' . '</a></li>';
}
$__compilerVar4 .= '
					<li><a
						class="' . (($selectedKey == ('account/contactDetails')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/contact-details', false, array()) . '">' . 'Contact Details' . '</a></li>
					<li><a
						class="' . (($selectedKey == ('account/privacy')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/privacy', false, array()) . '">' . 'Privacy' . '</a></li>
					<li><a
						class="' . (($selectedKey == ('account/preferences')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/preferences', false, array()) . '">' . 'Preferences' . '</a></li>
					<li><a
						class="' . (($selectedKey == ('account/alertPreferences')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/alert-preferences', false, array()) . '">' . 'Alert Preferences' . '</a></li>
					<li><a
						class="' . (($selectedKey == ('account/following')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '">' . 'People You Follow' . '</a></li>
					<li><a
						class="' . (($selectedKey == ('account/ignored')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/ignored', false, array()) . '">' . 'People You Ignore' . '</a></li>
					';
if ($xenCache['userUpgradeCount'])
{
$__compilerVar4 .= '<li><a
						class="' . (($selectedKey == ('account/upgrades')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/upgrades', false, array()) . '">' . 'Account Upgrades' . '</a></li>';
}
$__compilerVar4 .= '
					';
if ($xenOptions['facebookAppId'] OR $xenOptions['twitterAppKey'] OR $xenOptions['googleClientId'])
{
$__compilerVar4 .= '<li><a
						class="' . (($selectedKey == ('account/externalAccounts')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/external-accounts', false, array()) . '">' . 'External Accounts' . '</a></li>';
}
$__compilerVar4 .= '
					<li><a
						class="' . (($selectedKey == ('account/security')) ? ('secondaryContent') : ('primaryContent')) . '"
						href="' . XenForo_Template_Helper_Core::link('account/security', false, array()) . '">' . 'Password' . '</a></li>
					';
$__compilerVar1 .= $this->callTemplateHook('account_wrapper_sidebar_settings', $__compilerVar4, array());
unset($__compilerVar4);
$__compilerVar1 .= '
				</ul>
			</li>
			
			<li class="section">
				<ul>
					<li><a href="' . XenForo_Template_Helper_Core::link('logout', '', array(
'_xfToken' => $visitor['csrf_token_page']
)) . '"
						class="LogOut primaryContent">' . 'Log Out' . '</a></li>
				</ul>
			</li>
			
			
			';
$__output .= $this->callTemplateHook('account_wrapper_sidebar', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '
		</ul>
	</div>
	
	<div class="mainContentBlock section sectionMain insideSidebar">
		';
$__compilerVar5 = '';
$__compilerVar5 .= $_subView;
$__output .= $this->callTemplateHook('account_wrapper_content', $__compilerVar5, array());
unset($__compilerVar5);
$__output .= '
	</div>
</div>';
