<?php

class bdSocialShare_Model_Log extends XenForo_Model
{

/* Start auto-generated lines of code. Change made will be overwriten... */

	public function getList(array $conditions = array(), array $fetchOptions = array())
	{
		$logs = $this->getLogs($conditions, $fetchOptions);
		$list = array();

		foreach ($logs as $id => $log)
		{
			$list[$id] = $log['content_type'];
		}

		return $list;
	}

	public function getLogById($id, array $fetchOptions = array())
	{
		$logs = $this->getLogs(array ('log_id' => $id), $fetchOptions);

		return reset($logs);
	}

	public function getLogs(array $conditions = array(), array $fetchOptions = array())
	{
		$whereConditions = $this->prepareLogConditions($conditions, $fetchOptions);

		$orderClause = $this->prepareLogOrderOptions($fetchOptions);
		$joinOptions = $this->prepareLogFetchOptions($fetchOptions);
		$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

		$logs = $this->fetchAllKeyed($this->limitQueryResults("
			SELECT log.*
				$joinOptions[selectFields]
			FROM `xf_bdsocialshare_log` AS log
				$joinOptions[joinTables]
			WHERE $whereConditions
				$orderClause
			", $limitOptions['limit'], $limitOptions['offset']
		), 'log_id');

		$this->_getLogsCustomized($logs, $fetchOptions);

		return $logs;
	}

	public function countLogs(array $conditions = array(), array $fetchOptions = array())
	{
		$whereConditions = $this->prepareLogConditions($conditions, $fetchOptions);

		$orderClause = $this->prepareLogOrderOptions($fetchOptions);
		$joinOptions = $this->prepareLogFetchOptions($fetchOptions);
		$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

		return $this->_getDb()->fetchOne("
			SELECT COUNT(*)
			FROM `xf_bdsocialshare_log` AS log
				$joinOptions[joinTables]
			WHERE $whereConditions
		");
	}

	public function prepareLogConditions(array $conditions = array(), array $fetchOptions = array())
	{
		$sqlConditions = array();
		$db = $this->_getDb();

		if (isset($conditions['log_id']))
		{
			if (is_array($conditions['log_id']))
			{
				if (!empty($conditions['log_id']))
				{
					// only use IN condition if the array is not empty (nasty!)
					$sqlConditions[] = "log.log_id IN (" . $db->quote($conditions['log_id']) . ")";
				}
			}
			else
			{
				$sqlConditions[] = "log.log_id = " . $db->quote($conditions['log_id']);
			}
		}

		if (isset($conditions['user_id']))
		{
			if (is_array($conditions['user_id']))
			{
				if (!empty($conditions['user_id']))
				{
					// only use IN condition if the array is not empty (nasty!)
					$sqlConditions[] = "log.user_id IN (" . $db->quote($conditions['user_id']) . ")";
				}
			}
			else
			{
				$sqlConditions[] = "log.user_id = " . $db->quote($conditions['user_id']);
			}
		}

		if (isset($conditions['log_date']))
		{
			if (is_array($conditions['log_date']))
			{
				if (!empty($conditions['log_date']))
				{
					// only use IN condition if the array is not empty (nasty!)
					$sqlConditions[] = "log.log_date IN (" . $db->quote($conditions['log_date']) . ")";
				}
			}
			else
			{
				$sqlConditions[] = "log.log_date = " . $db->quote($conditions['log_date']);
			}
		}

		if (isset($conditions['shareable_class']))
		{
			if (is_array($conditions['shareable_class']))
			{
				if (!empty($conditions['shareable_class']))
				{
					// only use IN condition if the array is not empty (nasty!)
					$sqlConditions[] = "log.shareable_class IN (" . $db->quote($conditions['shareable_class']) . ")";
				}
			}
			else
			{
				$sqlConditions[] = "log.shareable_class = " . $db->quote($conditions['shareable_class']);
			}
		}

		if (isset($conditions['shareable_id']))
		{
			if (is_array($conditions['shareable_id']))
			{
				if (!empty($conditions['shareable_id']))
				{
					// only use IN condition if the array is not empty (nasty!)
					$sqlConditions[] = "log.shareable_id IN (" . $db->quote($conditions['shareable_id']) . ")";
				}
			}
			else
			{
				$sqlConditions[] = "log.shareable_id = " . $db->quote($conditions['shareable_id']);
			}
		}

		if (isset($conditions['target']))
		{
			if (is_array($conditions['target']))
			{
				if (!empty($conditions['target']))
				{
					// only use IN condition if the array is not empty (nasty!)
					$sqlConditions[] = "log.target IN (" . $db->quote($conditions['target']) . ")";
				}
			}
			else
			{
				$sqlConditions[] = "log.target = " . $db->quote($conditions['target']);
			}
		}

		$this->_prepareLogConditionsCustomized($sqlConditions, $conditions, $fetchOptions);

		return $this->getConditionsForClause($sqlConditions);
	}

	public function prepareLogFetchOptions(array $fetchOptions = array())
	{
		$selectFields = '';
		$joinTables = '';

		$this->_prepareLogFetchOptionsCustomized($selectFields,  $joinTables, $fetchOptions);

		return array(
			'selectFields' => $selectFields,
			'joinTables'   => $joinTables
		);
	}

	public function prepareLogOrderOptions(array $fetchOptions = array(), $defaultOrderSql = '')
	{
		$choices = array();

		$this->_prepareLogOrderOptionsCustomized($choices, $fetchOptions);

		return $this->getOrderByClause($choices, $fetchOptions, $defaultOrderSql);
	}

/* End auto-generated lines of code. Feel free to make changes below */

	protected function _getLogsCustomized(array &$data, array $fetchOptions)
	{
		// customized code goes here
	}

	protected function _prepareLogConditionsCustomized(array &$sqlConditions, array $conditions, array $fetchOptions)
	{
		// customized code goes here
	}

	protected function _prepareLogFetchOptionsCustomized(&$selectFields, &$joinTables, array $fetchOptions)
	{
		// customized code goes here
	}

	protected function _prepareLogOrderOptionsCustomized(array &$choices, array &$fetchOptions)
	{
		// customized code goes here
	}

}