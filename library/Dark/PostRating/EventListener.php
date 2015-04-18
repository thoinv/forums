<?php
  
class Dark_PostRating_EventListener {	
	
	public static function TemplateHook($hookName, &$content, array $hookParams, XenForo_Template_Abstract $template)
	{						
		
		switch($hookName){
			
			case 'dark_postrating_likes_bar':
			case 'dark_postrating_likes_bar_xenporta':
			case 'message_content':
					
				if(empty($hookParams['post']))
					$hookParams['post'] = $hookParams['message'];
				if(empty($hookParams['post']['thread_id']))
					return;
					
				$options = XenForo_Application::get('options');
				
				if(($options->dark_postrating_abovesig && $hookName == 'message_content') || (!$options->dark_postrating_abovesig && $hookName == 'dark_postrating_likes_bar') || $hookName == 'dark_postrating_likes_bar_xenporta'){
					
					$params = $template->getParams();
					
					if(!empty($params['dark_bestposts_type'])){
						if(empty($params['thread']))
							$params['thread'] = $hookParams['post'];
						if(empty($params['forum']))
							$params['forum'] = $hookParams['post'];
					}
						
					/** @var Dark_PostRating_Model */
					$ratingModel = XenForo_Model::create('Dark_PostRating_Model');
					$ratings = $ratingModel->getRatings();
					$ratings = $ratingModel->applyRatingWhitelist($ratings, $params['forum']['node_id'], $hookParams['post']);
					
					// controllerpublic/post/rate NEEDS TO STAY APPROX IN SYNC WITH CHANGES HERE
					$params += array(
						'postrating_ratings' => $ratings,
						'postrating_post_id' => $hookParams['post']['post_id'],
						'options' => $options,
						'post' => $hookParams['post'],
						'postrating_js_modification' => filemtime("js/dark/postrating.js"),
						'postrating_minimum_opacity' => $options->dark_postrating_minimum_opacity,
						'postrating_can_rate' => $ratingModel->canRatePost($hookParams['post'], $params['thread'], $params['forum']),
						'postrating_can_list' => $ratingModel->canViewRatingListForPost($hookParams['post'], $params['thread'], $params['forum']),
						'postrating_has_rated' => (!!$hookParams['post']['rating']) || (!!$hookParams['post']['like_date']),
					);
					
					$content .= $template->create('dark_postrating', $params)->render();
				}
				
				break;
				
				
			case 'member_view_sidebar_middle1':
			
				$options = XenForo_Application::get('options');
				if($options->dark_postrating_profile){			
					$params = $template->getParams();
					$params += $hookParams;
					$content .= $template->create('dark_postrating_member', $params);		
				}
			
			
			case 'member_view_info_block':
		
				$options = XenForo_Application::get('options');
				if($options->dark_postrating_profile){			       
					$params = $template->getParams();
					$params += $hookParams;
					$content_totals = $template->create('dark_postrating_member_totals', $params);
				
					// Hide Likes received if being shown as ratings
					if($options->dark_postrating_like_show){
						$likesReceived = (string)new XenForo_Phrase('likes_received');
						$content = preg_replace('#(<dt(?: title=".*?")?>'.$likesReceived.':</dt>\s*<dd>.*?</dd>)#', '', $content);
					}
					
					if($hookName == 'member_view_info_block')
						$content .= $content_totals;        
					else {				
						$trophyPoints = (string)new XenForo_Phrase('trophy_points');
						$content = preg_replace('#(<dt>'.$trophyPoints.')#', $content_totals . '$1', $content, 1);
					}				
				}			
				break;
			
			
			case 'member_card_stats':
			case 'dark_member_list_info':
		
			
				$options = XenForo_Application::get('options');            
				if($hookName != 'member_card_stats' || $options->dark_postrating_member_card){
					
					$params = $template->getParams();
					
					$params += $hookParams;
					if(!empty($hookParams['user']))
						$params['user'] = $hookParams['user'];
										
					// Hide Likes received if being shown as ratings
					if($options->dark_postrating_like_show){
						$likesReceived = (string)new XenForo_Phrase('likes_received');
						$content = preg_replace('#(<dt(?: title=".*?")?>'.$likesReceived.':</dt>\s*<dd>.*?</dd>)#', '', $content, 1);
					}            
					
					// Insert extra stuff just before trophies
					$trophyPoints = (string)new XenForo_Phrase('trophy_points');
					$content_card = $template->create($hookName == 'member_card_stats' ? 'dark_postrating_member_card' : 'dark_postrating_member_info', $params);
					$content = preg_replace('#(<dt>'.$trophyPoints.')#', $content_card . ' $1', $content, 1);
					
				}						
			
				break;
				
			case 'sidebar_visitor_panel_stats':
		
				
				$options = XenForo_Application::get('options');    
				if($options->dark_postrating_member_card){
					
					$params = $template->getParams();
					$params += $hookParams;
					$params['user'] = $params['visitor'];
					$content_totals = $template->create('dark_postrating_visitor_panel', $params);
					
					// Hide Likes received if being shown as ratings
					if($options->dark_postrating_like_show){
						$likesReceived = (string)new XenForo_Phrase('likes');
						$content = preg_replace('#(<dl.*?><dt>'.$likesReceived.':</dt>\s*<dd>.*?</dd></dl>)#', '', $content);
					}
					
					if($hookName == 'member_view_info_block')
						$content .= $content_totals;        
					else {				
						$trophyPoints = (string)new XenForo_Phrase('points');
						$content = preg_replace('#(<dl.*?><dt>'.$trophyPoints.')#', $content_totals . '$1', $content, 1);
					}
					
				}
				break;
				
			case 'account_wrapper_sidebar_your_account':
			case 'navigation_visitor_tab_links2':
			case 'navigation_tabs_account':
				
			
				$options = XenForo_Application::get('options');    
				if($options->dark_postrating_likes_youve_received){
					
					$params = $template->getParams();
					$content_wrapper = $template->create($hookName == 'account_wrapper_sidebar_your_account' ?  'dark_postrating_account_wrapper' : 'dark_postrating_navigation_visitor_tab', $params);
					$content = preg_replace('#^(.*)(<li><a.*?href="[^"]*account/likes[^"]*">.*?</a></li>)(.*)$#s', '$1' . $content_wrapper .'$3', $content);				
				}
				break;
				
				
			case 'message_user_info_extra':
		
				$params = $template->getParams();
				$params += $hookParams;
				$content = $content . $template->create('dark_postrating_message_user_info', $params);		
				break;
				
				
			case 'user_criteria_content':					
					
				$params = $template->getParams();
				$content .= $template->create('dark_postrating_criteria', $params);
				break;
				
			case 'thread_list_item_icon_key':
				
				$params = $template->getParams();
				$params += $hookParams;
				$content .= $template->create('dark_postrating_thread_icon', $params);
				break;
				
			
			case 'dark_postrating_member_notable_tabs':
				
				$params = $template->getParams();
				$params += $hookParams;
				$content .= $template->create('dark_postrating_member_notable_tabs', $params);
				break;
				
				
		}
	}
	
