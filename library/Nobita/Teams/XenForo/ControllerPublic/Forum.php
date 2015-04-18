<?php

class Nobita_Teams_XenForo_ControllerPublic_Forum extends XFCP_Nobita_Teams_XenForo_ControllerPublic_Forum
{
	public function actionAddThread()
	{
		$GLOBALS[Nobita_Teams_Listener::TEAM_CONTROLLERPUBLIC_FORUM_ADDTHREAD] = $this;

		return parent::actionAddThread();
	}

	public function Team_actionAddThread(XenForo_DataWriter $dw)
	{
		$teamId = $this->_input->filterSingle('team_id', XenForo_Input::UINT);

		$team = $this->getModelFromCache('Nobita_Teams_Model_Team')->getFullTeamById($teamId, array(
			'join' => Nobita_Teams_Model_Team::FETCH_CATEGORY
		));

		if (!$team)
		{
			// normal post.. outside of groups.
		}
		else
		{
			if (! $this->getModelFromCache('Nobita_Teams_Model_Thread')->canAddThread($team, $team, $error))
			{
				// nothing to do
			}
			else
			{
				$dw->set('team_id', $team['team_id']);
				$dw->set('discussion_type', 'team');
			}
		}

		unset($GLOBALS[Nobita_Teams_Listener::TEAM_CONTROLLERPUBLIC_FORUM_ADDTHREAD]);
	}
}