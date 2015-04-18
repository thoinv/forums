<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Create Thread';
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
$__compilerVar1 = '';
$__compilerVar1 .= '<label title="' . 'Search only ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="nodes[]" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_nodes" class="Disabler AutoChecker" checked="checked"
	data-uncheck="#search_bar_thread" /> ' . 'Search this forum only' . '</label>
	<ul id="search_bar_nodes_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			data-uncheck="#search_bar_thread" /> ' . 'Display results as threads' . '</label></li>
	</ul>';
$__extraData['searchBar']['forum'] .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('forums/add-thread', $forum, array()) . '" method="post" id="ThreadCreate"
	class="xenForm Preview AutoValidator"
	data-previewUrl="' . XenForo_Template_Helper_Core::link('forums/create-thread/preview', $forum, array()) . '"
	data-redirect="on" 
    id="ThreadCreate" autocomplete="off"
>
	';
$__compilerVar2 = '';
$__compilerVar2 .= '

	';
if ($visitor['user_id'] == 0)
{
$__compilerVar2 .= '
		<dl class="ctrlUnit">
			<dt><label for="ctrl_guestUsername">' . 'Name' . ':</label></dt>
			<dd><input type="text" name="_guestUsername" value="' . htmlspecialchars($visitor['username'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" /></dd>
		</dl>
	
		<!-- slot: after_guest -->
	';
}
$__compilerVar2 .= '

	';
$__compilerVar3 = '';
if ($captcha)
{
$__compilerVar3 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Verification' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__compilerVar2 .= $__compilerVar3;
unset($__compilerVar3);
$__compilerVar2 .= '

	<fieldset>
		';
$__compilerVar4 = '';
$__compilerVar4 .= htmlspecialchars($prefixId, ENT_QUOTES, 'UTF-8');
$__compilerVar5 = '';
$__compilerVar5 .= 'thread_create';
$__compilerVar6 = '';
if ($prefixes OR $forcePrefixes)
{
$__compilerVar6 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/title_prefix.js');
$__compilerVar6 .= '
	';
$this->addRequiredExternal('css', 'title_prefix_edit');
$__compilerVar6 .= '
	
	<dl class="ctrlUnit" id="PrefixContainer_' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '">
		<dt><label for="ctrl_prefix_id_' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '">' . 'Prefix' . ':</label></dt>
		<dd>
			<select name="prefix_id" id="ctrl_prefix_id_' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '" class="textCtrl TitlePrefix"
				data-container="#PrefixContainer_' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '"
				data-textbox="#ctrl_title_' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '"
				' . (($nodeControl) ? ('data-nodecontrol="' . htmlspecialchars($nodeControl, ENT_QUOTES, 'UTF-8') . '" data-prefixurl="' . XenForo_Template_Helper_Core::link('forums/-/prefixes', false, array()) . '"') : ('')) . '>
				';
$__compilerVar7 = '';
$__compilerVar7 .= '<option value="0" data-css="prefix noPrefix" ' . (($__compilerVar4 == 0) ? ' selected="selected"' : '') . '>(' . 'No prefix' . ')</option>
';
foreach ($prefixes AS $prefixGroup)
{
$__compilerVar7 .= '
	';
if ($prefixGroup['title'])
{
$__compilerVar7 .= '
		<optgroup label="' . htmlspecialchars($prefixGroup['title'], ENT_QUOTES, 'UTF-8') . '">
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar7 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar4 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar7 .= '
		</optgroup>
	';
}
else
{
$__compilerVar7 .= '
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar7 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar4 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar7 .= '
	';
}
$__compilerVar7 .= '
';
}
$__compilerVar6 .= $__compilerVar7;
unset($__compilerVar7);
$__compilerVar6 .= '
			</select>
		</dd>
	</dl>
	
';
}
$__compilerVar2 .= $__compilerVar6;
unset($__compilerVar4, $__compilerVar5, $__compilerVar6);
$__compilerVar2 .= '
	
		<dl class="ctrlUnit fullWidth surplusLabel">
			<dt><label for="ctrl_title_thread_create">' . 'Title' . ':</label></dt>
			<dd><input type="text" name="title" class="textCtrl titleCtrl" id="ctrl_title_thread_create" maxlength="100" autofocus="true"
				placeholder="' . 'Thread Title' . '..." value="' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '"
				data-liveTitleTemplate="' . 'Create Thread' . ': <em>%s</em>" /></dd>
		</dl>

		';
$__compilerVar8 = '';
$__compilerVar2 .= $this->callTemplateHook('thread_create_fields_main', $__compilerVar8, array(
'forum' => $forum
));
unset($__compilerVar8);
$__compilerVar2 .= '

		<dl id="similarthreadsId-result"></dl><dl class="ctrlUnit fullWidth">
			<dt></dt>
			<dd>' . $editorTemplate . '</dd>
		</dl>
	</fieldset>
	
	<!-- slot: after_editor -->

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Create Thread' . '" accesskey="s" class="button primary" />
			';
$__compilerVar9 = '';
if ($attachmentParams)
{
$__compilerVar9 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar9 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar9 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar9 .= '
	';
}
$__compilerVar9 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar9 .= '

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
$__compilerVar9 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar9 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '</a>
	</noscript>

';
}
$__compilerVar2 .= $__compilerVar9;
unset($__compilerVar9);
$__compilerVar2 .= '
			<input type="button" value="' . 'Preview' . '..." class="button PreviewButton JsOnly" />
			
			';