	public static function TemplateCreate($templateName, array &$params, XenForo_Template_Abstract $template){

		switch($templateName){
			
			case 'dark_postrating_output':
			case 'dark_postrating':
				
				if(!empty($params['options']))
					$options = $params['options'];
				else
					$options = XenForo_Application::get('options');
			
				/** @var $ratingModel Dark_PostRating_Model */
				$ratingModel = XenForo_Model::create('Dark_PostRating_Model');
				
				/*if(!empty($params['postrating_ratings']))
					$ratings = $params['postrating_ratings'];
				else {*/
					$ratings = $ratingModel->getRatings();          
					$ratings = $ratingModel->applyRatingWhitelist($ratings, $params['forum']['node_id'], $params['post'], true);
				//}
				
				$ratingsOut2 = array();
				if($options->dark_postrating_like_id > 0 && !empty($ratings[$options->dark_postrating_like_id])){
					if($params['post']['postrating_likes'] > 0){     
						$ratingsOut2[$options->dark_postrating_like_id] = $ratings[$options->dark_postrating_like_id]; 
						$ratingsOut2[$options->dark_postrating_like_id] += array(
							'count' => $params['post']['postrating_likes'],
						);
					}
				}
				
				$count_negative = 0;
				$count_all = $params['post']['postrating_likes'];
				foreach($ratings as $id => $rating){                
					if(!empty($params['post']['dark_postrating_'.$id.'_count']) && $id != $options->dark_postrating_like_id ){
						$ratingsOut2[$id] = $rating;
						$ratingsOut2[$id] += array(
							'count' => $params['post']['dark_postrating_'.$id.'_count'],
						);
						$count_all += $params['post']['dark_postrating_'.$id.'_count'];
						if($rating['type'] == -1)
							$count_negative += $params['post']['dark_postrating_'.$id.'_count'];
					}
				}
				
				$ratingModel->sortPreparedRatings($ratingsOut2);
				
				$params += array(
					'postrating_ratings_out' => $ratingsOut2,
					'message' => $params['post'],
					'postrating_has_ratings' => count($ratingsOut2) > 0,
					'postrating_ratings_lots' => count($ratingsOut2) > 4,
					'postrating_hide_post' => $count_all > 0 && $options->dark_postrating_hide_post > 0 && $count_negative >= $options->dark_postrating_hide_post && ($options->dark_postrating_hide_post_percentage == 0 || $count_negative / $count_all * 100 >= $options->dark_postrating_hide_post_percentage),
				);
				break;
				
			case 'dark_postrating_member_card':
			case 'dark_postrating_member_info':
			case 'dark_postrating_visitor_panel':
			case 'dark_postrating_message_user_info':
					
				// Totals only, using already available data
				
				$options = XenForo_Application::get('options');            
				
				$ratingModel = XenForo_Model::create('Dark_PostRating_Model');
				$enabledRatings = $ratingModel->getEnabledRatingTypes($options);
				
				$total = array('neutral' => 0, 'positive' => 0, 'negative' => 0, 'all' => 0);
				if($options->dark_postrating_like_id > 0 && $options->dark_postrating_like_show){
					$total['positive'] += $params['user']['like_count'];
				}
				if(!empty($params['user']['positive_rating_count'])){
					$total['positive'] += $params['user']['positive_rating_count'];
				}
				if(!empty($params['user']['neutral_rating_count'])){
					$total['neutral'] += $params['user']['neutral_rating_count'];
				}
				if(!empty($params['user']['negative_rating_count'])){
					$total['negative'] += $params['user']['negative_rating_count'];		
				}
				
				if($enabledRatings['positive'])
					$total['all'] += $total['positive'];
				if($enabledRatings['neutral'])
					$total['all'] += $total['neutral'];
				if($enabledRatings['negative'])
					$total['all'] += $total['negative'];
					
				if($total['all'] == 0)
					$total['all'] = 1;
					
				$params += array(			
					'postrating_ratings_total' => $total,
					'postrating_enabled_ratings' => $enabledRatings,
				);			
				break;
				
			case 'dark_postrating_member':
			case 'dark_postrating_member_totals':
					
				// Fine grained totals, one query per user
				
				$options = XenForo_Application::get('options');       
					 
				/* @var $likeModel XenForo_Model_Like */
				$likeModel = XenForo_Model::create('XenForo_Model_Like');             
				/* @var $ratingModel Dark_PostRating_Model */
				$ratingModel = XenForo_Model::create('Dark_PostRating_Model');
				$ratings = $ratingModel->getRatings();
				$enabledRatings = $ratingModel->getEnabledRatingTypes($options);
				
				$ratingsOut = $ratingModel->getPostRatingsUser($params['user']['user_id']);
				$ratingsOut2 = $ratings;
				
				foreach($ratingsOut as $ratingOut){
					if(!array_key_exists($ratingOut['rating'], $ratings))
						continue;
					if($ratingOut['given'])
						$ratingsOut2[$ratingOut['rating']] += array(
							'given' => $ratingOut['rating_count']
						);
					if(!$ratingOut['given'])
						$ratingsOut2[$ratingOut['rating']] += array(
							'received' => $ratingOut['rating_count']
						);
				}
				foreach($ratingsOut2 as &$ratingOut){
					if(empty($ratingOut['given']))
						$ratingOut['given'] = 0;
					if(empty($ratingOut['received']))
						$ratingOut['received'] = 0;
				}
				
				if($options->dark_postrating_like_id > 0 && $options->dark_postrating_like_show){
					$ratingsOut2[$options->dark_postrating_like_id]['received'] += $params['user']['like_count'];
					$ratingsOut2[$options->dark_postrating_like_id]['given'] += $ratingModel->countLikesGivenByUser($params['user']['user_id']);
				}				
				
				$total = array('neutral' => 0, 'positive' => 0, 'negative' => 0, 'all' => 0);
				foreach($ratingsOut2 as &$ratingOut){
					if($ratingOut['type'] == 0)
						$total['neutral'] += $ratingOut['received'];
					if($ratingOut['type'] == -1)
						$total['negative'] += $ratingOut['received'];
					if($ratingOut['type'] == 1)
						$total['positive'] += $ratingOut['received'];
				}
				
				if($enabledRatings['positive'])
					$total['all'] += $total['positive'];
				if($enabledRatings['neutral'])
					$total['all'] += $total['neutral'];
				if($enabledRatings['negative'])
					$total['all'] += $total['negative'];
				
				if($total['all'] == 0)
					$total['all'] = 1;
					
				if($options->dark_postrating_like_id > 0 && !$options->dark_postrating_like_show)
					unset($ratingsOut2[$options->dark_postrating_like_id]);		
										
				$params += array(			
					'postrating_ratings_out' => $ratingsOut2,
					'postrating_ratings_total' => $total,
					'postrating_enabled_ratings' => $enabledRatings,
					'postrating_total_numeric' => $options->dark_postrating_member_numeric,
					'postrating_total_bar' => $options->dark_postrating_member_bar,
				);
				break;
				
				
			case 'dark_postrating_member_notable_tabs':				     
	
				$options = XenForo_Application::get('options');
				/* @var $ratingModel Dark_PostRating_Model */
				$ratingModel = XenForo_Model::create('Dark_PostRating_Model');
				
				
				if(!$options->dark_postrating_member_card){
					$enabledRatings = array();
					$enabledRatings['positive'] = false;
					$enabledRatings['neutral'] = false;
					$enabledRatings['negative'] = false;
				} else {
					$enabledRatings = $ratingModel->getEnabledRatingTypes($options);
				}
				
				$params += array(
					'postrating_enabled_ratings' => $enabledRatings,
				);
				
				break;
				
				
			case 'dark_postrating_thread_icon':				     
		
				if($params['thread']['dark_postrating_max'] > 0){
					/* @var $ratingModel Dark_PostRating_Model */
					$ratingModel = XenForo_Model::create('Dark_PostRating_Model');
					$ratings = $ratingModel->getRatings();
					$params += array(
						'rating' => $ratings[$params['thread']['dark_postrating_max_id']] + array('count' => $params['thread']['dark_postrating_max']),
					);
				}			
				break;
							
			case 'PAGE_CONTAINER':
				$template->preloadTemplate('dark_postrating');
				$template->preloadTemplate('dark_postrating_member');
				$template->preloadTemplate('dark_postrating_member_totals');
				$template->preloadTemplate('message_user_info_extra');
				$template->preloadTemplate('user_criteria_content');
				$template->preloadTemplate('thread_list_item_icon_key');
				$template->preloadTemplate('dark_postrating_member_notable_tabs');
				$template->preloadTemplate('dark_postrating_account_wrapper');
				$template->preloadTemplate('dark_postrating_navigation_visitor_tab');
				$template->preloadTemplate('dark_postrating_visitor_panel');
				$template->preloadTemplate('dark_postrating_member_card');
				$template->preloadTemplate('dark_postrating_member_info');
				$template->preloadTemplate('dark_postrating_message_user_info');
				break;

		}
	}

