<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<!DOCTYPE html>';
$isResponsive = ((XenForo_Template_Helper_Core::styleProperty('enableResponsive') AND !$noResponsive) ? ('1') : ('0'));
$__output .= '
<html id="XenForo" lang="' . htmlspecialchars($visitorLanguage['language_code'], ENT_QUOTES, 'UTF-8') . '" dir="' . htmlspecialchars($visitorLanguage['text_direction'], ENT_QUOTES, 'UTF-8') . '" class="Public ' . (($visitor['user_id']) ? ('LoggedIn') : ('LoggedOut')) . ' ' . (($sidebar) ? ('Sidebar') : ('NoSidebar')) . ' ' . (($hasAutoDeferred) ? ('RunDeferred') : ('')) . ' ' . (($isResponsive) ? ('Responsive') : ('NoResponsive')) . '" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<style>
#BRCopyright{display:none;}
#arrowchat_base{width:100% !important;}
</style>
';
$__compilerVar84 = '';
$__compilerVar84 .= '
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
	';
if ($isResponsive)
{
$__compilerVar84 .= '
		<meta name="viewport" content="width=device-width, initial-scale=1">
	';
}
$__compilerVar84 .= '
	';
if ($requestPaths['fullBasePath'])
{
$__compilerVar84 .= '
		<base href="' . htmlspecialchars($requestPaths['fullBasePath'], ENT_QUOTES, 'UTF-8') . '" />
		<script>
			var _b = document.getElementsByTagName(\'base\')[0], _bH = "' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($requestPaths['fullBasePath'], ENT_QUOTES, 'UTF-8'), 'double') . '";
			if (_b && _b.href != _bH) _b.href = _bH;
		</script>
	';
}
$__compilerVar84 .= '

	<title>';
if ($title)
{
$__compilerVar84 .= $title . ' | ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8');
}
else
{
$__compilerVar84 .= htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar84 .= '</title>
	
	<noscript><style>.JsOnly { display: none !important; }</style></noscript>
	<link rel="stylesheet" href="css.php?css=xenforo,form,public&amp;style=' . urlencode($_styleId) . '&amp;dir=' . htmlspecialchars($visitorLanguage['text_direction'], ENT_QUOTES, 'UTF-8') . '&amp;d=' . htmlspecialchars($visitorStyle['last_modified_date'], ENT_QUOTES, 'UTF-8') . '" />
	<!--XenForo_Require:CSS-->	
	' . XenForo_Template_Helper_Core::callHelper('ignoredCss', array(
'0' => $visitor['ignoredUsers']
)) . '

	';
$__compilerVar85 = '';
$__compilerVar85 .= '	<script src="' . htmlspecialchars($jQuerySource, ENT_QUOTES, 'UTF-8') . '"></script>	
	';
