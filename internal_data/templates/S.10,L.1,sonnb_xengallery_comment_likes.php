<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Members Who Liked The Comment ID: ' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Members Who Liked The Comment ID: ' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

<div class="section">
	<ol class="overlayScroll">
	';
foreach ($likes AS $like)
{
$__output .= '
		';
$__compilerVar1 = '';
$__compilerVar1 .= XenForo_Template_Helper_Core::callHelper('datetimehtml', array($like['like_date'],array(
'time' => '$like.like_date'
)));
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar2 .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($id) ? (' id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($like,false,array(
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
if ($like['user_id'])
{
$__compilerVar2 .= '
		
			<h3 class="username">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($like,'',(true),array(
'class' => 'StatusTooltip' . (($noOverlay) ? (' NoOverlay') : ('')),
'title' => XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $like['status'],
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
'0' => $like
)) . '</div>
				<dl class="userStats pairsInline">
					<dt title="' . 'Total messages posted by ' . htmlspecialchars($like['username'], ENT_QUOTES, 'UTF-8') . '' . '">' . 'Messages' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($like['message_count'], '0') . '</dd>
					<dt title="' . 'Number of times something posted by ' . htmlspecialchars($like['username'], ENT_QUOTES, 'UTF-8') . ' has been \'liked\'' . '">' . 'Likes Received' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($like['like_count'], '0') . '</dd>
					<dt>' . 'Trophy Points' . ':</dt> <dd title="' . 'Trophy Points' . '">' . XenForo_Template_Helper_Core::numberFormat($like['trophy_points'], '0') . '</dd>
				</dl>
			</div>
			';
$__compilerVar2 .= $this->callTemplateHook('dark_member_list_info', $__compilerVar3, array(
'user' => $like
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
