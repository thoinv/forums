<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<dl class="ctrlUnit">
	<dt>' . 'Photo/Video URL or ID' . ':</dt>
	<dd>
		<input type="text" id="redactor_content_url" name="redactor_content_url" class="textCtrl" />
		<p class="explain">' . 'Please enter full Photo/Video\'s URL or just Photo/Video\'s ID' . '</p>
	</dd>
</dl>
<dl class="ctrlUnit">
	<dt>' . 'Content Resolution' . ':</dt>
	<dd>
		<label for="redactor_content_size_small"><input type="radio" id="redactor_content_size_small" name="redactor_content_size" value="small" /> ' . 'Small' . '</label>
		<label for="redactor_content_size_medium"><input type="radio" id="redactor_content_size_medium" checked="checked" name="redactor_content_size" value="medium" /> ' . 'Medium' . '</label>
		<label for="redactor_content_size_large"><input type="radio" id="redactor_content_size_large" name="redactor_content_size" value="large" /> ' . 'Large' . '</label>
		<p class="explain">' . 'Applicable for photos only.' . '</p>
	</dd>
</dl>

<dl class="ctrlUnit submitUnit">
	<dt></dt>
	<dd>
		<input type="submit" class="redactor_modal_btn button primary" id="redactor_insert_content_btn" value="' . 'Insert' . '" />
		<a href="javascript:void(null);" class="redactor_modal_btn redactor_btn_modal_close button">' . 'Cancel' . '</a>
	</dd>
</dd>';
