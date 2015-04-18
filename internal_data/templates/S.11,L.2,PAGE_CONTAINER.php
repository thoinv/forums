<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<!DOCTYPE html>';
$isResponsive = ((XenForo_Template_Helper_Core::styleProperty('enableResponsive') AND !$noResponsive) ? ('1') : ('0'));
$__output .= '
<html id="XenForo" lang="' . htmlspecialchars($visitorLanguage['language_code'], ENT_QUOTES, 'UTF-8') . '" dir="' . htmlspecialchars($visitorLanguage['text_direction'], ENT_QUOTES, 'UTF-8') . '" class="Public NoJs ' . (($visitor['user_id']) ? ('LoggedIn') : ('LoggedOut')) . ' ' . (($sidebar) ? ('Sidebar') : ('NoSidebar')) . ' ' . (($hasAutoDeferred) ? ('RunDeferred') : ('')) . ' ' . (($isResponsive) ? ('Responsive') : ('NoResponsive')) . '" xmlns:fb="//www.facebook.com/2008/fbml">
<head>

<link rel="icon" type="image/x-icon" href="/fav.ico" />
<meta name="google-site-verification" content="E3l3CoOz8EnSzBJ3XOfVZCCp6q8EqcZVmZrOBhwMkxg" />
';
$__compilerVar76 = '';
$__compilerVar76 .= '
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
	';
if ($isResponsive)
{
$__compilerVar76 .= '
		<meta name="viewport" content="width=device-width, initial-scale=1" />
	';
}
$__compilerVar76 .= '
	';
if ($requestPaths['fullBasePath'])
{
$__compilerVar76 .= '
		<base href="' . htmlspecialchars($requestPaths['fullBasePath'], ENT_QUOTES, 'UTF-8') . '" />
		<script async>
			var _b = document.getElementsByTagName(\'base\')[0], _bH = "' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($requestPaths['fullBasePath'], ENT_QUOTES, 'UTF-8'), 'double') . '";
			if (_b && _b.href != _bH) _b.href = _bH;
		</script>
	';
}
$__compilerVar76 .= '

	<title>';
if ($title)
{
$__compilerVar76 .= $title . ' | ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8');
}
else
{
$__compilerVar76 .= htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar76 .= '</title>
	
	<noscript><style>.JsOnly, .jsOnly { display: none !important; }</style></noscript>
	<link rel="stylesheet" href="css.php?css=xenforo,form,public&amp;style=' . urlencode($_styleId) . '&amp;dir=' . htmlspecialchars($visitorLanguage['text_direction'], ENT_QUOTES, 'UTF-8') . '&amp;d=' . htmlspecialchars($visitorStyle['last_modified_date'], ENT_QUOTES, 'UTF-8') . '" />
	<!--XenForo_Require:CSS-->	
	' . XenForo_Template_Helper_Core::callHelper('ignoredCss', array(
'0' => $visitor['ignoredUsers']
)) . '

	';
$__compilerVar77 = '';
$__compilerVar77 .= '	<script src="' . htmlspecialchars($jQuerySource, ENT_QUOTES, 'UTF-8') . '"></script>	
	';
