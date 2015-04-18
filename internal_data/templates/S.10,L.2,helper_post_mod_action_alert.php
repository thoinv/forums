<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<dl class="ctrlUnit">
	<dt></dt>
	<dd><ul>
		<li>
			<label><input type="checkbox" name="send_author_alert" value="1" ' . (($alertDefault) ? ' checked="checked"' : '') . ' class="Disabler" id="ctrl_send_author_alert" /> ' . 'Notify author of this action.' . ' ' . 'Lý do' . ':</label>
			<ul id="ctrl_send_author_alert_Disabler">
				<li><input type="text" name="author_alert_reason" class="textCtrl" placeholder="' . 'Optional' . '" /></li>
			</ul>
			<p class="hint">' . 'Note that the author will see this alert even if they can no longer view their message.' . '</p>
		</li>
	</ul></dd>
</dl>';
