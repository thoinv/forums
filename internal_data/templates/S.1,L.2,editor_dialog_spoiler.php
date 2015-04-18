<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<dl class="ctrlUnit">
	<dt>' . 'Enter Spoiler Title' . ':</dt>
	<dd><input type="text" id="redactor_spoiler_title" class="textCtrl" />
		<div class="explain">
			' . 'If you would like the \'Spoiler\' button show a title that hints at its content, enter your text here. To avoid having a title, leave the text box empty.' . '
		</div>
	</dd>
</dl>

<dl class="ctrlUnit submitUnit">
	<dt></dt>
	<dd>
		<input type="button" class="redactor_modal_btn button primary" id="redactor_insert_spoiler_btn" value="' . 'Continue' . '" />
		<a href="javascript:void(null);" class="redactor_modal_btn redactor_btn_modal_close button">' . 'Hủy bỏ' . '</a>
	</dd>
</dl>';
