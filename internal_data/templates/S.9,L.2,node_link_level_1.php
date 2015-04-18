<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'node_list');
$__compilerVar2 .= '
';
$this->addRequiredExternal('css', 'node_link');
$__compilerVar2 .= '

<li class="node link level_' . htmlspecialchars($level, ENT_QUOTES, 'UTF-8') . ' ' . (($level == 1 AND !$renderedChildren) ? ('groupNoChildren') : ('')) . ' node_' . htmlspecialchars($link['node_id'], ENT_QUOTES, 'UTF-8') . '">

	';
if ($level == 1)
{
$__compilerVar2 .= '<div class="categoryStrip"></div>';
}
$__compilerVar2 .= '
	
	<div class="nodeInfo linkNodeInfo">
		<span class="nodeIcon"></span>

		<div class="nodeText">
			<h3 class="nodeTitle"><a href="' . XenForo_Template_Helper_Core::link('link-forums', $link, array()) . '" data-description-x="#nodeDescription-' . htmlspecialchars($link['node_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($link['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>
			';
if ($link['description'])
{
$__compilerVar2 .= '<blockquote class="nodeDescription muted baseHtml" id="nodeDescription-' . htmlspecialchars($link['node_id'], ENT_QUOTES, 'UTF-8') . '">' . $link['description'] . '</blockquote>';
}
$__compilerVar2 .= '
		</div>		
	</div>
	
	';
if ($renderedChildren AND $level == 1)
{
$__compilerVar2 .= '		
		<ol class="nodeList">
			';
foreach ($renderedChildren AS $child)
{
$__compilerVar2 .= $child;
}
$__compilerVar2 .= '
		</ol>
	';
}
$__compilerVar2 .= '
</li>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
