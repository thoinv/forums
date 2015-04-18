<?php

/**
 * Handles alerts of posts.
 *
 * @package XenForo_Alert
 */
class Dark_PostRating_AlertHandler extends XenForo_AlertHandler_DiscussionMessage
{
	/**
	 * @var XenForo_Model_Post
	 */
	protected $_postModel = null;
	

	protected function _prepareAlertAfterAction(array $item, $content, array $viewingUser)
	{      		
		$item = parent::_prepareAlertAfterAction($item, $content, $viewingUser);
		
		/** @var Dark_PostRating_Model */
		$ratingModel = XenForo_Model::create('Dark_PostRating_Model');
		$ratings = $ratingModel->getRatings();          
		
		$rating = $ratingModel->getRatingByUserOnPost($item['user']['user_id'], $item['content']['post_id']);
		if($rating && array_key_exists($rating, $ratings)){
			$item['content']['rating'] = $ratings[$rating];
		}
	
		return $item;
	}
		
	/**
	 * Gets the post content.
	 * @see XenForo_AlertHandler_Abstract::getContentByIds()
	 */
	public function getContentByIds(array $contentIds, $model, $userId, array $viewingUser)
	{
		$postModel = $this->_getPostModel();

		$posts = $postModel->getPostsByIds($contentIds, array(
			'join' => XenForo_Model_Post::FETCH_THREAD | XenForo_Model_Post::FETCH_FORUM,
			'permissionCombinationId' => $viewingUser['permission_combination_id']
		));
		
		
		return $postModel->unserializePermissionsInList($posts, 'node_permission_cache');
	}

	/**
	 * Determines if the post is viewable.
	 * @see XenForo_AlertHandler_Abstract::canViewAlert()
	 */
	public function canViewAlert(array $alert, $content, array $viewingUser)
	{
		return $this->_getPostModel()->canViewPostAndContainer(
			$content, $content, $content, $null, $content['permissions'], $viewingUser
		);
	}

	/**
	 * @return XenForo_Model_Post
	 */
	protected function _getPostModel()
	{
		if (!$this->_postModel)
		{
			$this->_postModel = XenForo_Model::create('XenForo_Model_Post');
		}

		return $this->_postModel;
	}
}
      