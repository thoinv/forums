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

class ForumRunner_ControllerPublic_Moderation extends XenForo_ControllerPublic_Abstract
{

    public function actionBanUser ()
    {
	if (!XenForo_Visitor::getInstance()->hasAdminPermission('ban')) {
	    $p = new XenForo_Phrase('do_not_have_permission');
	    json_error($p->render());
	}

	$vals = $this->_input->filter(array(
	    'userid' => XenForo_Input::UINT,
	    'period' => XenForo_Input::STRING,
	    'reason' => XenForo_Input::STRING,
	));

	$user_model = $this->getModelFromCache('XenForo_Model_User');

	$m = array();
	if ($vals['period'] != 'PERMANENT') {
	    if (!preg_match('#^(D|M|Y)_([1-9][0-9]?)$#', $vals['period'], $m)) {
		json_error(ERR_NO_PERMISSION);
	    }

	    switch ($m[1]) {
	    case 'D': $len = intval($m[2]); break;
	    case 'M': $len = intval($m[2]) * 30; break;
	    case 'Y': $len = intval($m[2]) * 365; break;
	    }
	    $date = XenForo_Application::$time + ($len * 86400);
	} else {
	    $date = 0;
	}

	try {
	    if (!$user_model->ban($vals['userid'], $date, $vals['reason'], false, $error)) {
		$p = new XenForo_Phrase($error);
		json_error($p->render());
	    }
	} catch (Exception $e) {
	    $error_text = '';
	    foreach ($e->getMessages() as $error) {
		$error_text .= $error->render() . "\n";
	    }
	    json_error($error_text);
	}

	return array('success' => true);
    }

    public function actionModeration ()
    {
	$threadid = $this->_input->filterSingle('threadid', XenForo_Input::UINT);
	$postids = $this->_input->filterSingle('postids', XenForo_Input::STRING);
	$do = $this->_input->filterSingle('do', XenForo_Input::STRING);

	switch ($do) {
	case 'unlock':
	    return $this->executeModeration('XenForo_Model_InlineMod_Thread', 'unlockThreads', array($threadid));
	case 'lock':
	    return $this->executeModeration('XenForo_Model_InlineMod_Thread', 'lockThreads', array($threadid));
	case 'stick':
	    return $this->executeModeration('XenForo_Model_InlineMod_Thread', 'stickThreads', array($threadid));
	case 'unstick':
	    return $this->executeModeration('XenForo_Model_InlineMod_Thread', 'unstickThreads', array($threadid));
	case 'undeleteposts':
	    $postids_array = preg_split('/,/', $postids);
	    return $this->executeModeration('XenForo_Model_InlineMod_Post', 'undeletePosts', $postids_array);
	case 'dodeleteposts':
	    $postids_array = preg_split('/,/', $postids);
	    return $this->executeDeletePosts($postids_array);
	case 'dodeletespam':
	    return $this->executeDeleteAsSpam();
	case 'dodeletethread':
	    return $this->executeDeleteThread($threadid);
	case 'domovethread':
	    return $this->executeMoveThread($threadid);
	case 'getforums':
	    $forums = $this->getModelFromCache('XenForo_Model_Node')->getViewableNodeList();
	    $forums_out = array();
	    foreach ($forums as $forum) {
		if ($forum['node_type_id'] != 'Forum') {
		    continue;
		}
		$forums_out[] = array(
		    'id' => $forum['node_id'],
		    'title' => prepare_utf8_string(strip_tags($forum['title'])),
		);
	    }
	    return array('forums' => $forums_out);
	}

	return array('success' => true);
    }

