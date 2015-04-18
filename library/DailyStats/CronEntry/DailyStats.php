<?php
	
	class DailyStats_CronEntry_DailyStats
	{
		public static function getDailyStatsTotal()
		{
			
			$options = XenForo_Application::get('options');
			$rmEnabled = $options->dailystats_rm_enable;
			$scEnabled = $options->dailystats_sc_enable;
			$xfmgEnabled = $options->dailystats_xfmg_enable;
			
			$DailyStatsModel = XenForo_Model::create('DailyStats_Model_DailyStats');
			$DS_totalUsers = $DailyStatsModel->getTotalUsers();
			XenForo_Model::create('XenForo_Model_DataRegistry')->set('DS_totalUsers', $DS_totalUsers);
			$DS_totalPosts = $DailyStatsModel->getTotalPosts();
			XenForo_Model::create('XenForo_Model_DataRegistry')->set('DS_totalPosts', $DS_totalPosts);
			$DS_totalThreads = $DailyStatsModel->getTotalThreads();
			XenForo_Model::create('XenForo_Model_DataRegistry')->set('DS_totalThreads', $DS_totalThreads);
			$DS_activeUsersWeek = $DailyStatsModel->getActiveUsersWeek();
			XenForo_Model::create('XenForo_Model_DataRegistry')->set('DS_activeUsersWeek', $DS_activeUsersWeek);
			$DS_activeUsersMonth = $DailyStatsModel->getActiveUsersMonth();
			XenForo_Model::create('XenForo_Model_DataRegistry')->set('DS_activeUsersMonth', $DS_activeUsersMonth);
			$DS_newUsersToday = $DailyStatsModel->getNewUsersToday();
			XenForo_Model::create('XenForo_Model_DataRegistry')->set('DS_newUsersToday', $DS_newUsersToday);
			
			//Check if RM option is enabled
			switch ($rmEnabled)
			{
				case '1':
				
				$DS_totalResource = $DailyStatsModel->getTotalResource();
				XenForo_Model::create('XenForo_Model_DataRegistry')->set('DS_totalResource', $DS_totalResource);
				break;
			}
			
			//Check if Showcase option is enabled
			switch ($scEnabled)
			{
				case '1':
				
				$DS_totalShowcase = $DailyStatsModel->getTotalShowcase();
				XenForo_Model::create('XenForo_Model_DataRegistry')->set('DS_totalShowcase', $DS_totalShowcase);
				break;
			}

			//Check if XFMG option is enabled
			switch ($xfmgEnabled)
			{
				case '1':
				
				$DS_totalXFMG = $DailyStatsModel->getTotalXFMG();
				XenForo_Model::create('XenForo_Model_DataRegistry')->set('DS_totalXFMG', $DS_totalXFMG);
				break;
			}
			
		}
	}
