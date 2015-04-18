<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/* ***************************** */
/* Basic Tabs */

.tabs
{
	' . XenForo_Template_Helper_Core::styleProperty('tabsContainer') . '
	
	display: table;
	width: 100%;
	*width: auto;
	box-sizing: border-box;
}

.tabs li
{
	float: left;
}

.tabs li a,
.tabs.noLinks li
{
	' . XenForo_Template_Helper_Core::styleProperty('tab') . '
}

.tabs li:hover a,
.tabs.noLinks li:hover
{
	' . XenForo_Template_Helper_Core::styleProperty('tabHover') . '		
}

.tabs li.active a,
.tabs.noLinks li.active
{
	' . XenForo_Template_Helper_Core::styleProperty('tabActive') . '
}

/* Tabs inside forms */

.xenForm .tabs,
.xenFormTabs
{
	padding: 5px ' . XenForo_Template_Helper_Core::styleProperty('ctrlUnitEdgeSpacer') . ' 0;
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .tabs li
	{
		float: none;
	}

	.Responsive .tabs li a,
	.Responsive .tabs.noLinks li
	{
		display: block;
	}
}
';
}
