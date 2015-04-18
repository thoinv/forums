<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= '
<div>
	';
if ($showWysiwyg)
{
$__compilerVar1 .= '
		<textarea name="' . htmlspecialchars($formCtrlNameHtml, ENT_QUOTES, 'UTF-8') . '" id="' . htmlspecialchars($editorId, ENT_QUOTES, 'UTF-8') . '_html" class="textCtrl MessageEditor BbCodeWysiwygEditor ' . htmlspecialchars($editorOptions['extraClass'], ENT_QUOTES, 'UTF-8') . '" style="display:none; ' . (($height) ? ('height: ' . htmlspecialchars($height, ENT_QUOTES, 'UTF-8') . ';') : ('')) . '" data-css-url="css.php?style=' . urlencode($visitorStyle['style_id']) . '&amp;css=editor_contents&amp;d=' . urlencode($visitorStyle['last_modified_date']) . '" data-dialog-url="index.php?editor/dialog&amp;style=' . htmlspecialchars($visitorStyle['style_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($editorOptions['autoSaveUrl']) ? ('data-auto-save-url="' . htmlspecialchars($editorOptions['autoSaveUrl'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . ' ' . (($editorOptions['json']) ? ('data-options="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => $editorOptions['json']
)), ENT_QUOTES, 'UTF-8', true) . '"') : ('')) . '>' . htmlspecialchars($messageHtml, ENT_QUOTES, 'UTF-8') . '</textarea>
		<noscript><textarea name="' . htmlspecialchars($formCtrlName, ENT_QUOTES, 'UTF-8') . '" id="' . htmlspecialchars($editorId, ENT_QUOTES, 'UTF-8') . '" class="textCtrl MessageEditor ' . htmlspecialchars($editorOptions['extraClass'], ENT_QUOTES, 'UTF-8') . '" style="' . (($height) ? ('height: ' . htmlspecialchars($height, ENT_QUOTES, 'UTF-8') . ';') : ('')) . '">' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</textarea></noscript>
	';
}
else
{
$__compilerVar1 .= '
		<textarea name="' . htmlspecialchars($formCtrlName, ENT_QUOTES, 'UTF-8') . '" id="' . htmlspecialchars($editorId, ENT_QUOTES, 'UTF-8') . '" class="textCtrl MessageEditor ' . htmlspecialchars($editorOptions['extraClass'], ENT_QUOTES, 'UTF-8') . '" style="' . (($height) ? ('height: ' . htmlspecialchars($height, ENT_QUOTES, 'UTF-8') . ';') : ('')) . '">' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</textarea>
	';
}
$__compilerVar1 .= '
	<input type="hidden" name="_xfRelativeResolver" value="' . htmlspecialchars($requestPaths['fullUri'], ENT_QUOTES, 'UTF-8') . '" />
	
	';
