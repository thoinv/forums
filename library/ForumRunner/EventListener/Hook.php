<?php
/*
 * Forum Runner
 *
 * Copyright (c) 2010-2011 to End of Time Studios, LLC
 *
 * This file may not be redistributed in whole or significant part.
 *
 * http://www.forumrunner.com
 */

class ForumRunner_EventListener_Hook
{
    public static function templateHook ($name, &$contents, $params, XenForo_Template_Abstract $template)
    {
	if ($name == 'page_container_head') {
	    if (XenForo_Application::get('options')->forumrunnerRedirect) {
		$url = XenForo_Application::get('options')->boardUrl . '/forumrunner/detect.js';
		$contents .= '<script type="text/javascript" src="' . $url . '"></script>';
	    }
	}
    }
}
