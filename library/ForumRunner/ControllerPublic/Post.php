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

class ForumRunner_ControllerPublic_Post extends XenForo_ControllerPublic_Post
{

    public function actionPostEdit ()
    {
	$vals = $this->_input->filter(array(
	    'postid' => XenForo_Input::UINT,
	    'poststarttime' => XenForo_Input::STRING,
	    'message' => XenForo_Input::STRING,
	));

	$helper = $this->getHelper('ForumThreadPost');
	try {
	    list($post_info, $thread_info, $forum_info) = $helper->assertPostValidAndViewable($vals['postid']);
	    $this->_assertCanEditPost($post_info, $thread_info, $forum_info);
	} catch (Exception $e) {
	    json_error($e->getControllerResponse()->errorText->render(), RV_POST_ERROR);
	}

	$vals['message'] = XenForo_Helper_String::autoLinkBbCode($vals['message']);

	$dw = XenForo_DataWriter::create('XenForo_DataWriter_DiscussionMessage_Post');
	$dw->setExistingData($vals['postid']);
	$dw->set('message', $vals['message']);
	$dw->setExtraData(XenForo_DataWriter_DiscussionMessage::DATA_ATTACHMENT_HASH, $vals['poststarttime']);
	$dw->save();

	return array('success' => true);
    }

    public function actionReport ()
    {
	$postid = $this->_input->filterSingle('postid', XenForo_Input::UINT);
	$reason = $this->_input->filterSingle('reason', XenForo_Input::STRING);

	$helper = $this->getHelper('ForumThreadPost');
	try {
	    list($post, $thread, $forum) = $helper->assertPostValidAndViewable($postid);
	} catch (Exception $e) {
	    json_error($e->getControllerResponse()->errorText->render());
	}

	if (!$reason) {
	    $phrase = new XenForo_Phrase('please_enter_reason_for_reporting_this_message');
	    json_error($phrase->render());
	}

	$report_model = XenForo_Model::create('XenForo_Model_Report');
	$report_model->reportContent('post', $post, $reason);

	return array('success' => true);
    }

    public function actionGetPost ()
    {
	// Whole function is an ugly hack.  Revisit later.
	global $dependencies, $zresponse;

	$postid = $this->_input->filterSingle('postid', XenForo_Input::UINT);
	$type = $this->_input->filterSingle('type', XenForo_Input::STRING);
	$signature = $this->_input->filterSingle('signature', XenForo_Input::UINT);

	if (!$type || $type == '') {
	    $type = 'html';
	}

	$user_model = $this->getModelFromCache('XenForo_Model_User');
	$session_model = $this->getModelFromCache('XenForo_Model_Session');
	$thread_model = $this->getModelFromCache('XenForo_Model_Thread');
	$forum_model = $this->getModelFromCache('XenForo_Model_Forum');
	$attachment_model = $this->getModelFromCache('XenForo_Model_Attachment');

	$helper = $this->getHelper('ForumThreadPost');
	try {
	    list($post, $thread, $forum) = $helper->assertPostValidAndViewable($postid);
	} catch (Exception $e) {
	    json_error($e->getControllerResponse()->errorText->render());
	}

	$post_model = $this->_getPostModel();
	$post = $post_model->getPostById($postid,
	    array(
		'join' => XenForo_Model_Post::FETCH_THREAD | XenForo_Model_Post::FETCH_FORUM | XenForo_Model_Post::FETCH_USER | XenForo_Model_Post::FETCH_USER_PROFILE,
	    )
	);

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

	$avatarurl = '';
	if ($user !== false) {
	    $avatarurl = process_avatarurl(XenForo_Template_Helper_Core::getAvatarUrl($user, 'm'));
	    if (strpos($avatarurl, '/xenforo/avatars/avatar_') !== false) {
		$avatarurl = '';
	    }
	}

	$attachments = $attachment_model->getAttachmentsByContentId('post', $postid);

	$message = fr_strip_smilies($this, $post['message']);

	list ($text, $nuked_quotes, $images) = parse_post($message, true, array());

	$image = '';

	if ($type == 'html') {	
	    $css = <<<EOF
<style type="text/css">
body {
  margin: 0;
  padding: 3;
  font: 13px Arial, Helvetica, sans-serif;
}
.alt2 {
  background-color: #e6edf5;
  font: 13px Arial, Helvetica, sans-serif;
}
html {
    -webkit-text-size-adjust: none;
}
</style>
EOF;

	    $formatter = XenForo_BbCode_Formatter_Base::create('ForumRunner_BbCode_Formatter_BbCode_Post',
		array(
		    'smilies' => XenForo_Application::get('smilies'),
		)
	    );
	    $parser = new XenForo_BbCode_Parser($formatter);
	    $html = $css . $parser->render($message);
	    
	    if ($signature && $post['signature']) {
		$html .= '<div style="border-top: 1px dashed grey; font-size: 9pt; margin-top: 5px; padding: 5px 0 0;">' . $parser->render(fr_strip_smilies($this, $post['signature'])) . '</div>';
	    }

	} else if ($type == 'facebook') {
	    $html = XenForo_Helper_String::censorString(XenForo_Helper_String::bbCodeStrip($message, true));

	    if (count($attachments)) {
		$attachments = array_values($attachments);
		$link = XenForo_Link::buildPublicLink('attachments', $attachments[0]);
		$image = fr_get_xenforo_bburl() . '/' . $link;
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
	    'usertitle' => XenForo_Template_Helper_Core::helperUserTitle($user),
	    'numposts' => $user ? $user['message_count'] : 0,
	    'userid' => $post['user_id'],
	    'title' => prepare_utf8_string($post['title']),
	    'online' => $is_online,
	    'post_timestamp' => prepare_utf8_string(XenForo_Locale::dateTime($post['post_date'], 'absolute')),
	    'html' => prepare_utf8_string($html),
	    'quotable' => $nuked_quotes,
	    'canpost' => $thread_model->canReplyToThread($thread, $forum),
	    'canattach' => $forum_model->canUploadAndManageAttachment($forum),
	    'post_link' => fr_get_xenforo_bburl() . '/' . XenForo_Link::buildPublicLink('threads', $thread, array('page' => $post_page)) . '#post-' . $post['post_id'],
	);

	if ($image != '') {
	    $out['image'] = $image;
	}
	if ($avatarurl != '') {
	    $out['avatarurl'] = $avatarurl;
	}

	return $out;
    }

    public function actionLike ()
    {
	$postid = $this->_input->filterSingle('postid', XenForo_Input::UINT);

	$helper = $this->getHelper('ForumThreadPost');
	try {
	    list($post_info, $thread_info, $forum_info) = $helper->assertPostValidAndViewable($postid);
	} catch (Exception $e) {
	    json_error($e->getControllerResponse()->errorText->render());
	}

	if (!$this->_getPostModel()->canLikePost($post_info, $thread_info, $forum_info, $error)) {
	    $phrase = new XenForo_Phrase($error);
	    json_error($phrase->render());
	}

	$like_model = $this->_getLikeModel();

	$existing_like = $like_model->getContentLikeByLikeUser('post', $postid, XenForo_Visitor::getUserId());

	if ($existing_like) {
	    $like_model->unlikeContent($existing_like);
	} else {
	    $like_model->likeContent('post', $postid, $post_info['user_id']);
	}

	return array('success' => true);
    }

    protected function _postDispatch ($controllerResponse, $controllerName, $action) {}
    protected function _checkCsrf ($action) {}
}
