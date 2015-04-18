<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<ul class="secondaryContent blockLinksList">
	';
if ($visitor['user_id'])
{
$__output .= '<li><a href="' . XenForo_Template_Helper_Core::link('watched/threads', false, array()) . '">' . 'Watched Threads' . '</a></li>';
}
$__output .= '
	<li><a href="' . XenForo_Template_Helper_Core::link('recent-activity', false, array()) . '">' . 'Recent Activity' . '</a></li>
	<li><a href="' . XenForo_Template_Helper_Core::link('find-new/threads', false, array()) . '">' . 'What\'s New?' . '</a></li>
	<li><a href="' . XenForo_Template_Helper_Core::link('help', false, array()) . '">' . 'Help' . '</a></li>
	';
if ($perms['custom'])
{
$__output .= '
		<li style="width: 50px; height: 10px;"></li>
		<li><a href="' . XenForo_Template_Helper_Core::link('portal/blocks', false, array()) . '">' . 'Customize This Page' . '</a></li>
	';
}
$__output .= '
</ul>';
