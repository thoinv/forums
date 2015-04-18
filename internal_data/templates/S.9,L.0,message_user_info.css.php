<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.messageUserInfo
{
	' . XenForo_Template_Helper_Core::styleProperty('messageUserInfo') . '
}

	.messageUserBlock
	{
		' . XenForo_Template_Helper_Core::styleProperty('messageUserBlock') . '
		
		position: relative;
	}
		
		.messageUserBlock div.avatarHolder
		{
			' . XenForo_Template_Helper_Core::styleProperty('messageAvatarHolder') . '
			
			position: relative;	
		}
		
			.messageUserBlock div.avatarHolder .avatar
			{
				display: block;
				font-size: 0;
			}
			
			.messageUserBlock div.avatarHolder .onlineMarker
			{
				position: absolute;
				top: ' . (XenForo_Template_Helper_Core::styleProperty('messageAvatarHolder.padding-top') - 1) . 'px;
				left: ' . (XenForo_Template_Helper_Core::styleProperty('messageAvatarHolder.padding-right') - 1) . 'px;
				
				' . XenForo_Template_Helper_Core::styleProperty('messageOnlineMarker') . '
			}
			
		.messageUserBlock h3.userText
		{
			' . XenForo_Template_Helper_Core::styleProperty('messageUserText') . '
		}
		
		.messageUserBlock .userBanner
		{
			display: block;
			margin-bottom: 5px;
			margin-left: -' . (XenForo_Template_Helper_Core::styleProperty('messageUserText.padding-left') + 6) . 'px;
			margin-right: -' . (XenForo_Template_Helper_Core::styleProperty('messageUserText.padding-right') + 6) . 'px;
		}
		
		.messageUserBlock .userBanner:last-child
		{
			margin-bottom: 0;
		}
	
		.messageUserBlock a.username
		{
			' . XenForo_Template_Helper_Core::styleProperty('messageUsername') . '
			
		}
		
		.messageUserBlock .userTitle
		{
			' . XenForo_Template_Helper_Core::styleProperty('messageUserTitle') . '
		}
		
		.messageUserBlock .extraUserInfo
		{
			' . XenForo_Template_Helper_Core::styleProperty('messageExtraUserInfo') . '
		}
		
			.messageUserBlock .extraUserInfo dl
			{
				margin: 2px 0 0;
			}
							
			.messageUserBlock .extraUserInfo img
			{
				max-width: 100%;
			}
		
		.messageUserBlock .arrow
		{
			position: absolute;
			top: 10px;
			right: -10px;
			
			display: block;
			width: 0px;
			height: 0px;
			line-height: 0px;
			
			border: 10px solid transparent;
			border-left-color: ' . XenForo_Template_Helper_Core::styleProperty('messageUserBlock.border-color') . ';
			-moz-border-left-colors: ' . XenForo_Template_Helper_Core::styleProperty('messageUserBlock.border-color') . ';
			border-right: none;
			
			/* Hide from IE6 */
			_display: none;
		}
		
			.messageUserBlock .arrow span
			{
				position: absolute;
				top: -10px;
				left: -11px;
				
				display: block;
				width: 0px;
				height: 0px;
				line-height: 0px;
				
				border: 10px solid transparent;
				border-left-color: ' . XenForo_Template_Helper_Core::styleProperty('messageAvatarHolder.background-color') . ';
				-moz-border-left-colors: ' . XenForo_Template_Helper_Core::styleProperty('messageAvatarHolder.background-color') . ';
				border-right: none;
			}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .messageUserInfo
	{
		float: none;
		width: auto; 
	}

	.Responsive .messageUserBlock
	{
		overflow: hidden;
		margin-bottom: 5px;
		position: relative;
	}

	.Responsive .messageUserBlock div.avatarHolder
	{
		float: left;
		padding: 5px;
	}

		.Responsive .messageUserBlock div.avatarHolder .avatar img
		{
			width: 48px;
			height: 48px;
		}
		
		.Responsive .messageUserBlock div.avatarHolder .onlineMarker
		{
			top: 4px;
			left: 4px;
			border-width: 6px;
		}

	.Responsive .messageUserBlock h3.userText
	{
		margin-left: 64px;
	}
	
	.Responsive .messageUserBlock .userBanner
	{
		max-width: 150px;
		margin-left: 0;
		margin-right: 0;
		border-top-left-radius: 3px;
		border-top-right-radius: 3px;
		position: static;
		display: inline-block;
	}
	
		.Responsive .messageUserBlock .userBanner span
		{
			display: none;
		}

	.Responsive .messageUserBlock .extraUserInfo
	{
		display: none;
	}

	.Responsive .messageUserBlock .arrow
	{
		display: none;
	}
}
';
}
