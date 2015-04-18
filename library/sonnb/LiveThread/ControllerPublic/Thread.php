<?php
/**
 * Product: sonnb - Live Threads
 * Version: 1.1.14
 * Date: 25th January 2015
 * Author: sonnb
 * Website: www.sonnb.com
 * License: You might not copy or redistribute this addon.
 * Any action to public or redistribute must be authorized from author
 */

class sonnb_LiveThread_ControllerPublic_Thread extends XFCP_sonnb_LiveThread_ControllerPublic_Thread
{
    protected function _preDispatch($action)
    {
        parent::_preDispatch($action);

        switch ($action)
        {
            case 'live':
            case 'addReplyLive':
            case 'liveThreadUpdates':
            case 'loadPreviousPost':
                if (!$this->_hasLiveViewPermission())
                {
                    throw $this->getNoPermissionResponseException();
                }
                break;
        }
    }
    
    public function actionIndex()
    {
        $parent = parent::actionIndex();

        if ($parent instanceof XenForo_ControllerResponse_View && 
        		isset($parent->params['forum']) && 
        		isset($parent->params['thread']))
        {
	        if (($parent->params['thread']['sonnb_live_thread'] || $this->_isAlwaysLive($parent->params['thread']['node_id'])) && 
	        		$this->_hasLiveViewPermission())
	        {
		        return $this->responseRedirect(
	                XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL,
	                XenForo_Link::buildPublicLink('threads/live', $parent->params['thread'], array('page' => max(1, $this->_input->filterSingle('page', XenForo_Input::UINT))))
	            );
	        }
	        
            $parent->params['canLiveManage'] = $this->_hasLiveManagePermission();
            $parent->params['canLiveThread'] = $this->_hasLiveViewPermission();
        }

        return $parent;
    }

	public function actionIndexLive()
	{
		return $this->responseReroute('XenForo_ControllerPublic_Thread', 'live');
	}

    public function actionLive()
    {
        $threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);

        $ftpHelper = $this->getHelper('ForumThreadPost');
        list($threadFetchOptions, $forumFetchOptions) = $this->_getThreadForumFetchOptions();
        list($thread, $forum) = $ftpHelper->assertThreadValidAndViewable($threadId, $threadFetchOptions, $forumFetchOptions);

        if (!$thread['sonnb_live_thread'] && !$this->_isAlwaysLive($thread['node_id']))
        {
	        $page = max(1, $this->_input->filterSingle('page', XenForo_Input::UINT));
            return $this->responseRedirect(
                XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL,
                XenForo_Link::buildPublicLink('threads', $thread, array('page' => $page))
            );
        }
        
        $visitor = XenForo_Visitor::getInstance();
        $threadModel = $this->_getThreadModel();
        $postModel = $this->_getPostModel();
        
        if ($threadModel->isRedirect($thread))
        {
            $redirect = $this->getModelFromCache('XenForo_Model_ThreadRedirect')->getThreadRedirectById($thread['thread_id']);
            if (!$redirect)
            {
                return $this->responseNoPermission();
            }
            else
            {
                return $this->responseRedirect(
                        XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL_PERMANENT, $redirect['target_url']
                );
            }
        }

	    $xenOptions = XenForo_Application::get('options');

	    $enablePagination = $xenOptions->sonnb_LiveThread_Pagination;
	    $postFetchOptions = $this->_getPostFetchOptions($thread, $forum);

	    if (!$enablePagination)
	    {
		    $page = 1;
		    $postsPerPage = $xenOptions->sonnb_LiveThread_MaxItems;
	        $postFetchOptions += array(
	            'perPage' => $postsPerPage,
	            'page' => $page
	        );

	        $posts = $postModel->getLatestPostsInLiveThread($threadId, $postFetchOptions);

		    if (isset($thread['first_post_id']) && !empty($thread['first_post_id']) && empty($posts[$thread['first_post_id']]))
		    {
	            $posts[$thread['first_post_id']] = $postModel->getPostById($thread['first_post_id'], $postFetchOptions);
		    }

		    $posts = array_reverse($posts, true);
	    }
	    else
	    {
		    $page = max(1, $this->_input->filterSingle('page', XenForo_Input::UINT));
		    $postsPerPage = $xenOptions->messagesPerPage;

		    $this->canonicalizePageNumber($page, $postsPerPage, $thread['reply_count'] + 1, 'threads/live', $thread);
		    $this->canonicalizeRequestUrl(
			    XenForo_Link::buildPublicLink('threads/live', $thread, array('page' => $page))
		    );

		    $postFetchOptions = $this->_getPostFetchOptions($thread, $forum);
		    $postFetchOptions += array(
			    'perPage' => $postsPerPage,
			    'page' => $page
		    );

		    $posts = $postModel->getPostsInThread($threadId, $postFetchOptions);
	    }

