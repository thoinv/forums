<?php

class Nobita_Teams_DataWriter_Team extends XenForo_DataWriter
{
	const OPTION_CREATE_THREAD_NODE_ID = 'createThreadNodeId';
	const OPTION_CREATE_THREAD_PREFIX_ID = 'createThreadPrefixId';
	const OPTION_PAID_THREAD_TITLE_TEMPLATE = 'paidThreadTitleTemplate';
	const OPTION_DELETE_THREAD_TITLE_TEMPLATE = 'deleteThreadTitleTemplate';
	const OPTION_DELETE_THREAD_ACTION = 'deleteThreadAction';
	const OPTION_DELETE_ADD_POST = 'deleteAddPost';
	const OPTION_TEAM_PRIVACY_THREAD_STATE = 'privacyThreadSate';
	
	const DATA_THREAD_WATCH_DEFAULT = 'watchDefault';

	/**
	 * The custom fields to be updated. Use setCustomFields to manage this.
	 *
	 * @var array|null
	 */
	protected $_updateCustomFields = null;
	
	/**
	 * Holds the reason for soft deletion.
	 *
	 * @var string
	 */
	const DATA_DELETE_REASON = 'deleteReason';
	
	/**
	 * Option that controls whether this should be published in the news feed. Defaults to true.
	 *
	 * @var string
	 */
	const OPTION_PUBLISH_FEED = 'publishFeed';
	
	/**
	 * Option that controls whether the data in this discussion should be indexed for
	 * search. If this value is set inconsistently for the same discussion (and messages within),
	 * data might be orphaned in the search index. Defaults to true.
	 *
	 * @var string
	 */
	const OPTION_INDEX_FOR_SEARCH = 'indexForSearch';

	const IMPORT_MODE = 'importMode';

	/**
	 * All custom url must have a least x characters.
	 *
	 * @var integer
	 */
	public static $urlThreshold = 8;

	protected function _getFields()
	{
		return array(
			'xf_team' => array(
				'team_id' => array('type' => self::TYPE_UINT, 'autoIncrement' => true),
				'title' => array('type' => self::TYPE_STRING, 'maxLength' => 100, 'required' => true,
					'requiredError' => 'please_enter_valid_title'),
				'tag_line' => array('type' => self::TYPE_STRING, 'maxLength' => 100, 'required' => true),
				'custom_url' => array('type' => self::TYPE_STRING, 'maxLength' => 25, 'default' => null,
					'verification' => array('$this', '_verifyCustomURL')),
				'user_id' => array('type' => self::TYPE_UINT, 'required' => true),

				'username' => array('type' => self::TYPE_STRING, 'maxLength' => 50, 'default' => ''),
				'team_state' => array('type' => self::TYPE_STRING,
					'allowedValues' => array('visible', 'moderated', 'deleted'), 'default' => 'visible'),
				'team_date' => array('type' => self::TYPE_UINT, 'default' => XenForo_Application::$time),
				'team_category_id' => array('type' => self::TYPE_UINT, 'required' => true,
					'verification' => array('$this', '_validateCategoryId')),
				
				'team_avatar_date' => array('type' => self::TYPE_UINT, 'default' => 0),

				'message_count' => array('type' => self::TYPE_UINT_FORCED, 'default' => 0),
				'member_count' => array('type' => self::TYPE_UINT_FORCED, 'default' => 0),
				
				'warning_id' => array('type' => self::TYPE_UINT, 'default' => 0),
				'last_activity' => array('type' => self::TYPE_UINT, 'default' => 0),

				// added 1.0.8
				'discussion_thread_id' => array('type' => self::TYPE_UINT, 'default' => 0),

				// added 1.0.9 BETA 1 modified on version 1.2
				'cover_date' => array('type' => self::TYPE_UINT, 'default' => 0),
				'cover_crop_details' => array('type' => self::TYPE_SERIALIZED, 'default' => 'a:0:{}')
			),
			'xf_team_profile' => array(
				'team_id' => array('type' => self::TYPE_UINT, 'default' => array('xf_team', 'team_id'), 'required' => true),
				'about' => array('type' => self::TYPE_STRING, 'default' => ''),
				'custom_fields' => array('type' => self::TYPE_SERIALIZED, 'default' => ''),
				'member_request_count' => array('type' => self::TYPE_UINT, 'default' => 0),
				
				'ribbon_text' => array('type' => self::TYPE_STRING, 'maxLength' => 25, 'default' => ''),
				'ribbon_display_class' => array('type' => self::TYPE_STRING, 'maxLength' => 25, 'default' => '')
			),
			'xf_team_privacy' => array(
				'team_id' => array('type' => self::TYPE_UINT, 'default' => array('xf_team', 'team_id'), 'required' => true),
				
				'allow_guest_posting' => array('type' => self::TYPE_BOOLEAN, 'default' => 0),
				'allow_member_posting' => array('type' => self::TYPE_BOOLEAN, 'default' => 1),
				'always_moderate_join' => array('type' => self::TYPE_BOOLEAN, 'default' => 0),
				'always_moderate_posting' => array('type' => self::TYPE_BOOLEAN, 'default' => 1),
	
				'privacy_state' => array('type' => self::TYPE_BINARY, 
					'allowedValues' => array('open', 'closed', 'secret'), 'default' => 'open', 'maxLength' => 25
				),

				// added 1.1.2 @20-04-2014
				'always_req_message' => array('type' => self::TYPE_BOOLEAN, 'default' => 1),

				// 1.1.3 beta
				'allow_member_event' => array('type' => self::TYPE_BOOLEAN, 'default' => 0),

				// 1.2.0 RC2
				'disable_tabs' => array('type' => self::TYPE_BINARY, 'maxLength' => 100, 'default' => '')
			)
		);
	}

