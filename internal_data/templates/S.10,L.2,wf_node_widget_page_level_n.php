<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li class="node link level-n node_' . htmlspecialchars($widgetPage['node_id'], ENT_QUOTES, 'UTF-8') . '">
	<div>
		<h4 class="nodeTitle"><a href="' . XenForo_Template_Helper_Core::link('widget-pages', $widgetPage, array()) . '" class="menuRow">' . htmlspecialchars($widgetPage['title'], ENT_QUOTES, 'UTF-8') . '</a></h4>
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
