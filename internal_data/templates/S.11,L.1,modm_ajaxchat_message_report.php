<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Chat' . ' - ' . 'Report chat message';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Report chat message';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('chat/report', $chatMessage, array()) . '" method="post" class="xenForm formOverlay AutoValidator">

	<dl class="ctrlUnit">
		<dt><label for="ctrl_message">' . 'Report Reason' . ':</label></dt>
		<dd><textarea name="message" id="ctrl_message" rows="2" class="textCtrl Elastic"></textarea></dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Report message' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
