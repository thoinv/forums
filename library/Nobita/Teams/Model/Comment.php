<?php

class Nobita_Teams_Model_Comment extends XenForo_Model
{
	const FETCH_COMMENTER = 0x01;
	const FETCH_TEAM = 0x04;
	const FETCH_POST = 0x08;

	const FETCH_USER = 0x10;
	const FETCH_MEMBER_ALERT = 0x20;

	const FETCH_EVENT = 0x40;

	const COMMENT_TYPE_POST = 'post';
	const COMMENT_TYPE_EVENT = 'event';

	public function getCommentById($commentId, array $fetchOptions = array())
	{
		$joinOptions = $this->prepareCommentFetchOptions($fetchOptions);
		return $this->_getDb()->fetchRow('
			SELECT comment.*
				' . $joinOptions['selectFields'] . '
			FROM xf_team_post_comment AS comment
				' . $joinOptions['joinTables'] . '
			WHERE comment.comment_id = ?
		', $commentId);
	}

	public function getCommentsByIds(array $commentIds, array $fetchOptions = array())
	{
		if (!$commentIds)
		{
			return array();
		}

		$joinOptions = $this->prepareCommentFetchOptions($fetchOptions);
		return $this->fetchAllKeyed('
			SELECT comment.*
				' . $joinOptions['selectFields'] . '
			FROM xf_team_post_comment AS comment
				' . $joinOptions['joinTables'] . '
			WHERE comment.comment_id IN (' . $this->_getDb()->quote($commentIds) . ')
		', 'comment_id');
	}

	public function getLastestCommentOnPost($exCommentId, $postId)
	{
		return $this->_getDb()->fetchRow('
			SELECT comment.*
			FROM xf_team_post_comment AS comment
			WHERE comment.comment_id <> ? 
				AND comment.post_id = ?
				AND comment.comment_type = \'post\'
			ORDER BY comment_date DESC
		', array($exCommentId, $postId));
	}

	public function countCommentsOnPost($postId)
	{
		return $this->_getDb()->fetchOne('
			SELECT COUNT(*)
			FROM xf_team_post_comment
			WHERE post_id = ?
				AND comment_type = \'post\'
		', $postId);
	}

	public function countCommentsOnEvent($eventId)
	{
		return $this->_getDb()->fetchOne('
			SELECT COUNT(*)
			FROM xf_team_post_comment
			WHERE post_id = ?
				AND comment_type = \'event\'
		', $eventId);
	}

	public function getUsersWatchedOnPost($postId, array $fetchOptions = array())
	{
		$joinOptions = $this->prepareCommentFetchOptions($fetchOptions);
		return $this->fetchAllKeyed('
			SELECT comment.*
				' . $joinOptions['selectFields'] . '
			FROM xf_team_post_comment AS comment
				' . $joinOptions['joinTables'] . '
			WHERE comment.post_id = ?
				AND comment.comment_type = \'post\'
			GROUP BY comment.user_id
			ORDER BY comment.comment_date DESC
		', 'user_id', $postId);
	}

	public function getCommentsOnPostId($postId, $beforeDate = 0, array $fetchOptions = array())
	{
		$sqlClauses = $this->prepareCommentFetchOptions($fetchOptions);
		$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);
		
		if ($beforeDate)
		{
			$beforeCondition = 'AND comment.comment_date < ' . $this->_getDb()->quote($beforeDate);
		}
		else
		{
			$beforeCondition = '';
		}
		
		$results = $this->fetchAllKeyed($this->limitQueryResults(
			'
				SELECT comment.*
				' . $sqlClauses['selectFields'] . '
				FROM xf_team_post_comment AS comment
				' . $sqlClauses['joinTables'] . '
				WHERE comment.post_id = ?
					' . $beforeCondition . '
				ORDER BY comment.comment_date DESC
			', $limitOptions['limit'], $limitOptions['offset']
		), 'comment_id', $postId);

		return array_reverse($results, true);
	}

	public function prepareCommentFetchOptions(array $fetchOptions)
	{
		$selectFields = '';
		$joinTables = '';

		if (!empty($fetchOptions['join']))
		{
			if ($fetchOptions['join'] & self::FETCH_COMMENTER)
			{
				/*$selectFields .=',
					user.*';*/
				$selectFields .=', commenter.user_id as commenter_user_id, commenter.username as commenter_username, commenter.gender as commenter_gender, 
					commenter.avatar_date as commenter_avatar_date, commenter.gravatar as commenter_gravatar';
				$joinTables .='
					LEFT JOIN xf_user AS commenter ON (commenter.user_id = comment.user_id)';
			}

			if ($fetchOptions['join'] & self::FETCH_POST)
			{
				$selectFields .=',
					post.message_state, post.post_id, post.post_date, post.discussion_type'; // prevent duplicate value `message`
				$joinTables .='
					INNER JOIN xf_team_post AS post ON (post.post_id = comment.post_id AND comment.comment_type = \'post\')';
			}

			if ($fetchOptions['join'] & self::FETCH_EVENT)
			{
				$selectFields .=',
					event.event_title,event.event_description, event.event_id, event.publish_date, event.event_type, event.allow_member_comment';
				$joinTables .='
					LEFT JOIN xf_team_event AS event ON (event.event_id = comment.post_id AND comment.comment_type = \'event\')';
			}

			if ($fetchOptions['join'] & self::FETCH_TEAM)
			{
				$selectFields .=',' . Nobita_Teams_Validation::$selectTeamFields . ',privacy.*, profile.*';
				$joinTables .='
					LEFT JOIN xf_team AS team ON (team.team_id = comment.team_id)
						LEFT JOIN xf_team_privacy AS privacy ON (privacy.team_id = team.team_id)
						LEFT JOIN xf_team_profile AS profile ON (profile.team_id = team.team_id)';
			}

			if ($fetchOptions['join'] & self::FETCH_USER)
			{
				$selectFields .=',
					user.*, user_option.*';
				$joinTables .='
					LEFT JOIN xf_user AS user ON (user.user_id = comment.user_id)
					LEFT JOIN xf_user_option AS user_option ON (user_option.user_id = user.user_id)';
			}
			
			if ($fetchOptions['join'] & self::FETCH_MEMBER_ALERT)
			{
				$selectFields .=',
					member.alert';
				$joinTables .='
					LEFT JOIN xf_team_member AS member ON (member.user_id = comment.user_id)';
			}
		}

		if (isset($fetchOptions['likeUserId']))
		{
			if (empty($fetchOptions['likeUserId']))
			{
				$selectFields .= ', 0 as like_date';
			}
			else
			{
				$selectFields .= ',
					liked_content.like_date';
				$joinTables .= '
					LEFT JOIN xf_liked_content AS liked_content
						ON (liked_content.content_type = \'team_comment\'
							AND liked_content.content_id = comment.comment_id
							AND liked_content.like_user_id = ' .$this->_getDb()->quote($fetchOptions['likeUserId']) . ')';
			}
		}

		return array(
			'selectFields' => $selectFields,
			'joinTables' => $joinTables
		);
	}

	public function prepareCommentConditions(array $conditions, array &$fetchOptions)
	{
		$sqlConditions = array();
		$db = $this->_getDb();
		
		if (!empty($conditions['event_id']))
		{
			if (is_array($conditions['event_id']))
			{
				$sqlConditions[] = 'comment.post_id IN (' . $db->quote($conditions['event_id']) . ')';
			}
			else
			{
				$sqlConditions[] = 'comment.post_id = ' . $db->quote($conditions['event_id']);
			}
		}
		
		if (!empty($conditions['post_id']))
		{
			if (is_array($conditions['post_id']))
			{
				$sqlConditions[] = 'comment.post_id IN (' . $db->quote($conditions['post_id']) . ')';
			}
			else
			{
				$sqlConditions[] = 'comment.post_id = ' . $db->quote($conditions['post_id']);
			}
		}
		
		if (!empty($conditions['comment_type']))
		{
			$sqlConditions[] = 'comment.comment_type = ' . $db->quote($conditions['comment_type']);
		}
		
		return $this->getConditionsForClause($sqlConditions);
	}

	public function getComments(array $conditions, array $fetchOptions)
	{
		$joinOptions = $this->prepareCommentFetchOptions($fetchOptions);
		$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);
		
		$whereClause = $this->prepareCommentConditions($conditions, $fetchOptions);
		
		return $this->fetchAllKeyed($this->limitQueryResults('
			SELECT comment.*
				' . $joinOptions['selectFields'] . '
			FROM xf_team_post_comment AS comment
				' . $joinOptions['joinTables'] . '
			WHERE ' . $whereClause . '
			ORDER BY comment.comment_date DESC
		', $limitOptions['limit'], $limitOptions['offset']
		), 'comment_id');
	}

	public function prepareComment(array $comment, array $postOrEvent, array $team, array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);

		$comment['canDelete'] = $this->canDeleteComment($comment, $postOrEvent, $team, $null, $viewingUser);
		$comment['canEdit'] = $this->canEditComment($comment, $postOrEvent, $team, $null, $viewingUser);
		$comment['canLike'] = $this->canLikeComment($comment, $team, $team, $null, $viewingUser);

		$comment['likeUsers'] = unserialize($comment['like_users']);

		$removeFields = array();
		if (array_key_exists('commenter_user_id', $comment))
		{
			$comment['comment_user'] = array(
				'user_id' => $comment['commenter_user_id'],
				'username' => $comment['commenter_username'],
				'avatar_date' => $comment['commenter_avatar_date'],
				'gender' => $comment['commenter_gender'],
				'gravatar' => $comment['commenter_gravatar']
			);
			$removeFields = array_merge($removeFields, array('commenter_user_id', 'commenter_username', 'commenter_avatar_date', 'commenter_gender', 'commenter_gravatar'));
		}

		$comment = $this->getModelFromCache('Nobita_Teams_Model_Banning')->prepareContent(
			$comment, $team, $team, $null, $viewingUser
		);

		Nobita_Teams_Array::removeKeys($comment, $removeFields);
		Nobita_Teams_Banning::generateBanningUniqueId($comment, 'comment');

		return $comment;
	}

	public function canViewComment(array $comment, array $postOrEvent, array $team, &$errorPhraseKey = '', array $viewingUser = null)
	{
		if ($comment['comment_type'] == self::COMMENT_TYPE_POST)
		{
			return  $this->getModelFromCache('Nobita_Teams_Model_Post')->canViewPostAndContainer(
				$postOrEvent, $team, $team, $errorPhraseKey, $viewingUser
			);
		}
		else if ($comment['comment_type'] == self::COMMENT_TYPE_EVENT)
		{
			return $this->getModelFromCache('Nobita_Teams_Model_Event')->canViewEventAndContainer(
				$comment, $team, $team, $errorPhraseKey, $viewingUser
			);
		}

		return false;
	}

	public function canDeleteComment(array $comment, array $postOrEvent, array $team, &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		
		if (!$viewingUser['user_id'])
		{
			return false;
		}
		
		if (XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'deletePostAny'))
		{
			return true;
		}

		$memberModel = $this->getModelFromCache('Nobita_Teams_Model_Member');
		if ($memberModel->assertPermissionActionViewable($team, 'canManageContent'))
		{
			return true;
		}

		return ($viewingUser['user_id'] == $comment['user_id']
			&& XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'deletePostSelf'));
	}

	public function canEditComment(array $comment, array $post, array $team, &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		if (!$viewingUser['user_id'])
		{
			return false;
		}
		
		if (XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'editPostAny'))
		{
			return true;
		}
		
		$memberModel = $this->getModelFromCache('Nobita_Teams_Model_Member');
		if ($memberModel->assertPermissionActionViewable($team, 'canManageContent'))
		{
			return true;
		}
		
		return ($comment['user_id'] == $viewingUser['user_id']
			&& XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'editPostSelf'));
	}
	
	public function canLikeComment(array $comment, array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		if (!$viewingUser['user_id'])
		{
			return false;
		}

		if ($comment['user_id'] == $viewingUser['user_id'])
		{
			return false;
		}

		return true;
	}

	public function deleteComment($commentId)
	{
		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Comment');
		$dw->setExistingData($commentId);
		$dw->delete();
	}
	
	public function alertTaggedMembers(array $comment, array $post, array $team, array $tagged, array $alreadyAlerted = array())
	{
		$userIds = XenForo_Application::arrayColumn($tagged, 'user_id');
		$userIds = array_diff($userIds, $alreadyAlerted);
		$alertedUserIds = array();
		
		if ($comment['comment_type'] ==  self::COMMENT_TYPE_EVENT)
		{
			return; // nothing to do!
		}

		if ($userIds)
		{
			$memberModel = $this->getModelFromCache('Nobita_Teams_Model_Member');
			
			$users = $memberModel->getAllMembersInTeam($team['team_id'], array(
				'user_id' => $userIds,
				'alert' => 1
			), array(
				'join' => Nobita_Teams_Model_Member::FETCH_USER
						 | Nobita_Teams_Model_Member::FETCH_USER_PERMISSIONS
			));
			
			foreach ($users as $user)
			{
				$user['permissions'] = XenForo_Permission::unserializePermissions($user['global_permission_cache']);
				if (isset($alertedUserIds[$user['user_id']])
					|| $comment['user_id'] == $user['user_id']
					|| $comment['user_id'] ==  XenForo_Visitor::getUserId()
				)
				{
					continue;
				}
				
				if (empty($user['send_alert']))
				{
					continue;
				}

				if (!$this->getModelFromCache('XenForo_Model_User')->isUserIgnored($user, $post['user_id'])
					&& $this->getModelFromCache('Nobita_Teams_Model_Post')->canViewPostAndContainer($post, $team, $team, $null, $user)
				)
				{
					$alertedUserIds[$user['user_id']] = true;
					
					XenForo_Model_Alert::alert($user['user_id'],
						$comment['user_id'], $comment['username'],
						'team_comment', $comment['comment_id'],
						 'tag'
					);
				}
			}
		}
		
		return array_keys($alertedUserIds);
	}


	/**
	 * Attempts to update any instances of an old username in like_users with a new username
	 *
	 * @param integer $oldUserId
	 * @param integer $newUserId
	 * @param string $oldUsername
	 * @param string $newUsername
	 */
	public function batchUpdateLikeUser($oldUserId, $newUserId, $oldUsername, $newUsername)
	{
		$db = $this->_getDb();

		$oldUserId = $db->quote($oldUserId);
		$newUserId = $db->quote($newUserId);

		// note that xf_liked_content should have already been updated with $newUserId

		$db->query('
			UPDATE xf_team_post_comment
			SET like_users = REPLACE(like_users, ' .
				$db->quote('i:' . $oldUserId . ';s:8:"username";s:' . strlen($oldUsername) . ':"' . $oldUsername . '";') . ', ' .
				$db->quote('i:' . $newUserId . ';s:8:"username";s:' . strlen($newUsername) . ':"' . $newUsername . '";') . ')
			WHERE post_id IN (
				SELECT content_id FROM xf_liked_content
				WHERE content_type = \'team_comment\'
				AND like_user_id = ' . $newUserId . '
			)
		');
	}

}