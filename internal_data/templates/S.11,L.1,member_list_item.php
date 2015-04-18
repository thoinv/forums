<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__output .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($id) ? (' id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's',
'class' => (($noOverlay) ? ('NoOverlay') : (''))
),'')) . '

	';
if ($extraTemplate)
{
$__output .= '<div class="extra">' . $extraTemplate . '</div>';
}
$__output .= '

	<div class="member">
	
		';
if ($user['user_id'])
{
$__output .= '
		
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
$__compilerVar1 = '';
$__compilerVar1 .= '<div class="userInfo">
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
$__output .= $this->callTemplateHook('dark_member_list_info', $__compilerVar1, array(
'user' => $user
));
unset($__compilerVar1);
$__output .= '
		';
}
else if ($guestHtml)
{
$__output .= '
			<h3 class="username guest dimmed">' . $guestHtml . '</h3>
		';
}
else
{
$__output .= '
			<h3 class="username guest dimmed">' . 'Guest' . '</h3>
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
	
</li>';
