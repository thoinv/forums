<?php
class Nobita_PromoteAndDemote_Model_UserGroup extends XFCP_Nobita_PromoteAndDemote_Model_UserGroup
{
	public function getUserGroupByIds(array $groupIds)
	{
		if (empty($groupIds))
		{
			return array();
		}

		return $this->fetchAllKeyed('
			SELECT *
			FROM xf_user_group
			WHERE user_group_id IN (' . $this->_getDb()->quote($groupIds) . ')
			ORDER BY title
		', 'user_group_id');
	}
}