<?php

class FindPostsInThread_Listener
{
    public static function templateHook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
    {
        if ($hookName == 'thread_view_tools_links')
        {
            $contents .= $template->create('find_posts_in_thread_view', $template->getParams());
        }
    }
}