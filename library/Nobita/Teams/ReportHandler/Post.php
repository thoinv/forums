<?php

class Nobita_Teams_ReportHandler_Post extends XenForo_ReportHandler_Abstract
{
	public function getReportDetailsFromContent(array $content)
	{
		$postModel = XenForo_Model::create('Nobita_Teams_Model_Post');
		$post = $postModel->getPostById($content['post_id'], array(
			'join' => Nobita_Teams_Model_Post::FETCH_TEAM
		));
		
		if (!$post)
		{
			return array(false, false, false);
		}
		
		
		return array(
			$content['post_id'],
			$content['user_id'],
			array(
				'team_id' => $post['team_id'],
				'team_title' => $post['title'],

				'message' => $post['message']
			)
		);
	}

	public function getVisibleReportsForUser(array $reports, array $viewingUser)
	{
		$teamIds = array();
		foreach ($reports as $reportId => $report)
		{
			$info = unserialize($report['content_info']);
			$teamIds[$info['team_id']][] = $reportId;
		}
		
		$teamModel = XenForo_Model::create('Nobita_Teams_Model_Team');
		$teams = $teamModel->getTeamsByIds(array_keys($teamIds), array(
			'join' => Nobita_Teams_Model_Team::FETCH_CATEGORY
				| Nobita_Teams_Model_Team::FETCH_PRIVACY
				| Nobita_Teams_Model_Team::FETCH_PROFILE
		));
		
		foreach ($teamIds as $teamId => $teamReports)
		{
			$remove = false;
			if (!isset($teams[$teamId]))
			{
				$remove = true;
			}
			else
			{
				$team = $teams[$teamId];
				if (!XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'editPostAny')
					&& !XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'deletePostAny')
				)
				{
					$remove = true;
				}
			}
			
			if ($remove)
			{
				foreach ($teamReports as $reportId)
				{
					unset($teamReports[$reportId]);
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
		return new XenForo_Phrase('Teams_post_in_team_x', array('team' => $contentInfo['team_title']));
	}
	
	public function getContentLink(array $report, array $contentInfo)
	{
		return XenForo_Link::buildPublicLink(Nobita_Teams_Model_Team::routePrefix(), $contentInfo);
	}
	
}