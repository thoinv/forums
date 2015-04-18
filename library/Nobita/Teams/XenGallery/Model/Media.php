<?php

class Nobita_Teams_XenGallery_Model_Media extends XFCP_Nobita_Teams_XenGallery_Model_Media
{
	public function prepareMediaConditions(array $conditions, array &$fetchOptions)
	{
		if (!isset($conditions['social_group_id']))
		{
			// like media index. do not include any medias
			// from social groups
			$conditions['social_group_id'] = 0;
		}

		$result = parent::prepareMediaConditions($conditions, $fetchOptions);
		$sqlConditions = array($result);

		if (isset($conditions['social_group_id']))
		{
			$sqlConditions[] = 'media.social_group_id = ' . $this->_getDb()->quote($conditions['social_group_id']);
		}

		if (count($sqlConditions) > 1)
		{
			return $this->getConditionsForClause($sqlConditions);
		}
		else
		{
			return $result;
		}

	}

	public function prepareMediaFetchOptions(array $fetchOptions, array $conditions = array())
	{
		$response = parent::prepareMediaFetchOptions($fetchOptions, $conditions);
		extract($response);

		if (isset($fetchOptions['joinGroup']) || isset($conditions['social_group_id']))
		{
			$selectFields .=',xf_team.custom_url, xf_team.team_state, xf_team.user_id as team_user_id, team_privacy.privacy_state';
			$joinTables .='
				LEFT JOIN xf_team as xf_team ON (xf_team.team_id = media.social_group_id)
				LEFT JOIN xf_team_privacy AS team_privacy ON (team_privacy.team_id = xf_team.team_id)
			';
		}

		return compact('selectFields', 'joinTables', 'orderClause');
	}

	public function canViewMediaItem(array $media, &$errorPhraseKey = '', array $viewingUser = null)
	{
		if (!empty($media['social_group_id']) && isset($media['team_user_id']))
		{
			return $this->getModelFromCache('Nobita_Teams_Model_Team')->canViewTeam(
				$media, $media, $errorPhraseKey, $viewingUser
			);
		}

		return parent::canViewMediaItem($media, $errorPhraseKey, $viewingUser);
	}


}