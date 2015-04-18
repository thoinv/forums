<?php
/**
 * Product: sonnb - Live Threads
 * Version: 1.1.14
 * Date: 25th January 2015
 * Author: sonnb
 * Website: www.sonnb.com
 * License: You might not copy or redistribute this addon.
 * Any action to public or redistribute must be authorized from author
 */

class sonnb_LiveThread_Route_Prefix_Threads extends XFCP_sonnb_LiveThread_Route_Prefix_Threads
{
	public function buildLink($originalPrefix, $outputPrefix, $action, $extension, $data, array &$extraParams)
	{
		$nodeId = 0;
		$enableLive = false;

		if (!empty($data['sonnb_live_thread']))
		{
			$enableLive = $data['sonnb_live_thread'];
		}
		if (!empty($data['node_id']))
		{
			$nodeId = $data['node_id'];
		}
		
		$visitor = XenForo_Visitor::getInstance();
		$options = XenForo_Application::get('options');

		$livedNodes = $options->sonnb_LiveThread_EnabledNodes;
		$hasViewPermission =  ($visitor->hasPermission('sonnb_LiveThread', 'sonnb_LiveThread_Use') || $visitor->hasPermission('sonnb_LiveThread', 'sonnb_LiveThread_Manage'));

		if ($action == 'live')
		{
			if (isset($extraParams['page']) &&
				$extraParams['page'] != XenForo_Application::$integerSentinel)
			{
				$extraParams['page'] = intval($extraParams['page']);

				$joiner = '&';
				if (XenForo_Application::getOptions()->useFriendlyUrls)
				{
					$joiner = '?';
				}

				$action .= $joiner."page=$extraParams[page]";
				unset($extraParams['page']);
			}
		}

		if (($action == '' || strtolower($action) == 'index')
				&& ($enableLive || in_array($nodeId, $livedNodes)) && $hasViewPermission)
		{
			$action = 'live';

			if (isset($extraParams['page']) &&
					$extraParams['page'] != XenForo_Application::$integerSentinel)
			{
				$extraParams['page'] = intval($extraParams['page']);

				$joiner = '&';
				if (XenForo_Application::getOptions()->useFriendlyUrls)
				{
					$joiner = '?';
				}

				$action .= $joiner."page=$extraParams[page]";
				unset($extraParams['page']);
			}
		}

		$postHash = '';
		if ($action == 'post-permalink' && !empty($extraParams['post'])
				&& ($enableLive || in_array($nodeId, $livedNodes)) && $hasViewPermission)
		{
			$post = $extraParams['post'];
			unset($extraParams['post']);

			if (!empty($post['post_id']) && isset($post['position']))
			{
				if ($post['position'] > 0)
				{
					$postHash = '#post-' . intval($post['post_id']);
					$extraParams['page'] = floor($post['position'] / XenForo_Application::get('options')->messagesPerPage) + 1;
				}
			}

			$action = 'live';
		}

		return parent::buildLink($originalPrefix, $outputPrefix, $action, $extension, $data, $extraParams).$postHash;
	}
}