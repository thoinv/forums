<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<dl class="ctrlUnit ' . htmlspecialchars($extraClasses, ENT_QUOTES, 'UTF-8') . '">
	<dt></dt>
	<dd><ul>
		<li><label><input type="checkbox" name="silent" value="1" id="ctrl_silent" class="Disabler" ' . (($silentEdit) ? ' checked="checked"' : '') . ' /> ' . 'Edit silently' . '</label>
			<p class="explain">' . 'If selected, no "last edited" note will be added for this edit.' . '</p>
			<ul id="ctrl_silent_Disabler">
				<li><label><input type="checkbox" name="clear_edit" value="1" ' . (($clearEdit) ? ' checked="checked"' : '') . ' /> ' . 'Clear last edit information' . '</label>
					<p class="explain">' . 'If selected, any existing "last edited" note will be removed.' . '</p>
				</li>
			</ul>
		</li>
	</ul></dd>
</dl>';
