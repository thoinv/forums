<?php

class DigitalPointSocialBar_Install
{

	public static function installCode()
	{
		if (XenForo_Application::$versionId < 1030070)
		{
			throw new XenForo_Exception('Digital Point Social Bar requires XenForo 1.3.0 or newer.', true);
		}

		if (!XenForo_Application::getCache())
		{
			throw new XenForo_Exception('Digital Point Social Bar requires a valid caching mechanism defined within your XenForo config.php.', true);
		}

		$db = XenForo_Application::getDb();

		try
		{
			$db->query("
				ALTER TABLE xf_forum
					ADD dp_twitter_slug
						VARCHAR(25)
						CHARACTER SET utf8
						COLLATE utf8_general_ci
						NOT NULL
						DEFAULT ''
			");
		}
		catch (Zend_Db_Exception $e)
		{
			return false;
		}
	}

	public static function uninstallCode()
	{
		$db = XenForo_Application::getDb();
		$db->query("
			ALTER TABLE xf_forum 
			DROP dp_twitter_slug
		");
	}
}