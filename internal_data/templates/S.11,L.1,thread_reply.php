<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Reply To ' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Reply to Thread';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__extraData['navigation'][] = array('href' => (($post) ? (XenForo_Template_Helper_Core::link('posts', $post, array())) : (XenForo_Template_Helper_Core::link('threads', $thread, array()))), 'value' => XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8'));
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
$__extraData['searchBar']['thread'] = '';
$__compilerVar1 = '';
$__compilerVar1 .= '<label title="' . 'Search only ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[post][thread_id]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_thread" class="AutoChecker"
	data-uncheck="#search_bar_title_only, #search_bar_nodes" /> ' . 'Search this thread only' . '</label>';
$__extraData['searchBar']['thread'] .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
';
$__extraData['searchBar']['forum'] = '';
$__compilerVar2 = '';
$__compilerVar2 .= '<label title="' . 'Search only ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="nodes[]" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_nodes" class="Disabler AutoChecker" checked="checked"
	data-uncheck="#search_bar_thread" /> ' . 'Search this forum only' . '</label>
	<ul id="search_bar_nodes_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			data-uncheck="#search_bar_thread" /> ' . 'Display results as threads' . '</label></li>
	</ul>';
$__extraData['searchBar']['forum'] .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('threads/add-reply', $thread, array()) . '" method="post" id="ThreadReply"
	class="xenForm Preview AutoValidator"
	data-previewUrl="' . XenForo_Template_Helper_Core::link('threads/reply/preview', $thread, array()) . '"
	data-redirect="on">

	';
$__compilerVar3 = '';
$__compilerVar3 .= '

	';
if ($visitor['user_id'] == 0)
{
$__compilerVar3 .= '
		<dl class="ctrlUnit">
			<dt><label for="ctrl_guestUsername">' . 'Name' . ':</label></dt>
			<dd><input type="text" name="_guestUsername" value="' . htmlspecialchars($visitor['username'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" /></dd>
		</dl>
	';
}
$__compilerVar3 .= '
	
	<!-- slot: after_guest -->

	';
$__compilerVar4 = '';
if ($captcha)
{
$__compilerVar4 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Verification' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
$__compilerVar3 .= '

	<fieldset>
		<dl class="ctrlUnit fullWidth surplusLabel">
			<dt><label for="ctrl_message">' . 'Message' . ':</label></dt>
			<dd>' . $editorTemplate . '</dd>
		</dl>
	</fieldset>
	
	<!-- slot: after_editor -->

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
				
			<input type="submit" value="' . 'Reply to Thread' . '" accesskey="s" class="button primary" />
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
$__compilerVar3 .= $__compilerVar5;
unset($__compilerVar5);
$__compilerVar3 .= '
			<input type="button" value="' . 'Preview' . '..." class="button PreviewButton JsOnly" />
			
			';
if ($xenOptions['multiQuote'])
{
$__compilerVar3 .= '<input type="button" class="button JsOnly MultiQuoteWatcher" id="MultiQuote"
				value="' . 'Insert Quotes' . '..."
				style="display: none"
				data-href="' . XenForo_Template_Helper_Core::link('threads/multi-quote', $thread, array(
'formId' => '#ThreadReply'
)) . '"
				data-cacheOverlay="false" />';
}
$__compilerVar3 .= '
		</dd>
	</dl>
	
	<!-- slot: after_submit -->

	';
