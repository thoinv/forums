<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Most Active Authors';
$__output .= '

<div class="section">
	<ol class="overlayScroll">
	';
foreach ($authors AS $user)
{
$__output .= '
		';
$__compilerVar1 = '';
$__compilerVar1 .= '
				<a href="' . XenForo_Template_Helper_Core::link('resources/authors', $user, array()) . '" class="concealed"><span style="font-size: 32px" class="dimmed">' . XenForo_Template_Helper_Core::numberFormat($user['resource_count'], '0') . '</span> <span class="faint">' . 'Tài nguyên' . '</span></a>
			';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar2 .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($id) ? (' id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's',
'class' => (($noOverlay) ? ('NoOverlay') : (''))
),'')) . '

	';
if ($__compilerVar1)
{
$__compilerVar2 .= '<div class="extra">' . $__compilerVar1 . '</div>';
}
$__compilerVar2 .= '

	<div class="member">
	
		';
if ($user['user_id'])
{
$__compilerVar2 .= '
		
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
	<div class="sectionFooter overlayOnly"><a class="button primary OverlayCloser">' . 'Close' . '</a></div>
</div>';
