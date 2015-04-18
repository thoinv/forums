<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Đang truy cập';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'Dưới đây là danh sách đang truy cập ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '.';
$__output .= ' 

';
$this->addRequiredExternal('css', 'member_list');
$__output .= '
';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__output .= '

<ul class="tabs">
	<li class="' . (($userLimit == ('')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '">' . 'Tất cả' . '</a></li>
	<li class="' . (($userLimit == ('registered')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('online', '', array(
'type' => 'registered'
)) . '">' . 'Thành viên' . '</a></li>
	<li class="' . (($userLimit == ('guest')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('online', '', array(
'type' => 'guest'
)) . '">' . 'Khách' . '</a></li>
	<li class="' . (($userLimit == ('robot')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('online', '', array(
'type' => 'robot'
)) . '">' . 'Robots' . '</a></li>
</ul>

';
if ($onlineUsers)
{
$__output .= '
	<ol class="section memberList">
		';
foreach ($onlineUsers AS $user)
{
$__output .= '
			';
$__compilerVar7 = '';
if ($user['robotInfo'])
{
$__compilerVar7 .= '
					' . 'Robot' . ': ';
if ($user['robotInfo']['link'])
{
$__compilerVar7 .= '<a href="' . htmlspecialchars($user['robotInfo']['link'], ENT_QUOTES, 'UTF-8') . '" target="_blank">' . htmlspecialchars($user['robotInfo']['title'], ENT_QUOTES, 'UTF-8') . '</a>';
}
else
{
$__compilerVar7 .= htmlspecialchars($user['robotInfo']['title'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar7 .= '
				';
}
$__compilerVar8 = '';
$__compilerVar8 .= '
					';
if ($canViewIps)
{
$__compilerVar8 .= '
						<a href="' . (($user['user_id']) ? (XenForo_Template_Helper_Core::link('online/user-ip', $user, array())) : (XenForo_Template_Helper_Core::link('online/guest-ip', '', array(
'ip' => $user['ipHex']
)))) . '" class="OverlayTrigger ip"><span>' . XenForo_Template_Helper_Core::callHelper('ip', array(
'0' => $user['ip']
)) . '</span></a>
					';
}
$__compilerVar8 .= '
				';
$__compilerVar9 = '';
$__compilerVar9 .= '
					';
if ($user['canViewCurrentActivity'])
{
$__compilerVar9 .= '
						';
if ($user['activityDescription'])
{
$__compilerVar9 .= '
							' . htmlspecialchars($user['activityDescription'], ENT_QUOTES, 'UTF-8');
if ($user['activityItemTitle'])
{
$__compilerVar9 .= ' <em><a href="' . htmlspecialchars($user['activityItemUrl'], ENT_QUOTES, 'UTF-8') . '"' . (($user['activityItemPreviewUrl']) ? (' class="PreviewTooltip" data-previewUrl="' . htmlspecialchars($user['activityItemPreviewUrl'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . htmlspecialchars($user['activityItemTitle'], ENT_QUOTES, 'UTF-8') . '</a></em>';
}
$__compilerVar9 .= ',
						';
}
else
{
$__compilerVar9 .= '
							' . 'Đang xem trang không xác định' . ',
						';
}
$__compilerVar9 .= '
					';
}
$__compilerVar9 .= '
					' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($user['view_date'],array(
'time' => '$user.view_date',
'class' => 'muted'
))) . '
				';
$__compilerVar10 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar10 .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($id) ? (' id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's',
'class' => (($noOverlay) ? ('NoOverlay') : (''))
),'')) . '

	';
if ($__compilerVar8)
{
$__compilerVar10 .= '<div class="extra">' . $__compilerVar8 . '</div>';
}
$__compilerVar10 .= '

	<div class="member">
	
		';
if ($user['user_id'])
{
$__compilerVar10 .= '
		
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
$__compilerVar11 = '';
$__compilerVar11 .= '<div class="userInfo">
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
$__compilerVar10 .= $this->callTemplateHook('dark_member_list_info', $__compilerVar11, array(
'user' => $user
));
unset($__compilerVar11);
$__compilerVar10 .= '
		';
}
else if ($__compilerVar7)
{
$__compilerVar10 .= '
			<h3 class="username guest dimmed">' . $__compilerVar7 . '</h3>
		';
}
else
{
$__compilerVar10 .= '
			<h3 class="username guest dimmed">' . 'Khách' . '</h3>
		';
}
$__compilerVar10 .= '
		
		';
$__compilerVar12 = '';
$__compilerVar12 .= $__compilerVar9;
if (trim($__compilerVar12) !== '')
{
$__compilerVar10 .= '
			<div class="contentInfo">' . $__compilerVar12 . '</div>
		';
}
unset($__compilerVar12);
$__compilerVar10 .= '
		
	</div>
	
</li>';
$__output .= $__compilerVar10;
unset($__compilerVar7, $__compilerVar8, $__compilerVar9, $__compilerVar10);
$__output .= '	
		';
}
$__output .= '
	</ol>

	<div class="pageNavLinkGroup">
		' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($usersPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalOnlineUsers, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'online', false, array(
'type' => $userLimit
), false, array())) . '
	</div>
';
}
else
{
$__output .= '
	<div class="section">' . 'Không tìm thấy.' . '</div>
';
}
$__output .= '

';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '
	
	<div class="section">
		<div class="secondaryContent statsList" id="boardStats">
			<h3>' . 'Đang trực tuyến' . '</h3>
			<div class="pairsJustified">
				<dl class="memberCount"><dt>' . 'Thành viên trực tuyến' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($onlineTotals['members'], '0') . '</dd></dl>
				<dl class="guestCount"><dt>' . 'Khách ghé thăm' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($onlineTotals['guests'], '0') . '</dd></dl>
				<dl class="guestCount"><dt>' . 'Robots Online' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($onlineTotals['robots'], '0') . '</dd></dl>
				<dl class="visitorCount"><dt>' . 'Tổng số truy cập' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($onlineTotals['total'], '0') . '</dd></dl>
			</div>
			<div class="footnote">' . 'Tổng số có thể gồm cả thành viên đang ẩn.' . '</div>
		</div>
	</div>
	
';
