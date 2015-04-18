<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($captcha)
{
$__output .= '
	<dl class="ctrlUnit">
		<dt>' . 'Verification' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
