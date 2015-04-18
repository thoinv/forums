<?php

class FilterTemplatesByAddOn_Model_AdminTemplate extends XFCP_FilterTemplatesByAddOn_Model_AdminTemplate
{
	public function getAdminTemplates(array $conditions = array(), $fetchOptions = array())
	{
		$whereClause = $this->prepareTemplateConditions($conditions, $fetchOptions);
		$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

		return $this->_getDb()->fetchAll($this->limitQueryResults('
			SELECT 
				template.template_id,
				template.title,
				addon.addon_id, addon.title AS addonTitle
			FROM xf_admin_template AS template
			LEFT JOIN xf_addon AS addon ON
				(addon.addon_id = template.addon_id)
			WHERE ' . $whereClause . '
			ORDER BY template.title
		', $limitOptions['limit'], $limitOptions['offset']));
	}
	
	/**
	 * Prepares conditions for searching admin templates.
	 *
	 * @param array $conditions
	 * @param array $fetchOptions
	 *
	 * @return string SQL conditions
	 */
	public function prepareTemplateConditions(array $conditions, array &$fetchOptions)
	{
		$db = $this->_getDb();
		$sqlConditions = array();

		if (!empty($conditions['title']))
		{
			if (is_array($conditions['title']))
			{
				$sqlConditions[] = 'template.title LIKE ' . XenForo_Db::quoteLike($conditions['title'][0], $conditions['title'][1], $db);
			}
			else
			{
				$sqlConditions[] = 'template.title LIKE ' . XenForo_Db::quoteLike($conditions['title'], 'lr', $db);
			}
		}

		if (!empty($conditions['template']))
		{
			if (is_array($conditions['template']))
			{
				$sqlConditions[] = 'template.template LIKE ' . XenForo_Db::quoteLike($conditions['template'][0], $conditions['phrase_text'][1], $db);
			}
			else
			{
				$sqlConditions[] = 'template.template LIKE ' . XenForo_Db::quoteLike($conditions['template'], 'lr', $db);
			}
		}
		
		if (!empty($conditions['addon_id']))
		{
			$sqlConditions[] = 'addon.addon_id = ' . $db->quote($conditions['addon_id']);
		}

		return $this->getConditionsForClause($sqlConditions);
	}	
}