<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Stop following ' . htmlspecialchars($followed['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:account/following', false, array()), 'value' => 'People You Follow');
$__output .= '

';
$this->addRequiredExternal('css', 'delete_confirmation');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('account/stop-following', $followed, array()) . '" method="post" class="deleteConfirmForm">
	<p>' . 'Please confirm that you want to stop following ' . htmlspecialchars($followed['username'], ENT_QUOTES, 'UTF-8') . '.' . '</p>

	<input type="hidden" name="user_id" value="' . htmlspecialchars($followed['user_id'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="submit" value="' . 'Stop following ' . htmlspecialchars($followed['username'], ENT_QUOTES, 'UTF-8') . '' . '" accesskey="s" class="button primary" />
</form>';
