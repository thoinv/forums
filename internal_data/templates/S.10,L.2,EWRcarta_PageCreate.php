<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Create New Page';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Create New Page';
$__output .= '

';
if ($input['page_type'] == ('phpfile'))
{
$__output .= '
	';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:wiki/special/administrate', false, array()), 'value' => 'Administrate Wiki');
$__output .= '
';
}
$__output .= '

';
$this->addRequiredExternal('css', 'EWRcarta');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/slugit.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/EWRcarta_ajax.js');
$__output .= '

';
if ($input['page_content'])
{
$__output .= '
	';
$this->addRequiredExternal('css', 'lightbox');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/lightbox.js');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/8wayrun/sortable.js');
$__output .= '

	<div class="sectionMain wikiPage">
		<div class="subHeading">' . htmlspecialchars($input['page_name'], ENT_QUOTES, 'UTF-8') . '</div>
		<div class="primaryContent wikiContent">' . $input['HTML'] . '</div>
		<div class="sectionFooter" style="text-align: right">' . 'Xem trước' . '</div>
	</div>
';
}
$__output .= '

<div class="sectionMain wikiEdit">
	<form action="' . XenForo_Template_Helper_Core::link('wiki/special/create-page', false, array()) . '" method="post" class="xenForm">
		<fieldset>
			<dl class="ctrlUnit">
				<dt><label for="ctrl_name">' . 'Tiêu đề' . ':</label></dt>
				<dd><input type="text" name="page_name" class="textCtrl SlugIn" id="ctrl_name" maxlength="50" value="' . htmlspecialchars($input['page_name'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_slug">' . 'Link URL' . ':</label></dt>
				<dd><input type="text" name="page_slug" class="textCtrl SlugEdit SlugOut" id="ctrl_slug" maxlength="50" value="' . htmlspecialchars($input['page_slug'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>

			';
if ($input['page_type'] == ('phpfile'))
{
$__output .= '
				<input type="hidden" name="page_type" value="phpfile" />

				<dl class="ctrlUnit">
					<dt><label for="ctrl_content">' . 'File Path' . ':</label></dt>
					<dd><input type="text" name="page_content" class="textCtrl" id="ctrl_content" value="' . htmlspecialchars($input['page_content'], ENT_QUOTES, 'UTF-8') . '" /></dd>
				</dl>

				<dl class="ctrlUnit">
					<dt></dt>
					<dd><div class="muted" style="font-size: 11px; margin: -5px 10px 0px;">' . 'The absolute path to the PHP file on server in which you want to use to build this page.<br />
Pages based on PHP files are not cached as they are more suited to dynamic content.<br />
As well, these pages are marked as protected and only editable by wiki administrators.<br />
<br />
The creators of XenCarta offer no support for wiki pages generated using PHP files,<br />
and thusly declare zero responsibility for any damage done to your website or server.' . '</div></dd>
				</dl>
			';
}
else
{
$__output .= '
				<dl class="ctrlUnit">
					<dt><label for="ctrl_type">' . 'Data Type' . ':</label></dt>
					<dd><select name="page_type" id="ctrl_type" class="textCtrl autoSize">
						<option value="bbcode" ' . (($input['page_type'] == ('bbcode')) ? ' selected="selected"' : '') . '>' . 'BB Codes' . '</option>
						';
if ($perms['admin'])
{
$__output .= '<option value="html" ' . (($input['page_type'] == ('html')) ? ' selected="selected"' : '') . '>' . 'HTML' . '</option>';
}
$__output .= '
					</select></dd>
				</dl>

				<dl class="ctrlUnit fullWidth">
					<dt></dt>
					<dd>' . $editorTemplate . '</dd>
				</dl>
			';
}
$__output .= '

			<dl class="ctrlUnit">
				<dt><label for="ctrl_parent">' . 'Parent Node' . ':</label></dt>
				<dd><select name="page_parent" id="ctrl_parent" class="textCtrl autoSize">
					<option value="0">(' . 'Không xác định' . ')</option>
					';
foreach ($fullList AS $list)
{
$__output .= '
						<option value="' . htmlspecialchars($list['page_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($input['page_parent'] == $list['page_id']) ? ' selected="selected"' : '') . '>
							&nbsp; ' . $list['page_indent'] . $list['page_name'] . '
						</option>
					';
}
$__output .= '
				</select></dd>
			</dl>
		</fieldset>

		';
