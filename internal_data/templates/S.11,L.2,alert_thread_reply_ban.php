<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($extra['expiry'])
{
$__output .= '
	' . 'You will be unable to reply to the thread ' . '<a href="' . XenForo_Template_Helper_Core::link('threads', $content, array()) . '" class="PopupItemLink">' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $content
)) . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . ' until ' . XenForo_Template_Helper_Core::date($extra['expiry'], '') . '.' . '
';
}
else
{
$__output .= '
	' . 'You are no longer able to reply to the thread ' . '<a href="' . XenForo_Template_Helper_Core::link('threads', $content, array()) . '" class="PopupItemLink">' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $content
)) . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '.' . '
';
}
$__output .= '
';
if ($extra['reason'])
{
$__output .= 'Lý do' . ': ' . htmlspecialchars($extra['reason'], ENT_QUOTES, 'UTF-8');
}
