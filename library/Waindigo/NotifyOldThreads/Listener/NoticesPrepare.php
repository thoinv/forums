<?php

class Waindigo_NotifyOldThreads_Listener_NoticesPrepare
{

    public static function noticesPrepare(array &$noticeList, array &$noticeTokens, XenForo_Template_Abstract $template, 
        array $containerData)
    {
        $threads = XenForo_Application::get('options')->waindigo_notifyOldThreads_threadIds;
        $threadIds = array_keys($threads);
        if (!empty($threadIds)) {
            $randomThreadId = $threadIds[array_rand($threadIds)];
            $noticeTokens['{xen:link oldthreads}'] = XenForo_Link::buildPublicLink('threads', 
                array(
                    'thread_id' => $randomThreadId
                ));
            $noticeTokens['{xen:phrase thread_title}'] = $threads[$randomThreadId]['title'];
        } else {
            foreach ($noticeList as $noticeId => $notice) {
                if (strpos($notice['message'], '{xen:link oldthreads}') !== false) {
                    unset($noticeList[$noticeId]);
                }
            }
        }
    } /* END noticesPrepare */
}