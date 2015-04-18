<?php

abstract class MODM_AJAXChat_Option_NodeChooser
{
	/**
	 *
	 * Contrôleur d'option pour choisir un élément parmis la liste des nodes.
	 *
	 * @param XenForo_View $view
	 * @param unknown_type $fieldPrefix
	 * @param array $preparedOption
	 * @param unknown_type $canEdit
	 */
	public static function renderOption(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
	{
		$editLink = $view->createTemplateObject('option_list_option_editlink', array(
				'preparedOption' => $preparedOption,
				'canEditOptionDefinition' => $canEdit
		));

		/* @var $nodeModel XenForo_Model_Node */
		$nodeModel = XenForo_Model::create('XenForo_Model_Node');

		$nodeOptions = $nodeModel->getNodeOptionsArray($nodeModel->getAllNodes(), $preparedOption['option_value'], '(unspecified)');

		return $view->createTemplateObject('option_list_option_multi_MODM_AJAXChat', array(
				'fieldPrefix' => $fieldPrefix,
				'listedFieldName' => $fieldPrefix . '_listed[]',
				'preparedOption' => $preparedOption,
				'formatParams' => $nodeOptions,
				'editLink' => $editLink
		));
	}

	public static function renderMultiple(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
	{
		$editLink = $view->createTemplateObject('option_list_option_editlink', array(
				'preparedOption' => $preparedOption,
				'canEditOptionDefinition' => $canEdit
		));

		/* @var $nodeModel XenForo_Model_Node */
		$nodeModel = XenForo_Model::create('XenForo_Model_Node');

		$forumOptions = $nodeModel->getNodeOptionsArray($nodeModel->getAllNodes());

		return $view->createTemplateObject('option_list_option_multi_MODM_AJAXChat', array(
				'fieldPrefix' => $fieldPrefix,
				'listedFieldName' => $fieldPrefix . '_listed[]',
				'preparedOption' => $preparedOption,
				'formatParams' => $forumOptions,
				'editLink' => $editLink,
				'multiple' => true
		));
	}
}