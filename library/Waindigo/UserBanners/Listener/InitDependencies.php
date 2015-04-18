<?php

class Waindigo_UserBanners_Listener_InitDependencies extends Waindigo_Listener_InitDependencies
{


    public static function initDependencies(XenForo_Dependencies_Abstract $dependencies, array $data)
    {
        $initDependencies = new Waindigo_UserBanners_Listener_InitDependencies($dependencies, $data);
        $initDependencies->run();
    } /* END initDependencies */
}