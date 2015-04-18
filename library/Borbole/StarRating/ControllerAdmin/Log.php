<?php

//######################## Star Rating Threads By Borbole ###########################
class Borbole_StarRating_ControllerAdmin_Log extends XFCP_Borbole_StarRating_ControllerAdmin_Log
{
    //Get all thread ratings and log them in the thread rating log tool
	public function actionRatingsLogViewer()
	{
		$logModel = XenForo_Model::create('XenForo_Model_Log');
		
		$page = $this->_input->filterSingle('page', XenForo_Input::UINT);
		$perPage = 25;
		
		//Search for rating(s) given by user(s)
		$username = $this->_input->filterSingle('username', XenForo_Input::STRING);
			
		if ($username)
		{
			$user = $this->getModelFromCache('XenForo_Model_User')->getUserByName($username);
			
			$viewParams = array(
				'entries' => $logModel->getRatingsLogsByUserId($user['user_id']),
				'noCount' => true
			);
			
			return $this->responseView('StarRating_ViewAdmin_Log', 'threadrating_log_viewer_log', $viewParams);
		}
		
		$viewParams = array(
			'entries' => $logModel->getRatingsLog(array(
				'page' => $page,
				'perPage' => $perPage
			)),
						
			'page' => $page,
			'perPage' => $perPage,
			'total' => $logModel->countRatingsLog()
		);
		
		return $this->responseView('StarRating_ViewAdmin_Log', 'threadrating_log_viewer_log', $viewParams);
	}
	
	//Recount ratings
	public function actionRatingsRecount()
	{
		$logModel = XenForo_Model::create('XenForo_Model_Log');
		
		if ($this->isConfirmedPost()) //Recount thread ratings
		{
			$logModel->recountRatings();
			
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildAdminLink('logs/ratings-log-viewer')
			);
		}
		
		else 
		{
			return $this->responseView('StarRating_ViewAdmin_Recount', 'recount_rebuild_ratings_log', array());
		}
	}
	
	//Delete thread rating
	public function actionRatingDelete()
	{
		$id = $this->_input->filterSingle('id', XenForo_Input::UINT);
		$logModel = XenForo_Model::create('XenForo_Model_Log');
		
		if ($this->isConfirmedPost()) //delete thread rating
		{
			$logModel->deleteRatingEntry($id);
			
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildAdminLink('logs/ratings-log-viewer')
			);			
		}
		else
		{
			$viewParams = array(
				'entry' => $logModel->getRatingLogById($id)
			);
			
			return $this->responseView('StarRating_ViewAdmin_Delete', 'threadrate_log_delete', $viewParams);
		}
	}
	
	//Clear all thread ratings
	public function actionRatingsClear()
	{
		$logModel = XenForo_Model::create('XenForo_Model_Log');
		
		if ($this->isConfirmedPost()) //clear all thread ratings
		{
			$logModel->clearAllRatings();
			
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildAdminLink('logs/ratings-log-viewer')
			);			
		}
		else
		{
			$viewParams = array();
			
			return $this->responseView('StarRating_ViewAdmin_Clear', 'threadrating_log_clear', $viewParams);
		}
	}
}