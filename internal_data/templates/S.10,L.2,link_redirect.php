<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'External Redirect';
$__output .= '

<div class="sectionMain">
	<div class="primaryContent">
		<p style="margin-bottom: 1em">' . htmlspecialchars($printable, ENT_QUOTES, 'UTF-8') . '</p>
		
		<p>' . 'You are about to leave ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . ' and visit a site we have no control over. Click the button below to continue to ' . htmlspecialchars($parts['host'], ENT_QUOTES, 'UTF-8') . '.' . '</p>
	</div>
	<div class="secondaryContent">
		<a href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '" class="button primary">' . 'Continue' . '...</a>
	</div>
</div>';
