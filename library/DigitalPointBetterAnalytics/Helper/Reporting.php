<?php

class DigitalPointBetterAnalytics_Helper_Reporting
{

	protected static $_instance;

	protected static $_oAuthEndpoint = 'https://accounts.google.com/o/oauth2/';
	protected static $_dataEndpoint = 'https://www.googleapis.com/analytics/v3/data/ga';
	protected static $_realtimeEndpoint = 'https://www.googleapis.com/analytics/v3/data/realtime';

	protected static $_webPropertiesEndpoint = 'https://www.googleapis.com/analytics/v3/management/accounts/%s/webproperties/';

	protected static $_profilesEndpoint = '%s/profiles';
	protected static $_dimensionsEndpoint = '%s/customDimensions';

	protected static $_curlHandles = array();
	protected static $_curlMultiHandle = null;

	protected static $_cachedResults = array();

	protected $_currentHandle = null;
	protected $_url = null;

	/**
	 * Protected constructor. Use {@link getInstance()} instead.
	 */
	protected function __construct()
	{
	}

	/**
	 * Gets the single instance of class.
	 *
	 * @return DigitalPointBetterAnalytics_Helper_Reporting
	 */
	public static final function getInstance()
	{
		if (!self::$_instance)
		{
			$class = XenForo_Application::resolveDynamicClass('DigitalPointBetterAnalytics_Helper_Reporting');
			self::$_instance = new $class();

			if (self::canUseCurlMulti())
			{
				self::$_curlMultiHandle = curl_multi_init();
			}
		}

		return self::$_instance;
	}


	static public function getAuthenticationUrl()
	{
		return self::$_oAuthEndpoint . 'auth?redirect_uri=' . urlencode(XenForo_Link::buildAdminLink('full:analytics/auth')) . '&response_type=code&client_id=' . urlencode(XenForo_Application::getOptions()->dpAnalyticsCredentials['client_id']) . '&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fanalytics&approval_prompt=force&access_type=offline';
	}

	static public function exchangeCodeForToken($code)
	{
		self::_cacheDelete('analytics_profiles');

		$client = XenForo_Helper_Http::getClient(self::$_oAuthEndpoint . 'token');
		$client->setParameterPost(array(
			'code' => $code,
			'redirect_uri' => XenForo_Link::buildAdminLink('full:analytics/auth'),
			'client_id' => XenForo_Application::getOptions()->dpAnalyticsCredentials['client_id'],
		//	'scope' => '',
			'client_secret' => XenForo_Application::getOptions()->dpAnalyticsCredentials['client_secret'],
			'grant_type' => 'authorization_code'
		));
		$response = $client->request('POST');
		return json_decode($response->getBody());
	}

	static public function checkAccessToken($throwException = true)
	{
		if (!$tokens = @json_decode(XenForo_Application::getOptions()->dpAnalyticsTokens))
		{
			if ($throwException)
			{
				throw new XenForo_Exception(new XenForo_Phrase('no_tokens_to_refresh'), true);
			}
			else
			{
				return false;
			}
		}

		if ($tokens->expires_at <= time())
		{
			// token has expired... exchange for new one.
			$client = XenForo_Helper_Http::getClient(self::$_oAuthEndpoint . 'token');
			$client->setParameterPost(array(
				'client_id' => XenForo_Application::getOptions()->dpAnalyticsCredentials['client_id'],
				'client_secret' => XenForo_Application::getOptions()->dpAnalyticsCredentials['client_secret'],
				'grant_type' => 'refresh_token',
				'refresh_token' => $tokens->refresh_token
			));
			$response = $client->request('POST');
			$response = json_decode($response->getBody());

			$tokens->access_token = $response->access_token;
			$tokens->token_type = $response->token_type;
			$tokens->expires_at = time() + $response->expires_in - 100;

			XenForo_Model::create('XenForo_Model_Option')->updateOption('dpAnalyticsTokens', json_encode($tokens));
		}
		return $tokens;
	}


	public static function getProfiles($accountId = '~all', $profileId = '~all')
	{
		$cacheKey = 'analytics_profiles_' . md5($accountId . '-' . $profileId);

		if (!$profiles = self::_cacheLoad($cacheKey))
		{
			$fromCache = false;

			if ($tokens = self::checkAccessToken())
			{
				if ($profileId)
				{
					$url = sprintf(self::$_webPropertiesEndpoint . self::$_profilesEndpoint, $accountId, $profileId);
				}
				else
				{
					$url = sprintf(self::$_webPropertiesEndpoint, $accountId);
				}

				$client = XenForo_Helper_Http::getClient($url);
				$client->setParameterGet(array('access_token' => $tokens->access_token));

				$response = $client->request('GET');
				$profiles = json_decode($response->getBody(), true);

				if (!empty($profiles['error']['errors']))
				{
					$e = new ErrorException(@$profiles['error']['errors'][0]['domain'] . ' / ' . @$profiles['error']['errors'][0]['reason'] . ': ' . @$profiles['error']['errors'][0]['message'] . '  ' . @$profiles['error']['errors'][0]['extendedHelp']);
					XenForo_Error::logException($e, false);
				}

			}
		}
		else
		{
			$fromCache = true;
		}

		if (!$fromCache)
		{
			self::_cacheSave($cacheKey, $profiles, 15);
		}
		return $profiles;
	}