if ($jQuerySource != $jQuerySourceLocal)
{
$__compilerVar77 .= '
		<script>if (!window.jQuery) { document.write(\'<scr\'+\'ipt type="text/javascript" src="' . htmlspecialchars($jQuerySourceLocal, ENT_QUOTES, 'UTF-8') . '"><\\/scr\'+\'ipt>\'); }</script>
	';
}
if ($xenOptions['uncompressedJs'] == 1 OR $xenOptions['uncompressedJs'] == 3)
{
$__compilerVar77 .= '
	<script src="' . htmlspecialchars($javaScriptSource, ENT_QUOTES, 'UTF-8') . '/jquery/jquery.xenforo.rollup.js?_v=' . htmlspecialchars($xenOptions['jsVersion'], ENT_QUOTES, 'UTF-8') . '"></script>';
}
$__compilerVar77 .= '	
	<script src="' . XenForo_Template_Helper_Core::callHelper('javaScriptUrl', array(
'0' => $javaScriptSource . '/xenforo/xenforo.js?_v=' . $xenOptions['jsVersion']
)) . '"></script>
';
if ($forum['node_id'] > 0)
{
$__compilerVar77 .= '<script>XenForo.node_name=\'' . XenForo_Template_Helper_Core::jsEscape($forum['title'], 'double') . ' (' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . ')\';</script>';
}
$__compilerVar77 .= '
<!--XenForo_Require:JS-->';
$__compilerVar76 .= $__compilerVar77;
unset($__compilerVar77);
$__compilerVar76 .= '
';
if ($xenOptions['dpBetterAnalyticsJs'] == ('file'))
{
$__compilerVar76 .= '<script src="misc/a.js?_v=' . htmlspecialchars($xenOptions['jsVersion'], ENT_QUOTES, 'UTF-8') . '"></script>';
}
else if ($xenOptions['dpBetterAnalyticsJs'] == ('inline'))
{
$__compilerVar76 .= '<script>
';
$__compilerVar78 = '';
$__compilerVar78 .= '$(document).ready(function(){
(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');ga("create","' . htmlspecialchars($xenOptions['googleAnalyticsWebPropertyId'], ENT_QUOTES, 'UTF-8') . '","auto");ga("require","displayfeatures");ga(\'set\',\'forceSSL\',true);
if(XenForo.visitor.user_id>0){ga(\'set\',\'&uid\',XenForo.visitor.user_id);';
if ($xenOptions['dpBetterAnalyticsDimensionIndexUser'])
{
$__compilerVar78 .= 'ga(\'set\',\'dimension' . htmlspecialchars($xenOptions['dpBetterAnalyticsDimensionIndexUser'], ENT_QUOTES, 'UTF-8') . '\',XenForo.visitor.user_id);';
}
$__compilerVar78 .= '}
';
if ($xenOptions['dpBetterAnalyticsDimentionIndex'])
{
$__compilerVar78 .= 'if (typeof XenForo.node_name!=\'undefined\') {ga(\'set\',\'dimension' . htmlspecialchars($xenOptions['dpBetterAnalyticsDimentionIndex'], ENT_QUOTES, 'UTF-8') . '\',XenForo.node_name);}';
}
$__compilerVar78 .= '
if("/account/upgrades"==document.location.pathname.substr(-17)){ga("require","ec");var position=1;$("form.upgradeForm").each(function(){ $(this).find(\'input[type="submit"]\').on("click",function(){var name=$(this).closest("form").find(\'input[name="item_name"]\').val().match(/^.*?: (.*) \\(/)[1];ga("ec:addProduct",{id:"UU-"+$(this).closest("form").find(\'input[name="custom"]\').val().match(/^.*?,(.*?),/)[1],name:name,category:"User Upgrades"});ga("ec:setAction","checkout");ga("send","event","Checkout","Click",name)});
ga("ec:addImpression",{id:"UU-"+$(this).find(\'input[name="custom"]\').val().match(/^.*?,(.*?),/)[1],name:$(this).find(\'input[name="item_name"]\').val().match(/^.*?: (.*) \\(/)[1],category:"User Upgrades",list:"User Upgrade List",position:position++})})};
if (document.referrer.match(/paypal\\.com.*?cgi-bin\\/webscr|facebook\\.com.*?dialog\\/oauth|twitter\\.com\\/oauth|google\\.com.*?\\/oauth2/) != null){ga(\'set\',\'referrer\',\'\');}
ga("send","pageview");
';
if ($xenOptions['dpAnalyticsEvents']['user_engagement'])
{
$__compilerVar78 .= 'setTimeout("ga(\'send\',\'event\',\'User\',\'Engagement\',\'Time on page more than 15 seconds\')",15000);';
}
$__compilerVar78 .= '
';
if ($xenOptions['dpAnalyticsEvents']['ajax_requests'] && $xenOptions['dpAnalyticsInternal']['v'])
{
$__compilerVar78 .= '$(document).ajaxComplete(function(a,b,u){var p=document.createElement(\'a\');p.href=u.url;ga(\'send\',\'event\',\'AJAX Request\',\'Trigger\',p.pathname);});';
}
$__compilerVar78 .= '
';
if ($xenOptions['dpAnalyticsEvents']['links'] && $xenOptions['dpAnalyticsInternal']['v'])
{
$__compilerVar78 .= '$(\'.externalLink\').on(\'click\',function(){ga(\'send\', \'event\',\'Link\',\'Click\', $(this).prop(\'href\'))});';
}
$__compilerVar78 .= '
';
if ($xenOptions['dpAnalyticsEvents']['js_error'] && $xenOptions['dpAnalyticsInternal']['v'])
{
$__compilerVar78 .= '"object"==typeof window.onerror&&(window.onerror=function(a,b,c){ga("send","event","Error","JavaScript",c+": "+a+" ("+window.location.origin+window.location.pathname+" | "+b+")")});';
}
$__compilerVar78 .= '
';
if ($xenOptions['dpAnalyticsEvents']['ajax_error'] && $xenOptions['dpAnalyticsInternal']['v'])
{
$__compilerVar78 .= '$(document).ajaxError(function(b,c,a){ga("send","event","Error","AJAX",window.location.origin+window.location.pathname+" | "+a.url)});';
}
$__compilerVar78 .= '
setTimeout(function(){try{FB.Event.subscribe("edge.create",function(a){ga("send","social","Facebook","Like",a)}),FB.Event.subscribe("edge.remove",function(a){ga("send","social","Facebook","Unlike",a)}),twttr.ready(function(a){a.events.bind("tweet",function(b){if(b){var a;b.target&&"IFRAME"==b.target.nodeName&&(a=ePFU(b.target.src,"url"));ga("send","social","Twitter","Tweet",a)}});a.events.bind("follow",function(b){if(b){var a;b.target&&"IFRAME"==b.target.nodeName&&(a=
ePFU(b.target.src,"url"));ga("send","social","Twitter","Follow",a)}})})}catch(c){}},1E3);
});
function ePFU(c,a){if(c){c=c.split("#")[0];var b=c.split("?");if(1!=b.length){b=decodeURI(b[1]);a+="=";for(var b=b.split("&"),e=0,d;d=b[e];++e)if(0===d.indexOf(a))return unescape(d.split("=")[1])}}}';
$__compilerVar76 .= $__compilerVar78;
unset($__compilerVar78);
$__compilerVar76 .= '
</script>';
}
$__compilerVar76 .= '
	
	<link rel="apple-touch-icon" href="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
)) . '" />
	<link rel="alternate" type="application/rss+xml" title="' . 'RSS Feed For ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '' . '" href="' . XenForo_Template_Helper_Core::link('forums/-/index.rss', false, array()) . '" />
	';
if ($pageDescription['content'] AND !$pageDescription['skipmeta'] AND !$head['description'])
{
$__compilerVar76 .= '<meta name="description" content="' . XenForo_Template_Helper_Core::string('wordTrim', array(
'0' => XenForo_Template_Helper_Core::callHelper('stripHtml', array(
'0' => $pageDescription['content']
)),
'1' => '200'
)) . '" />';
}
$__compilerVar76 .= '
	';
if ($head)
{
foreach ($head AS $headElement)
{
$__compilerVar76 .= $headElement;
}
}
$__compilerVar76 .= '
';
$__output .= $this->callTemplateHook('page_container_head', $__compilerVar76, array());
unset($__compilerVar76);
$__output .= '
</head>

<body' . (($bodyClasses) ? (' class="' . htmlspecialchars($bodyClasses, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>
<div id="spot-im-root"></div>
<script type="text/javascript">!function(t,o,p){function e(){var t=o.createElement("script");t.type="text/javascript",t.async=!0,t.src=("https:"==o.location.protocol?"https":"http")+":"+p,o.body.appendChild(t)}t.spotId="a3f1870448d2db61ddb6448e86037a26",t.spotName="",t.allowDesktop=!0,t.allowMobile=!1,t.containerId="spot-im-root",e()}(window.SPOTIM={},document,"//www.spot.im/embed/scripts/launcher.js");</script>

	<!--<div class="fb-like" data-href="https://www.facebook.com/thongtin.congnghe.moinhat" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false" style="float:left;display:relative;z-index:1000000;margin-top:5px;"></div>-->
';
$__compilerVar79 = '';
$__compilerVar79 .= '

';
if ($visitor['is_moderator'] || $visitor['is_admin'])
{
$__compilerVar79 .= '
	';
$__compilerVar80 = '';
$this->addRequiredExternal('css', 'moderator_bar');
$__compilerVar80 .= '

';
$__compilerVar81 = '';
$__compilerVar81 .= '
			';
if ($visitor['is_admin'])
{
$__compilerVar81 .= '			
				<a href="admin.php" class="acp adminLink"><span class="itemLabel">' . 'Admin' . '</span></a>
				
				';
if ($session['permissionTest'])
{
$__compilerVar81 .= '
					<a href="' . XenForo_Template_Helper_Core::link('misc/reset-permissions', false, array()) . '" class="permissionTest adminLink OverlayTrigger">
						<span class="itemLabel">' . 'Permissions from ' . htmlspecialchars($session['permissionTest']['username'], ENT_QUOTES, 'UTF-8') . '' . '</span>
					</a>
				';
}
$__compilerVar81 .= '
			';
}
$__compilerVar81 .= '
			
			';
if ($visitor['is_moderator'] AND $session['moderationCounts']['total'])
{
$__compilerVar81 .= '
				<a href="' . XenForo_Template_Helper_Core::link('moderation-queue', false, array()) . '" class="moderationQueue modLink">
					<span class="itemLabel">' . 'Moderation' . ':</span>
					<span class="itemCount ' . (($session['moderationCounts']['total']) ? ('alert') : ('')) . '">' . htmlspecialchars($session['moderationCounts']['total'], ENT_QUOTES, 'UTF-8') . '</span>
				</a>
			';
}
$__compilerVar81 .= '
			
			';
if ($visitor['is_moderator'] && !$xenOptions['reportIntoForumId'])
{
$__compilerVar81 .= '
				<a href="' . XenForo_Template_Helper_Core::link('reports', false, array()) . '" class="reportedItems modLink">
					<span class="itemLabel">' . 'Báo cáo ' . ':</span>
					<span class="itemCount ' . ((($session['reportCounts']['total'] AND $session['reportCounts']['lastUpdate'] > $session['reportLastRead']) OR $session['reportCounts']['assigned']) ? ('alert') : ('')) . '" title="' . (($session['reportCounts']['lastUpdate']) ? ('Last Report Update' . ': ' . XenForo_Template_Helper_Core::datetime($session['reportCounts']['lastUpdate'], '')) : ('')) . '">';
if ($session['reportCounts']['assigned'])
{
$__compilerVar81 .= htmlspecialchars($session['reportCounts']['assigned'], ENT_QUOTES, 'UTF-8') . ' / ' . htmlspecialchars($session['reportCounts']['total'], ENT_QUOTES, 'UTF-8');
}
else
{
$__compilerVar81 .= htmlspecialchars($session['reportCounts']['total'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar81 .= '</span>
				</a>
			';
}
$__compilerVar81 .= '
			
			';
if ($visitor['is_admin'] AND $session['canAdminUsers'] AND $session['userModerationCounts']['total'])
{
$__compilerVar81 .= '
				<a href="admin.php?users/moderated" class="userModerationQueue modLink">
					<span class="itemLabel">' . 'Users' . ':</span>
					<span class="itemCount ' . (($session['userModerationCounts']['total']) ? ('alert') : ('')) . '">' . htmlspecialchars($session['userModerationCounts']['total'], ENT_QUOTES, 'UTF-8') . '</span>
				</a>
			';
}
$__compilerVar81 .= '

			';
$__compilerVar82 = '';
$__compilerVar81 .= $this->callTemplateHook('moderator_bar', $__compilerVar82, array());
unset($__compilerVar82);
$__compilerVar81 .= '
		';
if (trim($__compilerVar81) !== '')
{
$__compilerVar80 .= '
<fieldset id="moderatorBar">
	<div class="pageWidth">
		<div class="pageContent">
		' . $__compilerVar81 . '
			
			<span class="helper"></span>
		</div>
	</div>
</fieldset>
';
}
unset($__compilerVar81);
$__compilerVar79 .= $__compilerVar80;
unset($__compilerVar80);
$__compilerVar79 .= '
';
}
else if (!$visitor['user_id'] && !$hideLoginBar)
{
$__compilerVar79 .= '
	';
$__compilerVar83 = '';
$this->addRequiredExternal('css', 'login_bar');
$__compilerVar83 .= '

<div id="loginBar">
	<div class="pageWidth">
		<div class="pageContent">	
			<h3 id="loginBarHandle">
				<label for="LoginControl"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="concealed noOutline">' . (($xenOptions['registrationSetup']['enabled']) ? ('Đăng nhập | Đăng ký') : ('Đăng nhập')) . '</a></label>
			</h3>
			
			<span class="helper"></span>

			' . '
		</div>
	</div>
</div>';
$__compilerVar79 .= $__compilerVar83;
unset($__compilerVar83);
$__compilerVar79 .= '
';
}
$__compilerVar79 .= '

<div id="fb-root"></div>
<script async>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=357847831089071&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>
<div id="headerMover">
	<div id="headerProxy"></div>

<div id="content" class="' . htmlspecialchars($contentTemplate, ENT_QUOTES, 'UTF-8') . '">
	<div class="pageWidth">
		<div class="pageContent">
			<!-- main content area -->
			
			';
$__compilerVar84 = '';
$__compilerVar79 .= $this->callTemplateCallback('DigitalPointSocialBar_Callback_SocialBar', 'renderSocialBar', $__compilerVar84, array());
unset($__compilerVar84);
$__compilerVar79 .= '
';
$__compilerVar85 = '';
$__compilerVar79 .= $this->callTemplateHook('page_container_content_top', $__compilerVar85, array());
unset($__compilerVar85);
$__compilerVar79 .= '
			
			';
if ($sidebar)
{
$__compilerVar79 .= '
				<div class="mainContainer">
					<div class="mainContent">';
}
$__compilerVar79 .= '
						
						';
$__compilerVar86 = '';
$__compilerVar87 = '';
$__compilerVar86 .= $this->callTemplateHook('ad_above_top_breadcrumb', $__compilerVar87, array());
unset($__compilerVar87);
$__compilerVar86 .= '
<!--<div class="facebookLike shareControl custom_share_bar">
	';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar86 .= '
	<fb:like href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '" layout="button_count" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
</div>


<div class="plusone shareControl custom_share_bar">
	<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"></div>
</div>
-->

	';
$__compilerVar79 .= $__compilerVar86;
unset($__compilerVar86);
$__compilerVar79 .= '
						
						';
$__compilerVar88 = '';
$__compilerVar88 .= '
						<div class="breadBoxTop ' . (($topctrl) ? ('withTopCtrl') : ('')) . '">
							';
if ($topctrl)
{
$__compilerVar88 .= '<div class="topCtrl">' . $topctrl . '</div>';
}
$__compilerVar88 .= '
							';
$__compilerVar89 = '';
$__compilerVar89 .= '1';
$__compilerVar90 = '';
$__compilerVar90 .= '

<nav>
	';
if (!$quickNavSelected AND $navigation)
{
$__compilerVar90 .= '
		';
foreach ($navigation AS $breadcrumb)
{
$__compilerVar90 .= '
			';
if ($breadcrumb['node_id'])
{
$__compilerVar90 .= '
				';
$quickNavSelected = '';
$quickNavSelected .= 'node-' . htmlspecialchars($breadcrumb['node_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar90 .= '
			';
}
$__compilerVar90 .= '
		';
}
$__compilerVar90 .= '
	';
}
$__compilerVar90 .= '

	<fieldset class="breadcrumb">
		<a href="' . XenForo_Template_Helper_Core::link('misc/quick-navigation-menu', '', array(
'selected' => $quickNavSelected
)) . '" class="OverlayTrigger jumpMenuTrigger" data-cacheOverlay="true" title="' . 'Mở điều hướng nhanh' . '"><!--' . 'Jump to' . '...--></a>
			
		<div class="boardTitle"><strong>' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '</strong></div>
		
		<span class="crumbs">
			';
if ($showHomeLink)
{
$__compilerVar90 .= '
				<span class="crust homeCrumb"' . (($__compilerVar89) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
					<a href="' . htmlspecialchars($homeLink, ENT_QUOTES, 'UTF-8') . '" class="crumb"' . (($__compilerVar89) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($__compilerVar89) ? (' itemprop="title"') : ('')) . '>' . 'Trang chủ' . '</span></a>
					<span class="arrow"><span></span></span>
				</span>
			';
}
else if ($selectedTabId != $homeTabId)
{
$__compilerVar90 .= '
				<span class="crust homeCrumb"' . (($__compilerVar89) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
					<a href="' . htmlspecialchars($homeTab['href'], ENT_QUOTES, 'UTF-8') . '" class="crumb"' . (($__compilerVar89) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($__compilerVar89) ? (' itemprop="title"') : ('')) . '>' . htmlspecialchars($homeTab['title'], ENT_QUOTES, 'UTF-8') . '</span></a>
					<span class="arrow"><span></span></span>
				</span>
			';
}
$__compilerVar90 .= '
			
			';
if ($selectedTab)
{
$__compilerVar90 .= '
				<span class="crust selectedTabCrumb"' . (($__compilerVar89) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
					<a href="' . htmlspecialchars($selectedTab['href'], ENT_QUOTES, 'UTF-8') . '" class="crumb"' . (($__compilerVar89) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($__compilerVar89) ? (' itemprop="title"') : ('')) . '>' . htmlspecialchars($selectedTab['title'], ENT_QUOTES, 'UTF-8') . '</span></a>
					<span class="arrow"><span>&gt;</span></span>
				</span>
			';
}
$__compilerVar90 .= '
			
			';
if ($navigation)
{
$__compilerVar90 .= '
				';
$i = 0;
$count = count($navigation);
foreach ($navigation AS $breadcrumb)
{
$i++;
$__compilerVar90 .= '
					<span class="crust"' . (($__compilerVar89) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
						<a href="' . $breadcrumb['href'] . '" class="crumb"' . (($__compilerVar89) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($__compilerVar89) ? (' itemprop="title"') : ('')) . '>' . $breadcrumb['value'] . '</span></a>
						<span class="arrow"><span>&gt;</span></span>
					</span>
				';
}
$__compilerVar90 .= '
			';
}
$__compilerVar90 .= '
		</span>
	</fieldset>
</nav>';
$__compilerVar88 .= $__compilerVar90;
unset($__compilerVar89, $__compilerVar90);
$__compilerVar88 .= '
						</div>
						';
$__compilerVar79 .= $this->callTemplateHook('page_container_breadcrumb_top', $__compilerVar88, array());
unset($__compilerVar88);
$__compilerVar79 .= '
						
						';
$__compilerVar91 = '';
$__compilerVar92 = '';
$__compilerVar91 .= $this->callTemplateHook('ad_below_top_breadcrumb', $__compilerVar92, array());
unset($__compilerVar92);
$__compilerVar79 .= $__compilerVar91;
unset($__compilerVar91);
$__compilerVar79 .= '
					
						<!--[if lt IE 8]>
							<p class="importantMessage">' . 'You are using an out of date browser. It  may not display this or other websites correctly.<br />You should upgrade or use an <a href="https://www.google.com/chrome" target="_blank">alternative browser</a>.' . '</p>
						<![endif]-->

						';
$__compilerVar93 = '';
$__compilerVar93 .= '
						';
$__compilerVar94 = '';
if ($notices)
{
$__compilerVar94 .= '

';
$this->addRequiredExternal('css', 'panel_scroller');
$__compilerVar94 .= '
' . '

<div class="' . ((XenForo_Template_Helper_Core::styleProperty('scrollableNotices')) ? ('PanelScroller') : ('PanelScrollerOff')) . '" id="Notices" data-vertical="' . XenForo_Template_Helper_Core::styleProperty('noticeVertical') . '" data-speed="' . XenForo_Template_Helper_Core::styleProperty('noticeSpeed') . '" data-interval="' . XenForo_Template_Helper_Core::styleProperty('noticeInterval') . '">
	<div class="scrollContainer">
		<div class="PanelContainer">
			<ol class="Panels">
				';
foreach ($notices AS $noticeId => $notice)
{
$__compilerVar94 .= '
					';
$__compilerVar95 = '';
$__compilerVar95 .= $notice['message'];
$__compilerVar96 = '';
$__compilerVar96 .= '<li class="panel Notice DismissParent notice_' . htmlspecialchars($noticeId, ENT_QUOTES, 'UTF-8') . '">
	<div class="' . (($notice['wrap']) ? ('baseHtml noticeContent') : ('')) . '">' . $__compilerVar95 . '</div>
	
	';
if ($notice['dismissible'])
{
$__compilerVar96 .= '
		<a href="' . XenForo_Template_Helper_Core::link('account/dismiss-notice', '', array(
'notice_id' => $noticeId
)) . '"
			title="' . 'Dismiss Notice' . '" class="DismissCtrl Tooltip" data-offsetx="7" data-tipclass="flipped">' . 'Dismiss Notice' . '</a>';
}
$__compilerVar96 .= '
</li>';
$__compilerVar94 .= $__compilerVar96;
unset($__compilerVar95, $__compilerVar96);
$__compilerVar94 .= '
				';
}
$__compilerVar94 .= '
			</ol>
		</div>
	</div>
	
	';
if (XenForo_Template_Helper_Core::styleProperty('scrollableNotices') AND XenForo_Template_Helper_Core::numberFormat(count($notices), '0') > 1)
{
$__compilerVar94 .= '<div class="navContainer">
		<span class="navControls Nav JsOnly">
			';
$i = 0;
foreach ($notices AS $noticeId => $notice)
{
$i++;
$__compilerVar94 .= '
				<a id="n' . htmlspecialchars($noticeId, ENT_QUOTES, 'UTF-8') . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#n' . htmlspecialchars($noticeId, ENT_QUOTES, 'UTF-8') . '"' . (($i == 1) ? (' class="current"') : ('')) . '>
					<span class="arrow"><span></span></span>
					<!--' . htmlspecialchars($i, ENT_QUOTES, 'UTF-8') . ' -->' . htmlspecialchars($notice['title'], ENT_QUOTES, 'UTF-8') . '</a>
			';
}
$__compilerVar94 .= '
		</span>
	</div>';
}
$__compilerVar94 .= '
</div>

';
}
$__compilerVar93 .= $__compilerVar94;
unset($__compilerVar94);
$__compilerVar93 .= '						
						';
$__compilerVar79 .= $this->callTemplateHook('page_container_notices', $__compilerVar93, array());
unset($__compilerVar93);
$__compilerVar79 .= '
						
						';
$__compilerVar97 = '';
$__compilerVar97 .= '
						';
if (!$noH1)
{
$__compilerVar97 .= '						
							<!-- h1 title, description -->
							<div class="titleBar">
								' . $beforeH1 . '
								<h1>';
if ($h1)
{
$__compilerVar97 .= $h1;
}
else if ($title)
{
$__compilerVar97 .= $title;
}
else
{
$__compilerVar97 .= htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar97 .= '</h1>
								
								';
if ($pageDescription['content'])
{
$__compilerVar97 .= '<p id="pageDescription" class="muted ' . htmlspecialchars($pageDescription['class'], ENT_QUOTES, 'UTF-8') . '">' . $pageDescription['content'] . '</p>';
}
$__compilerVar97 .= '
							</div>
						';
}
$__compilerVar97 .= '
						';
$__compilerVar79 .= $this->callTemplateHook('page_container_content_title_bar', $__compilerVar97, array());
unset($__compilerVar97);
$__compilerVar79 .= '
						
						';
$__compilerVar98 = '';
$__compilerVar99 = '';
$__compilerVar98 .= $this->callTemplateHook('ad_above_content', $__compilerVar99, array());
unset($__compilerVar99);
$__compilerVar79 .= $__compilerVar98;
unset($__compilerVar98);
$__compilerVar79 .= '
						
						<!-- main template -->
						' . $contents . '
						
						';
$__compilerVar100 = '';
$__compilerVar101 = '';
$__compilerVar100 .= $this->callTemplateHook('ad_below_content', $__compilerVar101, array());
unset($__compilerVar101);
$__compilerVar79 .= $__compilerVar100;
unset($__compilerVar100);
$__compilerVar79 .= '
						
						';
if (!$visitor['user_id'] && !$hideLoginBar)
{
$__compilerVar79 .= '
							<!-- login form, to be moved to the upper drop-down -->
							';
$__compilerVar102 = '';
$__compilerVar102 .= '

';
$__compilerVar103 = '';
$__compilerVar103 .= '
';
if ($xenOptions['facebookAppId'])
{
$eAuth = '';
$eAuth .= '1';
}
$__compilerVar103 .= '
';
if ($xenOptions['twitterAppKey'])
{
$eAuth = '';
$eAuth .= '1';
}
$__compilerVar103 .= '
';
if ($xenOptions['googleClientId'])
{
$eAuth = '';
$eAuth .= '1';
}
$__compilerVar103 .= '
';
$__compilerVar102 .= $this->callTemplateHook('login_bar_eauth_set', $__compilerVar103, array());
unset($__compilerVar103);
$__compilerVar102 .= '

<form action="' . XenForo_Template_Helper_Core::link('login/login', false, array()) . '" method="post" class="xenForm ' . (($eAuth) ? ('eAuth') : ('')) . '" id="login" style="display:none">

	';
$__compilerVar104 = '';
$__compilerVar104 .= '
				';
$__compilerVar105 = '';
$__compilerVar105 .= '
				';
if ($xenOptions['facebookAppId'])
{
$__compilerVar105 .= '
					';
$this->addRequiredExternal('css', 'facebook');
$__compilerVar105 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin" tabindex="110"><span>' . 'Login with Facebook' . '</span></a></li>
				';
}
$__compilerVar105 .= '
				
				';
if ($xenOptions['twitterAppKey'])
{
$__compilerVar105 .= '
					';
$this->addRequiredExternal('css', 'twitter');
$__compilerVar105 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('register/twitter', '', array(
'reg' => '1'
)) . '" class="twitterLogin" tabindex="110"><span>' . 'Log in with Twitter' . '</span></a></li>
				';
}
$__compilerVar105 .= '
				
				';
if ($xenOptions['googleClientId'])
{
$__compilerVar105 .= '
					';
$this->addRequiredExternal('css', 'google');
$__compilerVar105 .= '
					<li><span class="googleLogin GoogleLogin JsOnly" tabindex="110" data-client-id="' . htmlspecialchars($xenOptions['googleClientId'], ENT_QUOTES, 'UTF-8') . '" data-redirect-url="' . XenForo_Template_Helper_Core::link('register/google', '', array(
'code' => '__CODE__',
'csrf' => $session['sessionCsrf']
)) . '"><span>' . 'Log in with Google' . '</span></span></li>
				';
}
$__compilerVar105 .= '
				';
$__compilerVar104 .= $this->callTemplateHook('login_bar_eauth_items', $__compilerVar105, array());
unset($__compilerVar105);
$__compilerVar104 .= '
			';
if (trim($__compilerVar104) !== '')
{
$__compilerVar102 .= '
		<ul id="eAuthUnit">
			' . $__compilerVar104 . '
		</ul>
	';
}
unset($__compilerVar104);
$__compilerVar102 .= '

	<div class="ctrlWrapper">
		<dl class="ctrlUnit">
			<dt><label for="LoginControl">' . 'Tên tài khoản hoặc địa chỉ Email' . ':</label></dt>
			<dd><input type="text" name="login" id="LoginControl" class="textCtrl" tabindex="101" /></dd>
		</dl>
	
	';
if ($xenOptions['registrationSetup']['enabled'])
{
$__compilerVar102 .= '
		<dl class="ctrlUnit">
			<dt>
				<label for="ctrl_password">' . 'Bạn đã có tài khoản rồi?' . '</label>
			</dt>
			<dd>
				<ul>
					<li><label for="ctrl_not_registered"><input type="radio" name="register" value="1" id="ctrl_not_registered" tabindex="105" />
						' . 'Tích vào đây để đăng ký' . '</label></li>
					<li><label for="ctrl_registered"><input type="radio" name="register" value="0" id="ctrl_registered" tabindex="105" checked="checked" class="Disabler" />
						' . 'Vâng, Mật khẩu của tôi là' . ':</label></li>
					<li id="ctrl_registered_Disabler">
						<input type="password" name="password" class="textCtrl" id="ctrl_password" tabindex="102" />
						<div class="lostPassword"><a href="' . XenForo_Template_Helper_Core::link('lost-password', false, array()) . '" class="OverlayTrigger OverlayCloser" tabindex="106">' . 'Bạn đã quên mật khẩu?' . '</a></div>
					</li>
				</ul>
			</dd>
		</dl>
	';
}
else
{
$__compilerVar102 .= '
		<dl class="ctrlUnit">
			<dt>
				<label for="ctrl_password">' . 'Mật khẩu' . ':</label>
			</dt>
			<dd>
				<input type="password" name="password" class="textCtrl" id="ctrl_password" tabindex="102" />
				<div class="lostPasswordLogin"><a href="' . XenForo_Template_Helper_Core::link('lost-password', false, array()) . '" class="OverlayTrigger OverlayCloser" tabindex="106">' . 'Bạn đã quên mật khẩu?' . '</a></div>
			</dd>
		</dl>
	';
}
$__compilerVar102 .= '
		
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" class="button primary" value="' . 'Đăng nhập' . '" tabindex="104" data-loginPhrase="' . 'Đăng nhập' . '" data-signupPhrase="' . 'Đăng ký' . '" />
				<label for="ctrl_remember" class="rememberPassword"><input type="checkbox" name="remember" value="1" id="ctrl_remember" tabindex="103" /> ' . 'Duy trì đăng nhập' . '</label>
			</dd>
		</dl>
	</div>

	<input type="hidden" name="cookie_check" value="1" />
	<input type="hidden" name="redirect" value="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

</form>';
$__compilerVar79 .= $__compilerVar102;
unset($__compilerVar102);
$__compilerVar79 .= '
						';
}
$__compilerVar79 .= '
						
					';
if ($sidebar)
{
$__compilerVar79 .= '</div>
				</div>
				
				<!-- sidebar -->
				<aside>
					<div class="sidebar">
						';
$__compilerVar106 = '';
$__compilerVar106 .= '
						';
$__compilerVar107 = '';
$__compilerVar108 = '';
$__compilerVar107 .= $this->callTemplateHook('ad_sidebar_top', $__compilerVar108, array());
unset($__compilerVar108);
$__compilerVar106 .= $__compilerVar107;
unset($__compilerVar107);
$__compilerVar106 .= '
						';
if (!$noVisitorPanel)
{
$__compilerVar109 = '';
if ($visitor['user_id'])
{
$__compilerVar109 .= '

<div class="section visitorPanel">
	<div class="secondaryContent">
	
		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 'm',
'img' => 'true'
),'')) . '
		
		<div class="visitorText">
			<h2>' . '<span class="muted">Signed in as</span> ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $visitor,
'1' => 'NoOverlay'
)) . '' . '</h2>		
			<div class="stats">
			';
$__compilerVar110 = '';
$__compilerVar110 .= '
				<dl class="pairsJustified"><dt>' . 'Bài viết' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['message_count'], '0') . '</dd></dl>
				<dl class="pairsJustified"><dt>' . 'Thích' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['like_count'], '0') . '</dd></dl>
				<dl class="pairsJustified"><dt>' . 'Điểm' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['trophy_points'], '0') . '</dd></dl>
			</div>
			';
$__compilerVar109 .= $this->callTemplateHook('sidebar_visitor_panel_stats', $__compilerVar110, array());
unset($__compilerVar110);
$__compilerVar109 .= '
		</div>
		
	</div>
</div>

';
}
else
{
$__compilerVar109 .= '

<div class="section loginButton">		
	<div class="secondaryContent">
		<!--<label for="LoginControl" id="SignupButton"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="inner">' . (($xenOptions['registrationSetup']['enabled']) ? ('Đăng ký!') : ('Đăng nhập')) . '</a></label>
';
$__compilerVar111 = '';
$this->addRequiredExternal('css', 'cta_login');
$__compilerVar111 .= '

';
if ($xenOptions['facebookAppId'])
{
$__compilerVar111 .= '
	';
$this->addRequiredExternal('css', 'facebook');
$__compilerVar111 .= '
	<li class="ctaLoginFacebook"><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin"><span>' . 'Login with Facebook' . '</span></a></li>
';
}
$__compilerVar111 .= '

';
if ($xenOptions['twitterAppKey'])
{
$__compilerVar111 .= '
	';
$this->addRequiredExternal('css', 'twitter');
$__compilerVar111 .= '
	<li class="ctaLoginTwitter"><a href="' . XenForo_Template_Helper_Core::link('register/twitter', '', array(
'reg' => '1'
)) . '" class="twitterLogin"><span>' . 'Log in with Twitter' . '</span></a></li>
';
}
$__compilerVar111 .= '

';
if ($xenOptions['googleClientId'])
{
$__compilerVar111 .= '
	';
$this->addRequiredExternal('css', 'google');
$__compilerVar111 .= '
	<li class="ctaLoginGoogle"><span class="googleLogin GoogleLogin JsOnly" data-client-id="' . htmlspecialchars($xenOptions['googleClientId'], ENT_QUOTES, 'UTF-8') . '" data-redirect-url="' . XenForo_Template_Helper_Core::link('register/google', '', array(
'code' => '__CODE__',
'csrf' => $session['sessionCsrf']
)) . '"><span>' . 'Log in with Google' . '</span></span></li>
';
}
$__compilerVar109 .= $__compilerVar111;
unset($__compilerVar111);
$__compilerVar109 .= '-->
		<label for="LoginControl" id="SignupButton"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="inner">' . 'Đăng ký | Đăng nhập' . '</a></label>
';
$__compilerVar112 = '';
$this->addRequiredExternal('css', 'cta_login');
$__compilerVar112 .= '

';
if ($xenOptions['facebookAppId'])
{
$__compilerVar112 .= '
	';
$this->addRequiredExternal('css', 'facebook');
$__compilerVar112 .= '
	<li class="ctaLoginFacebook"><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin"><span>' . 'Login with Facebook' . '</span></a></li>
';
}
$__compilerVar112 .= '

';
if ($xenOptions['twitterAppKey'])
{
$__compilerVar112 .= '
	';
$this->addRequiredExternal('css', 'twitter');
$__compilerVar112 .= '
	<li class="ctaLoginTwitter"><a href="' . XenForo_Template_Helper_Core::link('register/twitter', '', array(
'reg' => '1'
)) . '" class="twitterLogin"><span>' . 'Log in with Twitter' . '</span></a></li>
';
}
$__compilerVar112 .= '

