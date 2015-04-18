<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<!DOCTYPE html>';
$isResponsive = ((XenForo_Template_Helper_Core::styleProperty('enableResponsive') AND !$noResponsive) ? ('1') : ('0'));
$__output .= '
<html id="XenForo" lang="' . htmlspecialchars($visitorLanguage['language_code'], ENT_QUOTES, 'UTF-8') . '" dir="' . htmlspecialchars($visitorLanguage['text_direction'], ENT_QUOTES, 'UTF-8') . '" class="Public ' . (($visitor['user_id']) ? ('LoggedIn') : ('LoggedOut')) . ' ' . (($sidebar) ? ('Sidebar') : ('NoSidebar')) . ' ' . (($hasAutoDeferred) ? ('RunDeferred') : ('')) . ' ' . (($isResponsive) ? ('Responsive') : ('NoResponsive')) . '" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta name="google-site-verification" content="E3l3CoOz8EnSzBJ3XOfVZCCp6q8EqcZVmZrOBhwMkxg" />
 <script type="text/javascript"> document.write(\'<style type="text/css">body{padding-bottom:20px}</style>\'); var no=100;var hidesnowtime=0;var snowdistance=\'pageheight\';var ie4up=(document.all)?1:0;var ns6up=(document.getElementById&&!document.all)?1:0;function iecompattest(){return(document.compatMode&&document.compatMode!=\'BackCompat\')?document.documentElement:document.body}var dx,xp,yp;var am,stx,sty;var i,doc_width=800,doc_height=600;if(ns6up){doc_width=self.innerWidth;doc_height=self.innerHeight}else if(ie4up){doc_width=iecompattest().clientWidth;doc_height=iecompattest().clientHeight}dx=new Array();xp=new Array();yp=new Array();am=new Array();stx=new Array();sty=new Array();for(i=0;i<no;++i){dx[i]=0;xp[i]=Math.random()*(doc_width-50);yp[i]=Math.random()*doc_height;am[i]=Math.random()*20;stx[i]=0.02+Math.random()/10; sty[i]=0.7+Math.random();if(ie4up||ns6up){document.write(\'<div id="dot\'+i+\'" style="POSITION:absolute;Z-INDEX:\'+i+\';VISIBILITY:visible;TOP:15px;LEFT:15px;"><span style="font-size:18px;color:#fff">*</span><\\/div>\')}}function snowIE_NS6(){doc_width=ns6up?window.innerWidth-10:iecompattest().clientWidth-10;doc_height=(window.innerHeight&&snowdistance==\'windowheight\')?window.innerHeight:(ie4up&&snowdistance==\'windowheight\')?iecompattest().clientHeight:(ie4up&&!window.opera&&snowdistance==\'pageheight\')?iecompattest().scrollHeight:iecompattest().offsetHeight;for(i=0;i<no;++i){yp[i]+=sty[i];if(yp[i]>doc_height-50){xp[i]=Math.random()*(doc_width-am[i]-30);yp[i]=0;stx[i]=0.02+Math.random()/10;sty[i]=0.7+Math.random()}dx[i]+=stx[i];document.getElementById(\'dot\'+i).style.top=yp[i]+\'px\';document.getElementById(\'dot\'+i).style.left=xp[i]+am[i]*Math.sin(dx[i])+\'px\'}snowtimer=setTimeout(\'snowIE_NS6()\',10)}function hidesnow(){if(window.snowtimer){clearTimeout(snowtimer)}for(i=0;i<no;i++)document.getElementById(\'dot\'+i).style.visibility=\'hidden\'}if(ie4up||ns6up){snowIE_NS6();if(hidesnowtime>0)setTimeout(\'hidesnow()\',hidesnowtime*1000)} </script>
<style>
#BRCopyright{display:none;}
#arrowchat_base{width:100% !important;}
</style>
';
$__compilerVar1 = '';
$__compilerVar1 .= '
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
	';
if ($isResponsive)
{
$__compilerVar1 .= '
		<meta name="viewport" content="width=device-width, initial-scale=1">
	';
}
$__compilerVar1 .= '
	';
if ($requestPaths['fullBasePath'])
{
$__compilerVar1 .= '
		<base href="' . htmlspecialchars($requestPaths['fullBasePath'], ENT_QUOTES, 'UTF-8') . '" />
		<script>
			var _b = document.getElementsByTagName(\'base\')[0], _bH = "' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($requestPaths['fullBasePath'], ENT_QUOTES, 'UTF-8'), 'double') . '";
			if (_b && _b.href != _bH) _b.href = _bH;
		</script>
	';
}
$__compilerVar1 .= '

	<title>';
if ($title)
{
$__compilerVar1 .= $title . ' | ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8');
}
else
{
$__compilerVar1 .= htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar1 .= '</title>
	
	<noscript><style>.JsOnly { display: none !important; }</style></noscript>
	<link rel="stylesheet" href="css.php?css=xenforo,form,public&amp;style=' . urlencode($_styleId) . '&amp;dir=' . htmlspecialchars($visitorLanguage['text_direction'], ENT_QUOTES, 'UTF-8') . '&amp;d=' . htmlspecialchars($visitorStyle['last_modified_date'], ENT_QUOTES, 'UTF-8') . '" />
	<!--XenForo_Require:CSS-->	
	' . XenForo_Template_Helper_Core::callHelper('ignoredCss', array(
'0' => $visitor['ignoredUsers']
)) . '

	';
$__compilerVar2 = '';
$__compilerVar2 .= '	<script src="' . htmlspecialchars($jQuerySource, ENT_QUOTES, 'UTF-8') . '"></script>	
	';
