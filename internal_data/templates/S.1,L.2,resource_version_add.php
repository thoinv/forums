<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Post Resource Update';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $categoryBreadcrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:resources', $resource, array()), 'value' => XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('resources/save-version', $resource, array()) . '" method="post"
	class="xenForm Preview AutoValidator"
	data-previewUrl="' . XenForo_Template_Helper_Core::link('resources/preview', $resource, array()) . '"
	data-redirect="on">

	';
if (!$resource['isFilelessNoExternal'])
{
$__output .= '
		<fieldset>
			';
if (!$resource['is_fileless'])
{
$__output .= '
				<dl class="ctrlUnit">
					<dt><label for="ctrl_version_string">' . 'Updated Resource File' . ':</label></dt>
					<dd>
						<ul>
							';
if ($allowLocal)
{
$__output .= '
								<li><label><input type="radio" name="resource_file_type" value="file" id="ctrl_resource_file_type_file" class="Disabler" ' . ((!$resource['download_url']) ? ' checked="checked"' : '') . ' /> ' . 'Uploaded file' . ':</label>
									<ul id="ctrl_resource_file_type_file_Disabler">
										<li>
											';
$__compilerVar15 = '';
$__compilerVar15 .= 'Upload Your Resource';
$__compilerVar16 = '';
$__compilerVar16 .= 'resource';
$__compilerVar17 = '';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar17 .= '
';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar17 .= '
';
$this->addRequiredExternal('js', 'js/xenresource/file_uploader.js');
$__compilerVar17 .= '
';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar17 .= '
	';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar17 .= '
';
}
$__compilerVar17 .= '
';
$this->addRequiredExternal('css', 'file_uploader');
$__compilerVar17 .= '

<div id="UploadedFile_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '" class="uploadedFile">
	<a href="" class="Delete" title="' . 'Xóa' . '">x</a>
	<div class="Progress"><div class="gauge"><div class="Meter">&nbsp;</div></div></div>
	<div class="Filename">&nbsp;</div>
</div>

<input type="hidden" name="file_hash" value="' . htmlspecialchars($fileParams[$uploaderId]['hash'], ENT_QUOTES, 'UTF-8') . '" />

<span id="FileUploader_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '" class="buttonProxy FileUploader"
	style="display: none"
	data-uploaderid="' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '"
	data-placeholder="#SWFUploadPlaceHolder_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '"
	data-trigger="#ctrl_uploader_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '"
	data-result="#UploadedFile_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '"
	data-postname="upload"
	data-maxfilesize="' . htmlspecialchars($fileConstraints[$uploaderId]['size'], ENT_QUOTES, 'UTF-8') . '"
	data-maxuploads="' . htmlspecialchars($fileConstraints[$uploaderId]['count'], ENT_QUOTES, 'UTF-8') . '"
	data-extensions="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $fileConstraints[$uploaderId]['extensions'],
'1' => ','
)) . '"
	data-action="' . XenForo_Template_Helper_Core::link('full:attachments/do-upload.json', '', array(
'hash' => $fileParams[$uploaderId]['hash'],
'content_type' => $fileParams[$uploaderId]['content_type'],
'key' => $__compilerVar16
)) . '"
	data-uniquekey="' . htmlspecialchars($__compilerVar16, ENT_QUOTES, 'UTF-8') . '"
	data-err-110="' . 'File đã tải lên lớn hơn so với quy định.' . '"
	data-err-120="' . 'The uploaded file is empty.' . '"
	data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
	data-err-unknown="' . 'There was a problem uploading your file.' . '">

	<span id="SWFUploadPlaceHolder_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '"></span>

	<input type="button" value="' . (($__compilerVar15) ? ($__compilerVar15) : ('Tải lên file đính kèm')) . '"
		id="ctrl_uploader_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '" class="button OverlayTrigger DisableOnSubmit"
		data-href="' . XenForo_Template_Helper_Core::link('full:attachments/upload', '', array(
'_params' => $fileParams[$uploaderId],
'key' => $__compilerVar16
)) . '"
		data-hider="#FileUploader_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '" />
	<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
	';
foreach ($fileParams[$uploaderId]['content_data'] AS $dataKey => $dataValue)
{
$__compilerVar17 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
	';
}
$__compilerVar17 .= '
</span>

