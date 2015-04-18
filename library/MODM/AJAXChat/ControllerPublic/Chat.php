<?php

class MODM_AJAXChat_ControllerPublic_Chat extends XenForo_ControllerPublic_Abstract
{
	public function _preDispatch($action)
	{
		if (!XenForo_Visitor::getInstance()->hasPermission('modm_ajaxchat', 'ajax_chat_view'))
		{
			throw $this->getErrorOrNoPermissionResponseException('');
		};
	}

	/**
	 * Disable CSRF checking for language selection.
	 */
	protected function _checkCsrf($action)
	{
		if (strtolower($action) == 'selectlang')
		{
			// No CSRF token generated in AJAX-Chat template system...
			return;
		}

		parent::_checkCsrf($action);
	}

	protected function _assertCanAccessChat()
	{
		if ((!XenForo_Visitor::getInstance()->hasPermission('modm_ajaxchat', 'ajax_chat_user_access'))
		&& (!XenForo_Visitor::getInstance()->hasPermission('modm_ajaxchat', 'ajax_chat_guest_access')))
		{
			throw $this->getErrorOrNoPermissionResponseException('');
		}
	}

	protected function _assertCanModerateChat()
	{
		if (!XenForo_Visitor::getInstance()->hasPermission('modm_ajaxchat', 'ajax_chat_mod_access'))
		{
			throw $this->getErrorOrNoPermissionResponseException('');
		}
	}

	protected function _assertCanReportMessage($message)
	{
		if (!$this->_getChatModel()->isAllowedToReporteMessage($message))
		{
			throw $this->getErrorOrNoPermissionResponseException('');
		}
	}

	public function actionLogout()
	{
		$this->_assertCanAccessChat();

		if (!$this->_request->isPost())
		{
			return $this->responseRedirect(
					XenForo_ControllerResponse_Redirect::SUCCESS,
					XenForo_Link::buildPublicLink('chat/login')
			);
		}

		return $this->responseView('MODM_AJAXChat_ViewPublic_View', 'modm_ajaxchat_logout', array());
	}

	public function actionLogin()
	{
		$this->_assertCanAccessChat();

		$options = XenForo_Application::getOptions();

		$viewParams = array(
				"promptForUsername" => (XenForo_Visitor::getUserId() == 0) && ($options->get('modm_ajaxchat_options_allowguestusername') != 0)
		);

		return $this->responseView('MODM_AJAXChat_ViewPublic_View', 'modm_ajaxchat_login', $viewParams);
	}

	public function actionSelectLang()
	{
		$this->_assertPostOnly();

		if ($lang = $this->_input->filterSingle('lang', XenForo_Input::STRING))
		{
			// Doing additional filtering for security purposes.
			$ajaxChatLangs = $this->_getChatModel()->getConfig('langAvailable');
			if (!empty ($lang) && in_array($lang, $ajaxChatLangs))
			{
				$redirectParams = array('lang' => $lang);
			}
			else
			{
				$redirectParams = array();
			}
				
			return $this->responseRedirect(
					XenForo_ControllerResponse_Redirect::SUCCESS,
					XenForo_Link::buildPublicLink('chat/shoutbox', null, $redirectParams));
		}
		else
		{
			throw $this->getErrorOrNoPermissionResponseException('');
		}
	}

	public function actionShoutbox()
	{
		$this->_assertCanAccessChat();

		$chatModel = $this->_getChatModel();

		if (!$chatModel->isUserOnline(XenForo_Visitor::getUserId()) && !$this->_request->isPost())
		{
			return $this->responseRedirect(
					XenForo_ControllerResponse_Redirect::SUCCESS,
					XenForo_Link::buildPublicLink('chat/login')
			);
		}

		if (XenForo_Visitor::getUserId() == 0)
		{
			$options = XenForo_Application::getOptions();

			if ($options->get('modm_ajaxchat_options_allowguestusername') != 0)
			{
				$guestUserName = $this->_input->filterSingle("userName",XenForo_Input::STRING);

				$chatModel->setRequestVar("userName", $chatModel->trimUserName($guestUserName));
				$chatModel->initSession();
			}
		}

		if ($lang = $this->_input->filterSingle('lang', XenForo_Input::STRING))
		{
			$chatModel->setRequestVar('lang', $lang);
		}

		$viewParams = array(
				'ajaxchat_shoutbox' => $chatModel->getShoutBoxContent()
		);

		return $this->responseView('MODM_AJAXChat_ViewPublic_View', 'modm_ajaxchat_shoutbox', $viewParams);
	}

