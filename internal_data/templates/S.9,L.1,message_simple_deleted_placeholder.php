<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'message_simple');
$__output .= '

<li id="' . htmlspecialchars($messageId, ENT_QUOTES, 'UTF-8') . '" class="messageSimple deleted placeholder ' . (($message['isIgnored']) ? ('ignored') : ('')) . '">

	<div class="placeholderContent secondaryContent">

		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($message,(true),array(
'user' => '$message',
'size' => 's',
'img' => 'true'
),'')) . '
				
		<p>
			' . 'This message by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $message
)) . ' has been removed from public view.' . '
			';
if ($message['delete_username'])
{
$__output .= '
				' . 'Deleted by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $message['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($message['delete_date'],array(
'time' => htmlspecialchars($message['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($message['delete_reason'])
{
$__output .= ', ' . 'Reason' . ': ' . htmlspecialchars($message['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__output .= '.
			';
}
$__output .= '
		</p>
		<div class="privateControls">' . $messageControlsTemplate . '</div>
		
	</div>

</li>';
