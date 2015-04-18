<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.PageNav
{
	' . XenForo_Template_Helper_Core::styleProperty('pageNav') . '
}

	.PageNav .hidden
	{
		display: none;
	}
	
	.PageNav .pageNavHeader,
	.PageNav a,
	.PageNav .scrollable
	{
		display: block;
		float: left;
		margin-right: ' . XenForo_Template_Helper_Core::styleProperty('pageNavLinkSpacing') . ';
	}
	
	.PageNav .pageNavHeader
	{
		padding: 1px 0;
	}

	.PageNav a
	{		
		' . XenForo_Template_Helper_Core::styleProperty('pageNavItem') . '
		
		
		width: ' . XenForo_Template_Helper_Core::styleProperty('pageNavLinkWidth') . ';
	}
	
	/*
		@property "pageNavPage";

		@property "/pageNavPage";
		*/
	
		.PageNav a[rel=start]
		{
			width: ' . XenForo_Template_Helper_Core::styleProperty('pageNavLinkWidth') . ' !important;
		}

		.PageNav a.text
		{
			width: auto !important;
			padding: 0 4px;
		}
	
		.PageNav a
		{
		}
		
		.PageNav a.currentPage
		{
			' . XenForo_Template_Helper_Core::styleProperty('pageNavCurrentPage') . '
		}

		a.PageNavPrev,
		a.PageNavNext
		{
			' . XenForo_Template_Helper_Core::styleProperty('pageNavScroller') . '
			
			width: ' . XenForo_Template_Helper_Core::styleProperty('pageNavLinkWidth') . ' !important;
		}
		
		.PageNav a:hover,
		.PageNav a:focus
		{
			' . XenForo_Template_Helper_Core::styleProperty('pageNavPageHover') . '
		}
		
	.PageNav a.distinct
	{
		margin-left: ' . XenForo_Template_Helper_Core::styleProperty('pageNavLinkSpacing') . ';
	}
			
	.PageNav .scrollable
	{
		position: relative;
		overflow: hidden;
		width: ' . ((XenForo_Template_Helper_Core::styleProperty('pageNavLinkWidth') * 5) + (XenForo_Template_Helper_Core::styleProperty('pageNavLinkSpacing') * 4) + (XenForo_Template_Helper_Core::styleProperty('pageNavItem.border-width') * 10)) . 'px; /* width of 5 page numbers plus their margin & border */
		height: 18px; /* only needs to be approximate */
	}
	
		.PageNav .scrollable .items
		{
			display: block;
			width: 20000em; /* contains scrolling items, should be huge */
			position: absolute;
			display: block;
		}
		
/** Edge cases - large numbers of digits **/

.PageNav .gt999 
{
	font-size: 9px;
	letter-spacing: -0.05em; 
}

.PageNav.pn5 a { width: ' . (5 * 4 + 9) . 'px; } .PageNav.pn5 .scrollable { width: ' . ((5 * 4 + 9) * 5 + (XenForo_Template_Helper_Core::styleProperty('pageNavLinkSpacing') * 4) + (XenForo_Template_Helper_Core::styleProperty('pageNavItem.border-width') * 10)) . 'px; }
.PageNav.pn6 a { width: ' . (6 * 4 + 9) . 'px; } .PageNav.pn6 .scrollable { width: ' . ((6 * 4 + 9) * 5 + (XenForo_Template_Helper_Core::styleProperty('pageNavLinkSpacing') * 4) + (XenForo_Template_Helper_Core::styleProperty('pageNavItem.border-width') * 10)) . 'px; }
.PageNav.pn7 a { width: ' . (7 * 4 + 9) . 'px; } .PageNav.pn7 .scrollable { width: ' . ((7 * 4 + 9) * 5 + (XenForo_Template_Helper_Core::styleProperty('pageNavLinkSpacing') * 4) + (XenForo_Template_Helper_Core::styleProperty('pageNavItem.border-width') * 10)) . 'px; }

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive .PageNav .pageNavHeader
	{
		display: none;
	}
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .PageNav .unreadLink
	{
		display: none;
	}
}
';
}
