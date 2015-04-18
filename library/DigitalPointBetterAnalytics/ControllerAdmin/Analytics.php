<?php

class DigitalPointBetterAnalytics_ControllerAdmin_Analytics extends XenForo_ControllerAdmin_Abstract
{

	public function actionIndex()
	{
		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			'https://marketplace.digitalpoint.com/better-analytics.1787/item'
		);
	}


	protected function _assertLinkedAccount()
	{
		$options = XenForo_Application::getOptions();

		if (!$options->dpAnalyticsTokens || !$options->dpAnalyticsCredentials['client_id'] && !$options->dpAnalyticsCredentials['client_secret'] || !$options->dpAnalyticsProfile)
		{
			throw $this->responseException(
				$this->responseError(new XenForo_Phrase('no_linked_account', array('url' => XenForo_Link::buildAdminLink('options/list/stats'))), 403)
			);
		}
	}

	public function actionAuth()
	{
		if ($code = $this->_input->filterSingle('code', XenForo_Input::STRING))
		{
			$response = DigitalPointBetterAnalytics_Helper_Reporting::exchangeCodeForToken($code);

			if (!empty($response->error) && !empty($response->error_description))
			{
				return $this->responseError(new XenForo_Phrase('invalid_google_api_code', array('error' => $response->error, 'description' => $response->error_description)));
			}

			if (empty($response->expires_in))
			{
				return $this->responseError(new XenForo_Phrase('unknown_google_api_error', array('dump' => nl2br(var_export($response, true))), false));
			}

			$response->expires_at = XenForo_Application::$time + $response->expires_in - 100;
			unset($response->expires_in);

			XenForo_Model::create('XenForo_Model_Option')->updateOption('dpAnalyticsTokens', json_encode($response));

			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildAdminLink('options/list/stats')
			);
		}

		if (!XenForo_Application::getOptions()->dpAnalyticsCredentials['client_id'] || !XenForo_Application::getOptions()->dpAnalyticsCredentials['client_secret'])
		{
			return $this->responseError(new XenForo_Phrase('no_credentials_found'));
		}


		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			DigitalPointBetterAnalytics_Helper_Reporting::getAuthenticationUrl()
		);
	}

	public function actionComputers()
	{
		$analyticsModel = $this->_getAnalyticsModel();

		$page = max(1, $this->_input->filterSingle('page', XenForo_Input::UINT));
		$perPage = 20;

		$totalItems = null;

		$records = $analyticsModel->findAllUsersSharing($page, $perPage, $totalItems);

		$viewParams = array(
			'records' => $records,

			'page' => $page,
			'perPage' => $perPage,
			'total' => $totalItems
		);

		return $this->responseView('DigitalPointBetterAnalytics_ViewAdmin_Computers_Index', 'better_analytics_shared_computers', $viewParams);
	}

	/**
	 * Just going to reroute to the normal user search results rather than reinvent the wheel.
	 *
	 * @return XenForo_ControllerResponse_Abstract
	 */
	public function actionBlockers()
	{
		XenForo_Application::getFc()->getRequest()->setParam('criteria', array('custom' => array('analytics_cid' => 'DP.')));

		return $this->responseReroute('XenForo_ControllerAdmin_User', 'list');
	}


	public function actionHeatmap()
	{
		$this->_assertLinkedAccount();

		if ($this->isConfirmedPost())
		{
			$input = $this->_input->filter(array(
				'metric' => XenForo_Input::STRING,
				'segment' => XenForo_Input::STRING,
				'weeks' => XenForo_Input::UINT,
				'end' => XenForo_Input::UINT,
			));

			if (!DigitalPointBetterAnalytics_Helper_Api::check())
			{
				if (array_search($input['metric'], array('ga:users', 'ga:sessions', 'ga:hits', 'ga:organicSearches')) === false)
				{
					return $this->responseError(new XenForo_Phrase('not_all_metrics_available'));
				}
			}

			$heatmapData = DigitalPointBetterAnalytics_Helper_Reporting::getInstance()->getWeeklyHeatmap($input['end'], $input['weeks'], $input['metric'], $input['segment']);

			return $this->responseView('DigitalPointBetterAnalytics_ViewAdmin_Heatmaps_Ajax', 'analytics_heatmap_data', array(
				'heatmap_data' => $heatmapData
			));
		}


		$heatmapData = DigitalPointBetterAnalytics_Helper_Reporting::getInstance()->getWeeklyHeatmap(7, 10, 'ga:sessions');

		$_hourMap = array();
		for($i = 0; $i < 24; $i++)
		{
			$_hourMap[$i] = date('g A', $i * 3600);
		}

		return $this->responseView('DigitalPointBetterAnalytics_ViewAdmin_Heatmaps', 'analytics_heatmaps', array(
			'heatmap_data' => $heatmapData,
			'metrics' => $this->_getMetrics(),
			'segments' => $this->_getSegments(),
			'hour_map' => $_hourMap
		));
	}


	public function actionTestSetup()
	{
		$checks['hasCache'] = (XenForo_Application::getCache() ? true : false);

		if (DigitalPointBetterAnalytics_Helper_Reporting::checkAccessToken(false))
		{
			$checks['profiles'] = DigitalPointBetterAnalytics_Helper_Reporting::getProfiles();
			$checks['matchingProfile'] = DigitalPointBetterAnalytics_Helper_Reporting::getProfileByPropertyId(XenForo_Application::getOptions()->googleAnalyticsWebPropertyId);

			$checks['siteSearchSetup'] = @$checks['matchingProfile']['siteSearchQueryParameters'] == 'q';
			$checks['ecommerceTracking'] = @$checks['matchingProfile']['eCommerceTracking'];
			$checks['enhancedEcommerceTracking'] = @$checks['matchingProfile']['enhancedECommerceTracking'];

			$property = DigitalPointBetterAnalytics_Helper_Reporting::getPropertyByPropertyId(@$checks['matchingProfile']['accountId'], XenForo_Application::getOptions()->googleAnalyticsWebPropertyId);

			$checks['level'] = @$property['level'];
			$checks['industryVertical'] = @$property['industryVertical'];
			$checks['dimensions'] = DigitalPointBetterAnalytics_Helper_Reporting::getDimensionsByPropertyId(@$checks['matchingProfile']['accountId'], XenForo_Application::getOptions()->googleAnalyticsWebPropertyId, array('User', 'Forum'));
		}

		$checks['licensed'] = DigitalPointBetterAnalytics_Helper_Api::check(true);
		$checks['user_dimension_set'] = (XenForo_Application::getOptions()->dpBetterAnalyticsDimensionIndexUser > 0 && @$checks['dimensions']['User']['index'] == XenForo_Application::getOptions()->dpBetterAnalyticsDimensionIndexUser);
		$checks['forum_dimension_set'] = (XenForo_Application::getOptions()->dpBetterAnalyticsDimentionIndex > 0 && @$checks['dimensions']['Forum']['index'] == XenForo_Application::getOptions()->dpBetterAnalyticsDimentionIndex);
		$checks['hasCurl'] = function_exists('curl_multi_init');

		return $this->responseView('DigitalPointBetterAnalytics_ViewAdmin_Tools_CheckAnalytics', 'tools_test_analytics', array(
			'checks' => $checks,
		));
	}


	protected function _getMetrics()
	{
		return array(
			'User' => array(
				'ga:users' => 'Users',
			),
			'Session' => array(
				'ga:sessions' => 'Sessions',
				'ga:hits' => 'Hits',
			),
			'Traffic Sources' => array(
				'ga:organicSearches' => 'Organic Search',
			),
			'AdWords' => array(
				'ga:impressions' => 'Impressions',
				'ga:adClicks' => 'Clicks',
				'ga:adCost' => 'Cost',
				'ga:CPM' => 'CPM',
				'ga:CPC' => 'CPC',
			),
			'Social Activities' => array(
				'ga:socialActivities' => 'Social Activities',
			),
			'Page Tracking' => array(
				'ga:pageviews' => 'Page Views',
			),
			'Internal Search' => array(
				'ga:searchUniques' => 'Unique Searches',
			),
			'Site Speed' => array(
				'ga:pageLoadTime' => 'Page Load Time',
			),
			'Event Tracking' => array(
				'ga:totalEvents' => 'Total Events',
				'ga:uniqueEvents' => 'Unique Events',
				'ga:totalEvents|ga:eventCategory==Content;ga:eventAction==Post' => 'Posts Created',
				'ga:totalEvents|ga:eventCategory==Content;ga:eventAction==Profile Post' => 'Profile Posts Created',
				'ga:totalEvents|ga:eventCategory==Content;ga:eventAction==Conversation Message' => 'Conversation Messages Created',
				'ga:totalEvents|ga:eventCategory==Email;ga:eventAction==Send' => 'Emails Sent',
				'ga:totalEvents|ga:eventCategory==Email;ga:eventAction==Open' => 'Emails Opened',
				'ga:totalEvents|ga:eventCategory==Link;ga:eventAction==Click' => 'External Links Clicked',
				'ga:totalEvents|ga:eventCategory==User;ga:eventAction==Registration' => 'User Registrations',
				'ga:totalEvents|ga:eventCategory==Report;ga:eventAction==Reported' => 'Reported Content',
				'ga:totalEvents|ga:eventCategory==Moderator' => 'Moderator Actions',
				'ga:totalEvents|ga:eventCategory==User;ga:eventAction==Warning' => 'Warnings Given',
				'ga:totalEvents|ga:eventCategory==AJAX Request;ga:eventAction==Trigger' => 'AJAX Requests',
				'ga:totalEvents|ga:eventCategory==Error;ga:eventAction==AJAX' => 'AJAX Errors',
				'ga:totalEvents|ga:eventCategory==Error;ga:eventAction==JavaScript' => 'JavaScript Errors',
				'ga:totalEvents|ga:eventCategory==Advertising;ga:eventAction==Click' => 'Advertisement Clicked',

			),
			'Ecommerce' => array(
				'ga:transactions' => 'Transactions',
				'ga:transactionRevenue' => 'Transaction Revenue',
				'ga:revenuePerTransaction' => 'Revenue Per Transaction',
			),
			'Social Interactions' => array(
				'ga:socialInteractions' => 'Social Interactions',
				'ga:uniqueSocialInteractions' => 'Unique Social Interactions',
			),
			'DoubleClick Campaign Manager' => array(
				'ga:dcmCPC' => 'CPC',
				'ga:dcmCTR' => 'CTR',
				'ga:dcmClicks' => 'Clicks',
				'ga:dcmCost' => 'Cost',
				'ga:dcmImpressions' => 'Impressions',
			),
			'AdSense' => array(
				'ga:adsenseRevenue' => 'Revenue',
				'ga:adsenseAdsViewed' => 'Views',
				'ga:adsenseAdsClicks' => 'Clicks',
				'ga:adsensePageImpressions' => 'Page Impressions',
				'ga:adsenseCTR' => 'CTR',
				'ga:adsenseECPM' => 'ECPM',
				'ga:adsenseExits' => 'Exits',
				'ga:adsenseViewableImpressionPercent' => 'Viewable Impressions',
				'ga:adsenseCoverage' => 'Coverage',



			)
		);
	}

	protected function _getSegments()
	{
		return array(
			'Default Segments' => array(
				'' => 'Everything',
				'gaid::-1' => 'All Visits',
				'gaid::-2' => 'New Visitors',
				'gaid::-3' => 'Returning Visitors',
				'gaid::-4' => 'Paid Search Traffic',
				'gaid::-5' => 'Non-paid Search Traffic',
				'gaid::-6' => 'Search Traffic',
				'gaid::-7' => 'Direct Traffic',
				'gaid::-8' => 'Referral Traffic',
				'gaid::-9' => 'Visits with Conversions',
				'gaid::-10' => 'Visits with Transactions',
				'gaid::-11' => 'Mobile and Tablet Traffic',
				'gaid::-12' => 'Non-bounce Visits',
				'gaid::-13' => 'Tablet Traffic',
				'gaid::-14' => 'Mobile Traffic',
				'dynamic::ga:userGender==male' => 'Male Users',
				'dynamic::ga:userGender==female' => 'Female Users',

			)
		);
	}


	/**
	 * @return DigitalPointBetterAnalytics_Model_Analytics
	 */
	protected function _getAnalyticsModel()
	{
		return $this->getModelFromCache('DigitalPointBetterAnalytics_Model_Analytics');
	}
}