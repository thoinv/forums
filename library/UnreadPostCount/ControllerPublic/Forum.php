<?php

class UnreadPostCount_ControllerPublic_Forum extends XFCP_UnreadPostCount_ControllerPublic_Forum
{
	public function actionMarkRead()
	{
		$parent = parent::actionMarkRead();

		if ($parent instanceof XenForo_ControllerResponse_Redirect && $this->isConfirmedPost())
		{
			$session = XenForo_Application::getSession();

			/** @var $unreadPostCountModel UnreadPostCount_Model_Unread */
			$unreadPostCountModel = $this->getModelFromCache('UnreadPostCount_Model_Unread');

			$viewableNodes = XenForo_Model::create('XenForo_Model_Node')->getViewableNodeList();
			$nodeIds = array();

			foreach ($viewableNodes AS $key => $node)
			{
				if ($node['node_type_id'] == 'Forum')
				{
					$nodeIds[$key] = $key;
				}
			}

			$unreadPosts = $unreadPostCountModel->getUnreadPostCount(XenForo_Visitor::getUserId(), $nodeIds);
			$unreadPostCount = array(
				'post_ids' => $unreadPosts['unread'],
				'count' => $unreadPosts['count'],
				'last_update' => XenForo_Application::$time
			);
			$session->set('unreadPostCount', $unreadPostCount);
		}

		return $parent;
	}
}