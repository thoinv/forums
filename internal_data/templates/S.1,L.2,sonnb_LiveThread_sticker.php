<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li>
	<label>
		<input type="checkbox" name="live" value="1" class="SubmitOnChange" ' . (($thread['sonnb_live_thread']) ? ' checked="checked"' : '') . ' />
		' . 'Live' . '
	</label>
	<input type="hidden" name="set[live]" value="1" />
</li>';
