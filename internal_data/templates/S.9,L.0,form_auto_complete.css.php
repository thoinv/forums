<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= 'ul.autoCompleteList
{
	' . XenForo_Template_Helper_Core::styleProperty('secondaryContent.background') . '
	
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . ';
	padding: 2px;
	
	font-size: 11px;
	
	min-width: 180px;
	_width: 180px;
	
	z-index: 1000;
}

ul.autoCompleteList li
{
	padding: 3px 3px;
	height: 24px;
	line-height: 24px;
}

ul.autoCompleteList li:hover,
ul.autoCompleteList li.selected
{
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	border-radius: 3px;
}

ul.autoCompleteList img.autoCompleteAvatar
{
	float: left;
	margin-right: 3px;
	width: 24px;
	height: 24px;
}

ul.autoCompleteList li strong
{
	font-weight: bold;
}';