	public static function getDimensions($accountId = '~all', $propertyId = '~all')
	{
		$cacheKey = 'analytics_dimensions_' . md5($accountId . '-' . $propertyId);

		if (!$dimensions = self::_cacheLoad($cacheKey))
		{
			$fromCache = false;

			if ($tokens = self::checkAccessToken())
			{
				if ($propertyId)
				{
					$url = sprintf(self::$_webPropertiesEndpoint . self::$_dimensionsEndpoint, $accountId, $propertyId);
				}
				else
				{
					$url = sprintf(self::$_webPropertiesEndpoint, $accountId);
				}

				$client = XenForo_Helper_Http::getClient($url);
				$client->setParameterGet(array('access_token' => $tokens->access_token));

				$response = $client->request('GET');
				$dimensions = json_decode($response->getBody(), true);
			}
		}
		else
		{
			$fromCache = true;
		}

		if (!$fromCache)
		{
			self::_cacheSave($cacheKey, $dimensions, 15);
		}
		return $dimensions;
	}




	public static function getDimensionsByPropertyId($accountId, $propertyId, $names)
	{
		$dimensions = self::getDimensions($accountId, $propertyId);

		$foundDimensions = array();
		if(!empty($dimensions['items']))
		{
			foreach ($dimensions['items'] as $dimension)
			{
				$key = array_search($dimension['name'], $names);

				if ($key !== false && $dimension['scope'] == 'HIT')
				{
					$foundDimensions[$dimension['name']] = $dimension;
				}
			}
		}

		return $foundDimensions;
	}





	public static function getProfileByPropertyId($propertyId)
	{
		$profiles = self::getProfiles();

		$foundProfile = null;
		if(!empty($profiles['items']))
		{
			foreach ($profiles['items'] as $profile)
			{
				if ($profile['webPropertyId'] == $propertyId)
				{
					$foundProfile = $profile;
					break;
				}
			}
		}

		return $foundProfile;
	}

	// this is a little weird... getting profiles with ~all doesn't return industryVertical, but this does.  Bug on their end?
	public static function getPropertyByPropertyId($accountId, $propertyId)
	{
		$profiles = self::getProfiles($accountId, null);

		$foundProfile = null;
		if(!empty($profiles['items']))
		{
			foreach ($profiles['items'] as $profile)
			{
				if ($profile['id'] == $propertyId)
				{
					$foundProfile = $profile;
					break;
				}
			}
		}

		return $foundProfile;
	}



	public function getWeeklyHeatmap($endDaysAgo, $weeks, $metric, $segment = null)
	{
		$filters = null;

		if (strpos($metric, '|'))
		{
			$split = explode('|', $metric);
			$metric = $split[0];
			$filters = $split[1];
		}

		$cacheKey = $this->getData(($endDaysAgo + ($weeks * 7) - 1) . 'daysAgo', $endDaysAgo . 'daysAgo', $metric, 'ga:hour,ga:dayOfWeek', 'ga:hour,ga:dayOfWeek', $filters, $segment);
		$data = $this->getResults($cacheKey);

		$preparedData = array();

		for ($i = 0; $i < 24; $i++)
		{
			$preparedData[$i] = array_fill(0, 7, 0);
		}

		if (!empty($data['rows']))
		{
			foreach ($data['rows'] as &$row)
			{
				$preparedData[intval($row[0])][intval($row[1])] = intval($row[2]);
			}
		}

		return $preparedData;
	}


	public function getData($startDate, $endDate, $metrics, $dimensions = null, $sort = null, $filters = null, $segment = null, $samplingLevel = null, $maxResults = 10000, $output = 'json', $userIp = null)
	{
		$cacheKey = 'analytics_data_' . md5($startDate . ' ' . $endDate . ' ' . $metrics . ' ' . $dimensions . ' ' . $sort . ' ' . $filters . ' ' . $segment . ' ' . $samplingLevel . ' ' . $maxResults . ' ' . $output);

		if (!$data = self::_cacheLoad($cacheKey))
		{
			$tokens = self::checkAccessToken();

			$this->_getHandler(self::$_dataEndpoint);

			$params = array(
				'ids' => 'ga:' . XenForo_Application::getOptions()->dpAnalyticsProfile,
				'start-date' => $startDate,
				'end-date' => $endDate,
				'metrics' => $metrics,
				'max-results' => $maxResults,
				'output' => $output,
				'access_token' => $tokens->access_token
			);

			if (!empty($dimensions))
			{
				$params['dimensions'] = $dimensions;
			}

			if (!empty($sort))
			{
				$params['sort'] = $sort;
			}

			if (!empty($filters))
			{
				$params['filters'] = $filters;
			}

			if (!empty($segment))
			{
				$params['segment'] = $segment;
			}

			if (!empty($samplingLevel))
			{
				$params['samplingLevel'] = $samplingLevel;
			}

			if (!empty($userIp))
			{
				$params['userIp'] = $userIp;
			}
			elseif (!empty($_SERVER['REMOTE_ADDR']))
			{
				$params['userIp'] = $_SERVER['REMOTE_ADDR'];
			}

			$this->_setParams($params);
			$this->_execHandler($cacheKey);
		}

		return $cacheKey;
	}

