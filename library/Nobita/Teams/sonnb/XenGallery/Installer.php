<?php

class Nobita_Teams_sonnb_XenGallery_Installer
{
	public static function install($db = null, $oldAddOnData, $newAddOnData)
	{
		if (!$db)
		{
			$db = XenForo_Application::get('db');
		}

		if (!Nobita_Teams_Validation::assertAddOnValidAndUsable('sonnb_xengallery', false))
		{
			// addon didn't existed
			return;
		}

		try
		{
			$db->query("ALTER TABLE sonnb_xengallery_album ADD COLUMN team_id int unsigned not null default 0");
		}
		catch (Zend_Db_Exception $e) {}
	}

	public static function uninstall($db = null)
	{
		if (!$db)
		{
			$db = XenForo_Application::get('db');
		}

		if (!Nobita_Teams_Validation::assertAddOnValidAndUsable('sonnb_xengallery', false))
		{
			// addon didn't existed
			return;
		}

		try
		{
			$db->query("ALTER TABLE sonnb_xengallery_album DROP COLUMN team_id");
		}
		catch (Zend_Db_Exception $e) {}
	}
}