<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($xenOptions['AdvBBcodeBar_bimg_moveev_load'] == 1)
{
$__output .= '
	';
if ($xenOptions['AdvBBcodeBar_debug_devmode'])
{
$__output .= '
		<script src="' . XenForo_Template_Helper_Core::callHelper('javaScriptUrl', array(
'0' => $javaScriptSource . '/sedo/advtoolbar/twentytwenty/src/jquery.event.move.js?_v=' . $xenOptions['jsVersion']
)) . '"></script>
	';
}
else
{
$__output .= '
		<script src="' . XenForo_Template_Helper_Core::callHelper('javaScriptUrl', array(
'0' => $javaScriptSource . '/sedo/advtoolbar/twentytwenty/jquery.event.move.js?_v=' . $xenOptions['jsVersion']
)) . '"></script>
	';
}
$__output .= '
';
}
