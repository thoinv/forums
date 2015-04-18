<?php

class Waindigo_Leaderboards_CronEntry_Leaderboard
{

    public static function rebuildLeaderboards()
    {
        XenForo_Application::defer('Waindigo_Leaderboards_Deferred_Leaderboard', array('rebuildOnly' => true), 'waindigoLeaderboards');
    } /* END rebuildLeaderboards */
}