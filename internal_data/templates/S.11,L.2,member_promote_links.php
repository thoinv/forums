<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($visitor['user_id'] AND $user['user_id'] != $visitor['user_id'])
{
$__output .= '
	';
if ($canPromote)
{
$__output .= '<a href="' . XenForo_Template_Helper_Core::link('members/promote', $user, array()) . '" class="OverlayTrigger">' . 'Promote Or Demote This User' . '</a>';
}
$__output .= '
';
}