if ($jQuerySource != $jQuerySourceLocal)
{
$__compilerVar2 .= '
		<script>if (!window.jQuery) { document.write(\'<scr\'+\'ipt type="text/javascript" src="' . htmlspecialchars($jQuerySourceLocal, ENT_QUOTES, 'UTF-8') . '"><\\/scr\'+\'ipt>\'); }</script>
	';
}
if ($xenOptions['uncompressedJs'] == 1 OR $xenOptions['uncompressedJs'] == 3)
{
$__compilerVar2 .= '
	<script src="' . htmlspecialchars($javaScriptSource, ENT_QUOTES, 'UTF-8') . '/jquery/jquery.xenforo.rollup.js?_v=' . htmlspecialchars($xenOptions['jsVersion'], ENT_QUOTES, 'UTF-8') . '"></script>';
}
$__compilerVar2 .= '	
	<script src="' . XenForo_Template_Helper_Core::callHelper('javaScriptUrl', array(
'0' => $javaScriptSource . '/xenforo/xenforo.js?_v=' . $xenOptions['jsVersion']
)) . '"></script>
';
if ($forum['node_id'] > 0)
{
$__compilerVar2 .= '<script>XenForo.node_name=\'' . XenForo_Template_Helper_Core::jsEscape($forum['title'], 'double') . ' (' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . ')\';</script>';
}
$__compilerVar2 .= '
<!--XenForo_Require:JS-->';
$__compilerVar1 .= $__compilerVar2;
unset($__compilerVar2);
$__compilerVar1 .= '
';
if ($xenOptions['dpBetterAnalyticsJs'] == ('file'))
{
$__compilerVar1 .= '<script src="misc/a.js?_v=' . htmlspecialchars($xenOptions['jsVersion'], ENT_QUOTES, 'UTF-8') . '"></script>';
}
else if ($xenOptions['dpBetterAnalyticsJs'] == ('inline'))
{
$__compilerVar1 .= '<script>
';
$__compilerVar3 = '';
$__compilerVar3 .= '$(document).ready(function(){
(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');ga("create","' . htmlspecialchars($xenOptions['googleAnalyticsWebPropertyId'], ENT_QUOTES, 'UTF-8') . '","auto");ga("require","displayfeatures");ga(\'set\',\'forceSSL\',true);
if(XenForo.visitor.user_id>0){ga(\'set\',\'&uid\',XenForo.visitor.user_id);';
if ($xenOptions['dpBetterAnalyticsDimensionIndexUser'])
{
$__compilerVar3 .= 'ga(\'set\',\'dimension' . htmlspecialchars($xenOptions['dpBetterAnalyticsDimensionIndexUser'], ENT_QUOTES, 'UTF-8') . '\',XenForo.visitor.user_id);';
}
$__compilerVar3 .= '}
';
if ($xenOptions['dpBetterAnalyticsDimentionIndex'])
{
$__compilerVar3 .= 'if (typeof XenForo.node_name!=\'undefined\') {ga(\'set\',\'dimension' . htmlspecialchars($xenOptions['dpBetterAnalyticsDimentionIndex'], ENT_QUOTES, 'UTF-8') . '\',XenForo.node_name);}';
}
$__compilerVar3 .= '
if("/account/upgrades"==document.location.pathname.substr(-17)){ga("require","ec");var position=1;$("form.upgradeForm").each(function(){ $(this).find(\'input[type="submit"]\').on("click",function(){var name=$(this).closest("form").find(\'input[name="item_name"]\').val().match(/^.*?: (.*) \\(/)[1];ga("ec:addProduct",{id:"UU-"+$(this).closest("form").find(\'input[name="custom"]\').val().match(/^.*?,(.*?),/)[1],name:name,category:"User Upgrades"});ga("ec:setAction","checkout");ga("send","event","Checkout","Click",name)});
ga("ec:addImpression",{id:"UU-"+$(this).find(\'input[name="custom"]\').val().match(/^.*?,(.*?),/)[1],name:$(this).find(\'input[name="item_name"]\').val().match(/^.*?: (.*) \\(/)[1],category:"User Upgrades",list:"User Upgrade List",position:position++})})};
if (document.referrer.match(/paypal\\.com.*?cgi-bin\\/webscr|facebook\\.com.*?dialog\\/oauth|twitter\\.com\\/oauth|google\\.com.*?\\/oauth2/) != null){ga(\'set\',\'referrer\',\'\');}
ga("send","pageview");
';
if ($xenOptions['dpAnalyticsEvents']['user_engagement'])
{
$__compilerVar3 .= 'setTimeout("ga(\'send\',\'event\',\'User\',\'Engagement\',\'Time on page more than 15 seconds\')",15000);';
}
$__compilerVar3 .= '
';
if ($xenOptions['dpAnalyticsEvents']['ajax_requests'] && $xenOptions['dpAnalyticsInternal']['v'])
{
$__compilerVar3 .= '$(document).ajaxComplete(function(a,b,u){var p=document.createElement(\'a\');p.href=u.url;ga(\'send\',\'event\',\'AJAX Request\',\'Trigger\',p.pathname);});';
}
$__compilerVar3 .= '
';
if ($xenOptions['dpAnalyticsEvents']['links'] && $xenOptions['dpAnalyticsInternal']['v'])
{
$__compilerVar3 .= '$(\'.externalLink\').on(\'click\',function(){ga(\'send\', \'event\',\'Link\',\'Click\', $(this).prop(\'href\'))});';
}
$__compilerVar3 .= '
';
if ($xenOptions['dpAnalyticsEvents']['js_error'] && $xenOptions['dpAnalyticsInternal']['v'])
{
$__compilerVar3 .= '"object"==typeof window.onerror&&(window.onerror=function(a,b,c){ga("send","event","Error","JavaScript",c+": "+a+" ("+window.location.origin+window.location.pathname+" | "+b+")")});';
}
$__compilerVar3 .= '
';
if ($xenOptions['dpAnalyticsEvents']['ajax_error'] && $xenOptions['dpAnalyticsInternal']['v'])
{
$__compilerVar3 .= '$(document).ajaxError(function(b,c,a){ga("send","event","Error","AJAX",window.location.origin+window.location.pathname+" | "+a.url)});';
}
$__compilerVar3 .= '
setTimeout(function(){try{FB.Event.subscribe("edge.create",function(a){ga("send","social","Facebook","Like",a)}),FB.Event.subscribe("edge.remove",function(a){ga("send","social","Facebook","Unlike",a)}),twttr.ready(function(a){a.events.bind("tweet",function(b){if(b){var a;b.target&&"IFRAME"==b.target.nodeName&&(a=ePFU(b.target.src,"url"));ga("send","social","Twitter","Tweet",a)}});a.events.bind("follow",function(b){if(b){var a;b.target&&"IFRAME"==b.target.nodeName&&(a=
ePFU(b.target.src,"url"));ga("send","social","Twitter","Follow",a)}})})}catch(c){}},1E3);
});
function ePFU(c,a){if(c){c=c.split("#")[0];var b=c.split("?");if(1!=b.length){b=decodeURI(b[1]);a+="=";for(var b=b.split("&"),e=0,d;d=b[e];++e)if(0===d.indexOf(a))return unescape(d.split("=")[1])}}}';
$__compilerVar1 .= $__compilerVar3;
unset($__compilerVar3);
$__compilerVar1 .= '
</script>';
}
$__compilerVar1 .= '
	
	<link rel="apple-touch-icon" href="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
)) . '" />
	<link rel="alternate" type="application/rss+xml" title="' . 'RSS feed for ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '' . '" href="' . XenForo_Template_Helper_Core::link('forums/-/index.rss', false, array()) . '" />
	';
if ($pageDescription['content'] AND !$pageDescription['skipmeta'] AND !$head['description'])
{
$__compilerVar1 .= '<meta name="description" content="' . XenForo_Template_Helper_Core::string('wordTrim', array(
'0' => XenForo_Template_Helper_Core::callHelper('stripHtml', array(
'0' => $pageDescription['content']
)),
'1' => '200'
)) . '" />';
}
$__compilerVar1 .= '
	';
if ($head)
{
foreach ($head AS $headElement)
{
$__compilerVar1 .= $headElement;
}
}
$__compilerVar1 .= '
';
$__output .= $this->callTemplateHook('page_container_head', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '
<link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="/arrowchat/external.php?type=css" charset="utf-8" />
<script type="text/javascript" src="/arrowchat/includes/js/jquery.js"></script>
<script type="text/javascript" src="/arrowchat/includes/js/jquery-ui.js"></script>
</head>

<body' . (($bodyClasses) ? (' class="' . htmlspecialchars($bodyClasses, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>
';
$__compilerVar4 = '';
$__compilerVar4 .= '






';
if ($visitor['user_id'])
{
$__compilerVar4 .= '
';
$__compilerVar5 = '';
$this->addRequiredExternal('css', 'moderator_bar');
$__compilerVar5 .= '


<fieldset id="moderatorBar">
	<div class="pageWidth">
		<div class="pageContent">
		
		';
$__compilerVar6 = '';
$__compilerVar6 .= '
			';
if ($visitor['is_admin'])
{
$__compilerVar6 .= '			
				<a href="admin.php" class="acp adminLink"><span class="itemLabel">' . 'Admin' . '</span></a>
				
				';
if ($session['permissionTest'])
{
$__compilerVar6 .= '
					<a href="' . XenForo_Template_Helper_Core::link('misc/reset-permissions', false, array()) . '" class="permissionTest adminLink OverlayTrigger">
						<span class="itemLabel">' . 'Permissions from ' . htmlspecialchars($session['permissionTest']['username'], ENT_QUOTES, 'UTF-8') . '' . '</span>
					</a>
				';
}
$__compilerVar6 .= '
			';
}
$__compilerVar6 .= '
			
			
			
		
  
		
			
			
			';
if ($visitor['is_moderator'] AND $session['moderationCounts']['total'])
{
$__compilerVar6 .= '
				<a href="' . XenForo_Template_Helper_Core::link('moderation-queue', false, array()) . '" class="moderationQueue modLink">
					<span class="itemLabel">' . 'Moderation' . ':</span>
					<span class="itemCount ' . (($session['moderationCounts']['total']) ? ('alert') : ('')) . '">' . htmlspecialchars($session['moderationCounts']['total'], ENT_QUOTES, 'UTF-8') . '</span>
				</a>
			';
}
$__compilerVar6 .= '
			
			';
if ($visitor['is_moderator'] && !$xenOptions['reportIntoForumId'])
{
$__compilerVar6 .= '
				<a href="' . XenForo_Template_Helper_Core::link('reports', false, array()) . '" class="reportedItems modLink">
					<span class="itemLabel">' . 'Reports' . ':</span>
					<span class="itemCount ' . ((($session['reportCounts']['total'] AND $session['reportCounts']['lastUpdate'] > $session['reportLastRead']) OR $session['reportCounts']['assigned']) ? ('alert') : ('')) . '" title="' . (($session['reportCounts']['lastUpdate']) ? ('Last Report Update' . ': ' . XenForo_Template_Helper_Core::datetime($session['reportCounts']['lastUpdate'], '')) : ('')) . '">';
if ($session['reportCounts']['assigned'])
{
$__compilerVar6 .= htmlspecialchars($session['reportCounts']['assigned'], ENT_QUOTES, 'UTF-8') . ' / ' . htmlspecialchars($session['reportCounts']['total'], ENT_QUOTES, 'UTF-8');
}
else
{
$__compilerVar6 .= htmlspecialchars($session['reportCounts']['total'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar6 .= '</span>
				</a>
			';
}
$__compilerVar6 .= '
			
			
			
			
			
			';
if ($visitor['is_admin'] AND $session['canAdminUsers'] AND $session['userModerationCounts']['total'])
{
$__compilerVar6 .= '
				<a href="admin.php?users/moderated" class="userModerationQueue modLink">
					<span class="itemLabel">' . 'Users' . ':</span>
					<span class="itemCount ' . (($session['userModerationCounts']['total']) ? ('alert') : ('')) . '">' . htmlspecialchars($session['userModerationCounts']['total'], ENT_QUOTES, 'UTF-8') . '</span>
				</a>
			';
}
$__compilerVar6 .= '

			';
$__compilerVar7 = '';
$__compilerVar6 .= $this->callTemplateHook('moderator_bar', $__compilerVar7, array());
unset($__compilerVar7);
$__compilerVar6 .= '
		';
if (trim($__compilerVar6) !== '')
{
$__compilerVar5 .= '
		
		' . $__compilerVar6 . '
		
		';
}
unset($__compilerVar6);
$__compilerVar5 .= '
		
		
		<div class="headerLeft">
		
		
		             ';
if ($canSearch)
{
$__compilerVar8 = '';
$__compilerVar8 .= '


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
$__compilerVar5 .= $__compilerVar8;
unset($__compilerVar8);
}
$__compilerVar5 .= '

		</div>
		
		
		<div class="headerRight">





		
			';
if ($visitor['user_id'])
{
$__compilerVar5 .= '
			
			';
$__compilerVar9 = '';
$__compilerVar9 .= '

<ul class="visitorTabs">

	';
$__compilerVar10 = '';
$__compilerVar9 .= $this->callTemplateHook('navigation_visitor_tabs_start', $__compilerVar10, array());
unset($__compilerVar10);
$__compilerVar9 .= '

	<!-- account -->
	<li class="navTab account Popup PopupControl PopupClosed ' . (($tabs['account']['selected']) ? ('selected') : ('')) . '">

		';
$visitorHiddenUnread = ($visitor['alerts_unread'] + $visitor['conversations_unread']);
$__compilerVar9 .= '
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
'title' => 'View your profile'
),'')) . '
				
				<h3><a href="' . XenForo_Template_Helper_Core::link('members', $visitor, array()) . '" class="concealed" title="' . 'View your profile' . '">' . htmlspecialchars($visitor['username'], ENT_QUOTES, 'UTF-8') . '</a></h3>
				
				';
$__compilerVar11 = '';
$__compilerVar11 .= XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $visitor
));
if (trim($__compilerVar11) !== '')
{
$__compilerVar9 .= '<div class="muted">' . $__compilerVar11 . '</div>';
}
unset($__compilerVar11);
$__compilerVar9 .= '
				
				<ul class="links">
					<li class="fl"><a href="' . XenForo_Template_Helper_Core::link('members', $visitor, array()) . '">' . 'Your Profile Page' . '</a></li>
				</ul>
			</div>
			<div class="menuColumns secondaryContent">
				<ul class="col1 blockLinksList">
				';
$__compilerVar12 = '';
$__compilerVar12 .= '
					';
if ($canEditProfile)
{
$__compilerVar12 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Personal Details' . '</a></li>';
}
$__compilerVar12 .= '
					';
if ($canEditSignature)
{
$__compilerVar12 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/signature', false, array()) . '">' . 'Signature' . '</a></li>';
}
$__compilerVar12 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('account/contact-details', false, array()) . '">' . 'Contact Details' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/privacy', false, array()) . '">' . 'Privacy' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/preferences', false, array()) . '" class="OverlayTrigger">' . 'Preferences' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/alert-preferences', false, array()) . '">' . 'Alert Preferences' . '</a></li>
					';
if ($canUploadAvatar)
{
$__compilerVar12 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/avatar', false, array()) . '" class="OverlayTrigger" data-cacheOverlay="true">' . 'Avatar' . '</a></li>';
}
$__compilerVar12 .= '
					';
if ($xenOptions['facebookAppId'] OR $xenOptions['twitterAppKey'] OR $xenOptions['googleClientId'])
{
$__compilerVar12 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/external-accounts', false, array()) . '">' . 'External Accounts' . '</a></li>';
}
$__compilerVar12 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('account/security', false, array()) . '">' . 'Password' . '</a></li>
				';
$__compilerVar9 .= $this->callTemplateHook('navigation_visitor_tab_links1', $__compilerVar12, array());
unset($__compilerVar12);
$__compilerVar9 .= '
				</ul>
				<ul class="col2 blockLinksList">
				';
$__compilerVar13 = '';
$__compilerVar13 .= '
					';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar13 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Your News Feed' . '</a></li>';
}
$__compilerVar13 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Conversations' . '
						<strong class="itemCount ' . (($visitor['conversations_unread']) ? ('') : ('Zero')) . '"
							id="VisitorExtraMenu_ConversationsCounter">
							<span class="Total">' . XenForo_Template_Helper_Core::numberFormat($visitor['conversations_unread'], '0') . '</span>
						</strong></a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '">' . 'Alerts' . '
						<strong class="itemCount ' . (($visitor['alerts_unread']) ? ('') : ('Zero')) . '"
							id="VisitorExtraMenu_AlertsCounter">
							<span class="Total">' . XenForo_Template_Helper_Core::numberFormat($visitor['alerts_unread'], '0') . '</span>
						</strong></a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/likes', false, array()) . '">' . 'Likes You\'ve Received' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id']
)) . '">' . 'Your Content' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '">' . 'People You Follow' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/ignored', false, array()) . '">' . 'People You Ignore' . '</a></li>
					';
if ($xenCache['userUpgradeCount'])
{
$__compilerVar13 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/upgrades', false, array()) . '">' . 'Account Upgrades' . '</a></li>';
}
$__compilerVar13 .= '
';
if ($visitor['permissions']['linkCheckGroupID']['linkCheckID'])
{
$__compilerVar13 .= '
<a href="' . XenForo_Template_Helper_Core::link('linkcheck/', false, array()) . '">' . 'Link Check' . '</a>
';
}
$__compilerVar13 .= '
';
if ($visitor['permissions']['userAgentGroupID']['userAgentID'] AND $xenOptions['userAgentVisitorTabLink'])
{
$__compilerVar13 .= '
<a href="' . XenForo_Template_Helper_Core::link('useragent/', false, array()) . '">' . 'User Agent' . '</a>
';
}
$__compilerVar13 .= '
';
if ($xenOptions['viewMapVisitorTabLink'])
{
$__compilerVar13 .= '
<a href="' . XenForo_Template_Helper_Core::link('viewmap/', false, array()) . '">' . 'View Map' . '</a>
';
}
$__compilerVar13 .= '
				';
$__compilerVar9 .= $this->callTemplateHook('navigation_visitor_tab_links2', $__compilerVar13, array());
unset($__compilerVar13);
$__compilerVar9 .= '
				</ul>
			</div>
			<div class="menuColumns secondaryContent">
				<ul class="col1 blockLinksList">
					<li>				
						<form action="' . XenForo_Template_Helper_Core::link('account/toggle-visibility', false, array()) . '" method="post" class="AutoValidator visibilityForm">
							<label><input type="checkbox" name="visible" value="1" class="SubmitOnChange" ' . (($visitor['visible']) ? ' checked="checked"' : '') . ' />
								' . 'Show online status' . '</label>
							<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
						</form>
					</li>
				</ul>
				<ul class="col2 blockLinksList">
					<li><a href="' . XenForo_Template_Helper_Core::link('logout', '', array(
'_xfToken' => $visitor['csrf_token_page']
)) . '" class="LogOut">' . 'Log Out' . '</a></li>
				</ul>
			</div>
			';
if ($canUpdateStatus)
{
$__compilerVar9 .= '
				<form action="' . XenForo_Template_Helper_Core::link('members/post', $visitor, array()) . '" method="post" class="sectionFooter statusPoster AutoValidator" data-optInOut="OptIn">
					<textarea name="message" class="textCtrl StatusEditor UserTagger Elastic" placeholder="' . 'Update your status' . '..." rows="1" cols="40" style="height:18px" data-statusEditorCounter="#visMenuSEdCount" data-nofocus="true"></textarea>
					<div class="submitUnit">
						<span id="visMenuSEdCount" title="' . 'Characters remaining' . '"></span>
						<input type="submit" class="button primary MenuCloser" value="' . 'Post' . '" />
						<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
						<input type="hidden" name="return" value="1" /> 
					</div>
				</form>
			';
}
$__compilerVar9 .= '
		</div>		
	</li>
		
	';
if ($tabs['account']['selected'])
{
$__compilerVar9 .= '
	<li class="navTab selected">
		<div class="tabLinks">
			<ul class="secondaryContent blockLinksList">
			';
$__compilerVar14 = '';
$__compilerVar14 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Personal Details' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Conversations' . '</a></li>
				';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar14 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Your News Feed' . '</a></li>';
}
$__compilerVar14 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('account/likes', false, array()) . '">' . 'Likes You\'ve Received' . '</a></li>
			';
$__compilerVar9 .= $this->callTemplateHook('navigation_tabs_account', $__compilerVar14, array());
unset($__compilerVar14);
$__compilerVar9 .= '
			</ul>
		</div>
	</li>
	';
}
$__compilerVar9 .= '
	
	<!-- conversations popup -->
	<li class="navTab inbox Popup PopupControl PopupClosed ' . (($tabs['inbox']['selected']) ? ('selected') : ('')) . '">
					
		<a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '" rel="Menu" class="navLink NoPopupGadget">' . 'Inbox' . '
			<strong class="itemCount ' . (($visitor['conversations_unread']) ? ('') : ('Zero')) . '"
				id="ConversationsMenu_Counter" data-text="' . 'You have %d new unread conversation(s).' . '">
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
					<a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '" class="concealed">' . 'Conversations' . '</a>
				</h3>						
			</div>
			
			<div class="listPlaceholder"></div>
			
			<div class="sectionFooter">
				';
if ($canStartConversation)
{
$__compilerVar9 .= '<a href="' . XenForo_Template_Helper_Core::link('conversations/add', false, array()) . '" class="floatLink">' . 'Start a New Conversation' . '</a>';
}
$__compilerVar9 .= '
				<a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Show All' . '...</a>
			</div>
		</div>
	</li>
	
	';
if ($tabs['inbox']['selected'])
{
$__compilerVar9 .= '
	<li class="navTab selected">
		<div class="tabLinks">
			<ul class="secondaryContent blockLinksList">
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Conversations' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations/starred', false, array()) . '">' . 'Starred Conversations' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations/yours', false, array()) . '">' . 'Conversations You Started' . '</a></li>
			</ul>
		</div>
	</li>
	';
}
$__compilerVar9 .= '
	
	';
$__compilerVar15 = '';
$__compilerVar9 .= $this->callTemplateHook('navigation_visitor_tabs_middle', $__compilerVar15, array());
unset($__compilerVar15);
$__compilerVar9 .= '
	
	<!-- alerts popup -->
	<li class="navTab alerts Popup PopupControl PopupClosed">	
					
		<a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '" rel="Menu" class="navLink NoPopupGadget">' . 'Alerts' . '
			<strong class="itemCount ' . (($visitor['alerts_unread']) ? ('') : ('Zero')) . '"
				id="AlertsMenu_Counter" data-text="' . 'You have %d new alert(s).' . '">
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
					<a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '" class="concealed">' . 'Alerts' . '</a>
				</h3>
			</div>
			
			<div class="listPlaceholder"></div>
			
			<div class="sectionFooter">
				<a href="' . XenForo_Template_Helper_Core::link('account/alert-preferences', false, array()) . '" class="floatLink">' . 'Alert Preferences' . '</a>
				<a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '">' . 'Show All' . '...</a>
			</div>
		</div>
	</li>
	
	';
$__compilerVar16 = '';
$__compilerVar9 .= $this->callTemplateHook('navigation_visitor_tabs_end', $__compilerVar16, array());
unset($__compilerVar16);
$__compilerVar9 .= '
</ul>';
$__compilerVar5 .= $__compilerVar9;
unset($__compilerVar9);
$__compilerVar5 .= '
			
			';
}
else
{
$__compilerVar5 .= '
			

			<div id="loginBar">';
$this->addRequiredExternal('css', 'login_bar');
$__compilerVar5 .= '

	<span><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="concealed noOutline inner OverlayTrigger" data-overlayoptions="{&quot;fixed&quot;:false}">Đăng nhập</a></span>
	<span><a href="' . XenForo_Template_Helper_Core::link('register', false, array()) . '" class="concealed noOutline inner OverlayTrigger" data-overlayoptions="{&quot;fixed&quot;:false}">Đăng ký</a></span>
	
	
	
		
<!--';
$__compilerVar17 = '';
if ($xenOptions['facebookAppId'])
{
$this->addRequiredExternal('css', 'facebook');
$__compilerVar17 .= '<div align="center"><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin"><span>' . 'Log in with Facebook' . '</span></a></div>';
}
if (trim($__compilerVar17) !== '')
{
$__compilerVar5 .= $__compilerVar17;
}
unset($__compilerVar17);
$__compilerVar5 .= '-->
	
</div>
			
			
			';
}
$__compilerVar5 .= '
			


