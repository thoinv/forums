<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div id="logoBlock">
	
			';
$__compilerVar4 = '';
$__compilerVar5 = '';
$__compilerVar4 .= $this->callTemplateHook('ad_header', $__compilerVar5, array());
unset($__compilerVar5);
$__output .= $__compilerVar4;
unset($__compilerVar4);
$__output .= '
			';
$__compilerVar6 = '';
$__compilerVar6 .= '
			<div id="logo"><a href="' . htmlspecialchars($logoLink, ENT_QUOTES, 'UTF-8') . '">
				<span></span>
				';
$doodle = XenForo_Template_Helper_Core::callHelper('doodle', array());
$__compilerVar6 .= '
';
if ($doodle)
{
$__compilerVar6 .= '
	';
if ($doodle['link'])
{
$__compilerVar6 .= '
	<a href="' . htmlspecialchars($doodle['link'], ENT_QUOTES, 'UTF-8') . '"><img src="' . htmlspecialchars($doodle['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" /></a>
	';
}
else
{
$__compilerVar6 .= '
	<img src="' . htmlspecialchars($doodle['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__compilerVar6 .= '
';
}
else
{
$__compilerVar6 .= '
	<img src="' . XenForo_Template_Helper_Core::styleProperty('headerLogoPath') . '" alt="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
';
}
$__compilerVar6 .= '
			</a></div>
			';
$__output .= $this->callTemplateHook('header_logo', $__compilerVar6, array());
unset($__compilerVar6);
$__output .= '
			<span class="helper"></span>
	
</div>';
