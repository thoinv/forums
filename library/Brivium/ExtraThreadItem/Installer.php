<?php
class Brivium_ExtraThreadItem_Installer extends Brivium_BriviumLibrary_Installer
{	
	public static function getTables()
	{
		$tables = array();
		$tables['xf_brivium_extra_thread_item'] = "
			CREATE TABLE IF NOT EXISTS `xf_brivium_extra_thread_item` (
			  `thread_id` varchar(255) NOT NULL,
			  `date_update` varchar(255) NOT NULL,
			  `extra_cache` longtext NOT NULL,
			  `user_id` varchar(255) NOT NULL
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;
			";
		return $tables;
	}
	public static function getAlters()
	{
		$alters = array();
		return $alters;
	}
	public static function getData()
	{
		$data = array();
		return $data;
	}
	
	public static function init()
	{
		self::$_tables = self::getTables();
		self::$_alters = self::getAlters();
		self::$_data = self::getData();
	}
	public static function install($existingAddOn, $addOnData)
	{
		self::init();
		self::_install($existingAddOn);
	}
	public static function uninstall()
	{
		self::init();
		self::_uninstall();
	}
}

?>