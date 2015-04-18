<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($title)
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
$__output .= '
	';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
$__output .= '
';
}
else
{
$__output .= '
	';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
}
$__output .= '


';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:portal', false, array()) . '" />';
$__output .= '
';
if ($xenOptions['boardDescription'])
{
$__extraData['head']['description'] = '';
$__extraData['head']['description'] .= '
	<meta name="description" content="' . htmlspecialchars($xenOptions['boardDescription'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__output .= '
';
$__extraData['head']['rss'] = '';
$__extraData['head']['rss'] .= '
	<link rel="alternate" type="application/rss+xml" title="' . 'RSS feed for ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '' . '" href="' . XenForo_Template_Helper_Core::link('portal/index.rss', false, array()) . '" />';
$__output .= '
';
$__extraData['head']['openGraph'] = '';
$__extraData['head']['openGraph'] .= '
	';
$__compilerVar1 = '';
$__compilerVar1 .= XenForo_Template_Helper_Core::link('canonical:portal', false, array());
$__compilerVar2 = '';
$__compilerVar2 .= htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8');
$__compilerVar3 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar3 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar3 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar3 .= '
	<meta property="og:image" content="';
$__compilerVar4 = '';
$__compilerVar4 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar3 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar4, array());
unset($__compilerVar4);
$__compilerVar3 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar1 . '" />
	<meta property="og:title" content="' . $__compilerVar2 . '" />
	';
if ($description)
{
$__compilerVar3 .= '<meta property="og:description" content="' . $description . '" />';
}
$__compilerVar3 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar3 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar3 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar3 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar3 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar3;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3);
$__output .= '
';
$__extraData['quickNavSelected'] = '';
$__extraData['quickNavSelected'] .= 'portal';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$this->addRequiredExternal('css', 'EWRporta');
$__output .= '
';
if ($xenOptions['EWRporta_breakout'])
{
$this->addRequiredExternal('css', 'EWRporta_BreakOut');
}
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
$__output .= '

';
if ($blocks['mid-left'])
{
$__output .= '
<div class="sidebar midLeftBlocks">
	';
foreach ($blocks['mid-left'] AS $block)
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
if ($blocks['mid-right'])
{
$__output .= '
<div class="midRightBlocks ' . (($blocks['mid-left']) ? ('centerShift') : ('')) . '">
	';
foreach ($blocks['mid-right'] AS $block)
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
if ($xenOptions['EWRporta_breakout'])
{
$__output .= '
	<div class="sectionMain footerBreakout portaCopy">';
$__compilerVar5 = '';
$__compilerVar5 .= '<div class="portaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/90/">XenPorta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar5;
unset($__compilerVar5);
$__output .= '</div>
';
}
else
{
$__output .= '
	';
$__compilerVar6 = '';
$__compilerVar6 .= '<div class="portaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/90/">XenPorta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar6;
unset($__compilerVar6);
$__output .= '
';
}