	public function actionOnline()
	{
		$viewParams = array();

		$ajaxChat = $this->_getChatModel();

		if($ajaxChat->isAllowedToListHiddenUsers())
		{
			//TODO : Set hidden users in chat.
			// List online users from any channel:
			$viewParams = array('ajaxchat_online' => $this->getOnlineUsers());
		}
		else
		{
			// Removes inactive users
			$ajaxChat->checkAndRemoveInactive();

			// Get online users for all accessible channels:
			$channels = $ajaxChat->getChannels();
			// Add the own private channel if allowed:
			if($ajaxChat->isAllowedToCreatePrivateChannel())
			{
				array_push($channels, $ajaxChat->getPrivateChannelID());
			}
			// Add the invitation channels:
			foreach($ajaxChat->getInvitations() as $channelID)
			{
				if(!in_array($channelID, $channels))
				{
					array_push($channels, $channelID);
				}
			}

			$userNames = $ajaxChat->getOnlineUsers($channels);

			/* @var $userModel XenForo_Model_User */
			$userModel = $this->getModelFromCache("XenForo_Model_User");

			$ajaxChat = $userModel->getUsersByNames($userNames);

			$viewParams = array('ajaxchat_online' => $ajaxChat);
		}

		return $this->responseView('MODM_AJAXChat_ViewPublic_View', 'modm_ajaxchat_online', $viewParams);
	}

	public function actionChatLogs()
	{
		// TODO Use POST with message_id just like actionReport()
		$this->_assertCanModerateChat();

		$id = $this->_input->filterSingle('id', XenForo_Input::INT);
		$chatModel = $this->_getChatModel();
		$lastItemId = 0;
		$logEntries = null;

		if ($id)
		{
			$logEntries = $chatModel->getChatLogs(array("message_id" => $id));
			$lastItemId = $id;
		}

		$dateTime = new DateTime('@' . XenForo_Application::$time);
		$dateTime = $dateTime->format('Y-m-d');
		$chatBotId = $chatModel->getChatBotId();
		$channels = $chatModel->getChannels();

		$viewParams = array(
				"lastItemId" => $lastItemId,
				"dateTime" => $dateTime,
				"channels" => $channels,
				"chatBotId" => $chatBotId,
				"logEntries" => $logEntries
		);

		// return a View (MODM_AJAXChat_ViewPublic_Index) using template 'modm_ajaxchat_logs'
		return $this->responseView(
				'MODM_AJAXChat_ViewPublic_Index',
				'modm_ajaxchat_logs',
				$viewParams
		);
	}

