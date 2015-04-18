<?php

abstract class DigitalPointBetterAnalytics_Option_Profile
{
	/**
	 * Renders the profile list.
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

		if (DigitalPointBetterAnalytics_Helper_Reporting::checkAccessToken(false))
		{
			$profiles = DigitalPointBetterAnalytics_Helper_Reporting::getProfiles();
		}
		else
		{
			$profiles = array();
		}

		$preparedOption['formatParams'] = self::groupProfiles(@$profiles['items']);

		return XenForo_ViewAdmin_Helper_Option::renderOptionTemplateInternal(
			'option_list_option_select',
			$view, $fieldPrefix, $preparedOption, $canEdit
		);
	}


	public static function groupProfiles($profiles)
	{
		$profileOptions = array();

		if (!empty($profiles))
		{
			$internalWebPropertyId = null;
			$groupName = null;
			$group = array();

			foreach ($profiles as &$profile)
			{
				if ($profile['internalWebPropertyId'] != $internalWebPropertyId)
				{
					$profileOptions[$groupName] = $group;
					$group = array();
					$groupName = $profile['websiteUrl'];
				}
				$group[$profile['id']] = $profile['name'];

				$internalWebPropertyId = $profile['internalWebPropertyId'];
			}
			$profileOptions[$groupName] = $group;

		}
		return $profileOptions;

	}

}