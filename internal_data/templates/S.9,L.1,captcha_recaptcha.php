<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div id="ReCaptcha" data-publicKey="' . htmlspecialchars($publicKey, ENT_QUOTES, 'UTF-8') . '" style="display:none">
	<div id="recaptcha_image" class="textCtrl"></div>
	<div class="ddText"><label for="recaptcha_response_field">' . 'Enter the words or numbers from the box above' . ':</label></div>
	<input type="text" name="recaptcha_response_field" id="recaptcha_response_field" class="textCtrl OptOut" />
	<p class="explain recaptcha_only_if_image">' . '<a ' . 'href="javascript:" class="ReCaptchaReload"' . '>Reload</a> or <a ' . 'href="javascript:" class="ReCaptchaSwitch"' . '>listen to audio</a>. By reCAPTCHA&trade;' . '</p>
	<p class="explain recaptcha_only_if_audio">' . '<a ' . 'href="javascript:" class="ReCaptchaReload"' . '>Reload</a> or <a ' . 'href="javascript:" class="ReCaptchaSwitch"' . '>go back to text</a>. By reCAPTCHA&trade;' . '</p>
</div>
<div id="ReCaptchaLoading" class="JsOnly">' . 'reCAPTCHA verification is loading. Please refresh the page if it does not load.' . '</div>

<noscript>
	<iframe src="//www.google.com/recaptcha/api/noscript?k=' . urlencode($publicKey) . '" height="300" width="500" frameborder="0"></iframe><br />
	<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
	<input type="hidden" name="recaptcha_response_field" value="manual_challenge" />
</noscript>';
