<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
if ($conversation['isNew'])
{
$__extraData['title'] .= 'Mark as Read';
}
else
{
$__extraData['title'] .= 'Mark as Unread';
}
$__extraData['title'] .= ': ' . htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:conversations', $conversation, array()), 'value' => htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('conversations/toggle-read', $conversation, array()) . '" method="post" class="xenForm formOverlay">
	
	<p>';
if ($conversation['isNew'])
{
$__output .= 'Are you sure you want to mark the conversation \'<strong>' . htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8') . '</strong>\' as read?' . '
		';
}
else
{
$__output .= 'Are you sure you want to mark the conversation \'<strong>' . htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8') . '</strong>\' as unread?';
}
$__output .= '</p>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . (($conversation['isNew']) ? ('Mark as Read') : ('Mark as Unread')) . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
