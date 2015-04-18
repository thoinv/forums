<?php

class Andy_UserAgent_Model extends XenForo_Model
{
	public function getResults()
	{
		// get options from Admin CP -> Options -> User Agent -> Hours
		$hours = XenForo_Application::get('options')->userAgentHours;			
		
		// calculate timestamp
		$timestamp = time() - (3600 * $hours);
		
		return $this->_getDb()->fetchAll("
		SELECT xf_user.username, xf_user_agent.user_id, xf_user_agent.ip, xf_user_agent.user_agent, xf_user_agent.view_date
		FROM xf_user_agent
		INNER JOIN xf_user ON xf_user.user_id = xf_user_agent.user_id
		WHERE xf_user_agent.view_date > " . $timestamp . "
		ORDER BY xf_user.username ASC
		");
	}			
}