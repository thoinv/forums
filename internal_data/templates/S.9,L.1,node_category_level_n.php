<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li class="node category level-n node_' . htmlspecialchars($category['node_id'], ENT_QUOTES, 'UTF-8') . '">
	<div ' . (($category['hasNew']) ? ('class="unread"') : ('')) . '>
		<h4 class="nodeTitle"><a href="' . XenForo_Template_Helper_Core::link('categories', $category, array()) . '" class="menuRow">' . htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') . '</a></h4>
	</div>
	';
if ($renderedChildren)
{
$__output .= '
		<ol>
			';
foreach ($renderedChildren AS $child)
{
$__output .= '
				' . $child . '
			';
}
$__output .= '
		</ol>
	';
}
$__output .= '
</li>';
