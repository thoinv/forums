<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($showWysiwyg)
{
$__output .= '
	';
$this->addRequiredExternal('css', 'tinhte_xentag');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/Tinhte/XenTag/bb_code_edit.js');
$__output .= '
';
}
