<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($canRSVP && !$event['nowPast'] && $event['event_rsvp'])
{
$__output .= '
	';
$this->addRequiredExternal('css', 'message_simple');
$__output .= '

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
$__output .= '
	<div class="secondaryContent" style="text-align: center; margin-top: 10px;">
		<b>' . 'You can not RSVP for this event' . '...</b><br />
		<br />
		';
if ($event['nowPast'])
{
$__output .= '
			' . 'This event has already begun, or has already passed; RSVP has been since closed.' . '
		';
}
else if (!$event['event_rsvp'])
{
$__output .= '
			' . 'The organizer for this event has disabled the RSVP system; RSVP has been closed.' . '
		';
}
else
{
$__output .= '
			' . 'Upgrade Premium to download attachments.Contact Us : admin@webmasters.vn' . '
		';
}
$__output .= '
	</div>
';
}
