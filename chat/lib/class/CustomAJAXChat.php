<?php
/*
 * @package AJAX_Chat
* @author Sebastian Tschan
* @copyright (c) Sebastian Tschan
* @license GNU Affero General Public License
* @link https://blueimp.net/ajax/
*/

class CustomAJAXChat extends AJAXChat {

	// Override to initialize custom configuration settings:
	function initCustomConfig() {

		/*
		 * These should overwrite the options previously loaded in the $this->_config var.
		*/

		/*
		 * TODO: Manage the following options
		* - socketServer options
		*/

		// Fetching XenForo options
		$options = XenForo_Application::getOptions();
		if ($options->get('modm_ajaxchat_options_dbhost')) {

			// Map all the options on AJAX-Chat config

			// Database options : host, user, pass & name
			$this->_config['dbConnection']['host'] = $options->get('modm_ajaxchat_options_dbhost');
			$this->_config['dbConnection']['user'] = $options->get('modm_ajaxchat_options_dbuser');
			$this->_config['dbConnection']['pass'] = $options->get('modm_ajaxchat_options_dbpass');
			$this->_config['dbConnection']['name'] = $options->get('modm_ajaxchat_options_dbname');

			// Query LIMIT and time cutoff
			$this->_config['requestMessagesLimit'] = $options->get('modm_ajaxchat_options_querymessagelimit');
			$this->_config['requestMessagesTimeDiff'] = $options->get('modm_ajaxchat_options_querymessagecutoff');
			
			// Close chat
			$this->_config['chatClosed'] = ($options->get('modm_ajaxchat_options_chatclosed') != "0");

			// Guests options
			// TODO: use permissions to allow gest logins
			$this->_config['allowGuestLogins'] = ($options->get('modm_ajaxchat_options_allowguests') != "0");
			$this->_config['allowGuestWrite'] = ($options->get('modm_ajaxchat_options_allowguestwrites') != 0);

			// Custom ChatBot name
			$this->_config["chatBotName"] = $options->get('modm_ajaxchat_options_chatbotname');

			// Channels generation options
			$this->_config["selectedNodes"] = $options->get('modm_ajaxchat_options_channels');
			$this->_config["defaultChannelID"] = $options->get('modm_ajaxchat_options_defaultchannel');
	
			/* 
			 * Ensure that defaultChannelID is in selectedNodes array. If not, add it.
			 * Note that leaving any of these two options blank in AJAX-Chat settings 
			 * page will generate a "wrong channel" error.
			 */
			if (!in_array($this->_config["defaultChannelID"], $this->_config["selectedNodes"])) {
				$this->_config["selectedNodes"][] = $this->_config["defaultChannelID"];
			}
			
			if ($options->get('modm_ajaxchat_options_limit_channels') != 0) {
				// Private channels & messages not allowed.
				$this->_config["limitChannelsList"] =  $options->get('modm_ajaxchat_options_channels');
			} else {
				$this->_config["limitChannelsList"] = null;
			}
			// TODO : Use permissions to manage private channels and messages
			$this->_config['allowPrivateChannels'] =  ($options->get('modm_ajaxchat_options_allow_pchannels') != 0);
			$this->_config['allowPrivateMessages'] =  ($options->get('modm_ajaxchat_options_allow_pmessages') != 0);

			$this->_config['showChannelMessages'] = ($options->get('modm_ajaxchat_options_show_infomessages') != 0);

			// TODO : Use permissions to select opening hours?
			// Opening hours options
			$this->_config['openingHour'] = $options->get('modm_ajaxchat_options_openinghour');
			$this->_config['closingHour'] = $options->get('modm_ajaxchat_options_closinghour');
			// (0=Sunday to 6=Saturday)
			$this->_config['openingWeekDays'] = $options->get('modm_ajaxchat_options_openingweekdays');

			// TODO: Use permissions to manage username and message rate limits
			// Max Users, username & text Max Length, message rate, ban time
			$this->_config['maxUsersLoggedIn'] = $options->get('modm_ajaxchat_options_maxusers');
			$this->_config['userNameMaxLength'] = intval($options->get('usernameLength', 'max'));
			$this->_config['messageTextMaxLength'] = $options->get('modm_ajaxchat_options_maxmessagelen');
			$this->_config['maxMessageRate'] = $options->get('modm_ajaxchat_options_maxmessagerate');
			$this->_config['defaultBanTime'] = $options->get('modm_ajaxchat_options_defaultbantime');

			// TODO : Use permissions to manage guest usernames or prefixes
			// Guests usernames options
			$this->_config['allowGuestUsername'] = ($options->get('modm_ajaxchat_options_allowguestusername') != 0);
			$this->_config['guestUserPrefix'] = $options->get('modm_ajaxchat_options_guestusernameprefix');
			$this->_config['guestUserSuffix'] = $options->get('modm_ajaxchat_options_guestusernamesuffix');

			// TODO : Use permissions to manager nick changes
			// Usernames options
			$this->_config['allowNickChange'] = ($options->get('modm_ajaxchat_options_allownickchange') != 0);
			$this->_config['changedNickPrefix'] = $options->get('modm_ajaxchat_options_nickprefix');
			$this->_config['changedNickSuffix'] = $options->get('modm_ajaxchat_options_nicksuffix');
				
			// Channel Prefixes/Suffixes
			$this->_config['privateChannelPrefix'] = $options->get('modm_ajaxchat_options_pchanprefix');
			$this->_config['privateChannelSuffix'] = $options->get('modm_ajaxchat_options_pchansuffix');

			// TODO : Use permissions to manage user message deletion
			// messages management options
			$this->_config['allowUserMessageDelete'] = ($options->get('modm_ajaxchat_options_allowdelete') != 0);
			
			// Teaser and previous messages display
			$this->_config['requestMessagesPriorChannelEnter'] = ($options->get('modm_ajaxchat_options_priormessage') != 0);

			
			// TODO : Use permissions to allow logs access
			// Logs options
			$this->_config['logsPurgeLogs'] = $options->get('modm_ajaxchat_options_purgelogs');
			$this->_config['logsPurgeTimeDiff'] = $options->get('modm_ajaxchat_options_logscutoff');
			$this->_config['logsUserAccess'] = ($options->get('modm_ajaxchat_options_logsuseraccess') != 0);

			/*
			 * Options set to default values ATM:
			* ================================
			*/
			// Set logout redirect to addon logout page.
			$this->_config["logoutData"] = XenForo_Link::buildPublicLink('canonical:chat/logout');
			// Force autologin to true if guests are not allowed. Force to false if guests are allowed.
			$this->_config["forceAutoLogin"] = !$this->_config['allowGuestUsername'];
			// IP Check default to false. Setting it to true is known to cause some unwanted logouts.
			$this->_config['ipCheck'] = false;
		}
		
		// Checks whether we are in a widget or not
		if (!isset($this->_config['modm_widget'])) {
			$this->_config['modm_widget'] = 0;
		}
			
	}
	