';
if ($xenOptions['googleClientId'])
{
$__compilerVar112 .= '
	';
$this->addRequiredExternal('css', 'google');
$__compilerVar112 .= '
	<li class="ctaLoginGoogle"><span class="googleLogin GoogleLogin JsOnly" data-client-id="' . htmlspecialchars($xenOptions['googleClientId'], ENT_QUOTES, 'UTF-8') . '" data-redirect-url="' . XenForo_Template_Helper_Core::link('register/google', '', array(
'code' => '__CODE__',
'csrf' => $session['sessionCsrf']
)) . '"><span>' . 'Log in with Google' . '</span></span></li>
';
}
$__compilerVar109 .= $__compilerVar112;
unset($__compilerVar112);
$__compilerVar109 .= '
	</div>
</div>

';
}
$__compilerVar109 .= '

';
$__compilerVar113 = '';
$__compilerVar114 = '';
$__compilerVar113 .= $this->callTemplateHook('ad_sidebar_below_visitor_panel', $__compilerVar114, array());
unset($__compilerVar114);
$__compilerVar109 .= $__compilerVar113;
unset($__compilerVar113);
$__compilerVar106 .= $__compilerVar109;
unset($__compilerVar109);
}
$__compilerVar106 .= '
						' . $sidebar . '
						';
