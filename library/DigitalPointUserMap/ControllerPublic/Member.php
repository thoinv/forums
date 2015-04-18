<?php

class DigitalPointUserMap_ControllerPublic_Member extends XFCP_DigitalPointUserMap_ControllerPublic_Member
{

	public static function getSessionActivityDetailsForList(array $activities)
	{
		$output = parent::getSessionActivityDetailsForList($activities);

		foreach ($activities AS $key => $activity)
		{
			if (substr($activity['controller_action'], 0, 7) === 'Usermap')
			{
				$output[$key] = array (
					new XenForo_Phrase('viewing'),
					new XenForo_Phrase('usermap'),
					XenForo_Link::buildPublicLink('members/usermap'),
					false
				);
			}
		}
		return $output;
	}



	public function actionUsermap()
	{
		if (!function_exists('geoip_record_by_name'))
		{
			throw $this->responseException(
				$this->responseError(new XenForo_Phrase('geoip_not_installed'), 503)
			);
		}
		elseif (!geoip_db_avail(GEOIP_CITY_EDITION_REV0))
		{
			throw $this->responseException(
				$this->responseError(str_replace('{geoip_city_path}', geoip_db_filename(GEOIP_CITY_EDITION_REV0), new XenForo_Phrase('geoip_missing_database')), 503)
			);

		}

		$sessionModel = $this->_getSessionModel();

		$bypassUserPrivacy = $this->_getUserModel()->canBypassUserPrivacy();

		$conditions = array(
			'cutOff' => array('>', $sessionModel->getOnlineStatusTimeout()),
			'getInvisible' => $bypassUserPrivacy,
			'getUnconfirmed' => $bypassUserPrivacy,

			// allow force including of self, even if invisible
			'forceInclude' => ($bypassUserPrivacy ? false : XenForo_Visitor::getUserId())
		);

		$onlineUsers = $sessionModel->getSessionActivityRecords($conditions, array(
			'perPage' => 5000,
			'page' => 1,
			'join' => XenForo_Model_Session::FETCH_USER,
			'order' => 'view_date'
		));


		$users = $used_ip = $users_new = $users_added = $duplicate_location = array();
		$users_newest = array(0 => array(), 1 => array(), 3 => array());



		if (count($onlineUsers))
		{
			foreach ($onlineUsers as $key => $user)
			{
				$user['ip'] = XenForo_Helper_Ip::convertIpBinaryToString($user['ip']);

				$onlineUsers[$key]['user_id'] = $user['user_id'] = intval($onlineUsers[$key]['user_id']);
				$users["$user[user_id]-$user[ip]"] = $user;
			}
		}

		$dataRegistryModel = $this->_getDataRegistryModel();

		$users_cached = $dataRegistryModel->get('userMap');

		if (count($users))
		{
			foreach ($users as $key => $user)
			{
				if (isset($users_cached[$key]))
				{ // Read from cache
					$type = substr ($users_cached[$key], -1);
					if ($type < 3)
					{ // Prioritize admins/mods and registered users
						if ($user['is_staff'])
						{
							$type = 3;
						}
						elseif ($user['user_id'])
						{
							$type = 0;
						}
					}
					$users_new[$key] = substr ($users_cached[$key], 0, -1) . $type;
				}
				else
				{
					$user_location = @geoip_record_by_name($user['ip']);

					if (!($user_location['longitude'] == 0 && $user_location['latitude'] == 0))
					{
						$type = ($user['is_staff'] ? 3 : // Admin or Moderator
							($user['user_id'] ? 0 : // Registered user
								($user['robot_key'] ? 2 : // Spider
									1)));

						if (!isset($used_ip[$user_location['longitude'] . ',' . $user_location['latitude']]))
						{
							$string = $user_location['longitude'] . ',' . $user_location['latitude'] .  ',' . $type;
							if ($type < 2)
							{
								$users_new = @array_merge (array ($key => $string), $users_new);
							}
							else
							{
								$users_new[$key] = $string;
							}
							$used_ip[$user_location['longitude'] . ',' . $user_location['latitude']] = true;
						}
						else
						{
							$duplicate_location = @array_merge(array ($key => $string), $users_new);
						}
					}
					else
					{
						$duplicate_location = @array_merge(array ($key => $string), $users_new);
					}
				}
			}
		}

		$dataRegistryModel->set('userMap', @array_merge((array)$users_new, (array)$duplicate_location));

		foreach ($users_new as $key => $plot)
		{
			$type = substr ($plot, -1);
			$users_newest[$type][] = substr($plot, 0, -2);
		}

		foreach ($users_newest as $key => $group)
		{
			$users_newest[$key] = @array_flip(@array_flip($users_newest[$key]));
		}

		$users_new = array();

		foreach (array (3, 0, 2, 1) as $type)
		{
			if (!empty($users_newest[$type]))
			{
				foreach ($users_newest[$type] as $plot)
				{
					if (!isset($users_added[$plot]))
					{
						$users_new[] = $plot . ',' . $type;
						$users_added[$plot] = true;
					}
				}
			}
		}

		$js_array = 'DigitalPointUserMap._UserMap.allPoints = new Array (';
		if (count($users_new))
		{
			foreach ($users_new as $user)
			{
				$js_array .= "[$user],";
			}
			$js_array = substr ($js_array, 0, -1) . ')';
		}
		else
		{
			$js_array .= ')';
		}

		$viewParams = array('js_array' => $js_array, 'user_location' => @geoip_record_by_name($_SERVER['REMOTE_ADDR']));

		return $this->responseView('DigitalPointUserMap_ViewPubic_UserMap_Index', 'usermap_index', $viewParams);

	}

	public function actionUsermapGoogleEarth()
	{
		$location = $this->_input->filterSingle('location', XenForo_Input::STRING);
		$coord = explode(',', $location);

		header ("Content-Type: application/vnd.google-earth.kml+xml");
		header ("Content-Disposition: attachment; filename=user.kml");

		echo '<?xml version="1.0" encoding="UTF-8"?>
<kml xmlns="http://earth.google.com/kml/2.0">
<Placemark>
  <name>' . XenForo_Application::get('options')->get('boardTitle') . ' ' . new XenForo_Phrase('user') . '</name>
  <LookAt id="' . md5($location) .  '">
    <longitude>' . $coord[0] . '</longitude>
    <latitude>' . $coord[1] . '</latitude>
    <range>10000</range>
    <tilt>71</tilt>
    <heading>0</heading>
  </LookAt>
  <styleUrl>root://styles#default+icon=0x307</styleUrl>
  <Point id="' . md5($location) .  '">
    <coordinates>' . $coord[0] . ',' . $coord[1] . ',0</coordinates>
  </Point>
</Placemark>
</kml>';
		exit;

	}


	/**
	 * @return XenForo_Model_Session
	 */
	protected function _getSessionModel()
	{
		return $this->getModelFromCache('XenForo_Model_Session');
	}

	/**
	 * @return XenForo_Model_DataRegistry
	 */
	protected function _getDataRegistryModel()
	{
		return $this->getModelFromCache('XenForo_Model_DataRegistry');
	}
}