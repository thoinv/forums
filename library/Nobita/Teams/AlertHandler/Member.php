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
class Nobita_Teams_AlertHandler_Member extends XenForo_AlertHandler_Abstract
{
	public function getContentByIds(array $contentIds, $model, $userId, array $viewingUser)
	{
		/* @var $teamModel Nobita_Teams_Model_Team */
		$teamModel = $model->getModelFromCache('Nobita_Teams_Model_Team');
		
		return $teamModel->getTeamsByIds($contentIds, array(
			'join' => Nobita_Teams_Model_Team::FETCH_PROFILE 
					| Nobita_Teams_Model_Team::FETCH_PRIVACY
					| Nobita_Teams_Model_Team::FETCH_CATEGORY
		));
	}
	
	public function canViewAlert(array $alert, $content, array $viewingUser)
	{
		return XenForo_Model::create('Nobita_Teams_Model_Team')->canViewTeamAndContainer(
			$content, $content, $null
		);
	}



}