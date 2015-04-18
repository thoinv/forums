<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'node_list');
$__output .= '
';
$this->addRequiredExternal('css', 'node_category');
$__output .= '

<li class="node category level_' . htmlspecialchars($level, ENT_QUOTES, 'UTF-8') . ' node_' . htmlspecialchars($category['node_id'], ENT_QUOTES, 'UTF-8') . ' sectionMain" id="' . XenForo_Template_Helper_Core::callHelper('linktitle', array(
'0' => $category['node_id'],
'1' => $category['title'],
'2' => '1'
)) . '">

	<div class="nodeInfo categoryNodeInfo categoryStrip">
	
		<div class="categoryText">
			<h3 class="nodeTitle"><a href="' . XenForo_Template_Helper_Core::link('categories', $category, array()) . '">' . htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>
			';
if ($category['description'])
{
$__output .= '<blockquote class="nodeDescription baseHtml">' . $category['description'] . '</blockquote>';
}
$__output .= '
		</div>
		
	</div>
	
	';
if ($renderedChildren)
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
	
	<span class="tlc"></span>
	<span class="trc"></span>
	<span class="blc"></span>
	<span class="brc"></span>
</li>';
