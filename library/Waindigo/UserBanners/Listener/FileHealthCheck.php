<?php

class Waindigo_UserBanners_Listener_FileHealthCheck
{

    public static function fileHealthCheck(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
    {
        $hashes = array_merge($hashes,
            array(
                'library/Waindigo/UserBanners/Extend/XenForo/ControllerAdmin/UserGroup.php' => 'b6abdc731618c9856dc72abf294866b9',
                'library/Waindigo/UserBanners/Extend/XenForo/DataWriter/UserGroup.php' => '01081161c09a7739359ffad72f7864fd',
                'library/Waindigo/UserBanners/Extend/XenForo/Model/UserGroup.php' => '033597cc01dd1db40d82692b1024da5d',
                'library/Waindigo/UserBanners/Install/Controller.php' => '55a0141fd67d67dcc4c9fead9842e717',
                'library/Waindigo/UserBanners/Listener/InitDependencies.php' => 'ed0dd8c770d0b60d36db5429b817a62f',
                'library/Waindigo/UserBanners/Listener/LoadClass.php' => 'd023b212fecad77e1bc8075e452defcf',
                'library/Waindigo/UserBanners/Template/Helper/Core.php' => '81dfaf356601a3aa4c6177e21a435094',
                'library/Waindigo/Install.php' => '00d8b93ea3458f18752c348a09a16c50',
                'library/Waindigo/Install/20140226.php' => 'f841e05a670aa3ade0dc9aa01e7a0a15',
                'library/Waindigo/Deferred.php' => '4649953c0a44928b5e2d4a86e7d3f48a',
                'library/Waindigo/Deferred/20130725.php' => '699fb7a47bd443d53cb14f524321175a',
                'library/Waindigo/Listener/ControllerPreDispatch.php' => 'f51aeb4ef6c4acbce629188b04cd3643',
                'library/Waindigo/Listener/ControllerPreDispatch/20140326.php' => 'aeb6464a3fbb3179dea259683b4ec1a1',
                'library/Waindigo/Listener/InitDependencies.php' => '5b755bcc0e553351c40871f4181ce5b0',
                'library/Waindigo/Listener/InitDependencies/20140401.php' => 'ad2422e10f1d880f569601c785c0b8d2',
                'library/Waindigo/Listener/LoadClass.php' => 'bfdfe90f8d484d81b05889037a4fb091',
                'library/Waindigo/Listener/LoadClass/20131003.php' => 'e3cd73a6c98c045050a307426997d806',
            ));
    } /* END fileHealthCheck */
}