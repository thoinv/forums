<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Notable Members';
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
	<div class="importantMessage">' . 'The specified member cannot be found. Please enter a member\'s entire name.' . '</div>
';
}
$__output .= '

<ul class="tabs">
	<li class="' . (($type == ('messages')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Most Messages' . '</a></li>
	';
$__compilerVar1 = '';
$__output .= $this->callTemplateHook('dark_postrating_member_notable_tabs', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '
	<li class="' . (($type == ('points')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('members', '', array(
'type' => 'points'
)) . '">' . 'Most Points' . '</a></li>
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
)) . '">' . 'Staff Members' . '</a></li>
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
$__compilerVar2 = '';
$__compilerVar2 .= '1';
$__compilerVar3 = '';
if ($bigKey)
{
$__compilerVar3 .= '<span class="bigNumber">' . XenForo_Template_Helper_Core::numberFormat($user[$bigKey], '0') . '</span>';
}
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar4 .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($id) ? (' id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's',
'class' => (($__compilerVar2) ? ('NoOverlay') : (''))
),'')) . '

	';
if ($__compilerVar3)
{
$__compilerVar4 .= '<div class="extra">' . $__compilerVar3 . '</div>';
}
$__compilerVar4 .= '

	<div class="member">
	
		';
if ($user['user_id'])
{
$__compilerVar4 .= '
		
			<h3 class="username">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',(true),array(
'class' => 'StatusTooltip' . (($__compilerVar2) ? (' NoOverlay') : ('')),
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
					<dt title="' . 'Total messages posted by ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '' . '">' . 'Messages' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($user['message_count'], '0') . '</dd>
					<dt title="' . 'Number of times something posted by ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' has been \'liked\'' . '">' . 'Likes Received' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($user['like_count'], '0') . '</dd>
					<dt>' . 'Trophy Points' . ':</dt> <dd title="' . 'Trophy Points' . '">' . XenForo_Template_Helper_Core::numberFormat($user['trophy_points'], '0') . '</dd>
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
			<h3 class="username guest dimmed">' . 'Guest' . '</h3>
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
unset($__compilerVar2, $__compilerVar3, $__compilerVar4);
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
			<h3><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'See all online users' . '">' . 'Find Member' . '</a></h3>
				
			<input type="search" name="username" placeholder="' . 'Name' . '..." results="0" class="textCtrl AutoComplete" data-autoSubmit="true" />
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
				<h3>' . 'Newest Members' . '</h3>
				
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
'title' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ', ' . 'Joined' . ': ' . XenForo_Template_Helper_Core::datetime($user['register_date'], '')
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
