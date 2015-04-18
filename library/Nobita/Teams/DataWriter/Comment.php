<?php

class Nobita_Teams_DataWriter_Comment extends XenForo_DataWriter
{
	const TEAM_DATA = 'teamData';
	const POST_DATA = 'postData';

	const OPTION_MAX_MESSAGE_LENGTH = 'maxMessageLength';
	const OPTION_MAX_TAGGED_USERS = 'maxTaggedUsers';

	protected $_taggedUsers = array();

	protected function _getFields()
	{
		return array(
			'xf_team_post_comment' => array(
				'comment_id' => array('type' => self::TYPE_UINT, 'autoIncrement' => true),
				'post_id' => array('type' => self::TYPE_UINT, 'required' => true),
				'user_id' => array('type' => self::TYPE_UINT, 'required' => true),
				'team_id' => array('type' => self::TYPE_UINT, 'required' => true),
				
				'username' => array('type' => self::TYPE_STRING, 'maxLength' => 50, 'default' => ''),
				'comment_date' => array('type' => self::TYPE_UINT, 'default' => XenForo_Application::$time),
				'message' => array('type' => self::TYPE_STRING, 'required' => true,
					'requiredError' => 'please_enter_valid_message'),
					
				// 1.1.3
				'comment_type' => array(
					'type' => self::TYPE_BINARY,
					'allowedValues' => array('post', 'event'),
					'default' => 'post',
					'maxLength' => 25
				),
				'likes' => array('type' => self::TYPE_UINT, 'default' => 0),
				'like_users' => array('type' => self::TYPE_SERIALIZED, 'default' => 'a:0:{}')
			)
		);
	}

	protected function _getExistingData($data)
	{
		if (!$id = $this->_getExistingPrimaryKey($data))
		{
			return false;
		}

		return array('xf_team_post_comment' => $this->_getCommentModel()->getCommentById($id));
	}
	
	protected function _getUpdateCondition($tableName)
	{
		return 'comment_id = ' . $this->_db->quote($this->getExisting('comment_id'));
	}
	
	/**
	* Gets the default set of options for this data writer.
	*
	* @return array
	*/
	protected function _getDefaultOptions()
	{
		$options = parent::_getDefaultOptions();
		$options[self::OPTION_MAX_MESSAGE_LENGTH] = XenForo_Application::getOptions()->Teams_commentLength;
		$options[self::OPTION_MAX_TAGGED_USERS] = 0;

		return $options;
	}
	
