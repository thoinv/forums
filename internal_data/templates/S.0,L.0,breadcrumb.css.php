<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.breadBoxTop,
.breadBoxBottom
{
	' . XenForo_Template_Helper_Core::styleProperty('breadBox') . '
}

.breadBoxTop
{
}

.breadBoxTop .topCtrl
{
	' . XenForo_Template_Helper_Core::styleProperty('breadBoxTopCtrl') . '
}

.breadcrumb
{
	' . XenForo_Template_Helper_Core::styleProperty('breadcrumb') . '
}

.breadcrumb.showAll
{
	height: auto;
}

.breadcrumb .boardTitle
{
	' . XenForo_Template_Helper_Core::styleProperty('breadcrumbBoardTitle') . '
}

.breadcrumb .crust
{
	' . XenForo_Template_Helper_Core::styleProperty('breadcrumbItemCrust') . '
}

.breadcrumb .crust a.crumb
{
	cursor: pointer;
	' . XenForo_Template_Helper_Core::styleProperty('breadcrumbItemCrumb') . '
}

	.breadcrumb .crust a.crumb > span
	{
		display: block;
		text-overflow: ellipsis;
		word-wrap: normal;
		white-space: nowrap;
		overflow: hidden;
		max-width: 100%;
	}

	.breadcrumb .crust:first-child a.crumb,
	.breadcrumb .crust.firstVisibleCrumb a.crumb
	{
		' . XenForo_Template_Helper_Core::styleProperty('breadcrumbItemFirstCrumb') . '
	}
	
	.breadcrumb .crust:last-child a.crumb
	{
		' . XenForo_Template_Helper_Core::styleProperty('breadcrumbItemLastCrumb') . '
	}

.breadcrumb .crust .arrow
{
	' . XenForo_Template_Helper_Core::styleProperty('breadcrumbItemArrowOuter') . '
}

.breadcrumb .crust .arrow span
{
	' . XenForo_Template_Helper_Core::styleProperty('breadcrumbItemArrowInner') . '
}

.breadcrumb .crust:hover a.crumb
{
	' . XenForo_Template_Helper_Core::styleProperty('breadcrumbItemCrumbHover') . '
}

.breadcrumb .crust:hover .arrow span
{
	border-left-color: ' . XenForo_Template_Helper_Core::styleProperty('breadcrumbItemCrumbHover.background-color') . ';
}

	.breadcrumb .crust .arrow
	{
		/* hide from IE6 */
		_display: none;
	}

.breadcrumb .jumpMenuTrigger
{
	' . XenForo_Template_Helper_Core::styleProperty('breadcrumbJumpMenuTrigger') . '
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .breadBoxTop.withTopCtrl
	{
		display: table;
		table-layout: fixed;
		width: 100%;
	}

	.Responsive .breadBoxTop.withTopCtrl nav
	{
		display: table-header-group;
	}

	.Responsive .breadBoxTop.withTopCtrl .topCtrl
	{
		display: table-footer-group;
		margin-top: 5px;
		text-align: right;
	}
}
';
}
