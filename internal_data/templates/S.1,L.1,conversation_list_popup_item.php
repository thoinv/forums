<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li class="listItem' . (($conversation['isNew']) ? (' unread') : ('')) . ' PopupItemLink">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($conversation,(true),array(
'user' => '$conversation',
'size' => 's',
'img' => 'true',
'class' => 'plainImage'
),'')) . '
	
	<div class="listItemText">
		<h3 class="title"><a href="' . XenForo_Template_Helper_Core::link('conversations' . (($conversation['isNew']) ? ('/unread') : ('')), $conversation, array()) . '" class="PopupItemLink">' . htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

		<div class="posterDate muted">
			' . 'With' . ': ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($conversation,'',false,array(
'title' => 'Conversation Starter'
)));
foreach ($conversation['recipientNames'] AS $recipient)
{
if ($recipient['user_id'] != $conversation['user_id'])
{
$__output .= ', ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($recipient,(($recipient['user_id']) ? (htmlspecialchars($recipient['username'], ENT_QUOTES, 'UTF-8')) : ('Unknown Member')),false,array()));
}
}
$__output .= '
		</div>
		
		<div class="muted" title="' . 'Last reply by ' . htmlspecialchars($conversation['last_message_username'], ENT_QUOTES, 'UTF-8') . '' . '">
			' . 'Last message by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $conversation['last_message']
)) . '' . ',
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($conversation['last_message_date'],array(
'time' => htmlspecialchars($conversation['last_message_date'], ENT_QUOTES, 'UTF-8')
))) . '
		</div>
	</div>
	
</li>';
