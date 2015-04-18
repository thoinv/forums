<?php

class UnreadPostCount_Option_ForumChooser
{
	/**
	* Forum chooser. Displays a list of nodes. Rendered in a multiple choice select element
	*/
	public static function renderOption(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
	{
		$nodes = XenForo_Model::create('XenForo_Model_Node')->getAllNodes();
		
		foreach ($nodes AS $key => $node)
		{
			if ($node['node_type_id'] == 'Category' || $node['node_type_id'] == 'Forum')
			{
				$preparedOption['options'][$node['node_id']] = array(
					'node_id' => $node['node_id'],
					'title' => $node['title'],
					'type' => $node['node_type_id'],
					'depth' => str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $node['depth']),
					'selected' => in_array($nodes[$key]['node_id'], $preparedOption['option_value'])
				);
			}
		}
		
		return XenForo_ViewAdmin_Helper_Option::renderOptionTemplateInternal(
			'unread_posts_forum_chooser', $view, $fieldPrefix, $preparedOption, $canEdit
		);		
	}
}