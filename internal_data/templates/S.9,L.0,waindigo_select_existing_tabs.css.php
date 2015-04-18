<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.browserSection
{
	max-height: 200px;
	overflow: auto;
}

.browserSection .gridSection
{
	padding: 0px;
}

.browserSection .gridCol
{
	margin: 2px;
	display: block;
	float: left;
	width: 16%;
}

.browserSection input[type=radio]
{
	display: none;
}

.browserSection .thumbImage
{
	width: 100%;
	padding: 1px;
	cursor: pointer;
}

.browserSection input[type=radio]:checked + .thumbImage {
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . ';
	padding: 0;
}';
