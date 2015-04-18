<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="notificationItem" data-alert-id="' . htmlspecialchars($alertId, ENT_QUOTES, 'UTF-8') . '">
	<div class="notificationWrapper">
		<div class="userAvatar">
			<img src="' . XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $user,
'1' => 'm'
)) . '" alt="' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '" />
		</div>
		
		<div class="notificationText">
			<p>' . $content . '</p>
		</div>
	</div>
	
	<a class="notificationCloser"></a>
</div>';