	public static function CriteriaUser($rule, array $data, array $user, &$returnValue){
		$options = XenForo_Application::get('options');
		if($options->dark_postrating_criteria_integration){			
			
			if($options->dark_postrating_like_id > 0 && $options->dark_postrating_like_show && isset($user['positive_rating_count']))
				$user['positive_rating_count'] += $user['like_count'];
				
			switch($rule){
				case 'positive_rating_count':
					$returnValue = true;
					if (!isset($user['positive_rating_count']) || $user['positive_rating_count'] < $data['count'])
						$returnValue = false;
				break;
				case 'negative_rating_count':
					$returnValue = true;
					if (!isset($user['negative_rating_count']) || $user['negative_rating_count'] < $data['count'])
						$returnValue = false;
				break;
				case 'neutral_rating_count':
					$returnValue = true;
					if (!isset($user['neutral_rating_count']) || $user['neutral_rating_count'] < $data['count'])
						$returnValue = false;
				break;
				case 'total_rating_count':
					$returnValue = true;
					if (!isset($user['total_rating_count']) || $user['total_rating_count'] < $data['count'])
						$returnValue = false;
				break;
			}
		}
	}
	
	public static function LoadClassController($class, array &$extend)
	{
		if ($class == 'XenForo_ControllerPublic_Post')
			$extend[] = 'Dark_PostRating_ControllerPublic_Post';
		elseif ($class == 'XenForo_ControllerPublic_Account')
			$extend[] = 'Dark_PostRating_ControllerPublic_Account';
		elseif ($class == 'XenForo_ControllerPublic_Member')
			$extend[] = 'Dark_PostRating_ControllerPublic_Member';
	}
		
