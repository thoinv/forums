<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<dl>
    <dt>' . 'Most Online Users' . ':</dt>
    <dd class="Tooltip" title="' . XenForo_Template_Helper_Core::datetime($ragtek_mostOnlineUsersTime, 'absolute') . '">
		';
if ($visitor['is_admin'])
{
$__output .= '
			<a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('misc/reset-most-online', '', array(
'redirect' => $requestPaths['requestUri']
)) . '">' . XenForo_Template_Helper_Core::numberFormat($ragtek_mostOnlineUsersCounter, '0') . '</a>
			';
}
else
{
$__output .= XenForo_Template_Helper_Core::numberFormat($ragtek_mostOnlineUsersCounter, '0') . '
		';
}
$__output .= '
	</dd>
</dl>
';
