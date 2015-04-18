<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.smilieList .smilieTextContainer
{
	display: inline-block;
}

	.smilieList .smilieText
	{
		display: inline-block;
		height: 18px;
		line-height: 18px;
		min-width: 16px;
		padding: 0 1px;
		text-align: center;
		
		background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . ';
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
		border-radius: 5px;
		
		font-size: 11px;
		
		cursor: default;
	}
	
		.smilieList .smilieText:hover
		{
			background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
			border-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
			color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryMedium') . ';
		}
	
		.smilieList .smilieTextRotator90:hover .smilieText
		{
			transform: rotate(90deg);
		}
		
		.smilieList .smilieTextRotator270:hover .smilieText
		{
			transform: rotate(270deg);
		}';
