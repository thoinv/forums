<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($contentDataConstraints)
{
$__output .= '

	';
$this->addRequiredExternal('css', 'sonnb_xengallery_upload');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.contentuploader.js');
$__output .= '
	';
if ($xenOptions['swfUpload'])
{
$__output .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__output .= '
	';
}
$__output .= '	

	<span id="PhotoUploader" class="buttonProxy ContentUploader"
		style="display: none"
		data-placeholder="#PhotoUploadPlaceHolder"
		data-trigger="#ctrl_photo_uploader"
		data-postname="upload"
		data-maxfilesize="' . htmlspecialchars($contentDataConstraints['size'], ENT_QUOTES, 'UTF-8') . '"
		data-maxuploads="' . htmlspecialchars($contentDataConstraints['count'], ENT_QUOTES, 'UTF-8') . '"
		data-extensions="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $contentDataConstraints['extensions'],
'1' => ','
)) . '"
		data-action="' . XenForo_Template_Helper_Core::link('full:gallery/photos/do-upload.json', '', array(
'_params' => $contentDataParams
)) . '"
		data-err-110="' . 'File đã tải lên lớn hơn so với quy định.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-maxfileupload="100"
		data-error-maxfileupload="' . 'You only can upload ' . '100' . ' contents at a time.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="PhotoUploadPlaceHolder"></span>		
			
		<input type="button" value="' . 'Upload Photos' . '"
			id="ctrl_photo_uploader" class="button OverlayTrigger DisableOnSubmit"
			data-href="' . XenForo_Template_Helper_Core::link('full:gallery/photos/upload', '', array(
'_params' => $contentDataParams
)) . '"
			data-hider="#PhotoUploader" />
		<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/upload', '', array(
'_params' => $contentDataParams
)) . '" class="button" target="_blank">' . 'Upload Photos' . '</a>
	</noscript>

';
}
