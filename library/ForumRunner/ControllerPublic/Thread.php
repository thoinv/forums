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

class ForumRunner_ControllerPublic_Thread extends XenForo_ControllerPublic_Thread
{

    public function actionGetThread ()
    {
	$threadid = $this->_input->filterSingle('threadid', XenForo_Input::UINT);
	$postid = $this->_input->filterSingle('postid', XenForo_Input::UINT);
	$signature = $this->_input->filterSingle('signature', XenForo_Input::UINT);
	$page = max($this->_input->filterSingle('page', XenForo_Input::UINT), 1);
	$perpage = $this->_input->filterSingle('perpage', XenForo_Input::UINT);
	if (!$perpage) {
	    $perpage = XenForo_Application::get('options')->messagesPerPage;
	}

	$visitor = XenForo_Visitor::getInstance();
	$user_model = $this->getModelFromCache('XenForo_Model_User');
	$thread_model = $this->_getThreadModel();
	$post_model = $this->_getPostModel();
	$forum_model = $this->_getForumModel();
	$session_model = $this->getModelFromCache('XenForo_Model_Session');
	$helper = $this->getHelper('ForumThreadPost');
	$post_helper = new ForumRunner_ControllerHelper_Post($this);

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
	} catch (Exception $e) {
	    json_error($e->getControllerResponse()->errorText->render());
	}

	$gotopostid = 0;
	if ($page == FR_LAST_POST) {
	    // Figure out our last post page and post id
	    $options = $post_model->getPermissionBasedPostFetchOptions($thread_info, $forum_info);
	    $read_date = $thread_model->getMaxThreadReadDate($thread_info, $forum_info);
	    $first_unread = $post_model->getNextPostInThread($threadid, $read_date, $options);
	    if (!$first_unread) {
		$first_unread = $post_model->getLastPostInThread($threadid, $options);
	    }
	    if ($first_unread) {
		$page = floor($first_unread['position'] / $perpage) + 1;
		$gotopostid = $first_unread['post_id'];
	    } else {
		$page = 1;
	    }
	} else if ($postid) {
	    try {
		list($tpost, $tthread, $tforum) = $helper->assertPostValidAndViewable($postid);
	    } catch (Exception $e) {
		json_error($e->getControllerResponse()->errorText->render());
	    }
	    $page = floor($tpost['position'] / $perpage) + 1;
	    $gotopostid = $postid;
	}

	if ($thread_model->isRedirect($thread_info)) {
	    // Redirect thread! XXX RKJ
	}

	$this->canonicalizePageNumber($page, $perpage, $thread_info['reply_count'] + 1, 'threads', $thread_info);

	$post_options = array_merge($post_model->getPermissionBasedPostFetchOptions($thread_info, $forum_info),
	    array(
		'perPage' => $perpage,
		'page' => $page,
		'join' => XenForo_Model_Post::FETCH_USER | XenForo_Model_Post::FETCH_USER_PROFILE | XenForo_Model_Post::FETCH_FORUM,
		'likeUserId' => $visitor['user_id']
	    )
	);

	if (!empty($post_options['deleted'])) {
	    $post_options['join'] |= XenForo_Model_Post::FETCH_DELETION_LOG;
	}

	$posts = $post_model->getPostsInThread($threadid, $post_options);

	$posts = $post_model->getAndMergeAttachmentsIntoPosts($posts);

	$mod = array();
	$perms = $visitor->getNodePermissions($thread_info['node_id']);
	$thread_mod = $thread_model->addInlineModOptionToThread($thread_info, $forum_info, $perms);
	$max_post_date = $first_unread = $deleted = $moderated = 0;

	foreach ($posts as &$post) {
	    $post_mod = $post_model->addInlineModOptionToPost($post, $thread_info, $forum_info, $perms);
	    $mod = array_merge($mod, $post_mod);
	    $post = $post_model->preparePost($post, $thread_info, $forum_info, $perms);

	    if ($post['post_date'] > $max_post_date) {
		$max_post_date =  $post['post_date'];
	    }
	    if ($post['isDeleted']) {
		$deleted++;
	    }
	    if ($post['isModerated']) {
		$moderated++;
	    }
	    if (!$first_unread && $post['isNew']) {
		$first_unread = $post['post_id'];
	    }
	}

