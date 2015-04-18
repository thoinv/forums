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
class Nobita_Teams_ControllerPublic_Author extends Nobita_Teams_ControllerPublic_Abstract
{
	public function actionIndex()
	{
		if ($this->_input->filterSingle('user_id', XenForo_Input::UINT))
		{
			return $this->actionView();
		}

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL_PERMANENT,
			$this->_buildLink(TEAM_ROUTE_PREFIX)
		);
	}

	public function actionView()
	{
		$userId = $this->_input->filterSingle('user_id', XenForo_Input::UINT);

		if (!$user = $this->_getUserModel()->getUserById($userId))
		{
			return $this->responseError(new XenForo_Phrase('requested_user_not_found'), 404);
		}

		$memberModel = $this->getModelFromCache('Nobita_Teams_Model_Member');
		$teamModel = $this->_getTeamModel();
		
		$page = $this->_input->filterSingle('page', XenForo_Input::UINT);
		$perPage = XenForo_Application::get('options')->Teams_teamsPerPage;

		// damn! Only get visible team
		$conditions = array(
			'deleted' => false,
			'moderated' => false
		);

		$fetchOptions = array(
			'join' => Nobita_Teams_Model_Team::FETCH_CATEGORY
				| Nobita_Teams_Model_Team::FETCH_PROFILE
				| Nobita_Teams_Model_Team::FETCH_PRIVACY
				| Nobita_Teams_Model_Team::FETCH_USER,
			'page' => $page,
			'perPage' => $perPage
		);

		$teams = $memberModel->getTeamsYouAdmin($user['user_id'], $fetchOptions, $conditions);
		$teams = $teamModel->filterUnviewableTeams($teams);

		$teams = $teamModel->prepareTeams($teams);

		$inlineModOptions = $teamModel->getInlineModOptionsForTeams($teams);
		$totalTeams = $memberModel->countTeamsYouAdmin($user['user_id'], $conditions);

		$viewParams = array(
			'teams' => $teams,
			'inlineModOptions' => $inlineModOptions,
			
			'page' => $page,
			'perPage' => $perPage,
			'user' => $user,
			'totalTeams' => $totalTeams,
			'fromProfile' => $this->_input->filterSingle('profile', XenForo_Input::UINT)
		);

		return $this->responseView('Nobita_Teams_ViewPublic_Author_View', 'Team_author_view', $viewParams);
	}

	public function actionJoined()
	{
		$this->_assertRegistrationRequired();
		$visitor = XenForo_Visitor::getInstance();
		
		$memberModel = $this->_getMemberModel();
		$teamModel = $this->_getTeamModel();

		$teamIds = $memberModel->getTeamIdsByUserId($visitor['user_id']);
		
		$page = $this->_input->filterSingle('page', XenForo_Input::UINT);

		$setup = Nobita_Teams_Setup::getInstance();
		$perPage = $setup->getOption('teamsPerPage');

		if (empty($teamIds))
		{
			$totalTeams = 0;
			$teams = array();
			$inlineModOptions = array();
		}
		else
		{
			$conditions = array(
				'deleted' => false,
				'moderated' => false
			);

			$conditions += $this->_getCategoryModel()->getPermissionBasedFetchConditions();

			$categories = $this->_getCategoryModel()->getViewableCategories();
			$conditions['team_category_id'] = array_keys($categories);
			$conditions['team_id'] = $teamIds;

			$totalTeams = $teamModel->countTeams($conditions);

			$this->canonicalizePageNumber($page, $perPage, $totalTeams, TEAM_ROUTE_ACTION . '/joined');

			$teams = $teamModel->getTeams($conditions, array(
				'join' => Nobita_Teams_Model_Team::FETCH_CATEGORY 
					| Nobita_Teams_Model_Team::FETCH_PROFILE
					| Nobita_Teams_Model_Team::FETCH_PRIVACY
					| Nobita_Teams_Model_Team::FETCH_USER,
				'page' => $page,
				'perPage' => $perPage
			));

			$teams = $teamModel->filterUnviewableTeams($teams);
			$teams = $teamModel->prepareTeams($teams);
			$inlineModOptions = $teamModel->getInlineModOptionsForTeams($teams);
		}

		$viewParams = array(
			'teams' => $teams,
			'inlineModOptions' => $inlineModOptions,
			
			'page' => $page,
			'perPage' => $perPage,
			'totalTeams' => $totalTeams,
			'user' => $visitor->toArray()
		);

		return $this->responseView('Nobita_Teams_ViewPublic_Team_Join', 'Team_joined_team', $viewParams);
	}

	public static function getSessionActivityDetailsForList(array $activities)
	{
		return new XenForo_Phrase('Teams_viewing_team_author');
	}

	protected function _getUserModel()
	{
		return $this->getModelFromCache('XenForo_Model_User');
	}

	protected function _getCategoryModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Category');
	}

	protected function _getTeamModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Team');
	}
}