<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.ajaxChatBlock { position: relative; zoom: 1; }

#ajaxChatContent {
	width: auto;
	height: auto;
}

#ajaxChatContent #logoutChannelContainer {
	height: 22px;
	margin: 5px 5px 0 5px;
}

#ajaxChatContent #logoutChannelContainer label {
	padding: 0 0 0 10px;
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
}

#ajaxChatContent #logoutChannelContainer form {
	display: inline-block;
}

#ajaxChatContent #logoutChannelContainer select {
    background: url("' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/form-element-focus-25.png") repeat-x scroll 0% 0% rgb(255, 255, 240);
    border-top-color: rgb(150, 150, 150);
    border-bottom-color: rgb(230, 230, 230);
    font-size: 0.9em;
    font-family: Calibri,\'Trebuchet MS\',Verdana,Geneva,Arial,Helvetica,sans-serif;
    color: rgb(0, 0, 0);
    background-color: rgb(240, 247, 252);
    padding: 1px 3px;
    border-width: 1px;
    border-style: solid;
    border-color: rgb(192, 192, 192) rgb(233, 233, 233) rgb(233, 233, 233) rgb(192, 192, 192);
    border-radius: 4px 4px 4px 4px;
    outline: 0px none;
}

#ajaxChatContent #statusIconContainer {
	float: right;
	height: 22px;
	width: 22px;
	background-image: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/modm/ajaxchat/loading-sprite.png\');
	margin: 0 5px 0 0;
}

#ajaxChatContent .statusContainerOn {
	background-position: 0px -22px;
}

#ajaxChatContent .statusContainerOff {
	background-position: 0px 0px;
}

#ajaxChatContent .statusContainerAlert {
	background-position: 0px -44px;
}

#ajaxChatContent #onlineListContainer, #ajaxChatContent #helpContainer, #ajaxChatContent #settingsContainer, #ajaxChatContent #chatList {
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	border-radius: 8px;
	margin: 5px;
}

#ajaxChatContent #onlineListContainer {
	float: right;
	width: 170px;
	height: 450px;
	overflow: auto;
}

#ajaxChatContent #onlineListContainer .userMenu {
	padding-left: 10px;
	font-size: 0.85em;
}

#ajaxChatContent #onlineListContainer h3, #ajaxChatContent #helpContainer h3, #ajaxChatContent #settingsContainer h3 {
	font-weight: bold;
	color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryDarker') . ';
	padding: 5px;
	text-align: center;
	background: #f9d9b0 url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png\') repeat-x top;
}

#ajaxChatContent #helpContainer {
	float: right;
	width: 360px;
	height: 450px;
	overflow: auto;
}

#ajaxChatContent #settingsContainer {
	float: right;
	width: 360px;
	height: 450px;
	overflow: auto;
}

#ajaxChatContent #chatList {
	width: auto;
	height: 450px;
	overflow: auto;
}

#ajaxChatContent .rowEven, #ajaxChatContent .rowOdd, #ajaxChatContent #settingsContainer td, #ajaxChatContent #helpContainer td  {
	padding: 4px;
}

#ajaxChatContent .rowEven {
	background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '
		url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png\')
		repeat-x top;
}

#ajaxChatContent .rowOdd {
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
}

#ajaxChatContent .guest, #ajaxChatContent .user, #ajaxChatContent .moderator, #ajaxChatContent .admin, #ajaxChatContent .chatBot {
	cursor: pointer;
	font-weight: bold;
}

#ajaxChatContent .guest {
	color: gray;
}

#ajaxChatContent .user {
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
}

#ajaxChatContent .moderator {
	color: #00AA00;
}

#ajaxChatContent .admin {
	color: red;
}

#ajaxChatContent .chatBot {
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . ';
}

#ajaxChatContent #chatList .chatBotErrorMessage {
	color: red;
}

#ajaxChatContent #chatList .deleteSelected {
	border: 2px dashed red;
}

#ajaxChatContent #chatList .dateTime {
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	font-style: italic;
}

#ajaxChatContent #chatList .report {
    display:block;
    float:right;
    width:10px;
    height:10px;
    margin-top:2px;
    margin-left:5px;
    background:url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/modm/ajaxchat/report.gif\') 0 0 no-repeat;
}

#ajaxChatContent #chatList .report:hover {
    background-position:0 -10px;;
}

#ajaxChatContent  #chatList .delete {
    display:block;
    float:right;
    width:10px;
    height:10px;
    margin-top:2px;
    padding-left:5px;
    background:url(\'chat/img/delete.png\') no-repeat right;
}

#ajaxChatContent #inputFieldContainer {
	display: block;
	width: auto;
	height: auto;
	margin: 10px 5px;
}

#ajaxChatContent #inputFieldContainer textarea {
	width: 100%;
	height: 50px;
	border-width: 1px;
	border-style: solid;
	border-top-color: rgb(192, 192, 192);
	border-right-color: rgb(233, 233, 233);
	border-bottom-color: rgb(233, 233, 233);
	border-left-color: rgb(192, 192, 192);
	border-radius: 4px;
	border-radius: 4px;
	outline: 0;
	font-size: 13px;
	font-family: Calibri, \'Trebuchet MS\', Verdana, Geneva, Arial, Helvetica, sans-serif;
	color: ' . XenForo_Template_Helper_Core::styleProperty('contentText') . ';
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('textCtrlBackground') . ';
	word-wrap: break-word;
}

#ajaxChatContent #inputFieldContainer textarea:focus {
	background: rgb(255, 255, 240);
	background-image: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/form-element-focus-100.png\') reapeat-x;
	border-top-color: rgb(150, 150, 150);
	border-bottom-color: rgb(230, 230, 230);
}