<noscript>
	<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $fileParams[$uploaderId]
)) . '" class="button" target="_blank">' . (($__compilerVar15) ? ($__compilerVar15) : ('Tải lên file đính kèm')) . '</a>
</noscript>';
$__output .= $__compilerVar17;
unset($__compilerVar15, $__compilerVar16, $__compilerVar17);
$__output .= '
										</li>
									</ul>
								</li>
							';
}
$__output .= '
							';
if ($allowExternal)
{
$__output .= '
								<li><label><input type="radio" name="resource_file_type" value="url" id="ctrl_resource_file_type_url" class="Disabler" ' . (($resource['download_url']) ? ' checked="checked"' : '') . ' /> ' . 'External download URL' . ':</label>
									<ul id="ctrl_resource_file_type_url_Disabler">
										<li><input type="url" name="download_url" class="textCtrl" /></li>
									</ul>
								</li>
							';
}
$__output .= '
						</ul>
						<p class="explain">' . 'If you are updating your resource with a new version, upload the new file here. This is not required to post an update.' . '</p>
					</dd>
				</dl>
			';
}
$__output .= '

			<dl class="ctrlUnit">
				<dt><label for="ctrl_version_string">' . 'Version String' . ':</label></dt>
				<dd>
					<input type="text" name="version_string" value="' . htmlspecialchars($version['version_string'], ENT_QUOTES, 'UTF-8') . '" placeholder="' . 'Currently version ' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '' . '" class="textCtrl" id="ctrl_version_string" maxlength="25" />
					<p class="explain">' . 'This is the new version name for your resource, such as 1.0. You may not alter this once you have saved it. If you do not enter this, a new version will not be posted.' . '</p>
				</dd>
			</dl>
		</fieldset>
	';
}
$__output .= '

	<fieldset>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_title">' . 'Update Title' . ':</label></dt>
			<dd>
				<input type="text" name="title" value="' . htmlspecialchars($update['title'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_title" maxlength="100" />
				<p class="explain">' . 'If you enter a title and message, members watching your resource will be alerted. If you are updating your resource with a new version, this is a good place to note what\'s changed.' . '</p>
			</dd>
		</dl>

		<dl class="ctrlUnit">
			<dt><label for="ctrl_message">' . 'Nội dung' . ':</label></dt>
			<dd>
				' . $editorTemplate . '
			</dd>
		</dl>

		';
