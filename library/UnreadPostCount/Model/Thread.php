<?php

class UnreadPostCount_Model_Thread extends XFCP_UnreadPostCount_Model_Thread
{
	public function markThreadRead(array $thread, array $forum, $readDate, array $viewingUser = null)
	{
		$parent = parent::markThreadRead($thread, $forum, $readDate, $viewingUser);

		if (XenForo_Application::isRegistered('session')
			&& XenForo_Visitor::getUserId()
		)
		{
			$session = XenForo_Application::getSession();

			$unreadPostCount = $session->get('unreadPostCount');
			if (isset($unreadPostCount['post_ids']) && $thread['discussion_state'] == 'visible')
			{
				unset($unreadPostCount['post_ids'][$thread['thread_id']]);

				$postIds = array();
				foreach ($unreadPostCount['post_ids'] AS $threadId)
				{
					foreach ($threadId AS $postId)
					{
						$postIds[] = $postId;
					}
				}

				$unreadPostCount['count'] = count($postIds);

				$session->set('unreadPostCount', $unreadPostCount);
			}
		}

		return $parent;
	}
}