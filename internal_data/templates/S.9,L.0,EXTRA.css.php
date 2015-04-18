<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '@CHARSET "UTF-8";

/* --- EXTRA.css --- */

#BRC_CopyrightNotice { display: none; }
.publicControls .like:before,
.publicControls .unlike:before,
.publicControls .reply:before,
.publicControls .postComment:before{
content: "";
display: inline-block;
width: 16px;
height: 16px;
background: url(\'styles/default/xenforo/thumb_up.png\') no-repeat 50% 50%;
float: left;
margin: 4px 6px -5px -4px !important;
}
 
.publicControls .unlike:before{
background: url(\'styles/default/xenforo/thumb_down.png\') no-repeat 50% 50%;
}
 
.publicControls .postComment:before,
.publicControls .reply:before{
background: url(\'styles/default/xenforo/message_reply.png\') no-repeat 50% 50%;
}

.icon {
    background-color: transparent;
    background-image: url("styles/vxf/iconsprite.png");
    background-repeat: no-repeat;
    display: inline-block;
    height: 16px;
    vertical-align: middle;
    width: 16px;
}
 
.span-icon-text {
    margin: -2px 5px 0 0;
}
 
.line-dot-pink {
    background: url("styles/vxf/line-dot.png") repeat-x scroll left center transparent;
    height: 1px;
    width: 98%;
}
 
.icon-register-date {
    background-position: -17px -646px;
}
 
.icon-message-count {
    background-position: 0 -1037px;
}
 
.icon-like-count {
    background-position: 0 -1377px;
}
 
.icon-trophy-points {
    background-position: 0 -1632px;
}
 
.icon-gender {
    background-position: 0 -1751px;
}
 
.icon-occupation {
    background-position: 0 -935px;
}
 
.icon-user-location {
    background-position: 0 -1734px;
}


#stp-bg {
    display: none;
    position: fixed;
    _position: absolute;
 /* hack for IE 6*/
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    background: #000000;
    z-index: 998;
}

#stp-main {
    position: fixed;
    top: 220px;
    _position: absolute;
 /* hack for IE 6*/
    display: none;
    width: 450px;
    border: 7px solid #2f2f2f;
    background: #fff;
    z-index: 999;
    -moz-border-radius: 9px;
    -webkit-border-radius: 9px;
    margin: 0pt;
    padding: 0pt;
    color: #333333;
    text-align: left;
    font-family: arial,sans-serif !important;
    font-size: 13px;
}

/* Add Facebook login button to visitor panel */
.cta_fbButton {
margin: 10px 30px;
text-align: center;
}

#stp-title {
    font-family: Arial !important;
    font-size: 18px;
    padding: 13px 0 13px 15px;
}

#stp-close {
    float: right;
    font-size: 14px;
    font-weight: bold;
    font-family: Verdana, Geneva, sans-serif;
    color: #A4A4A4 !important;
    margin: 0 13px 0 0;
    border-bottom: 0px !important;
    text-decoration: none !important;
}

#stp-close:hover {
    text-decoration: none !important;
}

#stp-msg {
    background: #4074CF;
    padding: 10px 15px;
    color: #ffffff;
    font-family: Arial, Helvetica, sans-serif !important;
    font-weight: bold;
    line-height: 20px;
}

#stp-buttons {
    margin: 25px 0px 25px 0;
    padding: 0 0 0 15px;
}

#stp-bottom {
    padding: 15px 10px;
    background: #EFEFEF;
    color: #95989F;
    border-top: 1px solid #DDE0E8;
}

#stp-counter {
    font-size: 11px !important;
    text-align: right;
    font-weight: bold;
    color: red;
}

.stp-button {
    float: left;
    width: 120px;
}

.step-clear {
    clear: both !important;
}


 .subForumsPopup {
float: none !important;
clear: both;
}

.subForumsPopup .dot { 
position: relative; 
float: left; /* firefox fix */ 
} 

.subForumsPopup .dot span { 
height: 0px; 
left: 6px; 
top: 10px !important; 
position: absolute; 
width: 0px; 
border: 2px solid #6cb2e4; 
-webkit-border-radius: 6px; -moz-border-radius: 6px; -khtml-border-radius: 6px; border-radius: 6px; } 

.subForumsMenu ol li { 
width: 50%; float: left; } 

.subForumsMenu .node .nodeTitle a { 
padding-left: 16px; } 

.subForumsMenu .node .node.level-n { display: none; }

.noticesnew {
background: #ffeb90 none;
font-size: 12px;
color: #3e3e3e;
padding: 5px 10px;
margin-bottom: 5px;
-moz-box-shadow: 2px 2px #c8c8c8;
-webkit-box-shadow: 2px 2px #c8c8c8;
box-shadow: 2px 2px #c8c8c8;
text-align: left;
clear: both;
}

.fb-comments, .fb-comments span, .fb-comments iframe { width: 100% !important; }

.conversation_view .comment_fbdiv {
display: none;
}

.conversation_view .fb-comments, .conversation_view .fb-comments span, .conversation_view .fb-comments iframe {
display: none!important;
}

/*thoinv 01/02/2015 avatar*/
.messageUserBlock div.avatarHolder .onlineMarker
{
    display: inline-block;
    width: 16px;
    height: 16px;
/*    margin: 9px 0 0 9px; <- if you\'d like it on top left */
    margin: 79px 0 0 79px;
    background: #fff;
    border: none!important;
    border-radius: 50%!important
}
   
.messageUserBlock div.avatarHolder .onlineMarker:before
{
    content: \'\';
    position: absolute;
    width: 10px;
    height: 10px;
    margin: 3px 0 0 3px;
    background: #7fb900;
    border-color: #7fb900;
    border-radius: 50%
}

.messageUserBlock div.avatarHolder .onlineMarker:after
{
    content: \'\';
    position: absolute;
    width: 32px;
    height: 32px;
    margin: -9px 0 0 -9px;
    border: 1px solid #7fb900;
    border-radius: 50%;
    box-shadow: 0 0 4px #7fb900, inset 0 0 4px #7fb900;
    -webkit-transform: scale(0);
    -webkit-animation: online 2.5s ease-in-out infinite;
    animation: online 2.5s ease-in-out infinite
}

@-webkit-keyframes online
{
      0% {opacity: 1;-webkit-transform: scale(0)}
     50% {opacity: .7}
    100% {opacity: 0;-webkit-transform: scale(1)}
}

@keyframes online
{
      0% {opacity: 1;transform: scale(0)}
     50% {opacity: .7}
    100% {opacity: 0;transform: scale(1)}
}   

/*thoinv 01022015 highlight search result*/
.highlight
{
    color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryMedium') . ';
}

/*hide rss*/
.node .nodeControls,.footerLinks a.globalFeed{display:none;}

';
