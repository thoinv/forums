<?php

class Nobita_Teams_DataWriter_Post extends XenForo_DataWriter
{
	const TEAM_DATA = 'teamData';
	
	/**
	 * Option that controls the maximum number of characters that are allowed in
	 * a message.
	 *
	 * @var string
	 */
	const OPTION_MAX_MESSAGE_LENGTH = 'maxMessageLength';

	/**
	 * Maximum number of images allowed in a message.
	 *
	 * @var string
	 */
	const OPTION_MAX_IMAGES = 'maxImages';

	/**
	 * Maximum pieces of media allowed in a message.
	 *
	 * @var string
	 */
	const OPTION_MAX_MEDIA = 'maxMedia';
	/**
	 * Option that controls whether this should be published in the news feed. Defaults to true.
	 *
	 * @var string
	 */
	const OPTION_PUBLISH_FEED = 'publishFeed';
	
	const OPTION_MAX_TAGGED_USERS = 'maxTaggedUsers';
	protected $_taggedUsers = array();

	/**
	 * Holds the temporary hash used to pull attachments and associate them with this message.
	 *
	 * @var string
	 */
	const DATA_ATTACHMENT_HASH = 'attachmentHash';

	protected function _getFields()
	{
		return array(
			'xf_team_post' => array(
				'post_id' => array('type' => self::TYPE_UINT, 'autoIncrement' => true),
				'team_id' => array('type' => self::TYPE_UINT, 'required' => true),
				'user_id' => array('type' => self::TYPE_UINT, 'required' => true),
				'username' => array('type' => self::TYPE_STRING, 'default' => '', 'maxLength' => 50),
				'post_date' => array('type' => self::TYPE_UINT, 'default' => XenForo_Application::$time),
				'message' => array('type' => self::TYPE_STRING, 'requiredError' => 'please_enter_valid_message', 'required' => true),

				'message_state' => array('type' => self::TYPE_STRING,
					'allowedValues' => array('moderated', 'visible'), 'default' => 'visible'),
				'likes' => array('type' => self::TYPE_UINT_FORCED, 'default' => 0),
				'like_users' => array('type' => self::TYPE_SERIALIZED, 'default' => 'a:0:{}'),
				'comment_count' => array('type' => self::TYPE_UINT_FORCED, 'default' => 0),
				'warning_id' => array('type' => self::TYPE_UINT, 'default' => 0),
				
				'first_comment_date' => array('type' => self::TYPE_UINT, 'default' => XenForo_Application::$time),
				'last_comment_date' => array('type' => self::TYPE_UINT, 'default' => XenForo_Application::$time),
				'latest_comment_ids' => array('type' => self::TYPE_BINARY, 'maxLength' => 100, 'default' => ''),

				'sticky' => array('type' => self::TYPE_BOOLEAN, 'default' => 0),
				'system_posting' => array('type' => self::TYPE_BOOLEAN, 'default' => 0),
				'attach_count' => array('type' => self::TYPE_UINT_FORCED, 'default' => 0, 'max' => 65535),

				'discussion_type' => array(
					'type' => self::TYPE_BINARY,
					'allowedValues' => Nobita_Teams_Model_Post::$postTypesSupported,
					'default' => 'public',
					'maxLength' => 25
				)
			)
		);
	}

	protected function _getExistingData($data)
	{
		if (!$id = $this->_getExistingPrimaryKey($data))
		{
			return false;
		}
	
		return array('xf_team_post' => $this->_getPostModel()->getPostById($id));
	}
	
	protected function _getUpdateCondition($tableName)
	{
		return 'post_id = ' . $this->_db->quote($this->getExisting('post_id'));
	}
	
	protected function _getDefaultOptions()
	{
		$options = XenForo_Application::get('options');
		
		return array(
			self::OPTION_MAX_MESSAGE_LENGTH => $options->messageMaxLength,
			self::OPTION_MAX_IMAGES => $options->messageMaxImages,
			self::OPTION_MAX_MEDIA => $options->messageMaxMedia,
			self::OPTION_PUBLISH_FEED => true,
			self::OPTION_MAX_TAGGED_USERS => 0
		);
	}

