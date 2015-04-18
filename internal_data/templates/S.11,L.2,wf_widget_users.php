<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($widget['options']['displayMode'] == ('avatarOnly'))
{
$__output .= '
    <ul class="followedOnline">
		';
foreach ($users AS $user)
{
$__output .= '
			<li title="' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8');
$__compilerVar4 = '';
$__compilerVar4 .= (($widget['options']['order'] == ('message_count')) ? ('Bài viết' . ': ' . XenForo_Template_Helper_Core::numberFormat($user['message_count'], '0')) : (XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $user
))
))));
if (trim($__compilerVar4) !== '')
{
$__output .= ' - ' . $__compilerVar4;
}
unset($__compilerVar4);
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
else if ($widget['options']['displayMode'] == ('avatarOnlyBigger'))
{
$__output .= '
    <ul class="avatarHeap">
		';
foreach ($users AS $user)
{
$__output .= '
			<li title="' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8');
$__compilerVar5 = '';
$__compilerVar5 .= (($widget['options']['order'] == ('message_count')) ? ('Bài viết' . ': ' . XenForo_Template_Helper_Core::numberFormat($user['message_count'], '0')) : (XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $user
))
))));
if (trim($__compilerVar5) !== '')
{
$__output .= ' - ' . $__compilerVar5;
}
unset($__compilerVar5);
$__output .= '" class="Tooltip user-' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') . '">
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's'
),'')) . '
			</li>
		';
}
$__output .= '
	</ul>
';
}
else
{
$__output .= '
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
        			';
if ($widget['options']['order'] == ('message_count'))
{
$__output .= '
        				<div class="userTitle">' . 'Bài viết' . ': ' . XenForo_Template_Helper_Core::numberFormat($user['message_count'], '0') . '</div>
        			';
}
else
{
$__output .= '
        				';
$__compilerVar6 = '';
$__compilerVar6 .= XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $user
));
if (trim($__compilerVar6) !== '')
{
$__output .= '<div class="userTitle">' . $__compilerVar6 . '</div>';
}
unset($__compilerVar6);
$__output .= '
        			';
}
$__output .= '
        		</li>
        	';
}
$__output .= '
        </ul>
    </div>
';
}
