<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.container {
	display: table;
	table-layout: fixed;
	width: 100%;
	zoom: 1;
}

.navigationSideBar
{
	width: 150px;
	display: table-cell;
	vertical-align: top;
	*float: left;
}
	
	.navigationSideBar .heading
	{
		border-top-right-radius: 0;
		margin: 10px 0 0;
	}

	.navigationSideBar .section:first-child
	{
		margin-top: 0;
	}

	.navigationSideBar .section:last-child
	{
		margin-bottom: 0;
	}
	
	.navigationSideBar .primaryContent
	{
		font-size: 11px;
	}

	.navigationSideBar .secondaryContent
	{
		font-weight: bold;
	}
	
	.navigationSideBar a
	{
		display: block;
		padding: 5px 10px;
		word-wrap: normal;
		overflow: hidden;
		text-overflow: ellipsis;
	}
	
	.navigationSideBar a:hover
	{
		background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ' url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png\') repeat-x top;
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ';
		text-decoration: none;
	}
	

.mainContentBlock
{
	display: table-cell;
	vertical-align: top;
	margin: 0;
	*margin-left: 150px;
	zoom: 1;
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .navigationSideBar
	{
		display: block;
		position: relative;
		margin: 0 auto;
		width: 200px;
		box-sizing: border-box;
	}

	.Responsive .navigationSideBar .heading
	{
		margin: 0;
		border-top-right-radius: ' . XenForo_Template_Helper_Core::styleProperty('heading.border-top-right-radius') . ';
		border-bottom: 0;
		text-align: center;
		cursor: pointer;
	}
	
		.Responsive .navigationSideBar .heading span
		{
			' . XenForo_Template_Helper_Core::styleProperty('popupArrowClosed') . '
		}

	.Responsive .navigationSideBar > ul
	{
		display: none;
		position: absolute;
		background: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		box-shadow: 5px 5px 25px rgba(0,0,0, 0.5);
		border-top: none;
		width: 200px;
		box-sizing: border-box;
		z-index: 51;
	}
	
	.Responsive .navigationSideBar > ul.menuVisible
	{
		display: block;
	}

	.Responsive .navigationSideBar .section:last-child li:last-child a
	{
		border-bottom: none;
	}
	
	html.Responsive:not(.hasJs) .navigationSideBar:hover > ul
	{
		display: block;
	}

	.Responsive .mainContentBlock
	{
		display: block;
	}
}
';
}
