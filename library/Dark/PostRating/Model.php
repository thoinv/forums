<?php
  

class Dark_PostRating_Model extends XenForo_Model
{    	
	static private $_ratingCacheLevel2;
	
	public function getRatings($regen = false){						       
		/** @var XenForo_Model_DataRegistry */
		$registryModel = $this->getModelFromCache('XenForo_Model_DataRegistry');		
		
		if(empty(self::$_ratingCacheLevel2) || $regen){
			$ratings = $registryModel->get('dark_postrating_ratings');
			self::$_ratingCacheLevel2 = $ratings;
		} else {
			$ratings = self::$_ratingCacheLevel2;			
		}		
		
		if(empty($ratings) || $regen){       					
			
			$ratings = $this->fetchAllKeyed(
				"
					SELECT *
					FROM dark_postrating_ratings
					ORDER BY display_order asc
				"
			, 'id');

			foreach($ratings as &$rating){
				if(!empty($rating['whitelist']))
					$rating['whitelist'] = unserialize($rating['whitelist']);
				else
					$rating['whitelist'] = array();
					
				if(!empty($rating['group_whitelist']))
					$rating['group_whitelist'] = unserialize($rating['group_whitelist']);
				else
					$rating['group_whitelist'] = array();
					
				if($rating['sprite_mode'] && !empty($rating['sprite_params']))
					$rating['sprite_params'] = unserialize($rating['sprite_params']);
				else
					$rating['sprite_params'] = array();
			}
			
			foreach($ratings as &$rating){
				$rating['title'] = new XenForo_Phrase($this->getRatingTitlePhraseName($rating['id']));
			}
		
			$registryModel->set('dark_postrating_ratings', $ratings);
		}
		return $ratings;
	}
	
	public function getRatingTitlePhraseName($ratingId)
	{
		return 'dark_postrating_rating_' . $ratingId . '_title';
	}

	public function getRatingMasterTitlePhraseValue($ratingId)
	{
		$phraseName = $this->getRatingTitlePhraseName($ratingId);
		return $this->_getPhraseModel()->getMasterPhraseValue($phraseName);
	}	
	
	public function applyRatingWhitelist($ratings, $node_id, $post = false, $forDisplay = false){
		//$time = microtime(true);
		$visitor = XenForo_Visitor::getInstance();
				
		foreach($ratings as $id => &$rating){
			$ok = false;
			if(!empty($rating['whitelist']) && !in_array($node_id, $rating['whitelist']))
				unset($ratings[$id]);
			elseif(!empty($rating['group_whitelist']) && !$forDisplay){
				
				foreach($rating['group_whitelist'] as $group){
					if($visitor->isMemberOf($group, true)){
						$ok = true; 
						break;
					}						
				}
				if(!$ok)
					unset($ratings[$id]);
			}
			
			if(!empty($ratings[$id]) && !empty($post) && $rating['op_only'] && $post['position'] != 0)
				unset($ratings[$id]);
		}
		return $ratings;
	}
	
	public static function sortPreparedRatings(&$ratings){
		$i = 0;
		foreach($ratings as &$rating){
			$rating['sortIndex'] = $i++;
		}
		uasort($ratings, array('self', 'comparePreparedRatings'));       
	}
	
	public static function comparePreparedRatings($a, $b){
		// Sort by rating count then by the original ordering (silly quicksort)
		if($a['count'] == $b['count'])
			return ($a['sortIndex'] < $b['sortIndex']) ? -1 : 1;
		return ($a['count'] > $b['count']) ? -1 : 1;
	}
		
	public function getEnabledRatingTypes($options = false){
		if(!$options)
			$options = XenForo_Application::get('options');  			
		$ratings = $this->getRatings();		
		
		$enabled = array("negative" => false, "positive" => false, "neutral" => false);
		foreach($ratings as $rating){
			if($rating['type'] == 1)
				$enabled['positive'] = true;
			else if($rating['type'] == 0)
				$enabled['neutral'] = true;
			else if($rating['type'] == -1)
				$enabled['negative'] = true;
		}
		if($options->dark_postrating_never_positive)
			$enabled['positive'] = false;
		if($options->dark_postrating_never_neutral)
			$enabled['neutral'] = false;
		if($options->dark_postrating_never_negative)
			$enabled['negative'] = false;
			
		return $enabled;
	}
	
