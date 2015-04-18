<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($content['user_id'] == $content['profile_user_id'])
{
$__output .= '
	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' cũng bình luận trong <a ' . 'href="' . XenForo_Template_Helper_Core::link('profile-posts', $content, array()) . '" class="PopupItemLink"' . '>trạng thái của ' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '</a>' . '.
';
}
else
{
$__output .= '
	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' cũng bình luận trong <a ' . 'href="' . XenForo_Template_Helper_Core::link('profile-posts', $content, array()) . '" class="PopupItemLink"' . '>hồ sơ của ' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '</a>' . '.
';
}
