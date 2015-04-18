<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<dl class="ctrlUnit ' . htmlspecialchars($extraClasses, ENT_QUOTES, 'UTF-8') . '">
	<dt></dt>
	<dd><ul>
		<li><label><input type="checkbox" name="silent" value="1" id="ctrl_silent" class="Disabler" ' . (($silentEdit) ? ' checked="checked"' : '') . ' /> ' . 'Chỉnh sửa thầm lặng' . '</label>
			<p class="explain">' . 'Nếu được chọn, không có lưu ý "chỉnh sửa cuối" được thêm vào cho chỉnh sửa này.' . '</p>
			<ul id="ctrl_silent_Disabler">
				<li><label><input type="checkbox" name="clear_edit" value="1" ' . (($clearEdit) ? ' checked="checked"' : '') . ' /> ' . 'Dọn dẹp các thông tin sửa mới nhất' . '</label>
					<p class="explain">' . 'Nếu được chọn, bất kỳ "chỉnh sửa cuối" hiện tại sẽ được gỡ bỏ.' . '</p>
				</li>
			</ul>
		</li>
	</ul></dd>
</dl>';
