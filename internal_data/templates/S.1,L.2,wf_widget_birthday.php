<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if (XenForo_Template_Helper_Core::numberFormat(count($users), '0') == 1)
{
$__output .= '
	<h4 class="minorHeading">' . 'Today is ' . htmlspecialchars($users['0']['username'], ENT_QUOTES, 'UTF-8') . '\'s birthday.' . '</h4>
	<div class="avatarList">
		<ul>
			';
foreach ($users AS $user)
{
$__output .= '
				<li class="user-' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') . '">
					' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true'
),'')) . '
					' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',(true),array())) . '
					<div class="userTitle">' . XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $user
));
if ($user['age'])
{
$__output .= ', ' . htmlspecialchars($user['age'], ENT_QUOTES, 'UTF-8');
}
$__output .= '</div>
				</li>
			';
}
$__output .= '
		</ul>
	</div>
';
}
else if (XenForo_Template_Helper_Core::numberFormat(count($users), '0') > 1)
{
$__output .= '
	<h4 class="minorHeading">' . 'Today is ' . XenForo_Template_Helper_Core::numberFormat(count($users), '0') . ' people\'s birthday.' . '</h4>
	<ul class="followedOnline">
		';
foreach ($users AS $user)
{
$__output .= '
			<li title="' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8');
if ($user['age'])
{
$__output .= ', ' . htmlspecialchars($user['age'], ENT_QUOTES, 'UTF-8');
}
$__output .= '" class="Tooltip user-' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') . '">
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true',
'class' => '_plainImage'
),'')) . '
			</li>
		';
}
$__output .= '
	</ul>
';
}
