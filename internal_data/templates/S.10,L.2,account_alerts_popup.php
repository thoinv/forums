<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar4 = '';
$__compilerVar4 .= '
		';
if ($alertsUnread)
{
$__compilerVar4 .= '
			<ol class="Unread secondaryContent" data-defaultBackground="' . XenForo_Template_Helper_Core::styleProperty('secondaryContent.background-color') . '">
				';
foreach ($alertsUnread AS $alert)
{
$__compilerVar5 = '';
$__compilerVar5 .= '<li class="Alert listItem' . (($alert['new']) ? (' new') : ('')) . (($alert['unviewed']) ? (' unviewed') : ('')) . ' PopupItemLink" id="alert' . htmlspecialchars($alert['alert_id'], ENT_QUOTES, 'UTF-8') . '" data-author="' . htmlspecialchars($alert['user']['username'], ENT_QUOTES, 'UTF-8') . '">

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
$__compilerVar5 .= '<span class="newIcon"></span>';
}
$__compilerVar5 .= '
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
if ($alertsRead)
{
$__compilerVar4 .= '
			<ol class="secondaryContent">
				';
foreach ($alertsRead AS $alert)
{
$__compilerVar6 = '';
$__compilerVar6 .= '<li class="Alert listItem' . (($alert['new']) ? (' new') : ('')) . (($alert['unviewed']) ? (' unviewed') : ('')) . ' PopupItemLink" id="alert' . htmlspecialchars($alert['alert_id'], ENT_QUOTES, 'UTF-8') . '" data-author="' . htmlspecialchars($alert['user']['username'], ENT_QUOTES, 'UTF-8') . '">

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
$__compilerVar6 .= '<span class="newIcon"></span>';
}
$__compilerVar6 .= '
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
	<div class="alertsPopup">
	' . $__compilerVar4 . '
	</div>
';
}
else
{
$__output .= '
	<div class="secondaryContent noItems">' . 'Bạn không có thông báo mới nào' . '</div>
';
}
unset($__compilerVar4);
