<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Logging in' . '...';
$__output .= '

' . 'Logging in' . '...

<form action="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" method="post" class="AutoSubmit">
	<input type="submit" value="' . 'Log in' . '" />
	' . $hiddenHtml . '
	
</form>';
