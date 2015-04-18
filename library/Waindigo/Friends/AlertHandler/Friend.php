<?php

/**
 * Alert handler for friend requests.
 */
class Waindigo_Friends_AlertHandler_Friend extends XenForo_AlertHandler_Abstract
{
	/**
	 * Fetches the content required by alerts.
	 *
	 * @param array $contentIds
	 * @param XenForo_Model_Alert $model Alert model invoking this
	 * @param integer $userId User ID the alerts are for
	 * @param array $viewingUser Information about the viewing user (keys: user_id, permission_combination_id, permissions)
	 *
	 * @return array
	 */
	public function getContentByIds(array $contentIds, $model, $userId, array $viewingUser)
	{
		/* @var $userModel XenForo_Model_User */
		$userModel = $model->getModelFromCache('XenForo_Model_User');

		if (method_exists($userModel, 'getFriendRecords'))
		{
			return $userModel->getFriendRecords($contentIds);
		}
		return array();
	}
}