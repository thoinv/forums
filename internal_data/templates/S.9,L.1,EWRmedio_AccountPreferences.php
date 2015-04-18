<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<dl class="ctrlUnit">
	<dt></dt>
	<dd>
		<ul>
			<li><label><input type="checkbox" name="media_watch_state" value="1" class="Disabler" id="ctrl_media_watch_state" ' . (($media['media_watch_state']) ? ' checked="checked"' : '') . ' />
				' . 'Automatically watch media that you create or when you reply' . '...</label>
				<ul id="ctrl_media_watch_state_Disabler">
					<li><label><input type="checkbox" name="media_watch_state_email" value="1" ' . (($media['media_watch_state'] == ('watch_email')) ? ' checked="checked"' : '') . ' />
						' . 'and receive email notifications of replies' . '</label></li>
				</ul>
			</li>
		</ul>
	</dd>
</dl>';
