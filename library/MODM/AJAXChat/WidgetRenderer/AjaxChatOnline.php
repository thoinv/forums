<?php

class MODM_AJAXChat_WidgetRenderer_AjaxChatOnline extends WidgetFramework_WidgetRenderer
{
	protected function _getConfiguration()
	{
		return array('name' => 'AJAXChat Online Members');
	}

	protected function _getOptionsTemplate()
	{
		return false;
	}
	
	protected function _getRenderTemplate(array $widget, $positionCode, array $params)
	{
		return 'modm_ajaxchat_wf_online';
	}
	
	protected function _render(array $widget, $positionCode, array $params, XenForo_Template_Abstract $renderTemplateObject)
	{
		if (!XenForo_Visitor::getInstance()->hasPermission('modm_ajaxchat', 'ajax_chat_view'))
		{
			return "";
		};
		
		/* @var $ajaxChatModel MODM_AJAXChat_Model_Chat */
		$ajaxChatModel = XenForo_Model::create("MODM_AJAXChat_Model_Chat");
		
		// Removes inactive users
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
		
		/* @var $userModel XenForo_Model_User */
		$userModel = XenForo_Model::create("XenForo_Model_User");
			
		$guestUsers = array();
		$ajaxChat['onlineUsers'] = $userModel->getUsersByNames($userNames, array(), $guestUsers);
		$ajaxChat['members'] = count($ajaxChat['onlineUsers']);
		$ajaxChat['guests'] = (XenForo_Application::getOptions()->get('modm_ajaxchat_options_allowguests') != "0" ? count($guestUsers) : null);
		$ajaxChat['total'] = $ajaxChat['members'] + $ajaxChat['guests'];
		$ajaxChat['limit'] = ($ajaxChat['members'] < 10 ? $ajaxChat['members'] : 10);
		
		$ajaxChat['recordsUnseen'] = ($ajaxChat['members'] > $ajaxChat['limit'] ? true : false);
				
		$renderTemplateObject->setParam('AjaxChat', $ajaxChat);
			
		return $renderTemplateObject->render();
	}
}
