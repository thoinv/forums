<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($debugMode)
{
$__output .= '
	';
$this->addRequiredExternal('js', 'js/redactor/redactor.full.js');
$__output .= '
';
}
else
{
$__output .= '
	';
$this->addRequiredExternal('js', 'js/redactor/redactor.js');
$__output .= '
';
}
$__output .= '
';
$this->addRequiredExternal('js', 'js/xenforo/bb_code_edit.js');
$__output .= '
';
$this->addRequiredExternal('css', 'editor_ui');
$__output .= '

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
