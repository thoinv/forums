<?php

class Nobita_Teams_XenGallery_Media
{
	/**
	 * @var integer|null
	 */
	protected static $groupId;

	public static function setGroupId($groupId)
	{
		self::$groupId = $groupId;
	}

	public static function getGroupId()
	{
		return self::$groupId;
	}

	public static function isVisibleCategory($categoryId)
	{
		$teamSetup = Nobita_Teams_Setup::getInstance();

		$storeCategoryId = $teamSetup->getOption('XenMediaCategoryId');
		$hide = $teamSetup->getOption('XenMediaHideStoreCat');

		if (!$hide)
		{
			return true;
		}

		return $storeCategoryId != $categoryId;
	}

}