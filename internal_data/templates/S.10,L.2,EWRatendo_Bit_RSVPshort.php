<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li class="' . (($rsvp['rsvp_message']) ? ('Tooltip') : ('')) . '" title="' . htmlspecialchars($rsvp['rsvp_message'], ENT_QUOTES, 'UTF-8') . '">
	<a href="' . XenForo_Template_Helper_Core::link('members', $rsvp, array()) . '" class="username">' . htmlspecialchars($rsvp['username'], ENT_QUOTES, 'UTF-8') . '</a>
</li>';