#ajaxChatContent #submitButtonContainer {
	float: right;
}

#ajaxChatContent #emoticonsContainer {
	margin: 5px;
	padding: 5px;
	height: 20px;
	width: auto;
}

#ajaxChatContent #emoticonsContainer img {
	margin: 0 2px 0 2px;
}

#ajaxChatContent #bbCodeContainer {
	padding: 5px;
	height: 23px;
	width: auto;
}

#ajaxChatContent #bbCodeContainer input {
	font-style: normal;
	font-size: 12px;
	font-family: Calibri, \'Trebuchet MS\', Verdana, Geneva, Arial, Helvetica, sans-serif;
	color: ' . XenForo_Template_Helper_Core::styleProperty('textCtrlText') . ';
	background: rgb(220, 220, 235) url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/form-button-white-25px.png\') repeat-x top;
	padding: 0px 6px;
	border: 1px solid rgb(221, 221, 235);
	border-top-color: rgb(255, 255, 255);
	border-bottom-color: rgb(179, 179, 189);
	border-radius: 7px;
	text-align: center;
	line-height: 23px;
	display: inline-block;
	cursor: pointer;
	box-sizing: border-box;
}

#ajaxChatContent #bbCodeContainer input:hover {
	color: black;
	text-decoration: none;
	background-color: rgb(255, 255, 200);
	border-color: rgb(255, 255, 200);
	border-top-color: white;
	border-bottom-color: rgb(190, 190, 170);
}


#ajaxChatContent #optionsContainer {
	float: right;
	background-color: transparent;
	padding: 5px;
}

/* Buttons */
#content #optionsContainer #helpButton {
	background:url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/modm/ajaxchat/help.png\') no-repeat;
}
#content #optionsContainer #settingsButton {
	background:url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/modm/ajaxchat/settings.png\') no-repeat;
}
#content #optionsContainer #onlineListButton {
	background:url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/modm/ajaxchat/users.png\') no-repeat;
}
#content #optionsContainer #audioButton {
	background:url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/modm/ajaxchat/audio.png\') no-repeat 0px 0px;
}
#content #optionsContainer #audioButton.off {
	background-position: 0px 100%;
}
#content #optionsContainer #autoScrollButton {
	background:url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/modm/ajaxchat/autoscroll.png\') no-repeat 0px 0px;
}
#content #optionsContainer #autoScrollButton.off {
	background-position: 0px 100%;
}
#content #settingsContainer #settingsList input.playback {
	background:url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/modm/ajaxchat/playback.png\') no-repeat;
}

#ajaxChatContent #bbCodeContainer #colorCodesContainer {
	position: absolute;
	left: 130px;
	bottom: 30px;
	padding: 3px;
	z-index: 1;
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	border-radius: 4px;
	background: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
}

#ajaxChatContent #bbCodeContainer #colorCodesContainer a {
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryDarker') . ';
	display: block;
	float: left;
	width: 20px;
	height: 20px;
}

#ajaxChatContent #copyright {
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	float: right;
	font-style: italic;
	font-size: 0.8em;
	margin: 5px;
}

#ajaxChatContent #messageLengthCounter {
	font-style: italic;
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
	padding: 0 5px 0 0;
}

#ajaxChatContent .button {
	border: none;
	box-shadow: none;
	padding: 0;
	vertical-align: middle;
}

#ajaxChatContent #submitButton {
	font: 12pt Calibri, \'Trebuchet MS\', Verdana, Geneva, Arial, Helvetica, sans-serif;
	color: White;
	font-weight: bold;
	background: #e68c17 url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/form-button-white-25px.png\') repeat-x center -7px;
	border: 3px solid White;
	border-radius: 8px;
	text-align: center;
	box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
	display: inline-block;
	cursor: pointer;
	height: 33px;
	background-color: #e68c17;
	padding: 0 10px 0 10px;
}

#ajaxChatContent #submitButton:hover {
	box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
	-webkit-box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
	-moz-box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
	-khtml-box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
	position: relative;
	top: 2px;
}

	@media(max-width: ' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveWideWidth') . ') {
		#ajaxChatContent #chatList,
		#ajaxChatContent #onlineListContainer,
		#ajaxChatContent #settingsContainer,
		#ajaxChatContent #helpContainer {
			height: 300px;
		}

		#ajaxChatContent #logoutChannelContainer {
			display: block;
			float: none;
			height: auto;
			width: auto;
		}
		
		#ajaxChatContent #statusIconContainer {
			float: right;
			position: relative;
			top: 0;
			right: 0;
		}
		
		#ajaxChatContent #onlineListContainer {
			display: none;
		}
		
		#ajaxChatContent #inputFieldContainer {
			display: block;
			float: left;
			padding: 5px;
			margin: 0;
			width: 80%;
			height: 50px;
		}
		
		#ajaxChatContent #inputFieldContainer textarea {
			height: 40px;
			width: 100%;
			margin: 0;
			padding: 0;
		}
		
		#ajaxChatContent #submitButtonContainer {
			display: inline-block;
			position: absolute;
			right: 10px;
			margin: auto;
			width: 15%;
			height: 50px;
		}
		
		#ajaxChatContent #submitButtonContainer input {
			height: 100%;
			width: 100%;
			overflow: hidden;
		}
		
		#ajaxChatContent #submitButtonContainer #messageLengthCounter {
			display: none;
		}
		
		#ajaxChatContent #emoticonsContainer {
			clear: both;
			display: block;
			padding: 5px;
		}
				
		#ajaxChatContent #bbCodeContainer {
			height: auto;
		}
		
		#ajaxChatContent #copyright {
			float: none;
			text-align: center;
			width: 100%;
		}
	}';
