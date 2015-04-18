<?php
/**
 * @package     Nobita Social Groups Nulled by HQCoder
 * @author      Nobita
 * @nuller		Congngheaz
 * @link        http://www.congngheaz.com/forums/Xenforo-addon-nulled-free/
 * @copyright   (c) 2015 AZ Technologies, Inc. All rights reserved!
 */

/*====================================================================*\
 || ################################################################## ||
|| #               Copyright 2015 AZ Technologies, Inc.              # ||
|| #                      All Rights Reserved.                       # ||
||  ################################################################## ||
\*====================================================================*/
class Nobita_Teams_ControllerPublic_Event extends Nobita_Teams_ControllerPublic_Abstract
{

	public function actionIndex()
	{
		if ($eventId = $this->_input->filterSingle('event_id', XenForo_Input::UINT))
		{
			return $this->responseReroute(__CLASS__, 'view');
		}

		$teamId = $this->_input->filterSingle('team_id', XenForo_Input::UINT);
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable($teamId);

		$this->_request->setParam('team_id', $team['team_id']);

		$this->_assertViewEventTab($team, $category);

		$type = $this->_input->filterSingle('type', XenForo_Input::STRING);
		if (empty($type))
		{
			$type = 'upcoming';
		}

		$eventModel = $this->_getEventModel();
		$filterTab = $this->_input->filterSingle('filter_tab', XenForo_Input::STRING);
		if  (empty($filterTab))
		{
			$filterTab = Nobita_Teams_Setup::getInstance()->getOption('eventLayout');
		}

		list($events, $totalEvents, $page, $perPage) = $this->_getEventsBaseType($type, $team, $filterTab);

		foreach ($events as $eventId => &$event)
		{
			if (!$eventModel->canViewEvent($event, $team, $category, $null))
			{
				unset($events[$eventId]); // remove all events which invalid to visitor!
				continue;
			}

			$event = $eventModel->prepareEvent($event, $team, $category);
		}

		if ($filterTab == 'calendar')
		{
			$time = XenForo_Application::$time;

			$dt = new DateTime('@' . $time);
			$dt->setTimeZone(XenForo_Locale::getDefaultTimeZone());
			$dt->setTime(0, 0, 0);

			$beginDay = $dt->format('U');
			$endDay = $dt->setTime(23, 59, 59)->format('U');

			$eventsToday = $eventModel->getEventsTeam($team['team_id'], 
				array(
					'event_today' => array($beginDay, $time, $endDay)
				), array(
				'limit' => 5*3,
				'join' => Nobita_Teams_Model_Event::FETCH_USER
			));

			foreach ($eventsToday as $eTodayId => $eToday)
			{
				if (!$eventModel->canViewEvent($eToday, $team, $category, $null))
				{
					unset($eventsToday[$eTodayId]);
				}
			}

			$eventsToday = array_slice($eventsToday, 0, 5, true);
		}
		else
		{
			$eventsToday = array();
		}

		$viewParams = array(
			'team' => $team,
			'category' => $category,
			'events' => $events,
			'type' => $type,
			'filterTab' => $filterTab,

			'page' => $page,
			'perPage' => $perPage,
			'totalEvents' => $totalEvents,

			'pageRoute' => TEAM_ROUTE_PREFIX . '/events',
			'pageParams' => array('team_id' => $team['team_id'], 'type' => $type, 'filter_tab' => 'list'),

			'switchLinkList' => $this->_buildLink(TEAM_ROUTE_PREFIX . '/events', '', array('type' => 'upcoming', 'filter_tab' => 'list', 'team_id' => $team['team_id'])),
			'switchLinkCalendar' => $this->_buildLink(TEAM_ROUTE_PREFIX . '/events', '', array('filter_tab' => 'calendar', 'team_id' => $team['team_id'])),

			'eventsToday' => $eventsToday
		);

		return $this->_getTeamHelper()->getTeamViewWrapper('events', $team, $category,
			$this->responseView('Nobita_Teams_ViewPublic_Event_List', 'Team_event_list', $viewParams)
		);
	}

