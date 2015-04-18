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
class Nobita_Teams_AlertHandler_Event extends XenForo_AlertHandler_Abstract
{
	public function getContentByIds(array $contentIds, $model, $userId, array $viewingUser)
	{
		$eventModel = $model->getModelFromCache('Nobita_Teams_Model_Event');
		$events = $eventModel->getEventsByIds($contentIds, array(
			'join' => Nobita_Teams_Model_Event::FETCH_TEAM
					 | Nobita_Teams_Model_Event::FETCH_USER
		));

		foreach ($events as &$event)
		{
			$event = $eventModel->prepareEvent($event, $event, $event, $viewingUser);
		}
		return $events;
	}

	public function canViewAlert(array $alert, $content, array $viewingUser)
	{
		return XenForo_Model::create('Nobita_Teams_Model_Event')->canViewEventAndContainer(
			$content, $content, $content, $null, $viewingUser
		);
	}


}