	public static function LoadClassModel($class, array &$extend){		
		if ($class == 'XenForo_Model_Post')
			$extend[] = 'Dark_PostRating_Model_Post';
		elseif ($class == 'XenForo_Model_Conversation')
			$extend[] = 'Dark_PostRating_Model_Conversation';
		elseif ($class == 'XenForo_Model_User')
			$extend[] = 'Dark_PostRating_Model_User';
		elseif ($class == 'XenForo_Model_Session')
			$extend[] = 'Dark_PostRating_Model_Session';
		elseif ($class == 'XenForo_Model_Thread')
			$extend[] = 'Dark_PostRating_Model_Thread';
		elseif ($class == 'XenForo_Model_NewsFeed')
			$extend[] = 'Dark_PostRating_Model_NewsFeed';
		elseif ($class == 'XenForo_Model_Alert')
			$extend[] = 'Dark_PostRating_Model_Alert';
	}
	
	public static function TemplateEditAdMessageBelow(&$templateText, &$applyCount, $styleId){
		
		// only apply this edit on xenforo < 1.1.4
		if(XenForo_Application::$versionId < 1010470){
			$templateText .= '<xen:hook name="message_below" params="{xen:array \'post={$message}\',\'message_id={$messageId}\'}" />';
			$applyCount ++;
		}		
	}
	
	
}
						