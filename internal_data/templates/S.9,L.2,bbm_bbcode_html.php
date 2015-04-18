<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'bbm_bbcode');
$__output .= '

';
if (!$rendererStates['canUseBbCode'])
{
$__output .= '
	<span class="bbm_bb_can_not_use">' . 'Sorry you can\'t use this Bb Code' . '</span>
';
}
else
{
$__output .= '
	' . $content . '
';
}
$__output .= '
';
