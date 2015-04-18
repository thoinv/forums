<?php

class MODM_AJAXChat_Model_Node extends XFCP_MODM_AJAXChat_Model_Node
{
	/**
	 * @deprecated
	 * 
	 * Used in previous versions of MODM_AJAXChat. Unused. Unmaintained.
	 * @param array $nodeTypeIds
	 * @param unknown_type $fetchOptions
	 */
	public function getNodesByNodeTypeId(array $nodeTypeIds, $fetchOptions = array())
	{
		if (empty($nodeTypeIds))
		{
			return array();	
		}
		
		$db = $this->_getDb();
		
		if (!isset($fetchOptions['permissionCombinationId']))
		{
			$fetchOptions = array_merge(array(
						'permissionCombinationId' => 0
			), $fetchOptions);
		}
	
		$permissionCombinationId = intval($fetchOptions['permissionCombinationId']);
	
		$data = $this->fetchAllKeyed('
				SELECT node.*
					' . ($permissionCombinationId ? ', permission.cache_value AS node_permission_cache' : '') . '
				FROM xf_node AS node
				' . ($permissionCombinationId ? '
					LEFT JOIN xf_permission_cache_content AS permission
						ON (permission.permission_combination_id = ' . $permissionCombinationId . '
							AND permission.content_type = \'node\'
							AND permission.content_id = node.node_id)
					' : '') . '
				WHERE node.node_type_id IN ('. $db->quote($nodeTypeIds) . ')
			', 'node_id');
	
		return $data;
	}
	
	/**
	 * 
	 * Somehow XenForo does not provide a core routine to get Nodes by Ids.
	 * 
	 * @param array $nodeIds
	 * @param array $fetchOptions
	 */
	public function getNodesByIds(array $nodeIds, array $fetchOptions = array())
	{
		if (!$nodeIds)
		{
			return array();
		}
		$inCondition = implode(',', $nodeIds);
	
	
		$fetchOptions = array_merge(
		array(
						'permissionCombinationId' => 0
		), $fetchOptions
		);
	
		$permissionCombinationId = intval($fetchOptions['permissionCombinationId']);
	
		$data = $this->fetchAllKeyed('
					SELECT node.*
						' . ($permissionCombinationId ? ', permission.cache_value AS node_permission_cache' : '') . '
					FROM xf_node AS node
					' . ($permissionCombinationId ? '
						LEFT JOIN xf_permission_cache_content AS permission
							ON (permission.permission_combination_id = ' . $permissionCombinationId . '
								AND permission.content_type = \'node\'
								AND permission.content_id = node.node_id)
						' : '') . '
					WHERE node.node_id IN ('. $inCondition . ')
				', 'node_id');
	
		return $data;
	}
}