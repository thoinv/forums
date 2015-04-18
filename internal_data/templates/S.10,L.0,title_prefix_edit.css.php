<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.textCtrl .prefix,
.textCtrl .Popup
{
	float: left;
	margin-right: 3px;
}

	.textCtrl .prefix .Remove
	{
		cursor: pointer;
		margin-left: 5px;
		font-weight: bold;
		opacity: 0.35;
	}
	
		.textCtrl .prefix .Remove:hover
		{
			opacity: 1;
			text-decoration: none;
		}
		
.PrefixPopup a[rel]
{
}

.PrefixMenu
{
	z-index: 15000;
	padding: 0;
	max-height: 300px;
	overflow: auto;
	padding: 2px;
}

	.PrefixMenu .PrefixOption a
	{
		display: block;
		padding: 5px 10px;
		font-size: 100% !important;
		margin: 0 2px 3px;
	}
	
		.PrefixMenu .PrefixOption a:hover
		{
			text-decoration: none;
		}

	.PrefixMenu .PrefixGroup
	{
		border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		padding-bottom: 3px;
	}

		.PrefixMenu .PrefixGroup h3
		{
			color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . ';
			font-weight: bold;
			background: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/form-button-white-25px.png\') repeat-x top;
			padding: 4px 5px;
		}
			
		.PrefixMenu .PrefixGroup .PrefixOption a
		{
			margin-left: 12px;
		}
		
	.PrefixMenu .PrefixGroup  + .PrefixOption
	{
		margin-top: 5px;
	}
	
	.PrefixMenu .PrefixGroup.selected,
	.PrefixMenu .PrefixOption.selected
	{
		display: none;
	}
		
.textCtrl .Popup .PopupControl.prefix.noPrefix
{
	background: ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('primaryLightest'),
'1' => '0.2'
)) . ';
}

.prefix.noPrefix
{
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	font-style: italic;
}';
