<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Trả lời vào đối thoại' . ': ' . htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Trả lời vào đối thoại';
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
			<input type="submit" value="' . 'Trả lời vào đối thoại' . '" accesskey="s" class="button primary" />
			';
$__compilerVar10 = '';
if ($attachmentParams)
{
$__compilerVar10 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar10 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar10 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar10 .= '
	';
}
$__compilerVar10 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar10 .= '

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
		data-err-110="' . 'File đã tải lên lớn hơn so với quy định.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '"
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
$__compilerVar10 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar10 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '</a>
	</noscript>

';
}
$__output .= $__compilerVar10;
unset($__compilerVar10);
$__output .= '
			<input type="button" value="' . 'Xem trước' . '" class="button PreviewButton JsOnly" />
		</dd>
	</dl>

	';
if ($attachmentParams)
{
$__output .= '
		<dl class="ctrlUnit AttachedFilesUnit">
			<dt><label for="ctrl_uploader">' . 'Các file đính kèm' . ':</label></dt>
			<dd>';
$__compilerVar11 = '';
if ($attachmentParams)
{
$__compilerVar11 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar11 .= '
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar11 .= '
	
	<div class="AttachmentEditor">
	
		';
if ($showUploadButton)
{
$__compilerVar11 .= '
			';
$__compilerVar12 = '';
if ($attachmentParams)
{
$__compilerVar12 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar12 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar12 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar12 .= '
	';
}
$__compilerVar12 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar12 .= '

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
		data-err-110="' . 'File đã tải lên lớn hơn so với quy định.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '"
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
$__compilerVar12 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar12 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '</a>
	</noscript>

';
}
$__compilerVar11 .= $__compilerVar12;
unset($__compilerVar12);
$__compilerVar11 .= '
		';
}
$__compilerVar11 .= '
		
		<div class="NoAttachments"></div>
		
		<div class="secondaryContent AttachmentInsertAllBlock JsOnly">
			<span></span>
			<div class="AttachmentText">
				<div class="label">' . 'Chèn các ảnh theo kiểu' . '...</div>
				<div class="controls">
					<!--<input type="button" value="' . 'Delete All' . '" class="button _smallButton AttachmentDeleteAll" />-->
					<input type="button" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInsertAll" name="thumb" />
					<input type="button" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInsertAll" name="image" />
				</div>
			</div>
		</div>
	
		<ol class="AttachmentList New">
			';
$__compilerVar13 = '';
$__compilerVar13 .= '1';
$__compilerVar14 = '';
$__compilerVar15 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar15 .= '

<li id="' . (($__compilerVar13) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($__compilerVar14['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($__compilerVar14 and $__compilerVar14['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($__compilerVar14 and $__compilerVar14['thumbnailUrl'])
{
$__compilerVar15 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar14, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($__compilerVar14['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($__compilerVar14['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($__compilerVar14['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar14, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar15 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar15 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar14, array()) . '" target="_blank">' . (($__compilerVar14) ? (htmlspecialchars($__compilerVar14['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($__compilerVar13)
{
$__compilerVar15 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar15 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($__compilerVar14['thumbnailUrl'])
{
$__compilerVar15 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar15 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $__compilerVar14, array()) . '" />
			
				';
if ($__compilerVar14['thumbnailUrl'])
{
$__compilerVar15 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar15 .= '
			</div>
		';
}
$__compilerVar15 .= '

	</div>
	
</li>';
$__compilerVar11 .= $__compilerVar15;
unset($__compilerVar13, $__compilerVar14, $__compilerVar15);
$__compilerVar11 .= '
			';
if ($attachments)
{
$__compilerVar11 .= '
				';
foreach ($attachments AS $attachment)
{
$__compilerVar11 .= '
					';
if ($attachment['temp_hash'])
{
$__compilerVar11 .= '
						';
$__compilerVar16 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar16 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar16 .= '
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
$__compilerVar16 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar16 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar16 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar16 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar16 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar16 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar16 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar16 .= '
			</div>
		';
}
$__compilerVar16 .= '

	</div>
	
</li>';
$__compilerVar11 .= $__compilerVar16;
unset($__compilerVar16);
$__compilerVar11 .= '
					';
}
$__compilerVar11 .= '
				';
}
$__compilerVar11 .= '
			';
}
$__compilerVar11 .= '
		</ol>
	
		';
if ($attachments)
{
$__compilerVar11 .= '
			';
$__compilerVar17 = '';
$__compilerVar17 .= '
					';
foreach ($attachments AS $attachment)
{
$__compilerVar17 .= '
						';
if (!$attachment['temp_hash'])
{
$__compilerVar17 .= '
							';
$__compilerVar18 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar18 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar18 .= '
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
$__compilerVar18 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar18 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar18 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar18 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar18 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar18 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar18 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar18 .= '
			</div>
		';
}
$__compilerVar18 .= '

	</div>
	
</li>';
$__compilerVar17 .= $__compilerVar18;
unset($__compilerVar18);
$__compilerVar17 .= '
						';
}
$__compilerVar17 .= '
					';
}
$__compilerVar17 .= '
				';
if (trim($__compilerVar17) !== '')
{
$__compilerVar11 .= '
			<ol class="AttachmentList Existing">
				' . $__compilerVar17 . '
			</ol>
			';
}
unset($__compilerVar17);
$__compilerVar11 .= '
		';
}
$__compilerVar11 .= '
		
		<input type="hidden" name="attachment_hash" value="' . htmlspecialchars($attachmentParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
		
		' . '
		
	</div>
	
';
}
$__output .= $__compilerVar11;
unset($__compilerVar11);
$__output .= '</dd>
		</dl>
	';
}
$__output .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
