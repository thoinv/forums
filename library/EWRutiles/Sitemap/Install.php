<?php

class EWRutiles_Sitemap_Install
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

	protected function _getDb()
	{
		if ($this->_db === null)
		{
			$this->_db = XenForo_Application::get('db');
		}

		return $this->_db;
	}

	public static function installCode($existingAddOn, $addOnData)
	{
		$endVersion = $addOnData['version_id'];
		$strVersion = $existingAddOn ? ($existingAddOn['version_id'] + 1) : 1;

		$install = self::getInstance();

		for ($i = $strVersion; $i <= $endVersion; $i++)
		{
			$method = '_install_'.$i;

			if (method_exists($install, $method))
			{
				$install->$method();
			}
		}
	}
	
	protected function _install_1()
	{
		$targetLoc = XenForo_Helper_File::getExternalDataPath()."/sitemaps";
		
		if (!is_dir($targetLoc))
		{
			XenForo_Helper_File::createDirectory($targetLoc);
			XenForo_Helper_File::makeWritableByFtpUser($targetLoc);
		}
	}
	
	public static function uninstallCode()
	{
		$uninstall = self::getInstance();
		$uninstall->_uninstall_0();
	}

	protected function _uninstall_0()
	{
		$targetLoc = glob(XenForo_Helper_File::getExternalDataPath()."/sitemaps/*.xml*");
		foreach ($targetLoc AS $file) { unlink($file); }

		$targetLoc = XenForo_Helper_File::getExternalDataPath()."/sitemaps";
		if (is_dir($targetLoc)) { rmdir($targetLoc); }
	}
}