$__compilerVar115 = '';
$__compilerVar116 = '';
$__compilerVar115 .= $this->callTemplateHook('ad_sidebar_bottom', $__compilerVar116, array());
unset($__compilerVar116);
$__compilerVar106 .= $__compilerVar115;
unset($__compilerVar115);
$__compilerVar106 .= '
						';
$__compilerVar79 .= $this->callTemplateHook('page_container_sidebar', $__compilerVar106, array());
unset($__compilerVar106);
$__compilerVar79 .= '
					</div>
				</aside>
			';
}
$__compilerVar79 .= '
			
			';
$__compilerVar117 = '';
$__compilerVar117 .= '			
			<div class="breadBoxBottom">';
$__compilerVar118 = '';
$__compilerVar118 .= '

<nav>
	';
if (!$quickNavSelected AND $navigation)
{
$__compilerVar118 .= '
		';
foreach ($navigation AS $breadcrumb)
{
$__compilerVar118 .= '
			';
if ($breadcrumb['node_id'])
{
$__compilerVar118 .= '
				';
$quickNavSelected = '';
$quickNavSelected .= 'node-' . htmlspecialchars($breadcrumb['node_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar118 .= '
			';
}
$__compilerVar118 .= '
		';
}
$__compilerVar118 .= '
	';
}
$__compilerVar118 .= '

	<fieldset class="breadcrumb">
		<a href="' . XenForo_Template_Helper_Core::link('misc/quick-navigation-menu', '', array(
'selected' => $quickNavSelected
)) . '" class="OverlayTrigger jumpMenuTrigger" data-cacheOverlay="true" title="' . 'Mở điều hướng nhanh' . '"><!--' . 'Jump to' . '...--></a>
			
		<div class="boardTitle"><strong>' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '</strong></div>
		
		<span class="crumbs">
			';
if ($showHomeLink)
{
$__compilerVar118 .= '
				<span class="crust homeCrumb"' . (($microdata) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
					<a href="' . htmlspecialchars($homeLink, ENT_QUOTES, 'UTF-8') . '" class="crumb"' . (($microdata) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($microdata) ? (' itemprop="title"') : ('')) . '>' . 'Trang chủ' . '</span></a>
					<span class="arrow"><span></span></span>
				</span>
			';
}
else if ($selectedTabId != $homeTabId)
{
$__compilerVar118 .= '
				<span class="crust homeCrumb"' . (($microdata) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
					<a href="' . htmlspecialchars($homeTab['href'], ENT_QUOTES, 'UTF-8') . '" class="crumb"' . (($microdata) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($microdata) ? (' itemprop="title"') : ('')) . '>' . htmlspecialchars($homeTab['title'], ENT_QUOTES, 'UTF-8') . '</span></a>
					<span class="arrow"><span></span></span>
				</span>
			';
}
$__compilerVar118 .= '
			
			';
if ($selectedTab)
{
$__compilerVar118 .= '
				<span class="crust selectedTabCrumb"' . (($microdata) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
					<a href="' . htmlspecialchars($selectedTab['href'], ENT_QUOTES, 'UTF-8') . '" class="crumb"' . (($microdata) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($microdata) ? (' itemprop="title"') : ('')) . '>' . htmlspecialchars($selectedTab['title'], ENT_QUOTES, 'UTF-8') . '</span></a>
					<span class="arrow"><span>&gt;</span></span>
				</span>
			';
}
$__compilerVar118 .= '
			
			';
if ($navigation)
{
$__compilerVar118 .= '
				';
$i = 0;
$count = count($navigation);
foreach ($navigation AS $breadcrumb)
{
$i++;
$__compilerVar118 .= '
					<span class="crust"' . (($microdata) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
						<a href="' . $breadcrumb['href'] . '" class="crumb"' . (($microdata) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($microdata) ? (' itemprop="title"') : ('')) . '>' . $breadcrumb['value'] . '</span></a>
						<span class="arrow"><span>&gt;</span></span>
					</span>
				';
}
$__compilerVar118 .= '
			';
}
$__compilerVar118 .= '
		</span>
	</fieldset>
</nav>';
$__compilerVar117 .= $__compilerVar118;
unset($__compilerVar118);
$__compilerVar117 .= '</div>
			';
$__compilerVar79 .= $this->callTemplateHook('page_container_breadcrumb_bottom', $__compilerVar117, array());
unset($__compilerVar117);
$__compilerVar79 .= '
						
			';
$__compilerVar119 = '';
$__compilerVar120 = '';
$__compilerVar119 .= $this->callTemplateHook('ad_below_bottom_breadcrumb', $__compilerVar120, array());
unset($__compilerVar120);
$__compilerVar119 .= '
<!-- Start of adf.ly banner code -->
<div style="width: 100%; overflow:hidden; text-align: center; font-family: verdana; font-size: 10px;"><a href="http://adf.ly/?id=8994191"><img border="0" src="https://cdn.adf.ly/images/banners/adfly.468x60.5.gif" width="468" height="60" title="AdF.ly - shorten links and earn money!" /></a><br /><a href="http://adf.ly/?id=8994191">Get paid to share your links!</a></div>
<!-- End of adf.ly banner code -->';
$__compilerVar79 .= $__compilerVar119;
unset($__compilerVar119);
$__compilerVar79 .= '
						
		</div>
	</div>
</div>

<header>
	';
$__compilerVar121 = '';
$__compilerVar121 .= '

';
$__compilerVar122 = '';
$__compilerVar122 .= '
<div id="header">
	';
$__compilerVar123 = '';
$__compilerVar123 .= '<div id="logoBlock">
	<div class="pageWidth">
	
		<div class="pageContent">
			';
$__compilerVar124 = '';
$__compilerVar125 = '';
$__compilerVar124 .= $this->callTemplateHook('ad_header', $__compilerVar125, array());
unset($__compilerVar125);
$__compilerVar123 .= $__compilerVar124;
unset($__compilerVar124);
$__compilerVar123 .= '
			';
$__compilerVar126 = '';
$__compilerVar126 .= '
			<div id="logo"><a href="' . htmlspecialchars($logoLink, ENT_QUOTES, 'UTF-8') . '">
				<span></span>
				';