	public function actionLogs()
	{
		// this action must be called via POST
		$this->_assertPostOnly();
		$this->_assertCanModerateChat();

		// guests not allowed
		$this->_assertRegistrationRequired();

		// fetch and clean the message text from input
		$input = $this->_input->filter(array(
				"usernames" => XenForo_Input::STRING,
				"dateBefore_date" => XenForo_Input::STRING,
				"dateBefore_hour" => XenForo_Input::STRING,
				"dateBefore_mins" => XenForo_Input::STRING,
				"dateAfter_date" => XenForo_Input::STRING,
				"dateAfter_hour" => XenForo_Input::STRING,
				"dateAfter_mins" => XenForo_Input::STRING,
				"lastItemId" => XenForo_Input::INT,
				"channels" => XenForo_Input::INT)
		);

		// only run this code if the action has been loaded via XenForo.ajax()
		if ($this->_noRedirect())
		{
			$dateBefore = $input['dateBefore_date']
			. " "
					. $input['dateBefore_hour']
					. ":"
							. str_pad($input['dateBefore_mins'], 2, "0", STR_PAD_LEFT)
							. ":00";

			$dateAfter = $input['dateAfter_date']
			. " "
					. $input['dateAfter_hour']
					. ":"
							. str_pad($input['dateAfter_mins'], 2, "0", STR_PAD_LEFT)
							. ":00";

			$conditions = array();

			if ($input['usernames'])
			{
				$usernames = explode(',', $input['usernames']);
				//die(var_dump($usernames));
				foreach($usernames AS $key => &$username)
				{
					$username = trim($username);
					if ($username == "")
					{
						unset($usernames[$key]);
					}
				}
				$conditions['usernames'] = $usernames;
			}

			if ($input['channels'])
			{
				$conditions['channels'] = array($input['channels']);
			}

			if ($dateBefore)
			{
				$conditions['dateBefore'] = $dateBefore;
			}

			if ($dateAfter)
			{
				$conditions['dateAfter'] = $dateAfter;
			}



			$conditions['last_message_id'] = $input['lastItemId'];

			$ajaxChatModel = $this->_getChatModel();
			$logEntries = $ajaxChatModel->getChatLogs($conditions);
			$chatBotId = $ajaxChatModel->getChatBotId();
			$lastItem = end($logEntries);

			// put the data into an array to be passed to the view so the template can use it
			$viewParams = array(
					'logEntries' => $logEntries,
					'lastItemId' =>  $lastItem ? $lastItem['message_id'] : 0,
					'chatBotId' => $chatBotId
			);

			// return a View (MODM_AJAXChat_ViewPublic_Logs) using template 'modm_ajaxchat_logentries'
			return $this->responseView('MODM_AJAXChat_ViewPublic_Logs', ($input['lastItemId'] ? 'modm_ajaxchat_nextlogentries' : 'modm_ajaxchat_logentries'), $viewParams);
		}

		// redirect back to the normal chat logs page
		return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildPublicLink('chat/chat-logs')
		);
	}

	public function actionReport()
	{
		$id = $this->_input->filterSingle('message_id', XenForo_Input::INT);

		$chatModel = $this->_getChatModel();
		$content = $chatModel->getChatLogs(array("message_id" => $id));
		if (isset($content[0]) && is_array($content[0]))
		{
			$chatMessage = $content[0];
		}
		else
		{
			throw $this->getErrorOrNoPermissionResponseException('');
		}

		$this->_assertCanReportMessage($chatMessage);

		if ($this->_request->isPost())
		{
			$message = $this->_input->filterSingle('message', XenForo_Input::STRING);
			if (!$message)
			{
				return $this->responseError(new XenForo_Phrase('please_enter_reason_for_reporting_this_message'));
			}

			$this->assertNotFlooding('report');

			$reportModel = XenForo_Model::create('XenForo_Model_Report');
			$reportModel->reportContent('ajaxchat_message', $chatMessage, $message);

			$controllerResponse = $this->responseRedirect(
					XenForo_ControllerResponse_Redirect::SUCCESS,
					XenForo_Link::buildPublicLink('chat/shoutbox') . "#"
			);
			$controllerResponse->redirectMessage = new XenForo_Phrase('thank_you_for_reporting_this_message');
			return $controllerResponse;
		}
		else
		{
			$viewParams = array(
					'chatMessage' => $chatMessage
			);

			return $this->responseView('XenForo_ViewPublic_Chat_Report', 'modm_ajaxchat_message_report', $viewParams);
		}
	}

	public static function getSessionActivityDetailsForList(array $activities)
	{
		if (XenForo_Visitor::getInstance()->hasPermission('modm_ajaxchat', 'ajax_chat_view'))
		{
			foreach ($activities as $key => $activity)
			{
				switch ($activity['controller_action'])
				{
					case "Online":
						{
							$output[$key] = array(
									new XenForo_Phrase('modm_ajaxchat_viewing_online_list'),
									new XenForo_Phrase('modm_ajaxchat_tabname'),
									XenForo_Link::buildBasicLink('chat', 'online'),
									false
							);
							break;
						}
					case "Logs":
					case "ChatLogs":
						{
							$output[$key] = new XenForo_Phrase('performing_moderation_duties');
							break;
						}
					default:
						{
							$output[$key] = array(
									new XenForo_Phrase('modm_ajaxchat_browsing'),
									new XenForo_Phrase('modm_ajaxchat_tabname'),
									XenForo_Link::buildBasicLink('chat', 'login'),
									false
							);
							break;
						}
				}
			}

			return $output;
		}
	}

	/**
	 *  @return MODM_AjaxChat_Model_Chat
	 *
	 */
	protected function _getChatModel()
	{
		return $this->getModelFromCache("MODM_AJAXChat_Model_Chat");
	}

	/**
	 * @return XenForo_Model_User
	 *
	 */
	protected function _getUserModel()
	{
		return $this->getModelFromCache("XenForo_Model_User");
	}
}