	public function getRatingsForOptionsTag($selectedId = null)
	{
		
		$ratings = $this->getRatings();
		$ratingsOption = array(0 => array(
			'value' => 0,
			'label' => 'Disabled',
			'selected' => $selectedId == 0,
		));
		foreach($ratings as $id => $rating)
		{
			$ratingsOption[$id] = array(
				'value' => $id,
				'label' => $rating['title'],
				'selected' => ($selectedId == $id),
			);
		}
		return $ratingsOption;
	}
	
	public function getPostRatingsDetail($post_id){		
		return $this->_getDb()->fetchAll(
			"
				SELECT rating, (select count(*) from dark_postrating pr2 where pr.rating=pr2.rating and pr.post_id = pr2.post_id) as rating_count, xf_user.*
				FROM dark_postrating pr
				LEFT JOIN xf_user on xf_user.user_id = pr.user_id
				WHERE post_id = ?
				ORDER BY rating_count desc, rating asc, pr.id asc
			"
		, array($post_id));
	}	
	
	public function getPostRatingsUser($user_id){
		return $this->_getDb()->fetchAll(
			"
				SELECT count_given as rating_count, rating, 1 as given
				FROM dark_postrating_count
				WHERE user_id = ?
				
				UNION                
				
				SELECT count_received as rating_count, rating, 0 as given
				FROM dark_postrating_count
				WHERE user_id = ?
				
				ORDER BY rating_count desc, rating asc
			"
		, array($user_id, $user_id));
	}    	
	