	protected function _getExistingData($data)
	{
		if (!$teamID = $this->_getExistingPrimaryKey($data, 'team_id'))
		{
			return false;
		}
		
		if (!$teamInfo = $this->_getTeamModel()->getFullTeamById($teamID))
		{
			return false;
		}
		
		return $this->getTablesDataFromArray($teamInfo);
	}
	
	/**
	* Gets SQL condition to update the existing record.
	*
	* @return string
	*/
	protected function _getUpdateCondition($tableName)
	{
		return  'team_id = ' . $this->_db->quote($this->getExisting('team_id'));
	}
	
	/**
	* Gets the default set of options for this data writer.
	*
	* @return array
	*/
	protected function _getDefaultOptions()
	{
		$options = XenForo_Application::get('options');

		return array(
			self::OPTION_PUBLISH_FEED => true,
			self::OPTION_INDEX_FOR_SEARCH => true,

			self::OPTION_CREATE_THREAD_NODE_ID => null,
			self::OPTION_CREATE_THREAD_PREFIX_ID => null,
			self::OPTION_DELETE_THREAD_ACTION => $options->get('Teams_teamThreadAction', 'action'),
			self::OPTION_DELETE_THREAD_TITLE_TEMPLATE => $options->get('Teams_teamThreadAction', 'update_title') ? $options->get('Teams_teamThreadAction', 'title_template') : '',
			self::OPTION_TEAM_PRIVACY_THREAD_STATE => $options->get('Teams_teamPrivacyThreadState')
		);
	}

	protected function _validateCategoryId(&$categoryId)
	{
		$category = $this->_getCategoryModel()->getCategoryById($categoryId);
		if (!$category)
		{
			$this->error(new XenForo_Phrase('requested_category_not_found'), 'team_category_id');
			return false;
		}

		return true;
	}

	protected function _verifyCustomURL(&$data)
	{
		if (!$data)
		{
			$data = null;
			return true;
		}

		if ($this->getExisting('custom_url') === $this->get('custom_url')
			&& $this->get('custom_url') !== null
		)
		{
			return true;
		}

		if (strpos($data, '.') !== false)
		{
			$this->error(new XenForo_Phrase('Teams_please_enter_url_using_alphanumeric'), 'custom_url');
			return false;
		}

		if (!preg_match('/^[a-z0-9_\-]+$/i', $data))
		{
			$this->error(new XenForo_Phrase('Teams_please_enter_url_using_alphanumeric'), 'custom_url');
			return false;
		}

		if ($data === strval(intval($data)) || $data == '-')
		{
			$this->error(new XenForo_Phrase('Teams_url_contain_more_numbers_hyphen'), 'custom_url');
			return false;
		}

		if (in_array(strtolower($data), Nobita_Teams_Blacklist::$blacklist))
		{
			throw new Nobita_Teams_Exception_Abstract("Your defined URL disallow to use. Please try with difference URL.", true);
			return false;
		}

		return true;
	}
	
