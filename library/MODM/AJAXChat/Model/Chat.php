<?php

class MODM_AjaxChat_Model_Chat extends XenForo_Model
{
	/**
	 *  @var CustomAJAXChatInterface
	 */
	protected static $_ajaxChatInterface = null;

	public function __construct()
	{
		// URL to the chat directory:
		if(!defined('AJAX_CHAT_URL'))
		{
			define('AJAX_CHAT_URL', './chat/');
		}

		// Path to the chat directory:
		if(!defined('AJAX_CHAT_PATH'))
		{
			define('AJAX_CHAT_PATH', realpath(dirname($_SERVER['SCRIPT_FILENAME']).'/chat').'/');
		}

		// Validate the path to the chat:
		if(@is_file(AJAX_CHAT_PATH.'lib/classes.php'))
		{
			// Include Class libraries:
			require_once(AJAX_CHAT_PATH.'lib/classes.php');

			// Initialize the interface:
			if (!MODM_AJAXChat_Model_Chat::$_ajaxChatInterface)
			{
				MODM_AJAXChat_Model_Chat::$_ajaxChatInterface = new CustomAJAXChatInterface();
			}
		}
	}

	public function __destruct()
	{
		if (MODM_AJAXChat_Model_Chat::$_ajaxChatInterface && MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->db->getConnectionID())
		{
			// Explicitly closing DB connections because it somehow doesn't get closed properly in AJAX Chat...
			@MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->db->getConnectionID()->close();
		}
	}
	
	public function initSession()
	{
		MODM_AjaxChat_Model_Chat::$_ajaxChatInterface->initSession();
	}
	
	public function getSessionVar($key, $prefix=null)
	{
		return MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->getSessionVar($key, $prefix);
	}
	
	public function setSessionVar($key, $value, $prefix=null)
	{
		MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->setSessionVar($key, $value, $prefix);
	}
	
	function getRequestVar($key) {
		return MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->getRequestVar($key);
	}
	
	function setRequestVar($key, $value)
	{
		MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->setRequestVar($key, $value);
	}
	
	function trimUserName($userName)
	{
		return MODM_AjaxChat_Model_Chat::$_ajaxChatInterface->trimUserName($userName);
	}
	
	public function getOnlineUsers($channels)
	{
		return MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->getOnlineUsers($channels);
	}

	public function isUserOnline($userID=null)
	{
		return MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->isUserOnline($userID);
	}
	
	public function isLoggedIn()
	{
		return MODM_AjaxChat_Model_Chat::$_ajaxChatInterface->isLoggedIn();
	}
	
	public function getAllChannels()
	{
		return MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->getAllChannels();
	}

	public function getChannels()
	{
		return MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->getChannels();
	}

	public function getChannelNameFromChannelID($channelID)
	{
		return MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->getChannelNameFromChannelID($channelID);
	}

	public function setUserName($name)
	{
		MODM_AjaxChat_Model_Chat::$_ajaxChatInterface->setUserName($name);
	}
	
	public function isAllowedToCreatePrivateChannel()
	{
		return MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->isAllowedToCreatePrivateChannel();
	}
	
	public function isAllowedToReporteMessage($message)
	{
		return MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->isAllowedToReportMessage($message);
	}
	
	public function insertChatBotMessage($channelID, $messageText)
	{
		return MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->insertChatBotMessage($channelID, $messageText);
	}
	
	public function getPrivateMessageID($userID = null)
	{
		return MODM_AjaxChat_Model_Chat::$_ajaxChatInterface->getPrivateMessageID($userID);
	}
	
	
	public function getPrivateChannelID($userID = null)
	{
		return MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->getPrivateChannelID($userID);
	}

	public function getInvitations()
	{
		return MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->getInvitations();
	}

	public function getShoutboxContent()
	{
		$template = new AJAXChatTemplate(MODM_AJAXChat_Model_Chat::$_ajaxChatInterface, AJAX_CHAT_PATH.'lib/template/shoutbox.html');

		// Return parsed template content:
		return $template->getParsedContent();
	}

	public function getWidgetContent()
	{
		$template = new AJAXChatTemplate(MODM_AJAXChat_Model_Chat::$_ajaxChatInterface, AJAX_CHAT_PATH.'lib/template/widget.html');
	
		MODM_AjaxChat_Model_Chat::$_ajaxChatInterface->setConfig("modm_widget", null, 1);
		
		// Return parsed template content:
		return $template->getParsedContent();
	}
	
