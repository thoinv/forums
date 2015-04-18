<?php

class MODM_AJAXChat_Option_WeekDayChooser
{
	public static function renderSelect(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
	{
		return self::_render('option_list_option_checkbox', $view, $fieldPrefix, $preparedOption, $canEdit);
	}

	public static function getOpeningDaysOptions($selectedDays, $unspecifiedPhrase = false)
	{
		$openingDays = XenForo_Application::getOptions()->get('modm_ajaxchat_options_openingweekdays');
		
		if (!is_array($openingDays))
		{
			$openingDays = array();
		}
		
		$options = array();

		$options = array(
			array(
				'label' => new XenForo_Phrase("day_monday"),
				'value' => 1,
				'selected' => in_array(1, $selectedDays)
			),
			array(
				'label' => new XenForo_Phrase("day_tuesday"),
				'value' => 2,
				'selected' => in_array(2, $selectedDays)
			),
			array(
				'label' => new XenForo_Phrase("day_wednesday"),
				'value' => 3,
				'selected' => in_array(3, $selectedDays)
			),
			array(
				'label' => new XenForo_Phrase("day_thursday"),
				'value' => 4,
				'selected' => in_array(4, $selectedDays)
			),
			array(
				'label' => new XenForo_Phrase("day_friday"),
				'value' => 5,
				'selected' => in_array(5, $selectedDays)
			),
			array(
				'label' => new XenForo_Phrase("day_saturday"),
				'value' => 6,
				'selected' => in_array(6, $selectedDays)
			),
			array(
				'label' => new XenForo_Phrase("day_sunday"),
				'value' => 0,
				'selected' => in_array(0, $selectedDays)
			)
		);

		return $options;
	}

	protected static function _render($templateName, XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
	{
		$preparedOption['formatParams'] = self::getOpeningDaysOptions($preparedOption['option_value']);

		return XenForo_ViewAdmin_Helper_Option::renderOptionTemplateInternal(
		$templateName, $view, $fieldPrefix, $preparedOption, $canEdit
		);
	}
}