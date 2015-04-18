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
class Nobita_Teams_ControllerHelper_Team extends XenForo_ControllerHelper_Abstract
{
	/**
	 * The current browsing user.
	 *
	 * @var XenForo_Visitor
	 */
	protected $_visitor;
	protected $_category;

	/**
	 * Additional constructor setup behavior.
	 */
	protected function _constructSetup()
	{
		$this->_visitor = XenForo_Visitor::getInstance();
		
		return parent::_constructSetup();
	}

	public function assertEventValidAndViewable($eventId = null, array $fetchOptions = array())
	{
		$teamModel = $this->_getTeamModel();
		$categoryModel = $this->_getCategoryModel();

		if (!isset($fetchOptions['join'])) 
		{
			$fetchOptions['join'] = 0;
		}
		$fetchOptions['likeUserId'] = XenForo_Visitor::getUserId();

		$fetchOptions['join'] |= Nobita_Teams_Model_Event::FETCH_TEAM
								 | Nobita_Teams_Model_Event::FETCH_USER;
		$event = $this->getEventOrError($eventId, $fetchOptions);

		list ($team, $category) = $this->assertTeamValidAndViewable($event['team_id']);
		if (!$teamModel->canViewTabAndContainer('events', $team, $category, $error))
		{
			throw $this->_controller->getErrorOrNoPermissionResponseException($error);
		}

		$eventModel = $this->_controller->getModelFromCache('Nobita_Teams_Model_Event');
		if (!$eventModel->canViewEventAndContainer($event, $team, $category, $key))
		{
			throw $this->_controller->getErrorOrNoPermissionResponseException($key);
		}

		$event = $eventModel->prepareEvent($event, $team, $category);
		return array($event, $team, $category);
	}

	public function getEventOrError($id = null, array $fetchOptions)
	{
		if ($id === null)
		{
			$id = $this->_controller->getInput()->filterSingle('event_id', XenForo_Input::UINT);
		}
		
		$eventModel = $this->_controller->getModelFromCache('Nobita_Teams_Model_Event');
		$event = $eventModel->getEventById($id, $fetchOptions);
		if (!$event)
		{
			throw $this->_controller->responseException(
				$this->_controller->responseError(new XenForo_Phrase('Teams_requested_event_not_found'), 404)
			);
		}

		return $event;
	}

	public function assertTeamValidAndViewable($teamIdOrName = null, array $teamFetchOptions = array(), array $categoryFetchOptions = array())
	{
		if (!isset($teamFetchOptions['join']))
		{
			$teamFetchOptions['join'] = 0;
		}
		
		$teamFetchOptions['join'] |= 
			Nobita_Teams_Model_Team::FETCH_PRIVACY
			| Nobita_Teams_Model_Team::FETCH_PROFILE
			| Nobita_Teams_Model_Team::FETCH_FEATURED;

		if ($this->_visitor->hasPermission('Teams', 'viewDeleted')) {
			$teamFetchOptions['join'] |= Nobita_Teams_Model_Team::FETCH_DELETION_LOG;
		}
		
		$visitor = XenForo_Visitor::getInstance();
		$teamFetchOptions['banUserId'] = $visitor['user_id'];
		$teamFetchOptions['memberUserId'] = $visitor['user_id'];

		$team = $this->getTeamOrError($teamIdOrName, $teamFetchOptions);
		$category = $this->assertCategoryValidAndViewable($team['team_category_id'], $categoryFetchOptions);
		
		$teamModel = $this->_controller->getModelFromCache('Nobita_Teams_Model_Team');

		if (!$teamModel->canViewTeam($team, $category, $errorPhraseKey))
		{
			throw $this->_controller->getErrorOrNoPermissionResponseException($errorPhraseKey);
		}
		
		$team = $teamModel->prepareTeam($team, $category);
		$team = $teamModel->prepareTeamCustomFields($team, $category);

		if (!empty($team['ban_expired_date']) && $team['ban_expired_date'] > XenForo_Application::$time)
		{
			$banLift = new XenForo_Phrase('ban_will_be_automatically_lifted_on_x', array(
				'date' => XenForo_Locale::date($team['ban_expired_date'])
			), false);

			throw $this->_controller->responseException(
				$this->_controller->responseError($team['user_reason'] .'. ' . $banLift->render())
			);
		}

		return array($team, $category);
	}
	
