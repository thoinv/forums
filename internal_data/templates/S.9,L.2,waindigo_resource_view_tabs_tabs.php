<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($tabContents)
{
$__output .= '
	';
foreach ($tabContents AS $tabContent)
{
$__output .= '
		<li class="resourceTabExtra">
			<a href="' . htmlspecialchars($tabContent['link'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($tabContent['title'], ENT_QUOTES, 'UTF-8') . '</a>
		</li>
	';
}
$__output .= '
';
}
