<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= 'Your thread ' . htmlspecialchars($extra['title'], ENT_QUOTES, 'UTF-8') . ' was deleted.' . '
';
if ($extra['reason'])
{
$__output .= 'Lý do' . ': ' . htmlspecialchars($extra['reason'], ENT_QUOTES, 'UTF-8');
}
