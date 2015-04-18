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

class ForumRunner_ControllerPublic_Forum extends XenForo_ControllerPublic_Forum
{
    private $_prefixes = array();

    public function actionGetForums ()
    {
	$forumid = $this->_input->filterSingle('forumid', XenForo_Input::UINT);
	$page = max($this->_input->filterSingle('page', XenForo_Input::UINT), 1);
	$perpage = $this->_input->filterSingle('perpage', XenForo_Input::UINT);
	if (!$perpage) {
	    $perpage = XenForo_Application::get('options')->discussionsPerPage;
	}
	$previewtype = $this->_input->filterSingle('previewtype', XenForo_Input::UINT);
	if (!$previewtype) {
	    $previewtype = 2;
	}

        // Check for Thread Prefixes (XenForo 1.1.x+)
        $prefixes = array();
        if (method_exists($this, '_getPrefixModel')) {
            $prefix_groups = $this->_getPrefixModel()->getUsablePrefixesInForums($forumid);
            foreach ($prefix_groups as $group) {
                foreach ($group['prefixes'] as $prefix_data) {
                    $phrase = new XenForo_Phrase('thread_prefix_' . $prefix_data['prefix_id']);
                    $prefixes[$prefix_data['prefix_id']] = $phrase->render();
                }
            }
        }
        $this->_prefixes = $prefixes;

	$visitor = XenForo_Visitor::getInstance();

	$node_data = $this->_getNodeModel()->getNodeDataForListDisplay(false, 0);

	$is_category = false;
	$out = false;
	foreach ($node_data['nodesGrouped'] as $node_id => $node) {
	    foreach ($node as $subforum_id => $subforum) {
		if ($subforum_id == $forumid) {
		    if ($subforum['node_type_id'] == 'Category') {
			$is_category = true;
		    }
		    $out = true;
		    break;
		}
	    }
	    if ($out) {
		break;
	    }
	}

	$exclude = XenForo_Application::get('options')->forumrunnerExcludeForums;
	if (!$exclude) {
	    $exclude = array();
	}

	$forum_data = array();
	if (isset($node_data['nodesGrouped'][$forumid])) {
	    foreach ($node_data['nodesGrouped'][$forumid] as $forum_info) {
		if (in_array($forum_info['node_id'], $exclude)) {
		    continue;
		}
		$out = array(
		    'id' => $forum_info['node_id'],
		    'new' => $forum_info['hasNew'],
		    'name' => prepare_utf8_string(strip_tags($forum_info['title'])),
		);

		$icon = fr_get_forum_icon($forum_info['node_id'], $forum_info['hasNew']);
		if ($icon) {
		    $out['icon'] = $icon;
		}
		if ($forum_info['node_type_id'] == 'LinkForum') {
		    $link_forum_model = $this->getModelFromCache('XenForo_Model_LinkForum');
		    $link_data = $link_forum_model->getLinkForumById($forum_info['node_id']);
		    $link = fr_fix_url($link_data['link_url']);
		    if (is_int($link)) {
			$out['id'] = $link;
		    } else {
			$out['link'] = $link;
		    }
		    $linkicon = fr_get_forum_icon($forum_info['node_id'], false, true);
		    if ($linkicon) {
			$out['icon'] = $linkicon;
		    }
		} else if ($forum_info['node_type_id'] == 'Page') {
		    $page_model = $this->getModelFromCache('XenForo_Model_Page');
		    $page_data = $page_model->getPageById($forum_info['node_id']);
		    $link = fr_fix_url(XenForo_Link::buildPublicLink('pages', $page_data));
		    $out['link'] = $link;
		    $linkicon = fr_get_forum_icon($forum_info['node_id'], false, true);
		    if ($linkicon) {
			$out['icon'] = $linkicon;
		    }
		}

		if ($forum_info['description'] != '') {
		    $desc = prepare_utf8_string(strip_tags($forum_info['description']));
		    if (strlen($desc)) {
			$out['desc'] = $desc;
		    }
		}
		$forum_data[] = $out;

		/*
		 * RKJ XXX
		 *
		 * Still TODO: Password FOrum?
		 * Link Forums
		 */
	    }
	}

	$thread_data = $sticky_thread_data = array();
	$total_threads = 0;
	$canpost = $canattach = false;

	if ($forumid && !$is_category) {
	    $helper = $this->getHelper('ForumThreadPost');
	    $forum_model = $this->_getForumModel();

	    $forum_info = null;
	    try {
		$forum_info = $helper->assertForumValidAndViewable($forumid, array(
		    'readUserId' => $visitor['user_id'],
		));
	    } catch (Exception $e) {
		json_error($e->getControllerResponse()->errorText->render());
	    }
	    if ($forum_info) {
		$canpost = $forum_model->canPostThreadInForum($forum_info);
		$canattach = $forum_model->canUploadAndManageAttachment($forum_info);

		$thread_model = $this->_getThreadModel();

		$thread_conditions = array_merge($thread_model->getPermissionBasedThreadFetchConditions($forum_info),
		    array(
			'sticky' => 0,
		    )
		);
		$thread_options = array(
		    'perPage' => $perpage,
		    'page' => $page,
		    'join' => XenForo_Model_Thread::FETCH_USER,
		    'readUserId' => $visitor['user_id'],
		    'postCountUserId' => $visitor['user_id'],
		    'order' => 'last_post_date',
		    'orderDirection' => 'desc',
		);

		if (!empty($thread_conditions['deleted'])) {
		    $thread_options['join'] |= XenForo_Model_Thread::FETCH_DELETION_LOG;
		}

		$total_threads = $thread_model->countThreadsInForum($forumid, $thread_conditions);

		$this->canonicalizePageNumber($page, $perpage, $total_threads, 'forums', $forum_info);

		$threads = $thread_model->getThreadsInForum($forumid, $thread_conditions, $thread_options);

		// Remove sticky threads from the first page
		$sticky_threads = array();
		if ($page == 1) {
		    $sticky_threads = $thread_model->getStickyThreadsInForum($forumid, $thread_conditions, $thread_options);
		    foreach (array_keys($sticky_threads) as $sticky_threadid) {
			unset($threads[$sticky_threadid]);
		    }
		}

		$perms = $visitor->getNodePermissions($forumid);
		foreach ($threads AS &$thread) {
		    $thread = $thread_model->prepareThread($thread, $forum_info, $perms);
		}
		foreach ($sticky_threads AS &$thread) {
		    $thread = $thread_model->prepareThread($thread, $forum_info, $perms);
		}
		unset($thread);

		if ($visitor['user_id'] && $page == 1 && $forum_info['forum_read_date'] < $forum_info['last_post_date']) {
		    $hasNew = false;
		    foreach ($threads AS $thread) {
			if ($thread['isNew']) {
			    $hasNew = true;
			    break;
			}
		    }

		    if (!$hasNew) {
			$this->_getForumModel()->markForumReadIfNeeded($forum_info, $visitor['user_id']);
		    }
		}

		$thread_data = $this->processThreads($threads, $previewtype);
		$sticky_thread_data = $this->processThreads($sticky_threads, $previewtype);
	    }
	}

	$out = array(
	    'forums' => $forum_data,
	    'threads' => $thread_data,
	    'total_threads' => $total_threads,
	    'threads_sticky' => $sticky_thread_data,
	    'total_sticky_threads' => count($sticky_thread_data),
	    'canpost' => $canpost,
	    'canattach' => $canattach,
        );

        // Output Prefixes (XenForo 1.1.x+)
        if (count($this->_prefixes)) {
            $out_prefixes = array();
            foreach ($this->_prefixes as $id => $prefix) {
                $out_prefixes[] = array(
                    'prefixid' => $id,
                    'prefixcaption' => prepare_utf8_string($prefix),
                );
            }

            $out += array(
                'prefixes' => $out_prefixes,
                'prefixrequired' => false,
            );
        }

	return $out;
    }

