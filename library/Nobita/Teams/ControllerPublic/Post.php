<?php
/**
 * @package     Nobita Social Groups Nulled by HQCoder
 * @author      Nobita
 * @nuller		Congngheaz
 * @link        http://www.congngheaz.com/forums/Xenforo-addon-nulled-free/
 * @copyright   (c) 2015 AZ Technologies, Inc. All rights reserved!
 */

/*====================================================================*\
 || ################################################################## ||
|| #               Copyright 2015 AZ Technologies, Inc.              # ||
|| #                      All Rights Reserved.                       # ||
||  ################################################################## ||
\*====================================================================*/
class Nobita_Teams_ControllerPublic_Post extends Nobita_Teams_ControllerPublic_Abstract
{

	public function actionIndex()
	{
		list($post, $team, $category) = $this->_getTeamHelper()->assertPostValidAndViewable();
		return $this->getPostSpecificRedirect($post, $team,
			XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL_PERMANENT
		);
	}

	public function actionShow()
	{
		$ftpHelper = $this->_getTeamHelper();
		list($post, $team, $category) = $ftpHelper->assertPostValidAndViewable();

		$this->_request->setParam('wtype', $post['discussion_type']);

		$commentId = $this->_input->filterSingle('comment_id', XenForo_Input::UINT);

		$postModel = $this->_getPostModel();

		$post = $postModel->preparePost($post, $team, $category);
		
		$posts = array($post['post_id'] => $post);
		$posts = $postModel->addCommentsToPosts($posts, array(
			'join' => Nobita_Teams_Model_Comment::FETCH_COMMENTER,
			'likeUserId' => XenForo_Visitor::getUserId()
		));

		$ignoredNames = array();
		$commentModel = $this->getModelFromCache('Nobita_Teams_Model_Comment');
		foreach ($posts as &$post)
		{
			if (empty($post['comments']))
			{
				continue;
			}
				
			foreach ($post['comments'] as &$comment)
			{
				$comment = $commentModel->prepareComment($comment, $post, $team);
				if ($commentId == $comment['comment_id'])
				{
					$comment['highlight'] = 'Team_Highlight';
				}
			}
			$ignoredNames += $this->_getIgnoredContentUserNames($post['comments']);
		}
		unset($comment);

		$posts = $postModel->getAndMergeAttachmentsIntoPosts($posts);
		
		$post = reset($posts);

		return $ftpHelper->getTeamViewWrapper('wall', $team, $category,
			$this->responseView('Nobita_Teams_ViewPublic_Post_Show', 'Team_post_show', array(
				'post' => $post,
				'team' => $team,
				'category' => $category,

				'canViewAttachments' => XenForo_Visitor::getInstance()->hasPermission('Teams', 'viewAttachment'),
				'focus' => $this->_input->filterSingle('focus', XenForo_Input::BOOLEAN)
			))
		); 
	}

	public function actionEdit()
	{
		$ftpHelper = $this->_getTeamHelper();
		list($post, $team, $category) = $ftpHelper->assertPostValidAndViewable();
		
		$this->_assertCanEditPost($post, $team, $category);
		
		$postModel = $this->_getPostModel();
		$attachmentModel = $this->getModelFromCache('XenForo_Model_Attachment');
		
		$attachmentParams = $this->_getTeamModel()->getAttachmentParams($team, $category, array(
			'post_id' => $post['post_id'],
			'content_type' => 'team_post'
		));

		$attachments = $attachmentModel->getAttachmentsByContentId('team_post', $post['post_id']);
	
		if ($this->_input->inRequest('more_options'))
		{
			$post['message'] = $this->getHelper('Editor')->getMessageText('message', $this->_input);
		}

		$viewParams = array(
			'post' => $post,
			'team' => $team,
			'category' => $category,
			'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category),
			
			'customEditor' => $this->_getTeamHelper()->getCustomBbcodeEditor(),
			
			'attachmentParams' => $attachmentParams,
			'attachments' => $attachmentModel->prepareAttachments($attachments),
			'attachmentConstraints' => $attachmentModel->getAttachmentConstraints()
		);
	
		return $this->responseView('Nobita_Teams_ViewPublic_Post_Edit', 'Team_post_edit', $viewParams);
	}

