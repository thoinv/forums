<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="portlet secondaryContent ' . (($block['locked']) ? ('locked') : ('')) . '">
	' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . '
	<input type="hidden" class="position" name="blocks[' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($block['position'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
