<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/* Positioning */
#loginContent {
	position:absolute;
	width:100%;
	height:100%;
}
#loginContent #loginHeadlineContainer {
	margin: 100px 100px 0 100px;
}
#loginContent #loginFormContainer, #loginContent #errorContainer {
	margin: 0 100px;
}
#loginContent #loginFormContainer div {
	margin-bottom:7px;
}
#loginContent #loginRegisteredUsers {
    padding-top:5px;
}
#loginContent #copyright {
	margin: 20px 100px 0 100px;
}
#ajaxChatContent {
	width:800px;
	height:600px;
}
#ajaxChatContent #copyright {
	position:absolute;
	right:20px;
}
#ajaxChatContent #headlineContainer {
	position:absolute;
	left:20px;
	top:5px;
}
#ajaxChatContent #logoutChannelContainer {
	position:absolute;
	left:20px;
}
#ajaxChatContent #logoutChannelContainer select{
	width: 105px;
	height: 22px;
}
#ajaxChatContent #statusIconContainer {
	position:absolute;
	right:20px;
	width: 22px;
	height: 22px;
}
#ajaxChatContent #chatList {
	position:absolute;
	left:20px;
	right:230px;
	top:85px;
	bottom:150px;
	overflow:auto;
}
#ajaxChatContent #inputFieldContainer {
	position:absolute;
	left:20px;
	right:20px;
	bottom:95px;
	padding-right:4px;
}
#ajaxChatContent #submitButtonContainer {
	position:absolute;
	right:20px;
	bottom:60px;
}
#ajaxChatContent #onlineListContainer {
	position:absolute;
	right:20px;
	top:85px;
	width:200px;
	bottom:150px;
}
#ajaxChatContent #helpContainer {
	position:absolute;
	right:20px;
	top:85px;
	width:360px;
	bottom:150px;
}
#ajaxChatContent #reportContainer {
	position:absolute;
	right:20px;
	top:85px;
	width:200px;
	bottom:150px;
}
#ajaxChatContent #settingsContainer {
	position:absolute;
	right:20px;
	top:85px;
	width:360px;
	bottom:150px;
}
#ajaxChatContent #bbCodeContainer {
	position:absolute;
	left:20px;
	bottom:20px;
	padding:3px;
}
#ajaxChatContent #colorCodesContainer {
	position:absolute;
	left:20px;
	bottom:55px;
	padding:3px;
	z-index:1;
}
#ajaxChatContent #emoticonsContainer {
	position:absolute;
	left:20px;
	bottom:57px;
	padding:3px;
}
#ajaxChatContent #optionsContainer {
	position:absolute;
	right:20px;
	bottom:20px;
	padding:3px;
	padding-right:0px;
}
#ajaxChatContent #bbCodeContainer input, #ajaxChatContent #logoutButton, #ajaxChatContent #submitButton, #loginContent #loginButton {
	padding: 4px 10px;
}
#ajaxChatContent #colorCodesContainer a {
	display:block;
	float:left;
	width:20px;
	height:20px;
}
#ajaxChatContent #optionsContainer input {
    vertical-align:middle;
}
#ajaxChatContent #optionsContainer input.button {
    width:25px;
	height:25px;
}
#ajaxChatContent #emoticonsContainer a {
	margin-left:1px;
	margin-right:1px;
}
#ajaxChatContent #emoticonsContainer img {
	vertical-align:middle;
	margin-bottom:2px;
}
#ajaxChatContent #headlineContainer h1 {
	margin-left:auto;
	margin-top:12px;
}
#ajaxChatContent #chatList div {
	padding: 2px 10px;
}
#ajaxChatContent #chatList img {
	vertical-align:middle;
	margin-bottom:2px;
}
#ajaxChatContent #chatList cite {
	margin-right:5px;
}
#ajaxChatContent #chatList .bbCodeImage {
	vertical-align:top;
	overflow:auto;
	margin:5px;
}
#ajaxChatContent #chatList .delete {
	display:block;
	float:right;
	width:10px;
	height:10px;
	margin-top:2px;
	padding-left:5px;
	background:url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/modm/ajaxchat/delete.png\') no-repeat right;
}
#ajaxChatContent #inputFieldContainer #inputField {
	width:100%;
	height:40px;
}
#ajaxChatContent #onlineListContainer h3, #ajaxChatContent #helpContainer h3, #ajaxChatContent #settingsContainer h3, #ajaxChatContent #reportContainer h3 {
	height:30px;
	padding: 4px 10px;
	margin:0px;
	text-align:center;
}
#ajaxChatContent #onlineListContainer #onlineList, #ajaxChatContent #helpContainer #helpList, #ajaxChatContent #settingsContainer #settingsList, #ajaxChatContent #reportContainer #reportList {
	position:absolute;
	left:0px;
	right:0px;
	top:25px;
	bottom:0px;
	overflow:auto;
}
#ajaxChatContent #onlineListContainer #onlineList div {
	padding: 2px 10px;
}
#ajaxChatContent #onlineListContainer #onlineList a {
	display:block;
}
#ajaxChatContent #onlineListContainer #onlineList ul {
	margin: 5px 0;
	padding-left:20px;
}
#ajaxChatContent #helpContainer #helpList td, #ajaxChatContent #settingsContainer #settingsList td {
	padding: 4px 10px;
	vertical-align:top;
}
#ajaxChatContent #reportContainer #reportList div {
	padding: 2px 10px;
}
#ajaxChatContent #settingsContainer #settingsList td {
	vertical-align:middle;
}
#ajaxChatContent #settingsContainer #settingsList td.setting {
	width:115px;
}
#ajaxChatContent #settingsContainer #settingsList input.text {
	width:100px;
}
#ajaxChatContent #settingsContainer #settingsList select.left {
	text-align:right;
}
#ajaxChatContent #settingsContainer #settingsList input.button {
    width:25px;
	height:25px;
	vertical-align:middle;
	margin-bottom:2px;
}

