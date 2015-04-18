<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= '
			';
foreach ($onlineUsers['records'] AS $user)
{
$__compilerVar1 .= '
				';
if ((isset($user['is_staff']) AND $user['is_staff']) OR (!isset($user['is_staff']) AND ($user['is_moderator'] OR $user['is_admin'])))
{
$__compilerVar1 .= '
					<li class="user-' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') . '">
						' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true'
),'')) . '
						' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',(true),array())) . '
						<div class="userTitle">' . XenForo_Template_Helper_Core::callHelper('userTitle', array(
'0' => $user
)) . '</div>
					</li>
				';
}
$__compilerVar1 .= '
			';
}
$__compilerVar1 .= '
		';
if (trim($__compilerVar1) !== '')
{
$__output .= '
<div class="avatarList WidgetFramework_WidgetRenderer_OnlineStaff">
	<ul>
		' . $__compilerVar1 . '
	</ul>
</div>
';
}
unset($__compilerVar1);
