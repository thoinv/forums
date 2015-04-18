<?php

class Nobita_Teams_Model_Post extends Nobita_Teams_Model_Abstract
{
	const FETCH_POST_WATCH = 0x01;
	const FETCH_POSTER = 0x02;
	const FETCH_TEAM = 0x04;
	const FETCH_MEMBER = 0x08;

	const FETCH_BBCODE_CACHE = 0x40;

	const POST_TYPE_PUBLIC 	= 'public';
	const POST_TYPE_MEMBER 	= 'member';
	const POST_TYPE_STAFF 	= 'staff';

	public static $postTypesSupported = array(
		self::POST_TYPE_PUBLIC, self::POST_TYPE_MEMBER, self::POST_TYPE_STAFF
	);

	public function getPostById($postId, array $fetchOptions = array())
	{
		$joinOptions = $this->prepareFetchOptions($fetchOptions);
		return $this->_getDb()->fetchRow('
			SELECT post.*
				' . $joinOptions['selectFields'] . '
			FROM xf_team_post AS post
				' . $joinOptions['joinTables'] . '
			WHERE post.post_id = ?
		', $postId);
	}

	public function getPostsByIds(array $postIds, array $fetchOptions = array())
	{
		if (empty($postIds))
		{
			return array();
		}
		$joinOptions = $this->prepareFetchOptions($fetchOptions);

		return $this->fetchAllKeyed(
			'
				SELECT post.*
					' . $joinOptions['selectFields'] . '
				FROM xf_team_post AS post
					' . $joinOptions['joinTables'] . '
				WHERE post.post_id IN (' . $this->_getDb()->quote($postIds) . ')
		', 'post_id');
	}

	public function getPostsStickyForTeamId($teamId, array $conditions = array(), array $fetchOptions = array())
	{
		$conditions = array_merge($conditions, array(
			'sticky' => 1
		));
		return $this->getPostsForTeamId($teamId, $conditions, $fetchOptions);
	}

	public function getPostsForTeamId($teamId, array $conditions = array(), array $fetchOptions = array())
	{
		$joinOptions = $this->prepareFetchOptions($fetchOptions);
		$limitOptions = $this->prepareLimitFetchOptions($fetchOptions);
		
		$whereClause = $this->preparePostConditions($conditions, $fetchOptions);
		return $this->fetchAllKeyed($this->limitQueryResults(
			'
				SELECT post.*
					' . $joinOptions['selectFields'] . '
				FROM xf_team_post AS post
					' . $joinOptions['joinTables'] . '
				WHERE ' . $whereClause . ' 
					AND post.team_id = ?
				ORDER BY post.last_comment_date DESC
			',$limitOptions['limit'], $limitOptions['offset']
		), 'post_id', $teamId);
	}

	public function countVisiblePostsForTeam($teamId)
	{
		return $this->countPostsForTeamId($teamId, array(
			'message_state' => 'visible'
		));
	}
	
	public function countModeratedPostsForTeam($teamId)
	{
		return $this->countPostsForTeamId($teamId, array(
			'message_state' => 'moderated'
		));
	}
	
	public function countPostsForTeamId($teamId, array $conditions)
	{
		$fetchOptions = array();
		$whereClause = $this->preparePostConditions($conditions, $fetchOptions);
		
		return $this->_getDb()->fetchOne('
			SELECT COUNT(*)
			FROM xf_team_post as post
			WHERE ' . $whereClause . '
				AND post.team_id = ?
		', $teamId);
	}

	public function getPostIdsByUser($userId, $teamId)
	{
		return $this->_getDb()->fetchCol('
			SELECT post_id
			FROM xf_team_post
			WHERE user_id = ?
				AND team_id = ?
		', array($userId, $teamId));
	}


	public function prepareFetchOptions(array $fetchOptions)
	{
		$selectFields = '';
		$joinTables = '';
		
		if (!empty($fetchOptions['join']))
		{
			if ($fetchOptions['join'] & self::FETCH_POSTER)
			{
				$selectFields .=',
					poster.*';
				$joinTables .='
					LEFT JOIN xf_user AS poster ON (poster.user_id = post.user_id)';
			}
			
			if (XenForo_Application::getOptions()->cacheBbCodeTree && $fetchOptions['join'] & self::FETCH_BBCODE_CACHE)
			{
				$selectFields .= ',
					bb_code_parse_cache.parse_tree AS message_parsed, bb_code_parse_cache.cache_version AS message_cache_version';
				$joinTables .= '
					LEFT JOIN xf_bb_code_parse_cache AS bb_code_parse_cache ON
						(bb_code_parse_cache.content_type = \'team_post\' AND bb_code_parse_cache.content_id = post.post_id)';
			}
			
			if ($fetchOptions['join'] & self::FETCH_TEAM)
			{
				$selectFields .=',' . Nobita_Teams_Validation::$selectTeamFields . ',privacy.*, profile.*';
				$joinTables .='
					LEFT JOIN xf_team AS team ON (team.team_id = post.team_id)
						LEFT JOIN xf_team_privacy AS privacy ON (privacy.team_id = team.team_id)
						LEFT JOIN xf_team_profile AS profile ON (profile.team_id = team.team_id)';
			}
		
			if ($fetchOptions['join'] & self::FETCH_MEMBER)
			{
				$selectFields .=',
					member.*';
				$joinTables .='
					LEFT JOIN xf_team_member AS member ON (member.user_id = post.user_id AND member.team_id = post.team_id)';
			}
		}

		if (isset($fetchOptions['watchUserId']))
		{
			if (empty($fetchOptions['watchUserId']))
			{
				$selectFields .=',0 AS watch_user_id';
			}
			else
			{
				$selectFields .=',
					post_watch.user_id AS watch_user_id';
				$joinTables .='
					LEFT JOIN xf_team_post_watch AS post_watch ON (
						post_watch.post_id = post.post_id 
						AND post_watch.user_id = ' . $this->_getDb()->quote($fetchOptions['watchUserId']) . ')';
			}
		}

		if (isset($fetchOptions['likeUserId']))
		{
			if (empty($fetchOptions['likeUserId']))
			{
				$selectFields .= ',
					0 AS like_date';
			}
			else
			{
				$selectFields .= ',
					liked_content.like_date';
				$joinTables .= '
					LEFT JOIN xf_liked_content AS liked_content
						ON (liked_content.content_type = \'team_post\'
							AND liked_content.content_id = post.post_id
							AND liked_content.like_user_id = ' .$this->_getDb()->quote($fetchOptions['likeUserId']) . ')';
			}
		}

		return array(
			'selectFields' => $selectFields,
			'joinTables' => $joinTables
		);
	}
	
	public function preparePostConditions(array $conditions, array &$fetchOptions)
	{
		$sqlConditions = array();
		$db = $this->_getDb();
	
		if (!empty($conditions['message_state']))
		{
			if (is_array($conditions['message_state']))
			{
				$sqlConditions[] = 'post.message_state IN (' . $db->quote($conditions['message_state']) . ')';
			}
			else
			{
				$sqlConditions[] = 'post.message_state = ' . $db->quote($conditions['message_state']);
			}
		}
		
		if (!empty($conditions['discussion_type']))
		{
			if (is_array($conditions['discussion_type']))
			{
				$sqlConditions[] = 'post.discussion_type IN (' . $db->quote($conditions['discussion_type']) . ')';
			}
			else
			{
				$sqlConditions[] = 'post.discussion_type = ' . $db->quote($conditions['discussion_type']);
			}
		}

		if (!empty($conditions['last_comment_date']) && is_array($conditions['last_comment_date']))
		{
			$sqlConditions[] = $this->getCutOffCondition("post.last_comment_date", $conditions['last_comment_date']);
		}

		if (!empty($conditions['attach_count']) && is_array($conditions['attach_count']))
		{
			$sqlConditions[] = $this->getCutOffCondition("post.attach_count", $conditions['attach_count']);
		}

		if (isset($conditions['sticky']))
		{
			$sqlConditions[] = 'post.sticky = ' . $db->quote($conditions['sticky'] ? 1 : 0);
		}

		if (isset($conditions['deleted']) || isset($conditions['moderated']))
		{
			$sqlConditions[] = $this->prepareStateLimitFromConditions($conditions, 'post', 'message_state');
		}
		
		return $this->getConditionsForClause($sqlConditions);
	}

	
	public function getPermissionBasedPostConditions(array $team, array $requester, array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		
		$viewModerated = false;
		if (XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'viewModeratedPost'))
		{
			$viewModerated = true;
		}
		else if ($this->_getMemberModel()->assertPermissionActionViewable($team, "canManageContent", $requester))
		{
			$viewModerated = true;
		}

		return array(
			'moderated' => $viewModerated
		);
	}

	protected static $_preventDoubleNotify = array();
	public function sendNotificationsToUser(array $post, array $team = null, array $noAlerts = array())
	{
		if ($post['message_state'] != 'visible')
		{
			return array();
		}

		if (!$team)
		{
			$team = $this->_getTeamModel()->getFullTeamById($post['team_id'], array(
				'join' => Nobita_Teams_Model_Team::FETCH_CATEGORY
			));
		}

		if (!$team || $team['team_state'] != 'visible')
		{
			return array();
		}

		if (XenForo_Application::get('options')->emailWatchedThreadIncludeMessage)
		{
			$parseBbCode = true;
			$emailTemplate = 'Team_user_watched_team_messagetext';
		}
		else
		{
			$parseBbCode = false;
			$emailTemplate = 'Team_user_watched_team';
		}

		$userModel = $this->getModelFromCache('XenForo_Model_User');
		$memberModel = $this->getModelFromCache('Nobita_Teams_Model_Member');
		
		$conditions = array(
			'member_state' => 'accept',
			'alert' => 1,
		);
		$usersWatch = $memberModel->getAllMembersInTeam($team['team_id'], $conditions, array(
			'join' => Nobita_Teams_Model_Member::FETCH_USER
					 | Nobita_Teams_Model_Member::FETCH_USER_PERMISSIONS
		));

		// fetch a full user record if we don't have one already
		if (!isset($post['avatar_width']) || !isset($post['custom_title']))
		{
			$replyUser = $this->getModelFromCache('XenForo_Model_User')->getUserById($post['user_id']);
			if ($replyUser)
			{
				$post = array_merge($replyUser, $post);
			}
			else
			{
				$post['avatar_width'] = 0;
				$post['custom_title'] = '';
			}
		}

		$alerted = array();
		$emailed = array();

		foreach ($usersWatch as $user)
		{
			$user['permissions'] = XenForo_Permission::unserializePermissions($user['global_permission_cache']);
			if ($user['user_id'] == $post['user_id'])
			{
				continue;
			}

			if ($userModel->isUserIgnored($user, $post['user_id']))
			{
				continue;
			}

			if (!$this->_getTeamModel()->canViewTeamAndContainer($team, $team, $null, $user))
			{
				continue;
			}

			if (isset(self::$_preventDoubleNotify[$team['team_id']][$user['user_id']]))
			{
				continue;
			}
			self::$_preventDoubleNotify[$team['team_id']][$user['user_id']] = true;

			if ($user['email'] && $user['user_state'] == 'valid'
				&& $user['send_email']
			)
			{
				if (!isset($post['messageText']) && $parseBbCode)
				{
					$bbCodeParserText = XenForo_BbCode_Parser::create(XenForo_BbCode_Formatter_Base::create('Text'));
					$post['messageText'] = new XenForo_BbCode_TextWrapper($post['message'], $bbCodeParserText);

					$bbCodeParserHtml = XenForo_BbCode_Parser::create(XenForo_BbCode_Formatter_Base::create('HtmlEmail'));
					$post['messageHtml'] = new XenForo_BbCode_TextWrapper($post['message'], $bbCodeParserHtml);
				}

				if (!isset($team['titleCensored']))
				{
					$team['titleCensored'] = XenForo_Helper_String::censorString($team['title']);
				}

				$user['email_confirm_key'] = $userModel->getUserEmailConfirmKey($user);
				
				$mail = XenForo_Mail::create($emailTemplate, array(
					'post' => $post,
					'team' => $team,
					'category' => $team,
					'receiver' => $user
				), $user['language_id']);
				$mail->enableAllLanguagePreCache();
				$mail->queue($user['email'], $user['username']);

				$emailed[] = $user['user_id'];
			}

			if (!in_array($user['user_id'], $noAlerts)
				&& $user['send_alert']
			)
			{
				if (XenForo_Model_Alert::userReceivesAlert($user, 'team_post', 'insert'))
				{
					XenForo_Model_Alert::alert($user['user_id'],
						$post['user_id'], $post['username'],
						'team_post', $post['post_id'],
						'insert'
					);
					
					$alerted[$user['user_id']] = true;
				}
			}
		}

		return array(
			'emailed' => $emailed,
			'alerted' => $alerted
		);
	}
	
	public function preparePost(array $post, array $team, array $category, $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		
		if (!isset($post['canInlineMod']))
		{
			$this->addInlineModOptionToPost($post, $team, $category, $viewingUser);
		}

		$post['canReport'] = $this->getModelFromCache('XenForo_Model_User')->canReportContent();
		$post['canDelete'] = $this->canDeletePost($post, $team, $category, $null, $viewingUser);
		$post['canApprove'] = $this->canApproveUnapprove($post, $team, $category, $null, $viewingUser);
		$post['canEdit'] = $this->canEditPost($post, $team, $category, $null, $viewingUser);
		$post['canComment'] = $this->canCommentOnPost($post, $team, $category, $null, $viewingUser);
		$post['canLike'] = $this->canLikePost($post, $team, $category, $null, $viewingUser);
		$post['canSticky'] = $this->canStickyOrUnstickyPost($post, $team, $category, $null, $viewingUser);

		if ($post['likes'])
		{
			$post['likeUsers'] = unserialize($post['like_users']);
		}

		$post = $this->getModelFromCache('Nobita_Teams_Model_Banning')->prepareContent(
			$post, $team, $category, $null, $viewingUser
		);

		$post['isModerated'] = $this->isModerated($post, $team);
		if (!empty($post['delete_date']))
		{
			$post['deleteInfo'] = array(
				'user_id' => $post['delete_user_id'],
				'username' => $post['delete_username'],
				'date' => $post['delete_date'],
				'reason' => $post['delete_reason'],
			);
		}

		if ($post['system_posting'])
		{
			$post['message'] = Nobita_Teams_Setup::helperSystemPost($post);
		}

		Nobita_Teams_Banning::generateBanningUniqueId($post, 'post');
		return $post;
	}
	
	public function preparePosts(array $posts, array $team, array $category, $viewingUser = null)
	{
		foreach ($posts as &$post)
		{
			$post = $this->preparePost($post, $team, $viewingUser);
		}
		
		return $posts;
	}
	
	/**
	 * Gets the attachments that belong to the given posts, and merges them in with
	 * their parent post (in the attachments key). The attachments key will not be
	 * set if no attachments are found for the post.
	 *
	 * @param array $posts
	 *
	 * @return array Posts, with attachments added where necessary
	 */
	public function getAndMergeAttachmentsIntoPosts(array $posts)
	{
		$postIds = array();

		foreach ($posts AS $postId => $post)
		{
			if ($post['attach_count'])
			{
				$postIds[] = $postId;
			}
		}

		if ($postIds)
		{
			$attachmentModel = $this->_getAttachmentModel();

			$attachments = $attachmentModel->getAttachmentsByContentIds('team_post', $postIds);

			foreach ($attachments AS $attachment)
			{
				$posts[$attachment['content_id']]['attachments'][$attachment['attachment_id']] = $attachmentModel->prepareAttachment($attachment);
			}
		}

		return $posts;
	}

	public function getAndMergeAttachmentsIntoPost(array $post)
	{
		$attachmentModel = $this->_getAttachmentModel();

		$attachments = $attachmentModel->getAttachmentsByContentIds('team_post', array($post['post_id']));
		foreach ($attachments AS $attachment)
		{
			$post['attachments'][$attachment['attachment_id']] = $attachmentModel->prepareAttachment($attachment);
		}
		
		return $post;
	}

	public function canViewAttachmentOnPost(array $post, array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);

		return XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'viewAttachment');
	}

	public function canLikePost(array $post, array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		
		if (!$viewingUser['user_id'])
		{
			return false;
		}
		
		if ($post['user_id'] == $viewingUser['user_id'])
		{
			$errorPhraseKey = 'liking_own_content_cheating';
			return false;
		}
		
		if ($post['message_state'] != 'visible')
		{
			return false;
		}
		
		if ($team['team_state'] != 'visible')
		{
			return false;
		}
		return true;
	}
	
	public function canCommentOnPost(array $post, array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
	{
		return $this->_getTeamModel()->canPostOnTeam($team, $team, $errorPhraseKey, $viewingUser);
	}
	
	public function canDeletePost(array $post, array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
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
		if ($memberModel->assertPermissionActionViewable($team, "canManageContent"))
		{
			return true;
		}
		
		return ($viewingUser['user_id'] == $post['user_id']
			&& XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'deletePostSelf'));
	}

	public function canEditPost(array $post, array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
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
		if ($memberModel->assertPermissionActionViewable($team, "canManageContent"))
		{
			return true;
		}

		return ($viewingUser['user_id'] == $post['user_id']
			&& XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'editPostSelf'));
	}

	public function canViewPost(array $post, array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);

		$teamModel = $this->_getTeamModel();
		if (!$teamModel->canViewTeamAndContainer($team, $category, $errorPhraseKey, $viewingUser))
		{
			return false;
		}

		if ($this->isModerated($post, $team))
		{
			if (!XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'viewModeratedPost')
				&& !$this->_getMemberModel()->assertPermissionActionViewable($team, 'canManageContent')
			)
			{
				if (!$viewingUser['user_id'] || !$viewingUser['user_id'] != $post['user_id'])
				{
					return false;
				}
			}
		}