	public function actionCalendar()
	{
		$this->_assertPostOnly();
		$teamId = $this->_input->filterSingle('team_id', XenForo_Input::UINT);
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable($teamId);

		$this->_assertViewEventTab($team, $category);

		$filter = $this->_input->filter(array(
			'start' => XenForo_Input::STRING,
			'end' => XenForo_Input::STRING
		));

		$start = new DateTime($filter['start']);
		$start->setTimeZone(XenForo_Locale::getDefaultTimeZone());
		$start->setTime(0, 0, 0);

		$startstamp = $start->format('U');

		$end = new DateTime($filter['end']);
		$end->setTimeZone(XenForo_Locale::getDefaultTimeZone());
		$end->setTime(23, 59, 59);

		$endstamp = $end->format('U');

		$eventModel = $this->_getEventModel();

		$fetchOptions = array(
			'join' => Nobita_Teams_Model_Event::FETCH_TEAM 
					| Nobita_Teams_Model_Event::FETCH_USER
		);

		$conditions = array(
			'begin_date' => array('>', $startstamp),
			'end_date_lt_or_equal' => array($endstamp, 0)
		);

		$events = $eventModel->getAllEvents($team['team_id'], $conditions, $fetchOptions);
		$events = $eventModel->getEventCalendarEntries($events);

		$this->_routeMatch->setResponseType('json');
		return $this->responseView('Nobita_Teams_ViewPublic_Event_Calendar', '', array('events' => $events));
	}

	protected function _getEventsBaseType($type, array $team, $filterTab)
	{
		$eventModel = $this->_getEventModel();

		$page = max(1, $this->_input->filterSingle('page', XenForo_Input::UINT));
		$perPage = 20;

		$conditions = array();
		$fetchOptions = array(
			'join' => Nobita_Teams_Model_Event::FETCH_TEAM | Nobita_Teams_Model_Event::FETCH_USER,
			'page' => $page,
			'perPage' => $perPage
		);

		$conditions += $eventModel->getPermissionBasedFetchConditions($team);
		
		if ($filterTab == 'calendar')
		{
			// saving query
			return array(array(), 0, 1, 1);
		}

		$time = XenForo_Application::$time;

		$dt = new DateTime('@' . $time);
		$dt->setTimeZone(XenForo_Locale::getDefaultTimeZone());
		$dt->setTime(0, 0, 0);

		$beginDay = $dt->format('U');
		$endDay = $dt->setTime(23, 59, 59)->format('U');

		switch ($type)
		{
			case 'today':
				$conditions = array_merge($conditions, array(
					'event_today' => array($beginDay, $time, $endDay)
				));
				break;
			case 'past':
				$conditions = array_merge($conditions, array(
					'begin_date' => array("<", $time),
					'end_date_lt_or_equal' => array($time, 0)
				));
				break;
			case 'upcoming':
			default:
				$conditions = array_merge($conditions, array(
					'event_upcoming' => array($time, $time, $time)
				));
				break;
		}

		$events = $eventModel->getEventsTeam($team['team_id'], $conditions, $fetchOptions);
		$totalEvents = $eventModel->countEvents($team['team_id'], $conditions);

		return array($events, $totalEvents, $page, $perPage);
	}

