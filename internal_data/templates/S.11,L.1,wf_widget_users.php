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
$__compilerVar1 = '';
$__compilerVar1 .= (($widget['options']['order'] == ('message_count')) ? ('Messages' . ': ' . XenForo_Template_Helper_Core::numberFormat($user['message_count'], '0')) : (XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $user
))
))));
if (trim($__compilerVar1) !== '')
{
$__output .= ' - ' . $__compilerVar1;
}
unset($__compilerVar1);
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
$__compilerVar2 = '';
$__compilerVar2 .= (($widget['options']['order'] == ('message_count')) ? ('Messages' . ': ' . XenForo_Template_Helper_Core::numberFormat($user['message_count'], '0')) : (XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $user
))
))));
if (trim($__compilerVar2) !== '')
{
$__output .= ' - ' . $__compilerVar2;
}
unset($__compilerVar2);
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
        				<div class="userTitle">' . 'Messages' . ': ' . XenForo_Template_Helper_Core::numberFormat($user['message_count'], '0') . '</div>
        			';
}
else
{
$__output .= '
        				';
$__compilerVar3 = '';
$__compilerVar3 .= XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $user
));
if (trim($__compilerVar3) !== '')
{
$__output .= '<div class="userTitle">' . $__compilerVar3 . '</div>';
}
unset($__compilerVar3);
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