</div>
		
			
			<span class="helper"></span>
		</div>
	</div>
</fieldset>';
$__compilerVar4 .= $__compilerVar5;
unset($__compilerVar5);
$__compilerVar4 .= '
';
}
else if (!$visitor['user_id'] && !$hideLoginBar)
{
$__compilerVar4 .= '
';
$__compilerVar18 = '';
$this->addRequiredExternal('css', 'moderator_bar');
$__compilerVar18 .= '


<fieldset id="moderatorBar">
	<div class="pageWidth">
		<div class="pageContent">
		
		';
$__compilerVar19 = '';
$__compilerVar19 .= '
			';
if ($visitor['is_admin'])
{
$__compilerVar19 .= '			
				<a href="admin.php" class="acp adminLink"><span class="itemLabel">' . 'Admin' . '</span></a>
				
				';
if ($session['permissionTest'])
{
$__compilerVar19 .= '
					<a href="' . XenForo_Template_Helper_Core::link('misc/reset-permissions', false, array()) . '" class="permissionTest adminLink OverlayTrigger">
						<span class="itemLabel">' . 'Permissions from ' . htmlspecialchars($session['permissionTest']['username'], ENT_QUOTES, 'UTF-8') . '' . '</span>
					</a>
				';
}
$__compilerVar19 .= '
			';
}
$__compilerVar19 .= '
			
			
			
		
  
		
			
			
			';
if ($visitor['is_moderator'] AND $session['moderationCounts']['total'])
{
$__compilerVar19 .= '
				<a href="' . XenForo_Template_Helper_Core::link('moderation-queue', false, array()) . '" class="moderationQueue modLink">
					<span class="itemLabel">' . 'Moderation' . ':</span>
					<span class="itemCount ' . (($session['moderationCounts']['total']) ? ('alert') : ('')) . '">' . htmlspecialchars($session['moderationCounts']['total'], ENT_QUOTES, 'UTF-8') . '</span>
				</a>
			';
}
$__compilerVar19 .= '
			
			';
if ($visitor['is_moderator'] && !$xenOptions['reportIntoForumId'])
{
$__compilerVar19 .= '
				<a href="' . XenForo_Template_Helper_Core::link('reports', false, array()) . '" class="reportedItems modLink">
					<span class="itemLabel">' . 'Reports' . ':</span>
					<span class="itemCount ' . ((($session['reportCounts']['total'] AND $session['reportCounts']['lastUpdate'] > $session['reportLastRead']) OR $session['reportCounts']['assigned']) ? ('alert') : ('')) . '" title="' . (($session['reportCounts']['lastUpdate']) ? ('Last Report Update' . ': ' . XenForo_Template_Helper_Core::datetime($session['reportCounts']['lastUpdate'], '')) : ('')) . '">';
if ($session['reportCounts']['assigned'])
{
$__compilerVar19 .= htmlspecialchars($session['reportCounts']['assigned'], ENT_QUOTES, 'UTF-8') . ' / ' . htmlspecialchars($session['reportCounts']['total'], ENT_QUOTES, 'UTF-8');
}
else
{
$__compilerVar19 .= htmlspecialchars($session['reportCounts']['total'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar19 .= '</span>
				</a>
			';
}
$__compilerVar19 .= '
			
			
			
			
			
			';
if ($visitor['is_admin'] AND $session['canAdminUsers'] AND $session['userModerationCounts']['total'])
{
$__compilerVar19 .= '
				<a href="admin.php?users/moderated" class="userModerationQueue modLink">
					<span class="itemLabel">' . 'Users' . ':</span>
					<span class="itemCount ' . (($session['userModerationCounts']['total']) ? ('alert') : ('')) . '">' . htmlspecialchars($session['userModerationCounts']['total'], ENT_QUOTES, 'UTF-8') . '</span>
				</a>
			';
}
$__compilerVar19 .= '

			';
$__compilerVar20 = '';
$__compilerVar19 .= $this->callTemplateHook('moderator_bar', $__compilerVar20, array());
unset($__compilerVar20);
$__compilerVar19 .= '
		';
if (trim($__compilerVar19) !== '')
{
$__compilerVar18 .= '
		
		' . $__compilerVar19 . '
		
		';
}
unset($__compilerVar19);
$__compilerVar18 .= '
		
		
		<div class="headerLeft">
		
		
		             ';
if ($canSearch)
{
$__compilerVar21 = '';
$__compilerVar21 .= '


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
$__compilerVar18 .= $__compilerVar21;
unset($__compilerVar21);
}
$__compilerVar18 .= '

		</div>
		
		
		<div class="headerRight">





		
			';
if ($visitor['user_id'])
{
$__compilerVar18 .= '
			
			';
$__compilerVar22 = '';
$__compilerVar22 .= '

<ul class="visitorTabs">

	';
$__compilerVar23 = '';
$__compilerVar22 .= $this->callTemplateHook('navigation_visitor_tabs_start', $__compilerVar23, array());
unset($__compilerVar23);
$__compilerVar22 .= '

	<!-- account -->
	<li class="navTab account Popup PopupControl PopupClosed ' . (($tabs['account']['selected']) ? ('selected') : ('')) . '">

		';
$visitorHiddenUnread = ($visitor['alerts_unread'] + $visitor['conversations_unread']);
$__compilerVar22 .= '
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
'title' => 'View your profile'
),'')) . '
				
				<h3><a href="' . XenForo_Template_Helper_Core::link('members', $visitor, array()) . '" class="concealed" title="' . 'View your profile' . '">' . htmlspecialchars($visitor['username'], ENT_QUOTES, 'UTF-8') . '</a></h3>
				
				';
$__compilerVar24 = '';
$__compilerVar24 .= XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $visitor
));
if (trim($__compilerVar24) !== '')
{
$__compilerVar22 .= '<div class="muted">' . $__compilerVar24 . '</div>';
}
unset($__compilerVar24);
$__compilerVar22 .= '
				
				<ul class="links">
					<li class="fl"><a href="' . XenForo_Template_Helper_Core::link('members', $visitor, array()) . '">' . 'Your Profile Page' . '</a></li>
				</ul>
			</div>
			<div class="menuColumns secondaryContent">
				<ul class="col1 blockLinksList">
				';
