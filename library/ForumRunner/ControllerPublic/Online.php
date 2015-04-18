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

class ForumRunner_ControllerPublic_Online extends XenForo_ControllerPublic_Online
{

    public function actionGetOnline ()
    {
	$session_model = $this->_getSessionModel();

	$bypass_privacy = $this->_getUserModel()->canBypassUserPrivacy();
	$visitor = XenForo_Visitor::getInstance();

	$online = $session_model->getSessionActivityRecords(
	    array(
		'cutOff' => array('>', $session_model->getOnlineStatusTimeout()),
		'getInvisible' => $bypass_privacy,
		'getUnconfirmed' => $bypass_privacy,
		'forceInclude' => true,
	    ), array(
		'join' => XenForo_Model_Session::FETCH_USER,
		'order' => 'view_date'
	    )
	);
	$online = $session_model->addSessionActivityDetailsToList($online);

	$totals = $session_model->getSessionActivityQuickList(
	    $visitor->toArray(),
	    array('cutOff' => array('>', $session_model->getOnlineStatusTimeout())),
	    ($visitor['user_id'] ? $visitor->toArray() : null)
	);

	$online_users = array();
	foreach ($online as $rec) {
	    if (!$rec['user_id']) {
		continue;
	    }
	    $activity = '';
	    if ($rec['activityDescription'] instanceof XenForo_Phrase) {
		$activity = $rec['activityDescription']->render();
	    }
	    $out = array(
		'userid' => $rec['user_id'],
		'username' => prepare_utf8_string(strip_tags($rec['username'])),
	    );
	    if ($activity != '') {
		$out['activity'] = prepare_utf8_string($activity);
	    }
	    if ($visitor->getUserId() == $rec['user_id']) {
		$out['me'] = true;
	    }
	    $avatarurl = process_avatarurl(XenForo_Template_Helper_Core::getAvatarUrl($rec, 'm'));
	    if (strpos($avatarurl, '/xenforo/avatars/avatar_') !== false) {
		$avatarurl = '';
	    }
	    if ($avatarurl != '') {
		$out['avatarurl'] = $avatarurl;
	    }
	    $online_users[] = $out;
	}

	return array(
	    'users' => $online_users,
	    'num_guests' => $totals['guests'],
	);
    }

    protected function _checkCsrf($action) {}
}