    private function processThreads (&$threads, $previewtype)
    {
	$thread_data = array();
	$thread_model = $this->_getThreadModel();
	$post_model = $this->getModelFromCache('XenForo_Model_Post');

	$preview_length = XenForo_Application::get('options')->discussionPreviewLength;

	foreach ($threads as &$thread) {
	    // For each thread, get the first post/last post information as requested by user
	    if ($thread_model->isRedirect($thread)) {
		// Redirect thread XXX RKJ
		continue;
	    }

	    $out = array(
		'thread_id' => $thread['thread_id'],
		'new_posts' => $thread['isNew'],
		'forum_id' => $thread['node_id'],
		'total_posts' => $thread['reply_count'] + 1,
		'thread_title' => prepare_utf8_string(strip_tags($thread['title'])),
		'post_lastposttime' => prepare_utf8_string(XenForo_Locale::dateTime($thread['last_post_date'])),
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
		$preview = preview_chop(XenForo_Helper_String::bbCodeStrip($post['message'], true), $preview_length);
	    }
	    if ($preview != '') {
		$out['thread_preview'] = prepare_utf8_string(html_entity_decode($preview));
	    }
	    if ($thread['discussion_type'] == 'poll') {
		$out['poll'] = true;
	    }

            if ($thread['prefix_id'] && isset($this->_prefixes[$thread['prefix_id']])) {
                $out['prefix'] = prepare_utf8_string(strip_tags($this->_prefixes[$thread['prefix_id']]));
            }

	    $thread_data[] = $out;
	}
	return $thread_data;
    }

