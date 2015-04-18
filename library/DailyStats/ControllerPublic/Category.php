<?php
	
	class DailyStats_ControllerPublic_Category extends XFCP_DailyStats_ControllerPublic_Category
	{
        public function actionIndex()
        {
			$parent = parent::actionIndex();
			
			$options = XenForo_Application::get('options');
			$rmEnabled = $options->dailystats_rm_enable;
			$scEnabled = $options->dailystats_sc_enable;
			$DailyStatsModel = $this->_getDailyStatsModel();
			$xfmgEnabled = $options->dailystats_xfmg_enable;
			$DS_totalUsers = XenForo_Model::create('XenForo_Model_DataRegistry')->get('DS_totalUsers');
			$DS_totalPosts = XenForo_Model::create('XenForo_Model_DataRegistry')->get('DS_totalPosts');
			$DS_totalThreads = XenForo_Model::create('XenForo_Model_DataRegistry')->get('DS_totalThreads');
			$parent->params['DS_totalUsers'] = $DS_totalUsers;
			$parent->params['DS_totalPosts'] = $DS_totalPosts;
			$parent->params['DS_totalThreads'] = $DS_totalThreads;
			
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
			
			return $parent;
		}
		
		public function actionNewUsers()
        {
			$DS_newUsersToday = XenForo_Model::create('XenForo_Model_DataRegistry')->get('DS_newUsersToday');
			
			$viewParams = array('newuser' => $DS_newUsersToday);
			
			return $this->responseView('DailyStats_ControllerPublic_DailyStats_NewUsersView', 'dailystats_users_today', $viewParams);
		}
		
        protected function _getDailyStatsModel()
	{
	return $this->getModelFromCache('DailyStats_Model_DailyStats');
	}
	}
		