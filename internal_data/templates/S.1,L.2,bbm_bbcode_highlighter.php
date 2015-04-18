<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'bbm_bbcode_highlighter');
$__output .= '

';
$color_class = '';
$color_class .= '
	';
if ($options['1'] == ('orange'))
{
$color_class .= '
		bbm_hl_orange
	';
}
else if ($options['1'] == ('blue'))
{
$color_class .= '
		bbm_hl_blue
	';
}
else if ($options['1'] == ('green'))
{
$color_class .= '
		bbm_hl_green
	';
}
else
{
$color_class .= '
		bbm_hl_yellow
	';
}
$color_class .= '
';
$__output .= '

<span class="bbm_hl ' . htmlspecialchars($color_class, ENT_QUOTES, 'UTF-8') . '">' . $content . '</span>

';
