<?php

class Nobita_Teams_Model_Banning extends XenForo_Model
{
	public function getBanningByKeys($teamId, $userId)
	{
		return $this->_getDb()->fetchRow('
			SELECT banning.*
			FROM xf_team_ban as banning
			WHERE banning.team_id = ? AND banning.user_id = ?
		', array($teamId, $userId));
	}

	public function getAllBanningActiveForTeam($teamId, array $fetchOptions = array())
	{
		$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

		return $this->fetchAllKeyed($this->limitQueryResults(
			'
				SELECT banning.*, user.*, ban_user.username as ban_username
				FROM xf_team_ban AS banning
					LEFT JOIN xf_user AS user ON (user.user_id = banning.user_id)
					LEFT JOIN xf_user ban_user ON (ban_user.user_id = banning.ban_user_id)
				WHERE banning.team_id = ?
					AND banning.end_date > ?
				ORDER BY banning.ban_date
			', $limitOptions['limit'], $limitOptions['offset']
		), 'user_id', array(
			$teamId, XenForo_Application::$time
		));
	}

	public function deleteBanningExpired()
	{
		$db = $this->_getDb();
		$db->delete('xf_team_ban', 'end_date < ' . $db->quote(XenForo_Application::$time));
	}

	public function canBanUser(array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		if (!$viewingUser['user_id'])
		{
			return false;
		}

		return $this->getModelFromCache('Nobita_Teams_Model_Member')->assertPermissionActionViewable(
			$team, 'banUser', $errorPhraseKey, $viewingUser
		);
	}

	public function canViewBannedUsers(array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		if (!$viewingUser['user_id'])
		{
			return false;
		}

		return $this->getModelFromCache('Nobita_Teams_Model_Member')->assertPermissionActionViewable(
			$team, 'banUser', $errorPhraseKey, $viewingUser
		);
	}


	public function prepareContent(array &$content, array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);

		if ($content['user_id'] == $viewingUser['user_id']
			|| $content['user_id'] == $team['user_id']
		)
		{
			return $content;
		}

		if (!$this->canBanUser($team, $category, $errorPhraseKey, $viewingUser))
		{
			return $content;
		}
		$content['canBanUser'] = true;

		return $content;
	}



}