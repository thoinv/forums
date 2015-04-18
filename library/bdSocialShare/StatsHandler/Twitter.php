<?php

class bdSocialShare_StatsHandler_Twitter extends XenForo_StatsHandler_Abstract
{
	public function getStatsTypes()
	{
		return array('bdsocialshare_twitter' => new XenForo_Phrase('bdsocialshare_twitter_shares'), );
	}

	public function getData($startDate, $endDate)
	{
		$db = $this->_getDb();

		$all = $db->fetchPairs($this->_getBasicDataQuery('xf_bdsocialshare_log', 'log_date', 'shared_id <> ? AND target = ?'), array(
			$startDate,
			$endDate,
			'',
			'twitter'
		));

		return array('bdsocialshare_twitter' => $all);
	}

}
