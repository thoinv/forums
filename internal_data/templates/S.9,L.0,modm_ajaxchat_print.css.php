<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license GNU Affero General Public License
 * ' . XenForo_Template_Helper_Core::styleProperty('link') . ' https://blueimp.net/ajax/
 */


/*
 * Print layout
 */

@media print {

	#ajaxChatContent {
		position:static;
	}
	#ajaxChatContent #copyright {
		display:none;
	}
	#ajaxChatContent #headlineContainer {
		display:none;
	}
	#ajaxChatContent #logoutChannelContainer {
		display:none;
	}
	#ajaxChatContent #statusIconContainer {
		display:none;
	}
	#ajaxChatContent #chatList {
		position:static;
		overflow:visible;
	}
	#ajaxChatContent #inputFieldContainer {
		display:none;
	}
	#ajaxChatContent #submitButtonContainer {
		display:none;
	}
	#ajaxChatContent #onlineListContainer {
		display:none;
	}
	#ajaxChatContent #helpContainer {
		display:none;
	}
	#ajaxChatContent #settingsContainer {
		display:none;
	}
	#ajaxChatContent #bbCodeContainer {
		display:none;
	}
	#ajaxChatContent #colorCodesContainer {
		display:none;
	}
	#ajaxChatContent #emoticonsContainer {
		display:none;
	}
	#ajaxChatContent #optionsContainer {
		display:none;
	}
	#ajaxChatContent #chatList div {
		padding-bottom:5px;
	}
	#ajaxChatContent #chatList img {
		vertical-align:middle;
		margin-bottom:2px;
	}
	#ajaxChatContent #chatList cite {
		margin-right:5px;
	}
	#ajaxChatContent #chatList .delete {
	    display:none;
	}
	
	#ajaxChatContent #chatList {
		border:none;
	}
	
	#ajaxChatContent {
		font-family:\'times new roman\', times, serif;
		font-size:1.0em;
		text-align:justify;
	}
	#ajaxChatContent #chatList code {
		font-size:0.8em;
	}
	
	#ajaxChatContent {
		color:#000;
	}
	#ajaxChatContent .guest {
		color:gray;
	}
	#ajaxChatContent .user {
		color:#000;
	}
	#ajaxChatContent .moderator {
		color:#00AA00;
	}
	#ajaxChatContent .admin {
		color:red;
	}
	#ajaxChatContent .chatBot {
		color:#FF6600;
	}
	#ajaxChatContent #chatList .chatBotErrorMessage {
		color:red;
	}
	#ajaxChatContent #chatList a {
		color:#1E90FF;
	}

}
';
