<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/* User name classes */
';
if ($displayStyles)
{
foreach ($displayStyles AS $displayStyleId => $displayStyle)
{
if ($displayStyle['username_css'])
{
$__output .= '
.username .style' . htmlspecialchars($displayStyleId, ENT_QUOTES, 'UTF-8') . '
{
	' . $displayStyle['username_css'] . '
}
';
}
}
}
$__output .= '

.username .banned
{
	text-decoration: line-through;
}';
