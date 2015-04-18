<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Events on ' . htmlspecialchars($month, ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($day, ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars($year, ENT_QUOTES, 'UTF-8') . '';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Events on ' . htmlspecialchars($month, ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($day, ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars($year, ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$this->addRequiredExternal('css', 'EWRatendo');
$__output .= '

<div class="section eventDaily">
	<div class="subHeading">' . 'Sự kiện' . '</div>

	<ol class="overlayScroll">
	';
foreach ($events AS $event)
{
$__output .= '
		';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar2 .= '

<li class="primaryContent memberListItem">
	<div class="avatar Av1s">
		<span class="img s" style="background-image: url(\'' . XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $event,
'1' => 's'
)) . '\');"></span>
	</div>

	<div class="extra"><i>' . htmlspecialchars($event['event_venue'], ENT_QUOTES, 'UTF-8') . '</i></div>

	<div class="member">
		<h3 class="username"><a href="' . XenForo_Template_Helper_Core::link('events', $event, array()) . '"><b>' . htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8') . '</b></a></h3>

		<div class="userInfo dimmed">
			';
if ($event['event_address'])
{
$__compilerVar2 .= '
				<i>' . htmlspecialchars($event['event_address'], ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars($event['event_citystate'], ENT_QUOTES, 'UTF-8') . '</i><br />
			';
}
else
{
$__compilerVar2 .= '
				<i>' . htmlspecialchars($event['event_venue'], ENT_QUOTES, 'UTF-8') . '</i><br />
			';
}
$__compilerVar2 .= '
			<b>' . htmlspecialchars($event['formatted_strtime'], ENT_QUOTES, 'UTF-8') . '</b> ' . 'to' . ' <b>' . htmlspecialchars($event['formatted_endtime'], ENT_QUOTES, 'UTF-8') . '</b> (' . htmlspecialchars($event['formatted_timezone'], ENT_QUOTES, 'UTF-8') . ')
		</div>		
	</div>
</li>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
	';
}
$__output .= '
	</ol>

	<div class="sectionFooter overlayOnly"><a class="button primary OverlayCloser">' . 'Đóng' . '</a></div>
</div>';
