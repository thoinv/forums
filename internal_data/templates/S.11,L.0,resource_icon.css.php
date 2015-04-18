<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.resourceIconEditor
{
	overflow: hidden; zoom: 1;
	margin: 0 auto;
}

.resourceIconEditor .currentIcon
{
	float: left;
	display: block;
	width: 96px;
	text-align: center;
}

	.resourceIconEditor .currentIcon img
	{
		max-width: 96px;
	}

.resourceIconEditor .modifyControls
{
	margin-left: 110px;
}

	.resourceIconEditor .iconUpload
	{
		max-width: 100%;
		box-sizing: border-box;
		margin: 3px 0;
	}
	
	.resourceIconEditor .iconAction
	{
		overflow: hidden; zoom: 1;
		padding: 10px;
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
		border-radius: 5px;
		margin-bottom: 10px;
	}

	.xenOverlay .resourceIconEditor .iconAction
	{
		background: rgba(0,0,0, 0.25);
	}
	
	.resourceIconEditor .faint
	{
		font-size: 11px;
	}
	
.resourceIconEditor .submitUnit
{
	text-align: right;
}

.resourceIconEditor .resourceIcon
{
	' . XenForo_Template_Helper_Core::styleProperty('avatar') . '
	background-color: transparent;
}';