	public function actionView()
	{
		$eventFetchOptions = array(
			'join' => Nobita_Teams_Model_Event::FETCH_BBCODE_CACHE
		);

		list($event, $team, $category) = $this->_getTeamHelper()->assertEventValidAndViewable(null, $eventFetchOptions);

		$this->_assertViewEventTab($team, $category);

		$commentModel = $this->getModelFromCache('Nobita_Teams_Model_Comment');
		
		$conditions = array(
			'comment_type' => Nobita_Teams_Model_Comment::COMMENT_TYPE_EVENT,
			'event_id' => $event['event_id']
		);

		$page = max(1, $this->_input->filterSingle('page', XenForo_Input::UINT));
		$perPage = 20;

		$fetchOptions = array(
			'join' => Nobita_Teams_Model_Comment::FETCH_COMMENTER
					  | Nobita_Teams_Model_Comment::FETCH_TEAM,
			'page' => $page,
			'perPage' => $perPage
		);

		$comments = $commentModel->getComments($conditions, $fetchOptions);
		$ignoredNames = $this->_getIgnoredContentUserNames($comments);

		foreach ($comments as &$comment)
		{
			$comment = $commentModel->prepareComment($comment, $event, $team, $category);
		}

		/** @var $formatter XenForo_BbCode_Formatter_BbCode_Filter */
		$formatter = XenForo_BbCode_Formatter_Base::create('XenForo_BbCode_Formatter_BbCode_Filter');
		$formatter->configureSimpleComment();

		$configButtons = $formatter->Teams_getButtons();

		$viewParams = array(
			'event' => $this->_getEventModel()->getAndMergeAttachmentsIntoEvent($event),
			'team' => $team,
			'category' => $category,
			
			'comments' => $comments,
			'ignoredNames' => $ignoredNames,
			
			'page' => $page,
			'perPage' => $perPage,
			'total' => $commentModel->countCommentsOnEvent($event['event_id']),
			'canViewAttachments' => $this->_getEventModel()->canViewAttachmentOnEvent($event, $team, $category),
			'configButtons' => $configButtons
		);

		return $this->_getTeamHelper()->getTeamViewWrapper('events', $team, $category,
			$this->responseView('Nobita_Teams_ViewPublic_Event_View', 'Team_event_view', $viewParams)
		);
	}

	public function actionAdd()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();
		
		$this->_assertViewEventTab($team, $category);

