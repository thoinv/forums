<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'members_who_liked_video_x_in_album_y';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'members_who_liked_video_x_in_album_y';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

<div class="section">
	<dl class="subHeading pairsInline"><dt>' . 'Album' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '">' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '</a></dd></dl>
	<ol class="overlayScroll">
	';
foreach ($likes AS $like)
{
$__output .= '
		';
$__compilerVar5 = '';
$__compilerVar5 .= XenForo_Template_Helper_Core::callHelper('datetimehtml', array($like['like_date'],array(
'time' => '$like.like_date'
)));
$__compilerVar6 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar6 .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($id) ? (' id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($like,false,array(
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
if ($like['user_id'])
{
$__compilerVar6 .= '
		
			<h3 class="username">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($like,'',(true),array(
'class' => 'StatusTooltip' . (($noOverlay) ? (' NoOverlay') : ('')),
'title' => XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $like['status'],
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
'0' => $like
)) . '</div>
				<dl class="userStats pairsInline">
					<dt title="' . 'Total messages posted by ' . htmlspecialchars($like['username'], ENT_QUOTES, 'UTF-8') . '' . '">' . 'Bài viết' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($like['message_count'], '0') . '</dd>
					<dt title="' . 'Number of times something posted by ' . htmlspecialchars($like['username'], ENT_QUOTES, 'UTF-8') . ' has been \'liked\'' . '">' . 'Đã được thích' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($like['like_count'], '0') . '</dd>
					<dt>' . 'Điểm thành tích' . ':</dt> <dd title="' . 'Điểm thành tích' . '">' . XenForo_Template_Helper_Core::numberFormat($like['trophy_points'], '0') . '</dd>
				</dl>
			</div>
			';
$__compilerVar6 .= $this->callTemplateHook('dark_member_list_info', $__compilerVar7, array(
'user' => $like
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
