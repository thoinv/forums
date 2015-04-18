<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div style="display: block; padding: 3px; margin: 2px">
	<a href="' . XenForo_Template_Helper_Core::adminLink('widgets/add', '', array(
'position' => $positionCode,
'display_order' => $displayOrder
)) . '"
		target="_blank"
		title="' . htmlspecialchars($positionCode, ENT_QUOTES, 'UTF-8') . ((($displayOrder + 0) != 0) ? (' - ' . 'Display Order' . ': ' . htmlspecialchars($displayOrder, ENT_QUOTES, 'UTF-8')) : ('')) . '"
		class="Tooltip"
		style="background: white; color: black; border: 1px solid black; padding: 3px">
		' . 'Add Widget' . '
	</a>
</div>';
