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
class Nobita_Teams_AlertHandler_Post extends XenForo_AlertHandler_Abstract
{
	public function getContentByIds(array $contentIds, $model, $userId, array $viewingUser)
	{
		/* @var $postModel Nobita_Teams_Model_Post */
		$postModel = $model->getModelFromCache('Nobita_Teams_Model_Post');
		
		$posts = $postModel->getPostsByIds($contentIds, array(
			'join' => Nobita_Teams_Model_Post::FETCH_TEAM
		));

		return $posts;
	}

	public function canViewAlert(array $alert, $content, array $viewingUser)
	{
		return XenForo_Model::create('Nobita_Teams_Model_Post')->canViewPostAndContainer(
			$content, $content, $content, $null, $viewingUser
		);
	}



}