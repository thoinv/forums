<?php

class ThreadRating_Installer
{
	public static function install()
	{
		$db = XenForo_Application::get('db');
		
		$db->query("
			CREATE TABLE IF NOT EXISTS `tr_rating` (
			  `rating_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
			  `thread_id` int(10) unsigned DEFAULT NULL,
			  `user_id` int(10) unsigned DEFAULT NULL,
			  `rating` tinyint(3) unsigned DEFAULT NULL,
			  `date` int(10) unsigned DEFAULT NULL,
			  PRIMARY KEY (`rating_id`),
			  UNIQUE KEY `thread_user_id` (`thread_id`,`user_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Thread Rating addon'
		");
		
		$db->query("
			CREATE TABLE IF NOT EXISTS `tr_thread_rate` (
			  `thread_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
			  `count` int(10) unsigned DEFAULT NULL,
			  `sum` int(10) unsigned DEFAULT NULL,
			  `avg` float unsigned DEFAULT NULL,
			  PRIMARY KEY (`thread_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Thread Rating addon'
		");
	}
}