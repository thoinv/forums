<?php

class DigitalPointAdPositioning_Install
{
	private static $_instance;
	
	protected $_db;
	
	public static final function getInstance()
	{
		if (!self::$_instance)
		{
			self::$_instance = new self;
		}
	
		return self::$_instance;
	}

	public static function install($existingAddOn, $newAddOn)
	{
		if (XenForo_Application::$versionId < 1020070)
		{
			throw new XenForo_Exception('This version of Digital Point Ad Positioning requires XenForo 1.2.0 or newer.', true);
		}
		
		
		$startVersion = 1;
		$endVersion = $newAddOn['version_id'];
		
		if ($existingAddOn)
		{
			$startVersion = $existingAddOn['version_id'] + 1;
		}
		
		$install = self::getInstance();
		
		$db = XenForo_Application::getDb();
		XenForo_Db::beginTransaction($db);
		
		for ($i = $startVersion; $i <= $endVersion; $i++)
		{
			$method = '_installVersion' . $i;
		
			if (method_exists($install, $method) === false)
			{
				continue;
			}

			$install->$method();
		}
		
		XenForo_Db::commit($db);
	}
	
	public static function uninstall()
	{
		// comment out this line to delete column (prevents losing flags if accidentally uninstalled and then reinstalled)
		return;
		
		XenForo_Application::getDb()->query("
			ALTER TABLE xf_thread
				DROP block_adsense
	       ");
		
	}
	
	protected function _installVersion4()
	{
		try
		{
			XenForo_Application::getDb()->query("
				ALTER TABLE xf_thread
					ADD block_adsense TINYINT UNSIGNED NOT NULL DEFAULT '0'
			");
		}
		catch (Zend_Db_Exception $e)
		{
		}

		// we can't insert a random string into an option because the options are installed after this install process
		XenForo_Application::defer('DigitalPointAdPositioning_Deferred_RandomGenerator', array(), 'dp_adpos_random', false, time() + 30);
		
	}

}