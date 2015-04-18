<?php

class Dark_PostRating_Install
{

	private static $_instance;
	protected $_db;

	public static final function getInstance()
	{						
		if (!self::$_instance)
		{
			self::$_instance = new self();
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

	/**
	 * Begins the installation process and picks the proper install routine.
	 *
	 * See see XenForo_Model_Addon::installAddOnXml() for more details about
	 * the arguments passed to this method.
	 *
	 * @param array Information about the existing version (if upgrading)
	 * @param array Information about the current version being installed
	 *
	 * @return void
	 */
	public static function install($existingAddOn, $addOnData)
	{
		// the version IDs from which we should start/end the install process
		$startVersionId = 1;
		$endVersionId = $addOnData['version_id'];

		if ($existingAddOn)
		{
			// we are upgrading, run every install method since last upgrade
			$startVersionId = $existingAddOn['version_id'] + 1;
		}

		// create our install object
		$install = self::getInstance();

		for ($i = $startVersionId; $i <= $endVersionId; $i++)
		{
			$method = '_installVersion' . $i;
			if (method_exists($install, $method) === false)
			{
				continue;
			}

			$install->$method();
		}

	}

	protected function _installVersion1()
	{
		$db = $this->_getDb();

		$db->query( "
			CREATE TABLE if not exists `dark_postrating` (
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				`post_id` INT(10) UNSIGNED NOT NULL,
				`user_id` INT(10) UNSIGNED NOT NULL,
				`rated_user_id` INT(10) UNSIGNED NULL,
				`rating` INT(10) UNSIGNED NOT NULL,
				`date` INT(10) UNSIGNED NOT NULL,
				PRIMARY KEY (`id`),
				UNIQUE INDEX `post_id_user_id` (`post_id`, `user_id`),
				INDEX `post_id_rating` (`post_id`, `rating`),
				INDEX `user_id_rating` (`user_id`, `rating`),
				INDEX `rated_user_id_rating` (`rated_user_id`, `rating`),
				INDEX `date` (`date`)
			)
			COLLATE='utf8_general_ci'
			ENGINE=InnoDB
		");
		
		$db->query( "		
			CREATE TABLE if not exists `dark_postrating_count` (
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				`user_id` INT(10) UNSIGNED NOT NULL,
				`rating` INT(10) UNSIGNED NOT NULL,
				`count_received` INT(10) UNSIGNED NOT NULL DEFAULT '0',
				`count_given` INT(10) UNSIGNED NOT NULL DEFAULT '0',
				PRIMARY KEY (`id`),
				UNIQUE INDEX `user_id_rating` (`user_id`, `rating`)
			)
			COLLATE='utf8_general_ci'
			ENGINE=InnoDB;
		");
		
		
		$db->query("CREATE TABLE IF NOT EXISTS `dark_postrating_ratings` (
			`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
			`name` varchar(96) NOT NULL,
			`title` varchar(256) NOT NULL,
			`disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
			`whitelist` text NOT NULL,
			`type` tinyint(1) NOT NULL DEFAULT '0',
			`display_order` int(10) unsigned NOT NULL,
			`sprite_mode` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
			`sprite_params` TEXT NOT NULL,
		  PRIMARY KEY (`id`)
		)
		COLLATE='utf8_general_ci'
		ENGINE=InnoDB 
		");
		
		// Clean up after 1.0.1 fiasco
		try {
			$db->query( "
				ALTER TABLE `dark_postrating_ratings`  ADD COLUMN `sprite_mode` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER `display_order`,  ADD COLUMN `sprite_params` TEXT NOT NULL AFTER `sprite_mode`;
				");        
		}
		catch (Exception $e) {}    
		
		
		$numRatings = $db->fetchOne(
		"
			SELECT count(*)
			FROM dark_postrating_ratings
		");
		
		if($numRatings == 0){			
			$db->query("INSERT INTO `dark_postrating_ratings` (`id`, `name`, `title`, `disabled`, `whitelist`, `type`, `display_order`, `sprite_mode`, `sprite_params`) VALUES
				(1, 'spritesheet.png', 'Like', 0, 'a:0:{}', 1, 10, 1, 'a:4:{s:1:\"w\";i:16;s:1:\"h\";i:16;s:1:\"x\";i:0;s:1:\"y\";i:-32;}'),
				(2, 'spritesheet.png', 'Agree', 0, 'a:0:{}', 1, 20, 1, 'a:4:{s:1:\"w\";i:16;s:1:\"h\";i:16;s:1:\"x\";i:0;s:1:\"y\";i:-16;}'),
				(3, 'spritesheet.png', 'Disagree', 0, 'a:0:{}', 0, 30, 1, 'a:4:{s:1:\"w\";i:16;s:1:\"h\";i:16;s:1:\"x\";i:0;s:1:\"y\";i:-144;}'),
				(4, 'spritesheet.png', 'Funny', 0, 'a:0:{}', 1, 40, 1, 'a:4:{s:1:\"w\";i:16;s:1:\"h\";i:16;s:1:\"x\";i:0;s:1:\"y\";i:-128;}'),
				(5, 'spritesheet.png', 'Winner', 0, 'a:0:{}', 1, 50, 1, 'a:4:{s:1:\"w\";i:16;s:1:\"h\";i:16;s:1:\"x\";i:0;s:1:\"y\";i:-192;}'),
				(6, 'spritesheet.png', 'Informative', 0, 'a:0:{}', 1, 60, 1, 'a:4:{s:1:\"w\";i:16;s:1:\"h\";i:16;s:1:\"x\";i:0;s:1:\"y\";i:-96;}'),
				(7, 'spritesheet.png', 'Friendly', 0, 'a:0:{}', 1, 70, 1, 'a:4:{s:1:\"w\";i:16;s:1:\"h\";i:16;s:1:\"x\";i:0;s:1:\"y\";i:-112;}'),
				(8, 'spritesheet.png', 'Useful', 0, 'a:0:{}', 1, 80, 1, 'a:4:{s:1:\"w\";i:16;s:1:\"h\";i:16;s:1:\"x\";i:0;s:1:\"y\";i:0;}'),
				(9, 'spritesheet.png', 'Optimistic', 0, 'a:0:{}', 0, 90, 1, 'a:4:{s:1:\"w\";i:16;s:1:\"h\";i:16;s:1:\"x\";i:0;s:1:\"y\";i:-64;}'),
				(10, 'spritesheet.png', 'Creative', 0, 'a:0:{}', 1, 100, 1, 'a:4:{s:1:\"w\";i:16;s:1:\"h\";i:16;s:1:\"x\";i:0;s:1:\"y\";i:-80;}'),
				(11, 'spritesheet.png', 'Old', 0, 'a:0:{}', -1, 110, 1, 'a:4:{s:1:\"w\";i:16;s:1:\"h\";i:16;s:1:\"x\";i:0;s:1:\"y\";i:-160;}'),
				(12, 'spritesheet.png', 'Bad Spelling', 0, 'a:0:{}', -1, 120, 1, 'a:4:{s:1:\"w\";i:16;s:1:\"h\";i:16;s:1:\"x\";i:0;s:1:\"y\";i:-48;}'),
				(13, 'spritesheet.png', 'Dumb', 0, 'a:0:{}', -1, 130, 1, 'a:4:{s:1:\"w\";i:16;s:1:\"h\";i:16;s:1:\"x\";i:0;s:1:\"y\";i:-176;}'),
				(14, 'spritesheet.png', 'Dislike', 0, 'a:0:{}', 1, 15, 1, 'a:4:{s:1:\"w\";i:16;s:1:\"h\";i:16;s:1:\"x\";i:0;s:1:\"y\";i:-208;}');
			");
		}
		
		$db->query("INSERT IGNORE INTO `xf_content_type` (`content_type`, `addon_id`) VALUES ('postrating', 'PostRating')");
		$db->query("INSERT IGNORE INTO `xf_content_type_field` (`content_type`, `field_name`, `field_value`) VALUES ('postrating', 'alert_handler_class', 'Dark_PostRating_AlertHandler')");
		$db->query("INSERT IGNORE INTO `xf_content_type_field` (`content_type`, `field_name`, `field_value`) VALUES ('postrating', 'news_feed_handler_class', 'Dark_PostRating_NewsFeedHandler')");
		$db->query("INSERT IGNORE INTO `xf_content_type_field` (`content_type`, `field_name`, `field_value`) VALUES ('postrating', 'stats_handler_class', 'Dark_PostRating_StatsHandler')");
				
	}
	
	
	protected function _installVersion9()
	{
		$db = $this->_getDb();

		try {
			$db->query( "
				ALTER TABLE `dark_postrating_ratings`  ADD COLUMN `sprite_mode` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER `display_order`,  ADD COLUMN `sprite_params` TEXT NOT NULL AFTER `sprite_mode`;
				");		
		}
		catch (Exception $e) {}	
	}
	
	protected function _installVersion11()
	{
		$db = $this->_getDb();

		try {
			$db->query("
				ALTER TABLE `dark_postrating_ratings`
					ADD COLUMN `group_whitelist` TEXT NOT NULL AFTER `whitelist`,
					ADD COLUMN `op_only` TINYINT(1) UNSIGNED NOT NULL AFTER `group_whitelist`;
			");		
		}
		catch (Exception $e) {}	
	}
	
	protected function _installVersion17()
	{
		$db = $this->_getDb();

		// Make title field redundant..
		try {
			$db->query("
				ALTER TABLE `dark_postrating_ratings`
					ALTER `title` DROP DEFAULT;
			");		
		}
		catch (Exception $e) {}	
		
		try {
			$db->query("
				ALTER TABLE `dark_postrating_ratings`
					CHANGE COLUMN `title` `title` VARCHAR(256) NULL AFTER `name`;
			");		
		}
		catch (Exception $e) {}	
		
		
		
		// Convert all rating titles into phrases for new system
		$ratings = $db->fetchAll("SELECT * FROM dark_postrating_ratings");
		
		foreach($ratings as $rating){			
			/** @var Dark_PostRating_DataWriter */
			$dw = XenForo_DataWriter::create('Dark_PostRating_DataWriter');
			$dw->setExistingData($rating['id']);
			$dw->setExtraData(Dark_PostRating_DataWriter::DATA_TITLE, $rating['title']);
			$dw->save();			
		}
	}
			
	protected function _installVersion20()
	{			
		$db = $this->_getDb();
		
		// Global cache rating titles
		$db->query("update xf_phrase set global_cache=1 where title like 'dark_postrating_rating_%'");
		
		//$languageModel = XenForo_Model::create('XenForo_Model_Language');
		//$languageModel->rebuildLanguageCaches();
	}
	
	protected function _installVersion27()
	{			
		$db = $this->_getDb();
				
		/// @var XenForo_Model_Phrase
		$phraseModel = XenForo_Model::create('XenForo_Model_Phrase');
				
		/// @var XenForo_DataWriter_Phrase
		$dw = XenForo_DataWriter::create('XenForo_DataWriter_Phrase');
		$dw->setExistingData($phraseModel->getPhraseInLanguageByTitle("likes", 0), true);
		$dw->set('global_cache', 1);
		$dw->save();
		$dw = XenForo_DataWriter::create('XenForo_DataWriter_Phrase');
		$dw->setExistingData($phraseModel->getPhraseInLanguageByTitle("trophy_points", 0), true);
		$dw->set('global_cache', 1);
		$dw->save();
		$dw = XenForo_DataWriter::create('XenForo_DataWriter_Phrase');
		$dw->setExistingData($phraseModel->getPhraseInLanguageByTitle("points", 0), true);
		$dw->set('global_cache', 1);
		$dw->save();
		$dw = XenForo_DataWriter::create('XenForo_DataWriter_Phrase');
		$dw->setExistingData($phraseModel->getPhraseInLanguageByTitle("likes_received", 0), true);
		$dw->set('global_cache', 1);
		$dw->save();
	}
}
						