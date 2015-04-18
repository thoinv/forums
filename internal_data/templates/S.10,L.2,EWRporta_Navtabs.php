<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<ul class="secondaryContent blockLinksList">
	';
if ($visitor['user_id'])
{
$__output .= '<li><a href="' . XenForo_Template_Helper_Core::link('watched/threads', false, array()) . '">' . 'Chủ đề đang theo dõi' . '</a></li>';
}
$__output .= '
	<li><a href="' . XenForo_Template_Helper_Core::link('recent-activity', false, array()) . '">' . 'Hoạt động gần đây' . '</a></li>
	<li><a href="' . XenForo_Template_Helper_Core::link('find-new/threads', false, array()) . '">' . 'Có gì mới?' . '</a></li>
	<li><a href="' . XenForo_Template_Helper_Core::link('help', false, array()) . '">' . 'Trợ giúp' . '</a></li>
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
