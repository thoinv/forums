<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($xenOptions['facebookAppId'])
{
$__output .= '
	';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__output .= '
	<fb:facepile width="' . XenForo_Template_Helper_Core::styleProperty('sidebar.width') . '" size="small" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:facepile>
';
}
