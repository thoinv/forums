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

class ForumRunner_ControllerPublic_Conversation extends XenForo_ControllerPublic_Conversation
{

    public function actionGetConversations ()
    {
	$visitor = XenForo_Visitor::getInstance();
	$conversation_model = $this->_getConversationModel();
	
	$page = max($this->_input->filterSingle('page', XenForo_Input::UINT), 1);
	$perpage = $this->_input->filterSingle('perpage', XenForo_Input::UINT);
	if (!$perpage) {
	    $perpage = XenForo_Application::get('options')->discussionsPerPage;
	}
	$previewtype = $this->_input->filterSingle('previewtype', XenForo_Input::UINT);
	if (!$previewtype) {
	    $previewtype = 2;
	}

	$total = $conversation_model->countConversationsForUser($visitor['user_id']);

	$conversations = $conversation_model->getConversationsForUser($visitor['user_id'], array(), array(
	    'page' => $page,
	    'perPage' => $perpage,
	));

	$conversation_data = array();
	$user_model = $this->getModelFromCache('XenForo_Model_User');
	
	$preview_length = XenForo_Application::get('options')->discussionPreviewLength;

	foreach ($conversations as $conv) {
	    $out = array(
		'conversation_id' => $conv['conversation_id'],
		'new_posts' => $conv['is_unread'],
		'total_messages' => $conv['reply_count'] + 1,
		'title' => prepare_utf8_string(strip_tags($conv['title'])),
		'lastmessagetime' => prepare_utf8_string(XenForo_Locale::dateTime($conv['last_message_date'], 'absolute')),
	    );

	    if ($previewtype == 1) {
		$out += array(
		    'username' => prepare_utf8_string(strip_tags($conv['username'])),
		    'userid' => $conv['user_id'],
		);
	    } else {
		$out += array(
		    'username' => prepare_utf8_string(strip_tags($conv['last_message_username'])),
		    'userid' => $conv['last_message_user_id'],
		);
	    }

	    $message = $conversation_model->getConversationMessageById($conv[$previewtype == 1 ? 'first_message_id' : 'last_message_id']);

	    $avatarurl = process_avatarurl(XenForo_Template_Helper_Core::getAvatarUrl($message, 'm'));
	    if (strpos($avatarurl, '/xenforo/avatars/avatar_') !== false) {
		$avatarurl = '';
	    }
	    if ($avatarurl != '') {
		$out['avatarurl'] = $avatarurl;
	    }

	    $preview = '';
	    if ($preview_length) {
		$preview = preview_chop(XenForo_Helper_String::bbCodeStrip(XenForo_Helper_String::censorString($message['message']), true), $preview_length);
	    }
	    if ($preview != '') {
		$out['preview'] = prepare_utf8_string(html_entity_decode($preview));
	    }

	    $conversation_data[] = $out;
	}

	return array(
	    'conversations' => $conversation_data,
	    'total_conversations' => $total,
	    'canstart' => $conversation_model->canStartConversations(),
	);
    }
    