if ($attachmentParams)
{
$__compilerVar3 .= '
		<dl class="ctrlUnit AttachedFilesUnit">
			<dt><label for="ctrl_uploader">' . 'Attached Files' . ':</label></dt>
			<dd>';
$__compilerVar6 = '';
if ($attachmentParams)
{
$__compilerVar6 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar6 .= '
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar6 .= '
	
	<div class="AttachmentEditor">
	
		';
if ($showUploadButton)
{
$__compilerVar6 .= '
			';
$__compilerVar7 = '';
if ($attachmentParams)
{
$__compilerVar7 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar7 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar7 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar7 .= '
	';
}
$__compilerVar7 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar7 .= '

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
$__compilerVar7 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar7 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '</a>
	</noscript>

';
}
$__compilerVar6 .= $__compilerVar7;
unset($__compilerVar7);
$__compilerVar6 .= '
		';
}
$__compilerVar6 .= '
		
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
$__compilerVar8 = '';
$__compilerVar8 .= '1';
$__compilerVar9 = '';
$__compilerVar10 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar10 .= '

<li id="' . (($__compilerVar8) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($__compilerVar9['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($__compilerVar9 and $__compilerVar9['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($__compilerVar9 and $__compilerVar9['thumbnailUrl'])
{
$__compilerVar10 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar9, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($__compilerVar9['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($__compilerVar9['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($__compilerVar9['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar9, array(
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
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar9, array()) . '" target="_blank">' . (($__compilerVar9) ? (htmlspecialchars($__compilerVar9['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($__compilerVar8)
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
if ($__compilerVar9['thumbnailUrl'])
{
$__compilerVar10 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar10 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $__compilerVar9, array()) . '" />
			
				';
if ($__compilerVar9['thumbnailUrl'])
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
$__compilerVar6 .= $__compilerVar10;
unset($__compilerVar8, $__compilerVar9, $__compilerVar10);
$__compilerVar6 .= '
			';
if ($attachments)
{
$__compilerVar6 .= '
				';
foreach ($attachments AS $attachment)
{
$__compilerVar6 .= '
					';
if ($attachment['temp_hash'])
{
$__compilerVar6 .= '
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
$__compilerVar6 .= $__compilerVar11;
unset($__compilerVar11);
$__compilerVar6 .= '
					';
}
$__compilerVar6 .= '
				';
}
$__compilerVar6 .= '
			';
}
$__compilerVar6 .= '
		</ol>
	
		';
if ($attachments)
{
$__compilerVar6 .= '
			';
$__compilerVar12 = '';
$__compilerVar12 .= '
					';
foreach ($attachments AS $attachment)
{
$__compilerVar12 .= '
						';
if (!$attachment['temp_hash'])
{
$__compilerVar12 .= '
							';
$__compilerVar13 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar13 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar13 .= '
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
$__compilerVar13 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar13 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar13 .= '
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar13 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar13 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar13 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar13 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar13 .= '
			</div>
		';
}
$__compilerVar13 .= '

	</div>
	
</li>';
$__compilerVar12 .= $__compilerVar13;
unset($__compilerVar13);
$__compilerVar12 .= '
						';
}
$__compilerVar12 .= '
					';
}
$__compilerVar12 .= '
				';
if (trim($__compilerVar12) !== '')
{
$__compilerVar6 .= '
			<ol class="AttachmentList Existing">
				' . $__compilerVar12 . '
			</ol>
			';
}
unset($__compilerVar12);
$__compilerVar6 .= '
		';
}
$__compilerVar6 .= '
		
		<input type="hidden" name="attachment_hash" value="' . htmlspecialchars($attachmentParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
		
		' . '
		
	</div>
	
';
}
$__compilerVar3 .= $__compilerVar6;
unset($__compilerVar6);
$__compilerVar3 .= '</dd>
		</dl>
	';
}
$__compilerVar3 .= '
	
	<!-- slot: after_attachment -->

	';
$__compilerVar14 = '';
$__compilerVar14 .= '
			';
if ($visitor['user_id'])
{
$__compilerVar14 .= '
				<dl class="ctrlUnit">
					<dt>' . 'Options' . ':</dt>
					<dd><ul>
						<li>';
$__compilerVar15 = '';
$__compilerVar15 .= '<label for="ctrl_watch_thread"><input type="checkbox" name="watch_thread" value="1" id="ctrl_watch_thread" class="Disabler" ' . (($watchState) ? ' checked="checked"' : '') . ' /> ' . 'Watch this thread' . '...</label>
	<ul id="ctrl_watch_thread_Disabler">
		<li><label for="ctrl_watch_thread_email"><input type="checkbox" name="watch_thread_email" value="1" id="ctrl_watch_thread_email" ' . (($watchState == ('watch_email')) ? ' checked="checked"' : '') . ' /> ' . 'and receive email notifications' . '</label></li>
	</ul>
	<input type="hidden" name="watch_thread_state" value="1" />';
$__compilerVar14 .= $__compilerVar15;
unset($__compilerVar15);
$__compilerVar14 .= '</li>
					</ul></dd>
				</dl>
			
				';
$__compilerVar16 = '';
$__compilerVar17 = '';
$__compilerVar17 .= '
				';
if ($canLockUnlockThread)
{
$__compilerVar17 .= '
					<li>
						<label for="ctrl_discussion_open"><input type="checkbox" name="discussion_open" value="1" id="ctrl_discussion_open" ' . (($thread['discussion_open']) ? ' checked="checked"' : '') . ' /> ' . 'Open' . '</label>
						<input type="hidden" name="_set[discussion_open]" value="1" />
						<p class="hint">' . 'People may reply to this thread' . '</p>
					</li>
				';
}
$__compilerVar17 .= '
				';
if ($canStickUnstickThread)
{
$__compilerVar17 .= '
					<li>
						<label for="ctrl_sticky"><input type="checkbox" name="sticky" value="1" id="ctrl_sticky" ' . (($thread['sticky']) ? ' checked="checked"' : '') . ' /> ' . 'Sticky' . '</label>
						<input type="hidden" name="_set[sticky]" value="1" />
						<p class="hint">' . 'Sticky threads appear at the top of the first page of the list of threads in their parent forum' . '</p>
					</li>
				';
}
$__compilerVar17 .= '
			
';
if ($canLockUnlockThread)
{
$__compilerVar17 .= '
	<li><label><input type="checkbox" name="block_adsense" value="1" class="SubmitOnChange" ' . (($thread['block_adsense']) ? ' checked="checked"' : '') . ' />
	' . 'Suppress AdSense' . '</label>
	<input type="hidden" name="_set[block_adsense]" value="1" />
	<p class="hint">' . 'If you select this option, AdSense will not be displayed on this thread.' . '</p></li>';
}
$__compilerVar17 .= '
';
if (trim($__compilerVar17) !== '')
{
$__compilerVar16 .= '
	<dl class="ctrlUnit ' . (($hideLabel) ? ('surplusLabel') : ('')) . '">
		<dt><label>' . 'Set Thread Status' . ':</label></dt>
		<dd>
			<ul>
			' . $__compilerVar17 . '
			</ul>
		</dd>
	</dl>
';
}
unset($__compilerVar17);
$__compilerVar14 .= $__compilerVar16;
unset($__compilerVar16);
$__compilerVar14 .= '
			';
}
$__compilerVar14 .= '
			';
if (trim($__compilerVar14) !== '')
{
$__compilerVar3 .= '
		<fieldset>
			' . $__compilerVar14 . '
		</fieldset>
	';
}
unset($__compilerVar14);
$__compilerVar3 .= '
	
	';
$__output .= $this->callTemplateHook('thread_reply', $__compilerVar3, array());
unset($__compilerVar3);
$__output .= '

	<!--
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Reply to Thread' . '" accesskey="s" class="button primary" />
			<input type="button" value="' . 'Preview' . '..." class="button PreviewButton JsOnly" />
		</dd>
	</dl>
	-->

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