	// Returns an associative array containing userName, userID and userRole
	// Returns null if login is invalid
	function getValidLoginUserData() {
		// Fetch current visitor info
		$visitor = XenForo_Visitor::getInstance();

		if ((!$visitor->hasPermission('modm_ajaxchat', 'ajax_chat_user_access'))
		&& (!$visitor->hasPermission('modm_ajaxchat', 'ajax_chat_guest_access'))) {
			return null;
		}
		
		if ($visitor['user_id']) {
			// Registered user
			$userData = array();
			$userData['userID'] = $visitor['user_id'];
			$userData['userName'] = $this->trimUserName($visitor['username']);
			
			// TODO : Use permissions to set role.
			if ($visitor['is_admin'])
			{
				$userData['userRole'] = AJAX_CHAT_ADMIN;
			} else {
				$moderatorGroup = intval(XenForo_Application::getOptions()->get('modm_ajaxchat_options_moderatorgroup'));
				if ($visitor->isMemberOf($moderatorGroup)) {
					$userData['userRole'] = AJAX_CHAT_MODERATOR;
				} else {
					$userData['userRole'] = AJAX_CHAT_USER;
				}
			}
			
			return $userData;
		} else {
			// Guest user
			return $this->getGuestUser();
		}
	}

	// Returns true if the userID of the logged in user is identical to the userID of the authentication system
	// or the user is authenticated as guest in the chat and the authentication system
	function revalidateUserID() {
		// Gets current visitor info
		$visitor = XenForo_Visitor::getInstance();

		// Additional check for a potential change in guest config.
		if ($this->getUserRole() === AJAX_CHAT_GUEST && !$this->_config['allowGuestLogins']) {
			return false;
		}

		if($this->getUserRole() === AJAX_CHAT_GUEST && !$visitor['user_id'] || ($this->getUserID() === $visitor['user_id'])) {
			return true;
		}
		return false;
	}

