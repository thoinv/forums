<?php

/**
 * Model for Analytics
 */
class DigitalPointBetterAnalytics_Model_Analytics extends XenForo_Model
{

	public function getLastIp($userId)
	{
		$lastIp = $this->_getDb()->fetchOne('
			SELECT ip
			FROM xf_ip
			WHERE user_id = ?
			ORDER BY log_date DESC
			LIMIT 1
		', $userId);

		return XenForo_Helper_Ip::convertIpBinaryToString($lastIp);
	}

	public function findUsersSharingComputer($analyticsClientId, $omitUserId = null)
	{
		return $this->_getDb()->fetchAll('
			SELECT xf_user.*
			FROM xf_user_field_value
				LEFT JOIN xf_user ON (xf_user.user_id = xf_user_field_value.user_id)
			WHERE xf_user_field_value.field_id = "analytics_cid"
				AND xf_user_field_value.field_value = ?
				' . ($omitUserId ? 'AND xf_user_field_value.user_id != ' . intval($omitUserId) : '') . '
			ORDER BY last_activity DESC
			', array($analyticsClientId));
	}

	public function findAllUsersSharing($page = 1, $perPage = 10, &$totalFound)
	{
		$db = $this->_getDb();

		$records = $this->fetchAllKeyed('
			SELECT SQL_CALC_FOUND_ROWS COUNT(*) AS total, field_value
			FROM xf_user_field_value
			WHERE field_id = "analytics_cid"
				AND field_value LIKE "GA%"
			GROUP BY field_value
			HAVING total > 1
			ORDER BY total DESC, field_value
			LIMIT ' . intval(($page -1) * $perPage) . ', ' . $perPage . '
			', 'field_value', array());

		$totalFound = $db->fetchOne('SELECT FOUND_ROWS()');

		$clientIds = $users = array();
		if ($records)
		{
			foreach($records as $record)
			{
				$clientIds[] = $record['field_value'];
			}

			$users = $db->fetchAll('
				SELECT xf_user.*, xf_user_field_value.field_value
				FROM xf_user_field_value
					LEFT JOIN xf_user ON (xf_user.user_id = xf_user_field_value.user_id)
				WHERE xf_user_field_value.field_id = "analytics_cid"
					AND xf_user_field_value.field_value IN(' . $db->quote($clientIds) . ')
				ORDER BY xf_user_field_value.user_id
			');

			if ($users)
			{
				foreach ($users as &$user)
				{
					$records[$user['field_value']]['users_output'][$user['user_id']] = XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user, '', true, array(
																							'href' => XenForo_Template_Helper_Core::adminLink('users/edit', $user, array()),
																							'class' => 'NoOverlay'
																						)));
				}


				foreach($records as &$record)
				{
					$record['users_output'] = implode(', ', $record['users_output']);
				}

			}
		}

		return $records;
	}

	public function getMemberReportData($userId)
	{
		$options = XenForo_Application::getOptions();

		$handles = $data = $return = $cacheKeys = array();

		// Kick them all off (parallel processing)
		/** Revenue **/
		$handles['revenue'] = DigitalPointBetterAnalytics_Helper_Reporting::getInstance();
		$cacheKeys['revenue'] = $handles['revenue']->getData($options->dpAnalyticsDaysBack . 'daysAgo', 'today', 'ga:transactionRevenue', 'ga:currencyCode', null, 'ga:dimension' . $options->dpBetterAnalyticsDimensionIndexUser . '==' . $userId, 'gaid::-10', 'HIGHER_PRECISION');

		/** Source **/
		$handles['source'] = DigitalPointBetterAnalytics_Helper_Reporting::getInstance();
		$cacheKeys['source'] = $handles['source']->getData($options->dpAnalyticsDaysBack . 'daysAgo', 'today', 'ga:sessions', 'ga:date,ga:sourceMedium', 'ga:date', 'ga:dimension' . $options->dpBetterAnalyticsDimensionIndexUser . '==' . $userId, null, 'HIGHER_PRECISION');

		/** Internal Search **/
		$handles['search'] = DigitalPointBetterAnalytics_Helper_Reporting::getInstance();
		$cacheKeys['search'] = $handles['search']->getData($options->dpAnalyticsDaysBack . 'daysAgo', 'today', 'ga:searchResultViews', 'ga:searchKeyword', '-ga:searchResultViews', 'ga:dimension' . $options->dpBetterAnalyticsDimensionIndexUser . '==' . $userId, null, 'HIGHER_PRECISION');

		/** Social **/
		$handles['social'] = DigitalPointBetterAnalytics_Helper_Reporting::getInstance();
		$cacheKeys['social'] = $handles['social']->getData($options->dpAnalyticsDaysBack . 'daysAgo', 'today', 'ga:socialInteractions', 'ga:socialInteractionNetworkAction', '-ga:socialInteractions', 'ga:dimension' . $options->dpBetterAnalyticsDimensionIndexUser . '==' . $userId, null, 'HIGHER_PRECISION');



		// Pick up results
		foreach ($handles as $key => $handle)
		{
			$data[$key] = $handle->getResults($cacheKeys[$key]);
		}


		// Process data
		/** Revenue **/
		if ($data['revenue'] && @$data['revenue']['totalResults'])
		{
			$currency = @end(@$data['revenue']['rows']);
			$currency = @$currency[0];
			$currencies = self::getCurrencyCodes();

			@$return['revenue']['data'] = (@$data['revenue']['totalsForAllResults']['ga:transactionRevenue'] + 0);
			@$return['revenue']['currency'] = @$currencies[@$currency];
			@$return['revenue']['sampled_data'] = @$data['revenue']['containsSampledData'];
		}
		else
		{
			@$return['revenue']['data'] = 0;
			@$return['revenue']['currency'] = '$';
		}


		/** Source **/
		for ($i = $options->dpAnalyticsDaysBack; $i >= 1; $i--)
		{
			$date = date('M j, y', XenForo_Application::$time - ($i * 86400));
			@$return['sessions']['data'][$date] = 0;
		}

		if ($data['source'] && @$data['source']['totalResults'])
		{
			foreach ($data['source']['rows'] as $row)
			{
				$date = date('M j, y', strtotime(substr($row[0], 0, 4) . '-' . substr($row[0], 4, 2) . '-' . substr($row[0], -2)));
				@$return['source_medium']['data'][$row[1]] += $row[2];
				@$return['sessions']['data'][$date] += $row[2];
				@$return['source_medium']['sampled_data'] = @$data['source']['containsSampledData'];
				@$return['sessions']['sampled_data'] = @$data['source']['containsSampledData'];
			}
		}


		/** Internal Search **/
		if ($data['search'] && @$data['search']['totalResults'])
		{
			foreach ($data['search']['rows'] as $row)
			{
				@$return['search']['data'][] = array('term' => $row[0], 'total' => $row[1]);
				@$return['search']['sampled_data'] = @$data['search']['containsSampledData'];
			}
		}

		/** Social **/
		if ($data['social'] && @$data['social']['totalResults'])
		{
			foreach ($data['social']['rows'] as $row)
			{
				@$return['social']['data'][$row[0]] = $row[1];
				@$return['social']['sampled_data'] = @$data['social']['containsSampledData'];
			}
		}


		if (!empty($return['sessions']))
		{
			$return = array('results' => $return);
		}
		$this->_prepareReportData($return);

		return $return;
	}


	public function getRealtimeUsage()
	{
		if ($cache = XenForo_Application::getCache())
		{
			if (@json_decode(XenForo_Application::getOptions()->dpAnalyticsTokens))
			{
				$handle = DigitalPointBetterAnalytics_Helper_Reporting::getInstance();
				$cacheKey = $handle->getRealtime(
					'rt:activeUsers',
					'rt:pagePath',
					'-rt:activeUsers',
					'rt:pagePath=~/item$,rt:pagePath=~/domain$,rt:pagePath=~/article$,rt:pagePath=@/threads/,rt:pagePath=@/forums/'
				);
				$results = $handle->getResults($cacheKey);

				$compiled = array();
				if (@$results['totalResults'] > 0)
				{
					foreach ($results['rows'] as $row)
					{
						if (preg_match('#/forums/.*?\.([0-9]+?)/#', $row[0], $matches))
						{
							$compiled['forums'][$matches[1]] = array(
								array(),
								@$compiled['forums'][$matches[1]][1] + $row[1]
							);
						}
						elseif (preg_match('#/threads/.*?\.([0-9]+?)/#', $row[0], $matches))
						{
							$compiled['threads'][$matches[1]] = array(
								array(),
								@$compiled['threads'][$matches[1]][1] + $row[1]
							);
						}
						elseif (preg_match('#.*?\.([0-9]+?)/item$#', $row[0], $matches))
						{
							$compiled['items'][$matches[1]] = array(
								array(),
								@$compiled['items'][$matches[1]][1] + $row[1]
							);
						}
						elseif (preg_match('#.*?\.([0-9]+?)/domain$#', $row[0], $matches))
						{
							$compiled['domains'][$matches[1]] = array(
								array(),
								@$compiled['domains'][$matches[1]][1] + $row[1]
							);
						}
						elseif (preg_match('#.*?\.([0-9]+?)/article$#', $row[0], $matches))
						{
							$compiled['articles'][$matches[1]] = array(
								array(),
								@$compiled['articles'][$matches[1]][1] + $row[1]
							);
						}
					}

					$compiledOutput = array();

					if (!empty($compiled['forums']))
					{
						$forums = XenForo_Model::create('XenForo_Model_Forum')->getForumsByIds(array_keys($compiled['forums']));
						foreach ($compiled['forums'] as $key => $forum)
						{
							if (empty($forums[$key]))
							{
								//unset($forums[$key]);
							}
							else
							{
								$compiledOutput['forums'][$key][0] = $forums[$key];
							}
						}
					}

					if (!empty($compiled['threads']))
					{
						$threads = XenForo_Model::create('XenForo_Model_Thread')->getThreadsByIds(array_keys($compiled['threads']), array('join' => XenForo_Model_Thread::FETCH_USER | XenForo_Model_Thread::FETCH_FIRSTPOST));
						foreach ($compiled['threads'] as $key => $thread)
						{
							if (empty($threads[$key]) || $threads[$key]['discussion_state'] != 'visible')
							{
								//unset($threads[$key]);
							}
							else
							{
								$compiledOutput['threads'][$key][0] = $threads[$key];
							}
						}
					}

					$cache->save(json_encode($compiledOutput), 'analytics_realtime_data', array(), 3600); // 1h cache
				}
			}
		}
	}


	public function prepareRealtimeData($dataType = 'threads', $limit = 5)
	{
		if ($cache = XenForo_Application::getCache())
		{
			if ($compiled = @json_decode($cache->load('analytics_realtime_data', true), true))
			{
				//$forumModel = XenForo_Model::create('XenForo_Model_Forum');
				//$threadModel = XenForo_Model::create('XenForo_Model_Thread');




				if (!empty($compiled[$dataType]))
				{
					$newGroup = $items = array();
					$lastValue = 0;
					foreach ($compiled[$dataType] as $url => $data)
					{
						if ($lastValue > 0 && $lastValue != $data[1])
						{
							shuffle($items);
							$newGroup = array_merge($newGroup, $items);
							$items = array();
						}


						if ($dataType == 'forums' || $dataType == 'threads')
						{
							// adds a whole lot of queries
							//if (!$forumModel->canViewForum($data[0]))
							//{
							//	continue;
							//}
							//else
							//{
								$url = XenForo_Link::buildPublicLink('forums', $data[0]);
							//}
						}
						if ($dataType == 'threads')
						{
							//if (!$threadModel->canViewThread($data[0], $data[0]))
							//{
							//	continue;
							//}
							//else
							//{
								$url = XenForo_Link::buildPublicLink('threads', $data[0]);
							//}
						}







						$items[] = $data[0];
						$lastValue = $data[1];
					}
					shuffle($items);
					return array_slice(array_merge($newGroup, $items), 0, $limit);
				}
			}
		}
		return false;
	}

	protected function _prepareReportData(&$data)
	{
		if (@$data['results']['sessions']['data'])
		{
			$data['results']['sessions']['json'] = $this->_buildJson($data['results']['sessions']['data']);
		}
		if (@$data['results']['source_medium']['data'])
		{
			$data['results']['source_medium']['json'] = $this->_buildJson($data['results']['source_medium']['data']);
		}
		if (@$data['results']['social']['data'])
		{
			$data['results']['social']['json'] = $this->_buildJson($data['results']['social']['data']);
		}
	}

	protected function _buildJson($data)
	{
		$json = array();
		foreach($data as $key => $val)
		{
			$json[] = "['" . addslashes($key) . "',$val]";
		}
		return implode(',', $json);
	}

	public static function getCurrencyCodes ()
	{
		return array(
			'CHF' => '+',
			'DKK' => 'kr',
			'EUR' => '€',
			'GBP' => '£',
			'INR' => '₹',
			'JPY' => '¥',
			'NOK' => 'kr',
			'RMB' => '¥',
			'SEK' => 'kr',
			'THB' => '฿',
			'USD' => '$',
			'ZAR' => 'R',
		);
	}

}