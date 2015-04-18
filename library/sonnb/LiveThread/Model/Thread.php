<?php
/**
 * Product: sonnb - Live Threads
 * Version: 1.1.14
 * Date: 25th January 2015
 * Author: sonnb
 * Website: www.sonnb.com
 * License: You might not copy or redistribute this addon.
 * Any action to public or redistribute must be authorized from author
 */

class sonnb_LiveThread_Model_Thread extends XFCP_sonnb_LiveThread_Model_Thread
{

	public function prepareThreadConditions(array $conditions, array &$fetchOptions)
	{
		$parent = parent::prepareThreadConditions($conditions, $fetchOptions);
		$sqlConditions = array($parent);
		$db = $this->_getDb();

		if (!empty($conditions['sonnb_live_thread']))
		{
			$sqlConditions[] = 'thread.sonnb_live_thread = ' . $db->quote($conditions['sonnb_live_thread']);
		}

		if (count($sqlConditions) > 1)
		{
			return $this->getConditionsForClause($sqlConditions);
		}
		else
		{
			return $parent;
		}
	}
}