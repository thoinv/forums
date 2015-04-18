<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Members you and ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' are mutual friends with';
$__output .= '

';
$__extraData['head']['noindex'] = '';
$__extraData['head']['noindex'] .= '
	<meta name="robots" content="noindex" />';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:members', $user, array()), 'value' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<div class="section">
';
if ($friends)
{
$__output .= '
	<ol class="overlayScroll">
	';
foreach ($friends AS $friend)
{
$__output .= '
		';
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar4 .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($id) ? (' id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($friend,false,array(
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
if ($friend['user_id'])
{
$__compilerVar4 .= '
		
			<h3 class="username">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($friend,'',(true),array(
'class' => 'StatusTooltip' . (($noOverlay) ? (' NoOverlay') : ('')),
'title' => XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $friend['status'],
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
'0' => $friend
)) . '</div>
				<dl class="userStats pairsInline">
					<dt title="' . 'Total messages posted by ' . htmlspecialchars($friend['username'], ENT_QUOTES, 'UTF-8') . '' . '">' . 'Bài viết' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($friend['message_count'], '0') . '</dd>
					<dt title="' . 'Number of times something posted by ' . htmlspecialchars($friend['username'], ENT_QUOTES, 'UTF-8') . ' has been \'liked\'' . '">' . 'Đã được thích' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($friend['like_count'], '0') . '</dd>
					<dt>' . 'Điểm thành tích' . ':</dt> <dd title="' . 'Điểm thành tích' . '">' . XenForo_Template_Helper_Core::numberFormat($friend['trophy_points'], '0') . '</dd>
				</dl>
			</div>
			';
$__compilerVar4 .= $this->callTemplateHook('dark_member_list_info', $__compilerVar5, array(
'user' => $friend
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
	<div class="sectionFooter overlayOnly"><a class="button primary OverlayCloser">' . 'Đóng' . '</a></div>
';
}
else
{
$__output .= '
	<div class="primaryContent">' . 'You and ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' are not friends with anyone.' . '</div>
	<div class="sectionFooter overlayOnly"><a class="button primary OverlayCloser">' . 'Đóng' . '</a></div>
';
}
$__output .= '
</div>';
