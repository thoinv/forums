<?php

class Waindigo_Leaderboards_Listener_FileHealthCheck
{

    public static function fileHealthCheck(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
    {
        $hashes = array_merge($hashes,
            array(
                'library/Waindigo/Leaderboards/ControllerAdmin/Leaderboard.php' => 'a6cc73feb67a03b0c1d0675e4b0309db',
                'library/Waindigo/Leaderboards/CronEntry/Leaderboard.php' => '6f8c7688bed4714c09866de58fdc5905',
                'library/Waindigo/Leaderboards/DataWriter/Leaderboard.php' => 'c4c4563a96721f87590b756f4647aea0',
                'library/Waindigo/Leaderboards/Deferred/Leaderboard.php' => '4ec16e2ca9bb8ab819f9f9c9aa1a2235',
                'library/Waindigo/Leaderboards/Extend/XenForo/ControllerPublic/Member.php' => '0e3eb027a82dfe9e3be9e3fbf4300ac3',
                'library/Waindigo/Leaderboards/Install/Controller.php' => 'c6a75e6c5a4d505245cceff411d176cc',
                'library/Waindigo/Leaderboards/Listener/LoadClass.php' => 'dd83cc16d0428ef429bdc4a568712f28',
                'library/Waindigo/Leaderboards/Model/Leaderboard.php' => 'd1a31841dacbe196f1c3431025cf4c9a',
                'library/Waindigo/Leaderboards/Route/PrefixAdmin/Leaderboards.php' => '5759a24b9baa19f43cc9f7a2ecdc52a7',
                'library/Waindigo/Install.php' => '00d8b93ea3458f18752c348a09a16c50',
                'library/Waindigo/Install/20141110.php' => '7e9d8f07c2cb4f1a049f3ffb2f99bf43',
                'library/Waindigo/Deferred.php' => '4649953c0a44928b5e2d4a86e7d3f48a',
                'library/Waindigo/Deferred/20130725.php' => '699fb7a47bd443d53cb14f524321175a',
                'library/Waindigo/Listener/ControllerPreDispatch.php' => 'f51aeb4ef6c4acbce629188b04cd3643',
                'library/Waindigo/Listener/ControllerPreDispatch/20141226.php' => '1fcffd0dc3050b0bcb5b6e3b16f53019',
                'library/Waindigo/Listener/InitDependencies.php' => '5b755bcc0e553351c40871f4181ce5b0',
                'library/Waindigo/Listener/InitDependencies/20141206.php' => '3a15abb9c1d9b2d07b5fa3f662d9dbfc',
                'library/Waindigo/Listener/LoadClass.php' => 'bfdfe90f8d484d81b05889037a4fb091',
                'library/Waindigo/Listener/LoadClass/20141202.php' => '088b3f5d9e4d7c103b48b3bc3c451f74',
            ));
    } /* END fileHealthCheck */
}