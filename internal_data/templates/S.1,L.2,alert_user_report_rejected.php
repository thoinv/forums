<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($extra['comment'])
{
$__output .= '
	' . 'Unfortunately, your recent report has been rejected: ' . htmlspecialchars($extra['title'], ENT_QUOTES, 'UTF-8') . ' - ' . htmlspecialchars($extra['comment'], ENT_QUOTES, 'UTF-8') . '' . '
';
}
else
{
$__output .= '
	' . 'Unfortunately, your recent report was rejected: ' . htmlspecialchars($extra['title'], ENT_QUOTES, 'UTF-8') . '' . '
';
}
