<?php

//######################## Star Rating Threads By Borbole ###########################
class Borbole_StarRating_ControllerPublic_Thread extends XFCP_Borbole_StarRating_ControllerPublic_Thread
{
    public function actionIndex() 
	{
		$parent = parent::actionIndex();
		
		if ($parent instanceof XenForo_ControllerResponse_View) 
		{
		   //Define some variables
		   $ftpHelper = $this->getHelper('ForumThreadPost');
		   $threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);
		   list($thread, $forum) = $ftpHelper->assertThreadValidAndViewable($threadId);
		   
	       //Exclude thread ratings from certain forum(s)
		   $options = XenForo_Application::get('options');
		   $exclude = $options->excludedratingforums;
		
		   $visitor = XenForo_Visitor::getInstance();
		
		   $nodeId = $parent->params['thread']['node_id'];

		    if(isset($nodeId) AND !in_array($nodeId, $exclude))
		    {
               $canviewratings = $visitor->hasPermission('rating', 'canViewRatings');
	           //Register variables for use in our template
	           $parent->params['canviewratings'] = $canviewratings;

		    }
		}
		
		return $parent;
	}
	
	public function actionRate()
	{
	    //This action must be called via POST
		$this->_assertPostOnly();
		
		$threadModel = $this->_getThreadModel();
		
		//Define some variables
		$ftpHelper = $this->getHelper('ForumThreadPost');
		$threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);
		list($thread, $forum) = $ftpHelper->assertThreadValidAndViewable($threadId);
		
		$visitor = XenForo_Visitor::getInstance();
		
		//Exclude thread ratings from certain forum(s). 
		$options = XenForo_Application::get('options');
		
		$exclude = $options->excludedratingforums;

		if (in_array($forum['node_id'], $exclude))
		{
			throw $this->responseException($this->responseError(new XenForo_Phrase('requested_page_not_found'), 404));
		}
		
		//Can rate threads permission
		if (!$this->_getRatingModel()->canRateThreads($thread, $forum, $errorPhraseKey))
		{
			throw $this->getErrorOrNoPermissionResponseException($errorPhraseKey);
		}
		
		//Prevent abuse of the rating system by setting up a daily limit
		if (!$this->_getRatingModel()->dailyRatingLimit($thread, $forum, $errorPhraseKey))
		{
			throw $this->getErrorOrNoPermissionResponseException($errorPhraseKey);
		}

		$input = $this->_input->filter(array(
			'rating' => XenForo_Input::UINT,
			'is_anonymous' => XenForo_Input::UINT,
			'message' => XenForo_Input::STRING,
		));

		$existing = $this->_getRatingModel()->getRatingByThreadAndUserId($threadId, $visitor['user_id']);
		
		//You aready rated this thread
		if (!empty($existing)) 
		{
			return $this->responseError(new XenForo_Phrase('you_already_rated_this_thread'));
		}
		
        if ($this->isConfirmedPost())//Rating submitted
		{
		    //Require rating comments. Staff is excluded
		    if (XenForo_Application::getOptions()->ratingcommentrequired && strlen($input['message']) == 0 && !$visitor['is_admin'] && !$visitor['is_moderator'] && !$visitor['is_staff'])
			{
				return $this->responseError(new XenForo_Phrase('must_give_rating_comment'));
			}
			
		   $ratingDw = XenForo_DataWriter::create('Borbole_StarRating_DataWriter_Rating', XenForo_DataWriter::ERROR_EXCEPTION);
		   
		   $ratingDw->set('thread_id', $threadId);
		   $ratingDw->set('user_id', $visitor['user_id']);
		   $ratingDw->set('rating', $input['rating']);
		   $ratingDw->set('message', $input['message']);
		   $ratingDw->set('is_anonymous' , $input['is_anonymous']);
		   
		   $ratingDw->save();
		   
		   //Sticky thread if received x amount of positive ratings
			$sticky = (int)$options->max_positive_sticky;
			
			if ($sticky != 0 AND $thread['rating_sum'] >= $sticky)
			{
				$threadDw = XenForo_DataWriter::create('XenForo_DataWriter_Discussion_Thread');
				$threadDw->setExistingData($thread['thread_id']);
				$threadDw->set('sticky', 1);
				$threadDw->save();
				  
				//Redirect
			    return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildPublicLink('threads', $thread));
			}
		   
		    //Get thread starters to send alert	when thir threads have been rated	
		    if ($input['is_anonymous'] AND $thread['user_id'] != $visitor['user_id'])
            {	
			    //Anonymous rated your thread alert
			    $threadstarters = array($thread['username']);
				$this->_getThreadRatingsAlerts()->sendAlert('thread_starters_anonymous', $thread['last_post_id'], $threadstarters, $visitor);
			}else{
			       //User x y rated your thread
				   $threadstarters = array($thread['username']);
			       $this->_getThreadRatingsAlerts()->sendAlert('thread_starters', $thread['last_post_id'], $threadstarters, $visitor);
				 }

		   $threadDw = XenForo_DataWriter::create('XenForo_DataWriter_Discussion_Thread');
		   
		   $newRating = $threadModel->getRatingAverage($threadDw->get('rating_sum'), $threadDw->get('rating_count'), true);
		   $hintText = new XenForo_Phrase('x_votes', array('count' => $threadDw->get('rating_count')));

		    //Redirect
		    return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildPublicLink('threads', $thread),
			new XenForo_Phrase('your_rating_has_been_recorded'),
				array(
						'newRating' => $newRating['avg'],
						'hintText' => $hintText
				     )
		    );
		}
		else
		{  
		    //Register variables for use in our template
			$viewParams = array(
				'rating' => $input['rating'],
				'existing' => ($existing ? $existing : false),
				'thread' => $thread,
			    'forum' => $forum,
			    'nodeBreadCrumbs' => $ftpHelper->getNodeBreadCrumbs($forum),
			    'rateAnonymously' => $this->_getRatingModel()->canRateThreadsAnonymously()

			);

			return $this->responseView('Borbole_StarRating_ViewPublic_Thread_Rate', 'borbole_thread_rate', $viewParams);
		}
	}

	//Display all users that rated this thread
	public function actionRatingsView()
	{
		//Define some variables
		$ftpHelper = $this->getHelper('ForumThreadPost');
		$threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);
		list($thread, $forum) = $ftpHelper->assertThreadValidAndViewable($threadId);
		
		//Can view ratings for own threads and/or all threads
		if (!$this->_getRatingModel()->canViewThreadRatings($thread))
		{
			return $this->responseNoPermission();
		}
		
		//Pagination
		$page = max(1, $this->_input->filterSingle('page', XenForo_Input::UINT));
        $perPage = 25;
		
		//Conditions
		$conditions = array(
			'thread_id' => $threadId
		);
        
		//fetchOptions
        $fetchOptions = array(
		    'join' => Borbole_StarRating_Model_Rating::FETCH_USER,
            'page' => $page,
            'perPage' => $perPage
        );
		
		//Get all ratings for this thread
		$entries = $this->_getRatingModel()->getRatings($conditions, $fetchOptions);
		
		//Count all ratings for this thread
		$count = $this->_getRatingModel()->countRatings($conditions);
		
		//Get the proper delete ratings permissions to be displayed
		foreach ($entries AS &$rating)
		{
			$rating = $this->_getRatingModel()->prepareRating($rating);
		}

		//Register variables for use in our template
		$viewParams = array(
		    'entries' => $entries,
			'thread' => $thread,
			'viewAnonymous' => $this->_getRatingModel()->canViewAnonymousRatings($thread),
			'forum' => $forum,
			'nodeBreadCrumbs' => $ftpHelper->getNodeBreadCrumbs($forum),
			'count' => $count,
			'page' => $page,
			'perPage' => $perPage
		);

		return $this->responseView('Borbole_StarRating_ViewPublic_RatingsView', 'borbole_thread_ratings_view', $viewParams);
	}

	//Delete ratings
	public function actionRatingDelete()
	{
		// Define some variables
		$ftpHelper = $this->getHelper('ForumThreadPost');
		$threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);
		list($thread, $forum) = $ftpHelper->assertThreadValidAndViewable($threadId);
		
		$visitor = XenForo_Visitor::getInstance();
		
		$rating = $this->_getRatingModel()->getRatingByThreadAndUserId($threadId, $visitor['user_id']);
		
		//Can delete own ratings
		if(!$this->_getRatingModel()->canDeleteRating($rating))
		{
			throw $this->getErrorOrNoPermissionResponseException();
		}

		//Delete limit time
        $deleteLimit = $visitor->hasPermission('rating', 'deleteOwnRatingLimit');

        if ($deleteLimit != -1 && (!$deleteLimit || $rating['rating_date'] < XenForo_Application::$time - 60 * $deleteLimit))
        {
	        return $this->responseError(new XenForo_Phrase('delete_limit_error', array('minutes' => $deleteLimit)));
        }

		if ($this->isConfirmedPost()) //Rating is deleted
		{
			$dw = XenForo_DataWriter::create('Borbole_StarRating_DataWriter_Rating');
			$dw->setExistingData($rating);
			$dw->delete();
			
			//Get thread starters to send alert when their ratings were deleted
		    if ($thread['user_id'] != $visitor['user_id'])
            {	
			    $threadstarters = array($thread['username']);
				$this->_getThreadRatingsAlerts()->sendDeleteAlert('delete_ratings', $thread['last_post_id'], $threadstarters, $visitor);
			}
			
			//Return
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildPublicLink('threads', $thread)
			);
		}
		else
		{		
            //Register variables for use in our template		
			$viewParams = array(
				'rating' => $rating,
				'thread' => $thread,
				'forum' => $forum,
				'nodeBreadCrumbs' => $ftpHelper->getNodeBreadCrumbs($forum),
			);

			return $this->responseView('Borbole_StarRating_ViewPublic_Post_RatingDelete', 'borbole_rating_delete', $viewParams);
		}
	}
	
	/**
	* @return Borbole_StarRating_Model_Rating
	*/
	protected function _getRatingModel()
	{
		return $this->getModelFromCache('Borbole_StarRating_Model_Rating');
	}
	
	/**
	 * @return XenForo_Model_Thread
	 */
	protected function _getThreadModel()
	{
		return $this->getModelFromCache('XenForo_Model_Thread');
	}
	
	/**
	 * @return Borbole_ThreadRating_Model_Alert
	 */
	protected function _getThreadRatingsAlerts()
	{
		return $this->getModelFromCache('Borbole_StarRating_Model_Thread');
	}
}