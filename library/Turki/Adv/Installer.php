<?php

class Turki_Adv_Installer
{

	public static function install($previous)
	{
		if (XenForo_Application::$versionId < 1020070) {
			// note: this can't be phrased
			throw new XenForo_Exception('This add-on requires XenForo 1.2.0 or higher.', TRUE);
		}

		$db      = XenForo_Application::getDb();
		$tables  = self::getTables();
		$install = self::DataInstall();
		$upgrade = self::DataUpgrade();

		if (!$previous) {
			foreach ($tables AS $tableSql) {
				try {
					$db->query($tableSql);
				} catch (Zend_Db_Exception $e) {
				}
			}
			foreach ($install AS $dataSql) {
				try {
					$db->query($dataSql);
				} catch (Zend_Db_Exception $e) {
				}
			}
		} else {

			// Upgrade Ads [Advanced]
			foreach ($upgrade AS $key => $dataSql) {
				if ($previous['version_id'] < $key) {
					try {
						$db->query($dataSql);
					} catch (Zend_Db_Exception $e) {
					}
				}
			}
		}

	}

	public static function uninstall()
	{
		$db        = XenForo_Application::get('db');
		$uninstall = self::DataUninstall();
		foreach (self::getTables() AS $tableName => $tableSql) {
			try {
				$db->query("DROP TABLE IF EXISTS `$tableName`");
			} catch (Zend_Db_Exception $e) {
			}
		}
		foreach ($uninstall AS $dataSql) {
			try {
				$db->query($dataSql);
			} catch (Zend_Db_Exception $e) {
			}
		}
		XenForo_Application::setSimpleCacheData('adv_xenforo', FALSE);
	}


	protected static function getTables()
	{
		$tables                        = array();
		$tables['xf_advxenforo_hooks'] = "
  			CREATE TABLE IF NOT EXISTS `xf_advxenforo_hooks` (
  			  `hook_id` int(11) NOT NULL AUTO_INCREMENT,
                `hook_title` varchar(150) NOT NULL,
                `hook_name` varchar(180) NOT NULL,
                `template` varchar(100) NOT NULL,
                `active` int(11) NOT NULL,
                PRIMARY KEY (`hook_id`)
  			) ENGINE=InnoDB  DEFAULT CHARSET=utf8
  		";

		$tables['xf_advxenforo'] = "
    		CREATE TABLE IF NOT EXISTS `xf_advxenforo` (
    		  `adv_id` int(11) NOT NULL AUTO_INCREMENT,
                `title` varchar(240) NOT NULL,
                `active` tinyint(1) NOT NULL,
                `adv_hook_name` varchar(100) NOT NULL,
                `adv_large` text NOT NULL,
                `adv_small` text NOT NULL,
                `display` varchar(20) NOT NULL,
                `user_criteria` MEDIUMBLOB NOT NULL,
                `page_criteria` MEDIUMBLOB NOT NULL,
                `post_criteria` MEDIUMBLOB NOT NULL,
                PRIMARY KEY (`adv_id`)
    		) ENGINE=InnoDB  DEFAULT CHARSET=utf8
    	";
		return $tables;
	}

	protected static function DataInstall()
	{
		$tables['install'] = "ALTER TABLE xf_user_option ADD enable_adv TINYINT UNSIGNED NOT NULL DEFAULT 1";
		return $tables;
	}

	protected static function DataUpgrade()
	{
		$tables[2020049] = "ALTER TABLE xf_advxenforo ADD user_criteria MEDIUMBLOB NOT NULL";
		$tables[2020050] = "ALTER TABLE xf_advxenforo ADD page_criteria MEDIUMBLOB NOT NULL";
		$tables[3030049] = "ALTER TABLE xf_advxenforo DROP expire_date";
		$tables[3030050] = "ALTER TABLE xf_user_option ADD enable_adv TINYINT UNSIGNED NOT NULL DEFAULT 1";
		$tables[5050050] = "ALTER TABLE xf_advxenforo ADD post_criteria MEDIUMBLOB NOT NULL";
		return $tables;
	}

	protected static function DataUninstall()
	{
		$tables[] = "ALTER TABLE xf_user_option DROP enable_adv";
		return $tables;
	}
}