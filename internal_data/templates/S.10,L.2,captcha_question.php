<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div id="Captcha" data-source="' . XenForo_Template_Helper_Core::link('misc/captcha', false, array()) . '">
	';
if ($captchaQuestion['captcha_question_id'])
{
$__output .= '
		<div class="ddText"><label for="' . htmlspecialchars($captchaQuestion['hash'], ENT_QUOTES, 'UTF-8') . '">' . $captchaQuestion['question'] . '</label></div>
		<input type="text" name="captcha_question_answer" id="' . htmlspecialchars($captchaQuestion['hash'], ENT_QUOTES, 'UTF-8') . '" value="" placeholder="' . 'Please answer the question above...' . '" class="textCtrl OptOut" />
	';
}
else
{
$__output .= '
		' . 'N/A' . '
	';
}
$__output .= '
	<input type="hidden" name="captcha_question_hash" value="' . htmlspecialchars($captchaQuestion['hash'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
