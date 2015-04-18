<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar6 = '';
$__compilerVar6 .= 'user_list_' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar7 = '';
$__compilerVar7 .= '
		<a href="' . XenForo_Template_Helper_Core::link('account/stop-ignoring', '', array(
'user_id' => $user['user_id']
)) . '"
			class="UnfollowLink button smallButton"
			data-userId="' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') . '">' . 'Stop Ignoring' . '</a>
	';
$__compilerVar8 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar8 .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($__compilerVar6) ? (' id="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's',
'class' => (($noOverlay) ? ('NoOverlay') : (''))
),'')) . '

	';
if ($__compilerVar7)
{
$__compilerVar8 .= '<div class="extra">' . $__compilerVar7 . '</div>';
}
$__compilerVar8 .= '

	<div class="member">
	
		';
if ($user['user_id'])
{
$__compilerVar8 .= '
		
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
$__compilerVar9 = '';
$__compilerVar9 .= '<div class="userInfo">
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
$__compilerVar8 .= $this->callTemplateHook('dark_member_list_info', $__compilerVar9, array(
'user' => $user
));
unset($__compilerVar9);
$__compilerVar8 .= '
		';
}
else if ($guestHtml)
{
$__compilerVar8 .= '
			<h3 class="username guest dimmed">' . $guestHtml . '</h3>
		';
}
else
{
$__compilerVar8 .= '
			<h3 class="username guest dimmed">' . 'Khách' . '</h3>
		';
}
$__compilerVar8 .= '
		
		';
$__compilerVar10 = '';
$__compilerVar10 .= $contentTemplate;
if (trim($__compilerVar10) !== '')
{
$__compilerVar8 .= '
			<div class="contentInfo">' . $__compilerVar10 . '</div>
		';
}
unset($__compilerVar10);
$__compilerVar8 .= '
		
	</div>
	
</li>';
$__output .= $__compilerVar8;
unset($__compilerVar6, $__compilerVar7, $__compilerVar8);
