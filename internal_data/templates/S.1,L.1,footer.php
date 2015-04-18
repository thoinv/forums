<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

';
$__compilerVar1 = '';
$__compilerVar1 .= '
<div class="footer">
	<div class="pageWidth">
		<div class="pageContent">
			';
if ($canChangeStyle OR $canChangeLanguage)
{
$__compilerVar1 .= '
			<dl class="choosers">
				';
if ($canChangeStyle)
{
$__compilerVar1 .= '
					<dt>' . 'Style' . '</dt>
					<dd><a href="' . XenForo_Template_Helper_Core::link('misc/style', '', array(
'redirect' => $requestPaths['requestUri']
)) . '" class="OverlayTrigger Tooltip" title="' . 'Style Chooser' . '" rel="nofollow">' . htmlspecialchars($visitorStyle['title'], ENT_QUOTES, 'UTF-8') . '</a></dd>
				';
}
$__compilerVar1 .= '
				';
if ($canChangeLanguage)
{
$__compilerVar1 .= '
					<dt>' . 'Language' . '</dt>
					<dd><a href="' . XenForo_Template_Helper_Core::link('misc/language', '', array(
'redirect' => $requestPaths['requestUri']
)) . '" class="OverlayTrigger Tooltip" title="' . 'Language Chooser' . '" rel="nofollow">' . htmlspecialchars($visitorLanguage['title'], ENT_QUOTES, 'UTF-8') . '</a></dd>
				';
}
$__compilerVar1 .= '
			</dl>
			';
}
$__compilerVar1 .= '
			
			<ul class="footerLinks">
			';
$__compilerVar2 = '';
$__compilerVar2 .= '
				';
if ($xenOptions['contactUrl']['type'] === ('default'))
{
$__compilerVar2 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('misc/contact', false, array()) . '" class="OverlayTrigger" data-overlayOptions="{&quot;fixed&quot;:false}">' . 'Contact Us' . '</a></li>
				';
}
else if ($xenOptions['contactUrl']['type'] === ('custom'))
{
$__compilerVar2 .= '
					<li><a href="' . htmlspecialchars($xenOptions['contactUrl']['custom'], ENT_QUOTES, 'UTF-8') . '" ' . (($xenOptions['contactUrl']['overlay']) ? ('class="OverlayTrigger" data-overlayOptions="' . '{' . '&quot;fixed&quot;:false}"') : ('')) . '>' . 'Contact Us' . '</a></li>
				';
}
$__compilerVar2 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('help', false, array()) . '">' . 'Help' . '</a></li>
				';
if ($homeLink)
{
$__compilerVar2 .= '<li><a href="' . htmlspecialchars($homeLink, ENT_QUOTES, 'UTF-8') . '" class="homeLink">' . 'Home' . '</a></li>';
}
$__compilerVar2 .= '
				<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#navigation" class="topLink">' . 'Top' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('forums/-/index.rss', false, array()) . '" rel="alternate" class="globalFeed" target="_blank"
					title="' . 'RSS feed for ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '' . '">' . 'RSS' . '</a></li>
			';
$__compilerVar1 .= $this->callTemplateHook('footer_links', $__compilerVar2, array());
unset($__compilerVar2);
$__compilerVar1 .= '
			</ul>
			
			<span class="helper"></span>
		</div>
	</div>
</div>

<div class="footerLegal">
	<div class="pageWidth">
		<div class="pageContent">
			<ul id="legal">
			';
$__compilerVar3 = '';
$__compilerVar3 .= '
				';
if ($tosUrl)
{
$__compilerVar3 .= '<li><a href="' . htmlspecialchars($tosUrl, ENT_QUOTES, 'UTF-8') . '">' . 'Terms and Rules' . '</a></li>';
}
$__compilerVar3 .= '
				';
if ($xenOptions['privacyPolicyUrl'])
{
$__compilerVar3 .= '<li><a href="' . htmlspecialchars($xenOptions['privacyPolicyUrl'], ENT_QUOTES, 'UTF-8') . '">' . 'Privacy Policy' . '</a></li>';
}
$__compilerVar3 .= '
			';
$__compilerVar1 .= $this->callTemplateHook('footer_links_legal', $__compilerVar3, array());
unset($__compilerVar3);
$__compilerVar1 .= '
			</ul>
			
			<div id="copyright">';
if ($controllerName == ('DigitalPointUserMap_ControllerPublic_Member') && $controllerAction == ('Usermap'))
{
$__compilerVar1 .= '<div><a href="https://marketplace.digitalpoint.com/digital-point-user-map.992/item" target="_blank">User Map</a> by <a href="https://www.digitalpoint.com/" target="_blank">Digital Point</a></div>';
}
$__compilerVar1 .= '<!--' . XenForo_Template_Helper_Core::callHelper('copyright', array()) . '-->' . 'Diễn đàn sử dụng XenForo&trade; &copy;2014-2015 TechLife Forums.<br/>Website đang hoạt động thử nghiệm, chờ giấy phép MXH của Bộ TT & TT.' . '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar1 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar1 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar1 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar1 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar1 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar1 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar1 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar1 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar1 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar1 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar1 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar1 .= '</div>
			';
$__compilerVar4 = '';
$__compilerVar1 .= $this->callTemplateHook('footer_after_copyright', $__compilerVar4, array());
unset($__compilerVar4);
$__compilerVar1 .= '
		
			';
if ($debugMode)
{
$__compilerVar1 .= '
				';
$__compilerVar5 = '';
$__compilerVar5 .= '
						';
if ($page_time)
{
$__compilerVar5 .= '<dt>' . 'Timing' . ':</dt> <dd><a href="' . htmlspecialchars($debug_url, ENT_QUOTES, 'UTF-8') . '" rel="nofollow">' . '' . XenForo_Template_Helper_Core::numberFormat($page_time, '4') . ' seconds' . '</a></dd>';
}
$__compilerVar5 .= '
						';
if ($memory_usage)
{
$__compilerVar5 .= '<dt>' . 'Memory' . ':</dt> <dd>' . '' . XenForo_Template_Helper_Core::numberFormat(($memory_usage / 1024 / 1024), '3') . ' MB' . '</dd>';
}
$__compilerVar5 .= '
						';
if ($db_queries)
{
$__compilerVar5 .= '<dt>' . 'DB Queries' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($db_queries, '0') . '</dd>';
}
$__compilerVar5 .= '
					';
if (trim($__compilerVar5) !== '')
{
$__compilerVar1 .= '
					<dl class="pairsInline debugInfo" title="' . htmlspecialchars($controllerName, ENT_QUOTES, 'UTF-8') . '-&gt;' . htmlspecialchars($controllerAction, ENT_QUOTES, 'UTF-8') . (($viewName) ? (' (' . htmlspecialchars($viewName, ENT_QUOTES, 'UTF-8') . ')') : ('')) . '">
					' . $__compilerVar5 . '
					</dl>
				';
}
unset($__compilerVar5);
$__compilerVar1 .= '
			';
}
$__compilerVar1 .= '
			
			<span class="helper"></span>
		</div>
	</div>	
</div>
';
$__output .= $this->callTemplateHook('footer', $__compilerVar1, array());
unset($__compilerVar1);
