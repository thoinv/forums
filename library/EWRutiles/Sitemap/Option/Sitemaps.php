<?php

/**
 * Helper for choosing a forum.
 *
 * @package XenForo_Options
 */
abstract class EWRutiles_Sitemap_Option_Sitemaps
{
	/**
	 * Verifies and prepares the censor option to the correct format.
	 *
	 * @param array $words List of words to censor (from input). Keys: word, exact, replace
	 * @param XenForo_DataWriter $dw Calling DW
	 * @param string $fieldName Name of field/option
	 *
	 * @return true
	 */
	public static function verifyOption(array &$options, XenForo_DataWriter $dw, $fieldName)
	{
		if (!XenForo_Application::autoload('EWRmedio_ControllerPublic_Media'))
		{
			$options['media'] = 0;
		}

		if (!XenForo_Application::autoload('EWRcarta_ControllerPublic_Wiki'))
		{
			$options['wiki'] = 0;
		}

		return true;
	}
}