$__compilerVar25 = '';
$__compilerVar25 .= '
					';
if ($canEditProfile)
{
$__compilerVar25 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Personal Details' . '</a></li>';
}
$__compilerVar25 .= '
					';
if ($canEditSignature)
{
$__compilerVar25 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/signature', false, array()) . '">' . 'Signature' . '</a></li>';
}
$__compilerVar25 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('account/contact-details', false, array()) . '">' . 'Contact Details' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/privacy', false, array()) . '">' . 'Privacy' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/preferences', false, array()) . '" class="OverlayTrigger">' . 'Preferences' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/alert-preferences', false, array()) . '">' . 'Alert Preferences' . '</a></li>
					';
if ($canUploadAvatar)
{
$__compilerVar25 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/avatar', false, array()) . '" class="OverlayTrigger" data-cacheOverlay="true">' . 'Avatar' . '</a></li>';
}
$__compilerVar25 .= '
					';
if ($xenOptions['facebookAppId'] OR $xenOptions['twitterAppKey'] OR $xenOptions['googleClientId'])
{
$__compilerVar25 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/external-accounts', false, array()) . '">' . 'External Accounts' . '</a></li>';
}
$__compilerVar25 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('account/security', false, array()) . '">' . 'Password' . '</a></li>
				';
$__compilerVar22 .= $this->callTemplateHook('navigation_visitor_tab_links1', $__compilerVar25, array());
unset($__compilerVar25);
$__compilerVar22 .= '
				</ul>
				<ul class="col2 blockLinksList">
				';
$__compilerVar26 = '';
$__compilerVar26 .= '
					';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar26 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Your News Feed' . '</a></li>';
}
$__compilerVar26 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Conversations' . '
						<strong class="itemCount ' . (($visitor['conversations_unread']) ? ('') : ('Zero')) . '"
							id="VisitorExtraMenu_ConversationsCounter">
							<span class="Total">' . XenForo_Template_Helper_Core::numberFormat($visitor['conversations_unread'], '0') . '</span>
						</strong></a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '">' . 'Alerts' . '
						<strong class="itemCount ' . (($visitor['alerts_unread']) ? ('') : ('Zero')) . '"
							id="VisitorExtraMenu_AlertsCounter">
							<span class="Total">' . XenForo_Template_Helper_Core::numberFormat($visitor['alerts_unread'], '0') . '</span>
						</strong></a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/likes', false, array()) . '">' . 'Likes You\'ve Received' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id']
)) . '">' . 'Your Content' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '">' . 'People You Follow' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('account/ignored', false, array()) . '">' . 'People You Ignore' . '</a></li>
					';
if ($xenCache['userUpgradeCount'])
{
$__compilerVar26 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/upgrades', false, array()) . '">' . 'Account Upgrades' . '</a></li>';
}
$__compilerVar26 .= '
';
if ($visitor['permissions']['linkCheckGroupID']['linkCheckID'])
{
$__compilerVar26 .= '
<a href="' . XenForo_Template_Helper_Core::link('linkcheck/', false, array()) . '">' . 'Link Check' . '</a>
';
}
$__compilerVar26 .= '
';
if ($visitor['permissions']['userAgentGroupID']['userAgentID'] AND $xenOptions['userAgentVisitorTabLink'])
{
$__compilerVar26 .= '
<a href="' . XenForo_Template_Helper_Core::link('useragent/', false, array()) . '">' . 'User Agent' . '</a>
';
}
$__compilerVar26 .= '
';
if ($xenOptions['viewMapVisitorTabLink'])
{
$__compilerVar26 .= '
<a href="' . XenForo_Template_Helper_Core::link('viewmap/', false, array()) . '">' . 'View Map' . '</a>
';
}
$__compilerVar26 .= '
				';
$__compilerVar22 .= $this->callTemplateHook('navigation_visitor_tab_links2', $__compilerVar26, array());
unset($__compilerVar26);
$__compilerVar22 .= '
				</ul>
			</div>
			<div class="menuColumns secondaryContent">
				<ul class="col1 blockLinksList">
					<li>				
						<form action="' . XenForo_Template_Helper_Core::link('account/toggle-visibility', false, array()) . '" method="post" class="AutoValidator visibilityForm">
							<label><input type="checkbox" name="visible" value="1" class="SubmitOnChange" ' . (($visitor['visible']) ? ' checked="checked"' : '') . ' />
								' . 'Show online status' . '</label>
							<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
						</form>
					</li>
				</ul>
				<ul class="col2 blockLinksList">
					<li><a href="' . XenForo_Template_Helper_Core::link('logout', '', array(
'_xfToken' => $visitor['csrf_token_page']
)) . '" class="LogOut">' . 'Log Out' . '</a></li>
				</ul>
			</div>
			';
if ($canUpdateStatus)
{
$__compilerVar22 .= '
				<form action="' . XenForo_Template_Helper_Core::link('members/post', $visitor, array()) . '" method="post" class="sectionFooter statusPoster AutoValidator" data-optInOut="OptIn">
					<textarea name="message" class="textCtrl StatusEditor UserTagger Elastic" placeholder="' . 'Update your status' . '..." rows="1" cols="40" style="height:18px" data-statusEditorCounter="#visMenuSEdCount" data-nofocus="true"></textarea>
					<div class="submitUnit">
						<span id="visMenuSEdCount" title="' . 'Characters remaining' . '"></span>
						<input type="submit" class="button primary MenuCloser" value="' . 'Post' . '" />
						<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
						<input type="hidden" name="return" value="1" /> 
					</div>
				</form>
			';
}
$__compilerVar22 .= '
		</div>		
	</li>
		
	';
if ($tabs['account']['selected'])
{
$__compilerVar22 .= '
	<li class="navTab selected">
		<div class="tabLinks">
			<ul class="secondaryContent blockLinksList">
			';
$__compilerVar27 = '';
$__compilerVar27 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Personal Details' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Conversations' . '</a></li>
				';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar27 .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Your News Feed' . '</a></li>';
}
$__compilerVar27 .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('account/likes', false, array()) . '">' . 'Likes You\'ve Received' . '</a></li>
			';
$__compilerVar22 .= $this->callTemplateHook('navigation_tabs_account', $__compilerVar27, array());
unset($__compilerVar27);
$__compilerVar22 .= '
			</ul>
		</div>
	</li>
	';
}
$__compilerVar22 .= '
	
	<!-- conversations popup -->
	<li class="navTab inbox Popup PopupControl PopupClosed ' . (($tabs['inbox']['selected']) ? ('selected') : ('')) . '">
					
		<a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '" rel="Menu" class="navLink NoPopupGadget">' . 'Inbox' . '
			<strong class="itemCount ' . (($visitor['conversations_unread']) ? ('') : ('Zero')) . '"
				id="ConversationsMenu_Counter" data-text="' . 'You have %d new unread conversation(s).' . '">
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
					<a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '" class="concealed">' . 'Conversations' . '</a>
				</h3>						
			</div>
			
			<div class="listPlaceholder"></div>
			
			<div class="sectionFooter">
				';
if ($canStartConversation)
{
$__compilerVar22 .= '<a href="' . XenForo_Template_Helper_Core::link('conversations/add', false, array()) . '" class="floatLink">' . 'Start a New Conversation' . '</a>';
}
$__compilerVar22 .= '
				<a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Show All' . '...</a>
			</div>
		</div>
	</li>
	
	';
if ($tabs['inbox']['selected'])
{
$__compilerVar22 .= '
	<li class="navTab selected">
		<div class="tabLinks">
			<ul class="secondaryContent blockLinksList">
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Conversations' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations/starred', false, array()) . '">' . 'Starred Conversations' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('conversations/yours', false, array()) . '">' . 'Conversations You Started' . '</a></li>
			</ul>
		</div>
	</li>
	';
}
$__compilerVar22 .= '
	
	';
$__compilerVar28 = '';
$__compilerVar22 .= $this->callTemplateHook('navigation_visitor_tabs_middle', $__compilerVar28, array());
unset($__compilerVar28);
$__compilerVar22 .= '
	
	<!-- alerts popup -->
	<li class="navTab alerts Popup PopupControl PopupClosed">	
					
		<a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '" rel="Menu" class="navLink NoPopupGadget">' . 'Alerts' . '
			<strong class="itemCount ' . (($visitor['alerts_unread']) ? ('') : ('Zero')) . '"
				id="AlertsMenu_Counter" data-text="' . 'You have %d new alert(s).' . '">
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
					<a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '" class="concealed">' . 'Alerts' . '</a>
				</h3>
			</div>
			
			<div class="listPlaceholder"></div>
			
			<div class="sectionFooter">
				<a href="' . XenForo_Template_Helper_Core::link('account/alert-preferences', false, array()) . '" class="floatLink">' . 'Alert Preferences' . '</a>
				<a href="' . XenForo_Template_Helper_Core::link('account/alerts', false, array()) . '">' . 'Show All' . '...</a>
			</div>
		</div>
	</li>
	
	';
$__compilerVar29 = '';
$__compilerVar22 .= $this->callTemplateHook('navigation_visitor_tabs_end', $__compilerVar29, array());
unset($__compilerVar29);
$__compilerVar22 .= '
</ul>';
$__compilerVar18 .= $__compilerVar22;
unset($__compilerVar22);
$__compilerVar18 .= '
			
			';
}
else
{
$__compilerVar18 .= '
			

			<div id="loginBar">';
$this->addRequiredExternal('css', 'login_bar');
$__compilerVar18 .= '

	<span><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="concealed noOutline inner OverlayTrigger" data-overlayoptions="{&quot;fixed&quot;:false}">Đăng nhập</a></span>
	<span><a href="' . XenForo_Template_Helper_Core::link('register', false, array()) . '" class="concealed noOutline inner OverlayTrigger" data-overlayoptions="{&quot;fixed&quot;:false}">Đăng ký</a></span>
	
	
	
		
<!--';
$__compilerVar30 = '';
if ($xenOptions['facebookAppId'])
{
$this->addRequiredExternal('css', 'facebook');
$__compilerVar30 .= '<div align="center"><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin"><span>' . 'Log in with Facebook' . '</span></a></div>';
}
if (trim($__compilerVar30) !== '')
{
$__compilerVar18 .= $__compilerVar30;
}
unset($__compilerVar30);
$__compilerVar18 .= '-->
	
</div>
			
			
			';
}
$__compilerVar18 .= '
			


</div>
		
			
			<span class="helper"></span>
		</div>
	</div>
</fieldset>';
$__compilerVar4 .= $__compilerVar18;
unset($__compilerVar18);
$__compilerVar4 .= '
';
}
$__compilerVar4 .= '


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
$__compilerVar4 .= '<div class="pageContentNone">';
}
else
{
$__compilerVar4 .= '<div class="pageContent">';
}
$__compilerVar4 .= '
		
			<!-- main content area -->
			
			';
$__compilerVar31 = '';
$__compilerVar4 .= $this->callTemplateCallback('DigitalPointSocialBar_Callback_SocialBar', 'renderSocialBar', $__compilerVar31, array());
unset($__compilerVar31);
$__compilerVar4 .= '
';
$__compilerVar32 = '';
$__compilerVar4 .= $this->callTemplateHook('page_container_content_top', $__compilerVar32, array());
unset($__compilerVar32);
$__compilerVar4 .= '
			
			';
if ($sidebar)
{
$__compilerVar4 .= '
				<div class="mainContainer">
					<div class="mainContent">';
}
$__compilerVar4 .= '
						
						<!-- <a href="http://vnnet.org/"><img src="http://vxf.vn/styles/banner/xenforo_hosting.png" alt="XenForo Hosting" width="100%" border="0"></a> -->
						
						';
