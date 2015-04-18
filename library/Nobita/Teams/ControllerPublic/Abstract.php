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
class Nobita_Teams_ControllerPublic_Abstract extends XenForo_ControllerPublic_Abstract
{
	protected function _preDispatch($action)
	{
		if (XenForo_Application::isRegistered('addOns'))
		{
			$addOns = XenForo_Application::get('addOns');
			if (!empty($addOns['nobita_Teams']) && $addOns['nobita_Teams'] < 172)
			{
				$response = $this->responseMessage(new XenForo_Phrase('board_currently_being_upgraded'));
				throw $this->responseException($response, 503);
			}
		}

		if (!$this->_getTeamModel()->canViewTeams($error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}
	}

	protected function _postDispatch($controllerResponse, $controllerName, $action)
	{
		if (isset($controllerResponse->params['category']))
		{
			$controllerResponse->containerParams['teamCategory'] = $controllerResponse->params['category'];
		}

		if (isset($controllerResponse->params['team']))
		{
			$controllerResponse->containerParams['team'] = $controllerResponse->params['team'];
		}
	}

	public function _getTeamViewWrapper($selectedTab, array $team, array $category,
		XenForo_ControllerResponse_View $subView)
	{
		return $this->_getTeamHelper()->getTeamViewWrapper($selectedTab, $team, $category, $subView);
	}

	public function getPostSpecificRedirect(array $post, array $team,
		$redirectType = XenForo_ControllerResponse_Redirect::SUCCESS, array $redirectParams = array()
	)
	{
		if ($post['last_comment_date'] < XenForo_Application::$time)
		{
			$postModel = $this->_getPostModel();

			$setup = Nobita_Teams_Setup::getInstance();
			$requester = $setup->getTeamFromVisitor($team['team_id']);
			$conditions = $postModel->getPermissionBasedPostConditions($team, $requester) + array(
				'last_comment_date' => array('>', $post['last_comment_date'])
			);

			$count = $postModel->countPostsForTeamId($team['team_id'], $conditions);

			$page = floor($count / XenForo_Application::get('options')->messagesPerPage) + 1;
		}
		else
		{
			$page = 1;
		}

		$extraParams = array(
			'page' => $page, 
			'wtype' => $post['discussion_type']
		);

		return $this->responseRedirect(
			$redirectType,
			XenForo_Link::buildPublicLink(
				TEAM_ROUTE_ACTION, $team, $extraParams
			) . '#post-' . $post['post_id'],
			null,
			$redirectParams
		);
	}

	protected function _getTeamListFetchOptions()
	{
		$fetchOptions = array();

		$fetchOptions['join'] = Nobita_Teams_Model_Team::FETCH_PROFILE
				| Nobita_Teams_Model_Team::FETCH_PRIVACY
				| Nobita_Teams_Model_Team::FETCH_CATEGORY
				| Nobita_Teams_Model_Team::FETCH_USER
				| Nobita_Teams_Model_Team::FETCH_FEATURED;

		$visitor = XenForo_Visitor::getInstance();

		$fetchOptions['banUserId'] = $visitor['user_id'];
		$fetchOptions['memberUserId'] = $visitor['user_id'];

		return $fetchOptions;
	}
	
	protected function _getTeamHelper()
	{
		return $this->getHelper('Nobita_Teams_ControllerHelper_Team');
	}

	protected function _getTeamModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Team');
	}

	protected function _getBanningModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Banning');
	}

	protected function _getCategoryModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Category');
	}

	protected function _getCategoryWatchModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_CategoryWatch');
	}
	
	protected function _getFieldModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Field');
	}

	protected function _getAvatarModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Avatar');
	}

	protected function _getCoverModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Cover');
	}

	protected function _getMemberModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Member');
	}

	protected function _getMemberGroupModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_MemberGroup');
	}

	protected function _getPostModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Post');
	}

	protected function _getCommentModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Comment');
	}

	protected function _getEventModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Event');
	}

	protected function _getInviteModel()
	{
		return $this->getModelFromCache('Nobita_Teams_Model_Invite');
	}
}