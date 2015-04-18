<?php
  
class Dark_PostRating_Model_NewsFeed extends XFCP_Dark_PostRating_Model_NewsFeed {
	
	public function publish($userId, $username, $contentType, $contentId, $action, array $extraData = null){		
		$options = XenForo_Application::get('options');
		// for post likes, block news feed publishing if the option is unticked in post ratings settings (for consistency)
		$isPr = ($contentType == 'post' && $action == 'like') || $contentType == 'postrating';
		if(!$isPr || $options->dark_postrating_news_integration)		
			parent::publish($userId, $username, $contentType, $contentId, $action, $extraData);		
	}
	
}