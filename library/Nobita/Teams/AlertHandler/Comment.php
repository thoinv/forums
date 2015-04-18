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
class Nobita_Teams_AlertHandler_Comment extends XenForo_AlertHandler_Abstract
{
	public function getContentByIds(array $contentIds, $model, $userId, array $viewingUser)
	{
		$commentModel = $model->getModelFromCache('Nobita_Teams_Model_Comment');

		$comments = $commentModel->getCommentsByIds($contentIds);

		$post_commentIds = array();
		$event_commentIds = array();

		foreach ($comments as $comment)
		{
			if ($comment['comment_type'] == 'post')
			{
				$post_commentIds[] = $comment['comment_id'];
			}
			elseif ($comment['comment_type'] == 'event') 
			{
				$event_commentIds[] = $comment['comment_id'];
			}
		}

		$results = array();

		if ($post_commentIds)
		{
			$postComments = $commentModel->getCommentsByIds($post_commentIds, array(
				'join' => Nobita_Teams_Model_Comment::FETCH_POST
					| Nobita_Teams_Model_Comment::FETCH_TEAM
			));

			$results = array_merge($results, $postComments);
		}

		if ($event_commentIds)
		{
			$eventComments = $commentModel->getCommentsByIds($event_commentIds, array(
				'join' => Nobita_Teams_Model_Comment::FETCH_EVENT
					| Nobita_Teams_Model_Comment::FETCH_TEAM
			));

			$results = array_merge($results, $eventComments);
		}

		$resultReserved = array();
		foreach ($results as $result)
		{
			$result = $commentModel->prepareComment($result, $result, $result, $viewingUser);

			$resultReserved[$result['comment_id']] = $result;
		}

		return $resultReserved;
	}

	public function canViewAlert(array $alert, $content, array $viewingUser)
	{
		return XenForo_Model::create('Nobita_Teams_Model_Comment')->canViewComment(
			$content, $content, $content, $null, $viewingUser
		);
	}


}