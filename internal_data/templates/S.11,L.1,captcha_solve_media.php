<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div id="SolveMediaCaptcha" data-c-key="' . htmlspecialchars($cKey, ENT_QUOTES, 'UTF-8') . '" data-theme="white" class="JsOnly">
	' . 'Loading' . '...
</div>
<noscript>
	<iframe src="https://api-secure.solvemedia.com/papi/challenge.noscript?k=' . htmlspecialchars($cKey, ENT_QUOTES, 'UTF-8') . '" height="300" width="500" frameborder="0"></iframe><br />
	<textarea name="adcopy_challenge" rows="3" cols="40"></textarea>
	<input type="hidden" name="adcopy_response" value="manual_challenge" />
</noscript>';
