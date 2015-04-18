<?php

class Nobita_Teams_Model_Member extends Nobita_Teams_Model_Abstract
{
	const FETCH_USER = 0x01;
	const FETCH_USER_PERMISSIONS = 0x02;

	public function getRecordByKeys($userId, $teamId)
	{
		$record = $this->_getDb()->fetchRow('
			SELECT *
			FROM xf_team_member
			WHERE user_id = ?
				AND team_id = ?
		', array($userId, $teamId));
		
		return (!empty($record)) ? $record : array();
	}

	public function countAllTeamsForUser($userId)
	{
		return $this->_getDb()->fetchOne('
			SELECT COUNT(*)
			FROM xf_team_member
			WHERE user_id = ?
		', array($userId));
	}

	public function getMembersByTeamId($teamId, array $conditions = array(), array $fetchOptions = array())
	{
		$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);
		$whereClause = $this->prepareMemberConditions($conditions, $fetchOptions);

		$orderClause = $this->prepareMemberOrderFetchOptions($fetchOptions);

		return $this->fetchAllKeyed($this->limitQueryResults(
			'
				SELECT team_member.*, user.*, member_group.*
				FROM xf_team_member AS team_member
					LEFT JOIN xf_user AS user ON (user.user_id = team_member.user_id)
					LEFT JOIN xf_team_member_group AS member_group ON
						(member_group.member_group_id = team_member.position)
				WHERE ' . $whereClause . '
					AND team_member.team_id = ?
				' . $orderClause . '
			',$limitOptions['limit'], $limitOptions['offset']
		),'user_id', $teamId);
	}

	public function getTeamsYouAdmin($userId, array $fetchOptions, array $conditions = array())
	{
		$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

		$categoryModel = $this->getModelFromCache('Nobita_Teams_Model_Category');
		
		$conditions += $categoryModel->getPermissionBasedFetchConditions();

		$categories = $categoryModel->getViewableCategories();
		$conditions['team_category_id'] = array_keys($categories);

		$teamFetchOptions = $this->_getTeamModel()->prepareTeamFetchOptions($fetchOptions);
		$teamClause = $this->_getTeamModel()->prepareTeamConditions($conditions, $fetchOptions);

		return $this->fetchAllKeyed($this->limitQueryResults(
			'
				SELECT team_member.*, team.*
					' . $teamFetchOptions['selectFields'] . '
				FROM xf_team_member AS team_member
					LEFT JOIN xf_team AS team ON (team.team_id = team_member.team_id)
					' . $teamFetchOptions['joinTables'] . '
				WHERE ' . $teamClause . '
					AND team_member.position = \'admin\'
					AND team_member.user_id = ?
				ORDER BY team.last_activity DESC
			', $limitOptions['limit'], $limitOptions['offset']
		), 'team_id', $userId);
	}

	public function countTeamsYouAdmin($userId, array $conditions = array())
	{
		$fetchOptions = array();

		$categoryModel = $this->getModelFromCache('Nobita_Teams_Model_Category');
		
		$conditions += $categoryModel->getPermissionBasedFetchConditions();

		$categories = $categoryModel->getViewableCategories();
		$conditions['team_category_id'] = array_keys($categories);

		$teamClause = $this->_getTeamModel()->prepareTeamConditions($conditions, $fetchOptions);

		return $this->_getDb()->fetchOne('
			SELECT COUNT(*)
			FROM xf_team_member AS team_member
				LEFT JOIN xf_team AS team ON (team.team_id = team_member.team_id)
			WHERE ' . $teamClause . '
				AND team_member.user_id = ?
				AND team_member.position = \'admin\'
		', $userId);
	}

	public function countMembersInTeam($teamID, array $conditions = array())
	{
		$fetchOptions = array();
		$whereClause = $this->prepareMemberConditions($conditions, $fetchOptions);

		return $this->_getDb()->fetchOne('
			SELECT COUNT(*)
			FROM xf_team_member AS team_member
			WHERE ' . $whereClause . '
				AND team_member.team_id = ?
		', $teamID);
	}

	public function getAllMembersInTeam($teamID, array $conditions = array(), array $fetchOptions = array())
	{
		$whereClause = $this->prepareMemberConditions($conditions, $fetchOptions);
		$memberJoinOptions = $this->prepareMemberFetchOptions($fetchOptions);

		return $this->fetchAllKeyed('
			SELECT team_member.*
				' . $memberJoinOptions['selectFields'] . '
			FROM xf_team_member AS team_member
				' . $memberJoinOptions['joinTables'] . '
			WHERE ' . $whereClause . '
				AND team_member.team_id = ?
			ORDER BY join_date
		', 'user_id', $teamID);
	}

	public function getTeamIdsByUserId($userId)
	{
		if (empty($userId))
		{
			return array();
		}

		return $this->_getDb()->fetchCol('
			SELECT team_id
			FROM xf_team_member
			WHERE user_id IN (' . $this->_getDb()->quote($userId) . ')
		');
	}

	public function getAllTeamsUserJoined($userId)
	{
		return $this->fetchAllKeyed('
			SELECT *
			FROM xf_team_member AS team_member
			WHERE team_member.user_id = ?
			ORDER BY team_member.team_id
		', 'team_id', $userId);
	}

	public function prepareMemberConditions(array $conditions = array(), array &$fetchOptions = array())
	{
		$sqlConditions = array();
		$db = $this->_getDb();
		
		if (!empty($conditions['user_id']))
		{
			if (is_array($conditions['user_id']))
			{
				$sqlConditions[] = 'team_member.user_id IN (' . $db->quote($conditions['user_id']) . ')';
			}
			else
			{
				$sqlConditions[] = 'team_member.user_id = ' . $db->quote($conditions['user_id']);
			}
		}

		if (!empty($conditions['member_state']))
		{
			$sqlConditions[] = 'team_member.member_state = ' . $db->quote($conditions['member_state']);
		}
		
		if (!empty($conditions['position']))
		{
			if (is_array($conditions['position']))
			{
				$sqlConditions[] = 'team_member.position IN (' . $db->quote($conditions['position']) . ')';
			}
			else
			{
				$sqlConditions[] = 'team_member.position = ' . $db->quote($conditions['position']);
			}
		}

		if (!empty($conditions['not_in_position']))
		{
			$sqlConditions[] = 'team_member.position <> ' . $db->quote($conditions['not_in_position']);
		}

		// damn! should be check isset or not. 
		// cause that alert = 0 still valid
		if (isset($conditions['alert']))
		{
			$sqlConditions[] = 'team_member.alert = ' . $db->quote($conditions['alert']);
		}

		// for find member in team.
		if (!empty($conditions['username']))
		{
			if (is_array($conditions['username']))
			{
				$sqlConditions[] = 'user.username LIKE ' . XenForo_Db::quoteLike($conditions['username'][0], $conditions['username'][1], $db);
			}
			else
			{
				$sqlConditions[] = 'user.username LIKE ' . XenForo_Db::quoteLike($conditions['username'], 'lr', $db);
			}
		}
		
		return $this->getConditionsForClause($sqlConditions);
	}
	
	public function prepareMemberFetchOptions(array $fetchOptions)
	{
		$selectFields = '';
		$joinTables = '';

		if (!empty($fetchOptions['join']))
		{
			if ($fetchOptions['join'] & self::FETCH_USER)
			{
				$selectFields .=', user.*';
				$joinTables .='
						LEFT JOIN xf_user AS user ON (user.user_id = team_member.user_id)';
			}

			if ($fetchOptions['join'] & self::FETCH_USER && $fetchOptions['join'] & self::FETCH_USER_PERMISSIONS)
			{
				$selectFields .= ',
					permission_combination.cache_value AS global_permission_cache';
				$joinTables .= '
					LEFT JOIN xf_permission_combination AS permission_combination ON
						(permission_combination.permission_combination_id = user.permission_combination_id)';
			}
		}

		return array(
			'selectFields' => $selectFields,
			'joinTables' => $joinTables
		);
	}

	public function prepareMemberOrderFetchOptions(array &$fetchOptions, $defaultOrderSql = '')
	{
		$choices = array(
			'alphabetical' => 'team_member.username',
			'date' => 'team_member.join_date'
		);
		return $this->getOrderByClause($choices, $fetchOptions, $defaultOrderSql);
	}

	public function prepareMember(array $member, array $team, array $viewingUser = null, array $groupsCache = null)
	{
		$this->standardizeViewingUserReference($viewingUser);

		if ($groupsCache === null)
		{
			$groupsCache = $this->_getMemberGroupModel()->getGroupsCached();
		}

		if ($team)
		{
			$member['canPromote'] = ($this->assertPermissionActionViewable($team, "canPromote")
				&& $viewingUser['user_id'] != $member['user_id']
			);
			
			$member['canRemove'] = ($this->assertPermissionActionViewable($team, "canRemove")
				&& $viewingUser['user_id'] != $member['user_id']
				&& $member['user_id'] != $team['user_id']
			);
		}
		else
		{
			$member['canPromote'] = false;
			$member['canRemove'] = false;
		}
		
		if (isset($groupsCache[$member['position']]))
		{
			$member['positionPhrase'] = $groupsCache[$member['position']]['group_title'];
		}

		if ($member['action'] == "add")
		{
			$member['actionPhrase'] = new XenForo_Phrase('Teams_added_by_x', array(
				'name' => $member['action_username']
			));
		}
		else if ($member['action'] == "promote")
		{
			$member['actionPhrase'] = new XenForo_Phrase('Teams_promoted_by_x', array(
				'name' => $member['action_username']
			));
		}
		else if ($member['action'] == "approval")
		{
			$member['actionPhrase'] = new XenForo_Phrase('Teams_approval_by_x', array(
				'name' => $member['action_username']
			));
		}

		$member['memberInfo'] = array();
		Nobita_Teams_Setup::helperMemberId($member['memberInfo'], $member['team_id'], $member['user_id']);

		return $member;
	}

	public function insertMember($userId, $teamId, $position, $state, array $actionUser, array $options = array(), array $viewingUser = null, $reqMessage = '')
	{
		$this->standardizeViewingUserReference($viewingUser);

		$user = $this->getModelFromCache('XenForo_Model_User')->getUserById($userId);
		if (!$user)
		{
			throw new Nobita_Teams_Exception_Abstract("Invalid user ID provided.", false);
			return false;
		}

		if (isset($options['insert']) && $options['insert'])
		{
			// good
		}
		else
		{
			$team = $this->getModelFromCache('Nobita_Teams_Model_Team')->getTeamById($teamId);
			if (!$team)
			{
				throw new Nobita_Teams_Exception_Abstract("Invalid team ID provided.", false);
				return false;
			}
		}

		$action = array();
		if (!empty($actionUser['action']) && !empty($actionUser['action_user_id']) && !empty($actionUser['action_username']))
		{
			if ($actionUser['action_user_id'] != $userId)
			{
				$action = $actionUser;
			}
		}

		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Member');

		$dw->bulkSet(array(
			'user_id' => $user['user_id'],
			'team_id' => $teamId,
			'username' => $user['username'],
			'member_state' => $state,
			'position' => $position,
			'req_message' => $reqMessage
		));

		if ($action)
		{
			$dw->bulkSet($action);
		}

		$dw->save();
		return $dw->getMergedData();
	}

	public function remove(array $record, array $viewingUser = null)
	{
		$deleteDw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Member');
		$deleteDw->setExistingData($record);
		$deleteDw->delete();
	}
	
	public function promote(array $record, $position = '', $action = '', array $options = array(), array $viewingUser = null)
	{
		if (empty($position))
		{
			return;
		}
		
		$this->standardizeViewingUserReference($viewingUser);
		if (!$viewingUser['user_id'])
		{
			return false;
		}

		$updateDw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Member');
		$updateDw->setExistingData($record);
		
		$updateDw->set('position', $position);
		
		if (!empty($action))
		{
			$updateDw->bulkSet(array(
				'action' => $action,
				'action_user_id' => $viewingUser['user_id'],
				'action_username' => $viewingUser['username'],
				'join_date' => XenForo_Application::$time
			));
		}

		if (!empty($options))
		{
			$updateDw->bulkSet($options);
		}

		$updateDw->save();
	}
	
	public static function insert($userId, $teamId, $position, $state, array $actionUser, array $options = array(), array $viewingUser = null)
	{
		return XenForo_Model::create(__CLASS__)->insertMember($userId, $teamId, $position, $state, $actionUser, $options, $viewingUser);
	}
	
	public function canAsktoJoin(array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		if (!$viewingUser['user_id'])
		{
			return false;
		}

		if ($viewingUser['user_id'] == $team['user_id'])
		{
			return false;
		}

		$teamId = $team['team_id'];
		if ($this->isTeamMember($teamId, $viewingUser) || $this->isTeamMemberAwaitingConfirm($teamId, $viewingUser))
		{
			$errorPhraseKey = 'Teams_you_already_join_this_team';
			return false;
		}

		return true;
	}

	public function assertValidMemberOnTeam(array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
	{
		return $this->isTeamMember($team['team_id'], $viewingUser);
	}


	/**
	 *	The quickly requesting to team.
	 *	@params: array $record this record information of visitor viewing team.
	 *	@params: array $team information of team which visitor visited
	 *	@return array [rawLink] => array, [rawTitle] => string or phrases
	 */
	public function canLeaveOrCancelRequest(array $record, array $team, array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		
		if (!$viewingUser['user_id'])
		{
			return false;
		}

		if ($viewingUser['user_id'] == $team['user_id'])
		{
			return array(); // visitor is owner of team. can't leave or request anything.
		}

		$teamId = $team['team_id'];
		$teamMember = $this->getTeamMemberRecord($teamId);

		if ($member = $this->isTeamMember($teamId, $viewingUser))
		{
			return array(
				'rawLink' => XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX . '/members/leave', $teamMember, array(
					't' => $viewingUser['csrf_token_page']
				)),
				'rawTitle' => new XenForo_Phrase('Teams_leave_team'),
				'extraClasses' => 'fa fa-sign-out'
			);
		}
		elseif ($request = $this->isTeamMemberAwaitingConfirm($teamId, $viewingUser))
		{
			return array(
				'rawLink' => XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX . '/members/leave', $teamMember, array(
					't' => $viewingUser['csrf_token_page']
				)),
				'rawTitle' => new XenForo_Phrase('Teams_cancelling'),
				'extraClasses' => 'fa fa-times'
			);
		}
		else
		{
			return array(
				'rawLink' => XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX . '/members/join', '', array(
					'team_id' => $team['team_id'],
					'user_id' => $viewingUser['user_id']
				)),
				'rawTitle' => new XenForo_Phrase('Teams_join_team'),
				'extraClasses' => 'fa fa-sign-in',
				'extraLinkClasses' => 'OverlayTrigger'
			);
		}
	}

	public function canRemoveMember(array $member, array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		if (!$viewingUser['user_id'] || $team['user_id'] == $member['user_id'])
		{
			return false;
		}

		if ($this->isTeamOwner($team, $viewingUser))
		{
			return true;
		}

		return $this->assertPermissionOnAction($team, $member, 'canRemove', $errorPhraseKey, $viewingUser);
	}

	/**
	 *	Check permissions when try to promoting members. This not apply
	 *	for remove members.
	 *	@params: array $team required team info
	 *	@params: array $memberBePromoted who will be promotion or demotion to new position.
	 *	@params: array $action. This action called from options.
	 *	@return (bool): true | false if special permissions was set.
	 */
	public function assertPermissionOnAction(array $team, array $memberBePromoted, $action = "", &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		
		if (!$viewingUser['user_id'] || !$team['team_id'])
		{
			return false; // break out. dont need process anymore.
		}
		$teamId = $team['team_id'];

		$promoter = $this->getRecordByKeys($viewingUser['user_id'], $team['team_id']);
		if (empty($promoter))
		{
			return false; // wow. visitor dont member into team. break break!
		}

		if ($memberBePromoted['user_id'] == $promoter['user_id'])
		{
			return false; // break! can't promote yourself :)
		}
		
		if ($action == "canPromote" || $action == "canRemove")
		{
			if ($memberBePromoted['position'] == "admin" && $promoter['user_id'] != $team['user_id'])
			{
				return false; // break! can promote/remove users who have position higher!
			}
		}
		
		if ($promoter['user_id'] == $team['user_id'])
		{
			// owner team.
			return true;
		}

		$permsCache = $this->_getMemberGroupModel()->getGroupsCached();
		if (isset($permsCache[$promoter['position']]))
		{
			$perms = $permsCache[$promoter['position']]['permissions'];
			if (isset($perms[$action]) && 1 == intval($perms[$action]))
			{
				return true;
			}
		}

		return false;
	}

	public function assertPermissionActionViewable(array $team, $action = "", &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		
		if (!$viewingUser['user_id'] || empty($action))
		{
			return false;
		}

		if ($this->isTeamOwner($team, $viewingUser))
		{
			return true; // owner of team.
		}

		$permsCache = $this->_getMemberGroupModel()->getGroupsCached();
		$member = $this->getTeamMemberRecord($team['team_id'], $viewingUser);

		if ($member)
		{
			if (isset($permsCache[$member['position']]))
			{
				$perms = $permsCache[$member['position']]['permissions'];
				if (isset($perms[$action]) && 1 == intval($perms[$action]))
				{
					return true;
				}
			}
		}

		return false;
	}
	
	public function sendAlertsToTeamManagersOnAction(array $record, $action = "", array $extraParams = array(), array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);

		if (empty($action))
		{
			return; // nothing to do.
		}

		$team = $this->_getTeamModel()->getFullTeamById($record['team_id']);
		if ($action == "request")
		{
			$usersAlerted = $this->getAllMembersInTeam($team['team_id'], array(
				'position' => $this->getModelFromCache('Nobita_Teams_Model_MemberGroup')->getGroupIdsReceiveAlertsOnRequest(), // get admin
				'member_state' => 'accept', // only get users who has accepted.
				 'alert' => 1 // only get users allow receive alerts.
			), array(
				'join' => self::FETCH_USER | self::FETCH_USER_PERMISSIONS
			));

			foreach ($usersAlerted as $userID => $user)
			{
				$user['permissions'] = XenForo_Permission::unserializePermissions($user['global_permission_cache']);
				if ($viewingUser['user_id'] == $user['user_id'])
				{
					continue;
				}

				if (!$this->assertPermissionActionViewable($team, "canApproveOrUnapproved", $null, $user))
				{
					// dont sent alert to users
					// who don't have permissions to approve requesting.
					// this perform alerts
					continue;
				}
				
				if (!$user['send_alert'])
				{
					// user don\t receive alert.
					continue;
				}

				XenForo_Model_Alert::alert($userID,
					$record['user_id'], $record['username'],
					"member", $team['team_id'],
					 "request"
				);
			}
		}
		else if ($action == 'accept')
		{
			XenForo_Model_Alert::alert($record['user_id'],
				$viewingUser['user_id'], $viewingUser['username'],
				'member', $team['team_id'],
				 'accept'
			);

			$this->getModelFromCache('XenForo_Model_Alert')->deleteAlerts('member', $team['team_id'], $record['user_id']);
		}
		else if ($action == 'add')
		{
			if ($record['user_id'] == $record['action_user_id'])
			{
				return;
			}

			XenForo_Model_Alert::alert($record['user_id'],
				$record['action_user_id'], $record['action_username'],
				'member', $team['team_id'],
				 'add'
			);
		}
	}


}