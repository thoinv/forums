<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'message_simple');
$__output .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__output .= '

<div class="commentWrapper">
	<div id="' . htmlspecialchars($messageId, ENT_QUOTES, 'UTF-8') . '" class="messageSimple ' . (($message['isDeleted']) ? ('deleted') : ('')) . ' ' . (($message['is_admin'] OR $message['is_moderator']) ? ('staff') : ('')) . ' ' . (($message['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($message['username'], ENT_QUOTES, 'UTF-8') . '">

		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($message,false,array(
'user' => '$message',
'size' => 's'
),'')) . '
		
		<div class="messageInfo">
			
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
				<a href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $message, array())) : (XenForo_Template_Helper_Core::link('members', $message, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . ' poster">' . htmlspecialchars($message['username'], ENT_QUOTES, 'UTF-8') . '</a>
				<article><blockquote class="ugc baseHtml">' . $message['descriptionHtml'] . '</blockquote></article>
				' . $messageAfterContent . '
			</div>

			' . $messageAfterTemplate . '
		</div>
	</div>
</div>';
