<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li class="Alert listItem' . (($alert['new']) ? (' new') : ('')) . (($alert['unviewed']) ? (' unviewed') : ('')) . ' PopupItemLink" id="alert' . htmlspecialchars($alert['alert_id'], ENT_QUOTES, 'UTF-8') . '" data-author="' . htmlspecialchars($alert['user']['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($alert['user'],(true),array(
'user' => '$alert.user',
'size' => 's',
'img' => 'true',
'class' => 'plainImage'
),'')) . '
	
	<div class="listItemText">
		<h3>' . $alert['template'] . '</h3>
	
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($alert['event_date'],array(
'time' => '$alert.event_date',
'class' => 'muted time'
)));
if ($alert['new'])
{
$__output .= '<span class="newIcon"></span>';
}
$__output .= '
	</div>
</li>';
