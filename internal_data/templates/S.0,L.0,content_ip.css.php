<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= 'table.ipInfo
{
	width: 100%;
}

	.ipInfo .primaryContent
	{
		width: 40%;
		text-align: right;
	}
	
	.ipInfo .secondaryContent
	{
		width: 60%;
	}

	.ipInfo .ip
	{
		font-weight: bold;
	}
	
	.ipInfo .host
	{
		font-size: 11px;
		color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	}';
