<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'discussion_list');
$__output .= '

<li id="conversation-' . htmlspecialchars($conversation['conversation_id'], ENT_QUOTES, 'UTF-8') . '" class="discussionListItem ' . (($conversation['isNew']) ? ('unread') : ('')) . '" data-author="' . htmlspecialchars($conversation['username'], ENT_QUOTES, 'UTF-8') . '">

	<div class="listBlock posterAvatar">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($conversation,(true),array(
'user' => '$conversation',
'size' => 's',
'img' => 'true'
),'')) . '</div>			
		
	<div class="listBlock main">
		<div class="titleText">
			';
$__compilerVar1 = '';
$__compilerVar1 .= '
					';
if ($conversation['is_starred'])
{
$__compilerVar1 .= '<a href="' . XenForo_Template_Helper_Core::link('conversations/starred', false, array()) . '"><span class="starred" title="' . 'Starred' . '">' . 'Starred' . '</span></a>';
}
$__compilerVar1 .= '
				';
if (trim($__compilerVar1) !== '')
{
$__output .= '
				<div class="iconKey">
				' . $__compilerVar1 . '
				</div>
			';
}
unset($__compilerVar1);
$__output .= '

			<h3 class="title">
				<input type="checkbox" name="conversations[]" value="' . htmlspecialchars($conversation['conversation_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-conversation-' . htmlspecialchars($conversation['conversation_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#conversation-' . htmlspecialchars($conversation['conversation_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select conversation' . ': \'' . htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8') . '\'" />
				<a href="' . XenForo_Template_Helper_Core::link('conversations' . (($conversation['isNew']) ? ('/unread') : ('')), $conversation, array()) . '">' . XenForo_Template_Helper_Core::callHelper('wrap', array(
'0' => $conversation['title'],
'1' => '50'
)) . '</a>
				';
if ($visitor['user_id'])
{
$__output .= '<a href="' . XenForo_Template_Helper_Core::link('conversations/toggle-read', $conversation, array()) . '" class="ReadToggle"
					data-counter="#ConversationsMenu_Counter"
					title="' . (($conversation['isNew']) ? ('Mark as Read') : ('Mark as Unread')) . '"></a>';
}
$__output .= '
			</h3>

			<div class="secondRow">
				<div class="posterDate muted">
					' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($conversation,'',false,array(
'title' => 'Conversation Starter'
))) . ',
					';
foreach ($conversation['recipientNames'] AS $recipient)
{
$__output .= '
						';
if ($recipient['user_id'] != $conversation['user_id'])
{
$__output .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($recipient,(($recipient['user_id']) ? (htmlspecialchars($recipient['username'], ENT_QUOTES, 'UTF-8')) : ('Unknown Member')),false,array())) . ',';
}
$__output .= '
					';
}
$__output .= '

					<a href="' . XenForo_Template_Helper_Core::link('conversations', $conversation, array()) . '" class="faint">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($conversation['start_date'],array(
'time' => '$conversation.start_date'
))) . '</a>
									
					';
if ($conversation['lastPageNumbers'])
{
$__output .= '
						<span class="itemPageNav">
							<span>...</span>
							';
foreach ($conversation['lastPageNumbers'] AS $pageNumber)
{
$__output .= '
								<a href="' . XenForo_Template_Helper_Core::link('conversations', $conversation, array(
'page' => $pageNumber
)) . '">' . htmlspecialchars($pageNumber, ENT_QUOTES, 'UTF-8') . '</a>
							';
}
$__output .= '
						</span>
					';
}
$__output .= '
				</div>
			</div>
		</div>
	</div>
		
	<div class="listBlock stats pairsJustified">
		<dl class="major"><dt>' . 'Replies' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($conversation['reply_count'], '0') . '</dd></dl>
		<dl class="minor"><dt>' . 'Participants' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($conversation['recipient_count'], '0') . '</dd></dl>
	</div>

	<div class="listBlock lastPost">
		<dl class="lastPostInfo">
			<dt>' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($conversation['last_message'],'',false,array())) . '</dt>
			<dd class="muted"><a href="' . XenForo_Template_Helper_Core::link('conversations/message', $conversation, array(
'message_id' => $conversation['last_message_id']
)) . '" class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($conversation['last_message_date'],array(
'time' => '$conversation.last_message_date'
))) . '</a></dd>
		</dl>
	</div>
	
</li>';
