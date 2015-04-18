<?php
class Nobita_PromoteAndDemote_Model_User extends XFCP_Nobita_PromoteAndDemote_Model_User
{
	public function canPromote(array $user, &$errorPhraseKey = '', array $viewingUser = null) {
		$this->standardizeViewingUserReference($viewingUser);
		if (!$viewingUser['user_id']) {
			return false;
		}

		return XenForo_Permission::hasPermission($viewingUser['permissions'], 'general', 'promote');
	}
	
	public function canPromotePrimary(array $user, &$errorPhraseKey = '', array $viewingUser = null) {
		$this->standardizeViewingUserReference($viewingUser);
		if (!$viewingUser['user_id']) {
			return false;
		}
		
		if ($viewingUser['user_id'] == $user['user_id'])
		{
			$errorPhraseKey = 'you_cant_promote_or_demote_yourself';
			return false;
		}
		
		if (!$viewingUser['is_admin'])
		{
			if ($user['is_admin'])
			{
				$errorPhraseKey = 'you_cant_promote_or_demote_this_user';
				return false;
			}
			
			if (!$user['is_admin'] && $user['is_moderator'])
			{
				$errorPhraseKey = 'you_cant_promote_or_demote_this_user';
				return false;
			}
		}
		
		return XenForo_Permission::hasPermission($viewingUser['permissions'], 'general', 'promotePrimary');
	}
	
	public function canPromoteSecondary(array $user, &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		if (!$viewingUser['user_id']) {
			return false;
		}
		
		if ($viewingUser['user_id'] == $user['user_id'])
		{
			$errorPhraseKey = 'you_cant_promote_or_demote_yourself';
			return false;
		}
		
		if (!$viewingUser['is_admin'])
		{
			if ($user['is_admin'])
			{
				$errorPhraseKey = 'you_cant_promote_or_demote_this_user';
				return false;
			}
			
			if (!$user['is_admin'] && $user['is_moderator'])
			{
				$errorPhraseKey = 'you_cant_promote_or_demote_this_user';
				return false;
			}
		}
		
		return XenForo_Permission::hasPermission($viewingUser['permissions'], 'general', 'promoteSecondary');
	}
}