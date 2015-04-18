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
class Nobita_Teams_ControllerPublic_Team extends Nobita_Teams_ControllerPublic_Abstract
{

	public function actionIndex()
	{
		$teamId = $this->_input->filterSingle('team_id', XenForo_Input::UINT);
		$teamUrl = $this->_input->filterSingle('custom_url', XenForo_Input::STRING);

		if ($teamId || $teamUrl)
		{
			return $this->responseReroute(__CLASS__, 'view'); // random
		}

		$teamModel = $this->_getTeamModel();
		$categoryModel = $this->_getCategoryModel();
		
		$defaultOrder = 'last_activity';
		$defaultOrderDirection = 'desc';

		$order = $this->_input->filterSingle('order', XenForo_Input::STRING, array('default' => $defaultOrder));
		$orderDirection = $this->_input->filterSingle('direction', XenForo_Input::STRING, array('default' => $defaultOrderDirection));

		$criteria = array();
		
		$criteria += $categoryModel->getPermissionBasedFetchConditions();
		$viewableCategories = $this->_getCategoryModel()->getViewableCategories();
		$criteria['team_category_id'] = array_keys($viewableCategories);
		
		$categoryList = $categoryModel->groupCategoriesByParent($viewableCategories);
		$categoryList = $categoryModel->applyRecursiveCountsToGrouped($categoryList);
		$categories = isset($categoryList[0]) ? $categoryList[0] : array();
		
		$page = max(1, $this->_input->filterSingle('page', XenForo_Input::UINT));

		$setup = Nobita_Teams_Setup::getInstance();
		$perPage = $setup->getOption("teamsPerPage");

		if ($criteria['deleted'] === true || $criteria['moderated'] === true)
		{
			$totalTeams = $teamModel->countTeams($criteria);
		}
		else
		{
			$totalTeams = 0;
			foreach ($categories AS $category)
			{
				$totalTeams += $category['team_count'];
			}
		}

		$totalFeatured = 0;

		foreach ($categories AS $category)
		{
			$totalFeatured += $category['featured_count'];
		}

		$teamFetchOptions = $this->_getTeamListFetchOptions();
		if ($totalFeatured)
		{
			$featuredTeams = $teamModel->getFeaturedTeamsInCategories($criteria['team_category_id'], array_merge(
				$teamFetchOptions,
				array(
					'limit' => 6,
					'order' => 'random'
				)
			));
			$featuredTeams = $teamModel->filterUnviewableTeams($featuredTeams);
			$featuredTeams = $teamModel->prepareTeams($featuredTeams);
		}
		else
		{
			$featuredTeams = array();
		}

		$this->canonicalizeRequestUrl($this->_buildLink(TEAM_ROUTE_PREFIX));
		$this->canonicalizePageNumber($page, $perPage, $totalTeams, TEAM_ROUTE_PREFIX);

		$teams = $teamModel->getTeams($criteria, array_merge(
			$teamFetchOptions,
			array(
				'page' => $page,
				'perPage' => $perPage,
				'order' => $order,
				'direction' => $orderDirection,
			)
		));
		$teams = $teamModel->filterUnviewableTeams($teams);
		$teams = $teamModel->prepareTeams($teams);
		$inlineModOptions = $teamModel->getInlineModOptionsForTeams($teams);

		$pageNavParams = array(
			'order' => ($order != $defaultOrder ? $order : false),
			'direction' => ($orderDirection != $defaultOrderDirection ? $orderDirection : false)
		);

		$topTeamsCount = $setup->getOption('topTeamsCount');
		if ($topTeamsCount)
		{
			$topTeams = $teamModel->getTeams($criteria, array_merge(
				$teamFetchOptions,
				array(
					'limit' => $topTeamsCount,
					'order' => 'message_count',
					'direction' => 'desc'
				)
			));

			$topTeams = $teamModel->filterUnviewableTeams($topTeams);
			$topTeams = $teamModel->prepareTeams($topTeams);

			$topMembers = $teamModel->getTeams($criteria, array_merge($teamFetchOptions, array(
				'limit' => $topTeamsCount,
				'order' => 'member_count',
				'direction' => 'desc'
			)));
		}
		else
		{
			$topTeams = array();
			$topMembers = array();
		}

		$viewParams = array(
			'categories' => $categoryModel->prepareCategories($categories),
			
			'teams' => $teams,
			'topTeams' => $topTeams,
			'topMembers' => $topMembers,

			'featuredTeams' => $featuredTeams,
			'ignoredNames' => $this->_getIgnoredContentUserNames($teams),
			'inlineModOptions' => $inlineModOptions,
			'canAddTeam' => $categoryModel->canAddTeam(),
			
			'page' => $page,
			'perPage' => $perPage,
			'pageNavParams' => $pageNavParams,
			'totalTeams' => $totalTeams,
			'order' => $order,
			'direction' => $orderDirection
		);
		return $this->responseView('Nobita_Teams_ViewPublic_Team_List', 'Team_index', $viewParams);
	}

