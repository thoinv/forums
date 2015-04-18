<?php

class UnreadPostCount_Callback
{
	public static function getUnreadCount()
	{
		if ($userId = XenForo_Visitor::getUserId())
		{
			if (XenForo_Application::isRegistered('session'))
			{
				$session = XenForo_Application::getSession();

				$unreadPostCount = $session->get('unreadPostCount');
				if (is_array($unreadPostCount))
				{
					return intval($unreadPostCount['count']);
				}
			}
		}

		return 0;
	}
}