$doodle = XenForo_Template_Helper_Core::callHelper('doodle', array());
$__compilerVar126 .= '
';
if ($doodle)
{
$__compilerVar126 .= '
	';
if ($doodle['link'])
{
$__compilerVar126 .= '
	<a href="' . htmlspecialchars($doodle['link'], ENT_QUOTES, 'UTF-8') . '"><img src="' . htmlspecialchars($doodle['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" /></a>
	';
}
else
{
$__compilerVar126 .= '
	<img src="' . htmlspecialchars($doodle['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__compilerVar126 .= '
';
}
else
{
$__compilerVar126 .= '
	<img src="' . XenForo_Template_Helper_Core::styleProperty('headerLogoPath') . '" alt="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
';
}
$__compilerVar126 .= '
				
			</a></div>
			';
$__compilerVar123 .= $this->callTemplateHook('header_logo', $__compilerVar126, array());
unset($__compilerVar126);
$__compilerVar123 .= '
			<span class="helper"></span>
		</div>
	</div>
	
</div>';
$__compilerVar122 .= $__compilerVar123;
unset($__compilerVar123);
$__compilerVar122 .= '
	';
$__compilerVar127 = '';
$__compilerVar127 .= '

<div id="navigation" class="pageWidth ' . (($canSearch) ? ('withSearch') : ('')) . '">
	<div class="pageContent">
		<nav>

<div class="navTabs">
	<ul class="publicTabs">
	
		<!-- home -->
		<!--
		';
if ($showHomeLink)
{
$__compilerVar127 .= '
			<li class="navTab home PopupClosed"><a href="' . htmlspecialchars($homeLink, ENT_QUOTES, 'UTF-8') . '" class="navLink">' . 'Trang chủ' . '</a></li>
		';
}
$__compilerVar127 .= '
		-->
		
		<!-- extra tabs: home -->
		';
if ($extraTabs['home'])
{
$__compilerVar127 .= '
		';
foreach ($extraTabs['home'] AS $extraTabId => $extraTab)
{
$__compilerVar127 .= '
			';
if ($extraTab['linksTemplate'])
{
$__compilerVar127 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__compilerVar127 .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__compilerVar127 .= '</a>
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="SplitCtrl" rel="Menu"></a>
				
				<div class="' . (($extraTab['selected']) ? ('tabLinks') : ('Menu JsOnly tabMenu')) . ' ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . 'TabLinks">
					<div class="primaryContent menuHeader">
						<h3>' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8') . '</h3>
						<div class="muted">' . 'Liên kết nhanh' . '</div>
					</div>
					' . $extraTab['linksTemplate'] . '
				</div>
			</li>
			';
}
else
{
$__compilerVar127 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('PopupClosed')) . '">
					<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__compilerVar127 .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__compilerVar127 .= '</a>
					';
if ($extraTab['selected'])
{
$__compilerVar127 .= '<div class="tabLinks"></div>';
}
$__compilerVar127 .= '
				</li>
			';
}
$__compilerVar127 .= '
		';
}
$__compilerVar127 .= '
		';
}
$__compilerVar127 .= '
		
		
		<!-- forums -->
		';
if ($tabs['forums'])
{
$__compilerVar127 .= '
			<li class="navTab forums ' . (($tabs['forums']['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($tabs['forums']['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($tabs['forums']['title'], ENT_QUOTES, 'UTF-8') . '</a>
				<a href="' . htmlspecialchars($tabs['forums']['href'], ENT_QUOTES, 'UTF-8') . '" class="SplitCtrl" rel="Menu"></a>
				
				<div class="' . (($tabs['forums']['selected']) ? ('tabLinks') : ('Menu JsOnly tabMenu')) . ' forumsTabLinks">
					<div class="primaryContent menuHeader">
						<h3>' . htmlspecialchars($tabs['forums']['title'], ENT_QUOTES, 'UTF-8') . '</h3>
						<div class="muted">' . 'Liên kết nhanh' . '</div>
					</div>
					<ul class="secondaryContent blockLinksList">
					';
$__compilerVar128 = '';
$__compilerVar128 .= '
						';
if ($visitor['user_id'])
{
$__compilerVar128 .= '<li><a href="' . XenForo_Template_Helper_Core::link('forums/-/mark-read', $forum, array(
'date' => $serverTime
)) . '" class="OverlayTrigger">' . 'Đánh dấu đã đọc' . '</a></li>';
}
$__compilerVar128 .= '
						';
if ($canSearch)
{
$__compilerVar128 .= '<li><a href="' . XenForo_Template_Helper_Core::link('search', '', array(
'type' => 'post'
)) . '">' . 'Tìm kiếm diễn đàn' . '</a></li>';
}
$__compilerVar128 .= '
						';
if ($visitor['user_id'])
{
$__compilerVar128 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('watched/forums', false, array()) . '">' . 'Chủ đề đã đọc' . '</a></li>
							<li><a href="' . XenForo_Template_Helper_Core::link('watched/threads', false, array()) . '">' . 'Chủ đề đang theo dõi' . '</a></li>
						';
}
$__compilerVar128 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('find-new/posts', false, array()) . '" rel="nofollow">' . (($visitor['user_id']) ? ('Bài viết mới') : ('Bài viết gần đây')) . ' ';
$__compilerVar129 = '';
if ($visitor['user_id'])
{
$__compilerVar129 .= '
	';
$this->addRequiredExternal('css', 'unread_posts_count');
$__compilerVar129 .= '

	';
$unread = '';
$__compilerVar130 = '';
$unread .= $this->callTemplateCallback('UnreadPostCount_Callback', 'getUnreadCount', $__compilerVar130, array());
unset($__compilerVar130);
$__compilerVar129 .= '
	
	<span class="postItemCount' . (($unread) ? (' alert') : ('')) . '">
		' . XenForo_Template_Helper_Core::numberFormat($unread, '0') . '
	</span>
';
}
$__compilerVar128 .= $__compilerVar129;
unset($__compilerVar129);
$__compilerVar128 .= '</a></li>
					';
$__compilerVar127 .= $this->callTemplateHook('navigation_tabs_forums', $__compilerVar128, array());
unset($__compilerVar128);
$__compilerVar127 .= '
					</ul>
				</div>
			</li>
		';
}
$__compilerVar127 .= '
		
		
		<!-- extra tabs: middle -->
		';
if ($extraTabs['middle'])
{
$__compilerVar127 .= '
		';
foreach ($extraTabs['middle'] AS $extraTabId => $extraTab)
{
$__compilerVar127 .= '
			';
if ($extraTab['linksTemplate'])
{
$__compilerVar127 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__compilerVar127 .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__compilerVar127 .= '</a>
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="SplitCtrl" rel="Menu"></a>
				
				<div class="' . (($extraTab['selected']) ? ('tabLinks') : ('Menu JsOnly tabMenu')) . ' ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . 'TabLinks">
					<div class="primaryContent menuHeader">
						<h3>' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8') . '</h3>
						<div class="muted">' . 'Liên kết nhanh' . '</div>
					</div>
					' . $extraTab['linksTemplate'] . '
				</div>
			</li>
			';
}
else
{
$__compilerVar127 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('PopupClosed')) . '">
					<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__compilerVar127 .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__compilerVar127 .= '</a>
					';
if ($extraTab['selected'])
{
$__compilerVar127 .= '<div class="tabLinks"></div>';
}
$__compilerVar127 .= '
				</li>
			';
}
$__compilerVar127 .= '
		';
}
$__compilerVar127 .= '
		';
}
$__compilerVar127 .= '
		
		
		<!-- members -->

		';
if ($tabs['members'])
{
$__compilerVar127 .= '
			<li class="navTab members ' . (($tabs['members']['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($tabs['members']['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($tabs['members']['title'], ENT_QUOTES, 'UTF-8') . '</a>
				<a href="' . htmlspecialchars($tabs['members']['href'], ENT_QUOTES, 'UTF-8') . '" class="SplitCtrl" rel="Menu"></a>
				
				<div class="' . (($tabs['members']['selected']) ? ('tabLinks') : ('Menu JsOnly tabMenu')) . ' membersTabLinks">
					<div class="primaryContent menuHeader">
						<h3>' . htmlspecialchars($tabs['members']['title'], ENT_QUOTES, 'UTF-8') . '</h3>
						<div class="muted">' . 'Liên kết nhanh' . '</div>
					</div>
					<ul class="secondaryContent blockLinksList">
					';
$__compilerVar131 = '';
$__compilerVar131 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Thành viên tiêu biểu' . '</a></li>
						';
if ($xenOptions['enableMemberList'])
{
$__compilerVar131 .= '<li><a href="' . XenForo_Template_Helper_Core::link('members/list', false, array()) . '">' . 'Thành viên đã đăng ký' . '</a></li>';
}
$__compilerVar131 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '">' . 'Đang truy cập' . '</a></li>
						';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar131 .= '<li><a href="' . XenForo_Template_Helper_Core::link('recent-activity', false, array()) . '">' . 'Hoạt động gần đây' . '</a></li>';
}
$__compilerVar131 .= '
<li><a href="' . XenForo_Template_Helper_Core::link('members/usermap', false, array()) . '">' . 'User Map' . '</a></li>
						';
if ($canViewProfilePosts)
{
$__compilerVar131 .= '<li><a href="' . XenForo_Template_Helper_Core::link('find-new/profile-posts', false, array()) . '">' . 'New Profile Posts' . '</a></li>';
}
$__compilerVar131 .= '
					';
$__compilerVar127 .= $this->callTemplateHook('navigation_tabs_members', $__compilerVar131, array());
unset($__compilerVar131);
$__compilerVar127 .= '
					</ul>
				</div>
			</li>
		';
}
$__compilerVar127 .= '				
		
		<!-- extra tabs: end -->
		';
if ($extraTabs['end'])
{
$__compilerVar127 .= '
		';
foreach ($extraTabs['end'] AS $extraTabId => $extraTab)
{
$__compilerVar127 .= '
			';
if ($extraTab['linksTemplate'])
{
$__compilerVar127 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__compilerVar127 .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__compilerVar127 .= '</a>
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="SplitCtrl" rel="Menu"></a>
				
				<div class="' . (($extraTab['selected']) ? ('tabLinks') : ('Menu JsOnly tabMenu')) . ' ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . 'TabLinks">
					<div class="primaryContent menuHeader">
						<h3>' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8') . '</h3>
						<div class="muted">' . 'Liên kết nhanh' . '</div>
					</div>
					' . $extraTab['linksTemplate'] . '
				</div>
			</li>
			';
}
else
{
$__compilerVar127 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('PopupClosed')) . '">
					<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__compilerVar127 .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__compilerVar127 .= '</a>
					';
if ($extraTab['selected'])
{
$__compilerVar127 .= '<div class="tabLinks"></div>';
}
$__compilerVar127 .= '
				</li>
			';
}
$__compilerVar127 .= '
		';
}
$__compilerVar127 .= '
		';
}
$__compilerVar127 .= '
                
                
                <!-- responsive popup -->
		<li class="navTab navigationHiddenTabs Popup PopupControl PopupClosed" style="display:none">	
						
			<a rel="Menu" class="navLink NoPopupGadget"><span class="menuIcon">' . 'Menu' . '</span></a>
			
			<div class="Menu JsOnly blockLinksList primaryContent" id="NavigationHiddenMenu"></div>
		</li>
			
		
		<!-- no selection -->
		';
if (!$selectedTab)
{
$__compilerVar127 .= '
			<li class="navTab selected"><div class="tabLinks"></div></li>
		';
}
$__compilerVar127 .= '
		
	</ul>
	
	';
