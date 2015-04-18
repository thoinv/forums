<?php

class DigitalPointBetterAnalytics_DataWriter_ConversationMessage extends XFCP_DigitalPointBetterAnalytics_DataWriter_ConversationMessage
{
	/**
	 * Post-save handling.
	 */
	protected function _postSave()
	{
		parent::_postSave();

		if ($this->isInsert() && !empty(XenForo_Application::getOptions()->dpAnalyticsEvents['content']) && !empty(XenForo_Application::getOptions()->dpAnalyticsInternal['v']))
		{
			$customFields = XenForo_Visitor::getInstance()->get('customFields');

			$conversation = $this->_getConversationModel()->getConversationMasterById($this->get('conversation_id'));

			DigitalPointBetterAnalytics_Helper_Analytics::getInstance()->event(
				XenForo_Application::getOptions()->googleAnalyticsWebPropertyId,
				@$customFields['analytics_cid'],
				XenForo_Visitor::getUserId(),
				@$_SERVER['REMOTE_ADDR'],
				'Content',
				'Conversation Message',
				@$conversation['title']
			);
		}

	}
}