<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.resourceInfo
{
	overflow: hidden; zoom: 1;
	margin-bottom: 10px;
}

	.resourceInfo .resourceImage
	{
		float: left;
		margin-right: 12px;
		margin-bottom: 3px;
		width: 48px;
		position: relative;
	}
	
		.resourceInfo .resourceImage .resourceIcon
		{
			' . XenForo_Template_Helper_Core::styleProperty('avatar') . '
			width: 48px;
			height: 48px;
		}

	.resourceInfo h1
	{
		' . XenForo_Template_Helper_Core::styleProperty('h1') . '
	}

	.resourceInfo .primaryLinks
	{
		float: right;
		margin-left: 10px;
		min-width: 180px;
	}
	
		.resourceInfo .primaryLinks.noButton
		{
			min-width: 0;
			margin-top: 5px;
		}

		.resourceInfo .primaryLinks li
		{
			text-align: center;
			margin-bottom: 5px;
		}

		.resourceInfo .primaryLinks li:last-child
		{
			margin-bottom: 0;
		}

	.resourceInfo small.minorText
	{
		display: block;
		font-size: 11px;
		font-weight: normal;
	}

.downloadButton
{
	' . XenForo_Template_Helper_Core::styleProperty('signupButton') . '

	margin: 0;
	line-height: normal;
	height: auto;
}

.downloadDisabled
{
	border-color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
}

	.downloadButton .inner
	{
		' . XenForo_Template_Helper_Core::styleProperty('signupButtonInner') . '

		padding: 3px 10px;
	}
	
	.downloadButton.purchase .inner
	{
		padding: 6px 10px;
	}

	.downloadButton:hover .inner
	{
		' . XenForo_Template_Helper_Core::styleProperty('signupButtonHover') . '
	}

	.downloadButton:active
	{
		' . XenForo_Template_Helper_Core::styleProperty('signupButtonActive') . '
	}

	.downloadDisabled .inner,
	.downloadDisabled:hover .inner
	{
		background-color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
		color: white;
	}

.resourceAlerts
{
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	border-radius: 5px;
	font-size: 11px;
	margin: 10px 0;
	padding: 5px;
	line-height: 16px;
	background-image: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/form-button-white-25px.png\');
}

	.resourceAlerts .icon
	{
		float: right;
		width: 16px;
		height: 16px;
		margin-left: 5px;
		background: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat -1000px -1000px;
	}
		
			.resourceAlerts .deletedAlert .icon { background-position: -64px -32px; }
			.resourceAlerts .moderatedAlert .icon { background-position: -32px -16px; }
			
';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .resourceInfo
	{
		display: table;
		table-layout: fixed;
		width: 100%;
		box-sizing: border-box;
	}
	
	.Responsive .resourceInfo .primaryLinks
	{
		display: table-footer-group;
		
		float: none;
		padding-right: 0;
		border-right: none;
		margin: 0 auto;
		margin-top: 10px;
	}
	
		.Responsive .resourceInfo .downloadButton
		{
			display: inline-block;
		}
}
';
}
