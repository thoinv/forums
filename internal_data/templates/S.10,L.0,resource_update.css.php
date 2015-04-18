<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.resourceUpdate
{
	border-bottom: none;
	border-top: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	padding: 40px 0 0;
	overflow: hidden; zoom: 1;
}

	.resourceUpdate:first-child
	{
		border-top: none;
		padding-top: 0;
	}

	.resourceUpdate .hidden
	{
		display: none;
	}

	.resourceUpdate .avatar
	{
		display: none;
	}

	.resourceUpdate .versionInfo
	{
		float: right;
		width: 230px;
		margin-top: 0;
		margin-left: 10px;
		font-size: 11px;
	}

		.resourceUpdate .versionInfo .secondaryContent
		{
			padding: 10px;
		}
		
	.resourceUpdate .likesSummary
	{
		' . XenForo_Template_Helper_Core::styleProperty('messageLikesSummary') . '
	}

.imageCollection
{
	margin: 10px auto;
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	border-radius: 5px;
	background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ' url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png\') repeat-x top;
	padding: 5px;
	overflow: hidden; zoom: 1;
}
	.imageCollection .textHeading
	{
		margin-top: 0;
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . ';
	}

	.imageCollection li
	{
		float: left;
		width: ' . htmlspecialchars($xenOptions['attachmentThumbnailDimensions'], ENT_QUOTES, 'UTF-8') . 'px;
		height: ' . htmlspecialchars($xenOptions['attachmentThumbnailDimensions'], ENT_QUOTES, 'UTF-8') . 'px;
		overflow: hidden;
		background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		border-radius: 5px;
		text-align: center;
		line-height: ' . htmlspecialchars($xenOptions['attachmentThumbnailDimensions'], ENT_QUOTES, 'UTF-8') . 'px;
		font-size: 1px;
		margin: 3px;
		padding: 5px;
		white-space: nowrap;
	}

		.imageCollection li img
		{
			vertical-align: middle;
		}';
