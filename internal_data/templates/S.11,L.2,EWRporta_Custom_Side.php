<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'EWRporta');
$__output .= '

';
if ($blocks['sidebar'])
{
$__output .= '
	';
foreach ($blocks['sidebar'] AS $block)
{
$__output .= '
		' . $block . '
	';
}
$__output .= '
';
}
$__output .= '
';
