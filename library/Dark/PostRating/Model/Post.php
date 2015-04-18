<?php
  
class Dark_PostRating_Model_Post extends XFCP_Dark_PostRating_Model_Post
{
	
	public function preparePostJoinOptions(array $fetchOptions)
	{					
		$db = $this->_getDb();
		$visitor = XenForo_Visitor::getInstance();
		$fetchOptionsParam = $fetchOptions;
		$fetchOptions = parent::preparePostJoinOptions($fetchOptions);
		
		$options = XenForo_Application::get('options');
		/** @var Dark_PostRating_Model */
		$ratingModel = $this->getModelFromCache('Dark_PostRating_Model');
		$ratings = $ratingModel->getRatings();
		
		$threadId = 0;
		$pivotMode = false;
		$callStack = debug_backtrace();
		foreach($callStack as $call){
			if(!empty($call['function']) && !empty($call['args'])){
				
				if($call['function'] == 'getPostsInThread'){
					$threadId = $call['args'][0];
					$pivotMode = true;
					
				} elseif($call['function'] == 'getPostsAndParentData'){
					// assume we're in something that post ratings shouldn't touch (xf 1.3 copy posts etc.)
					return $fetchOptions;
				}			
					
			}
		}
		
		if(!$pivotMode){
			// Honestly this isn't as inefficient as it looks, in fact quite the opposite
			foreach($ratings as $id => $rating){
				$fetchOptions['selectFields'] .= ', (select count(*) from dark_postrating pr USE INDEX (`post_id_rating`) where pr.post_id = post.post_id and pr.rating = ' .intval($id). ') as dark_postrating_' .intval($id). '_count
	';			
			}
		}
					
		if($options->dark_postrating_postbit_integration && !empty($fetchOptionsParam['join']) && $fetchOptionsParam['join'] & self::FETCH_USER)
		{
			$positive = $negative = $neutral = array();
			foreach($ratings as $id => $rating){
				if($rating['type'] == 1)
					$positive[]=$id;
				else if($rating['type'] == -1)
					$negative[]=$id;
				else $neutral[]=$id;
			}
			if(!empty($positive))
				$fetchOptions['selectFields'] .= "
					,(select sum(count_received) from dark_postrating_count where user_id = post.user_id and rating in (".implode(",", $positive).")) as positive_rating_count
				";
			if(!empty($negative))
				$fetchOptions['selectFields'] .= "
					,(select sum(count_received) from dark_postrating_count where user_id = post.user_id and rating in (".implode(",", $negative).")) as negative_rating_count
				";
			if(!empty($neutral))
				$fetchOptions['selectFields'] .= "
					,(select sum(count_received) from dark_postrating_count where user_id = post.user_id and rating in (".implode(",", $neutral).")) as neutral_rating_count
				";
		}
						
		$fetchOptions['selectFields'] .= ',
			pr2.rating';
			
		if($pivotMode){
			$fetchOptions['selectFields'] .= ', 
				pr.*, post.post_id';
		}
		
		$fetchOptions['joinTables'] .= '
			LEFT JOIN dark_postrating pr2 ON (post.post_id = pr2.post_id and pr2.user_id = ' .$db->quote($visitor['user_id']) . ')';
			
			
		if($pivotMode){	
			
			$fetchOptions['joinTables'] .= '
	LEFT JOIN (
		select 
			pivot_pr.post_id
	';
				
				
			foreach($ratings as $id => $rating){
				$fetchOptions['joinTables'] .= ', sum(case when pivot_pr.rating = ' .intval($id). ' then 1 else 0 end) dark_postrating_' .intval($id). '_count
	';
				
			}
			
			$fetchOptions['joinTables'] .= '
					
		from dark_postrating pivot_pr 
		use index (`post_id_rating`)
		left join xf_post pivot_post on (pivot_pr.post_id = pivot_post.post_id)
		where pivot_post.thread_id = '.intval($threadId).'
		group by pivot_pr.post_id
	) pr on (pr.post_id = post.post_id)

	';
	
		}

		return $fetchOptions;
	}
	
	public function preparePost(array $post, array $thread, array $forum, array $nodePermissions = null, array $viewingUser = null){
		
		$options = XenForo_Application::get('options');
		
		$post = parent::preparePost($post, $thread, $forum, $nodePermissions, $viewingUser);
		
		$post['postrating_likes'] = $post['likes'];		
	 
		//if($options->dark_postrating_like_disable){
			
			// mega nasty hack for tapatalk likes support
			$callStack = debug_backtrace();
			$tapatalk = false;
			
			foreach($callStack as $call){
				if(isset($call['function']) && $call['function'] == 'get_thread_func'){
					$tapatalk = true;
					break;
				}
			}
			
			if(!$tapatalk){		
				$post['canLike'] = false;   
				$post['likes'] = 0;        
			}
			
		//}
		
		return $post;
	}
	
	
	
	
}