	public function isAllowedToListHiddenUsers()
	{
		return MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->isAllowedToListHiddenUsers();
	}

	public function checkAndRemoveInactive()
	{
		return MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->checkAndRemoveInactive();
	}

	/**
	 * Gets a list of SQL conditions in the format for a clause. This always returns
	 * a value that can be used in a clause such as WHERE.
	 *
	 * @param array $sqlConditions
	 *
	 * @return string
	 */
	public function getConditionsForClause(array $sqlConditions)
	{
		if ($sqlConditions)
		{
			return '(' . implode(') AND (', $sqlConditions) . ')';
		}
		else
		{
			return '1=1';
		}
	}

	/**
	 * Prepares a set of conditions to select logs against.
	 *
	 * @param array $conditions List of conditions.
	 * @param array $fetchOptions The fetch options that have been provided. May be edited if criteria requires.
	 *
	 * @return string Criteria as SQL for where clause
	 */
	public function prepareChatLogsConditions(array $conditions)
	{
		$db = $this->_getDb();
		$sqlConditions = array();

		// Do not show private conversations and messages to others than super admins
		if (!XenForo_Visitor::getInstance()->isSuperAdmin())
		{
			$sqlConditions[] = 'channel < ' . MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->getConfig('privateChannelDiff');
		}

		if (!empty($conditions['usernames']) && is_array($conditions['usernames']))
		{
			$sqlConditions[] = 'userName IN (' . $db->quote($conditions['usernames']) . ')';
		}

		if (!empty($conditions['channels']) && is_array($conditions['channels']))
		{
			$sqlConditions[] = 'channel IN (' . $db->quote($conditions['channels']) . ')';
		}

		if (!empty($conditions['dateBefore']))
		{
			$sqlConditions[] = 'dateTime < ' . $db->quote($conditions['dateBefore']);
		}

		if (!empty($conditions['dateAfter']))
		{
			$sqlConditions[] = 'dateTime > ' . $db->quote($conditions['dateAfter']);
		}

		if (!empty($conditions['last_message_id']))
		{
			$sqlConditions[] = 'id > ' . $db->quote($conditions['last_message_id']);
		}

		if (!empty($conditions['message_id']))
		{
			$sqlConditions[] = 'id = ' . $db->quote($conditions['message_id']);
		}

		return $this->getConditionsForClause($sqlConditions);
	}

	public function getChatLogs(array $conditions)
	{
		$db = MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->db;

		$whereClause = $this->prepareChatLogsConditions($conditions);

		$query = "SELECT
					id AS message_id,
					userID AS user_id,
					userName AS username,
					userRole,
					channel AS channel_id,
					UNIX_TIMESTAMP(dateTime) AS message_date,
					text	
				FROM " . MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->getDataBaseTable('messages') . "
				WHERE " . $whereClause . "
				ORDER BY
					id
					ASC
				LIMIT 10"; //TODO: make this limit a setting.


		$result = $db->sqlQuery($query);

		if ($result->error())
		{
			return array();
		}

		$logEntries = array();
		while($row = $result->fetch())
		{
			$logEntries[] = array(
				"message_id" => $row['message_id'],
				"message_date" => $row['message_date'],
				"user_id" => $row['user_id'],
				"username" => $row['username'],
				"userRole" => $row['userRole'],
				"channel_id" => $row['channel_id'],
				"text" => $row['text']
			);
		}

		$result->free();

		return $logEntries;
	}

	public function getChatBotId()
	{
		return MODM_AJAXChat_Model_Chat::$_ajaxChatInterface->getConfig('chatBotID');
	}
	
	public function getOpeningWeekDays()
	{
		return MODM_AjaxChat_Model_Chat::$_ajaxChatInterface->getConfig('openingWeekDays');
	}
	
	public function setConfig($key, $subkey, $value)
	{
		MODM_AjaxChat_Model_Chat::$_ajaxChatInterface->setConfig($key, $subkey, $value);
	}
	
	public function getConfig($key, $subkey = null)
	{
		return MODM_AjaxChat_Model_Chat::$_ajaxChatInterface->getConfig($key, $subkey);
	}
}