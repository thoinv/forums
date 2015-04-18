<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '#jumpMenu
{
	overflow: hidden; zoom: 1;
}

.xenOverlay #jumpMenu .jumpMenuColumn
{
	float: left;
	width: 50%;
}

.xenOverlay #jumpMenu .blockLinksList
{
	height: 250px;
	overflow: auto;
}

#jumpMenu .blockLinksList ul,
#jumpMenu .nodeList li.d0
{
	padding-top: 5px;
	border-top: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	margin-top: 5px;
}

	#jumpMenu .blockLinksList ul:first-child,
	#jumpMenu .nodeList li.d0:first-child
	{
		padding-top: 0;
		border-top: none;
		margin-top: 0;
	}

.xenOverlay #jumpMenu .nodeList
{
	border-left: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
}

#jumpMenu .blockLinksList li
{
	vertical-align: bottom;
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .xenOverlay #jumpMenu .jumpMenuColumn
	{
		float: none;
		width: auto;
	}

	.Responsive .xenOverlay #jumpMenu .blockLinksList
	{
		max-height: 250px;
		height: auto;
	}
}
';
}
