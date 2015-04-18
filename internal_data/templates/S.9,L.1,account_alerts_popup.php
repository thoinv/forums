<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= '
		';
if ($alertsUnread)
{
$__compilerVar1 .= '
			<ol class="Unread secondaryContent" data-defaultBackground="' . XenForo_Template_Helper_Core::styleProperty('secondaryContent.background-color') . '">
				';
foreach ($alertsUnread AS $alert)
{
$__compilerVar2 = '';
$__compilerVar2 .= '<li class="Alert listItem' . (($alert['new']) ? (' new') : ('')) . (($alert['unviewed']) ? (' unviewed') : ('')) . ' PopupItemLink" id="alert' . htmlspecialchars($alert['alert_id'], ENT_QUOTES, 'UTF-8') . '" data-author="' . htmlspecialchars($alert['user']['username'], ENT_QUOTES, 'UTF-8') . '">

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
$__compilerVar2 .= '<span class="newIcon"></span>';
}
$__compilerVar2 .= '
	</div>
</li>';
$__compilerVar1 .= $__compilerVar2;
unset($__compilerVar2);
}
$__compilerVar1 .= '
			</ol>
		';
}
$__compilerVar1 .= '
		';
if ($alertsRead)
{
$__compilerVar1 .= '
			<ol class="secondaryContent">
				';
foreach ($alertsRead AS $alert)
{
$__compilerVar3 = '';
$__compilerVar3 .= '<li class="Alert listItem' . (($alert['new']) ? (' new') : ('')) . (($alert['unviewed']) ? (' unviewed') : ('')) . ' PopupItemLink" id="alert' . htmlspecialchars($alert['alert_id'], ENT_QUOTES, 'UTF-8') . '" data-author="' . htmlspecialchars($alert['user']['username'], ENT_QUOTES, 'UTF-8') . '">

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
$__compilerVar3 .= '<span class="newIcon"></span>';
}
$__compilerVar3 .= '
	</div>
</li>';
$__compilerVar1 .= $__compilerVar3;
unset($__compilerVar3);
}
$__compilerVar1 .= '
			</ol>
		';
}
$__compilerVar1 .= '
	';
if (trim($__compilerVar1) !== '')
{
$__output .= '
	<div class="alertsPopup">
	' . $__compilerVar1 . '
	</div>
';
}
else
{
$__output .= '
	<div class="secondaryContent noItems">' . 'You have no new alerts.' . '</div>
';
}
unset($__compilerVar1);
