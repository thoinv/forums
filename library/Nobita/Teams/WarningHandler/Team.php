<?php

class Nobita_Teams_WarningHandler_Team extends XenForo_WarningHandler_Abstract
{
	protected function _canView(array $content, array $viewingUser)
	{
		if (!array_key_exists('privacy_state', $content))
		{
			$content = XenForo_Model::create('Nobita_Teams_Model_Team')->getTeamById($content['team_id'], array(
				'join' => Nobita_Teams_Model_Team::FETCH_PRIVACY
					| Nobita_Teams_Model_Team::FETCH_PROFILE
					| Nobita_Teams_Model_Team::FETCH_CATEGORY
			));
		}

		return XenForo_Model::create('Nobita_Teams_Model_Team')->canViewTeamAndContainer(
			$content, $content, $null, $viewingUser
		);
	}
	
	protected function _canWarn($userId, array $content, array $viewingUser)
	{
		return XenForo_Model::create('Nobita_Teams_Model_Team')->canWarnTeam(
			$content, $content, $null, $viewingUser
		);
	}

	protected function _canDeleteContent(array $content, array $viewingUser)
	{
		return XenForo_Model::create('Nobita_Teams_Model_Team')->canDeleteTeam(
			$content, $content, $null, $viewingUser
		);
	}

	protected function _getContent(array $contentIds, array $viewingUser)
	{
		return XenForo_Model::create('Nobita_Teams_Model_Team')->getTeamsByIds(
			$contentIds,
			array(
				'join' => Nobita_Teams_Model_Team::FETCH_PRIVACY
						| Nobita_Teams_Model_Team::FETCH_PROFILE
						| Nobita_Teams_Model_Team::FETCH_CATEGORY
			)
		);
	}

	public function getContentTitle(array $content)
	{
		return $content['title'];
	}
	
	public function getContentUrl(array $content, $canonical = false)
	{
		return XenForo_Link::buildPublicLink(($canonical ? 'canonical:' : '') . Nobita_Teams_Model_Team::routePrefix(), $content);
	}
	
	public function getContentTitleForDisplay($title)
	{
		// will be escaped in template
		return new XenForo_Phrase('Teams_team_x', array('team' => $title), false);
	}
	
	protected function _warn(array $warning, array $content, $publicMessage, array $viewingUser)
	{
		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Team', XenForo_DataWriter::ERROR_SILENT);
		if ($dw->setExistingData($content))
		{
			$dw->set('warning_id', $warning['warning_id']);
			$dw->save();
		}
	}
	
	protected function _reverseWarning(array $warning, array $content)
	{
		if ($content)
		{
			$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Team', XenForo_DataWriter::ERROR_SILENT);
			$dw->setExistingData($content);
			
			$dw->set('warning_id', 0);
			$dw->save();
		}
	}
	
	protected function _deleteContent(array $content, $reason, array $viewingUser)
	{
		XenForo_Model::create('Nobita_Teams_Model_Team')->deleteTeam($content['team_id'], 'soft');
		
		/*XenForo_Model_Log::logModeratorAction('team', $content, 'delete_soft', array(
			'reason' => $reason), $content);
		*/
	}
	
}