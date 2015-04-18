<?php

class DigitalPointBetterAnalytics_StatsHandler_User extends XFCP_DigitalPointBetterAnalytics_StatsHandler_User
{
	public function getStatsTypes()
	{
		return array_merge(
			parent::getStatsTypes(),
			array(
				'analytics_blockers' => new XenForo_Phrase('users_blocking_analytics'),
			)
		);
	}

	public function getData($startDate, $endDate)
	{
		$db = $this->_getDb();

		$analyticsBlockers = $db->fetchPairs('
			SELECT ' . (XenForo_Application::$time - XenForo_Application::$time % 86400) . ',
				COUNT(*)
			FROM xf_user AS user
				INNER JOIN xf_user_field_value AS user_field_value_analytics_cid ON (user_field_value_analytics_cid.user_id = user.user_id AND user_field_value_analytics_cid.field_id = "analytics_cid" AND (user_field_value_analytics_cid.field_value LIKE "%DP.%"))
			WHERE last_activity > ?
		', XenForo_Application::$time - 86400); // 24 hours ago

		return array_merge(
			parent::getData($startDate, $endDate),
			array(
				'analytics_blockers' => $analyticsBlockers,
			)
		);
	}
}