<?php

//######################## Star Rating Threads By Borbole ###########################
class Borbole_StarRating_Install
{
    //Add the custom stuff in the db
	public static function install()
	{
		//Get the db
	    $db = XenForo_Application::getDb();
		XenForo_Db::beginTransaction($db);
		
		//Add the custom tables in the db
		try
		{
		    $db->query("
			     CREATE TABLE IF NOT EXISTS `xf_thread_rating` (
			     `rating_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
			     `thread_id` INT(10) UNSIGNED DEFAULT NULL,
			     `user_id` INT(10) UNSIGNED DEFAULT NULL,
			     `rating` TINYINT(3) UNSIGNED DEFAULT NULL,
				 `message` VARCHAR(255),
			     `is_anonymous` TINYINT UNSIGNED NOT NULL DEFAULT 0,
			     `rating_date` INT(10) UNSIGNED DEFAULT NULL,
			     PRIMARY KEY (`rating_id`),
			     UNIQUE KEY `thread_user_id` (`thread_id`,`user_id`)
			    ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci
		    ");
		}
		
		catch (Zend_Db_Exception $e) {}
		
		//Add the `rating_count` field in the thread table
		try
		{
			$db->query("
				ALTER TABLE `xf_thread` ADD COLUMN `rating_count` INT(10) UNSIGNED NOT NULL DEFAULT '0'
			");
		}
		catch (Zend_Db_Exception $e) {}
		
		//Add the `rating_sum` field in the thread table
		try
		{
			$db->query("
				ALTER TABLE `xf_thread` ADD COLUMN `rating_sum` INT(10) UNSIGNED NOT NULL DEFAULT '0'
			");
		}
		catch (Zend_Db_Exception $e) {}
		
		//Add the `rating_avg` field in the thread table
		try
		{
			$db->query("
				ALTER TABLE `xf_thread` ADD COLUMN `rating_avg` FLOAT UNSIGNED NOT NULL DEFAULT '0'
			");
		}
		
		catch (Zend_Db_Exception $e) {}

		XenForo_Db::commit($db);
	}
	
	 //Drop the custom stuff from the db
	public static function uninstall()
	{
		//Get the db
	    $db = XenForo_Application::getDb();
		XenForo_Db::beginTransaction($db);

		//Drop the custom tables from the db
		try
		{
		   $db->query("
			    DROP TABLE IF EXISTS `xf_thread_rating`
		   ");
		}
		
		catch (Zend_Db_Exception $e) {}
		
		//Drop the `rating_count` field from the thread table
		try
		{
			$db->query("
				ALTER TABLE xf_thread
					DROP COLUMN `rating_count`
			");
		}
		
		catch (Zend_Db_Exception $e) {}
		
		//Drop the `rating_sum` field from the thread table
		try
		{
			$db->query("
				ALTER TABLE xf_thread
					DROP COLUMN `rating_sum`
			");
		}
		
		catch (Zend_Db_Exception $e) {}
		
		//Drop the `rating_avg` field from the thread table
		try
		{
			$db->query("
				ALTER TABLE xf_thread
					DROP COLUMN `rating_avg`
			");
		}
		
		catch (Zend_Db_Exception $e) {}

		XenForo_Db::commit($db);
	}
}