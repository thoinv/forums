<?php

class Nobita_Teams_XenForo_DataWriter_Forum extends XFCP_Nobita_Teams_XenForo_DataWriter_Forum
{
	protected function _postDelete()
	{
		$db = $this->_db;
		$nodeIdQuoted = $this->_db->quote($this->get('node_id'));

		$db->update('xf_team_category', array(
			'thread_node_id' => 0,
			'thread_prefix_id' => 0
		), 'thread_node_id = ' . $nodeIdQuoted);

		$db->update('xf_team_category', array(
			'discussion_node_id' => 0,
			'discussion_prefix_id' => 0
		), 'discussion_node_id = ' . $nodeIdQuoted);

		return parent::_postDelete();
	}
}