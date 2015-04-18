<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'File Uploader';
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_upload');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.contentuploader.js');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('full:gallery/photos/do-upload', false, array()) . '" method="post"
	enctype="multipart/form-data"
	class="formOverlay AutoInlineUploader AttachmentUploadForm NoAutoHeader"
	data-overlayClass="attachmentUploader">
	
	<dl class="ctrlUnit">
		<dt>
			<label for="ctrl_content_upload">
				' . 'Upload a file from your computer.' . ' (<span title="' . '' . XenForo_Template_Helper_Core::numberFormat($contentDataConstraints['size'], '0') . ' bytes' . '">' . 'Max ' . XenForo_Template_Helper_Core::numberFormat($contentDataConstraints['size'], 'size') . '' . '</span>):
			</label>
		</dt>
		<dd id="ContentUploadContainer" data-placeholder="#ContentUploadPlaceHolder" data-trigger="#ctrl_content_upload">
			<span id="ContentUploadPlaceHolder"></span>
			<input type="file" name="upload" class="textCtrl" onchange="this.blur()" id="ctrl_content_upload" />
			<input type="reset" value="' . 'Close' . '" class="OverlayCloser button smallButton" />
		</dd>
	</dl>
	
	<div class="attachmentConstraints pairsRows">
		<dl>
			<dt>' . 'Accepted file types' . ':</dt> 
			<dd>
				';
$i = 0;
$count = count($contentDataConstraints['extensions']);
foreach ($contentDataConstraints['extensions'] AS $extension)
{
$i++;
$__output .= '
					' . htmlspecialchars($extension, ENT_QUOTES, 'UTF-8') . (($i < $count) ? (', ') : ('')) . '
				';
}
$__output .= '
			</dd>
		</dl>
		';
if ($contentDataConstraints['width'])
{
$__output .= '
			<dl>
				<dt>' . 'Max image width' . ':</dt> 
				<dd>' . '' . XenForo_Template_Helper_Core::numberFormat($contentDataConstraints['width'], '0') . ' pixels' . '</dd>
			</dl>
		';
}
$__output .= '
		';
if ($contentDataConstraints['height'])
{
$__output .= '
			<dl>
				<dt>' . 'Max image height' . ':</dt> 
				<dd>' . '' . XenForo_Template_Helper_Core::numberFormat($contentDataConstraints['height'], '0') . ' pixels' . '</dd>
			</dl>
		';
}
$__output .= '
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="hash" value="' . htmlspecialchars($contentDataParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="album_id" value="' . htmlspecialchars($contentDataParams['album_id'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