		if (!$this->_getEventModel()->canAddEvent($team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$this->_request->setParam('team_id', $team['team_id']);
		$event = array(
			'event_id' => 0,
			'event_type' => 'public',
			'allow_member_comment' => 1
		);
		return $this->_getEventEditOrResponse($event, $team, $category);
	}

	protected function _getEventEditOrResponse(array $event, array $team, array $category)
	{
		$visitor = XenForo_Visitor::getInstance();
		$attachmentModel = $this->getModelFromCache('XenForo_Model_Attachment');

		$contentData = array(
			'event_id' => $event['event_id'],
			'team_id' => $team['team_id'],
			'content_type' => 'team_event'
		);

		$attachments = array();
		if (!empty($event['event_id']))
		{
			$attachments = $attachmentModel->getAttachmentsByContentId('team_event', $event['event_id']);
			$attachments = $attachmentModel->prepareAttachments($attachments);
		}

		$attachmentHash = null;
		$attachmentParams = $this->_getTeamModel()->getAttachmentParams(
			$team, $category, $contentData, null, null, $attachmentHash
		);

		$viewParams = array(
			'event' => $event,
			'team' => $team,
			'category' => $category,
			'eventTypes' => $this->_getEventModel()->prepareEventTypesOnCreateOrEdit($team, $category),
			'timesMap' => Nobita_Teams_Setup::getTimeSelectableMap(),
			
			'attachments' => $attachments,
			'attachmentParams' => $attachmentParams,
			'attachmentConstraints' => $this->getModelFromCache('XenForo_Model_Attachment')->getAttachmentConstraints(),
			'canViewAttachments' => $visitor->hasPermission('Teams', 'viewAttachment'),
			'canUploadAttachments' => $this->getModelFromCache('Nobita_Teams_Model_Category')->canUploadAttachments($category),
		);

		return $this->_getTeamHelper()->getTeamViewWrapper('events', $team, $category,
			$this->responseView('Nobita_Teams_ViewPublic_Event_Add', 'Team_event_edit', $viewParams)
		);
	}

	public function actionEdit()
	{
		list($event, $team, $category) = $this->_getTeamHelper()->assertEventValidAndViewable();
		
		$this->_assertViewEventTab($team, $category);

		$eventModel = $this->_getEventModel();
		if (!$eventModel->canEditEvent($event, $team, $category, $key))
		{
			throw $this->getErrorOrNoPermissionResponseException($key);
		}

		return $this->_getEventEditOrResponse($event, $team, $category);
	}

	public function actionSave()
	{
		$this->_assertPostOnly();
		
		$eventId = $this->_input->filterSingle('event_id', XenForo_Input::UINT);
		$teamId = $this->_input->filterSingle('team_id', XenForo_Input::UINT);

		$visitor = XenForo_Visitor::getInstance();
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable($teamId);

		$this->_assertViewEventTab($team, $category);

		$data = $this->_input->filter(array(
			'event_title' => XenForo_Input::STRING,
			'event_type' => XenForo_Input::STRING,
			'allow_member_comment' => XenForo_Input::UINT
		));

		$begin20 = $this->_input->filterSingle('begin_date', XenForo_Input::STRING);
		$begin21 = $this->_input->filterSingle('_begin_date', XenForo_Input::DATE_TIME);

		$setup = Nobita_Teams_Setup::getInstance();
		
		if ($begin21)
		{
			$begin = $setup->verifyAndProcessingTimeinput($this, $begin20, $begin21);
		}
		else
		{
			$begin = XenForo_Application::$time;
		}

		if ($this->_input->filterSingle('end_time_enable', XenForo_Input::UINT))
		{
			$end20 = $this->_input->filterSingle('end_date', XenForo_Input::STRING);
			$end21 = $this->_input->filterSingle('_end_date', XenForo_Input::DATE_TIME);
		
			$end = $setup->verifyAndProcessingTimeinput($this, $end20, $end21);
		}
		else
		{
			$end = 0; // forever!
		}

		/* upload attachment to event. */
		$attachmentHash = $this->_input->filterSingle('attachment_hash', XenForo_Input::STRING);
		
		$description = $this->getHelper('Editor')->getMessageText('description', $this->_input);
		$description = XenForo_Helper_String::autoLinkBbCode($description);

		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Event');
		if ($eventId)
		{
			$dw->setExistingData($eventId);
		}
		else
		{
			$dw->set('user_id', $visitor['user_id']);
			$dw->set('username', $visitor['username']);
		}

		$dw->bulkSet($data);

		$dw->set('team_id', $team['team_id']);
		$dw->set('event_description', $description);

		$dw->set('begin_date', $begin);
		$dw->set('end_date', $end);

		$dw->setExtraData(Nobita_Teams_DataWriter_Event::TEAM_DATA, $team);
		$dw->setExtraData(Nobita_Teams_DataWriter_Event::TEAM_CATEGORY_DATA, $category);
		$dw->setExtraData(Nobita_Teams_DataWriter_Event::DATA_ATTACHMENT_HASH, $attachmentHash);

		$dw->preSave();
		if (!$dw->hasErrors())
		{
			$this->assertNotFlooding('post'); // use post instead.
		}

		$dw->save();
		$event = $dw->getMergedData(); // get event data

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			$this->_buildLink(TEAM_ROUTE_PREFIX . '/events', $event)
		);
	}

