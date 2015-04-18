<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<ul class="secondaryContent blockLinksList">

	<!-- before child nodes -->
	';
if (XenForo_Template_Helper_Core::styleProperty('wf_homeLinksChildNodes') AND $childNodes)
{
$__output .= '
		';
foreach ($childNodes AS $childNode)
{
$__output .= '
			';
if ($childNode['parent_node_id'] == $indexNodeId)
{
$__output .= '
				';
$__compilerVar1 = '';
$__compilerVar1 .= '

					';
if ($childNode['node_type_id'] == ('Category'))
{
$__compilerVar1 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('categories', $childNode, array()) . '">' . htmlspecialchars($childNode['title'], ENT_QUOTES, 'UTF-8') . '</a></li>
					';
}
else if ($childNode['node_type_id'] == ('Forum'))
{
$__compilerVar1 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('forums', $childNode, array()) . '">' . htmlspecialchars($childNode['title'], ENT_QUOTES, 'UTF-8') . '</a></li>
					';
}
else if ($childNode['node_type_id'] == ('LinkForum'))
{
$__compilerVar1 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('link-forums', $childNode, array()) . '">' . htmlspecialchars($childNode['title'], ENT_QUOTES, 'UTF-8') . '</a></li>
					';
}
else if ($childNode['node_type_id'] == ('Page'))
{
$__compilerVar1 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('pages', $childNode, array()) . '">' . htmlspecialchars($childNode['title'], ENT_QUOTES, 'UTF-8') . '</a></li>
					';
}
else if ($childNode['node_type_id'] == ('WF_WidgetPage'))
{
$__compilerVar1 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('widget-pages', $childNode, array()) . '">' . htmlspecialchars($childNode['title'], ENT_QUOTES, 'UTF-8') . '</a></li>
					';
}
$__compilerVar1 .= '

				';
$__output .= $this->callTemplateHook('wf_home_navtab_link_node', $__compilerVar1, array(
'node' => $childNode
));
unset($__compilerVar1);
$__output .= '
			';
}
$__output .= '
		';
}
$__output .= '
	';
}
$__output .= '

	<!-- before navigation_tabs_forums -->
	';
if (XenForo_Template_Helper_Core::styleProperty('wf_homeLinksForums'))
{
$__output .= '
		
		<!-- navigation_tabs_forums for wf_home_navtab_links -->
	';
}
$__output .= '
	<!-- after navigation_tabs_forums -->

</ul>

';
