<?php

class Andy_Bookmark_ControllerPublic_Bookmark extends XenForo_ControllerPublic_Abstract
{	
	public function actionList()
	{
		//########################################
		// list
		//########################################			
		
		// get permission
		if (!XenForo_Visitor::getInstance()->hasPermission('bookmarkGroupID', 'bookmarkID'))
		{
			throw $this->getNoPermissionResponseException();
		}
		
		// get userId
		$userId = XenForo_Visitor::getUserId();	
		
		// get options from Admin CP -> Options -> Bookmark -> Sort By
		$sortBy = XenForo_Application::get('options')->bookmarkSortBy;	
		
		// get options from Admin CP -> Options -> Bookmark -> Sort Order
		$sortOrder = XenForo_Application::get('options')->bookmarkSortOrder;		
		
		if ($sortBy == 'postDate')
		{
			$orderBy = 'xf_post.post_date';
		}
		
		if ($sortBy == 'bookmarkDate')
		{
			$orderBy = 'xf_bookmark.bookmark_id';
		}
		
		if ($sortOrder == 'desc')
		{
			$orderSort = ' DESC';
		}
		
		if ($sortOrder == 'asc')
		{
			$orderSort = ' ASC';
		}						
		
		// get database
		$db = XenForo_Application::get('db');			
		
		// run query
		$bookmarkResults = $db->fetchAll("
		SELECT xf_bookmark.bookmark_id,
		xf_post.post_id,
		xf_post.user_id,
		xf_post.username,
		xf_node.node_id AS forum_id,
		xf_node.title AS forum_title,
		xf_thread.title,		
		xf_post.post_date,
		xf_bookmark.note
		FROM xf_bookmark
		INNER JOIN xf_post ON xf_post.post_id = xf_bookmark.post_id
		INNER JOIN xf_thread ON xf_thread.thread_id = xf_post.thread_id
		INNER JOIN xf_node ON xf_node.node_id = xf_thread.node_id
		WHERE xf_bookmark.user_id = " . $userId . "
		AND xf_post.message_state = 'visible'
		ORDER BY " . $orderBy . $orderSort . "
		");	
		
		// declare variable
		$i = 0;
		
		// get child node titles
		foreach ($bookmarkResults as $k => $v)
		{						
			// includeTitleInUrls option
			$forum_link = XenForo_Link::buildIntegerAndTitleUrlComponent($v['forum_id'], $v['forum_title'], true);
			
			// merge arrays
			$bookmarkResults[$i] = array_merge($bookmarkResults[$i], array('forum_link' => $forum_link));
			
			// increment variable
			$i = $i + 1;			
		}			
		
		// prepare viewParams
		$viewParams = array(
			'bookmarkResults' => $bookmarkResults
		); 
		
		// send to template
		return $this->responseView('Andy_Bookmark_ViewPublic_Bookmark', 'andy_bookmark_list', $viewParams);
	}
	
	public function actionEdit()
	{
		//########################################
		// edit
		//########################################
		
		// get permission
		if (!XenForo_Visitor::getInstance()->hasPermission('bookmarkGroupID', 'bookmarkID'))
		{
			throw $this->getNoPermissionResponseException();
		}
		
		// get name from route
		$bookmarkId = $this->_input->filterSingle('bookmark_id', XenForo_Input::STRING);
		
		// get userId
		$userId = XenForo_Visitor::getUserId();		

		// get database
		$db = XenForo_Application::get('db');
		
		// run query
		$result = $db->fetchOne("
		SELECT bookmark_id
		FROM xf_bookmark
		WHERE bookmark_id = ?
		AND user_id = ?
		", array($bookmarkId,$userId));
		
		// throw error if no result
		if (!$result)
		{
			throw $this->getNoPermissionResponseException();
		}				
		
		// run query
		$results = $db->fetchRow("
			SELECT bookmark_id, note
			FROM xf_bookmark		
			WHERE bookmark_id = ?
			AND user_id = ?
		", array($bookmarkId,$userId));							
		
		// prepare viewParams
		$viewParams = array(
			'bookmark_id' => $results['bookmark_id'],
			'note' => $results['note']
		);					

		// send to template
		return $this->responseView('Andy_Bookmark_ViewPublic_Bookmark', 'andy_bookmark_edit', $viewParams);					
	}
	
	public function actionDelete()
	{
		//########################################
		// delete
		//########################################	
			
		// get permission
		if (!XenForo_Visitor::getInstance()->hasPermission('bookmarkGroupID', 'bookmarkID'))
		{
			throw $this->getNoPermissionResponseException();
		}

		// get name from route, example /forums/bookmark/delete?bookmark_id=1234  
		$bookmarkId = $this->_input->filterSingle('bookmark_id', XenForo_Input::UINT);
		
		// get userId
		$userId = XenForo_Visitor::getUserId();
		
		// get database
		$db = XenForo_Application::get('db');
		
		// run query
		$result = $db->fetchOne("
		SELECT bookmark_id
		FROM xf_bookmark
		WHERE bookmark_id = ?
		AND user_id = ?
		", array($bookmarkId,$userId));
		
		// throw error if no result
		if (!$result)
		{
			throw $this->getNoPermissionResponseException();
		}		
		
		// delete row
		$db->query("
			DELETE FROM xf_bookmark
			WHERE bookmark_id = ?
			AND user_id = ?
		", array($bookmarkId,$userId));			

		// return to countdown
		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildPublicLink('bookmark/list')
		);
	}
	
	public function actionUpdate()
	{
		//########################################
		// update
		//########################################	
				
		// get permission
		if (!XenForo_Visitor::getInstance()->hasPermission('bookmarkGroupID', 'bookmarkID'))
		{
			throw $this->getNoPermissionResponseException();
		}
				
		// get bookmarkId
		$bookmarkId = $this->_input->filterSingle('bookmark_id', XenForo_Input::UINT);
		
		// get userId
		$userId = XenForo_Visitor::getUserId();		
		
		// get note
		$note = $this->_input->filterSingle('note', XenForo_Input::STRING);
		
		// get database
		$db = XenForo_Application::get('db');
		
		// run query
		$result = $db->fetchOne("
		SELECT bookmark_id
		FROM xf_bookmark
		WHERE bookmark_id = ?
		AND user_id = ?
		", array($bookmarkId,$userId));
		
		// throw error if no result
		if (!$result)
		{
			throw $this->getNoPermissionResponseException();
		}

		$db->query("
		UPDATE xf_bookmark SET
			note = ?
			WHERE bookmark_id = ?
			AND user_id = ?
		", array($note,$bookmarkId,$userId));	

		// return to countdown
		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildPublicLink('bookmark/list')
		);		
	}	
}