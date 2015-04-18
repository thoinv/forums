<?php
class OpenFire_LiveSearch_Model_LiveSearch extends XenForo_Model {
	/* This function gets called outside and gets us the thread id's for the search */
	public function getLiveSearch($forum, $query) {
		return $this->getLiveSearchByIds ( $this->getLiveSearchIds ( $query ), $forum );
	}
	public function getLiveSearchByIds($threadIds, $forum) {
		/*
		 * Getting the threads returned by our query via the XenForo Thread Model. We also want to get the Posters Avatar and the Forum, where it is located!
		 */
		$results = $this->getModelFromCache ( 'XenForo_Model_Thread' )->getThreadsByIds ( $threadIds, array (
				'join' => XenForo_Model_Thread::FETCH_FORUM | XenForo_Model_Thread::FETCH_AVATAR 
		) );
		
		/* Check for permissions, if visitor has no permission to view it, we dont show the thread */
		foreach ( $results as $key => &$thread ) {
			$permissions = XenForo_Visitor::getInstance ()->getNodePermissions ( $thread ['node_id'] );
			$thread = $this->getModelFromCache ( 'XenForo_Model_Thread' )->prepareThread ( $thread, $forum, $permissions );
			if (! $this->getModelFromCache ( 'XenForo_Model_Thread' )->canViewThread ( $thread, $thread, $null, $permissions )) {
				unset ( $results [$key] );
			}
		}
		
		/* Reverses Array with threads if unchecked, to show new threads first */
		if (! XenForo_Application::get ( 'options' )->openfire_livesearch_oldresults_first) {
			return array_reverse ( $results, true );
		}
		return $results;
	}
	public function getLiveSearchIds($query) {
		/* Preparing array to store our threads in it */
		$threadIds = array ();
		
		/* Ensure the Query exists */
		if ($query) {
			/* Setting up the Query with respecting all lovely settings :) */
			$sql = "SELECT xf_thread.thread_id
					FROM xf_thread";
			$sql .= " WHERE xf_thread.title LIKE '%" . addslashes ( $query ) . "%'";
			if (! XenForo_Application::get ( 'options' )->openfire_livesearch_show_deleted) {
				$sql .= " AND xf_thread.discussion_state != 'deleted'";
			}
			if (! XenForo_Application::get ( 'options' )->openfire_livesearch_show_moderated) {
				$sql .= " AND xf_thread.discussion_state != 'moderated'";
			}
			
			$sql .= " ORDER BY thread_id";
			if (XenForo_Application::get ( 'options' )->openfire_livesearch_oldresults_first) {
				$sql .= " ASC";
			} else {
				$sql .= " DESC";
			}
			
			if (XenForo_Application::get ( 'options' )->openfire_livesearch_threadlimit != 0) {
				$sql .= " LIMIT " . XenForo_Application::get ( 'options' )->openfire_livesearch_threadlimit;
			}
			
			/* Fetching the results! */
			$results = $this->fetchAllKeyed ( $sql, 'thread_id' );
			$threadIds = array_keys ( $results );
		}
		
		/* Return our thread id's, ready for use ;) */
		return $threadIds;
	}
}
