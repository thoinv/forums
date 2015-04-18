<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$this->addRequiredExternal('css', 'EWRatendo');
$__output .= '

';
if ($event['event_state'] == ('moderated'))
{
$__output .= '
	<div class="sectionMain eventModerated">
		<div class="subHeading">' . 'This event is awaiting approval before it gets added to the calendar.' . '</div>
	</div>
';
}
else
{
$__output .= '
	';
if ($event['event_id'])
{
$__output .= '
		<div class="sectionMain" style="text-align: center;">
			';
if ($event['event_address'] || $event['event_citystate'])
{
$__output .= '
				';
$__compilerVar11 = '';
$__compilerVar11 .= '<div style="float: right; width: 350px; margin-top: -4px;">
	<div class="subHeading">
		';
if ($event['canEdit'])
{
$__compilerVar11 .= '<div style="float: right;">
			(<a href="' . XenForo_Template_Helper_Core::link('events/edit', $event, array()) . '">' . 'Sửa' . '</a>)
		</div>';
}
$__compilerVar11 .= '

		' . htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8') . '
	</div>

	<div class="secondaryContent">
		<b>' . 'Ngày gửi' . ':</b> ' . htmlspecialchars($event['formatted_strtime'], ENT_QUOTES, 'UTF-8') . '<br />
		<b>' . 'End Date' . ':</b> ' . htmlspecialchars($event['formatted_endtime'], ENT_QUOTES, 'UTF-8') . '<br />
		<span class="muted" style="font-size: 0.9em;"><i>' . 'Múi giờ' . ': ' . htmlspecialchars($event['event_timezone'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($event['formatted_timezone'], ENT_QUOTES, 'UTF-8') . '</i></span><br />
		<br />
		<b>' . 'Nơi ở' . ':</b><br />
		<i>' . htmlspecialchars($event['event_venue'], ENT_QUOTES, 'UTF-8') . '</i><br />' . htmlspecialchars($event['event_address'], ENT_QUOTES, 'UTF-8') . '<br />' . htmlspecialchars($event['event_citystate'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($event['event_zipcode'], ENT_QUOTES, 'UTF-8') . '<br />
		<br />
		<b>' . 'Đăng bởi' . ':</b> ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $event
)) . '<br />
		<br />
		<b>' . 'Confirmed Attendees' . ':</b> ' . htmlspecialchars($event['event_rsvps'], ENT_QUOTES, 'UTF-8') . ' ';
if ($event['event_guests'])
{
$__compilerVar11 .= '(+' . htmlspecialchars($event['event_guests'], ENT_QUOTES, 'UTF-8') . ' guests)';
}
$__compilerVar11 .= '
	</div>

	';
$__compilerVar12 = '';
if ($canRSVP && !$event['nowPast'] && $event['event_rsvp'])
{
$__compilerVar12 .= '
	';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar12 .= '

	<form action="' . XenForo_Template_Helper_Core::link('events/rsvp', $event, array()) . '" method="post" style="margin-bottom: 0px;" class="messageSimple secondaryContent">
		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,false,array(
'user' => '$visitor',
'size' => 's'
),'')) . '
		<div class="messageInfo">
			<textarea name="message" class="textCtrl StatusEditor" placeholder="' . 'Đăng bình luận' . '..." rows="3" cols="20" data-statusEditorCounter="#statusEditorCounter">' . htmlspecialchars($rsvps['user']['rsvp_message'], ENT_QUOTES, 'UTF-8') . '</textarea>
			<div style="float: left; margin: 10px 0px 0px -50px;">
				<label for="ctrl_yes"><input type="radio" name="rsvp_state" class="textCtrl" value="yes" id="ctrl_yes" ' . (($rsvps['user']['rsvp_state'] == ('yes')) ? ('checked') : ('')) . '> ' . 'Có' . '</label> &nbsp;
				<label for="ctrl_maybe"><input type="radio" name="rsvp_state" class="textCtrl" value="maybe" id="ctrl_maybe" ' . (($rsvps['user']['rsvp_state'] == ('maybe')) ? ('checked') : ('')) . '> ' . 'Maybe' . '</label> &nbsp;
				<label for="ctrl_no"><input type="radio" name="rsvp_state" class="textCtrl" value="no" id="ctrl_no" ' . (($rsvps['user']['rsvp_state'] == ('no')) ? ('checked') : ('')) . '> ' . 'No' . '</label>
			</div>
			<div class="submitUnit">
				<span id="statusEditorCounter" title="' . 'Số ký tự còn lại' . '"></span>
				<input type="hidden" name="rsvp_id" value="' . htmlspecialchars($rsvps['user']['rsvp_id'], ENT_QUOTES, 'UTF-8') . '" />
				<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
				<input type="submit" class="button primary" value="' . 'Đăng' . '" accesskey="s" />
			</div>
		</div>
	</form>