if ($xenOptions['multiQuote'])
{
$__compilerVar2 .= '<input type="button" class="button JsOnly MultiQuoteWatcher"
				value="' . 'Insert Quotes' . '..."
				style="display: none"
				data-href="' . XenForo_Template_Helper_Core::link('threads/multi-quote', array(
'thread_id' => '1'
), array(
'formId' => '#ThreadCreate'
)) . '"
				data-cacheOverlay="false" />';
}
$__compilerVar2 .= '
		</dd>
	</dl>

	';
if ($attachmentParams)
{
$__compilerVar2 .= '
		<dl class="ctrlUnit AttachedFilesUnit">
			<dt><label for="ctrl_uploader">' . 'Attached Files' . ':</label></dt>
			<dd>';
$__compilerVar10 = $attachmentParams['attachments'];
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
$__compilerVar12 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar12 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '</a>
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
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar15 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($__compilerVar14['thumbnailUrl'])
{
$__compilerVar15 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar15 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $__compilerVar14, array()) . '" />
			
				';
if ($__compilerVar14['thumbnailUrl'])
{
$__compilerVar15 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
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
if ($__compilerVar10)
{
$__compilerVar11 .= '
				';
foreach ($__compilerVar10 AS $attachment)
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
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar16 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar16 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar16 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar16 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
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
if ($__compilerVar10)
{
$__compilerVar11 .= '
			';
$__compilerVar17 = '';
$__compilerVar17 .= '
					';
foreach ($__compilerVar10 AS $attachment)
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
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar18 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar18 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar18 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar18 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
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
$__compilerVar2 .= $__compilerVar11;
unset($__compilerVar10, $__compilerVar11);
$__compilerVar2 .= '</dd>
		</dl>
		
		<!-- slot: after_attachment -->
	';
}
$__compilerVar2 .= '
	
	';
if ($visitor['user_id'])
{
$__compilerVar2 .= '
		<fieldset>
			<dl class="ctrlUnit">
				<dt>' . 'Options' . ':</dt>
				<dd><ul>
					<li>';
$__compilerVar19 = '';
$__compilerVar19 .= '<label for="ctrl_watch_thread"><input type="checkbox" name="watch_thread" value="1" id="ctrl_watch_thread" class="Disabler" ' . (($watchState) ? ' checked="checked"' : '') . ' /> ' . 'Watch this thread' . '...</label>
	<ul id="ctrl_watch_thread_Disabler">
		<li><label for="ctrl_watch_thread_email"><input type="checkbox" name="watch_thread_email" value="1" id="ctrl_watch_thread_email" ' . (($watchState == ('watch_email')) ? ' checked="checked"' : '') . ' /> ' . 'and receive email notifications' . '</label></li>
	</ul>
	<input type="hidden" name="watch_thread_state" value="1" />';
$__compilerVar2 .= $__compilerVar19;
unset($__compilerVar19);
$__compilerVar2 .= '</li>
				</ul></dd>
			</dl>
	
			';
$__compilerVar20 = '';
$__compilerVar21 = '';
$__compilerVar21 .= '
				';
if ($canLockUnlockThread)
{
$__compilerVar21 .= '
					<li>
						<label for="ctrl_discussion_open"><input type="checkbox" name="discussion_open" value="1" id="ctrl_discussion_open" ' . (($thread['discussion_open']) ? ' checked="checked"' : '') . ' /> ' . 'Open' . '</label>
						<input type="hidden" name="_set[discussion_open]" value="1" />
						<p class="hint">' . 'People may reply to this thread' . '</p>
					</li>
				';
}
$__compilerVar21 .= '
				';
if ($canStickUnstickThread)
{
$__compilerVar21 .= '
					<li>
						<label for="ctrl_sticky"><input type="checkbox" name="sticky" value="1" id="ctrl_sticky" ' . (($thread['sticky']) ? ' checked="checked"' : '') . ' /> ' . 'Sticky' . '</label>
						<input type="hidden" name="_set[sticky]" value="1" />
						<p class="hint">' . 'Sticky threads appear at the top of the first page of the list of threads in their parent forum' . '</p>
					</li>
				';
}
$__compilerVar21 .= '
			
';
if ($canLockUnlockThread)
{
$__compilerVar21 .= '
	<li><label><input type="checkbox" name="block_adsense" value="1" class="SubmitOnChange" ' . (($thread['block_adsense']) ? ' checked="checked"' : '') . ' />
	' . 'Suppress AdSense' . '</label>
	<input type="hidden" name="_set[block_adsense]" value="1" />
	<p class="hint">' . 'If you select this option, AdSense will not be displayed on this thread.' . '</p></li>';
}
$__compilerVar21 .= '
';
if (trim($__compilerVar21) !== '')
{
$__compilerVar20 .= '
	<dl class="ctrlUnit ' . (($hideLabel) ? ('surplusLabel') : ('')) . '">
		<dt><label>' . 'Set Thread Status' . ':</label></dt>
		<dd>
			<ul>
			' . $__compilerVar21 . '
			</ul>
		</dd>
	</dl>
';
}
unset($__compilerVar21);
$__compilerVar2 .= $__compilerVar20;
unset($__compilerVar20);
$__compilerVar2 .= '
		</fieldset>
		
		<!-- slot: after_options -->
	';
}
$__compilerVar2 .= '

	';
$__compilerVar22 = '';
$__compilerVar2 .= $this->callTemplateHook('thread_create_fields_extra', $__compilerVar22, array(
'forum' => $forum
));
unset($__compilerVar22);
$__compilerVar2 .= '
	
	';
if ($canPostPoll)
{
$__compilerVar2 .= '
		<h3 class="textHeading">' . 'Post a Poll' . '</h3>
		';
$__compilerVar23 = '';
$__extraData['head']['pollCss'] = '';
$__extraData['head']['pollCss'] .= '<style>.hasJs .PollNonJsInput { display: none }</style>';
$__compilerVar23 .= '

<dl class="ctrlUnit">
	<dt><label for="ctrl_poll_question">' . 'Question' . ':</label></dt>
	<dd><input type="text" name="poll[question]" class="textCtrl" id="ctrl_poll_question" maxlength="100" value="' . htmlspecialchars($poll['question'], ENT_QUOTES, 'UTF-8') . '" /></dd>
</dl>
<dl class="ctrlUnit">
	<dt>' . 'Possible Responses' . ':</dt>
	<dd>
		<ul class="PollResponseContainer">
			';
if ($poll)
{
$__compilerVar23 .= '
				';
foreach ($poll['responses'] AS $response)
{
$__compilerVar23 .= '
					<li><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Poll choice' . '..." maxlength="100" value="' . htmlspecialchars($response, ENT_QUOTES, 'UTF-8') . '" /></li>
				';
}
$__compilerVar23 .= '
				';
foreach ($poll['extraResponses'] AS $null)
{
$__compilerVar23 .= '
					<li><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Poll choice' . '..." maxlength="100" /></li>
				';
}
$__compilerVar23 .= '
			';
}
$__compilerVar23 .= '
			';
foreach ($pollExtraArray AS $null)
{
$__compilerVar23 .= '
				<li class="PollNonJsInput"><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Poll choice' . '..." maxlength="100" /></li>
			';
}
$__compilerVar23 .= '
			';
if (!$poll)
{
$__compilerVar23 .= '
				<li><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Poll choice' . '..." maxlength="100" /></li>
				<li><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Poll choice' . '..." maxlength="100" /></li>
			';
}
$__compilerVar23 .= '
		</ul>
		<input type="button" value="' . 'Add Additional Response' . '" class="button smallButton FieldAdder JsOnly" data-source="ul.PollResponseContainer li" data-maxfields="' . htmlspecialchars($xenOptions['pollMaximumResponses'], ENT_QUOTES, 'UTF-8') . '" />
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
	<dt>' . 'Options' . ':</dt>
	<dd>
		<ul>
			<li><label><input type="checkbox" name="poll[change_vote]" value="1" checked="checked" /> ' . 'Allow voters to change their votes' . '</label></li>

			<li><label><input type="checkbox" name="poll[public_votes]" value="1" /> ' . 'Display votes publicly' . '</label></li>

			<li><label><input type="checkbox" name="poll[view_results_unvoted]" value="1" checked="checked" /> ' . 'Allow the results to be viewed without voting' . '</label></li>

			<li><label><input type="checkbox" name="poll[close]" value="1" class="Disabler" id="ctrl_poll_close" /> ' . 'Close this poll after' . ':</label>
				<ul id="ctrl_poll_close_Disabler">
					<li>
						<input type="text" size="5" name="poll[close_length]" value="7" class="textCtrl autoSize" />
						<select name="poll[close_units]" class="textCtrl autoSize">
							<option value="hours">' . 'Hours' . '</option>
							<option value="days" selected="selected">' . 'Days' . '</option>
							<option value="weeks">' . 'Weeks' . '</option>
							<option value="months">' . 'Months' . '</option>
						</select>
					</li>
				</ul>
			</li>
		</ul>
	</dd>
</dl>';
$__compilerVar2 .= $__compilerVar23;
unset($__compilerVar23);
$__compilerVar2 .= '
	';
}
$__compilerVar2 .= '
	
	';
$__output .= $this->callTemplateHook('thread_create', $__compilerVar2, array());
unset($__compilerVar2);
$__output .= '

	';
if ($visitor['user_id'] OR $canPostPoll)
{
$__output .= '
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Create Thread' . '" class="button primary" />
				<input type="button" value="' . 'Preview' . '..." class="button PreviewButton JsOnly" />
			</dd>
		</dl>
	';
}
$__output .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

';
