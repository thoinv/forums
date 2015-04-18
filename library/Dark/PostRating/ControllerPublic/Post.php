<?php
  
class Dark_PostRating_ControllerPublic_Post extends XFCP_Dark_PostRating_ControllerPublic_Post {

	public function actionRate()
	{      
		$options = XenForo_Application::get('options');
		//$this->_assertPostOnly();
		$this->_checkCsrfFromToken($this->_input->filterSingle('_xfToken', XenForo_Input::STRING), true);
		
		$postId = $this->_input->filterSingle('post_id', XenForo_Input::UINT);
		$rating = $this->_input->filterSingle('rating', XenForo_Input::UINT);

		$ftpHelper = $this->getHelper('ForumThreadPost');
		list($post, $thread, $forum) = $ftpHelper->assertPostValidAndViewable($postId);

		/** @var Dark_PostRating_Model */
		$ratingModel = $this->getModelFromCache('Dark_PostRating_Model');
		
		if (!$ratingModel->canRatePost($post, $thread, $forum, $errorPhraseKey))
		{
			throw $this->getErrorOrNoPermissionResponseException($errorPhraseKey);
		}
		
		$visitor = XenForo_Visitor::getInstance();
			
		$ratings = $ratingModel->getRatings();
		$ratings = $ratingModel->applyRatingWhitelist($ratings, $forum['node_id'], $post);
		
		/// @TODO: Consider if should be able to undo disabled rating and non existant rating
				
		// Check if rating name exists and rating not disabled
		if($rating != 'del' && (!array_key_exists($rating, $ratings) || $ratings[$rating]['disabled']))			
			return $this->responseError(new XenForo_Phrase('dark_invalid_rating')); 

			
		$success = $ratingModel->ratePost($post, $visitor['user_id'], $rating, !empty($post['rating']) ? $post['rating'] : false);

		if ($this->_noRedirect())
		{
			if(!$success){
				echo '{"templateHtml":"lock"}';
				exit;
			}
			
			// Load in new rating            
			/** @var XenForo_Model_Post */
			$postModel = $this->getModelFromCache('XenForo_Model_Post');
			$post = $postModel->getPostById($post['post_id']);
			$post = $postModel->preparePost($post, $thread, $forum);
			
			// top set of stuff in eventlistener  NEEDS TO STAY APPROX IN SYNC WITH CHANGES HERE
			$viewParams = array(
				'postrating_post_id' => $post['post_id'],
				'postrating_ratings' => $ratings,
				'post' => $post,
				'thread' => $thread,
				'forum' => $forum,
				'postrating_has_rated' => $ratingModel->hasRatedPost($post['post_id']),
				'postrating_can_rate' => $ratingModel->canRatePost($post, $thread, $forum),
				'postrating_can_list' => $ratingModel->canViewRatingListForPost($post, $thread, $forum),
				'postrating_js_modification' => filemtime("js/dark/postrating.js"),
				'postrating_minimum_opacity' => $options->dark_postrating_minimum_opacity,
			);
			
			return $this->responseView('Dark_ViewPublic_Post_RatingConfirmed', 'dark_postrating', $viewParams);
		}
		else
		{
			return $this->getPostSpecificRedirect($post, $thread);
		}
		
	}
	
