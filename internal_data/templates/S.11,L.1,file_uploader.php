<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__output .= '
';
$this->addRequiredExternal('css', 'attachment_editor');
$__output .= '
';
$this->addRequiredExternal('js', 'js/xenresource/file_uploader.js');
$__output .= '
';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__output .= '
	';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__output .= '
';
}
$__output .= '
';
$this->addRequiredExternal('css', 'file_uploader');
$__output .= '

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
'key' => $attachmentButtonKey
)) . '"
	data-uniquekey="' . htmlspecialchars($attachmentButtonKey, ENT_QUOTES, 'UTF-8') . '"
	data-err-110="' . 'The uploaded file is too large.' . '"
	data-err-120="' . 'The uploaded file is empty.' . '"
	data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
	data-err-unknown="' . 'There was a problem uploading your file.' . '">

	<span id="SWFUploadPlaceHolder_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '"></span>

	<input type="button" value="' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '"
		id="ctrl_uploader_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '" class="button OverlayTrigger DisableOnSubmit"
		data-href="' . XenForo_Template_Helper_Core::link('full:attachments/upload', '', array(
'_params' => $fileParams[$uploaderId],
'key' => $attachmentButtonKey
)) . '"
		data-hider="#FileUploader_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '" />
	<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
	';
foreach ($fileParams[$uploaderId]['content_data'] AS $dataKey => $dataValue)
{
$__output .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
	';
}
$__output .= '
</span>

<noscript>
	<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $fileParams[$uploaderId]
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '</a>
</noscript>';
