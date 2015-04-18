<?php

class Nobita_Teams_Model_MemberGroup extends XenForo_Model
{
	protected $_groupCached = array();

	public function getGroupById($id)
	{
		return $this->_getDb()->fetchRow('
			SELECT *
			FROM xf_team_member_group
			WHERE member_group_id = ?
		', $id);
	}

	public function getGroups()
	{
		return $this->fetchAllKeyed('
			SELECT *
			FROM xf_team_member_group
			ORDER BY display_order
		','member_group_id');
	}

	public function saveGroupPermDataCache()
	{
		$groups = $this->getGroups();
		foreach ($groups as &$group)
		{
			if (!is_array($group['permissions']))
			{
				$group['permissions'] = @unserialize($group['permissions']);
			}
		}

		if (!defined('TEAM_DATAREGISTRY_KEY'))
		{
			define('TEAM_DATAREGISTRY_KEY', 'Teams_group_perms');
		}

		XenForo_Application::setSimpleCacheData(TEAM_DATAREGISTRY_KEY, $groups);
		return $groups;
	}

	public function getGroupsCached()
	{
		if (!$this->_groupCached)
		{
			$this->_groupCached = XenForo_Application::getSimpleCacheData(TEAM_DATAREGISTRY_KEY);
			if (!$this->_groupCached)
			{
				$this->_groupCached = $this->saveGroupPermDataCache();
			}
		}

		return $this->_groupCached;
	}

	// get all group ids which have permission can approve or unapprove
	// requesting join to team.
	public function getGroupIdsReceiveAlertsOnRequest()
	{
		$cache = $this->getGroupsCached();

		$groupIds = array();
		foreach ($cache as $id => $data)
		{
			$perms = $data['permissions'];
			if (isset($perms['canApproveOrUnapproved']) && 1 == intval($perms['canApproveOrUnapproved']))
			{
				$groupIds[] = $id;
			}
		}

		return $groupIds;
	}

	public function getStaffIds()
	{
		$groups = $this->getGroupsCached();

		$staffIds = array();
		foreach ($groups as $groupId => $groupCache)
		{
			if (isset($groupCache['is_staff']) && 1 == intval($groupCache['is_staff']))
			{
				$staffIds[] = $groupId;
			}
		}

		return $staffIds;
	}


}