	// Add values to the request variables array: $this->_requestVars['customVariable'] = null;
	function initCustomRequestVars() {
		if($this->getRequestVar('logout') != true) {
			// Fetch current visitor info
			$visitor = XenForo_Visitor::getInstance();

			// Auto login user is authenticated in XenForo
			if ($visitor['user_id'] != 0) {
				$this->setRequestVar('login', true);
			}
		}
	}



	// Store the channels the current user has access to
	// Make sure channel names don't contain any whitespace
	function &getChannels() {
		if($this->_channels === null) {
			$this->_channels = array();

			// Fetch visitor & visitor permissions combo
			$visitor = XenForo_Visitor::getInstance();
			$permissionCombinationId = $visitor['permission_combination_id'];

			/* @var $nodeModel XenForo_Model_Node */
			$nodeModel = XenForo_Model::create("XenForo_Model_Node");

			$categoryModel = $this->_getCategoryModel();

			// Add the valid channels to the channel list (the defaultChannelID is always valid):
			foreach ($this->getAllChannels() AS $key => $nodeId) {
				// Check if we have to limit the available channels:
				if($this->getConfig('limitChannelList') && !in_array($nodeId, $this->getConfig('limitChannelList'))) {
					continue;
				}

				// Checks user permissions, using canViewCategory, whether this actually is a category or not (same behavior).
				if(in_array($nodeId, $this->_channels) || $categoryModel->canViewCategory(array('node_id' => $nodeId))) {
					$this->_channels[$key] = $nodeId;
				}
			}
		}
		return $this->_channels;
	}

	// Store all existing channels
	// Make sure channel names don't contain any whitespace
	function &getAllChannels() {
		if($this->_allChannels === null) {
			$this->_allChannels = array();

			/* @var $nodeModel MODM_AJAXChat_Model_Node */
			$nodeModel = XenForo_Model::create("XenForo_Model_Node");

			if ($this->getConfig('selectedNodes')) {
				$nodeIds = $this->getConfig('selectedNodes');
			} else {
				$nodeIds = array();
			}


			// Get all forums and/or categories (depending on config)
			$allChannels = $nodeModel->getNodesByIds($nodeIds);

			foreach($allChannels as $nodeId=>$node) {
				$nodeTitle = $this->trimChannelName($node['title']);
				$this->_allChannels[$nodeTitle] = $nodeId;
			}
		}
		return $this->_allChannels;
	}

	function isAllowedToReportMessage($message) {
		return (intval($message['userRole']) < 4 && XenForo_Visitor::getInstance()->getUserId() != 0);
	}

	function getTemplateFileName() {
		$options = XenForo_Application::getOptions();
		$disableUI = ($options->get('modm_ajaxchat_options_disableacui') != 0);
		
		if ($disableUI) {
			header('Location: ' . XenForo_Application::getOptions()->get('boardUrl'));
			die();
		}
		
		switch($this->getView()) {
			case 'chat':
				return AJAX_CHAT_PATH.'lib/template/loggedIn.html';
			case 'logs':
				return AJAX_CHAT_PATH.'lib/template/logs.html';
			default:
				return AJAX_CHAT_PATH.'lib/template/loggedOut.html';
		}
	}
	
	function replaceCustomTemplateTags($tag, $tagContent) {
		switch($tag) {
				/*
				* TODO Implement: These must be distinct settings.
				*/				
			case 'MODM_AJAXCHAT_SHOUTBOX_AUTOSTART':
			case 'MODM_AJAXCHAT_SHOUTBOX_AUTOFOCUS':
			case 'MODM_AJAXCHAT_SHOUTBOX_BLINK':
				/*
				 * Disable autofocus and blink in widget mode.
				 * (pay attention below, "shoutbox" means "widget" in AJAX Chat)
				 */
				return ($this->getConfig("modm_widget") != 1);
				break;
			case 'MODM_AJAXCHAT_BOARD_URL':
				return XenForo_Application::getOptions()->get('boardUrl');
				break;
		}
	}

	/**
	 * @return XenForo_Model_Category
	 *
	 */
	protected function _getCategoryModel() {
		return XenForo_Model::create("XenForo_Model_Category");
	}
}
?>