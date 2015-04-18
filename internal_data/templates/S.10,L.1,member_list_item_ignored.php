<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= 'user_list_' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar2 = '';
$__compilerVar2 .= '
		<a href="' . XenForo_Template_Helper_Core::link('account/stop-ignoring', '', array(
'user_id' => $user['user_id']
)) . '"
			class="UnfollowLink button smallButton"
			data-userId="' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') . '">' . 'Stop Ignoring' . '</a>
	';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar3 .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($__compilerVar1) ? (' id="' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's',
'class' => (($noOverlay) ? ('NoOverlay') : (''))
),'')) . '

	';
if ($__compilerVar2)
{
$__compilerVar3 .= '<div class="extra">' . $__compilerVar2 . '</div>';
}
$__compilerVar3 .= '

	<div class="member">
	
		';
if ($user['user_id'])
{
$__compilerVar3 .= '
		
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
$__compilerVar4 = '';
$__compilerVar4 .= '<div class="userInfo">
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
$__compilerVar3 .= $this->callTemplateHook('dark_member_list_info', $__compilerVar4, array(
'user' => $user
));
unset($__compilerVar4);
$__compilerVar3 .= '
		';
}
else if ($guestHtml)
{
$__compilerVar3 .= '
			<h3 class="username guest dimmed">' . $guestHtml . '</h3>
		';
}
else
{
$__compilerVar3 .= '
			<h3 class="username guest dimmed">' . 'Guest' . '</h3>
		';
}
$__compilerVar3 .= '
		
		';
$__compilerVar5 = '';
$__compilerVar5 .= $contentTemplate;
if (trim($__compilerVar5) !== '')
{
$__compilerVar3 .= '
			<div class="contentInfo">' . $__compilerVar5 . '</div>
		';
}
unset($__compilerVar5);
$__compilerVar3 .= '
		
	</div>
	
</li>';
$__output .= $__compilerVar3;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3);