    public function actionGetConversation ()
    {
	$conversationid = $this->_input->filterSingle('conversationid', XenForo_Input::UINT);
	$signature = $this->_input->filterSingle('signature', XenForo_Input::UINT);
	$page = max($this->_input->filterSingle('page', XenForo_Input::UINT), 1);
	$perpage = $this->_input->filterSingle('perpage', XenForo_Input::UINT);
	if (!$perpage) {
	    $perpage = XenForo_Application::get('options')->messagesPerPage;
	}
	
	$conversation_model = $this->_getConversationModel();
	$session_model = $this->getModelFromCache('XenForo_Model_Session');

	try {	
	    $conversation_info = $this->_getConversationOrError($conversationid);
	} catch (Exception $e) {
	    json_error($e->getControllerResponse()->errorText->render());
	}
	
	$gotomessageid = 0;
	if ($page == FR_LAST_POST) {
	    if (!$conversation_info['last_read_date']) {
		$page = 1;
	    } else {
		if ($conversation_info['last_read_date'] >= $conversation_info['last_message_date']) {
		    $first_unread = false;
		} else {
		    $first_unread = $conversation_model->getNextMessageInConversation($conversationid, $conversation_info['last_read_date']);
		}

		if (!$first_unread || $first_unread['message_id'] == $conversation_info['last_message_id']) {
		    $page = floor($conversation_info['reply_count'] / $perpage) + 1;
		    $gotomessageid = $conversation_info['last_message_id'];
		} else {
		    $before = $conversation_model->countMessagesBeforeDateInConversation($conversationid, $first_unread['message_date']);

		    $page = floor($before / $perpage) + 1;
		    $gotomessageid = $first_unread['message_id'];
		}
	    }
	}

	$recipients = $conversation_model->getConversationRecipients($conversationid);
	$messages = $conversation_model->getConversationMessages($conversationid, array(
	    'page' => $page,
	    'perPage' => $perpage,
	));

	$max = $conversation_model->getMaximumMessageDate($messages);
	if ($max > $conversation_info['last_read_date']) {
	    $conversation_model->markConversationAsRead(
		$conversationid, XenForo_Visitor::getUserId(), $max, $conversation_info['last_message_date']
	    );
	}

	$messages = $conversation_model->prepareMessages($messages, $conversation_info);
	$user_model = $this->getModelFromCache('XenForo_Model_User');

	foreach ($messages as &$message) {
	    $user = $user_model->getUserById($message['user_id']);
	    $online_info = $session_model->getSessionActivityRecords(
		array(
		    'user_id' => $message['user_id'],
		    'cutOff' => array('>', $session_model->getOnlineStatusTimeout())
		)
	    );
	    $is_online = false;
	    if (count($online_info) == 1) {
		$is_online = true;
	    }

	    list ($text, $nuked_quotes, $images) = parse_post(fr_strip_smilies($this, XenForo_Helper_String::censorString($message['message'])), true);
	    
	    $fr_images = array();
	    foreach ($images as $image) {
		$fr_images[] = array(
		    'img' => $image,
		);
	    }

	    $avatarurl = '';
	    if ($user !== false) {
		$avatarurl = process_avatarurl(XenForo_Template_Helper_Core::getAvatarUrl($user, 'm'));
		if (strpos($avatarurl, '/xenforo/avatars/avatar_') !== false) {
		    $avatarurl = '';
		}
	    }

	    $out = array(
		'post_id' => $message['message_id'],
		'thread_id' => $message['conversation_id'],
		'username' => prepare_utf8_string(strip_tags($message['username'])),
		'joindate' => prepare_utf8_string(XenForo_Locale::date($message['register_date'], 'absolute')),
		'usertitle' => XenForo_Template_Helper_Core::helperUserTitle($user),
		'numposts' => $user ? $user['message_count'] : 0,
		'userid' => $message['user_id'],
		'online' => $is_online,
		'post_timestamp' => prepare_utf8_string(XenForo_Locale::dateTime($message['message_date'], 'absolute')),
		'fr_images' => $fr_images,
		'text' => $text,
		'quotable' => $nuked_quotes,
	    );

	    if ($avatarurl != '') {
		$out['avatarurl'] = $avatarurl;
	    }

	    if ($signature) {
		$sig = trim(strip_tags(remove_bbcode($message['signature'], true, true), '<a>'));
		$sig = str_replace(array("\t", "\r"), array('', ''), $sig);
		$sig = str_replace("\n\n", "\n", $sig);
		$out['sig'] = prepare_utf8_string($sig);
	    }

	    $message_data[] = $out;
	}

	$out = array(
	    'posts' => $message_data,
	    'total_posts' => $conversation_info['reply_count'] + 1,
	    'page' => $page,
	    'canattach' => false,
	    'canpost' => true,
	    'title' => prepare_utf8_string(XenForo_Helper_String::censorString($conversation_info['title'])),
	    'thread_link' => process_avatarurl(XenForo_Link::buildPublicLink('conversations', $conversation_info)),
	);
	if ($gotomessageid) {
	    $out['gotopostid'] = $gotomessageid;
	}
	
	$r = array_values($conversation_model->getConversationRecipients($conversationid));
	$recipients = '';
	for ($i = 0; $i < count($r); $i++) {
	    if ($i != 0) {
		$recipients .= ', ';
	    }
	    $recipients .= prepare_utf8_string(strip_tags($r[$i]['username']));
	}
	$out['recipients'] = $recipients;

	return $out;
    }
    