$__compilerVar33 = '';
$__compilerVar34 = '';
$__compilerVar33 .= $this->callTemplateHook('ad_above_top_breadcrumb', $__compilerVar34, array());
unset($__compilerVar34);
$__compilerVar4 .= $__compilerVar33;
unset($__compilerVar33);
$__compilerVar4 .= '
						
						';
$__compilerVar35 = '';
$__compilerVar35 .= '
						<div class="breadBoxTop ' . (($topctrl) ? ('withTopCtrl') : ('')) . '">
							';
if ($topctrl)
{
$__compilerVar35 .= '<div class="topCtrl">' . $topctrl . '</div>';
}
$__compilerVar35 .= '
							';
$__compilerVar36 = '';
$__compilerVar36 .= '1';
$__compilerVar37 = '';
$__compilerVar37 .= '

<nav>
	';
if (!$quickNavSelected AND $navigation)
{
$__compilerVar37 .= '
		';
foreach ($navigation AS $breadcrumb)
{
$__compilerVar37 .= '
			';
if ($breadcrumb['node_id'])
{
$__compilerVar37 .= '
				';
$quickNavSelected = '';
$quickNavSelected .= 'node-' . htmlspecialchars($breadcrumb['node_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar37 .= '
			';
}
$__compilerVar37 .= '
		';
}
$__compilerVar37 .= '
	';
}
$__compilerVar37 .= '

	<fieldset class="breadcrumb">
		<a href="' . XenForo_Template_Helper_Core::link('misc/quick-navigation-menu', '', array(
'selected' => $quickNavSelected
)) . '" class="OverlayTrigger jumpMenuTrigger" data-cacheOverlay="true" title="' . 'Open quick navigation' . '"><!--' . 'Jump to' . '...--></a>
			
		<div class="boardTitle"><strong>' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '</strong></div>
		
		<span class="crumbs">
			';
if ($showHomeLink)
{
$__compilerVar37 .= '
				<span class="crust homeCrumb"' . (($__compilerVar36) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
					<a href="' . htmlspecialchars($homeLink, ENT_QUOTES, 'UTF-8') . '" class="crumb"' . (($__compilerVar36) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($__compilerVar36) ? (' itemprop="title"') : ('')) . '>' . 'Home' . '</span></a>
					<span class="arrow"><span></span></span>
				</span>
			';
}
else if ($selectedTabId != $homeTabId)
{
$__compilerVar37 .= '
				<span class="crust homeCrumb"' . (($__compilerVar36) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
					<a href="' . htmlspecialchars($homeTab['href'], ENT_QUOTES, 'UTF-8') . '" class="crumb"' . (($__compilerVar36) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($__compilerVar36) ? (' itemprop="title"') : ('')) . '>' . htmlspecialchars($homeTab['title'], ENT_QUOTES, 'UTF-8') . '</span></a>
					<span class="arrow"><span></span></span>
				</span>
			';
}
$__compilerVar37 .= '
			
			';
if ($selectedTab)
{
$__compilerVar37 .= '
				<span class="crust selectedTabCrumb"' . (($__compilerVar36) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
					<a href="' . htmlspecialchars($selectedTab['href'], ENT_QUOTES, 'UTF-8') . '" class="crumb"' . (($__compilerVar36) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($__compilerVar36) ? (' itemprop="title"') : ('')) . '>' . htmlspecialchars($selectedTab['title'], ENT_QUOTES, 'UTF-8') . '</span></a>
					<span class="arrow"><span>&gt;</span></span>
				</span>
			';
}
$__compilerVar37 .= '
			
			';
if ($navigation)
{
$__compilerVar37 .= '
				';
$i = 0;
$count = count($navigation);
foreach ($navigation AS $breadcrumb)
{
$i++;
$__compilerVar37 .= '
					<span class="crust"' . (($__compilerVar36) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
						<a href="' . $breadcrumb['href'] . '" class="crumb"' . (($__compilerVar36) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($__compilerVar36) ? (' itemprop="title"') : ('')) . '>' . $breadcrumb['value'] . '</span></a>
						<span class="arrow"><span>&gt;</span></span>
					</span>
				';
}
$__compilerVar37 .= '
			';
}
$__compilerVar37 .= '
		</span>
	</fieldset>
</nav>';
$__compilerVar35 .= $__compilerVar37;
unset($__compilerVar36, $__compilerVar37);
$__compilerVar35 .= '
						</div>
						';
$__compilerVar4 .= $this->callTemplateHook('page_container_breadcrumb_top', $__compilerVar35, array());
unset($__compilerVar35);
$__compilerVar4 .= '
						
						';
$__compilerVar38 = '';
$__compilerVar39 = '';
$__compilerVar38 .= $this->callTemplateHook('ad_below_top_breadcrumb', $__compilerVar39, array());
unset($__compilerVar39);
$__compilerVar4 .= $__compilerVar38;
unset($__compilerVar38);
$__compilerVar4 .= '
					
						<!--[if lt IE 8]>
							<p class="importantMessage">' . 'You are using an out of date browser. It  may not display this or other websites correctly.<br />You should upgrade or use an <a href="https://www.google.com/chrome/browser/" target="_blank">alternative browser</a>.' . '</p>
						<![endif]-->

						';
$__compilerVar40 = '';
$__compilerVar40 .= '
						';
$__compilerVar41 = '';
if ($notices)
{
$__compilerVar41 .= '

';
$this->addRequiredExternal('css', 'panel_scroller');
$__compilerVar41 .= '
' . '

<div class="' . ((XenForo_Template_Helper_Core::styleProperty('scrollableNotices')) ? ('PanelScroller') : ('PanelScrollerOff')) . '" id="Notices" data-vertical="' . XenForo_Template_Helper_Core::styleProperty('noticeVertical') . '" data-speed="' . XenForo_Template_Helper_Core::styleProperty('noticeSpeed') . '" data-interval="' . XenForo_Template_Helper_Core::styleProperty('noticeInterval') . '">
	<div class="scrollContainer">
		<div class="PanelContainer">
			<ol class="Panels">
				';
foreach ($notices AS $noticeId => $notice)
{
$__compilerVar41 .= '
					';
$__compilerVar42 = '';
$__compilerVar42 .= $notice['message'];
$__compilerVar43 = '';
$__compilerVar43 .= '<li class="panel Notice DismissParent notice_' . htmlspecialchars($noticeId, ENT_QUOTES, 'UTF-8') . '">
	<div class="' . (($notice['wrap']) ? ('baseHtml noticeContent') : ('')) . '">' . $__compilerVar42 . '</div>
	
	';
if ($notice['dismissible'])
{
$__compilerVar43 .= '
		<a href="' . XenForo_Template_Helper_Core::link('account/dismiss-notice', '', array(
'notice_id' => $noticeId
)) . '"
			title="' . 'Dismiss Notice' . '" class="DismissCtrl Tooltip" data-offsetx="7" data-tipclass="flipped">' . 'Dismiss Notice' . '</a>';
}
$__compilerVar43 .= '
</li>';
$__compilerVar41 .= $__compilerVar43;
unset($__compilerVar42, $__compilerVar43);
$__compilerVar41 .= '
				';
}
$__compilerVar41 .= '
			</ol>
		</div>
	</div>
	
	';
if (XenForo_Template_Helper_Core::styleProperty('scrollableNotices') AND XenForo_Template_Helper_Core::numberFormat(count($notices), '0') > 1)
{
$__compilerVar41 .= '<div class="navContainer">
		<span class="navControls Nav JsOnly">
			';
$i = 0;
foreach ($notices AS $noticeId => $notice)
{
$i++;
$__compilerVar41 .= '
				<a id="n' . htmlspecialchars($noticeId, ENT_QUOTES, 'UTF-8') . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#n' . htmlspecialchars($noticeId, ENT_QUOTES, 'UTF-8') . '"' . (($i == 1) ? (' class="current"') : ('')) . '>
					<span class="arrow"><span></span></span>
					<!--' . htmlspecialchars($i, ENT_QUOTES, 'UTF-8') . ' -->' . htmlspecialchars($notice['title'], ENT_QUOTES, 'UTF-8') . '</a>
			';
}
$__compilerVar41 .= '
		</span>
	</div>';
}
$__compilerVar41 .= '
</div>

';
}
$__compilerVar40 .= $__compilerVar41;
unset($__compilerVar41);
$__compilerVar40 .= '						
						';
$__compilerVar4 .= $this->callTemplateHook('page_container_notices', $__compilerVar40, array());
unset($__compilerVar40);
$__compilerVar4 .= '
						
						';
$__compilerVar44 = '';
$__compilerVar44 .= '
						';
if (!$noH1)
{
$__compilerVar44 .= '						
							<!-- h1 title, description -->
							<div class="titleBar">
								' . $beforeH1 . '
								<h1>';
if ($h1)
{
$__compilerVar44 .= $h1;
}
else if ($title)
{
$__compilerVar44 .= $title;
}
else
{
$__compilerVar44 .= htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar44 .= '</h1>
								
								';
if ($pageDescription['content'])
{
$__compilerVar44 .= '<p id="pageDescription" class="muted ' . htmlspecialchars($pageDescription['class'], ENT_QUOTES, 'UTF-8') . '">' . $pageDescription['content'] . '</p>';
}
$__compilerVar44 .= '
							</div>
						';
}
$__compilerVar44 .= '
						';
$__compilerVar4 .= $this->callTemplateHook('page_container_content_title_bar', $__compilerVar44, array());
unset($__compilerVar44);
$__compilerVar4 .= '
						
						';
$__compilerVar45 = '';
$__compilerVar46 = '';
$__compilerVar45 .= $this->callTemplateHook('ad_above_content', $__compilerVar46, array());
unset($__compilerVar46);
$__compilerVar4 .= $__compilerVar45;
unset($__compilerVar45);
$__compilerVar4 .= '
						
						<!-- main template -->
						' . $contents . '
						
						';
$__compilerVar47 = '';
$__compilerVar48 = '';
$__compilerVar47 .= $this->callTemplateHook('ad_below_content', $__compilerVar48, array());
unset($__compilerVar48);
$__compilerVar4 .= $__compilerVar47;
unset($__compilerVar47);
$__compilerVar4 .= '
						
						';
if (!$visitor['user_id'] && !$hideLoginBar)
{
$__compilerVar4 .= '
							<!-- login form, to be moved to the upper drop-down -->
							';
$__compilerVar49 = '';
$__compilerVar49 .= '

';
$__compilerVar50 = '';
$__compilerVar50 .= '
';
if ($xenOptions['facebookAppId'])
{
$eAuth = '';
$eAuth .= '1';
}
$__compilerVar50 .= '
';
if ($xenOptions['twitterAppKey'])
{
$eAuth = '';
$eAuth .= '1';
}
$__compilerVar50 .= '
';
if ($xenOptions['googleClientId'])
{
$eAuth = '';
$eAuth .= '1';
}
$__compilerVar50 .= '
';
$__compilerVar49 .= $this->callTemplateHook('login_bar_eauth_set', $__compilerVar50, array());
unset($__compilerVar50);
$__compilerVar49 .= '

<form action="' . XenForo_Template_Helper_Core::link('login/login', false, array()) . '" method="post" class="xenForm ' . (($eAuth) ? ('eAuth') : ('')) . '" id="login" style="display:none">

	';
$__compilerVar51 = '';
$__compilerVar51 .= '
				';
$__compilerVar52 = '';
$__compilerVar52 .= '
				';
if ($xenOptions['facebookAppId'])
{
$__compilerVar52 .= '
					';
$this->addRequiredExternal('css', 'facebook');
$__compilerVar52 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin" tabindex="110"><span>' . 'Log in with Facebook' . '</span></a></li>
				';
}
$__compilerVar52 .= '
				
				';
if ($xenOptions['twitterAppKey'])
{
$__compilerVar52 .= '
					';
$this->addRequiredExternal('css', 'twitter');
$__compilerVar52 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('register/twitter', '', array(
'reg' => '1'
)) . '" class="twitterLogin" tabindex="110"><span>' . 'Log in with Twitter' . '</span></a></li>
				';
}
$__compilerVar52 .= '
				
				';
if ($xenOptions['googleClientId'])
{
$__compilerVar52 .= '
					';
$this->addRequiredExternal('css', 'google');
$__compilerVar52 .= '
					<li><span class="googleLogin GoogleLogin JsOnly" tabindex="110" data-client-id="' . htmlspecialchars($xenOptions['googleClientId'], ENT_QUOTES, 'UTF-8') . '" data-redirect-url="' . XenForo_Template_Helper_Core::link('register/google', '', array(
'code' => '__CODE__',
'csrf' => $session['sessionCsrf']
)) . '"><span>' . 'Log in with Google' . '</span></span></li>
				';
}
$__compilerVar52 .= '
				';
