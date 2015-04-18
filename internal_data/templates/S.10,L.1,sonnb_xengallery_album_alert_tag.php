<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($extra_data['direct'])
{
$__output .= '
	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' tagged you in the album ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $content, array()) . '" class="PopupItemLink">' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '' . '
';
}
else
{
$__output .= '
	' . '' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $user,
'1' => 'subject'
)) . ' tagged you in the album ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $content, array()) . '" class="PopupItemLink">' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '. Click to ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/tags/accept', $content, array(
'content_id' => $content['album_id'],
'content_type' => 'album'
)) . '">' . 'Approve</a> or ' . '<a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/tags/deny', $content, array(
'content_id' => $content['album_id'],
'content_type' => 'album'
)) . '">' . 'Deny</a>.' . '
';
}