    public function actionReplyConversation ()
    {
	$conversationid = $this->_input->filterSingle('conversationid', XenForo_Input::UINT);
	$message = $this->_input->filterSingle('message', XenForo_Input::STRING);
	$sig = $this->_input->filterSingle('sig', XenForo_Input::STRING);


	if (XenForo_Application::get('options')->forumrunnerSignatures && $sig) {
	    $message .= "\n\n" . $sig;
	}
	$message = XenForo_Helper_String::autoLinkBbCode($message);
	$visitor = XenForo_Visitor::getInstance();

	try {
	    $conversation_info = $this->_getConversationOrError($conversationid);
	    $this->_assertCanReplyToConversation($conversation_info);
	} catch (Exception $e) {
	    json_error($e->getControllerResponse()->errorText->render());
	}

	$m = XenForo_DataWriter::create('XenForo_DataWriter_ConversationMessage');
	$m->set('conversation_id', $conversation_info['conversation_id']);
	$m->set('user_id', $visitor['user_id']);
	$m->set('username', $visitor['username']);
	$m->set('message', $message);
	$m->preSave();

	if (!$m->hasErrors()) {
	    try {
		$this->assertNotFlooding('conversation');
	    } catch (Exception $e) {
		json_error($e->getControllerResponse()->errorText->render());
	    }
	}

	$m->save();

	return array('success' => true);
    }
    
    public function actionLeaveConversation ()
    {
	$conversationid = $this->_input->filterSingle('conversationid', XenForo_Input::UINT);
	$delete_type = $this->_input->filterSingle('delete_type', XenForo_Input::STRING);

	try {
	    $conversation_info = $this->_getConversationOrError($conversationid);
	} catch (Exception $e) {
	    json_error($e->getControllerResponse()->errorText->render());
	}

	$this->_getConversationModel()->deleteConversationForUser(
	    $conversationid, XenForo_Visitor::getUserId(), $delete_type
	);

	return array('success' => true);
    }
    
    public function actionStartConversation ()
    {
	if (!$this->_getConversationModel()->canStartConversations($error_phrase)) {
	    $error = new XenForo_Phrase($error_phrase);
	    json_error($error->render());
	}

	$visitor = XenForo_Visitor::getInstance();

	$vals = $this->_input->filter(array(
	    'title' => XenForo_Input::STRING,
	    'recipients' => XenForo_Input::STRING,
	    'message' => XenForo_Input::STRING,
	    'sig' => XenForo_Input::STRING,
	));

	// TODO: Allow invites, lock conversation

	if (XenForo_Application::get('options')->forumrunnerSignatures && $vals['sig']) {
	    $vals['message'] .= "\n\n" . $vals['sig'];
	}
	$vals['message'] = XenForo_Helper_String::autoLinkBbCode($vals['message']);

	$c = XenForo_DataWriter::create('XenForo_DataWriter_ConversationMaster');
	$c->set('user_id', $visitor['user_id']);
	$c->set('username', $visitor['username']);
	$c->set('title', $vals['title']);
	$c->set('open_invite', 0); // XXX RKJ
	$c->set('conversation_open', 1); // XXX RKJ

	$c->addRecipientUserNames(explode(';', $vals['recipients']));

	if ($c->hasErrors()) {
	    $error_text = '';
	    foreach ($c->getErrors() as $error) {
		$error_text .= $error->render() . "\n";
	    }
	    json_error($error_text);
	}

	$m = $c->getFirstMessageDw();
	$m->set('message', $vals['message']);

	$c->preSave();

	if (!$c->hasErrors()) {
	    try {
		$this->assertNotFlooding('conversation');
	    } catch (Exception $e) {
		json_error($e->getControllerResponse()->errorText->render());
	    }
	}

	try {
	    $c->save();
	} catch (Exception $e) {
	    $error_text = '';
	    foreach ($e->getMessages() as $error) {
		$error_text .= $error->render() . "\n";
	    }
	    json_error($error_text);
	}

	return array('success' => true);
    }

    protected function _postDispatch ($controllerResponse, $controllerName, $action) {}
    protected function _checkCsrf ($action) {}
}
