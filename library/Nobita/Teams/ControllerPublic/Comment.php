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
class Nobita_Teams_ControllerPublic_Comment extends Nobita_Teams_ControllerPublic_Abstract
{
	public function actionIndex()
	{
		list ($comment, $commentType) = $this->_assertCommentValidOrResponseException();
		$hash = sprintf('#comment-%d', $comment['comment_id']);

		if ($commentType == 'post')
		{
			list ($post, $team, $category) = $this->_getTeamHelper()->assertPostValidAndViewable($comment['post_id']);

			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL_PERMANENT,
				$this->_buildLink(TEAM_ROUTE_PREFIX . '/posts/show', $post) . $hash
			);
		}
		elseif ($commentType == 'event')
		{
			list ($event, $team, $category) = $this->_getTeamHelper()->assertEventValidAndViewable($comment['post_id']);

			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL_PERMANENT,
				$this->_buildLink(TEAM_ROUTE_PREFIX . '/events', $event) . $hash
			);
		}
		else
		{
			throw $this->getNoPermissionResponseException();
		}
	}

	public function actionEdit()
	{
		list($comment, $commentType) = $this->_assertCommentValidOrResponseException();
		$hash = sprintf('#comment-%d', $comment['comment_id']);

		$viewParams = array();
		$commentModel = $this->_getCommentModel();

		if ($commentType == 'post')
		{
			list($post, $team, $category) = $this->_getTeamHelper()->assertPostValidAndViewable();
			$wallType = $this->_input->filterSingle('wtype', XenForo_Input::STRING);

			$redirect = XenForo_Link::buildPublicLink(
				TEAM_ROUTE_PREFIX, $team, array(
					'wtype' => $wallType
				)
			) . $hash;

			$viewParams['post'] = $post;
			$viewParams['wallType'] = $wallType;
		}
		elseif ($commentType == 'event')
		{
			list($event, $team, $category) = $this->_getTeamHelper()->assertEventValidAndViewable();
			
			$redirect = XenForo_Link::buildPublicLink(
				TEAM_ROUTE_PREFIX . '/events', $event
			) . $hash;

			$viewParams['event'] = $event;
		}
		else
		{
			throw $this->getNoPermissionResponseException();
		}

		if (!$commentModel->canEditComment($comment, $comment, $team, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		if ($this->_request->isPost())
		{
			$message = $this->_input->filterSingle('message', XenForo_Input::STRING);

			$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Comment', XenForo_DataWriter::ERROR_SILENT);
			$dw->setExistingData($comment);
	
			$dw->set('message', $message);
			$dw->save();

			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL_PERMANENT,
				$redirect
			); // st
		}
		else
		{
			$formParams = array();
			if (isset($viewParams['wallType']))
			{
				$formParams['wtype'] = $viewParams['wallType'];
			}
			$viewParams = array_merge($viewParams, array(
				'team' => $team,
				'category' => $category,
				'comment' => $comment,
				'formAction' => XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX . '/comments/edit', $comment, $formParams)
			));
			return $this->_getTeamViewWrapper('wall', $team, $category,
				$this->responseView('Nobita_Teams_ViewPublic_Comment_Edit', 'Team_comment_edit', $viewParams)
			);
		}
	}

	public function actionDelete()
	{
		$this->_checkCsrfFromToken($this->_input->filterSingle('t', XenForo_Input::STRING));

		list($comment, $commentType) = $this->_assertCommentValidOrResponseException();

		$viewParams = array();
		if ($commentType == 'post')
		{
			list($post, $team, $category) = $this->_getTeamHelper()->assertPostValidAndViewable();
			$wallType = $this->_input->filterSingle('wtype', XenForo_Input::STRING);

			$redirect = XenForo_Link::buildPublicLink(
				TEAM_ROUTE_PREFIX . '/posts/show', $post, array(
					'wtype' => $wallType
				)
			);

			$viewParams['post'] = $post;
			$viewParams['wallType'] = $wallType;
		}
		elseif ($commentType == 'event')
		{
			list($event, $team, $category) = $this->_getTeamHelper()->assertEventValidAndViewable();
			
			$redirect = XenForo_Link::buildPublicLink(
				TEAM_ROUTE_PREFIX . '/events', $event
			);

			$viewParams['event'] = $event;
		}
		else
		{
			throw $this->getNoPermissionResponseException();
		}

		if (!$this->_getCommentModel()->canDeleteComment($comment, $comment, $team, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$this->_getCommentModel()->deleteComment($comment['comment_id']);

		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			$redirect
		);
	}

	protected function _assertCommentValidOrResponseException($commentId = null, $commentType = '', array $fetchOptions = array())
	{
		$commentModel = $this->_getCommentModel();

		if (is_null($commentId))
		{
			$commentId = $this->_input->filterSingle('comment_id', XenForo_Input::UINT);
		}

		if ($commentType == '')
		{
			$commentType = $this->_input->filterSingle('comment_type', XenForo_Input::STRING);
		}

		if (!isset($fetchOptions['join']))
		{
			$fetchOptions['join'] = 0;
		}

		$fetchOptions['join'] |= Nobita_Teams_Model_Comment::FETCH_COMMENTER
								| Nobita_Teams_Model_Comment::FETCH_TEAM;

		if ($commentType == 'post')
		{
			$fetchOptions['join'] |= Nobita_Teams_Model_Comment::FETCH_POST;
		}
		elseif ($commentType == 'event')
		{
			$fetchOptions['join'] |= Nobita_Teams_Model_Comment::FETCH_EVENT;
		}
		elseif ($commentType == 'INGORED') 
		{
			// Ignored this type.
		}
		else
		{
			throw $this->getNoPermissionResponseException();
		}

		$comment = $commentModel->getCommentById($commentId, $fetchOptions);
		if (!$comment)
		{
			throw $this->responseException(
				$this->responseError(new XenForo_Phrase('Teams_requested_comment_not_found'), 404)
			);
		}
		$comment = $commentModel->prepareComment($comment, $comment, $comment);

		return array($comment, $commentType);
	}

	public function actionMore()
	{
		list($post, $team, $category) = $this->_getTeamHelper()->assertPostValidAndViewable();

		$beforeDate = $this->_input->filterSingle('before', XenForo_Input::UINT);
		$postModel = $this->_getPostModel();
		$commentModel = $this->_getCommentModel();

		$comments = $commentModel->getCommentsOnPostId($post['post_id'], $beforeDate, array(
			'join' => Nobita_Teams_Model_Comment::FETCH_COMMENTER,
			'limit' => 2
		));
		if (!$comments)
		{
			return $this->responseMessage(new XenForo_Phrase('no_comments_to_display'));
		}

		foreach ($comments as &$comment)
		{
			$comment = $this->_getCommentModel()->prepareComment($comment, $post, $team);
		}

		$firstCommentShown = reset($comments);
		$lastCommentShown = end($comments);

		if ($this->_noRedirect())
		{
			$viewParams = array(
				'post' => $post,
				'team' => $team,
				'category' => $category,
				
				'comments' => $comments,
				'firstCommentShown' => $firstCommentShown,
				'lastCommentShown' => $lastCommentShown,
				'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category)
			);
		
			return $this->_getTeamViewWrapper('wall', $team, $category,
				$this->responseView('Nobita_Teams_ViewPublic_Post_Comments', 'Team_post_comments', $viewParams)
			);
		}
		else
		{
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL_PERMANENT,
				XenForo_Link::buildPublicLink(TEAM_ROUTE_PREFIX . '/posts/show', $post)
			);
		}
		
	}

	public function actionLike()
	{
		// TODO
		$this->_assertPostOnly();

		list($comment, $commentType) = $this->_assertCommentValidOrResponseException();
		if ($commentType == 'post')
		{
			list ($post, $team, $category) = $this->_getTeamHelper()->assertPostValidAndViewable($comment['post_id']);
			
			$redirect = $this->_buildLink(TEAM_ROUTE_PREFIX . '/posts/show', $post);
		}
		elseif ($commentType == 'event')
		{
			list ($event, $team, $category) = $this->_getTeamHelper()->assertEventValidAndViewable($comment['post_id']);

			$redirect = $this->_buildLink(TEAM_ROUTE_PREFIX . '/events', $event);
		}
		else
		{
			throw $this->getNoPermissionResponseException();
		}

		if (!$this->_getCommentModel()->canLikeComment($comment, $team, $category, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$likeModel = $this->getModelFromCache('XenForo_Model_Like');
		$existingLike = $likeModel->getContentLikeByLikeUser(
			'team_comment', $comment['comment_id'], XenForo_Visitor::getUserId()
		);

		if ($existingLike)
		{
			$latestUsers = $likeModel->unlikeContent($existingLike);
		}
		else
		{
			$latestUsers = $likeModel->likeContent('team_comment', $comment['comment_id'], $comment['user_id']);
		}

		$liked = ($existingLike ? false : true);
		if ($this->_noRedirect())
		{
			$comment['likeUsers'] = $latestUsers;
			$comment['likes'] += ($liked ? 1 : -1);
			$comment['like_date'] = ($liked ? XenForo_Application::$time : 0);

			$viewParams = array(
				'comment' => $comment,
				'liked' => $liked,
			);

			return $this->responseView('Nobita_Teams_ViewPublic_Comment_LikeConfirmed', '', $viewParams);
		}
		else
		{
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				$redirect
			);
		}
	}

	public function actionLikes()
	{
		list ($comment, $commentType) = $this->_assertCommentValidOrResponseException(null, 'INGORED');

		$likes =  $this->getModelFromCache('XenForo_Model_Like')->getContentLikes(
			'team_comment', $comment['comment_id']
		);
		if (!$likes)
		{
			return $this->responseError(new XenForo_Phrase('no_one_has_liked_this_post_yet'));
		}

		$viewParams = array(
			'post' => $comment,
			'team' => $team,
			'category' => $category,
			'likes' => $likes
		);

		return $this->_getTeamViewWrapper('wall', $team, $category,
			$this->responseView('Nobita_Teams_ViewPublic_Post_Likes', 'Team_post_likes', $viewParams)
		);
	}
}