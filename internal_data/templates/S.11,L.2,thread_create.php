<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Đăng chủ đề';
$__output .= '
';
if ($loadJavaScript)
{
$__output .= '
<script src="js/xenforo/similarthreads.js"></script>
';
}
$__output .= '

';
if ($forum['description'] AND XenForo_Template_Helper_Core::styleProperty('threadListDescriptions'))
{
$__output .= '
	';
$__extraData['pageDescription'] = array(
'class' => 'baseHtml'
);
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= $forum['description'];
$__output .= '
';
}
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__output .= '

';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__output .= '

';
$__extraData['head']['robots'] = '';
$__extraData['head']['robots'] .= '
	<meta name="robots" content="noindex" />';
$__output .= '
';
$__extraData['bodyClasses'] = '';
$__extraData['bodyClasses'] .= XenForo_Template_Helper_Core::callHelper('nodeClasses', array(
'0' => $nodeBreadCrumbs,
'1' => $forum
));
$__output .= '
';
$__extraData['searchBar']['forum'] = '';
$__compilerVar24 = '';
$__compilerVar24 .= '<label title="' . 'Search only ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="nodes[]" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_nodes" class="Disabler AutoChecker" checked="checked"
	data-uncheck="#search_bar_thread" /> ' . 'Search this forum only' . '</label>
	<ul id="search_bar_nodes_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			data-uncheck="#search_bar_thread" /> ' . 'Hiển thị kết quả dạng Chủ đề' . '</label></li>
	</ul>';
$__extraData['searchBar']['forum'] .= $__compilerVar24;
unset($__compilerVar24);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('forums/add-thread', $forum, array()) . '" method="post" id="ThreadCreate"
	class="xenForm Preview AutoValidator"
	data-previewUrl="' . XenForo_Template_Helper_Core::link('forums/create-thread/preview', $forum, array()) . '"
	data-redirect="on" 
    id="ThreadCreate" autocomplete="off"
>
	';
$__compilerVar25 = '';
$__compilerVar25 .= '

	';
if ($visitor['user_id'] == 0)
{
$__compilerVar25 .= '
		<dl class="ctrlUnit">
			<dt><label for="ctrl_guestUsername">' . 'Tên' . ':</label></dt>
			<dd><input type="text" name="_guestUsername" value="' . htmlspecialchars($visitor['username'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" /></dd>
		</dl>
	
		<!-- slot: after_guest -->
	';
}
$__compilerVar25 .= '

	';
