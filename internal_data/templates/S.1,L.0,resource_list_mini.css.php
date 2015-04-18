<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.miniResourceList li
{
	margin-bottom: 1em;
}

.miniResourceList .resourceTitle
{
	font-weight: bold;
	margin-right: 5px;
}

.miniResourceList .deleted .resourceTitle
{
	text-decoration: line-through;
}

.miniResourceList .username
{
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
}

.miniResourceList .tagLine
{
	font-size: 11px;
	color: ' . XenForo_Template_Helper_Core::styleProperty('dimmedTextColor') . ';
}';
