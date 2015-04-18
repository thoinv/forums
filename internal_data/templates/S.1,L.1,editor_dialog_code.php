<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<script src="' . htmlspecialchars($javaScriptSource, ENT_QUOTES, 'UTF-8') . '/digitalpoint/syntax_highlighter.js?_v=' . htmlspecialchars($xenOptions['jsVersion'], ENT_QUOTES, 'UTF-8') . '"></script>
<dl class="ctrlUnit">
	<dt>' . 'Language' . ':</dt>
	<dd><select name="redactor_code_type" id="redactor_code_type" class="textCtrl">
		<option value="code">' . 'General Code' . '</option>
		<option value="php">PHP</option>
		<option value="html">HTML</option>
<option value="code=JavaScript">JavaScript</option>
<option value="code=CSS">CSS</option>
	</select></dd>
</dl>

<dl class="ctrlUnit">
	<dt>' . 'Code' . ':</dt>
	<dd><textarea name="redactor_code_code" id="redactor_code_code" class="textCtrl" style="height: 100px; resize: none"></textarea></dd>
</dl>

<dl class="ctrlUnit submitUnit">
	<dt></dt>
	<dd>
		<input type="button" name="upload" class="redactor_modal_btn button primary" id="redactor_insert_code_btn" value="' . 'Insert' . '" />
		<a href="javascript:void(null);" class="redactor_modal_btn redactor_btn_modal_close button">' . 'Cancel' . '</a>
	</dd>
</dd>';
