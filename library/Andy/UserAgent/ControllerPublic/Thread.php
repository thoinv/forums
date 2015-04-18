<?php

class Andy_UserAgent_ControllerPublic_Thread extends XFCP_Andy_UserAgent_ControllerPublic_Thread
{
	public function actionIndex()
	{
		// get parent		
		$parent = parent::actionIndex();
		
		// get $userId
		$userId = XenForo_Visitor::getUserId();	
		
		if ($userId > 0)
		{
			// get variables
			$ip = $_SERVER['REMOTE_ADDR'];
			$user_agent = $_SERVER['HTTP_USER_AGENT'];
			$view_date = time();	
			
			// make safe for query
			$user_agent = addslashes($user_agent);				
			
			// show n/a if over 250 characters
			if (strlen($user_agent) > 250)
			{
				$user_agent = 'n/a';
			}
			
			// get database
			$db = XenForo_Application::get('db');
			
			// delete row
			$db->query("
				DELETE FROM xf_user_agent
				WHERE user_id = ?
			", $userId);	
			
			// insert new row
			$db->query("
				INSERT INTO xf_user_agent
					(user_id, ip, user_agent, view_date)
				VALUES
					('$userId', '$ip', '$user_agent', '$view_date')
			");	
		}		
		
		// return parent
		return $parent;	
	}
}