if ($visitor['user_id'])
{
$__compilerVar132 = '';
$__compilerVar132 .= '

<ul class="visitorTabs">

	';
$__compilerVar133 = '';
$__compilerVar132 .= $this->callTemplateHook('navigation_visitor_tabs_start', $__compilerVar133, array());
unset($__compilerVar133);
$__compilerVar132 .= '

	<!-- account -->
	<li class="navTab account Popup PopupControl PopupClosed ' . (($tabs['account']['selected']) ? ('selected') : ('')) . '">

		';
$visitorHiddenUnread = ($visitor['alerts_unread'] + $visitor['conversations_unread']);
$__compilerVar132 .= '
		<a href="' . XenForo_Template_Helper_Core::link('account', false, array()) . '" class="navLink accountPopup NoPopupGadget" rel="Menu"><img src="' . XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $visitor,
'1' => 's'
)) . '" class="miniMe" alt="' . htmlspecialchars($visitor_username, ENT_QUOTES, 'UTF-8') . '" /><strong class="accountUsername">' . htmlspecialchars($visitor['username'], ENT_QUOTES, 'UTF-8') . '</strong>
			<strong class="itemCount ResponsiveOnly ' . (($visitorHiddenUnread) ? ('') : ('Zero')) . '"
				id="VisitorExtraMenu_Counter">
				<span class="Total">' . XenForo_Template_Helper_Core::numberFormat($visitorHiddenUnread, '0') . '</span>
				<span class="arrow"></span>
			</strong>
		</a>
		
		<div class="Menu JsOnly" id="AccountMenu">
			<div class="primaryContent menuHeader">
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,false,array(
'user' => '$visitor',
'size' => 'm',
'class' => 'NoOverlay plainImage',
'title' => 'Xem hồ sơ của bạn'
),'')) . '
				
				<h3><a href="' . XenForo_Template_Helper_Core::link('members', $visitor, array()) . '" class="concealed" title="' . 'Xem hồ sơ của bạn' . '">' . htmlspecialchars($visitor['username'], ENT_QUOTES, 'UTF-8') . '</a></h3>
				
				';
$__compilerVar134 = '';
$__compilerVar134 .= XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $visitor
));
if (trim($__compilerVar134) !== '')
{
$__compilerVar132 .= '<div class="muted">' . $__compilerVar134 . '</div>';
}
unset($__compilerVar134);
$__compilerVar132 .= '
				
				<ul class="links">
					<li class="fl"><a href="' . XenForo_Template_Helper_Core::link('members', $visitor, array()) . '">' . 'Trang hồ sơ của bạn' . '</a></li>
				</ul>
			</div>
			<div class="menuColumns secondaryContent">
				<ul class="col1 blockLinksList">
				';
$__compilerVar135 = '';
$__compilerVar135 .= '
					';
if ($canEditProfile)
{
$__compilerVar135 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Chi tiết cá nhân' . '</a></li>';
}
$__compilerVar135 .= '
					';
if ($canEditSignature)
{
$__compilerVar135 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/signature', false, array()) . '">' . 'Chữ ký' . '</a></li>';
}
$__compilerVar135 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('account/contact-details', false, array()) . '">' . 'Chi tiết liên hệ' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/privacy', false, array()) . '">' . 'Bảo mật cá nhân' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/preferences', false, array()) . '" class="OverlayTrigger">' . 'Tùy chọn' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/alert-preferences', false, array()) . '">' . 'Thiết lập thông báo' . '</a></li>
					';
if ($canUploadAvatar)
{
$__compilerVar135 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/avatar', false, array()) . '" class="OverlayTrigger" data-cacheOverlay="true">' . 'Avatar' . '</a></li>';
}
$__compilerVar135 .= '
					';
if ($xenOptions['facebookAppId'] OR $xenOptions['twitterAppKey'] OR $xenOptions['googleClientId'])
{
$__compilerVar135 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/external-accounts', false, array()) . '">' . 'External Accounts' . '</a></li>';
}
$__compilerVar135 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('account/security', false, array()) . '">' . 'Mật khẩu' . '</a></li>
				';
$__compilerVar132 .= $this->callTemplateHook('navigation_visitor_tab_links1', $__compilerVar135, array());
unset($__compilerVar135);
$__compilerVar132 .= '
				</ul>
				<ul class="col2 blockLinksList">
				';
$__compilerVar136 = '';
$__compilerVar136 .= '
					';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar136 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Thông tin bạn' . '</a></li>';
}
$__compilerVar136 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Đối thoại' . '
						<strong class="itemCount ' . (($visitor['conversations_unread']) ? ('') : ('Zero')) . '"
							id="VisitorExtraMenu_ConversationsCounter">
							<span class="Total">' . XenForo_Template_Helper_Core::numberFormat($visitor['conversations_unread'], '0') . '</span>
						</strong></a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '">' . 'Thông báo' . '
						<strong class="itemCount ' . (($visitor['alerts_unread']) ? ('') : ('Zero')) . '"
							id="VisitorExtraMenu_AlertsCounter">
							<span class="Total">' . XenForo_Template_Helper_Core::numberFormat($visitor['alerts_unread'], '0') . '</span>
						</strong></a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/likes', false, array()) . '">' . 'Được thích' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id']
)) . '">' . 'Nội dung của bạn' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '">' . 'Theo dõi' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/ignored', false, array()) . '">' . 'Danh sách đen' . '</a></li>
					';
if ($xenCache['userUpgradeCount'])
{
$__compilerVar136 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/upgrades', false, array()) . '">' . 'Account Upgrades' . '</a></li>';
}
$__compilerVar136 .= '
';
if ($visitor['permissions']['linkCheckGroupID']['linkCheckID'])
{
$__compilerVar136 .= '
<a href="' . XenForo_Template_Helper_Core::link('linkcheck/', false, array()) . '">' . 'Link Check' . '</a>
';
}
$__compilerVar136 .= '
';
if ($visitor['permissions']['userAgentGroupID']['userAgentID'] AND $xenOptions['userAgentVisitorTabLink'])
{
$__compilerVar136 .= '
<a href="' . XenForo_Template_Helper_Core::link('useragent/', false, array()) . '">' . 'User Agent' . '</a>
';
}
$__compilerVar136 .= '
';
if ($xenOptions['viewMapVisitorTabLink'])
{
$__compilerVar136 .= '
<a href="' . XenForo_Template_Helper_Core::link('viewmap/', false, array()) . '">' . 'View Map' . '</a>
';
}
$__compilerVar136 .= '
				';
$__compilerVar132 .= $this->callTemplateHook('navigation_visitor_tab_links2', $__compilerVar136, array());
unset($__compilerVar136);
$__compilerVar132 .= '
				</ul>
			</div>
			<div class="menuColumns secondaryContent">
				<ul class="col1 blockLinksList">
					<li>				
						<form action="' . XenForo_Template_Helper_Core::link('account/toggle-visibility', false, array()) . '" method="post" class="AutoValidator visibilityForm">
							<label><input type="checkbox" name="visible" value="1" class="SubmitOnChange" ' . (($visitor['visible']) ? ' checked="checked"' : '') . ' />
								' . 'Hiển thị online' . '</label>
							<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
						</form>
					</li>
				</ul>
				<ul class="col2 blockLinksList">
					<li><a href="' . XenForo_Template_Helper_Core::link('logout', '', array(
'_xfToken' => $visitor['csrf_token_page']
)) . '" class="LogOut">' . 'Thoát' . '</a></li>
				</ul>
			</div>
			';
if ($canUpdateStatus)
{
$__compilerVar132 .= '
				<form action="' . XenForo_Template_Helper_Core::link('members/post', $visitor, array()) . '" method="post" class="sectionFooter statusPoster AutoValidator" data-optInOut="OptIn">
					<textarea name="message" class="textCtrl StatusEditor UserTagger Elastic" placeholder="' . 'Cập nhật trạng thái' . '..." rows="1" cols="40" style="height:18px" data-statusEditorCounter="#visMenuSEdCount" data-nofocus="true"></textarea>
					<div class="submitUnit">
						<span id="visMenuSEdCount" title="' . 'Số ký tự còn lại' . '"></span>
						<input type="submit" class="button primary MenuCloser" value="' . 'Đăng' . '" />
						<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
						<input type="hidden" name="return" value="1" /> 
					</div>
				</form>
			';
}
$__compilerVar132 .= '
		</div>		
	</li>
		
	';
if ($tabs['account']['selected'])
{
$__compilerVar132 .= '
	<li class="navTab selected">
		<div class="tabLinks">
			<ul class="secondaryContent blockLinksList">
			';
$__compilerVar137 = '';
$__compilerVar137 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Chi tiết cá nhân' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Đối thoại' . '</a></li>
				';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar137 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Thông tin bạn' . '</a></li>';
}
$__compilerVar137 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('account/likes', false, array()) . '">' . 'Được thích' . '</a></li>
			';
$__compilerVar132 .= $this->callTemplateHook('navigation_tabs_account', $__compilerVar137, array());
unset($__compilerVar137);
$__compilerVar132 .= '
			</ul>
		</div>
	</li>
	';
}
$__compilerVar132 .= '
	
	<!-- conversations popup -->
	<li class="navTab inbox Popup PopupControl PopupClosed ' . (($tabs['inbox']['selected']) ? ('selected') : ('')) . '">
					
		<a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '" rel="Menu" class="navLink NoPopupGadget">' . 'Hộp thư' . '
			<strong class="itemCount ' . (($visitor['conversations_unread']) ? ('') : ('Zero')) . '"
				id="ConversationsMenu_Counter" data-text="' . 'Bạn có %d đối thoại mới chưa đọc.' . '">
				<span class="Total">' . XenForo_Template_Helper_Core::numberFormat($visitor['conversations_unread'], '0') . '</span>
				<span class="arrow"></span>
			</strong>
		</a>
		
		<div class="Menu JsOnly navPopup" id="ConversationsMenu"
			data-contentSrc="' . XenForo_Template_Helper_Core::link('conversations/popup', false, array()) . '"
			data-contentDest="#ConversationsMenu .listPlaceholder">
			
			<div class="menuHeader primaryContent">
				<h3>
					<span class="Progress InProgress"></span>
					<a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '" class="concealed">' . 'Đối thoại' . '</a>
				</h3>						
			</div>
			
			<div class="listPlaceholder"></div>
			
			<div class="sectionFooter">
				';
if ($canStartConversation)
{
$__compilerVar132 .= '<a href="' . XenForo_Template_Helper_Core::link('conversations/add', false, array()) . '" class="floatLink">' . 'Bắt đầu đối thoại mới' . '</a>';
}
$__compilerVar132 .= '
				<a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Xem tất cả' . '...</a>
			</div>
		</div>
	</li>
	
	';
if ($tabs['inbox']['selected'])
{
$__compilerVar132 .= '
	<li class="navTab selected">
		<div class="tabLinks">
			<ul class="secondaryContent blockLinksList">
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Đối thoại' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations/starred', false, array()) . '">' . 'Starred Conversations' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations/yours', false, array()) . '">' . 'Conversations You Started' . '</a></li>
			</ul>
		</div>
	</li>
	';
}
$__compilerVar132 .= '
	
	';