$__compilerVar51 .= $this->callTemplateHook('login_bar_eauth_items', $__compilerVar52, array());
unset($__compilerVar52);
$__compilerVar51 .= '
			';
if (trim($__compilerVar51) !== '')
{
$__compilerVar49 .= '
		<ul id="eAuthUnit">
			' . $__compilerVar51 . '
		</ul>
	';
}
unset($__compilerVar51);
$__compilerVar49 .= '

	<div class="ctrlWrapper">
		<dl class="ctrlUnit">
			<dt><label for="LoginControl">' . 'Your name or email address' . ':</label></dt>
			<dd><input type="text" name="login" id="LoginControl" class="textCtrl" tabindex="101" /></dd>
		</dl>
	
	';
if ($xenOptions['registrationSetup']['enabled'])
{
$__compilerVar49 .= '
		<dl class="ctrlUnit">
			<dt>
				<label for="ctrl_password">' . 'Do you already have an account?' . '</label>
			</dt>
			<dd>
				<ul>
					<li><label for="ctrl_not_registered"><input type="radio" name="register" value="1" id="ctrl_not_registered" tabindex="105" />
						' . 'No, create an account now.' . '</label></li>
					<li><label for="ctrl_registered"><input type="radio" name="register" value="0" id="ctrl_registered" tabindex="105" checked="checked" class="Disabler" />
						' . 'Yes, my password is' . ':</label></li>
					<li id="ctrl_registered_Disabler">
						<input type="password" name="password" class="textCtrl" id="ctrl_password" tabindex="102" />
						<div class="lostPassword"><a href="' . XenForo_Template_Helper_Core::link('lost-password', false, array()) . '" class="OverlayTrigger OverlayCloser" tabindex="106">' . 'Forgot your password?' . '</a></div>
					</li>
				</ul>
			</dd>
		</dl>
	';
}
else
{
$__compilerVar49 .= '
		<dl class="ctrlUnit">
			<dt>
				<label for="ctrl_password">' . 'Password' . ':</label>
			</dt>
			<dd>
				<input type="password" name="password" class="textCtrl" id="ctrl_password" tabindex="102" />
				<div class="lostPasswordLogin"><a href="' . XenForo_Template_Helper_Core::link('lost-password', false, array()) . '" class="OverlayTrigger OverlayCloser" tabindex="106">' . 'Forgot your password?' . '</a></div>
			</dd>
		</dl>
	';
}
$__compilerVar49 .= '
		
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" class="button primary" value="' . 'Log in' . '" tabindex="104" data-loginPhrase="' . 'Log in' . '" data-signupPhrase="' . 'Sign up' . '" />
				<label for="ctrl_remember" class="rememberPassword"><input type="checkbox" name="remember" value="1" id="ctrl_remember" tabindex="103" /> ' . 'Stay logged in' . '</label>
			</dd>
		</dl>
	</div>

	<input type="hidden" name="cookie_check" value="1" />
	<input type="hidden" name="redirect" value="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

</form>';
$__compilerVar4 .= $__compilerVar49;
unset($__compilerVar49);
$__compilerVar4 .= '
						';
}
$__compilerVar4 .= '
						
					';
if ($sidebar)
{
$__compilerVar4 .= '</div>
				</div>
				
				<!-- sidebar -->
				<aside>
					<div class="sidebar">
						';
$__compilerVar53 = '';
$__compilerVar53 .= '
						';
$__compilerVar54 = '';
$__compilerVar55 = '';
$__compilerVar54 .= $this->callTemplateHook('ad_sidebar_top', $__compilerVar55, array());
unset($__compilerVar55);
$__compilerVar53 .= $__compilerVar54;
unset($__compilerVar54);
$__compilerVar53 .= '
						';
if (!$noVisitorPanel)
{
$__compilerVar56 = '';
if ($visitor['user_id'])
{
$__compilerVar56 .= '

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
$__compilerVar57 = '';
$__compilerVar57 .= '
				<dl class="pairsJustified"><dt>' . 'Messages' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['message_count'], '0') . '</dd></dl>
				<dl class="pairsJustified"><dt>' . 'Likes' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['like_count'], '0') . '</dd></dl>
				<dl class="pairsJustified"><dt>' . 'Points' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['trophy_points'], '0') . '</dd></dl>
			</div>
			';
$__compilerVar56 .= $this->callTemplateHook('sidebar_visitor_panel_stats', $__compilerVar57, array());
unset($__compilerVar57);
$__compilerVar56 .= '
		</div>
		
	</div>
</div>

';
}
else
{
$__compilerVar56 .= '

<div class="section loginButton">   
    <div class="secondaryContent">
        <label for="LoginControl" id="SignupButton"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="inner">' . (($xenOptions['registrationSetup']['enabled']) ? ('Sign up now!') : ('Log in')) . '</a></label>
';
$__compilerVar58 = '';
$this->addRequiredExternal('css', 'cta_login');
$__compilerVar58 .= '

';
if ($xenOptions['facebookAppId'])
{
$__compilerVar58 .= '
	';
$this->addRequiredExternal('css', 'facebook');
$__compilerVar58 .= '
	<li class="ctaLoginFacebook"><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin"><span>' . 'Log in with Facebook' . '</span></a></li>
';
}
$__compilerVar58 .= '

';
if ($xenOptions['twitterAppKey'])
{
$__compilerVar58 .= '
	';
$this->addRequiredExternal('css', 'twitter');
$__compilerVar58 .= '
	<li class="ctaLoginTwitter"><a href="' . XenForo_Template_Helper_Core::link('register/twitter', '', array(
'reg' => '1'
)) . '" class="twitterLogin"><span>' . 'Log in with Twitter' . '</span></a></li>
';
}
$__compilerVar58 .= '

';
if ($xenOptions['googleClientId'])
{
$__compilerVar58 .= '
	';
$this->addRequiredExternal('css', 'google');
$__compilerVar58 .= '
	<li class="ctaLoginGoogle"><span class="googleLogin GoogleLogin JsOnly" data-client-id="' . htmlspecialchars($xenOptions['googleClientId'], ENT_QUOTES, 'UTF-8') . '" data-redirect-url="' . XenForo_Template_Helper_Core::link('register/google', '', array(
'code' => '__CODE__',
'csrf' => $session['sessionCsrf']
)) . '"><span>' . 'Log in with Google' . '</span></span></li>
';
}
$__compilerVar56 .= $__compilerVar58;
unset($__compilerVar58);
$__compilerVar56 .= '

        ';
if ($xenOptions['facebookAppId'])
{
$__compilerVar56 .= '
            <div class="cta_fbButton">
                <a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1'
)) . '" class="fbLogin"><span>' . 'Log in with Facebook' . '</span></a>
            </div>
        ';
}
$__compilerVar56 .= '

    </div>
</div>

';
}
$__compilerVar56 .= '

';
$__compilerVar59 = '';
$__compilerVar60 = '';
$__compilerVar59 .= $this->callTemplateHook('ad_sidebar_below_visitor_panel', $__compilerVar60, array());
unset($__compilerVar60);
$__compilerVar56 .= $__compilerVar59;
unset($__compilerVar59);
$__compilerVar53 .= $__compilerVar56;
unset($__compilerVar56);
}
$__compilerVar53 .= '
						' . $sidebar . '
						';
$__compilerVar61 = '';
$__compilerVar62 = '';
$__compilerVar61 .= $this->callTemplateHook('ad_sidebar_bottom', $__compilerVar62, array());
unset($__compilerVar62);
$__compilerVar53 .= $__compilerVar61;
unset($__compilerVar61);
$__compilerVar53 .= '
						';
$__compilerVar4 .= $this->callTemplateHook('page_container_sidebar', $__compilerVar53, array());
unset($__compilerVar53);
$__compilerVar4 .= '
					</div>
				</aside>
			';
}
$__compilerVar4 .= '
			
			';
$__compilerVar63 = '';
$__compilerVar63 .= '			
			<div class="breadBoxBottom">';
$__compilerVar64 = '';
$__compilerVar64 .= '

<nav>
	';
if (!$quickNavSelected AND $navigation)
{
$__compilerVar64 .= '
		';
foreach ($navigation AS $breadcrumb)
{
$__compilerVar64 .= '
			';
if ($breadcrumb['node_id'])
{
$__compilerVar64 .= '
				';
$quickNavSelected = '';
$quickNavSelected .= 'node-' . htmlspecialchars($breadcrumb['node_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar64 .= '
			';
}
$__compilerVar64 .= '
		';
}
$__compilerVar64 .= '
	';
}
$__compilerVar64 .= '

	<fieldset class="breadcrumb">
		<a href="' . XenForo_Template_Helper_Core::link('misc/quick-navigation-menu', '', array(
'selected' => $quickNavSelected
)) . '" class="OverlayTrigger jumpMenuTrigger" data-cacheOverlay="true" title="' . 'Open quick navigation' . '"><!--' . 'Jump to' . '...--></a>
			
		<div class="boardTitle"><strong>' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '</strong></div>
		
		<span class="crumbs">
			';
if ($showHomeLink)
{
$__compilerVar64 .= '
				<span class="crust homeCrumb"' . (($microdata) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
					<a href="' . htmlspecialchars($homeLink, ENT_QUOTES, 'UTF-8') . '" class="crumb"' . (($microdata) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($microdata) ? (' itemprop="title"') : ('')) . '>' . 'Home' . '</span></a>
					<span class="arrow"><span></span></span>
				</span>
			';
}
else if ($selectedTabId != $homeTabId)
{
$__compilerVar64 .= '
				<span class="crust homeCrumb"' . (($microdata) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
					<a href="' . htmlspecialchars($homeTab['href'], ENT_QUOTES, 'UTF-8') . '" class="crumb"' . (($microdata) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($microdata) ? (' itemprop="title"') : ('')) . '>' . htmlspecialchars($homeTab['title'], ENT_QUOTES, 'UTF-8') . '</span></a>
					<span class="arrow"><span></span></span>
				</span>
			';
}
$__compilerVar64 .= '
			
			';
if ($selectedTab)
{
$__compilerVar64 .= '
				<span class="crust selectedTabCrumb"' . (($microdata) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
					<a href="' . htmlspecialchars($selectedTab['href'], ENT_QUOTES, 'UTF-8') . '" class="crumb"' . (($microdata) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($microdata) ? (' itemprop="title"') : ('')) . '>' . htmlspecialchars($selectedTab['title'], ENT_QUOTES, 'UTF-8') . '</span></a>
					<span class="arrow"><span>&gt;</span></span>
				</span>
			';
}
$__compilerVar64 .= '
			
			';
if ($navigation)
{
$__compilerVar64 .= '
				';
$i = 0;
$count = count($navigation);
foreach ($navigation AS $breadcrumb)
{
$i++;
$__compilerVar64 .= '
					<span class="crust"' . (($microdata) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"') : ('')) . '>
						<a href="' . $breadcrumb['href'] . '" class="crumb"' . (($microdata) ? (' rel="up" itemprop="url"') : ('')) . '><span' . (($microdata) ? (' itemprop="title"') : ('')) . '>' . $breadcrumb['value'] . '</span></a>
						<span class="arrow"><span>&gt;</span></span>
					</span>
				';
}
$__compilerVar64 .= '
			';
}
$__compilerVar64 .= '
		</span>
	</fieldset>
