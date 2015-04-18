<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'modm_ajaxchat_shoutbox');
$__output .= '

';
$__extraData['title'] = '';
$__extraData['title'] .= 'Shoutbox';
$__output .= '

';
$__extraData['head']['noindex'] = '';
$__extraData['head']['noindex'] .= '
	<meta name="robots" content="noindex" />';
$__output .= '

';
$logoutButton = '';
$logoutButton .= '<a class="callToAction" onclick="javascript:ajaxChat.logout();" href="javascript:void(0)"><span>' . 'Log Out' . '</span></a>';
$__output .= '
';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= $logoutButton;
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('chat/shoutbox', false, array()), 'value' => 'Shoutbox');
$__output .= '

<div class="ajaxChatBlock">
	<div id="ajaxChatContent">
		' . $ajaxchat_shoutbox . '
	</div>
</div>

<form id="ajaxchat_logout_form" action="' . XenForo_Template_Helper_Core::link('chat/logout', false, array()) . '" method="post">
<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
