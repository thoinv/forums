<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Theo dõi';
$__output .= '

';
$this->addRequiredExternal('css', 'account');
$__output .= '
';
$this->addRequiredExternal('css', 'member_list');
$__output .= '
';
$this->addRequiredExternal('js', 'js/xenforo/follow.js');
$__output .= '

<form method="post" class="xenForm AutoValidator FollowForm"
	action="' . XenForo_Template_Helper_Core::link('account/follow', false, array()) . '"
	data-userInputField="#ctrl_users">

	';
$__compilerVar9 = '';
$__compilerVar9 .= '
	<ul class="FollowList memberList">
		';
foreach ($following AS $user)
{
$__compilerVar9 .= '
			';
$__compilerVar10 = '';
$__compilerVar11 = '';
$__compilerVar11 .= 'user_list_' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar12 = '';
$__compilerVar12 .= '
		<a href="' . XenForo_Template_Helper_Core::link('account/stop-following-confirm', '', array(
'user_id' => $user['user_id']
)) . '"
			class="UnfollowLink button smallButton"
			data-jsonUrl="' . XenForo_Template_Helper_Core::link('account/stop-following.json', false, array()) . '"
			data-userId="' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') . '">' . 'Bỏ theo dõi' . '</a>
	';
$__compilerVar13 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar13 .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($__compilerVar11) ? (' id="' . htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's',
'class' => (($noOverlay) ? ('NoOverlay') : (''))
),'')) . '

	';
if ($__compilerVar12)
{
$__compilerVar13 .= '<div class="extra">' . $__compilerVar12 . '</div>';
}
$__compilerVar13 .= '

	<div class="member">
	
		';
if ($user['user_id'])
{
$__compilerVar13 .= '
		
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
$__compilerVar14 = '';
$__compilerVar14 .= '<div class="userInfo">
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
$__compilerVar13 .= $this->callTemplateHook('dark_member_list_info', $__compilerVar14, array(
'user' => $user
));
unset($__compilerVar14);
$__compilerVar13 .= '
		';
}
else if ($guestHtml)
{
$__compilerVar13 .= '
			<h3 class="username guest dimmed">' . $guestHtml . '</h3>
		';
}
else
{
$__compilerVar13 .= '
			<h3 class="username guest dimmed">' . 'Khách' . '</h3>
		';
}
$__compilerVar13 .= '
		
		';
$__compilerVar15 = '';
$__compilerVar15 .= $contentTemplate;
if (trim($__compilerVar15) !== '')
{
$__compilerVar13 .= '
			<div class="contentInfo">' . $__compilerVar15 . '</div>
		';
}
unset($__compilerVar15);
$__compilerVar13 .= '
		
	</div>
	
</li>';
$__compilerVar10 .= $__compilerVar13;
unset($__compilerVar11, $__compilerVar12, $__compilerVar13);
$__compilerVar9 .= $__compilerVar10;
unset($__compilerVar10);
$__compilerVar9 .= '
		';
}
$__compilerVar9 .= '
	</ul>
	';
$__output .= $this->callTemplateHook('account_following_memberlist', $__compilerVar9, array());
unset($__compilerVar9);
$__output .= '

	';
$__compilerVar16 = '';
$__compilerVar16 .= '
	<dl class="ctrlUnit">
		<dt><label for="ctrl_users">' . 'Theo dõi' . ':</label></dt>
		<dd>
			<input type="search" name="users" value="' . htmlspecialchars($username, ENT_QUOTES, 'UTF-8') . '" results="0" placeholder="' . 'Tên' . '..." class="textCtrl AutoComplete" id="ctrl_users" autofocus="autofocus" />
			<p class="explain">' . 'Dãn cách tên bằng dấu phẩy(,).' . '</p>
		</dd>
	</dl>
	';
$__output .= $this->callTemplateHook('account_following_controls', $__compilerVar16, array());
unset($__compilerVar16);
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Lưu thay đổi' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
