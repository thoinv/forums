<?php

//######################## Star Rating Threads By Borbole ###########################
class Borbole_StarRating_Model_Rating extends XenForo_Model
{
    const FETCH_USER = 0x01;
	const FETCH_THREAD = 0x02;

	//Get rating by id
	public function getRatingById($ratingId, array $fetchOptions = array())
	{
		$joinOptions = $this->prepareRatingFetchOptions($fetchOptions);

		return $this->_getDb()->fetchRow('
			SELECT rating.*
				' . $joinOptions['selectFields'] . '
			FROM xf_thread_rating AS rating
			' . $joinOptions['joinTables'] . '
			WHERE rating_id = ?
		', $ratingId);
	}

	//Get rating by thread and user ids
	public function getRatingByThreadAndUserId($threadId, $userId, array $fetchOptions = array())
	{
		$joinOptions = $this->prepareRatingFetchOptions($fetchOptions);

		return $this->_getDb()->fetchRow('
			SELECT rating.*
				' . $joinOptions['selectFields'] . '
			FROM xf_thread_rating AS rating
			' . $joinOptions['joinTables'] . '
			WHERE user_id = ?
				AND thread_id = ?
		', array($this->_getDb()->quote($userId), $this->_getDb()->quote($threadId)));
	}

	//Get ratings by ids
	public function getRatingsByIds(array $ratingIds, array $fetchOptions = array())
	{
		if (!$ratingIds)
		{
			return array();
		}

		$joinOptions = $this->prepareRatingFetchOptions($fetchOptions);

		return $this->fetchAllKeyed('
			SELECT rating.*
				' . $joinOptions['selectFields'] . '
			FROM xf_thread_rating AS rating
			' . $joinOptions['joinTables'] . '
			WHERE rating_id IN (' . $this->_getDb()->quote($ratingIds) . ')
		', 'rating_id');
	}

	/**
	* Fetch thread ratings based on the conditions and options specified
	*
	* @param array $conditions
	* @param array $fetchOptions
	*
	* @return array
	*/
	public function getRatings(array $conditions = array(), array $fetchOptions = array())
	{
		$whereClause = $this->prepareRatingConditions($conditions, $fetchOptions);

		$orderClause = $this->prepareRatingOrderOptions($fetchOptions, 'rating.rating_date DESC');
		$joinOptions = $this->prepareRatingFetchOptions($fetchOptions);
		$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

		return $this->fetchAllKeyed($this->limitQueryResults(
			'
				SELECT rating.*
					' . $joinOptions['selectFields'] . '
				FROM xf_thread_rating AS rating
				' . $joinOptions['joinTables'] . '
				WHERE ' . $whereClause . '
				' . $orderClause . '
			', $limitOptions['limit'], $limitOptions['offset']
		), 'rating_id');
	}

	/**
	* Count the number of ratings that meet the given criteria.
	*
	* @param array $conditions
	*
	* @return integer
	*/
	public function countRatings(array $conditions = array())
	{
		$fetchOptions = array();

		$whereClause = $this->prepareRatingConditions($conditions, $fetchOptions);
		$joinOptions = $this->prepareRatingFetchOptions($fetchOptions);

		return $this->_getDb()->fetchOne('
			SELECT COUNT(*)
			FROM xf_thread_rating AS rating
			' . $joinOptions['joinTables'] . '
			WHERE ' . $whereClause
		);
	}

	/**
	* Prepares a set of conditions against which to select ratings.
	*
	* @param array $conditions List of conditions.
	* @param array $fetchOptions The fetch options that have been provided. May be edited if criteria requires.
	*
	* @return string Criteria as SQL for where clause
	*/
	public function prepareRatingConditions(array $conditions, array &$fetchOptions)
	{
		$db = $this->_getDb();
		$sqlConditions = array();

		if (!empty($conditions['user_id']))
		{
			if (is_array($conditions['user_id']))
			{
				$sqlConditions[] = 'rating.user_id IN (' . $db->quote($conditions['user_id']) . ')';
			}
			else
			{
				$sqlConditions[] = 'rating.user_id = ' . $db->quote($conditions['user_id']);
			}
		}

		if (!empty($conditions['thread_id']))
		{
			if (is_array($conditions['thread_id']))
			{
				$sqlConditions[] = 'rating.thread_id IN (' . $db->quote($conditions['thread_id']) . ')';
			}
			else
			{
				$sqlConditions[] = 'rating.thread_id = ' . $db->quote($conditions['thread_id']);
			}
		}

		if (isset($conditions['count_rating']))
		{
			$sqlConditions[] = 'rating.count_rating = ' . ($conditions['count_rating'] ? 1 : 0);
		}
		
		if (!empty($conditions['rating_id']))
		{
			if (is_array($conditions['rating_id']))
			{
				$sqlConditions[] = 'rating.rating_id IN (' . $db->quote($conditions['rating_id']) . ')';
			}
			else
			{
				$sqlConditions[] = 'rating.rating_id = ' . $db->quote($conditions['rating_id']);
			}
		}				

		return $this->getConditionsForClause($sqlConditions);
	}

	/**
	 * Construct 'ORDER BY' clause
	 *
	 * @param array $fetchOptions (uses 'order' key)
	 * @param string $defaultOrderSql Default order SQL
	 *
	 * @return string
	 */
	public function prepareRatingOrderOptions(array &$fetchOptions, $defaultOrderSql = '')
	{
		$choices = array(
			'rating_date' => 'thread.rating_date',
		);
		return $this->getOrderByClause($choices, $fetchOptions, $defaultOrderSql);
	}

	/**
	 * Prepares join-related fetch options.
	 *
	 * @param array $fetchOptions
	 *
	 * @return array Containing 'selectFields' and 'joinTables' keys.
	 */
	public function prepareRatingFetchOptions(array $fetchOptions)
	{
		$selectFields = '';
		$joinTables = '';

		if (!empty($fetchOptions['join']))
		{
			if ($fetchOptions['join'] & self::FETCH_USER)
			{
				$selectFields .= ',
						user.*, user_profile.*';
				$joinTables .= '
						INNER JOIN xf_user AS user ON
							(user.user_id = rating.user_id)
						INNER JOIN xf_user_profile AS user_profile ON
							(user_profile.user_id = rating.user_id)';
			}
		}
		
		if (!empty($fetchOptions['join']))
		{
			if ($fetchOptions['join'] & self::FETCH_THREAD)
			{
				$selectFields .= ',
					thread.*';
					
				$joinTables .= '
					INNER JOIN xf_thread AS thread ON
						(thread.thread_id = rating.thread_id)';
			}
		}

		return array(
				'selectFields' => $selectFields,
				'joinTables'   => $joinTables
		);
	}
	
	//Delete all user's thread ratings
	public function getRatingsByUser($userId)
	{
		return $this->fetchAllKeyed("
			SELECT *
			FROM xf_thread_rating
			WHERE user_id = ?
			ORDER BY rating_date DESC
		", 'rating_id', $userId);
	}

	/**
	 * @param integer $userId
	 *
	 * @return int Total ratings deleted
	 */
	public function deleteRatingsByUser($userId)
	{
		$ratings = $this->getRatingsByUser($userId);
		
		$i = 0;
		
		foreach ($ratings AS $rating)
		{
			$dw = XenForo_DataWriter::create('Borbole_StarRating_DataWriter_Rating');
			$dw->setExistingData($rating, true);
			$dw->delete();
			$i++;
		}

		return $i;
	}
	
	//Top positive rated threads in the sidebar
	public function getRatedThreads($limit = 0)
    {
        $visitor = XenForo_Visitor::getInstance();

        $exclratedforums = XenForo_Application::get('options')->exclratedforums;
		
        $conditions = array(
            'deleted' => false,
            'moderated' => false
        );

        $fetchOptions = array(
            'join' => XenForo_Model_Thread::FETCH_USER,
            'permissionCombinationId' => $visitor['permission_combination_id'],
            'readUserId' => $visitor['user_id'],
            'watchUserId' => $visitor['user_id'],
            'postCountUserId' => $visitor['user_id'],
            'order' => 'rating_avg',
            'orderDirection' => 'desc',
            'limit' => $limit,
        );


        $whereConditions = $this->getModelFromCache('XenForo_Model_Thread')->prepareThreadConditions($conditions, $fetchOptions);
        $sqlClauses = $this->getModelFromCache('XenForo_Model_Thread')->prepareThreadFetchOptions($fetchOptions);
        $limitOptions = $this->getModelFromCache('XenForo_Model_Thread')->prepareLimitFetchOptions($fetchOptions);

        if (!empty($exclratedforums))
        {
            $whereConditions .= ' AND thread.node_id NOT IN (' . $this->_getDb()->quote($exclratedforums) . ')';
        }
		
		$whereConditions .= ' AND thread.rating_avg > 0';

        $sqlClauses['joinTables'] = str_replace('(user.user_id = thread.user_id)', '(user.user_id = thread.user_id)', $sqlClauses['joinTables']);

        $threads = $this->fetchAllKeyed($this->limitQueryResults('
				SELECT thread.*
					' . $sqlClauses['selectFields'] . '
				FROM xf_thread AS thread
				' . $sqlClauses['joinTables'] . '
				WHERE ' . $whereConditions . '
				' . $sqlClauses['orderClause'] . '
			', $limitOptions['limit'], $limitOptions['offset']
        ), 'thread_id');

        foreach($threads AS $threadID => &$thread)
        {
            if ($this->getModelFromCache('XenForo_Model_Thread')->canViewThreadAndContainer($thread, $thread))
            {
                $thread = $this->getModelFromCache('XenForo_Model_Thread')->prepareThread($thread, $thread);
                $thread['canInlineMod'] = false;
            }
            else
            {
                unset($threads[$threadID]);
            }
        }

        return $threads;
    }
	
	//Can rate threads
	public function canRateThreads(array $thread, array $forum, &$errorPhraseKey = '', array $nodePermissions = null, array $viewingUser = null) 
	{
		$this->standardizeViewingUserReferenceForNode($thread['node_id'], $viewingUser, $nodePermissions);
		
		//Don't allow rating if thread is moderated/not visible
		if ($thread['discussion_state'] != 'visible')
		{
			return false;
		}

		//You can't rate your own threads silly :D
		if ($thread['user_id'] == $viewingUser['user_id'])
		{			
			$errorPhraseKey = 'no_rating_own_threads';
			return false;
		}
		
		//Don't rate threads if you do not have permissiosn to view them
		if (!$this->getModelFromCache('XenForo_Model_Thread')->canViewThread($thread, $forum, $errorPhraseKey, $nodePermissions, $viewingUser)) 
		{
			return false;
		}
		
		//Get the groups who can rate threads
		if (!XenForo_Permission::hasPermission($viewingUser['permissions'], 'rating', 'canRateThreads')) 
		{
			return false;
		}

		return true;
	}
	
	//Can rate threads anonymoussly
	public function canRateThreadsAnonymously(array $user = null)
	{
		$this->standardizeViewingUserReference($user);

		return XenForo_Permission::hasPermission($user['permissions'], 'rating', 'rateAnonymously');		
	}
	
	//Prevent abuse of the rating system by setting up a daily limit
	public function dailyRatingLimit(array $thread, array $forum, &$errorPhraseKey = '', array $nodePermissions = null, array $viewingUser = null) 
	{
		$this->standardizeViewingUserReferenceForNode($thread['node_id'], $viewingUser, $nodePermissions);
		
		$dailyrategids = XenForo_Permission::hasPermission($viewingUser['permissions'], 'rating', 'dailyRatingLimit');
		
		if ($dailyrategids > 0) 
		{
			$query = $this->countRatings(array('user_id' => $viewingUser['user_id'], 'rating_date' => array('>', XenForo_Application::$time - 86400)));
			
			if ($query >= $dailyrategids) 
			{
				$errorPhraseKey = array('daily_ratings_reached', 'username' => $viewingUser['username'], 'dailyrategids' => $dailyrategids);
	            return false;
			}
		}
		
		return true;

	}
	
	//Can view ratings for own threads and/or all threads
	public function canViewThreadRatings(array $thread, array $viewingUser = null)
	{
        $this->standardizeViewingUserReference($viewingUser);

		if (XenForo_Permission::hasPermission($viewingUser['permissions'], 'rating', 'viewAllRatings'))
		{
            return true;
		}

		if (XenForo_Permission::hasPermission($viewingUser['permissions'], 'rating', 'viewOwnRatings') && $thread['user_id'] == $viewingUser['user_id'])
		{
            return true; 
		}
		
		return false;
	}
	
	//Can view anonymous ratings
	public function canViewAnonymousRatings(array $thread, array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);

		if (XenForo_Permission::hasPermission($viewingUser['permissions'], 'rating', 'viewAllAnonymous'))
		{
            return true;
		}

		if (XenForo_Permission::hasPermission($viewingUser['permissions'], 'rating', 'viewOwnAnonymous') && $thread['user_id'] == $viewingUser['user_id'])
		{
            return true; 
		}
		
		return false;		
	}
	
	//Prepare delete rattings permissions
	public function prepareRating($rating, array $user = null)
	{
		$this->standardizeViewingUserReference($user);

		$rating['canDelete'] = $this->canDeleteRating($rating, $user);
		
        return $rating;
	}
	
	//Can delete ratings
	public function canDeleteRating(array $rating, array $user = null)
	{
		$this->standardizeViewingUserReference($user);

        // Delete own ratings
		if ($user['user_id'] == $rating['user_id'])
		{
			return XenForo_Permission::hasPermission($user['permissions'], 'rating', 'deleteOwnRatings');
		}
	}
	
}