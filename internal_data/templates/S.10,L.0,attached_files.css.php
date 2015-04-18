<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/* the attached files block is intended to appear like a bb code block */

.attachedFiles
{
	' . XenForo_Template_Helper_Core::styleProperty('bbCodeBlock') . '
}

.messageList.withSidebar .attachedFiles
{
	margin-right: 0px;
}

	.attachedFiles .attachedFilesHeader
	{
		' . XenForo_Template_Helper_Core::styleProperty('bbCodeBlockType') . '
		
		padding: 4px 8px;
	}

	.attachedFiles .attachmentList
	{
		/* roughly the same as "bbCodeCode" with the monospacing stuff removed */
		overflow: hidden; zoom: 1;		
		padding: 10px 10px 0;
		background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ' url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png\') repeat-x top;
		border-radius: 5px;
	}

		.attachment
		{
			float: left;
			width: 50%;
			max-width: 300px;
		}
		
		.attachment .boxModelFixer
		{
			overflow: hidden; zoom: 1;
			margin-bottom: 10px;
			margin-right: 10px;
			padding: 5px;				
			background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
			border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
			border-radius: 5px;	
		}
		
			';
$attachThumbSize = '';
$attachThumbSize .= ($xenOptions['attachmentThumbnailDimensions'] / 2) . 'px';
$__output .= '
		
			.attachment .thumbnail
			{
				float: left;						
				border-right: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
				padding-right: 5px;
				width: ' . htmlspecialchars($attachThumbSize, ENT_QUOTES, 'UTF-8') . ';
				height: ' . htmlspecialchars($attachThumbSize, ENT_QUOTES, 'UTF-8') . ';
				overflow: hidden;
			}
			
				.attachment .thumbnail .SquareThumb
				{
					width: ' . htmlspecialchars($attachThumbSize, ENT_QUOTES, 'UTF-8') . ';
					height: ' . htmlspecialchars($attachThumbSize, ENT_QUOTES, 'UTF-8') . ';
					border-radius: 3px;
				}
				
				.attachment .thumbnail .genericAttachment
				{
					' . XenForo_Template_Helper_Core::styleProperty('genericAttachmentThumb') . '
					
					margin: ' . (($xenOptions['attachmentThumbnailDimensions'] / 2 - XenForo_Template_Helper_Core::styleProperty('genericAttachmentThumb.height')) / 2) . 'px ' . (($xenOptions['attachmentThumbnailDimensions'] / 2 - XenForo_Template_Helper_Core::styleProperty('genericAttachmentThumb.width')) / 2) . 'px !important;
				}
			
		.attachment .attachmentInfo
		{
			white-space: nowrap;
			overflow: hidden; zoom: 1;
			font-size: 11px;
			padding-left: 5px;
		}
		
			.attachment .attachmentInfo .filename
			{
				text-overflow: ellipsis;
				overflow: hidden;
				max-width: 100%;
			}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveWideWidth') . ')
{
	.Responsive .attachedFiles
	{
		margin-right: 0;
	}
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	html.Responsive .attachment
	{
		width: 100%;
	}
}
';
}
