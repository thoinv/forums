<?php

class UnreadPostCount_Model_Unread extends XenForo_Model
{
	public function getUnreadPostCount($userId, array $forumIds)
	{
		$autoReadDate = XenForo_Application::$time - (XenForo_Application::get('options')->readMarkingDataLifetime * 86400);

		if (!sizeof($forumIds))
		{
			return array(
				'unread' => array(),
				'count' => 0
			);
		}

		$unreadPosts = $this->_getDb()->fetchAll('
			SELECT thread.thread_id, post.post_id
			FROM xf_post AS post
			INNER JOIN xf_thread AS thread ON
				(post.thread_id = thread.thread_id AND thread.node_id IN (' . $this->_getDb()->quote($forumIds) . '))
			INNER JOIN xf_forum AS forum ON
				(forum.node_id = thread.node_id AND forum.find_new = 1)
			LEFT JOIN xf_thread_read AS thread_read ON
				(thread_read.thread_id = thread.thread_id AND thread_read.user_id = ?)
			LEFT JOIN xf_forum_read AS forum_read ON
				(forum_read.node_id = thread.node_id AND forum_read.user_id = ?)
			WHERE post.post_date > ?
			AND post.message_state = \'visible\'
			AND thread.discussion_state = \'visible\'
			AND post.post_date > GREATEST(
				IF (thread_read.thread_read_date IS NULL, 0, thread_read.thread_read_date), 
				IF (forum_read.forum_read_date IS NULL, 0, forum_read.forum_read_date)
			)
		', array($userId, $userId, $autoReadDate));

		$grouped = array(
			'unread' => array(),
			'count' => 0
		);
		foreach ($unreadPosts AS $post)
		{
			$grouped['unread'][$post['thread_id']][$post['post_id']] = $post['post_id'];
		}

		$grouped['count'] = count($unreadPosts);

		return $grouped;
	}

	public function needsRecache($unreadPostCount)
	{
		if (!$unreadPostCount)
		{
			return true;
		}

		if (!is_array($unreadPostCount))
		{
			return true;
		}

		$cacheTimeout = XenForo_Application::$time
			- (XenForo_Application::getOptions()->unreadPostCountCache * 60);

		return ($unreadPostCount['last_update'] <= $cacheTimeout);
	}
}
