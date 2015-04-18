<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'message_simple');
$__output .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__output .= '

<li id="' . htmlspecialchars($messageId, ENT_QUOTES, 'UTF-8') . '" class="primaryContent messageSimple ' . (($message['isDeleted']) ? ('deleted') : ('')) . ' ' . (($message['is_staff']) ? ('staff') : ('')) . ' ' . (($message['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($message['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($message,(true),array(
'user' => '$message',
'size' => 's',
'img' => 'true'
),'')) . '
	
	<div class="messageInfo">
		
		';
$__compilerVar3 = '';
$__compilerVar3 .= '
					';
$__compilerVar4 = '';
$__compilerVar4 .= '
						';
if ($message['warning_message'])
{
$__compilerVar4 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($message['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar4 .= '
						';
if ($message['isDeleted'])
{
$__compilerVar4 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Bị xóa' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($message['isModerated'])
{
$__compilerVar4 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar4 .= '
						';
if ($message['isIgnored'])
{
$__compilerVar4 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="JsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar4 .= '
					';
$__compilerVar3 .= $this->callTemplateHook('message_simple_notices', $__compilerVar4, array(
'message' => $message
));
unset($__compilerVar4);
$__compilerVar3 .= '
				';
if (trim($__compilerVar3) !== '')
{
$__output .= '
			<ul class="messageNotices">
				' . $__compilerVar3 . '
			</ul>
		';
}
unset($__compilerVar3);
$__output .= '

		<div class="messageContent">
			';
if ($messagePosterHtml)
{
$__output .= '
				' . $messagePosterHtml . '
			';
}
else
{
$__output .= '
				' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($message,'',(true),array(
'class' => 'poster'
))) . '
			';
}
$__output .= '
			<article><blockquote class="ugc baseHtml' . (($message['isIgnored']) ? (' ignored') : ('')) . '">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $message['message']
)) . '</blockquote></article>
		</div>

		' . $messageAfterTemplate . '
	</div>
</li>';