    public function executeDeleteAsSpam ()
    {
	$spam_data = $this->fetchSpamData();

	$user_model = $this->getModelFromCache('XenForo_Model_User');

	if (isset($spam_data['userids']) && is_array($spam_data['userids'])) {
	    foreach ($spam_data['userids'] as $userid) {
		$user = $user_model->getUserById($userid, array('join' => XenForo_Model_User::FETCH_LAST_ACTIVITY));
		if (!$user) {
		    $phrase = new XenForo_Phrase('requested_member_not_found');
		    json_error($phrase->render());
		}

		if (!$user_model->couldBeSpammer($user, $error)) {
		    $phrase = new XenForo_Phrase($error);
		    json_error($phrase->render());
		}

		$vals = $this->_input->filter(array(
		    'banusers' => XenForo_Input::UINT,
		    'deleteother' => XenForo_Input::UINT,
		));

		$options = array(
		    'action_threads' => 1,
		    'delete_messages' => 1,
		    'ban_user' => $vals['banusers'],
		    'check_ips' => 0,
		    'email_user' => 0,
		    'email' => '',
		);

		$spam_model = $this->getModelFromCache('XenForo_Model_SpamCleaner');

		if (!$log = $spam_model->cleanUp($user, $options, $log, $error)) {
		    $phrase = new XenForo_Phrase($error);
		    json_error($phrase->render());
		}
	    }
	}

	return array('success' => true);
    }

    public function executeModeration ($model_name, $function, $ids = array(), $options = array())
    {
	$model = $this->getModelFromCache($model_name);

	if (!$model->$function($ids, $options, $error)) {
	    $phrase = new XenForo_Phrase($error);
	    json_error($phrase->render());
	}

	return array('success' => true);
    }

    public function actionGetSpamData ()
    {
	return $this->fetchSpamData();
    }

    public function fetchSpamData ()
    {
	if (!XenForo_Visitor::getInstance()->hasPermission('general', 'cleanSpam')) {
	    $phrase = new XenForo_Phrase('do_not_have_permission');
	    json_error($phrase->render());
	}

	$visitor = XenForo_Visitor::getInstance();

	$user_model = $this->getModelFromCache('XenForo_Model_User');
	$thread_model = $this->getModelFromCache('XenForo_Model_Thread');
	$post_model = $this->getModelFromCache('XenForo_Model_Post');

	$threadid = $this->_input->filterSingle('threadid', XenForo_Input::UINT);
	$postids = $this->_input->filterSingle('postids', XenForo_Input::STRING);
	$helper = $this->getHelper('ForumThreadPost');

	$userids = $users = $ips = array();

	$can_view_ips = $user_model->canViewIps();

	// If we have a thread id, figure out who started it
	if ($threadid) {
	    try {
		list($thread_info, $forum_info) = $helper->assertThreadValidAndViewable($threadid,
		    array(
			'readUserId' => $visitor['user_id'],
			'watchUserId' => $visitor['user_id'],
		    ),
		    array(
			'readUserId' => $visitor['user_id'],
		    )
		);

		$user = $user_model->getUserById($thread_info['user_id']);
		if (!$user_model->couldBeSpammer($user)) {
		    return array('no_spam' => true);
		}

		$userids[] = (string)$thread_info['user_id'];
		$users[] = prepare_utf8_string(strip_tags($thread_info['username']));

		if ($can_view_ips) {
		    list($post_info, $thread_info, $forum_info) = $helper->assertPostValidAndViewable($thread_info['first_post_id']);
		    $ip_info = $this->getModelFromCache('XenForo_Model_Ip')->getContentIpInfo($post_info);
		    $ips[] = $ip_info['contentIp'];
		}
	    } catch (Exception $e) {
		json_error($e->getControllerResponse()->errorText->render());
	    }
	} else if ($postids) {
	    $postids_array = preg_split('/,/', $postids);

	    $posts = $post_model->getPostsByIds($postids_array, array(
		'join' => XenForo_Model_Post::FETCH_THREAD
	    ));
	    foreach ($posts as $post) {
		$user = $user_model->getUserById($post['user_id']);
		if (!$user_model->couldBeSpammer($user)) {
		    continue;
		}

		$userids[] = (string)$post['user_id'];
		$users[] = prepare_utf8_string(strip_tags($post['username']));

		if ($can_view_ips) {
		    $ip_info = $this->getModelFromCache('XenForo_Model_Ip')->getContentIpInfo($post);
		    $ips[] = $ip_info['contentIp'];
		}
	    }
	    if (!count($userids)) {
		return array('no_spam' => true);
	    }
	}

	return array(
	    'userids' => $userids,
	    'users' => $users,
	    'ips' => $ips,
	    'punitive' => true,
	);
    }

