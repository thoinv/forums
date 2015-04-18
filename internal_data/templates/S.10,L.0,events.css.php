<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.news_feed_page_global .eventList:first-of-type
{
	border-top: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
}

.event
{
	overflow: hidden; zoom: 1;
}

	.event .avatar,
	.event .icon
	{
		float: left;
	}
	
	.event .content
	{
		margin-left: 65px;
		padding-top: 1px;
	}
	
		.event .NewsFeedItemHider
		{
			float: right;
			margin-left: 5px;
		}
	
		.event .content .description
		{
			color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
		}
	
			.event .content .description em
			{
				color: ' . XenForo_Template_Helper_Core::styleProperty('contentText') . ';
			}
	
		.event .content .options
		{
			float: right;
			font-size: 11px;
		}
		
		.event .content .primaryText
		{
			font-weight: bold;
		}
		
		.event .content .title
		{
			line-height: 16px;
			margin-top: 5px;
		}
		
		.event .content .minorTitle
		{
			font-size: 11px;
			line-height: 16px;
			margin-top: 5px;
		}
		
		.event .content .snippet
		{
			margin: 5px 0;
			
			' . XenForo_Template_Helper_Core::styleProperty('messageText') . ';
			
			font-size: 11px;
			font-style: italic;
		}
		
		.event .content .DateTime
		{
			display: block;
			color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
			font-size: 11px;
			margin-top: 5px;
		}
		
		.event .content .icon
		{
			display: inline-block;
			width: 16px;
			height: 16px;
			margin-right: 5px;
			vertical-align: middle;
		}
		
		.event .content .thread .icon
		{
			background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat -96px -16px;
		}
		
		.event .content .forum .icon
		{
			background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat -80px -16px;
		}
		
		.event .content .attachedImages		
		{
		}
		
			.event .content .attachedImages:hover,
			.event .content .attachedImages:active
			{
				outline: 0 none;
				text-decoration: none;
			}
			
				.event .content .attachedImages img
				{
					max-height: 32px;
				}';
