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
$__compilerVar1 = '';
$__compilerVar1 .= 'Upload Your Resource';
$__compilerVar2 = '';
$__compilerVar2 .= 'resource';
$__compilerVar3 = '';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar3 .= '
';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar3 .= '
';
$this->addRequiredExternal('js', 'js/xenresource/file_uploader.js');
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
$this->addRequiredExternal('css', 'file_uploader');
$__compilerVar3 .= '

<div id="UploadedFile_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '" class="uploadedFile">
	<a href="" class="Delete" title="' . 'Delete' . '">x</a>
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
'key' => $__compilerVar2
)) . '"
	data-uniquekey="' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '"
	data-err-110="' . 'The uploaded file is too large.' . '"
	data-err-120="' . 'The uploaded file is empty.' . '"
	data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
	data-err-unknown="' . 'There was a problem uploading your file.' . '">

	<span id="SWFUploadPlaceHolder_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '"></span>

	<input type="button" value="' . (($__compilerVar1) ? ($__compilerVar1) : ('Upload a File')) . '"
		id="ctrl_uploader_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '" class="button OverlayTrigger DisableOnSubmit"
		data-href="' . XenForo_Template_Helper_Core::link('full:attachments/upload', '', array(
'_params' => $fileParams[$uploaderId],
'key' => $__compilerVar2
)) . '"
		data-hider="#FileUploader_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '" />
	<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
	';
foreach ($fileParams[$uploaderId]['content_data'] AS $dataKey => $dataValue)
{
$__compilerVar3 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
	';
}
$__compilerVar3 .= '
</span>

<noscript>
	<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $fileParams[$uploaderId]
)) . '" class="button" target="_blank">' . (($__compilerVar1) ? ($__compilerVar1) : ('Upload a File')) . '</a>
</noscript>';
$__output .= $__compilerVar3;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3);
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
			<dt><label for="ctrl_message">' . 'Message' . ':</label></dt>
			<dd>
				' . $editorTemplate . '
			</dd>
		</dl>

		';
if ($attachmentParams)
{
$__output .= '
			<dl class="ctrlUnit AttachedFilesUnit">
				<dt><label for="ctrl_uploader">' . 'Attached Files' . ':</label></dt>
				<dd>';
$__compilerVar4 = '';
if ($attachmentParams)
{
$__compilerVar4 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar4 .= '
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar4 .= '
	
	<div class="AttachmentEditor">
	
		';
if ($showUploadButton)
{
$__compilerVar4 .= '
			';
$__compilerVar5 = '';
if ($attachmentParams)
{
$__compilerVar5 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar5 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar5 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar5 .= '
	';
}
$__compilerVar5 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar5 .= '

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
$__compilerVar5 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar5 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '</a>
	</noscript>

';
}
$__compilerVar4 .= $__compilerVar5;
unset($__compilerVar5);
$__compilerVar4 .= '
		';
}
$__compilerVar4 .= '
		
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
$__compilerVar6 = '';
$__compilerVar6 .= '1';
$__compilerVar7 = '';
$__compilerVar8 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar8 .= '

<li id="' . (($__compilerVar6) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($__compilerVar7['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($__compilerVar7 and $__compilerVar7['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($__compilerVar7 and $__compilerVar7['thumbnailUrl'])
{
$__compilerVar8 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar7, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($__compilerVar7['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($__compilerVar7['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($__compilerVar7['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar7, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar8 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar8 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar7, array()) . '" target="_blank">' . (($__compilerVar7) ? (htmlspecialchars($__compilerVar7['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($__compilerVar6)
{
$__compilerVar8 .= '
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar8 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($__compilerVar7['thumbnailUrl'])
{
$__compilerVar8 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar8 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $__compilerVar7, array()) . '" />
			
				';
if ($__compilerVar7['thumbnailUrl'])
{
$__compilerVar8 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar8 .= '
			</div>
		';
}
$__compilerVar8 .= '

	</div>
	
</li>';
$__compilerVar4 .= $__compilerVar8;
unset($__compilerVar6, $__compilerVar7, $__compilerVar8);
$__compilerVar4 .= '
			';
if ($attachments)
{
$__compilerVar4 .= '
				';
foreach ($attachments AS $attachment)
{
$__compilerVar4 .= '
					';
if ($attachment['temp_hash'])
{
$__compilerVar4 .= '
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
$__compilerVar4 .= $__compilerVar9;
unset($__compilerVar9);
$__compilerVar4 .= '
					';
}
$__compilerVar4 .= '
				';
}
$__compilerVar4 .= '
			';
}
$__compilerVar4 .= '
		</ol>
	
		';
if ($attachments)
{
$__compilerVar4 .= '
			';
$__compilerVar10 = '';
$__compilerVar10 .= '
					';
foreach ($attachments AS $attachment)
{
$__compilerVar10 .= '
						';
if (!$attachment['temp_hash'])
{
$__compilerVar10 .= '
							';
$__compilerVar11 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar11 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar11 .= '
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
$__compilerVar11 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar11 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar11 .= '
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar11 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar11 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar11 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar11 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar11 .= '
			</div>
		';
}
$__compilerVar11 .= '

	</div>
	
</li>';
$__compilerVar10 .= $__compilerVar11;
unset($__compilerVar11);
$__compilerVar10 .= '
						';
}
$__compilerVar10 .= '
					';
}
$__compilerVar10 .= '
				';
if (trim($__compilerVar10) !== '')
{
$__compilerVar4 .= '
			<ol class="AttachmentList Existing">
				' . $__compilerVar10 . '
			</ol>
			';
}
unset($__compilerVar10);
$__compilerVar4 .= '
		';
}
$__compilerVar4 .= '
		
		<input type="hidden" name="attachment_hash" value="' . htmlspecialchars($attachmentParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
		
		' . '
		
	</div>
	
';
}
$__output .= $__compilerVar4;
unset($__compilerVar4);
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
$__compilerVar12 = '';
$__compilerVar12 .= 'Upload Images' . '...';
$__compilerVar13 = '';
$__compilerVar13 .= 'image';
$__compilerVar14 = '';
if ($attachmentParams)
{
$__compilerVar14 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar14 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar14 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar14 .= '
	';
}
$__compilerVar14 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar14 .= '

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
'key' => $__compilerVar13
)) . '"
		data-uniquekey="' . htmlspecialchars($__compilerVar13, ENT_QUOTES, 'UTF-8') . '"
		data-err-110="' . 'The uploaded file is too large.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($__compilerVar12) ? ($__compilerVar12) : ('Upload a File')) . '"
			id="ctrl_uploader" class="button OverlayTrigger DisableOnSubmit"
			data-href="' . XenForo_Template_Helper_Core::link('full:attachments/upload', '', array(
'_params' => $attachmentParams,
'key' => $__compilerVar13
)) . '"
			data-hider="#AttachmentUploader" />
		<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
		';
foreach ($attachmentParams['content_data'] AS $dataKey => $dataValue)
{
$__compilerVar14 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar14 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($__compilerVar12) ? ($__compilerVar12) : ('Upload a File')) . '</a>
	</noscript>

';
}
$__output .= $__compilerVar14;
unset($__compilerVar12, $__compilerVar13, $__compilerVar14);
$__output .= '
			<input type="button" value="' . 'Preview' . '..." class="button PreviewButton JsOnly" />
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
