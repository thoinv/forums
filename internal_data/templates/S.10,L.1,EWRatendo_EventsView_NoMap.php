<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div style="float: right; width: 350px; margin-top: -10px;">
	';
$__compilerVar1 = '';
if ($canRSVP && !$event['nowPast'] && $event['event_rsvp'])
{
$__compilerVar1 .= '
	';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar1 .= '

	<form action="' . XenForo_Template_Helper_Core::link('events/rsvp', $event, array()) . '" method="post" style="margin-bottom: 0px;" class="messageSimple secondaryContent">
		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,false,array(
'user' => '$visitor',
'size' => 's'
),'')) . '
		<div class="messageInfo">
			<textarea name="message" class="textCtrl StatusEditor" placeholder="' . 'Post Comment' . '..." rows="3" cols="20" data-statusEditorCounter="#statusEditorCounter">' . htmlspecialchars($rsvps['user']['rsvp_message'], ENT_QUOTES, 'UTF-8') . '</textarea>
			<div style="float: left; margin: 10px 0px 0px -50px;">
				<label for="ctrl_yes"><input type="radio" name="rsvp_state" class="textCtrl" value="yes" id="ctrl_yes" ' . (($rsvps['user']['rsvp_state'] == ('yes')) ? ('checked') : ('')) . '> ' . 'Yes' . '</label> &nbsp;
				<label for="ctrl_maybe"><input type="radio" name="rsvp_state" class="textCtrl" value="maybe" id="ctrl_maybe" ' . (($rsvps['user']['rsvp_state'] == ('maybe')) ? ('checked') : ('')) . '> ' . 'Maybe' . '</label> &nbsp;
				<label for="ctrl_no"><input type="radio" name="rsvp_state" class="textCtrl" value="no" id="ctrl_no" ' . (($rsvps['user']['rsvp_state'] == ('no')) ? ('checked') : ('')) . '> ' . 'No' . '</label>
			</div>
			<div class="submitUnit">
				<span id="statusEditorCounter" title="' . 'Characters remaining' . '"></span>
				<input type="hidden" name="rsvp_id" value="' . htmlspecialchars($rsvps['user']['rsvp_id'], ENT_QUOTES, 'UTF-8') . '" />
				<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
				<input type="submit" class="button primary" value="' . 'Post' . '" accesskey="s" />
			</div>
		</div>
	</form>
';
}
else
{
$__compilerVar1 .= '
	<div class="secondaryContent" style="text-align: center; margin-top: 10px;">
		<b>' . 'You can not RSVP for this event' . '...</b><br />
		<br />
		';
if ($event['nowPast'])
{
$__compilerVar1 .= '
			' . 'This event has already begun, or has already passed; RSVP has been since closed.' . '
		';
}
else if (!$event['event_rsvp'])
{
$__compilerVar1 .= '
			' . 'The organizer for this event has disabled the RSVP system; RSVP has been closed.' . '
		';
}
else
{
$__compilerVar1 .= '
			' . 'You do not have permission to view this page or perform this action.' . '
		';
}
$__compilerVar1 .= '
	</div>
';
}
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
</div>


<div style="margin-right: 360px;">
	<div class="subHeading">
		';
if ($event['canEdit'])
{
$__output .= '<div style="float: right;">
			(<a href="' . XenForo_Template_Helper_Core::link('events/edit', $event, array()) . '">' . 'Edit' . '</a>)
		</div>';
}
$__output .= '

		' . htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8') . '
	</div>

	<div class="secondaryContent" style="font-size: 1.2em;">
		<div style="float: right; text-align: right;">
			<i>' . htmlspecialchars($event['event_venue'], ENT_QUOTES, 'UTF-8') . '</i><br />
			<b>' . 'Confirmed Attendees' . ':</b> ' . htmlspecialchars($event['event_rsvps'], ENT_QUOTES, 'UTF-8') . ' ';
if ($event['event_guests'])
{
$__output .= '(+' . htmlspecialchars($event['event_guests'], ENT_QUOTES, 'UTF-8') . ' guests)';
}
$__output .= '<br />
			<span class="muted" style="font-size: 0.8em;"><i>' . 'Posted By' . ': ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $event
)) . '</i></span>
		</div>

		<div style="text-align: left;">
			<b>' . 'Start Date' . ':</b> ' . htmlspecialchars($event['formatted_strtime'], ENT_QUOTES, 'UTF-8') . '<br />
			<b>' . 'End Date' . ':</b> ' . htmlspecialchars($event['formatted_endtime'], ENT_QUOTES, 'UTF-8') . '<br />
			<span class="muted" style="font-size: 0.8em;"><i>' . 'Time Zone' . ': ' . htmlspecialchars($event['event_timezone'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($event['formatted_timezone'], ENT_QUOTES, 'UTF-8') . '</i></span>
		</div>
	</div>
</div>';