	public function getRealtime($metrics, $dimensions = null, $sort = null, $filters = null, $maxResults = 10000)
	{
		$cacheKey = 'analytics_realtime_' . md5($metrics . ' ' . $dimensions . ' ' . $sort . ' ' . $filters . ' ' . $maxResults);

		//if (!$data = self::_cacheLoad($cacheKey))
		//{
			$tokens = self::checkAccessToken();

			$this->_getHandler(self::$_realtimeEndpoint);

			$params = array(
				'ids' => 'ga:' . XenForo_Application::getOptions()->dpAnalyticsProfile,
				'metrics' => $metrics,
				'max-results' => $maxResults,
				'access_token' => $tokens->access_token
			);

			if (!empty($dimensions))
			{
				$params['dimensions'] = $dimensions;
			}

			if (!empty($sort))
			{
				$params['sort'] = $sort;
			}

			if (!empty($filters))
			{
				$params['filters'] = $filters;
			}

			$this->_setParams($params);
			$this->_execHandler($cacheKey);
		//}

		return $cacheKey;
	}



	public static function _cacheLoad($cacheKey)
	{
		if ($cache = XenForo_Application::getCache())
		{
			$result = @json_decode($cache->load($cacheKey, true), true);
		}
		else
		{
			$result = false;
		}

		self::$_cachedResults[$cacheKey] = $result;

		return $result;
	}

	public static function _cacheSave($cacheKey, &$data, $minutes)
	{
		if ($cache = XenForo_Application::getCache())
		{
			if ($cache && !empty($data['id']))
			{
				$cache->save(json_encode($data), $cacheKey, array(), $minutes * 60); // 15 minute cache

				self::$_cachedResults[$cacheKey] = $data;
			}
		}
	}

	public static function _cacheDelete($cacheKey)
	{
		if ($cache = XenForo_Application::getCache())
		{
			$cache->remove($cacheKey);
		}
	}


	public static function canUseCurlMulti()
	{
		if (empty(XenForo_Application::getOptions()->dpAnalyticsInternal['v']))
		{
			return false;
		}

		return function_exists('curl_multi_init');
	}

	protected function _getHandler($url)
	{
		if (self::canUseCurlMulti())
		{
			// need to reset the URL if sending parameters
			$this->_url = $url;
			$this->_currentHandle = curl_init($url);
		}
		else
		{
			$this->_currentHandle = XenForo_Helper_Http::getClient($url);
		}
	}


	protected function _setParams(array $params)
	{
		if (self::canUseCurlMulti())
		{
			curl_setopt_array($this->_currentHandle, array(
				CURLOPT_URL => $this->_url . '?' . http_build_query($params),
				CURLOPT_RETURNTRANSFER => true
			));
		}
		else
		{
			$this->_currentHandle->setParameterGet($params);
		}
	}

	protected function _execHandler($cacheKey)
	{
		if (self::canUseCurlMulti())
		{
			curl_multi_add_handle(self::$_curlMultiHandle, $this->_currentHandle);
			curl_multi_exec(self::$_curlMultiHandle, $active);
		}
		else
		{
			// switching to response handle
			$this->_currentHandle = $this->_currentHandle->request('GET');
		}
		self::$_curlHandles[$cacheKey] = $this->_currentHandle;

	}

	public function getResults($cacheKey)
	{
		if (self::canUseCurlMulti() && self::$_curlMultiHandle && count(self::$_curlHandles) > 0)
		{
			do {
				while(($execrun = curl_multi_exec(self::$_curlMultiHandle, $running)) == CURLM_CALL_MULTI_PERFORM);
				if($execrun != CURLM_OK)
					break;

				while($done = curl_multi_info_read(self::$_curlMultiHandle))
				{
					$results = json_decode(curl_multi_getcontent($done['handle']), true);

					$cacheKeyForReturn = array_search($done['handle'], self::$_curlHandles, true);

					$this->_cacheSave($cacheKeyForReturn, $results, 60);

					curl_multi_remove_handle(self::$_curlMultiHandle, $done['handle']);
				}
			} while ($running);

			curl_multi_close(self::$_curlMultiHandle);

			self::$_curlMultiHandle = null;
		}
		elseif (!self::canUseCurlMulti())
		{
			$results = @json_decode(self::$_curlHandles[$cacheKey]->getBody(), true);
			$this->_cacheSave($cacheKey, $results, 60);
		}

		if (!empty(self::$_cachedResults[$cacheKey]))
		{
			return self::$_cachedResults[$cacheKey];
		}
		else
		{
			return false;
		}
	}

}