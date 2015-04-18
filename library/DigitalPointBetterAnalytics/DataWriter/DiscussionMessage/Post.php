<?php

class DigitalPointBetterAnalytics_DataWriter_DiscussionMessage_Post extends XFCP_DigitalPointBetterAnalytics_DataWriter_DiscussionMessage_Post
{
	protected function _messagePostSave()
	{
		parent::_messagePostSave();

		if ($this->isInsert() && !empty(XenForo_Application::getOptions()->dpAnalyticsEvents['content']) && !empty(XenForo_Application::getOptions()->dpAnalyticsInternal['v']))
		{
			$customFields = XenForo_Visitor::getInstance()->get('customFields');

			$thread = $this->getDiscussionData();

			DigitalPointBetterAnalytics_Helper_Analytics::getInstance()->event(
				XenForo_Application::getOptions()->googleAnalyticsWebPropertyId,
				@$customFields['analytics_cid'],
				XenForo_Visitor::getUserId(),
				@$_SERVER['REMOTE_ADDR'],
				'Content',
				'Post',
				@$thread['title']
			);
		}
	}
}