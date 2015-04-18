<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div style="float: right; width: 350px; margin-top: -4px;">
	<div class="subHeading">
		';
if ($event['canEdit'])
{
$__output .= '<div style="float: right;">
			(<a href="' . XenForo_Template_Helper_Core::link('events/edit', $event, array()) . '">' . 'Sửa' . '</a>)
		</div>';
}
$__output .= '

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
$__output .= '(+' . htmlspecialchars($event['event_guests'], ENT_QUOTES, 'UTF-8') . ' guests)';
}
$__output .= '
	</div>

	';
$__compilerVar2 = '';
if ($canRSVP && !$event['nowPast'] && $event['event_rsvp'])
{
$__compilerVar2 .= '
	';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar2 .= '

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
$__compilerVar2 .= '
	<div class="secondaryContent" style="text-align: center; margin-top: 10px;">
		<b>' . 'You can not RSVP for this event' . '...</b><br />
		<br />
		';
if ($event['nowPast'])
{
$__compilerVar2 .= '
			' . 'This event has already begun, or has already passed; RSVP has been since closed.' . '
		';
}
else if (!$event['event_rsvp'])
{
$__compilerVar2 .= '
			' . 'The organizer for this event has disabled the RSVP system; RSVP has been closed.' . '
		';
}
else
{
$__compilerVar2 .= '
			' . 'Upgrade Premium to download attachments.Contact Us : admin@webmasters.vn' . '
		';
}
$__compilerVar2 .= '
	</div>
';
}
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
</div>

<div style="margin-right: 360px;">
	<iframe width="100%" height="345" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
		src="' . htmlspecialchars($event['location'], ENT_QUOTES, 'UTF-8') . '"></iframe>
</div>';
