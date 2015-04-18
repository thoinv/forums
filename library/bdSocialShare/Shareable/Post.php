<?php

class bdSocialShare_Shareable_Post extends bdSocialShare_Shareable_Abstract
{
	protected $_postDw;
	protected $_firstPost = null;

	public function __construct(XenForo_DataWriter_DiscussionMessage_Post $postDw)
	{
		$this->_postDw = $postDw;
	}

	public function getId()
	{
		return $this->_postDw->get('post_id');
	}

	public function getLink(XenForo_Model $model)
	{
		$post = $this->_postDw->getMergedData();

		if ($post['position'] == 0)
		{
			// attempt to get thread data
			$thread = $this->_postDw->getDiscussionData();

			if (!empty($thread))
			{
				return XenForo_Link::buildPublicLink('full:threads', $thread);
			}
		}

		return XenForo_Link::buildPublicLink('full:posts', $post);
	}

	public function getImage(XenForo_Model $model)
	{
		$post = $this->_postDw->getMergedData();

		if ($post['position'] > 0)
		{
			// this is a reply, use the first post image
			$firstPost = $this->_getFirstPost($model);

			$image = $this->_getImageFromPost($model, $firstPost);
		}
		else
		{
			// this is the first post, use its image
			$image = $this->_getImageFromPost($model, $post);
		}

		if (!empty($image))
		{
			return $image;
		}

		return parent::getImage($model);
	}

	public function getTitle(XenForo_Model $model)
	{
		$post = $this->_postDw->getMergedData();
		$thread = $this->_postDw->getDiscussionData();
		$params = array(
			'post' => $post,
			'thread' => $thread,
		);

		$isReply = $post['position'] > 0;
		$isAuto = $post['user_id'] != $this->getViewingUserId();
		$templateName = $isReply ? 'bdsocialshare_title_reply' : 'bdsocialshare_title_thread';
		if ($isAuto)
		{
			$templateName .= '_auto';
		}

		return $this->_getSimulationTemplate($templateName, $params);
	}

	public function getDescription(XenForo_Model $model)
	{
		$post = $this->_postDw->getMergedData();
		$thread = $this->_postDw->getDiscussionData();
		$params = false;

		if ($post['position'] > 0)
		{
			// this is a reply, use the first post body
			$firstPost = $this->_getFirstPost($model);

			if (!empty($firstPost))
			{
				$params = array(
					'firstPost' => $firstPost,
					'snippet' => $this->_getSnippetFromBbCodeMessage($model, $firstPost['message']),
				);
			}
		}
		else
		{
			// this is the first post, use its body as the description
			$params = array(
				'fistPost' => $post,
				'snippet' => $this->_getSnippetFromBbCodeMessage($model, $post['message']),
			);
		}

		if (!empty($params))
		{
			$params['post'] = $post;
			$params['thread'] = $thread;

			if ($post['user_id'] == $this->getViewingUserId())
			{
				return $this->_getSimulationTemplate('bdsocialshare_description_post', $params);
			}
			else
			{
				return $this->_getSimulationTemplate('bdsocialshare_description_post_auto', $params);
			}
		}
		else
		{
			return parent::getDescription($model);
		}
	}

	public function getUserText(XenForo_Model $model)
	{
		$post = $this->_postDw->getMergedData();
		$thread = $this->_postDw->getDiscussionData();
		$params = array(
			'post' => $post,
			'thread' => $thread,
			'snippet' => $this->_getSnippetFromBbCodeMessage($model, $post['message']),
		);

		$isReply = $post['position'] > 0;
		$isAuto = $post['user_id'] != $this->getViewingUserId();
		$templateName = $isReply ? 'bdsocialshare_user_text_reply' : 'bdsocialshare_user_text_thread';
		if ($isAuto)
		{
			$templateName .= '_auto';
		}

		return $this->_getSimulationTemplate($templateName, $params);
	}

	public function getPreConfiguredTargets()
	{
		$post = $this->_postDw->getMergedData();

		if (isset($post['message_state']) AND $post['message_state'] !== 'visible')
		{
			// not visible, no auto share
			return parent::getPreConfiguredTargets();
		}

		if ($post['position'] == 0)
		{
			$visitor = XenForo_Visitor::getInstance();

			if ($post['user_id'] == $visitor['user_id'] AND $visitor->hasPermission('general', 'bdSocialShare_threadAuto'))
			{
				$threadDw = $this->_postDw->getDiscussionDataWriter();

				if (!empty($threadDw))
				{
					$forumData = $threadDw->bdSocialShare_getForumData();

					$forumDataThreadAuto = bdSocialShare_Helper_Common::unserializeOrFalse($forumData, 'bdsocialshare_threadauto');

					if ($forumDataThreadAuto !== false)
					{
						// forum configuration takes precedence
						return $forumDataThreadAuto;
					}
					else
					{
						// use system configuration
						$option = bdSocialShare_Option::get('threadAuto');
						if (is_array($option))
						{
							return $option;
						}
					}
				}
			}
		}

		return parent::getPreConfiguredTargets();
	}

	protected function _getFirstPost(XenForo_Model $model)
	{
		if ($this->_firstPost === null)
		{
			$thread = $this->_postDw->getDiscussionData();

			if (!empty($thread['first_post_id']))
			{
				$this->_firstPost = $model->getModelFromCache('XenForo_Model_Post')->getPostById($thread['first_post_id']);
			}
		}

		return $this->_firstPost;
	}

	protected function _getImageFromPost(XenForo_Model $model, array $post)
	{
		return $this->_getImageFromBbCodeMessage($model, $post, 'post', $post['post_id']);
	}

	public static function createFromId($id)
	{
		$dw = XenForo_DataWriter::create('XenForo_DataWriter_DiscussionMessage_Post');
		$dw->setExistingData($id);

		return new self($dw);
	}

}
