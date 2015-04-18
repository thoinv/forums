<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Thành viên đã đăng ký' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Thành viên đã đăng ký';
$__output .= '

';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'Dưới đây là danh sách tất cả thành viên đăng ký tại ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '.';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:members/list', '', array(
'page' => $page
)) . '" />';
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
	
<div class="pageNavLinkGroup">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($usersPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalUsers, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'members/list', false, array(), false, array())) . '
</div>	

<ol class="section memberList">
	';
foreach ($users AS $user)
{
$__output .= '
		';
$__compilerVar5 = '';
$__compilerVar5 .= '1';
$__compilerVar6 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar6 .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($id) ? (' id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's',
'class' => (($__compilerVar5) ? ('NoOverlay') : (''))
),'')) . '

	';
if ($extraTemplate)
{
$__compilerVar6 .= '<div class="extra">' . $extraTemplate . '</div>';
}
$__compilerVar6 .= '

	<div class="member">
	
		';
if ($user['user_id'])
{
$__compilerVar6 .= '
		
			<h3 class="username">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',(true),array(
'class' => 'StatusTooltip' . (($__compilerVar5) ? (' NoOverlay') : ('')),
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

<div class="pageNavLinkGroup">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($usersPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalUsers, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'members/list', false, array(), false, array())) . '
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
	
	<div class="section activeMembers">
		<div class="secondaryContent avatarHeap">
			<h3>' . 'Thành viên viết bài nhiều nhất' . '</h3>
			
			<ol>
				';
foreach ($activeUsers AS $user)
{
$__extraData['sidebar'] .= '
					<li>' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's',
'text' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' (' . XenForo_Template_Helper_Core::numberFormat($user['message_count'], '0') . ')',
'class' => 'Tooltip',
'title' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ', ' . 'Bài viết' . ': ' . XenForo_Template_Helper_Core::numberFormat($user['message_count'], '0')
),'')) . '</li>
				';
}
$__extraData['sidebar'] .= '
			</ol>
		</div>
	</div>
	
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
'title' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ', ' . 'Tham gia ngày' . ': ' . XenForo_Template_Helper_Core::datetime($user['register_date'], '')
),'')) . '</li>
				';
}
$__extraData['sidebar'] .= '
			</ol>
		</div>
	</div>
	
	';
if ($xenOptions['facebookAppId'] AND $xenOptions['facebookFacepile'])
{
$__extraData['sidebar'] .= '
		<div class="fbWidgetBlock">
			';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__extraData['sidebar'] .= '
			<fb:facepile width="' . XenForo_Template_Helper_Core::styleProperty('sidebar.width') . '" size="small" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:facepile>
		</div>
	';
}
$__extraData['sidebar'] .= '
';
