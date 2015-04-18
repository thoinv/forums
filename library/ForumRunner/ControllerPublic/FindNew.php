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

class ForumRunner_ControllerPublic_FindNew extends XenForo_ControllerPublic_FindNew
{
    public function actionFindNew ()
    {
	$do = $this->_input->filterSingle('do', XenForo_Input::STRING);
	$days = $this->_input->filterSingle('days', XenForo_Input::UINT);
	$page = max($this->_input->filterSingle('page', XenForo_Input::UINT), 1);
	$perpage = $this->_input->filterSingle('perpage', XenForo_Input::UINT);
	if (!$perpage) {
	    $perpage = XenForo_Application::get('options')->discussionsPerPage;
	}
	$previewtype = $this->_input->filterSingle('previewtype', XenForo_Input::UINT);
	if (!$previewtype) {
	    $previewtype = 2;
	}

	$thread_model = $this->_getThreadModel();
	$search_model = $this->_getSearchModel();
	$post_model = $this->getModelFromCache('XenForo_Model_Post');
	$user_model = $this->getModelFromCache('XenForo_Model_User');
	$node_model = $this->getModelFromCache('XenForo_Model_Node');

	$userid = XenForo_Visitor::getUserId();

	$options = array(
	    'limit' => XenForo_Application::get('options')->maximumSearchResults,
	);

	if ($do == 'getdaily') {
	    if ($days < 0 || $days > 30) {
		$days = 3;
	    }

	    $search_options = $options + array(
		'order' => 'last_post_date',
		'orderDirection' => 'desc',
	    );

	    $threadids = array_keys($thread_model->getThreads(array(
		'last_post_date' => array('>', XenForo_Application::$time - 86400 * $days),
		'deleted' => false,
		'moderated' => false,
	    ), $search_options));

	    $search_type = 'recent-threads';
	} else {
	    $threadids = $thread_model->getUnreadThreadIds($userid, $options);

	    $search_type = 'new-threads';
	}

	$exclude = XenForo_Application::get('options')->forumrunnerExcludeForums;
	if (!$exclude) {
	    $exclude = array();
	}
	$forums = $node_model->getViewableNodeList(null, true);
	foreach ($exclude as $remove) {
	    fr_remove_node_and_children($forums, $remove);
	}
	$forums = array_keys($forums);

	$results = array();
	foreach ($threadids AS $threadid) {
	    $thread = $thread_model->getThreadById($threadid);
	    if (!in_array($thread['node_id'], $forums)) {
		continue;
	    }
	    $results[] = array(
		XenForo_Model_Search::CONTENT_TYPE => 'thread',
		XenForo_Model_Search::CONTENT_ID => $threadid,
	    );
	}
	$results = $search_model->getViewableSearchResults($results);
	if (!$results) {
	    return $this->noResults();
	}

	$search = $search_model->insertSearch($results, $search_type, '', array(), 'date', false);

	$search_id = $search['search_id'];

	$resultids = $search_model->sliceSearchResultsToPage($search, $page, $perpage);
	$results = $search_model->getSearchResultsForDisplay($resultids);
	if (!$results) {
	    return $this->noResults();
	}

	$thread_data = array();
	$preview_length = XenForo_Application::get('options')->discussionPreviewLength;
	
	foreach ($results['results'] AS $result) {
	    $thread = $result['content'];

	    $post = $post_model->getPostById($thread[$previewtype == 1 ? 'first_post_id' : 'last_post_id'], array(
		'join' => XenForo_Model_Post::FETCH_USER
	    ));
	    $preview = '';
	    if ($preview_length) {
		$preview = preview_chop(XenForo_Helper_String::bbCodeStrip(XenForo_Helper_String::censorString($post['message']), true), $preview_length);
	    }

	    $out = array(
		'thread_id' => $thread['thread_id'],
		'new_posts' => $thread['isNew'],
		'forum_id' => $thread['node_id'],
		'total_posts' => $thread['reply_count'] + 1,
		'forum_title' => prepare_utf8_string(strip_tags($thread['node_title'])),
		'thread_title' => prepare_utf8_string(XenForo_Helper_String::censorString($thread['title'])),
		'post_lastposttime' => prepare_utf8_string(XenForo_Locale::dateTime($thread['last_post_date'], 'absolute')),
	    );

	    if ($previewtype == 1) {
		$out['post_username'] = prepare_utf8_string(strip_tags($thread['username']));
		$out['post_userid'] = $thread['user_id'];
	    } else {
		$out['post_username'] = prepare_utf8_string(strip_tags($thread['last_post_username']));
		$out['post_userid'] = $thread['last_post_user_id'];
	    }

	    $user = $user_model->getUserById($out['post_userid']);
	    if ($user !== false) {
		$avatarurl = process_avatarurl(XenForo_Template_Helper_Core::getAvatarUrl($user, 'm'));
		if (strpos($avatarurl, '/xenforo/avatars/avatar_') !== false) {
		    $avatarurl = '';
		}
		if ($avatarurl != '') {
		    $out['avatarurl'] = $avatarurl;
		}
	    }
	    if ($preview != '') {
		$out['thread_preview'] = prepare_utf8_string(html_entity_decode($preview));
	    }
	    if ($thread['discussion_type'] == 'poll') {
		$out['poll'] = true;
            }

            if ($thread['prefix_id']) {
                $phrase = new XenForo_Phrase('thread_prefix_' . $thread['prefix_id']);
                $out['prefix'] = prepare_utf8_string(strip_tags($phrase->render(false)));
            }

	    $thread_data[] = $out;
	}

	$out = array(
	    'threads' => $thread_data,
	    'total_threads' => $search['result_count'],
	    'searchid' => $search_id,
	);

	return $out;
    }

    private function noResults ()
    {
	$no_results = new XenForo_Phrase('no_results_found');
	return array(
	    'threads' => array(
		array(
		    'error' => $no_results->render(),
		)
	    ),
	    'total_threads' => 1,
	);
    }

    protected function _postDispatch ($controllerResponse, $controllerName, $action) {}
    protected function _checkCsrf ($action) {}
}
