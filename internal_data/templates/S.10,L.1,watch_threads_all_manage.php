<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Manage Watched Threads';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('watched/threads/all/manage', false, array()) . '" method="post" class="xenForm formOverlay">

	';
if ($action == ('watch_no_email'))
{
$__output .= '
		<p>' . 'Are you sure you want to update your email notification settings for all threads?' . '</p>
	';
}
else
{
$__output .= '
		<p>' . 'Are you sure you want to stop watching all threads?' . '</p>
	';
}
$__output .= '
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Save Changes' . '" class="button primary" />
		</dd>
	</dl>

	<input type="hidden" name="act" value="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
