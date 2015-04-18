<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'bb_code');
$__output .= '

<div class="bbCodeBlock bbCodeHtml">
	<div class="type">' . 'HTML' . ':</div>
	<div class="code">' . $content . '</div>
</div>';