	$thread_model->markThreadRead($thread_info, $forum_info, $max_post_date, $visitor['user_id']);

	fr_update_subsent($thread_info['thread_id'], $max_post_date);

	$thread_model->logThreadView($threadid);

	$post_data = array();
	foreach ($posts as &$post) {
	    $user = $user_model->getUserById($post['user_id']);
	    $online_info = $session_model->getSessionActivityRecords(
		array(
		    'user_id' => $post['user_id'],
		    'cutOff' => array('>', $session_model->getOnlineStatusTimeout())
		)
	    );
	    $is_online = false;
	    if (count($online_info) == 1) {
		$is_online = true;
	    }

	    $fr_images = $docattach = array();
	    if (isset($post['attachments']) && is_array($post['attachments'])) {
		foreach ($post['attachments'] as $attachment) {
		    $ext = strtolower($attachment['extension']);
		    $link = XenForo_Link::buildPublicLink('attachments', $attachment);
		    if ($ext == 'jpe' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif' || $ext == 'jpg') {
			$data = array(
			    'img' => fr_get_xenforo_bburl() . '/' . $link,
			);
			if ($attachment['thumbnailUrl']) {
			    $data['tmb'] = fr_get_xenforo_bburl() . '/' . $attachment['thumbnailUrl'];
			}
			$fr_images[] = $data;
		    } else if ($ext == 'pdf') {
			$docattach[] = fr_get_xenforo_bburl() . '/' . $link;
		    }
		}
	    }

	    list ($text, $nuked_quotes, $images) = parse_post(fr_strip_smilies($this, XenForo_Helper_String::censorString($post['message'])), true);

	    if (count($fr_images) > 0) {
		$text .= "<br/>";
		foreach ($fr_images as $attachment) {
		    $text .= "<img src=\"{$attachment['img']}\"/>";
		}
	    }
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

	    $post_page = floor($post['position'] / XenForo_Application::get('options')->messagesPerPage) + 1;
	    
	    $out = array(
		'post_id' => $post['post_id'],
		'thread_id' => $post['thread_id'],
		'forum_id' => $post['node_id'],
		'forum_title' => prepare_utf8_string(strip_tags($post['node_title'])),
		'username' => prepare_utf8_string(strip_tags($post['username'])),
		'joindate' => prepare_utf8_string(XenForo_Locale::date($post['register_date'], 'absolute')),
		'usertitle' => strip_tags(XenForo_Template_Helper_Core::helperUserTitle($user)),
		'numposts' => $user ? $user['message_count'] : 0,
		'userid' => $post['user_id'],
		'canlike' => $post['canLike'] ? true : false,
		'likes' => $post['like_date'] > 0 ? true : false,
		'title' => prepare_utf8_string(XenForo_Helper_String::censorString($post['title'])),
		'online' => $is_online,
		'post_timestamp' => prepare_utf8_string(XenForo_Locale::dateTime($post['post_date'], 'absolute')),
		'post_link' => fr_get_xenforo_bburl() . '/' . XenForo_Link::buildPublicLink('threads', $thread_info, array('page' => $post_page)) . '#post-' . $post['post_id'],
		'fr_images' => $fr_images,
            );

            if ($post['canDelete']) {
                $out['candelete'] = true;
            }

	    if ($post['likes']) {
		$out['likestext'] = prepare_utf8_string($post_helper->likesHtml($post['post_id'], $post['likes'], $post['like_date'], $post['likeUsers']));
		$like_users = '';
		for ($i = 0; $i < count($post['likeUsers']); $i++) {
		    if ($i != 0) {
			$like_users .= ', ';
		    }
		    $like_users .= $post['likeUsers'][$i]['username'];
		}
		$out['likesusers'] = prepare_utf8_string($like_users);
	    }

	    if ($avatarurl != '') {
		$out['avatarurl'] = $avatarurl;
	    }

	    if ($post['message_state'] == 'deleted') {
		$out += array(
		    'deleted' => true,
		    'del_username' => prepare_utf8_string(strip_tags($post['delete_username']))
		);
		if ($post['delete_reason']) {
		    $out['del_reason'] = prepare_utf8_string($post['delete_reason']);
		}
	    } else {
		if ($post['canEdit']) {
		    $out += array(
			'canedit' => $post['canEdit'],
		    );
		}
		$out += array(
		    'text' => $text,
		    'quotable' => $nuked_quotes,
		    'edittext' => prepare_utf8_string($post['message']),
		);
	    }
	    if (count($docattach)) {
		$out['docattach'] = $docattach;
	    }
	    if ($signature) {
		$sig = trim(strip_tags(remove_bbcode($post['signature'], true, true), '<a>'));
		$sig = str_replace(array("\t", "\r"), array('', ''), $sig);
		$sig = str_replace("\n\n", "\n", $sig);
		$out['sig'] = prepare_utf8_string($sig);
	    }

	    $post_data[] = $out;
	}

