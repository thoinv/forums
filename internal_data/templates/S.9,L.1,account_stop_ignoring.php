<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Stop Ignoring ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:account/ignored', false, array()), 'value' => 'People You Ignore');
$__output .= '

';
$this->addRequiredExternal('css', 'delete_confirmation');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('account/stop-ignoring', false, array()) . '" method="post" class="deleteConfirmForm">
	<p>' . 'Please confirm that you want to stop ignoring ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '.' . '</p>

	<input type="hidden" name="user_id" value="' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="submit" value="' . 'Stop Ignoring ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '' . '" accesskey="s" class="button primary" />
</form>';
