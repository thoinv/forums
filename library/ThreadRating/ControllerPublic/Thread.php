<?php

class ThreadRating_ControllerPublic_Thread extends XFCP_ThreadRating_ControllerPublic_Thread
{
	public function actionIndex()
	{
		return $this->_getThreadRatingPermission(parent::actionIndex());
	}

	public function actionRate()
	{
		$this->_assertPostOnly();
		$this->_assertRegistrationRequired();
		
		$threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);
		
		$ftpHelper = $this->getHelper('ForumThreadPost');
		list($thread, $forum) = $ftpHelper->assertThreadValidAndViewable($threadId);

		//$this->_assertCanReplyToThread($thread, $forum);

		$visitor = XenForo_Visitor::getInstance();

		if ($visitor->hasPermission('general', 'tr_rateAny') == false)
		{
			return $this->responseNoPermission();
		}

		if (XenForo_Visitor::getUserId() == $thread['user_id'] AND $visitor->hasPermission('general', 'tr_rateOwn') == false)
		{
			return $this->responseNoPermission();
		}

		$input = $this->_input->filter(array(
				'rating' => XenForo_Input::UINT,
		));

		$existing = $this->_getRatingModel()->getRatingByThreadAndUserId($threadId, $visitor['user_id']);

		//@TODO
		/*
		if ($existing && !$this->_getRatingModel()->canUpdateRating(...))
		{
			throw $this->getErrorOrNoPermissionResponseException($errorPhraseKey);
		}
		*/

		$ratingDw = XenForo_DataWriter::create('ThreadRating_DataWriter_Rating', XenForo_DataWriter::ERROR_EXCEPTION);
		$ratingDw->set('thread_id', $threadId);
		$ratingDw->set('user_id', $visitor['user_id']);
		$ratingDw->set('rating', $input['rating']);

		if ($existing)
		{
			$deleteDw = XenForo_DataWriter::create('ThreadRating_DataWriter_Rating');
			$deleteDw->setExistingData($existing, true);
			$deleteDw->delete();
		}

		$ratingDw->save();

		//@TODO: create a datawriter for tr_thread_rate
		$newRating = $this->_getRatingModel()->getRatingAverage($threadId);
		$count = $this->_getRatingModel()->countRatings($threadId);
		$hintText = new XenForo_Phrase('x_votes', array('count' => $count['count']));

		$link = XenForo_Link::buildPublicLink('threads', $thread);

		return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				$link,
				new XenForo_Phrase('your_rating_has_been_recorded'),
				array(
						'newRating' => $newRating['avg'],
						'hintText' => $hintText
				)
		);
	}

	public function actionWhoRated()
	{
		$visitor = XenForo_Visitor::getInstance();

		if (!$visitor->hasPermission('general', 'tr_viewRatings') OR !$visitor->hasPermission('general', 'tr_whoRated'))
		{
			return $this->responseNoPermission();
		}

		$threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);

		$ftpHelper = $this->getHelper('ForumThreadPost');

		$threadFetchOptions = array();

		list($thread, $forum) = $ftpHelper->assertThreadValidAndViewable($threadId);

		$whoRated = $this->_getRatingModel()->getWhoRated($threadId);
		if (!$whoRated)
		{
			return $this->responseError(new XenForo_Phrase('threadrating_no_one_has_rated_this_thread_yet'));
		}

		$viewParams = array(
			'thread' => $thread,
			'forum' => $forum,
			'nodeBreadCrumbs' => $ftpHelper->getNodeBreadCrumbs($forum),
			'whoRated' => $whoRated,
			'canViewStars' => $visitor->hasPermission('general', 'tr_whoRatedStars')
		);

		return $this->responseView('ThreadRating_ViewPublic_WhoRated', 'threadrating_whorated', $viewParams);
	}

	/**
	 * Workaround to enable this addon to work when using sonnb - Live Thread addon
	 */
	public function actionLive()
	{
		if (is_callable('Parent::actionLive'))
		{
			$response = $this->_getThreadRatingPermission(parent::actionLive());
		} else {
			$response = $this->responseNoPermission();
		}

		return $response;
	}

	protected function _getThreadForumFetchOptions()
	{
		$options = parent::_getThreadForumFetchOptions();

		$this->_getThreadModel();

		list($threadFetchOptions, $forumFetchOptions) = $options;
		
		$threadFetchOptions['join'] += ThreadRating_Model_Thread::FETCH_THREADRATE;
		
		$options = array($threadFetchOptions, $forumFetchOptions);
		
		return $options;
	}

	protected function _getRatingModel()
	{
		return $this->getModelFromCache('ThreadRating_Model_Rating');
	}

	private function _getThreadRatingPermission($response)
	{
		if ($response instanceof XenForo_ControllerResponse_View AND is_array($response->params))
		{
			$visitor = XenForo_Visitor::getInstance();

			$response->params['threadrating']['canRate'] = (
				$visitor->hasPermission('general', 'tr_rateAny') AND //rate threads permission
				(XenForo_Visitor::getUserId() != $response->params['firstPost']['user_id'] OR $visitor->hasPermission('general', 'tr_rateOwn')) //rate own threads permission
			);

			$response->params['threadrating']['canView'] = $visitor->hasPermission('general', 'tr_viewRatings');
			$response->params['threadrating']['whoRated'] = $visitor->hasPermission('general', 'tr_whoRated');
		}

		return $response;
	}
}