<?php

/**
 * Helper to get Twitter Lists from site's Twitter account.
 */
abstract class DigitalPointSocialBar_Option_TwitterLists
{
	public static function renderOption(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
	{
		$preparedOption['formatParams'] = array('' => '(' . new XenForo_Phrase('none') . ')') +
			XenForo_Model::create('DigitalPointSocialBar_Model_SocialBar')->getSlugsFromList();

		$return = XenForo_ViewAdmin_Helper_Option::renderOptionTemplateInternal(
			'option_list_option_select',
			$view, $fieldPrefix, $preparedOption, $canEdit
		);

		if (!XenForo_Application::getOptions()->dpTwitterAccessTokenSecret)
		{
			$return = str_replace('<select', '<select disabled=disabled', $return);
		}

		return $return;
	}
}