<?php

class bdSocialShare_StatsHandler_Facebook extends XenForo_StatsHandler_Abstract
{
	public function getStatsTypes()
	{
		return array(
			'bdsocialshare_facebook' => new XenForo_Phrase('bdsocialshare_facebook_shares'),
			'bdsocialshare_fb_link' => new XenForo_Phrase('bdsocialshare_facebook_links'),
			'bdsocialshare_fb_photo' => new XenForo_Phrase('bdsocialshare_facebook_photos'),
		);
	}

	public function getData($startDate, $endDate)
	{
		$db = $this->_getDb();

		$all = $db->fetchPairs($this->_getBasicDataQuery('xf_bdsocialshare_log', 'log_date', 'shared_id <> ? AND target = ?'), array(
			$startDate,
			$endDate,
			'',
			'facebook'
		));

		$link = $db->fetchPairs($this->_getBasicDataQuery('xf_bdsocialshare_log', 'log_date', 'shared_id <> ? AND target = ? AND shared_id LIKE "%\_%"'), array(
			$startDate,
			$endDate,
			'',
			'facebook'
		));

		$photo = $db->fetchPairs($this->_getBasicDataQuery('xf_bdsocialshare_log', 'log_date', 'shared_id <> ? AND target = ? AND shared_id NOT LIKE "%\_%"'), array(
			$startDate,
			$endDate,
			'',
			'facebook'
		));

		return array(
			'bdsocialshare_facebook' => $all,
			'bdsocialshare_fb_link' => $link,
			'bdsocialshare_fb_photo' => $photo,
		);
	}

}
