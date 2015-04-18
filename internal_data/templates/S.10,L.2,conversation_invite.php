<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Invite Members to Conversation';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:conversations', $conversation, array()), 'value' => htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

';
$this->addRequiredExternal('js', 'js/xenforo/conversation_invite.js');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('conversations/invite-insert', $conversation, array()) . '" method="post"
	class="xenForm formOverlay AutoValidator" id="ConversationInvitationForm">
	
	<dl class="ctrlUnit">
		<dt><label for="ctrl_recipients">' . 'Invite Members' . ':</label></dt>
		<dd>
			<input type="text" name="recipients" id="ctrl_recipients" rows="2" class="textCtrl AutoComplete OptOut" />
			<p class="explain">
				' . 'Dãn cách tên bằng dấu phẩy(,).' . ' ' . 'Invited members will be able to see the entire conversation from the beginning.' . '
				';
if ($remaining > 0)
{
$__output .= 'You may invite up to ' . XenForo_Template_Helper_Core::numberFormat($remaining, '0') . ' member(s).';
}
$__output .= '
			</p>
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Invite Members' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
