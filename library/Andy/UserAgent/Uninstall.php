<?php

class Andy_UserAgent_Uninstall
{
    public static function uninstall()
    {
        $db = XenForo_Application::get('db');
		
		try
		{		
			$db->query("
				DROP TABLE xf_user_agent
			");
		}
		catch (Zend_Db_Exception $e) {}	
    }
}