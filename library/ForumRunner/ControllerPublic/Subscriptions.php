<?php
/*
 * Forum Runner
 *
 * Copyright (c) 2010-2011 to End of Time Studios, LLC
 *
 * This file may not be redistributed in whole or significant part.
 *
 * http://www.forumrunner.com
 */

class ForumRunner_ControllerPublic_Subscriptions extends XenForo_ControllerPublic_Watched
{

    public function actionGetSubscriptions ()
    {
	$page = max($this->_input->filterSingle('page', XenForo_Input::UINT), 1);
	$perpage = $this->_input->filterSingle('perpage', XenForo_Input::UINT);
	if (!$perpage) {
	    $perpage = XenForo_Application::get('options')->discussionsPerPage;
	}
	$previewtype = $this->_input->filterSingle('previewtype', XenForo_Input::UINT);
	if (!$previewtype) {
	    $previewtype = 2;
	}
	
	$visitor = XenForo_Visitor::getInstance();
	$watch_model = $this->_getThreadWatchModel();

	$threads = $watch_model->getThreadsWatchedByUser($visitor['user_id'], false, array(
	    'join' => XenForo_Model_Thread::FETCH_FORUM | XenForo_Model_Thread::FETCH_USER,
	    'readUserId' => $visitor['user_id'],
	    'page' => $page,
	    'perPage' => $perpage,
	    'postCountUserId' => $visitor['user_id'],
	    'permissionCombinationId' => $visitor['permission_combination_id'],
	));

	$threads = $watch_model->unserializePermissionsInList($threads, 'node_permission_cache');
	$threads = $watch_model->getViewableThreadsFromList($threads);

	$threads = $this->_prepareWatchedThreads($threads);

	$total = $watch_model->countThreadsWatchedByUser($visitor['user_id']);

	$this->canonicalizePageNumber($page, $perpage, $total, 'watched/threads/all');

	$thread_data = array();
	$thread_model = $this->_getThreadModel();
	$post_model = $this->getModelFromCache('XenForo_Model_Post');

	$preview_length = XenForo_Application::get('options')->discussionPreviewLength;
	$formatter = XenForo_BbCode_Formatter_Base::create('XenForo_BbCode_Formatter_Text');
	$parser = new XenForo_BbCode_Parser($formatter);

	foreach ($threads as &$thread) {
	    $out = array(
		'thread_id' => $thread['thread_id'],
		'forum_title' => prepare_utf8_string($thread['node_title']),
		'new_posts' => $thread['isNew'],
		'forum_id' => $thread['node_id'],
		'total_posts' => $thread['reply_count'] + 1,
		'thread_title' => prepare_utf8_string(strip_tags($thread['title'])),
		'post_lastposttime' => prepare_utf8_string(XenForo_Locale::dateTime($thread['last_post_date'], 'absolute')),
	    );

	    if ($previewtype == 1) {
		$out += array(
		    'post_username' => prepare_utf8_string(strip_tags($thread['username'])),
		    'post_userid' => $thread['user_id'],
		);
	    } else {
		$out += array(
		    'post_username' => prepare_utf8_string(strip_tags($thread['last_post_username'])),
		    'post_userid' => $thread['last_post_user_id'],
		);
	    }

	    $post = $post_model->getPostById($thread[$previewtype == 1 ? 'first_post_id' : 'last_post_id'], array(
		'join' => XenForo_Model_Post::FETCH_USER
	    ));
	    $avatarurl = process_avatarurl(XenForo_Template_Helper_Core::getAvatarUrl($post, 'm'));
	    if (strpos($avatarurl, '/xenforo/avatars/avatar_') !== false) {
		$avatarurl = '';
	    }
	    if ($avatarurl != '') {
		$out['avatarurl'] = $avatarurl;
	    }

	    $preview = '';
	    if ($preview_length) {
		$preview = $parser->render($post['message']);
	    }
	    if ($preview != '') {
		$out['thread_preview'] = prepare_utf8_string(html_entity_decode($preview));
	    }
	    if ($thread['discussion_type'] == 'poll') {
		$out['poll'] = true;
	    }

	    $thread_data[] = $out;
	}
	
	$out = array(
	    'threads' => $thread_data,
	    'total_threads' => $total,
	);

	return $out;
    }
    
    public function actionUnsubscribe ()
    {
	$threadid = $this->_input->filterSingle('threadid', XenForo_Input::UINT);
	$thread_model = $this->getModelFromCache('XenForo_Model_Thread');

	$helper = $this->getHelper('ForumThreadPost');	
	try {	
	    list($thread_info, $forum_info) = $helper->assertThreadValidAndViewable($threadid);
	} catch (Exception $e) {
	    json_error($e->getControllerResponse()->errorText->render());
	}

	if (!$this->_getThreadModel()->canWatchThread($thread_info, $forum_info)) {
	    $p = new XenForo_Phrase('do_not_have_permission');
	    json_error($p->render());
	}

	$this->_getThreadWatchModel()->setThreadWatchState(XenForo_Visitor::getUserId(), $threadid, '');

	return array('success' => true);
    }
    
    public function actionSubscribe ()
    {
	$threadid = $this->_input->filterSingle('threadid', XenForo_Input::UINT);
	$emailupdate = $this->_input->filterSingle('emailupdate', XenForo_Input::UINT);
	$thread_model = $this->getModelFromCache('XenForo_Model_Thread');

	$helper = $this->getHelper('ForumThreadPost');	
	try {	
	    list($thread_info, $forum_info) = $helper->assertThreadValidAndViewable($threadid);
	} catch (Exception $e) {
	    json_error($e->getControllerResponse()->errorText->render());
	}

	if (!$this->_getThreadModel()->canWatchThread($thread_info, $forum_info)) {
	    $p = new XenForo_Phrase('do_not_have_permission');
	    json_error($p->render());
	}

	$this->_getThreadWatchModel()->setThreadWatchState(XenForo_Visitor::getUserId(), $threadid, $emailupdate ? 'watch_email' : 'watch_no_email');

	return array('success' => true);
    }

    protected function _postDispatch($controllerResponse, $controllerName, $action) {}
    protected function _checkCsrf($action) {}
}
