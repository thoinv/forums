<?php

class FilterTemplatesByAddOn_Model_Template extends XFCP_FilterTemplatesByAddOn_Model_Template
{
	/**
	 * Prepares conditions for searching templates. Often, this search will
	 * be done on an effective template set (using the map). Some conditions
	 * may require this.
	 *
	 * @param array $conditions
	 * @param array $fetchOptions
	 *
	 * @return string SQL conditions
	 */
	public function prepareTemplateConditions(array $conditions, array &$fetchOptions)
	{
		$parent = parent::prepareTemplateConditions($conditions, $fetchOptions);
		$sqlCondition = '';
		
		$db = $this->_getDb();
		
		if (!empty($conditions['addon_id']))
		{
			$sqlCondition = ' AND addon.addon_id = ' . $db->quote($conditions['addon_id']);
		}
		
		return $parent . $sqlCondition;
	}	
}