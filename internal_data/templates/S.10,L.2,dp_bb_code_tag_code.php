<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'bb_code');
$__output .= '

<div class="bbCodeBlock bbCodeCode">
	<div class="type">' . 'Mã' . ' (' . htmlspecialchars($language, ENT_QUOTES, 'UTF-8') . '):</div>
	<div class="code">' . $content . '</div>
</div>';