if ($jQuerySource != $jQuerySourceLocal)
{
$__compilerVar85 .= '
		<script>if (!window.jQuery) { document.write(\'<scr\'+\'ipt type="text/javascript" src="' . htmlspecialchars($jQuerySourceLocal, ENT_QUOTES, 'UTF-8') . '"><\\/scr\'+\'ipt>\'); }</script>
	';
}
if ($xenOptions['uncompressedJs'] == 1 OR $xenOptions['uncompressedJs'] == 3)
{
$__compilerVar85 .= '
	<script src="' . htmlspecialchars($javaScriptSource, ENT_QUOTES, 'UTF-8') . '/jquery/jquery.xenforo.rollup.js?_v=' . htmlspecialchars($xenOptions['jsVersion'], ENT_QUOTES, 'UTF-8') . '"></script>';
}
$__compilerVar85 .= '	
	<script src="' . XenForo_Template_Helper_Core::callHelper('javaScriptUrl', array(
'0' => $javaScriptSource . '/xenforo/xenforo.js?_v=' . $xenOptions['jsVersion']
)) . '"></script>
';
if ($forum['node_id'] > 0)
{
$__compilerVar85 .= '<script>XenForo.node_name=\'' . XenForo_Template_Helper_Core::jsEscape($forum['title'], 'double') . ' (' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . ')\';</script>';
}
$__compilerVar85 .= '
<!--XenForo_Require:JS-->';
$__compilerVar84 .= $__compilerVar85;
unset($__compilerVar85);
$__compilerVar84 .= '
';
if ($xenOptions['dpBetterAnalyticsJs'] == ('file'))
{
$__compilerVar84 .= '<script src="misc/a.js?_v=' . htmlspecialchars($xenOptions['jsVersion'], ENT_QUOTES, 'UTF-8') . '"></script>';
}
else if ($xenOptions['dpBetterAnalyticsJs'] == ('inline'))
{
$__compilerVar84 .= '<script>
';
$__compilerVar86 = '';
$__compilerVar86 .= '$(document).ready(function(){
(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');ga("create","' . htmlspecialchars($xenOptions['googleAnalyticsWebPropertyId'], ENT_QUOTES, 'UTF-8') . '","auto");ga("require","displayfeatures");ga(\'set\',\'forceSSL\',true);
if(XenForo.visitor.user_id>0){ga(\'set\',\'&uid\',XenForo.visitor.user_id);';
if ($xenOptions['dpBetterAnalyticsDimensionIndexUser'])
{
$__compilerVar86 .= 'ga(\'set\',\'dimension' . htmlspecialchars($xenOptions['dpBetterAnalyticsDimensionIndexUser'], ENT_QUOTES, 'UTF-8') . '\',XenForo.visitor.user_id);';
}
$__compilerVar86 .= '}
';
if ($xenOptions['dpBetterAnalyticsDimentionIndex'])
{
$__compilerVar86 .= 'if (typeof XenForo.node_name!=\'undefined\') {ga(\'set\',\'dimension' . htmlspecialchars($xenOptions['dpBetterAnalyticsDimentionIndex'], ENT_QUOTES, 'UTF-8') . '\',XenForo.node_name);}';
}
$__compilerVar86 .= '
if("/account/upgrades"==document.location.pathname.substr(-17)){ga("require","ec");var position=1;$("form.upgradeForm").each(function(){ $(this).find(\'input[type="submit"]\').on("click",function(){var name=$(this).closest("form").find(\'input[name="item_name"]\').val().match(/^.*?: (.*) \\(/)[1];ga("ec:addProduct",{id:"UU-"+$(this).closest("form").find(\'input[name="custom"]\').val().match(/^.*?,(.*?),/)[1],name:name,category:"User Upgrades"});ga("ec:setAction","checkout");ga("send","event","Checkout","Click",name)});
ga("ec:addImpression",{id:"UU-"+$(this).find(\'input[name="custom"]\').val().match(/^.*?,(.*?),/)[1],name:$(this).find(\'input[name="item_name"]\').val().match(/^.*?: (.*) \\(/)[1],category:"User Upgrades",list:"User Upgrade List",position:position++})})};
if (document.referrer.match(/paypal\\.com.*?cgi-bin\\/webscr|facebook\\.com.*?dialog\\/oauth|twitter\\.com\\/oauth|google\\.com.*?\\/oauth2/) != null){ga(\'set\',\'referrer\',\'\');}
ga("send","pageview");
';
if ($xenOptions['dpAnalyticsEvents']['user_engagement'])
{
$__compilerVar86 .= 'setTimeout("ga(\'send\',\'event\',\'User\',\'Engagement\',\'Time on page more than 15 seconds\')",15000);';
}
$__compilerVar86 .= '
';
if ($xenOptions['dpAnalyticsEvents']['ajax_requests'] && $xenOptions['dpAnalyticsInternal']['v'])
{
$__compilerVar86 .= '$(document).ajaxComplete(function(a,b,u){var p=document.createElement(\'a\');p.href=u.url;ga(\'send\',\'event\',\'AJAX Request\',\'Trigger\',p.pathname);});';
}
$__compilerVar86 .= '
';
if ($xenOptions['dpAnalyticsEvents']['links'] && $xenOptions['dpAnalyticsInternal']['v'])
{
$__compilerVar86 .= '$(\'.externalLink\').on(\'click\',function(){ga(\'send\', \'event\',\'Link\',\'Click\', $(this).prop(\'href\'))});';
}
$__compilerVar86 .= '
';
if ($xenOptions['dpAnalyticsEvents']['js_error'] && $xenOptions['dpAnalyticsInternal']['v'])
{
$__compilerVar86 .= '"object"==typeof window.onerror&&(window.onerror=function(a,b,c){ga("send","event","Error","JavaScript",c+": "+a+" ("+window.location.origin+window.location.pathname+" | "+b+")")});';
}
$__compilerVar86 .= '
';
if ($xenOptions['dpAnalyticsEvents']['ajax_error'] && $xenOptions['dpAnalyticsInternal']['v'])
{
$__compilerVar86 .= '$(document).ajaxError(function(b,c,a){ga("send","event","Error","AJAX",window.location.origin+window.location.pathname+" | "+a.url)});';
}
$__compilerVar86 .= '
setTimeout(function(){try{FB.Event.subscribe("edge.create",function(a){ga("send","social","Facebook","Like",a)}),FB.Event.subscribe("edge.remove",function(a){ga("send","social","Facebook","Unlike",a)}),twttr.ready(function(a){a.events.bind("tweet",function(b){if(b){var a;b.target&&"IFRAME"==b.target.nodeName&&(a=ePFU(b.target.src,"url"));ga("send","social","Twitter","Tweet",a)}});a.events.bind("follow",function(b){if(b){var a;b.target&&"IFRAME"==b.target.nodeName&&(a=
ePFU(b.target.src,"url"));ga("send","social","Twitter","Follow",a)}})})}catch(c){}},1E3);
});
function ePFU(c,a){if(c){c=c.split("#")[0];var b=c.split("?");if(1!=b.length){b=decodeURI(b[1]);a+="=";for(var b=b.split("&"),e=0,d;d=b[e];++e)if(0===d.indexOf(a))return unescape(d.split("=")[1])}}}';
$__compilerVar84 .= $__compilerVar86;
unset($__compilerVar86);
$__compilerVar84 .= '
</script>';
}
$__compilerVar84 .= '
	
	<link rel="apple-touch-icon" href="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
)) . '" />
	<link rel="alternate" type="application/rss+xml" title="' . 'RSS Feed For ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '' . '" href="' . XenForo_Template_Helper_Core::link('forums/-/index.rss', false, array()) . '" />
	';
if ($pageDescription['content'] AND !$pageDescription['skipmeta'] AND !$head['description'])
{
$__compilerVar84 .= '<meta name="description" content="' . XenForo_Template_Helper_Core::string('wordTrim', array(
'0' => XenForo_Template_Helper_Core::callHelper('stripHtml', array(
'0' => $pageDescription['content']
)),
'1' => '200'
)) . '" />';
}
$__compilerVar84 .= '
	';
if ($head)
{
foreach ($head AS $headElement)
{
$__compilerVar84 .= $headElement;
}
}
$__compilerVar84 .= '
';
$__output .= $this->callTemplateHook('page_container_head', $__compilerVar84, array());
unset($__compilerVar84);
$__output .= '
<link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="/arrowchat/external.php?type=css" charset="utf-8" />
<script type="text/javascript" src="/arrowchat/includes/js/jquery.js"></script>
<script type="text/javascript" src="/arrowchat/includes/js/jquery-ui.js"></script>

</head>

<body' . (($bodyClasses) ? (' class="' . htmlspecialchars($bodyClasses, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>
';
$__compilerVar87 = '';
$__compilerVar87 .= '






';
if ($visitor['user_id'])
{
$__compilerVar87 .= '
';
$__compilerVar88 = '';
$this->addRequiredExternal('css', 'moderator_bar');
$__compilerVar88 .= '


<fieldset id="moderatorBar">
	<div class="pageWidth">
		<div class="pageContent">
		
		';
$__compilerVar89 = '';
$__compilerVar89 .= '
			';
if ($visitor['is_admin'])
{
$__compilerVar89 .= '			
				<a href="admin.php" class="acp adminLink"><span class="itemLabel">' . 'Admin' . '</span></a>
				
				';
if ($session['permissionTest'])
{
$__compilerVar89 .= '
					<a href="' . XenForo_Template_Helper_Core::link('misc/reset-permissions', false, array()) . '" class="permissionTest adminLink OverlayTrigger">
						<span class="itemLabel">' . 'Permissions from ' . htmlspecialchars($session['permissionTest']['username'], ENT_QUOTES, 'UTF-8') . '' . '</span>
					</a>
				';
}
$__compilerVar89 .= '
			';
}
$__compilerVar89 .= '
			
			
			
		
  
		
			
			
			';
if ($visitor['is_moderator'] AND $session['moderationCounts']['total'])
{
$__compilerVar89 .= '
				<a href="' . XenForo_Template_Helper_Core::link('moderation-queue', false, array()) . '" class="moderationQueue modLink">
					<span class="itemLabel">' . 'Moderation' . ':</span>
					<span class="itemCount ' . (($session['moderationCounts']['total']) ? ('alert') : ('')) . '">' . htmlspecialchars($session['moderationCounts']['total'], ENT_QUOTES, 'UTF-8') . '</span>
				</a>
			';
}
$__compilerVar89 .= '
			
			';
if ($visitor['is_moderator'] && !$xenOptions['reportIntoForumId'])
{
$__compilerVar89 .= '
				<a href="' . XenForo_Template_Helper_Core::link('reports', false, array()) . '" class="reportedItems modLink">
					<span class="itemLabel">' . 'Báo cáo ' . ':</span>
					<span class="itemCount ' . ((($session['reportCounts']['total'] AND $session['reportCounts']['lastUpdate'] > $session['reportLastRead']) OR $session['reportCounts']['assigned']) ? ('alert') : ('')) . '" title="' . (($session['reportCounts']['lastUpdate']) ? ('Last Report Update' . ': ' . XenForo_Template_Helper_Core::datetime($session['reportCounts']['lastUpdate'], '')) : ('')) . '">';
if ($session['reportCounts']['assigned'])
{
$__compilerVar89 .= htmlspecialchars($session['reportCounts']['assigned'], ENT_QUOTES, 'UTF-8') . ' / ' . htmlspecialchars($session['reportCounts']['total'], ENT_QUOTES, 'UTF-8');
}
else
{
$__compilerVar89 .= htmlspecialchars($session['reportCounts']['total'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar89 .= '</span>
				</a>
			';
}
$__compilerVar89 .= '
			
			
			
			
			
			';
if ($visitor['is_admin'] AND $session['canAdminUsers'] AND $session['userModerationCounts']['total'])
{
$__compilerVar89 .= '
				<a href="admin.php?users/moderated" class="userModerationQueue modLink">
					<span class="itemLabel">' . 'Users' . ':</span>
					<span class="itemCount ' . (($session['userModerationCounts']['total']) ? ('alert') : ('')) . '">' . htmlspecialchars($session['userModerationCounts']['total'], ENT_QUOTES, 'UTF-8') . '</span>
				</a>
			';
}
$__compilerVar89 .= '

			';
$__compilerVar90 = '';
$__compilerVar89 .= $this->callTemplateHook('moderator_bar', $__compilerVar90, array());
unset($__compilerVar90);
$__compilerVar89 .= '
		';
if (trim($__compilerVar89) !== '')
{
$__compilerVar88 .= '
		
		' . $__compilerVar89 . '
		
		';
}
unset($__compilerVar89);
$__compilerVar88 .= '
		
		
		<div class="headerLeft">
		
		
		             ';
if ($canSearch)
{
$__compilerVar91 = '';
$__compilerVar91 .= '


<div id="searchBar" class="pageWidth" style="display:none;">
	
	<fieldset id="QuickSearch" class="active">
		<form action="' . XenForo_Template_Helper_Core::link('search/search', false, array()) . '" method="post">
			
			

			
			<div class="primaryControls">
				<!-- block: primaryControls -->
				<input type="search" name="keywords" value="" class="textCtrl" placeholder="Tìm kiếm..." results="0" title="Nhập từ khóa và ấn Enter" id="QuickSearchQuery">				
				<!-- end block: primaryControls -->
			</div>
			
			<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		</form>		
	</fieldset>
	
</div>



';
$__compilerVar88 .= $__compilerVar91;
unset($__compilerVar91);
}
$__compilerVar88 .= '

		</div>
		
		
		<div class="headerRight">





		
			';
if ($visitor['user_id'])
{
$__compilerVar88 .= '
			
			';
$__compilerVar92 = '';
$__compilerVar92 .= '

<ul class="visitorTabs">

	';
$__compilerVar93 = '';
$__compilerVar92 .= $this->callTemplateHook('navigation_visitor_tabs_start', $__compilerVar93, array());
unset($__compilerVar93);
$__compilerVar92 .= '

	<!-- account -->
	<li class="navTab account Popup PopupControl PopupClosed ' . (($tabs['account']['selected']) ? ('selected') : ('')) . '">

		';
$visitorHiddenUnread = ($visitor['alerts_unread'] + $visitor['conversations_unread']);
$__compilerVar92 .= '
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
$__compilerVar94 = '';
$__compilerVar94 .= XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $visitor
));
if (trim($__compilerVar94) !== '')
{
$__compilerVar92 .= '<div class="muted">' . $__compilerVar94 . '</div>';
}
unset($__compilerVar94);
$__compilerVar92 .= '
				
				<ul class="links">
					<li class="fl"><a href="' . XenForo_Template_Helper_Core::link('members', $visitor, array()) . '">' . 'Trang hồ sơ của bạn' . '</a></li>
				</ul>
			</div>
			<div class="menuColumns secondaryContent">
				<ul class="col1 blockLinksList">
				';
$__compilerVar95 = '';
$__compilerVar95 .= '
					';
if ($canEditProfile)
{
$__compilerVar95 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Chi tiết cá nhân' . '</a></li>';
}
$__compilerVar95 .= '
					';
if ($canEditSignature)
{
$__compilerVar95 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/signature', false, array()) . '">' . 'Chữ ký' . '</a></li>';
}
$__compilerVar95 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('account/contact-details', false, array()) . '">' . 'Chi tiết liên hệ' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/privacy', false, array()) . '">' . 'Bảo mật cá nhân' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/preferences', false, array()) . '" class="OverlayTrigger">' . 'Tùy chọn' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/alert-preferences', false, array()) . '">' . 'Thiết lập thông báo' . '</a></li>
					';
if ($canUploadAvatar)
{
$__compilerVar95 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/avatar', false, array()) . '" class="OverlayTrigger" data-cacheOverlay="true">' . 'Avatar' . '</a></li>';
}
$__compilerVar95 .= '
					';
if ($xenOptions['facebookAppId'] OR $xenOptions['twitterAppKey'] OR $xenOptions['googleClientId'])
{
$__compilerVar95 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/external-accounts', false, array()) . '">' . 'External Accounts' . '</a></li>';
}
$__compilerVar95 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('account/security', false, array()) . '">' . 'Mật khẩu' . '</a></li>
				';
$__compilerVar92 .= $this->callTemplateHook('navigation_visitor_tab_links1', $__compilerVar95, array());
unset($__compilerVar95);
$__compilerVar92 .= '
				</ul>
				<ul class="col2 blockLinksList">
				';
$__compilerVar96 = '';
$__compilerVar96 .= '
					';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar96 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Thông tin bạn' . '</a></li>';
}
$__compilerVar96 .= '
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
$__compilerVar96 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/upgrades', false, array()) . '">' . 'Account Upgrades' . '</a></li>';
}
$__compilerVar96 .= '
';
if ($visitor['permissions']['linkCheckGroupID']['linkCheckID'])
{
$__compilerVar96 .= '
<a href="' . XenForo_Template_Helper_Core::link('linkcheck/', false, array()) . '">' . 'Link Check' . '</a>
';
}
$__compilerVar96 .= '
';
if ($visitor['permissions']['userAgentGroupID']['userAgentID'] AND $xenOptions['userAgentVisitorTabLink'])
{
$__compilerVar96 .= '
<a href="' . XenForo_Template_Helper_Core::link('useragent/', false, array()) . '">' . 'User Agent' . '</a>
';
}
$__compilerVar96 .= '
';
if ($xenOptions['viewMapVisitorTabLink'])
{
$__compilerVar96 .= '
<a href="' . XenForo_Template_Helper_Core::link('viewmap/', false, array()) . '">' . 'View Map' . '</a>
';
}
$__compilerVar96 .= '
				';
$__compilerVar92 .= $this->callTemplateHook('navigation_visitor_tab_links2', $__compilerVar96, array());
unset($__compilerVar96);
$__compilerVar92 .= '
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
$__compilerVar92 .= '
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
$__compilerVar92 .= '
		</div>		
	</li>
		
	';
if ($tabs['account']['selected'])
{
$__compilerVar92 .= '
	<li class="navTab selected">
		<div class="tabLinks">
			<ul class="secondaryContent blockLinksList">
			';
$__compilerVar97 = '';
$__compilerVar97 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Chi tiết cá nhân' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Đối thoại' . '</a></li>
				';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar97 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Thông tin bạn' . '</a></li>';
}
$__compilerVar97 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('account/likes', false, array()) . '">' . 'Được thích' . '</a></li>
			';
$__compilerVar92 .= $this->callTemplateHook('navigation_tabs_account', $__compilerVar97, array());
unset($__compilerVar97);
$__compilerVar92 .= '
			</ul>
		</div>
	</li>
	';
}
$__compilerVar92 .= '
	
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
$__compilerVar92 .= '<a href="' . XenForo_Template_Helper_Core::link('conversations/add', false, array()) . '" class="floatLink">' . 'Bắt đầu đối thoại mới' . '</a>';
}
$__compilerVar92 .= '
				<a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Xem tất cả' . '...</a>
			</div>
		</div>
	</li>
	
	';
if ($tabs['inbox']['selected'])
{
$__compilerVar92 .= '
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
$__compilerVar92 .= '
	
	';
$__compilerVar98 = '';
$__compilerVar92 .= $this->callTemplateHook('navigation_visitor_tabs_middle', $__compilerVar98, array());
unset($__compilerVar98);
$__compilerVar92 .= '
	
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
$__compilerVar99 = '';
$__compilerVar92 .= $this->callTemplateHook('navigation_visitor_tabs_end', $__compilerVar99, array());
unset($__compilerVar99);
$__compilerVar92 .= '
</ul>';
$__compilerVar88 .= $__compilerVar92;
unset($__compilerVar92);
$__compilerVar88 .= '
			
			';
}
else
{
$__compilerVar88 .= '
			

			<div id="loginBar">';
$this->addRequiredExternal('css', 'login_bar');
$__compilerVar88 .= '

	<span><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="concealed noOutline inner OverlayTrigger" data-overlayoptions="{&quot;fixed&quot;:false}">Đăng nhập</a></span>
	<span><a href="' . XenForo_Template_Helper_Core::link('register', false, array()) . '" class="concealed noOutline inner OverlayTrigger" data-overlayoptions="{&quot;fixed&quot;:false}">Đăng ký</a></span>
	
	
	
		
<!--';
$__compilerVar100 = '';
if ($xenOptions['facebookAppId'])
{
$this->addRequiredExternal('css', 'facebook');
$__compilerVar100 .= '<div align="center"><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin"><span>' . 'Login with Facebook' . '</span></a></div>';
}
if (trim($__compilerVar100) !== '')
{
$__compilerVar88 .= $__compilerVar100;
}
unset($__compilerVar100);
$__compilerVar88 .= '-->
	
</div>
			
			
			';
}
$__compilerVar88 .= '
			


</div>
		
			
			<span class="helper"></span>
		</div>
	</div>
</fieldset>';
$__compilerVar87 .= $__compilerVar88;
unset($__compilerVar88);
$__compilerVar87 .= '
';
}
else if (!$visitor['user_id'] && !$hideLoginBar)
{
$__compilerVar87 .= '
';
$__compilerVar101 = '';
$this->addRequiredExternal('css', 'moderator_bar');
$__compilerVar101 .= '


<fieldset id="moderatorBar">
	<div class="pageWidth">
		<div class="pageContent">
		
		';
$__compilerVar102 = '';
$__compilerVar102 .= '
			';
if ($visitor['is_admin'])
{
$__compilerVar102 .= '			
				<a href="admin.php" class="acp adminLink"><span class="itemLabel">' . 'Admin' . '</span></a>
				
				';
if ($session['permissionTest'])
{
$__compilerVar102 .= '
					<a href="' . XenForo_Template_Helper_Core::link('misc/reset-permissions', false, array()) . '" class="permissionTest adminLink OverlayTrigger">
						<span class="itemLabel">' . 'Permissions from ' . htmlspecialchars($session['permissionTest']['username'], ENT_QUOTES, 'UTF-8') . '' . '</span>
					</a>
				';
}
$__compilerVar102 .= '
			';
}
$__compilerVar102 .= '
			
			
			
		
  
		
			
			
			';
if ($visitor['is_moderator'] AND $session['moderationCounts']['total'])
{
$__compilerVar102 .= '
				<a href="' . XenForo_Template_Helper_Core::link('moderation-queue', false, array()) . '" class="moderationQueue modLink">
					<span class="itemLabel">' . 'Moderation' . ':</span>
					<span class="itemCount ' . (($session['moderationCounts']['total']) ? ('alert') : ('')) . '">' . htmlspecialchars($session['moderationCounts']['total'], ENT_QUOTES, 'UTF-8') . '</span>
				</a>
			';
}
$__compilerVar102 .= '
			
			';
if ($visitor['is_moderator'] && !$xenOptions['reportIntoForumId'])
{
$__compilerVar102 .= '
				<a href="' . XenForo_Template_Helper_Core::link('reports', false, array()) . '" class="reportedItems modLink">
					<span class="itemLabel">' . 'Báo cáo ' . ':</span>
					<span class="itemCount ' . ((($session['reportCounts']['total'] AND $session['reportCounts']['lastUpdate'] > $session['reportLastRead']) OR $session['reportCounts']['assigned']) ? ('alert') : ('')) . '" title="' . (($session['reportCounts']['lastUpdate']) ? ('Last Report Update' . ': ' . XenForo_Template_Helper_Core::datetime($session['reportCounts']['lastUpdate'], '')) : ('')) . '">';
if ($session['reportCounts']['assigned'])
{
$__compilerVar102 .= htmlspecialchars($session['reportCounts']['assigned'], ENT_QUOTES, 'UTF-8') . ' / ' . htmlspecialchars($session['reportCounts']['total'], ENT_QUOTES, 'UTF-8');
}
else
{
$__compilerVar102 .= htmlspecialchars($session['reportCounts']['total'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar102 .= '</span>
				</a>
			';
}
$__compilerVar102 .= '
			
			
			
			
			
			';
if ($visitor['is_admin'] AND $session['canAdminUsers'] AND $session['userModerationCounts']['total'])
{
$__compilerVar102 .= '
				<a href="admin.php?users/moderated" class="userModerationQueue modLink">
					<span class="itemLabel">' . 'Users' . ':</span>
					<span class="itemCount ' . (($session['userModerationCounts']['total']) ? ('alert') : ('')) . '">' . htmlspecialchars($session['userModerationCounts']['total'], ENT_QUOTES, 'UTF-8') . '</span>
				</a>
			';
}
$__compilerVar102 .= '

			';
$__compilerVar103 = '';
$__compilerVar102 .= $this->callTemplateHook('moderator_bar', $__compilerVar103, array());
unset($__compilerVar103);
$__compilerVar102 .= '
		';
if (trim($__compilerVar102) !== '')
{
$__compilerVar101 .= '
		
		' . $__compilerVar102 . '
		
		';
}
unset($__compilerVar102);
$__compilerVar101 .= '
		
		
		<div class="headerLeft">
		
		
		             ';
if ($canSearch)
{
$__compilerVar104 = '';
$__compilerVar104 .= '


<div id="searchBar" class="pageWidth" style="display:none;">
	
	<fieldset id="QuickSearch" class="active">
		<form action="' . XenForo_Template_Helper_Core::link('search/search', false, array()) . '" method="post">
			
			

			
			<div class="primaryControls">
				<!-- block: primaryControls -->
				<input type="search" name="keywords" value="" class="textCtrl" placeholder="Tìm kiếm..." results="0" title="Nhập từ khóa và ấn Enter" id="QuickSearchQuery">				
				<!-- end block: primaryControls -->
			</div>
			
			<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		</form>		
	</fieldset>
	
</div>



';
$__compilerVar101 .= $__compilerVar104;
unset($__compilerVar104);
}
$__compilerVar101 .= '

		</div>
		
		
		<div class="headerRight">





		
			';
if ($visitor['user_id'])
{
$__compilerVar101 .= '
			
			';
$__compilerVar105 = '';
$__compilerVar105 .= '

<ul class="visitorTabs">

	';
$__compilerVar106 = '';
$__compilerVar105 .= $this->callTemplateHook('navigation_visitor_tabs_start', $__compilerVar106, array());
unset($__compilerVar106);
$__compilerVar105 .= '

	<!-- account -->
	<li class="navTab account Popup PopupControl PopupClosed ' . (($tabs['account']['selected']) ? ('selected') : ('')) . '">

		';
$visitorHiddenUnread = ($visitor['alerts_unread'] + $visitor['conversations_unread']);
$__compilerVar105 .= '
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
$__compilerVar107 = '';
$__compilerVar107 .= XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $visitor
));
if (trim($__compilerVar107) !== '')
{
$__compilerVar105 .= '<div class="muted">' . $__compilerVar107 . '</div>';
}
unset($__compilerVar107);
$__compilerVar105 .= '
				
				<ul class="links">
					<li class="fl"><a href="' . XenForo_Template_Helper_Core::link('members', $visitor, array()) . '">' . 'Trang hồ sơ của bạn' . '</a></li>
				</ul>
			</div>
			<div class="menuColumns secondaryContent">
				<ul class="col1 blockLinksList">
				';
$__compilerVar108 = '';
$__compilerVar108 .= '
					';
if ($canEditProfile)
{
$__compilerVar108 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Chi tiết cá nhân' . '</a></li>';
}
$__compilerVar108 .= '
					';
if ($canEditSignature)
{
$__compilerVar108 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/signature', false, array()) . '">' . 'Chữ ký' . '</a></li>';
}
$__compilerVar108 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('account/contact-details', false, array()) . '">' . 'Chi tiết liên hệ' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/privacy', false, array()) . '">' . 'Bảo mật cá nhân' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/preferences', false, array()) . '" class="OverlayTrigger">' . 'Tùy chọn' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/alert-preferences', false, array()) . '">' . 'Thiết lập thông báo' . '</a></li>
					';
if ($canUploadAvatar)
{
$__compilerVar108 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/avatar', false, array()) . '" class="OverlayTrigger" data-cacheOverlay="true">' . 'Avatar' . '</a></li>';
}
$__compilerVar108 .= '
					';
if ($xenOptions['facebookAppId'] OR $xenOptions['twitterAppKey'] OR $xenOptions['googleClientId'])
{
$__compilerVar108 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/external-accounts', false, array()) . '">' . 'External Accounts' . '</a></li>';
}
$__compilerVar108 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('account/security', false, array()) . '">' . 'Mật khẩu' . '</a></li>
				';
$__compilerVar105 .= $this->callTemplateHook('navigation_visitor_tab_links1', $__compilerVar108, array());
unset($__compilerVar108);
$__compilerVar105 .= '
				</ul>
				<ul class="col2 blockLinksList">
				';
$__compilerVar109 = '';
$__compilerVar109 .= '
					';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar109 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Thông tin bạn' . '</a></li>';
}
$__compilerVar109 .= '
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
$__compilerVar109 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/upgrades', false, array()) . '">' . 'Account Upgrades' . '</a></li>';
}
$__compilerVar109 .= '
';
if ($visitor['permissions']['linkCheckGroupID']['linkCheckID'])
{
$__compilerVar109 .= '
<a href="' . XenForo_Template_Helper_Core::link('linkcheck/', false, array()) . '">' . 'Link Check' . '</a>
';
}
$__compilerVar109 .= '
';
if ($visitor['permissions']['userAgentGroupID']['userAgentID'] AND $xenOptions['userAgentVisitorTabLink'])
{
$__compilerVar109 .= '
<a href="' . XenForo_Template_Helper_Core::link('useragent/', false, array()) . '">' . 'User Agent' . '</a>
';
}
$__compilerVar109 .= '
';
if ($xenOptions['viewMapVisitorTabLink'])
{
$__compilerVar109 .= '
<a href="' . XenForo_Template_Helper_Core::link('viewmap/', false, array()) . '">' . 'View Map' . '</a>
';
}
$__compilerVar109 .= '
				';
$__compilerVar105 .= $this->callTemplateHook('navigation_visitor_tab_links2', $__compilerVar109, array());
unset($__compilerVar109);
$__compilerVar105 .= '
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
$__compilerVar105 .= '
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
$__compilerVar105 .= '
		</div>		
	</li>
		
	';
if ($tabs['account']['selected'])
{
$__compilerVar105 .= '
	<li class="navTab selected">
		<div class="tabLinks">
			<ul class="secondaryContent blockLinksList">
			';
$__compilerVar110 = '';
$__compilerVar110 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Chi tiết cá nhân' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Đối thoại' . '</a></li>
				';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar110 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Thông tin bạn' . '</a></li>';
}
$__compilerVar110 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('account/likes', false, array()) . '">' . 'Được thích' . '</a></li>
			';
$__compilerVar105 .= $this->callTemplateHook('navigation_tabs_account', $__compilerVar110, array());
unset($__compilerVar110);
$__compilerVar105 .= '
			</ul>
		</div>
	</li>
	';
}
$__compilerVar105 .= '
	
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
$__compilerVar105 .= '<a href="' . XenForo_Template_Helper_Core::link('conversations/add', false, array()) . '" class="floatLink">' . 'Bắt đầu đối thoại mới' . '</a>';
}
$__compilerVar105 .= '
				<a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Xem tất cả' . '...</a>
			</div>
		</div>
	</li>
	
	';
if ($tabs['inbox']['selected'])
{
$__compilerVar105 .= '
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
$__compilerVar105 .= '
	
	';
$__compilerVar111 = '';
$__compilerVar105 .= $this->callTemplateHook('navigation_visitor_tabs_middle', $__compilerVar111, array());
unset($__compilerVar111);
$__compilerVar105 .= '
	
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
$__compilerVar112 = '';
$__compilerVar105 .= $this->callTemplateHook('navigation_visitor_tabs_end', $__compilerVar112, array());
unset($__compilerVar112);
$__compilerVar105 .= '
</ul>';
$__compilerVar101 .= $__compilerVar105;
unset($__compilerVar105);
$__compilerVar101 .= '
			
			';
}
else
{
$__compilerVar101 .= '
			

			<div id="loginBar">';
$this->addRequiredExternal('css', 'login_bar');
$__compilerVar101 .= '

	<span><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="concealed noOutline inner OverlayTrigger" data-overlayoptions="{&quot;fixed&quot;:false}">Đăng nhập</a></span>
	<span><a href="' . XenForo_Template_Helper_Core::link('register', false, array()) . '" class="concealed noOutline inner OverlayTrigger" data-overlayoptions="{&quot;fixed&quot;:false}">Đăng ký</a></span>
	
	
	
		
<!--';
$__compilerVar113 = '';
if ($xenOptions['facebookAppId'])
{
$this->addRequiredExternal('css', 'facebook');
$__compilerVar113 .= '<div align="center"><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin"><span>' . 'Login with Facebook' . '</span></a></div>';
}
if (trim($__compilerVar113) !== '')
{
$__compilerVar101 .= $__compilerVar113;
}
unset($__compilerVar113);
$__compilerVar101 .= '-->
	
</div>
			
			
			';
}
$__compilerVar101 .= '
			


</div>
		
			
			<span class="helper"></span>
		</div>
	</div>
</fieldset>';
$__compilerVar87 .= $__compilerVar101;
unset($__compilerVar101);
$__compilerVar87 .= '
';
}
$__compilerVar87 .= '


<div id="fb-root"></div>
<script>(function(d, s, id) {
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
	
	
	';
if ($contentTemplate == ('forum_list'))
{
$__compilerVar87 .= '<div class="pageContentNone">';
}
else
{
$__compilerVar87 .= '<div class="pageContent">';
}
$__compilerVar87 .= '
		
			<!-- main content area -->
			
			';
$__compilerVar114 = '';
$__compilerVar87 .= $this->callTemplateCallback('DigitalPointSocialBar_Callback_SocialBar', 'renderSocialBar', $__compilerVar114, array());
unset($__compilerVar114);
$__compilerVar87 .= '
';
$__compilerVar115 = '';
$__compilerVar87 .= $this->callTemplateHook('page_container_content_top', $__compilerVar115, array());
unset($__compilerVar115);
$__compilerVar87 .= '
			
			';
if ($sidebar)
{
$__compilerVar87 .= '
				<div class="mainContainer">
					<div class="mainContent">';
}
$__compilerVar87 .= '
						
						<!-- <a href="http://vnnet.org/"><img src="http://vxf.vn/styles/banner/xenforo_hosting.png" alt="XenForo Hosting" width="100%" border="0"></a> -->
						
						';
$__compilerVar116 = '';
$__compilerVar117 = '';
$__compilerVar116 .= $this->callTemplateHook('ad_above_top_breadcrumb', $__compilerVar117, array());
unset($__compilerVar117);
$__compilerVar87 .= $__compilerVar116;
unset($__compilerVar116);
$__compilerVar87 .= '
						
						';
$__compilerVar118 = '';
$__compilerVar118 .= '
						<div class="breadBoxTop ' . (($topctrl) ? ('withTopCtrl') : ('')) . '">
							';
if ($topctrl)
{
$__compilerVar118 .= '<div class="topCtrl">' . $topctrl . '</div>';
}
$__compilerVar118 .= '
							';
$__compilerVar119 = '';
$__compilerVar119 .= '1';
$__compilerVar120 = '';
$__compilerVar120 .= '

<nav>
	';
if (!$quickNavSelected AND $navigation)
{
$__compilerVar120 .= '
		';
foreach ($navigation AS $breadcrumb)
{
$__compilerVar120 .= '
			';
if ($breadcrumb['node_id'])
{
$__compilerVar120 .= '
				';
$quickNavSelected = '';
$quickNavSelected .= 'node-' . htmlspecialchars($breadcrumb['node_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar120 .= '
			';
}
$__compilerVar120 .= '
		';
}
$__compilerVar120 .= '
	';
}
$__compilerVar120 .= '

	<fieldset class="breadcrumb">
		<a href="' . XenForo_Template_Helper_Core::link('misc/quick-navigation-menu', '', array(
'selected' => $quickNavSelected
)) . '" class="OverlayTrigger jumpMenuTrigger" data-cacheOverlay="true" title="' . 'Mở điều hướng nhanh' . '"><!--' . 'Jump to' . '...--></a>
			
		<div class="boardTitle"><strong>' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '</strong></div>
		
		<span class="crumbs">
			';
if ($showHomeLink)
{
$__compilerVar120 .= '
				<span class="crust homeCrumb"' . (($__compilerVar119) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
					<a href="' . htmlspecialchars($homeLink, ENT_QUOTES, 'UTF-8') . '" class="crumb"' . (($__compilerVar119) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($__compilerVar119) ? (' itemprop="title"') : ('')) . '>' . 'Trang chủ' . '</span></a>
					<span class="arrow"><span></span></span>
				</span>
			';
}
else if ($selectedTabId != $homeTabId)
{
$__compilerVar120 .= '
				<span class="crust homeCrumb"' . (($__compilerVar119) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
					<a href="' . htmlspecialchars($homeTab['href'], ENT_QUOTES, 'UTF-8') . '" class="crumb"' . (($__compilerVar119) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($__compilerVar119) ? (' itemprop="title"') : ('')) . '>' . htmlspecialchars($homeTab['title'], ENT_QUOTES, 'UTF-8') . '</span></a>
					<span class="arrow"><span></span></span>
				</span>
			';
}
$__compilerVar120 .= '
			
			';
if ($selectedTab)
{
$__compilerVar120 .= '
				<span class="crust selectedTabCrumb"' . (($__compilerVar119) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
					<a href="' . htmlspecialchars($selectedTab['href'], ENT_QUOTES, 'UTF-8') . '" class="crumb"' . (($__compilerVar119) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($__compilerVar119) ? (' itemprop="title"') : ('')) . '>' . htmlspecialchars($selectedTab['title'], ENT_QUOTES, 'UTF-8') . '</span></a>
					<span class="arrow"><span>&gt;</span></span>
				</span>
			';
}
$__compilerVar120 .= '
			
			';
if ($navigation)
{
$__compilerVar120 .= '
				';
$i = 0;
$count = count($navigation);
foreach ($navigation AS $breadcrumb)
{
$i++;
$__compilerVar120 .= '
					<span class="crust"' . (($__compilerVar119) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
						<a href="' . $breadcrumb['href'] . '" class="crumb"' . (($__compilerVar119) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($__compilerVar119) ? (' itemprop="title"') : ('')) . '>' . $breadcrumb['value'] . '</span></a>
						<span class="arrow"><span>&gt;</span></span>
					</span>
				';
}
$__compilerVar120 .= '
			';
}
$__compilerVar120 .= '
		</span>
	</fieldset>
</nav>';
$__compilerVar118 .= $__compilerVar120;
unset($__compilerVar119, $__compilerVar120);
$__compilerVar118 .= '
						</div>
						';
$__compilerVar87 .= $this->callTemplateHook('page_container_breadcrumb_top', $__compilerVar118, array());
unset($__compilerVar118);
$__compilerVar87 .= '
						
						';
$__compilerVar121 = '';
$__compilerVar122 = '';
$__compilerVar121 .= $this->callTemplateHook('ad_below_top_breadcrumb', $__compilerVar122, array());
unset($__compilerVar122);
$__compilerVar87 .= $__compilerVar121;
unset($__compilerVar121);
$__compilerVar87 .= '
					
						<!--[if lt IE 8]>
							<p class="importantMessage">' . 'You are using an out of date browser. It  may not display this or other websites correctly.<br />You should upgrade or use an <a href="https://www.google.com/chrome" target="_blank">alternative browser</a>.' . '</p>
						<![endif]-->

						';
$__compilerVar123 = '';
$__compilerVar123 .= '
						';
$__compilerVar124 = '';
if ($notices)
{
$__compilerVar124 .= '

';
$this->addRequiredExternal('css', 'panel_scroller');
$__compilerVar124 .= '
' . '

<div class="' . ((XenForo_Template_Helper_Core::styleProperty('scrollableNotices')) ? ('PanelScroller') : ('PanelScrollerOff')) . '" id="Notices" data-vertical="' . XenForo_Template_Helper_Core::styleProperty('noticeVertical') . '" data-speed="' . XenForo_Template_Helper_Core::styleProperty('noticeSpeed') . '" data-interval="' . XenForo_Template_Helper_Core::styleProperty('noticeInterval') . '">
	<div class="scrollContainer">
		<div class="PanelContainer">
			<ol class="Panels">
				';
foreach ($notices AS $noticeId => $notice)
{
$__compilerVar124 .= '
					';
$__compilerVar125 = '';
$__compilerVar125 .= $notice['message'];
$__compilerVar126 = '';
$__compilerVar126 .= '<li class="panel Notice DismissParent notice_' . htmlspecialchars($noticeId, ENT_QUOTES, 'UTF-8') . '">
	<div class="' . (($notice['wrap']) ? ('baseHtml noticeContent') : ('')) . '">' . $__compilerVar125 . '</div>
	
	';
if ($notice['dismissible'])
{
$__compilerVar126 .= '
		<a href="' . XenForo_Template_Helper_Core::link('account/dismiss-notice', '', array(
'notice_id' => $noticeId
)) . '"
			title="' . 'Dismiss Notice' . '" class="DismissCtrl Tooltip" data-offsetx="7" data-tipclass="flipped">' . 'Dismiss Notice' . '</a>';
}
$__compilerVar126 .= '
</li>';
$__compilerVar124 .= $__compilerVar126;
unset($__compilerVar125, $__compilerVar126);
$__compilerVar124 .= '
				';
}
$__compilerVar124 .= '
			</ol>
		</div>
	</div>
	
	';
if (XenForo_Template_Helper_Core::styleProperty('scrollableNotices') AND XenForo_Template_Helper_Core::numberFormat(count($notices), '0') > 1)
{
$__compilerVar124 .= '<div class="navContainer">
		<span class="navControls Nav JsOnly">
			';
$i = 0;
foreach ($notices AS $noticeId => $notice)
{
$i++;
$__compilerVar124 .= '
				<a id="n' . htmlspecialchars($noticeId, ENT_QUOTES, 'UTF-8') . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#n' . htmlspecialchars($noticeId, ENT_QUOTES, 'UTF-8') . '"' . (($i == 1) ? (' class="current"') : ('')) . '>
					<span class="arrow"><span></span></span>
					<!--' . htmlspecialchars($i, ENT_QUOTES, 'UTF-8') . ' -->' . htmlspecialchars($notice['title'], ENT_QUOTES, 'UTF-8') . '</a>
			';
}
$__compilerVar124 .= '
		</span>
	</div>';
}
$__compilerVar124 .= '
</div>

';
}
$__compilerVar123 .= $__compilerVar124;
unset($__compilerVar124);
$__compilerVar123 .= '						
						';
$__compilerVar87 .= $this->callTemplateHook('page_container_notices', $__compilerVar123, array());
unset($__compilerVar123);
$__compilerVar87 .= '
						
						';
$__compilerVar127 = '';
$__compilerVar127 .= '
						';
if (!$noH1)
{
$__compilerVar127 .= '						
							<!-- h1 title, description -->
							<div class="titleBar">
								' . $beforeH1 . '
								<h1>';
if ($h1)
{
$__compilerVar127 .= $h1;
}
else if ($title)
{
$__compilerVar127 .= $title;
}
else
{
$__compilerVar127 .= htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar127 .= '</h1>
								
								';
if ($pageDescription['content'])
{
$__compilerVar127 .= '<p id="pageDescription" class="muted ' . htmlspecialchars($pageDescription['class'], ENT_QUOTES, 'UTF-8') . '">' . $pageDescription['content'] . '</p>';
}
$__compilerVar127 .= '
							</div>
						';
}
$__compilerVar127 .= '
						';
$__compilerVar87 .= $this->callTemplateHook('page_container_content_title_bar', $__compilerVar127, array());
unset($__compilerVar127);
$__compilerVar87 .= '
						
						';
$__compilerVar128 = '';
$__compilerVar129 = '';
$__compilerVar128 .= $this->callTemplateHook('ad_above_content', $__compilerVar129, array());
unset($__compilerVar129);
$__compilerVar87 .= $__compilerVar128;
unset($__compilerVar128);
$__compilerVar87 .= '
						
						<!-- main template -->
						' . $contents . '
						
						';
$__compilerVar130 = '';
$__compilerVar131 = '';
$__compilerVar130 .= $this->callTemplateHook('ad_below_content', $__compilerVar131, array());
unset($__compilerVar131);
$__compilerVar87 .= $__compilerVar130;
unset($__compilerVar130);
$__compilerVar87 .= '
						
						';
if (!$visitor['user_id'] && !$hideLoginBar)
{
$__compilerVar87 .= '
							<!-- login form, to be moved to the upper drop-down -->
							';
$__compilerVar132 = '';
$__compilerVar132 .= '

';
$__compilerVar133 = '';
$__compilerVar133 .= '
';
if ($xenOptions['facebookAppId'])
{
$eAuth = '';
$eAuth .= '1';
}
$__compilerVar133 .= '
';
if ($xenOptions['twitterAppKey'])
{
$eAuth = '';
$eAuth .= '1';
}
$__compilerVar133 .= '
';
if ($xenOptions['googleClientId'])
{
$eAuth = '';
$eAuth .= '1';
}
$__compilerVar133 .= '
';
$__compilerVar132 .= $this->callTemplateHook('login_bar_eauth_set', $__compilerVar133, array());
unset($__compilerVar133);
$__compilerVar132 .= '

<form action="' . XenForo_Template_Helper_Core::link('login/login', false, array()) . '" method="post" class="xenForm ' . (($eAuth) ? ('eAuth') : ('')) . '" id="login" style="display:none">

	';
$__compilerVar134 = '';
$__compilerVar134 .= '
				';
$__compilerVar135 = '';
$__compilerVar135 .= '
				';
if ($xenOptions['facebookAppId'])
{
$__compilerVar135 .= '
					';
$this->addRequiredExternal('css', 'facebook');
$__compilerVar135 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin" tabindex="110"><span>' . 'Login with Facebook' . '</span></a></li>
				';
}
$__compilerVar135 .= '
				
				';
if ($xenOptions['twitterAppKey'])
{
$__compilerVar135 .= '
					';
$this->addRequiredExternal('css', 'twitter');
$__compilerVar135 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('register/twitter', '', array(
'reg' => '1'
)) . '" class="twitterLogin" tabindex="110"><span>' . 'Log in with Twitter' . '</span></a></li>
				';
}
$__compilerVar135 .= '
				
				';
if ($xenOptions['googleClientId'])
{
$__compilerVar135 .= '
					';
$this->addRequiredExternal('css', 'google');
$__compilerVar135 .= '
					<li><span class="googleLogin GoogleLogin JsOnly" tabindex="110" data-client-id="' . htmlspecialchars($xenOptions['googleClientId'], ENT_QUOTES, 'UTF-8') . '" data-redirect-url="' . XenForo_Template_Helper_Core::link('register/google', '', array(
'code' => '__CODE__',
'csrf' => $session['sessionCsrf']
)) . '"><span>' . 'Log in with Google' . '</span></span></li>
				';
}
$__compilerVar135 .= '
				';
$__compilerVar134 .= $this->callTemplateHook('login_bar_eauth_items', $__compilerVar135, array());
unset($__compilerVar135);
$__compilerVar134 .= '
			';
if (trim($__compilerVar134) !== '')
{
$__compilerVar132 .= '
		<ul id="eAuthUnit">
			' . $__compilerVar134 . '
		</ul>
	';
}
unset($__compilerVar134);
$__compilerVar132 .= '

	<div class="ctrlWrapper">
		<dl class="ctrlUnit">
			<dt><label for="LoginControl">' . 'Tên tài khoản hoặc địa chỉ Email' . ':</label></dt>
			<dd><input type="text" name="login" id="LoginControl" class="textCtrl" tabindex="101" /></dd>
		</dl>
	
	';
if ($xenOptions['registrationSetup']['enabled'])
{
$__compilerVar132 .= '
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
$__compilerVar132 .= '
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
$__compilerVar132 .= '
		
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
$__compilerVar87 .= $__compilerVar132;
unset($__compilerVar132);
$__compilerVar87 .= '
						';
}
$__compilerVar87 .= '
						
					';
if ($sidebar)
{
$__compilerVar87 .= '</div>
				</div>
				
				<!-- sidebar -->
				<aside>
					<div class="sidebar">
						';
$__compilerVar136 = '';
$__compilerVar136 .= '
						';
$__compilerVar137 = '';
$__compilerVar138 = '';
$__compilerVar137 .= $this->callTemplateHook('ad_sidebar_top', $__compilerVar138, array());
unset($__compilerVar138);
$__compilerVar136 .= $__compilerVar137;
unset($__compilerVar137);
$__compilerVar136 .= '
						';
if (!$noVisitorPanel)
{
$__compilerVar139 = '';
if ($visitor['user_id'])
{
$__compilerVar139 .= '

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
$__compilerVar140 = '';
$__compilerVar140 .= '
				<dl class="pairsJustified"><dt>' . 'Bài viết' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['message_count'], '0') . '</dd></dl>
				<dl class="pairsJustified"><dt>' . 'Thích' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['like_count'], '0') . '</dd></dl>
				<dl class="pairsJustified"><dt>' . 'Điểm' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['trophy_points'], '0') . '</dd></dl>
			</div>
			';
$__compilerVar139 .= $this->callTemplateHook('sidebar_visitor_panel_stats', $__compilerVar140, array());
unset($__compilerVar140);
$__compilerVar139 .= '
		</div>
		
	</div>
</div>

';
}
else
{
$__compilerVar139 .= '

<div class="section loginButton">   
    <div class="secondaryContent">
        <label for="LoginControl" id="SignupButton"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="inner">' . (($xenOptions['registrationSetup']['enabled']) ? ('Đăng ký!') : ('Đăng nhập')) . '</a></label>
';
$__compilerVar141 = '';
$this->addRequiredExternal('css', 'cta_login');
$__compilerVar141 .= '

';
if ($xenOptions['facebookAppId'])
{
$__compilerVar141 .= '
	';
$this->addRequiredExternal('css', 'facebook');
$__compilerVar141 .= '
	<li class="ctaLoginFacebook"><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin"><span>' . 'Login with Facebook' . '</span></a></li>
';
}
$__compilerVar141 .= '

';
if ($xenOptions['twitterAppKey'])
{
$__compilerVar141 .= '
	';
$this->addRequiredExternal('css', 'twitter');
$__compilerVar141 .= '
	<li class="ctaLoginTwitter"><a href="' . XenForo_Template_Helper_Core::link('register/twitter', '', array(
'reg' => '1'
)) . '" class="twitterLogin"><span>' . 'Log in with Twitter' . '</span></a></li>
';
}
$__compilerVar141 .= '

';
if ($xenOptions['googleClientId'])
{
$__compilerVar141 .= '
	';
$this->addRequiredExternal('css', 'google');
$__compilerVar141 .= '
	<li class="ctaLoginGoogle"><span class="googleLogin GoogleLogin JsOnly" data-client-id="' . htmlspecialchars($xenOptions['googleClientId'], ENT_QUOTES, 'UTF-8') . '" data-redirect-url="' . XenForo_Template_Helper_Core::link('register/google', '', array(
'code' => '__CODE__',
'csrf' => $session['sessionCsrf']
)) . '"><span>' . 'Log in with Google' . '</span></span></li>
';
}
$__compilerVar139 .= $__compilerVar141;
unset($__compilerVar141);
$__compilerVar139 .= '

        ';
if ($xenOptions['facebookAppId'])
{
$__compilerVar139 .= '
            <div class="cta_fbButton">
                <a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin"><span>' . 'Login with Facebook' . '</span></a>
            </div>
        ';
}
$__compilerVar139 .= '

    </div>
</div>

';
}
$__compilerVar139 .= '

