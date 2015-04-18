<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Reply to Conversation' . ': ' . htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Reply to Conversation';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:conversations', $conversation, array()), 'value' => htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('conversations/insert-reply', $conversation, array()) . '" method="post" class="xenForm Preview"
	data-previewUrl="' . XenForo_Template_Helper_Core::link('conversations/preview', false, array()) . '"
>
	<fieldset>
		<dl class="ctrlUnit fullWidth">
			<dt></dt>
			<dd>' . $editorTemplate . '</dd>
		</dl>
	</fieldset>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Reply to Conversation' . '" accesskey="s" class="button primary" />
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
			<input type="button" value="' . 'Preview' . '" class="button PreviewButton JsOnly" />
		</dd>
	</dl>

	';
if ($attachmentParams)
{
$__output .= '
		<dl class="ctrlUnit AttachedFilesUnit">
			<dt><label for="ctrl_uploader">' . 'Attached Files' . ':</label></dt>
			<dd>';
$__compilerVar2 = '';
if ($attachmentParams)
{
$__compilerVar2 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar2 .= '
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar2 .= '
	
	<div class="AttachmentEditor">
	
		';
if ($showUploadButton)
{
$__compilerVar2 .= '
			';
$__compilerVar3 = '';
if ($attachmentParams)
{
$__compilerVar3 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar3 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar3 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar3 .= '
	';
}
$__compilerVar3 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar3 .= '

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
$__compilerVar3 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar3 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '</a>
	</noscript>

';
}
$__compilerVar2 .= $__compilerVar3;
unset($__compilerVar3);
$__compilerVar2 .= '
		';
}
$__compilerVar2 .= '
		
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
$__compilerVar4 = '';
$__compilerVar4 .= '1';
$__compilerVar5 = '';
$__compilerVar6 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar6 .= '

<li id="' . (($__compilerVar4) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($__compilerVar5['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($__compilerVar5 and $__compilerVar5['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($__compilerVar5 and $__compilerVar5['thumbnailUrl'])
{
$__compilerVar6 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar5, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($__compilerVar5['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($__compilerVar5['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($__compilerVar5['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar5, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar6 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar6 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar5, array()) . '" target="_blank">' . (($__compilerVar5) ? (htmlspecialchars($__compilerVar5['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($__compilerVar4)
{
$__compilerVar6 .= '
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar6 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($__compilerVar5['thumbnailUrl'])
{
$__compilerVar6 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar6 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $__compilerVar5, array()) . '" />
			
				';
if ($__compilerVar5['thumbnailUrl'])
{
$__compilerVar6 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar6 .= '
			</div>
		';
}
$__compilerVar6 .= '

	</div>
	
</li>';
$__compilerVar2 .= $__compilerVar6;
unset($__compilerVar4, $__compilerVar5, $__compilerVar6);
$__compilerVar2 .= '
			';
if ($attachments)
{
$__compilerVar2 .= '
				';
foreach ($attachments AS $attachment)
{
$__compilerVar2 .= '
					';
if ($attachment['temp_hash'])
{
$__compilerVar2 .= '
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
$__compilerVar2 .= $__compilerVar7;
unset($__compilerVar7);
$__compilerVar2 .= '
					';
}
$__compilerVar2 .= '
				';
}
$__compilerVar2 .= '
			';
}
$__compilerVar2 .= '
		</ol>
	
		';
if ($attachments)
{
$__compilerVar2 .= '
			';
$__compilerVar8 = '';
$__compilerVar8 .= '
					';
foreach ($attachments AS $attachment)
{
$__compilerVar8 .= '
						';
if (!$attachment['temp_hash'])
{
$__compilerVar8 .= '
							';
$__compilerVar9 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar9 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar9 .= '
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
$__compilerVar9 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar9 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar9 .= '
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar9 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar9 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar9 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar9 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar9 .= '
			</div>
		';
}
$__compilerVar9 .= '

	</div>
	
</li>';
$__compilerVar8 .= $__compilerVar9;
unset($__compilerVar9);
$__compilerVar8 .= '
						';
}
$__compilerVar8 .= '
					';
}
$__compilerVar8 .= '
				';
if (trim($__compilerVar8) !== '')
{
$__compilerVar2 .= '
			<ol class="AttachmentList Existing">
				' . $__compilerVar8 . '
			</ol>
			';
}
unset($__compilerVar8);
$__compilerVar2 .= '
		';
}
$__compilerVar2 .= '
		
		<input type="hidden" name="attachment_hash" value="' . htmlspecialchars($attachmentParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
		
		' . '
		
	</div>
	
';
}
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '</dd>
		</dl>
	';
}
$__output .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