/* Buttons */
#ajaxChatContent #optionsContainer #helpButton {
	background:url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/modm/ajaxchat/help.png\') no-repeat;
}
#ajaxChatContent #optionsContainer #settingsButton {
	background:url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/modm/ajaxchat/settings.png\') no-repeat;
}
#ajaxChatContent #optionsContainer #onlineListButton {
	background:url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/modm/ajaxchat/users.png\') no-repeat;
}
#ajaxChatContent #optionsContainer #audioButton {
	background:url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/modm/ajaxchat/audio.png\') no-repeat 0px 0px;
}
#ajaxChatContent #optionsContainer #audioButton.off {
	background-position: 0px 100%;
}
#ajaxChatContent #optionsContainer #autoScrollButton {
	background:url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/modm/ajaxchat/autoscroll.png\') no-repeat 0px 0px;
}
#ajaxChatContent #optionsContainer #autoScrollButton.off {
	background-position: 0px 100%;
}
#ajaxChatContent #settingsContainer #settingsList input.playback {
	background:url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/modm/ajaxchat/playback.png\') no-repeat;
}

/* Borders */
#ajaxChatContent img {
	border:none;
}
#ajaxChatContent #chatList, #ajaxChatContent #onlineListContainer, #ajaxChatContent #helpContainer, #ajaxChatContent #reportContainer,#ajaxChatContent #settingsContainer, #ajaxChatContent #colorCodesContainer, 
#ajaxChatContent #colorCodesContainer a, #ajaxChatContent textarea {
	border-width:1px;
	border-style:solid;
}
#ajaxChatContent #chatList .deleteSelected {
	border-width:1px;
	border-style:dotted;
}
#ajaxChatContent #helpContainer #helpList table, #ajaxChatContent #settingsContainer #settingsList table {
	border-collapse:collapse;
}

/* Misc */
#ajaxChatContent #bbCodeContainer input, #ajaxChatContent #optionsContainer input.button, #ajaxChatContent #settingsContainer #settingsList input.button, #ajaxChatContent #logoutButton, #ajaxChatContent #submitButton, #loginContent #loginButton, #ajaxChatContent #reportContainer #reportList div input.button {
	cursor:pointer;
}
';