';
}
else
{
$__compilerVar12 .= '
	<div class="secondaryContent" style="text-align: center; margin-top: 10px;">
		<b>' . 'You can not RSVP for this event' . '...</b><br />
		<br />
		';
if ($event['nowPast'])
{
$__compilerVar12 .= '
			' . 'This event has already begun, or has already passed; RSVP has been since closed.' . '
		';
}
else if (!$event['event_rsvp'])
{
$__compilerVar12 .= '
			' . 'The organizer for this event has disabled the RSVP system; RSVP has been closed.' . '
		';
}
else
{
$__compilerVar12 .= '
			' . 'Upgrade Premium to download attachments.Contact Us : admin@webmasters.vn' . '
		';
}
$__compilerVar12 .= '
	</div>
';
}
$__compilerVar11 .= $__compilerVar12;
unset($__compilerVar12);
$__compilerVar11 .= '
</div>

<div style="margin-right: 360px;">
	<iframe width="100%" height="345" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
		src="' . htmlspecialchars($event['location'], ENT_QUOTES, 'UTF-8') . '"></iframe>
</div>';
$__output .= $__compilerVar11;
unset($__compilerVar11);
$__output .= '
			';
}
else
{
$__output .= '
				';
$__compilerVar13 = '';
$__compilerVar13 .= '<div style="float: right; width: 350px; margin-top: -10px;">
	';
$__compilerVar14 = '';
if ($canRSVP && !$event['nowPast'] && $event['event_rsvp'])
{
$__compilerVar14 .= '
	';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar14 .= '

	<form action="' . XenForo_Template_Helper_Core::link('events/rsvp', $event, array()) . '" method="post" style="margin-bottom: 0px;" class="messageSimple secondaryContent">
		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,false,array(
'user' => '$visitor',
'size' => 's'
),'')) . '
		<div class="messageInfo">
			<textarea name="message" class="textCtrl StatusEditor" placeholder="' . 'Đăng bình luận' . '..." rows="3" cols="20" data-statusEditorCounter="#statusEditorCounter">' . htmlspecialchars($rsvps['user']['rsvp_message'], ENT_QUOTES, 'UTF-8') . '</textarea>
			<div style="float: left; margin: 10px 0px 0px -50px;">
				<label for="ctrl_yes"><input type="radio" name="rsvp_state" class="textCtrl" value="yes" id="ctrl_yes" ' . (($rsvps['user']['rsvp_state'] == ('yes')) ? ('checked') : ('')) . '> ' . 'Có' . '</label> &nbsp;
				<label for="ctrl_maybe"><input type="radio" name="rsvp_state" class="textCtrl" value="maybe" id="ctrl_maybe" ' . (($rsvps['user']['rsvp_state'] == ('maybe')) ? ('checked') : ('')) . '> ' . 'Maybe' . '</label> &nbsp;
				<label for="ctrl_no"><input type="radio" name="rsvp_state" class="textCtrl" value="no" id="ctrl_no" ' . (($rsvps['user']['rsvp_state'] == ('no')) ? ('checked') : ('')) . '> ' . 'No' . '</label>
			</div>
			<div class="submitUnit">
				<span id="statusEditorCounter" title="' . 'Số ký tự còn lại' . '"></span>
				<input type="hidden" name="rsvp_id" value="' . htmlspecialchars($rsvps['user']['rsvp_id'], ENT_QUOTES, 'UTF-8') . '" />
				<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
				<input type="submit" class="button primary" value="' . 'Đăng' . '" accesskey="s" />
			</div>
		</div>
	</form>
