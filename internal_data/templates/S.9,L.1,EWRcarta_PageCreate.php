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
		<div class="sectionFooter" style="text-align: right">' . 'Preview' . '</div>
	</div>
';
}
$__output .= '

<div class="sectionMain wikiEdit">
	<form action="' . XenForo_Template_Helper_Core::link('wiki/special/create-page', false, array()) . '" method="post" class="xenForm">
		<fieldset>
			<dl class="ctrlUnit">
				<dt><label for="ctrl_name">' . 'Title' . ':</label></dt>
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
					<option value="0">(' . 'unspecified' . ')</option>
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
$__compilerVar1 = '';
if ($captcha)
{
$__compilerVar1 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Verification' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__output .= $__compilerVar1;
unset($__compilerVar1);
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
$__compilerVar2 = '';
if ($attachmentParams)
{
$__compilerVar2 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar2 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar2 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar2 .= '
	';
}
$__compilerVar2 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar2 .= '

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
$__compilerVar2 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar2 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '</a>
	</noscript>

';
}
$__output .= $__compilerVar2;
unset($__compilerVar2);
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
				<input type="submit" value="' . 'Preview' . '" name="preview" accesskey="p" class="button" />
			</dd>
		</dl>

	';
if ($attachmentParams)
{
$__output .= '
		<dl class="ctrlUnit AttachedFilesUnit">
			<dt><label for="ctrl_uploader">' . 'Attached Files' . ':</label></dt>
			<dd>';
$__compilerVar3 = '';
if ($attachmentParams)
{
$__compilerVar3 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar3 .= '
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar3 .= '
	
	<div class="AttachmentEditor">
	
		';
if ($showUploadButton)
{
$__compilerVar3 .= '
			';
$__compilerVar4 = '';
if ($attachmentParams)
{
$__compilerVar4 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar4 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar4 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar4 .= '
	';
}
$__compilerVar4 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar4 .= '

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
$__compilerVar4 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar4 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '</a>
	</noscript>

';
}
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
$__compilerVar3 .= '
		';
}
$__compilerVar3 .= '
		
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
$__compilerVar5 = '';
$__compilerVar5 .= '1';
$__compilerVar6 = '';
$__compilerVar7 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar7 .= '

<li id="' . (($__compilerVar5) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($__compilerVar6['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($__compilerVar6 and $__compilerVar6['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($__compilerVar6 and $__compilerVar6['thumbnailUrl'])
{
$__compilerVar7 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar6, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($__compilerVar6['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($__compilerVar6['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($__compilerVar6['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar6, array(
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
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar6, array()) . '" target="_blank">' . (($__compilerVar6) ? (htmlspecialchars($__compilerVar6['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($__compilerVar5)
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
if ($__compilerVar6['thumbnailUrl'])
{
$__compilerVar7 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar7 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $__compilerVar6, array()) . '" />
			
				';
if ($__compilerVar6['thumbnailUrl'])
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
$__compilerVar3 .= $__compilerVar7;
unset($__compilerVar5, $__compilerVar6, $__compilerVar7);
$__compilerVar3 .= '
			';
if ($attachments)
{
$__compilerVar3 .= '
				';
foreach ($attachments AS $attachment)
{
$__compilerVar3 .= '
					';
if ($attachment['temp_hash'])
{
$__compilerVar3 .= '
						';
$__compilerVar8 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar8 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar8 .= '
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
$__compilerVar8 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar8 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
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
if ($attachment['thumbnailUrl'])
{
$__compilerVar8 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar8 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
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
$__compilerVar3 .= $__compilerVar8;
unset($__compilerVar8);
$__compilerVar3 .= '
					';
}
$__compilerVar3 .= '
				';
}
$__compilerVar3 .= '
			';
}
$__compilerVar3 .= '
		</ol>
	
		';
if ($attachments)
{
$__compilerVar3 .= '
			';
$__compilerVar9 = '';
$__compilerVar9 .= '
					';
foreach ($attachments AS $attachment)
{
$__compilerVar9 .= '
						';
if (!$attachment['temp_hash'])
{
$__compilerVar9 .= '
							';
$__compilerVar10 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar10 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar10 .= '
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
$__compilerVar10 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar10 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar10 .= '
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar10 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar10 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar10 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar10 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar10 .= '
			</div>
		';
}
$__compilerVar10 .= '

	</div>
	
</li>';
$__compilerVar9 .= $__compilerVar10;
unset($__compilerVar10);
$__compilerVar9 .= '
						';
}
$__compilerVar9 .= '
					';
}
$__compilerVar9 .= '
				';
if (trim($__compilerVar9) !== '')
{
$__compilerVar3 .= '
			<ol class="AttachmentList Existing">
				' . $__compilerVar9 . '
			</ol>
			';
}
unset($__compilerVar9);
$__compilerVar3 .= '
		';
}
$__compilerVar3 .= '
		
		<input type="hidden" name="attachment_hash" value="' . htmlspecialchars($attachmentParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
		
		' . '
		
	</div>
	
';
}
$__output .= $__compilerVar3;
unset($__compilerVar3);
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
					<dt>' . 'Options' . ':</dt>
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
				<dd><input type="search" name="administrators" placeholder="' . 'Name' . '..." value="' . htmlspecialchars($input['administrators'], ENT_QUOTES, 'UTF-8') . '" results="0" class="textCtrl AutoComplete" />
					<p class="hint">' . 'Selected users will be able to administrate the editor permission masks to this page.' . '</p></dd>
			</dl>
			
			<fieldset>
				<dl class="ctrlUnit">
					<dt><label for="ctrl_user">' . 'Editors' . ':</label></dt>
					<dd><input type="search" name="usernames" placeholder="' . 'Name' . '..." value="' . htmlspecialchars($input['usernames'], ENT_QUOTES, 'UTF-8') . '" results="0" class="textCtrl AutoComplete" /></dd>
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
				<input type="submit" value="' . 'Preview' . '" name="preview" accesskey="p" class="button" />
			</dd>
		</dl>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>

';
$__compilerVar11 = '';
$__compilerVar11 .= '<div class="cartaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/98/">XenCarta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar11;
unset($__compilerVar11);
