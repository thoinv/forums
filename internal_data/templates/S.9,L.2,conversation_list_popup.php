<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Đối thoại';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:account', false, array()), 'value' => 'Tài khoản của bạn');
$__output .= '

';
$__compilerVar4 = '';
$__compilerVar4 .= '
			';
if ($conversationsUnread)
{
$__compilerVar4 .= '
				<ol class="Unread secondaryContent" data-defaultBackground="' . XenForo_Template_Helper_Core::styleProperty('secondaryContent.background-color') . '">
					';
foreach ($conversationsUnread AS $conversation)
{
$__compilerVar5 = '';
$__compilerVar5 .= '<li class="listItem' . (($conversation['isNew']) ? (' unread') : ('')) . ' PopupItemLink">

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
$__compilerVar5 .= ', ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($recipient,(($recipient['user_id']) ? (htmlspecialchars($recipient['username'], ENT_QUOTES, 'UTF-8')) : ('Unknown Member')),false,array()));
}
}
$__compilerVar5 .= '
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
$__compilerVar4 .= $__compilerVar5;
unset($__compilerVar5);
}
$__compilerVar4 .= '
				</ol>
			';
}
$__compilerVar4 .= '
			';
if ($conversationsRead)
{
$__compilerVar4 .= '
				<ol class="secondaryContent">
					';
foreach ($conversationsRead AS $conversation)
{
$__compilerVar6 = '';
$__compilerVar6 .= '<li class="listItem' . (($conversation['isNew']) ? (' unread') : ('')) . ' PopupItemLink">

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
$__compilerVar6 .= ', ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($recipient,(($recipient['user_id']) ? (htmlspecialchars($recipient['username'], ENT_QUOTES, 'UTF-8')) : ('Unknown Member')),false,array()));
}
}
$__compilerVar6 .= '
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
$__compilerVar4 .= $__compilerVar6;
unset($__compilerVar6);
}
$__compilerVar4 .= '
				</ol>
			';
}
$__compilerVar4 .= '
		';
if (trim($__compilerVar4) !== '')
{
$__output .= '
	<div>
		' . $__compilerVar4 . '
	</div>
';
}
else
{
$__output .= '
	<div class="secondaryContent noItems">' . 'Bạn chưa có đối thoại nào gần đây' . '</div>
';
}
unset($__compilerVar4);
