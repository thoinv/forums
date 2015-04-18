<?php

abstract class DigitalPointBetterAnalytics_Option_TrackBlocked
{
	/**
	 * Renders the radio buttons for the track users with blocking enabled.
	 *
	 * @param XenForo_View $view View object
	 * @param string $fieldPrefix Prefix for the HTML form field name
	 * @param array $preparedOption Prepared option info
	 * @param boolean $canEdit True if an "edit" link should appear
	 *
	 * @return XenForo_Template_Abstract Template object
	 */
	public static function renderOption(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
	{
		$preparedOption['extraChoices'] = array();

		$selectable = DigitalPointBetterAnalytics_Helper_Api::check();

		$preparedOption['formatParams'] = array(
			array('name' => 'options[dpAnalyticsTrackBlocked]', 'value' => 'never', 'label' => new XenForo_Phrase('never'), 'selected' => $preparedOption['option_value'] == 'never', 'unselectable' => false),
			array('name' => 'options[dpAnalyticsTrackBlocked]', 'value' => 'logged_in', 'label' => new XenForo_Phrase('only_users_logged_in'), 'selected' => $preparedOption['option_value'] == 'logged_in', 'unselectable' => !$selectable),
			array('name' => 'options[dpAnalyticsTrackBlocked]', 'value' => 'guests', 'label' => new XenForo_Phrase('guests'), 'selected' => $preparedOption['option_value'] == 'guests', 'unselectable' => !$selectable),
			array('name' => 'options[dpAnalyticsTrackBlocked]', 'value' => 'everyone', 'label' => new XenForo_Phrase('everyone'), 'selected' => $preparedOption['option_value'] == 'everyone', 'unselectable' => !$selectable),
		);

		$preparedOption['explain'] = (!$selectable ? '<style> .unselectable{opacity:0.5} </style>' . new XenForo_Phrase('some_options_not_available_for_unlicensed') . '<br /><br />' : '') . $preparedOption['explain'];

		return XenForo_ViewAdmin_Helper_Option::renderOptionTemplateInternal(
			'option_list_option_radio',
			$view, $fieldPrefix, $preparedOption, $canEdit
		);
	}
}