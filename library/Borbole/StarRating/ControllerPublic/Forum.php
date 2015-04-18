<?php

//######################## Star Rating Threads By Borbole ###########################
class Borbole_StarRating_ControllerPublic_Forum extends XFCP_Borbole_StarRating_ControllerPublic_Forum
{
    public function actionIndex()
    {
        $parent = parent::actionIndex();

        $maxResults = XenForo_Application::get('options')->showratedthreads;
		
		$ratedThreads = $this->_getBorboleRatedThreadsModel()->getRatedThreads($maxResults);
		
        $parent->params['ratedThreads'] = $ratedThreads;
		
		return $parent;
		
	}
	
	protected function _getDefaultThreadSort(array $forum)
    {
        if ($forum['default_sort_order'] == 'last_post_date' && XenForo_Application::get('options')->default_rating_thread_sorting) 
		{
            $forum['default_sort_order'] = 'rating_count';
        }
        return parent::_getDefaultThreadSort($forum);
    }

    /**
	 * @return Borbole_StarRating_Model_Rating
	 */
	protected function _getBorboleRatedThreadsModel()
	{
		return $this->getModelFromCache('Borbole_StarRating_Model_Rating');
	}	
}