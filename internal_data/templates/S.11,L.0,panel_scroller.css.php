<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.hasJs #Notices.PanelScroller { display: none; }

.PanelScroller .scrollContainer,
.PanelScrollerOff .panel
{
	' . XenForo_Template_Helper_Core::styleProperty('panelScroller') . '
}

.PanelScroller .PanelContainer
{
	position: relative;
	clear: both;
	width: 100%;
	overflow: auto;
}

	.hasJs .PanelScroller .Panels
	{
		position: absolute;
	}

	.PanelScroller .Panels
	{
		clear: both;
		margin: 0;
		padding: 0;
	}
	
		.PanelScroller .panel,
		.PanelScrollerOff .panel
		{
			overflow: hidden;
			position: relative;
			padding: 0 !important;

			' . XenForo_Template_Helper_Core::styleProperty('panelScrollerPanel') . '
		}
			
		.PanelScroller .panel .noticeContent,
		.PanelScrollerOff .panel .noticeContent
		{
			' . XenForo_Template_Helper_Core::styleProperty('panelScrollerPanel.padding') . '
		}

/** panel scroller nav **/

.PanelScroller .navContainer
{
	' . XenForo_Template_Helper_Core::styleProperty('panelScrollerNavContainer') . '
}

.PanelScroller .navControls
{
	float: right;
}

' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.PanelScroller .navControls'
)) . '

	.PanelScroller .navControls a
	{
		' . XenForo_Template_Helper_Core::styleProperty('panelScrollerNavControl') . '
		
		' . XenForo_Template_Helper_Core::styleProperty('panelScroller.border') . '
		border-radius: 0;
	}
	
		.PanelScroller .navControls > a:first-child
		{
			border-bottom-left-radius: ' . XenForo_Template_Helper_Core::styleProperty('panelScroller.border-bottom-left-radius') . ';
		}
		
		.PanelScroller .navControls > a:last-child
		{
			border-bottom-right-radius: ' . XenForo_Template_Helper_Core::styleProperty('panelScroller.border-bottom-right-radius') . ';
		}
		
		.PanelScroller .navControls a:hover
		{
			' . XenForo_Template_Helper_Core::styleProperty('panelScrollerNavControlHover') . '
		}
		
		.PanelScroller .navControls a.current
		{
			' . XenForo_Template_Helper_Core::styleProperty('panelScrollerNavControlCurrent') . '
		}
		
			.PanelScroller .navControls a .arrow
			{
				display: none;
			}
			
			.PanelScroller .navControls a.current span
			{
				display: block;
				line-height: 0px;
				width: 0px;
				height: 0px;
				border-top: 5px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
				border-right: 5px solid transparent;
				border-bottom: 1px none black;
				border-left: 5px solid transparent;
				-moz-border-bottom-colors: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
				position: absolute;
			}
			
			.PanelScroller .navControls a.current .arrow
			{
				border-top-color: ' . XenForo_Template_Helper_Core::styleProperty('panelScroller.border-color') . ';
				top: 0px;
				left: 50%;
				margin-left: -5px;
			}
			
				.PanelScroller .navControls a .arrow span
				{
					border-top-color: ' . XenForo_Template_Helper_Core::styleProperty('panelScroller.background-color') . ';
					top: -6px;
					left: -5px;
				}
				
/* notices */

#Notices .panel .noticeContent
{
	padding-right: 25px;
}';