    public function executeDeleteThread ($threadid)
    {
	$reason = $this->_input->filterSingle('deletereason', XenForo_Input::STRING);
	$deletetype = $this->_input->filterSingle('deletetype', XenForo_Input::UINT);

	$deleted = $this->getModelFromCache('XenForo_Model_InlineMod_Thread')->deleteThreads(
	    array($threadid),
	    array(
		'deleteType' => ($deletetype == 1 ? 'soft' : 'hard'),
		'reason' => $reason,
	    ), $error
	);
	if (!$deleted) {
	    $phrase = new XenForo_Phrase($error);
	    json_error($phrase->render());
	}

	return array('success' => true);
    }

    public function executeDeletePosts ($postids_array)
    {
	$reason = $this->_input->filterSingle('deletereason', XenForo_Input::STRING);
	$deletetype = $this->_input->filterSingle('deletetype', XenForo_Input::UINT);

	$options = array(
	    'deleteType' => ($deletetype == 1 ? 'soft' : 'hard'),
	    'reason' => $reason,
	);

	return $this->executeModeration('XenForo_Model_InlineMod_Post', 'deletePosts', $postids_array, $options);
    }

    public function executeMoveThread ($threadid)
    {
	$destination_forumid  = $this->_input->filterSingle('destforumid', XenForo_Input::UINT);
	$redirect = $this->_input->filterSingle('redirect', XenForo_Input::STRING);

	$input = $this->_input->filter(array(
	    'node_id' => XenForo_Input::UINT,
	    'create_redirect' => XenForo_Input::STRING,
	    'redirect_ttl_value' => XenForo_Input::UINT,
	    'redirect_ttl_unit' => XenForo_Input::STRING
	));

	$viewable = $this->getModelFromCache('XenForo_Model_Node')->getViewableNodeList();
	if (!isset($viewable[$destination_forumid])) {
	    $p = new XenForo_Phrase('do_not_have_permission');
	    json_error($p->render());
	}

	if ($redirect == 'perm') {
	    $options = array(
		'redirectExpiry' => 0,
		'redirect' => true,
	    );
	} else {
	    // No redirect - maybe add expiring later. RKJ
	    $options = array(
		'redirect' => false,
	    );
	}

	$threadids = array($threadid);

	if (!$this->getModelFromCache('XenForo_Model_InlineMod_Thread')->moveThreads($threadids, $destination_forumid, $options, $error)) {
	    $phrase = new XenForo_Phrase($error);
	    json_error($phrase->render());
	}

	return array('success' => true);
    }

    public function actionDeletePost()
    {
	$vals = $this->_input->filter(array(
	    'postid' => XenForo_Input::UINT,
	    'reason' => XenForo_Input::STRING,
	));

        $helper = $this->getHelper('ForumThreadPost');
        $post_model = $this->getModelFromCache('XenForo_Model_Post');

	try {
	    list($post_info, $thread_info, $forum_info) = $helper->assertPostValidAndViewable($vals['postid']);
	} catch (Exception $e) {
	    json_error($e->getControllerResponse()->errorText->render());
	}

        // Only allow users to soft delete
        $delete_type = 'soft';

        if (!$post_model->canDeletePost($post_info, $thread_info, $forum_info, $delete_type, $error_phrase_key)) {
            json_error(fr_get_phrase($error_phrase_key));
        }

        $options = array(
            'reason' => $vals['reason'],
        );

        $dw = $post_model->deletePost($vals['postid'], $delete_type, $options);

        return array('success' => true);
    }

    protected function _checkCsrf($action) {}
}
