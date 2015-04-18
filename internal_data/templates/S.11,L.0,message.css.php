<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

.messageList
{
	' . XenForo_Template_Helper_Core::styleProperty('messageList') . '
}

.messageList .message
{
	' . XenForo_Template_Helper_Core::styleProperty('message') . '
}

' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.messageList .message'
)) . '

/*** Message block ***/

.message .messageInfo
{
	' . XenForo_Template_Helper_Core::styleProperty('messageInfo') . '
	zoom: 1;
}

	.message .newIndicator
	{
		' . XenForo_Template_Helper_Core::styleProperty('messageNewIndicator') . '
		
		margin-right: -' . (XenForo_Template_Helper_Core::styleProperty('content.padding-right') + 5) . 'px;
	}
	
		.message .newIndicator span
		{
			' . XenForo_Template_Helper_Core::styleProperty('messageNewIndicatorInner') . '
		}

	.message .messageContent
	{
		' . XenForo_Template_Helper_Core::styleProperty('messageContent') . '
	}
	
	.message .messageTextEndMarker
	{
		height: 0;
		font-size: 0;
		overflow; hidden;
	}
	
	.message .editDate
	{
		text-align: right;
		margin-top: 5px;
		font-size: 11px;
		color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	}

	.message .signature
	{
		' . XenForo_Template_Helper_Core::styleProperty('messageSignature') . '
	}

	.message .messageMeta
	{
		' . XenForo_Template_Helper_Core::styleProperty('messageMeta') . '
	}

		.message .privateControls
		{
			' . XenForo_Template_Helper_Core::styleProperty('messagePrivateControls') . '
		}

		.message .publicControls
		{
			' . XenForo_Template_Helper_Core::styleProperty('messagePublicControls') . '
		}
		
			.message .privateControls .item
			{
				margin-right: 10px;
				float: left;
			}

				.message .privateControls .item:last-child
				{
					margin-right: 0;
				}

			.message .publicControls .item
			{
				margin-left: 10px;
				float: left;
			}
	
				.message .messageMeta .control
				{
					' . XenForo_Template_Helper_Core::styleProperty('messageMetaControl') . '
				}
				
					.message .messageMeta .control:focus
					{
						' . XenForo_Template_Helper_Core::styleProperty('messageMetaControlFocus') . '
					}
				
					.message .messageMeta .control:hover
					{
						' . XenForo_Template_Helper_Core::styleProperty('messageMetaControlHover') . '
					}
				
					.message .messageMeta .control:active
					{
						' . XenForo_Template_Helper_Core::styleProperty('messageMetaControlActive') . '
					}
	/*** multiquote +/- ***/
			
	.message .publicControls .MultiQuoteControl
	{
		padding-left: 4px;
		padding-right: 4px;
		border-radius: 2px;
		margin-left: 6px;
		margin-right: -4px;
	}
	
	
	.message .publicControls .MultiQuoteControl.active
	{
		background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	}
	
	';
$__compilerVar1 = '';
$__compilerVar1 .= '	.messageNotices li
	{
		' . XenForo_Template_Helper_Core::styleProperty('messageNotice') . '
	}
	
		.messageNotices .icon
		{
			float: right;
			width: 16px;
			height: 16px;
			background: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat 1000px 1000px;
		}
	
			.messageNotices .warningNotice .icon { background-position: -48px -32px; }		
			.messageNotices .deletedNotice .icon { background-position: -64px -32px; }		
			.messageNotices .moderatedNotice .icon {background-position: -32px -16px; }';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
	
	.message .likesSummary
	{
		' . XenForo_Template_Helper_Core::styleProperty('messageLikesSummary') . '
	}
	
	.message .messageText > *:first-child
	{
		margin-top: 0;
	}

/* inline moderation changes */

.InlineModChecked .messageUserBlock,
.InlineModChecked .messageInfo,
.InlineModChecked .messageNotices,
.InlineModChecked .bbCodeBlock .type,
.InlineModChecked .bbCodeBlock blockquote,
.InlineModChecked .attachedFiles .attachedFilesHeader,
.InlineModChecked .attachedFiles .attachmentList
{
	' . XenForo_Template_Helper_Core::styleProperty('inlineModChecked') . '
}

.InlineModChecked .messageUserBlock div.avatarHolder,
.InlineModChecked .messageUserBlock .extraUserInfo
{
	background: transparent;
}

.InlineModChecked .messageUserBlock .arrow span
{
	border-left-color: ' . XenForo_Template_Helper_Core::styleProperty('inlineMod') . ';
}

/* message list */

.messageList .newMessagesNotice
{
	margin: 10px auto;
	padding: 5px 10px;
	border-radius: 5px;
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ' url(' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png) repeat-x top;
	font-size: 11px;
}

/* deleted / ignored message placeholder */

.messageList .message.placeholder
{
}

.messageList .placeholder .placeholderContent
{	
	overflow: hidden; zoom: 1;
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ';
	font-size: 11px;
}

	.messageList .placeholder a.avatar
	{
		float: left;
		display: block;
	}
	
		.messageList .placeholder a.avatar img
		{
			display: block;
			width: 32px;
			height: 32px;
		}
		
	.messageList .placeholder .privateControls
	{
		margin-top: -5px;
	}
	

/* messages remaining link */

.postsRemaining a,
a.postsRemaining
{
	font-size: 11px;
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveWideWidth') . ')
{
	.Responsive .message .newIndicator
	{
		margin-right: 0;
		border-top-right-radius: ' . XenForo_Template_Helper_Core::styleProperty('messageNewIndicator.border-top-left-radius') . ';
	}
	
		.Responsive .message .newIndicator span
		{
			display: none;
		}
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .message .messageInfo
	{
		margin-left: 0;
		padding: 0 10px;
	}

	.Responsive .message .messageContent
	{
		min-height: 0;
	}	

	.Responsive .message .newIndicator
	{
		margin-right: -5px;
		margin-top: -16px;
	}

	.Responsive .message .postNumber,
	.Responsive .message .authorEnd
	{
		display: none;
	}
	
	.Responsive .message .signature
	{
		display: none;
	}
	
	.Responsive .messageList .placeholder a.avatar
	{
		margin-right: 10px;
	}
}
';
}