';
$__compilerVar142 = '';
$__compilerVar143 = '';
$__compilerVar142 .= $this->callTemplateHook('ad_sidebar_below_visitor_panel', $__compilerVar143, array());
unset($__compilerVar143);
$__compilerVar139 .= $__compilerVar142;
unset($__compilerVar142);
$__compilerVar136 .= $__compilerVar139;
unset($__compilerVar139);
}
$__compilerVar136 .= '
						' . $sidebar . '
						';
$__compilerVar144 = '';
$__compilerVar145 = '';
$__compilerVar144 .= $this->callTemplateHook('ad_sidebar_bottom', $__compilerVar145, array());
unset($__compilerVar145);
$__compilerVar136 .= $__compilerVar144;
unset($__compilerVar144);
$__compilerVar136 .= '
						';
$__compilerVar87 .= $this->callTemplateHook('page_container_sidebar', $__compilerVar136, array());
unset($__compilerVar136);
$__compilerVar87 .= '
					</div>
				</aside>
			';
}
$__compilerVar87 .= '
			
			';
$__compilerVar146 = '';
$__compilerVar146 .= '			
			<div class="breadBoxBottom">';
$__compilerVar147 = '';
$__compilerVar147 .= '

<nav>
	';
if (!$quickNavSelected AND $navigation)
{
$__compilerVar147 .= '
		';
foreach ($navigation AS $breadcrumb)
{
$__compilerVar147 .= '
			';
if ($breadcrumb['node_id'])
{
$__compilerVar147 .= '
				';
$quickNavSelected = '';
$quickNavSelected .= 'node-' . htmlspecialchars($breadcrumb['node_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar147 .= '
			';
}
$__compilerVar147 .= '
		';
}
$__compilerVar147 .= '
	';
}
$__compilerVar147 .= '

	<fieldset class="breadcrumb">
		<a href="' . XenForo_Template_Helper_Core::link('misc/quick-navigation-menu', '', array(
'selected' => $quickNavSelected
)) . '" class="OverlayTrigger jumpMenuTrigger" data-cacheOverlay="true" title="' . 'Mở điều hướng nhanh' . '"><!--' . 'Jump to' . '...--></a>
			
		<div class="boardTitle"><strong>' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '</strong></div>
		
		<span class="crumbs">
			';
