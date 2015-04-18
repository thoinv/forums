<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<ul class="secondaryContent blockLinksList">
	';
if ($canSearch)
{
$__output .= '<li><a href="' . XenForo_Template_Helper_Core::link('search', '', array(
'type' => 'resource_update'
)) . '">' . 'Search Resources' . '</a></li>';
}
$__output .= '
	<li><a href="' . XenForo_Template_Helper_Core::link('resources/authors', false, array()) . '">' . 'Most Active Authors' . '</a></li>
	';
if ($visitor['user_id'] && $visitor['resource_count'])
{
$__output .= '<li><a href="' . XenForo_Template_Helper_Core::link('resources/authors', $visitor, array()) . '">' . 'Your Resources' . '</a></li>';
}
$__output .= '
	';
if ($visitor['user_id'])
{
$__output .= '<li><a href="' . XenForo_Template_Helper_Core::link('resources/watched-categories', false, array()) . '">' . 'Watched Categories' . '</a></li>';
}
$__output .= '
	';
if ($visitor['user_id'])
{
$__output .= '<li><a href="' . XenForo_Template_Helper_Core::link('resources/watched', false, array()) . '">' . 'Watched Resources' . '</a></li>';
}
$__output .= '
</ul>';
