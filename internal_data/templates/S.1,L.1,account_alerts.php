<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Latest Alerts';
$__output .= '

' . '

<div>

	';
if ($alerts)
{
$__output .= '
		<ol class="alerts alertsScroller">
		';
foreach ($alerts AS $date => $alertsDay)
{
$__output .= '
			<li class="alertGroup">
				<h2 class="textHeading">' . htmlspecialchars($date, ENT_QUOTES, 'UTF-8') . '</h2>
				<ol>
				';
foreach ($alertsDay AS $alert)
{
$__output .= '
					<li id="alert' . htmlspecialchars($alert['alert_id'], ENT_QUOTES, 'UTF-8') . '" class="primaryContent ' . (($alert['new']) ? ('new') : ('')) . (($alert['unviewed']) ? (' unviewed') : ('')) . '" data-author="' . htmlspecialchars($alert['user']['username'], ENT_QUOTES, 'UTF-8') . '">
						' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($alert['user'],(true),array(
'user' => '$alert.user',
'size' => 's',
'img' => 'true',
'class' => 'plainImage'
),'')) . '
						<div class="alertText">
							<h3>' . $alert['template'] . '</h3>
							<div class="timeRow"><span class="time muted">' . XenForo_Template_Helper_Core::time($alert['event_date'], '') . '</span>';
if ($alert['new'])
{
$__output .= '<span class="newIcon"></span>';
}
$__output .= '</div>
						</div>
					</li>
				';
}
$__output .= '
				</ol>
			</li>
		';
}
$__output .= '
		</ol>
		
		' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalAlerts, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'account/alerts', false, array(), false, array())) . '
			
	';
}
else
{
$__output .= '
	
		<p>' . 'You do not have any recent alerts.' . '</p>
		
	';
}
$__output .= '
	
</div>';
