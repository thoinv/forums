<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<ul class="secondaryContent blockLinksList">
	<li><a href="' . XenForo_Template_Helper_Core::link('wiki', false, array()) . '">' . $index['page_name'] . '</a></li>
	<li><a href="' . XenForo_Template_Helper_Core::link('wiki/special/pages', false, array()) . '">' . 'Page List' . '</a></li>
	';
if ($perms['history'])
{
$__output .= '
		<li><a href="' . XenForo_Template_Helper_Core::link('wiki/special/recent', false, array()) . '">' . 'Hoạt động gần đây' . '</a></li>
	';
}
$__output .= '
	';
if ($perms['create'])
{
$__output .= '
		<li><a href="' . XenForo_Template_Helper_Core::link('wiki/special/create-page', false, array()) . '">' . 'Create New Page' . '</a></li>
	';
}
$__output .= '
	';
if ($perms['admin'])
{
$__output .= '
		<li style="width: 50px; height: 10px;"></li>
		<li><a href="' . XenForo_Template_Helper_Core::link('wiki/special/administrate', false, array()) . '">' . 'Administrate Wiki' . '</a></li>
	';
}
$__output .= '
</ul>';