    public function actionPostMessage ()
    {
	$forumid = $this->_input->filterSingle('forumid', XenForo_Input::UINT);

	$helper = $this->getHelper('ForumThreadPost');
	try {
	    $forum_info = $helper->assertForumValidAndViewable($forumid);
	} catch (Exception $e) {
	    json_error($e->getControllerResponse()->errorText->render(), RV_POST_ERROR);
	}
	$visitor = XenForo_Visitor::getInstance();

	$forumid = $forum_info['node_id'];

	try {
	    $this->_assertCanPostThreadInForum($forum_info);
	} catch (Exception $e) {
	    json_error($e->getControllerResponse()->errorText->render(), RV_POST_ERROR);
	}

	$vals = $this->_input->filter(array(
	    'subject' => XenForo_Input::STRING,
	    'poststarttime' => XenForo_Input::STRING,
	    'message' => XenForo_Input::STRING,
            'sig' => XenForo_Input::STRING,
            'prefixid' => XenForo_Input::UINT,
	));

	if (XenForo_Application::get('options')->forumrunnerSignatures && $vals['sig']) {
	    $vals['message'] .= "\n\n" . $vals['sig'];
	}
	$vals['message'] = XenForo_Helper_String::autoLinkBbCode($vals['message']);

	$w = XenForo_DataWriter::create('XenForo_DataWriter_Discussion_Thread');
	$w->set('user_id', $visitor['user_id']);
	$w->set('username', $visitor['username']);
	$w->set('title', $vals['subject']);
	$w->set('node_id', $forumid);

        // Support for Thread Prefixes, XenForo 1.1.+
        if (method_exists($this, '_getPrefixModel') && $vals['prefixid'] > 0) {
            if ($this->_getPrefixModel()->verifyPrefixIsUsable($vals['prefixid'], $forumid)) {
                $w->set('prefix_id', $vals['prefixid']);
            }
        }

	$w->set('discussion_state', $this->getModelFromCache('XenForo_Model_Post')->getPostInsertMessageState(array(), $forum_info));

	$pw = $w->getFirstMessageDw();
	$pw->set('message', $vals['message']);
	$pw->setExtraData(XenForo_DataWriter_DiscussionMessage::DATA_ATTACHMENT_HASH, $vals['poststarttime']);
	$w->preSave();

	if (!$w->hasErrors()) {
	    try {
		$this->assertNotFlooding('post');
	    } catch (Exception $e) {
		json_error($e->getControllerResponse()->errorText->render(), RV_POST_ERROR);
	    }
	}

	$w->save();

	$thread_info = $w->getMergedData();

	$this->_getThreadModel()->markThreadRead($thread_info, $forum_info, XenForo_Application::$time, $visitor['user_id']);

	return array('success' => true);
    }

