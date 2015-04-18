<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<script src="' . XenForo_Template_Helper_Core::callHelper('javaScriptUrl', array(
'0' => $javaScriptSource . '/bbm/zloader.js?_v=' . $xenOptions['jsVersion']
)) . '"></script>

';
if (!$xenOptions['bbm_debug_tinymcehookdisable'] AND ($visitor['user_id'] OR !$xenOptions['bbm_debug_redactor_js_loader_novisitor']))
{
$__output .= '
	';
if ($xenOptions['bbm_debug_redactor_js_global'])
{
$__output .= '
		<script src="' . XenForo_Template_Helper_Core::callHelper('javaScriptUrl', array(
'0' => $javaScriptSource . '/bbm/redactor/bbm_redactor.js?_v=' . $xenOptions['jsVersion']
)) . '"></script>	
	';
}
$__output .= '
';
}
