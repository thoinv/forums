<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'member_list');
$__output .= '
';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__output .= '
';
$this->addRequiredExternal('css', 'top_users');
$__output .= '

';
$__extraData['title'] = '';
$__extraData['title'] .= 'Top Contributors' . ' ' . htmlspecialchars($topUsers['month_str'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Top Contributors' . ' ' . htmlspecialchars($topUsers['month_str'], ENT_QUOTES, 'UTF-8');
$__output .= '

<div class="topUsersSelection">
	';
if ($topUsers['month_down'])
{
$__output .= '
		<a href="' . XenForo_Template_Helper_Core::link('top-users/' . htmlspecialchars($topUsers['month_id_minus'], ENT_QUOTES, 'UTF-8'), false, array()) . '"><div class="isSel">' . 'Previous Month' . '</div></a>
	';
}
$__output .= '
	';
if ($topUsers['month_up'])
{
$__output .= '
		<a href="' . XenForo_Template_Helper_Core::link('top-users/' . htmlspecialchars($topUsers['month_id_plus'], ENT_QUOTES, 'UTF-8'), false, array()) . '"><div class="isSel">' . 'Next Month' . '</div></a>
	';
}
$__output .= '
</div>

';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'Top contributors to the forum for the month' . ' ' . htmlspecialchars($topUsers['month_str'], ENT_QUOTES, 'UTF-8');
$__output .= '

<ol class="section memberList">
	';
foreach ($topUsers['users'] AS $user)
{
$__output .= '
		<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($id) ? (' id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>
			
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's',
'class' => (($noOverlay) ? ('NoOverlay') : (''))
),'')) . '
				
				<div class="member">
					
					';
if ($user['user_id'])
{
$__output .= '
						
						<h3 class="username">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',(true),array(
'class' => 'StatusTooltip' . (($noOverlay) ? (' NoOverlay') : ('')),
'title' => XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($user['status'], ENT_QUOTES, 'UTF-8')
))
))) . '</h3>
						
						<div class="userInfo">
							<div class="userBlurb dimmed">' . XenForo_Template_Helper_Core::callHelper('userBlurb', array(
'0' => $user
)) . '</div>
							<dl class="userStats pairsInline">
								<dt title="' . 'Total messages posted by ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '' . '">' . htmlspecialchars($topUsers['month_str'], ENT_QUOTES, 'UTF-8') . ': ' . 'Bài viết' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($user['messages_delta'], '0') . '</dd>
								<dt title="' . 'Number of times something posted by ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' has been \'liked\'' . '">' . 'Đã được thích' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($user['likes_delta'], '0') . '</dd>
								
							</dl>
						</div>
						
						';
}
else
{
$__output .= '
						<h3 class="username guest dimmed">' . 'Khách' . '</h3>
					';
}
$__output .= '
					
					';
$__compilerVar2 = '';
$__compilerVar2 .= $contentTemplate;
if (trim($__compilerVar2) !== '')
{
$__output .= '
						<div class="contentInfo">' . $__compilerVar2 . '</div>
					';
}
unset($__compilerVar2);
$__output .= '
					
				</div>
				
			</li>
		';
}
$__output .= '
</ol>

<p>
	<span class="muted">';
if ($topUsers['updated_cache'])
{
$__output .= 'Updated in' . ' ' . htmlspecialchars($topUsers['query_time'], ENT_QUOTES, 'UTF-8') . 's';
}
else
{
$__output .= 'Last updated' . ': ' . htmlspecialchars($topUsers['cache_date'], ENT_QUOTES, 'UTF-8') . '.';
}
$__output .= '</span>
</p>
<br />


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
if ($xenOptions['facebookAppId'] AND $xenOptions['facebookFacepile'])
{
$__extraData['sidebar'] .= '
		';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__extraData['sidebar'] .= '
		<fb:facepile width="' . XenForo_Template_Helper_Core::styleProperty('sidebar.width') . '" size="small" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:facepile>
	';
}
$__extraData['sidebar'] .= '
	
';
$__output .= '


';
