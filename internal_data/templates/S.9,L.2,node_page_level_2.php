<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'node_list');
$__output .= '
';
$this->addRequiredExternal('css', 'node_page');
$__output .= '

<li class="node page level_' . htmlspecialchars($level, ENT_QUOTES, 'UTF-8') . ' ' . (($level == 1 AND !$renderedChildren) ? ('groupNoChildren') : ('')) . ' node_' . htmlspecialchars($page['node_id'], ENT_QUOTES, 'UTF-8') . '">

	';
if ($level == 1)
{
$__output .= '<div class="categoryStrip"></div>';
}
$__output .= '

	<div class="nodeInfo pageNodeInfo">
		<span class="nodeIcon"></span>

		<div class="nodeText">
			<h3 class="nodeTitle"><a href="' . XenForo_Template_Helper_Core::link('pages', $page, array()) . '">' . htmlspecialchars($page['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>
			';
if ($page['description'])
{
$__output .= '
				<blockquote class="nodeDescription baseHtml muted" id="nodeDescription-' . htmlspecialchars($page['node_id'], ENT_QUOTES, 'UTF-8') . '">' . $page['description'] . '</blockquote>
			';
}
$__output .= '
		</div>
	</div>
	
	';
if ($renderedChildren AND $level == 1)
{
$__output .= '		
		<ol class="nodeList">
			';
foreach ($renderedChildren AS $child)
{
$__output .= $child;
}
$__output .= '
		</ol>
	';
}
$__output .= '
	
</li>';
