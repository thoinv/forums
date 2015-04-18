<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($extra['comment'])
{
$__output .= '
	' . 'Your recent report has been resolved: ' . htmlspecialchars($extra['title'], ENT_QUOTES, 'UTF-8') . ' - ' . htmlspecialchars($extra['comment'], ENT_QUOTES, 'UTF-8') . '' . '
';
}
else
{
$__output .= '
	' . 'Your recent report has been resolved: ' . htmlspecialchars($extra['title'], ENT_QUOTES, 'UTF-8') . '' . '
';
}