$__compilerVar138 = '';
$__compilerVar132 .= $this->callTemplateHook('navigation_visitor_tabs_middle', $__compilerVar138, array());
unset($__compilerVar138);
$__compilerVar132 .= '
	
	<!-- alerts popup -->
	<li class="navTab alerts Popup PopupControl PopupClosed">	
					
		<a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '" rel="Menu" class="navLink NoPopupGadget">' . 'Thông báo' . '
			<strong class="itemCount ' . (($visitor['alerts_unread']) ? ('') : ('Zero')) . '"
				id="AlertsMenu_Counter" data-text="' . 'Bạn có %d thông báo mới.' . '">
				<span class="Total">' . XenForo_Template_Helper_Core::numberFormat($visitor['alerts_unread'], '0') . '</span>
				<span class="arrow"></span>
			</strong>
		</a>
		
		<div class="Menu JsOnly navPopup" id="AlertsMenu"
			data-contentSrc="' . XenForo_Template_Helper_Core::link('account/alerts-popup', false, array()) . '"
			data-contentDest="#AlertsMenu .listPlaceholder"
			data-removeCounter="#AlertsMenu_Counter">
			
			<div class="menuHeader primaryContent">
				<h3>
					<span class="Progress InProgress"></span>
					<a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '" class="concealed">' . 'Thông báo' . '</a>
				</h3>
			</div>
			
			<div class="listPlaceholder"></div>
			
			<div class="sectionFooter">
				<a href="' . XenForo_Template_Helper_Core::link('account/alert-preferences', false, array()) . '" class="floatLink">' . 'Thiết lập thông báo' . '</a>
				<a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '">' . 'Xem tất cả' . '...</a>
			</div>
		</div>
	</li>
	
	';
$__compilerVar139 = '';
$__compilerVar132 .= $this->callTemplateHook('navigation_visitor_tabs_end', $__compilerVar139, array());
unset($__compilerVar139);
$__compilerVar132 .= '
</ul>';
$__compilerVar127 .= $__compilerVar132;
unset($__compilerVar132);
}
$__compilerVar127 .= '
</div>

<span class="helper"></span>
			
		</nav>	
	</div>
</div>';
$__compilerVar122 .= $__compilerVar127;
unset($__compilerVar127);
$__compilerVar122 .= '
	';
if ($canSearch)
{
$__compilerVar140 = '';
$__compilerVar140 .= '

<div id="searchBar" class="pageWidth">
	';
$__compilerVar141 = '';
$__compilerVar141 .= '
	<span id="QuickSearchPlaceholder" title="' . 'Tìm kiếm' . '">' . 'Tìm kiếm' . '</span>
	<fieldset id="QuickSearch">
		<form action="' . XenForo_Template_Helper_Core::link('search/search', false, array()) . '" method="post" class="formPopup">
			
			<div class="primaryControls">
				<!-- block: primaryControls -->
				<input type="search" name="keywords" value="" class="textCtrl" placeholder="' . 'Tìm kiếm' . '..." results="0" title="' . 'Nhập từ khóa và ấn Enter' . '" id="QuickSearchQuery" />				
				<!-- end block: primaryControls -->
			</div>
			
			<div class="secondaryControls">
				<div class="controlsWrapper">
				
					<!-- block: secondaryControls -->
					<dl class="ctrlUnit">
						<dt></dt>
						<dd><ul>
							<li><label><input type="checkbox" name="title_only" value="1"
								id="search_bar_title_only" class="AutoChecker"
								data-uncheck="#search_bar_thread" /> ' . 'Chỉ tìm trong tiêu đề' . '</label></li>
						</ul></dd>
					</dl>
				
					<dl class="ctrlUnit">
						<dt><label for="searchBar_users">' . 'Được gửi bởi thành viên' . ':</label></dt>
						<dd>
							<input type="text" name="users" value="" class="textCtrl AutoComplete" id="searchBar_users" />
							<p class="explain">' . 'Dãn cách tên bằng dấu phẩy(,).' . '</p>
						</dd>
					</dl>
				
					<dl class="ctrlUnit">
						<dt><label for="searchBar_date">' . 'Mới hơn ngày' . ':</label></dt>
						<dd><input type="date" name="date" value="" class="textCtrl" id="searchBar_date" /></dd>
					</dl>
					
					';
if ($searchBar)
{
$__compilerVar141 .= '
					<dl class="ctrlUnit">
						<dt></dt>
						<dd><ul>
								';
foreach ($searchBar AS $constraint)
{
$__compilerVar141 .= '
									<li>' . $constraint . '</li>
								';
}
$__compilerVar141 .= '
						</ul></dd>
					</dl>
					';
}
$__compilerVar141 .= '
				</div>
				<!-- end block: secondaryControls -->
				
				<dl class="ctrlUnit submitUnit">
					<dt></dt>
					<dd>
						<input type="submit" value="' . 'Tìm kiếm' . '" class="button primary Tooltip" title="' . 'Tìm ngay' . '" />
						<div class="Popup" id="commonSearches">
							<a rel="Menu" class="button NoPopupGadget Tooltip" title="' . 'Tìm kiếm hữu ích' . '" data-tipclass="flipped"><span class="arrowWidget"></span></a>
							<div class="Menu">
								<div class="primaryContent menuHeader">
									<h3>' . 'Tìm kiếm hữu ích' . '</h3>
								</div>
								<ul class="secondaryContent blockLinksList">
									<!-- block: useful_searches -->
									<li><a href="' . XenForo_Template_Helper_Core::link('find-new/posts', '', array(
'recent' => '1'
)) . '" rel="nofollow">' . 'Bài viết gần đây' . '</a></li>
									';
if ($visitor['user_id'])
{
$__compilerVar141 .= '
									<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id'],
'content' => 'thread'
)) . '">' . 'Chủ đề của bạn' . '</a></li>
									<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id'],
'content' => 'post'
)) . '">' . 'Bài viết của bạn' . '</a></li>
									<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id'],
'content' => 'profile_post'
)) . '">' . 'Bài viết trong hồ sơ của bạn' . '</a></li>
									';
}
$__compilerVar141 .= '
									<!-- end block: useful_searches -->
								</ul>
							</div>
						</div>
						<a href="' . XenForo_Template_Helper_Core::link('search', false, array()) . '" class="button moreOptions Tooltip" title="' . 'Tìm nâng cao' . '">' . 'Thêm' . '...</a>
					</dd>
				</dl>
				
			</div>
			
			<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		</form>		
	</fieldset>
	';
$__compilerVar140 .= $this->callTemplateHook('quick_search', $__compilerVar141, array());
unset($__compilerVar141);
$__compilerVar140 .= '
</div>';
$__compilerVar122 .= $__compilerVar140;
unset($__compilerVar140);
}
$__compilerVar122 .= '
</div>
';
$__compilerVar121 .= $this->callTemplateHook('header', $__compilerVar122, array());
unset($__compilerVar122);
$__compilerVar79 .= $__compilerVar121;
unset($__compilerVar121);
$__compilerVar79 .= '
	' . '
	' . '
</header>

</div>

<footer>
	';
$__compilerVar142 = '';
$__compilerVar142 .= '

';
$__compilerVar143 = '';
$__compilerVar143 .= '
<div class="footer">
	<div class="pageWidth">
		<div class="pageContent">
			';
if ($canChangeStyle OR $canChangeLanguage)
{
$__compilerVar143 .= '
			<dl class="choosers">
				';
if ($canChangeStyle)
{
$__compilerVar143 .= '
					<dt>' . 'Giao diện' . '</dt>
					<dd><a href="' . XenForo_Template_Helper_Core::link('misc/style', '', array(
'redirect' => $requestPaths['requestUri']
)) . '" class="OverlayTrigger Tooltip" title="' . 'Chọn giao diện' . '" rel="nofollow">' . htmlspecialchars($visitorStyle['title'], ENT_QUOTES, 'UTF-8') . '</a></dd>
				';
}
$__compilerVar143 .= '
				';
if ($canChangeLanguage)
{
$__compilerVar143 .= '
					<dt>' . 'Ngôn ngữ' . '</dt>
					<dd><a href="' . XenForo_Template_Helper_Core::link('misc/language', '', array(
'redirect' => $requestPaths['requestUri']
)) . '" class="OverlayTrigger Tooltip" title="' . 'Chọn Ngôn ngữ' . '" rel="nofollow">' . htmlspecialchars($visitorLanguage['title'], ENT_QUOTES, 'UTF-8') . '</a></dd>
				';
}
$__compilerVar143 .= '
			</dl>
			';
}
$__compilerVar143 .= '
			
			<ul class="footerLinks">
			';
$__compilerVar144 = '';
$__compilerVar144 .= '
				';
if ($xenOptions['contactUrl']['type'] === ('default'))
{
$__compilerVar144 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('misc/contact', false, array()) . '" class="OverlayTrigger" data-overlayOptions="{&quot;fixed&quot;:false}">' . 'Liên hệ' . '</a></li>
				';
}
else if ($xenOptions['contactUrl']['type'] === ('custom'))
{
$__compilerVar144 .= '
					<li><a href="' . htmlspecialchars($xenOptions['contactUrl']['custom'], ENT_QUOTES, 'UTF-8') . '" ' . (($xenOptions['contactUrl']['overlay']) ? ('class="OverlayTrigger" data-overlayOptions="' . '{' . '&quot;fixed&quot;:false}"') : ('')) . '>' . 'Liên hệ' . '</a></li>
				';
}
$__compilerVar144 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('help', false, array()) . '">' . 'Trợ giúp' . '</a></li>
				';
if ($homeLink)
{
$__compilerVar144 .= '<li><a href="' . htmlspecialchars($homeLink, ENT_QUOTES, 'UTF-8') . '" class="homeLink">' . 'Trang chủ' . '</a></li>';
}
$__compilerVar144 .= '
				<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#navigation" class="topLink">' . 'Lên đầu trang' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('forums/-/index.rss', false, array()) . '" rel="alternate" class="globalFeed" target="_blank"
					title="' . 'RSS Feed For ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '' . '">' . 'RSS' . '</a></li>
			';
$__compilerVar143 .= $this->callTemplateHook('footer_links', $__compilerVar144, array());
unset($__compilerVar144);
$__compilerVar143 .= '
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
$__compilerVar145 = '';
$__compilerVar145 .= '
				';
if ($tosUrl)
{
$__compilerVar145 .= '<li><a href="' . htmlspecialchars($tosUrl, ENT_QUOTES, 'UTF-8') . '">' . 'Quy định và Nội quy' . '</a></li>';
}
$__compilerVar145 .= '
				';
if ($xenOptions['privacyPolicyUrl'])
{
$__compilerVar145 .= '<li><a href="' . htmlspecialchars($xenOptions['privacyPolicyUrl'], ENT_QUOTES, 'UTF-8') . '">' . 'Privacy Policy' . '</a></li>';
}
$__compilerVar145 .= '
			';
$__compilerVar143 .= $this->callTemplateHook('footer_links_legal', $__compilerVar145, array());
unset($__compilerVar145);
$__compilerVar143 .= '
			</ul>
			
			<div id="copyright">';
if ($controllerName == ('DigitalPointUserMap_ControllerPublic_Member') && $controllerAction == ('Usermap'))
{
$__compilerVar143 .= '<div><a href="https://marketplace.digitalpoint.com/digital-point-user-map.992/item" target="_blank">User Map</a> by <a href="https://www.digitalpoint.com/" target="_blank">Digital Point</a></div>';
}
$__compilerVar143 .= '<!--' . XenForo_Template_Helper_Core::callHelper('copyright', array()) . '-->' . 'Diễn đàn sử dụng XenForo&trade; &copy;2014-2015 TechLife Forums.<br/>Website đang hoạt động thử nghiệm, chờ giấy phép MXH của Bộ TT & TT.' . '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar143 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar143 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar143 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar143 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar143 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar143 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar143 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar143 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar143 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar143 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar143 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar143 .= '</div>
			';
$__compilerVar146 = '';
$__compilerVar143 .= $this->callTemplateHook('footer_after_copyright', $__compilerVar146, array());
unset($__compilerVar146);
$__compilerVar143 .= '
		
			';