	public function setCustomFields(array $fieldValues, array $fieldsShown = null)
	{
		$fieldModel = $this->_getFieldModel();
		$fields = $fieldModel->getTeamFieldsForEdit($this->get('team_category_id'));

		if (!is_array($fieldsShown))
		{
			$fieldsShown = array_keys($fields);
		}

		if ($this->get('team_id') && !$this->_importMode)
		{
			$existingValues = $fieldModel->getTeamFieldValues($this->get('team_id'));
		}
		else
		{
			$existingValues = array();
		}

		$finalValues = array();

		foreach ($fieldsShown AS $fieldId)
		{
			if (!isset($fields[$fieldId]))
			{
				continue;
			}

			$field = $fields[$fieldId];
			$multiChoice = ($field['field_type'] == 'checkbox' || $field['field_type'] == 'multiselect');

			if ($multiChoice)
			{
				// multi selection - array
				$value = array();
				if (isset($fieldValues[$fieldId]))
				{
					if (is_string($fieldValues[$fieldId]))
					{
						$value = array($fieldValues[$fieldId]);
					}
					else if (is_array($fieldValues[$fieldId]))
					{
						$value = $fieldValues[$fieldId];
					}
				}
			}
			else
			{
				// single selection - string
				if (isset($fieldValues[$fieldId]))
				{
					if (is_array($fieldValues[$fieldId]))
					{
						$value = count($fieldValues[$fieldId]) ? strval(reset($fieldValues[$fieldId])) : '';
					}
					else
					{
						$value = strval($fieldValues[$fieldId]);
					}
				}
				else
				{
					$value = '';
				}
			}

			$existingValue = (isset($existingValues[$fieldId]) ? $existingValues[$fieldId] : null);

			if (!$this->_importMode)
			{
				$valid = $fieldModel->verifyTeamFieldValue($field, $value, $error);
				if (!$valid)
				{
					$this->error($error, "custom_field_$fieldId");
					continue;
				}

				if ($field['required'] && ($value === '' || $value === array()))
				{
					$this->error(new XenForo_Phrase('please_enter_value_for_all_required_fields'), "required");
					continue;
				}
			}

			if ($value !== $existingValue)
			{
				$finalValues[$fieldId] = $value;
			}
		}

		$this->_updateCustomFields = $this->_filterValidFields($finalValues + $existingValues, $fields);
		$this->set('custom_fields', $this->_updateCustomFields);
	}
	
	protected function _filterValidFields(array $values, array $fields)
	{
		$newValues = array();
		foreach ($fields AS $field)
		{
			if (isset($values[$field['field_id']]))
			{
				$newValues[$field['field_id']] = $values[$field['field_id']];
			}
		}

		return $newValues;
	}
	
	protected function _preSave()
	{
		if ($this->get('custom_url') && $this->isChanged('custom_url'))
		{
			$conflict = $this->_getTeamModel()->getTeamByCustomUrl($this->get('custom_url'));
			if ($conflict)
			{
				$this->error(new XenForo_Phrase('Teams_url_must_be_unique'));
				return false;
			}
		
			#if (utf8_strlen($this->get('custom_url')) < 6)
			if (strlen($this->get('custom_url')) < self::$urlThreshold)
			{
				$this->error(new XenForo_Phrase('Teams_please_enter_value_that_is_at_least_x_characters_long', array(
					'count' => self::$urlThreshold
				)));
				return false;
			}
		}

		if ($this->isChanged('team_category_id'))
		{
			if ($this->isUpdate() && !is_array($this->_updateCustomFields))
			{
				$fieldModel = $this->_getFieldModel();

				$this->_updateCustomFields = $this->_filterValidFields(
					$fieldModel->getTeamFieldValues($this->get('team_id')),
					$fieldModel->getTeamFieldsForEdit($this->get('team_category_id'))
				);
				$this->set('custom_fields', $this->_updateCustomFields);
			}
		}

		if ($this->get('user_id')) 
		{
			$user = $this->getModelFromCache('XenForo_Model_User')->getUserById($this->get('user_id'));

			if ($user) 
			{
				$this->set('username', $user['username']);
			} 
			else 
			{
				$this->set('user_id', 0);
			}
		}
	}

