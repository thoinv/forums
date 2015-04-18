<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.bbCode
{
	overflow: hidden; zoom: 1;
}
	
	.bbCode .title
	{
		font-size: 12pt;
		font-weight: bold;
	}
	
	.bbCode .title .option
	{
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ';
	}

	.bbCode .description
	{
		padding-top: 5px;
		font-size: 10pt;
	}
	
	.bbCode .description .option
	{
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ';
	}
	
	.bbCode > dl
	{
		width: 48.99%;
		_width: 48%;
		margin-left: 1%;
		float: left;
		margin-top: 10px;
	}
	
	.bbCode > dl > dt
	{
		font-size: 10pt;
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ';
	}

	.bbCode > dl > dd
	{
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
		border-radius: 5px;
		background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
		padding: 5px;
		zoom: 1;
	}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive .bbCode > dl
	{
		width: auto;
		float: none;
	}
}
';
}
