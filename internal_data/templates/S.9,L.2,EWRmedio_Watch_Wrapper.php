<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li><a
	class="' . (($selectedKey == ('alerts/watchMedia')) ? ('secondaryContent') : ('primaryContent')) . '"
	href="' . XenForo_Template_Helper_Core::link('watched/media', false, array()) . '">' . 'Watched Media' . '</a></li>';
