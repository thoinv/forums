<?php

class DigitalPointBetterAnalytics_DataWriter_DiscussionMessage_ProfilePost extends XFCP_DigitalPointBetterAnalytics_DataWriter_DiscussionMessage_ProfilePost
{
	protected function _messagePostSave()
	{
		parent::_messagePostSave();

		if ($this->isInsert() && !empty(XenForo_Application::getOptions()->dpAnalyticsEvents['content']) && !empty(XenForo_Application::getOptions()->dpAnalyticsInternal['v']))
		{
			$customFields = XenForo_Visitor::getInstance()->get('customFields');


			if (!$profileUser = $this->getExtraData(self::DATA_PROFILE_USER))
			{
				$userModel = $this->_getUserModel();

				$profileUser = $userModel->getUserById($this->get('profile_user_id'));
			}

			DigitalPointBetterAnalytics_Helper_Analytics::getInstance()->event(
				XenForo_Application::getOptions()->googleAnalyticsWebPropertyId,
				@$customFields['analytics_cid'],
				XenForo_Visitor::getUserId(),
				@$_SERVER['REMOTE_ADDR'],
				'Content',
				'Profile Post',
				@$profileUser['username']
			);
		}
	}
}