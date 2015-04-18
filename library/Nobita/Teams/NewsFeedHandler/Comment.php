<?php
class Nobita_Teams_NewsFeedHandler_Comment extends XenForo_NewsFeedHandler_Abstract
{
	public function getContentByIds(array $contentIds, $model, array $viewingUser)
	{
		/* @var $commentModel Nobita_Teams_Model_Comment */
		$commentModel = $model->getModelFromCache('Nobita_Teams_Model_Comment');
		$comments = $commentModel->getCommentsByIds($contentIds, array(
			'join' => Nobita_Teams_Model_Comment::FETCH_TEAM 
				| Nobita_Teams_Model_Comment::FETCH_POST
		));

		return $comments;
	}

	public function canViewNewsFeedItem(array $item, $content, array $viewingUser)
	{
		return XenForo_Model::create('Nobita_Teams_Model_Comment')->canViewComment(
			$content, $content, $content, $null, $viewingUser
		);
	}

	protected function _getDefaultTemplateTitle($contentType, $action)
	{
		return 'Team_news_feed_item_comment_' . $action;
	}
	

}