	public function actionSave()
	{
		$this->_assertPostOnly();
		
		$ftpHelper = $this->_getTeamHelper();
		list($post, $team, $category) = $ftpHelper->assertPostValidAndViewable();
		
		$this->_assertCanEditPost($post, $team, $category);
		
		$input = $this->_input->filter(array(
			'attachment_hash' => XenForo_Input::STRING
		));
		
		$input['message'] = $this->getHelper('Editor')->getMessageText('message', $this->_input);
		$input['message'] = XenForo_Helper_String::autoLinkBbCode($input['message']);
		
		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Post');
		$dw->setExistingData($post['post_id']);
		$dw->set('message', $input['message']);
		$dw->setExtraData(Nobita_Teams_DataWriter_Post::TEAM_DATA, $team);
		$dw->setExtraData(Nobita_Teams_DataWriter_Post::DATA_ATTACHMENT_HASH, $input['attachment_hash']);

		$spamModel = $this->_getSpamPreventionModel();

		if (!$dw->hasErrors()
			&& $dw->get('message_state') == 'visible'
			&& $spamModel->visitorRequiresSpamCheck()
		)
		{
			$spamExtraParams = array(
				'permalink' => XenForo_Link::buildPublicLink('canonical:' . TEAM_ROUTE_PREFIX, $team)
			);
			switch ($spamModel->checkMessageSpam($input['message'], $spamExtraParams, $this->_request))
			{
				case XenForo_Model_SpamPrevention::RESULT_MODERATED:
				case XenForo_Model_SpamPrevention::RESULT_DENIED;
					$dw->error(new XenForo_Phrase('your_content_cannot_be_submitted_try_later'));
					break;
			}
		}
		
		$dw->save();
		return $this->getPostSpecificRedirect($post, $team);
	}

	public function actionEditInline()
	{
		$ftpHelper = $this->_getTeamHelper();
		list($post, $team, $category) = $ftpHelper->assertPostValidAndViewable();

		$this->_assertCanEditPost($post, $team, $category);
		
		$viewParams = array(
			'post' => $post,
			'team' => $team,
			'category' => $category,
			'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category),
			
			'customEditor' => $ftpHelper->getCustomBbcodeEditor()
		);
		
		return $this->responseView('Nobita_Teams_ViewPublic_Post_EditInline', 'Team_post_edit_inline', $viewParams);
	}

	public function actionSaveInline()
	{
		$this->_assertPostOnly();

		if ($this->_input->inRequest('more_options'))
		{
			#return $this->responseReroute(__CLASS__, 'edit');
			return $this->actionEdit();
		}

		$ftpHelper = $this->_getTeamHelper();
		list($post, $team, $category) = $ftpHelper->assertPostValidAndViewable();
		
		$this->_assertCanEditPost($post, $team, $category);
		
		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Post');
		$dw->setExistingData($post['post_id']);
		$dw->set('message',
			XenForo_Helper_String::autoLinkBbCode(
				$this->getHelper('Editor')->getMessageText('message', $this->_input)
			)
		);
		
		$dw->setExtraData(Nobita_Teams_DataWriter_Post::TEAM_DATA, $team);
		$dw->save();

		if ($this->_noRedirect())
		{
			$this->_request->setParam('post_id', $post['post_id']);
			
			return $this->responseReroute(__CLASS__, 'show');
		}
		else
		{
			return $this->getPostSpecificRedirect($post, $team);
		}
		#
	}

