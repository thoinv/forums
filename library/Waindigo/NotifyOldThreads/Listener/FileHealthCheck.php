<?php

class Waindigo_NotifyOldThreads_Listener_FileHealthCheck
{

    public static function fileHealthCheck(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
    {
        $hashes = array_merge($hashes,
            array(
                'library/Waindigo/NotifyOldThreads/CronEntry/NotifyOldThreads.php' => '757b6eddc603bb5c186a7b941702f1df',
                'library/Waindigo/NotifyOldThreads/Extend/XenForo/Model/Thread.php' => '31e1fd9877581134cca88bb6b7cb5cf8',
                'library/Waindigo/NotifyOldThreads/Install/Controller.php' => 'f4fb55233bbe1dda3ac9ee3b7457edf4',
                'library/Waindigo/NotifyOldThreads/Listener/LoadClass.php' => '44d31e3e1f8d70ea42f7f4cf89897602',
                'library/Waindigo/NotifyOldThreads/Listener/NoticesPrepare.php' => 'dfb93c72f2301ae543d967003cba1632',
                'library/Waindigo/NotifyOldThreads/Option/NodeChooser.php' => '89fb722a8a3cb7f6851db444fb52d3b5',
                'library/Waindigo/NotifyOldThreads/Option/NotifyOldThreads.php' => '3b3d5f4f198ed31a1596dd11a0ebc067',
                'library/Waindigo/Install.php' => '00d8b93ea3458f18752c348a09a16c50',
                'library/Waindigo/Install/20141009.php' => '85f3eabd01238c202463afa053222538',
                'library/Waindigo/Deferred.php' => '4649953c0a44928b5e2d4a86e7d3f48a',
                'library/Waindigo/Deferred/20130725.php' => '699fb7a47bd443d53cb14f524321175a',
                'library/Waindigo/Listener/ControllerPreDispatch.php' => 'f51aeb4ef6c4acbce629188b04cd3643',
                'library/Waindigo/Listener/ControllerPreDispatch/20141011.php' => 'eaa9bcc75eb3ef97e8cfddf7ceaf1fc9',
                'library/Waindigo/Listener/InitDependencies.php' => '5b755bcc0e553351c40871f4181ce5b0',
                'library/Waindigo/Listener/InitDependencies/20140722.php' => 'd61ea11cb14211ae3ca6a58302f61b74',
                'library/Waindigo/Listener/LoadClass.php' => 'bfdfe90f8d484d81b05889037a4fb091',
                'library/Waindigo/Listener/LoadClass/20140906.php' => 'dec6e44f3602973dd10819b6f1b7b71d',
            ));
    } /* END fileHealthCheck */
}