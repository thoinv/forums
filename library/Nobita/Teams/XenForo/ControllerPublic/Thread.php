<?php

class Nobita_Teams_XenForo_ControllerPublic_Thread extends XFCP_Nobita_Teams_XenForo_ControllerPublic_Thread
{
	public function actionTeamsMove()
	{
		$threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);

		$ftpHelper = $this->getHelper('ForumThreadPost');
		list($thread, $forum) = $ftpHelper->assertThreadValidAndViewable($threadId, array());

		if (!$this->_getThreadModel()->Team_moveThread($thread, $forum, $error))
		{
			throw $this->getErrorOrNoPermissionResponseException($error);
		}

		$categories = $this->getModelFromCache('Nobita_Teams_Model_Category')->getViewableCategories();
		foreach ($categories as &$category)
		{
			if (empty($category['discussion_node_id']))
			{
				$category['disabled'] = true;
			}
		}
		unset($category);

		if (!$categories)
		{
			throw $this->getNoPermissionResponseException();
		}

		$teamModel = $this->getModelFromCache('Nobita_Teams_Model_Team');
		if ($this->_request->isPost())
		{
			$teamId = $this->_input->filterSingle('team_id', XenForo_Input::UINT);
			$team = $teamModel->getFullTeamById($teamId, array(
				'join' => Nobita_Teams_Model_Team::FETCH_CATEGORY
			));
			if (!$team)
			{
				return $this->responseError(new XenForo_Phrase('Teams_requested_team_not_found'), 404);
			}

			$category = isset($categories[$team['team_category_id']]) ? $categories[$team['team_category_id']] : $team;

			$dw = XenForo_DataWriter::create('XenForo_DataWriter_Discussion_Thread');
			$dw->setExistingData($thread);

			$dw->set('discussion_type', 'team');
			$dw->set('team_id', $team['team_id']);
			$dw->set('node_id', $category['discussion_node_id']);

			if ($category['discussion_prefix_id'])
			{
				$dw->set('prefix_id', $category['discussion_prefix_id']);
			}

			$dw->save();

			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildPublicLink('threads', $thread)
			);
		}
		else
		{
			$viewParams = array(
				'thread' => $thread,
				'forum' => $forum,
				'nodeBreadCrumbs' => $ftpHelper->getNodeBreadCrumbs($forum),
				'categories' => $categories
			);
			return $this->responseView('Nobita_Teams_ViewPublic_Thread_Move', 'Team_thread_move', $viewParams);
		}

	}
}