	$out = array(
	    'posts' => $post_data,
	    'total_posts' => $thread_info['reply_count'] + 1,
	    'page' => $page,
	    'canpost' => $thread_model->canReplyToThread($thread_info, $forum_info),
	    'canattach' => $forum_model->canUploadAndManageAttachment($forum_info),
	    'title' => prepare_utf8_string(XenForo_Helper_String::censorString($thread_info['title'])),
	    'thread_link' => process_avatarurl(XenForo_Link::buildPublicLink('threads', $thread_info, array('page' => $page))),
	    'subscribed' => $thread_info['thread_is_watched'] ? 1 : 0,
	);
	if ($gotopostid) {
	    $out['gotopostid'] = $gotopostid;
	}
	if ($thread_info['discussion_type'] == 'poll') {
	    $poll_model = $this->_getPollModel();
	    $poll = $poll_model->getPollByContent('thread', $threadid);
	    if ($poll) {
		$out['pollid'] = $poll['poll_id'];
	    }
	}

	$modbit = 0;
	if (isset($mod['delete']) && $mod['delete']) {
	    $modbit |= MOD_DELETEPOST;
        }
	if ($thread_info['sticky'] && isset($thread_mod['unstick']) && $thread_mod['unstick']) {
	    $modbit |= MOD_UNSTICK;
	}
	if (!$thread_info['sticky'] && isset($thread_mod['stick']) && $thread_mod['stick']) {
	    $modbit |= MOD_STICK;
	}
	if (isset($thread_mod['delete']) && $thread_mod['delete']) {
	    $modbit |= MOD_DELETETHREAD;
        }
        XenForo_Application::setDebugMode(true);
	if ($thread_info['discussion_open'] && isset($thread_mod['lock']) && $thread_mod['lock']) {
	    $modbit |= MOD_CLOSE;
	}
	if (!$thread_info['discussion_open'] && isset($thread_mod['unlock']) && $thread_mod['unlock']) {
	    $modbit |= MOD_OPEN;
	}
	if (isset($thread_mod['move']) && $thread_mod['move']) {
	    $modbit |= MOD_MOVETHREAD;
	}
	if (XenForo_Permission::hasPermission($visitor['permissions'], 'general', 'cleanSpam')) {
	    $modbit |= MOD_SPAM_CONTROLS;
	}
	$out['mod'] = $modbit;

