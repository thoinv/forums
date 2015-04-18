<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<ul class="secondaryContent blockLinksList">
';
if ($perms['canAccessChat'])
{
$__output .= '
	<li><a href="' . XenForo_Template_Helper_Core::link('chat/login', false, array()) . '">' . 'Shoutbox' . '</a></li>
';
}
$__output .= '
	<li><a href="' . XenForo_Template_Helper_Core::link('chat/online', false, array()) . '">' . 'Who\'s chatting now?' . '</a></li>
';
if ($perms['canModerateChat'])
{
$__output .= '
	<li><a href="' . XenForo_Template_Helper_Core::link('chat/chat-logs', false, array()) . '">' . 'Chat logs' . '</a></li>
';
}
$__output .= '
</ul>';
