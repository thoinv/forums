<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'message_simple');
$__output .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__output .= '

<li id="' . htmlspecialchars($messageId, ENT_QUOTES, 'UTF-8') . '" class="primaryContent messageSimple ' . (($message['isDeleted']) ? ('deleted') : ('')) . ' ' . (($message['is_admin'] OR $message['is_moderator']) ? ('staff') : ('')) . ' ' . (($message['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($message['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($message,false,array(
'user' => '$message',
'size' => 's'
),'')) . '
	
	<div class="messageInfo">
		';
if ($message['isNew'])
{
$__output .= '<strong class="newIndicator"><span></span>' . 'New' . '</strong>';
}
$__output .= '

		';
$__compilerVar1 = '';
$__compilerVar1 .= '
					';
$__compilerVar2 = '';
$__compilerVar2 .= '
						';
if ($message['warning_message'])
{
$__compilerVar2 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($message['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar2 .= '
						';
if ($message['isDeleted'])
{
$__compilerVar2 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Deleted' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($message['isModerated'])
{
$__compilerVar2 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar2 .= '
						';
if ($message['isIgnored'])
{
$__compilerVar2 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="jsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar2 .= '
					';
$__compilerVar1 .= $this->callTemplateHook('message_simple_notices', $__compilerVar2, array(
'message' => $message
));
unset($__compilerVar2);
$__compilerVar1 .= '
				';
if (trim($__compilerVar1) !== '')
{
$__output .= '
			<ul class="messageNotices">
				' . $__compilerVar1 . '
			</ul>
		';
}
unset($__compilerVar1);
$__output .= '

		<div class="messageContent">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($message,'',false,array(
'class' => 'poster'
))) . '
			<article><blockquote class="ugc baseHtml' . (($message['isIgnored']) ? (' ignored') : ('')) . '">' . $message['messageHtml'] . '</blockquote></article>

			' . $messageContentAfterTemplate . '
		</div>

		';
$__compilerVar3 = '';
$__output .= $this->callTemplateHook('dark_postrating_likes_bar_xenporta', $__compilerVar3, array(
'post' => $message,
'message_id' => $messageId
));
unset($__compilerVar3);
$__output .= '

		' . $messageAfterTemplate . '
	</div>
</li>
';
