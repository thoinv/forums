<?php

class bdSocialShare_StatsHandler_All extends XenForo_StatsHandler_Abstract
{
	public function getStatsTypes()
	{
		return array(
			'bdsocialshare_all' => new XenForo_Phrase('bdsocialshare_all_shares'),
			'bdsocialshare_photo' => new XenForo_Phrase('bdsocialshare_photo_shares'),
			'bdsocialshare_post' => new XenForo_Phrase('bdsocialshare_post_shares'),
			'bdsocialshare_resource' => new XenForo_Phrase('bdsocialshare_resource_shares'),
			'bdsocialshare_other' => new XenForo_Phrase('bdsocialshare_other_shares'),
		);
	}

	public function getData($startDate, $endDate)
	{
		$db = $this->_getDb();

		$all = $db->fetchPairs($this->_getBasicDataQuery('xf_bdsocialshare_log', 'log_date', 'shared_id <> ?'), array(
			$startDate,
			$endDate,
			''
		));

		$photo = $db->fetchPairs($this->_getBasicDataQuery('xf_bdsocialshare_log', 'log_date', 'shared_id <> ? AND shareable_class IN (' . $db->quote(array(
			'bdSocialShare_Shareable_sonnb_XenGallery_Photo',
			'bdSocialShare_Shareable_XenGallery_Media',
		)) . ')'), array(
			$startDate,
			$endDate,
			''
		));

		$post = $db->fetchPairs($this->_getBasicDataQuery('xf_bdsocialshare_log', 'log_date', 'shared_id <> ? AND shareable_class = ?'), array(
			$startDate,
			$endDate,
			'',
			'bdSocialShare_Shareable_Post'
		));

		$resource = $db->fetchPairs($this->_getBasicDataQuery('xf_bdsocialshare_log', 'log_date', 'shared_id <> ? AND shareable_class IN (' . $db->quote(array(
			'bdSocialShare_Shareable_XenResource_Resource',
			'bdSocialShare_Shareable_XenResource_Update',
		)) . ')'), array(
			$startDate,
			$endDate,
			''
		));

		$other = $db->fetchPairs($this->_getBasicDataQuery('xf_bdsocialshare_log', 'log_date', 'shared_id <> ? AND shareable_class NOT IN (' . $db->quote(array(
			'bdSocialShare_Shareable_sonnb_XenGallery_Photo',
			'bdSocialShare_Shareable_XenGallery_Media',
			'bdSocialShare_Shareable_Post',
			'bdSocialShare_Shareable_XenResource_Resource',
			'bdSocialShare_Shareable_XenResource_Update',
		)) . ')'), array(
			$startDate,
			$endDate,
			''
		));

		return array(
			'bdsocialshare_all' => $all,
			'bdsocialshare_photo' => $photo,
			'bdsocialshare_post' => $post,
			'bdsocialshare_resource' => $resource,
			'bdsocialshare_other' => $other,
		);
	}

}
