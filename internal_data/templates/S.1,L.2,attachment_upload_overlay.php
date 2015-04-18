<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'File Uploader';
$__output .= '

';
$this->addRequiredExternal('css', 'attachment_editor');
$__output .= '
';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('full:attachments/do-upload', false, array()) . '" method="post"
	enctype="multipart/form-data"
	class="formOverlay AutoInlineUploader AttachmentUploadForm NoAutoHeader"
	data-overlayClass="attachmentUploader">
	
	<dl class="ctrlUnit">
		<dt><label for="ctrl_upload">' . 'Tải lên file đính kèm' . ' (<span title="' . '' . XenForo_Template_Helper_Core::numberFormat($attachmentConstraints['size'], '0') . ' bytes' . '">' . 'Max ' . XenForo_Template_Helper_Core::numberFormat($attachmentConstraints['size'], 'size') . '' . '</span>):</label></dt>
		<dd id="SWFUploadContainer" data-placeholder="#SWFUploadPlaceHolder" data-trigger="#ctrl_upload">
			<span id="SWFUploadPlaceHolder"></span>
			<input type="file" name="upload" class="textCtrl" onchange="this.blur()" id="ctrl_upload" />
			<input type="reset" value="' . 'Đóng' . '" class="OverlayCloser button smallButton" />
		</dd>
	</dl>
	
	<div class="attachmentConstraints pairsRows">
		<dl><dt>' . 'Loại file được chấp nhận' . ':</dt> <dd>';
$i = 0;
$count = count($attachmentConstraints['extensions']);
foreach ($attachmentConstraints['extensions'] AS $extension)
{
$i++;
$__output .= htmlspecialchars($extension, ENT_QUOTES, 'UTF-8') . (($i < $count) ? (', ') : (''));
}
$__output .= '</dd></dl>
		';
if ($attachmentConstraints['width'])
{
$__output .= '
			<dl><dt>' . 'Max image width' . ':</dt> <dd>' . '' . XenForo_Template_Helper_Core::numberFormat($attachmentConstraints['width'], '0') . ' pixels' . '</dd></dl>
		';
}
$__output .= '
		';
if ($attachmentConstraints['height'])
{
$__output .= '
			<dl><dt>' . 'Max image height' . ':</dt> <dd>' . '' . XenForo_Template_Helper_Core::numberFormat($attachmentConstraints['height'], '0') . ' pixels' . '</dd></dl>
		';
}
$__output .= '
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="hash" value="' . htmlspecialchars($attachmentParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="content_type" value="' . htmlspecialchars($attachmentParams['content_type'], ENT_QUOTES, 'UTF-8') . '" />			
	<input type="hidden" name="key" value="' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . '" />
	';
foreach ($attachmentParams['content_data'] AS $dataKey => $dataValue)
{
$__output .= '<input type="hidden" name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__output .= '
	
</form>';
