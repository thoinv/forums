<?php

class XenPlaza_XPLoveMessage_Install
{
	public static function installCode()
	{
		$db = XenForo_Application::get('db');
		$db->query("
			CREATE TABLE IF NOT EXISTS xf_love_message (
				message_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
				from_user_id INT(10) UNSIGNED NOT NULL DEFAULT '0',
				from_username VARCHAR(50) NOT NULL DEFAULT '',
				to_user_id INT(10) UNSIGNED NOT NULL DEFAULT '0',
				to_username VARCHAR(50) NOT NULL DEFAULT '',
				message MEDIUMTEXT NOT NULL,
				active TINYINT(3) UNSIGNED NOT NULL DEFAULT '1',
				message_date INT(10) UNSIGNED NOT NULL DEFAULT '0',
				PRIMARY KEY (message_id),
				KEY date (message_date)
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci
		");
	}
	
	public static function uninstallCode()
	{
		$db = XenForo_Application::get('db');
		$db->query("
			DROP TABLE xf_love_message
		");
	}	
}