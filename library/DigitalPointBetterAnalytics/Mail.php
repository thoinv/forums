<?php

class DigitalPointBetterAnalytics_Mail extends XFCP_DigitalPointBetterAnalytics_Mail
{
	protected $_trackerInserted = false;
	protected $_linksTagged = false;

	public function prepareMailContents($emailTitle = null, array $params = null)
	{
		$response = parent::prepareMailContents($emailTitle, $params);

		if (!empty(XenForo_Application::getOptions()->dpAnalyticsEvents['emails']) && !empty(XenForo_Application::getOptions()->dpAnalyticsInternal['v']))
		{
			if (strpos($response['bodyHtml'], '<html>') !== false && !$this->_linksTagged)
			{
				$this->_linksTagged = true;

				// add medium tracking to body of email
				$response['bodyHtml'] = preg_replace_callback(
					'#(<a href=")(.*?)(")#si',
					function($matches)
					{
						$parsed = parse_url($matches[2]);
						@$parsed['query'] = (!empty($parsed['query']) ? $parsed['query'] . '&' : '') . 'utm_source=email&utm_medium=email';

						return $matches[1] . @$parsed['scheme'] . '://' . @$parsed['host'] . @$parsed['path'] . '?' . $parsed['query'] . (!empty($parsed['fragment']) ? '#' . $parsed['fragment'] : '') . $matches[3];
					},
					$response['bodyHtml']
				);

			}

			if (strpos($response['bodyHtml'], '<html>') === false && !$this->_trackerInserted)
			{
				$this->_trackerInserted = true;

				// pretty ghetto way of getting user_id, but it (mostly) works and doesn't require completely overwriting Mail methods.
				$email = null;

				if (count($this->_params))
				{
					foreach ($this->_params as $param)
					{
						if (is_array($param))
						{
							if (!empty($param['email']))
							{
								$email = $param['email'];
								break;
							}
						}
					}
				}

				$userId = $lastIp = $analyticsClientId = null;

				if ($email)
				{
					$userModel = XenForo_Model::create('XenForo_Model_User');

					if ($user = $userModel->getUserByEmail($email, array('join' => XenForo_Model_User::FETCH_USER_PROFILE)))
					{
						$userId = $user['user_id'];
						$user = $userModel->prepareUser($user);
						$analyticsClientId = @$user['customFields']['analytics_cid'];

						DigitalPointBetterAnalytics_Helper_Analytics::prepareClientId($analyticsClientId);

						$lastIp = XenForo_Model::create('DigitalPointBetterAnalytics_Model_Analytics')->getLastIp($userId);
					}
				}


				DigitalPointBetterAnalytics_Helper_Analytics::getInstance()->event(
					XenForo_Application::getOptions()->googleAnalyticsWebPropertyId,
					$analyticsClientId,
					$userId,
					$lastIp,
					'Email',
					'Send',
					$response['subject'],
					'email',
					true
				);

				$response['bodyHtml'] .= '<img src="https://www.google-analytics.com/collect?v=1&tid=' . XenForo_Application::getOptions()->googleAnalyticsWebPropertyId . '&cid=' . $analyticsClientId . '&t=event&ec=Email&ea=Open&el=' . urlencode($response['subject']) . ($userId ? '&uid=' . $userId . (XenForo_Application::getOptions()->dpBetterAnalyticsDimensionIndexUser > 0 ? '&cd' . XenForo_Application::getOptions()->dpBetterAnalyticsDimensionIndexUser . '=' . $userId : '') : '') . '&cm=email&z=' . uniqid() . '" />';
			}
		}
		return $response;
	}
}