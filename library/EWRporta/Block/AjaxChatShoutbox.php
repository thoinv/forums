<?php

class EWRporta_Block_AjaxChatShoutbox extends XenForo_Model
{
	public function getModule()
	{
		if (!XenForo_Visitor::getInstance()->hasPermission('modm_ajaxchat', 'ajax_chat_view'))
		{
			return "killModule";
		};
		
		/* @var $ajaxChatModel MODM_AJAXChat_Model_Chat */
		$ajaxChatModel = $this->getModelFromCache("MODM_AJAXChat_Model_Chat");
		
		$ajaxChat = $ajaxChatModel->getWidgetContent();			
			
		return $ajaxChat;
	}
}
