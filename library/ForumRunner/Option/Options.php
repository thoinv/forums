<?php
/*
 * Forum Runner
 *
 * Copyright (c) 2010-2011 to End of Time Studios, LLC
 *
 * This file may not be redistributed in whole or significant part.
 *
 * http://www.forumrunner.com
 */

abstract class ForumRunner_Option_Options
{
    public static function renderForumOptionMultiple(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
    {
	$value = $preparedOption['option_value'];

	$edit_link = $view->createTemplateObject('option_list_option_editlink', array(
	    'preparedOption' => $preparedOption,
	    'canEditOptionDefinition' => $canEdit
	));

	$node_model = XenForo_Model::create('XenForo_Model_Node');
	$nodes = $node_model->getAllNodes();

	$options = array();

	$root = $node_model->getRootNode();

	$options[0] = array(
	    'value' => 0,
	    'label' => 'Exclude No Forums',
	    'selected' => in_array(0, $value),
	    'depth' => 0,
	);

	foreach ($nodes AS $node_id => $node) {
	    $node['depth'] += ($node_id ? 1 : 0);

	    $options[$node_id] = array(
		'value' => $node_id,
		'label' => $node['title'],
		'selected' => in_array($node_id, $value),
		'depth' => $node['depth'],
	    );
	}

	$preparedOption['option_multiple'] = "true";

	return $view->createTemplateObject('forumrunner_option_list_option_multiple', array(
	    'fieldPrefix' => $fieldPrefix,
	    'listedFieldName' => $fieldPrefix . '_listed[]',
	    'preparedOption' => $preparedOption,
	    'formatParams' => $options,
	    'editLink' => $edit_link
	));
    }

    public static function renderUserGroupsMultiple(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
    {
	$values = $preparedOption['option_value'];

	$edit_link = $view->createTemplateObject('option_list_option_editlink', array(
	    'preparedOption' => $preparedOption,
	    'canEditOptionDefinition' => $canEdit
	));

	$usergroup_model = XenForo_Model::create('XenForo_Model_UserGroup');
	$usergroups = $usergroup_model->getAllUserGroups();

	$options = array();

	$options[-1] = array(
	    'value' => -1,
	    'label' => 'No Usergroups',
	    'selected' => in_array(-1, $values),
	    'depth' => 0,
	);
	$options[0] = array(
	    'value' => 0,
	    'label' => 'All Usergroups',
	    'selected' => in_array(0, $values),
	    'depth' => 0,
	);

	foreach ($usergroups as $usergroup) {
	    $options[$usergroup['user_group_id']] = array(
		'value' => $usergroup['user_group_id'],
		'label' => $usergroup['title'],
		'selected' => in_array($usergroup['user_group_id'], $values),
		'depth' => 0,
	    );
	}

	$preparedOption['option_multiple'] = 'true';

	return $view->createTemplateObject('forumrunner_option_list_option_multiple', array(
	    'fieldPrefix' => $fieldPrefix,
	    'listedFieldName' => $fieldPrefix . '_listed[]',
	    'preparedOption' => $preparedOption,
	    'formatParams' => $options,
	    'editLink' => $edit_link
	));
    }
}

?>
