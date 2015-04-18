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
class Nobita_Teams_ControllerPublic_Category extends Nobita_Teams_ControllerPublic_Abstract
{
	public function actionIndex()
	{
		$categoryId = $this->_input->filterSingle('team_category_id', XenForo_Input::UINT);
		if (!$categoryId)
		{
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL_PERMANENT,
				XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX)
			);
		}

		$category = $this->_getTeamHelper()->assertCategoryValidAndViewable(null, array(
			'watchUserId' => XenForo_Visitor::getUserId()
		));
		$this->canonicalizeRequestUrl(XenForo_Link::buildPublicLink(TEAM_ROUTE_ACTION . '/categories', $category));
		
		$teamModel = $this->_getTeamModel();
		$categoryModel = $this->_getCategoryModel();
		
		$page = max(1, $this->_input->filterSingle('page', XenForo_Input::UINT));
		
		$setup = Nobita_Teams_Setup::getInstance();
		$perPage = $setup->getOption('teamsPerPage');
		
		$defaultOrder = 'last_activity';
		$defaultOrderDirection = 'desc';

		$order = $this->_input->filterSingle('order', XenForo_Input::STRING, array('default' => $defaultOrder));
		$orderDirection = $this->_input->filterSingle('direction', XenForo_Input::STRING, array('default' => $defaultOrderDirection));

		$criteria = array();

		$viewableCategories = $categoryModel->prepareCategories($categoryModel->getViewableCategories());

		$categoryList = $categoryModel->groupCategoriesByParent($viewableCategories);
		$categoryList = $categoryModel->applyRecursiveCountsToGrouped($categoryList);

		$childCategories = (isset($categoryList[$category['team_category_id']])
			? $categoryList[$category['team_category_id']]
			: array()
		);
		if ($childCategories)
		{
			$searchCategoryIds = $categoryModel->getDescendantCategoryIdsFromGrouped($categoryList, $category['team_category_id']);
			$searchCategoryIds[] = $category['team_category_id'];
		}
		else
		{
			$searchCategoryIds = array($category['team_category_id']);
		}

		$criteria['team_category_id'] = $searchCategoryIds;

		$criteria += $categoryModel->getPermissionBasedFetchConditions($category);

		$totalTeams = $teamModel->countTeams($criteria);
		$this->canonicalizePageNumber($page, $perPage, $totalTeams, TEAM_ROUTE_ACTION . '/categories', $category);

		$fetchOptions = $this->_getTeamListFetchOptions();
		if ($criteria['deleted']) {
			$fetchOptions['join'] |= Nobita_Teams_Model_Team::FETCH_DELETION_LOG;
		}
		
		$teams = $teamModel->getTeams($criteria,
			array_merge(
				$fetchOptions,
				array(
					'perPage' => $perPage,
					'page' => $page,
					'order' => $order,
					'direction' => $orderDirection
				)
			)
		);
		
		$teams = $teamModel->filterUnviewableTeams($teams);
		$teams = $teamModel->prepareTeams($teams, $category);
		$inlineModOptions = $teamModel->getInlineModOptionsForTeams($teams);
		
		if ($categoryList[$category['parent_category_id']][$category['team_category_id']]['featured_count']
			 && $order == $defaultOrder
		)
		{
			$featuredTeams = $teamModel->getFeaturedTeamsInCategories($searchCategoryIds, array_merge(
				$this->_getTeamListFetchOptions(),
				array('limit' => 6, 'order' => 'random')
			));
			
			$featuredTeams = $teamModel->filterUnviewableTeams($featuredTeams);
			$featuredTeams = $teamModel->prepareTeams($featuredTeams);
		}
		else
		{
			$featuredTeams = array();
		}

		$topTeamsCount = $setup->getOption('topTeamsCount');
		if ($topTeamsCount)
		{
			$topTeams = $teamModel->getTeams($criteria, array_merge($fetchOptions,
				array(
					'limit' => $topTeamsCount,
					'order' => 'message_count',
					'direction' => 'desc'
				)
			));
			$topTeams = $teamModel->filterUnviewableTeams($topTeams);
		}
		else
		{
			$topTeams = array();
		}

		$pageNavParams = array(
			'order' => ($order != $defaultOrder ? $order : false),
			'direction' => ($orderDirection != $defaultOrderDirection ? $orderDirection : false)
		);

		$viewParams = array(
			'category' => $category,
			'categoriesGrouped' => $categoryList,
			'childCategories' => $childCategories,
			'categoryBreadcrumbs' => $categoryModel->getCategoryBreadcrumb($category, false),

			'teams' => $teams,
			'topTeams' => $topTeams,
			'featuredTeams' => $featuredTeams,
			'ignoredNames' => $this->_getIgnoredContentUserNames($teams),
			'totalTeams' => $totalTeams,
			'inlineModOptions' => $inlineModOptions,

			'order' => $order,
			'orderDirection' => $orderDirection,

			'page' => $page,
			'perPage' => $perPage,
			'pageNavParams' => $pageNavParams,

			'canAddTeam' => $categoryModel->canAddTeam($category),
			'canWatchCategory' => $categoryModel->canWatchCategory($category)
		);
	
		return $this->responseView('Nobita_Teams_ViewPublic_Team_Category', 'Team_category', $viewParams);

	}

	public function actionWatched()
	{
		$categoryModel = $this->_getCategoryModel();
		$watchModel = $this->_getCategoryWatchModel();
		$visitor = XenForo_Visitor::getInstance();
		
		$categoriesWatched = $watchModel->getUserCategoryWatchByUser($visitor['user_id']);
		
		if ($categoriesWatched)
		{
			$viewableCategories = $this->_getCategoryModel()->getViewableCategories();
			$categoryList = $categoryModel->groupCategoriesByParent($viewableCategories);
			$categoryList = $categoryModel->applyRecursiveCountsToGrouped($categoryList);

			$categories = $categoryModel->ungroupCategories($categoryList, array_keys($categoriesWatched));
		}
		else
		{
			$categories = array();
		}

		$viewParams = array(
			'categories' => $categoryModel->prepareCategories($categories),
			'categoriesWatched' => $categoriesWatched
		);

		return $this->responseView('Nobita_Teams_ViewPublic_Team_WatchedCategories', 'Team_watched_categories', $viewParams);
	}

	public function actionWatchedUpdate()
	{
		$this->_assertPostOnly();
		
		$input = $this->_input->filter(array(
			'category_ids' => array(XenForo_Input::UINT, 'array' => true),
			'do' => XenForo_Input::STRING
		));

		$watch = $this->_getCategoryWatchModel()->getUserCategoryWatchByCategoryIds(XenForo_Visitor::getUserId(), $input['category_ids']);

		foreach ($watch AS $categoryWatch)
		{
			$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_CategoryWatch');
			$dw->setExistingData($categoryWatch, true);

			switch ($input['do'])
			{
				case 'stop':
					$dw->delete();
					break;

				case 'email':
					$dw->set('send_email', 1);
					$dw->save();
					break;

				case 'no_email':
					$dw->set('send_email', 0);
					$dw->save();
					break;

				case 'alert':
					$dw->set('send_alert', 1);
					$dw->save();
					break;

				case 'no_alert':
					$dw->set('send_alert', 0);
					$dw->save();
					break;

				case 'include_children':
					$dw->set('include_children', 1);
					$dw->save();
					break;

				case 'no_include_children':
					$dw->set('include_children', 0);
					$dw->save();
					break;
			}
		}

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			$this->getDynamicRedirect(
				$this->_buildLink(TEAM_ROUTE_ACTION . '/categories/watched')
			)
		);
	}

	public function actionWatch()
	{
		$category = $this->_getTeamHelper()->assertCategoryValidAndViewable();
		
		$categoryModel = $this->_getCategoryModel();
		if (!$categoryModel->canWatchCategory($category, $key))
		{
			throw $this->getErrorOrNoPermissionResponseException($key);
		}
		
		$watchModel = $this->_getCategoryWatchModel();
		
		if ($this->isConfirmedPost())
		{
			if ($this->_input->filterSingle('stop', XenForo_Input::STRING))
			{
				$notifyOn = 'delete';
			}
			else
			{
				$notifyOn = $this->_input->filterSingle('notify_on', XenForo_Input::STRING);
			}

			$sendAlert = $this->_input->filterSingle('send_alert', XenForo_Input::BOOLEAN);
			$sendEmail = $this->_input->filterSingle('send_email', XenForo_Input::BOOLEAN);
			$includeChildren = $this->_input->filterSingle('include_children', XenForo_Input::BOOLEAN);

			$watchModel->setCategoryWatchState(
				XenForo_Visitor::getUserId(), $category['team_category_id'],
				$notifyOn, $sendAlert, $sendEmail, $includeChildren
			);

			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildPublicLink(TEAM_ROUTE_ACTION . '/category', $category),
				null,
				array('linkPhrase' => ($notifyOn != 'delete' ? new XenForo_Phrase('Teams_unwatch_category') : new XenForo_Phrase('Teams_watch_category')))
			);
		}
		else
		{
			$watch = $watchModel->getUserCategoryWatchByCategoryId(
				XenForo_Visitor::getUserId(), $category['team_category_id']
			);

			$viewParams = array(
				'category' => $category,
				'watch' => $watch,
				'categoryBreadcrumbs' => $categoryModel->getCategoryBreadcrumb($category, true),
			);

			return $this->responseView('Nobita_Teams_ViewPublic_Category_CategoryWatch', 'Team_category_watch', $viewParams);
		}
	}
}