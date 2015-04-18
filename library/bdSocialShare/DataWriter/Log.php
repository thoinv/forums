<?php

class bdSocialShare_DataWriter_Log extends XenForo_DataWriter
{

/* Start auto-generated lines of code. Change made will be overwriten... */

	protected function _getFields()
	{
		return array(
				'xf_bdsocialshare_log' => array(
				'log_id' => array('type' => 'uint', 'autoIncrement' => true),
				'user_id' => array('type' => 'uint', 'required' => true),
				'log_date' => array('type' => 'uint', 'required' => true),
				'shareable_class' => array('type' => 'string', 'required' => true, 'maxLength' => 200),
				'shareable_id' => array('type' => 'string', 'required' => true, 'maxLength' => 25),
				'target' => array('type' => 'string', 'required' => true, 'maxLength' => 25),
				'target_id' => array('type' => 'string', 'required' => true),
				'shared_id' => array('type' => 'string', 'required' => true),
			)
		);
	}

	protected function _getExistingData($data)
	{
		if (!$id = $this->_getExistingPrimaryKey($data, 'log_id'))
		{
			return false;
		}

		return array('xf_bdsocialshare_log' => $this->_getLogModel()->getLogById($id));
	}

	protected function _getUpdateCondition($tableName)
	{
		$conditions = array();

		foreach (array('log_id') as $field)
		{
			$conditions[] = $field . ' = ' . $this->_db->quote($this->getExisting($field));
		}

		return implode(' AND ', $conditions);
	}

	protected function _getLogModel()
	{
		return $this->getModelFromCache('bdSocialShare_Model_Log');
	}

/* End auto-generated lines of code. Feel free to make changes below */

}