	public function actionComment()
	{
		$this->_assertPostOnly();

		list($event, $team, $category) = $this->_getTeamHelper()->assertEventValidAndViewable();
		
		$this->_assertViewEventTab($team, $category);

		if (!$this->_getEventModel()->canCommentOnEvent($event, $team, $category, $key))
		{
			throw $this->getErrorOrNoPermissionResponseException($key);
		}

		$message = $this->getHelper('Editor')->getMessageText('message', $this->_input);
		$message = XenForo_Helper_String::autoLinkBbCode($message, false);

		/** @var $formatter XenForo_BbCode_Formatter_BbCode_Filter */
		$formatter = XenForo_BbCode_Formatter_Base::create('XenForo_BbCode_Formatter_BbCode_Filter');
		$parser = XenForo_BbCode_Parser::create($formatter);
		$message = $parser->render($message);
		if ($formatter->getDisabledTally())
		{
			$formatter->setStripDisabled(false);
			$message = $parser->render($message);
		}

		if (!$formatter->Teams_validateComment($message, $errors))
		{
			return $this->responseError($errors);
		}

		$visitor = XenForo_Visitor::getInstance();

		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Comment');
		$dw->bulkSet(array(
			'team_id' => $team['team_id'],
			'post_id'=> $event['event_id'],
			'user_id' => $visitor['user_id'],
			'username' => $visitor['username'],
			'message' => $message,
			'comment_type' => 'event'
		));

		$dw->setOption(
			Nobita_Teams_DataWriter_Comment::OPTION_MAX_TAGGED_USERS, $visitor->hasPermission('general', 'maxTaggedUsers')
		);

		$dw->preSave();

		if (!$dw->hasErrors())
		{
			$this->assertNotFlooding('post');
		}

		$dw->save();

		$commentModel = $this->getModelFromCache('Nobita_Teams_Model_Comment');
		/*if ($this->_noRedirect())
		{
			$comment = $commentModel->getCommentById($dw->get('comment_id'), array(
				'join' => Nobita_Teams_Model_Comment::FETCH_COMMENTER
			));

			$viewParams = array(
				'comment' => $commentModel->prepareComment($comment, $event, $team),
				'event' => $event,
				'team' => $team,
				'category' => $category,
				'categoryBreadcrumbs' => $this->getModelFromCache('Nobita_Teams_Model_Category')->getCategoryBreadcrumb($category)
			);

			return $this->responseView('Nobita_Teams_ViewPublic_Event_Comment', 'Team_event_comment', $viewParams);
		}
		else
		{
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				$this->_buildLink(TEAM_ROUTE_PREFIX . '/events', $event)
			);
		}*/
		$comment = $commentModel->getCommentById($dw->get('comment_id'), array(
			'join' => Nobita_Teams_Model_Comment::FETCH_COMMENTER
		));

		$viewParams = array(
			'comment' => $commentModel->prepareComment($comment, $event, $team),
			'event' => $event,
			'team' => $team,
			'category' => $category,
			'categoryBreadcrumbs' => $this->getModelFromCache('Nobita_Teams_Model_Category')->getCategoryBreadcrumb($category)
		);

		return $this->responseView('Nobita_Teams_ViewPublic_Event_Comment', 'Team_event_comment', $viewParams);
	}

	public function actionDelete()
	{
		list($event, $team, $category) = $this->_getTeamHelper()->assertEventValidAndViewable();
		
		$this->_assertViewEventTab($team, $category);

		if (!$this->_getEventModel()->canDeleteEvent($event, $team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$this->_checkCsrfFromToken($this->_input->filterSingle('t', XenForo_Input::STRING));
		$this->_getEventModel()->deleteEvent($event['event_id']);

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX . '/events', $team)
		);
	}

	public function actionLike()
	{
		$this->_assertPostOnly();
		list($event, $team, $category) = $this->_getTeamHelper()->assertEventValidAndViewable();

		$this->_assertViewEventTab($team, $category);

		if (!$this->_getEventModel()->canLikeEvent($event, $team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$likeModel = $this->getModelFromCache('XenForo_Model_Like');
		$existingLike = $likeModel->getContentLikeByLikeUser(
			'team_event', $event['event_id'], XenForo_Visitor::getUserId()
		);

		if ($existingLike)
		{
			$latestUsers = $likeModel->unlikeContent($existingLike);
		}
		else
		{
			$latestUsers = $likeModel->likeContent('team_event', $event['event_id'], $event['user_id']);
		}

		$liked = ($existingLike ? false : true);

		$event['likeUsers'] = $latestUsers;
		$event['likes'] += ($liked ? 1 : -1);
		$event['like_date'] = ($liked ? XenForo_Application::$time : 0);

		$viewParams = array(
			'event' => $event,
			'team' => $team,
			'category' => $category,
			'liked' => $liked,
		);

		return $this->responseView('Nobita_Teams_ViewPublic_Event_LikeConfirmed', '', $viewParams);
	}

	public function actionLikes()
	{
		list($event, $team, $category) = $this->_getTeamHelper()->assertEventValidAndViewable();
		
		$this->_assertViewEventTab($team, $category);
	}


	protected function _assertViewEventTab(array $team, array $category)
	{
		if (!$this->_getTeamModel()->canViewTabAndContainer('events', $team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}
	}
}