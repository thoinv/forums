<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<label for="ctrl_watch_thread"><input type="checkbox" name="watch_thread" value="1" id="ctrl_watch_thread" class="Disabler" ' . (($watchState) ? ' checked="checked"' : '') . ' /> ' . 'Theo dõi chủ đề này ' . '...</label>
	<ul id="ctrl_watch_thread_Disabler">
		<li><label for="ctrl_watch_thread_email"><input type="checkbox" name="watch_thread_email" value="1" id="ctrl_watch_thread_email" ' . (($watchState == ('watch_email')) ? ' checked="checked"' : '') . ' /> ' . 'và nhận email thông báo' . '</label></li>
	</ul>
	<input type="hidden" name="watch_thread_state" value="1" />';
