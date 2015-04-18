<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<dl class="ctrlUnit">
	<dt>' . 'Album URL or Album ID' . ':</dt>
	<dd>
		<input type="text" id="redactor_album_url" name="redactor_album_url" class="textCtrl" />
		<p class="explain">' . 'Please enter full album URL or just album ID' . '</p>
	</dd>
</dl>
<dl class="ctrlUnit">
	<dt>' . 'Cover Resolution' . ':</dt>
	<dd>
		<label for="redactor_cover_size_small"><input type="radio" id="redactor_cover_size_small" name="redactor_cover_size" value="small" /> ' . 'Small' . '</label>
		<label for="redactor_cover_size_medium"><input type="radio" id="redactor_cover_size_medium" checked="checked" name="redactor_cover_size" value="medium" /> ' . 'Medium' . '</label>
		<label for="redactor_cover_size_large"><input type="radio" id="redactor_cover_size_large" name="redactor_cover_size" value="large" /> ' . 'Large' . '</label>
		<p class="explain">' . 'Resolution for album cover' . '</p>
	</dd>
</dl>

<dl class="ctrlUnit submitUnit">
	<dt></dt>
	<dd>
		<input type="submit" class="redactor_modal_btn button primary" id="redactor_insert_album_btn" value="' . 'Insert' . '" />
		<a href="javascript:void(null);" class="redactor_modal_btn redactor_btn_modal_close button">' . 'Cancel' . '</a>
	</dd>
</dd>';
