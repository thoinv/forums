<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($visitor['user_id'] == $content['profile_user_id'])
{
$__output .= '
	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' liked your <a ' . 'href="' . XenForo_Template_Helper_Core::link('profile-posts', $content, array()) . '" class="PopupItemLink"' . '>status</a>.' . '
';
}
else
{
$__output .= '
	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' liked <a ' . 'href="' . XenForo_Template_Helper_Core::link('profile-posts', $content, array()) . '" class="PopupItemLink"' . '>your post</a> on ' . htmlspecialchars($content['profile_username'], ENT_QUOTES, 'UTF-8') . '\'s profile.' . '
';
}
