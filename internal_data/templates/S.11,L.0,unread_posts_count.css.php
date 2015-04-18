<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.postItemCount
{
	background: ' . XenForo_Template_Helper_Core::styleProperty('primaryDark') . ';
	padding: 2px 4px;

	text-align: center;

	font-weight: bold;

	border-radius: 2px;
	text-shadow: none;

	margin-left: 2px;
}

.postItemCount.alert
{
	background: ' . XenForo_Template_Helper_Core::styleProperty('alertBalloon.background-color') . ';
	color: white;
	box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.25);
}

a:hover .postItemCount
{
	color: white;
}

.Menu .blockLinksList li .postItemCount
{
	float:right;
}';
