<?php

class Dark_PostRating_ControllerPublic_Member extends XFCP_Dark_PostRating_ControllerPublic_Member {
 
	protected function _getNotableMembers($type, $limit)
	{
		$result = parent::_getNotableMembers($type, $limit);
		if($result)
			return $result;
		
		$userModel = $this->_getUserModel();

		switch ($type)
		{
			case 'positive_ratings':
				return array($userModel->getUsers(array(), array(
					'join' => XenForo_Model_User::FETCH_USER_FULL,
					'limit' => $limit,
					'order' => 'positive_rating_count_incl_likes',
					'direction' => 'desc'
				)), 'positive_rating_count_incl_likes');

			case 'negative_ratings':
				return array($userModel->getUsers(array(), array(
					'join' => XenForo_Model_User::FETCH_USER_FULL,
					'limit' => $limit,
					'order' => 'negative_rating_count',
					'direction' => 'desc'
				)), 'negative_rating_count');

			default:
				return false;
		}
	}

}