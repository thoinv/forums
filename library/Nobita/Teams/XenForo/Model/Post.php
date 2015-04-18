<?php
class Nobita_Teams_XenForo_Model_Post extends XFCP_Nobita_Teams_XenForo_Model_Post
{
	const FETCH_TEAM_PROFILE = 'Teams_join_team_profile';

	public function preparePostJoinOptions(array $fetchOptions)
	{
		$result = parent::preparePostJoinOptions($fetchOptions);
		extract($result);
	
		if (!empty($fetchOptions[self::FETCH_TEAM_PROFILE]))
		{
			$selectFields .=',
					team_profile.ribbon_text, team_profile.ribbon_display_class, team_profile.team_id as ribbon_team_id';
			$joinTables .='
					LEFT JOIN xf_team_profile AS team_profile ON (user.team_ribbon_id = team_profile.team_id)';
		}

		return compact('selectFields', 'joinTables');
	}

	public function getPostsInThread($threadId, array $fetchOptions = array())
	{
		if (empty($fetchOptions['join']))
		{
			return parent::getPostsInThread($threadId, $fetchOptions);
		}

		$fetchOptions[self::FETCH_TEAM_PROFILE] = true;
		return parent::getPostsInThread($threadId, $fetchOptions);
	}


}