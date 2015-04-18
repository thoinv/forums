<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.warningHeader
{
	overflow: hidden; zoom: 1;
	margin: 10px 0;
}

	.warningHeader .avatar
	{
		float: left;
		margin-right: 10px;
	}
	
	.warningHeader dt
	{
		font-size: 11px;
		color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	}
	
	.warningHeader dd h2
	{
		font-size: 13pt;
	}';
