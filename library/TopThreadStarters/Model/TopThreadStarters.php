<?php
/*!
 * Product version 1.0.4 
 * Top Thread Starters 
 * @Author Eaglebunker
 * Copyright (c) 2013 - All rights reserved.
*/
class TopThreadStarters_Model_TopThreadStarters extends Xenforo_Model_User
{
	public static function TopThreadStartersArray() 
	{
		$db = XenForo_Application::get('db');
		$userModel = new Xenforo_Model_User;
		$TopThreadStarters = array();
		$options = XenForo_Application::get('options');
		$limitcount = $options->TopthreadstartersCount;
		$userexcluded = ""; 
		$usergroupexcluded = "";
		$userforumexcluded = "";
		$useravatarexcluded = "";

		if (XenForo_Application::get('options')->TopthreadstarterExcluded)
		{
			$userexcluded  = XenForo_Application::get('options')->TopthreadstarterExcluded;
			$userexcluded  = "AND user.user_id NOT IN ($userexcluded)";
		}

		if (XenForo_Application::get('options')->TopthreadstarterExcludedgroups)
		{
			$usergroupexcluded  = XenForo_Application::get('options')->TopthreadstarterExcludedgroups;
			$usergroupexcluded  = "AND user.user_group_id NOT IN ($usergroupexcluded)";
		}

		if (XenForo_Application::get('options')->TopthreadstarterExcludedforums)
		{
			$userforumexcluded  = XenForo_Application::get('options')->TopthreadstarterExcludedforums;
			$userforumexcluded  = "AND thread.node_id NOT IN ($userforumexcluded)";
		}

		if (XenForo_Application::get('options')->TopthreadstarterExcludedavatars)
		{
			$useravatarexcluded  = XenForo_Application::get('options')->TopthreadstarterExcludedavatars;
			$useravatarexcluded  = "AND user.avatar_date NOT IN ($useravatarexcluded)";
		}

		$TtsArray = $db->fetchAll($db->limit("
			SELECT COUNT(thread.post_date) AS discussion_count, thread.user_id, 
			thread.username, forum.node_id AS node_id, user.username, user.user_id 
			FROM xf_thread AS thread 
			LEFT JOIN xf_user AS user ON (user.user_id = thread.user_id)
			LEFT JOIN xf_node AS forum ON (forum.node_id = thread.node_id)
			WHERE NOT ISNULL(thread.thread_id) 
			$userexcluded 
			$usergroupexcluded 
			$userforumexcluded 
			$useravatarexcluded 
			AND user.is_banned = 0 
			GROUP BY thread.user_id 
			ORDER BY discussion_count DESC", 
		$limitcount));

		if(sizeof($TtsArray) != 0) 
		{
			foreach($TtsArray as $TtsX) 
			{
				$TtsIds[] = $TtsX['user_id'];
			}
			$userObjs = $userModel->getUsersByIds($TtsIds,array());
			foreach($TtsArray as $Tts) 
			{
				if ($Tts['user_id']) 
				{
					$hrefx = XenForo_Link::buildPublicLink('members', $Tts);
				}
				$TopThreadStarters[] = array("user" => $userObjs[$Tts['user_id']], "username" => $Tts['username'], "discussion_count" => $Tts['discussion_count'], "href" => $hrefx);
			}
		}
		if(count($TopThreadStarters)) 
		{
			return $TopThreadStarters;
		}
	}
}