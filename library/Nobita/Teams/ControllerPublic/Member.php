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
class Nobita_Teams_ControllerPublic_Member extends Nobita_Teams_ControllerPublic_Abstract
{
	public function actionAdd()
	{
		$this->_assertPostOnly();
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();
		$teamId = $team['team_id'];

		$this->_assertCanViewMemberTab($team, $category);

		$username = $this->_input->filterSingle('username', XenForo_Input::STRING);
		$user = $this->getModelFromCache('XenForo_Model_User')->getUserByName($username);

		if (!$user)
		{
			return $this->responseError(new XenForo_Phrase('requested_member_not_found'), 404);
		}

		$memberModel = $this->_getMemberModel();;
		$existing = $memberModel->getRecordByKeys($user['user_id'], $team['team_id']);
		if ($existing)
		{
			return $this->responseError(new XenForo_Phrase('Teams_user_already_joined_in_team'));
		}

		if (XenForo_Visitor::getUserId() == $team['user_id'])
		{
			$defaultstate = 'accept';
		}
		else if ($memberModel->assertPermissionActionViewable($team, "canAssign"))
		{
			$defaultstate = 'accept';
		}
		else
		{
			$defaultstate = 'request';
		}

		$visitor = XenForo_Visitor::getInstance();
		$actionUser = array(
			'action' => 'add',
			'action_user_id' => $visitor['user_id'],
			'action_username' => $visitor['username']
		);
		$memberModel->insertMember(
			$user['user_id'], $teamId,
			'member', $defaultstate,
			$actionUser
		);

		$hash = '#member-' . $teamId . '-' . $user['user_id'];
		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED,
			XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX . '/members', $team) . $hash
		);
	}

	public function actionJoin()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();
		if (!$this->_getMemberModel()->canAsktoJoin($team, $category, $key))
		{
			throw $this->getErrorOrNoPermissionResponseException($key);
		}

		if ($this->isConfirmedPost())
		{
			$visitor = XenForo_Visitor::getInstance();

			$reqMessage = $this->_input->filterSingle('req_message', XenForo_Input::STRING);
			if ($team['always_req_message'] && strlen(trim($reqMessage)) == 0)
			{
				return $this->responseError(new XenForo_Phrase('Teams_please_provide_brief_message'));
			}

			$member = $this->getModelFromCache('Nobita_Teams_Model_Member')->insertMember(
				$visitor['user_id'], $team['team_id'],
				'member', ($team['always_moderate_join']) ? "request" : "accept",
				array(), array(), null,
				$reqMessage
			);

			$message = '';
			if (is_array($member) && $member['member_state'] == 'request')
			{
				$message = new XenForo_Phrase('Teams_request_waiting_approval');
			}

			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team),
				$message
			);
		}
		else
		{
			$viewParams = array(
				'team' => $team,
				'category' => $category
			);

			return $this->_getTeamViewWrapper('members', $team, $category,
				$this->responseView('Nobita_Teams_ViewPublic_Member_RegJoin', 'Team_member_reg_join', $viewParams)
			);
		}
	}

	public function actionLeave()
	{
		list ($userId, $team, $category) = $this->_getTeamHelper()->assertMemberValidAndViewable();

		$memberModel = $this->_getMemberModel();
		$member = $memberModel->getRecordByKeys($userId, $team['team_id']);

		if (!$member)
		{
			throw $this->getNoPermissionResponseException();
		}
		$memberModel->remove($member);

		if ($this->_getTeamModel()->isSecret($team))
		{
			$link = $this->_buildLink(TEAM_ROUTE_PREFIX);
		}
		else
		{
			$link = $this->_buildLink(TEAM_ROUTE_PREFIX, $team);
		}

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			$link
		);
	}

	public function actionSuggestion()
	{
		list($team, $category) = $this->_getTeamHelper()->assertTeamValidAndViewable();

		$this->_assertCanViewMemberTab($team, $category);

		// hidden the token on URL...
		// im intelligent now :D
		$visitor = XenForo_Visitor::getInstance();
		$this->_request->setParam('_xfToken', $visitor['csrf_token_page']);

		$q = ltrim($this->_input->filterSingle('q', XenForo_Input::STRING, array('noTrim' => true)));

		$memberModel = $this->getModelFromCache('Nobita_Teams_Model_Member');
		if ($q !== '' && utf8_strlen($q) >= 2)
		{
			$users = $memberModel->getMembersByTeamId($team['team_id'], array(
				'username' => array($q , 'r'),
			), array('limit' => 20));
		}
		else
		{
			$users = array();
		}

		return $this->responseView(
			'XenForo_ViewPublic_Member_Find',
			'member_autocomplete',
			array('users' => $users)
		);
	}

	public function actionRequest()
	{
		$this->_checkCsrfFromToken($this->_input->filterSingle('t', XenForo_Input::STRING));
		list($userId, $team, $category) = $this->_getTeamHelper()->assertMemberValidAndViewable();

		$this->_assertCanViewMemberTab($team, $category);

		$memberModel = $this->_getMemberModel();
		if (!$memberModel->assertPermissionActionViewable($team, 'canApproveOrUnapproved', $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$user = $memberModel->getRecordByKeys($userId, $team['team_id']);
		if (!$user)
		{
			return $this->responseError(new XenForo_Phrase('requested_member_not_found'), 404);
		}

		$action = $this->_input->filterSingle('req', XenForo_Input::STRING);
		if ($action == 'accept')
		{
			if ($user['member_state'] == "accept")
			{
				return $this->responseError(new XenForo_Phrase('Teams_user_already_joined_in_team'));
			}

			$memberModel->promote(
				$user, 'member',
				'approval', array('alert' => 1, 'member_state' => 'accept')
			);
		}
		elseif ($action == 'cancel')
		{
			$memberModel->remove($user);
		}

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			$this->_buildLink(TEAM_ROUTE_PREFIX . '/request', $team)
		);
	}

	public function actionPromote()
	{
		list ($userId, $team, $category) = $this->_getTeamHelper()->assertMemberValidAndViewable();
		
		$this->_assertCanViewMemberTab($team, $category);

		if (!$user = $this->getModelFromCache('XenForo_Model_User')->getUserById($userId))
		{
			return $this->responseError(new XenForo_Phrase('requested_user_not_found'), 404);
		}

		$memberModel = $this->_getMemberModel();
		$record = $memberModel->getRecordByKeys($user['user_id'], $team['team_id']);

		$setup = Nobita_Teams_Setup::getInstance();
		$promoter = $setup->getTeamFromVisitor($team['team_id']);

		if (!$record)
		{
			return $this->responseError(new XenForo_Phrase('requested_member_not_found'), 404);
		}

		if (!$memberModel->assertPermissionOnAction($team, $record, "canPromote", $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		if ($this->_request->isPost())
		{
			$position = $this->_input->filterSingle('position', XenForo_Input::STRING);

			$memberModel->promote($record, $position, 'promote');
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX . '/members', $team)
			);
		}
		else
		{
			return $this->responseView('', 'Team_member_promote', array(
				'team' => $team,
				'user' => $user,
				'record' => $record,
				'promoter' => $promoter,
				'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category),
				'permsCache' => XenForo_Application::getSimpleCacheData(TEAM_DATAREGISTRY_KEY)
			));
		}
	}

	public function actionRemove()
	{
		$this->_checkCsrfFromToken($this->_input->filterSingle('t', XenForo_Input::STRING));

		list ($userId, $team, $category) = $this->_getTeamHelper()->assertMemberValidAndViewable();

		$this->_assertCanViewMemberTab($team, $category);

		if (!$user = $this->getModelFromCache('XenForo_Model_User')->getUserById($userId))
		{
			return $this->responseError(new XenForo_Phrase('requested_user_not_found'), 404);
		}

		$memberModel = $this->_getMemberModel();
		$record = $memberModel->getRecordByKeys($user['user_id'], $team['team_id']);
		if (!$record)
		{
			return $this->responseError(new XenForo_Phrase('requested_member_not_found'), 404);
		}

		if (!$memberModel->canRemoveMember($record, $team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$memberModel->remove($record);

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX . '/members', $team)
		);
	}

	protected function _assertCanViewMemberTab(array $team, array $category)
	{
		if (!$this->_getTeamModel()->canViewTabAndContainer('members', $team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}
	}
}