	public function actionDeleteRating()
	{
		//$this->_assertPostOnly();
		$this->_checkCsrfFromToken($this->_input->filterSingle('_xfToken', XenForo_Input::STRING), true);
		
		$postId = $this->_input->filterSingle('post_id', XenForo_Input::UINT);
		$userId = $this->_input->filterSingle('user_id', XenForo_Input::UINT);

		$ftpHelper = $this->getHelper('ForumThreadPost');
		list($post, $thread, $forum) = $ftpHelper->assertPostValidAndViewable($postId);
		
		/** @var XenForo_Model_User */
		//$userModel = $this->getModelFromCache('XenForo_Model_User');
		//$user = $userModel->getUserById($userId);
		
		/** @var Dark_PostRating_Model */
		$ratingModel = $this->getModelFromCache('Dark_PostRating_Model');
		
		if (!$ratingModel->canDeleteRating($post, $thread, $forum, $errorPhraseKey))
		{
			throw $this->getErrorOrNoPermissionResponseException($errorPhraseKey);
		}
		
		$visitor = XenForo_Visitor::getInstance();
			
		$ratings = $ratingModel->getRatings();
		// If this is ever used before output, don't forget about the whitelist
		$ratings = $ratingModel->applyRatingWhitelist($ratings, $forum['node_id'], $post);
		
		$ratingEntry = $ratingModel->getRatingByUserOnPost($userId, $post['post_id']);
		/*if(empty($ratingEntry)){
			throw $this->getErrorOrNoPermissionResponseException("dark_invalid_rating");			
		}*/
		
		$ratingModel->ratePost($post, $userId, 'del', !empty($ratingEntry['rating']) ? $ratingEntry['rating'] : false);

		if ($this->_noRedirect())
		{
			// Load in new rating            
			/** @var XenForo_Model_Post */
			$postModel = $this->getModelFromCache('XenForo_Model_Post');
			$post = $postModel->getPostById($post['post_id']);
			$post = $postModel->preparePost($post, $thread, $forum);
			
			$viewParams = array(
				'postrating_post_id' => $post['post_id'],
				'postrating_ratings' => $ratings,
				'post' => $post,
				'thread' => $thread,
				'forum' => $forum,
				'postrating_has_rated' => $ratingModel->hasRatedPost($post['post_id']),
				'postrating_can_rate' => $ratingModel->canRatePost($post, $thread, $forum),
				'postrating_can_list' => $ratingModel->canViewRatingListForPost($post, $thread, $forum),
				'postrating_js_modification' => filemtime("js/dark/postrating.js"),
			);
			
			return $this->responseView('Dark_ViewPublic_Post_RatingConfirmed', 'dark_postrating', $viewParams);
		}
		else
		{
			return $this->getPostSpecificRedirect($post, $thread);
		}
		
	}	
		
		
	public function actionRatings(){        
		$options = XenForo_Application::get('options');
		
		$postId = $this->_input->filterSingle('post_id', XenForo_Input::UINT);

		$ftpHelper = $this->getHelper('ForumThreadPost');
		list($post, $thread, $forum) = $ftpHelper->assertPostValidAndViewable($postId);

		/** @var Dark_PostRating_Model */
		$ratingModel = $this->getModelFromCache('Dark_PostRating_Model');
		/* @var XenForo_Model_Like */
		$likeModel = XenForo_Model::create('XenForo_Model_Like');  		
		
		if (!$ratingModel->canViewRatingListForPost($post, $thread, $forum, $errorPhraseKey))
		{
			throw $this->getErrorOrNoPermissionResponseException($errorPhraseKey);
		}		
				
		$ratings = $ratingModel->getRatings();
		$ratings = $ratingModel->applyRatingWhitelist($ratings, $forum['node_id'], $post, true);
		$ratingsDetail = $ratingModel->getPostRatingsDetail($post['post_id']);		
		
		$ratingsDetail2 = array();
		$i = -1;
		
		// Insert likes as ratings
		if($options->dark_postrating_like_id > 0 && !empty($ratings[$options->dark_postrating_like_id])){
			
			/** @var XenForo_Model_Post */
			$postModel = $this->getModelFromCache('XenForo_Model_Post');
			$post = $postModel->getPostById($postId);
			
			/** @var XenForo_Model_User */
			$userModel = $this->getModelFromCache('XenForo_Model_User');
			
			if($post['likes'] > 0){    
				//$post['likeUsers'] = array_reverse(unserialize($post['like_users']));
				$likeUsers = $likeModel->getContentLikes('post', $post['post_id']);
				if(!empty($likeUsers)){
					$likeUsers = array_reverse($likeUsers);
					$ratingsDetail2[$options->dark_postrating_like_id] = $ratings[$options->dark_postrating_like_id];
					$ratingsDetail2[$options->dark_postrating_like_id] += array(
						'count' => $post['likes'],
						'list' => array(),
					);
					/*$likeUserIds = array();
					foreach($post['likeUsers'] as $user){
						$likeUserIds[]=$user['user_id'];
					}*/
					//$users = $userModel->getUsersByIds($likeUserIds);
					foreach($likeUsers as $user){
						//if(!empty($users[$user['user_id']]))      
							$ratingsDetail2[$options->dark_postrating_like_id]['list'][] = $user;
					}
				}
			}
				
		}
		
		// Prepare standard ratings too
		foreach($ratingsDetail as $ratingDetail){
			// If it's already been prepared (ie like rating)
			if($ratingDetail['rating'] == $options->dark_postrating_like_id)
				continue;
			// If rating doesn't exist
			if(!array_key_exists($ratingDetail['rating'], $ratings))
				continue;
				
			if(!array_key_exists($ratingDetail['rating'], $ratingsDetail2)){
				//$i ++;
				$ratingsDetail2[$ratingDetail['rating']] = $ratings[$ratingDetail['rating']];                
				$ratingsDetail2[$ratingDetail['rating']] += array(
					'count' => $ratingDetail['rating_count'],
					//'newRow' => $i > 0 && $i % 4 == 0,
					'list' => array(),
				);
			}
			$ratingsDetail2[$ratingDetail['rating']]['list'][] = $ratingDetail;
		}
		
			
		$ratingModel->sortPreparedRatings($ratingsDetail2);
		/*
		foreach($ratingsDetail2 as &$rD2){
			usort()
			$rD2['list'] = array_unique($rD2['list'], SORT_REGULAR);
		}*/		
			
		unset($ratingDetail);
		foreach($ratingsDetail2 as &$ratingDetail){
			$i ++;
			$ratingDetail['newRow'] = $i > 0 && $i % 4 == 0;
		}
		
		$viewParams = array(
			'postrating_detail' => $ratingsDetail2,
			'postrating_ratings' => $ratings,
			'postrating_js_modification' => filemtime("js/dark/postrating.js"),
			'postrating_can_delete' => $ratingModel->canDeleteRating($post, $thread, $forum, $errorPhraseKey),
			'thread' => $thread,
			'post' => $post,
			'forum' => $forum,
			'nodeBreadCrumbs' => $ftpHelper->getNodeBreadCrumbs($forum),
		);
				
		return $this->responseView('Dark_ViewPublic_Post_Ratings', 'dark_postrating_detail', $viewParams);                
	}
	
}						