if ($attachmentParams)
{
$__output .= '
			<dl class="ctrlUnit AttachedFilesUnit">
				<dt><label for="ctrl_uploader">' . 'Các file đính kèm' . ':</label></dt>
				<dd>';
$__compilerVar18 = '';
if ($attachmentParams)
{
$__compilerVar18 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar18 .= '
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar18 .= '
	
	<div class="AttachmentEditor">
	
		';
if ($showUploadButton)
{
$__compilerVar18 .= '
			';
$__compilerVar19 = '';
if ($attachmentParams)
{
$__compilerVar19 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar19 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar19 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar19 .= '
	';
}
$__compilerVar19 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar19 .= '

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
$__compilerVar19 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar19 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '</a>
	</noscript>

';
}
$__compilerVar18 .= $__compilerVar19;
unset($__compilerVar19);
$__compilerVar18 .= '
		';
}
$__compilerVar18 .= '
		
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
$__compilerVar20 = '';
$__compilerVar20 .= '1';
$__compilerVar21 = '';
$__compilerVar22 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar22 .= '

<li id="' . (($__compilerVar20) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($__compilerVar21['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($__compilerVar21 and $__compilerVar21['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($__compilerVar21 and $__compilerVar21['thumbnailUrl'])
{
$__compilerVar22 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar21, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($__compilerVar21['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($__compilerVar21['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($__compilerVar21['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar21, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar22 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar22 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar21, array()) . '" target="_blank">' . (($__compilerVar21) ? (htmlspecialchars($__compilerVar21['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($__compilerVar20)
{
$__compilerVar22 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar22 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($__compilerVar21['thumbnailUrl'])
{
$__compilerVar22 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar22 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $__compilerVar21, array()) . '" />
			
				';
if ($__compilerVar21['thumbnailUrl'])
{
$__compilerVar22 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar22 .= '
			</div>
		';
}
$__compilerVar22 .= '

	</div>
	
</li>';
$__compilerVar18 .= $__compilerVar22;
unset($__compilerVar20, $__compilerVar21, $__compilerVar22);
$__compilerVar18 .= '
			';
if ($attachments)
{
$__compilerVar18 .= '
				';
foreach ($attachments AS $attachment)
{
$__compilerVar18 .= '
					';
if ($attachment['temp_hash'])
{
$__compilerVar18 .= '
						';
$__compilerVar23 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar23 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar23 .= '
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
$__compilerVar23 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar23 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar23 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar23 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar23 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar23 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar23 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar23 .= '
			</div>
		';
}
$__compilerVar23 .= '

	</div>
	
</li>';
$__compilerVar18 .= $__compilerVar23;
unset($__compilerVar23);
$__compilerVar18 .= '
					';
}
$__compilerVar18 .= '
				';
}
$__compilerVar18 .= '
			';
}
$__compilerVar18 .= '
		</ol>
	
		';
if ($attachments)
{
$__compilerVar18 .= '
			';
$__compilerVar24 = '';
$__compilerVar24 .= '
					';
foreach ($attachments AS $attachment)
{
$__compilerVar24 .= '
						';
if (!$attachment['temp_hash'])
{
$__compilerVar24 .= '
							';
$__compilerVar25 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar25 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar25 .= '
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
$__compilerVar25 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar25 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar25 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar25 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar25 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar25 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar25 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar25 .= '
			</div>
		';
}
$__compilerVar25 .= '

	</div>
	
</li>';
$__compilerVar24 .= $__compilerVar25;
unset($__compilerVar25);
$__compilerVar24 .= '
						';
}
$__compilerVar24 .= '
					';
}
$__compilerVar24 .= '
				';
if (trim($__compilerVar24) !== '')
{
$__compilerVar18 .= '
			<ol class="AttachmentList Existing">
				' . $__compilerVar24 . '
			</ol>
			';
}
unset($__compilerVar24);
$__compilerVar18 .= '
		';
}
$__compilerVar18 .= '
		
		<input type="hidden" name="attachment_hash" value="' . htmlspecialchars($attachmentParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
		
		' . '
		
	</div>
	
';
}
$__output .= $__compilerVar18;
unset($__compilerVar18);
$__output .= '</dd>
			</dl>
		';
}
$__output .= '
	</fieldset>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Save Update' . '" accesskey="s" class="button primary" />
			';
$__compilerVar26 = '';
$__compilerVar26 .= 'Upload Images' . '...';
$__compilerVar27 = '';
$__compilerVar27 .= 'image';
$__compilerVar28 = '';
if ($attachmentParams)
{
$__compilerVar28 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar28 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar28 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar28 .= '
	';
}
$__compilerVar28 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar28 .= '

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
'key' => $__compilerVar27
)) . '"
		data-uniquekey="' . htmlspecialchars($__compilerVar27, ENT_QUOTES, 'UTF-8') . '"
		data-err-110="' . 'File đã tải lên lớn hơn so với quy định.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($__compilerVar26) ? ($__compilerVar26) : ('Tải lên file đính kèm')) . '"
			id="ctrl_uploader" class="button OverlayTrigger DisableOnSubmit"
			data-href="' . XenForo_Template_Helper_Core::link('full:attachments/upload', '', array(
'_params' => $attachmentParams,
'key' => $__compilerVar27
)) . '"
			data-hider="#AttachmentUploader" />
		<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
		';
foreach ($attachmentParams['content_data'] AS $dataKey => $dataValue)
{
$__compilerVar28 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar28 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($__compilerVar26) ? ($__compilerVar26) : ('Tải lên file đính kèm')) . '</a>
	</noscript>

';
}
$__output .= $__compilerVar28;
unset($__compilerVar26, $__compilerVar27, $__compilerVar28);
$__output .= '
			<input type="button" value="' . 'Xem trước' . '..." class="button PreviewButton JsOnly" />
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
