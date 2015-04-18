<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Members Following ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '';
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
if ($followers)
{
$__output .= '
	<ol class="overlayScroll">
	';
foreach ($followers AS $followUser)
{
$__output .= '
		';
$__compilerVar1 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar1 .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($id) ? (' id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($followUser,false,array(
'user' => '$user',
'size' => 's',
'class' => (($noOverlay) ? ('NoOverlay') : (''))
),'')) . '

	';
if ($extraTemplate)
{
$__compilerVar1 .= '<div class="extra">' . $extraTemplate . '</div>';
}
$__compilerVar1 .= '

	<div class="member">
	
		';
if ($followUser['user_id'])
{
$__compilerVar1 .= '
		
			<h3 class="username">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($followUser,'',(true),array(
'class' => 'StatusTooltip' . (($noOverlay) ? (' NoOverlay') : ('')),
'title' => XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $followUser['status'],
'1' => '0',
'2' => array(
'stripPlainTag' => '1'
)
))
))) . '</h3>
			
			';
$__compilerVar2 = '';
$__compilerVar2 .= '<div class="userInfo">
				<div class="userBlurb dimmed">' . XenForo_Template_Helper_Core::callHelper('userBlurb', array(
'0' => $followUser
)) . '</div>
				<dl class="userStats pairsInline">
					<dt title="' . 'Total messages posted by ' . htmlspecialchars($followUser['username'], ENT_QUOTES, 'UTF-8') . '' . '">' . 'Messages' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($followUser['message_count'], '0') . '</dd>
					<dt title="' . 'Number of times something posted by ' . htmlspecialchars($followUser['username'], ENT_QUOTES, 'UTF-8') . ' has been \'liked\'' . '">' . 'Likes Received' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($followUser['like_count'], '0') . '</dd>
					<dt>' . 'Trophy Points' . ':</dt> <dd title="' . 'Trophy Points' . '">' . XenForo_Template_Helper_Core::numberFormat($followUser['trophy_points'], '0') . '</dd>
				</dl>
			</div>
			';
$__compilerVar1 .= $this->callTemplateHook('dark_member_list_info', $__compilerVar2, array(
'user' => $followUser
));
unset($__compilerVar2);
$__compilerVar1 .= '
		';
}
else if ($guestHtml)
{
$__compilerVar1 .= '
			<h3 class="username guest dimmed">' . $guestHtml . '</h3>
		';
}
else
{
$__compilerVar1 .= '
			<h3 class="username guest dimmed">' . 'Guest' . '</h3>
		';
}
$__compilerVar1 .= '
		
		';
$__compilerVar3 = '';
$__compilerVar3 .= $contentTemplate;
if (trim($__compilerVar3) !== '')
{
$__compilerVar1 .= '
			<div class="contentInfo">' . $__compilerVar3 . '</div>
		';
}
unset($__compilerVar3);
$__compilerVar1 .= '
		
	</div>
	
</li>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
	';
}
$__output .= '
	</ol>
	<div class="sectionFooter">
		<a class="button primary OverlayCloser overlayOnly">' . 'Close' . '</a>
		';
if ($hasMore)
{
$__output .= '<a class="button OverlayCloser OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('members/followers', $user, array(
'page' => ($page + 1)
)) . '">' . 'More' . '...</a>';
}
$__output .= '
		&nbsp;
	</div>
';
}
else
{
$__output .= '
	<div class="primaryContent">
		';
if ($page > 1)
{
$__output .= '
			' . 'No results found.' . '
		';
}
else
{
$__output .= '
			' . 'No members are following ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '.' . '
		';
}
$__output .= '
	</div>
	<div class="sectionFooter overlayOnly"><a class="button primary OverlayCloser">' . 'Close' . '</a></div>
';
}
$__output .= '
</div>';
