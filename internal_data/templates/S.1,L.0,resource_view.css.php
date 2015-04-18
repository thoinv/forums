<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.innerContent .bbCodeBlock
{
	margin-right: 0;
}

.innerContent .updates ol
{
	' . XenForo_Template_Helper_Core::styleProperty('textHeading.border') . '
	margin-bottom: 5px;
	border-top: none;
	border-left: none;
	border-right: none;
}

	.innerContent .updates ol li
	{
		margin: 5px 0;
	}

		.innerContent .updates ol li .postDate
		{
			color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
			font-size: 11px;
		}
		
	.innerContent .customResourceFields
	{
	}
	
		.innerContent .customResourceFields.aboveInfo
		{
			border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
			margin-bottom: 10px;
		}
		
		.innerContent .customResourceFields.belowInfo
		{
			border-top: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
			margin-top: 10px;
		}

		.innerContent .customResourceFields dl
		{
			overflow: hidden;
			margin: 8px 0;
		}
	
		.innerContent .customResourceFields dt
		{
			width: 190px;
			float: left;
			color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
		}
		
		.innerContent .customResourceFields dd
		{
			margin-left: 200px;
		}
		
		.innerContent .customResourceFields .plainList
		{
			margin-left: 0;
			list-style-type: none;
		}
		
		.innerContent .customResourceFields .plainList > li
		{
			list-style: none;
		}
			
		
	.innerContent .rateBlock
	{
		margin: 10px auto;
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		border-radius: 5px;
		background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ' url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png\') repeat-x top;
		padding: 5px;
		text-align: center;
		overflow: hidden; zoom: 1;
	}
	
		.innerContent .rateBlock .rating
		{
			display: inline-block;
			text-align: left;
			width: 94px;
		}
		
		.innerContent .rateBlock .Hint
		{
			display: inline-block;
			width: 0;
			white-space: nowrap;
			word-wrap: normal;
		}

.moreLink
{
	font-weight: bold;
	text-align: right;
}

.sidebar .rating .Hint
{
	display: block;
}

.sidebar .resourceActions,
.sidebar .resourceControls
{
	margin-top: 1em;
	line-height: 1.5;
}

.sidebar .featuredNotice
{
	font-size: 11px;
	color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryMedium') . ';
	background: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . ' url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/form-button-white-25px.png\') repeat-x top;
	padding: 1px 3px;
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
	border-radius: 3px;
	display: block;
	float: right;
	box-shadow: 1px 1px 3px rgba(0,0,0, 0.25);
}

.sidebar .callToAction
{
	display: block;
	text-align: center;
	height: auto;
	line-height: normal;
	margin: 15px 0;
}

	.sidebar .callToAction span
	{
		font-size: 12pt;
		padding: 3px 0;
	}

	.sidebar small.minorText
	{
		display: block;
		font-size: 11px;
		font-weight: normal;
	}

.resourceVersionDeleted td { text-decoration: line-through; }
.resourceVersionModerated td { color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . '; }

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .resourceHistory .rating,
	.Responsive .resourceHistory .downloads
	{
		display: none;
	}
	
	.Responsive .innerContent .rateBlock .Hint
	{
		display: none;
	}
	
	.Responsive .innerContent .customResourceFields dt
	{
		width: auto;
		float: none;
	}
	
	.Responsive .innerContent .customResourceFields dd
	{
		margin-left: 0;
	}
}
';
}
