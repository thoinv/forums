<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Đang đăng nhập' . '...';
$__output .= '

' . 'Đang đăng nhập' . '...

<form action="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" method="post" class="AutoSubmit">
	<input type="submit" value="' . 'Đăng nhập' . '" />
	' . $hiddenHtml . '
	
</form>';
