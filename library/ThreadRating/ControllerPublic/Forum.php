<?php

class ThreadRating_ControllerPublic_Forum extends XFCP_ThreadRating_ControllerPublic_Forum
{

	public function actionForum()
	{
		$response = parent::actionForum();

		$response->params['threadrating']['canView'] = XenForo_Visitor::getInstance()->hasPermission('general', 'tr_viewRatings');

		return $response;
	}

	protected function _getThreadFetchElements(array $forum, array $displayConditions)
	{
		$options = parent::_getThreadFetchElements($forum, $displayConditions);

		$this->_getThreadModel();
		
		$options['options']['join'] += ThreadRating_Model_Thread::FETCH_THREADRATE;

		return $options;	
	}
}