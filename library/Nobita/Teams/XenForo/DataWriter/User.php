<?php

class Nobita_Teams_XenForo_DataWriter_User extends XFCP_Nobita_Teams_XenForo_DataWriter_User
{
	protected function _getFields()
	{
		$fields = parent::_getFields();
		
		$fields['xf_user']['team_cache'] = array('type' => self::TYPE_SERIALIZED, 'default' => 'a:0:{}');
		return $fields;
	}
	
	public function rebuildIgnoreCache()
	{
		parent::rebuildIgnoreCache();
		
		$teams = $this->getModelFromCache('Nobita_Teams_Model_Member')->getAllTeamsUserJoined($this->get('user_id'));
		
		$db = $this->_db;
		$userIdQuoted = $db->quote($this->get('user_id'));

		$updates = array();
		$updates['team_cache'] = serialize($teams);

		$teamsCount = $db->fetchOne('
			SELECT COUNT(*)
			FROM xf_team
			WHERE user_id = ' . $userIdQuoted . ' AND team_state = \'visible\'
		');

		$updates['team_count'] = $teamsCount;
		$db->update('xf_user', $updates, 'user_id = ' . $userIdQuoted);
	}
}