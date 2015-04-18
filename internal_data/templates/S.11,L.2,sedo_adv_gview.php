<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sedo_adv_gview');
$__output .= '

';
if ($options['isGoogleDoc'])
{
$__output .= '
	';
if ($options['isValidGoogleDoc'])
{
$__output .= '
		<iframe class="adv_gview ' . (($options['responsiveMode']) ? ('responsive') : ('')) . '" src="https://docs.google.com/document/' . $content . '" width="' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . '" height="' . htmlspecialchars($options['height'], ENT_QUOTES, 'UTF-8') . '"></iframe>
	';
}
else
{
$__output .= '
		<p style="font-style:italic">' . 'Invalid Google Doc URL' . '</p>
	';
}
$__output .= '
';
}
else
{
$__output .= '
	<iframe class="adv_gview ' . (($options['responsiveMode']) ? ('responsive') : ('')) . '" src="https://docs.google.com/viewer?' . $content . '" width="' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . '" height="' . htmlspecialchars($options['height'], ENT_QUOTES, 'UTF-8') . '"></iframe>
';
}
