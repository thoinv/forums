<?php
/**
 * @package     Nobita Social Groups Nulled by HQCoder
 * @author      Nobita
 * @nuller		Congngheaz
 * @link        http://www.congngheaz.com/forums/Xenforo-addon-nulled-free/
 * @copyright   (c) 2015 AZ Technologies, Inc. All rights reserved!
 */

/*====================================================================*\
 || ################################################################## ||
|| #               Copyright 2015 AZ Technologies, Inc.              # ||
|| #                      All Rights Reserved.                       # ||
||  ################################################################## ||
\*====================================================================*/
class Nobita_Teams_Installer
{
	protected static $_tables = array(
		'Field' => array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_team_field`(
				`field_id` varbinary(25) NOT NULL
				,`display_group` varchar(25) NOT NULL DEFAULT \'above_info\'
				,`display_order` int(10) unsigned NOT NULL DEFAULT \'1\'
				,`field_type` varchar(25) NOT NULL DEFAULT \'textbox\'
				,`field_choices` blob NOT NULL
				,`match_type` varchar(25) NOT NULL DEFAULT \'none\'
				,`match_regex` varchar(250) NOT NULL DEFAULT \'\'
				,`match_callback_class` varchar(75) NOT NULL
				,`match_callback_method` varchar(75) NOT NULL
				,`max_length` int(10) unsigned NOT NULL DEFAULT \'0\'
				,`required` tinyint(3) unsigned NOT NULL DEFAULT \'0\'
				,`display_template` text NOT NULL
				, PRIMARY KEY (`field_id`)
				, KEY `display_group_order` (`display_group`,`display_order`)
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_team_field`'
		),
		'FieldValue' => array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_team_field_value` (
				`team_id` int(10) unsigned NOT NULL
				,`field_id` varbinary(25) NOT NULL
				,`field_value` mediumtext NOT NULL
				, PRIMARY KEY (`team_id`,`field_id`)
				, KEY `field_id` (`field_id`)
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_team_field_value`'
		),
		'Category' => array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_team_category` (
				`team_category_id` int(10) unsigned NOT NULL AUTO_INCREMENT
				,`category_title` varchar(100) NOT NULL
				,`category_description` text NOT NULL
				,`parent_category_id` int(10) unsigned NOT NULL DEFAULT \'0\'
				,`depth` smallint(5) unsigned NOT NULL DEFAULT \'0\'
				,`lft` int(10) unsigned NOT NULL DEFAULT \'0\'
				,`rgt` int(10) unsigned NOT NULL DEFAULT \'0\'
				,`display_order` int(10) unsigned NOT NULL DEFAULT \'0\'
				,`team_count` int(10) unsigned NOT NULL DEFAULT \'0\'
				,`category_breadcrumb` blob NOT NULL
				,`always_moderate_create` tinyint(3) unsigned NOT NULL DEFAULT \'0\'
				,`field_cache` mediumblob NOT NULL
				,`featured_count` int(10) unsigned not null default \'0\'
				,`allow_team_create` tinyint(3) unsigned not null default \'1\'
				,`allowed_user_group_ids` blob not null
				,`allow_uploaded_file` TINYINT(3) UNSIGNED NOT NULL DEFAULT \'0\'
				, PRIMARY KEY (`team_category_id`)
				, KEY `parent_category_id_lft` (`parent_category_id`,`lft`)
				, KEY `lft_rgt` (`lft`,`rgt`)
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_team_category`'
		),
		'CategoryFieldValue' => array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_team_field_category` (
				`field_id` varbinary(25) NOT NULL
				,`team_category_id` int(11) NOT NULL
				, PRIMARY KEY (`field_id`,`team_category_id`)
				, KEY `team_category_id` (`team_category_id`)
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_team_field_category`'
		),
		'TeamInfo' => array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_team` (
				`team_id` int(10) unsigned not null AUTO_INCREMENT
				,`title` varchar(100) not null
				,`tag_line` varchar(100) not null
				,`custom_url` varchar(25) default NULL
				,`user_id` int(10) unsigned not null
				,`username` varchar(50) not null default \'\'
				,`team_state` enum(\'visible\', \'moderated\', \'deleted\') default \'visible\'
				,`team_date` int(10) unsigned not null default \'0\'
				,`team_category_id` int(10) unsigned not null
				,`team_avatar_date` int(10) unsigned not null default \'0\'
				,`message_count` int(10) unsigned not null default \'0\'
				,`member_count` int(10) unsigned not null default \'0\'
				,`warning_id` int(10) unsigned not null default \'0\'
				,`last_activity` int(10) unsigned not null default \'0\'
				, PRIMARY KEY (`team_id`)
				, KEY `user_category_id` (`user_id`, `team_category_id`)
				, KEY `team_avatar` (`team_date`, `team_avatar_date`)
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_team`'
		),
		'TeamProfile' => array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_team_profile` (
				`team_id` int(10) unsigned not null
				,`about` mediumtext not null
				,`custom_fields` mediumblob not null
				,`member_request_count` int(10) unsigned not null default \'0\'
				,`ribbon_display_class` varchar(25) not null default \'\'
				,`ribbon_text` varchar(25) not null default \'\'
				, PRIMARY KEY(`team_id`)
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_team_profile`'
		),
		'TeamPrivacy' => array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_team_privacy` (
				`team_id` int(10) unsigned not null
				,`allow_guest_posting` tinyint(3) unsigned not null default \'0\'
				,`allow_member_posting` tinyint(3) unsigned not null default \'1\'
				,`always_moderate_join` tinyint(3) unsigned not null default \'0\'
				,`always_moderate_posting` tinyint(3) unsigned not null default \'1\'
				,`privacy_state` ENUM(\'open\', \'closed\', \'secret\') NOT NULL DEFAULT \'open\'
				, PRIMARY KEY (`team_id`)
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_team_privacy`'
		),
		'TeamFetured' => array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_team_feature` (
				`team_id` int(10) unsigned not null default \'0\'
				,`feature_date` int(10) unsigned not null default \'0\'
				, PRIMARY KEY (`team_id`)
				, KEY `featured_date` (`feature_date`)
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_team_feature`'
		),
		'TeamPost' => array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_team_post` (
				`post_id` int(10) unsigned not null AUTO_INCREMENT
				,`team_id` int(10) unsigned not null
				,`user_id` int(10) unsigned not null
				,`username` varchar(50) not null default \'\'
				,`message_state` enum(\'visible\', \'moderated\', \'deleted\') default \'visible\'
				,`post_date` int(10) unsigned not null default \'0\'
				,`message` mediumtext not null
				,`likes` int(10) unsigned not null default \'0\'
				,`like_users` mediumblob not null
				,`comment_count` int(10) unsigned not null default \'0\'
				,`warning_id` int(10) unsigned not null default \'0\'
				,`first_comment_date` int(10) unsigned not null default \'0\'
				,`last_comment_date` int(10) unsigned not null default \'0\'
				,`latest_comment_ids` varbinary(100) not null default \'\'
				,`sticky` tinyint(3) unsigned not null default \'0\'
				,`system_posting` TINYINT(1) UNSIGNED NOT NULL DEFAULT \'0\'
				,`attach_count` smallint(5) unsigned not null default \'0\'
				, PRIMARY KEY (`post_id`)
				, KEY `team_user` (`team_id`, `user_id`)
				, KEY `post_date` (`post_date`)
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_team_post`'
		),
		'TeamPostComment' => array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_team_post_comment` (
				`comment_id` int(10) unsigned AUTO_INCREMENT
				,`post_id` int(10) unsigned not null
				,`team_id` int(10) unsigned not null
				,`user_id` int(10) unsigned not null
				,`username` varchar(50) not null default \'\'
				,`comment_date` int(10) unsigned not null
				,`message` mediumtext not null
				, PRIMARY KEY (`comment_id`)
				, KEY `post_user` (`post_id`, `user_id`)
				, KEY `comment_date` (`comment_date`)
			)ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_team_post_comment`'
		),

		'TeamMember' => array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_team_member` (
				`team_id` int(10) unsigned not null
				,`user_id` int(10) unsigned not null
				,`username` varchar(50) not null default \'\'
				,`member_state` enum(\'request\', \'accept\', \'reject\') not null default \'accept\'
				,`position` enum(\'member\', \'admin\') not null default \'member\'
				,`join_date` int(10) unsigned not null
				,`alert` tinyint(3) unsigned not null default \'1\'
				,`action` varchar(25) not null default \'\'
				,`action_user_id` int(10) unsigned not null default \'0\'
				,`action_username` varchar(50) not null default \'\'
				, PRIMARY KEY (`team_id`,`user_id`)
				, KEY `action_user_id` (`action_user_id`)
				, KEY `join_date` (`join_date`)
			)ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_team_member`'
		),
	
		'categoryWatch' => array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_team_category_watch` (
				`user_id` int(10) unsigned not null
				,`team_category_id` int(10) unsigned not null
				,`notify_on` enum(\'\', \'team\') not null
				,`send_alert` tinyint(3) unsigned not null
				,`send_email` tinyint(3) unsigned not null
				,`include_children` tinyint(3) unsigned not null
				,PRIMARY KEY (`user_id`, `team_category_id`)
				,KEY `team_category_id` (`team_category_id`)
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_team_category_watch`'
		),
		
		'watchPost' => array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_team_post_watch` (
				`post_id` int(10) unsigned not null
				,`user_id` int(10) unsigned not null
				,PRIMARY KEY (`post_id`, `user_id`)
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_team_post_watch`'
		),

		/* BUILDING EVENTS FOR TEAM! */
		'Event' => array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_team_event` (
				`event_id` int(10) unsigned auto_increment
				,`event_title` varchar(100) not null
				,`team_id` int(10) unsigned not null
				,`user_id` int(10) unsigned not null
				,`username` varchar(50) not null
				,`event_type` varbinary(25) not null default \'public\'
				,`event_description` mediumtext not null
				,`publish_date` int(10) unsigned not null

				,`begin_date` int(10) unsigned not null
				,`end_date` int(10) unsigned not null

				,`allow_member_comment` tinyint(1) unsigned not null default \'0\'
				,PRIMARY KEY (`event_id`)
				,KEY `team_user` (`team_id`, `user_id`)
				,KEY `date` (`publish_date`)
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_team_event`'
		),
		/* END EVENTS DATA */

		/* TEST ONLY! */
		'groupTitle' => array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_team_member_group` (
				`member_group_id` varbinary(25) not null,
				`group_title` varchar(25) not null,
				`permissions` blob not null,
				`display_order` int(10) unsigned not null,
				`notice` tinyint(1) unsigned not null default \'0\',
				PRIMARY KEY (`member_group_id`)
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_team_member_group`'
		),

		'banningUser' => array(
			'createQuery' => 'CREATE TABLE IF NOT EXISTS `xf_team_ban` (
				`team_id` int unsigned not null,
				`user_id` int unsigned not null,
				`ban_user_id` int unsigned not null,
				`ban_date` int unsigned not null default \'0\',
				`end_date` int unsigned not null default \'0\',
				`user_reason` varchar(255) not null,
				PRIMARY KEY (`team_id`, `user_id`),
				KEY `ban_user_id` (`ban_user_id`),
				INDEX end_date (end_date)
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;',
			'dropQuery' => 'DROP TABLE IF EXISTS `xf_team_ban`'
		)
	);

	protected static $_patches = array(
		array(
			'table' => 'xf_user',
			'field' => 'team_count',
			'showTablesQuery' => 'SHOW TABLES LIKE \'xf_user\'',
			'showColumnsQuery' => 'SHOW COLUMNS FROM `xf_user` LIKE \'team_count\'',
			'alterTableAddColumnQuery' => 'ALTER TABLE `xf_user` ADD COLUMN `team_count` INT(10) UNSIGNED NOT NULL DEFAULT \'0\',
				ADD INDEX `team_count` (`team_count`)',
			'alterTableDropColumnQuery' => 'ALTER TABLE `xf_user` DROP COLUMN `team_count`'
		),
		array(
			'table' => 'xf_user',
			'field' => 'team_ribbon_id',
			'showTablesQuery' => 'SHOW TABLES LIKE \'xf_user\'',
			'showColumnsQuery' => 'SHOW COLUMNS FROM `xf_user` LIKE \'team_ribbon_id\'',
			'alterTableAddColumnQuery' => 'ALTER TABLE `xf_user` ADD COLUMN `team_ribbon_id` INT(10) UNSIGNED NOT NULL DEFAULT \'0\',
				ADD INDEX `team_ribbon_id` (`team_ribbon_id`)',
			'alterTableDropColumnQuery' => 'ALTER TABLE `xf_user` DROP COLUMN `team_ribbon_id`'
		),
		array(
			'table' => 'xf_user',
			'field' => 'team_cache',
			'showTablesQuery' => 'SHOW TABLES LIKE \'xf_user\'',
			'showColumnsQuery' => 'SHOW COLUMNS FROM `xf_user` LIKE \'team_cache\'',
			'alterTableAddColumnQuery' => 'ALTER TABLE `xf_user` ADD COLUMN `team_cache` MEDIUMBLOB DEFAULT NULL',
			'alterTableDropColumnQuery' => 'ALTER TABLE `xf_user` DROP COLUMN `team_cache`'
		),
		
		array(
			'table' => 'xf_thread',
			'field' => 'team_id',
			'showTablesQuery' => 'SHOW TABLES LIKE \'xf_thread\'',
			'showColumnsQuery' => 'SHOW COLUMNS FROM `xf_thread` LIKE \'team_id\'',
			'alterTableAddColumnQuery' => 'ALTER TABLE `xf_thread` ADD COLUMN `team_id` INT(10) UNSIGNED DEFAULT NULL',
			'alterTableDropColumnQuery' => 'ALTER TABLE `xf_thread` DROP COLUMN `team_id`'
		)
	);

	public static function install($previous, $current) {
		$db = XenForo_Application::get('db');

		foreach (self::$_tables as $table) {
			$db->query($table['createQuery']);
		}

		foreach (self::$_patches as $patch) {
			$tableExisted = $db->fetchOne($patch['showTablesQuery']);
			if (empty($tableExisted)) {
				continue;
			}
			
			$existed = $db->fetchOne($patch['showColumnsQuery']);
			if (empty($existed)) {
				$db->query($patch['alterTableAddColumnQuery']);
			}
		}

		self::installCustomized();
		self::applyPermissionDefaults($previous);
		
		/* change the type of column! */
		self::changeColumnsType($previous, $current);
		self::removeDatasFromOldVersion($previous, $current);
		
		/* Rebuild cache */
		XenForo_Model::create('Nobita_Teams_Model_MemberGroup')->saveGroupPermDataCache();

		Nobita_Teams_sonnb_XenGallery_Installer::install(null, $previous, $current);
		Nobita_Teams_XenGallery_Installer::install($db);
	}


	public static function changeColumnsType($previous, $current)
	{
		$db = XenForo_Application::get('db');

		$changes = array();
		$oldVersionId = $previous['version_id'];

		if ($oldVersionId < 99)
		{
			$changes['privacy_state'] = array(
				'table' => 'xf_team_privacy',
				'changeSql' => 'varbinary(25) not null'
			);

			$changes['discussion_type'] = array(
				'table' => 'xf_team_post',
				'changeSql' => 'varbinary(25) not null'
			);

			$changes['member_state'] = array(
				'table' => 'xf_team_member',
				'changeSql' => 'varbinary(25) not null'
			);

			$changes['position'] = array(
				'table' => 'xf_team_member',
				'changeSql' => 'varbinary(25) not null'
			);

			$changes['action'] = array(
				'table' => 'xf_team_member',
				'changeSql' => 'varbinary(25) not null'
			);
		}
		elseif ($oldVersionId > 100 && $oldVersionId < 106)
		{
			$changes['custom_url'] = array(
				'table' => 'xf_team',
				'changeSql' => 'varchar(25) default NULL'
			);
		}

		if ($changes)
		{
			foreach($changes as $field => $value)
			{
				$newField = isset($value['new']) ? $value['new'] : $field;

				try
				{
					$db->query(sprintf("ALTER TABLE %s CHANGE %s %s %s", $value['table'], $field, $newField, $value['changeSql']));
				}
				catch(Zend_Db_Exception $e) {}
			}
		}

		if ($previous['version_id'] < 101)
		{
			try
			{
				$db->query('
					UPDATE `xf_team_post_comment`
					SET `comment_type` = \'post\'
					WHERE `comment_type` = \'\'
				');
			}
			catch (Zend_Db_Exception $e) {}
		}

		//if ($current['version_id'] == 106) // only effect to verionID 106
		if ($previous['version_id'] <= 106)
		{
			/* DEFAULT DATA*/
			try
			{
				$basicPerms = array(
					'canAssign' => 1,
					'canRemove' => 1,
					'canPromote' => 0,
					'canManageContent' => 1,
					'canApproveOrUnapproved' => 1,
					'canSticky' => 1,
					'manageAvatar' => 1,
					'manageCover' => 0
				);

				$db->insert('xf_team_member_group',array(
					'member_group_id' => 'admin',
					'group_title' => 'Admin',
					'permissions' => serialize($basicPerms),
					'display_order' => 1,
					'notice' => 1
				));

				$db->insert('xf_team_member_group', array(
					'member_group_id' => 'member',
					'group_title' => 'Member',
					'permissions' => 'a:0:{}',
					'display_order' => 10,
					'notice' => 0
				));
			}
			catch (Zend_Db_Exception $e) {}
			/* END DEFAULT DATA */
		}
		
		if ($previous['version_id'] < 138)
		{
			// reset all avatar
			try {
				$db->query("
				UPDATE xf_team
				SET avatar_date = 0, cover_date = 0
				WHERE 1 = 1
			");
			} catch (Zend_Db_Exception $e) {}
		}

		// version 2.1.2
		if ($previous['version_id'] < 150)
		{
			// change from avatar_date -> team_avatar_date
			try
			{
				$db->query("
					UPDATE xf_team_post
					SET discussion_type = 'staff'
					WHERE discussion_type = 'moderator'
				");
			}
			catch(Zend_Db_Exception $e) {}
		}
	}

	/**
	 * Delete all datas from old version which don't
	 * necessary to using.
	 *
	 */
	public static function removeDatasFromOldVersion($old, $new)
	{
		$db = XenForo_Application::get('db');
		$oldVersionId = $old['version_id'];

		$fields = array();

		if ($oldVersionId < 108)
		{
			$fields = array_merge($fields, array(
				'cover_width' => 'xf_team',
				'cover_height' => 'xf_team',
				'cover_crop_x' => 'xf_team_profile',
				'cover_crop_y' => 'xf_team_profile'
			));
		}
		elseif ($oldVersionId > 109 && $oldVersionId < 126)
		{
			$db->delete('xf_data_registry', 'data_key = ' . $db->quote('Teams_group_perms'));

			$fields = array_merge($fields, array(
				'ban_users' => 'xf_team',
				'avatar_width' => 'xf_team',
				'avatar_height' => 'xf_team',
				'avatar_crop_x' => 'xf_team_profile',
				'avatar_crop_y' => 'xf_team_profile'
			));
		}
		elseif ($oldVersionId > 127 && $oldVersionId < 144)
		{
			$fields = array_merge($fields, array(
				'content_team_id' => 'xf_attachment'
			));
		}
		elseif ($oldVersionId > 145 && $oldVersionId < 175)
		{
			$fields = array_merge($fields, array(
				'discussion_prefix_id' => 'xf_team_category'
			));
		}

		if ($fields)
		{
			foreach($fields as $fieldName => $tableName)
			{
				try
				{
					$db->query('ALTER TABLE `' . $tableName . '` DROP COLUMN `' . $fieldName . '`');
				}
				catch(Zend_Db_Exception $e) {}
			}
		}
	}

	public static function applyPermissionDefaults($previous)
	{
		if ($previous['version_id'] < 50)
		{
			self::applyGlobalPermission('Teams', 'view', 'general', 'viewNode', false);
			self::applyGlobalPermission('Teams', 'add', 'forum', 'postThread', false);
			self::applyGlobalPermission('Teams', 'updateSelf', 'forum', 'editOwnPost', false);
			self::applyGlobalPermission('Teams', 'deleteSelf', 'forum', 'deleteOwnPost', false);
			self::applyGlobalPermission('Teams', 'deletePostSelf', 'forum', 'deleteOwnPost', false);
			
			self::applyGlobalPermission('Teams', 'avatar', 'avatar', 'allowed', false);
			//self::applyGlobalPermission('Teams', 'maxFileSize', 'avatar', 'maxFileSize', false);

			self::applyGlobalPermission('Teams', 'editAny', 'forum', 'editAnyPost', true);
			self::applyGlobalPermission('Teams', 'deleteAny', 'forum', 'deleteAnyPost', true);
			self::applyGlobalPermission('Teams', 'viewModerated', 'forum', 'viewModerated', true);
			self::applyGlobalPermission('Teams', 'viewDeleted', 'forum', 'viewDeleted', true);
			self::applyGlobalPermission('Teams', 'hardDeleteAny', 'forum', 'hardDeleteAnyPost', true);
			self::applyGlobalPermission('Teams', 'warn', 'forum', 'warn', true);
			self::applyGlobalPermission('Teams', 'undelete', 'forum', 'undelete', true);
			self::applyGlobalPermission('Teams', 'approveUnapprove', 'forum', 'approveUnapprove', true);
			self::applyGlobalPermission('Teams', 'approveUnapprovePost', 'forum', 'approveUnapprove', true);
			self::applyGlobalPermission('Teams', 'viewModeratedPost', 'forum', 'viewModerated', true);
			self::applyGlobalPermission('Teams', 'editPostAny', 'forum', 'editAnyPost', true);
			self::applyGlobalPermission('Teams', 'deletePostAny', 'forum', 'deleteAnyPost', true);
			self::applyGlobalPermission('Teams', 'stickyPost', 'forum', 'stickUnstickThread', true);
			self::applyGlobalPermission('Teams', 'featureUnfeature', 'forum', 'stickUnstickThread', true);
		}
		
		if ($previous['version_id'] >  50 && $previous['version_id'] < 55)
		{
			self::applyGlobalPermission('Teams', 'viewAttachment', 'forum', 'viewAttachment', false);
			self::applyGlobalPermission('Teams', 'uploadAttachment', 'forum', 'uploadAttachment', false);
			
			self::applyGlobalPermission('Teams', 'reassignAny', 'forum', 'editAnyPost', true);
		}
		
		if ($previous['version_id'] > 80 && $previous['version_id'] < 99)
		{
			// 1.1.3 permission for event.
			self::applyGlobalPermission('Teams', 'editEventAny', 'forum', 'editAnyPost', true);
			self::applyGlobalPermission('Teams', 'deleteEventAny', 'forum', 'deleteAnyPost', true);
		}
	}

	protected static $_globalModPermCache = null;

	protected static function _getGlobalModPermissions()
	{
		if (self::$_globalModPermCache === null)
		{
			$moderators = XenForo_Application::getDb()->fetchPairs('
				SELECT user_id, moderator_permissions
				FROM xf_moderator
			');
			foreach ($moderators AS &$permissions)
			{
				$permissions = unserialize($permissions);
			}

			self::$_globalModPermCache = $moderators;
		}

		return self::$_globalModPermCache;
	}
	
	protected static function _updateGlobalModPermissions($userId, array $permissions)
	{
		self::$_globalModPermCache[$userId] = $permissions;

		XenForo_Application::getDb()->query('
			UPDATE xf_moderator
			SET moderator_permissions = ?
			WHERE user_id = ?
		', array(serialize($permissions), $userId));
	}

	public static function applyGlobalPermission($applyGroupId, $applyPermissionId, $dependGroupId = null, $dependPermissionId = null, $checkModerator = true)
	{
		$db = XenForo_Application::getDb();

		XenForo_Db::beginTransaction($db);

		if ($dependGroupId && $dependPermissionId)
		{
			$db->query("
				INSERT IGNORE INTO xf_permission_entry
					(user_group_id, user_id, permission_group_id, permission_id, permission_value, permission_value_int)
				SELECT user_group_id, user_id, ?, ?, 'allow', 0
				FROM xf_permission_entry
				WHERE permission_group_id = ?
					AND permission_id = ?
					AND permission_value = 'allow'
			", array($applyGroupId, $applyPermissionId, $dependGroupId, $dependPermissionId));
		}
		else
		{
			$db->query("
				INSERT IGNORE INTO xf_permission_entry
					(user_group_id, user_id, permission_group_id, permission_id, permission_value, permission_value_int)
				SELECT DISTINCT user_group_id, user_id, ?, ?, 'allow', 0
				FROM xf_permission_entry
			", array($applyGroupId, $applyPermissionId));
		}

		if ($checkModerator)
		{
			$moderators = self::_getGlobalModPermissions();
			foreach ($moderators AS $userId => $permissions)
			{
				if (!$dependGroupId || !$dependPermissionId || !empty($permissions[$dependGroupId][$dependPermissionId]))
				{
					$permissions[$applyGroupId][$applyPermissionId] = '1'; // string 1 is stored by the code
					self::_updateGlobalModPermissions($userId, $permissions);
				}
			}
		}

		XenForo_Db::commit($db);
	}

	public static function uninstall() {
		$db = XenForo_Application::get('db');
		
		foreach (self::$_patches as $patch) {
			$tableExisted = $db->fetchOne($patch['showTablesQuery']);
			if (empty($tableExisted)) {
				continue;
			}
			
			$existed = $db->fetchOne($patch['showColumnsQuery']);
			if (!empty($existed)) {
				$db->query($patch['alterTableDropColumnQuery']);
			}
		}
		
		foreach (self::$_tables as $table) {
			$db->query($table['dropQuery']);
		}
		
		self::uninstallCustomized();
	}
	
	private static function installCustomized() {
		$db = XenForo_Application::get('db');
		
		$db->query("
			INSERT IGNORE INTO xf_content_type 
				(content_type, addon_id) 
			VALUES
				('member', 					'nobita_Teams'),
				('team',					'nobita_Teams'),
				
				('team_post',				'nobita_Teams'),
				('team_comment',			'nobita_Teams'),
				('team_event',				'nobita_Teams')
		");
		$db->query("
			INSERT IGNORE INTO xf_content_type_field
				(content_type, field_name, field_value)
			VALUES
				('member', 			'alert_handler_class', 			'Nobita_Teams_AlertHandler_Member'),
				
				('team',			'report_handler_class',			'Nobita_Teams_ReportHandler_Team'),
				('team',			'warning_handler_class', 		'Nobita_Teams_WarningHandler_Team'),
				('team',			'moderator_log_handler_class',	'Nobita_Teams_ModeratorLogHandler_Team'),
				('team',			'moderation_queue_handler_class','Nobita_Teams_ModerationQueueHandler_Team'),
				('team',			'news_feed_handler_class',		'Nobita_Teams_NewsFeedHandler_Team'),
				('team',			'search_handler_class',			'Nobita_Teams_Search_DataHandler_Team'),
				('team',			'spam_handler_class',			'Nobita_Teams_SpamHandler_Team'),
				('team',			'alert_handler_class',			'Nobita_Teams_AlertHandler_Team'),
				('team',			'stats_handler_class',			'Nobita_Teams_StatsHandler_Team'),
				('team',			'sitemap_handler_class',		'Nobita_Teams_SitemapHandler_Team'),

				('team_post',		'report_handler_class',			'Nobita_Teams_ReportHandler_Post'),
				('team_post',		'alert_handler_class',			'Nobita_Teams_AlertHandler_Post'),
				('team_post',		'like_handler_class', 			'Nobita_Teams_LikeHandler_Post'),
				('team_post',		'news_feed_handler_class', 		'Nobita_Teams_NewsFeedHandler_Post'),
				('team_post',		'attachment_handler_class',		'Nobita_Teams_AttachmentHandler_Post'),
				
				('team_comment',	'alert_handler_class',			'Nobita_Teams_AlertHandler_Comment'),
				('team_comment',	'news_feed_handler_class',		'Nobita_Teams_NewsFeedHandler_Comment'),
				('team_comment',	'like_handler_class',			'Nobita_Teams_LikeHandler_Comment'),

				('team_event',		'attachment_handler_class',		'Nobita_Teams_AttachmentHandler_Event'),
				('team_event',		'alert_handler_class',			'Nobita_Teams_AlertHandler_Event'),
				('team_event',		'like_handler_class',			'Nobita_Teams_LikeHandler_Event'),
				('team_event',		'news_feed_handler_class',		'Nobita_Teams_NewsFeedHandler_Event')
		");

		// added in 1.0.7
		try
		{
			$db->query("ALTER TABLE xf_team_field ADD COLUMN parent_tab_id varchar(25) not null default ''");
		}
		catch(Zend_Db_Exception $e) {}

		// add 1.0.8
		try
		{
			$db->query("ALTER TABLE xf_team_category ADD COLUMN thread_node_id int(10) unsigned not null default 0");
		}
		catch(Zend_Db_Exception $e) {}
		try
		{
			$db->query("ALTER TABLE xf_team_category ADD COLUMN thread_prefix_id int(10) unsigned not null default 0");
		}
		catch(Zend_Db_Exception $e) {}
		
		try
		{
			$db->query("ALTER TABLE xf_team ADD COLUMN discussion_thread_id int(10) unsigned not null");
		}
		catch(Zend_Db_Exception $e) {}

		// added 1.0.9 BETA 1 modified on version 1.2
		try
		{
			$db->query("ALTER TABLE xf_team ADD COLUMN cover_date INT(10) unsigned not null");
		}
		catch (Zend_Db_Exception $e) {}
		try
		{
			$db->query("ALTER TABLE xf_team ADD COLUMN cover_crop_details blob not null");
		}
		catch (Zend_Db_Exception $e) {}
		/* END COVER DATA !*/
		
		
		try
		{
			$db->query('ALTER TABLE xf_team_post ADD COLUMN discussion_type varchar(25) not null default \'public\'');
		}
		catch(Zend_Db_Exception $e) {}

		/* begin 1.1.2*/
		try
		{
			$db->query('ALTER TABLE xf_team_category ADD COLUMN default_cover_path varchar(100) not null default \'\'');
		}
		catch (Zend_Db_Exception $e) {}
		try
		{
			$db->query('ALTER TABLE xf_team_category ADD COLUMN ribbon_styling BLOB DEFAULT NULL');
		}
		catch (Zend_Db_Exception $e) {}

		try
		{
			$db->query('ALTER TABLE xf_team_member ADD COLUMN req_message TEXT DEFAULT NULL');
		}
		catch (Zend_Db_Exception $e) {}

		try
		{
			$db->query('ALTER TABLE xf_team_privacy ADD COLUMN always_req_message TINYINT(3) UNSIGNED NOT NULL DEFAULT 1');
		}
		catch (Zend_Db_Exception $e) {}
		
		try
		{
			$db->query('ALTER TABLE xf_team_category ADD COLUMN icon_date INT(10) UNSIGNED NOT NULL DEFAULT 0');
		}
		catch (Zend_Db_Exception $e) {}
		/* end 1.1.2 */
		
		/* 1.1.3 News fields */
		try
		{
			$db->query('ALTER TABLE `xf_team_privacy` ADD COLUMN `allow_member_event` TINYINT(3) UNSIGNED NOT NULL DEFAULT \'0\'');
		}
		catch (Zend_Db_Exception $e) {}

		try
		{
			$db->query('ALTER TABLE `xf_team_post_comment` ADD COLUMN `comment_type` varbinary(25) not null');
		}
		catch (Zend_Db_Exception $e) {}
		/* END 1.1.3 */

		/* 1.2.0 RC2 */
		try
		{
			$db->query('ALTER TABLE `xf_team_privacy` ADD COLUMN `disable_tabs` varbinary(100) not null');
		}
		catch (Zend_Db_Exception $e) {}
		/* END 1.2.0 RC2*/

		/* 1.2.2 */
		try
		{
			$db->query('ALTER TABLE `xf_team_member_group` ADD COLUMN `is_staff` tinyint(1) unsigned not null default \'0\'');
		}
		catch (Zend_Db_Exception $e) {}
		/* */
		
		// upload attachment to event
		try
		{
			$db->query('ALTER TABLE `xf_team_event` ADD COLUMN `attach_count` smallint(5) unsigned not null default \'0\'');
		}
		catch (Zend_Db_Exception $e) {}
		
		/* alert options for member on team! */
		try
		{
			$db->query('ALTER TABLE `xf_team_member` ADD COLUMN `send_alert` tinyint(1) unsigned not null default \'1\'');
		}
		catch (Zend_Db_Exception $e) {}
		
		try
		{
			$db->query('ALTER TABLE `xf_team_member` ADD COLUMN `send_email` tinyint(1) unsigned not null default \'0\'');
		}
		catch (Zend_Db_Exception $e) {}
		/* end */

		/* 2.1.0 */
		try
		{
			$db->query("ALTER TABLE xf_team_category ADD COLUMN discussion_node_id int unsigned not null default 0");
		}
		catch(Zend_Db_Exception $e) {}
		try
		{
			$db->query("ALTER TABLE xf_team_category ADD COLUMN discussion_prefix_id int unsigned not null default 0");
		}
		catch(Zend_Db_Exception $e) {}
		/* END 2.1.0 extra fields. */

		/* 2.1.1 fields */
		try
		{
			$db->query("ALTER TABLE xf_team_category ADD COLUMN default_privacy varbinary(25) not null default 'open'");
		}
		catch (Zend_Db_Exception $e) {}

		// in case. prevent duplicate column!
		$disableColumn = $db->fetchOne('SHOW COLUMNS FROM `xf_team_category` LIKE \'disable_tabs\'');
		if ($disableColumn)
		{
			// good
			try
			{
				$db->query('ALTER TABLE `xf_team_category` CHANGE `disable_tabs` `disable_tabs_default` varbinary(100) not null default \'\'');
			}
			catch(Zend_Db_Exception $e) {}
		}
		else
		{
			try
			{
				$db->query("ALTER TABLE xf_team_category ADD COLUMN disable_tabs_default varbinary(100) not null default ''");
			}
			catch (Zend_Db_Exception $e) {}
		}

		try
		{
			$db->query("ALTER TABLE xf_team_post_comment ADD COLUMN likes int unsigned not null default 0");
		}
		catch(Zend_Db_Exception $e) {}
		try
		{
			$db->query("ALTER TABLE xf_team_post_comment ADD COLUMN like_users mediumblob not null");
		}
		catch(Zend_Db_Exception $e) {}
		/* END 2.1.1 */

		/* 2.1.2 */
		$avatarDate = $db->fetchOne('SHOW COLUMNS FROM `xf_team` LIKE \'avatar_date\'');
		if (!empty($avatarDate))
		{
			$db->query('ALTER TABLE `xf_team` CHANGE `avatar_date` `team_avatar_date` int unsigned not null default \'0\'');
		}

		/* 2.1.4 versionID 167 */
		try
		{
			$db->query("ALTER TABLE xf_team_event ADD COLUMN likes int unsigned not null default 0");
		}
		catch(Zend_Db_Exception $e) {}
		try
		{
			$db->query("ALTER TABLE xf_team_event ADD COLUMN like_users blob not null");
		}
		catch(Zend_Db_Exception $e) {}

		XenForo_Model::create('XenForo_Model_ContentType')->rebuildContentTypeCache();
	}

	private static function uninstallCustomized() {
		$db = XenForo_Application::get('db');

		$contentTypes = array('team', 'member', 'team_post', 'team_comment', 'team_event');
		$contentTypesQuoted = $db->quote($contentTypes);
		
		XenForo_Db::beginTransaction($db);
		
		$contentTypeTables = array(
			'xf_attachment',
			'xf_content_type',
			'xf_content_type_field',
			'xf_deletion_log',
			'xf_liked_content',
			'xf_moderation_queue',
			'xf_moderator_log',
			'xf_news_feed',
			'xf_report',
			'xf_user_alert'
		);

		foreach ($contentTypeTables as $table)
		{
			$db->delete($table, 'content_type IN (' . $contentTypesQuoted . ')');
		}

		// let these be cleaned up over time
		$db->update('xf_attachment', array('unassociated' => 1), 'content_type IN (' . $contentTypesQuoted . ')');

		// Xóa bản quyền sau 1 năm
		//$db->delete('xf_data_registry', 'data_key = ' . $db->quote('Teams_group_perms'));
		XenForo_Application::setSimpleCacheData('Teams_group_perms', false);

		XenForo_Db::commit($db);

		XenForo_Model::create('XenForo_Model_ContentType')->rebuildContentTypeCache();
		Nobita_Teams_sonnb_XenGallery_Installer::uninstall();
		Nobita_Teams_XenGallery_Installer::uninstall($db);
	}
}