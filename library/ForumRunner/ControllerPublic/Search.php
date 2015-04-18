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

class ForumRunner_ControllerPublic_Search extends XenForo_ControllerPublic_Search
{

    public function actionSearch ()
    {
	$visitor = XenForo_Visitor::getInstance()->toArray();
	$visitor_userid = XenForo_Visitor::getUserId();
	$search_model = $this->_getSearchModel();
	$node_model = $this->_getNodeModel();
	$user_model = $this->getModelFromCache('XenForo_Model_User');

	$vals = $this->_input->filter(array(
	    'userid' => XenForo_Input::UINT,       // users
	    'showposts' => XenForo_Input::UINT,    // group_discussion
	    'searchdate' => XenForo_Input::UINT,   // date
	    'query' => XenForo_Input::STRING,      // keywords
	    'searchuser' => XenForo_Input::STRING, // users
	    'sortby' => XenForo_Input::STRING,     // order
	    'starteronly' => XenForo_Input::UINT,  // user_content
	    'titleonly' => XenForo_Input::UINT,    // title_only
	));

	// Munge FR search constrants into XenForo search constraints
	$xf_input = array();
	if ($vals['sortby'] == 'replycount') {
	    $xf_input['order'] = 'replies';
	} else {
	    $xf_input['order'] = 'date';
	}
	if ($vals['showposts'] == 1) {
	    $xf_input['group_discussion'] = 0;
	} else {
	    $xf_input['group_discussion'] = 1;
	}
	if ($vals['starteronly']) {
	    $xf_input['user_content'] = 'thread';
	}

	if ($vals['searchdate']) {
	    $xf_input['date'] = date('Y-m-d', XenForo_Application::$time - $vals['searchdate'] * 86400);
	}

	$exclude = XenForo_Application::get('options')->forumrunnerExcludeForums;
	if (!$exclude) {
	    $exclude = array();
	}
	$forums = $node_model->getViewableNodeList(null, true);
	foreach ($exclude as $remove) {
	    fr_remove_node_and_children($forums, $remove);
	}
	$xf_input['nodes'] = array_keys($forums);

	$query = $vals['query'];
	$vals['query'] = XenForo_Helper_String::censorString($vals['query'], null, '');

	if ($vals['userid']) {
	    // Look up Username
	    $user = $user_model->getUserById($vals['userid']);
	    if ($user) {
		$vals['searchuser'] = $user['username'];
	    }
	}

	$xf_input += array(
	    'users' => $vals['searchuser'],
	    'keywords' => $vals['query'],
	    'title_only' => $vals['titleonly'] ? 1 : 0,
	);

	$cons = $search_model->getGeneralConstraintsFromInput($xf_input, $errors);
	if ($errors) {
	    return $this->sendError($errors[0]);
	}

	if ($xf_input['keywords'] == '' && empty($cons['user'])) {
	    return $this->sendError(new XenForo_Phrase('please_specify_search_query_or_name_of_member'));
	}

	$post_handler = $search_model->getSearchDataHandler('post');

	$search = $search_model->getExistingSearch('post', $xf_input['keywords'], $cons, $xf_input['order'], $xf_input['group_discussion'], $visitor_userid);

	if (!$search) {
	    $searcher = new XenForo_Search_Searcher($search_model);

	    if ($post_handler) {
		$results = $searcher->searchType(
		    $post_handler, $xf_input['keywords'], $cons, $xf_input['order'], $xf_input['group_discussion']
		);
	    } else {
		$results = $searcher->searchGeneral($xf_input['keywords'], $cons, $xf_input['order']);
	    }
	    
	    if (!$results) {
		$errors = $searcher->getErrors();
		if ($errors) {
		    $errors = array_values($errors);
		    return $this->sendError($errors[0]);
		}
		return $this->sendError(new XenForo_Phrase('no_results_found'));
	    }

	    $search = $search_model->insertSearch($results, 'post', $query, $cons, $xf_input['order'], $xf_input['group_discussion'], $searcher->getWarnings(), $visitor_userid);
	}

	return $this->processSearch($search);
    }
    
