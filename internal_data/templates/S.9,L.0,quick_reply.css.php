<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/*quick reply*/

.quickReply
{	
	' . XenForo_Template_Helper_Core::styleProperty('message') . '
}

' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.quickReply'
)) . '

.quickReply .replyPrompt em
{
	font-style: italic;
}

/* the quick reply form */

#QuickReply
{
	' . XenForo_Template_Helper_Core::styleProperty('messageInfo') . '
}

#QuickReply textarea
{
	width: 100%;
	*width: 98%;
	height: 100px;
	box-sizing: border-box;
}

#QuickReply .insertQuotes
{
	display: none;
	float: left;
	
	margin-top: ' . (floor(XenForo_Template_Helper_Core::styleProperty('button.border-top-width') + (31 - XenForo_Template_Helper_Core::styleProperty('button.height')) / 2)) . 'px;
}

#QuickReply .submitUnit
{
	margin-top: 5px;
	text-align: right;
	line-height: 31px;
	position: relative;
	z-index: 1;
}

	#QuickReply .submitUnit .draftUpdate
	{
		position: absolute;
		left: 0;
		z-index: -1;
		color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
		font-size: 11px;
	}
	
		#QuickReply .submitUnit .draftUpdate span
		{
			display: none;
		}

#QuickReply .AttachmentEditor
{
	padding-top: 10px;
}

/** Selected quote tooltip **/

#QuoteSelected
{
}

	#QuoteSelected .arrow
	{
		top: -6px;
		bottom: auto;
		border-top: 1px none black;
		border-bottom: 6px solid ' . XenForo_Template_Helper_Core::styleProperty('tooltipBackground') . ';
	}
	
	#QuoteSelected a
	{
		text-decoration: none;
	}
	
	#QuoteSelected a:hover
	{
		text-decoration: underline;
	}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive #QuickReply .insertQuotes
	{
		float: right;
		margin-left: 3px;
	}
}
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .quickReply .messageUserInfo
	{
		display: none;
	}

	.Responsive #QuickReply
	{
		margin-left: 0;
	}
}
';
}
