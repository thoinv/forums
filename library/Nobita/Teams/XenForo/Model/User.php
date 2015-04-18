<?php

class Nobita_Teams_XenForo_Model_UserBase extends XFCP_Nobita_Teams_XenForo_Model_User
{
	// nothing!
}

if (XenForo_Application::$versionId < 1030000)
{
	class Nobita_Teams_XenForo_Model_User extends Nobita_Teams_XenForo_Model_UserBase
	{
		public function getUsersFollowing($userId, array $fetchOptions = array())
		{
			$orderClause = $this->prepareUserOrderOptions($fetchOptions, 'user.username');
			$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

			return $this->fetchAllKeyed($this->limitQueryResults(
				'
					SELECT user.*,
						user_profile.*,
						user_option.*
					FROM xf_user_follow AS user_follow
					INNER JOIN xf_user AS user ON
						(user.user_id = user_follow.user_id AND user.is_banned = 0)
					INNER JOIN xf_user_profile AS user_profile ON
						(user_profile.user_id = user.user_id)
					INNER JOIN xf_user_option AS user_option ON
						(user_option.user_id = user.user_id)
					WHERE user_follow.follow_user_id = ?
					' . $orderClause . '
				', $limitOptions['limit'], $limitOptions['offset']
			), 'user_id', $userId);
		}
	}

}
else
{
	class Nobita_Teams_XenForo_Model_User extends Nobita_Teams_XenForo_Model_UserBase
	{
		// nothing!
	}
}