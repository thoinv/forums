<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/* slide-open editor */

.discussionList .discussionListItemEdit
{
	border-bottom: 1px solid #ccc;
	overflow: hidden; zoom: 1;
}

	.discussionListItemEdit .textCtrl
	{
		margin: 0;
	}

	.discussionListItemEdit .editBlock
	{
		float: left;
		padding: 5px;
	}
		
		.discussionListItemEdit .titleEdit > .titleField
		{
			box-sizing: border-box;
			width: 270px;
		}
		
		.discussionListItemEdit .optionsEdit li
		{
			display: inline-block;
			line-height: 22px;
			margin-right: 10px;
		}
		
		.discussionListItemEdit .optionsEdit li input[type="checkbox"]
		{
			position: relative;
			top: 2px;
		}
		
	.discussionListItemEdit .buttons
	{
		float: right;		
	}
	
		.discussionListItemEdit .buttons .AjaxSaveProgress
		{
			vertical-align: middle;
			visibility: hidden;
		}
	
			.discussionListItemEdit.InProgress .buttons .AjaxSaveProgress
			{
				visibility: visible;
			}
		
		.discussionListItemEdit .buttons input
		{
			_width: 100px;
			min-width: 65px;
		}
		
';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .discussionListItemEdit .titleEdit > .titleField
	{
		width: 100%;
	}
}
';
}