if ($showHomeLink)
{
$__compilerVar147 .= '
				<span class="crust homeCrumb"' . (($microdata) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
					<a href="' . htmlspecialchars($homeLink, ENT_QUOTES, 'UTF-8') . '" class="crumb"' . (($microdata) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($microdata) ? (' itemprop="title"') : ('')) . '>' . 'Trang chủ' . '</span></a>
					<span class="arrow"><span></span></span>
				</span>
			';
}
else if ($selectedTabId != $homeTabId)
{
$__compilerVar147 .= '
				<span class="crust homeCrumb"' . (($microdata) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
					<a href="' . htmlspecialchars($homeTab['href'], ENT_QUOTES, 'UTF-8') . '" class="crumb"' . (($microdata) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($microdata) ? (' itemprop="title"') : ('')) . '>' . htmlspecialchars($homeTab['title'], ENT_QUOTES, 'UTF-8') . '</span></a>
					<span class="arrow"><span></span></span>
				</span>
			';
}
$__compilerVar147 .= '
			
			';
if ($selectedTab)
{
$__compilerVar147 .= '
				<span class="crust selectedTabCrumb"' . (($microdata) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
					<a href="' . htmlspecialchars($selectedTab['href'], ENT_QUOTES, 'UTF-8') . '" class="crumb"' . (($microdata) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($microdata) ? (' itemprop="title"') : ('')) . '>' . htmlspecialchars($selectedTab['title'], ENT_QUOTES, 'UTF-8') . '</span></a>
					<span class="arrow"><span>&gt;</span></span>
				</span>
			';
}
$__compilerVar147 .= '
			
			';
