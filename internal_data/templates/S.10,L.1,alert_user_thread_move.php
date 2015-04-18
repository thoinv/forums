<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= 'Your thread ' . '<a href="' . htmlspecialchars($extra['link'], ENT_QUOTES, 'UTF-8') . '" class="PopupItemLink">' . htmlspecialchars($extra['title'], ENT_QUOTES, 'UTF-8') . '</a>' . ' was moved to a different forum.' . '
';
if ($extra['reason'])
{
$__output .= 'Reason' . ': ' . htmlspecialchars($extra['reason'], ENT_QUOTES, 'UTF-8');
}