	public function getTeamOrError($teamIdOrName = null, array $teamFetchOptions = array())
	{
		$teamId = $this->_controller->getInput()->filterSingle('team_id', XenForo_Input::UINT);
		$teamUrl = $this->_controller->getInput()->filterSingle('custom_url', XenForo_Input::STRING);

		if ($teamIdOrName === null)
		{
			$teamIdOrName = ($teamId) ? $teamId : $teamUrl;
		}

		// bug from version id < 101
		if ($teamIdOrName === '')
		{
			throw $this->_controller->responseException(
				$this->_controller->responseError(new XenForo_Phrase('Teams_requested_team_not_found'), 404)
			);
		}

		if (is_int($teamIdOrName) || $teamIdOrName === strval(intval($teamIdOrName)))
		{
			$team = $this->_controller->getModelFromCache('Nobita_Teams_Model_Team')->getTeamById(
				$teamIdOrName, $teamFetchOptions
			);
		}
		else
		{
			$team = $this->_controller->getModelFromCache('Nobita_Teams_Model_Team')->getTeamByCustomUrl(
				$teamIdOrName, $teamFetchOptions
			);
		}
		
		if (!$team)
		{
			throw $this->_controller->responseException(
				$this->_controller->responseError(new XenForo_Phrase('Teams_requested_team_not_found'), 404)
			);
		}
		
		return $team;
	}

	public function assertCategoryValidAndViewable($id = null, array $fetchOptions = array())
	{
		/**  @var Nobita_Teams_Model_Category **/
		$categoryModel = $this->_controller->getModelFromCache('Nobita_Teams_Model_Category');
		$category = $this->_getCategoryOrError($id, $fetchOptions);

		if (!$categoryModel->canViewCategory($category, $errorPhraseKey))
		{
			throw $this->_controller->getErrorOrNoPermissionResponseException($errorPhraseKey);
		}
		
		$category = $categoryModel->prepareCategory($category);
		return $category;
	}

	/**
	 * Gets the specified category or throws an error.
	 *
	 * @param integer|null $categoryId Category ID
	 * @param array $fetchOptions Options that control the data fetched with the category
	 *
	 * @return array
	 */
	protected function _getCategoryOrError($categoryId = null, array $fetchOptions = array())
	{
		if ($categoryId === null)
		{
			$categoryId = $this->_controller->getInput()->filterSingle('team_category_id', XenForo_Input::UINT);
		}

		$category= $this->_controller->getModelFromCache('Nobita_Teams_Model_Category')->getCategoryById(
			intval($categoryId), $fetchOptions
		);

		if (!$category)
		{
			throw $this->_controller->responseException(
				$this->_controller->responseError(new XenForo_Phrase('requested_category_not_found'), 404)
			);
		}

		return $category;
	}

	public function assertMemberValidAndViewable()
	{
		$input = $this->_controller->getInput();
		$memberId = $this->_controller->getInput()->filterSingle('member_id', XenForo_Input::STRING);
		if (strpos($memberId, '_') === false)
		{
			$teamId = $input->filterSingle('team_id', XenForo_Input::UINT);
			$userId = $input->filterSingle('user_id', XenForo_Input::UINT);
		}
		else
		{
			$parts = array_map("intval", explode('_', $memberId));

			$teamId = $parts[0];
			$userId = $parts[1];
		}

		list ($team, $category) = $this->assertTeamValidAndViewable($teamId);
		return array($userId, $team, $category);
	}