		switch($post['discussion_type'])
		{
			case self::POST_TYPE_PUBLIC:
				return true;
			case self::POST_TYPE_MEMBER:
				return $this->isTeamMember($team['team_id'], $viewingUser);
			case self::POST_TYPE_STAFF:
				return $this->isTeamAdmin($team['team_id'], $viewingUser);
			default:
				return false;
		}
	}

	public function canViewPostAndContainer(array $post, array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
	{
		if (!$this->_getTeamModel()->canViewTeamAndContainer($team, $category, $errorPhraseKey, $viewingUser))
		{
			return false;
		}

		return $this->canViewPost($post, $team, $category, $errorPhraseKey, $viewingUser);
	}

	public function canApproveUnapprove(array $post, array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);

		if (!$viewingUser['user_id'] || !$this->isModerated($post, $team))
		{
			return false;
		}

		if (XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'approveUnapprovePost'))
		{
			return true;
		}

		if ($this->_getMemberModel()->assertPermissionActionViewable($team, "canManageContent"))
		{
			return true;
		}

		return $this->isTeamOwner($team, $viewingUser); // owner can approve post!
	}

	public function canStickyOrUnstickyPost(array $post, array $team, array $category, &$errorPhraseKey = '', array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		if (!$viewingUser['user_id'])
		{
			return false;
		}
		
		if (XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'stickyPost'))
		{
			return true;
		}
		
		if ($viewingUser['user_id'] == $team['user_id'])
		{
			return true; //owner team.
		}

		return $this->_getMemberModel()->assertPermissionActionViewable($team, "canSticky");
	}

	public function deletePost(array $post)
	{
		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Post');
		
		$dw->setExistingData($post);
		$dw->delete();
	}
	
	public function addInlineModOptionToPost(array &$post, array $team, array $category, $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		
		$options = array();
		if (!$viewingUser['user_id'])
		{
			return $options;
		}

		$memberModel = $this->_getMemberModel();
		$canInlineMod = false;

		if (XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'deletePostAny')
			|| XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'approveUnapprove')
			|| XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'stickyPost'))
		{
			$canInlineMod = true;
		}
		elseif ($memberModel->assertPermissionActionViewable($team, 'canManageContent', $null, $viewingUser)
			|| $memberModel->assertPermissionActionViewable($team, 'canSticky', $null, $viewingUser))
		{
			$canInlineMod = true;
		}

		if ($canInlineMod)
		{
			if (XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'deletePostAny')
				|| $memberModel->assertPermissionActionViewable($team, 'canManageContent', $null, $viewingUser))
			{
				$options['delete'] = true;
			}

			if (XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'approveUnapprove')
				|| $memberModel->assertPermissionActionViewable($team, 'canManageContent', $null, $viewingUser))
			{
				$options['approve'] = true;
			}

			if (XenForo_Permission::hasPermission($viewingUser['permissions'], 'Teams', 'stickyPost')
				|| $memberModel->assertPermissionActionViewable($team, 'canSticky', $null, $viewingUser))
			{
				$options['stick'] = true;
				$options['unstick'] = true;
			}
		}

		$post['canInlineMod'] = (count($options) > 0);
		return $options;
	}

	public function addInlineModOptionToPosts(array &$posts, array $team, array $category, $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);

		$options = array();
		foreach ($posts AS &$post)
		{
			$options += $this->addInlineModOptionToPost($post, $team, $viewingUser);
		}

		return $options;
	}

	public function addCommentsToPosts(array $posts, array $commentFetchOptions = array())
	{
		$commentIdMap = array();
		
		foreach ($posts	AS &$post)
		{
			if ($post['latest_comment_ids'])
			{
				foreach (explode(',', $post['latest_comment_ids']) AS $commentId)
				{
					$commentIdMap[intval($commentId)] = $post['post_id'];
				}
			}

			$post['comments'] = array();
		}
		
		if ($commentIdMap)
		{
			$comments = $this->getModelFromCache('Nobita_Teams_Model_Comment')->getCommentsByIds(array_keys($commentIdMap), $commentFetchOptions);
			foreach ($commentIdMap AS $commentId => $profilePostId)
			{
				if (isset($comments[$commentId]))
				{
					if (!isset($posts[$profilePostId]['first_shown_comment_date']))
					{
						$posts[$profilePostId]['first_shown_comment_date'] = $comments[$commentId]['comment_date'];
					}
					$posts[$profilePostId]['comments'][$commentId] = $comments[$commentId];
				}
			}
		}
		
		return $posts;
	}

	public function isModerated(array $post, array $team)
	{
		if (!isset($post['message_state']))
		{
			throw new XenForo_Exception('Message state not available in post.');
		}

		return ($post['message_state'] == 'moderated');
	}

	public function alertTaggedMembers(array $post, array $team, array $tagged, array $alreadyAlerted)
	{
		$userIds = XenForo_Application::arrayColumn($tagged, 'user_id');
		$userIds = array_diff($userIds, $alreadyAlerted);
		$alertedUserIds = array();

		if ($userIds)
		{
			$userModel = $this->getModelFromCache('XenForo_Model_User');
			$memberModel = $this->_getMemberModel();
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
				if ($userModel->isUserIgnored($user, $post['user_id'])
					|| !XenForo_Model_Alert::userReceivesAlert($user, "team_post", "tag")
				)
				{
					continue;
				}

				if (empty($user['send_alert']))
				{
					continue;
				}

				if (!isset($alertedUserIds[$user['user_id']]) && $post['user_id'] != $user['user_id'])
				{
					if ($this->canViewPostAndContainer($post, $team, $team, $null, $user))
					{
						$alertedUserIds[$user['user_id']] = true;

						XenForo_Model_Alert::alert($user['user_id'],
							$post['user_id'], $post['username'],
							'team_post', $post['post_id'],
							 'tag'
						);
					}
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
			UPDATE xf_team_post
			SET like_users = REPLACE(like_users, ' .
				$db->quote('i:' . $oldUserId . ';s:8:"username";s:' . strlen($oldUsername) . ':"' . $oldUsername . '";') . ', ' .
				$db->quote('i:' . $newUserId . ';s:8:"username";s:' . strlen($newUsername) . ':"' . $newUsername . '";') . ')
			WHERE post_id IN (
				SELECT content_id FROM xf_liked_content
				WHERE content_type = \'team_post\'
				AND like_user_id = ' . $newUserId . '
			)
		');
	}

	/*				POST WATCH! ~_~			*/
	public function watch($postId, $userId)
	{
		try
		{
			$this->_getDb()->query('
				INSERT IGNORE INTO xf_team_post_watch (post_id, user_id)
				VALUES
					(?, ?)	
			', array($postId, $userId));
		}
		catch (Zend_Db_Exception $e) {}
	}

	public function unwatch($postId, $userId)
	{
		$db = $this->_getDb();
		
		try
		{
			$this->_getDb()->delete('xf_team_post_watch', 'post_id = ' . $db->quote($postId) . ' AND user_id = ' . $db->quote($userId));
		}
		catch (Zend_Db_Exception $e) {}
	}

	public function getWatchers($postId)
	{
		return $this->fetchAllKeyed('
			SELECT member.*
			FROM xf_team_post_watch AS post_watch
				LEFT JOIN xf_team_member AS member ON (member.user_id = post_watch.user_id)
			WHERE post_watch.post_id = ?
		', 'user_id', $postId);
	}

	protected function _getAttachmentModel()
	{
		return $this->getModelFromCache('XenForo_Model_Attachment');
	}


}