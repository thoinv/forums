<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<dl class="ctrlUnit">
	<dt>' . 'Image URL' . ':</dt>
	<dd><input type="text" name="redactor_image_link" id="redactor_image_link" class="textCtrl" /></dd>
</dl>

<dl class="ctrlUnit submitUnit">
	<dt></dt>
	<dd>
		<input type="button" name="upload" class="redactor_modal_btn button primary" id="redactor_image_btn" value="' . 'Insert' . '" />
		<a href="javascript:void(null);" class="redactor_modal_btn redactor_btn_modal_close button">' . 'Cancel' . '</a>
	</dd>
</dd>';