	public function getCustomFieldValues(array &$values = null, array &$shownKeys = null)
	{
		$input = $this->_controller->getInput();

		if ($values === null)
		{
			$values = $input->filterSingle('custom_fields', XenForo_Input::ARRAY_SIMPLE);
		}

		if ($shownKeys === null)
		{
			$shownKeys = $input->filterSingle('custom_fields_shown', XenForo_Input::STRING, array('array' => true));
		}

		if (!$shownKeys)
		{
			return array();
		}

		/** @var $fieldModel Nobita_Teams_Model_Field */
		$fieldModel = $this->_controller->getModelFromCache('Nobita_Teams_Model_Field');
		$fields = $fieldModel->getTeamFields();

		$output = array();
		foreach ($shownKeys AS $key)
		{
			if (!isset($fields[$key]))
			{
				continue;
			}

			$field = $fields[$key];

			if (isset($values[$key]))
			{
				$output[$key] = $values[$key];
			}
			else if ($field['field_type'] == 'bbcode' && isset($values[$key . '_html']))
			{
				$messageTextHtml = strval($values[$key . '_html']);

				if ($input->filterSingle('_xfRteFailed', XenForo_Input::UINT))
				{
					// actually, the RTE failed to load, so just treat this as BB code
					$output[$key] = $messageTextHtml;
				}
				else if ($messageTextHtml !== '')
				{
					$output[$key] = $this->_controller->getHelper('Editor')->convertEditorHtmlToBbCode($messageTextHtml, $input);
				}
				else
				{
					$output[$key] = '';
				}
			}
		}

		return $output;
	}
	
	public function assertPostValidAndViewable($postId = null, array $postFetchOptions = array(), 
		array $teamFetchOptions = array())
	{
		if ($postId === null)
		{
			$postId = $this->_controller->getInput()->filterSingle('post_id', XenForo_Input::UINT);
		}
		
		$postModel = $this->_controller->getModelFromCache('Nobita_Teams_Model_Post');
		$teamModel = $this->_controller->getModelFromCache('Nobita_Teams_Model_Team');
		$categoryModel = $this->_controller->getModelFromCache('Nobita_Teams_Model_Category');
		
		if (!isset($postFetchOptions['join']))
		{
			$postFetchOptions['join'] = 0;
		}
		
		$postFetchOptions['join'] |= Nobita_Teams_Model_Post::FETCH_POSTER;
		
		if (!isset($postFetchOptions['likeUserId']))
		{
			$postFetchOptions['likeUserId'] = XenForo_Visitor::getUserId();
		}
		
		if (!isset($postFetchOptions['watchUserId']))
		{
			$postFetchOptions['watchUserId'] = XenForo_Visitor::getUserId();
		}

		$post = $postModel->getPostById($postId, $postFetchOptions);
		if (!$post)
		{
			throw $this->_controller->responseException(
				$this->_controller->responseError(new XenForo_Phrase('requested_post_not_found'), 404)
			);
		}

		list($team, $category) = $this->assertTeamValidAndViewable($post['team_id'], $teamFetchOptions);

		if (!$postModel->canViewPostAndContainer($post, $team, $category, $key))
		{
			throw $this->_controller->getErrorOrNoPermissionResponseException($key);
		}
		//$team = $teamModel->prepareTeam($team, $category);

		$post = $postModel->preparePost($post, $team, $category);
		return array($post, $team, $category);
	}

	public function getCustomBbcodeEditor()
	{
		return array(
			'basic' => true,
			'extended' => true,
			'smilies' => true,
			'link' => true,
			'image' => true,
			'media' => true,
		);
	}
	
	protected function _getFieldModel()
	{
		return $this->_controller->getModelFromCache('Nobita_Teams_Model_Field');
	}
	
	protected function _getTeamModel()
	{
		return $this->_controller->getModelFromCache('Nobita_Teams_Model_Team');
	}

	protected function _getCategoryModel()
	{
		return $this->_controller->getModelFromCache('Nobita_Teams_Model_Category');
	}