        $posts = $postModel->getAndMergeAttachmentsIntoPosts($posts);

        $inlineModOptions = array();
        $maxPostDate = 0;
        $firstUnreadPostId = 0;

        $deletedPosts = 0;
        $moderatedPosts = 0;

        $pagePosition = 0;

        $permissions = $visitor->getNodePermissions($thread['node_id']);
        foreach ($posts AS &$post)
        {
            $post['position_on_page'] = ++$pagePosition;

            $postModOptions = $postModel->addInlineModOptionToPost(
                    $post, $thread, $forum, $permissions
            );
            $inlineModOptions += $postModOptions;

            $post = $postModel->preparePost($post, $thread, $forum, $permissions);

            if ($post['post_date'] > $maxPostDate)
            {
                $maxPostDate = $post['post_date'];
            }

            if ($post['isDeleted'])
            {
                $deletedPosts++;
            }
            if ($post['isModerated'])
            {
                $moderatedPosts++;
            }

            if (!$firstUnreadPostId && $post['isNew'])
            {
                $firstUnreadPostId = $post['post_id'];
            }
        }

        if ($firstUnreadPostId)
        {
            $requestPaths = XenForo_Application::get('requestPaths');
            $unreadLink = $requestPaths['requestUri'] . '#post-' . $firstUnreadPostId;
        }
        else if ($thread['isNew'])
        {
            $unreadLink = XenForo_Link::buildPublicLink('threads/unread', $thread);
        }
        else
        {
            $unreadLink = '';
        }

        $attachmentParams = $this->_getForumModel()->getAttachmentParams($forum, array(
            'thread_id' => $thread['thread_id']
        ));

        if ($thread['discussion_type'] == 'poll')
        {
            $pollModel = $this->_getPollModel();
            $poll = $pollModel->getPollByContent('thread', $threadId);
            if ($poll)
            {
                if (XenForo_Application::$versionId < 1040000)
                {
                    $poll = $pollModel->preparePoll($poll, $threadModel->canVoteOnPoll($thread, $forum));
                    $poll['canEdit'] = $threadModel->canEditPoll($thread, $forum);
                }
                else
                {
                    $poll = $pollModel->preparePoll($poll, $threadModel->canVoteOnPoll($poll, $thread, $forum));
                    $poll['canEdit'] = $threadModel->canEditPoll($poll, $thread, $forum);
                }
            }
        }
        else
        {
            $poll = false;
        }

        $threadModel->markThreadRead($thread, $forum, $maxPostDate);
        $threadModel->logThreadView($threadId);

        if (sizeof($posts) > 1)
        {
            $secondPost = array_slice($posts, 1, 1, TRUE);
        }
        else
        {
            $secondPost = array();
        }

	    if (!$enablePagination)
	    {
		    if ($secondPost)
		    {
			    $postsRemaining = $postModel->countRemainPostsInLiveThread($threadId, array('post_date_live_thread' => $secondPost[key($secondPost)]['post_date']));
			    if ($postsRemaining <= 1)
			    {
				    $postsRemaining = 0;
			    }

			    $firstPostDate = $secondPost[key($secondPost)]['post_date'];
		    }
		    else
		    {
			    $postsRemaining = 0;
			    $firstPostDate = XenForo_Application::$time;
		    }

		    $isLastPage = 0;
	    }
	    else
	    {
		    $postsRemaining = 0;
		    $firstPostDate = 0;
		    $maxPage = ceil(($thread['reply_count'] + 1)/$postsPerPage);
		    //TODO: Check reserve mode
		    $isLastPage = ($page == $maxPage ? 1 : 0);
	    }

	    if ($xenOptions->sonnb_LiveThread_reserveOrder && !$xenOptions->sonnb_LiveThread_Pagination)
	    {
		    $posts = array_reverse($posts, true);

		    $firstPost = end($posts);
		    $lastPost = reset($posts);
	    }
	    else
	    {
			$firstPost = reset($posts);
		    $lastPost = end($posts);
	    }

