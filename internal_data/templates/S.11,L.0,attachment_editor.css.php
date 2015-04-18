<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.AttachmentEditor
{
	clear: both;
}

.xenForm .ctrlUnit dd li.AttachedFile,
.xenForm .ctrlUnit dd .AttachmentInsertAllBlock
{
	margin-top: 0;
	margin-right: ' . XenForo_Template_Helper_Core::styleProperty('ctrlUnitEdgeSpacer') . ';
}

.AttachmentEditor .AttachedFile,
.AttachmentEditor .AttachmentInsertAllBlock
{
	overflow: hidden; zoom: 1;
	vertical-align: middle;
	padding: 5px 10px;
}

.AttachmentEditor .AttachedFile#AttachedFileTemplate
{
	display: none;
}

	.AttachmentEditor .AttachedFile .Thumbnail
	{
		width: 54px;
		height: 54px;
		line-height: 50px;
		display: block;
		background: ' . XenForo_Template_Helper_Core::styleProperty('content.background-color') . ';
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		text-align: center;
		vertical-align: middle;
		float: left;
	}
	
		.AttachmentEditor .AttachedFile .Thumbnail img
		{
			max-width: 50px;
			max-height: 50px;
			_width: 50px;
			_height: 50px;
			padding: 0;
			margin: 0;
			vertical-align: middle;
		}
		
		.AttachmentEditor .AttachedFile .Thumbnail .genericAttachment
		{			
			' . XenForo_Template_Helper_Core::styleProperty('genericAttachmentThumb') . '
			
			margin: ' . ((50 - XenForo_Template_Helper_Core::styleProperty('genericAttachmentThumb.width')) / 2) . 'px;
		}

	.AttachmentEditor .AttachmentText
	{
		margin-left: 64px;
	}
	
		.AttachmentEditor .AttachedFile .Filename
		{
		}
		
		.AttachmentEditor .secondaryContent .label
		{
			margin-bottom: 2px;
			font-size: 11px;
			color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
		}
		
		.AttachmentEditor .secondaryContent .controls
		{
			line-height: 25px;
		}
	
		' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.AttachmentEditor .AttachedFile .controls'
)) . '
		
			
		.AttachmentEditor .AttachedFile .ProgressMeter
		{
			display: block;
			padding: 2px;
			border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
			border-radius: 4px;
			background-color: ' . XenForo_Template_Helper_Core::styleProperty('content.background-color') . ';
			margin-right: 75px;
			margin-top: 4px;
			font-size: 14pt;
			line-height: 26px;
		}
		
			.AttachmentEditor .AttachedFile .ProgressMeter .ProgressGraphic
			{
				display: inline-block;
				width: 0%;
				height: 26px;
				background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . ' url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png\') repeat-x top;
				text-align: right;
			}
			
			.AttachmentEditor .AttachedFile .ProgressMeter .ProgressCounter
			{
				display: inline-block;
				height: 26px;
				padding: 0 10px;
			}
			
			.AttachmentEditor .AttachedFile .ProgressMeter .ProgressGraphic .ProgressCounter
			{
				color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
			}
			
			
			.AttachmentEditor .AttachedFile .AttachmentDeleter,
			.AttachmentEditor .AttachedFile .AttachmentCanceller
			{
				float: right;
				display: none;
			}

.AttachmentEditor .AttachmentInsertAllBlock
{
	display: none;
}

	.AttachmentEditor .AttachmentInsertAllBlock span
	{
		float: left;
		display: block;
		width: 54px;
		height: 34px;
		background: ' . XenForo_Template_Helper_Core::styleProperty('content.background-color') . ' url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/image-attachments.png\') no-repeat center;
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		margin-right: 10px;
	}

.AttachmentEditor .AttachmentDeleteAll
{
	float: right;
}

/* SWFUploader placeholder */

.swfupload
{
	position: absolute;
	z-index: 1;
}

/* Uploader JS Overlay */

.xenOverlay.attachmentUploader
{
	max-width: 500px;
}

.attachmentUploader #ctrl_upload
{
	margin: 2px auto 5px;
}

.attachmentUploader .attachmentConstraints dl
{
	margin-top: 2px;
	font-size: 11px;
}';
