<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Thành viên tiêu biểu';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:members', false, array()) . '" />';
$__output .= '

';
$this->addRequiredExternal('css', 'member_list');
$__output .= '
';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__output .= '
	
';
if ($userNotFound)
{
$__output .= '
	<div class="importantMessage">' . 'Thành viên bạn nhập không tìm thấy. Xin hãy nhập tên đầy đủ của thành viên.' . '</div>
';
}
$__output .= '

<ul class="tabs">
	<li class="' . (($type == ('messages')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Có nhiều bài viết' . '</a></li>
	';
$__compilerVar7 = '';
$__output .= $this->callTemplateHook('dark_postrating_member_notable_tabs', $__compilerVar7, array());
unset($__compilerVar7);
$__output .= '
	<li class="' . (($type == ('points')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('members', '', array(
'type' => 'points'
)) . '">' . 'Có điểm thưởng cao' . '</a></li>
';
if ($canViewResources)
{
$__output .= '
	<li class="' . (($type == ('resources')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('members', '', array(
'type' => 'resources'
)) . '">' . 'Most Resources' . '</a></li>
';
}
$__output .= '
	<li class="' . (($type == ('staff')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('members', '', array(
'type' => 'staff'
)) . '">' . 'Thành viên BQT' . '</a></li>
<li class="' . (($type == ('follower')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('members', '', array(
'type' => 'follower'
)) . '">' . 'Most Followers' . '</a></li>

';
if ($leaderboards)
{
$__output .= '
	';
foreach ($leaderboards AS $_leaderboardId => $_leaderboard)
{
$__output .= '
		<li class="' . (($type == ('leaderboard') && $leaderboardId == $_leaderboardId) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('members', '', array(
'type' => 'leaderboard',
'leaderboard_id' => $_leaderboardId
)) . '">' . htmlspecialchars($_leaderboard['title'], ENT_QUOTES, 'UTF-8') . '</a></li>
	';
}
$__output .= '
';
}
$__output .= '
</ul>
';
if ($xenOptions['waindigo_leaderboards_showLastUpdated'] && $leaderboardId)
{
$__output .= '
	<div class="secondaryContent pairsInline">
		<dl>
			<dt>' . 'Last Updated' . ':</dt>
			<dd>' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($leaderboards[$leaderboardId]['last_rebuild'],array(
'time' => htmlspecialchars($leaderboards[$leaderboardId]['last_rebuild'], ENT_QUOTES, 'UTF-8')
))) . '</dd>
		</dl>
	</div>
';
}
$__output .= '

<div class="section">
	<ol class="memberList">
		';
foreach ($users AS $user)
{
$__output .= '
			';
$__compilerVar8 = '';
$__compilerVar8 .= '1';
$__compilerVar9 = '';
if ($bigKey)
{
$__compilerVar9 .= '<span class="bigNumber">' . XenForo_Template_Helper_Core::numberFormat($user[$bigKey], '0') . '</span>';
}
$__compilerVar10 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar10 .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($id) ? (' id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's',
'class' => (($__compilerVar8) ? ('NoOverlay') : (''))
),'')) . '

	';
if ($__compilerVar9)
{
$__compilerVar10 .= '<div class="extra">' . $__compilerVar9 . '</div>';
}
$__compilerVar10 .= '

	<div class="member">
	
		';
if ($user['user_id'])
{
$__compilerVar10 .= '
		
			<h3 class="username">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',(true),array(
'class' => 'StatusTooltip' . (($__compilerVar8) ? (' NoOverlay') : ('')),
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
else if ($guestHtml)
{
$__compilerVar10 .= '
			<h3 class="username guest dimmed">' . $guestHtml . '</h3>
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
$__compilerVar12 .= $contentTemplate;
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
unset($__compilerVar8, $__compilerVar9, $__compilerVar10);
$__output .= '
		';
}
$__output .= '
	</ol>
</div>

';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '
	<div class="section">
		<form action="' . XenForo_Template_Helper_Core::link('members', false, array()) . '" method="post" class="secondaryContent findMember">
			<h3><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'Xem tất cả thành viên đang trực tuyến' . '">' . 'Tìm thành viên' . '</a></h3>
				
			<input type="search" name="username" placeholder="' . 'Tên' . '..." results="0" class="textCtrl AutoComplete" data-autoSubmit="true" />
			<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		</form>
	</div>

	';
if ($birthdays)
{
$__extraData['sidebar'] .= '
		<div class="section">
			<div class="secondaryContent avatarHeap">
				<h3>' . 'Today\'s Birthdays' . '</h3>
				
				<ol>
				';
foreach ($birthdays AS $user)
{
$__extraData['sidebar'] .= '
					<li>' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's',
'text' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'),
'class' => 'Tooltip',
'data-tipclass' => 'flipped',
'title' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8')
),'')) . '</li>
				';
}
$__extraData['sidebar'] .= '
				</ol>
			</div>
		</div>
	';
}
$__extraData['sidebar'] .= '
	
	';
if ($latestUsers)
{
$__extraData['sidebar'] .= '
		<div class="section newestMembers">
			<div class="secondaryContent avatarHeap">
				<h3>' . 'Thành viên mới nhất' . '</h3>
				
				<ol>
					';
foreach ($latestUsers AS $user)
{
$__extraData['sidebar'] .= '
						<li>' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's',
'text' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' (' . XenForo_Template_Helper_Core::datetime($user['register_date'], '') . ')',
'class' => 'Tooltip',
'data-tipclass' => 'flipped',
'title' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ', ' . 'Tham gia ngày' . ': ' . XenForo_Template_Helper_Core::datetime($user['register_date'], '')
),'')) . '</li>
					';
}
$__extraData['sidebar'] .= '
				</ol>
			</div>
		</div>
	';
}
$__extraData['sidebar'] .= '
	
	';
if ($xenOptions['facebookAppId'] AND $xenOptions['facebookFacepile'])
{
$__extraData['sidebar'] .= '
		<div class="fbWidgetBlock">
			';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__extraData['sidebar'] .= '
			<div class="section">
				<fb:facepile width="' . XenForo_Template_Helper_Core::styleProperty('sidebar.width') . '" size="small" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:facepile>
			</div>
		</div>
	';
}
$__extraData['sidebar'] .= '
';
