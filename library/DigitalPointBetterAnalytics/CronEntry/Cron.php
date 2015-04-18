<?php

/**
 * Cron jobs for recurring scheduled tasks.
 */
class DigitalPointBetterAnalytics_CronEntry_Cron
{
	/**
	 * Tasks that should be run really often.
	 */
	public static function runVeryOften()
	{
		if (XenForo_Application::getCache() && XenForo_Application::getOptions()->dpAnalyticsSidebar == 'above' || XenForo_Application::getOptions()->dpAnalyticsSidebar == 'below')
		{
			XenForo_Model::create('DigitalPointBetterAnalytics_Model_Analytics')->getRealtimeUsage();
		}
	}
}