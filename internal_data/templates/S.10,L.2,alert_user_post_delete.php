<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= 'Your post in the thread ' . '<a href="' . htmlspecialchars($extra['threadLink'], ENT_QUOTES, 'UTF-8') . '" class="PopupItemLink">' . htmlspecialchars($extra['title'], ENT_QUOTES, 'UTF-8') . '</a>' . ' was deleted.' . '
';
if ($extra['reason'])
{
$__output .= 'Lý do' . ': ' . htmlspecialchars($extra['reason'], ENT_QUOTES, 'UTF-8');
}
