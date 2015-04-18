<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'bb_code');
$__output .= '

<div class="bbCodeBlock bbCodePHP">
	<div class="type">' . 'PHP' . ':</div>
	<div class="code">' . $content . '</div>
</div>';
