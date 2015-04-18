<?php

class TopUsers_ControllerPublic_Index extends XenForo_ControllerPublic_Abstract
{
	public function actionIndex()
	{
		if (!XenForo_Visitor::getInstance()->hasPermission('topUsers', 'canViewTopUsers')) {
			throw $this->getNoPermissionResponseException();
		}
		
		$month_id = $this->_input->filterSingle('month_id', XenForo_Input::UINT);
		$topUsers = $this->_getTopUsersModel()->getTopUsers($month_id);
		$viewParams = array(
				'topUsers' => $topUsers
		);
		
		return $this->responseView('TopUsers_ViewPublic_Index', 'top_users_index', $viewParams);
	}
	
	public static function getSessionActivityDetailsForList(array $activities)
	{
		return new XenForo_Phrase('top_users_location_phrase');
	}
	
	/**
	 * @return TopUsers_Model_TopUsers
	 */
	protected function _getTopUsersModel()
	{
		return $this->getModelFromCache('TopUsers_Model_TopUsers');
	}
}