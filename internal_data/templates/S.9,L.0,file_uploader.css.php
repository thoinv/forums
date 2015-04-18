<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.FileUploader
{
	display: block;
}

.uploadedFile
{
	' . XenForo_Template_Helper_Core::styleProperty('secondaryContent.background') . ';

	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	border-radius: 3px;
	font-size: 11px;
	padding: 5px;
	box-sizing: border-box;
	margin-right: ' . XenForo_Template_Helper_Core::styleProperty('ctrlUnitEdgeSpacer') . ';

	display: none;
}

	.uploadedFile .Delete
	{
		float: right;
		font-weight: bold;
		line-height: 18px;
		height: 18px;
		width: 18px;
		text-align: center;
		border-radius: 3px;
	}

		.uploadedFile .Delete:hover
		{
			background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
			text-decoration: none;
		}

.uploadedFile .Progress
{
	background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif\') center left no-repeat;
}

	.uploadedFile .Progress .gauge
	{
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
		border-radius: 3px;
		background-color: ' . XenForo_Template_Helper_Core::styleProperty('content.background-color') . ';
		margin: 0 20px;
	}

		.uploadedFile .Progress .gauge .Meter
		{
			border-radius: 1px;
			background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . ' url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png\') repeat-x top;
			height: 16px;
		}

.uploadedFile .Filename
{
	line-height: 18px;
	height: 18px;
	padding: 0 5px;
}';
