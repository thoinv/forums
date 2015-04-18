<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Edit Conversation' . ': ' . htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:conversations', $conversation, array()), 'value' => htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('conversations/update', $conversation, array()) . '" method="post" class="xenForm formOverlay">
	<dl class="ctrlUnit">
		<dt><label for="ctrl_title">' . 'Title' . ':</label></dt>
		<dd><input type="text" name="title" id="ctrl_title" value="' . htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" data-liveTitleTemplate="' . 'Edit Conversation' . ': <em>%s</em>" maxlength="100" /></dd>
	</dl>

	<dl class="ctrlUnit">
		<dt></dt>
		<dd>
			<ul>
				<li><label for="ctrl_open_invite"><input type="checkbox" name="open_invite" id="ctrl_open_invite" value="1" ' . (($conversation['open_invite']) ? ' checked="checked"' : '') . ' /> ' . 'Allow anyone in the conversation to invite others' . '</label></li>
				<li><label for="ctrl_conversation_locked"><input type="checkbox" name="conversation_locked" id="ctrl_conversation_locked" value="1" ' . ((!$conversation['conversation_open']) ? ' checked="checked"' : '') . ' /> ' . 'Lock conversation' . '</label> <p class="hint">' . 'No responses will be allowed' . '</p></li>
			</ul>
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Save Changes' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
