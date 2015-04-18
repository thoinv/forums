<?php
  
class Dark_PostRating_Model_Alert extends XFCP_Dark_PostRating_Model_Alert {
	
	public function alertUser($alertUserId, $userId, $username, $contentType, $contentId, $action, array $extraData = null){		
		$options = XenForo_Application::get('options');
		
		// integrate allow multiple unread alerts option with xf likes
		if(!$options->dark_postrating_alert_spam && $contentType == 'post' && $action == 'like'){			
			/** @var Dark_PostRating_Model */
			$ratingModel = $this->getModelFromCache('Dark_PostRating_Model');
						
			if($ratingModel->countUnreadRatingAlertsForPost($contentId) > 0)
				return;
		}		
		
		// for post likes, block alert publishing if the option is unticked in post ratings settings (for consistency)
		$isPr = ($contentType == 'post' && $action == 'like') || $contentType == 'postrating';
		if(!$isPr || $options->dark_postrating_news_integration)		
			parent::alertUser($alertUserId, $userId, $username, $contentType, $contentId, $action, $extraData);		
	}
	
}