if ($navigation)
{
$__compilerVar147 .= '
				';
$i = 0;
$count = count($navigation);
foreach ($navigation AS $breadcrumb)
{
$i++;
$__compilerVar147 .= '
					<span class="crust"' . (($microdata) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
						<a href="' . $breadcrumb['href'] . '" class="crumb"' . (($microdata) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($microdata) ? (' itemprop="title"') : ('')) . '>' . $breadcrumb['value'] . '</span></a>
						<span class="arrow"><span>&gt;</span></span>
					</span>
				';
}
$__compilerVar147 .= '
			';
}
$__compilerVar147 .= '
		</span>
	</fieldset>
</nav>';
$__compilerVar146 .= $__compilerVar147;
unset($__compilerVar147);
$__compilerVar146 .= '</div>
			';
$__compilerVar87 .= $this->callTemplateHook('page_container_breadcrumb_bottom', $__compilerVar146, array());
unset($__compilerVar146);
$__compilerVar87 .= '
						
			';
$__compilerVar148 = '';
$__compilerVar149 = '';
$__compilerVar148 .= $this->callTemplateHook('ad_below_bottom_breadcrumb', $__compilerVar149, array());
unset($__compilerVar149);
$__compilerVar87 .= $__compilerVar148;
unset($__compilerVar148);
$__compilerVar87 .= '
						
		</div>
	</div>
