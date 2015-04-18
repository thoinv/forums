<?php

class DigitalPointBetterAnalytics_DataWriter_User extends XFCP_DigitalPointBetterAnalytics_DataWriter_User
{
	/**
	 * Post-save handling.
	 *
	 * Note: not run when importing
	 */
	protected function _postSave()
	{
		parent::_postSave();

		if ($this->isInsert() && !empty(XenForo_Application::getOptions()->dpAnalyticsEvents['registration']) && !empty(XenForo_Application::getOptions()->dpAnalyticsInternal['v']))
		{
			if (XenForo_Application::isRegistered('fc'))
			{
				$action = preg_split('/\b/', strtolower(trim(XenForo_Application::getFc()->route()->getAction())));

				switch ($action[1])
				{
					case 'facebook':
						$label = 'Facebook';
						break;
					case 'google':
						$label = 'Google';
						break;
					case 'twitter':
						$label = 'Twitter';
						break;
					default:
						$label = 'Standard'; // would have preferred to leave this blank, but a null value causes it to be omitted from certain reports in Analytics
				}
			}
			else
			{
				$label = null;
			}

			$user = $this->getMergedData();

			if (XenForo_Application::isRegistered('fc'))
			{
				$analyticsClientId = XenForo_Application::getFc()->getRequest()->getCookie('_ga');
			}
			else
			{
				$analyticsClientId = null;
			}

			DigitalPointBetterAnalytics_Helper_Analytics::getInstance()->event(
				XenForo_Application::getOptions()->googleAnalyticsWebPropertyId,
				$analyticsClientId,
				$user['user_id'],
				@$_SERVER['REMOTE_ADDR'],
				'User',
				'Registration',
				$label
			);

		}
	}
}