	/**
	 * Check that the contents of the message are valid, based on length, images, etc.
	 */
	protected function _checkMessageValidity()
	{
		$message = $this->get('message');

		$maxLength = $this->getOption(self::OPTION_MAX_MESSAGE_LENGTH);
		if ($maxLength && utf8_strlen($message) > $maxLength)
		{
			$this->error(new XenForo_Phrase('please_enter_message_with_no_more_than_x_characters', array('count' => $maxLength)), 'message');
		}

		$maxImages = $this->getOption(self::OPTION_MAX_IMAGES);
		$maxMedia = $this->getOption(self::OPTION_MAX_MEDIA);
		if ($maxImages || $maxMedia)
		{
			$formatter = XenForo_BbCode_Formatter_Base::create('ImageCount', false);
			$parser = XenForo_BbCode_Parser::create($formatter);
			$parser->render($message);

			if ($maxImages && $formatter->getImageCount() > $maxImages)
			{
				$this->error(new XenForo_Phrase('please_enter_message_with_no_more_than_x_images', array('count' => $maxImages)), 'message');
			}
			if ($maxMedia && $formatter->getMediaCount() > $maxMedia)
			{
				$this->error(new XenForo_Phrase('please_enter_message_with_no_more_than_x_media', array('count' => $maxMedia)), 'message');
			}
		}
	}

	public function getPostId()
	{
		return $this->get('post_id');
	}

	public function getPostContentType()
	{
		return 'team_post';
	}

	protected function _preSave()
	{
		$team = $this->_getTeamData();
		if (!$team)
		{
			$this->error(new XenForo_Phrase('Teams_requested_team_not_found'));
		}

		if ($this->isChanged('message'))
		{
			$this->_checkMessageValidity();
			
			/** @var $taggingModel XenForo_Model_UserTagging */
			$taggingModel = $this->getModelFromCache('XenForo_Model_UserTagging');

			$this->_taggedUsers = $taggingModel->getTaggedUsersInMessage(
				$this->get('message'), $newMessage, 'bb'
			);
			$this->set('message', $newMessage);
		}
	}

	protected function _postSave()
	{
		if ($this->isChanged('message_state'))
		{
			$dw = $this->_getTeamData();
			if ($this->get('message_state') == 'visible' && $this->getExisting('message_state') != 'visible')
			{
				$dw->updateMessageCount(1);
				$dw->save();
			}
			
			if ($this->getExisting('message_state') == 'visible')
			{
				$dw->updateMessageCount(-1);
				$dw->save();
			}
		}
		
		$attachmentHash = $this->getExtraData(self::DATA_ATTACHMENT_HASH);
		if ($attachmentHash)
		{
			$this->_associateAttachments($attachmentHash);
		}
		
		$db = $this->_db;
		if ($this->isInsert())
		{
			$db->update('xf_team', array('last_activity' => XenForo_Application::$time),
				'team_id = ' . $db->quote($this->get('team_id'))
			);
		}
	}
	
	/**
	 * Post-save handling, after the transaction is committed.
	 */
	protected function _postSaveAfterTransaction()
	{
		// perform alert actions if the message is visible, and is a new insert,
		// or is an update where the message state has changed from 'moderated'

		if ($this->get('message_state') == 'visible' && !$this->get('system_posting'))
		{
			if ($this->isInsert() || $this->getExisting('message_state') == 'moderated')
			{
				$post = $this->getMergedData();
				$team = $this->_getTeamExtraData();

				$this->_publishToNewsFeed();

				$alertedUsers = array();
				$maxTagged = $this->getOption(self::OPTION_MAX_TAGGED_USERS);				
				if ($maxTagged && $this->_taggedUsers)
				{
					if ($maxTagged > 0)
					{
						$alertTagged = array_slice($this->_taggedUsers, 0, $maxTagged, true);
					}
					else
					{
						$alertTagged = $this->_taggedUsers;
					}

					$alertedUsers = array_merge(
						$alertedUsers,
						$this->_getPostModel()->alertTaggedMembers($post, $team, $alertTagged, $alertedUsers)
					);
				}

				$this->_getPostModel()->sendNotificationsToUser($post, $team, $alertedUsers);
			}
		}
	}

	/**
	 * Associates attachments with this message.
	 *
	 * @param string $attachmentHash
	 */
	protected function _associateAttachments($attachmentHash)
	{
		$rows = $this->_db->update('xf_attachment', array(
			'content_type' => $this->getPostContentType(),
			'content_id' => $this->getPostId(),
			'temp_hash' => '',
			'unassociated' => 0
		), 'temp_hash = ' . $this->_db->quote($attachmentHash));
		if ($rows)
		{
			// TODO: ideally, this can be consolidated with other post-save message updates (see updateIpData)
			$this->set('attach_count', $this->get('attach_count') + $rows, '', array('setAfterPreSave' => true));

			$this->_db->update('xf_team_post', array(
				'attach_count' => $this->get('attach_count')
			), 'post_id = ' .  $this->_db->quote($this->getPostId()));
		}
	}

	protected function _getTeamExtraData()
	{
		if (!$this->getExtraData(self::TEAM_DATA))
		{
			$team = $this->getModelFromCache('Nobita_Teams_Model_Team')->getFullTeamById($this->get('team_id'));
			$this->setExtraData(self::TEAM_DATA, $team ? $team : array());
		}

		return $this->getExtraData(self::TEAM_DATA);
	}

