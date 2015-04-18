<?php

class Nobita_Teams_XenForo_Model_Thread extends XFCP_Nobita_Teams_XenForo_Model_Thread
{
	const FETCH_TEAM_DISCUSSION 	= '__teamDiscussion';
	const FETCH_TEAM_BLOCK_USERID 	= '__blockUserId';

	public function prepareThreadConditions(array $conditions, array &$fetchOptions)
	{
		$result = parent::prepareThreadConditions($conditions, $fetchOptions);
		$sqlConditions = array($result);

		if (!empty ($conditions['team_id']))
		{
			$sqlConditions[] = 'thread.team_id = ' . $this->_getDb()->quote(($conditions['team_id']));
		}

		if (count ($sqlConditions) > 1)
		{
			return $this->getConditionsForClause($sqlConditions);
		}
		else
		{
			return $result;
		}
	}

	public function prepareThreadFetchOptions(array $fetchOptions)
	{
		$fetchOptions = array_merge($fetchOptions, array(
			self::FETCH_TEAM_DISCUSSION => 1,
			self::FETCH_TEAM_BLOCK_USERID => XenForo_Visitor::getUserId()
		));

		$result = parent::prepareThreadFetchOptions($fetchOptions);
		extract($result);

		if (!empty($fetchOptions[self::FETCH_TEAM_DISCUSSION]))
		{
			$selectFields .=',team.custom_url, team.team_state, team.user_id as team_user_id, team_privacy.privacy_state';
			$joinTables .='
				LEFT JOIN xf_team AS team ON (team.team_id = thread.team_id AND thread.discussion_type = \'team\')
				LEFT JOIN xf_team_privacy AS team_privacy ON (team_privacy.team_id = team.team_id)
			';
		}

		if (isset($fetchOptions[self::FETCH_TEAM_BLOCK_USERID]))
		{
			if (empty($fetchOptions[self::FETCH_TEAM_BLOCK_USERID]))
			{
				$selectFields .=',team_block.end_date AS block_end_date, team_block.user_reason as block_user_reason';
				$joinTables .='
					LEFT JOIN xf_team_ban AS team_block ON (
						team_block.team_id = thread.team_id AND team_block.user_id = ' . $this->_getDb()->quote($fetchOptions[self::FETCH_TEAM_BLOCK_USERID]) . '
					)
				';
			}
			else
			{
				$selectFields .=',0 AS block_end_date';
			}
		}

		return compact("selectFields", "joinTables", "orderClause");
	}

	public function canViewThread(array $thread, array $forum, &$errorPhraseKey = '', array $nodePermissions = null, array $viewingUser = null)
	{
		$this->standardizeViewingUserReferenceForNode($thread['node_id'], $viewingUser, $nodePermissions);

		if (array_key_exists('team_state', $thread) && !empty($thread['team_state']))
		{
			// good.. now prepare for my addon
			return $this->getModelFromCache('Nobita_Teams_Model_Team')->canViewTeamAndContainer(
				$thread, $thread, $errorPhraseKey, $viewingUser
			);
		}

		return parent::canViewThread($thread, $forum, $errorPhraseKey, $nodePermissions, $viewingUser);
	}

	public function prepareThread(array $thread, array $forum, array $nodePermissions = null, array $viewingUser = null)
	{
		$prepared = parent::prepareThread($thread, $forum, $nodePermissions, $viewingUser);

		$prepared['Team_moveThread'] = $this->Team_moveThread($thread, $forum, $null, $nodePermissions, $viewingUser);

		return $prepared;
	}

	public function Team_moveThread(array $thread, array $forum, &$errorPhraseKey = '', array $nodePermissions = null, array $viewingUser = null)
	{
		$this->standardizeViewingUserReferenceForNode($thread['node_id'], $viewingUser, $nodePermissions);

		return ($viewingUser['user_id']
			&& empty($thread['team_id'])
			&& XenForo_Permission::hasContentPermission($nodePermissions, 'Team_moveThread'));
	}

}