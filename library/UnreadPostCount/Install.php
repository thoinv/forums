<?php

class UnreadPostCount_Install
{
	protected static $_db = null;

	public static function installer()
	{
		if (XenForo_Application::$versionId < 1020070)
		{
			throw new XenForo_Exception('This add-on requires XenForo 1.2.0 or higher.', true);
		}

		$db = self::_getDb();
		XenForo_Db::beginTransaction($db);

		$indexExists = self::_doesIndexExist();

		if (XenForo_Application::$versionId > 1030010)
		{
			/** We can do this because this index was added in the core in XF 1.3.0 */
			if ($indexExists)
			{
				self::_dropIndex();
			}
		}
		else
		{
			if (!$indexExists)
			{
				self::_addIndex();
			}
		}
		
		XenForo_Db::commit($db);
	}
	
	public static function uninstaller()
	{
		$db = self::_getDb();

		XenForo_Db::beginTransaction($db);

		if (self::_doesIndexExist())
		{
			self::_dropIndex();
		}
		
		XenForo_Db::commit($db);
	}

	protected static function _addIndex()
	{
		self::_getDb()->query('
			ALTER TABLE `xf_post`
			ADD INDEX `unread_post_count_post_date` (`post_date` ASC)
		');
	}

	protected static function _dropIndex()
	{
		self::_getDb()->query('
			ALTER TABLE `xf_post`
			DROP INDEX `unread_post_count_post_date`
		');
	}

	protected static function _doesIndexExist()
	{
		return self::_getDb()->fetchRow('
			SHOW INDEXES
			FROM xf_post
			WHERE key_name = \'unread_post_count_post_date\'
		');
	}

	/**
	 * @return Zend_Db_Adapter_Abstract
	 */
	protected static function _getDb()
	{
		if (!self::$_db)
		{
			self::$_db = XenForo_Application::getDb();
		}

		return self::$_db;
	}
}