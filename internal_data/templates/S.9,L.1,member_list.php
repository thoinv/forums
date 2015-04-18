<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Registered Members' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Registered Members';
$__output .= '

';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'This is a list of all members registered at ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '.';
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
	<div class="importantMessage">' . 'The specified member cannot be found. Please enter a member\'s entire name.' . '</div>
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
$__compilerVar1 = '';
$__compilerVar1 .= '1';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar2 .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($id) ? (' id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's',
'class' => (($__compilerVar1) ? ('NoOverlay') : (''))
),'')) . '

	';
if ($extraTemplate)
{
$__compilerVar2 .= '<div class="extra">' . $extraTemplate . '</div>';
}
$__compilerVar2 .= '

	<div class="member">
	
		';
if ($user['user_id'])
{
$__compilerVar2 .= '
		
			<h3 class="username">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',(true),array(
'class' => 'StatusTooltip' . (($__compilerVar1) ? (' NoOverlay') : ('')),
'title' => XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $user['status'],
'1' => '0',
'2' => array(
'stripPlainTag' => '1'
)
))
))) . '</h3>
			
			';
$__compilerVar3 = '';
$__compilerVar3 .= '<div class="userInfo">
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
$__compilerVar2 .= $this->callTemplateHook('dark_member_list_info', $__compilerVar3, array(
'user' => $user
));
unset($__compilerVar3);
$__compilerVar2 .= '
		';
}
else if ($guestHtml)
{
$__compilerVar2 .= '
			<h3 class="username guest dimmed">' . $guestHtml . '</h3>
		';
}
else
{
$__compilerVar2 .= '
			<h3 class="username guest dimmed">' . 'Guest' . '</h3>
		';
}
$__compilerVar2 .= '
		
		';
$__compilerVar4 = '';
$__compilerVar4 .= $contentTemplate;
if (trim($__compilerVar4) !== '')
{
$__compilerVar2 .= '
			<div class="contentInfo">' . $__compilerVar4 . '</div>
		';
}
unset($__compilerVar4);
$__compilerVar2 .= '
		
	</div>
	
</li>';
$__output .= $__compilerVar2;
unset($__compilerVar1, $__compilerVar2);
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
			<h3><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'See all online users' . '">' . 'Find Member' . '</a></h3>
				
			<input type="search" name="username" placeholder="' . 'Name' . '..." results="0" class="textCtrl AutoComplete" data-autoSubmit="true" />
			<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		</form>
	</div>
	
	<div class="section activeMembers">
		<div class="secondaryContent avatarHeap">
			<h3>' . 'Highest-Posting Members' . '</h3>
			
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
'title' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ', ' . 'Messages' . ': ' . XenForo_Template_Helper_Core::numberFormat($user['message_count'], '0')
),'')) . '</li>
				';
}
$__extraData['sidebar'] .= '
			</ol>
		</div>
	</div>
	
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
'title' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ', ' . 'Joined' . ': ' . XenForo_Template_Helper_Core::datetime($user['register_date'], '')
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
