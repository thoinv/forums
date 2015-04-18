<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.ajaxChatShoutbox {
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
	color: #000;
}

.ajaxChatShoutbox h1 {
	color: #000;
}

.ajaxChatShoutbox a {
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
}

.ajaxChatShoutbox input, #content select, #content textarea {
	background-color: #FFF;
	color: #000;
}

.ajaxChatShoutbox #chatList {
	border-color: #ADADAD;
	background-color: #FFF;
}

.ajaxChatShoutbox .rowEven {
	padding: 5px 0 5px 0;
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
}

.ajaxChatShoutbox .rowOdd {
	padding: 5px 0 5px 0;
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
}

.ajaxChatShoutbox .rowEven img,
.ajaxChatShoutbox .rowOdd img {
	vertical-align: middle;
}

.ajaxChatShoutbox .dateTime {
	font-style: italic;
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
}

.ajaxChatShoutbox .guest {
	color: gray;
}

.ajaxChatShoutbox .user {
	color: #000;
}

.ajaxChatShoutbox .moderator {
	color: #0000FF;
}

.ajaxChatShoutbox .admin {
	color: #FF0000;
}

.ajaxChatShoutbox .chatBot {
	color: #476C8E;
}

.ajaxChatShoutbox #chatList .chatBotErrorMessage {
	color: red;
}

.ajaxChatShoutbox #chatList a {
	color: #476C8E;
}

.ajaxChatShoutbox #chatList .deleteSelected {
	border-color: red;
}

.ajaxChatShoutbox #ajaxChatInputFieldContainer {
	padding: 5px;
}

.ajaxChatShoutbox #ajaxChatInputField {
	font-size: 1.1em;
	font-family: Calibri, \'Trebuchet MS\', Verdana, Geneva, Arial, Helvetica,
			sans-serif;
	color: #000000;
	background-color: rgb(240, 247, 252);
	border-width: 1px;
	border-style: solid;
	border-top-color: rgb(192, 192, 192);
	border-right-color: rgb(233, 233, 233);
	border-bottom-color: rgb(233, 233, 233);
	border-left-color: rgb(192, 192, 192);
	border-radius: 4px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	-khtml-border-radius: 4px;
	outline: 0;
	height: 16px;
	width: 100%;
}

.ajaxChatShoutbox #ajaxChatCopyright {
	font-size: 0.8em;
	text-align: center;
}

.ajaxChatShoutbox #ajaxChatCopyright,
.ajaxChatShoutbox #ajaxChatCopyright a {
	font-style: italic;
	color:  ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
}

.ajaxChatShoutbox #ajaxChatChatList {
	height: 150px;
	overflow: auto;
}

.ajaxChatShoutbox #ajaxChatChatList {
	border-width: 1px;
	border-style: solid;
	border-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	border-radius: 4px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	-khtml-border-radius: 4px;
	outline: 0;
}

#ajaxChatChatList .delete {
    display:block;
    float:right;
    width:10px;
    height:10px;
    margin-top:2px;
    padding-left:5px;
    background:url(\'chat/img/delete.png\') no-repeat right;
}

#ajaxChatChatList .report {
    display:block;
    float:right;
    width:10px;
    height:10px;
    margin-top:2px;
    margin-left:5px;
    background:url(\'chat/img/report.gif\') 0 0 no-repeat;
}

#ajaxChatChatList .report:hover {
    background-position:0 -10px;;
}';
