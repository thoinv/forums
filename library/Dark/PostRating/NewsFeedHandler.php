<?php
  
class Dark_PostRating_NewsFeedHandler extends XenForo_NewsFeedHandler_DiscussionMessage_Post {
	
	protected function _prepareNewsFeedItemAfterAction(array $item, $content, array $viewingUser){						
		$item = parent::_prepareNewsFeedItemAfterAction($item, $content, $viewingUser);
		
		
		/** @var Dark_PostRating_Model */
		$ratingModel = XenForo_Model::create('Dark_PostRating_Model');
		$ratings = $ratingModel->getRatings();          
		
		$rating = $ratingModel->getRatingByUserOnPost($item['user']['user_id'], $item['content']['post_id']);
		if($rating && array_key_exists($rating, $ratings)){
			$item['content']['rating'] = $ratings[$rating];
		}
		$item['content']['rating_user_id'] = $item['user']['user_id'];
		$item['content']['rated_user_id'] = $item['content']['user_id'];
	
		return $item;
	}
	
}
