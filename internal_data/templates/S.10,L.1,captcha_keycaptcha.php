<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div id="KeyCaptcha" class="keycaptcha-root" data-user-id="' . htmlspecialchars($keyUserId, ENT_QUOTES, 'UTF-8') . '" data-session-id="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '" data-sign="' . htmlspecialchars($sign, ENT_QUOTES, 'UTF-8') . '" data-sign2="' . htmlspecialchars($sign2, ENT_QUOTES, 'UTF-8') . '">
	<noscript>' . 'Please enable JavaScript to continue.' . '</noscript>
	<span class="JsOnly">' . 'Loading' . '...</span>
</div>
<input type="hidden" name="keycaptcha_code" />';
