<?php
class Nobita_Teams_XenForo_DataWriter_Discussion_Thread extends XFCP_Nobita_Teams_XenForo_DataWriter_Discussion_Thread
{
	protected function _getFields() {
		$fields = parent::_getFields();
		$fields['xf_thread']['team_id'] = array('type' => self::TYPE_UINT, 'default' => null);

		return $fields;
	}
	
	protected function _discussionPreSave() {
		if (isset($GLOBALS[Nobita_Teams_Listener::TEAM_CONTROLLERPUBLIC_FORUM_ADDTHREAD]))
		{
			$GLOBALS[Nobita_Teams_Listener::TEAM_CONTROLLERPUBLIC_FORUM_ADDTHREAD]->Team_actionAddThread($this);
		}

		if ($this->isChanged('team_id'))
		{
			$teamId = $this->get('team_id');
			
			$team = $this->getModelFromCache('Nobita_Teams_Model_Team')->getFullTeamById($teamId, array(
				'join' => Nobita_Teams_Model_Team::FETCH_CATEGORY
			));
			
			if (!$this->getModelFromCache('Nobita_Teams_Model_Thread')->canAddThread($team, $team))
			{
				$this->set('team_id', null);
			}
		}

		return parent::_discussionPreSave();
	}
}