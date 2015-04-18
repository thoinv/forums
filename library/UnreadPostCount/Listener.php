<?php

class UnreadPostCount_Listener
{
	protected static $_hasFired = false;

	public static function controllerPreDispatch(XenForo_Controller $controller, $action)
	{
		if (XenForo_Application::isRegistered('session')
			&& XenForo_Visitor::getUserId()
			&& $controller instanceof XenForo_ControllerPublic_Abstract
			&& self::$_hasFired === false
		)
		{
			self::$_hasFired = true;

			$session = XenForo_Application::getSession();

			/** @var $unreadPostCountModel UnreadPostCount_Model_Unread */
			$unreadPostCountModel = XenForo_Model::create('UnreadPostCount_Model_Unread');
			$unreadPostCount = $session->get('unreadPostCount');

			if ($unreadPostCountModel->needsRecache($unreadPostCount))
			{
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
		}
	}

	public static function extendForumController($class, array &$extend)
	{
		$extend[] = 'UnreadPostCount_ControllerPublic_Forum';
	}

	public static function extendThreadModel($class, array &$extend)
	{
		$extend[] = 'UnreadPostCount_Model_Thread';
	}
}