	/* BUILDING EVENT SYSTEM! */
	public function actionEventAdd()
	{
		// display form allow add event
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();
		if (!$this->_getTeamModel()->canViewTabAndContainer('events', $team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$this->_request->setParam('team_id', $team['team_id']);
		return $this->responseReroute('Nobita_Teams_ControllerPublic_Event', 'add');
	}

	/* END EVENT SYSTEM! */
	
	/* THREADS */
	public function actionThreads()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();
		
		if (!$this->_getTeamModel()->canViewTabAndContainer('threads', $team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$visitor = XenForo_Visitor::getInstance();
		
		$threadModel = $this->getModelFromCache('XenForo_Model_Thread');
		$forumModel = $this->getModelFromCache('XenForo_Model_Forum');
		
		$forumFetchOptions = $this->_getForumFetchOptions();
		$forumFetchOptions += array('permissionCombinationId' => $visitor['permission_combination_id']);

		$forum = $forumModel->getForumById($category['discussion_node_id'], $forumFetchOptions);
		$forumId = $forum['node_id'];

		$page = max(1, $this->_input->filterSingle('page', XenForo_Input::UINT));
		$threadsPerPage = XenForo_Application::get('options')->discussionsPerPage;
		
		$this->canonicalizeRequestUrl(
			XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX . '/threads', $team, array('page' => $page))
		);

		list($defaultOrder, $defaultOrderDirection) = $this->_getDefaultThreadSort($forum);

		$order = $this->_input->filterSingle('order', XenForo_Input::STRING, array('default' => $defaultOrder));
		$orderDirection = $this->_input->filterSingle('direction', XenForo_Input::STRING, array('default' => $defaultOrderDirection));

		$displayConditions = $this->_getDisplayConditions($forum);

		$fetchElements = $this->_getThreadFetchElements($forum, $displayConditions);
		$threadFetchConditions = $fetchElements['conditions'];
		$threadFetchConditions['team_id'] = $team['team_id'];

		$threadFetchOptions = $fetchElements['options'] + array(
			'perPage' => $threadsPerPage,
			'page' => $page,
			'order' => $order,
			'orderDirection' => $orderDirection
		);
		unset($fetchElements);

		$totalThreads = $threadModel->countThreadsInForum($forumId, $threadFetchConditions);

		$this->canonicalizePageNumber($page, $threadsPerPage, $totalThreads, TEAM_ROUTE_PREFIX . '/threads', $team);

		if (isset($threadFetchConditions['user_id']))
		{
			unset($threadFetchConditions['user_id']);
		}

		if (is_int($threadFetchConditions['moderated']))
		{
			$threadFetchConditions['moderated'] = false;
		}

		$threads = $threadModel->getThreadsInForum($forumId, $threadFetchConditions, $threadFetchOptions);

		if ($page == 1)
		{
			$stickyThreadFetchOptions = $threadFetchOptions;
			unset($stickyThreadFetchOptions['perPage'], $stickyThreadFetchOptions['page']);

			$stickyThreads = $threadModel->getStickyThreadsInForum($forumId, $threadFetchConditions, $stickyThreadFetchOptions);
		}
		else
		{
			$stickyThreads = array();
		}

		// prepare all threads for the thread list
		$inlineModOptions = array();
		$permissions = $visitor->getNodePermissions($forumId);

		foreach ($threads AS &$thread)
		{
			$threadModOptions = $threadModel->addInlineModOptionToThread($thread, $forum, $permissions);
			$inlineModOptions += $threadModOptions;

			$thread = $threadModel->prepareThread($thread, $forum, $permissions);
		}
		foreach ($stickyThreads AS &$thread)
		{
			$threadModOptions = $threadModel->addInlineModOptionToThread($thread, $forum, $permissions);
			$inlineModOptions += $threadModOptions;

			$thread = $threadModel->prepareThread($thread, $forum, $permissions);
		}
		unset($thread);

		// if we've read everything on the first page of a normal sort order, probably need to mark as read
		if ($visitor['user_id'] && $page == 1 && !$displayConditions
			&& $order == 'last_post_date' && $orderDirection == 'desc'
			&& $forum['forum_read_date'] < $forum['last_post_date']
		)
		{
			$hasNew = false;
			foreach ($threads AS $thread)
			{
				if ($thread['isNew'] && !$thread['isIgnored'])
				{
					$hasNew = true;
					break;
				}
			}

			if (!$hasNew)
			{
				// everything read, but forum not marked as read. Let's check.
				$forumModel->markForumReadIfNeeded($forum);
			}
		}

		// get the ordering params set for the header links
		$orderParams = array();
		foreach ($this->_getThreadSortFields($forum) AS $field)
		{
			$orderParams[$field] = $displayConditions;
			$orderParams[$field]['order'] = ($field != $defaultOrder ? $field : false);
			if ($order == $field)
			{
				$orderParams[$field]['direction'] = ($orderDirection == 'desc' ? 'asc' : 'desc');
			}
		}

		$pageNavParams = $displayConditions;
		$pageNavParams['order'] = ($order != $defaultOrder ? $order : false);
		$pageNavParams['direction'] = ($orderDirection != $defaultOrderDirection ? $orderDirection : false);

		$viewParams = array(
			'team' => $team,
			'category' => $category,
			
			'inlineModOptions' => $inlineModOptions,
			'threads' => $threads,
			'stickyThreads' => $stickyThreads,

			'ignoredNames' => $this->_getIgnoredContentUserNames($threads) + $this->_getIgnoredContentUserNames($stickyThreads),

			'order' => $order,
			'orderDirection' => $orderDirection,
			'orderParams' => $orderParams,
			'displayConditions' => $displayConditions,

			'pageNavParams' => $pageNavParams,
			'page' => $page,
			'threadStartOffset' => ($page - 1) * $threadsPerPage + 1,
			'threadEndOffset' => ($page - 1) * $threadsPerPage + count($threads),
			'threadsPerPage' => $threadsPerPage,
			'totalThreads' => $totalThreads,

			'canPostThread' => $this->getModelFromCache('Nobita_Teams_Model_Thread')->canAddThread($team, $category),
			'forum' => $forum
		);

		return $this->_getTeamViewWrapper('threads', $team, $category,
			$this->responseView('Nobita_Teams_ViewPublic_Thread_List', 'Team_thread_list', $viewParams)
		);
	}

	protected function _getForumFetchOptions()
	{
		$userId = XenForo_Visitor::getUserId();

		return array(
			'readUserId' => $userId,
			'watchUserId' => $userId
		);
	}

	protected function _getDisplayConditions(array $forum)
	{
		$displayConditions = array();

		$prefixId = $this->_input->filterSingle('prefix_id', XenForo_Input::UINT);
		if ($prefixId)
		{
			$displayConditions['prefix_id'] = $prefixId;
		}

		return $displayConditions;
	}

	protected function _getThreadFetchElements(array $forum, array $displayConditions)
	{
		$threadModel = $this->getModelFromCache('XenForo_Model_Thread');
		$visitor = XenForo_Visitor::getInstance();

		$threadFetchConditions = $displayConditions + $threadModel->getPermissionBasedThreadFetchConditions($forum);

		if ($this->_routeMatch->getResponseType() != 'rss')
		{
			$threadFetchConditions += array('sticky' => 0);
		}

		$threadFetchOptions = array(
			'join' => XenForo_Model_Thread::FETCH_USER,
			'readUserId' => $visitor['user_id'],
			'watchUserId' => $visitor['user_id'],
			'postCountUserId' => $visitor['user_id'],
		);
		if (!empty($threadFetchConditions['deleted']))
		{
			$threadFetchOptions['join'] |= XenForo_Model_Thread::FETCH_DELETION_LOG;
		}

		if ($this->getResponseType() == 'rss')
		{
			$threadFetchOptions['join'] |= XenForo_Model_Thread::FETCH_FIRSTPOST;
		}

		return array(
			'conditions' => $threadFetchConditions,
			'options' => $threadFetchOptions
		);
	}

	protected function _getDefaultThreadSort(array $forum)
	{
		return array($forum['default_sort_order'], $forum['default_sort_direction']);
	}

	protected function _getThreadSortFields(array $forum)
	{
		return array('title', 'post_date', 'reply_count', 'view_count', 'last_post_date');
	}

	public function actionThreadsCreate()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();

		if (!$this->_getTeamModel()->canViewTabAndContainer('threads', $team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		if (!$this->getModelFromCache('Nobita_Teams_Model_Thread')->canAddThread($team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$controllerRequest = new Zend_Controller_Request_Http();
		$controllerRequest->setParam('node_id', $category['discussion_node_id']);

		$routeMatch = new XenForo_RouteMatch();
		$controllerResponse = new Zend_Controller_Response_Http();

		$forumController = new XenForo_ControllerPublic_Forum($controllerRequest, $controllerResponse, $routeMatch);
		$forumController->preDispatch('createThread', get_class($forumController));

		$controllerResponse = $forumController->{'actionCreateThread'}();

		$forumParams = $controllerResponse->params;

		$viewParams = array_merge($forumParams, array(
			'team' => $team,
			'category' => $category,
			'_teamThreadCreate' => true,
			'teamId' => $team['team_id']
		));

		return $this->_getTeamViewWrapper('threads', $team, $category,
			$this->responseView('XenForo_ViewPublic_Thread_Create', 'thread_create', $viewParams)
		);
	}

	/**
	 * Control the tabs will be display to user.
	 *
	 * @version 1.2.0 RC2
	 */
	public function actionTabs()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();

		if (!$this->_getTeamModel()->canManageTabs($team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$tabs = Nobita_Teams_Option::getTabsSupported();

		if ($this->_request->isPost())
		{
			$disableTabs = $this->_input->filterSingle('disable_tabs', XenForo_Input::ARRAY_SIMPLE);

			if (!empty($disableTabs))
			{
				foreach ($disableTabs as $tabId)
				{
					if (!in_array($tabId, array_keys($tabs)))
					{
						return $this->responseError(new XenForo_Phrase('please_enter_valid_value'));
					}
				}
			}
			$disabledTabs = implode(',', $disableTabs);

			$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Team');
			$dw->setExistingData($team['team_id']);
			$dw->set('disable_tabs', $disabledTabs);
			$dw->save();

			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team)
			);
		}
		else
		{
			return $this->_getTeamViewWrapper('wall', $team, $category,
				$this->responseView('Nobita_Teams_ViewPublic_Team_Tab', 'Team_disable_tabs', array(
					'team' => $team,
					'category' => $category,
					'tabs' => $tabs,
					'disabledTabs' => $team['disabledTabs']
				))
			);
		}
	}

	public function actionToggleFeatured()
	{
		$this->_checkCsrfFromToken($this->_input->filterSingle('t', XenForo_Input::STRING));
		
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();
		if (!$this->_getTeamModel()->canFeatureUnfeatureTeam($team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		if ($team['feature_date'])
		{
			$this->_getTeamModel()->unfeatureTeam($team);
			$redirectPhrase = 'Teams_team_unfeatured';
			$actionPhrase = 'Teams_feature_team';
		}
		else
		{
			$this->_getTeamModel()->featureTeam($team);
			$redirectPhrase = 'Teams_feature_team';
			$actionPhrase = 'Teams_team_unfeatured';
		}

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team),
			new XenForo_Phrase($redirectPhrase),
			array('actionPhrase' => new XenForo_Phrase($actionPhrase))
		);
	}

	public function actionFeatured()
	{
		$this->canonicalizeRequestUrl(XenForo_Link::buildPublicLink(TEAM_ROUTE_ACTION . '/featured'));
		
		$teamModel = $this->_getTeamModel();
		$categoryModel = $this->_getCategoryModel();
		
		$viewableCategories = $categoryModel->prepareCategories($categoryModel->getViewableCategories());

		$categoryList = $categoryModel->groupCategoriesByParent($viewableCategories);
		$categoryList = $categoryModel->applyRecursiveCountsToGrouped($categoryList);
		
		$searchCategoryIds = array_keys($viewableCategories);
		
		$teams = $teamModel->getFeaturedTeamsInCategories($searchCategoryIds, 
			$this->_getTeamListFetchOptions()
		);
		$teams = $teamModel->filterUnviewableTeams($teams);
		$teams = $teamModel->prepareTeams($teams);
		
		if (!$teams)
		{
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL,
				XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX)
			);
		}
		
		$viewParams = array(
			'categoriesGrouped' => $categoryList,
			
			'teams' => $teams,
			'ignoredNames' => $this->_getIgnoredContentUserNames($teams),
			
			'inlineModOptions' => $teamModel->getInlineModOptionsForTeams($teams)
		);
		return $this->responseView('Nobita_Teams_ViewPublic_Team_Featured', 'Team_featured', $viewParams);
	}

	public function actionReassign()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();
		
		if (!$this->_getTeamModel()->canReassignTeam($team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}
		
		if ($this->isConfirmedPost())
		{
			$user = $this->getModelFromCache('XenForo_Model_User')->getUserByName(
				$this->_input->filterSingle('username', XenForo_Input::STRING),
				array('join' => XenForo_Model_User::FETCH_USER_PERMISSIONS)
			);
			$user['permissions'] = XenForo_Permission::unserializePermissions($user['global_permission_cache']);
			if (!$user || !XenForo_Permission::hasPermission($user['permissions'], 'Teams', 'view'))
			{
				return $this->responseError(new XenForo_Phrase('Teams_you_may_only_reassign_team_to_user_with_permission_to_view'));
			}

			$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Team');
			$dw->setExistingData($team['team_id']);
			
			$dw->bulkSet(array(
				'user_id' => $user['user_id'],
				'username' => $user['username']
			));
			$dw->save();

			/* update new position for exisiting owner. */
			$oldUser = array(
				'user_id' => $dw->getExisting('user_id'),
				'team_id' => $team['team_id']
			);
			$memberDw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Member');
			$memberDw->setExistingData($oldUser);
			$memberDw->set('position', 'member');
			$memberDw->save();

			$newUserData = array(
				'user_id' => $user['user_id'],
				'team_id' => $team['team_id'],
				'username' => $user['username']
			);

			$setup = Nobita_Teams_Setup::getInstance();
			$teamCache = $setup->getTeamFromVisitor($team['team_id'], $user);

			$newDw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Member');
			if ($teamCache)
			{
				$newDw->setExistingData($teamCache);
			}
			$newDw->bulkSet($newUserData);
			$newDw->set('position', 'admin');
			$newDw->save();

			if (XenForo_Model_Alert::userReceivesAlert($user, 'team', 'reassign')
				&& XenForo_Visitor::getUserId() != $user['user_id']
			)
			{
				// make sure user allow get alerts.
				if (!empty($teamCache) && $teamCache['alert'])
				{
					XenForo_Model_Alert::alert($user['user_id'],
						$dw->getExisting('user_id'), $dw->getExisting('username'),
						'team', $team['team_id'],
						'reassign'
					);
				}
				else
				{
					
					XenForo_Model_Alert::alert($user['user_id'],
						$dw->getExisting('user_id'), $dw->getExisting('username'),
						'team', $team['team_id'],
						'reassign'
					);
				}
				
			}

			XenForo_Model_Log::logModeratorAction('team', $team, 'reassign', array('from' => $dw->getExisting('username')));
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team)
			);
		}
		else
		{
			return $this->responseView('Nobita_Teams_ViewPublic_Team_Reassign', 'Team_reassign', array(
				'team' => $team,
				'category' => $category,
				'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category)
			));
		}
	}

