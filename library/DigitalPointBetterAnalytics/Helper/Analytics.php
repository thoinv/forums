<?php

class DigitalPointBetterAnalytics_Helper_Analytics
{
	protected static $_instance;

	protected static $_analyticsEndPoint = 'https://www.google-analytics.com/collect';

	protected static $_curlHandles = array();
	protected static $_curlMultiHandle = null;

	protected $_currentHandle = null;


	/**
	 * Protected constructor. Use {@link getInstance()} instead.
	 */
	protected function __construct()
	{
	}

	/**
	 * Gets the single instance of class.
	 *
	 * @return DigitalPointBetterAnalytics_Helper_Analytics
	 */
	public static final function getInstance()
	{
		if (!self::$_instance)
		{
			$class = XenForo_Application::resolveDynamicClass('DigitalPointBetterAnalytics_Helper_Analytics');
			self::$_instance = new $class();

			if (self::_canUseCurlMulti())
			{
				self::$_curlMultiHandle = curl_multi_init();
			}
		}

		return self::$_instance;
	}


	public function __destruct()
	{
		if (self::_canUseCurlMulti() && self::$_curlMultiHandle && count(self::$_curlHandles) > 0)
		{
			do {
				while(($execrun = curl_multi_exec(self::$_curlMultiHandle, $running)) == CURLM_CALL_MULTI_PERFORM);
				if($execrun != CURLM_OK)
					break;

				while($done = curl_multi_info_read(self::$_curlMultiHandle))
				{
					curl_multi_remove_handle(self::$_curlMultiHandle, $done['handle']);
				}
			} while ($running);

			curl_multi_close(self::$_curlMultiHandle);

			self::$_curlMultiHandle = null;
		}
	}

	public function transaction($trackingId, $clientId, $userId, $ipAddress, $transactionId, $transactionRevenue, $currencyCode = false, array $items, $affiliation = false)
	{
		self::prepareClientId($clientId);

		$this->_getHandler();

		$params = array(
			'tid' => $trackingId,
			'cid' => $clientId,
			'uid' => $userId,
			'uip' => $ipAddress,
			't' => 'transaction',
			'ni' => 1,
			'ti' => $transactionId,

			'tr' => $transactionRevenue
		);

		$dimensionIndex = XenForo_Application::getOptions()->dpBetterAnalyticsDimensionIndexUser;
		if ($dimensionIndex)
		{
			$params['cd' . $dimensionIndex] = $userId;
		}

		if ($affiliation)
		{
			$params['ta'] = $affiliation;
		}
		if ($currencyCode)
		{
			$params['cu'] = $currencyCode;
		}

		$this->_setParams($params);
		$this->_execHandler();

		if ($items)
		{
			foreach ($items as $item)
			{
				$this->_getHandler();

				$params = array(
					'tid' => $trackingId,
					'cid' => $clientId,
					'uid' => $userId,
					'uip' => $ipAddress,
					't' => 'item',
					'ni' => 1,
					'ti' => $transactionId,

					'in' => $item['name'],
					'ip' => $item['price'],
					'iq' => $item['quantity'],
					'ic' => $item['code'],
					'iv' => $item['category'],

					'pa' => $item['action']
				);

				if ($dimensionIndex)
				{
					$params['cd' . $dimensionIndex] = $userId;
				}

				if ($affiliation)
				{
					$params['ta'] = $affiliation;
				}
				if ($currencyCode)
				{
					$params['cu'] = $currencyCode;
				}

				$this->_setParams($params);
				$this->_execHandler();
			}
		}
	}

	public function social($trackingId, $clientId, $userId, $ipAddress, $socialNetwork, $socialAction, $socialActionTarget)
	{
		self::prepareClientId($clientId);

		$this->_getHandler();

		$params = array(
			'tid' => $trackingId,
			'cid' => $clientId,
			'uid' => $userId,
			'uip' => $ipAddress,
			't' => 'social',

			'sn' => $socialNetwork,
			'sa' => $socialAction,
			'st' => $socialActionTarget
		);

		$dimensionIndex = XenForo_Application::getOptions()->dpBetterAnalyticsDimensionIndexUser;
		if ($dimensionIndex)
		{
			$params['cd' . $dimensionIndex] = $userId;
		}

		$this->_setParams($params);
		$this->_execHandler();
	}

	public function event($trackingId, $clientId, $userId, $ipAddress, $category, $action, $label = null, $campaignMedium = null, $nonInteractive = false)
	{
		self::prepareClientId($clientId);

		$this->_getHandler();

		$params = array(
			'tid' => $trackingId,
			'cid' => $clientId,
			't' => 'event',

			'ec' => $category,
			'ea' => $action
		);

		if($label)
		{
			$params['el'] = $label;
		}

		if($ipAddress)
		{
			$params['uip'] = $ipAddress;
		}

		if($nonInteractive)
		{
			$params['ni'] = 1;
		}

		if($campaignMedium)
		{
			$params['cm'] = $campaignMedium;
		}

		$userId = intval($userId);
		if ($userId)
		{
			$params['uid'] = $userId;

			$dimensionIndex = XenForo_Application::getOptions()->dpBetterAnalyticsDimensionIndexUser;
			if ($dimensionIndex)
			{
				$params['cd' . $dimensionIndex] = $userId;
			}
		}

		$this->_setParams($params);
		$this->_execHandler();
	}

	public function pageview($trackingId, $clientId, $userId, $params)
	{
		self::prepareClientId($clientId);

		$this->_getHandler();


		$params = array(
			'tid' => $trackingId,
			'cid' => $clientId,
			't' => 'pageview',
		) + $params;

		$userId = intval($userId);
		if ($userId)
		{
			$params['uid'] = $userId;

			$dimensionIndex = XenForo_Application::getOptions()->dpBetterAnalyticsDimensionIndexUser;
			if ($dimensionIndex)
			{
				$params['cd' . $dimensionIndex] = $userId;
			}
		}

		$this->_setParams($params);
		$this->_execHandler();
	}

	public static function prepareClientId(&$clientId)
	{
		if (substr($clientId, 0, 6) == 'GA1.2.')
		{
			$clientId = substr($clientId, 6);
		}

		if (!$clientId)
		{
			$clientId = uniqid('', true);
		}
	}

	protected static function _canUseCurlMulti()
	{
		if (empty(XenForo_Application::getOptions()->dpAnalyticsInternal['v']))
		{
			return false;
		}

		return function_exists('curl_multi_init');
	}

	protected function _getHandler()
	{
		if (self::_canUseCurlMulti())
		{
			$this->_currentHandle = curl_init(self::$_analyticsEndPoint);
		}
		else
		{
			$this->_currentHandle = XenForo_Helper_Http::getClient(self::$_analyticsEndPoint);
		}
	}

	protected function _setParams(array $params)
	{
		$params['v'] = 1;
		$params['ds'] = 'server side';

		if (self::_canUseCurlMulti())
		{
			curl_setopt_array($this->_currentHandle, array(
				CURLOPT_URL => self::$_analyticsEndPoint . '?' . http_build_query($params),
				CURLOPT_RETURNTRANSFER => true
			));
		}
		else
		{
			$this->_currentHandle->setParameterPost($params);
		}
	}

	protected function _execHandler()
	{
		if (self::_canUseCurlMulti())
		{
			curl_multi_add_handle(self::$_curlMultiHandle, $this->_currentHandle);
			self::$_curlHandles[] = $this->_currentHandle;
			curl_multi_exec(self::$_curlMultiHandle, $active);
		}
		else
		{
			$this->_currentHandle->request('POST');
		}
	}
}