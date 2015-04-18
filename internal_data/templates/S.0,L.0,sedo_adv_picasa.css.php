<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.bbcode_picassa{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_picasa_container') . '
}

.picasa_image{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_picasa_image') . '
}

';
if ($xenOptions['sedo_adv_responsive_blockalign'] == ('bleft'))
{
$__output .= '
	';
$picasaAlign = '';
$picasaAlign .= 'left';
$__output .= '
';
}
else if ($xenOptions['sedo_adv_responsive_blockalign'] == ('bcenter'))
{
$__output .= '
	';
$picasaAlign = '';
$picasaAlign .= 'center';
$__output .= '
';
}
else
{
$__output .= '
	';
$picasaAlign = '';
$picasaAlign .= 'right';
$__output .= '
';
}
$__output .= '

.bbcode_picassa.responsive,
.picasa_image.responsive{
	text-align: ' . htmlspecialchars($picasaAlign, ENT_QUOTES, 'UTF-8') . ';
}
';
