<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/* Inline Moderation Floater */

.sectionFooter .InlineModControls
{
	float: right;
}

.hasJs .InlineModControls,
.hasJs .InlineMod.Hide
{
	display:none;
}
	
	.sectionFooter .InlineModControls .selectionControl
	{
		display: none;
	}
	
	.sectionFooter .InlineModControls .InlineModCheckedTotal
	{
		font-weight: bold;
	}
	
	.sectionFooter .SelectionCount
	{
		float: right;
	}

/* inline mod overlay */

.InlineModOverlay
{
	display: none;
	z-index: 10000;
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . ';
	box-shadow: 0px 25px 50px rgba(0,0,0, 0.5);
	width: 460px;
}

.InlineModOverlay .selectionControl
{
	display: block;
	overflow: hidden; zoom: 1;
	font-size: 11px;
	padding: 5px 10px;
	line-height: 23px;
}

	.InlineModOverlay .selectionControl .button
	{
		font-size: 9px;
	}
	
		#InlineModOverlay .SelectionCount
		{
			margin-left: 10px;
		}
	
		#InlineModOverlay .SelectionCount:hover
		{
			text-decoration: none;
		}
	
			#InlineModOverlay .SelectionCount .InlineModCheckedTotal
			{
				font-weight: bold;
			}
	
	.InlineModOverlay label
	{
		float: right;
	}

.InlineModOverlay .actionControl
{
	overflow: hidden; zoom: 1;
	display: block;
	padding: 2px 10px;
}

	.InlineModOverlay .actionControl .commonActions
	{
		float: left;
	}
	
	.InlineModOverlay .actionControl .otherActions
	{
		float: right;
	}

		.InlineModOverlay .ModerationSelect
		{
			width: 180px;
		}
		
/* inline moderation checkbox */

.inlineModCheckTip .arrow
{
	/*position: absolute;
	top: auto;
	left: 8px;
	bottom: -6px;
	
	border-top: 6px solid ' . XenForo_Template_Helper_Core::styleProperty('tooltipBackground') . ';	
	border-right: 6px solid transparent;
	border-bottom: none;
	border-left: 6px solid transparent;*/
}

/* inline control group */

.inlineCtrlGroup
{
	background: rgb(150,150,150) url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/thread-modctrls-30px-dark.png\') repeat-x top;
	color: white;
	font-size: 11px;
}

	.inlineCtrlGroup .textCtrl
	{
		padding: 3px;
		background-color: #555;
		color: #eee;
		border: 1px solid #999;
		border-radius: 5px;
		font-size: 11px;
	}
	
		.inlineCtrlGroup .textCtrl:focus,
		.inlineCtrlGroup .textCtrl.Focus
		{
			background: #333;
			color: white;
		}
	
/* selection count thingies */

.SelectionCount .InlineModCheckedTotal
{
	font-weight: bold;
}

.SelectionCount.cloned.itemsChecked
{
	color: red;
}

/* InlineMod Generic Selected Items */

.InlineModChecked .section,
.InlineModChecked .sectionMain,
.InlineModChecked .primaryContent,
.InlineModChecked .secondaryContent,
.InlineModChecked .sectionFooter
{
	' . XenForo_Template_Helper_Core::styleProperty('inlineModChecked') . '
}';
