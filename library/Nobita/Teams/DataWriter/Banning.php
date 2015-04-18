<?php

class Nobita_Teams_DataWriter_Banning extends XenForo_DataWriter
{
	const TEAM_DATA = 'teamData';

	protected function _getFields()
	{
		return array(
			'xf_team_ban' => array(
				'team_id' => array('type' => self::TYPE_UINT, 'required' => true),
				'user_id' => array('type' => self::TYPE_UINT, 'required' => true),
				'ban_user_id' => array('type' => self::TYPE_UINT, 'default' => 0),
				'ban_date' => array('type' => self::TYPE_UINT, 'default' => XenForo_Application::$time),
				'end_date' => array('type' => self::TYPE_UINT, 'required' => true),
				'user_reason' => array('type' => self::TYPE_STRING, 'maxLength' => 255)
			)
		);
	}

	protected function _getExistingData($data)
	{
		$teamId = false;
		$userId = false;

		if (!is_array($data))
		{
			return false;
		}

		if (isset($data['team_id']) && isset($data['user_id']))
		{
			$teamId = $data['team_id'];
			$userId = $data['user_id'];
		}
		elseif (isset($data[0]) && isset($data[1]))
		{
			$teamId = $data[0];
			$userId = $data[1];
		}
		else
		{
			return false;
		}

		return array('xf_team_ban' => $this->_getBanningModel()->getBanningByKeys($teamId, $userId));
	}

	protected function _getUpdateCondition($tableName)
	{
		$conditions = array();

		foreach (array('team_id', 'user_id') as $fieldId)
		{
			$conditions[] = $fieldId . ' = ' . $this->_db->quote($this->getExisting($fieldId));
		}

		return implode(' AND ', $conditions);
	}

	protected function _preSave()
	{
		$team = $this->_getTeamData();
		if (!$team)
		{
			$this->error(new XenForo_Phrase('requested_team_not_found'), 'team_id');
		}

		if ($team['user_id'] == $this->get('user_id'))
		{
			throw new Nobita_Teams_Exception_Abstract("You can't give banning to Owner of Team.", true);
			return false;
		}

		if ($this->isChanged('user_id'))
		{
			$userBan = $this->_getBanningModel()->getBanningByKeys($team['team_id'], $this->get('user_id'));
			if ($userBan)
			{
				$this->error(new XenForo_Phrase('this_user_is_already_banned'), 'user_id');
			}
			else
			{
				$user = $this->getModelFromCache('XenForo_Model_User')->getUserById($this->get('user_id'));
				if (!$user || $user['is_moderator'] || $user['is_admin'])
				{
					$this->error(new XenForo_Phrase('this_user_is_an_admin_or_moderator_choose_another'), 'user_id');
				}
			}
		}

		$reason = trim($this->get('user_reason'));
		if (!utf8_strlen($reason))
		{
			$this->error(new XenForo_Phrase('Teams_please_enter_reason_for_ban_user'), 'user_reason');
		}
		elseif (utf8_strlen($reason) > 255)
		{
			$this->error(new XenForo_Phrase('please_enter_message_with_no_more_than_x_characters', array('count' => 255)), 'user_reason');
		}

		if (!$this->get('end_date'))
		{
			throw new Nobita_Teams_Exception_Abstract("Please provide the end date.", true);
		}
	}

	protected function _postSave()
	{
	}

	protected function _postDelete()
	{
	}

	protected function _getTeamData()
	{
		if (!$this->getExtraData(self::TEAM_DATA))
		{
			$team = $this->getModelFromCache('Nobita_Teams_Model_Team')->getFullTeamById($this->get('team_id'));
			$this->setExtraData(self::TEAM_DATA, $team);
		}

		return $this->getExtraData(self::TEAM_DATA);
	}

	protected function _getBanningModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Banning');
	}
}