if ($debugMode)
{
$__compilerVar143 .= '
				';
$__compilerVar147 = '';
$__compilerVar147 .= '
						';
if ($page_time)
{
$__compilerVar147 .= '<dt>' . 'Timing' . ':</dt> <dd><a href="' . htmlspecialchars($debug_url, ENT_QUOTES, 'UTF-8') . '" rel="nofollow">' . '' . XenForo_Template_Helper_Core::numberFormat($page_time, '4') . ' seconds' . '</a></dd>';
}
$__compilerVar147 .= '
						';
if ($memory_usage)
{
$__compilerVar147 .= '<dt>' . 'Memory' . ':</dt> <dd>' . '' . XenForo_Template_Helper_Core::numberFormat(($memory_usage / 1024 / 1024), '3') . ' MB' . '</dd>';
}
$__compilerVar147 .= '
						';
if ($db_queries)
{
$__compilerVar147 .= '<dt>' . 'DB Queries' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($db_queries, '0') . '</dd>';
}
$__compilerVar147 .= '
					';
if (trim($__compilerVar147) !== '')
{
$__compilerVar143 .= '
					<dl class="pairsInline debugInfo" title="' . htmlspecialchars($controllerName, ENT_QUOTES, 'UTF-8') . '-&gt;' . htmlspecialchars($controllerAction, ENT_QUOTES, 'UTF-8') . (($viewName) ? (' (' . htmlspecialchars($viewName, ENT_QUOTES, 'UTF-8') . ')') : ('')) . '">
					' . $__compilerVar147 . '
					</dl>
				';
}
unset($__compilerVar147);
$__compilerVar143 .= '
			';
}
$__compilerVar143 .= '
			
			<span class="helper"></span>
		</div>
	</div>	
</div>
';
$__compilerVar142 .= $this->callTemplateHook('footer', $__compilerVar143, array());
unset($__compilerVar143);
$__compilerVar79 .= $__compilerVar142;
unset($__compilerVar142);
$__compilerVar79 .= '
</footer>

';
$__compilerVar148 = '';
$__compilerVar148 .= '<script>
/*thoinv 02022014*/

jQuery("a.VietXfAdvStats_Header").text("Thống kê diễn đàn");
jQuery("a.VietXfAdvStats_Header").attr("href", "/");
';
$__compilerVar149 = '';
$__compilerVar149 .= '
jQuery.extend(true, XenForo,
{
	visitor: { user_id: ' . htmlspecialchars($visitor['user_id'], ENT_QUOTES, 'UTF-8') . ' },
	serverTimeInfo:
	{
		now: ' . htmlspecialchars($serverTimeInfo['now'], ENT_QUOTES, 'UTF-8') . ',
		today: ' . htmlspecialchars($serverTimeInfo['today'], ENT_QUOTES, 'UTF-8') . ',
		todayDow: ' . htmlspecialchars($serverTimeInfo['todayDow'], ENT_QUOTES, 'UTF-8') . '
	},
	_lightBoxUniversal: "' . htmlspecialchars($xenOptions['lightBoxUniversal'], ENT_QUOTES, 'UTF-8') . '",
	_enableOverlays: "' . XenForo_Template_Helper_Core::styleProperty('enableOverlays') . '",
	_animationSpeedMultiplier: "' . XenForo_Template_Helper_Core::styleProperty('animationSpeedMultiplier') . '",
	_overlayConfig:
	{
		top: "' . XenForo_Template_Helper_Core::styleProperty('overlayTop') . '",
		speed: ' . (XenForo_Template_Helper_Core::styleProperty('overlaySpeed') * XenForo_Template_Helper_Core::styleProperty('animationSpeedMultiplier')) . ',
		closeSpeed: ' . (XenForo_Template_Helper_Core::styleProperty('overlayCloseSpeed') * XenForo_Template_Helper_Core::styleProperty('animationSpeedMultiplier')) . ',
		mask:
		{
			color: "' . XenForo_Template_Helper_Core::styleProperty('overlayMaskColor') . '",
			opacity: "' . XenForo_Template_Helper_Core::styleProperty('overlayMaskOpacity') . '",
			loadSpeed: ' . (XenForo_Template_Helper_Core::styleProperty('overlaySpeed') * XenForo_Template_Helper_Core::styleProperty('animationSpeedMultiplier')) . ',
			closeSpeed: ' . (XenForo_Template_Helper_Core::styleProperty('overlayCloseSpeed') * XenForo_Template_Helper_Core::styleProperty('animationSpeedMultiplier')) . '
		}
	},
	_ignoredUsers: ' . XenForo_Template_Helper_Core::callHelper('json', array(
'0' => $visitor['ignoredUsers']
)) . ',
	_loadedScripts: {/*<!--XenForo_Required_Scripts-->*/},
	_cookieConfig: { path: "' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($xenOptions['cookieConfig']['path'], ENT_QUOTES, 'UTF-8'), 'double') . '", domain: "' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($xenOptions['cookieConfig']['domain'], ENT_QUOTES, 'UTF-8'), 'double') . '", prefix: "' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($xenOptions['cookieConfig']['prefix'], ENT_QUOTES, 'UTF-8'), 'double') . '"},
	_csrfToken: "' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8'), 'double') . '",
	_csrfRefreshUrl: "' . XenForo_Template_Helper_Core::jsEscape(XenForo_Template_Helper_Core::link('login/csrf-token-refresh', false, array()), 'double') . '",
	_jsVersion: "' . htmlspecialchars($xenOptions['jsVersion'], ENT_QUOTES, 'UTF-8') . '"
});
jQuery.extend(XenForo.phrases,
{
	cancel: "' . XenForo_Template_Helper_Core::jsEscape('Hủy bỏ', 'double') . '",

	a_moment_ago:    "' . XenForo_Template_Helper_Core::jsEscape('Vài giây trước', 'double') . '",
	one_minute_ago:  "' . XenForo_Template_Helper_Core::jsEscape('1 phút trước', 'double') . '",
	x_minutes_ago:   "' . XenForo_Template_Helper_Core::jsEscape('' . '%minutes%' . ' phút trước', 'double') . '",
	today_at_x:      "' . XenForo_Template_Helper_Core::jsEscape('Hôm nay lúc ' . '%time%' . '', 'double') . '",
	yesterday_at_x:  "' . XenForo_Template_Helper_Core::jsEscape('Hôm qua, lúc ' . '%time%' . '', 'double') . '",
	day_x_at_time_y: "' . XenForo_Template_Helper_Core::jsEscape('' . '%day%' . ' lúc ' . '%time%' . '', 'double') . '",

	day0: "' . XenForo_Template_Helper_Core::jsEscape('Chủ nhật', 'double') . '",
	day1: "' . XenForo_Template_Helper_Core::jsEscape('Thứ hai', 'double') . '",
	day2: "' . XenForo_Template_Helper_Core::jsEscape('Thứ ba', 'double') . '",
	day3: "' . XenForo_Template_Helper_Core::jsEscape('Thứ tư', 'double') . '",
	day4: "' . XenForo_Template_Helper_Core::jsEscape('Thứ năm', 'double') . '",
	day5: "' . XenForo_Template_Helper_Core::jsEscape('Thứ sáu', 'double') . '",
	day6: "' . XenForo_Template_Helper_Core::jsEscape('Thứ bảy', 'double') . '",

	_months: "' . XenForo_Template_Helper_Core::jsEscape('Tháng một' . ',' . 'Tháng hai' . ',' . 'Tháng ba' . ',' . 'Tháng tư' . ',' . 'Tháng năm' . ',' . 'Tháng sáu' . ',' . 'Tháng bảy' . ',' . 'Tháng tám' . ',' . 'Tháng chín' . ',' . 'Tháng mười' . ',' . 'Tháng mười một' . ',' . 'Tháng mười hai', 'double') . '",
	_daysShort: "' . XenForo_Template_Helper_Core::jsEscape('CN' . ',' . 'T2' . ',' . 'T3' . ',' . 'T4' . ',' . 'T5' . ',' . 'T6' . ',' . 'T7', 'double') . '",

	following_error_occurred: "' . XenForo_Template_Helper_Core::jsEscape('Có lỗi sau sảy xa với yêu cầu của bạn', 'double') . '",
	server_did_not_respond_in_time_try_again: "' . XenForo_Template_Helper_Core::jsEscape('The server did not respond in time. Please try again.', 'double') . '",
	logging_in: "' . XenForo_Template_Helper_Core::jsEscape('Đang đăng nhập', 'double') . '",
	click_image_show_full_size_version: "' . XenForo_Template_Helper_Core::jsEscape('Xem ảnh lớn.', 'double') . '",
	show_hidden_content_by_x: "' . XenForo_Template_Helper_Core::jsEscape('Show hidden content by {names}', 'double') . '"
});

// Facebook Javascript SDK
XenForo.Facebook.appId = "' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8'), 'double') . '";
XenForo.Facebook.forceInit = ' . (($facebookSdk) ? ('true') : ('false')) . ';
';
$__compilerVar148 .= $this->callTemplateHook('page_container_js_body', $__compilerVar149, array());
unset($__compilerVar149);
$__compilerVar148 .= '

</script>
';
if ($contentTemplate == ('thread_view'))
{
$__compilerVar148 .= '
<script type="text/javascript" src="./js/rrssb/rrssb.min.js"></script>
';
}
$__compilerVar148 .= '

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-550fefd10305ed14" async="async"></script>
';
$__compilerVar79 .= $__compilerVar148;
unset($__compilerVar148);
$__compilerVar79 .= '

';
if ($isIndexPage AND $canSearch)
{
$__compilerVar79 .= '
<script async type="application/ld+json">
{
	"@context": "http://schema.org",
	"@type": "WebSite",
	"url": "' . XenForo_Template_Helper_Core::jsEscape(XenForo_Template_Helper_Core::link('canonical:index', false, array()), 'double') . '",
	"potentialAction": {
		"@type": "SearchAction",
		"target": "' . XenForo_Template_Helper_Core::jsEscape(XenForo_Template_Helper_Core::link('canonical:search/search', false, array()), 'double') . (($xenOptions['useFriendlyUrls']) ? ('?') : ('&')) . 'keywords={search_keywords}",
		"query-input": "required name=search_keywords"
	}
}
</script>
';
}
$__compilerVar79 .= '

';
$__output .= $this->callTemplateHook('body', $__compilerVar79, array());
unset($__compilerVar79);
$__output .= '


<div class="slide_likebox">
    <div style="color: rgb(255, 255, 255); padding: 8px 5px 0pt 50px;">
        <div class="FB_Loader"></div>
        <span>
            <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fthongtin.congnghe.moinhat&amp;width=198&amp;height=368&amp;colorscheme=light&amp;show_faces=true&amp;border_color=white&amp;stream=false&amp;header=false&amp;appId=450679131640420" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:198px; height:368px;" allowtransparency="true"></iframe>
        </span>
    </div>
</div>
';
$__compilerVar150 = '';
$__compilerVar150 .= '

';
if ($visitor['show_notification_popup'])
{
$__compilerVar150 .= '
	';
$this->addRequiredExternal('css', 'gfnnotify');
$__compilerVar150 .= '
	';
$this->addRequiredExternal('js', 'js/gfnnotify/notification.js');
$__compilerVar150 .= '
	
	<div id="GFNNotification" data-url="' . XenForo_Template_Helper_Core::link('gfnnotify/get-notifications', false, array()) . '" data-timer="' . XenForo_Template_Helper_Core::styleProperty('notificationOpenTimer') . '" data-interval="' . XenForo_Template_Helper_Core::styleProperty('notificationInterval') . '" data-mark-read="' . XenForo_Template_Helper_Core::link('gfnnotify/mark-read', false, array()) . '"></div>
';
}
$__output .= $__compilerVar150;
unset($__compilerVar150);
$__output .= '
</body>
</html>';
