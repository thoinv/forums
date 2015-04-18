<?php
class TopUsers_Installer
{

	protected static $table = array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_top_users_cache` (
			`cache_date` INT NOT NULL,
			`month_id` INT NOT NULL,
			`user_id` INT NOT NULL,
			`messages_delta` INT NOT NULL,
			`likes_delta` INT NOT NULL,
			`score_delta` INT NOT NULL,
			PRIMARY KEY (`cache_date`,`month_id`,`user_id`)
	)
			ENGINE = InnoDB;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_top_users_cache`'
	);

	/**
	 * This is the function to create a table in the database 
	 *
	 */
	public static function install()
	{
		$db = XenForo_Application::get('db');
		$db->query(self::$table['createQuery']);
	}


	/**
	 * This is the function to DELETE the table of our addon in the database.
	 *
	 */
	public static function uninstall()
	{
		$db = XenForo_Application::get('db');
		$db->query(self::$table['dropQuery']);
	}
}
?>