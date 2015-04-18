<?php

class Nobita_Teams_sonnb_XenGallery_Model_Album extends XFCP_Nobita_Teams_sonnb_XenGallery_Model_Album
{
	public function prepareAlbumConditions(array $conditions, array &$fetchOptions)
	{
		$result = parent::prepareAlbumConditions($conditions, $fetchOptions);
		$sqlConditions = array($result);

		$db = $this->_getDb();

		if (isset($conditions['team_id']))
		{
			// good.. if 0 value special so get all albums which does not
			// belong to any teams
			$sqlConditions[] = 'album.team_id = ' . $db->quote($conditions['team_id']);
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



}