    public function actionSearchContinue ()
    {
	$search_model = $this->_getSearchModel();
	$searchid = $this->_input->filterSingle('searchid', XenForo_Input::UINT);
	$search = $search_model->getSearchById($searchid);
	return $this->processSearch($search);
    }

    private function processSearch (&$search)
    {
	$vals = $this->_input->filter(array(
	    'page' => XenForo_Input::UINT,
	    'perpage' => XenForo_Input::UINT,
	    'previewtype' => XenForo_Input::UINT,
	    'starteronly' => XenForo_Input::UINT,
	));

	$vals['page'] = max($vals['page'], 1);
	$vals['perpage'] = min(XenForo_Application::get('options')->discussionsPerPage, $vals['perpage']);
	if (!$vals['perpage']) {
	    $vals['perpage'] = XenForo_Application::get('options')->discussionsPerPage;
	}
	if (!$vals['previewtype']) {
	    $vals['previewtype'] = 2;
	}
	if ($vals['starteronly']) {
	    $vals['previewtype'] = 1;
	}

	$search_model = $this->_getSearchModel();

	$search_id = $search['search_id'];

	$resultids = $search_model->sliceSearchResultsToPage($search, $vals['page'], $vals['perpage']);
	$results = $search_model->getSearchResultsForDisplay($resultids);
	if (!$results) {
	    return $this->sendError(new XenForo_Phrase('no_results_found'));
	}

	$post_model = $this->getModelFromCache('XenForo_Model_Post');
	$user_model = $this->getModelFromCache('XenForo_Model_User');

	$thread_data = array();
	$preview_length = XenForo_Application::get('options')->discussionPreviewLength;

	foreach ($results['results'] AS $result) {
	    $thread = $result['content'];
	    $is_post = ($result['content_type'] == 'post');
	    if ($is_post) {
		$post = $post_model->getPostById($thread['post_id'], array(
		    'join' => XenForo_Model_Post::FETCH_USER
		));
	    } else {
		$post = $post_model->getPostById($thread[$vals['previewtype'] == 1 ? 'first_post_id' : 'last_post_id'], array(
		    'join' => XenForo_Model_Post::FETCH_USER
		));
	    }

	    $preview = '';
	    if ($preview_length) {
		$preview = preview_chop(XenForo_Helper_String::bbCodeStrip(XenForo_Helper_String::censorString($thread['message']), true), $preview_length);
	    }

	    $out = array(
		'thread_id' => $thread['thread_id'],
		'new_posts' => $thread['isNew'],
		'forum_id' => $thread['node_id'],
		'total_posts' => $thread['reply_count'] + 1,
		'forum_title' => prepare_utf8_string(strip_tags($thread['node_title'])),
		'thread_title' => prepare_utf8_string(XenForo_Helper_String::censorString($thread['title'])),
	    );

	    if ($is_post) {
		$out += array(
		    'post_id' => $thread['post_id'],
		    'jump_to_post' => 1,
		    'post_username' => prepare_utf8_string(strip_tags($thread['username'])),
		    'post_userid' => $thread['user_id'],
		    'post_lastposttime' => prepare_utf8_string(XenForo_Locale::dateTime($thread['post_date'], 'absolute')),
		);
	    } else {
		if ($vals['previewtype'] == 1) {
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
		$out['post_lastposttime'] = prepare_utf8_string(XenForo_Locale::dateTime($thread['last_post_date'], 'absolute'));
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
    
    public function actionFindUser ()
    {
	return $this->actionSearch();
    }

    private function sendError (&$phrase)
    {
	return array(
	    'threads' => array(
		array(
		    'error' => $phrase->render(),
		)
	    ),
	    'total_threads' => 1,
	);
    }


    protected function _postDispatch ($controllerResponse, $controllerName, $action) {}
    protected function _checkCsrf ($action) {}
}
