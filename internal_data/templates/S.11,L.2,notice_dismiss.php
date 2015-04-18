<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Dismiss Notice';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('account/dismiss-notice', '', array(
'notice_id' => $notice['notice_id']
)) . '" method="post" class="xenForm formOverlay">

	<p>' . 'Are you sure you want to dismiss this notice?' . '</p>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" class="button primary" value="' . 'Dismiss Notice' . '" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