';
}
else
{
$__compilerVar14 .= '
	<div class="secondaryContent" style="text-align: center; margin-top: 10px;">
		<b>' . 'You can not RSVP for this event' . '...</b><br />
		<br />
		';
if ($event['nowPast'])
{
$__compilerVar14 .= '
			' . 'This event has already begun, or has already passed; RSVP has been since closed.' . '
		';
}
else if (!$event['event_rsvp'])
{
$__compilerVar14 .= '
			' . 'The organizer for this event has disabled the RSVP system; RSVP has been closed.' . '
		';
}
else
{
$__compilerVar14 .= '
			' . 'Upgrade Premium to download attachments.Contact Us : admin@webmasters.vn' . '
		';
}
$__compilerVar14 .= '
	</div>
';
}
$__compilerVar13 .= $__compilerVar14;
unset($__compilerVar14);
$__compilerVar13 .= '
</div>


<div style="margin-right: 360px;">
	<div class="subHeading">
		';
if ($event['canEdit'])
{
$__compilerVar13 .= '<div style="float: right;">
			(<a href="' . XenForo_Template_Helper_Core::link('events/edit', $event, array()) . '">' . 'Sửa' . '</a>)
		</div>';
}
$__compilerVar13 .= '

		' . htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8') . '
	</div>

	<div class="secondaryContent" style="font-size: 1.2em;">
		<div style="float: right; text-align: right;">
			<i>' . htmlspecialchars($event['event_venue'], ENT_QUOTES, 'UTF-8') . '</i><br />
			<b>' . 'Confirmed Attendees' . ':</b> ' . htmlspecialchars($event['event_rsvps'], ENT_QUOTES, 'UTF-8') . ' ';
if ($event['event_guests'])
{
$__compilerVar13 .= '(+' . htmlspecialchars($event['event_guests'], ENT_QUOTES, 'UTF-8') . ' guests)';
}
$__compilerVar13 .= '<br />
			<span class="muted" style="font-size: 0.8em;"><i>' . 'Đăng bởi' . ': ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $event
)) . '</i></span>
		</div>

		<div style="text-align: left;">
			<b>' . 'Ngày gửi' . ':</b> ' . htmlspecialchars($event['formatted_strtime'], ENT_QUOTES, 'UTF-8') . '<br />
			<b>' . 'End Date' . ':</b> ' . htmlspecialchars($event['formatted_endtime'], ENT_QUOTES, 'UTF-8') . '<br />
			<span class="muted" style="font-size: 0.8em;"><i>' . 'Múi giờ' . ': ' . htmlspecialchars($event['event_timezone'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($event['formatted_timezone'], ENT_QUOTES, 'UTF-8') . '</i></span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar13;
unset($__compilerVar13);
$__output .= '
			';
}
$__output .= '

			<div style="clear: both;"></div>
		</div>
	';
}
$__output .= '

	';