</div>

<header>
	';
$__compilerVar150 = '';
$__compilerVar151 = '';
$__compilerVar151 .= '
<div id="header">

<div class="pageWidth">
		<div class="pageContent">

	';
$__compilerVar152 = '';
$__compilerVar152 .= '<div id="logoBlock">
	
			';
$__compilerVar153 = '';
$__compilerVar154 = '';
$__compilerVar153 .= $this->callTemplateHook('ad_header', $__compilerVar154, array());
unset($__compilerVar154);
$__compilerVar152 .= $__compilerVar153;
unset($__compilerVar153);
$__compilerVar152 .= '
			';
$__compilerVar155 = '';
$__compilerVar155 .= '
			<div id="logo"><a href="' . htmlspecialchars($logoLink, ENT_QUOTES, 'UTF-8') . '">
				<span></span>
				';
$doodle = XenForo_Template_Helper_Core::callHelper('doodle', array());
$__compilerVar155 .= '
';
if ($doodle)
{
$__compilerVar155 .= '
	';
if ($doodle['link'])
{
$__compilerVar155 .= '
	<a href="' . htmlspecialchars($doodle['link'], ENT_QUOTES, 'UTF-8') . '"><img src="' . htmlspecialchars($doodle['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" /></a>
	';
}
else
{
$__compilerVar155 .= '
	<img src="' . htmlspecialchars($doodle['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__compilerVar155 .= '
';
}
else
{
$__compilerVar155 .= '
	<img src="' . XenForo_Template_Helper_Core::styleProperty('headerLogoPath') . '" alt="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
';
}
$__compilerVar155 .= '
			</a></div>
			';
$__compilerVar152 .= $this->callTemplateHook('header_logo', $__compilerVar155, array());
unset($__compilerVar155);
$__compilerVar152 .= '
			<span class="helper"></span>
	
</div>';
$__compilerVar151 .= $__compilerVar152;
unset($__compilerVar152);
$__compilerVar151 .= '
	';
$__compilerVar156 = '';
$__compilerVar156 .= '

<div id="navigation" class="pageWidth ' . (($canSearch) ? ('withSearch') : ('')) . '">
	<div class="pageContent">
		<nav>

<div class="navTabs">
	<ul class="publicTabs">
	
		<!-- home -->
		';
if ($showHomeLink)
{
$__compilerVar156 .= '
			<li class="navTab home PopupClosed"><a href="' . htmlspecialchars($homeLink, ENT_QUOTES, 'UTF-8') . '" class="navLink">' . 'Trang chủ' . '</a></li>
		';
}
$__compilerVar156 .= '
		
		
		<!-- extra tabs: home -->
		';
if ($extraTabs['home'])
{
$__compilerVar156 .= '
		';
foreach ($extraTabs['home'] AS $extraTabId => $extraTab)
{
$__compilerVar156 .= '
			';
if ($extraTab['linksTemplate'])
{
$__compilerVar156 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__compilerVar156 .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__compilerVar156 .= '</a>
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
$__compilerVar156 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('PopupClosed')) . '">
					<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8') . '</a>
					';
if ($extraTab['selected'])
{
$__compilerVar156 .= '<div class="tabLinks"></div>';
}
$__compilerVar156 .= '
				</li>
			';
}
$__compilerVar156 .= '
		';
}
$__compilerVar156 .= '
		';
}
$__compilerVar156 .= '
		
		
		<!-- forums -->
		';
