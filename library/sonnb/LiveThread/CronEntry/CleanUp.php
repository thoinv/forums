<?php
/**
 * Product: sonnb - Live Threads
 * Version: 1.1.14
 * Date: 25th January 2015
 * Author: sonnb
 * Website: www.sonnb.com
 * License: You might not copy or redistribute this addon.
 * Any action to public or redistribute must be authorized from author
 */
class sonnb_LiveThread_CronEntry_CleanUp
{
	
	public static function runCleanUp()
	{
		$time = XenForo_Application::$time;
		$expireValue = XenForo_Application::get('options')->sonnb_LiveThread_Expire;
		
		if ($expireValue)
		{
			$expire = $time - $expireValue*60;
			$db = XenForo_Application::getDb();
			
			$conditions = array(
					'sonnb_live_thread'	=> 1,
					'last_post_date' => array('<', $expire)
				);
			
			$threads = XenForo_Model::create('XenForo_Model_Thread')->getThreads($conditions);
			
			if ($threads)
			{
				foreach ($threads as $thread)
				{
					$updateValue = array('sonnb_live_thread' => 0);
					$updateCondition = "thread_id = ".$thread['thread_id'];
					$db->update('xf_thread', $updateValue, $updateCondition);
				}
			}
		}
	}
}