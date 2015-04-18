<?php
/*!
 * Product version 1.0.4 
 * Top Thread Starters 
 * @Author Eaglebunker 
 * Copyright (c) 2013 - All rights reserved.
*/
class TopThreadStarters_ControllerPublic_TopThreadStarters extends XFCP_TopThreadStarters_ControllerPublic_TopThreadStarters 
{
	public function actionIndex()
	{
		$response = parent::actionIndex();
		$TopThreadStarters = TopThreadStarters_Model_TopThreadStarters::TopThreadStartersArray();
		$response->params['TopThreadStarters'] = $TopThreadStarters;
		return $response;
	}
}