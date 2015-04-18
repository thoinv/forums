<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.videoThumbnailEditor
{
	overflow: hidden; zoom: 1;
	margin: 0 auto;
}

.videoThumbnailEditor .currentThumbnail
{
	float: left;
	display: block;
	width: 96px;
	text-align: center;
}

	.videoThumbnailEditor .currentThumbnail img
	{
		max-width: 96px;
	}

.videoThumbnailEditor .modifyControls
{
	margin-left: 110px;
}

	.videoThumbnailEditor .thumbnailUpload
	{
		max-width: 100%;
		box-sizing: border-box;
		margin: 3px 0;
	}
	
	.videoThumbnailEditor .thumbnailAction
	{
		overflow: hidden; zoom: 1;
		padding: 10px;
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
		border-radius: 5px;
		margin-bottom: 10px;
	}

	.xenOverlay .videoThumbnailEditor .thumbnailAction
	{
		background: rgba(0,0,0, 0.25);
	}
	
	.videoThumbnailEditor .faint
	{
		font-size: 11px;
	}
	
.videoThumbnailEditor .submitUnit
{
	text-align: right;
}

.videoThumbnailEditor .videoThumbnail
{
	' . XenForo_Template_Helper_Core::styleProperty('avatar') . '
	background-color: transparent;
}';
