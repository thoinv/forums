<?php

class Nobita_Teams_DataWriter_Member extends XenForo_DataWriter
{
	protected function _getFields()
	{
		return array(
			'xf_team_member' => array(
				'user_id' 					=> array('type' => self::TYPE_UINT, 'required' => true),
				'team_id' 					=> array('type' => self::TYPE_UINT, 'required' => true),
				'username' 					=> array('type' => self::TYPE_STRING, 'maxLength' => 50, 'default' => ''),

				'member_state' 				=> array('type' => self::TYPE_BINARY, 
					'allowedValues' 		=> array('request', 'accept'), 'default' => 'accept', 'maxLength' => 25),
				'position' 					=> array('type' => self::TYPE_BINARY, 'maxLength' => 25, 'required' => true),

				'join_date' 				=> array('type' => self::TYPE_UINT, 'default' => XenForo_Application::$time),
				'alert' 					=> array('type' => self::TYPE_BOOLEAN, 'default' => 1),

				'action' 					=> array('type' => self::TYPE_BINARY,
					'allowedValues' 		=> array('add', 'approval', 'promote', ''), 'default' => '', 'maxLength' => 25),
				'action_user_id' 			=> array('type' => self::TYPE_UINT, 'default' => 0),
				'action_username' 			=> array('type' => self::TYPE_STRING, 'maxLength' => 50, 'default' => ''),

				// 1.1.2
				'req_message' 				=> array('type' => self::TYPE_STRING, 'default' => ''),

				// 1.2
				'send_alert' 				=> array('type' => self::TYPE_BOOLEAN, 'default' => 1),
				'send_email' 				=> array('type' => self::TYPE_BOOLEAN, 'default' => 0)
			)
		);
	}

	protected function _getExistingData($data)
	{
		if (!is_array($data))
		{
			return false;
		}
	
		$userID = false;
		$teamID = false;
		if (isset($data['user_id']) && isset($data['team_id']))
		{
			$userID = $data['user_id'];
			$teamID = $data['team_id'];
		}
		else if (isset($data[0]) && isset($data[1]))
		{
			$userID = $data[0];
			$teamID = $data[1];
		}
		else
		{
			return false;
		}
		
		return array('xf_team_member' => $this->_getMemberModel()->getRecordByKeys($userID, $teamID));
	}

	protected function _getUpdateCondition($tableName)
	{
		$conditions = array();

		foreach (array('user_id', 'team_id') as $field) {
			$conditions[] = $field . ' = ' . $this->_db->quote($this->getExisting($field));
		}

		return implode(' AND ', $conditions);
	}
	
	protected function _preSave()
	{
		if ($this->isChanged('req_message'))
		{
			$reqMessage = $this->get('req_message');
			$maxLength = 140;

			$reqMessage = preg_replace('/\r?\n/', ' ', $reqMessage);

			if (utf8_strlen($reqMessage) > $maxLength)
			{
				$this->error(new XenForo_Phrase('please_enter_message_with_no_more_than_x_characters', array('count' => $maxLength)), 'req_message');
			}

			$this->set('req_message', $reqMessage);
		}

		$maxTeams = 999; // secure?
		if ($this->isInsert())
		{
			if ($this->_getMemberModel()->countAllTeamsForUser($this->get('user_id')) >= $maxTeams)
			{
				$this->error(new XenForo_Phrase('Teams_you_only_join_x_teams', array(
					'max' => $maxTeams
				)));
			}
		}

		if ($this->get('user_id'))
		{
			$user = $this->_getUserModel()->getUserById($this->get('user_id'));

			if ($user)
			{
				$this->set('username', $user['username']);
			}
			else
			{
				$this->set('user_id', 0);
			}
		}

		if ($this->get('action_user_id'))
		{
			$user = $this->_getUserModel()->getUserById($this->get('action_user_id'));
			if ($user)
			{
				if ($user['username'] != $this->get('action_username'))
				{
					$this->set('action_username', $user['username']);
				}
			}
		}
	}

