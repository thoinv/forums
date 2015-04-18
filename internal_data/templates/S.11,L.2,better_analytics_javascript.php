<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '$(document).ready(function(){
(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');ga("create","' . htmlspecialchars($xenOptions['googleAnalyticsWebPropertyId'], ENT_QUOTES, 'UTF-8') . '","auto");ga("require","displayfeatures");ga(\'set\',\'forceSSL\',true);
if(XenForo.visitor.user_id>0){ga(\'set\',\'&uid\',XenForo.visitor.user_id);';
if ($xenOptions['dpBetterAnalyticsDimensionIndexUser'])
{
$__output .= 'ga(\'set\',\'dimension' . htmlspecialchars($xenOptions['dpBetterAnalyticsDimensionIndexUser'], ENT_QUOTES, 'UTF-8') . '\',XenForo.visitor.user_id);';
}
$__output .= '}
';
if ($xenOptions['dpBetterAnalyticsDimentionIndex'])
{
$__output .= 'if (typeof XenForo.node_name!=\'undefined\') {ga(\'set\',\'dimension' . htmlspecialchars($xenOptions['dpBetterAnalyticsDimentionIndex'], ENT_QUOTES, 'UTF-8') . '\',XenForo.node_name);}';
}
$__output .= '
if("/account/upgrades"==document.location.pathname.substr(-17)){ga("require","ec");var position=1;$("form.upgradeForm").each(function(){ $(this).find(\'input[type="submit"]\').on("click",function(){var name=$(this).closest("form").find(\'input[name="item_name"]\').val().match(/^.*?: (.*) \\(/)[1];ga("ec:addProduct",{id:"UU-"+$(this).closest("form").find(\'input[name="custom"]\').val().match(/^.*?,(.*?),/)[1],name:name,category:"User Upgrades"});ga("ec:setAction","checkout");ga("send","event","Checkout","Click",name)});
ga("ec:addImpression",{id:"UU-"+$(this).find(\'input[name="custom"]\').val().match(/^.*?,(.*?),/)[1],name:$(this).find(\'input[name="item_name"]\').val().match(/^.*?: (.*) \\(/)[1],category:"User Upgrades",list:"User Upgrade List",position:position++})})};
if (document.referrer.match(/paypal\\.com.*?cgi-bin\\/webscr|facebook\\.com.*?dialog\\/oauth|twitter\\.com\\/oauth|google\\.com.*?\\/oauth2/) != null){ga(\'set\',\'referrer\',\'\');}
ga("send","pageview");
';
if ($xenOptions['dpAnalyticsEvents']['user_engagement'])
{
$__output .= 'setTimeout("ga(\'send\',\'event\',\'User\',\'Engagement\',\'Time on page more than 15 seconds\')",15000);';
}
$__output .= '
';
if ($xenOptions['dpAnalyticsEvents']['ajax_requests'] && $xenOptions['dpAnalyticsInternal']['v'])
{
$__output .= '$(document).ajaxComplete(function(a,b,u){var p=document.createElement(\'a\');p.href=u.url;ga(\'send\',\'event\',\'AJAX Request\',\'Trigger\',p.pathname);});';
}
$__output .= '
';
if ($xenOptions['dpAnalyticsEvents']['links'] && $xenOptions['dpAnalyticsInternal']['v'])
{
$__output .= '$(\'.externalLink\').on(\'click\',function(){ga(\'send\', \'event\',\'Link\',\'Click\', $(this).prop(\'href\'))});';
}
$__output .= '
';
if ($xenOptions['dpAnalyticsEvents']['js_error'] && $xenOptions['dpAnalyticsInternal']['v'])
{
$__output .= '"object"==typeof window.onerror&&(window.onerror=function(a,b,c){ga("send","event","Error","JavaScript",c+": "+a+" ("+window.location.origin+window.location.pathname+" | "+b+")")});';
}
$__output .= '
';
if ($xenOptions['dpAnalyticsEvents']['ajax_error'] && $xenOptions['dpAnalyticsInternal']['v'])
{
$__output .= '$(document).ajaxError(function(b,c,a){ga("send","event","Error","AJAX",window.location.origin+window.location.pathname+" | "+a.url)});';
}
$__output .= '
setTimeout(function(){try{FB.Event.subscribe("edge.create",function(a){ga("send","social","Facebook","Like",a)}),FB.Event.subscribe("edge.remove",function(a){ga("send","social","Facebook","Unlike",a)}),twttr.ready(function(a){a.events.bind("tweet",function(b){if(b){var a;b.target&&"IFRAME"==b.target.nodeName&&(a=ePFU(b.target.src,"url"));ga("send","social","Twitter","Tweet",a)}});a.events.bind("follow",function(b){if(b){var a;b.target&&"IFRAME"==b.target.nodeName&&(a=
ePFU(b.target.src,"url"));ga("send","social","Twitter","Follow",a)}})})}catch(c){}},1E3);
});
function ePFU(c,a){if(c){c=c.split("#")[0];var b=c.split("?");if(1!=b.length){b=decodeURI(b[1]);a+="=";for(var b=b.split("&"),e=0,d;d=b[e];++e)if(0===d.indexOf(a))return unescape(d.split("=")[1])}}}';
