<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= (($conversation['is_starred']) ? ('Unstar Conversation') : ('Star Conversation')) . ': ' . htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:conversations', $conversation, array()), 'value' => htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('conversations/toggle-starred', $conversation, array()) . '" method="post" class="xenForm formOverlay">
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . (($conversation['is_starred']) ? ('Unstar Conversation') : ('Star Conversation')) . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