</nav>';
$__compilerVar63 .= $__compilerVar64;
unset($__compilerVar64);
$__compilerVar63 .= '</div>
			';
$__compilerVar4 .= $this->callTemplateHook('page_container_breadcrumb_bottom', $__compilerVar63, array());
unset($__compilerVar63);
$__compilerVar4 .= '
						
			';
$__compilerVar65 = '';
$__compilerVar66 = '';
$__compilerVar65 .= $this->callTemplateHook('ad_below_bottom_breadcrumb', $__compilerVar66, array());
unset($__compilerVar66);
$__compilerVar4 .= $__compilerVar65;
unset($__compilerVar65);
$__compilerVar4 .= '
						
		</div>
	</div>
</div>

<header>
	';
$__compilerVar67 = '';
$__compilerVar68 = '';
$__compilerVar68 .= '
<div id="header">

<div class="pageWidth">
		<div class="pageContent">

	';
$__compilerVar69 = '';
$__compilerVar69 .= '<div id="logoBlock">
	
			';
$__compilerVar70 = '';
$__compilerVar71 = '';
$__compilerVar70 .= $this->callTemplateHook('ad_header', $__compilerVar71, array());
unset($__compilerVar71);
$__compilerVar69 .= $__compilerVar70;
unset($__compilerVar70);
$__compilerVar69 .= '
			';
$__compilerVar72 = '';
$__compilerVar72 .= '
			<div id="logo"><a href="' . htmlspecialchars($logoLink, ENT_QUOTES, 'UTF-8') . '">
				<span></span>
				';
$doodle = XenForo_Template_Helper_Core::callHelper('doodle', array());
$__compilerVar72 .= '
';
if ($doodle)
{
$__compilerVar72 .= '
	';
if ($doodle['link'])
{
$__compilerVar72 .= '
	<a href="' . htmlspecialchars($doodle['link'], ENT_QUOTES, 'UTF-8') . '"><img src="' . htmlspecialchars($doodle['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" /></a>
	';
}
else
{
$__compilerVar72 .= '
	<img src="' . htmlspecialchars($doodle['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($doodle['holiday'], ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__compilerVar72 .= '
';
}
else
{
$__compilerVar72 .= '
	<img src="' . XenForo_Template_Helper_Core::styleProperty('headerLogoPath') . '" alt="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
';
}
$__compilerVar72 .= '
			</a></div>
			';
$__compilerVar69 .= $this->callTemplateHook('header_logo', $__compilerVar72, array());
unset($__compilerVar72);
$__compilerVar69 .= '
			<span class="helper"></span>
	
</div>';
$__compilerVar68 .= $__compilerVar69;
unset($__compilerVar69);
$__compilerVar68 .= '
	';
$__compilerVar73 = '';
$__compilerVar73 .= '

<div id="navigation" class="pageWidth ' . (($canSearch) ? ('withSearch') : ('')) . '">
	<div class="pageContent">
		<nav>

<div class="navTabs">
	<ul class="publicTabs">
	
		<!-- home -->
		';
if ($showHomeLink)
{
$__compilerVar73 .= '
			<li class="navTab home PopupClosed"><a href="' . htmlspecialchars($homeLink, ENT_QUOTES, 'UTF-8') . '" class="navLink">' . 'Home' . '</a></li>
		';
}
$__compilerVar73 .= '
		
		
		<!-- extra tabs: home -->
		';
if ($extraTabs['home'])
{
$__compilerVar73 .= '
		';
foreach ($extraTabs['home'] AS $extraTabId => $extraTab)
{
$__compilerVar73 .= '
			';
if ($extraTab['linksTemplate'])
{
$__compilerVar73 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__compilerVar73 .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__compilerVar73 .= '</a>
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="SplitCtrl" rel="Menu"></a>
				
				<div class="' . (($extraTab['selected']) ? ('tabLinks') : ('Menu JsOnly tabMenu')) . ' ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . 'TabLinks">
					<div class="primaryContent menuHeader">
						<h3>' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8') . '</h3>
						<div class="muted">' . 'Quick Links' . '</div>
					</div>
					' . $extraTab['linksTemplate'] . '
				</div>
			</li>
			';
}
else
{
$__compilerVar73 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('PopupClosed')) . '">
					<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8') . '</a>
					';
if ($extraTab['selected'])
{
$__compilerVar73 .= '<div class="tabLinks"></div>';
}
$__compilerVar73 .= '
				</li>
			';
}
$__compilerVar73 .= '
		';
}
$__compilerVar73 .= '
		';
}
$__compilerVar73 .= '
		
		
		<!-- forums -->
		';
if ($tabs['forums'])
{
$__compilerVar73 .= '
			<li class="navTab forums ' . (($tabs['forums']['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($tabs['forums']['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($tabs['forums']['title'], ENT_QUOTES, 'UTF-8') . '</a>
				<a href="' . htmlspecialchars($tabs['forums']['href'], ENT_QUOTES, 'UTF-8') . '" class="SplitCtrl" rel="Menu"></a>
				
				<div class="' . (($tabs['forums']['selected']) ? ('tabLinks') : ('Menu JsOnly tabMenu')) . ' forumsTabLinks">
					<div class="primaryContent menuHeader">
						<h3>' . htmlspecialchars($tabs['forums']['title'], ENT_QUOTES, 'UTF-8') . '</h3>
						<div class="muted">' . 'Quick Links' . '</div>
					</div>
					<ul class="secondaryContent blockLinksList">
					';
$__compilerVar74 = '';
$__compilerVar74 .= '
						';
if ($visitor['user_id'])
{
$__compilerVar74 .= '<li><a href="' . XenForo_Template_Helper_Core::link('forums/-/mark-read', $forum, array(
'date' => $serverTime
)) . '" class="OverlayTrigger">' . 'Mark Forums Read' . '</a></li>';
}
$__compilerVar74 .= '
						';
if ($canSearch)
{
$__compilerVar74 .= '<li><a href="' . XenForo_Template_Helper_Core::link('search', '', array(
'type' => 'post'
)) . '">' . 'Search Forums' . '</a></li>';
}
$__compilerVar74 .= '
						';
if ($visitor['user_id'])
{
$__compilerVar74 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('watched/forums', false, array()) . '">' . 'Watched Forums' . '</a></li>
							<li><a href="' . XenForo_Template_Helper_Core::link('watched/threads', false, array()) . '">' . 'Watched Threads' . '</a></li>
						';
}
$__compilerVar74 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('find-new/posts', false, array()) . '" rel="nofollow">' . (($visitor['user_id']) ? ('New Posts') : ('Recent Posts')) . ' ';
$__compilerVar75 = '';
if ($visitor['user_id'])
{
$__compilerVar75 .= '
	';
$this->addRequiredExternal('css', 'unread_posts_count');
$__compilerVar75 .= '

	';
$unread = '';
$__compilerVar76 = '';
$unread .= $this->callTemplateCallback('UnreadPostCount_Callback', 'getUnreadCount', $__compilerVar76, array());
unset($__compilerVar76);
$__compilerVar75 .= '
	
	<span class="postItemCount' . (($unread) ? (' alert') : ('')) . '">
		' . XenForo_Template_Helper_Core::numberFormat($unread, '0') . '
	</span>
';
}
$__compilerVar74 .= $__compilerVar75;
unset($__compilerVar75);
$__compilerVar74 .= '</a></li>
					';
$__compilerVar73 .= $this->callTemplateHook('navigation_tabs_forums', $__compilerVar74, array());
unset($__compilerVar74);
$__compilerVar73 .= '
					</ul>
				</div>
			</li>
		';
}
$__compilerVar73 .= '
		
		
		<!-- extra tabs: middle -->
		';
if ($extraTabs['middle'])
{
$__compilerVar73 .= '
		';
foreach ($extraTabs['middle'] AS $extraTabId => $extraTab)
{
$__compilerVar73 .= '
			';
if ($extraTab['linksTemplate'])
{
$__compilerVar73 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__compilerVar73 .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__compilerVar73 .= '</a>
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="SplitCtrl" rel="Menu"></a>
				
				<div class="' . (($extraTab['selected']) ? ('tabLinks') : ('Menu JsOnly tabMenu')) . ' ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . 'TabLinks">
					<div class="primaryContent menuHeader">
						<h3>' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8') . '</h3>
						<div class="muted">' . 'Quick Links' . '</div>
					</div>
					' . $extraTab['linksTemplate'] . '
				</div>
			</li>
			';
}
else
{
$__compilerVar73 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('PopupClosed')) . '">
					<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8') . '</a>
					';
if ($extraTab['selected'])
{
$__compilerVar73 .= '<div class="tabLinks"></div>';
}
$__compilerVar73 .= '
				</li>
			';
}
$__compilerVar73 .= '
		';
}
$__compilerVar73 .= '
		';
}
$__compilerVar73 .= '
		
		
		<!-- members -->
		';
if ($tabs['members'])
{
$__compilerVar73 .= '
			<li class="navTab members ' . (($tabs['members']['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($tabs['members']['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($tabs['members']['title'], ENT_QUOTES, 'UTF-8') . '</a>
				<a href="' . htmlspecialchars($tabs['members']['href'], ENT_QUOTES, 'UTF-8') . '" class="SplitCtrl" rel="Menu"></a>
				
				<div class="' . (($tabs['members']['selected']) ? ('tabLinks') : ('Menu JsOnly tabMenu')) . ' membersTabLinks">
					<div class="primaryContent menuHeader">
						<h3>' . htmlspecialchars($tabs['members']['title'], ENT_QUOTES, 'UTF-8') . '</h3>
						<div class="muted">' . 'Quick Links' . '</div>
					</div>
					<ul class="secondaryContent blockLinksList">
					';
$__compilerVar77 = '';
$__compilerVar77 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Notable Members' . '</a></li>
						';
if ($xenOptions['enableMemberList'])
{
$__compilerVar77 .= '<li><a href="' . XenForo_Template_Helper_Core::link('members/list', false, array()) . '">' . 'Registered Members' . '</a></li>';
}
$__compilerVar77 .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '">' . 'Current Visitors' . '</a></li>
						';
if ($xenOptions['enableNewsFeed'])
{
$__compilerVar77 .= '<li><a href="' . XenForo_Template_Helper_Core::link('recent-activity', false, array()) . '">' . 'Recent Activity' . '</a></li>';
}
$__compilerVar77 .= '
<li><a href="' . XenForo_Template_Helper_Core::link('members/usermap', false, array()) . '">' . 'User Map' . '</a></li>
					';
$__compilerVar73 .= $this->callTemplateHook('navigation_tabs_members', $__compilerVar77, array());
unset($__compilerVar77);
$__compilerVar73 .= '
					</ul>
				</div>
			</li>
		';
}
$__compilerVar73 .= '				
		
		<!-- extra tabs: end -->
		';
if ($extraTabs['end'])
{
$__compilerVar73 .= '
		';
foreach ($extraTabs['end'] AS $extraTabId => $extraTab)
{
$__compilerVar73 .= '
			';
if ($extraTab['linksTemplate'])
{
$__compilerVar73 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('Popup PopupControl PopupClosed')) . '">
			
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8');
if ($extraTab['counter'])
{
$__compilerVar73 .= '<strong class="itemCount"><span class="Total">' . htmlspecialchars($extraTab['counter'], ENT_QUOTES, 'UTF-8') . '</span><span class="arrow"></span></strong>';
}
$__compilerVar73 .= '</a>
				<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="SplitCtrl" rel="Menu"></a>
				
				<div class="' . (($extraTab['selected']) ? ('tabLinks') : ('Menu JsOnly tabMenu')) . ' ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . 'TabLinks">
					<div class="primaryContent menuHeader">
						<h3>' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8') . '</h3>
						<div class="muted">' . 'Quick Links' . '</div>
					</div>
					' . $extraTab['linksTemplate'] . '
				</div>
			</li>
			';
}
else
{
$__compilerVar73 .= '
				<li class="navTab ' . htmlspecialchars($extraTabId, ENT_QUOTES, 'UTF-8') . ' ' . (($extraTab['selected']) ? ('selected') : ('PopupClosed')) . '">
					<a href="' . htmlspecialchars($extraTab['href'], ENT_QUOTES, 'UTF-8') . '" class="navLink">' . htmlspecialchars($extraTab['title'], ENT_QUOTES, 'UTF-8') . '</a>
					';
if ($extraTab['selected'])
{
$__compilerVar73 .= '<div class="tabLinks"></div>';
}
$__compilerVar73 .= '
				</li>
			';
}
$__compilerVar73 .= '
		';
}
$__compilerVar73 .= '
		';
}
$__compilerVar73 .= '

		<!-- responsive popup -->
		<li class="navTab navigationHiddenTabs Popup PopupControl PopupClosed" style="display:none">	
						
			<a rel="Menu" class="navLink NoPopupGadget"><span class="menuIcon">' . 'Menu' . '</span></a>
			
			<div class="Menu JsOnly blockLinksList primaryContent" id="NavigationHiddenMenu"></div>
		</li>
			
		
		<!-- no selection -->
		';
