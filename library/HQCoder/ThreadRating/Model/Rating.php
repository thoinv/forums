<?php

class HQCoder_ThreadRating_Model_Rating extends XenForo_Model
{
	public function getRatingById($ratingId)
	{
		return $this->_getDb()->fetchRow('
				SELECT rating.*
				FROM tr_rating AS rating
				WHERE rating_id = ?
				', $ratingId);
	}
	
	public function getRatingByThreadAndUserId($threadId, $userId)
	{
		return $this->_getDb()->fetchRow('
				SELECT rating.*
				FROM tr_rating AS rating
				WHERE thread_id = ?
				AND user_id = ?
				', array($threadId, $userId));
	}
	
	public function getRatingAverage($threadId)
	{
		return $this->_getDb()->fetchRow('
				SELECT AVG(rating.rating) AS avg
				FROM tr_rating AS rating
				WHERE thread_id = ?
				', $threadId);
	}
	
	public function countRatings($threadId)
	{
		return $this->_getDb()->fetchRow('
			SELECT COUNT(*) AS count
			FROM tr_rating AS rating
			WHERE thread_id = ?
		', $threadId);
	}

	public function getWhoRated($threadId, array $fetchOptions = array())
	{
		$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

		return $this->fetchAllKeyed($this->limitQueryResults(
			'
				SELECT rating.*,
					user.*,
					user_profile.*,
					user_option.*
				FROM tr_rating AS rating
				INNER JOIN xf_user AS user ON
					(user.user_id = rating.user_id)
				INNER JOIN xf_user_profile AS user_profile ON
					(user_profile.user_id = user.user_id)
				INNER JOIN xf_user_option AS user_option ON
					(user_option.user_id = user.user_id)
				WHERE rating.thread_id = ?
				ORDER BY rating.date DESC
			', $limitOptions['limit'], $limitOptions['offset']
		), 'rating_id', $threadId);
	}
}