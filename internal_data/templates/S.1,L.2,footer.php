<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

';
$__compilerVar6 = '';
$__compilerVar6 .= '
<div class="footer">
	<div class="pageWidth">
		<div class="pageContent">
			';
if ($canChangeStyle OR $canChangeLanguage)
{
$__compilerVar6 .= '
			<dl class="choosers">
				';
if ($canChangeStyle)
{
$__compilerVar6 .= '
					<dt>' . 'Giao diện' . '</dt>
					<dd><a href="' . XenForo_Template_Helper_Core::link('misc/style', '', array(
'redirect' => $requestPaths['requestUri']
)) . '" class="OverlayTrigger Tooltip" title="' . 'Chọn giao diện' . '" rel="nofollow">' . htmlspecialchars($visitorStyle['title'], ENT_QUOTES, 'UTF-8') . '</a></dd>
				';
}
$__compilerVar6 .= '
				';
if ($canChangeLanguage)
{
$__compilerVar6 .= '
					<dt>' . 'Ngôn ngữ' . '</dt>
					<dd><a href="' . XenForo_Template_Helper_Core::link('misc/language', '', array(
'redirect' => $requestPaths['requestUri']
)) . '" class="OverlayTrigger Tooltip" title="' . 'Chọn Ngôn ngữ' . '" rel="nofollow">' . htmlspecialchars($visitorLanguage['title'], ENT_QUOTES, 'UTF-8') . '</a></dd>
				';
}
$__compilerVar6 .= '
			</dl>
			';
}
$__compilerVar6 .= '
			
			<ul class="footerLinks">
			';
$__compilerVar7 = '';
$__compilerVar7 .= '
				';
if ($xenOptions['contactUrl']['type'] === ('default'))
{
$__compilerVar7 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('misc/contact', false, array()) . '" class="OverlayTrigger" data-overlayOptions="{&quot;fixed&quot;:false}">' . 'Liên hệ' . '</a></li>
				';
}
else if ($xenOptions['contactUrl']['type'] === ('custom'))
{
$__compilerVar7 .= '
					<li><a href="' . htmlspecialchars($xenOptions['contactUrl']['custom'], ENT_QUOTES, 'UTF-8') . '" ' . (($xenOptions['contactUrl']['overlay']) ? ('class="OverlayTrigger" data-overlayOptions="' . '{' . '&quot;fixed&quot;:false}"') : ('')) . '>' . 'Liên hệ' . '</a></li>
				';
}
$__compilerVar7 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('help', false, array()) . '">' . 'Trợ giúp' . '</a></li>
				';
if ($homeLink)
{
$__compilerVar7 .= '<li><a href="' . htmlspecialchars($homeLink, ENT_QUOTES, 'UTF-8') . '" class="homeLink">' . 'Trang chủ' . '</a></li>';
}
$__compilerVar7 .= '
				<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#navigation" class="topLink">' . 'Lên đầu trang' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('forums/-/index.rss', false, array()) . '" rel="alternate" class="globalFeed" target="_blank"
					title="' . 'RSS Feed For ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '' . '">' . 'RSS' . '</a></li>
			';
$__compilerVar6 .= $this->callTemplateHook('footer_links', $__compilerVar7, array());
unset($__compilerVar7);
$__compilerVar6 .= '
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
$__compilerVar8 = '';
$__compilerVar8 .= '
				';
if ($tosUrl)
{
$__compilerVar8 .= '<li><a href="' . htmlspecialchars($tosUrl, ENT_QUOTES, 'UTF-8') . '">' . 'Quy định và Nội quy' . '</a></li>';
}
$__compilerVar8 .= '
				';
if ($xenOptions['privacyPolicyUrl'])
{
$__compilerVar8 .= '<li><a href="' . htmlspecialchars($xenOptions['privacyPolicyUrl'], ENT_QUOTES, 'UTF-8') . '">' . 'Privacy Policy' . '</a></li>';
}
$__compilerVar8 .= '
			';
$__compilerVar6 .= $this->callTemplateHook('footer_links_legal', $__compilerVar8, array());
unset($__compilerVar8);
$__compilerVar6 .= '
			</ul>
			
			<div id="copyright">';
if ($controllerName == ('DigitalPointUserMap_ControllerPublic_Member') && $controllerAction == ('Usermap'))
{
$__compilerVar6 .= '<div><a href="https://marketplace.digitalpoint.com/digital-point-user-map.992/item" target="_blank">User Map</a> by <a href="https://www.digitalpoint.com/" target="_blank">Digital Point</a></div>';
}
$__compilerVar6 .= '<!--' . XenForo_Template_Helper_Core::callHelper('copyright', array()) . '-->' . 'Diễn đàn sử dụng XenForo&trade; &copy;2014-2015 TechLife Forums.<br/>Website đang hoạt động thử nghiệm, chờ giấy phép MXH của Bộ TT & TT.' . '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar6 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar6 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar6 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar6 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar6 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar6 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar6 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar6 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar6 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar6 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar6 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar6 .= '</div>
			';
$__compilerVar9 = '';
$__compilerVar6 .= $this->callTemplateHook('footer_after_copyright', $__compilerVar9, array());
unset($__compilerVar9);
$__compilerVar6 .= '
		
			';
if ($debugMode)
{
$__compilerVar6 .= '
				';
$__compilerVar10 = '';
$__compilerVar10 .= '
						';
if ($page_time)
{
$__compilerVar10 .= '<dt>' . 'Timing' . ':</dt> <dd><a href="' . htmlspecialchars($debug_url, ENT_QUOTES, 'UTF-8') . '" rel="nofollow">' . '' . XenForo_Template_Helper_Core::numberFormat($page_time, '4') . ' seconds' . '</a></dd>';
}
$__compilerVar10 .= '
						';
if ($memory_usage)
{
$__compilerVar10 .= '<dt>' . 'Memory' . ':</dt> <dd>' . '' . XenForo_Template_Helper_Core::numberFormat(($memory_usage / 1024 / 1024), '3') . ' MB' . '</dd>';
}
$__compilerVar10 .= '
						';
if ($db_queries)
{
$__compilerVar10 .= '<dt>' . 'DB Queries' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($db_queries, '0') . '</dd>';
}
$__compilerVar10 .= '
					';
if (trim($__compilerVar10) !== '')
{
$__compilerVar6 .= '
					<dl class="pairsInline debugInfo" title="' . htmlspecialchars($controllerName, ENT_QUOTES, 'UTF-8') . '-&gt;' . htmlspecialchars($controllerAction, ENT_QUOTES, 'UTF-8') . (($viewName) ? (' (' . htmlspecialchars($viewName, ENT_QUOTES, 'UTF-8') . ')') : ('')) . '">
					' . $__compilerVar10 . '
					</dl>
				';
}
unset($__compilerVar10);
$__compilerVar6 .= '
			';
}
$__compilerVar6 .= '
			
			<span class="helper"></span>
		</div>
	</div>	
</div>
';
$__output .= $this->callTemplateHook('footer', $__compilerVar6, array());
unset($__compilerVar6);