if (!$selectedTab)
{
$__compilerVar73 .= '
			<li class="navTab selected"><div class="tabLinks"></div></li>
		';
}
$__compilerVar73 .= '
		
	</ul>
	
	
</div>

<span class="helper"></span>
			
		</nav>	
	</div>
</div>';
$__compilerVar68 .= $__compilerVar73;
unset($__compilerVar73);
$__compilerVar68 .= '
</div>
</div></div>
';
$__compilerVar67 .= $this->callTemplateHook('header', $__compilerVar68, array());
unset($__compilerVar68);
$__compilerVar4 .= $__compilerVar67;
unset($__compilerVar67);
$__compilerVar4 .= '
	' . '
	' . '
</header>

</div>

<footer>
	';
$__compilerVar78 = '';
$__compilerVar78 .= '
 
';
$__compilerVar79 = '';
$__compilerVar79 .= '

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
$__compilerVar79 .= '<div><a href="https://marketplace.digitalpoint.com/digital-point-user-map.992/item" target="_blank">User Map</a> by <a href="https://www.digitalpoint.com/" target="_blank">Digital Point</a></div>';
}
$__compilerVar79 .= '<a href="http://techlife.com.vn" class="concealed">Diễn đàn đang hoạt động thử nghiệm và chờ giấy phép của bộ <span>&copy;2014-2015 TechLife Forums.</span></a>' . '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar79 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar79 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar79 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar79 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar79 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar79 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar79 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar79 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar79 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar79 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar79 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar79 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar79 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar79 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar79 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar79 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar79 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar79 .= '
            ';
if ((strpos($controllerName, ('Waindigo')) === 0 || ($xenOptions['waindigo_loadClassHints'] && array_key_exists($controllerName, $xenOptions['waindigo_loadClassHints']))) && !$waindigoCopyrightShown)
{
$waindigoCopyrightShown = '';
$waindigoCopyrightShown .= '1';
$__compilerVar79 .= '<br/>';
if ($xenAddOns['Waindigo_InstallUpgrade'] >= 1402580817)
{
}
else
{
$__compilerVar79 .= '<div id="waindigoCopyrightNotice"><a href="https://waindigo.org" class="concealed">XenForo add-ons by Waindigo&trade;</a> <span>&copy;2015 <a href="https://waindigo.org" class="concealed">Waindigo Ltd</a>.</span></div>';
}
}
$__compilerVar79 .= '</div>
 
 
<ul id="legal">
 

 
';
if ($canChangeStyle OR $canChangeLanguage)
{
$__compilerVar79 .= '

<li class="choosers">
';
if ($canChangeLanguage)
{
$__compilerVar79 .= '
 
<a href="' . XenForo_Template_Helper_Core::link('misc/language', '', array(
'redirect' => $requestPaths['requestUri']
)) . '" class="OverlayTrigger Tooltip" title="' . 'Language Chooser' . '" rel="nofollow">' . htmlspecialchars($visitorLanguage['title'], ENT_QUOTES, 'UTF-8') . '</a>
';
}
$__compilerVar79 .= '
</li>

<li class="choosers">
';
if ($canChangeStyle)
{
$__compilerVar79 .= '
 
<a href="' . XenForo_Template_Helper_Core::link('misc/style', '', array(
'redirect' => $requestPaths['requestUri']
)) . '" class="OverlayTrigger Tooltip" title="' . 'Style Chooser' . '" rel="nofollow">' . htmlspecialchars($visitorStyle['title'], ENT_QUOTES, 'UTF-8') . '</a>
';
}
$__compilerVar79 .= '
</li>

';
}
$__compilerVar79 .= '


<li><a href="' . htmlspecialchars($tosUrl, ENT_QUOTES, 'UTF-8') . '">' . 'Terms and Rules' . '</a></li>

<li><a id="toTop" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#navigation" style="display: inline;">' . 'Top' . '</a></li>


</ul>
 
 
 
';
if ($debugMode)
{
$__compilerVar79 .= '
				';
$__compilerVar80 = '';
$__compilerVar80 .= '
						';
if ($page_time)
{
$__compilerVar80 .= '<dt>' . 'Timing' . ':</dt> <dd><a href="' . htmlspecialchars($debug_url, ENT_QUOTES, 'UTF-8') . '" rel="nofollow">' . '' . XenForo_Template_Helper_Core::numberFormat($page_time, '4') . ' seconds' . '</a></dd>';
}
$__compilerVar80 .= '
						';
if ($memory_usage)
{
$__compilerVar80 .= '<dt>' . 'Memory' . ':</dt> <dd>' . '' . XenForo_Template_Helper_Core::numberFormat(($memory_usage / 1024 / 1024), '3') . ' MB' . '</dd>';
}
$__compilerVar80 .= '
						';
if ($db_queries)
{
$__compilerVar80 .= '<dt>' . 'DB Queries' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($db_queries, '0') . '</dd>';
}
$__compilerVar80 .= '
					';
if (trim($__compilerVar80) !== '')
{
$__compilerVar79 .= '
					<dl class="pairsInline debugInfo" title="' . htmlspecialchars($controllerName, ENT_QUOTES, 'UTF-8') . '-&gt;' . htmlspecialchars($controllerAction, ENT_QUOTES, 'UTF-8') . (($viewName) ? (' (' . htmlspecialchars($viewName, ENT_QUOTES, 'UTF-8') . ')') : ('')) . '">
					' . $__compilerVar80 . '
					</dl>
				';
}
unset($__compilerVar80);
$__compilerVar79 .= '
			';
}
$__compilerVar79 .= '
 
 
<span class="helper"></span>
</div>
</div>
</div>
 
';
$__compilerVar78 .= $this->callTemplateHook('footer', $__compilerVar79, array());
unset($__compilerVar79);
$__compilerVar78 .= '
';
$__compilerVar4 .= $__compilerVar78;
unset($__compilerVar78);
$__compilerVar4 .= '
</footer>

';
$__compilerVar81 = '';
$__compilerVar81 .= '<script>

';
$__compilerVar82 = '';
$__compilerVar82 .= '
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
	cancel: "' . XenForo_Template_Helper_Core::jsEscape('Cancel', 'double') . '",

	a_moment_ago:    "' . XenForo_Template_Helper_Core::jsEscape('A moment ago', 'double') . '",
	one_minute_ago:  "' . XenForo_Template_Helper_Core::jsEscape('1 minute ago', 'double') . '",
	x_minutes_ago:   "' . XenForo_Template_Helper_Core::jsEscape('' . '%minutes%' . ' minutes ago', 'double') . '",
	today_at_x:      "' . XenForo_Template_Helper_Core::jsEscape('Today at ' . '%time%' . '', 'double') . '",
	yesterday_at_x:  "' . XenForo_Template_Helper_Core::jsEscape('Yesterday at ' . '%time%' . '', 'double') . '",
	day_x_at_time_y: "' . XenForo_Template_Helper_Core::jsEscape('' . '%day%' . ' at ' . '%time%' . '', 'double') . '",

	day0: "' . XenForo_Template_Helper_Core::jsEscape('Sunday', 'double') . '",
	day1: "' . XenForo_Template_Helper_Core::jsEscape('Monday', 'double') . '",
	day2: "' . XenForo_Template_Helper_Core::jsEscape('Tuesday', 'double') . '",
	day3: "' . XenForo_Template_Helper_Core::jsEscape('Wednesday', 'double') . '",
	day4: "' . XenForo_Template_Helper_Core::jsEscape('Thursday', 'double') . '",
	day5: "' . XenForo_Template_Helper_Core::jsEscape('Friday', 'double') . '",
	day6: "' . XenForo_Template_Helper_Core::jsEscape('Saturday', 'double') . '",

	_months: "' . XenForo_Template_Helper_Core::jsEscape('January' . ',' . 'February' . ',' . 'March' . ',' . 'April' . ',' . 'May' . ',' . 'June' . ',' . 'July' . ',' . 'August' . ',' . 'September' . ',' . 'October' . ',' . 'November' . ',' . 'December', 'double') . '",
	_daysShort: "' . XenForo_Template_Helper_Core::jsEscape('Sun' . ',' . 'Mon' . ',' . 'Tue' . ',' . 'Wed' . ',' . 'Thu' . ',' . 'Fri' . ',' . 'Sat', 'double') . '",

	following_error_occurred: "' . XenForo_Template_Helper_Core::jsEscape('The following error occurred', 'double') . '",
	server_did_not_respond_in_time_try_again: "' . XenForo_Template_Helper_Core::jsEscape('The server did not respond in time. Please try again.', 'double') . '",
	logging_in: "' . XenForo_Template_Helper_Core::jsEscape('Logging in', 'double') . '",
	click_image_show_full_size_version: "' . XenForo_Template_Helper_Core::jsEscape('Click this image to show the full-size version.', 'double') . '",
	show_hidden_content_by_x: "' . XenForo_Template_Helper_Core::jsEscape('Show hidden content by {names}', 'double') . '"
});

// Facebook Javascript SDK
XenForo.Facebook.appId = "' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8'), 'double') . '";
XenForo.Facebook.forceInit = ' . (($facebookSdk) ? ('true') : ('false')) . ';
';
$__compilerVar81 .= $this->callTemplateHook('page_container_js_body', $__compilerVar82, array());
unset($__compilerVar82);
$__compilerVar81 .= '

</script>
';
if ($contentTemplate == ('thread_view'))
{
$__compilerVar81 .= '
<script type="text/javascript" src="./js/rrssb/rrssb.min.js"></script>
';
}
$__compilerVar4 .= $__compilerVar81;
unset($__compilerVar81);
$__compilerVar4 .= '

';
$__output .= $this->callTemplateHook('body', $__compilerVar4, array());
unset($__compilerVar4);
$__output .= '
<script type="text/javascript" src="/arrowchat/external.php?type=djs" charset="utf-8"></script>
<script type="text/javascript" src="/arrowchat/external.php?type=js" charset="utf-8"></script>
';
$__compilerVar83 = '';
$__compilerVar83 .= '

';
if ($visitor['show_notification_popup'])
{
$__compilerVar83 .= '
	';
$this->addRequiredExternal('css', 'gfnnotify');
$__compilerVar83 .= '
	';
$this->addRequiredExternal('js', 'js/gfnnotify/notification.js');
$__compilerVar83 .= '
	
	<div id="GFNNotification" data-url="' . XenForo_Template_Helper_Core::link('gfnnotify/get-notifications', false, array()) . '" data-timer="' . XenForo_Template_Helper_Core::styleProperty('notificationOpenTimer') . '" data-interval="' . XenForo_Template_Helper_Core::styleProperty('notificationInterval') . '" data-mark-read="' . XenForo_Template_Helper_Core::link('gfnnotify/mark-read', false, array()) . '"></div>
';
}
$__output .= $__compilerVar83;
unset($__compilerVar83);
$__output .= '
</body>
</html>';
