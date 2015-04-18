<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
if ($category['description'] AND XenForo_Template_Helper_Core::styleProperty('threadListDescriptions'))
{
$__output .= '
	';
$__extraData['pageDescription'] = array(
'class' => 'baseHtml'
);
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= $category['description'];
$__output .= '
';
}
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__output .= '

';
$__extraData['quickNavSelected'] = '';
$__extraData['quickNavSelected'] .= 'node-' . htmlspecialchars($category['node_id'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['bodyClasses'] = '';
$__extraData['bodyClasses'] .= XenForo_Template_Helper_Core::callHelper('nodeClasses', array(
'0' => $nodeBreadCrumbs,
'1' => $category
));
$__output .= '
';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:categories', $category, array()) . '" />';
$__output .= '

';
if ($renderedNodes)
{
$__output .= '
	<ol class="nodeList section sectionMain">
	';
foreach ($renderedNodes AS $node)
{
$__output .= '
		' . $node . '
	';
}
$__output .= '
	</ol>
';
}
