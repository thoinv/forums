<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar3 = '';
$__compilerVar3 .= '
<div>
	';
if ($showWysiwyg)
{
$__compilerVar3 .= '
		<textarea name="' . htmlspecialchars($formCtrlNameHtml, ENT_QUOTES, 'UTF-8') . '" id="' . htmlspecialchars($editorId, ENT_QUOTES, 'UTF-8') . '_html" class="textCtrl MessageEditor BbCodeWysiwygEditor ' . htmlspecialchars($editorOptions['extraClass'], ENT_QUOTES, 'UTF-8') . '" style="display:none; ' . (($height) ? ('height: ' . htmlspecialchars($height, ENT_QUOTES, 'UTF-8') . ';') : ('')) . '" data-css-url="css.php?style=' . urlencode($visitorStyle['style_id']) . '&amp;css=editor_contents&amp;d=' . urlencode($visitorStyle['last_modified_date']) . '" data-dialog-url="index.php?editor/dialog&amp;style=' . htmlspecialchars($visitorStyle['style_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($editorOptions['autoSaveUrl']) ? ('data-auto-save-url="' . htmlspecialchars($editorOptions['autoSaveUrl'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . ' ' . (($editorOptions['json']) ? ('data-options="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => $editorOptions['json']
)), ENT_QUOTES, 'UTF-8', true) . '"') : ('')) . '>' . htmlspecialchars($messageHtml, ENT_QUOTES, 'UTF-8') . '</textarea>
		<noscript><textarea name="' . htmlspecialchars($formCtrlName, ENT_QUOTES, 'UTF-8') . '" id="' . htmlspecialchars($editorId, ENT_QUOTES, 'UTF-8') . '" class="textCtrl MessageEditor ' . htmlspecialchars($editorOptions['extraClass'], ENT_QUOTES, 'UTF-8') . '" style="' . (($height) ? ('height: ' . htmlspecialchars($height, ENT_QUOTES, 'UTF-8') . ';') : ('')) . '">' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</textarea></noscript>
	';
}
else
{
$__compilerVar3 .= '
		<textarea name="' . htmlspecialchars($formCtrlName, ENT_QUOTES, 'UTF-8') . '" id="' . htmlspecialchars($editorId, ENT_QUOTES, 'UTF-8') . '" class="textCtrl MessageEditor ' . htmlspecialchars($editorOptions['extraClass'], ENT_QUOTES, 'UTF-8') . '" style="' . (($height) ? ('height: ' . htmlspecialchars($height, ENT_QUOTES, 'UTF-8') . ';') : ('')) . '">' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</textarea>
	';
}
$__compilerVar3 .= '
	<input type="hidden" name="_xfRelativeResolver" value="' . htmlspecialchars($requestPaths['fullUri'], ENT_QUOTES, 'UTF-8') . '" />
	
	';