if ($showWysiwyg)
{
$__compilerVar1 .= '
		';
$__compilerVar2 = '';
if ($debugMode)
{
$__compilerVar2 .= '
	';
$this->addRequiredExternal('js', 'js/redactor/redactor.full.js');
$__compilerVar2 .= '
';
}
else
{
$__compilerVar2 .= '
	';
$this->addRequiredExternal('js', 'js/redactor/redactor.js');
$__compilerVar2 .= '
';
}
$__compilerVar2 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/bb_code_edit.js');
$__compilerVar2 .= '
';
$this->addRequiredExternal('css', 'editor_ui');
$__compilerVar2 .= '

<script>
if (typeof RELANG === \'undefined\')
{
	var RELANG = {};
}

RELANG.xf = {
	image: "' . XenForo_Template_Helper_Core::jsEscape('Image', 'double') . '",
	link: "' . XenForo_Template_Helper_Core::jsEscape('Link', 'double') . '",
	link_insert: "' . XenForo_Template_Helper_Core::jsEscape('Link', 'double') . '",
	unlink: "' . XenForo_Template_Helper_Core::jsEscape('Unlink', 'double') . '",
	quote: "' . XenForo_Template_Helper_Core::jsEscape('Quote', 'double') . '",
	code: "' . XenForo_Template_Helper_Core::jsEscape('Code', 'double') . '",
	bold: "' . XenForo_Template_Helper_Core::jsEscape('Bold (Ctrl+B)', 'double') . '",
	italic: "' . XenForo_Template_Helper_Core::jsEscape('Italic (Ctrl+I)', 'double') . '",
	fontcolor: "' . XenForo_Template_Helper_Core::jsEscape('Text Color', 'double') . '",
	unorderedlist: "' . XenForo_Template_Helper_Core::jsEscape('Unordered List', 'double') . '",
	orderedlist: "' . XenForo_Template_Helper_Core::jsEscape('Ordered List', 'double') . '",
	outdent: "' . XenForo_Template_Helper_Core::jsEscape('Outdent', 'double') . '",
	indent: "' . XenForo_Template_Helper_Core::jsEscape('Indent', 'double') . '",
	none: "' . XenForo_Template_Helper_Core::jsEscape('None', 'double') . '",
	align_left:	"' . XenForo_Template_Helper_Core::jsEscape('Align Left', 'double') . '",
	align_center: "' . XenForo_Template_Helper_Core::jsEscape('Align Center', 'double') . '",
	align_right: "' . XenForo_Template_Helper_Core::jsEscape('Align Right', 'double') . '",
	deleted: "' . XenForo_Template_Helper_Core::jsEscape('Strike-through', 'double') . '",
	underline: "' . XenForo_Template_Helper_Core::jsEscape('Underline (Ctrl+U)', 'double') . '",
	alignment: "' . XenForo_Template_Helper_Core::jsEscape('Alignment', 'double') . '",
	undo: "' . XenForo_Template_Helper_Core::jsEscape('Undo (Ctrl+Z)', 'double') . '",
	redo: "' . XenForo_Template_Helper_Core::jsEscape('Redo (Ctrl+Y)', 'double') . '",
	spoiler: "' . XenForo_Template_Helper_Core::jsEscape('Spoiler', 'double') . '",
	insert: "' . XenForo_Template_Helper_Core::jsEscape('Insert...', 'double') . '",

	remove_formatting: "' . XenForo_Template_Helper_Core::jsEscape('Remove Formatting', 'double') . '",
	font_size: "' . XenForo_Template_Helper_Core::jsEscape('Font Size', 'double') . '",
	font_family: "' . XenForo_Template_Helper_Core::jsEscape('Font Family', 'double') . '",
	smilies: "' . XenForo_Template_Helper_Core::jsEscape('Smilies', 'double') . '",
	media: "' . XenForo_Template_Helper_Core::jsEscape('Media', 'double') . '",
	
	drafts: "' . XenForo_Template_Helper_Core::jsEscape('Drafts', 'double') . '",
	save_draft: "' . XenForo_Template_Helper_Core::jsEscape('Save Draft', 'double') . '",
	delete_draft: "' . XenForo_Template_Helper_Core::jsEscape('Delete Draft', 'double') . '",
	draft_saved: "' . XenForo_Template_Helper_Core::jsEscape('Draft saved', 'double') . '",
	draft_deleted: "' . XenForo_Template_Helper_Core::jsEscape('Draft deleted', 'double') . '",

	switch_mode_bb: "' . XenForo_Template_Helper_Core::jsEscape('Use BB Code Editor', 'double') . '",
	switch_mode_rich: "' . XenForo_Template_Helper_Core::jsEscape('Use Rich Text Editor', 'double') . '",
	
	reply_placeholder: "' . XenForo_Template_Helper_Core::jsEscape('Write your reply...', 'double') . '",
	
	drop_files_here_to_upload: "' . XenForo_Template_Helper_Core::jsEscape('Drop files here to upload', 'double') . '",
	uploads_are_not_available: "' . XenForo_Template_Helper_Core::jsEscape('Uploads are not available.', 'double') . '"
};
</script>';
$__compilerVar1 .= $__compilerVar2;
unset($__compilerVar2);
$__compilerVar1 .= '
	';
}
$__compilerVar1 .= '
</div>
';
$__output .= $this->callTemplateHook('editor', $__compilerVar1, array(
'editorId' => $editorId
));
unset($__compilerVar1);
$__output .= '

' . '
' . '
';
