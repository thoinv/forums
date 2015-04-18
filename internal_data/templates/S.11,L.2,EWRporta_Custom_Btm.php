<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'EWRporta');
$__output .= '

';
if ($blocks['btm-left'])
{
$__output .= '
<div class="sidebar btmLeftBlocks">
	';
foreach ($blocks['btm-left'] AS $block)
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
if ($blocks['btm-right'])
{
$__output .= '
<div class="sidebar btmRightBlocks ' . (($blocks['btm-left']) ? ('centerShift') : ('')) . '">
	';
foreach ($blocks['btm-right'] AS $block)
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
if ($blocks['sidebar'])
{
$__output .= '
	';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '
		';
foreach ($blocks['sidebar'] AS $block)
{
$__extraData['sidebar'] .= '
			' . $block . '
		';
}
$__extraData['sidebar'] .= '
	';
$__output .= '
';
}
$__output .= '

';
$__compilerVar2 = '';
$__compilerVar2 .= '<div class="portaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/90/">XenPorta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
