<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li><a href="' . XenForo_Template_Helper_Core::link('threads', $_extraThread, array()) . '" title="" class="' . (($_extraThread['hasPreview']) ? ('PreviewTooltip') : ('')) . '" 
	data-previewUrl="' . (($_extraThread['hasPreview']) ? (XenForo_Template_Helper_Core::link('threads/preview', $_extraThread, array())) : ('')) . '"
	>' . htmlspecialchars($_extraThread['title'], ENT_QUOTES, 'UTF-8') . '</a> - <span class="bretiDate">' . XenForo_Template_Helper_Core::datetime($_extraThread['post_date'], '') . '</span></li>';
