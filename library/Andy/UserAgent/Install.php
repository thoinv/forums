<?php

class Andy_UserAgent_Install
{
    public static function install()
    {
        $db = XenForo_Application::get('db');		
		
		try
		{	
			$db->query("
				CREATE TABLE xf_user_agent (
				user_id INT(10) UNSIGNED NOT NULL,
				ip VARCHAR(39) NOT NULL,
				user_agent VARCHAR(250) NOT NULL,
				view_date INT(10) UNSIGNED NOT NULL
				) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci
			");
		}
		catch (Zend_Db_Exception $e) {}
		
		try
		{	
			$db->query(" 
				ALTER TABLE xf_user_agent ADD INDEX (user_id)
			");		
		}
		catch (Zend_Db_Exception $e) {}	
    }
}