if ($rsvps['yes'])
{
$__output .= '
		<div class="sectionMain rsvpList">
			<div class="subHeading">' . 'The following users have RSVP\'d "' . 'Có' . '"' . ': ' . htmlspecialchars($event['event_rsvps'], ENT_QUOTES, 'UTF-8') . ' ';
if ($event['event_guests'])
{
$__output .= '(+' . htmlspecialchars($event['event_guests'], ENT_QUOTES, 'UTF-8') . ' guests)';
}
$__output .= '</div>

			<ul>
				';
foreach ($rsvps['yes'] AS $rsvp)
{
$__output .= '
					';
$__compilerVar15 = '';
$__compilerVar15 .= '<li>
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($rsvp,(true),array(
'user' => '$rsvp',
'size' => 's',
'img' => 'true'
),'')) . '

	<div class="rsvpInfo">
		<a href="' . XenForo_Template_Helper_Core::link('members', $rsvp, array()) . '" class="username ' . (($rsvp['rsvp_message']) ? ('Tooltip') : ('')) . '" title="' . htmlspecialchars($rsvp['rsvp_message'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($rsvp['username'], ENT_QUOTES, 'UTF-8') . '</a>
	</div>
</li>';
$__output .= $__compilerVar15;
unset($__compilerVar15);
$__output .= '
				';
}
$__output .= '
			</ul>

			<div style="clear: both;"></div>
		</div>
	';
}
$__output .= '

	';
if ($rsvps['maybe'] || $rsvps['no'])
{
$__output .= '
		<div class="sectionMain rsvpShortList">
			';
$__compilerVar16 = '';
$__compilerVar16 .= '
					';
foreach ($rsvps['maybe'] AS $rsvp)
{
$__compilerVar16 .= '
						';
$__compilerVar17 = '';
$__compilerVar17 .= '<li class="' . (($rsvp['rsvp_message']) ? ('Tooltip') : ('')) . '" title="' . htmlspecialchars($rsvp['rsvp_message'], ENT_QUOTES, 'UTF-8') . '">
	<a href="' . XenForo_Template_Helper_Core::link('members', $rsvp, array()) . '" class="username">' . htmlspecialchars($rsvp['username'], ENT_QUOTES, 'UTF-8') . '</a>
</li>';
$__compilerVar16 .= $__compilerVar17;
unset($__compilerVar17);
$__compilerVar16 .= '
					';
}
$__compilerVar16 .= '
					';
if (trim($__compilerVar16) !== '')
{
$__output .= '
				' . 'The following users have RSVP\'d "' . 'Maybe' . '"' . ':
				<ul>
					' . $__compilerVar16 . '
				</ul><br />
			';
}
unset($__compilerVar16);
$__output .= '

			';
$__compilerVar18 = '';
$__compilerVar18 .= '
					';
foreach ($rsvps['no'] AS $rsvp)
{
$__compilerVar18 .= '
						';
$__compilerVar19 = '';
$__compilerVar19 .= '<li class="' . (($rsvp['rsvp_message']) ? ('Tooltip') : ('')) . '" title="' . htmlspecialchars($rsvp['rsvp_message'], ENT_QUOTES, 'UTF-8') . '">
	<a href="' . XenForo_Template_Helper_Core::link('members', $rsvp, array()) . '" class="username">' . htmlspecialchars($rsvp['username'], ENT_QUOTES, 'UTF-8') . '</a>
</li>';
$__compilerVar18 .= $__compilerVar19;
unset($__compilerVar19);
$__compilerVar18 .= '
					';
}
$__compilerVar18 .= '
					';
if (trim($__compilerVar18) !== '')
{
$__output .= '
				';
if ($rsvps['maybe'])
{
$__output .= '<br />';
}
$__output .= '
				' . 'The following users have RSVP\'d "' . 'No' . '"' . ':
				<ul>
					' . $__compilerVar18 . '
				</ul>
			';
}
unset($__compilerVar18);
$__output .= '
		</div>
	';
}
$__output .= '

	';
if ($event['HTML'])
{
$__output .= '
		';
$this->addRequiredExternal('css', 'xenforo');
$__output .= '
		';
$this->addRequiredExternal('css', 'bb_code');
$__output .= '

		<div class="sectionMain baseHtml">
			' . $event['HTML'] . '
		</div>
	';
}
$__output .= '
';
}
$__output .= '

';
$__compilerVar20 = '';
$__compilerVar20 .= '<div class="atendoCopy copyright muted">
	<a href="http://xenforo.com/community/resources/99/">XenAtendo</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar20;
unset($__compilerVar20);
