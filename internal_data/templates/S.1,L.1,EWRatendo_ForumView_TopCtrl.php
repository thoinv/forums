<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<a href="' . XenForo_Template_Helper_Core::link('events/create/' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8'), false, array()) . '" class="callToAction">
	<span>' . 'Post New Event' . '</span>
</a>';