	return $out;
    }

    public function actionPostReply ()
    {
	$vals = $this->_input->filter(array(
	    'threadid' => XenForo_Input::UINT,
	    'postid' => XenForo_Input::UINT,
	    'poststarttime' => XenForo_Input::STRING,
	    'message' => XenForo_Input::STRING,
	    'sig' => XenForo_Input::STRING,
	));

	$thread_model = $this->_getThreadModel();
	$post_model = $this->_getPostModel();

	if (!$vals['threadid'] && $vals['postid']) {
	    $post = $post_model->getPostById($vals['postid']);
	    $vals['threadid'] = $post['thread_id'];
	}

	$visitor = XenForo_Visitor::getInstance();

	$helper = $this->getHelper('ForumThreadPost');
	$threadFetchOptions = array('readUserId' => $visitor['user_id']);
	$forumFetchOptions = array('readUserId' => $visitor['user_id']);
	try {
	    list($thread_info, $forum_info) = $helper->assertThreadValidAndViewable($vals['threadid'],
		array(
		    'readUserId' => $visitor['user_id'],
		),
		array(
		    'readUserId' => $visitor['user_id'],
		));

	    $this->_assertCanReplyToThread($thread_info, $forum_info);
	} catch (Exception $e) {
	    json_error($e->getControllerResponse()->errorText->render());
	}

	if (XenForo_Application::get('options')->forumrunnerSignatures && $vals['sig']) {
	    $vals['message'] .= "\n\n" . $vals['sig'];
	}
	$vals['message'] = XenForo_Helper_String::autoLinkBbCode($vals['message']);

	$w = XenForo_DataWriter::create('XenForo_DataWriter_DiscussionMessage_Post');
	$w->set('user_id', $visitor['user_id']);
	$w->set('username', $visitor['username']);
	$w->set('message', $vals['message']);
	$w->set('message_state', $this->_getPostModel()->getPostInsertMessageState($thread_info, $forum_info));
	$w->set('thread_id', $vals['threadid']);
	$w->setExtraData(XenForo_DataWriter_DiscussionMessage::DATA_ATTACHMENT_HASH, $vals['poststarttime']);
	$w->preSave();

	if (!$w->hasErrors()) {
	    try {
		$this->assertNotFlooding('post');
	    } catch (Exception $e) {
		json_error($e->getControllerResponse()->errorText->render());
	    }
	}

	$w->save();

	return array('success' => true);
    }

    public function actionGetPoll ()
    {
	$threadid = $this->_input->filterSingle('threadid', XenForo_Input::UINT);

	$visitor = XenForo_Visitor::getInstance();
	$helper = $this->getHelper('ForumThreadPost');
	$thread_model = $this->_getThreadModel();

	try {
	    list($thread_info, $forum_info) = $helper->assertThreadValidAndViewable($threadid);
	} catch (Exception $e) {
	    json_error($e->getControllerResponse()->errorText->render());
	}

	$poll_model = $this->_getPollModel();
	$poll = $poll_model->getPollByContent('thread', $threadid);
	if (!$poll) {
	    fr_no_permission();
	}

	$poll = $poll_model->preparePoll($poll, $thread_model->canVoteOnPoll($thread_info, $forum_info));

	$total_votes = XenForo_Application::get('db')->fetchOne('
	    SELECT COUNT(user_id)
	    FROM xf_poll_vote
	    WHERE poll_id = ?
	', $poll['poll_id']);

	$options = array();
	foreach ($poll['responses'] as $key => $option) {
	    $percent = 0;
	    if ($option['response_vote_count'] > 0) {
		$percent = ($option['response_vote_count'] / $total_votes) * 100;
	    }

	    $options[] = array(
		'optionid' => $key,
		'voted' => $option['hasVoted'],
		'percent' => number_format($percent),
		'title' => prepare_utf8_string(strip_tags(XenForo_Helper_String::censorString($option['response']))),
		'votes' => $option['response_vote_count'],
	    );
	}

	$out = array(
	    'title' => prepare_utf8_string(strip_tags(XenForo_Helper_String::censorString($poll['question']))),
	    'pollstatus' => '',
	    'options' => $options,
	    'total' => $total_votes,
	    'canvote' => $poll['canVote'],
	);

	if ($poll['multiple']) {
	    $out['multiple'] = true;
	}

	return $out;
    }

    public function actionVotePoll ()
    {
	$threadid = $this->_input->filterSingle('threadid', XenForo_Input::UINT);
	$options = $this->_input->filterSingle('options', XenForo_Input::STRING);

	$visitor = XenForo_Visitor::getInstance();
	$helper = $this->getHelper('ForumThreadPost');
	$thread_model = $this->_getThreadModel();

	try {
	    list($thread_info, $forum_info) = $helper->assertThreadValidAndViewable($threadid);
	} catch (Exception $e) {
	    json_error($e->getControllerResponse()->errorText->render());
	}

	$poll_model = $this->_getPollModel();
	$poll = $poll_model->getPollByContent('thread', $threadid);
	if (!$poll) {
	    fr_no_permission();
	}

	if (!$poll_model->canVoteOnPoll($poll, $error)) {
	    $phrase = new XenForo_Phrase($error);
	    json_error($phrase->render());
	}

	$options = preg_split('/,/', $options);
	if (!count($options)) {
	    $phrase = new XenForo_Phrase(please_vote_for_at_least_one_option);
	    json_error($phrase->render());
	}

	$poll_model->voteOnPoll($poll['poll_id'], $options);

	return array('success' => true);
    }

    protected function _postDispatch ($controllerResponse, $controllerName, $action) {}
    protected function _checkCsrf ($action) {}
}
