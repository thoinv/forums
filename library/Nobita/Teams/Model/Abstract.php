<?php

abstract class Nobita_Teams_Model_Abstract extends XenForo_Model
{
	protected $_teamSetup;

	protected function getTeamMemberRecord($teamId, array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		if (!$viewingUser['user_id'])
		{
			return array();
		}

		return $this->_teamSetup()->getTeamFromVisitor($teamId, $viewingUser);
	}

	protected function isTeamMember($teamId, array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		if (!$viewingUser['user_id'])
		{
			return false;
		}

		$isMember = $this->_teamSetup()->getTeamFromVisitor($teamId, $viewingUser);
		return (array_key_exists('member_state', $isMember) AND $isMember['member_state'] == 'accept');
	}

	protected function isTeamMemberAwaitingConfirm($teamId, array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		if (!$viewingUser['user_id'])
		{
			return false;
		}

		$isMember = $this->_teamSetup()->getTeamFromVisitor($teamId, $viewingUser);
		return (array_key_exists('member_state', $isMember) && $isMember['member_state'] == 'request');
	}

	protected function isTeamAdmin($teamId, array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		if (!$viewingUser['user_id'])
		{
			return false;
		}

		$isMember = $this->_teamSetup()->getTeamFromVisitor($teamId, $viewingUser);
		if (empty($isMember['position']))
		{
			return false;
		}

		$groupCached = $this->_getMemberGroupModel()->getGroupsCached();
		if (array_key_exists($isMember['position'], $groupCached))
		{
			$groupInfo = $groupCached[$isMember['position']];
			if (!empty($groupInfo['member_group_id']))
			{
				return ($groupInfo['member_group_id'] == 'admin' || !empty($groupInfo['is_staff']));
			}
		}

		return false;
	}

	protected function isTeamOwner(array $team, array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		if (empty($viewingUser['user_id']) || empty($team['user_id']))
		{
			return false;
		}

		return ($viewingUser['user_id'] == $team['user_id']);
	}

	protected function _teamSetup()
	{
		if (!$this->_teamSetup)
		{
			$this->_teamSetup = Nobita_Teams_Setup::getInstance();
		}

		return $this->_teamSetup;
	}

	protected function _getTeamModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Team');
	}

	protected function _getMemberModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Member');
	}

	protected function _getMemberGroupModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_MemberGroup');
	}
}