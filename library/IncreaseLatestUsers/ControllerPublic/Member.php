<?php

class IncreaseLatestUsers_ControllerPublic_Member extends XFCP_IncreaseLatestUsers_ControllerPublic_Member
{
	public function actionIndex()
	{
		$parent = parent::actionIndex();
		
		$userId = $this->_input->filterSingle('user_id', XenForo_Input::UINT);
		if ($userId)
		{
			return $parent;
		}
		else if ($this->_input->inRequest('user_id'))
		{
			return $parent;
		}		
		
		$options = XenForo_Application::get('options');
		
		$userModel = $this->_getUserModel();
		
		$criteria = array(
			'user_state' => 'valid',
			'is_banned' => 0
		);		
		
		$parent->params['latestUsers'] = $userModel->getLatestUsers($criteria, array('limit' => $options->maximumLatestUsers));
		$parent->params['activeUsers'] = $activeUsers = $userModel->getMostActiveUsers($criteria, array('limit' => $options->maximumActiveUsers));
		
		return $parent;
	}
}
