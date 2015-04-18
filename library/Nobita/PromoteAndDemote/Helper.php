<?php
class Nobita_PromoteAndDemote_Helper
{
	public static function userGroups() {
		$userGroupsOption = XenForo_Application::getOptions()->PromoteAndDemote_userGroups;
		$userGroupModel = XenForo_Model::create('XenForo_Model_UserGroup');
		
		$userGroups = $userGroupModel->getUserGroupByIds($userGroupsOption);
		
		return $userGroups;
	}
}