<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'bbm_bbcode');
$__output .= '
';
$this->addRequiredExternal('css', 'bbm_bbcode_protected');
$__output .= '

';
if (!$rendererStates['canUseBbCode'])
{
$__output .= '
	<span class="bbm_bb_can_not_use">' . 'Sorry you can\'t use this Bb Code' . '</span>
';
}
else if (!$rendererStates['canViewBbCode'])
{
$__output .= '
	<div class="bbm_bb_protected_desc">' . 'Premium Content' . '</div>
	<div class="bbm_bb_protected_content">' . 'Subscribe and get exclusive access to our premium content!' . '</div>
';
}
else
{
$__output .= '
	<div class="bbm_bb_authorised_desc">' . 'Premium Content' . '</div>
	<div class="bbm_bb_authorised_content">' . $content . '</div>
';
}
$__output .= '

';