$__compilerVar12 = '';
if ($captcha)
{
$__compilerVar12 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Mã xác nhận' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__output .= $__compilerVar12;
unset($__compilerVar12);
$__output .= '

		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Create New Page' . '" name="submit" accesskey="s" class="button primary" />
				';
if ($perms['attach'])
{
$__output .= '
					';
$__compilerVar13 = '';
if ($attachmentParams)
{
$__compilerVar13 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar13 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar13 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar13 .= '
	';
}
$__compilerVar13 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar13 .= '

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
$__compilerVar13 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar13 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '</a>
	</noscript>

';
}
$__output .= $__compilerVar13;
unset($__compilerVar13);
$__output .= '
				';
}
else
{
$__output .= '
					';
$this->addRequiredExternal('css', 'EWRcarta_attach');
$__output .= '
				';
}
$__output .= '
				<input type="submit" value="' . 'Xem trước' . '" name="preview" accesskey="p" class="button" />
			</dd>
		</dl>

	';
if ($attachmentParams)
{
$__output .= '
		<dl class="ctrlUnit AttachedFilesUnit">
			<dt><label for="ctrl_uploader">' . 'Các file đính kèm' . ':</label></dt>
			<dd>';
$__compilerVar14 = '';
if ($attachmentParams)
{
$__compilerVar14 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar14 .= '
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar14 .= '
	
	<div class="AttachmentEditor">
	
		';
if ($showUploadButton)
{
$__compilerVar14 .= '
			';
$__compilerVar15 = '';
if ($attachmentParams)
{
$__compilerVar15 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar15 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar15 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar15 .= '
	';
}
$__compilerVar15 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar15 .= '

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
$__compilerVar15 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar15 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '</a>
	</noscript>

';
}
$__compilerVar14 .= $__compilerVar15;
unset($__compilerVar15);
$__compilerVar14 .= '
		';
}
$__compilerVar14 .= '
		
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
$__compilerVar16 = '';
$__compilerVar16 .= '1';
$__compilerVar17 = '';
$__compilerVar18 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar18 .= '

<li id="' . (($__compilerVar16) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($__compilerVar17['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($__compilerVar17 and $__compilerVar17['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($__compilerVar17 and $__compilerVar17['thumbnailUrl'])
{
$__compilerVar18 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar17, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($__compilerVar17['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($__compilerVar17['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($__compilerVar17['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar17, array(
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
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar17, array()) . '" target="_blank">' . (($__compilerVar17) ? (htmlspecialchars($__compilerVar17['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($__compilerVar16)
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
if ($__compilerVar17['thumbnailUrl'])
{
$__compilerVar18 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar18 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $__compilerVar17, array()) . '" />
			
				';
if ($__compilerVar17['thumbnailUrl'])
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
$__compilerVar14 .= $__compilerVar18;
unset($__compilerVar16, $__compilerVar17, $__compilerVar18);
$__compilerVar14 .= '
			';
if ($attachments)
{
$__compilerVar14 .= '
				';
foreach ($attachments AS $attachment)
{
$__compilerVar14 .= '
					';
if ($attachment['temp_hash'])
{
$__compilerVar14 .= '
						';
$__compilerVar19 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar19 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar19 .= '
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
$__compilerVar19 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar19 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar19 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar19 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar19 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar19 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar19 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar19 .= '
			</div>
		';
}
$__compilerVar19 .= '

	</div>
	
</li>';
$__compilerVar14 .= $__compilerVar19;
unset($__compilerVar19);
$__compilerVar14 .= '
					';
}
$__compilerVar14 .= '
				';
}
$__compilerVar14 .= '
			';
}
$__compilerVar14 .= '
		</ol>
	
		';
if ($attachments)
{
$__compilerVar14 .= '
			';
$__compilerVar20 = '';
$__compilerVar20 .= '
					';
foreach ($attachments AS $attachment)
{
$__compilerVar20 .= '
						';
if (!$attachment['temp_hash'])
{
$__compilerVar20 .= '
							';
$__compilerVar21 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar21 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar21 .= '
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
$__compilerVar21 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar21 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar21 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar21 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar21 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar21 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar21 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar21 .= '
			</div>
		';
}
$__compilerVar21 .= '

	</div>
	
</li>';
$__compilerVar20 .= $__compilerVar21;
unset($__compilerVar21);
$__compilerVar20 .= '
						';
}
$__compilerVar20 .= '
					';
}
$__compilerVar20 .= '
				';
if (trim($__compilerVar20) !== '')
{
$__compilerVar14 .= '
			<ol class="AttachmentList Existing">
				' . $__compilerVar20 . '
			</ol>
			';
}
unset($__compilerVar20);
$__compilerVar14 .= '
		';
}
$__compilerVar14 .= '
		
		<input type="hidden" name="attachment_hash" value="' . htmlspecialchars($attachmentParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
		
		' . '
		
	</div>
	
';
}
$__output .= $__compilerVar14;
unset($__compilerVar14);
$__output .= '</dd>
		</dl>
	';
}
$__output .= '

		';
if ($perms['admin'])
{
$__output .= '
			<fieldset>
				<dl class="ctrlUnit">
					<dt>' . 'Tùy chọn' . ':</dt>
					<dd><ul>
						<li>
							<label for="ctrl_index"><input type="text" name="page_index" class="textCtrl" id="ctrl_index" maxlength="2" value="' . htmlspecialchars($input['page_index'], ENT_QUOTES, 'UTF-8') . '" style="width: 18px;" /> ' . 'Wiki Index Rating' . '</label>
							<p class="hint">' . 'Use "0" to leave a page off the index.' . '</p>
						</li>

						<li>
							<label for="ctrl_sidebar"><input type="checkbox" name="page_sidebar" value="1" id="ctrl_sidebar" ' . (($input['page_sidebar']) ? ' checked="checked"' : '') . ' /> ' . 'Show Page Sidebar Block' . '</label>
						</li>
						<li>
							<label for="ctrl_sublist"><input type="checkbox" name="page_sublist" value="1" id="ctrl_sublist" ' . (($input['page_sublist']) ? ' checked="checked"' : '') . ' /> ' . 'Show Page Children List' . '</label>
						</li>
						<li>
							<label for="ctrl_protect"><input type="checkbox" name="page_protect" value="1" id="ctrl_protect" ' . (($input['page_protect']) ? ' checked="checked"' : '') . ' /> ' . 'Mark Page as Protected' . '</label>
							<p class="hint">' . 'Page can only be edited by an administrator.' . '</p>
						</li>
					</ul></dd>
				</dl>
			</fieldset>

			<h3 class="textHeading">' . 'Permission Masks' . '</h3>
			
			<dl class="ctrlUnit">
				<dt><label for="ctrl_user">' . 'Administrators' . ':</label></dt>
				<dd><input type="search" name="administrators" placeholder="' . 'Tên' . '..." value="' . htmlspecialchars($input['administrators'], ENT_QUOTES, 'UTF-8') . '" results="0" class="textCtrl AutoComplete" />
					<p class="hint">' . 'Selected users will be able to administrate the editor permission masks to this page.' . '</p></dd>
			</dl>
			
			<fieldset>
				<dl class="ctrlUnit">
					<dt><label for="ctrl_user">' . 'Editors' . ':</label></dt>
					<dd><input type="search" name="usernames" placeholder="' . 'Tên' . '..." value="' . htmlspecialchars($input['usernames'], ENT_QUOTES, 'UTF-8') . '" results="0" class="textCtrl AutoComplete" /></dd>
				</dl>

				<dl class="ctrlUnit">
					<dt>' . 'User Groups' . ':</dt>
					<dd>
						<ul class="userGroups">
							';
foreach ($groups AS $group)
{
$__output .= '
							<li>
								<label for="ctrl_group[' . htmlspecialchars($group['value'], ENT_QUOTES, 'UTF-8') . ']">
									<input type="checkbox" name="page_groups[' . htmlspecialchars($group['value'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($group['value'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_group[' . htmlspecialchars($group['value'], ENT_QUOTES, 'UTF-8') . ']" ' . (($group['selected']) ? ('checked') : ('')) . ' />
									';
if ($group['selected'])
{
$__output .= '<b>' . htmlspecialchars($group['label'], ENT_QUOTES, 'UTF-8') . '</b>';
}
else
{
$__output .= htmlspecialchars($group['label'], ENT_QUOTES, 'UTF-8');
}
$__output .= '
								</label>
							</li>
							';
}
$__output .= '
						</ul>
						<p class="hint">' . 'Selected users/usergroups will be able to edit this page, regardless of their usergroup\'s default editing permissions. They will also be able to edit this page even if it is marked as "protected".' . '</p>
					</dd>
				</dl>
			</fieldset>
		';
}
$__output .= '

		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Create New Page' . '" name="submit" accesskey="s" class="button primary" />
				<input type="submit" value="' . 'Xem trước' . '" name="preview" accesskey="p" class="button" />
			</dd>
		</dl>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>

';
$__compilerVar22 = '';
$__compilerVar22 .= '<div class="cartaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/98/">XenCarta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar22;
unset($__compilerVar22);
