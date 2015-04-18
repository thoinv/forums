<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($content['post_id'] == $content['first_post_id'])
{
$__output .= '
	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' started a thread called ' . '<a href="' . XenForo_Template_Helper_Core::link('posts', $content, array()) . '" class="PopupItemLink">' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $content
)) . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '. There may be more posts after this.' . '
';
}
else
{
$__output .= '
	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' attached a file to the thread ' . '<a href="' . XenForo_Template_Helper_Core::link('posts', $content, array()) . '" class="PopupItemLink">' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $content
)) . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '. There may be more posts after this.' . '
';
}
