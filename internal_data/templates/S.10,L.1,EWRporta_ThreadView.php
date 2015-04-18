<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= '
	<a href="' . XenForo_Template_Helper_Core::link('threads/promote', $thread, array()) . '" class="callToAction OverlayTrigger" data-cacheOverlay="false">
		<span>';
if ($promotion)
{
$__extraData['topctrl'] .= 'Promote Options';
}
else
{
$__extraData['topctrl'] .= 'Promote Thread';
}
$__extraData['topctrl'] .= '</span>
	</a>
';
