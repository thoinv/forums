<?php

class bdSocialShare_Installer
{
	/* Start auto-generated lines of code. Change made will be overwriten... */

	protected static $_tables = array(
		'log' => array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_bdsocialshare_log` (
				`log_id` INT(10) UNSIGNED AUTO_INCREMENT
				,`user_id` INT(10) UNSIGNED NOT NULL
				,`log_date` INT(10) UNSIGNED NOT NULL
				,`shareable_class` VARCHAR(200) NOT NULL
				,`shareable_id` VARCHAR(25) NOT NULL
				,`target` VARCHAR(25) NOT NULL
				,`target_id` TEXT NOT NULL
				,`shared_id` TEXT NOT NULL
				, PRIMARY KEY (`log_id`)
				
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_bdsocialshare_log`',
		),
		'share_queue' => array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_bdsocialshare_share_queue` (
				`share_queue_id` INT(10) UNSIGNED AUTO_INCREMENT
				,`queue_data` MEDIUMBLOB NOT NULL
				,`queue_date` INT(10) UNSIGNED NOT NULL
				, PRIMARY KEY (`share_queue_id`)
				
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_bdsocialshare_share_queue`',
		),
	);
	protected static $_patches = array(
		array(
			'table' => 'xf_user_option',
			'field' => 'bdsocialshare_facebook',
			'showTablesQuery' => 'SHOW TABLES LIKE \'xf_user_option\'',
			'showColumnsQuery' => 'SHOW COLUMNS FROM `xf_user_option` LIKE \'bdsocialshare_facebook\'',
			'alterTableAddColumnQuery' => 'ALTER TABLE `xf_user_option` ADD COLUMN `bdsocialshare_facebook` MEDIUMBLOB',
			'alterTableDropColumnQuery' => 'ALTER TABLE `xf_user_option` DROP COLUMN `bdsocialshare_facebook`',
		),
		array(
			'table' => 'xf_user_option',
			'field' => 'bdsocialshare_recovery',
			'showTablesQuery' => 'SHOW TABLES LIKE \'xf_user_option\'',
			'showColumnsQuery' => 'SHOW COLUMNS FROM `xf_user_option` LIKE \'bdsocialshare_recovery\'',
			'alterTableAddColumnQuery' => 'ALTER TABLE `xf_user_option` ADD COLUMN `bdsocialshare_recovery` MEDIUMBLOB',
			'alterTableDropColumnQuery' => 'ALTER TABLE `xf_user_option` DROP COLUMN `bdsocialshare_recovery`',
		),
		array(
			'table' => 'xf_user_option',
			'field' => 'bdsocialshare_twitter',
			'showTablesQuery' => 'SHOW TABLES LIKE \'xf_user_option\'',
			'showColumnsQuery' => 'SHOW COLUMNS FROM `xf_user_option` LIKE \'bdsocialshare_twitter\'',
			'alterTableAddColumnQuery' => 'ALTER TABLE `xf_user_option` ADD COLUMN `bdsocialshare_twitter` MEDIUMBLOB',
			'alterTableDropColumnQuery' => 'ALTER TABLE `xf_user_option` DROP COLUMN `bdsocialshare_twitter`',
		),
		array(
			'table' => 'xf_user_option',
			'field' => 'bdsocialshare_options',
			'showTablesQuery' => 'SHOW TABLES LIKE \'xf_user_option\'',
			'showColumnsQuery' => 'SHOW COLUMNS FROM `xf_user_option` LIKE \'bdsocialshare_options\'',
			'alterTableAddColumnQuery' => 'ALTER TABLE `xf_user_option` ADD COLUMN `bdsocialshare_options` MEDIUMBLOB',
			'alterTableDropColumnQuery' => 'ALTER TABLE `xf_user_option` DROP COLUMN `bdsocialshare_options`',
		),
		array(
			'table' => 'xf_xi_blog_entry_draft',
			'field' => 'bdsocialshare_scheduled',
			'showTablesQuery' => 'SHOW TABLES LIKE \'xf_xi_blog_entry_draft\'',
			'showColumnsQuery' => 'SHOW COLUMNS FROM `xf_xi_blog_entry_draft` LIKE \'bdsocialshare_scheduled\'',
			'alterTableAddColumnQuery' => 'ALTER TABLE `xf_xi_blog_entry_draft` ADD COLUMN `bdsocialshare_scheduled` MEDIUMBLOB',
			'alterTableDropColumnQuery' => 'ALTER TABLE `xf_xi_blog_entry_draft` DROP COLUMN `bdsocialshare_scheduled`',
		),
		array(
			'table' => 'xf_forum',
			'field' => 'bdsocialshare_threadauto',
			'showTablesQuery' => 'SHOW TABLES LIKE \'xf_forum\'',
			'showColumnsQuery' => 'SHOW COLUMNS FROM `xf_forum` LIKE \'bdsocialshare_threadauto\'',
			'alterTableAddColumnQuery' => 'ALTER TABLE `xf_forum` ADD COLUMN `bdsocialshare_threadauto` MEDIUMBLOB',
			'alterTableDropColumnQuery' => 'ALTER TABLE `xf_forum` DROP COLUMN `bdsocialshare_threadauto`',
		),
	);

	public static function install($existingAddOn, $addOnData)
	{
		$db = XenForo_Application::get('db');

		foreach (self::$_tables as $table)
		{
			$db->query($table['createQuery']);
		}

		foreach (self::$_patches as $patch)
		{
			$tableExisted = $db->fetchOne($patch['showTablesQuery']);
			if (empty($tableExisted))
			{
				continue;
			}

			$existed = $db->fetchOne($patch['showColumnsQuery']);
			if (empty($existed))
			{
				$db->query($patch['alterTableAddColumnQuery']);
			}
		}

		self::installCustomized($existingAddOn, $addOnData);
	}

	public static function uninstall()
	{
		$db = XenForo_Application::get('db');

		foreach (self::$_patches as $patch)
		{
			$tableExisted = $db->fetchOne($patch['showTablesQuery']);
			if (empty($tableExisted))
			{
				continue;
			}

			$existed = $db->fetchOne($patch['showColumnsQuery']);
			if (!empty($existed))
			{
				$db->query($patch['alterTableDropColumnQuery']);
			}
		}

		foreach (self::$_tables as $table)
		{
			$db->query($table['dropQuery']);
		}

		self::uninstallCustomized();
	}

	/* End auto-generated lines of code. Feel free to make changes below */

	public static function installCustomized($existingAddOn, $addOnData)
	{
		$db = XenForo_Application::getDb();

		if (XenForo_Application::$versionId < 1020000)
		{
			throw new XenForo_Exception('[bd] Social Share requires XenForo 1.2.0+', true);
		}

		if (!function_exists('mcrypt_encrypt'))
		{
			throw new XenForo_Exception('[bd] Social Share requires PHP Mcrypt extension', true);
		}

		if (empty($existingAddOn))
		{
			$effectiveVersionId = 0;
		}
		else
		{
			$effectiveVersionId = $existingAddOn['version_id'];
		}

		if ($effectiveVersionId < 1)
		{
			$db->query("
				INSERT IGNORE INTO xf_permission_entry
					(user_group_id, user_id, permission_group_id, permission_id, permission_value, permission_value_int)
				SELECT user_group_id, user_id, 'general', 'bdSocialShare_facebook', permission_value, 0
				FROM xf_permission_entry
				WHERE permission_group_id = 'forum' AND permission_id = 'postThread'
			");
		}
		if ($effectiveVersionId < 14)
		{
			$db->query("
				INSERT IGNORE INTO xf_permission_entry
					(user_group_id, user_id, permission_group_id, permission_id, permission_value, permission_value_int)
				SELECT user_group_id, user_id, 'general', 'bdSocialShare_statusAuto', permission_value, 0
				FROM xf_permission_entry
				WHERE permission_group_id = 'profilePost' AND permission_id = 'post'
			");

			$db->query("
				INSERT IGNORE INTO xf_permission_entry
					(user_group_id, user_id, permission_group_id, permission_id, permission_value, permission_value_int)
				SELECT user_group_id, user_id, 'general', 'bdSocialShare_threadAuto', permission_value, 0
				FROM xf_permission_entry
				WHERE permission_group_id = 'forum' AND permission_id = 'postThread'
			");
		}
		if ($effectiveVersionId < 17)
		{
			$db->query("
				INSERT IGNORE INTO xf_permission_entry
					(user_group_id, user_id, permission_group_id, permission_id, permission_value, permission_value_int)
				SELECT user_group_id, user_id, 'general', 'bdSocialShare_twitter', permission_value, 0
				FROM xf_permission_entry
				WHERE permission_group_id = 'general' AND permission_id = 'bdSocialShare_facebook'
			");
		}
		if ($effectiveVersionId < 20)
		{
			$db->query("
				INSERT IGNORE INTO xf_permission_entry
					(user_group_id, user_id, permission_group_id, permission_id, permission_value, permission_value_int)
				SELECT user_group_id, user_id, 'general', 'bdSocialShare_resourceAut', permission_value, 0
				FROM xf_permission_entry
				WHERE permission_group_id = 'general' AND permission_id = 'bdSocialShare_threadAuto'
			");
		}
		if ($effectiveVersionId < 29)
		{
			$db->query("
				INSERT IGNORE INTO xf_permission_entry
					(user_group_id, user_id, permission_group_id, permission_id, permission_value, permission_value_int)
				SELECT user_group_id, user_id, 'general', 'bdSocialShare_staffShare', permission_value, 0
				FROM xf_permission_entry
				WHERE permission_group_id = 'general' AND permission_id = 'bypassFloodCheck'
			");
		}

		if ($effectiveVersionId > 0 AND $effectiveVersionId < 14)
		{
			$db->query("ALTER TABLE `xf_user_option` CHANGE COLUMN `bdsocialshare_facebook` bdsocialshare_facebook MEDIUMBLOB");

			$existed = $db->fetchOne("SHOW INDEX FROM `xf_bdsocialshare_log` WHERE KEY_NAME = 'shareable_class_shareable_id_target'");
			if (!empty($existed))
			{
				$db->query("ALTER TABLE `xf_bdsocialshare_log` DROP INDEX `shareable_class_shareable_id_target`");
			}
		}

		if ($effectiveVersionId > 0 AND $effectiveVersionId < 19)
		{
			// fix bug storing auto-share token for user (PRETTY SERIOUS!)
			$db->query("UPDATE `xf_user_option` SET bdsocialshare_facebook = '0' WHERE LENGTH(`bdsocialshare_facebook`) > 3");
		}

		$db->query("REPLACE INTO `xf_content_type` (content_type, addon_id, fields) VALUES ('bdsocialshare_all', 'bdSocialShare', '')");
		$db->query("REPLACE INTO `xf_content_type` (content_type, addon_id, fields) VALUES ('bdsocialshare_facebook', 'bdSocialShare', '')");
		$db->query("REPLACE INTO `xf_content_type` (content_type, addon_id, fields) VALUES ('bdsocialshare_twitter', 'bdSocialShare', '')");
		$db->query("REPLACE INTO `xf_content_type_field` (content_type, field_name, field_value) VALUES ('bdsocialshare_all', 'stats_handler_class', 'bdSocialShare_StatsHandler_All')");
		$db->query("REPLACE INTO `xf_content_type_field` (content_type, field_name, field_value) VALUES ('bdsocialshare_all', 'moderator_log_handler_class', 'bdSocialShare_ModeratorLogHandler_All')");
		$db->query("REPLACE INTO `xf_content_type_field` (content_type, field_name, field_value) VALUES ('bdsocialshare_facebook', 'stats_handler_class', 'bdSocialShare_StatsHandler_Facebook')");
		$db->query("REPLACE INTO `xf_content_type_field` (content_type, field_name, field_value) VALUES ('bdsocialshare_twitter', 'stats_handler_class', 'bdSocialShare_StatsHandler_Twitter')");
		XenForo_Model::create('XenForo_Model_ContentType')->rebuildContentTypeCache();
	}

	public static function uninstallCustomized()
	{
		$db = XenForo_Application::getDb();

		$db->query("DELETE FROM `xf_content_type` WHERE addon_id = 'bdSocialShare'");
		$db->query("DELETE FROM `xf_content_type_field` WHERE content_type = 'bdsocialshare_all'");
		$db->query("DELETE FROM `xf_content_type_field` WHERE content_type = 'bdsocialshare_facebook'");
		XenForo_Model::create('XenForo_Model_ContentType')->rebuildContentTypeCache();

		$db->query("DELETE FROM `xf_data_registry` WHERE data_key = 'bdSocialShare_tAs'");
		XenForo_Application::setSimpleCacheData(bdSocialShare_Model_Twitter::SIMPLE_CACHE_DATA_KEY_SHORT_URL_LENGTH_HTTPS, false);
	}

	public static function installForXIBlog()
	{
		$db = XenForo_Application::get('db');

		foreach (self::$_patches as $patch)
		{
			if (strpos($patch['table'], 'xf_xi_blog_') === false)
			{
				// not [XI] Blog tables, ignore for now
				continue;
			}

			$tableExisted = $db->fetchOne($patch['showTablesQuery']);
			if (empty($tableExisted))
			{
				continue;
			}

			$existed = $db->fetchOne($patch['showColumnsQuery']);
			if (empty($existed))
			{
				$db->query($patch['alterTableAddColumnQuery']);
			}
		}
	}

}
