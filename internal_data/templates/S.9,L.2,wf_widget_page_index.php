<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'wf_widget_page');
$__output .= '

';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($widgetPage['title'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__output .= '

';
$__extraData['head']['openGraph'] = '';
$__extraData['head']['openGraph'] .= '
	';
$__compilerVar5 = '';
$__compilerVar5 .= XenForo_Template_Helper_Core::link('canonical:widget-pages', $widgetPage, array(
'page' => $page
));
$__compilerVar6 = '';
$__compilerVar6 .= htmlspecialchars($widgetPage['title'], ENT_QUOTES, 'UTF-8');
$__compilerVar7 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar7 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar7 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar7 .= '
	<meta property="og:image" content="';
$__compilerVar8 = '';
$__compilerVar8 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar7 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar8, array());
unset($__compilerVar8);
$__compilerVar7 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar5 . '" />
	<meta property="og:title" content="' . $__compilerVar6 . '" />
	';
if ($description)
{
$__compilerVar7 .= '<meta property="og:description" content="' . $description . '" />';
}
$__compilerVar7 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar7 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar7 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar7 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar7 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar7;
unset($__compilerVar5, $__compilerVar6, $__compilerVar7);
$__extraData['head']['openGraph'] .= '
';
$__output .= '

';
$__extraData['quickNavSelected'] = '';
$__extraData['quickNavSelected'] .= 'node-' . htmlspecialchars($widgetPage['node_id'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['bodyClasses'] = '';
$__extraData['bodyClasses'] .= XenForo_Template_Helper_Core::callHelper('nodeClasses', array(
'0' => $nodeBreadCrumbs,
'1' => $widgetPage
));
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:widget-pages', $widgetPage, array(
'page' => $page
)) . '" />';
$__output .= '

';
if ($widgetPage['description'])
{
$__output .= '
	';
$__extraData['pageDescription'] = array(
'class' => 'baseHtml'
);
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= $widgetPage['description'];
$__output .= '
';
}
$__output .= '

<div id="WidgetPageContent">
	' . $layoutTree . '
</div>

';
$__extraData['noVisitorPanel'] = '';
$__extraData['noVisitorPanel'] .= '1';
$__output .= '


';
$widgetPageStylesheet = '';
$widgetPageStylesheet .= XenForo_Template_Helper_Core::callHelper('WidgetFramework_generateLayoutCss', array(
'0' => $widgetPage['options'],
'1' => $widgets,
'2' => $layoutTree
));
$__output .= '
';
if ($widgetPageStylesheet)
{
$__output .= '
	';
$__extraData['head']['widgetPage'] = '';
$__extraData['head']['widgetPage'] .= '
		<style>' . $widgetPageStylesheet . '</style>
	';
$__output .= '
';
}
$__output .= '

';
if ($widgetPage['options']['break_container'])
{
$__output .= '
	';
$__extraData['widgetPageOptionsBreakContainer'] = '';
$__extraData['widgetPageOptionsBreakContainer'] .= '1';
$__output .= '
';
}
