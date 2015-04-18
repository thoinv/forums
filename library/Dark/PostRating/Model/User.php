<?php

class Dark_PostRating_Model_User extends XFCP_Dark_PostRating_Model_User
{
	public function prepareUserFetchOptions(array $fetchOptions)
	{      
		$joinOptions = parent::prepareUserFetchOptions($fetchOptions);

		
		/* @var $ratingsModel Dark_PostRating_Model */
		$ratingsModel = $this->getModelFromCache('Dark_PostRating_Model');
		$ratings = $ratingsModel->getRatings();
		$positive = $negative = $neutral = array();
		foreach($ratings as $id => $rating){
			if($rating['type'] == 1)
				$positive[]=$id;
			else if($rating['type'] == -1)
				$negative[]=$id;
			else $neutral[]=$id;
		}
		
		if(!empty($positive)){
			$joinOptions['selectFields'] .= "
				,(select sum(count_received) from dark_postrating_count where user_id = user.user_id and rating in (".implode(",", $positive).")) as positive_rating_count
			";											
			
			$options = XenForo_Application::get('options');
			if($options->dark_postrating_like_id > 0 && $options->dark_postrating_like_show){				
				$joinOptions['selectFields'] .= "
					, ((select sum(count_received) from dark_postrating_count where user_id = user.user_id and rating in (".implode(",", $positive).")) + user.like_count) as positive_rating_count_incl_likes
			";								
			} else {			
				$joinOptions['selectFields'] .= "
				, (select sum(count_received) from dark_postrating_count where user_id = user.user_id and rating in (".implode(",", $positive).")) as positive_rating_count_incl_likes
			";									
			}
		}

		if(!empty($negative))
			$joinOptions['selectFields'] .= "
				,(select sum(count_received) from dark_postrating_count where user_id = user.user_id and rating in (".implode(",", $negative).")) as negative_rating_count
			";
		if(!empty($neutral))
			$joinOptions['selectFields'] .= "
				,(select sum(count_received) from dark_postrating_count where user_id = user.user_id and rating in (".implode(",", $neutral).")) as neutral_rating_count
			";
			
		
			
		$joinOptions['selectFields'] .= "
			,(select sum(count_received) from dark_postrating_count where user_id = user.user_id) as total_rating_count
		";
					
		return $joinOptions;
	}

	public function getUsersFollowingUserId($userId, $maxResults = 0, $orderBy = 'user.username')
	{
		$fetchOptions = array();
		$joinOptions = $this->prepareUserFetchOptions($fetchOptions);
		$sql = '
			SELECT user.*,
				user_profile.*,
				user_option.*
				' . $joinOptions['selectFields'] . '
			FROM xf_user_follow AS user_follow
			INNER JOIN xf_user AS user ON
				(user.user_id = user_follow.user_id)
			INNER JOIN xf_user_profile AS user_profile ON
				(user_profile.user_id = user.user_id)
			INNER JOIN xf_user_option AS user_option ON
				(user_option.user_id = user.user_id)
				' . $joinOptions['joinTables'] . '
			WHERE user_follow.follow_user_id = ?
			ORDER BY ' . $orderBy . '
		';

		if ($maxResults)
		{
			$sql = $this->limitQueryResults($sql, $maxResults);
		}

		return $this->fetchAllKeyed($sql, 'user_id', $userId);
	}

	
	/**
	 * Gets an array of all users being followed by the specified user
	 *
	 * @param integer|array $userId|$user
	 * @param integer $maxResults (0 = all)
	 * @param string $orderBy
	 *
	 * @return array
	 */
	public function getFollowedUserProfiles($userId, $maxResults = 0, $orderBy = 'user.username')
	{
		$fetchOptions = array();
		$joinOptions = $this->prepareUserFetchOptions($fetchOptions);
		$sql = '
			SELECT
				user.*,
				user_profile.*,
				user_option.*
				' . $joinOptions['selectFields'] . '
			FROM xf_user_follow AS user_follow
			INNER JOIN xf_user AS user ON
				(user.user_id = user_follow.follow_user_id)
			INNER JOIN xf_user_profile AS user_profile ON
				(user_profile.user_id = user.user_id)
			INNER JOIN xf_user_option AS user_option ON
				(user_option.user_id = user.user_id)
				' . $joinOptions['joinTables'] . '
			WHERE user_follow.user_id = ?
			ORDER BY ' . $orderBy . '
		';

		if ($maxResults)
		{
			$sql = $this->limitQueryResults($sql, $maxResults);
		}

		return $this->fetchAllKeyed($sql, 'user_id', $this->getUserIdFromUser($userId));
	}
	
/*
	public function getUsers(array $conditions, array $fetchOptions = array())
	{
		if(array_key_exists('last_activity', $conditions))
			$fetchOptions['dark_postrating'] = true;
		return parent::getUsers($conditions, $fetchOptions);
	}*/
	
	
	public function getOrderByClause(array $choices, array $fetchOptions, $defaultOrderSql = ''){
		$choices['positive_rating_count_incl_likes'] = 'positive_rating_count_incl_likes';
		$choices['negative_rating_count'] = 'negative_rating_count';
		return parent::getOrderByClause($choices, $fetchOptions, $defaultOrderSql);
	}
	
	
}      