        $viewParams = $this->_getDefaultViewParams($forum, $thread, $posts, $page, array(
            'deletedPosts' => $deletedPosts,
            'moderatedPosts' => $moderatedPosts,

            'inlineModOptions' => $inlineModOptions,

            'firstPost' => $firstPost,
            'lastPost' => $lastPost,

            'unreadLink' => $unreadLink,

            'poll' => $poll,

            'attachmentParams' => $attachmentParams,
            'attachmentConstraints' => $this->_getAttachmentModel()->getAttachmentConstraints(),

            'showPostedNotice' => $this->_input->filterSingle('posted', XenForo_Input::UINT),

            'nodeBreadCrumbs' => $ftpHelper->getNodeBreadCrumbs($forum),

            'onLiveThread' => true,
            'canLiveManage' => $this->_hasLiveManagePermission(),
            'canLiveThread' => $this->_hasLiveViewPermission(),
            'timestamp' => XenForo_Application::$time,
	        'firstPostDate' => $firstPostDate,
	        'postsPerPage' => $postsPerPage,
	        'oldPostsRemaining' => $postsRemaining,
	        'enablePagination' => $enablePagination,
	        'isLastPage' => $isLastPage,
	        'reserveOrder' => $xenOptions->sonnb_LiveThread_reserveOrder
        ));

	    $viewParams['postsPerPage'] = $postsPerPage;

