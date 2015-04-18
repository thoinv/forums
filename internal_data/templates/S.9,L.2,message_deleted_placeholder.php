<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'message');
$__output .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__output .= '

<li id="' . htmlspecialchars($messageId, ENT_QUOTES, 'UTF-8') . '" class="message deleted placeholder ' . (($message['isIgnored']) ? ('ignored') : ('')) . '">
	<div class="placeholderContent">

		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($message,(true),array(
'user' => '$message',
'size' => 's',
'img' => 'true'
),'')) . '
		
		<div class="messageInfo primaryContent">
			<div>
				' . 'This message by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $message
)) . ' has been removed from public view.' . '
				
				';
if ($message['delete_username'])
{
$__output .= '
					' . 'Bị xóa bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $message['deleteInfo']
)) . '' . ',
					' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($message['delete_date'],array(
'time' => htmlspecialchars($message['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($message['delete_reason'])
{
$__output .= ', ' . 'Lý do' . ': ' . htmlspecialchars($message['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__output .= '.
				';
}
$__output .= '
			</div>
			
			';
$__compilerVar2 = '';
$__output .= $this->callTemplateCallback('DigitalPointAdPositioning_Callback_AdBelowPost', 'renderAdCounterAdvance', $__compilerVar2, array());
unset($__compilerVar2);
$__output .= '
<div class="messageMeta">
				<div class="privateControls">' . $messageControlsTemplate . '</div>
			</div>
		</div>
		
	</div>
</li>';
