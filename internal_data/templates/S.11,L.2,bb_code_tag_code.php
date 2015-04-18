<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'bb_code');
$__output .= '

<div class="bbCodeBlock bbCodeCode">
	<div class="type">' . 'Mã' . ':</div>
	<pre>' . $content . '</pre>
</div>';
