<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.moodChooser ol
{
	height: 250px;
	overflow: auto;
}

.moodChooser li
{
	display: -moz-inline-stack;
	display: inline-block;
	zoom: 1;
	*display: inline;
	float: none !important;
	width: 32% !important;
}

.moodChooser li img
{
	display: block;
	margin-left: auto;
	margin-right: auto;
}

.moodChooser .currentMood a
{
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	text-decoration: none;
}';
