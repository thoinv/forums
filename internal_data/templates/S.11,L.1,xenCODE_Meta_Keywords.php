<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($contentTemplate == ('forum_list') OR ('EWRporta_Portal'))
{
if ($xenOptions['xenCODE_Meta_Keyword'] != (''))
{
$__output .= '
	<meta name="keywords" content="' . htmlspecialchars($xenOptions['xenCODE_Meta_Keyword'], ENT_QUOTES, 'UTF-8') . '" />
';
}
}
