<?php

class EWRporta_Block_AjaxChatOnline extends XenForo_Model
{
	public function getModule()
	{
		if (!XenForo_Visitor::getInstance()->hasPermission('modm_ajaxchat', 'ajax_chat_view'))
		{
			return "killModule";
		};
		
		/* @var $ajaxChatModel MODM_AJAXChat_Model_Chat */
		$ajaxChatModel = $this->getModelFromCache("MODM_AJAXChat_Model_Chat");

		/* 
		 * Removes inactive users
		 * This is done in modules instead of interface in order to save
		 * queries: 1 query instead of 3 for portal load when checkAndRemoveInactive
		 * is called on MODM_AJAXChat_Model_Chat::__construc().
		 * 
		 */
		$ajaxChatModel->checkAndRemoveInactive();
		
		// Get online users for all accessible channels:
		$channels = $ajaxChatModel->getChannels();
			
		// Add the own private channel if allowed:
		if($ajaxChatModel->isAllowedToCreatePrivateChannel())
		{
			array_push($channels, $ajaxChat->getPrivateChannelID());
		}
			
		// Add the invitation channels:
		foreach($ajaxChatModel->getInvitations() as $channelID)
		{
			if(!in_array($channelID, $channels))
			{
				array_push($channels, $channelID);
			}
		}

		$userNames = $ajaxChatModel->getOnlineUsers($channels);

		// Do not display anything if chatroom is empty
		if (empty($userNames))
		{
			return "killModule";
		}
		
		/* @var $userModel XenForo_Model_User */
		$userModel = XenForo_Model::create("XenForo_Model_User");
			
		$guestUsers = array();
		$ajaxChat['onlineUsers'] = $userModel->getUsersByNames($userNames, array(), $guestUsers);
		$ajaxChat['members'] = count($ajaxChat['onlineUsers']);
		$ajaxChat['guests'] = (XenForo_Application::getOptions()->get('modm_ajaxchat_options_allowguests') != "0" ? count($guestUsers) : null);
		$ajaxChat['total'] = $ajaxChat['members'] + $ajaxChat['guests'];
		$ajaxChat['limit'] = ($ajaxChat['members'] < 10 ? $ajaxChat['members'] : 10);
		
		$ajaxChat['recordsUnseen'] = ($ajaxChat['members'] > $ajaxChat['limit'] ? true : false);
			
			
		return $ajaxChat;
	}
}