	protected function _getTeamData()
	{
		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Team', XenForo_DataWriter::ERROR_SILENT);
		if ($dw->setExistingData($this->get('team_id')))
		{
			return $dw;
		}
		else
		{
			return false;
		}
	}
	
	protected function _postDelete()
	{
		$db = $this->_db;
		$postId = $this->get('post_id');

		if ($this->get('message_state') == 'visible')
		{
			$this->_getAlertModel()->deleteAlerts('team_post', array($postId));
		}

		$commentIds = $db->fetchCol('
			SELECT comment_id
			FROM xf_team_post_comment
			WHERE post_id = ?
				AND comment_type = ?
		', array($postId, Nobita_Teams_Model_Comment::COMMENT_TYPE_POST));
		if ($commentIds)
		{
			$this->_getAlertModel()->deleteAlerts('team_comment', $commentIds);
			$db->delete('xf_team_post_comment', 'post_id = ' . $db->quote($postId));
		}

		$totalComments = $this->get('comment_count') + 1; // include post + comments
		$teamDw = $this->_getTeamData();
		if ($teamDw)
		{
			$teamDw->updateMessageCount(-$totalComments);
			$teamDw->save();
		}

		if ($this->get('likes'))
		{
			$this->_deleteLikes();
		}

		if ($this->get('attach_count'))
		{
			$this->getModelFromCache('XenForo_Model_Attachment')->deleteAttachmentsFromContentIds(
				$this->getPostContentType(), array($this->getPostId())
			);
		}

		$this->_deleteFromNewsFeed();
		$this->getModelFromCache('XenForo_Model_BbCode')->deleteBbCodeParseCacheForContent(
			$this->getPostContentType(), $this->getPostId()
		);
	}

	/* BUILDING NEWS FEED SYSTEM. */
	/**
	 * Publishes an insert or update event to the news feed
	 */
	protected function _publishToNewsFeed()
	{
		$this->_getNewsFeedModel()->publish(
			$this->get('user_id'),
			$this->get('username'),
			$this->getPostContentType(),
			$this->getPostId(),
			'insert'
		);
	}

	/**
	 * Removes an already published news feed item
	 */
	protected function _deleteFromNewsFeed()
	{
		$this->_getNewsFeedModel()->delete($this->getPostContentType(), $this->getPostId());
	}

	/**
	 * Delete all like entries for content.
	 */
	protected function _deleteLikes()
	{
		$updateUserLikeCounter = ($this->get('message_state') == 'visible');
		$this->getModelFromCache('XenForo_Model_Like')->deleteContentLikes(
			$this->getPostContentType(), $this->getPostId(), $updateUserLikeCounter
		);
	}

	public function rebuildPostCommentCounters()
	{
		$db = $this->_db;
		
		$postId = $this->get('post_id');
		$counts = $db->fetchRow('
			SELECT COUNT(*) AS comment_count,
				MIN(comment_date) AS first_comment_date,
				MAX(comment_date) AS last_comment_date
			FROM xf_team_post_comment
			WHERE post_id = ? AND comment_type = \'post\'
		', $postId);
		
		if ($counts['comment_count'])
		{
			$ids = $db->fetchCol($db->limit(
				'
					SELECT comment_id
					FROM xf_team_post_comment
					WHERE post_id = ? AND comment_type = \'post\'
					ORDER BY comment_date DESC
				', 3
			), $postId);
		}
		else
		{
			$ids = array();
		}
		
		$this->bulkSet($counts);
		$this->set('latest_comment_ids', implode(',', $ids));
		
		// we have update message count which has got new comment!
		$teamDw = $this->_getTeamData();
		$teamDw->updateMessageCount(-1);
		$teamDw->save();
	}

	public function insertNewComment($commentId, $commentDate)
	{
		$this->set('comment_count', $this->get('comment_count') + 1);
		if (!$this->get('first_comment_date') || $commentDate < $this->get('first_comment_date'))
		{
			$this->set('first_comment_date', $commentDate);
		}

		$this->set('last_comment_date', max($this->get('last_comment_date'), $commentDate));

		$latest = $this->get('latest_comment_ids');
		$ids = ($latest ? explode(',', $latest) : array());
		$ids[] = $commentId;

		if (count($ids) > 3)
		{
			$ids = array_slice($ids, -3);
		}

		$this->set('latest_comment_ids', implode(',', $ids));
		
		// we have update message count which has got new comment!
		$teamDw = $this->_getTeamData();
		$teamDw->updateMessageCount(1);
		$teamDw->save();
	}

	protected function _getNewsFeedModel()
	{
		return $this->getModelFromCache('XenForo_Model_NewsFeed');
	}
	
	protected function _getCommentModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Comment');
	}
	
	protected function _getPostModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Post');
	}
}