<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Leave Conversation' . ': ' . htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:conversations', $conversation, array()), 'value' => htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('conversations/leave', $conversation, array()) . '" method="post" class="xenForm formOverlay">
	
	<p>' . 'Leaving a conversation will remove it from your conversation list.' . '</p>

	<dl class="ctrlUnit">
		<dt><label for="delete_type_delete">' . 'Future Message Handling' . ':</label></dt>
		<dd>
			<ul>
				<li><label for="delete_type_delete">
					<input type="radio" name="delete_type" value="delete" id="delete_type_delete" checked="checked" /> ' . 'Accept future messages' . '</label>
					<p class="hint">' . 'Should this conversation receive further responses in the future, this conversation will be restored to your inbox.' . '</p>
				</li>
				<li><label for="delete_type_delete_ignore">
					<input type="radio" name="delete_type" value="delete_ignore" id="delete_type_delete_ignore" /> ' . 'Ignore future messages' . '</label>
					<p class="hint">' . 'You will not be notified of any future responses and the conversation will remain deleted.' . '</p>
				</li>
			</ul>
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Leave Conversation' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
