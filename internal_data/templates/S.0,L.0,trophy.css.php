<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.trophy
{
	overflow: hidden; zoom: 1;
}

	.trophy .points
	{
		float: left;
		width: 65px;
		text-align: center;
		font-size: 18pt;
		font-weight: bold;
	}
	
	.trophy .awarded
	{
		float: right;
		font-size: 11px;
		color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	}

	.trophy .info
	{
		margin-left: 70px;
	}
	
	.trophy .info .title
	{
		font-size: 11pt;
		font-weight: bold;
	}
	
	.trophy .info .description
	{
		font-size: 11px;
		color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	}';
