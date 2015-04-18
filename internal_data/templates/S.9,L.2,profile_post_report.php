<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Profile post for ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '' . ' - ' . 'Báo cáo tin nhắn hồ sơ';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Báo cáo tin nhắn hồ sơ';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:members', $user, array()), 'value' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'));
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:profile-posts', $profilePost, array()), 'value' => 'Profile Post');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('profile-posts/report', $profilePost, array()) . '" method="post" class="xenForm formOverlay AutoValidator">

	<dl class="ctrlUnit">
		<dt><label for="ctrl_message">' . 'Lý do báo cáo' . ':</label></dt>
		<dd><textarea name="message" id="ctrl_message" rows="2" class="textCtrl Elastic"></textarea></dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Báo cáo tin nhắn hồ sơ' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
