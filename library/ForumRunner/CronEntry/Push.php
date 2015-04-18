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

define('MCWD', (($getcwd = getcwd()) ? $getcwd : '.') . '/forumrunner');

require_once(MCWD . '/support/Snoopy.class.php');

class ForumRunner_CronEntry_Push
{
    public static function doPush()
    {
	require_once(MCWD . '/sitekey.php');
	require_once(MCWD . '/version.php');

	$debug = false;

	$db = XenForo_Application::get('db');
	$visitor = XenForo_Visitor::getInstance();
	$watch_model = XenForo_Model::create('XenForo_Model_ThreadWatch');

	// You must have your valid Forum Runner forum site key.  This can be
	// obtained from http://www.forumrunner.com in the Forum Manager.
	if (!$mykey || $mykey == '') {
	    return;
	}

	// First of all, expire all users who have not logged in for 2 weeks, so
	// we don't keep spamming the server with their entries.
	$db->query("
	    DELETE FROM xf_forumrunner_push_users
	    WHERE last_login < DATE_SUB(NOW(), INTERVAL 14 DAY)
	");

	// Get list of users to check for updates to push
	$users = $db->fetchAll("
	    SELECT user_id, fr_username, b, token
	    FROM xf_forumrunner_push_users
	");

	$out_msg = array();

	foreach ($users as $user) {
	    $conversations = $subscriptions = array();

	    $convs = $db->fetchAll("
		SELECT conversation_master.*,
		    conversation_user.*,
		    conversation_starter.*,
		    conversation_recipient.recipient_state, conversation_recipient.last_read_date
		FROM xf_conversation_user AS conversation_user
		INNER JOIN xf_conversation_master AS conversation_master ON
		    (conversation_user.conversation_id = conversation_master.conversation_id)
		INNER JOIN xf_conversation_recipient AS conversation_recipient ON
		    (conversation_user.conversation_id = conversation_recipient.conversation_id
		    AND conversation_user.owner_user_id = conversation_recipient.user_id)
		LEFT JOIN xf_user AS conversation_starter ON
		    (conversation_starter.user_id = conversation_master.user_id)
		WHERE conversation_user.owner_user_id = ? AND conversation_user.is_unread = 1
		ORDER BY conversation_user.last_message_date DESC
	    ", $user['user_id']);

	    // This is the list of all conversations with unread messages
	    foreach ($convs as $conv) {

		// Let's see if we sent a notice for this conversation already
		$sentconversation = $db->fetchRow("
		    SELECT * FROM xf_forumrunner_push_data
		    WHERE conversation_id = ? AND user_id = ?",
		    array($conv['conversation_id'], $user['user_id'])
		);

		if ($sentconversation) {
		    // We have sent a notice about this conversation at some point, lets see if
		    // our update is newer.
		    if ($sentconversation['threadread'] < $conv['last_activity']) {
			// Yup.  Send a notice and update table.
			if ($sentconversation['subsent']) {
			    continue;
			}

			$conversations[] = array(
			    'conversationid' => $conv['conversation_id'],
			    'last_message_username' => $conv['last_message_username'],
			);

			if ($debug) {
			    continue;
			}

			$db->query("
			    UPDATE xf_forumrunner_push_data
			    SET threadread = ?, subsent = 1
			    WHERE id = ?",
			    array($conv['last_activity'], $sentconversation['id'])
			);

		    } // Already sent update
		} else {
		    // Nope, send an update and insert new
		    $conversations[] = array(
			'conversationid' => $conv['conversation_id'],
			'last_message_username' => $conv['last_message_username'],
		    );

		    if ($debug) {
			continue;
		    }

		    $db->query("
			INSERT INTO xf_forumrunner_push_data
			(user_id, conversation_id, threadread, subsent)
			VALUES (?, ?, ?, ?)",
			array($user['user_id'], $conv['conversation_id'], $conv['last_activity'], 1)
		    );
		}
	    }

	    unset($convs);

	    // Now subscribed (watched) threads
	    $watched = $watch_model->getThreadsWatchedByUser($user['user_id'], true);
	    foreach ($watched as $watch) {

		// This is an updated thread since last time they were on the forum
		// Let's see if we sent this already
		$sentsubscription = $db->fetchRow("
		    SELECT * FROM xf_forumrunner_push_data
		    WHERE thread_id = ? AND user_id = ?",
		    array($watch['thread_id'], $user['user_id'])
		);

		if ($sentsubscription) {
		    // We have sent a notice about this thread at some point, lets see if
		    // our update is newer.
		    if ($sentsubscription['threadread'] < $watch['last_post_date']) {
			// Yup.  Send a notice and update table.
			if ($sentsubscription['subsent']) {
			    continue;
			}

			$subscriptions[] = array(
			    'threadid' => $watch['thread_id'],
			    'title' => $watch['title'],
			);

			if ($debug) {
			    continue;
			}
			$db->query("
			    UPDATE xf_forumrunner_push_data
			    SET threadread = ?, subsent = 1
			    WHERE id = ?",
			    array($watch['last_post_date'], $sentsubscription['id'])
			);

		    } // Already sent update
		} else {
		    // Nope, send an update and insert new
		    $subscriptions[] = array(
			'threadid' => $watch['thread_id'],
			'title' => $watch['title'],
		    );

		    if ($debug) {
			continue;
		    }

		    $db->query("
			INSERT INTO xf_forumrunner_push_data
			(user_id, thread_id, threadread, subsent)
			VALUES (?, ?, ?, ?)",
			array($user['user_id'], $watch['thread_id'], $watch['last_post_date'], 1)
		    );
		}
	    }
	    unset($watched);

	    $total = count($subscriptions) + count($conversations);

	    // Nothing to see here... move along....
	    $hasconv = (count($conversations) > 0);
	    $hassub = (count($subscriptions) > 0);
	    if (!$hasconv && !$hassub) {
		continue;
	    }

	    // Forum name is always first arg.
	    $msgargs = array(base64_encode(XenForo_Application::get('options')->boardTitle));

	    $convpart = 0;
	    if ($hasconv) {
		if (count($conversations) > 1) {
		    $msgargs[] = base64_encode(count($conversations));
		    $convpart = 2;
		} else {
		    $first_conv = array_shift($conversations);
		    $msgargs[] = base64_encode($first_conv['last_message_username']);
		    $convpart = 1;
		}
	    }

	    $subpart = 0;
	    if ($hassub) {
		if (count($subscriptions) > 1) {
		    $msgargs[] = base64_encode(count($subscriptions));
		    $subpart = 2;
		} else {
		    $first_sub = array_shift($subscriptions);
		    $msgargs[] = base64_encode($first_sub['title']);
		    $subpart = 1;
		}
	    }

	    $data = array(
		'b' => $user['b'],
		'pm' => $hasconv,
		'subs' => $hassub,
		'm' => "__FR_PUSH_{$convpart}PM_{$subpart}SUB",
		'a' => $msgargs,
		't' => $total,
	    );
	    if ($user['token']) {
		// Branded app - send along token
		$data['token'] = $user['token'];
	    } else if ($user['fr_username']) {
		// Non branded app - send along push notification username
		$data['u'] = $user['fr_username'];
	    }
	    $out_msg[] = $data;
	}

	// Send our update to Forum Runner central push server.  Silently fail if
	// necessary.
	if (count($out_msg) > 0) {
	    $snoopy = new snoopy();
	    $snoopy->submit('http://push.forumrunner.com/push.php',
		array(
		    'k' => $mykey,
		    'm' => serialize($out_msg),
		    'v' => $fr_version,
		    'p' => $fr_platform,
		)
	    );
	}
    }
}

?>
