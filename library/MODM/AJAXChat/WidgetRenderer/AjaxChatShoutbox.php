<?php
class MODM_AJAXChat_WidgetRenderer_AjaxChatShoutbox extends WidgetFramework_WidgetRenderer
{
	protected function _getConfiguration()
	{
		return array('name' => 'AJAXChat Shoutbox');
	}

	protected function _getOptionsTemplate()
	{
		return false;
	}

	protected function _getRenderTemplate(array $widget, $positionCode, array $params)
	{
		return 'modm_ajaxchat_wf_shoutbox';
	}

	protected function _render(array $widget, $positionCode, array $params, XenForo_Template_Abstract $renderTemplateObject)
	{
		if (!XenForo_Visitor::getInstance()->hasPermission('modm_ajaxchat', 'ajax_chat_view'))
		{
			return "";
		};
		
		/* @var $ajaxChatModel MODM_AJAXChat_Model_Chat */
		$ajaxChatModel = XenForo_Model::create("MODM_AJAXChat_Model_Chat");
		
		$ajaxChat = $ajaxChatModel->getWidgetContent();

		$renderTemplateObject->setParam('AjaxChatShoutbox', $ajaxChat);
			
		return $renderTemplateObject->render();
	}
}