$__compilerVar26 = '';
if ($captcha)
{
$__compilerVar26 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Mã xác nhận' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__compilerVar25 .= $__compilerVar26;
unset($__compilerVar26);
$__compilerVar25 .= '

	<fieldset>
		';
$__compilerVar27 = '';
$__compilerVar27 .= htmlspecialchars($prefixId, ENT_QUOTES, 'UTF-8');
$__compilerVar28 = '';
$__compilerVar28 .= 'thread_create';
$__compilerVar29 = '';
if ($prefixes OR $forcePrefixes)
{
$__compilerVar29 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/title_prefix.js');
$__compilerVar29 .= '
	';
$this->addRequiredExternal('css', 'title_prefix_edit');
$__compilerVar29 .= '
	
	<dl class="ctrlUnit" id="PrefixContainer_' . htmlspecialchars($__compilerVar28, ENT_QUOTES, 'UTF-8') . '">
		<dt><label for="ctrl_prefix_id_' . htmlspecialchars($__compilerVar28, ENT_QUOTES, 'UTF-8') . '">' . 'Tiền tố' . ':</label></dt>
		<dd>
			<select name="prefix_id" id="ctrl_prefix_id_' . htmlspecialchars($__compilerVar28, ENT_QUOTES, 'UTF-8') . '" class="textCtrl TitlePrefix"
				data-container="#PrefixContainer_' . htmlspecialchars($__compilerVar28, ENT_QUOTES, 'UTF-8') . '"
				data-textbox="#ctrl_title_' . htmlspecialchars($__compilerVar28, ENT_QUOTES, 'UTF-8') . '"
				' . (($nodeControl) ? ('data-nodecontrol="' . htmlspecialchars($nodeControl, ENT_QUOTES, 'UTF-8') . '" data-prefixurl="' . XenForo_Template_Helper_Core::link('forums/-/prefixes', false, array()) . '"') : ('')) . '>
				';
$__compilerVar30 = '';
$__compilerVar30 .= '<option value="0" data-css="prefix noPrefix" ' . (($__compilerVar27 == 0) ? ' selected="selected"' : '') . '>(' . 'Không tiền tố' . ')</option>
';
foreach ($prefixes AS $prefixGroup)
{
$__compilerVar30 .= '
	';
if ($prefixGroup['title'])
{
$__compilerVar30 .= '
		<optgroup label="' . htmlspecialchars($prefixGroup['title'], ENT_QUOTES, 'UTF-8') . '">
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar30 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar27 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar30 .= '
		</optgroup>
	';
}
else
{
$__compilerVar30 .= '
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar30 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar27 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar30 .= '
	';
}
$__compilerVar30 .= '
';
}
$__compilerVar29 .= $__compilerVar30;
unset($__compilerVar30);
$__compilerVar29 .= '
			</select>
		</dd>
	</dl>
	
';
}
$__compilerVar25 .= $__compilerVar29;
unset($__compilerVar27, $__compilerVar28, $__compilerVar29);
$__compilerVar25 .= '
	
		<dl class="ctrlUnit fullWidth surplusLabel">
			<dt><label for="ctrl_title_thread_create">' . 'Tiêu đề' . ':</label></dt>
			<dd><input type="text" name="title" class="textCtrl titleCtrl" id="ctrl_title_thread_create" maxlength="100" autofocus="true"
				placeholder="' . 'Tên chủ đề' . '..." value="' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '"
				data-liveTitleTemplate="' . 'Đăng chủ đề' . ': <em>%s</em>" /></dd>
		</dl>

		';
$__compilerVar31 = '';
$__compilerVar25 .= $this->callTemplateHook('thread_create_fields_main', $__compilerVar31, array(
'forum' => $forum
));
unset($__compilerVar31);
$__compilerVar25 .= '

		<dl id="similarthreadsId-result"></dl><dl class="ctrlUnit fullWidth">
			<dt></dt>
			<dd>' . $editorTemplate . '</dd>
		</dl>
	</fieldset>
	
	<!-- slot: after_editor -->

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Đăng chủ đề' . '" accesskey="s" class="button primary" />
			';
$__compilerVar32 = '';
if ($attachmentParams)
{
$__compilerVar32 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar32 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar32 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar32 .= '
	';
}
$__compilerVar32 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar32 .= '

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
$__compilerVar32 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar32 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '</a>
	</noscript>

';
}
$__compilerVar25 .= $__compilerVar32;
unset($__compilerVar32);
$__compilerVar25 .= '
			<input type="button" value="' . 'Xem trước' . '..." class="button PreviewButton JsOnly" />
			
			';
if ($xenOptions['multiQuote'])
{
$__compilerVar25 .= '<input type="button" class="button JsOnly MultiQuoteWatcher"
				value="' . 'Insert Quotes' . '..."
				style="display: none"
				data-href="' . XenForo_Template_Helper_Core::link('threads/multi-quote', array(
'thread_id' => '1'
), array(
'formId' => '#ThreadCreate'
)) . '"
				data-cacheOverlay="false" />';
}
$__compilerVar25 .= '
		</dd>
	</dl>

	';
