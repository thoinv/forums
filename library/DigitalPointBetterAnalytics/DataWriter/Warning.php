<?php

class DigitalPointBetterAnalytics_DataWriter_Warning extends XFCP_DigitalPointBetterAnalytics_DataWriter_Warning
{
	/**
	 * Post-save handling.
	 *
	 * Note: not run when importing
	 */
	protected function _postSave()
	{
		parent::_postSave();

		if ($this->isInsert() && !empty(XenForo_Application::getOptions()->dpAnalyticsEvents['warning']) && !empty(XenForo_Application::getOptions()->dpAnalyticsInternal['v']))
		{
			$analyticsClientId = $lastIp = null;
			$userModel = $this->_getUserModel();

			if ($user = $userModel->getUserById($this->get('user_id'), array('join' => XenForo_Model_User::FETCH_USER_PROFILE)))
			{
				$user = $userModel->prepareUser($user);
				$analyticsClientId = @$user['customFields']['analytics_cid'];

				$lastIp = XenForo_Model::create('DigitalPointBetterAnalytics_Model_Analytics')->getLastIp($user['user_id']);
			}

			DigitalPointBetterAnalytics_Helper_Analytics::getInstance()->event(
				XenForo_Application::getOptions()->googleAnalyticsWebPropertyId,
				$analyticsClientId,
				$user['user_id'],
				$lastIp,
				'User',
				'Warning',
				@$user['username'] . ': ' . $this->get('title')
			);

		}
	}
}