	public function actionRibbon()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();
	
		$teamModel = $this->_getTeamModel();
		if (!$this->_getTeamModel()->canChooseRibbon($team, $category, $key))
		{
			throw $this->getErrorOrNoPermissionResponseException($key);
		}

		if ($this->_request->isPost())
		{
			$remove = $this->_input->filterSingle('remove', XenForo_Input::UINT);
			if (empty($remove))
			{
				$text = $this->_input->filterSingle('ribbon_text', XenForo_Input::STRING);
				$textLength = utf8_strlen($text);
				if ($textLength == 0)
				{
					return $this->responseError(new XenForo_Phrase('please_enter_valid_value'));
				}

				$class = $this->_input->filterSingle('ribbon_display_class', XenForo_Input::STRING);

				if (!in_array($class, $category['ribbonStyling']))
				{
					// hack of class
					return $this->responseError(new XenForo_Phrase('please_enter_valid_value'));
				}

				$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Team', XenForo_DataWriter::ERROR_SILENT);
				$dw->setExistingData($team);
				
				$dw->set('ribbon_text', $text);
				$dw->set('ribbon_display_class', $class);
				$dw->save();
			}
			else
			{
				$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Team', XenForo_DataWriter::ERROR_SILENT);
				$dw->setExistingData($team);
				
				$dw->set('ribbon_text', '');
				$dw->set('ribbon_display_class', '');
				$dw->save();
				
				$this->_getTeamModel()->updateAllRibbonForMember($team['team_id']);
			}

			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team)
			);
		}
		else
		{
			return $this->responseView('Nobita_Teams_ViewPublic_Team_Ribbon', 'Team_choose_ribbon', array(
				'team' => $team,
				'category' => $category,
				'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category),
				
				'displayStyles' => $category['ribbonStyling'],
				'remove' => ($team['ribbon_text'] && $team['ribbon_display_class'])
			));
		}
	}

	public function actionChooseRibbon()
	{
		$this->_checkCsrfFromToken($this->_input->filterSingle('t', XenForo_Input::STRING));
		$teamFtpHelper = $this->_getTeamHelper();
		list($team, $category) = $teamFtpHelper->assertTeamValidAndViewable();
		
		if (!XenForo_Visitor::getUserId())
		{
			return $this->responseNoPermission();
		}

		$visitor = XenForo_Visitor::getInstance();
		$setup = Nobita_Teams_Setup::getInstance();
		$member = $setup->getTeamFromVisitor($team['team_id']);

		if (!$member)
		{
			return $this->responseError(new XenForo_Phrase('Teams_you_can_not_select_this_ribbon'), 404);
		}

		if ($visitor['team_ribbon_id'] == $team['team_id'])
		{
			$this->_getTeamModel()->removeUserRibbon(XenForo_Visitor::getUserId());
		}
		else
		{
			$this->_getTeamModel()->applyUserRibbon($team['team_id'], XenForo_Visitor::getUserId());
		}

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			$this->getDynamicRedirect(XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team))
		);
	}

	/**
	 * Action allow quick approve team.
	 *
	 * @return XenForo_ControllerResponse_Redirect
	 */
	public function actionApprove()
	{
		$this->_checkCsrfFromToken($this->_input->filterSingle('t', XenForo_Input::STRING));
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();

		if (!$this->_getTeamModel()->canApproveTeam($team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}
		
		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Team', XenForo_DataWriter::ERROR_SILENT);
		$dw->setExistingData($team);
		$dw->set('team_state', 'visible');
		$dw->save();

		XenForo_Model_Log::logModeratorAction('team', $team, 'approve');
		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team)
		);
	}

	/**
	 * Action allow quick unapprove team.
	 *
	 * @return XenForo_ControllerResponse_Redirect
	 */
	public function actionUnapprove()
	{
		$this->_checkCsrfFromToken($this->_input->filterSingle('t', XenForo_Input::STRING));
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();

		if (!$this->_getTeamModel()->canUnapproveTeam($team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}
	
		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Team', XenForo_DataWriter::ERROR_SILENT);
		$dw->setExistingData($team);
		$dw->set('team_state', 'moderated');
		$dw->save();

		XenForo_Model_Log::logModeratorAction('team', $team, 'unapprove');
		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team)
		);
	}

	public function actionAdd()
	{
		$categoryModel = $this->_getCategoryModel();

		$categoryId = $this->_input->filterSingle('team_category_id', XenForo_Input::UINT);
		if ($categoryId)
		{
			$category = $this->_getTeamHelper()->assertCategoryValidAndViewable($categoryId);
			if (!$category['allow_team_create'])
			{
				$category = false;
			}
		}
		else
		{
			$category = false;
		}
	
		if (!$category)
		{
			if (!$categoryModel->canAddTeam(null, $key))
			{
				throw $this->getErrorOrNoPermissionResponseException($key);
			}

			$categories = $categoryModel->prepareCategories($categoryModel->getViewableCategories());
			return $this->responseView('Nobita_Teams_ViewPublic_Team_ChooseCategory', 'Team_choose_category', array(
				'categories' => $categories
			));
		}
		else
		{
			if (!$categoryModel->canAddTeam($category, $key))
			{
				throw $this->getErrorOrNoPermissionResponseException($key);
			}
			
			$team = array(
				'team_category_id' => $category['team_category_id']
			);
			
			return $this->_getTeamAddOrEditResponse($team, $category);
		}
	}

	protected function _getTeamAddOrEditResponse(array $team, array $category)
	{
		$categoryModel = $this->_getCategoryModel();
		
		$categories = $categoryModel->getViewableCategories();
		// TODO: filter out ones that they can't add to that don't have children?
		// May need to do something slightly different for editing.

		$fieldModel = $this->_getFieldModel();
		$customFields = $fieldModel->getTeamFieldsForEdit(
			$category['team_category_id'], empty($team['team_id']) ? 0 : $team['team_id']
		);
		$customFields = $fieldModel->prepareTeamFields($customFields, true,
			!empty($team['customFields']) ? $team['customFields'] : array()
		);

		// added 1.0.7
		$parentTabsGrouped = array();
		foreach ($customFields as $fieldId => $field)
		{
			if ($field['display_group'] == 'parent_tab')
			{
				$parentTabsGrouped[$fieldId] = $field;
				unset($customFields[$fieldId]);
			}
		}

		$visitor = XenForo_Visitor::getInstance();
		if (empty($team['team_id']))
		{
			$canEditCategory = true;
		}
		else
		{
			$canEditCategory = XenForo_Permission::hasPermission($visitor['permissions'], 'Teams', 'editAny');
		}

		$viewParams = array(
			'team' => $team,
			
			'category' => $category,
			'categories' => $categoryModel->prepareCategories($categories),
			'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category),
			'canEditCategory' => $canEditCategory,
			
			'customFields' => $fieldModel->groupTeamFields($customFields),
			'parentTabsGrouped' => $fieldModel->groupTeamFields($parentTabsGrouped)
		);

		return $this->responseView('Nobita_Teams_ViewPublic_Team_Add', 'Team_add', $viewParams);
	}

	public function actionSave()
	{
		$this->_assertPostOnly();

		$categoryModel = $this->_getCategoryModel();
		
		$visitor = XenForo_Visitor::getInstance();

		$teamId = $this->_input->filterSingle('team_id', XenForo_Input::UINT);
		$teamUrl = $this->_input->filterSingle('custom_url', XenForo_Input::STRING);

		$teamId = (empty($teamId) ? $teamUrl : $teamId);
		if ($teamId)
		{
			list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();
			if (!$this->_getTeamModel()->canEditTeam($team, $category, $key))
			{
				throw $this->getErrorOrNoPermissionResponseException($key);
			}
			
			$canEditCategory = XenForo_Permission::hasPermission($visitor['permissions'], 'Teams', 'editAny');
		}
		else
		{
			$team = false;
			$category = false;
			$canEditCategory = true;
		}

		$teamData = $this->_input->filter(array(
			'team_category_id' => XenForo_Input::UINT,
			'title' => XenForo_Input::STRING,
			'tag_line' => XenForo_Input::STRING
		));
		if (!$teamData['team_category_id'])
		{
			return $this->responseError(new XenForo_Phrase('you_must_select_category'));
		}

		$newCategory = $category;

		if ($canEditCategory)
		{
			if (!$team || $team['team_category_id'] != $teamData['team_category_id'])
			{
				// new team or changing category - let's make sure we can do that
				$newCategory = $this->_getTeamHelper()->assertCategoryValidAndViewable($teamData['team_category_id']);
				if (!$this->_getCategoryModel()->canAddTeam($newCategory, $key))
				{
					throw $this->getErrorOrNoPermissionResponseException($key);
				}
			}

			$categoryId = $teamData['team_category_id'];
		}
		else
		{
			$categoryId = $team['team_category_id'];
			unset($teamData['team_category_id']);
		}
		
		$about = $this->getHelper('Editor')->getMessageText('about', $this->_input);
		$about = XenForo_Helper_String::autoLinkBbCode($about);
		
		/**	 @var $writer Nobita_Teams_DataWriter_Team   **/
		$writer = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Team');
		
		if ($teamId)
		{
			$writer->setExistingData($team['team_id']);
		}
		else
		{
			$writer->set('user_id', $visitor['user_id']);
			$writer->set('username', $visitor['username']);

			$writer->set('privacy_state', $newCategory['default_privacy']);
			$writer->set('disable_tabs', $newCategory['disable_tabs_default']);
		}

		$writer->bulkSet($teamData);

		if (!utf8_strlen($about))
		{
			return $this->responseError(new XenForo_Phrase('Teams_please_enter_your_group_description'));
		}
		$writer->set('about', $about);

		if (!$teamId && $newCategory['team_category_id'] != $category['team_category_id'])
		{
			if ($newCategory['always_moderate_create']
				&& ($writer->get('team_state') == "visible" || !$teamId)
				&& !XenForo_Visitor::getInstance()->hasPermission('Teams', 'approveUnapprove')
			)
			{
				$writer->set('team_state', "moderated");
			}
		}

		if (!$teamId)
		{
			$watch = XenForo_Visitor::getInstance()->default_watch_state;
			if (!$watch)
			{
				$watch = 'watch_no_email';
			}

			$writer->setExtraData(Nobita_Teams_DataWriter_Team::DATA_THREAD_WATCH_DEFAULT, $watch);
		}
		
		$customFields = $this->_getTeamHelper()->getCustomFieldValues($null, $shownCustomFields);
		$writer->setCustomFields($customFields, $shownCustomFields);
		
		$writer->preSave();
		
		if (!$writer->hasErrors())
		{
			// processing something! example: spam check!
			$this->assertNotFlooding('post'); // use the action of "posting" as the trigger
		}

		$writer->save();
		$team = $writer->getMergedData();

		if ($writer->isUpdate() && XenForo_Visitor::getUserId() != $team['user_id'])
		{
			$basicLog = $this->_getLogChanges($writer);
			if ($basicLog)
			{
				XenForo_Model_Log::logModeratorAction('team', $team, 'edit', $basicLog);
			}
		}

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team)
		);
	}

	public function actionEdit()
	{
		$fetchOptions = array();
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable(null, $fetchOptions);

		return $this->_getTeamAddOrEditResponse($team, $category);
	}

	public function actionURLPortions()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();

		if (!$this->_getTeamModel()->canCustomizeUrlPortions($team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}
		
		$input = $this->_input->filterSingle('custom_url', XenForo_Input::STRING);
		if ($this->_request->isPost())
		{
			$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Team');
			$dw->setExistingData($team);
			$dw->set('custom_url', $input);
			$dw->save();
		
			$newData = $dw->getMergedData();
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED,
				XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $newData)
			);
		}
		else
		{
			return $this->responseView('Nobita_Teams_ViewPublic_Team_URLPortions', 'Team_url_portions', array(
				'team' => $team,
				'category' => $category,
				'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category)
			));
		}
	}

	public function actionUpdatePrivacy()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();
		
		$visitor = XenForo_Visitor::getInstance();
		if ($visitor['user_id'] != $team['user_id'])
		{
			return $this->responseNoPermission();
		}

		$viewParams = array(
			'team' => $team,
			'category' => $category,
			'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category)
		);

		return $this->_getTeamViewWrapper('information', $team, $category,
			$this->responseView('Nobita_Teams_ViewPublic_Team_UpdateInfo', 'Team_update_privacy', $viewParams)
		);
		//return $this->responseView('Nobita_Teams_ViewPublic_Team_UpdateInfo', 'Team_update_privacy', $viewParams);
	}

	public function actionUpdateSave()
	{
		$this->_assertPostOnly();

		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();
		
		$visitor = XenForo_Visitor::getInstance();
		if ($visitor['user_id'] != $team['user_id'])
		{
			return $this->responseNoPermission();
		}

		$inputDw = $this->_input->filter(array(
			'allow_guest_posting' => XenForo_Input::UINT,
			'always_moderate_join' => XenForo_Input::UINT,
			'always_moderate_posting' => XenForo_Input::UINT,
			'allow_member_posting' => XenForo_Input::UINT,
			'privacy_state' => XenForo_Input::STRING,
			'always_req_message' => XenForo_Input::UINT,
			
			// 1.1.3
			'allow_member_event' => XenForo_Input::UINT
		));

		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Team');
		$dw->setExistingData($team);

		$dw->bulkSet($inputDw);
		$dw->save();

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team)
		);
	}

	public function actionPhotos()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();

		if (!$this->_getTeamModel()->canViewTabAndContainer('photos', $team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		return Nobita_Teams_Helper_Photo::responseView($this, $this->_input, array(
			'team' => $team,
			'category' => $category
		));
	}

	/* END */

	public function actionExtra()
	{
		$selectedTab = $this->_input->filterSingle('type', XenForo_Input::STRING);
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();

		$teamId = $team['team_id'];
		$visitor = XenForo_Visitor::getInstance();

		$fieldModel = $this->_getFieldModel();
		$teamModel = $this->_getTeamModel();
		
		$customFields = $fieldModel->getTeamFieldsForEdit(
			$category['team_category_id'], empty($team['team_id']) ? 0 : $team['team_id']
		);
		$customFields = $fieldModel->prepareTeamFields($customFields, true,
			!empty($team['customFields']) ? $team['customFields'] : array()
		);

		$customFieldsGrouped = array();
		$parentTabsGrouped = array();
		if ($selectedTab == 'information')
		{
			foreach ($customFields as $fieldId => $field)
			{
				if ($field['display_group'] == 'extra_tab')
				{
					$customFieldsGrouped[$fieldId] = $field;
				}
			}
		}
		else
		{
			if (!$this->_getTeamModel()->canViewTabAndContainer('extra', $team, $category, $error))
			{
				throw $this->getErrorOrNoPermissionResponseException($error);
			}

			foreach ($customFields as $fieldId => $field)
			{
				if ($fieldId == $selectedTab)
				{
					$customFieldsGrouped[$fieldId] = $field;
				}
			}

			foreach ($customFields as $fieldId => $field)
			{
				if ($field['display_group'] == 'parent_tab' && $field['parent_tab_id'] == $selectedTab)
				{
					$parentTabsGrouped[$fieldId] = $field;
					unset($customFields[$fieldId]);
				}
			}
		}

		$viewParams = array(
			'team' => $team,
			'category' => $category,
			'selectedTab' => $selectedTab,
			
			'customFieldsGrouped' => $fieldModel->groupTeamFields($customFieldsGrouped),
			'parentTabsGrouped' => $fieldModel->groupTeamFields($parentTabsGrouped)
		);

		return $this->_getTeamViewWrapper($selectedTab, $team, $category,
			$this->responseView('Nobita_Teams_ViewPublic_Team_Extra', 'Team_extra', $viewParams)
		);
	}

	public function _getTeamViewWrapper($selectedTab, array $team, array $category,
		XenForo_ControllerResponse_View $subView)
	{
		return $this->_getTeamHelper()->getTeamViewWrapper($selectedTab, $team, $category, $subView);
	}

	public function actionView()
	{
		$fetchOptions = array(
			'join' => Nobita_Teams_Model_Team::FETCH_THREAD
		);

		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable(null, $fetchOptions);

		$teamId = $team['team_id'];
		$visitor = XenForo_Visitor::getInstance();

		$teamModel = $this->_getTeamModel();
		
		$setup = Nobita_Teams_Setup::getInstance();
		$memberRecord = $setup->getTeamFromVisitor($teamId);

		$postModel = $this->_getPostModel();

		$wallType = $this->_input->filterSingle('wtype', XenForo_Input::STRING);

		if (empty($wallType))
		{
			if ($setup->getOption('memberTab') && $teamModel->canViewMemberOrAdminTab(
				Nobita_Teams_Model_Post::POST_TYPE_MEMBER, $team, $category
			))
			{
				$wallType = Nobita_Teams_Model_Post::POST_TYPE_MEMBER;
			}
			else
			{
				$wallType = Nobita_Teams_Model_Post::POST_TYPE_PUBLIC;
			}
		}

		if (!in_array($wallType, Nobita_Teams_Model_Post::$postTypesSupported))
		{
			return $this->responseError(new XenForo_Phrase('requested_page_not_found'), 404);
		}

		if (!$visitor->hasPermission('Teams', 'editAny') || !$visitor->hasPermission('Teams', 'deleteAny'))
		{
			if (in_array($wallType, array('member', 'moderator')))
			{
				if (!$teamModel->canViewMemberOrAdminTab($wallType, $team, $category, $error))
				{
					throw $this->getErrorOrNoPermissionResponseException($error);
				}
			}
		}

		if ($teamModel->assertDisplayInfoTabtoGuest($team, $category, $null))
		{
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL,
				$this->_buildLink(TEAM_ROUTE_PREFIX . '/extra', $team, array('type' => 'information'))
			);
		}

		$page = max(1, $this->_input->filterSingle('page', XenForo_Input::UINT));
		$postsPerPage = XenForo_Application::get('options')->messagesPerPage;

		$postConditions = $postModel->getPermissionBasedPostConditions($team, $memberRecord);
		$postConditions['discussion_type'] = $wallType;

		$totalPosts = $postModel->countPostsForTeamId($teamId, $postConditions);
		$this->canonicalizeRequestUrl($this->_buildLink(TEAM_ROUTE_PREFIX, $team, array(
			'page' => $page
		)));
		$this->canonicalizePageNumber($page, $postsPerPage, $totalPosts, TEAM_ROUTE_PREFIX, $team);

		$posts = $postModel->getPostsForTeamId($teamId,
			array_merge($postConditions,
				array(
					'sticky' => 0
				)
			),
			array(
			'join' => Nobita_Teams_Model_Post::FETCH_POSTER 
				| Nobita_Teams_Model_Post::FETCH_BBCODE_CACHE,
			'page' => $page,
			'perPage' => $postsPerPage,
			'likeUserId' => XenForo_Visitor::getUserId(),
			'watchUserId' => XenForo_Visitor::getUserId()
		));
		$posts = $postModel->getAndMergeAttachmentsIntoPosts($posts);

		if ($page == 1)
		{
			$stickyPosts = $postModel->getPostsStickyForTeamId($teamId, 
				$postConditions,
				array(
					'join' => Nobita_Teams_Model_Post::FETCH_POSTER
						| Nobita_Teams_Model_Post::FETCH_BBCODE_CACHE,
					'likeUserId' => XenForo_Visitor::getUserId(),
					'watchUserId' => XenForo_Visitor::getUserId()
			));
		}
		else
		{
			$stickyPosts = array();
		}

		$empty = array();
		$inlineModOptions = $postModel->addInlineModOptionToPost($empty, $team, $category);
		unset($empty);

		foreach ($posts as &$post)
		{
			$post = $postModel->preparePost($post, $team, $category);
		}
		foreach ($stickyPosts as &$post)
		{
			$post = $postModel->preparePost($post, $team, $category);
		}
		unset($post);

		// normal posts.
		foreach ($posts as $postId => &$post)
		{
			if (!$postModel->canViewPostAndContainer($post, $team, $category, $error))
			{
				unset($posts[$postId]);
			}
		}

		$ignoredNames = $this->_getIgnoredContentUserNames($posts);

		$posts = $postModel->addCommentsToPosts($posts, array(
			'join' => Nobita_Teams_Model_Comment::FETCH_COMMENTER,
			'likeUserId' => XenForo_Visitor::getUserId()
		));

		$commentModel = $this->getModelFromCache('Nobita_Teams_Model_Comment');
		foreach ($posts as &$post)
		{
			if (empty($post['comments']))
			{
				continue;
			}
				
			foreach ($post['comments'] as &$comment)
			{
				$comment = $commentModel->prepareComment($comment, $post, $team);
			}
			$ignoredNames += $this->_getIgnoredContentUserNames($post['comments']);
		}
		unset($comment);

		// sticky posts.
		foreach ($stickyPosts as $stickyId => $sticky)
		{
			if (!$postModel->canViewPostAndContainer($sticky, $team, $category, $error))
			{
				unset($stickyPosts[$stickyId]);
			}
		}

		$ignoredNames += $this->_getIgnoredContentUserNames($stickyPosts);
		$stickyPosts = $postModel->addCommentsToPosts($stickyPosts, array(
			'join' => Nobita_Teams_Model_Comment::FETCH_COMMENTER
		));
			
		$stickyPosts = $postModel->getAndMergeAttachmentsIntoPosts($stickyPosts);
		foreach ($stickyPosts as &$sticky)
		{
			if (empty($sticky['comments']))
			{
				continue;
			}
				
			foreach ($sticky['comments'] as &$comment)
			{
				$comment = $commentModel->prepareComment($comment, $comment, $team);
			}
			$ignoredNames += $this->_getIgnoredContentUserNames($sticky['comments']);
		}

		$attachmentHash = null;
		$attachmentParams = $teamModel->getAttachmentParams($team, $category, array(
			'team_id' => $team['team_id'],
			'content_type' => 'team_post'
		), null, null, $attachmentHash);

		$viewParams = array(
			'team' => $team,
			'category' => $category,

			'ignoredNames' => $ignoredNames,
			'canPosting' => $teamModel->canPostOnTeam($team, $category),
			'canViewWarning' => $this->getModelFromCache('XenForo_Model_User')->canViewWarnings(),

			'customEditor' => $this->_getTeamHelper()->getCustomBbcodeEditor(),

			'posts' => $posts,
			'stickyPosts' => $stickyPosts,
			'inlineModOptions' => $inlineModOptions,
			'page' => $page,
			'postsPerPage' => $postsPerPage,
			'totalPosts' => $totalPosts,

			'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category),
			'attachmentParams' => $attachmentParams,
			'attachmentConstraints' => $this->getModelFromCache('XenForo_Model_Attachment')->getAttachmentConstraints(),
			'canViewAttachments' => $visitor->hasPermission('Teams', 'viewAttachment'),
			'canUploadAttachments' => $this->_getCategoryModel()->canUploadAttachments($category),

			'wallType' => $wallType,

			'memberRecord' => $memberRecord
		);

		return $this->_getTeamViewWrapper('wall', $team, $category,
			$this->responseView('Nobita_Teams_ViewPublic_Team_Wall', 'Team_wall', $viewParams)
		);
	}

	public function actionCover()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();

		if (!$this->getModelFromCache('Nobita_Teams_Model_Cover')->canUploadCover($team, $category, $key))
		{
			throw $this->getErrorOrNoPermissionResponseException($key);
		}

		return $this->_getTeamViewWrapper('cover', $team, $category,
			$this->responseView('Nobita_Teams_ViewPublic_Team_Cover', 'Team_cover', array(
				'team' => $team,
				'category' => $category
			))
		);
	}

	public function actionCoverUpload()
	{
		$this->_assertPostOnly();
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();

		$coverModel = $this->getModelFromCache('Nobita_Teams_Model_Cover');
		if (!$this->getModelFromCache('Nobita_Teams_Model_Cover')->canUploadCover($team, $category, $key))
		{
			throw $this->getErrorOrNoPermissionResponseException($key);
		}

		$coverPhoto = XenForo_Upload::getUploadedFile('coverPhoto');
		$deleteCoverPhoto = $this->_input->filterSingle('delete', XenForo_Input::UINT);
		if ($coverPhoto)
		{
			$coverData = $coverModel->uploadCoverPhoto($coverPhoto, $team['team_id'], $team['cover_date']);
			if ($coverData)
			{
				// apply to default cover crop
				$coverModel->applyCoverCrop(
					$team['team_id'], $coverData['cover_date'], array(
						'crop_x' => 0,
						'crop_y' => 0,
						'crop_w' => $this->_input->filterSingle('sky_width', XenForo_Input::UINT),
						'crop_h' => 315,
						'cover_date' => $coverData['cover_date']
					)
				);
			}

			$redirect = XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team, array(
				'reposition' => 1,
				'actionuid' => XenForo_Visitor::getUserId()
			));
		}
		else if ($deleteCoverPhoto)
		{
			$coverData = $coverModel->deleteCoverPhoto($team['team_id']);
			$coverData = $coverModel->deleteCoverCropPhoto($team['team_id'], $team['cover_date']);

			$redirect = XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team);
		}

		$message = new XenForo_Phrase('upload_completed_successfully');
		$newData = $this->_getTeamModel()->getTeamById($team['team_id'], array(
			'join' => Nobita_Teams_Model_Team::FETCH_CATEGORY
				| Nobita_Teams_Model_Team::FETCH_PRIVACY
				| Nobita_Teams_Model_Team::FETCH_PROFILE
		));

		if ($this->_noRedirect())
		{
			return $this->responseView(
				'Nobita_Teams_ViewPublic_Cover_Upload',
				'Team_cover_upload',
				array(
					'team_id' => $newData['team_id'],
					'cover_date' => $newData['cover_date'],
					'message' => $message
				)
			);
		}
		else
		{
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				$redirect,
				$message
			);
		}
	}

	public function actionCoverDraging()
	{
		$this->_assertPostOnly();
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();

		$coverModel = XenForo_Model::create('Nobita_Teams_Model_Cover');
		if (!$coverModel->canRepositionCover($team, $category, $null))
		{
			throw $this->getErrorOrNoPermissionResponseException($null);
		}

		$inputDw = $this->_input->filter(array(
			'cover_date' => XenForo_Input::UINT,
			'crop_x' => XenForo_Input::UINT,
			'crop_y' => XenForo_Input::UINT,
			'crop_w' => XenForo_Input::UINT,
			'crop_h' => XenForo_Input::UINT
		));

		$coverModel->applyCoverCrop($team['team_id'], $inputDw['cover_date'], $inputDw);

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team)
		);
	}

	public function actionPost()
	{
		$this->_assertPostOnly();
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();
		
		$visitor = XenForo_Visitor::getInstance();
		$teamModel = $this->_getTeamModel();
		$memberModel = $this->getModelFromCache('Nobita_Teams_Model_Member');

		$wallType = $this->_input->filterSingle('discussion_type', XenForo_Input::STRING);
		if (!$teamModel->canPostOnTeam($team, $category, $error, null, $wallType))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$attachmentHash = $this->_input->filterSingle('attachment_hash', XenForo_Input::STRING);

		$message = $this->getHelper('Editor')->getMessageText('message', $this->_input);
		$message = XenForo_Helper_String::autoLinkBbCode($message, false);

		$writer = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Post');

		$writer->set('team_id', $team['team_id']);
		$writer->set('user_id', $visitor['user_id']);
		$writer->set('username', $visitor['username']);
		$writer->set('message', $message);
		$writer->set('discussion_type', $wallType);

		$writer->setExtraData(Nobita_Teams_DataWriter_Post::DATA_ATTACHMENT_HASH, $attachmentHash);
		$writer->setExtraData(Nobita_Teams_DataWriter_Post::TEAM_DATA, $team);
		$writer->setOption(Nobita_Teams_DataWriter_Post::OPTION_MAX_TAGGED_USERS, $visitor->hasPermission('general', 'maxTaggedUsers'));

		if ($team['always_moderate_posting'])
		{
			if (!$memberModel->assertPermissionActionViewable($team, "canManageContent"))
			{
				$writer->set('message_state', 'moderated');
			}
		}

		/** @var $spamModel XenForo_Model_SpamPrevention */
		$spamModel = $this->getModelFromCache('XenForo_Model_SpamPrevention');
		if (!$writer->hasErrors()
			&& $writer->get('message_state') == 'visible'
			&& $spamModel->visitorRequiresSpamCheck()
		)
		{
			switch ($spamModel->checkMessageSpam($message, array(), $this->_request))
			{
				case XenForo_Model_SpamPrevention::RESULT_MODERATED:
					$writer->set('message_state', 'moderated');
					break;
				case XenForo_Model_SpamPrevention::RESULT_DENIED;
					$writer->error(new XenForo_Phrase('your_content_cannot_be_submitted_try_later'));
					break;
			}
		}
			
		$writer->preSave();
		if (!$writer->hasErrors())
		{
			$this->assertNotFlooding('post');
		}
		
		$writer->save();
		
		$postId = $writer->get('post_id');
		$hash = 'post-' . $postId;
		
		if ($this->_noRedirect())
		{
			$postModel = $this->_getPostModel();
			$post = $postModel->getPostById($postId, array(
				'join' => Nobita_Teams_Model_Post::FETCH_POSTER | Nobita_Teams_Model_Post::FETCH_BBCODE_CACHE
			));
			
			$post = $postModel->getAndMergeAttachmentsIntoPost($post);
			return $this->responseView('Nobita_Teams_ViewPublic_Team_Post', 'Team_post', array(
				'team' => $team,
				'category' => $category,
				'post' => $postModel->preparePost($post, $team, $category),
				'customEditor' => $this->_getTeamHelper()->getCustomBbcodeEditor(),
				'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category),
				'canViewAttachments' => $this->_getTeamModel()->canViewAttachments($team, $category)
			));
		}
		else
		{
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team)
			);
		}
	}
	
	public function actionReport()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();
		
		if ($this->isConfirmedPost())
		{
			$reportMessage = $this->_input->filterSingle('message', XenForo_Input::STRING);
			if (!$reportMessage)
			{
				return $this->responseError(new XenForo_Phrase('please_enter_reason_for_reporting_this_message'));
			}
			
			$this->assertNotFlooding('report');

			$report['team'] = $team;
			$report['category'] = $category;

			/* @var $reportModel XenForo_Model_Report */
			$reportModel = XenForo_Model::create('XenForo_Model_Report');
			$reportModel->reportContent('team', $report, $reportMessage);

			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team),
				new XenForo_Phrase('thank_you_for_reporting_this_message')
			);
		}
		else
		{
			$viewParams = array(
				'team' => $team,
				'category' => $category,
				'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category)
			);
			
			return $this->responseView('Nobita_Teams_ViewPublic_Team_Report', 'Team_report', $viewParams);
		}
	}
	
	public function actionDelete()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();
		$hardDelete = $this->_input->filterSingle('hard_delete', XenForo_Input::UINT);
		$deleteType = ($hardDelete ? 'hard' : 'soft');
		
		if (!$this->_getTeamModel()->canDeleteTeam($team, $category, $deleteType, $key))
		{
			throw $this->getErrorOrNoPermissionResponseException($key);
		}
		
		if ($this->isConfirmedPost())
		{
			$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Team');
			$dw->setExistingData($team['team_id']);
			
			if ($hardDelete)
			{
				$dw->delete();
				XenForo_Model_Log::logModeratorAction('team', $team, 'delete_hard');
			}
			else
			{
				$reason = $this->_input->filterSingle('reason', XenForo_Input::STRING);
				
				$dw->setExtraData(Nobita_Teams_DataWriter_Team::DATA_DELETE_REASON, $reason);
				$dw->set('team_state', 'deleted');
				$dw->save();
				
				if (XenForo_Visitor::getUserId() != $team['user_id'])
				{
					XenForo_Model_Log::logModeratorAction('team', $team, 'delete_soft', array('reason' => $reason));
				}
			}
			
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildPublicLink(TEAM_ROUTE_ACTION . '/categories', $category)
			);
		}
		else
		{
			$viewParams = array(
				'team' => $team,
				'category' => $category,
				'canHardDelete' => $this->_getTeamModel()->canDeleteTeam($team, $category, 'hard'),
				'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category)
			);
		
			return $this->responseView('Nobita_Teams_ViewPublic_Team_Delete', 'Team_delete', $viewParams);
		}
	}
	
	public function actionUndelete()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();
		
		if (!$this->_getTeamModel()->canUndeleteTeam($team, $category, $key))
		{
			throw $this->getErrorOrNoPermissionResponseException($key);
		}
		
		$this->_checkCsrfFromToken($this->_input->filterSingle('t', XenForo_Input::STRING));
		
		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Team');
		$dw->setExistingData($team['team_id']);
		$dw->set('team_state', 'visible');
		$dw->save();
		
		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team)
		);
	}
	
	public function actionRequest()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();
		
		$memberModel = $this->_getMemberModel();
		if (!$canApprove = $memberModel->assertPermissionActionViewable($team, "canApproveOrUnapproved", $key))
		{
			throw $this->getErrorOrNoPermissionResponseException($key);
		}

		$perPage = 20;
		$page = max(1, $this->_input->filterSingle('page', XenForo_Input::UINT));
		$totalMembers = $memberModel->countMembersInTeam($team['team_id'], array("member_state" => "request"));

		$members = $memberModel->getMembersByTeamId($team['team_id'], array('member_state' => "request"), array(
			'page' => $page,
			'perPage' => $perPage
		));
		foreach ($members as &$member)
		{
			$member = $memberModel->prepareMember($member, $team);
		}

		$pageRoute = TEAM_ROUTE_PREFIX . '/request';
		$this->canonicalizePageNumber($page, $perPage, $totalMembers, $pageRoute);

		$viewParams = array(
			'team' => $team,
			'category' => $category,
			
			'totalMembers' => $totalMembers,
			'page' => $page,
			'perPage' => $perPage,
			'members' => $members,
			'pageRoute' => $pageRoute,
			'canApprove' => $canApprove,
			'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category)
		);

		return $this->_getTeamViewWrapper('members', $team, $category,
			$this->responseView('Nobita_Teams_ViewPublic_Team_Request', 'Team_request', $viewParams)
		);
	}

	public function actionMembers()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();
		if (!$this->_getTeamModel()->canViewTabAndContainer('members', $team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$order = $this->_input->filterSingle('order', XenForo_Input::STRING);
		if (empty($order))
		{
			$order = 'all';
		}

		$memberModel = $this->_getMemberModel();
		$banningModel = $this->_getBanningModel();

		$perPage = 20;
		$page = max(1, $this->_input->filterSingle('page', XenForo_Input::UINT));

		$conditions = array();
		$fetchOptions = array();

		static $break = false;
		switch($order)
		{
			case 'admins':
				$conditions['position'] = $this->_getMemberGroupModel()->getStaffIds();
				break;
			case 'alphabetical':
				$conditions['member_state'] = 'accept';
				$fetchOptions = array_merge($fetchOptions, array(
					'order' => 'alphabetical',
					'page' => $page,
					'perPage' => $perPage
				));
				break;
			case 'date':
				$conditions['member_state'] = 'accept';
				$fetchOptions = array_merge($fetchOptions, array(
					'order' => 'date',
					'direction' => 'desc',
					'page' => $page,
					'perPage' => $perPage
				));
				break;
			case 'blocked':
				if (!$banningModel->canViewBannedUsers($team, $category, $error))
				{
					throw $this->getErrorOrNoPermissionResponseException($error);
				}

				// get all
				$members = $banningModel->getAllBanningActiveForTeam($team['team_id']);

				foreach ($members as &$user)
				{
					$user['banUser'] = array(
						'user_id' => $user['ban_user_id'],
						'username' => $user['ban_username']
					);
					Nobita_Teams_Banning::generateBanningUniqueId($user, 'ban_list');
				}
				$break = true;
				$totalMembers = 0;
			default:
				$conditions['member_state'] = 'accept';
				$fetchOptions = array_merge($fetchOptions, array(
					'page' => $page,
					'perPage' => $perPage
				));
				break;
		}

		if ($break === false)
		{
			$members = $memberModel->getMembersByTeamId($team['team_id'], $conditions, $fetchOptions);
			$totalMembers = $memberModel->countMembersInTeam($team['team_id'], $conditions);

			foreach ($members as &$user)
			{
				$user = $memberModel->prepareMember($user, $team);
			}
		}

		$pageRoute = TEAM_ROUTE_PREFIX . '/members';
		$pageParams = array(
			'order' => $order
		);
		$this->canonicalizePageNumber($page, $perPage, $totalMembers, $pageRoute);

		$viewParams = array(
			'team' => $team,
			
			'members' => $members,
			'page' => $page,
			'perPage' => $perPage,
			'totalMembers' => $totalMembers,
			'pageRoute' => $pageRoute,
			'pageParams' => $pageParams,

			'canAssign' => $memberModel->assertPermissionActionViewable($team, "canAssign"),
			'order' => $order,
			'disableAdminQuery' => true,
			'canEditBanned' => $banningModel->canBanUser($team, $category)
		);

		return $this->_getTeamViewWrapper('members', $team, $category,
			$this->responseView('Nobita_Teams_ViewPublic_Team_Member', 'Team_member', $viewParams)
		);
	}

	public function actionNotifications()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();

		if (!XenForo_Visitor::getUserId())
		{
			throw $this->getNoPermissionResponseException();
		}

		$memberModel = $this->getModelFromCache('Nobita_Teams_Model_Member');
		$member = $memberModel->getRecordByKeys(XenForo_Visitor::getUserId(), $team['team_id']);
		
		if (!$member)
		{
			// invalid member!
			throw $this->getNoPermissionResponseException();
		}

		if ($this->isConfirmedPost())
		{
			$notifications = $this->_input->filter(array(
				'send_alert' => XenForo_Input::BOOLEAN,
				'send_email' => XenForo_Input::BOOLEAN
			));
			
			$alert = true;
			if (!$notifications['send_alert'] && !$notifications['send_email'])
			{
				$alert = false;
			}
			
			$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Member');
			$dw->setExistingData($member);
			
			$dw->set('alert', $alert);
			$dw->set('send_alert', $notifications['send_alert']);
			$dw->set('send_email', $notifications['send_email']);
			$dw->save();

			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team)
			);
		}
		else
		{
			return $this->_getTeamHelper()->getTeamViewWrapper('members', $team, $category,
				$this->responseView('Nobita_Teams_ViewPublic_Member_Notification', 'Team_member_notification', array(
					'team' => $team,
					'category' => $category,

					'member' => $member
				))
			);
		}
	}


	public function actionLogo()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable(null);

		if (!$this->_getTeamModel()->canUploadAvatar($team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$viewParams = array(
			'team' => $team,
			'category' => $category
		);
		
		return $this->_getTeamHelper()->getTeamViewWrapper('information', $team, $category,
			$this->responseView('Nobita_Teams_ViewPublic_Team_Avatar', 'Team_avatar', $viewParams)
		);
	}

	public function actionLogoUpload()
	{
		$this->_assertPostOnly();
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable(null, array());
		
		if (!$this->_getTeamModel()->canUploadAvatar($team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$avatar = XenForo_Upload::getUploadedFile('logo');

		/* @var Nobita_Teams_Model_Avatar */
		$avatarModel = $this->getModelFromCache('Nobita_Teams_Model_Avatar');

		$inputData = $this->_input->filter(array(
			'delete' => XenForo_Input::BOOLEAN,
			'x' => XenForo_Input::UINT,
			'y' => XenForo_Input::UINT,
			'h' => XenForo_Input::UINT,
			'w' => XenForo_Input::UINT,
			'team_avatar_date' => XenForo_Input::UINT
		));

		if ($avatar)
		{
			$success = $avatarModel->uploadAvatar($avatar, $team['team_id']);
			if ($success)
			{
				$team['team_avatar_date'] = $success;
			}
		}
		elseif ($inputData['delete'])
		{
			$success = $avatarModel->deleteAvatar($team['team_id']);
			if ($success)
			{
				$team['team_avatar_date'] = 0;
			}
		}

		if (empty($team['team_avatar_date']))
		{
			// just delete avatar
			$message = new XenForo_Phrase('Teams_deleted_successfully');
			$redirect = '';
		}
		else
		{
			$message = new XenForo_Phrase('upload_completed_successfully');
			$redirect = XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team);
		}

		if ($this->_noRedirect())
		{
			return $this->responseView('Nobita_Teams_ViewPublic_Team_AvatarUpload', 'Team_avatar_upload',
				array(
					'team' => $team,
					'category' => $category,

					'team_avatar_date' => $team['team_avatar_date'],
					'message' => $message,
					'redirectUri' => $redirect
				)
			);
		}
		else
		{
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team),
				$message
			);
		}
	}

	public function actionMemberFind()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();
		/*if (!$this->_getTeamModel()->canViewTeamSecret($team, $category, $key))
		{
			throw $this->getErrorOrNoPermissionResponseException($key);
		}*/

		if (!$this->_getTeamModel()->canViewTabAndContainer('members', $team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}
		
		$memberModel = $this->_getMemberModel();
		
		$username = $this->_input->filterSingle('user', XenForo_Input::STRING);
		if ('' !== $username && utf8_strlen($username) > 2)
		{
			$users = $memberModel->getMembersByTeamId($team['team_id'], array(
				'username' => array($username , 'r'),
			), array('limit' => 20));
		}
		else
		{
			$users = array();
		}

		if ($users)
		{
			foreach ($users as &$user)
			{
				$user = $memberModel->prepareMember($user, $team);
			}
		}

		$viewParams = array(
			'team' => $team,
			'category' => $category,
			'username' => $username,

			'members' => $users,
			'canAssign' => $memberModel->assertPermissionActionViewable($team, "canAssign")
		);

		return $this->_getTeamViewWrapper('members', $team, $category,
			$this->responseView('XenForo_ViewPublic_Member_Find', 'Team_member', $viewParams)
		);
	}

	/**
	 * Session activity details.
	 * @see XenForo_Controller::getSessionActivityDetailsForList()
	 */
	public static function getSessionActivityDetailsForList(array $activities)
	{
		if (!XenForo_Visitor::getInstance()->hasPermission('Teams', 'view'))
		{
			return new XenForo_Phrase('Teams_viewing_teams');
		}

		$teamIds = array();
		$teamUrls = array();
		foreach ($activities as $activity)
		{
			if (!empty($activity['params']['team_id']))
			{
				$teamIds[$activity['params']['team_id']] = intval($activity['params']['team_id']);
			}
			
			if (!empty($activity['params']['custom_url']))
			{
				$teamUrls[$activity['params']['custom_url']] = $activity['params']['custom_url'];
			}
		}
		
		$teamModel = XenForo_Model::create('Nobita_Teams_Model_Team');
		if ($teamUrls)
		{
			$teamUrls = $teamModel->getTeamsIdsFromUrls($teamUrls);
			foreach ($teamUrls as $teamID => $team)
			{
				$teamIds[$teamID] = $team;
			}
		}

		$teamData = array();
		if ($teamIds)
		{
			$teams = $teamModel->getTeamsByIds($teamIds, array(
				'join' => Nobita_Teams_Model_Team::FETCH_PRIVACY | Nobita_Teams_Model_Team::FETCH_PROFILE
			));
			
			foreach ($teams as $team)
			{
				if ($teamModel->canViewTeam($team, $team))
				{
					$teamData[$team['team_id']] = array(
						'title' =>  $team['title'],
						'url' => XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team)
					);
				}
			}
		}
		
		$output = array();
		foreach ($activities as $key => $activity)
		{
			$team = false;
			$list = false;
			if (!empty($activity['params']['team_id']))
			{
				$teamID = $activity['params']['team_id'];
				if (isset($teamData[$teamID]))
				{
					$team = $teamData[$teamID];
				}
			}
			else if (!empty($activity['params']['custom_url']))
			{
				$url = $activity['params']['custom_url'];
				if (isset($teamUrls[$url]))
				{
					$teamID = $teamUrls[$url];
					if (isset($teamData[$teamID]))
					{
						$team = $teamData[$teamID];
					}
				}
			}
			else
			{
				$list = true;
			}
		
			if ($team)
			{
				$output[$key] = array(
					new XenForo_Phrase('Teams_viewing_team'),
					$team['title'],
					$team['url'],
					false
				);
			}
			else
			{
				$output[$key] = ($list) ? new XenForo_Phrase('Teams_viewing_team_list') : new XenForo_Phrase('Teams_viewing_teams');
			}
		}
		
		return $output;
	}

	protected function _getLogChanges(XenForo_DataWriter $dw)
	{
		$newData = $dw->getMergedNewData();
		$oldData = $dw->getMergedExistingData();
		$changes = array();

		foreach ($newData AS $key => $newValue)
		{
			if (isset($oldData[$key]))
			{
				$changes[$key] = $oldData[$key];
			}
		}

		return $changes;
	}

	public function actionDescribe()
	{
		$categoryId = $this->_input->filterSingle('team_category_id', XenForo_Input::UINT);
		$category = $this->_getTeamHelper()->assertCategoryValidAndViewable($categoryId);

		if (empty($category['thread_node_id']))
		{
			$teams = array();
		}
		else
		{
			$teamModel = $this->_getTeamModel();

			$conditions = array(
				'team_category_id' => $category['team_category_id'],
				'moderated' => false,
				'deleted' => false
			);
			$fetchOptions = array(
				'join' => Nobita_Teams_Model_Team::FETCH_PROFILE
						| Nobita_Teams_Model_Team::FETCH_PRIVACY
			);

			$teams = $teamModel->getTeams($conditions, $fetchOptions);
			$teams = $teamModel->filterUnviewableTeams($teams, $category);
		}

		return $this->responseView('Nobita_Teams_ViewPublic_Team_Filter', '', array(
			'teams' => $teams
		));
	}

	public function actionMassAlert()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();

		if (!$this->_getTeamModel()->canSendMassAlerts($team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$this->assertNotFlooding('team_mass_alert', 3600); // 1 hour

		if ($this->_request->isPost())
		{
			$message = $this->_input->filterSingle('message', XenForo_Input::STRING);
			$messLength = Nobita_Teams_Setup::getInstance()->getOption('massMessageLength');

			if (utf8_strlen($message) > intval($messLength))
			{
				return $this->responseError(new XenForo_Phrase('please_enter_message_with_no_more_than_x_characters', array('count' => 25)));
			}

			$this->_getTeamModel()->massAlert($team, $message);

			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				$this->_buildLink(TEAM_ROUTE_PREFIX, $team)
			);
		}
		else
		{
			return $this->_getTeamHelper()->getTeamViewWrapper('information', $team, $category,
				$this->responseView('Nobita_Teams_ViewPublic_Team_MassAlert', 'Team_mass_alert', array(
					'team' => $team,
					'category' => $category
				))
			);
		}		
	}

}