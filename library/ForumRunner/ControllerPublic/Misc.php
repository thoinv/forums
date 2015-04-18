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

class ForumRunner_ControllerPublic_Misc extends XenForo_ControllerPublic_Abstract
{

    public function actionGetUnreadPMs ($userid=0)
    {
	$visitor = XenForo_Visitor::getInstance();
	$user_model = $this->getModelFromCache('XenForo_Model_User');

	if ($userid) {
	    $user = $user_model->getUserById($userid);
	} else {
	    $user = $visitor->toArray();
	}

	$pm = 0;
	if ($visitor['user_id']) {
	    $pm = $user['conversations_unread'];
	}

	return $pm;
    }

    public function actionGetUnreadSubs ($userid=0)
    {
	$visitor = XenForo_Visitor::getInstance()->toArray();

	$sub = 0;
	if ($visitor['user_id'] || $userid) {
	    $watch_model = $this->getModelFromCache('XenForo_Model_ThreadWatch');
	    $threads = $watch_model->getThreadsWatchedByUser($userid ? $userid : $visitor['user_id'], true);
	    $sub = count($threads);
	}

	return $sub;
    }

    public function actionGetNewUpdates ()
    {
	$vals = $this->_input->filter(array(
	    'username' => XenForo_Input::STRING,
	    'password' => XenForo_Input::STRING,
	    'md5_password' => XenForo_Input::STRING,
	    'fr_username' => XenForo_Input::STRING,
	    'fr_b' => XenForo_Input::UINT,
	));

	if (!$vals['username'] || (!$vals['password'] && !$vals['md5_password'])) {
	    fr_no_permission();
	}

	$user_model = $this->getModelFromCache('XenForo_Model_User');

	$visitor = XenForo_Visitor::getInstance();

	$pms = $subs = 0;

	$userid = $user_model->validateAuthentication($vals['username'], $vals['password'], $error);
	if ($userid) {
	    $pms = $this->actionGetUnreadPMs($userid);
	    $subs = $this->actionGetUnreadSubs($userid);
	}

	fr_update_push_user($vals['fr_username'], $vals['fr_b']);

	return array(
	    'pm_notices' => $pms,
	    'sub_notices' => $subs,
	);
    }

    public function actionRemoveFRUser ()
    {
	$username = $this->_input->filterSingle('fr_username', XenForo_Input::STRING);
	$visitor = XenForo_Visitor::getInstance();

	if (!$username || !$visitor->getUserId()) {
	    fr_no_permission();
	}

	$tableinfo = $db->fetchRow("
	    SHOW TABLES LIKE 'xf_forumrunner_push_users'
	");
	if ($tableinfo) {
	    $db->query("
		DELETE FROM xf_forumrunner_push_users
		WHERE fr_username = " . $db->quote($username) . " AND vb_userid = " . $visitor->getUserId() . "
	    ");
	}

	return array('success' => true);
    }
    
    public function actionSetPushToken ()
    {
	$token = $this->_input->filterSingle('token', XenForo_Input::STRING);
	$visitor = XenForo_Visitor::getInstance();

	if (!$visitor->getUserId()) {
	    fr_no_permission();
	}

        fr_update_push_user('', 1, $token);

	return array('success' => true);
    }

    public function actionGetStats ()
    {
	return array('success' => true);
    }

    public function actionReport ()
    {
	return array('success' => true);
    }
	
    public static function getSessionActivityDetailsForList(array $activities)
    {
	return new XenForo_Phrase('browsing_via_forum_runner');
    }

    protected function _assertViewingPermissions($action) {}
    protected function _checkCsrf ($action) {}
}
