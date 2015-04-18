<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Members on chat now';
$__output .= '

';
$__extraData['head']['noindex'] = '';
$__extraData['head']['noindex'] .= '
	<meta name="robots" content="noindex" />';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('chat/online', false, array()), 'value' => 'Members currently online in chatroom');
$__output .= '

<div class="sectionMain">
	<h3 class="subHeading">' . 'Members currently online in chatroom' . '</h3>
';
if ($ajaxchat_online)
{
$__output .= '
	<ol class="overlayScroll">
	';
foreach ($ajaxchat_online AS $user)
{
$__output .= '
		';
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar4 .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($id) ? (' id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's',
'class' => (($noOverlay) ? ('NoOverlay') : (''))
),'')) . '

	';
if ($extraTemplate)
{
$__compilerVar4 .= '<div class="extra">' . $extraTemplate . '</div>';
}
$__compilerVar4 .= '

	<div class="member">
	
		';
if ($user['user_id'])
{
$__compilerVar4 .= '
		
			<h3 class="username">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',(true),array(
'class' => 'StatusTooltip' . (($noOverlay) ? (' NoOverlay') : ('')),
'title' => XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $user['status'],
'1' => '0',
'2' => array(
'stripPlainTag' => '1'
)
))
))) . '</h3>
			
			';
$__compilerVar5 = '';
$__compilerVar5 .= '<div class="userInfo">
				<div class="userBlurb dimmed">' . XenForo_Template_Helper_Core::callHelper('userBlurb', array(
'0' => $user
)) . '</div>
				<dl class="userStats pairsInline">
					<dt title="' . 'Total messages posted by ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '' . '">' . 'Bài viết' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($user['message_count'], '0') . '</dd>
					<dt title="' . 'Number of times something posted by ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' has been \'liked\'' . '">' . 'Đã được thích' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($user['like_count'], '0') . '</dd>
					<dt>' . 'Điểm thành tích' . ':</dt> <dd title="' . 'Điểm thành tích' . '">' . XenForo_Template_Helper_Core::numberFormat($user['trophy_points'], '0') . '</dd>
				</dl>
			</div>
			';
$__compilerVar4 .= $this->callTemplateHook('dark_member_list_info', $__compilerVar5, array(
'user' => $user
));
unset($__compilerVar5);
$__compilerVar4 .= '
		';
}
else if ($guestHtml)
{
$__compilerVar4 .= '
			<h3 class="username guest dimmed">' . $guestHtml . '</h3>
		';
}
else
{
$__compilerVar4 .= '
			<h3 class="username guest dimmed">' . 'Khách' . '</h3>
		';
}
$__compilerVar4 .= '
		
		';
$__compilerVar6 = '';
$__compilerVar6 .= $contentTemplate;
if (trim($__compilerVar6) !== '')
{
$__compilerVar4 .= '
			<div class="contentInfo">' . $__compilerVar6 . '</div>
		';
}
unset($__compilerVar6);
$__compilerVar4 .= '
		
	</div>
	
</li>';
$__output .= $__compilerVar4;
unset($__compilerVar4);
$__output .= '
	';
}
$__output .= '
	</ol>
';
}
else
{
$__output .= '
	<div class="secondaryContent">' . 'Chatroom is empty.' . ' <a href="' . XenForo_Template_Helper_Core::link('chat/login', false, array()) . '">' . 'Come in!' . '</a></div>
';
}
$__output .= '
	<div class="sectionFooter overlayOnly"><a class="button primary OverlayCloser">' . 'Đóng' . '</a></div>
</div>';
