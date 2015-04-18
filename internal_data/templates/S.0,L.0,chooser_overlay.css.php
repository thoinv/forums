<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.xenOverlay.chooserOverlay
{
	max-width: 700px;
}

	.chooserColumns
	{
		overflow: hidden; zoom: 1;
		padding: 0;
	}
	
		.chooserColumns li
		{
			float: left;
			width: 33%;
		}
		
			.chooserColumns.twoColumns li
			{
				width: 49.5%;
			}
		
			.chooserColumns.oneColumns li
			{
				width: 100%;
			}
			
			.chooserColumns.threeColumns li
			{
				width: 33%;
			}
			
			.chooserColumns.fourColumns li
			{
				width: 24.5%;
			}
		
			.chooserColumns li a
			{
				margin: 3px;
				display: block;
				padding: 5px 10px;
				border-radius: 5px;
				overflow: hidden; zoom: 1;
			}
			
			.chooserColumns li a:hover
			{
				background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
				text-decoration: none;
			}
			
			.chooserColumns .icon
			{
				float: left;
				display: block;
				width: 64px;
				height: 64px;
				background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
				border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
				border-radius: 5px;
				box-shadow: 2px 2px 6px rgba(0,0,0, 0.25);
			}
			
				.styleChooser .icon
				{
					background-image: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/style-preview.png\');
				}
			
			.chooserColumns .title,
			.chooserColumns .description
			{
				margin-left: 76px;
				display: block;
			}
			
			.chooserColumns .title
			{
				font-size: 11pt;
			}
			
				.chooserColumns .unselectable .title:after
				{
					content: " *";
				}
			
			.chooserColumns .description
			{
				color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
				font-size: 11px;
			}
		
	.chooserScroller
	{
		overflow: auto;
		max-height: 200px;
	}
	
		.chooserScroller li a
		{
			display: block;
		}
		
		.chooserScroller li a:hover
		{
			background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
			text-decoration: none;
		}
		
			.chooserScroller li a .info
			{
				font-size: 11px;
				color: ' . XenForo_Template_Helper_Core::styleProperty('contentText') . ';	
			}
			
.chooserConfirm
{
	text-align: center;
}
	
	.chooserConfirm strong
	{
		display: block;
		margin-top: 10px;
		font-size: 18px;
	}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .chooserOverlay .chooserColumns li
	{
		width: auto;
		float: none;
	}
}
';
}