    public function actionMarkRead ()
    {
	$forumid = $this->_input->filterSingle('forumid', XenForo_Input::UINT);
	$visitor = XenForo_Visitor::getInstance();
	$forum_model = $this->_getForumModel();

	$forum = null;
	if ($forumid) {
	    $helper = $this->getHelper('ForumThreadPost');
	    try {
		$forum = $helper->assertForumValidAndViewable($forumid, array('readUserId' => $visitor['user_id']));
	    } catch (Exception $e) {
		json_error($e->getControllerResponse()->errorText->render());
	    }
	}
	$forum_model->markForumTreeRead($forum, XenForo_Application::$time);

	return array('success' => true);
    }

    public function actionGetForumData ()
    {
        $forumids = $this->_input->filterSingle('forumids', XenForo_Input::STRING);
        if (empty($forumids)) {
            return array('forums' => array());
        }

	$visitor = XenForo_Visitor::getInstance();
        $forum_model = $this->_getForumModel();
        $node_model = $this->_getNodeModel();
        $helper = $this->getHelper('ForumThreadPost');

        $exclude = XenForo_Application::get('options')->forumrunnerExcludeForums;
	if (!$exclude) {
	    $exclude = array();
	}

        $forums = split(',', $forumids);

        $forum_data = array();
        foreach ($forums as $forumid) {
            if (in_array($forumid, $exclude)) {
                continue;
            }

            $node_info = $node_model->getNodeById($forumid);
            $forum_info = null;
            if ($node_info['node_type_id'] == 'Forum') {
                try {
                    $forum_info = $helper->assertForumValidAndViewable($forumid, array(
                        'readUserId' => $visitor['user_id'],
                    ));
                } catch (Exception $e) {
                    json_error($e->getControllerResponse()->errorText->render());
                }
            } else if ($node_info['node_type_id'] == 'Category') {
                // We need to get the parent node_id info
                $node_info = $node_model->getNodeById($node_info['parent_node_id']);
                $tmp_data = $node_model->getNodeDataForListDisplay($node_info, 0);
                // Now, find our child and our data (mainly hasNew)
                $forum_info = $tmp_data['nodesGrouped'][$tmp_data['parentNodeId']][$forumid];
            }

            $hasNew = isset($forum_info['hasNew']) ? $forum_info['hasNew'] : (isset($forum_info['forum_read_date']) && $forum_info['forum_read_date'] < $forum_info['last_post_date']);

            $out = array(
                'id' => $forum_info['node_id'],
                'new' => $hasNew,
                'name' => prepare_utf8_string(strip_tags($forum_info['title'])),
            );

            $icon = fr_get_forum_icon($forum_info['node_id'], $hasNew);
            if ($icon) {
                $out['icon'] = $icon;
            }

            if ($forum_info['description'] != '') {
                $desc = prepare_utf8_string(strip_tags($forum_info['description']));
                if (strlen($desc)) {
                    $out['desc'] = $desc;
                }
            }
            $forum_data[] = $out;
        }

        return array('forums' => $forum_data);
    }

    protected function _postDispatch ($controllerResponse, $controllerName, $action) {}
    protected function _checkCsrf ($action) {}
}
