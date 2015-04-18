<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($content['friend_state'] == ('pending'))
{
$__output .= '
	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' has added you as a friend. ' . '<a href="' . XenForo_Template_Helper_Core::link('members/friend', $user, array()) . '">' . 'Confirm as a friend' . '</a>' . '' . '
';
}
else
{
$__output .= '
	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' has added you as a friend. ' . '' . '' . '
';
}
