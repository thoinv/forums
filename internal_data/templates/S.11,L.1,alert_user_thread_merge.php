<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= 'Your thread ' . htmlspecialchars($extra['title'], ENT_QUOTES, 'UTF-8') . ' was merged into ' . '<a href="' . htmlspecialchars($extra['targetLink'], ENT_QUOTES, 'UTF-8') . '" class="PopupItemLink">' . htmlspecialchars($extra['targetTitle'], ENT_QUOTES, 'UTF-8') . '</a>' . '.' . '
';
if ($extra['reason'])
{
$__output .= 'Reason' . ': ' . htmlspecialchars($extra['reason'], ENT_QUOTES, 'UTF-8');
}
