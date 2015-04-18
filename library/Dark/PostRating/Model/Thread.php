<?php
  
class Dark_PostRating_Model_Thread extends XFCP_Dark_PostRating_Model_Thread
{
	
	public function prepareThreadFetchOptions(array $fetchOptions)
	{      
		$db = $this->_getDb();
		$visitor = XenForo_Visitor::getInstance();
		$fetchOptionsParam = $fetchOptions;
		$fetchOptions = parent::prepareThreadFetchOptions($fetchOptions);
		
		$options = XenForo_Application::get('options');
		
		if($options->dark_postrating_min_thread_ratings > 0){
			
			/** @var Dark_PostRating_Model */
			$ratingModel = $this->getModelFromCache('Dark_PostRating_Model');
			$ratings = $ratingModel->getRatings();
			
			// Make the wild and edgy assumption that FETCH_USER = fetching threads for common display
			if(!empty($fetchOptionsParam['join']) && $fetchOptionsParam['join'] & self::FETCH_USER)
			{
				// Just like Model_Post, this is far more efficient than it looks 
				foreach($ratings as $id => $rating){
					$fetchOptions['selectFields'] .= ', (select count(*) from dark_postrating pr USE INDEX (`post_id_rating`) where pr.post_id = thread.first_post_id and pr.rating = ' .intval($id). ') as dark_postrating_' .intval($id). '_count, 1 as dark_postrating_has_fetched_max
		';			
				}
			}
		}
						
		return $fetchOptions;
	}
	
	public function prepareThread(array $thread, array $forum, array $nodePermissions = null, array $viewingUser = null){
		
		$options = XenForo_Application::get('options');
		
		$thread = parent::prepareThread($thread, $forum, $nodePermissions, $viewingUser);
		
		if($options->dark_postrating_min_thread_ratings > 0 && !empty($thread['dark_postrating_has_fetched_max'])){
			
			/** @var Dark_PostRating_Model */
			$ratingModel = $this->getModelFromCache('Dark_PostRating_Model');
			$ratings = $ratingModel->getRatings();
			
			// Performing this logic in MySQL efficiently is easier said than done (huge temp tables everywhere), so doing it here instead
			$max = 0;
			$maxId = 0;
			foreach($ratings as $id => $rating){
				
				if($id == $options->dark_postrating_like_id)
					$count = $thread['first_post_likes'];
				else
					$count = $thread['dark_postrating_' .intval($id). '_count'];
					
				if($count > $max){
					$max = $count;
					$maxId = $id;
				}
			}			
			
			if($max < $options->dark_postrating_min_thread_ratings){				
				$max = 0;
				$maxId = 0;
			}
			
			$thread['dark_postrating_max'] = $max;
			$thread['dark_postrating_max_id'] = $maxId;		
			
		}
		
		
		return $thread;
	}
	
}







