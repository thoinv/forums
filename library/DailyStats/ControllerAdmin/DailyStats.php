<?php
	
	class DailyStats_ControllerAdmin_DailyStats extends XFCP_DailyStats_ControllerAdmin_DailyStats
	{
        public function actionIndex()
        {
       		$parent = parent::actionIndex();
			
			$options = XenForo_Application::get('options');
			$extendedStats = $options->dailystats_acp_extended;
			$rmEnabled = $options->dailystats_rm_enable;
			$scEnabled = $options->dailystats_sc_enable;
			$xfmgEnabled = $options->dailystats_xfmg_enable;
			$DailyStatsModel = $this->_getDailyStatsModel();
			
			$DS_totalUsers = XenForo_Model::create('XenForo_Model_DataRegistry')->get('DS_totalUsers');
			$DS_totalPosts = XenForo_Model::create('XenForo_Model_DataRegistry')->get('DS_totalPosts');
			$DS_totalThreads = XenForo_Model::create('XenForo_Model_DataRegistry')->get('DS_totalThreads');
			$DS_activeUsersMonth = XenForo_Model::create('XenForo_Model_DataRegistry')->get('DS_activeUsersMonth');
			$DS_activeUsersWeek = XenForo_Model::create('XenForo_Model_DataRegistry')->get('DS_activeUsersWeek');
			$parent->params['DS_totalUsers'] = $DS_totalUsers;
			$parent->params['DS_totalPosts'] = $DS_totalPosts;
			$parent->params['DS_totalThreads'] = $DS_totalThreads;
			$parent->params['DS_activeUsersMonth'] = $DS_activeUsersMonth;
			$parent->params['DS_activeUsersWeek'] = $DS_activeUsersWeek;
			
			//Check if RM option is enabled
			switch ($rmEnabled)
			{
				case '1':
				$DS_totalResource = XenForo_Model::create('XenForo_Model_DataRegistry')->get('DS_totalResource');
				$parent->params['DS_totalResource'] = $DS_totalResource;
				break;
			}
			
			//Check if Showcase option is enabled
			switch ($scEnabled)
			{
				case '1':
				$DS_totalShowcase = XenForo_Model::create('XenForo_Model_DataRegistry')->get('DS_totalShowcase');
				$parent->params['DS_totalShowcase'] = $DS_totalShowcase;
				break;
			}
			
			//Check if XFMG option is enabled
			switch ($xfmgEnabled)
			{
				case '1':
				$DS_totalXFMG = XenForo_Model::create('XenForo_Model_DataRegistry')->get('DS_totalXFMG');
				$parent->params['DS_totalXFMG'] = $DS_totalXFMG;
				break;
			}
			
			
			//Check if Extended Stats option is enabled
			switch ($extendedStats)
			{
				case '1':
				$DS_totalPostsWeek = $DailyStatsModel->getTotalPostsWeek();
				$DS_totalPostsMonth = $DailyStatsModel->getTotalPostsMonth();
				$DS_totalThreadsWeek = $DailyStatsModel->getTotalThreadsWeek();
				$DS_totalThreadsMonth = $DailyStatsModel->getTotalThreadsMonth();
				$DS_totalUsersWeek = $DailyStatsModel->getTotalUsersWeek();
				$DS_totalUsersMonth = $DailyStatsModel->getTotalUsersMonth();
				$parent->params['DS_totalPostsWeek'] = $DS_totalPostsWeek;
				$parent->params['DS_totalPostsMonth'] = $DS_totalPostsMonth;
				$parent->params['DS_totalThreadsWeek'] = $DS_totalThreadsWeek;
				$parent->params['DS_totalThreadsMonth'] = $DS_totalThreadsMonth;
				$parent->params['DS_totalUsersWeek'] = $DS_totalUsersWeek;
				$parent->params['DS_totalUsersMonth'] = $DS_totalUsersMonth;
				
				//Check if RM option is enabled
				switch ($rmEnabled)
				{
					case '1':
					$DS_totalResourceWeek = $DailyStatsModel->getTotalResourceWeek();
					$DS_totalResourceMonth = $DailyStatsModel->getTotalResourceMonth();
					$parent->params['DS_totalResourceWeek'] = $DS_totalResourceWeek;
					$parent->params['DS_totalResourceMonth'] = $DS_totalResourceMonth;
					break;
				}
				
				//Check if Showcase option is enabled
				switch ($scEnabled)
				{
					case '1':
					$DS_totalShowcaseWeek = $DailyStatsModel->getTotalShowcaseWeek();
					$DS_totalShowcaseMonth = $DailyStatsModel->getTotalShowcaseMonth();
					$parent->params['DS_totalShowcaseWeek'] = $DS_totalShowcaseWeek;
					$parent->params['DS_totalShowcaseMonth'] = $DS_totalShowcaseMonth;
					break;
				}
				
				//Check if XFMG option is enabled
				switch ($xfmgEnabled)
				{
					case '1':
					$DS_totalXFMGWeek = $DailyStatsModel->getTotalXFMGWeek();
					$DS_totalXFMGMonth = $DailyStatsModel->getTotalXFMGMonth();
					$parent->params['DS_totalXFMGWeek'] = $DS_totalXFMGWeek;
					$parent->params['DS_totalXFMGMonth'] = $DS_totalXFMGMonth;
					break;
				}
				
				
			break;
			}
			
			return $parent;
		}
		
        protected function _getDailyStatsModel()
        {
			return $this->getModelFromCache('DailyStats_Model_DailyStats');
		}
	}
