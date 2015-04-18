<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($visitor['user_id'] == $content['user_id'])
{
$__output .= '
' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' added ' . htmlspecialchars($extra_data['count'], ENT_QUOTES, 'UTF-8') . ' new photos to your album ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $content, array()) . '" class="PopupItemLink">' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '' . '
';
}
else
{
$__output .= '
' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' added ' . htmlspecialchars($extra_data['count'], ENT_QUOTES, 'UTF-8') . ' new photos to the album ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $content, array()) . '" class="PopupItemLink">' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . ' by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $content
)) . '' . '
';
}