if ($tabs['forums'])
{
$__compilerVar156 .= '
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
$__compilerVar157 = '';
$__compilerVar157 .= '
						';
if ($visitor['user_id'])
{
$__compilerVar157 .= '<li><a href="' . XenForo_Template_Helper_Core::link('forums/-/mark-read', $forum, array(
'date' => $serverTime
)) . '" class="OverlayTrigger">' . 'Đánh dấu đã đọc' . '</a></li>';
}
$__compilerVar157 .= '
						';
if ($canSearch)
{
$__compilerVar157 .= '<li><a href="' . XenForo_Template_Helper_Core::link('search', '', array(
'type' => 'post'
)) . '">' . 'Tìm kiếm diễn đàn' . '</a></li>';
}
$__compilerVar157 .= '
						';
if ($visitor['user_id'])
{
$__compilerVar157 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('watched/forums', false, array()) . '">' . 'Chủ đề đã đọc' . '</a></li>
							<li><a href="' . XenForo_Template_Helper_Core::link('watched/threads', false, array()) . '">' . 'Chủ đề đang theo dõi' . '</a></li>
						';
}
$__compilerVar157 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('find-new/posts', false, array()) . '" rel="nofollow">' . (($visitor['user_id']) ? ('Bài viết mới') : ('Bài viết gần đây')) . ' ';
$__compilerVar158 = '';
if ($visitor['user_id'])
{
$__compilerVar158 .= '
	';
$this->addRequiredExternal('css', 'unread_posts_count');
$__compilerVar158 .= '

	';
$unread = '';
$__compilerVar159 = '';
$unread .= $this->callTemplateCallback('UnreadPostCount_Callback', 'getUnreadCount', $__compilerVar159, array());
unset($__compilerVar159);
$__compilerVar158 .= '
	
	<span class="postItemCount' . (($unread) ? (' alert') : ('')) . '">
		' . XenForo_Template_Helper_Core::numberFormat($unread, '0') . '
	</span>
';
}
$__compilerVar157 .= $__compilerVar158;
unset($__compilerVar158);
$__compilerVar157 .= '</a></li>
					';
$__compilerVar156 .= $this->callTemplateHook('navigation_tabs_forums', $__compilerVar157, array());
unset($__compilerVar157);
$__compilerVar156 .= '
					</ul>
				</div>
			</li>
		';
}
$__compilerVar156 .= '
		
		
		<!-- extra tabs: middle -->
		';
if ($extraTabs['middle'])
{
$__compilerVar156 .= '
		';
foreach ($extraTabs['middle'] AS $extraTabId => $extraTab)
{
$__compilerVar156 .= '
			';
if ($extraTab['linksTemplate'])
{
$__compilerVar156 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__compilerVar156 .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__compilerVar156 .= '</a>
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
$__compilerVar156 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('PopupClosed')) . '">
					<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8') . '</a>
					';
if ($extraTab['selected'])
{
$__compilerVar156 .= '<div class="tabLinks"></div>';
}
$__compilerVar156 .= '
				</li>
			';
}
$__compilerVar156 .= '
		';
}
$__compilerVar156 .= '
		';
}
$__compilerVar156 .= '
		
		
		<!-- members -->
		';
if ($tabs['members'])
{
$__compilerVar156 .= '
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
$__compilerVar160 = '';
$__compilerVar160 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Thành viên tiêu biểu' . '</a></li>
						';
if ($xenOptions['enableMemberList'])
{
$__compilerVar160 .= '<li><a href="' . XenForo_Template_Helper_Core::link('members/list', false, array()) . '">' . 'Thành viên đã đăng ký' . '</a></li>';
}
$__compilerVar160 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '">' . 'Đang truy cập' . '</a></li>
						';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar160 .= '<li><a href="' . XenForo_Template_Helper_Core::link('recent-activity', false, array()) . '">' . 'Hoạt động gần đây' . '</a></li>';
}
$__compilerVar160 .= '
<li><a href="' . XenForo_Template_Helper_Core::link('members/usermap', false, array()) . '">' . 'User Map' . '</a></li>
					';
$__compilerVar156 .= $this->callTemplateHook('navigation_tabs_members', $__compilerVar160, array());
unset($__compilerVar160);
$__compilerVar156 .= '
					</ul>
				</div>
			</li>
		';
}
$__compilerVar156 .= '				
		
		<!-- extra tabs: end -->
		';
if ($extraTabs['end'])
{
$__compilerVar156 .= '
		';
foreach ($extraTabs['end'] AS $extraTabId => $extraTab)
{
$__compilerVar156 .= '
			';
if ($extraTab['linksTemplate'])
{
$__compilerVar156 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__compilerVar156 .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__compilerVar156 .= '</a>
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
$__compilerVar156 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('PopupClosed')) . '">
					<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8') . '</a>
					';
if ($extraTab['selected'])
{
$__compilerVar156 .= '<div class="tabLinks"></div>';
}
$__compilerVar156 .= '
				</li>
			';
}
$__compilerVar156 .= '
		';
}
$__compilerVar156 .= '
		';
}
$__compilerVar156 .= '

		<!-- responsive popup -->
		<li class="navTab navigationHiddenTabs Popup PopupControl PopupClosed" style="display:none">	
						
			<a rel="Menu" class="navLink NoPopupGadget"><span class="menuIcon">' . 'Menu' . '</span></a>
			
			<div class="Menu JsOnly blockLinksList primaryContent" id="NavigationHiddenMenu"></div>
		</li>
			
		
		<!-- no selection -->
		';
if (!$selectedTab)
{
$__compilerVar156 .= '
			<li class="navTab selected"><div class="tabLinks"></div></li>
		';
}
$__compilerVar156 .= '
		
	</ul>
	
	
</div>

<span class="helper"></span>
			
		</nav>	
	</div>
</div>';
$__compilerVar151 .= $__compilerVar156;
unset($__compilerVar156);
$__compilerVar151 .= '
</div>
</div></div>
';
$__compilerVar150 .= $this->callTemplateHook('header', $__compilerVar151, array());
unset($__compilerVar151);
$__compilerVar87 .= $__compilerVar150;
unset($__compilerVar150);
$__compilerVar87 .= '
	' . '
	' . '
</header>

</div>

<footer>
	';
$__compilerVar161 = '';
$__compilerVar161 .= '
 
';
$__compilerVar162 = '';
$__compilerVar162 .= '

