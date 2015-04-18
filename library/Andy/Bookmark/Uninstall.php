<?php

class Andy_Bookmark_Uninstall
{
    public static function uninstall()
    {
        $db = XenForo_Application::get('db');
		
		try
		{		
			$db->query("
				DROP TABLE xf_bookmark
			");
		}
		catch (Zend_Db_Exception $e) {}	
    }
}