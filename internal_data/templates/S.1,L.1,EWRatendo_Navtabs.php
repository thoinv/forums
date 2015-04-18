<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<ul class="secondaryContent blockLinksList">
	<li><a href="' . XenForo_Template_Helper_Core::link('events/monthly', false, array()) . '">' . 'Monthly View' . '</a></li>
	<li><a href="' . XenForo_Template_Helper_Core::link('events/weekly', false, array()) . '">' . 'Weekly View' . '</a></li>
	<li><a href="' . XenForo_Template_Helper_Core::link('events/upcoming', false, array()) . '">' . 'Upcoming Events' . '</a></li>
	<li><a href="' . XenForo_Template_Helper_Core::link('events/history', false, array()) . '">' . 'Events Archive' . '</a></li>
</ul>';