	protected function _assertCanEditPost(array $post, array $team, array $category)
	{
		if (!$this->_getPostModel()->canEditPost($post, $team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}
	}

	public function actionDelete()
	{
		list($post, $team, $category) = $this->_getTeamHelper()->assertPostValidAndViewable();
		if (!$this->_getPostModel()->canDeletePost($post, $team, $category, $key))
		{
			throw $this->getErrorOrNoPermissionResponseException($key);
		}
		
		if ($this->isConfirmedPost())
		{
			$this->_getPostModel()->deletePost($post, $team);
			
			XenForo_Helper_Cookie::clearIdFromCookie($post['post_id'], 'inlinemod_teamPosts');
			
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				$this->getDynamicRedirect(XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team))
			);
		}
		else
		{
			$viewParams = array(
				'post' => $post,
				'team' => $team,
				'category' => $category,
				'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category),
				
				'redirect' => $this->getDynamicRedirect(XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team))
			);
			
			return $this->responseView('Nobita_Teams_ViewPublic_Post_Delete', 'Team_post_delete', $viewParams);
		}
	}
	
	public function actionSticky()
	{
		list($post, $team, $category) = $this->_getTeamHelper()->assertPostValidAndViewable();

		$postModel = $this->_getPostModel();
		if (!$postModel->canStickyOrUnstickyPost($post, $team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$this->_checkCsrfFromToken($this->_input->filterSingle('t', XenForo_Input::STRING));
		$sticky = $this->_input->filterSingle('sticky', XenForo_Input::UINT);
		
		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Post', XenForo_DataWriter::ERROR_SILENT);
		$dw->setExistingData($post);
		
		$dw->set('sticky', empty($sticky) ? 0 : 1);
		$dw->save();

		return $this->getPostSpecificRedirect($post, $team);
	}

	public function actionReport()
	{
		list($post, $team, $category) = $this->_getTeamHelper()->assertPostValidAndViewable();
		
		if (!$post['canReport'])
		{
			return $this->responseNoPermission();
		}
		
		if ($this->isConfirmedPost())
		{
			$reportMessage = $this->_input->filterSingle('message', XenForo_Input::STRING);
			if (!$reportMessage)
			{
				return $this->responseError(new XenForo_Phrase('please_enter_reason_for_reporting_this_message'));
			}
			
			$this->assertNotFlooding('report');

			/* @var $reportModel XenForo_Model_Report */
			$reportModel = XenForo_Model::create('XenForo_Model_Report');
			$reportModel->reportContent('team_post', $post, $reportMessage);

			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX, $team),
				new XenForo_Phrase('thank_you_for_reporting_this_message')
			);
		}
		else
		{
			$viewParams = array(
				'post' => $post,
				'team' => $team,
				'category' => $category,
				'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category),
			);

			return $this->_getTeamViewWrapper('wall', $team, $category, 
				$this->responseView('Nobita_Teams_ViewPublic_Post_Report', 'Team_post_report', $viewParams)
			);
		}
	}
	
	public function actionApprove()
	{
		$this->_checkCsrfFromToken($this->_input->filterSingle('t', XenForo_Input::STRING));
		
		list($post, $team, $category) = $this->_getTeamHelper()->assertPostValidAndViewable();
		if (!$this->_getPostModel()->canApproveUnapprove($post, $team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$action = $this->_input->filterSingle('action', XenForo_Input::STRING);
		if (empty($action))
		{
			return $this->responseNoPermission();
		}
		
		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Post', XenForo_DataWriter::ERROR_SILENT);
		$dw->setExistingData($post['post_id']);
		$dw->setExtraData(Nobita_Teams_DataWriter_Post::TEAM_DATA, $team);

		if ($action == 'confirmed')
		{
			$dw->set('message_state', 'visible');
			$dw->save();
		}

		return $this->getPostSpecificRedirect($post, $team);
	}

	/* comment! */
	public function actionComment()
	{
		list($post, $team, $category) = $this->_getTeamHelper()->assertPostValidAndViewable();
		if (!$this->_getPostModel()->canCommentOnPost($post, $team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		if ($this->_request->isPost())
		{
			$message = $this->_input->filterSingle('message', XenForo_Input::STRING);
			$visitor = XenForo_Visitor::getInstance();

			$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Comment');
			$dw->bulkSet(array(
				'team_id' => $team['team_id'],
				'post_id'=> $post['post_id'],
				'user_id' => $visitor['user_id'],
				'username' => $visitor['username'],
				'message' => $message,
				'comment_type' => 'post'
			));

			$dw->setExtraData(Nobita_Teams_DataWriter_Comment::TEAM_DATA, $team);
			$dw->setExtraData(Nobita_Teams_DataWriter_Comment::POST_DATA, $post);
			$dw->setOption(Nobita_Teams_DataWriter_Comment::OPTION_MAX_TAGGED_USERS, $visitor->hasPermission('general', 'maxTaggedUsers'));

			$dw->preSave();

			if (!$dw->hasErrors())
			{
				$this->assertNotFlooding('post');
			}

			$dw->save();
			
			$commentModel = $this->_getCommentModel();
			if ($this->_noRedirect())
			{
				$comment = $commentModel->getCommentById($dw->get('comment_id'), array(
					'join' => Nobita_Teams_Model_Comment::FETCH_COMMENTER
				));

				$viewParams = array(
					'comment' => $commentModel->prepareComment($comment, $post, $team),
					'post' => $post,
					'team' => $team,
					'category' => $category,
					'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category)
				);

				return $this->responseView('Nobita_Teams_ViewPublic_Post_Comment', '', $viewParams);
			}
			else
			{
				return $this->responseRedirect(
					XenForo_ControllerResponse_Redirect::SUCCESS,
					XenForo_Link::buildPublicLink(TEAM_ROUTE_ACTION . '/posts/show', $post, array(
						'comment_id' => $comment['comment_id']
					))
				);
			}
		}
		else
		{
			/*$viewParams = array(
				'post' => $post,
				'team' => $team,
				'category' => $category,
				'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category),
				'canViewAttachments' => XenForo_Visitor::getInstance()->hasPermission('Team', 'viewAttachment')
			);

			return $this->_getTeamHelper()->getTeamViewWrapper('public', $team, $category,
				$this->responseView('Nobita_Teams_ViewPublic_Post_Comment', 'Team_post_comment_post', $viewParams)
			);*/
			#return $this->responseView('Nobita_Teams_ViewPublic_Post_Comment', 'Team_post_comment_post', $viewParams);
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL_PERMANENT,
				$this->_buildLink(TEAM_ROUTE_PREFIX . '/posts/show', $post, array('focus' => '1', 'comment' => '1'))
			);
		}
	}

	public function actionLike()
	{
		list($post, $team, $category) = $this->_getTeamHelper()->assertPostValidAndViewable();
		
		$postModel = $this->_getPostModel();
		if (!$postModel->canLikePost($post, $team, $category, $key))
		{
			throw $this->getErrorOrNoPermissionResponseException($key);
		}
		
		$likeModel = $this->getModelFromCache('XenForo_Model_Like');
		$existingLike = $likeModel->getContentLikeByLikeUser('team_post', $post['post_id'], XenForo_Visitor::getUserId());

		if ($this->_request->isPost())
		{
			if ($existingLike)
			{
				$latestUsers = $likeModel->unlikeContent($existingLike);
			}
			else
			{
				$postModel->watch($post['post_id'], XenForo_Visitor::getUserId());
				$latestUsers = $likeModel->likeContent('team_post', $post['post_id'], $post['user_id']);
			}

			$liked = ($existingLike ? false : true);
			if ($this->_noRedirect())
			{
				$post['likeUsers'] = $latestUsers;
				$post['likes'] += ($liked ? 1 : -1);
				$post['like_date'] = ($liked ? XenForo_Application::$time : 0);

				$viewParams = array(
					'post' => $post,
					'liked' => $liked,
				);

				return $this->responseView('Nobita_Teams_ViewPublic_Post_LikeConfirmed', '', $viewParams);
			}
			else
			{
				return $this->getPostSpecificRedirect($post, $team);
			}
		}
		else
		{
			$viewParams = array(
				'post' => $post,
				'like' => $existingLike,
				'category' => $category,
				'team' => $team,
				'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category)
			);

			return $this->responseView('Nobita_Teams_ViewPublic_Post_Like', 'Team_post_like', $viewParams);
		}
	}

	public function actionUnwatch()
	{
		$this->_assertPostOnly();

		list($post, $team, $category) = $this->_getTeamHelper()->assertPostValidAndViewable();
		
		$wtype = $this->_input->filterSingle('wtype', XenForo_Input::STRING);
		if (empty($wtype))
		{
			$wtype = 'public';
		}

		$visitor = XenForo_Visitor::getInstance();
		$hasMember = Nobita_Teams_Setup::getInstance()->getTeamFromVisitor($team['team_id']);
		if (empty($hasMember))
		{
			return $this->responseError(new XenForo_Phrase('Teams_you_must_join_team_to_watch_this_post'));
		}
		
		$this->_getPostModel()->unwatch($post['post_id'], XenForo_Visitor::getUserId());
			
		return $this->getPostSpecificRedirect(
			$post, $team, XenForo_ControllerResponse_Redirect::SUCCESS,
			array(
				'linkPhrase' => new XenForo_Phrase('Teams_get_notifications'),
				'linkUrl' => XenForo_Link::buildPublicLink(TEAM_ROUTE_ACTION . '/posts/watch', $post, array(
					'_xfToken' => $visitor['csrf_token_page']
				))
			)
		);
	}

	public function actionWatch()
	{
		$this->_assertPostOnly();

		list($post, $team, $category) = $this->_getTeamHelper()->assertPostValidAndViewable();
		
		$wtype = $this->_input->filterSingle('wtype', XenForo_Input::STRING);
		if (empty($wtype))
		{
			$wtype = 'public';
		}

		$visitor = XenForo_Visitor::getInstance();
		$hasMember = Nobita_Teams_Setup::getInstance()->getTeamFromVisitor($team['team_id']);
		if (empty($hasMember))
		{
			return $this->responseError(new XenForo_Phrase('Teams_you_must_join_team_to_watch_this_post'));
		}
		
		$this->_getPostModel()->watch($post['post_id'], XenForo_Visitor::getUserId());
			
		return $this->getPostSpecificRedirect(
			$post, $team, XenForo_ControllerResponse_Redirect::SUCCESS,
			array(
				'linkPhrase' => new XenForo_Phrase('Teams_stop_notifications'),
				'linkUrl' => XenForo_Link::buildPublicLink(TEAM_ROUTE_ACTION . '/posts/unwatch', $post, array(
					'_xfToken' => $visitor['csrf_token_page']
				))
			)
		);
	}

	public function actionLikes()
	{
		list($post, $team, $category) = $this->_getTeamHelper()->assertPostValidAndViewable();
		
		$likes =  $this->getModelFromCache('XenForo_Model_Like')->getContentLikes('team_post', $post['post_id']);
		if (!$likes)
		{
			return $this->responseError(new XenForo_Phrase('no_one_has_liked_this_post_yet'));
		}

		$viewParams = array(
			'post' => $post,
			'team' => $team,
			'category' => $category,
			'likes' => $likes
		);

		return $this->_getTeamViewWrapper('wall', $team, $category,
			$this->responseView('Nobita_Teams_ViewPublic_Post_Likes', 'Team_post_likes', $viewParams)
		);
	}

	/**
	 * Session activity details.
	 * @see XenForo_Controller::getSessionActivityDetailsForList()
	 */
	public static function getSessionActivityDetailsForList(array $activities)
	{
		return new XenForo_Phrase('viewing_teams');
	}
	
	protected function _getSpamPreventionModel()
	{
		return $this->getModelFromCache('XenForo_Model_SpamPrevention');
	}

}