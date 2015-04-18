<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$this->addRequiredExternal('css', 'node_list');
$__compilerVar1 .= '
';
$this->addRequiredExternal('css', 'node_page');
$__compilerVar1 .= '

<li class="node page level_' . htmlspecialchars($level, ENT_QUOTES, 'UTF-8') . ' ' . (($level == 1 AND !$renderedChildren) ? ('groupNoChildren') : ('')) . ' node_' . htmlspecialchars($widgetPage['node_id'], ENT_QUOTES, 'UTF-8') . '">

	';
if ($level == 1)
{
$__compilerVar1 .= '<div class="categoryStrip"></div>';
}
$__compilerVar1 .= '

	<div class="nodeInfo pageNodeInfo">
		<span class="nodeIcon"></span>

		<div class="nodeText">
			<h3 class="nodeTitle"><a href="' . XenForo_Template_Helper_Core::link('widget-pages', $widgetPage, array()) . '">' . htmlspecialchars($widgetPage['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>
			';
if ($widgetPage['description'])
{
$__compilerVar1 .= '
				<blockquote class="nodeDescription baseHtml muted" id="nodeDescription-' . htmlspecialchars($widgetPage['node_id'], ENT_QUOTES, 'UTF-8') . '">' . $widgetPage['description'] . '</blockquote>
			';
}
$__compilerVar1 .= '
		</div>
	</div>
	
	';
if ($renderedChildren AND $level == 1)
{
$__compilerVar1 .= '		
		<ol class="nodeList">
			';
foreach ($renderedChildren AS $child)
{
$__compilerVar1 .= $child;
}
$__compilerVar1 .= '
		</ol>
	';
}
$__compilerVar1 .= '
	
</li>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
