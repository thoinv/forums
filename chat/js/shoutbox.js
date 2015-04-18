/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license GNU Affero General Public License
 * @link https://blueimp.net/ajax/
 */

// Overrides functionality for the shoutbox view:

	shoutboxCustomInitialize = function () {
		ajaxChat.updateButton('audio', 'audioButton');
		ajaxChat.updateButton('autoScroll', 'autoScrollButton');
		document.getElementById('bbCodeSetting').checked = ajaxChat.getSetting('bbCode');
		document.getElementById('bbCodeImagesSetting').checked = ajaxChat.getSetting('bbCodeImages');
		document.getElementById('bbCodeColorsSetting').checked = ajaxChat.getSetting('bbCodeColors');
		document.getElementById('hyperLinksSetting').checked = ajaxChat.getSetting('hyperLinks');
		document.getElementById('lineBreaksSetting').checked = ajaxChat.getSetting('lineBreaks');
		document.getElementById('emoticonsSetting').checked = ajaxChat.getSetting('emoticons');
		document.getElementById('autoFocusSetting').checked = ajaxChat.getSetting('autoFocus');
		document.getElementById('maxMessagesSetting').value = ajaxChat.getSetting('maxMessages');
		document.getElementById('wordWrapSetting').checked = ajaxChat.getSetting('wordWrap');
		document.getElementById('maxWordLengthSetting').value = ajaxChat.getSetting('maxWordLength');
		document.getElementById('dateFormatSetting').value = ajaxChat.getSetting('dateFormat');
		document.getElementById('persistFontColorSetting').checked = ajaxChat.getSetting('persistFontColor');
		for(var i=0; i<document.getElementById('audioVolumeSetting').options.length; i++) {
			if(document.getElementById('audioVolumeSetting').options[i].value == ajaxChat.getSetting('audioVolume')) {
				document.getElementById('audioVolumeSetting').options[i].selected = true;
				break;
			}
		}
		ajaxChat.fillSoundSelection('soundReceiveSetting', ajaxChat.getSetting('soundReceive'));
		ajaxChat.fillSoundSelection('soundSendSetting', ajaxChat.getSetting('soundSend'));
		ajaxChat.fillSoundSelection('soundEnterSetting', ajaxChat.getSetting('soundEnter'));
		ajaxChat.fillSoundSelection('soundLeaveSetting', ajaxChat.getSetting('soundLeave'));
		ajaxChat.fillSoundSelection('soundChatBotSetting', ajaxChat.getSetting('soundChatBot'));
		ajaxChat.fillSoundSelection('soundErrorSetting', ajaxChat.getSetting('soundError'));
		document.getElementById('blinkSetting').checked = ajaxChat.getSetting('blink');
		document.getElementById('blinkIntervalSetting').value = ajaxChat.getSetting('blinkInterval');
		document.getElementById('blinkIntervalNumberSetting').value = ajaxChat.getSetting('blinkIntervalNumber');
	},
			
	ajaxChat.handleLogout = function(url) {
		logoutForm  = $("#ajaxchat_logout_form");
		
		if (typeof logoutForm !== undefined) {
			logoutForm.submit();
		}
	},
	
	ajaxChat.isAllowedToReportMessage = function(messageID, userID, userRole, channelID) {
		// Check that user is not guest and reported user is not admin
		return (this.userRole != 0 && userRole < 4);
	},
	
	ajaxChat.getReportLink = function(messageID, userID, userName, userRole, channelID) {
		if(messageID !== null && this.isAllowedToReportMessage(messageID, userID, userRole, channelID)) {
			if(!arguments.callee.reportMessage) {
				arguments.callee.reportMessage = this.encodeSpecialChars(this.lang['reportMessage']);
			}
			return	'<a class="report OverlayTrigger" title="'
					+ arguments.callee.reportMessage
						+ '" href="index.php?chat/'+ messageID + '/report"> </a>'; 
						// Adding a space - without any content Opera messes up the chatlist display
		}
		return '';
	},
	
	ajaxChat.getChatListMessageString = function(dateObject, userID, userName, userRole, messageID, messageText, channelID, ip) {
		var rowClass = this.DOMbufferRowClass;
		var userClass = this.getRoleClass(userRole);
		var colon;
		if(messageText.indexOf('/action') == 0 || messageText.indexOf('/me') == 0 || messageText.indexOf('/privaction') == 0) {
			userClass += ' action';
			colon = ' ';
		} else {
			colon = ': ';
		}
		var dateTime = this.settings['dateFormat'] ? '<span class="dateTime">'
						+ this.formatDate(this.settings['dateFormat'], dateObject) + '</span> ' : '';
		return	'<div id="'
				+ this.getMessageDocumentID(messageID)
				+ '" class="'
				+ rowClass
				+ '">'
				+ this.getReportLink(messageID, userID, userName, userRole, channelID)
				+ this.getDeletionLink(messageID, userID, userRole, channelID)
				+ dateTime
				+ '<span class="'
				+ userClass
				+ '"'
				+ this.getChatListUserNameTitle(userID, userName, userRole, ip)
				+ ' dir="'
				+ this.baseDirection
				+ '" onclick="ajaxChat.insertText(this.firstChild.nodeValue);">'
				+ userName
				+ '</span>'
				+ colon
				+ this.replaceText(messageText)
				+ '</div>';
	},
	
	ajaxChat.updateChatlistView = function() {		
		if(this.dom['chatList'].childNodes && this.settings['maxMessages']) {
			while(this.dom['chatList'].childNodes.length > this.settings['maxMessages']) {
				this.dom['chatList'].removeChild(this.dom['chatList'].firstChild);
			}
		}
		
		if(this.settings['autoScroll']) {
			this.dom['chatList'].scrollTop = this.dom['chatList'].scrollHeight;
		}
		// AjaxChat XF overlay activation
		$("#" + ajaxChatConfig.domIDs['chatList']).xfActivate();
	},
	
	ajaxChat.showHide = function(id, styleDisplay, displayInline) {
		var node = $('#' + id);
		if(node) {
			if(styleDisplay) {
				if(styleDisplay == 'none') {
					node.xfFadeUp(XenForo.speed.normal); 
				} else {
					node.xfFadeDown(XenForo.speed.normal);
				}
			} else {
				if(node.css('display') == 'none') {
					node.xfFadeDown(XenForo.speed.normal).css('display', (displayInline ? 'inline' : 'block'));
				} else {
					node.xfFadeUp(XenForo.speed.normal);
				}
			}
		}
	},
	
	ajaxChat.toggleContainer = function(containerID, hideContainerIDs) {
		if(hideContainerIDs) {
			for(var i=0; i<hideContainerIDs.length; i++) {
				$('#' + hideContainerIDs[i]).hide();
			}
		}		
		$('#' + containerID).toggle();
	}
	/*,
	
	// TODO: Add a bit of XF Jquery flavor
	ajaxChat.updateDOM = function(id, str, prepend, overwrite) {
		var domNode = this.dom[id] ? this.dom[id] : document.getElementById(id);
		if(!domNode) {
			return;
		}
		try {
			// Test for validity before adding the string to the DOM:
			domNode.cloneNode(false).innerHTML = str;
			if(overwrite) {
				domNode.innerHTML = str;
			} else if(prepend) {
				domNode.innerHTML = str + domNode.innerHTML;
			} else {
				domNode.innerHTML += str;
			}
		} catch(e) {
			this.addChatBotMessageToChatList('/error DOMSyntax '+id);
			this.updateChatlistView();
		}
	}*/
