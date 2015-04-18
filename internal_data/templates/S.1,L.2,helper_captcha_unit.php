<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($captcha)
{
$__output .= '
	<dl class="ctrlUnit">
		<dt>' . 'Mã xác nhận' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
