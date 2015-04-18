<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.resourceTabs
{
	position: relative;
}

	.resourceTabs .tabs
	{
		padding-left: 10px;
	}

	.resourceTabs .extraLinks
	{
		position: absolute;
		right: 10px;
		top: 2px;
		font-size: 11px;
	}
	
';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive .resourceTabs .extraLinks
	{
		position: static;
		text-align: right;
		margin-bottom: 3px;
	}
}
';
}