	protected function _postSave()
	{
		$requestDw = $this->_getTeamDwForUpdate();
		if ($requestDw)
		{
			if ($this->get('member_state') == 'request')
			{
				$requestDw->updateMemberRequestCount(1);
				$requestDw->save();
			}
			
			if ($this->isChanged('member_state') 
				&& $this->getExisting('member_state') == 'request' && $this->get('member_state') == 'accept')
			{
				$requestDw->updateMemberRequestCount(-1);
				$requestDw->save();
			}
		}
		
		$memberCountDw = $this->_getTeamDwForUpdate();
		if ($memberCountDw)
		{
			if ($this->isInsert() && $this->get('member_state') == "accept"
				||/* $this->isUpdate() && */$this->isChanged('member_state') && $this->get('member_state') == "accept")
			{
				$memberCountDw->updateMemberCountInTeam(1);
				$memberCountDw->save();
			}
		}

		$userId = $this->get('user_id');
		$visitor = XenForo_Visitor::getInstance();
		
		$alertable = false;
		if ($this->isInsert() && $this->get('member_state') == 'accept')
		{
			if ($userId != $visitor['user_id'])
			{
				$alertable = true;
			}
		}

		if ($this->isUpdate() && $this->isChanged('member_state') && $this->getExisting('member_state') != 'accept')
		{
			$alertable = true;
		}

		if ($alertable)
		{
			if ($this->get('action') == 'add')
			{
				$this->_getMemberModel()->sendAlertsToTeamManagersOnAction($this->getMergedData(), 'add');
			}
			else
			{
				$this->_getMemberModel()->sendAlertsToTeamManagersOnAction($this->getMergedData(), 'accept');
			}
		}

		if ($this->isInsert() && $this->get('member_state') == 'request')
		{
			$this->_getMemberModel()->sendAlertsToTeamManagersOnAction($this->getMergedData(), $this->get('member_state'));
		}

		$this->_updateTeamCache($this->get('user_id'));
		
		if ($this->isChanged('position'))
		{
			if (XenForo_Visitor::getUserId() != $this->get('user_id'))
			{
				$visitor = XenForo_Visitor::getInstance();
				$currPos = $this->get('position');
				$pastPos = $this->getExisting('position');

				$groupsCache = $this->getModelFromCache('Nobita_Teams_Model_MemberGroup')->getGroupsCached();
				if (isset($groupsCache[$currPos]) && 1 == intval($groupsCache[$currPos]['notice']))
				{
					$currTitle = $groupsCache[$currPos]['group_title'];
					$pastTitle = isset($groupsCache[$pastPos]['group_title']) ? $groupsCache[$pastPos]['group_title'] : false;
					
					if ($pastTitle) // make sure the past position is valid
					{
						$message = new XenForo_Phrase('Teams_x_changed_position_y_from_xz_to_yz', array(
							'userId' => $visitor['user_id'],
							'name' => $visitor['username'],
							'bePromotedId' => $this->get('user_id'),
							'bePromotedName' => $this->get('username'),
							'old_position' => ucfirst($pastTitle),
							'new_position' => ucfirst($currTitle)
						), false);
						
						Nobita_Teams_Setup::getInstance()->insertNewPostWhenActionCreated($this->get('team_id'), $message, 1);
					}
				}
				
			}
		}

		$db = $this->_db;
		
		$updateActivity = false;
		if ($this->isUpdate() && $this->isChanged('position'))
		{
			$updateActivity = true;
		}
		
		if ($this->isInsert() && $this->get('member_state') == 'accept')
		{
			$updateActivity = true;
		}

		if ($updateActivity)
		{
			$db->update('xf_team', array('last_activity' => XenForo_Application::$time),
				'team_id = ' . $db->quote($this->get('team_id'))
			);
		}
	}

	protected function _updateTeamCache($userId)
	{
		$db = $this->_db;
		
		$caches = $this->_getMemberModel()->getAllTeamsUserJoined($userId);
		
		XenForo_Db::beginTransaction($db);

		$db->update('xf_user',
			array('team_cache' => serialize($caches)),
			'user_id = ' . $db->quote($userId)
		);

		XenForo_Db::commit($db);
	}

	protected function _postDelete()
	{
		$this->_updateTeamCache($this->get('user_id'));

		$updateDw = $this->_getTeamDwForUpdate();
		if ($updateDw)
		{
			if ($this->get('member_state') == 'request')
			{
				$updateDw->updateMemberRequestCount(-1);
			}
			else if ($this->get('member_state') == 'accept')
			{
				$updateDw->updateMemberCountInTeam(-1);
			}

			$updateDw->save();
		}

		$db = $this->_db;

		$conditions = array();

		$conditions[] = 'content_type = ' . $db->quote('member');
		$conditions[] = 'action = ' . $db->quote($this->get('member_state'));
		$conditions[] = 'content_id = ' . $db->quote($this->get('team_id'));
		$conditions[] = 'user_id = ' . $db->quote($this->get('user_id'));

		$db->delete('xf_user_alert', implode(' AND ', $conditions));
	}

	protected function _getTeamDwForUpdate()
	{
		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Team', XenForo_DataWriter::ERROR_SILENT);
		if ($dw->setExistingData($this->get('team_id')))
		{
			return $dw;
		}
		else
		{
			return false;
		}
		
	}

	protected function _getUserModel()
	{
		return $this->getModelFromCache('XenForo_Model_User');
	}

	protected function _getMemberModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Member');
	}
}