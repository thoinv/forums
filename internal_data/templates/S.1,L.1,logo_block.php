<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div id="logoBlock">
	<div class="pageWidth">
	
		<div class="pageContent">
			';
$__compilerVar1 = '';
$__compilerVar2 = '';
$__compilerVar1 .= $this->callTemplateHook('ad_header', $__compilerVar2, array());
unset($__compilerVar2);
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
			';
$__compilerVar3 = '';
$__compilerVar3 .= '
			<div id="logo"><a href="' . htmlspecialchars($logoLink, ENT_QUOTES, 'UTF-8') . '">
				<span></span>
				';
$doodle = XenForo_Template_Helper_Core::callHelper('doodle', array());
$__compilerVar3 .= '
';
if ($doodle)
{
$__compilerVar3 .= '
	';
if ($doodle['link'])
{
$__compilerVar3 .= '
	<a href="' . htmlspecialchars($doodle['link'], ENT_QUOTES, 'UTF-8') . '"><img src="' . htmlspecialchars($doodle['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" /></a>
	';
}
else
{
$__compilerVar3 .= '
	<img src="' . htmlspecialchars($doodle['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__compilerVar3 .= '
';
}
else
{
$__compilerVar3 .= '
	<img src="' . XenForo_Template_Helper_Core::styleProperty('headerLogoPath') . '" alt="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
';
}
$__compilerVar3 .= '
				
			</a></div>
			';
$__output .= $this->callTemplateHook('header_logo', $__compilerVar3, array());
unset($__compilerVar3);
$__output .= '
			<span class="helper"></span>
		</div>
	</div>
	
</div>';
