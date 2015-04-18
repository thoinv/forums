<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Delete Event' . ': ' . htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('events/delete', $event, array()) . '" method="post" class="xenForm formOverlay">

	<dl class="ctrlUnit">
		<dt>' . 'Delete Event' . '</dt>
		<dd>
			' . htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8') . '
			<p class="explain">' . 'Are you sure you wish to delete this event?' . '</p>
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Delete Event' . '" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
