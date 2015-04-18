<?php

class DigitalPointBetterAnalytics_ControllerPublic_Member extends XFCP_DigitalPointBetterAnalytics_ControllerPublic_Member
{
	public function actionMember()
	{
		$return = parent::actionMember();
		$return->params['canViewAnalytics'] = $this->_canViewAnalyticsTab();
		return $return;
	}


	public function actionAnalytics()
	{
		if (!$this->_canViewAnalyticsTab())
		{
			return $this->responseNoPermission();
		}

		$userId = $this->_input->filterSingle('user_id', XenForo_Input::UINT);
		$userFetchOptions = array(
			'join' => XenForo_Model_User::FETCH_LAST_ACTIVITY | XenForo_Model_User::FETCH_USER_PERMISSIONS
		);
		$user = $this->getHelper('UserProfile')->assertUserProfileValidAndViewable($userId, $userFetchOptions);

		$analyticsModel = $this->_getAnalyticsModel();

		$duplicates = $analyticsModel->findUsersSharingComputer(@$user['customFields']['analytics_cid'], $userId);

		$reportData = array();

		$options = XenForo_Application::getOptions();

		if ($options->dpAnalyticsCredentials['client_id'] && $options->dpAnalyticsCredentials['client_secret'] && $options->dpAnalyticsTokens)
		{
			if (DigitalPointBetterAnalytics_Helper_Api::check() || $user['user_id'] <= 100)
			{
				$reportData = $analyticsModel->getMemberReportData($userId);
			}
			else
			{
				$reportData = false;
			}
		}

		return $this->responseView('DigitalPointBetterAnalytics_ViewPublic_Member_Analytics', 'member_analytics', array(
			'user' => $user,
			'users_sharing' => $duplicates,
			'report_data' => $reportData,
			'canViewRevenue' => $this->_canViewAnalyticsRevenue(),
			'userBlocksAnalytics' => substr(@$user['customFields']['analytics_cid'], 0, 3) ==  'DP.'
		));
	}

	protected function _canViewAnalyticsTab()
	{
		return XenForo_Permission::hasPermission(XenForo_Visitor::getInstance()->getPermissions(), 'general', 'viewAnalyticsTab');
	}

	protected function _canViewAnalyticsRevenue()
	{
		return XenForo_Permission::hasPermission(XenForo_Visitor::getInstance()->getPermissions(), 'general', 'viewAnalyticsRevenue');
	}

	/**
	 * @return DigitalPointBetterAnalytics_Model_Analytics
	 */
	protected function _getAnalyticsModel()
	{
		return $this->getModelFromCache('DigitalPointBetterAnalytics_Model_Analytics');
	}


}