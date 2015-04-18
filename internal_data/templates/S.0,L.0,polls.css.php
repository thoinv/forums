<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.pollBlock .pollContent
{
	max-width: 580px;
	margin: 0 auto;
	position: relative;
	padding-left: 50px;
}

.pollBlock .questionMark
{
	position: absolute;
	top: 0px;
	left: 0px;
	width: 40px;
	height: 40px;
	line-height: 40px;
	background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryDark') . ';
	border-radius: 5px;
	text-align: center;
	font-size: 24pt;
	font-family: Georgia;
}

.pollBlock .pollNotes
{
	font-size: 11px;
}

.pollBlock .question
{
	overflow: hidden; zoom: 1;
}

	.pollBlock .question .questionText
	{
		float: left;
		font-size: 16pt;
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . ';
	}

	.pollBlock .question .editLink
	{
		font-size: 11px;
		float: right;
	}
	
	.pollBlock .question .closeDate
	{
		clear: both;
		font-size: 11px;
	}
	
.pollBlock .pollOptions,
.pollBlock .pollResults
{
	width: 100%;
	table-layout: fixed;
	display: table;
	margin: 5px 0;
	padding: 5px 0;
	border-top: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
}

	.pollBlock .pollOption label
	{
		display: block;
		margin: 0 -10px;
		padding: 5px 10px;
	}
	
	.pollBlock .pollOption label:hover
	{
		background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		border-radius: 5px;
	}

.pollBlock .buttons
{
	text-align: right;
	line-height: 27px;
	display: table;
	width: 100%;
}
	
.pollBlock .buttons .button
{
	min-width: 120px;
	_width: 120px;
}

	.pollBlock .buttons .pollNotes
	{
		float: left;
		text-align: left;
		line-height: 1.28;
		margin-right: 5px;
		margin-top: 5px;
	}
	
.pollBlock .pollResult
{
	display: table-row;
}

.pollBlock .pollResult div,
.pollBlock .pollResult h3
{
	display: table-cell;
	padding: 5px 0;
}
	
	.pollBlock .votedIconCell
	{
		width: 15px;
		text-align: center;
		vertical-align: top;
	}
	
	.pollBlock .optionText,
	.pollBlock .questionText
	{
		max-width: 100%;
	}

	.pollBlock .voted .optionText,
	.pollBlock .voted .votedIconCell
	{
		font-weight: bold;
	}

	.pollBlock .pollResult .barCell
	{
		width: 100px;
		padding: 0 0 0 10px;
	}
		
		.pollResult .barContainer
		{
			height: 11px;
			display: inline-block;
			zoom: 1;
			vertical-align: middle;
			border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryMedium') . ';
			max-width: 100px;
			width: 100%;
			box-sizing: border-box;
			margin-right: 5px;
			font-size: 1px;
		}
		
			.pollResult .bar
			{
				background: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . ';
				height: 9px;
				display: block;
				zoom: 1;
			}

	.pollBlock .pollResult .count,
	.pollBlock .pollResult .percentage
	{
		word-wrap: break-word;
		text-align: right;
		padding-left: 10px;
	}
	
	.pollBlock .pollResult .count
	{
		width: 80px;
	}
	
	.pollBlock .pollResult .percentage
	{
		width: 50px;
	}

.xenOverlay > .PollContainer > .section,
.xenOverlay > .PollContainer > .sectionMain
{
	background: none;
	margin: 0;
}

.overlayScroll.pollResultsOverlay 
{
	padding-right: 10px;
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .pollBlock .pollResult .optionText
	{
		border-top: solid 1px ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	}
	
	.Responsive .pollBlock .pollResult:first-child .optionText
	{
		border-top: none;
	}
	
	.Responsive .pollBlock .pollResult .optionText
	{
		display: block;
	}
	
	.Responsive .pollBlock .pollResult .barCell
	{
		padding: 0;
	}
	
	.Responsive .pollBlock .pollResult .barCell,
	.Responsive .pollBlock .pollResult .count,
	.Responsive .pollBlock .pollResult .percentage
	{
		display: inline-block;
		font-size: 11px;
	}
}
';
}
