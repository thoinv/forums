<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.xenOverlay.memberCard
{
	' . XenForo_Template_Helper_Core::styleProperty('memberCardBox') . '
}
	
	.xenOverlay.memberCard .avatarCropper
	{
		float: left;
		border: none;
		padding: 0;
		position: relative;
	}
	
	.xenOverlay.memberCard .avatarCropper .modControls
	{
		display: none;
	}
	
		.xenOverlay.memberCard .avatarCropper:hover .modControls,
		.Touch .xenOverlay.memberCard .avatarCropper .modControls
		{
			display: block;
		}
	
	.xenOverlay.memberCard .avatarCropper .modControls a
	{
		display: block;
		float: left;
		height: auto;
		width: auto;
		overflow: visible;
		position: static;
		background: rgba(0,0,0, 0.5);
		color: white;
		padding: 3px 6px;
		font-size: 11px;
		text-align: center;
		min-width: 32px;
	}
	
		.xenOverlay.memberCard .avatarCropper .modControls a:hover
		{
			background: rgba(0,0,0, 0.75);
			text-decoration: none;
		}

	.xenOverlay.memberCard .userInfo
	{
		margin-left: 205px;
		font-size: 11px;
	}

		.xenOverlay.memberCard .userInfo h3
		{
			' . XenForo_Template_Helper_Core::styleProperty('memberCardUserName') . '
		}

			.xenOverlay.memberCard .userInfo h3 a
			{
				color: ' . XenForo_Template_Helper_Core::styleProperty('memberCardUserName.color') . ';
			}
			
		.xenOverlay.memberCard .userInfo .userTitleBlurb
		{
			margin: 0 0 3px;
		}

			.xenOverlay.memberCard .userInfo h4
			{
				color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
				font-size: 10pt;
			}
			
			.xenOverlay.memberCard .userInfo .userBlurb
			{
				font-size: 11px;
			}

		.xenOverlay.memberCard .userInfo .status
		{
			font-size: 11px;
			font-style: italic;
			margin: 3px 0;
		}
		
			.xenOverlay.memberCard .userInfo .status a
			{
				color: inherit;
			}
		
		.xenOverlay.memberCard .userInfo .userStats
		{
			width: 100%;
		}
		
			.xenOverlay.memberCard .userInfo .userStats dd
			{
				margin-right: 5px;
			}

	.xenOverlay.memberCard .userLinks
	{
		' . XenForo_Template_Helper_Core::styleProperty('memberCardUserLinks') . '
	}
	
		.xenOverlay.memberCard .userLinks a
		{
			margin-right: 10px;
			color: inherit;
			white-space: nowrap;
		}
		
	.xenOverlay.memberCard .lastActivity
	{
		' . XenForo_Template_Helper_Core::styleProperty('memberCardLastActivity') . '
	}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .xenOverlay.memberCard
	{
		max-width: 320px;
	}

	.Responsive .xenOverlay.memberCard .avatarCropper
	{
		float: none;
		margin-left: auto;
		margin-right: auto;
	}

	.Responsive .xenOverlay.memberCard .userInfo
	{
		margin-left: 0;
	}
	
	.Responsive .xenOverlay.memberCard .userInfo h3,
	.Responsive .xenOverlay.memberCard .userInfo .userTitleBlurb,
	.Responsive .xenOverlay.memberCard .userInfo .status
	{
		text-align: center;
	}
}
';
}
