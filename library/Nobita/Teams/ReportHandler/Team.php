<?php

class Nobita_Teams_ReportHandler_Team extends XenForo_ReportHandler_Abstract
{
	public function getReportDetailsFromContent(array $content)
	{
		/* @var $teamModel Nobita_Teams_Model_Team */
		$teamModel = XenForo_Model::create('Nobita_Teams_Model_Team');
		$team = $teamModel->getTeamById($content['team']['team_id'], array(
			'join' => Nobita_Teams_Model_Team::FETCH_CATEGORY
				| Nobita_Teams_Model_Team::FETCH_PRIVACY
				| Nobita_Teams_Model_Team::FETCH_PROFILE
		));
		
		if (!$team)
		{
			return array(false, false, false);
		}
		
		return array(
			$content['team']['team_id'],
			$content['team']['user_id'],
			array(
				'team_id' => $content['team']['team_id'],
				'title' => $content['team']['title']
			)
		);
	}
	
	public function getVisibleReportsForUser(array $reports, array $viewingUser)
	{
		$teamIds = array();
		$teamModel = XenForo_Model::create('Nobita_Teams_Model_Team');
		foreach ($reports AS $reportId => $report)
		{
			$teamIds[$report['content_id']][] = $reportId;
		}
		
		$teams = $teamModel->getTeamsByIds(array_keys($teamIds), array(
			'join' => Nobita_Teams_Model_Team::FETCH_CATEGORY
				| Nobita_Teams_Model_Team::FETCH_PRIVACY
				| Nobita_Teams_Model_Team::FETCH_PROFILE
		));

		foreach ($teams as $teamId => $team)
		{
			if (!$teamModel->canViewTeamAndContainer($team, $team, $key))
			{
				foreach ($teamIds as $reportId)
				{
					unset($reports[$reportId]);
				}
			}
		}
		
		return $reports;
	}
	
	/**
	 * Gets the title of the specified content.
	 *
	 * @see XenForo_ReportHandler_Abstract:getContentTitle()
	 */
	public function getContentTitle(array $report, array $contentInfo)
	{
		return new XenForo_Phrase('Teams_team_x', array('team' => $contentInfo['title']));
	}
	
	public function getContentLink(array $report, array $contentInfo)
	{
		return XenForo_Link::buildPublicLink(Nobita_Teams_Model_Team::routePrefix(), $contentInfo);
	}
	
}