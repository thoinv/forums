<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($attachmentParams)
{
$__output .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__output .= '
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__output .= '
	
	<div class="AttachmentEditor">
	
		';
if ($showUploadButton)
{
$__output .= '
			';
$__compilerVar1 = '';
if ($attachmentParams)
{
$__compilerVar1 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar1 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar1 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar1 .= '
	';
}
$__compilerVar1 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar1 .= '

	<span id="AttachmentUploader" class="buttonProxy AttachmentUploader"
		style="display: none"
		data-placeholder="#SWFUploadPlaceHolder"
		data-trigger="#ctrl_uploader"
		data-postname="upload"
		data-maxfilesize="' . htmlspecialchars($attachmentConstraints['size'], ENT_QUOTES, 'UTF-8') . '"
		data-maxuploads="' . htmlspecialchars($attachmentConstraints['count'], ENT_QUOTES, 'UTF-8') . '"
		data-extensions="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $attachmentConstraints['extensions'],
'1' => ','
)) . '"
		data-action="' . XenForo_Template_Helper_Core::link('full:attachments/do-upload.json', '', array(
'hash' => $attachmentParams['hash'],
'content_type' => $attachmentParams['content_type'],
'key' => $attachmentButtonKey
)) . '"
		data-uniquekey="' . htmlspecialchars($attachmentButtonKey, ENT_QUOTES, 'UTF-8') . '"
		data-err-110="' . 'The uploaded file is too large.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '"
			id="ctrl_uploader" class="button OverlayTrigger DisableOnSubmit"
			data-href="' . XenForo_Template_Helper_Core::link('full:attachments/upload', '', array(
'_params' => $attachmentParams,
'key' => $attachmentButtonKey
)) . '"
			data-hider="#AttachmentUploader" />
		<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
		';
foreach ($attachmentParams['content_data'] AS $dataKey => $dataValue)
{
$__compilerVar1 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar1 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '</a>
	</noscript>

';
}
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
		';
}
$__output .= '
		
		<div class="NoAttachments"></div>
		
		<div class="secondaryContent AttachmentInsertAllBlock JsOnly">
			<span></span>
			<div class="AttachmentText">
				<div class="label">' . 'Insert every image as a' . '...</div>
				<div class="controls">
					<!--<input type="button" value="' . 'Delete All' . '" class="button _smallButton AttachmentDeleteAll" />-->
					<input type="button" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInsertAll" name="thumb" />
					<input type="button" value="' . 'Full Image' . '" class="button smallButton AttachmentInsertAll" name="image" />
				</div>
			</div>
		</div>
	
		<ol class="AttachmentList New">
			';
$__compilerVar2 = '';
$__compilerVar2 .= '1';
$__compilerVar3 = '';
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar4 .= '

<li id="' . (($__compilerVar2) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($__compilerVar3['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($__compilerVar3 and $__compilerVar3['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($__compilerVar3 and $__compilerVar3['thumbnailUrl'])
{
$__compilerVar4 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar3, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($__compilerVar3['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($__compilerVar3['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($__compilerVar3['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar3, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar4 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar4 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar3, array()) . '" target="_blank">' . (($__compilerVar3) ? (htmlspecialchars($__compilerVar3['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($__compilerVar2)
{
$__compilerVar4 .= '
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar4 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($__compilerVar3['thumbnailUrl'])
{
$__compilerVar4 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar4 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $__compilerVar3, array()) . '" />
			
				';
if ($__compilerVar3['thumbnailUrl'])
{
$__compilerVar4 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar4 .= '
			</div>
		';
}
$__compilerVar4 .= '

	</div>
	
</li>';
$__output .= $__compilerVar4;
unset($__compilerVar2, $__compilerVar3, $__compilerVar4);
$__output .= '
			';
if ($attachments)
{
$__output .= '
				';
foreach ($attachments AS $attachment)
{
$__output .= '
					';
if ($attachment['temp_hash'])
{
$__output .= '
						';
$__compilerVar5 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar5 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar5 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar5 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar5 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar5 .= '
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar5 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar5 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar5 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar5 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar5 .= '
			</div>
		';
}
$__compilerVar5 .= '

	</div>
	
</li>';
$__output .= $__compilerVar5;
unset($__compilerVar5);
$__output .= '
					';
}
$__output .= '
				';
}
$__output .= '
			';
}
$__output .= '
		</ol>
	
		';
if ($attachments)
{
$__output .= '
			';
$__compilerVar6 = '';
$__compilerVar6 .= '
					';
foreach ($attachments AS $attachment)
{
$__compilerVar6 .= '
						';
if (!$attachment['temp_hash'])
{
$__compilerVar6 .= '
							';
$__compilerVar7 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar7 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar7 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar7 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar7 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar7 .= '
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar7 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar7 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar7 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar7 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar7 .= '
			</div>
		';
}
$__compilerVar7 .= '

	</div>
	
</li>';
$__compilerVar6 .= $__compilerVar7;
unset($__compilerVar7);
$__compilerVar6 .= '
						';
}
$__compilerVar6 .= '
					';
}
$__compilerVar6 .= '
				';
if (trim($__compilerVar6) !== '')
{
$__output .= '
			<ol class="AttachmentList Existing">
				' . $__compilerVar6 . '
			</ol>
			';
}
unset($__compilerVar6);
$__output .= '
		';
}
$__output .= '
		
		<input type="hidden" name="attachment_hash" value="' . htmlspecialchars($attachmentParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
		
		' . '
		
	</div>
	
';
}