	public function getTeamViewWrapper($selectedTab, array $team, array $category,
		XenForo_ControllerResponse_View $subView)
	{
		$teamId = $team['team_id'];
		$visitor = XenForo_Visitor::getInstance();

		$fieldModel = $this->_getFieldModel();
		$teamModel = $this->_getTeamModel();
		$memberModel = $teamModel->getModelFromCache('Nobita_Teams_Model_Member');

		$customFieldsGrouped = $fieldModel->getTeamFieldsForEdit(
			$category['team_category_id'], empty($team['team_id']) ? 0 : $team['team_id']
		);

		$customFieldsGrouped = $fieldModel->prepareTeamFields($customFieldsGrouped, true,
			!empty($team['customFields']) ? $team['customFields'] : array()
		);

		$admins = array();
		if (array_key_exists('disableAdminQuery', $subView->params) && $subView->params['disableAdminQuery'])
		{
			// good nothing to do in this state
		}
		else
		{
			$staffIds = $memberModel->getModelFromCache('Nobita_Teams_Model_MemberGroup')->getStaffIds();
			if ($staffIds)
			{
				$admins = $memberModel->getAllMembersInTeam($teamId, array(
					'position' => $staffIds
				), array(
					'join' => Nobita_Teams_Model_Member::FETCH_USER
				));
			}
		}

		$setup = Nobita_Teams_Setup::getInstance();
		if (isset($admins[$visitor['user_id']]))
		{
			$memberRecord = $admins[$visitor['user_id']];
		}
		else
		{
			$memberRecord = $team['memberInfo'];
		}

		$canManageContent = $memberModel->assertPermissionActionViewable($team, 'canManageContent');

		$statsBlock = true;
		if (!$this->_getTeamModel()->canViewTeamClosedAndContainer($team, $category, $null))
		{
			$statsBlock = false;
		}
		else if ($team['privacy_state'] == Nobita_Teams_Model_Team::PRIVACY_SECRET)
		{
			if (!$teamModel->canViewTeamSecret($team, $category, $null))
			{
				$statsBlock = false;
			}
		}

		if ($team['member_request_count'])
		{
			$requests = $memberModel->getMembersByTeamId($team['team_id'], array(
				'member_state' => 'request'
			), array(
				'limit' => 5
			));

			foreach ($requests as &$request)
			{
				$request = $memberModel->prepareMember($request, $team);
			}
		}
		else
		{
			$requests = array();
		}

		$reposition = $this->_controller->getInput()->filterSingle('reposition', XenForo_Input::UINT);

		$wallType = $this->_controller->getInput()->filterSingle('wtype', XenForo_Input::STRING);
		if (empty($wallType))
		{
			if (Nobita_Teams_Setup::getInstance()->getOption('memberTab') && $teamModel->canViewMemberOrAdminTab(
				Nobita_Teams_Model_Post::POST_TYPE_MEMBER, $team, $category
			))
			{
				$wallType = Nobita_Teams_Model_Post::POST_TYPE_MEMBER;
			}
			else
			{
				$wallType = Nobita_Teams_Model_Post::POST_TYPE_PUBLIC;
			}
		}

		$newsFeedTab = true;
		if (empty($memberRecord['user_id']))
		{
			// should be hidden if empty user
			$newsFeedTab = $teamModel->isOpen($team);
		}

		$viewParams = array(
			'selectedTab' => $selectedTab,
			'team' => $team,
			'category' => $category,
			'categoryBreadcrumbs' => $this->_getCategoryModel()->getCategoryBreadcrumb($category),
			
			'admins' => $admins,
			
			'statsBlock' => $statsBlock,

			'memberRecord' => $memberRecord,
			'totalRequests' => $team['member_request_count'],
			'requests' => $requests,

			'canLeaveOrRequest' => $memberModel->canLeaveOrCancelRequest($memberRecord, $team),
			'canViewRequest' => $memberModel->assertPermissionActionViewable($team, "canApproveOrUnapproved"),

			'canManageContent' => $canManageContent,
			'customFieldsGrouped' => $fieldModel->groupTeamFields($customFieldsGrouped),
			'constructionWrap' => !empty($reposition),

			'wallType' => $wallType,
			'memberWall' => $teamModel->canViewMemberOrAdminTab('member', $team, $category),
			'moderatorWall' => $teamModel->canViewMemberOrAdminTab('moderator', $team, $category),

			// 1.2.0 RC2
			'canViewMemberTab' => $teamModel->canViewTabAndContainer('members', $team, $category), // routePrefix/members
			'canViewPhotoTab' => $teamModel->canViewTabAndContainer('photos', $team, $category),
			'canViewFileTab' => $teamModel->canViewTabAndContainer('files', $team, $category),
			'canViewEventTab' => $teamModel->canViewTabAndContainer('events', $team, $category),
			'canViewThreadsTab' => $teamModel->canViewTabAndContainer('threads', $team, $category),

			// cover data
			'coverDetails' => @unserialize($team['cover_crop_details']),

			// 2.1.2
			'newsFeedTab' => $newsFeedTab,
			'photoTabTitle' => Nobita_Teams_Option::getTabsSupported()['photos']['title']
		);

		$response = $this->_controller->responseView('Nobita_Teams_ViewPublic_Team_View', 'Team_view', $viewParams);
		$response->subView = $subView;
	
		return $response;
	}

}