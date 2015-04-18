<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Birthdays on ' . htmlspecialchars($month, ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($day, ENT_QUOTES, 'UTF-8') . '';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Birthdays on ' . htmlspecialchars($month, ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($day, ENT_QUOTES, 'UTF-8') . '';
$__output .= '

<div class="section">
	<div class="subHeading">' . 'Birthday(s)' . '</div>

	<ol class="overlayScroll">
	';
foreach ($birthdays AS $user)
{
$__output .= '
		';
$__compilerVar5 = '';
$__compilerVar5 .= XenForo_Template_Helper_Core::date($user['timeStamp'], $user['format']) . ' ';
if ($user['age'])
{
$__compilerVar5 .= '(' . 'Tuổi' . ': ' . htmlspecialchars($user['age'], ENT_QUOTES, 'UTF-8') . ')';
}
$__compilerVar6 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar6 .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($id) ? (' id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's',
'class' => (($noOverlay) ? ('NoOverlay') : (''))
),'')) . '

	';
if ($__compilerVar5)
{
$__compilerVar6 .= '<div class="extra">' . $__compilerVar5 . '</div>';
}
$__compilerVar6 .= '

	<div class="member">
	
		';
if ($user['user_id'])
{
$__compilerVar6 .= '
		
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
$__compilerVar7 = '';
$__compilerVar7 .= '<div class="userInfo">
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
$__compilerVar6 .= $this->callTemplateHook('dark_member_list_info', $__compilerVar7, array(
'user' => $user
));
unset($__compilerVar7);
$__compilerVar6 .= '
		';
}
else if ($guestHtml)
{
$__compilerVar6 .= '
			<h3 class="username guest dimmed">' . $guestHtml . '</h3>
		';
}
else
{
$__compilerVar6 .= '
			<h3 class="username guest dimmed">' . 'Khách' . '</h3>
		';
}
$__compilerVar6 .= '
		
		';
$__compilerVar8 = '';
$__compilerVar8 .= $contentTemplate;
if (trim($__compilerVar8) !== '')
{
$__compilerVar6 .= '
			<div class="contentInfo">' . $__compilerVar8 . '</div>
		';
}
unset($__compilerVar8);
$__compilerVar6 .= '
		
	</div>
	
</li>';
$__output .= $__compilerVar6;
unset($__compilerVar5, $__compilerVar6);
$__output .= '
	';
}
$__output .= '
	</ol>

	<div class="sectionFooter overlayOnly"><a class="button primary OverlayCloser">' . 'Đóng' . '</a></div>
</div>';
