<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li id="media" class="profileContent" data-loadUrl="' . XenForo_Template_Helper_Core::link('media/user', $user, array()) . '">
	' . 'Đang tải' . '...
	<noscript><a href="' . XenForo_Template_Helper_Core::link('media/user', $user, array()) . '">' . 'Xem' . '</a></noscript>
</li>';
