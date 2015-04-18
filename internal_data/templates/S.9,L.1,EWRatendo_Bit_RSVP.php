<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li>
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($rsvp,(true),array(
'user' => '$rsvp',
'size' => 's',
'img' => 'true'
),'')) . '

	<div class="rsvpInfo">
		<a href="' . XenForo_Template_Helper_Core::link('members', $rsvp, array()) . '" class="username ' . (($rsvp['rsvp_message']) ? ('Tooltip') : ('')) . '" title="' . htmlspecialchars($rsvp['rsvp_message'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($rsvp['username'], ENT_QUOTES, 'UTF-8') . '</a>
	</div>
</li>';
