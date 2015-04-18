<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__output .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__output .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__output .= '
	<meta property="og:image" content="';
$__compilerVar1 = '';
$__compilerVar1 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__output .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $url . '" />
	<meta property="og:title" content="' . $title . '" />
	';
if ($description)
{
$__output .= '<meta property="og:description" content="' . $description . '" />';
}
$__output .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__output .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__output .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__output .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__output .= '
';
}
