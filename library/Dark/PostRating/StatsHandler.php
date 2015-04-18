<?php

class Dark_PostRating_StatsHandler extends XenForo_StatsHandler_Abstract
{
	public function getStatsTypes()
	{      
		return array(
			'postrating' => new XenForo_Phrase('dark_post_ratings'),
		);
	}

	public function getData($startDate, $endDate)
	{
		$db = $this->_getDb();

		$ratingCount = $db->fetchPairs(
			$this->_getBasicDataQuery('dark_postrating', 'date'),
			array($startDate, $endDate)
		);

		return array(
			'postrating' => $ratingCount,
		);
	}
}