if ($showWysiwyg)
{
$__compilerVar3 .= '
		';
$__compilerVar4 = '';
if ($debugMode)
{
$__compilerVar4 .= '
	';
$this->addRequiredExternal('js', 'js/redactor/redactor.full.js');
$__compilerVar4 .= '
';
}
else
{
$__compilerVar4 .= '
	';
$this->addRequiredExternal('js', 'js/redactor/redactor.js');
$__compilerVar4 .= '
';
}
$__compilerVar4 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/bb_code_edit.js');
$__compilerVar4 .= '
';
$this->addRequiredExternal('css', 'editor_ui');
$__compilerVar4 .= '

<script>
if (typeof RELANG === \'undefined\')
{
	var RELANG = {};
}

RELANG.xf = {
	image: "' . XenForo_Template_Helper_Core::jsEscape('Ảnh', 'double') . '",
	link: "' . XenForo_Template_Helper_Core::jsEscape('Link', 'double') . '",
	link_insert: "' . XenForo_Template_Helper_Core::jsEscape('Link', 'double') . '",
	unlink: "' . XenForo_Template_Helper_Core::jsEscape('Bỏ liên kết', 'double') . '",
	quote: "' . XenForo_Template_Helper_Core::jsEscape('Quote', 'double') . '",
	code: "' . XenForo_Template_Helper_Core::jsEscape('Mã', 'double') . '",
	bold: "' . XenForo_Template_Helper_Core::jsEscape('Đậm (Ctrl+B)', 'double') . '",
	italic: "' . XenForo_Template_Helper_Core::jsEscape('In nghiêng (Ctrl+I)', 'double') . '",
	fontcolor: "' . XenForo_Template_Helper_Core::jsEscape('Màu chữ', 'double') . '",
	unorderedlist: "' . XenForo_Template_Helper_Core::jsEscape('Danh sách không sắp xếp', 'double') . '",
	orderedlist: "' . XenForo_Template_Helper_Core::jsEscape('Danh sách đánh số thứ tự', 'double') . '",
	outdent: "' . XenForo_Template_Helper_Core::jsEscape('Tăng lề', 'double') . '",
	indent: "' . XenForo_Template_Helper_Core::jsEscape('Thụt lề', 'double') . '",
	none: "' . XenForo_Template_Helper_Core::jsEscape('Không có', 'double') . '",
	align_left:	"' . XenForo_Template_Helper_Core::jsEscape('Căn trái', 'double') . '",
	align_center: "' . XenForo_Template_Helper_Core::jsEscape('Căn giữa', 'double') . '",
	align_right: "' . XenForo_Template_Helper_Core::jsEscape('Căn phải', 'double') . '",
	deleted: "' . XenForo_Template_Helper_Core::jsEscape('Gạch ngang', 'double') . '",
	underline: "' . XenForo_Template_Helper_Core::jsEscape('Gạch chân (Ctrl+U)', 'double') . '",
	alignment: "' . XenForo_Template_Helper_Core::jsEscape('Alignment', 'double') . '",
	undo: "' . XenForo_Template_Helper_Core::jsEscape('Hoàn tác (Ctrl+Z)', 'double') . '",
	redo: "' . XenForo_Template_Helper_Core::jsEscape('Làm lại (Ctrl+Y)', 'double') . '",
	spoiler: "' . XenForo_Template_Helper_Core::jsEscape('Spoiler', 'double') . '",
	insert: "' . XenForo_Template_Helper_Core::jsEscape('Insert...', 'double') . '",

	remove_formatting: "' . XenForo_Template_Helper_Core::jsEscape('Xóa bỏ định dạng', 'double') . '",
	font_size: "' . XenForo_Template_Helper_Core::jsEscape('Kích thước', 'double') . '",
	font_family: "' . XenForo_Template_Helper_Core::jsEscape('Phông chữ', 'double') . '",
	smilies: "' . XenForo_Template_Helper_Core::jsEscape('Mặt cười', 'double') . '",
	media: "' . XenForo_Template_Helper_Core::jsEscape('Media', 'double') . '",
	
	drafts: "' . XenForo_Template_Helper_Core::jsEscape('Bản thảo', 'double') . '",
	save_draft: "' . XenForo_Template_Helper_Core::jsEscape('Save draft', 'double') . '",
	delete_draft: "' . XenForo_Template_Helper_Core::jsEscape('Xóa bản thảo', 'double') . '",
	draft_saved: "' . XenForo_Template_Helper_Core::jsEscape('Bản thảo đã lưu', 'double') . '",
	draft_deleted: "' . XenForo_Template_Helper_Core::jsEscape('Bản thảo đã xóa', 'double') . '",

	switch_mode_bb: "' . XenForo_Template_Helper_Core::jsEscape('Use BB Code Editor', 'double') . '",
	switch_mode_rich: "' . XenForo_Template_Helper_Core::jsEscape('Sử dụng bộ soạn thảo trù phú', 'double') . '",
	
	reply_placeholder: "' . XenForo_Template_Helper_Core::jsEscape('Viết trả lời...', 'double') . '",
	
	drop_files_here_to_upload: "' . XenForo_Template_Helper_Core::jsEscape('Drop files here to upload', 'double') . '",
	uploads_are_not_available: "' . XenForo_Template_Helper_Core::jsEscape('Uploads are not available.', 'double') . '"
};
</script>';
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
$__compilerVar3 .= '
	';
}
$__compilerVar3 .= '
</div>
';
$__output .= $this->callTemplateHook('editor', $__compilerVar3, array(
'editorId' => $editorId
));
unset($__compilerVar3);
$__output .= '

' . '
' . '
';