	protected function _preSave()
	{
		if ($this->isChanged('message'))
		{
			$this->_checkMessageValidity();
		}
		
		// do this auto linking after length counting
		/** @var $taggingModel XenForo_Model_UserTagging */
		$taggingModel = $this->getModelFromCache('XenForo_Model_UserTagging');

		$this->_taggedUsers = $taggingModel->getTaggedUsersInMessage(
			$this->get('message'), $newMessage, 'bb'
		);

		$this->set('message', $newMessage);
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
			return false;
		}
	}

	protected function _postSave()
	{
		if ($this->isInsert())
		{
			$function = sprintf('_sendAlerts_%s', $this->get('comment_type'));

			$comment = $this->getMergedData();
			$team = $this->_getTeamData();

			try
			{
				$this->$function($comment, $team);
			}
			catch (Exception $e)
			{
				XenForo_Error::logException($e);
			}

			// should be update new feed!
			$this->_publishToNewsFeed();

			$db = $this->_db;
			$db->update('xf_team', array('last_activity' => XenForo_Application::$time),
				'team_id = ' . $db->quote($this->get('team_id'))
			);
		}
	}

	protected function _sendAlerts_post(array $comment, array $team)
	{
		$postDw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Post', XenForo_DataWriter::ERROR_SILENT);
		$postDw->setExtraData(Nobita_Teams_DataWriter_Post::TEAM_DATA, $this->getExtraData(self::TEAM_DATA));
		$postDw->setExistingData($this->get('post_id'));
		$postDw->insertNewComment($this->get('comment_id'), $this->get('comment_date'));	
		$postDw->save();

		$post = $postDw->getMergedData();

		$postModel = $this->getModelFromCache('Nobita_Teams_Model_Post');

				
		$alreadyAlerted = array();
		if ($post['user_id'] != $comment['user_id'])
		{
			// send alert to owner of post.
			if (!isset($post['alert']))
			{
				$post = $postModel->getPostById($post['post_id'], array(
					'join' => Nobita_Teams_Model_Post::FETCH_MEMBER
				));
			}

			$this->_sendAlertToUsersWatchedOnPost($post, 'on_your');
			$alreadyAlerted[$post['user_id']] = true;
		}
		
		// send to tag users first
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

			$alreadyAlerted = array_merge(
				$alreadyAlerted,
				$this->_getCommentModel()->alertTaggedMembers(
					$comment, $post, $team, $alertTagged, $alreadyAlerted
				)
			);
		}

		$users = $this->_getCommentModel()->getUsersWatchedOnPost($post['post_id'], array(
			'join' => Nobita_Teams_Model_Comment::FETCH_USER 
				| Nobita_Teams_Model_Comment::FETCH_MEMBER_ALERT
		));

		foreach ($users as $user)
		{
			switch($user['user_id'])
			{
				case $post['user_id']:
				case $this->get('user_id'):
				// fixed! if visitor watched on post but still get notification! 
					$alreadyAlerted[$user['user_id']] = true; break;
				default:
					$this->_sendAlertToUsersWatchedOnPost($user, 'on_commenter', $alreadyAlerted);
					$alreadyAlerted[$user['user_id']] = true;
			}
		}

		$watchers = $postModel->getWatchers($post['post_id']);
		foreach ($watchers as $watcher)
		{
			if (isset($alreadyAlerted[$watcher['user_id']]))
			{
				continue;
			}

			$this->_sendAlertToUsersWatchedOnPost($watcher, 'on_commenter', $alreadyAlerted);
			$alreadyAlerted[$watcher['user_id']] = true;
		}
	}

	protected function _sendAlerts_event(array $comment, array $team)
	{
		$eventModel = $this->getModelFromCache('Nobita_Teams_Model_Event');

		$event = $eventModel->getEventById($comment['post_id']);
		if (!$event)
		{
			return;
		}

		$db = $this->_db;
		$userIds = $db->fetchAll('
			SELECT pc.user_id, tm.alert, tm.send_alert
			FROM xf_team_post_comment AS pc
				LEFT JOIN xf_team_member as tm ON (tm.user_id = pc.user_id)
			WHERE pc.post_id = ? AND pc.comment_type = ?
			GROUP BY pc.user_id
			ORDER BY pc.user_id
		', array($event['event_id'], 'event'));

		foreach ($userIds as $user)
		{
			if ($user['user_id'] == $event['user_id'])
			{
				continue;
			}

			if ($user['alert'] && $user['send_alert'])
			{
				XenForo_Model_Alert::alert($event['user_id'],
					$comment['user_id'], $comment['username'],
					$this->getContentType(), $this->getCommentId(),
					'event_comment'
				);
			}
		}
	}

	protected function _sendAlertToUsersWatchedOnPost(array $userAlerted, $action, array $alerted = array())
	{
		if (!XenForo_Model_Alert::userReceivesAlert($userAlerted, $this->getContentType(), $action)
			|| XenForo_Model::create('XenForo_Model_User')->isUserIgnored($userAlerted, $this->get('user_id'))
		)
		{
			return; // not sure about this.
		}

		if ($userAlerted['alert'] !== null AND empty($userAlerted['alert']))
		{
			return; // user don't receive any alerts.
		}

		if (!isset($alerted[$userAlerted['user_id']]))
		{
			XenForo_Model_Alert::alert($userAlerted['user_id'], 
				$this->get('user_id'), 
				$this->get('username'),
				$this->getContentType(),
				$this->getCommentId(),
				$action
			);
		}
	}

	public function getContentType()
	{
		return 'team_comment';
	}

	public function getCommentId()
	{
		return $this->get('comment_id');
	}

	/**
	 * Publishes an insert or update event to the news feed
	 */
	protected function _publishToNewsFeed()
	{
		$this->_getNewsFeedModel()->publish(
			$this->get('user_id'),
			$this->get('username'),
			$this->getContentType(),
			$this->getCommentId(),
			'insert'
		);
	}

	protected function _getTeamData()
	{
		if (!$this->getExtraData(static::TEAM_DATA))
		{
			$team = $this->getModelFromCache('Nobita_Teams_Model_Team')->getFullTeamById($this->get('team_id'));
			$this->setExtraData(static::TEAM_DATA, $team ? $team : array());
		}

		return $this->getExtraData(static::TEAM_DATA);
	}

	/**
	 * Removes an already published news feed item
	 */
	protected function _deleteFromNewsFeed()
	{
		$this->_getNewsFeedModel()->delete($this->getContentType(), $this->getCommentId());
	}

	protected function _postDelete()
	{
		if ($this->get('comment_type') == 'post')
		{
			$postDw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Post', XenForo_DataWriter::ERROR_SILENT);
			$postDw->setExistingData($this->get('post_id'));
			
			$postDw->rebuildPostCommentCounters();
			$postDw->save();
		}

		$db = $this->_db;
		//$commentIdQuoted = $db->quote($this->get('comment_id'));

		$this->getModelFromCache('XenForo_Model_Alert')->deleteAlerts($this->getContentType(), $this->getCommentId());
		$this->_deleteFromNewsFeed();
		// something here!
	}

	protected function _getCommentModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Comment');
	}

}