<?php

class MODM_AJAXChat_Listeners
{
	/**
	 *
	 * Adds the "Chat" tab with permission-based links.
	 *
	 * @param array $extraTabs
	 * @param unknown_type $selectedTabId
	 */
	public static function navTabsListener(array &$extraTabs, $selectedTabId)
	{
		if (XenForo_Visitor::getInstance()->hasPermission('modm_ajaxchat', 'ajax_chat_view'))
		{
			$perms = array(
				"canModerateChat" => XenForo_Visitor::getInstance()->hasPermission('modm_ajaxchat', 'ajax_chat_mod_access'),
				"canAccessChat" => XenForo_Visitor::getInstance()->hasPermission('modm_ajaxchat', 'ajax_chat_user_access')
								|| XenForo_Visitor::getInstance()->hasPermission('modm_ajaxchat', 'ajax_chat_guest_access')
			);
			
			$extraTabs['chat'] = array(
					'title' => new XenForo_Phrase('modm_ajaxchat_tabname'),
					'href' => ($perms['canAccessChat'] ? XenForo_Link::buildPublicLink('chat/login') : XenForo_Link::buildPublicLink('chat/online')),
					'position' => 'middle',
					'linksTemplate' => 'modm_ajaxchat_nav_links',
					'perms' => $perms
			);
		}
	}

	public static function loadClassModel($class, array &$extend)
	{
		switch ($class)
		{
			case "XenForo_Model_Node":
			{
				$extend[] = "MODM_AJAXChat_Model_Node";
				break;
			}
		}
	}
	
	public static function widgetFrameworkReady(array &$renderers)
	{
		$renderers[] = "MODM_AJAXChat_WidgetRenderer_AjaxChatOnline";
		$renderers[] = "MODM_AJAXChat_WidgetRenderer_AjaxChatShoutbox";
	}
}