<!--
<div class="footer">
	<div class="pageWidth">
		<div class="pageContent">
			<div id="footer" class="footercolumns">
				  <div id="footer-top">
					
					<div class="footer-top-left">
					<div class="block-top"><img alt="VXF Logo" src="styles/vxf/logo_footer.png"></div>

					<div class="block-bottom">

					<p>Cộng đồng đam mê công nghệ TechLife được thành lập dựa trên tinh thần sẻ chia, đam mê công nghệ</p>
					<p>Website đang hoạt động thử nghiệm. Rất mong nhận được sự đóng góp từ các thành viên.</p>
					</div>

					<div class="connect-face">
					<p>Follow us</p>

					<ul>
						<li><a https://www.facebook.com/pages/H%E1%BB%99i-nh%E1%BB%AFng-ng%C6%B0%E1%BB%9Di-kh%C3%B4ng-th%E1%BB%83-s%E1%BB%91ng-thi%E1%BA%BFu-Mobile/1437174653239569"><img alt="Facebook" src="styles/vxf/face.png" width="33" height="33" title="FaceBook"></a></li>
						<li><a href="http://youtube.com/user/vnnet"><img alt="Social" src="styles/vxf/youtube.png" width="33" height="33" title="Youtube"></a></li>
						<li><a href="http://twitter.com/sunwah9"><img alt="Twitter" src="styles/vxf/twitter.png" width="33" height="33" title="Twitter"></a></li>
						<li><a href="https://plus.google.com/u/0/+vnnetorg"><img alt="Google" width="33" height="33" src="styles/vxf/google.png" title="Google"></a></li>
						<li><a href="http://pinterest.com/vnnet"><img alt="Social" src="styles/vxf/pinterest.png" width="33" height="33" title="Pinterest"></a></li>
						<li><a href="forums/-/index.rss"><img alt="Rss Feed" src="styles/vxf/rss.png" title="Rss Feed" width="33" height="33"></a></li>
					</div>
					</div>
					<div class="fotter-contact">
					<h3>Our Links</h3>

					<ul>
						<li><a href="/" target="_blank">Text Link</a></li>
						<li><a href="/" target="_blank">Text Link</a></li>
						<li><a href="/" target="_blank">Text Link</a></li>
						<li><a href="/" target="_blank">Text Link</a></li>
						<li><a href="/" target="_blank">Text Link</a></li>
						<li><a href="/" target="_blank">Text Link</a></li>
						<li><a href="/" target="_blank">Text Link</a></li>
					</ul>
					</div>
				</div>
				 
				<div class="four columns column">
					<h3>Thông tin</h3>
					<ul>
						<li><a href="/">Text Link</a></li>
						<li><a href="/">Text Link</a></li>
						<li><a href="/">Text Link</a></li>
						<li><a href="/">Text Link</a></li>
						<li><a href="/">Text Link</a></li>
						<li><a href="/">Text Link</a></li>
						<li><a href="/">Text Link</a></li>
					</ul>
				</div>
				<div class="three columns column">
					<h3>Thảo luận</h3>
					<ul>
					<li><a href="/">Text Link</a></li>
					<li><a href="/">Text Link</a></li>
					<li><a href="/">Text Link</a></li>
					<li><a href="/">Text Link</a></li>
					<li><a href="/">Text Link</a></li>
					<li><a href="/">Text Link</a></li>
					<li><a href="/">Text Link</a></li>
					</ul>
				</div>
			</div>
			

			
		
		</div>
	</div>
</div>
-->


 
<div class="footerLegal">
<div class="pageWidth">
<div class="pageContent">
<div id="copyright">';
if ($controllerName == ('DigitalPointUserMap_ControllerPublic_Member') && $controllerAction == ('Usermap'))
{
$__compilerVar162 .= '<div><a href="https://marketplace.digitalpoint.com/digital-point-user-map.992/item" target="_blank">User Map</a> by <a href="https://www.digitalpoint.com/" target="_blank">Digital Point</a></div>';
}
$__compilerVar162 .= 'Diễn đàn sử dụng XenForo&trade; &copy;2010-2013 XenForo Ltd.<br/>Website đang hoạt động thử nghiệm, chờ giấy phép MXH của Bộ TT & TT.' . '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar162 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar162 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar162 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar162 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar162 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar162 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar162 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar162 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar162 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar162 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar162 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar162 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar162 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar162 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar162 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar162 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar162 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar162 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar162 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar162 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar162 .= '</div>
 
 
<ul id="legal">
 

 
';
if ($canChangeStyle OR $canChangeLanguage)
{
$__compilerVar162 .= '

<li class="choosers">
';
if ($canChangeLanguage)
{
$__compilerVar162 .= '
 
<a href="' . XenForo_Template_Helper_Core::link('misc/language', '', array(
'redirect' => $requestPaths['requestUri']
)) . '" class="OverlayTrigger Tooltip" title="' . 'Chọn Ngôn ngữ' . '" rel="nofollow">' . htmlspecialchars($visitorLanguage['title'], ENT_QUOTES, 'UTF-8') . '</a>
';
}
$__compilerVar162 .= '
</li>

<li class="choosers">
';
if ($canChangeStyle)
{
$__compilerVar162 .= '
 
<a href="' . XenForo_Template_Helper_Core::link('misc/style', '', array(
'redirect' => $requestPaths['requestUri']
)) . '" class="OverlayTrigger Tooltip" title="' . 'Chọn giao diện' . '" rel="nofollow">' . htmlspecialchars($visitorStyle['title'], ENT_QUOTES, 'UTF-8') . '</a>
';
}
$__compilerVar162 .= '
</li>

';
}
$__compilerVar162 .= '


<li><a href="' . htmlspecialchars($tosUrl, ENT_QUOTES, 'UTF-8') . '">' . 'Quy định và Nội quy' . '</a></li>

<li><a id="toTop" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#navigation" style="display: inline;">' . 'Lên đầu trang' . '</a></li>


</ul>
 
 
 
';
if ($debugMode)
{
$__compilerVar162 .= '
				';
$__compilerVar163 = '';
$__compilerVar163 .= '
						';
if ($page_time)
{
$__compilerVar163 .= '<dt>' . 'Timing' . ':</dt> <dd><a href="' . htmlspecialchars($debug_url, ENT_QUOTES, 'UTF-8') . '" rel="nofollow">' . '' . XenForo_Template_Helper_Core::numberFormat($page_time, '4') . ' seconds' . '</a></dd>';
}
$__compilerVar163 .= '
						';
if ($memory_usage)
{
$__compilerVar163 .= '<dt>' . 'Memory' . ':</dt> <dd>' . '' . XenForo_Template_Helper_Core::numberFormat(($memory_usage / 1024 / 1024), '3') . ' MB' . '</dd>';
}
$__compilerVar163 .= '
						';
if ($db_queries)
{
$__compilerVar163 .= '<dt>' . 'DB Queries' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($db_queries, '0') . '</dd>';
}
$__compilerVar163 .= '
					';
if (trim($__compilerVar163) !== '')
{
$__compilerVar162 .= '
					<dl class="pairsInline debugInfo" title="' . htmlspecialchars($controllerName, ENT_QUOTES, 'UTF-8') . '-&gt;' . htmlspecialchars($controllerAction, ENT_QUOTES, 'UTF-8') . (($viewName) ? (' (' . htmlspecialchars($viewName, ENT_QUOTES, 'UTF-8') . ')') : ('')) . '">
					' . $__compilerVar163 . '
					</dl>
				';
}
unset($__compilerVar163);
$__compilerVar162 .= '
			';
}
$__compilerVar162 .= '
 
 
<span class="helper"></span>
</div>
</div>
</div>
 
';
$__compilerVar161 .= $this->callTemplateHook('footer', $__compilerVar162, array());
unset($__compilerVar162);
$__compilerVar161 .= '
';
$__compilerVar87 .= $__compilerVar161;
unset($__compilerVar161);
$__compilerVar87 .= '
</footer>

';
$__compilerVar164 = '';
$__compilerVar164 .= '<script>

';
$__compilerVar165 = '';
$__compilerVar165 .= '
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
/*thoinv 02022014*/
jQuery("a.VietXfAdvStats_Header").text("Thống kê diễn đàn");
jQuery("a.VietXfAdvStats_Header").attr("href", "/");

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
$__compilerVar164 .= $this->callTemplateHook('page_container_js_body', $__compilerVar165, array());
unset($__compilerVar165);
$__compilerVar164 .= '

</script>
';
if ($contentTemplate == ('thread_view'))
{
$__compilerVar164 .= '
<script type="text/javascript" src="./js/rrssb/rrssb.min.js"></script>
';
}
$__compilerVar87 .= $__compilerVar164;
unset($__compilerVar164);
$__compilerVar87 .= '

';
$__output .= $this->callTemplateHook('body', $__compilerVar87, array());
unset($__compilerVar87);
$__output .= '
<script type="text/javascript" src="/arrowchat/external.php?type=djs" charset="utf-8"></script>
<script type="text/javascript" src="/arrowchat/external.php?type=js" charset="utf-8"></script>
';
$__compilerVar166 = '';
$__compilerVar166 .= '

';
if ($visitor['show_notification_popup'])
{
$__compilerVar166 .= '
	';
$this->addRequiredExternal('css', 'gfnnotify');
$__compilerVar166 .= '
	';
$this->addRequiredExternal('js', 'js/gfnnotify/notification.js');
$__compilerVar166 .= '
	
	<div id="GFNNotification" data-url="' . XenForo_Template_Helper_Core::link('gfnnotify/get-notifications', false, array()) . '" data-timer="' . XenForo_Template_Helper_Core::styleProperty('notificationOpenTimer') . '" data-interval="' . XenForo_Template_Helper_Core::styleProperty('notificationInterval') . '" data-mark-read="' . XenForo_Template_Helper_Core::link('gfnnotify/mark-read', false, array()) . '"></div>
';
}
$__output .= $__compilerVar166;
unset($__compilerVar166);
$__output .= '
</body>
</html>';
