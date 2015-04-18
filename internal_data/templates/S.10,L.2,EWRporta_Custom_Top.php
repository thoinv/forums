<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'EWRporta');
$__output .= '

';
if ($blocks['top-left'])
{
$__output .= '
<div class="sidebar topLeftBlocks">
	';
foreach ($blocks['top-left'] AS $block)
{
$__output .= '
		' . $block . '
	';
}
$__output .= '
</div>
';
}
$__output .= '

';
if ($blocks['top-right'])
{
$__output .= '
<div class="sidebar topRightBlocks ' . (($blocks['top-left']) ? ('centerShift') : ('')) . '">
	';
foreach ($blocks['top-right'] AS $block)
{
$__output .= '
		' . $block . '
	';
}
$__output .= '
</div>
';
}