	protected function _postSave()
	{
		$postSaveChanges = array();
		$this->updateCustomFields();

		if ($this->isUpdate() && $this->isChanged('title'))
		{
			$threadDw = XenForo_DataWriter::create('XenForo_DataWriter_Discussion_Thread', XenForo_DataWriter::ERROR_SILENT);
			if ($threadDw->setExistingData($this->get('discussion_thread_id')) && $threadDw->get('discussion_type') == 'team')
			{
				$threadTitle = $this->_stripTemplateComponents($threadDw->get('title'), $this->getOption(self::OPTION_DELETE_THREAD_TITLE_TEMPLATE));

				if ($threadTitle == $this->getExisting('title'))
				{
					$threadDw->set('title', $this->_getThreadTitle());
					$threadDw->save();
				}
			}
		}

		if ($this->isUpdate() && $this->isChanged('privacy_state'))
		{
			$threadDw = XenForo_DataWriter::create('XenForo_DataWriter_Discussion_Thread', XenForo_DataWriter::ERROR_SILENT);
			if ($threadDw->setExistingData($this->get('discussion_thread_id')) && $threadDw->get('discussion_type') == 'team')
			{
				$discussionState = $this->getOption(self::OPTION_TEAM_PRIVACY_THREAD_STATE);
				
				if ($this->get('privacy_state') == 'secret')
				{
					$threadDw->set('discussion_state', $discussionState);
					$threadDw->save();
				}
				else
				{
					$threadDw->set('discussion_state', 'visible');
					$threadDw->save();
				}
			}
		}

		if ($this->isUpdate() && $this->isChanged('team_category_id') && $this->get('discussion_thread_id'))
		{
			$catDw = $this->_getCategoryDwForUpdate();

			$nodeId = $this->getOption(self::OPTION_CREATE_THREAD_NODE_ID);
			if ($nodeId === null)
			{
				$nodeId = $catDw->get('thread_node_id');
			}
			$prefixId = $this->getOption(self::OPTION_CREATE_THREAD_PREFIX_ID);
			if ($prefixId === null)
			{
				$prefixId = $catDw->get('thread_prefix_id');
			}

			$threadDw = XenForo_DataWriter::create('XenForo_DataWriter_Discussion_Thread', XenForo_DataWriter::ERROR_SILENT);
			if ($threadDw->setExistingData($this->get('discussion_thread_id')) && $threadDw->get('discussion_type') == 'team')
			{
				$threadDw->set('node_id', $nodeId);
				$threadDw->set('prefix_id', $prefixId);
				$threadDw->save();
			}
		}

		$removed = false;
		if ($this->isChanged('team_state'))
		{
			if ($this->get('team_state') == 'visible')
			{
				$this->_teamMadeVisible($postSaveChanges);
			}
			else if ($this->isUpdate() && $this->getExisting('team_state') == "visible")
			{
				$this->_teamRemoved();
				$removed = true;
			}
			
			$this->_updateDeletionLog();
			$this->_updateModerationQueue();
		}

		if ($postSaveChanges)
		{
			$this->_db->update('xf_team', $postSaveChanges, 'team_id = ' . $this->_db->quote($this->get('team_id')));
		}

		$catDw = $this->_getCategoryDwForUpdate();
		if ($catDw && !$removed)
		{
			$catDw->teamUpdate($this);
			$catDw->save();
		}

		if ($this->isUpdate() && $this->isChanged('user_id'))
		{
			if ($this->get('user_id') && $this->get('team_state') == 'visible' && !$this->isChanged('team_state'))
			{
				$this->_db->query('
					UPDATE xf_user
					SET team_count = team_count + 1
					WHERE user_id = ?
				', $this->get('user_id'));
			}
			
			if ($this->getExisting('user_id') && $this->getExisting('team_state') == 'visible')
			{
				$this->_db->query('
					UPDATE xf_user
					SET team_count = team_count - 1
					WHERE user_id = ?
				', $this->getExisting('user_id'));
			}
		}

		if ($this->getOption(self::OPTION_PUBLISH_FEED))
		{
			if ($this->isInsert() || ($this->isUpdate()
				&& $this->isChanged('team_state')
				&& $this->get('team_state') == 'visible'
			))
			{
				$this->_publishToNewsFeed();
			}
		}

		if ($this->getOption(self::OPTION_INDEX_FOR_SEARCH))
		{
			$this->_indexForSearch();
		}

		if ($this->isUpdate())
		{
			$setup = Nobita_Teams_Setup::getInstance();

			$visitor = XenForo_Visitor::getInstance();
			if ($this->isChanged('privacy_state'))
			{
				$newPrivacy = $this->get('privacy_state');
				$oldPrivacy = $this->getExisting('privacy_state');

				$message = new XenForo_Phrase('Teams_changed_the_team_privacy_setting_from_x_to_y', array(
					'name' => $visitor['username'],
					'userId' => $visitor['user_id'],
					'old' => ucfirst($oldPrivacy),
					'new' => ucfirst($newPrivacy)
				), false);
				$setup->insertNewPostWhenActionCreated(
					$this->get('team_id'), $message, 1
				);
			}

			if ($this->isChanged('ribbon_text') || $this->isChanged('ribbon_display_class'))
			{
				$message = new XenForo_Phrase('Teams_x_updated_new_ribbon_for_team', array(
					'name' => $visitor['username'],
					'userId' => $visitor['user_id']
				), false);
				$setup->insertNewPostWhenActionCreated(
					$this->get('team_id'), $message, 1
				);
			}
		}

		if ($this->isInsert())
		{
			$this->_db->update('xf_team', array('last_activity' => XenForo_Application::$time),
				'team_id = ' . $this->_db->quote($this->getTeamId())
			);
		}
	}

	protected function _stripTemplateComponents($string, $template)
	{
		if (!$template) {
			return $string;
		}

		$template = str_replace('\{title\}', '(.*)', preg_quote($template, '/'));

		if (preg_match('/^' . $template . '$/', $string, $match)) {
			return $match[1];
		}

		return $string;
	}

	protected function _getThreadTitle()
	{
		$title = $this->get('title');
		if ($this->get('team_state') != 'visible' && $this->getOption(self::OPTION_DELETE_THREAD_TITLE_TEMPLATE))
		{
			$title = str_replace(
				'{title}', $this->get('title'),
				$this->getOption(self::OPTION_DELETE_THREAD_TITLE_TEMPLATE)
			);
		}

		return $title;
	}

	protected function _insertDiscussionThread($nodeId, $prefixId = 0)
	{
		if (!$nodeId)
		{
			return false;
		}

		$forum = $this->getModelFromCache('XenForo_Model_Forum')->getForumById($nodeId);
		if (!$forum)
		{
			return false;
		}

		$threadDw = XenForo_DataWriter::create('XenForo_DataWriter_Discussion_Thread', XenForo_DataWriter::ERROR_SILENT);
		$threadDw->setExtraData(XenForo_DataWriter_Discussion_Thread::DATA_FORUM, $forum);
		$threadDw->bulkSet(array(
			'node_id' => $nodeId,
			'title' => $this->_getThreadTitle(),
			'user_id' => $this->get('user_id'),
			'username' => $this->get('username'),
			'discussion_type' => 'team',
			'prefix_id' => $prefixId
		));
		$threadDw->set('discussion_state', $this->getModelFromCache('XenForo_Model_Post')->getPostInsertMessageState(array(), $forum));
		$threadDw->setOption(XenForo_DataWriter_Discussion::OPTION_PUBLISH_FEED, false);

		$messageText = $this->get('about');
		// note: this doesn't actually strip the BB code - it will fix the BB code in the snippet though
		$parser = XenForo_BbCode_Parser::create(XenForo_BbCode_Formatter_Base::create('XenForo_BbCode_Formatter_BbCode_AutoLink', false));
		$snippet = $parser->render(XenForo_Helper_String::wholeWordTrim($messageText, 500));

		$message = new XenForo_Phrase('Teams_message_create_team', array(
			'title' => $this->get('title'),
			'tagLine' => $this->get('tag_line'),
			'username' => $this->get('username'),
			'userId' => $this->get('user_id'),
			'snippet' => $snippet,

			'teamLink' => XenForo_Link::buildPublicLink('canonical:' . Nobita_Teams_Model_Team::routePrefix(), $this->getMergedData())
		), false);

		$postWriter = $threadDw->getFirstMessageDw();
		$postWriter->set('message', $message->render());
		$postWriter->setExtraData(XenForo_DataWriter_DiscussionMessage_Post::DATA_FORUM, $forum);
		$postWriter->setOption(XenForo_DataWriter_DiscussionMessage::OPTION_PUBLISH_FEED, false);

		if (!$threadDw->save())
		{
			return false;
		}

		$this->set('discussion_thread_id',
			$threadDw->get('thread_id'), '', array('setAfterPreSave' => true)
		);
		$postSaveChanges['discussion_thread_id'] = $threadDw->get('thread_id');

		$this->getModelFromCache('XenForo_Model_Thread')->markThreadRead(
			$threadDw->getMergedData(), $forum, \XenForo_Application::$time
		);

		$this->getModelFromCache('XenForo_Model_ThreadWatch')->setThreadWatchStateWithUserDefault(
			$this->get('user_id'), $threadDw->get('thread_id'),
			$this->getExtraData(self::DATA_THREAD_WATCH_DEFAULT)
		);

		return $threadDw->get('thread_id');
	}

	/**
	* Post-save handling, after the transaction is committed.
	*/
	protected function _postSaveAfterTransaction()
	{
		$importMode = $this->getExtraData(self::IMPORT_MODE);
		if ($this->isInsert() && !$importMode)
		{
			$this->getModelFromCache('Nobita_Teams_Model_Member')->insertMember(
				$this->get('user_id'), $this->get('team_id'),
				'admin', 'accept', 
				array(), array('insert' => true)
			);
			
			$this->getModelFromCache('Nobita_Teams_Model_CategoryWatch')->sendNotificationToWatchUsers(
				$this->getMergedData()
			);
		}
		
	}

	public function updateCustomFields()
	{
		if (is_array($this->_updateCustomFields))
		{
			$teamId = $this->get('team_id');

			$this->_db->query('DELETE FROM xf_team_field_value WHERE team_id = ?', $teamId);

			foreach ($this->_updateCustomFields AS $fieldId => $value)
			{
				if (is_array($value))
				{
					$value = serialize($value);
				}
				$this->_db->query('
					INSERT INTO xf_team_field_value
						(team_id, field_id, field_value)
					VALUES
						(?, ?, ?)
					ON DUPLICATE KEY UPDATE
						field_value = VALUES(field_value)
				', array($teamId, $fieldId, $value));
			}
		}
	}

	protected function _teamRemoved()
	{
		if ($this->get('discussion_thread_id'))
		{
			$threadDw = XenForo_DataWriter::create('XenForo_DataWriter_Discussion_Thread', XenForo_DataWriter::ERROR_SILENT);
			if ($threadDw->setExistingData($this->get('discussion_thread_id')) && $threadDw->get('discussion_type') == 'team')
			{
				switch ($this->getOption(self::OPTION_DELETE_THREAD_ACTION))
				{
					case 'delete':
						$threadDw->set('discussion_state', 'deleted');
						break;

					case 'close':
						$threadDw->set('discussion_open', 0);
						break;
				}

				if ($this->getOption(self::OPTION_DELETE_THREAD_TITLE_TEMPLATE))
				{
					$threadTitle = str_replace(
						'{title}', $threadDw->get('title'),
						$this->getOption(self::OPTION_DELETE_THREAD_TITLE_TEMPLATE)
					);
					$threadDw->set('title', $threadTitle);
				}

				$threadDw->save();
			}
		}

		if ($this->get('user_id'))
		{
			$this->_db->query('
				UPDATE xf_user
				SET team_count = team_count - 1
				WHERE user_id = ?
			', $this->get('user_id'));
			
			$this->_db->query('
				UPDATE xf_user
				SET team_ribbon_id = 0
				WHERE team_ribbon_id = ?
			', array($this->get('team_id')));
		}

		$catDw = $this->_getCategoryDwForUpdate();
		if ($catDw)
		{
			$catDw->teamRemoved($this);
			$catDw->save();
		}
	}

	protected function _teamMadeVisible(array &$postSaveChanges)
	{
		if (!$this->get('discussion_thread_id'))
		{
			$catDw = $this->_getCategoryDwForUpdate();

			$nodeId = $this->getOption(self::OPTION_CREATE_THREAD_NODE_ID);
			if ($nodeId === null)
			{
				$nodeId = $catDw->get('thread_node_id');
			}
			$prefixId = $this->getOption(self::OPTION_CREATE_THREAD_PREFIX_ID);
			if ($prefixId === null)
			{
				$prefixId = $catDw->get('thread_prefix_id');
			}

			$threadId = $this->_insertDiscussionThread($nodeId, $prefixId);
			if ($threadId)
			{
				$this->set('discussion_thread_id',
					$threadId, '', array('setAfterPreSave' => true)
				);
				$postSaveChanges['discussion_thread_id'] = $threadId;
			}
		}
		else
		{
			$threadDw = XenForo_DataWriter::create('XenForo_DataWriter_Discussion_Thread', XenForo_DataWriter::ERROR_SILENT);
			if ($threadDw->setExistingData($this->get('discussion_thread_id')) && $threadDw->get('discussion_type') == 'team')
			{
				switch ($this->getOption(self::OPTION_DELETE_THREAD_ACTION))
				{
					case 'delete':
						$threadDw->set('discussion_state', 'visible');
						break;

					case 'close':
						$threadDw->set('discussion_open', 1);
						break;
				}

				$title = $this->_stripTemplateComponents($threadDw->get('title'), $this->getOption(self::OPTION_DELETE_THREAD_TITLE_TEMPLATE));
				$threadDw->set('title', $title);
				$threadDw->save();
			}
		}

		if ($this->get('user_id') && $this->get('team_state') == 'visible')
		{
			$this->_db->query('
				UPDATE xf_user
				SET team_count = team_count + 1
				WHERE user_id = ?
			', $this->get('user_id'));
		}
	}

	public function updateMessageCount($adjust = null)
	{
		$teamId = $this->get('team_id');
		if ($adjust === null)
		{
			$db = $this->_db;
			$totalPosts = $db->fetchOne(
				'
					SELECT COUNT(*)
					FROM xf_team_post
					WHERE message_state = \'visible\'
						AND team_id = ?
				', $teamId);
			$totalComments = $db->fetchOne(
				'
					SELECT COUNT(*)
					FROM xf_team_post_comment
					WHERE team_id = ?
				', $teamId);
			$this->set('message_count', $totalPosts + $totalComments);
		}
		else
		{
			$this->set('message_count', $this->get('message_count') + $adjust);
		}
	}
	
	/**
	 *	Gets the current value of the team ID for this team.
	 *
	 *	@return integer
	 */
	public function getTeamId()
	{
		return $this->get('team_id');
	}
	
	public function getContentType()
	{
		return 'team';
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
			$this->getTeamId(),
			'insert'
		);
	}
	
	/**
	 * Removes an already published news feed item
	 */
	protected function _deleteFromNewsFeed()
	{
		$this->_getNewsFeedModel()->delete(
			$this->getContentType(),
			$this->getTeamId()
		);
	}

	protected function _updateDeletionLog($hardDelete = false)
	{
		if ($hardDelete
			|| ($this->isChanged('team_state') && $this->getExisting('team_state') == 'deleted')
		)
		{
			$this->getModelFromCache('XenForo_Model_DeletionLog')->removeDeletionLog(
				$this->getContentType(), $this->getTeamId()
			);
		}

		if ($this->isChanged('team_state') && $this->get('team_state') == 'deleted')
		{
			$reason = $this->getExtraData(self::DATA_DELETE_REASON);
			$this->getModelFromCache('XenForo_Model_DeletionLog')->logDeletion(
				$this->getContentType(), $this->getTeamId(), $reason
			);
		}
	}

	protected function _updateModerationQueue()
	{
		if (!$this->isChanged('team_state'))
		{
			return;
		}

		if ($this->get('team_state') == 'moderated')
		{
			$this->getModelFromCache('XenForo_Model_ModerationQueue')->insertIntoModerationQueue(
				$this->getContentType(), $this->getTeamId(), $this->get('team_date')
			);
		}
		else if ($this->getExisting('team_state') == 'moderated')
		{
			$this->getModelFromCache('XenForo_Model_ModerationQueue')->deleteFromModerationQueue(
				$this->getContentType(), $this->getTeamId()
			);
		}
	}
	
	protected function _postDelete()
	{
		$db = $this->_db;
		$teamIdQuoted = $db->quote($this->get('team_id'));
		
		$postIds = $db->fetchCol('
			SELECT post_id
			FROM xf_team_post
			WHERE team_id = ?
		', $this->getTeamId());
		$this->getModelFromCache('XenForo_Model_Attachment')->deleteAttachmentsFromContentIds(
			'team_post', $postIds
		);
		$this->getModelFromCache('XenForo_Model_Alert')->deleteAlerts(
			'team_post', $postIds
		);

		$db->delete('xf_team_post', 'team_id = ' . $teamIdQuoted);
		$db->delete('xf_team_post_comment', 'team_id = ' . $teamIdQuoted);
		$db->delete('xf_team_member', 'team_id = ' . $teamIdQuoted);
		$db->delete('xf_team_field_value', 'team_id = ' . $teamIdQuoted);

		// update thread
		$db->query("
			UPDATE xf_thread
			SET team_id = 0, discussion_type = ''
			WHERE team_id = ?
		", $this->getTeamId());

		// 1.1.3 support event!
		$db->delete('xf_team_event', 'team_id = ' . $teamIdQuoted);

		if ($this->getExisting('team_state') == 'visible')
		{
			$this->_teamRemoved();
		}
		$this->_updateDeletionLog(true);
		$this->getModelFromCache('XenForo_Model_ModerationQueue')->deleteFromModerationQueue(
			'team', $this->get('team_id')
		);

		$this->getModelFromCache('Nobita_Teams_Model_Avatar')->deleteAvatar($this->getTeamId(), false);

		if ($this->get('cover_date'))
		{
			$this->getModelFromCache('Nobita_Teams_Model_Cover')->deleteCoverPhoto($this->getTeamId(), false); // fixed! remove cover as well!
			$this->getModelFromCache('Nobita_Teams_Model_Cover')->deleteCoverCropPhoto($this->getTeamId(), $this->get('cover_date'));
		}

		$this->_deleteFromNewsFeed();
		$this->getModelFromCache('XenForo_Model_Alert')->deleteAlerts(
			'team', $this->getTeamId()
		);

		if (Nobita_Teams_Validation::assertAddOnValidAndUsable('sonnb_xengallery', false))
		{
			try
			{
				$db->query("
					UPDATE sonnb_xengallery_album
					SET team_id = 0
					WHERE team_id = ?
				", $this->get('team_id'));
			}
			catch(Zend_Db_Exception $e) {}
		}
	}

	public function updateMemberCountInTeam($adjust = null)
	{
		if ($adjust === null)
		{
			$this->set('member_count', $this->_db->fetchOne("
				SELECT COUNT(*)
				FROM xf_team_member
				WHERE team_id = ?
					AND member_state = 'accept'
			", $this->get('team_id')));
		}
		else
		{
			$this->set('member_count', $this->get('member_count') + $adjust);
		}
	}

	public function updateMemberRequestCount($adjust = null)
	{
		if ($adjust === null)
		{
			$this->set('member_request_count', $this->_db->fetchOne("
				SELECT COUNT(*)
				FROM xf_team_member
				WHERE team_id = ?
					AND member_state = 'request'
			", $this->get('team_id')));
		}
		else
		{
			$this->set('member_request_count', $this->get('member_request_count') + $adjust);
		}
	}

	public function updateInvalidCustomUrl()
	{
		$customUrl = $this->get('custom_url');
		if ($customUrl === null)
		{
			return true;
		}

		if (strlen($customUrl) < self::$urlThreshold)
		{
			$this->set('custom_url', null);
		}

		if (strpos($customUrl, '.') !== false) // ehnm? dot in custom URL?
		{
			$this->_db->update('xf_team', array('custom_url' => null), 'team_id = ' . $this->_db->quote($this->get('team_id')));
		}
		
		return true;
	}
	
	public function updateTeamOwner()
	{
		$userId = $this->get('user_id');
		$db = $this->_db;

		$db->update('xf_team_member', array(
			'position' => 'admin'
		), 'user_id = ' . $db->quote($userId) . ' AND team_id = ' . $db->quote($this->get('team_id')));
	}

	public function rebuildCounters()
	{
		$this->updateMemberCountInTeam();
		$this->updateMessageCount();
		$this->updateMemberRequestCount();
		$this->updateInvalidCustomUrl();

		//$this->removeInvalidAvatar();

		$this->_getTeamModel()->updateRibbonAssociations($this->getMergedData());

		
	}

	protected function _indexForSearch()
	{
		if ($this->get('team_state') == "visible")
		{
			if ($this->getExisting('team_state') != 'visible')
			{
				$this->_insertIntoSearchIndex();
			}
			else if ($this->_needsSearchIndexUpdate())
			{
				$this->_updateSearchIndexTitle();
			}
		}
		else if ($this->isUpdate() && $this->get('team_state') != 'visible' && $this->getExisting('team_state') == 'visible')
		{
			$this->_deleteFromSearchIndex();
		}
	}

	/**
	 * Returns true if the changes made require the search index to be updated.
	 *
	 * @return boolean
	 */
	protected function _needsSearchIndexUpdate()
	{
		return $this->isChanged('title') || $this->isChanged('tag_line') || $this->isChanged('team_category_id');
	}

	/**
	 * Inserts a record in the search index for this discussion.
	 */
	protected function _insertIntoSearchIndex()
	{
		$team = $this->getMergedData();
		$indexer = new XenForo_Search_Indexer();
		
		$dataHandler = XenForo_Search_DataHandler_Abstract::create('Nobita_Teams_Search_DataHandler_Team');
		if ($dataHandler)
		{
			$dataHandler->insertIntoIndex($indexer, $team);
		}
		
	}

	/**
	 * Updates the title in the search index for this discussion.
	 */
	protected function _updateSearchIndexTitle()
	{
		$indexer = new XenForo_Search_Indexer();
		$mergedData = $this->getMergedData();
		
		$dataHandler = XenForo_Search_DataHandler_Abstract::create('Nobita_Teams_Search_DataHandler_Team');
		if ($dataHandler)
		{
			$dataHandler->insertIntoIndex($indexer, $mergedData);
		}
	}

	/**
	 * Deletes this discussion from the search index.
	 */
	protected function _deleteFromSearchIndex()
	{
		$indexer = new XenForo_Search_Indexer();
		$mergedData = $this->getMergedData();
		
		$dataHandler = XenForo_Search_DataHandler_Abstract::create('Nobita_Teams_Search_DataHandler_Team');
		if ($dataHandler)
		{
			$dataHandler->deleteFromIndex($indexer, $mergedData);
		}
	}

	/**
	 * @return Nobita_Teams_DataWriter_Category|bool
	 */
	protected function _getCategoryDwForUpdate()
	{
		$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Category', XenForo_DataWriter::ERROR_SILENT);
		if ($dw->setExistingData($this->get('team_category_id')))
		{
			return $dw;
		}
		else
		{
			return false;
		}
	}
	
	protected function _getNewsFeedModel()
	{
		return $this->getModelFromCache('XenForo_Model_NewsFeed');
	}

	protected function _getCategoryModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Category');
	}
	
	protected function _getFieldModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Field');
	}
	
	protected function _getTeamModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Team');
	}
}