        return $this->responseView('XenForo_ViewPublic_Thread_View', 'thread_view', $viewParams);
    }

    public function actionAddReply()
    {
        $this->_assertPostOnly();

        if ($this->_input->inRequest('more_options'))
        {
            return $this->responseReroute('XenForo_ControllerPublic_Thread', 'reply');
        }

        $threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);

        $ftpHelper = $this->getHelper('ForumThreadPost');
        $thread = $ftpHelper->getThreadOrError($threadId);

        if (($thread['sonnb_live_thread'] || $this->_isAlwaysLive($thread['node_id'])) && $this->_hasLiveViewPermission())
        {
            return $this->responseReroute('XenForo_ControllerPublic_Thread', 'addReplyLive');
        }

        return parent::actionAddReply();
    }

    public function actionAddReplyLive()
    {
        $this->_assertPostOnly();

        if ($this->_input->inRequest('more_options'))
        {
            return $this->responseReroute('XenForo_ControllerPublic_Thread', 'reply');
        }

        $threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);
        $visitor = XenForo_Visitor::getInstance();

	    $xenOptions = XenForo_Application::getOptions();
        $ftpHelper = $this->getHelper('ForumThreadPost');
        $threadFetchOptions = array('readUserId' => $visitor['user_id']);
        $forumFetchOptions = array('readUserId' => $visitor['user_id']);
        list($thread, $forum) = $ftpHelper->assertThreadValidAndViewable($threadId, $threadFetchOptions, $forumFetchOptions);

        if (!$thread['sonnb_live_thread'] && !$this->_isAlwaysLive($thread['node_id']))
        {
            return $this->responseRedirect(
                XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED,
                XenForo_Link::buildPublicLink('threads', $thread)
            );
        }
        
        $this->_assertCanReplyToThread($thread, $forum);

        if (!XenForo_Captcha_Abstract::validateDefault($this->_input))
        {
            return $this->responseCaptchaFailed();
        }

        $input = $this->_input->filter(array(
            'attachment_hash' => XenForo_Input::STRING,
            'watch_thread_state' => XenForo_Input::UINT,
            'watch_thread' => XenForo_Input::UINT,
            'watch_thread_email' => XenForo_Input::UINT,
            '_set' => array(XenForo_Input::UINT, 'array' => true),
            'discussion_open' => XenForo_Input::UINT,
            'sticky' => XenForo_Input::UINT,
        ));

        $input['message'] = $this->getHelper('Editor')->getMessageText('message', $this->_input);
        $input['message'] = XenForo_Helper_String::autoLinkBbCode($input['message']);

        $writer = XenForo_DataWriter::create('XenForo_DataWriter_DiscussionMessage_Post');
        $writer->set('user_id', $visitor['user_id']);
        $writer->set('username', $visitor['username']);
        $writer->set('message', $input['message']);
        $writer->set('message_state', $this->_getPostModel()->getPostInsertMessageState($thread, $forum));
        $writer->set('thread_id', $threadId);
        $writer->setExtraData(XenForo_DataWriter_DiscussionMessage::DATA_ATTACHMENT_HASH, $input['attachment_hash']);
        $writer->setExtraData(XenForo_DataWriter_DiscussionMessage_Post::DATA_FORUM, $forum);
        $writer->preSave();

        if (!$writer->hasErrors())
        {
            $this->assertNotFlooding('post');
        }

        $writer->save();
        $post = $writer->getMergedData();

        $this->_getThreadWatchModel()->setVisitorThreadWatchStateFromInput($threadId, $input);

        $threadUpdateData = array();

        if (!empty($input['_set']['discussion_open']) && $this->_getThreadModel()->canLockUnlockThread($thread, $forum))
        {
            if ($thread['discussion_open'] != $input['discussion_open'])
            {
                $threadUpdateData['discussion_open'] = $input['discussion_open'];
            }
        }

        if (!empty($input['_set']['sticky']) && $this->_getForumModel()->canStickUnstickThreadInForum($forum))
        {
            if ($thread['sticky'] != $input['sticky'])
            {
                $threadUpdateData['sticky'] = $input['sticky'];
            }
        }

        if ($threadUpdateData)
        {
            $threadWriter = XenForo_DataWriter::create('XenForo_DataWriter_Discussion_Thread');
            $threadWriter->setExistingData($thread['thread_id']);
            $threadWriter->bulkSet($threadUpdateData);
            $threadWriter->setExtraData(XenForo_DataWriter_Discussion_Thread::DATA_FORUM, $forum);
            $threadWriter->save();
        }

        $canViewPost = $this->_getPostModel()->canViewPost($post, $thread, $forum);

		if ($visitor['user_id'])
		{
			$this->_getThreadModel()->markThreadRead($thread, $forum, XenForo_Application::$time);
		}

	    $enablePagination = XenForo_Application::get('options')->sonnb_LiveThread_Pagination;
	    $isLastPage = $this->_input->filterSingle('isLastPage', XenForo_Input::UINT);

        if (($enablePagination && !$isLastPage) || !$this->_noRedirect() || !$this->_input->inRequest('last_date') || !$canViewPost)
        {
            if (!$canViewPost)
            {
                $return = XenForo_Link::buildPublicLink('threads', $thread);
            }
            else
            {
                $return = XenForo_Link::buildPublicLink('posts', $post).'#post-'.$post['post_id'];
            }

            return $this->responseRedirect(
                XenForo_ControllerResponse_Redirect::SUCCESS, 
                $return, 
                new XenForo_Phrase('your_message_has_been_posted')
            );
        }
        else
        {
            $threadModel = $this->_getThreadModel();
            $postModel = $this->_getPostModel();

            $lastDate = $this->_input->filterSingle('last_date', XenForo_Input::UINT);

            $postFetchOptions = $this->_getPostFetchOptions($thread, $forum);
            $postFetchOptions += array(
                'timestamp' => $lastDate,
                'join' => XenForo_Model_Post::FETCH_USER
            );

            $posts = $postModel->getPostsInLiveThread($threadId, $postFetchOptions);

            $posts = $postModel->getAndMergeAttachmentsIntoPosts($posts);

            $permissions = $visitor->getNodePermissions($thread['node_id']);

            foreach ($posts AS &$post)
            {
                $post = $postModel->preparePost($post, $thread, $forum, $permissions);
            }

	        if ($xenOptions->sonnb_LiveThread_reserveOrder && !$xenOptions->sonnb_LiveThread_Pagination)
	        {
		        //$posts = array_reverse($posts, true);
	        }

            if ($visitor['user_id'])
            {
                $threadModel->markThreadRead($thread, $forum, XenForo_Application::$time);
            }

            $viewParams = array(
                'canViewAttachments' => $threadModel->canViewAttachmentsInThread($thread, $forum),
                'canReply' => $threadModel->canReplyToThread($thread, $forum),
                'canViewWarnings' => $this->getModelFromCache('XenForo_Model_User')->canViewWarnings(),
                'ignoredNames' => $this->_getIgnoredContentUserNames($posts),
                'canQuickReply' => $threadModel->canQuickReply($thread, $forum),
                'canLiveManage' => $this->_hasLiveManagePermission(),
                'canLiveThread' => $this->_hasLiveViewPermission(),
                'onLiveThread' => true,
                'thread' => $thread,
                'forum' => $forum,
                'posts' => $posts,

	            'reserveOrder' => $xenOptions->sonnb_LiveThread_reserveOrder && !$xenOptions->sonnb_LiveThread_Pagination
            );

            return $this->responseView(
                    'sonnb_LiveThread_ViewPublic_Thread_ReplyLive', 
                    'thread_reply_new_posts', 
                    $viewParams
            );
        }
    }

    public function actionLoadPreviousPost()
    {
        $threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);
        $postDate = $this->_input->filterSingle('before', XenForo_Input::UINT);

	    $xenOptions = XenForo_Application::getOptions();
        $ftpHelper = $this->getHelper('ForumThreadPost');
        list($threadFetchOptions, $forumFetchOptions) = $this->_getThreadForumFetchOptions();
        list($thread, $forum) = $ftpHelper->assertThreadValidAndViewable($threadId, $threadFetchOptions, $forumFetchOptions);

        if (!$thread['sonnb_live_thread'] && !$this->_isAlwaysLive($thread['node_id']))
        {
            return $this->responseRedirect(
                XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED,
                XenForo_Link::buildPublicLink('threads', $thread)
            );
        }
        
        $visitor = XenForo_Visitor::getInstance();
        $threadModel = $this->_getThreadModel();
        $postModel = $this->_getPostModel();
        $postsPerPage = XenForo_Application::get('options')->sonnb_LiveThread_MaxItems;

        $postFetchOptions = $this->_getPostFetchOptions($thread, $forum);
        $postFetchOptions += array(
            'post_date' => $postDate,
            'limit' => $postsPerPage
        );

        $posts = $postModel->getPreviousPostsInLiveThread($threadId, $postFetchOptions);
        $posts = $postModel->getAndMergeAttachmentsIntoPosts($posts);

        $inlineModOptions = array();

        $permissions = $visitor->getNodePermissions($thread['node_id']);
        foreach ($posts AS &$post)
        {
            $postModOptions = $postModel->addInlineModOptionToPost(
                $post, $thread, $forum, $permissions
            );
            $inlineModOptions += $postModOptions;

            $post = $postModel->preparePost($post, $thread, $forum, $permissions);
        }

	    if ($xenOptions->sonnb_LiveThread_reserveOrder && !$xenOptions->sonnb_LiveThread_Pagination)
	    {

	    }

	    $firstPost = end($posts);

        $viewParams = array(
            'canViewAttachments' => $threadModel->canViewAttachmentsInThread($thread, $forum),
            'canReply' => $threadModel->canReplyToThread($thread, $forum),
            'canViewWarnings' => $this->getModelFromCache('XenForo_Model_User')->canViewWarnings(),
            'ignoredNames' => $this->_getIgnoredContentUserNames($posts),
            'canQuickReply' => $threadModel->canQuickReply($thread, $forum),
            'canLiveManage' => $this->_hasLiveManagePermission(),
            'canLiveThread' => $this->_hasLiveViewPermission(),
            'onLiveThread' => true,
            'thread' => $thread,
            'forum' => $forum,
            'firstPostDate' => $firstPost['post_date'],
            'posts' => $posts,
            'postsPerPage' => $postsPerPage,
            'oldPostsRemaining' => $postModel->countRemainPostsInLiveThread($threadId, array('post_date_live_thread' => $firstPost['post_date'])),

	        'reserveOrder' => $xenOptions->sonnb_LiveThread_reserveOrder && !$xenOptions->sonnb_LiveThread_Pagination
        );

        return $this->responseView(
            'sonnb_LiveThread_ViewPublic_Thread_PostLoader', 'thread_reply_new_posts', $viewParams
        );
    }

    public function actionLiveThreadUpdates()
    {
        $input = $this->_input->filter(array(
            'timestamp' => XenForo_Input::UINT,
            'update_hash' => XenForo_Input::STRING
        ));

        $threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);
        $visitor = XenForo_Visitor::getInstance();

	    $xenOptions = XenForo_Application::getOptions();
        $ftpHelper = $this->getHelper('ForumThreadPost');
        list($threadFetchOptions, $forumFetchOptions) = $this->_getThreadForumFetchOptions();
        list($thread, $forum) = $ftpHelper->assertThreadValidAndViewable($threadId, $threadFetchOptions, $forumFetchOptions);

		if ($visitor['user_id'])
		{
			$this->_getThreadModel()->markThreadRead($thread, $forum, XenForo_Application::$time);
		}
        
        if (!$thread['sonnb_live_thread'] && !$this->_isAlwaysLive($thread['node_id']))
        {
            return $this->responseRedirect(
                XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED,
                XenForo_Link::buildPublicLink('threads', $thread)
            );
        }
        
        if (!$input['timestamp'])
        {
            $input['timestamp'] = XenForo_Application::$time;
        }
        
        $postFetchOptions = $this->_getPostFetchOptions($thread, $forum);
        $postFetchOptions += array(
            'timestamp' => $input['timestamp']
        );

        $threadModel = $this->_getThreadModel();
        $postModel = $this->_getPostModel();

        $posts = $postModel->getPostsInLiveThread($threadId, $postFetchOptions);
        $posts = $postModel->getAndMergeAttachmentsIntoPosts($posts);

        $inlineModOptions = array();

        $permissions = $visitor->getNodePermissions($thread['node_id']);
        foreach ($posts AS &$post)
        {
            $postModOptions = $postModel->addInlineModOptionToPost(
                $post, $thread, $forum, $permissions
            );
            $inlineModOptions += $postModOptions;

            $post = $postModel->preparePost($post, $thread, $forum, $permissions);
        }

	    if ($xenOptions->sonnb_LiveThread_reserveOrder && !$xenOptions->sonnb_LiveThread_Pagination)
	    {
		    //$posts = array_reverse($posts, true);
	    }

        $viewParams = array(
            'thread' => $thread,
            'posts' => $posts,
            'forum' => $forum,
            'canViewAttachments' => $threadModel->canViewAttachmentsInThread($thread, $forum),
            'canReply' => $threadModel->canReplyToThread($thread, $forum),
            'canViewWarnings' => $this->getModelFromCache('XenForo_Model_User')->canViewWarnings(),
            'ignoredNames' => $this->_getIgnoredContentUserNames($posts),
            'canQuickReply' => $threadModel->canQuickReply($thread, $forum),
            'canLiveManage' => $this->_hasLiveManagePermission(),
            'canLiveThread' => $this->_hasLiveViewPermission(),
            'onLiveThread' => true,

	        'reserveOrder' => $xenOptions->sonnb_LiveThread_reserveOrder && !$xenOptions->sonnb_LiveThread_Pagination
        );

	    if ($this->_noRedirect())
	    {
	        return $this->responseView(
	            'sonnb_LiveThread_ViewPublic_Thread_LiveThreadUpdates', 'thread_reply_new_posts', $viewParams
	        );
	    }
	    else
	    {
		    $lastPost = end($posts);

		    return $this->responseRedirect(
			    XenForo_ControllerResponse_Redirect::SUCCESS,
			    XenForo_Link::buildPublicLink('posts', $lastPost).'#post-'.$lastPost['post_id']
		    );
	    }
    }

    public function actionQuickUpdate()
    {
        $live = $this->_input->filterSingle('live', XenForo_Input::UINT);
        $set = $this->_input->filterSingle('set', XenForo_Input::ARRAY_SIMPLE, array('array' => true));

        if (isset($set['live']) && $this->_hasLiveManagePermission())
        {
            $GLOBALS[sonnb_LiveThread_Listener::SONNB_LIVETHREAD_LIVE_SWITCH] = $live;
        }

        return parent::actionQuickUpdate();
    }
    
    protected function _hasLiveViewPermission()
    {
        $visitor = XenForo_Visitor::getInstance();
        
        return ($visitor->hasPermission('sonnb_LiveThread', 'sonnb_LiveThread_Use') 
                || $visitor->hasPermission('sonnb_LiveThread', 'sonnb_LiveThread_Manage'));
    }
    
    protected function _hasLiveManagePermission()
    {
        $visitor = XenForo_Visitor::getInstance();
        
        return $visitor->hasPermission('sonnb_LiveThread', 'sonnb_LiveThread_Manage');
    }
    
    protected function _isAlwaysLive($nodeId)
    {
        $options = XenForo_Application::get('options');
        
        $livedNodes = $options->sonnb_LiveThread_EnabledNodes;
        
        return in_array($nodeId, $livedNodes);
    }

}