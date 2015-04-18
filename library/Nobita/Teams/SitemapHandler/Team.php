<?php

class Nobita_Teams_SitemapHandler_Team extends XenForo_SitemapHandler_Abstract
{
	protected $_teamModel;

	protected function _getTeamModel() 
	{
		if (!$this->_teamModel)
		{
			$this->_teamModel = XenForo_Model::create('Nobita_Teams_Model_Team');
		}

		return $this->_teamModel;
	}

	public function getRecords($previousLast, $limit, array $viewingUser)
	{
		if (!XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'view'))
		{
			return array();
		}

		$teamModel = $this->_getTeamModel();
		$ids = $teamModel->getTeamIdsInRange($previousLast, $limit);

		$teams = $teamModel->getTeamsByIds($ids, array(
			'join' => Nobita_Teams_Model_Team::FETCH_PROFILE 
				| Nobita_Teams_Model_Team::FETCH_PRIVACY
				| Nobita_Teams_Model_Team::FETCH_CATEGORY
		));
		ksort($teams);

		return $teams;
	}

	public function isIncluded(array $entry, array $viewingUser)
	{
		return $this->_getTeamModel()->canViewTeamAndContainer($entry, $entry, $null, $viewingUser);
	}

	public function getData(array $entry)
	{
		$entry['title'] = XenForo_Helper_String::censorString($entry['title']);

		return array(
			'loc' => XenForo_Link::buildPublicLink('canonical:' . TEAM_ROUTE_PREFIX, $entry),
			'lastmod' => $entry['last_activity']
		);
	}

	public function getPhraseKey($key)
	{
		return 'Teams_teams';
	}

	public function isInterruptable()
	{
		return true;
	}

}