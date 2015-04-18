<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li class="panel Notice DismissParent notice_' . htmlspecialchars($noticeId, ENT_QUOTES, 'UTF-8') . '">
	<div class="' . (($notice['wrap']) ? ('baseHtml noticeContent') : ('')) . '">' . $content . '</div>
	
	';
if ($notice['dismissible'])
{
$__output .= '
		<a href="' . XenForo_Template_Helper_Core::link('account/dismiss-notice', '', array(
'notice_id' => $noticeId
)) . '"
			title="' . 'Dismiss Notice' . '" class="DismissCtrl Tooltip" data-offsetx="7" data-tipclass="flipped">' . 'Dismiss Notice' . '</a>';
}
$__output .= '
</li>';
