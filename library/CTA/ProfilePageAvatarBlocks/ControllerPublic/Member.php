<?php

class CTA_ProfilePageAvatarBlocks_ControllerPublic_Member extends XFCP_CTA_ProfilePageAvatarBlocks_ControllerPublic_Member
{
	public function actionMember()
	{
		$parent = parent::actionMember();

		if ($this->_input->filterSingle('card', XenForo_Input::UINT))
		{
			return $this->responseReroute(__CLASS__, 'card');
		}

		$ctaMaxFollowing = XenForo_Application::get('options')->ctaProfilePageAvatarsFollowing;

		$ctaMaxFollowers = XenForo_Application::get('options')->ctaProfilePageAvatarsFollowers;

		$userId = $this->_input->filterSingle('user_id', XenForo_Input::UINT);

		$userFetchOptions = array(
			'join' => XenForo_Model_User::FETCH_LAST_ACTIVITY
		);

		$user = $this->getHelper('UserProfile')->assertUserProfileValidAndViewable($userId, $userFetchOptions);

		$userModel = $this->_getUserModel();

		if ($user['following'])
		{
			$followingToShowCount = $ctaMaxFollowing;
			$followingCount = substr_count($user['following'], ',') + 1;

			$following = $userModel->getFollowedUserProfiles($userId, $followingToShowCount, 'RAND()');

			if (($followingCount >= $followingToShowCount && count($following) < $followingToShowCount)
				|| ($followingCount < $followingToShowCount && $followingCount != count($following)))
			{
				// following count is off, rebuild it
				$user['following'] = $userModel->getFollowingDenormalizedValue($user['user_id']);
				$userModel->updateFollowingDenormalizedValue($user['user_id'], $user['following']);

				$followingCount = substr_count($user['following'], ',') + 1;
			}
		}
		else
		{
			$followingCount = 0;

			$following = array();
		}

		$followers = $userModel->getUsersFollowingUserId($userId, $ctaMaxFollowers, 'RAND()');

		$parent->params['following'] = $following;
		$parent->params['followers'] = $followers;
		
		return $parent;
	}
}