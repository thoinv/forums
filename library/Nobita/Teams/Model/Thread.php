<?php

class Nobita_Teams_Model_Thread extends Nobita_Teams_Model_Abstract
{
	public function canAddThread($team = null, $category = null, &$errorPhraseKey = '', array $viewingUser = null)
	{
		if (!is_array($team) or !is_array($category))
		{
			return false;
		}

		if (empty ($category['discussion_node_id']) || empty ($team['team_id']))
		{
			return false;
		}

		$this->standardizeViewingUserReference($viewingUser);

		if (!$viewingUser['user_id'])
		{
			return false; // guest
		}

		if (!$this->_getTeamModel()->canViewTeam($team, $category, $errorPhraseKey, $viewingUser))
		{
			return false;
		}

		if (!$this->isTeamMember($team['team_id'], $viewingUser))
		{
			return false; // you should be member to do.
		}

		$this->getModelFromCache('XenForo_Model_Forum')->passXenPerm = true;

		return true;
	}

	public function canViewThreadsTab(array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
	}
	
	protected function _getTeamModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Team');
	}
}