	public function countLikesGivenByUser($userId)
	{
		return $this->_getDb()->fetchOne('
			SELECT COUNT(*)
			FROM xf_liked_content
			WHERE like_user_id = ?
		', $userId);
	}
	
	public function countUnreadRatingAlertsForPost($post_id)
	{
		return $this->_getDb()->fetchOne('
			SELECT COUNT(*)
			FROM xf_user_alert
			WHERE content_id = ? and view_date = 0 and ((content_type = "post" and action = "like") or content_type = "postrating")
		', $post_id);
	}	
	
	public function getRatingNewsFeedEntryByUserOnPost($post_id, $user_id)
	{
		return $this->_getDb()->fetchOne('
			SELECT *
			FROM xf_news_feed
			WHERE content_id = ? and content_type = "postrating" and user_id = ?
		', array($post_id, $user_id));
	}
	
	public function getRatingDefinitionById($rating){		
		return $this->_getDb()->fetchRow('
			SELECT *
			FROM dark_postrating_ratings
			WHERE id = ?
		', $rating);
	}
	
	public function getPostRatingsForUser($user_id){
		return $this->_getDb()->fetchAll(
			"
				SELECT count_given, rating
				FROM dark_postrating_count
				WHERE user_id = ?
				ORDER BY count_given desc, rating asc
			"
		, array($user_id));
	}    
	
	
	public function getRatingsForContentUser($userId, array $fetchOptions = array())
	{
		$options = XenForo_Application::get('options');  		
			
		$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

		// With the addition of the union for xf likes this is not a very nice query, but still within acceptable performance bounds IMHO considering how rarely it will run.
		return $this->fetchAllKeyed($this->limitQueryResults(
			'
				(
					SELECT pr.*, user.*, "post" as content_type, pr.post_id as content_id, pr.user_id as rating_user_id
					FROM dark_postrating pr
					INNER JOIN xf_user AS user ON (user.user_id = pr.user_id)
					WHERE pr.rated_user_id=? and pr.rating <> ?
					ORDER BY pr.date DESC
				)	
					UNION ALL
				(									
					SELECT liked_content.like_id as id, liked_content.content_id as post_id, liked_content.like_user_id as user_id, liked_content.content_user_id as rated_user_id, ? as rating, liked_content.like_date as date,
						user.*, liked_content.content_type, liked_content.content_id, liked_content.like_user_id as rating_user_id
					FROM xf_liked_content AS liked_content
					INNER JOIN xf_user AS user ON (user.user_id = liked_content.like_user_id)
					WHERE 1 = ? and liked_content.content_user_id = ? and liked_content.content_type = \'post\'
					ORDER BY liked_content.like_date DESC
				)				
				
				ORDER BY date DESC
			', $limitOptions['limit'], $limitOptions['offset']
		), 'id', array($userId, $options->dark_postrating_like_id, $options->dark_postrating_like_id, $options->dark_postrating_like_id > 0 ? 1 : 0, $userId));
	}
	
	public function countRatingsForContentUser($userId)
	{
		$options = XenForo_Application::get('options');  	
		
		return $this->_getDb()->fetchOne('
			SELECT 
				(
					select COUNT(*)
					FROM dark_postrating
					WHERE rated_user_id = ? and rating <> ?
				) + (
					SELECT COUNT(*)
					FROM xf_liked_content
					WHERE content_user_id = ?
				)
		', array($userId, $options->dark_postrating_like_id, $userId));
	}
	
	public function getRatingsByContentUser($userId, array $fetchOptions = array())
	{
		$options = XenForo_Application::get('options');  		
		$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

		// See above thoughts on query performance (getRatingsForContentUser)
		return $this->fetchAllKeyed($this->limitQueryResults(
			'
				(
					SELECT pr.*, user.*, pr.user_id as user_id, "post" as content_type, pr.post_id as content_id, pr.user_id as rating_user_id
					FROM dark_postrating pr
					INNER JOIN xf_user AS user ON (user.user_id = pr.rated_user_id)
					WHERE pr.user_id=? and pr.rating <> ?
					ORDER BY pr.date DESC
				)
					UNION ALL
				(									
					SELECT liked_content.like_id as id, liked_content.content_id as post_id, liked_content.like_user_id as user_id, liked_content.content_user_id as rated_user_id, ? as rating, liked_content.like_date as date,
						user.*, liked_content.like_user_id as user_id, liked_content.content_type, liked_content.content_id, liked_content.like_user_id as rating_user_id
					FROM xf_liked_content AS liked_content
					INNER JOIN xf_user AS user ON (user.user_id = liked_content.content_user_id)
					WHERE 1 = ? and liked_content.like_user_id = ? and liked_content.content_type = \'post\'
					ORDER BY liked_content.like_date DESC
				)				
				
				ORDER BY date DESC
			', $limitOptions['limit'], $limitOptions['offset']
		), 'id', array($userId, $options->dark_postrating_like_id, $options->dark_postrating_like_id, $options->dark_postrating_like_id > 0 ? 1 : 0, $userId));
	}
	
	public function countRatingsByContentUser($userId)
	{
		$options = XenForo_Application::get('options');  	
		
		return $this->_getDb()->fetchOne('
			SELECT 
				(
					select COUNT(*)
					FROM dark_postrating
					WHERE user_id = ? and rating <> ?
				) + (
					SELECT COUNT(*)
					FROM xf_liked_content
					WHERE like_user_id = ?
				)
		', array($userId, $options->dark_postrating_like_id, $userId));
	}

	
	public function getRatingByUserOnPost($user_id, $post_id, $lockRow = false){		
		return $this->_getDb()->fetchOne(
			"
				SELECT rating
				FROM dark_postrating
				WHERE post_id = ? and user_id = ?
			" . ($lockRow ? ' for update ' : '')
		, array($post_id, $user_id));
	}    
	
	
	public function getRatingById($rating_id){		
		return $this->_getDb()->fetchRow(
			"
				SELECT *
				FROM dark_postrating
				WHERE id = ? 
			"
		, array($rating_id));
	}    
	
	protected function crazyQuery($query){	     
		$db = $this->_getDb();
		switch (get_class($db))
		{
			case 'Zend_Db_Adapter_Mysqli':
				$db->getConnection()->query($query);
				break;
			case 'Zend_Db_Adapter_Pdo_Mysql':
				$db->getConnection()->exec($query);
				break;
		}
	}
	
	protected function getLock($name, $timeout = 0){     
		$db = $this->_getDb();
		return $db->fetchOne("select get_lock(?, ?)", array($name, $timeout));
	}
	
	public function ratePost(array $post, $user_id, $rating, $oldRating = false){        
		$db = $this->_getDb();
		$options = XenForo_Application::get('options');
				
		/** @var $userModel XenForo_Model_User */
		$userModel = $this->getModelFromCache('XenForo_Model_User');
		$postUser = $userModel->getUserById($post['user_id'], array(
			'join' => XenForo_Model_User::FETCH_USER_OPTION | XenForo_Model_User::FETCH_USER_PROFILE
		));
		$user = $userModel->getUserById($user_id);
				
		/** @var $likeModel XenForo_Model_Like */
		$likeModel = $this->getModelFromCache('XenForo_Model_Like');
		
		// Race conditions everywhere
		if(!$this->getLock("postrating_".$user['user_id']."_".$post['post_id'], 1))
			return false;
			
		// Realistically better for the user to treat this sanely than throw an error
		$existingLike = $likeModel->getContentLikeByLikeUser('post', $post['post_id'], $user_id);
		if($existingLike)
			$likeModel->unlikeContent($existingLike);		
		
		$oldRating = $this->getRatingByUserOnPost($user['user_id'], $post['post_id'], false);
				
		if($oldRating){
			
			if(!$existingLike)
				$db->query('
					insert into dark_postrating_count set user_id = ?, rating = ?
					on duplicate key update count_given = IF(count_given > 0, count_given - 1, 0)
				', array($user_id, $oldRating));
			
			if($postUser){
				
				if(!$existingLike)
					$db->query('
						insert into dark_postrating_count set user_id = ?, rating = ?
						on duplicate key update count_received = IF(count_received > 0, count_received - 1, 0)
					', array($postUser['user_id'], $oldRating));				
				
				// If it's a like just use xenforo's system
				if($oldRating != $options->dark_postrating_like_id){
					$this->_getAlertModel()->deleteAlerts(
						'postrating', $post['post_id'], $user_id, 'rate'
					);
					$this->_getNewsFeedModel()->delete(
						'postrating', $post['post_id'], $user_id, 'rate'
					);
				}
			}
		}		 
			 
		if($rating == 'del'){		
		
			$db->query('
				delete from dark_postrating where post_id = ? and user_id = ?
			', array($post['post_id'], $user_id));			
		
		} else {
					
			
			if($rating != $options->dark_postrating_like_id){
				$db->query('
					insert into dark_postrating set post_id = ?, user_id = ?, rating = ?, rated_user_id = ?, date = UNIX_TIMESTAMP() 
					on duplicate key update rating = ?, date = UNIX_TIMESTAMP() 
				', array($post['post_id'], $user_id, $rating, $postUser ? $postUser['user_id'] : null, $rating));				
			
				$db->query('
					insert into dark_postrating_count set user_id = ?, rating = ?, count_given = 1
					on duplicate key update count_given = count_given + 1 
				', array($user_id, $rating));			
			}
			
			if($rating == $options->dark_postrating_like_id){				
				// If it's a like just use xenforo's system
				$likeModel->likeContent('post', $post['post_id'], $post['user_id']);
				
			} elseif($postUser){
				
				$db->query('
					insert into dark_postrating_count set user_id = ?, rating = ?, count_received = 1
					on duplicate key update count_received = count_received + 1 
				', array($postUser['user_id'], $rating));				 
					
					
				if($options->dark_postrating_alerts_integration){	
										
					if ((!method_exists($userModel, 'isUserIgnored') || !$userModel->isUserIgnored($postUser, $user_id))
						&& XenForo_Model_Alert::userReceivesAlert($postUser, 'post', 'like') // shared with like for everyone's convenience
						&& ($options->dark_postrating_alert_spam || $this->countUnreadRatingAlertsForPost($post['post_id']) == 0)
					){
						XenForo_Model_Alert::alert(
							$postUser['user_id'],
							$user_id,
							$user['username'],  
							'postrating',
							$post['post_id'],
							'rate'
						);
					}												
				}
				
				if($options->dark_postrating_news_integration && !$this->getRatingNewsFeedEntryByUserOnPost($post['post_id'], $user['user_id'])){			
					$this->_getNewsFeedModel()->publish(
						$user_id,
						$user['username'],
						'postrating',
						$post['post_id'],
						'rate'
					);					
				}
				
			}
		}
		
		return true;
	}
	
	public function recountRatings(){		
		@set_time_limit(0);
		ignore_user_abort(true);
		XenForo_Application::getDb()->setProfiler(false); 
		$db = $this->_getDb();
		$options = XenForo_Application::get('options');
		/** @var XenForo_Model_Like */
		$likeModel = $this->getModelFromCache('XenForo_Model_Like');
		
		// Delete ratings by users that no longer exist
		$db->query("delete pr.* from dark_postrating pr left join xf_user user on pr.user_id = user.user_id where user.user_id is null");		
		
		// Delete ratings on posts that no longer exist
		$db->query("delete pr.* from dark_postrating pr left join xf_post post on pr.post_id = post.post_id where post.post_id is null");		
		
		// Convert ratings using active like id to real likes
		if($options->dark_postrating_like_id > 0){
			
			$likeRatings = $this->fetchAllKeyed(
				'
					SELECT pr.*, user.*, "post" as content_type, pr.post_id as content_id, pr.id as rating_id
					FROM dark_postrating pr
					INNER JOIN xf_user AS user ON (user.user_id = pr.user_id)
					INNER JOIN xf_post AS post ON (post.post_id = pr.post_id)
					WHERE pr.rating=?
				', 'id', $options->dark_postrating_like_id);
				
			foreach($likeRatings as $likeRating){
				
				$contentType = $likeRating['content_type'];			
				$contentId = $likeRating['content_id'];			
				$contentUserId = $likeRating['rated_user_id'];			
				$likeUserId = $likeRating['user_id'];
				$likeDate = $likeRating['date'];
						
				// Pulled from XenForo_Model_Like
				$likeHandler = $likeModel->getLikeHandler($contentType);
				if($likeHandler)
				{					
					XenForo_Db::beginTransaction($db);

					$result = $db->query('
						INSERT IGNORE INTO xf_liked_content
							(content_type, content_id, content_user_id, like_user_id, like_date)
						VALUES
							(?, ?, ?, ?, ?)
					', array($contentType, $contentId, $contentUserId, $likeUserId, $likeDate));

					if (!$result->rowCount())
					{
						XenForo_Db::commit($db);
					} else {
						if ($contentUserId)
						{
							$userModel = $this->getModelFromCache('XenForo_Model_User');
							$contentUser = $this->getModelFromCache('XenForo_Model_User')->getUserById($contentUserId, array(
								'join' => XenForo_Model_User::FETCH_USER_OPTION | XenForo_Model_User::FETCH_USER_PROFILE
							));

							if ($contentUser)
							{
								$db->query('
									UPDATE xf_user
									SET like_count = like_count + 1
									WHERE user_id = ?
								', $contentUserId);
							}
						}

						$latestLikeUsers = $likeModel->getLatestContentLikeUsers($contentType, $contentId);
						$likeHandler->incrementLikeCounter($contentId, $latestLikeUsers);

						XenForo_Db::commit($db);
					}	
					// End of copypasta	
					
					
					$db->query("delete from dark_postrating where id = ?", array($likeRating['rating_id']));
				}
			} // foreach
		} // if like id
		
		// Rebuild dark_postrating_count table		
		$db->query("
			truncate table dark_postrating_count
		");
		$db->query("
			insert into dark_postrating_count 
			(user_id, rating, count_received) (
				SELECT rated_user_id, rating, count(*) as count_received
				FROM dark_postrating
				inner join xf_post on dark_postrating.post_id = xf_post.post_id
				where rated_user_id is not null and rated_user_id > 0 and xf_post.message_state = 'visible'
				group by rated_user_id, rating
			) on duplicate key update dark_postrating_count.count_received = values(count_received)
		");
		$db->query("
			insert into dark_postrating_count 
			(user_id, rating, count_given) (
				SELECT dark_postrating.user_id, rating, count(*) as count_given
				FROM dark_postrating
				inner join xf_post on dark_postrating.post_id = xf_post.post_id
				where xf_post.message_state = 'visible'
				group by dark_postrating.user_id, rating
			) on duplicate key update dark_postrating_count.count_given = values(count_given)
		");
	}

	public function canRatePost(array $post, array $thread, array $forum = array(), &$errorPhraseKey = '', array $nodePermissions = null, array $viewingUser = null)
	{
		$this->standardizeViewingUserReferenceForNode($thread['node_id'], $viewingUser, $nodePermissions);

		if (!$viewingUser['user_id'])
		{
			$errorPhraseKey = 'login_required';
			return false;
		}

		if ($post['message_state'] != 'visible')
		{
			return false;
		}

		if ($post['user_id'] == $viewingUser['user_id'])
		{			
			$errorPhraseKey = 'dark_cant_rate_own_posts';
			return false;
		}
		
		return XenForo_Permission::hasContentPermission($nodePermissions, 'ratePost');
	}
	
	public function canViewRatingListForPost(array $post, array $thread, array $forum = array(), &$errorPhraseKey = '', array $nodePermissions = null, array $viewingUser = null)
	{
		$this->standardizeViewingUserReferenceForNode($thread['node_id'], $viewingUser, $nodePermissions);
		
		if (!$viewingUser['user_id'])
		{
			$errorPhraseKey = 'login_required';
			return false;
		}

		if ($post['message_state'] != 'visible')
		{
			return false;
		}

		return XenForo_Permission::hasContentPermission($nodePermissions, 'listRatings');
	}
	
	public function canDeleteRating(array $post, array $thread, array $forum = array(), &$errorPhraseKey = '', array $nodePermissions = null, array $viewingUser = null)
	{
		$this->standardizeViewingUserReferenceForNode($thread['node_id'], $viewingUser, $nodePermissions);

		if (!$viewingUser['user_id'])
		{
			$errorPhraseKey = 'login_required';
			return false;
		}
		if ($post['message_state'] != 'visible')
		{
			return false;
		}
		
		return XenForo_Permission::hasContentPermission($nodePermissions, 'deleteRating');
	}
	
	public function hasRatedPost($post_id){		
		
		$visitor = XenForo_Visitor::getInstance();
				
		if (!$visitor['user_id'])
		{
			return false;
		}
		
		$db = $this->_getDb();  
		$rating = $db->fetchOne('
			SELECT rating
			FROM dark_postrating
			WHERE post_id = ? and user_id = ?
		', array($post_id, $visitor['user_id']));      
		
		$rating = !!$rating;
		
		if(!$rating){
			$rating = $db->fetchOne('
				SELECT content_id
				FROM xf_liked_content
				WHERE content_type = ?
					AND content_id = ?
					AND like_user_id = ?
			', array('post', $post_id, $visitor['user_id']));			
		}
		
		return !!$rating;
		
	}
	
	/**
	* $rating_id null or -1 = check if not rated
	*/
	public function hasRatedPostWithRating($post_id, $rating_id = -1, $user_id = false){
		
		
		if($user_id === false){				
			$visitor = XenForo_Visitor::getInstance();
					
			if (!$visitor['user_id'])
			{
				return false;
			}
			
			$user_id = $visitor['user_id'];	
		}	
			
		$db = $this->_getDb();
		
		if($rating_id > -1){
			$rating = $db->fetchOne('
				SELECT rating
				FROM dark_postrating
				WHERE post_id = ? and user_id = ? and rating = ?
			', array($post_id, $user_id, $rating_id));    
			
			return !!$rating;
			
		} else {		
			$rating = $db->fetchOne('
				SELECT rating
				FROM dark_postrating
				WHERE post_id = ? and user_id = ?
			', array($post_id, $user_id)); 
			
			return !$rating;
		}
		  
	}
	
	
	/**
	 * @return XenForo_Model_Alert
	 */
	protected function _getAlertModel()
	{
		return $this->getModelFromCache('XenForo_Model_Alert');
	}

	/**
	 * @return XenForo_Model_NewsFeed
	 */
	protected function _getNewsFeedModel()
	{
		return $this->getModelFromCache('XenForo_Model_NewsFeed');
	}
	
	/**
	 * @return XenForo_Model_Phrase
	 */
	protected function _getPhraseModel()
	{
		return $this->getModelFromCache('XenForo_Model_Phrase');
	}
}						