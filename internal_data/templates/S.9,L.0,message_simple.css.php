<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/* inline mod stuff */

.messageSimpleList .messageSimple.InlineModChecked
{
	' . XenForo_Template_Helper_Core::styleProperty('inlineModChecked') . '
}

/* note that .messageSimple needs to be enclosed in a .messageSimpleList container */

.messageSimpleList.topBorder
{
	border-top: 1px ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ' solid;
	padding-bottom: 5px;
}

.messageSimple
{
	overflow: hidden; zoom: 1;

	padding: 0;
	padding-bottom: 10px;
	
	margin: 10px 0;
}

.messageSimpleList.contained .messageSimple
{
	padding: 10px;
	margin: 0;
}

.messageSimple .avatar
{
	float: left;
	font-size: 0;
}

.messageSimple .messageInfo
{
	margin-left: 65px;
}

	.messageSimple .messageContent
	{
		min-height: 35px;
	}

		.messageSimple .messageContent article,
		.messageSimple .messageContent blockquote
		{
			display: inline;
		}

	.messageSimple .poster
	{
		font-weight: bold;
	}

.messageSimple .messageMeta
{
	overflow: hidden; zoom: 1;
	font-size: 11px;
	line-height: 14px;
	padding-top: 5px;
}

	.messageSimple .privateControls
	{
		float: left;
	}

		.messageSimple .privateControls .item
		{
			float: left;
			margin-right: 10px;
		}

	.messageSimple .publicControls
	{
		float: right;
	}

		.messageSimple .publicControls .item
		{
			float: left;
			margin-left: 10px;
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


/* deleted / ignored message placeholder */

.messageSimpleList .messageSimple.placeholder
{
	border: none;
	margin: 10px 0;
	padding: 0;
}

.messageSimpleList .placeholder .placeholderContent
{
	overflow: hidden; zoom: 1;
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ' url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png\') repeat-x top;
	padding: 5px;
	border-radius: 5px;
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ';
	font-size: 11px;
}

	.messageSimpleList .placeholder a.avatar
	{
		float: left;
		margin-right: 5px;
		display: block;
	}
		
		.messageSimpleList .placeholder a.avatar img
		{
			width: 24px;
			height: 24px;
			display: block;
		}
	
	.messageSimpleList .placeholder .privateControls
	{
		margin-top: 2px;
	}
	
/* likes and comments */

.messageSimple .messageResponse
{
	margin-top: 10px;
	font-size: 11px;
	max-width: 400px;
	_width: 400px;
}

.messageSimple .comment,
.messageSimple .secondaryContent
{
	overflow: hidden; zoom: 1;
	margin-top: 2px;
	padding: 5px;
}

	.messageSimple .comment .avatar img
	{
		float: left;
		width: 32px;
		height: 32px;
	}

	.messageSimple .comment .commentInfo,
	.messageSimple .comment .elements
	{
		margin-left: 42px;
	}

	.messageSimple .comment .commentContent
	{
		min-height: 19px;
	}

		.messageSimple .commentContent article,
		.messageSimple .commentContent blockquote
		{
			display: inline;
		}
		
	.messageSimple .comment .commentControls
	{
		margin-top: 5px;
	}
	
		.messageSimple .comment .commentControls .item
		{
			margin-left: 10px;
		}
			

.messageSimple .comment textarea
{
	display: block;
	width: 100%;
	box-sizing: border-box;
	*width: 96%;
	max-height: 100px;
	resize: vertical;
}

.messageSimple .comment .submit
{
	margin-top: 5px;
	text-align: right;
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .messageSimple > .avatar img
	{
		width: 32px;
		height: 32px;
	}

	.Responsive .messageSimple .messageInfo
	{
		margin-left: 46px;
	}
}
';
}
