<?php
class DigitalPointBetterAnalytics_Listener_ControllerPreDispatch
{
	protected static $_triggered = false;
	public static $backendLogging = false;


	public static function loadControllerListener($controller, $action)
	{
		if (!self::$_triggered)
		{
			self::$_triggered = true;
			if (XenForo_Visitor::getUserId() > 0)
			{
				// logged in user
				if (XenForo_Application::isRegistered('session'))
				{
					$session = XenForo_Application::getSession();

					if (!$session->get('analyticsClientSet'))
					{
						$request = $controller->getRequest();

						if (!$clientId = $request->getCookie('_ga'))
						{
							$clientId = 'DP.' . uniqid('', true);
						}

						$session->set('analyticsClientSet', $clientId);

						if ($clientId)
						{
							$writer = XenForo_DataWriter::create('XenForo_DataWriter_User');
							$writer->setExistingData(XenForo_Visitor::getUserId());
							$writer->setOption(XenForo_DataWriter_User::OPTION_ADMIN_EDIT, true);

							if (XenForo_Application::$versionId >= 1030000)
							{
								$writer->setOption(XenForo_DataWriter_User::OPTION_LOG_CHANGES, false);
							}

							$writer->setCustomFields(array('analytics_cid' => $clientId));
							$writer->save();
						}
					}
					elseif(XenForo_Application::getOptions()->dpAnalyticsTrackBlocked != 'never')
					{
						// logged in user without an Analytics cookie
						$clientId = $session->get('analyticsClientSet');
						if (substr($clientId, 0, 3) == 'DP.')
						{
							self::$backendLogging = $clientId;
						}
					}
				}
			}
			// non-logged in user
			elseif (XenForo_Application::isRegistered('session'))
			{
				$session = XenForo_Application::getSession();

				if (!$clientId = $session->get('analyticsClientSet'))
				{
					$request = $controller->getRequest();

					if (!$clientId = $request->getCookie('_ga'))
					{
						$clientId = 'DP.' . uniqid('', true);
					}

					$session->set('analyticsClientSet', $clientId);
				}

				// no Analytics cookie
				if (substr($clientId, 0, 3) == 'DP.')
				{
					if (XenForo_Application::getOptions()->dpAnalyticsTrackBlocked == 'guests' && !$session->get('robotId')
						|| XenForo_Application::getOptions()->dpAnalyticsTrackBlocked == 'everyone')
					{
						self::$backendLogging = $clientId;
					}
				}

			}
		}
	}
}