if ($attachmentParams)
{
$__compilerVar25 .= '
		<dl class="ctrlUnit AttachedFilesUnit">
			<dt><label for="ctrl_uploader">' . 'Các file đính kèm' . ':</label></dt>
			<dd>';
$__compilerVar33 = $attachmentParams['attachments'];
$__compilerVar34 = '';
if ($attachmentParams)
{
$__compilerVar34 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar34 .= '
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar34 .= '
	
	<div class="AttachmentEditor">
	
		';
if ($showUploadButton)
{
$__compilerVar34 .= '
			';
$__compilerVar35 = '';
if ($attachmentParams)
{
$__compilerVar35 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar35 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar35 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar35 .= '
	';
}
$__compilerVar35 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar35 .= '

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
$__compilerVar35 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar35 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '</a>
	</noscript>

';
}
$__compilerVar34 .= $__compilerVar35;
unset($__compilerVar35);
$__compilerVar34 .= '
		';
}
$__compilerVar34 .= '
		
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
$__compilerVar36 = '';
$__compilerVar36 .= '1';
$__compilerVar37 = '';
$__compilerVar38 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar38 .= '

<li id="' . (($__compilerVar36) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($__compilerVar37['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($__compilerVar37 and $__compilerVar37['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($__compilerVar37 and $__compilerVar37['thumbnailUrl'])
{
$__compilerVar38 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar37, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($__compilerVar37['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($__compilerVar37['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($__compilerVar37['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar37, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar38 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar38 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar37, array()) . '" target="_blank">' . (($__compilerVar37) ? (htmlspecialchars($__compilerVar37['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($__compilerVar36)
{
$__compilerVar38 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar38 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($__compilerVar37['thumbnailUrl'])
{
$__compilerVar38 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar38 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $__compilerVar37, array()) . '" />
			
				';
if ($__compilerVar37['thumbnailUrl'])
{
$__compilerVar38 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar38 .= '
			</div>
		';
}
$__compilerVar38 .= '

	</div>
	
</li>';
$__compilerVar34 .= $__compilerVar38;
unset($__compilerVar36, $__compilerVar37, $__compilerVar38);
$__compilerVar34 .= '
			';
if ($__compilerVar33)
{
$__compilerVar34 .= '
				';
foreach ($__compilerVar33 AS $attachment)
{
$__compilerVar34 .= '
					';
if ($attachment['temp_hash'])
{
$__compilerVar34 .= '
						';
$__compilerVar39 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar39 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar39 .= '
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
$__compilerVar39 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar39 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar39 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar39 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar39 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar39 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar39 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar39 .= '
			</div>
		';
}
$__compilerVar39 .= '

	</div>
	
</li>';
$__compilerVar34 .= $__compilerVar39;
unset($__compilerVar39);
$__compilerVar34 .= '
					';
}
$__compilerVar34 .= '
				';
}
$__compilerVar34 .= '
			';
}
$__compilerVar34 .= '
		</ol>
	
		';
if ($__compilerVar33)
{
$__compilerVar34 .= '
			';
$__compilerVar40 = '';
$__compilerVar40 .= '
					';
foreach ($__compilerVar33 AS $attachment)
{
$__compilerVar40 .= '
						';
if (!$attachment['temp_hash'])
{
$__compilerVar40 .= '
							';
$__compilerVar41 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar41 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar41 .= '
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
$__compilerVar41 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar41 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar41 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar41 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar41 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar41 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar41 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar41 .= '
			</div>
		';
}
$__compilerVar41 .= '

	</div>
	
</li>';
$__compilerVar40 .= $__compilerVar41;
unset($__compilerVar41);
$__compilerVar40 .= '
						';
}
$__compilerVar40 .= '
					';
}
$__compilerVar40 .= '
				';
if (trim($__compilerVar40) !== '')
{
$__compilerVar34 .= '
			<ol class="AttachmentList Existing">
				' . $__compilerVar40 . '
			</ol>
			';
}
unset($__compilerVar40);
$__compilerVar34 .= '
		';
}
$__compilerVar34 .= '
		
		<input type="hidden" name="attachment_hash" value="' . htmlspecialchars($attachmentParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
		
		' . '
		
	</div>
	
';
}
$__compilerVar25 .= $__compilerVar34;
unset($__compilerVar33, $__compilerVar34);
$__compilerVar25 .= '</dd>
		</dl>
		
		<!-- slot: after_attachment -->
	';
}
$__compilerVar25 .= '
	
	';
if ($visitor['user_id'])
{
$__compilerVar25 .= '
		<fieldset>
			<dl class="ctrlUnit">
				<dt>' . 'Tùy chọn' . ':</dt>
				<dd><ul>
					<li>';
$__compilerVar42 = '';
$__compilerVar42 .= '<label for="ctrl_watch_thread"><input type="checkbox" name="watch_thread" value="1" id="ctrl_watch_thread" class="Disabler" ' . (($watchState) ? ' checked="checked"' : '') . ' /> ' . 'Theo dõi chủ đề này ' . '...</label>
	<ul id="ctrl_watch_thread_Disabler">
		<li><label for="ctrl_watch_thread_email"><input type="checkbox" name="watch_thread_email" value="1" id="ctrl_watch_thread_email" ' . (($watchState == ('watch_email')) ? ' checked="checked"' : '') . ' /> ' . 'và nhận email thông báo' . '</label></li>
	</ul>
	<input type="hidden" name="watch_thread_state" value="1" />';
$__compilerVar25 .= $__compilerVar42;
unset($__compilerVar42);
$__compilerVar25 .= '</li>
				</ul></dd>
			</dl>
	
			';
$__compilerVar43 = '';
$__compilerVar44 = '';
$__compilerVar44 .= '
				';
if ($canLockUnlockThread)
{
$__compilerVar44 .= '
					<li>
						<label for="ctrl_discussion_open"><input type="checkbox" name="discussion_open" value="1" id="ctrl_discussion_open" ' . (($thread['discussion_open']) ? ' checked="checked"' : '') . ' /> ' . 'Mở' . '</label>
						<input type="hidden" name="_set[discussion_open]" value="1" />
						<p class="hint">' . 'Mọi người có thể trả lời chủ đề này' . '</p>
					</li>
				';
}
$__compilerVar44 .= '
				';
if ($canStickUnstickThread)
{
$__compilerVar44 .= '
					<li>
						<label for="ctrl_sticky"><input type="checkbox" name="sticky" value="1" id="ctrl_sticky" ' . (($thread['sticky']) ? ' checked="checked"' : '') . ' /> ' . 'Dán lên cao' . '</label>
						<input type="hidden" name="_set[sticky]" value="1" />
						<p class="hint">' . 'Chủ đề được dán lên cao hiển thị trên đầu của danh sách trang đầu tiên trong diễn đàn' . '</p>
					</li>
				';
}
$__compilerVar44 .= '
			
';
if ($canLockUnlockThread)
{
$__compilerVar44 .= '
	<li><label><input type="checkbox" name="block_adsense" value="1" class="SubmitOnChange" ' . (($thread['block_adsense']) ? ' checked="checked"' : '') . ' />
	' . 'Suppress AdSense' . '</label>
	<input type="hidden" name="_set[block_adsense]" value="1" />
	<p class="hint">' . 'If you select this option, AdSense will not be displayed on this thread.' . '</p></li>';
}
$__compilerVar44 .= '
';
if (trim($__compilerVar44) !== '')
{
$__compilerVar43 .= '
	<dl class="ctrlUnit ' . (($hideLabel) ? ('surplusLabel') : ('')) . '">
		<dt><label>' . 'Đặt trang thái chủ đề' . ':</label></dt>
		<dd>
			<ul>
			' . $__compilerVar44 . '
			</ul>
		</dd>
	</dl>
';
}
unset($__compilerVar44);
$__compilerVar25 .= $__compilerVar43;
unset($__compilerVar43);
$__compilerVar25 .= '
		</fieldset>
		
		<!-- slot: after_options -->
	';
}
$__compilerVar25 .= '

	';
$__compilerVar45 = '';
$__compilerVar25 .= $this->callTemplateHook('thread_create_fields_extra', $__compilerVar45, array(
'forum' => $forum
));
unset($__compilerVar45);
$__compilerVar25 .= '
	
	';
if ($canPostPoll)
{
$__compilerVar25 .= '
		<h3 class="textHeading">' . 'Đăng bình chọn' . '</h3>
		';
$__compilerVar46 = '';
$__extraData['head']['pollCss'] = '';
$__extraData['head']['pollCss'] .= '<style>.hasJs .PollNonJsInput { display: none }</style>';
$__compilerVar46 .= '

<dl class="ctrlUnit">
	<dt><label for="ctrl_poll_question">' . 'Câu hỏi' . ':</label></dt>
	<dd><input type="text" name="poll[question]" class="textCtrl" id="ctrl_poll_question" maxlength="100" value="' . htmlspecialchars($poll['question'], ENT_QUOTES, 'UTF-8') . '" /></dd>
</dl>
<dl class="ctrlUnit">
	<dt>' . 'Có thể trả lời' . ':</dt>
	<dd>
		<ul class="PollResponseContainer">
			';
if ($poll)
{
$__compilerVar46 .= '
				';
foreach ($poll['responses'] AS $response)
{
$__compilerVar46 .= '
					<li><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Lựa chọn' . '..." maxlength="100" value="' . htmlspecialchars($response, ENT_QUOTES, 'UTF-8') . '" /></li>
				';
}
$__compilerVar46 .= '
				';
foreach ($poll['extraResponses'] AS $null)
{
$__compilerVar46 .= '
					<li><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Lựa chọn' . '..." maxlength="100" /></li>
				';
}
$__compilerVar46 .= '
			';
}
$__compilerVar46 .= '
			';
foreach ($pollExtraArray AS $null)
{
$__compilerVar46 .= '
				<li class="PollNonJsInput"><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Lựa chọn' . '..." maxlength="100" /></li>
			';
}
$__compilerVar46 .= '
			';
if (!$poll)
{
$__compilerVar46 .= '
				<li><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Lựa chọn' . '..." maxlength="100" /></li>
				<li><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Lựa chọn' . '..." maxlength="100" /></li>
			';
}
$__compilerVar46 .= '
		</ul>
		<input type="button" value="' . 'Thêm lựa chọn trả lời' . '" class="button smallButton FieldAdder JsOnly" data-source="ul.PollResponseContainer li" data-maxfields="' . htmlspecialchars($xenOptions['pollMaximumResponses'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>

<!-- slot: after_poll_responses -->
<dl class="ctrlUnit">
	<dt>' . 'Maximum Selectable Responses' . ':</dt>
	<dd>
		<ul>
			<li><label><input type="radio" name="poll[max_votes_type]" value="single" checked="checked" /> ' . 'Single Choice' . '</label></li>
			<li><label><input type="radio" name="poll[max_votes_type]" value="unlimited" /> ' . 'Unlimited' . '</label></li>
			<li><input type="radio" name="poll[max_votes_type]" value="number" class="Disabler" id="ctrl_max_votes_type_value" /> 
				<span id="ctrl_max_votes_type_value_Disabler">
					<input type="number" class="textCtrl number SpinBox" name="poll[max_votes_value]" value="2" min="1" step="1" />
				</span>
			</li>
		</ul>
		<p class="explain">' . 'This is the maximum number of responses a voter may select when voting.' . '</p>
	</dd>
</dl>

<dl class="ctrlUnit">
	<dt>' . 'Tùy chọn' . ':</dt>
	<dd>
		<ul>
			<li><label><input type="checkbox" name="poll[change_vote]" value="1" checked="checked" /> ' . 'Allow voters to change their votes' . '</label></li>

			<li><label><input type="checkbox" name="poll[public_votes]" value="1" /> ' . 'Hiển thị bình chọn công cộng' . '</label></li>

			<li><label><input type="checkbox" name="poll[view_results_unvoted]" value="1" checked="checked" /> ' . 'Allow the results to be viewed without voting' . '</label></li>

			<li><label><input type="checkbox" name="poll[close]" value="1" class="Disabler" id="ctrl_poll_close" /> ' . 'Đóng bình chọn này sau' . ':</label>
				<ul id="ctrl_poll_close_Disabler">
					<li>
						<input type="text" size="5" name="poll[close_length]" value="7" class="textCtrl autoSize" />
						<select name="poll[close_units]" class="textCtrl autoSize">
							<option value="hours">' . 'Giờ' . '</option>
							<option value="days" selected="selected">' . 'Ngày' . '</option>
							<option value="weeks">' . 'Tuần' . '</option>
							<option value="months">' . 'Tháng' . '</option>
						</select>
					</li>
				</ul>
			</li>
		</ul>
	</dd>
</dl>';
$__compilerVar25 .= $__compilerVar46;
unset($__compilerVar46);
$__compilerVar25 .= '
	';
}
$__compilerVar25 .= '
	
	';
$__output .= $this->callTemplateHook('thread_create', $__compilerVar25, array());
unset($__compilerVar25);
$__output .= '

	';
if ($visitor['user_id'] OR $canPostPoll)
{
$__output .= '
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Đăng chủ đề' . '" class="button primary" />
				<input type="button" value="' . 'Xem trước' . '..." class="button PreviewButton JsOnly" />
			</dd>
		</dl>
	';
}
$__output .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

';
