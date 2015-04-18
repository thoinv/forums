<?php

class bdSocialShare_XenForo_Model_User extends XFCP_bdSocialShare_XenForo_Model_User
{
	public function bdSocialShare_prepareViewingUser(&$viewingUser)
	{
		$viewingUser = $this->prepareUser($viewingUser);
		$viewingUser['permissions'] = XenForo_Permission::unserializePermissions($viewingUser['global_permission_cache']);
	}
}
