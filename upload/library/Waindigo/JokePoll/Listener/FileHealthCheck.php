<?php

class Waindigo_JokePoll_Listener_FileHealthCheck
{

    public static function fileHealthCheck(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
    {
        $hashes = array_merge($hashes,
            array(
                'library/Waindigo/JokePoll/DataWriter/Helper/JokePoll.php' => '33c975c87b825e2ffea4caee8a4d0c31',
                'library/Waindigo/JokePoll/Extend/XenForo/ControllerPublic/Forum.php' => '2b7d1bde4592ef09aaa557ad513db6db',
                'library/Waindigo/JokePoll/Extend/XenForo/ControllerPublic/Thread.php' => '4ffac577e8d07c6b16e4fe91195cb4f0',
                'library/Waindigo/JokePoll/Extend/XenForo/DataWriter/Discussion/Thread.php' => '54196e82b7d762dd0efc0e224d25cb01',
                'library/Waindigo/JokePoll/Extend/XenForo/DataWriter/Poll.php' => 'df46a563e8b3804c7d46d747b74ed6eb',
                'library/Waindigo/JokePoll/Extend/XenForo/Model/Forum.php' => '505ca66a04ddd39a0c69de008398c553',
                'library/Waindigo/JokePoll/Extend/XenForo/Model/Poll.php' => 'e6d5d0b48623007d8e76ad7c14708793',
                'library/Waindigo/JokePoll/Install/Controller.php' => 'ff21a6ce9714539fafb0f7b18b93f189',
                'library/Waindigo/JokePoll/Listener/LoadClass.php' => 'd05965b765cdd2f5d54b7d183c38eb57',
                'library/Waindigo/JokePoll/Listener/TemplateHook.php' => 'b6894c1c073e24e96e6fb43107216bf3',
                'library/Waindigo/JokePoll/Listener/TemplatePostRender.php' => 'f98cae040f0a8092aa90a0334d0333ec',
                'library/Waindigo/Install.php' => '00d8b93ea3458f18752c348a09a16c50',
                'library/Waindigo/Install/20140226.php' => 'f841e05a670aa3ade0dc9aa01e7a0a15',
                'library/Waindigo/Deferred.php' => '4649953c0a44928b5e2d4a86e7d3f48a',
                'library/Waindigo/Deferred/20130725.php' => '699fb7a47bd443d53cb14f524321175a',
                'library/Waindigo/Listener/ControllerPreDispatch.php' => 'f51aeb4ef6c4acbce629188b04cd3643',
                'library/Waindigo/Listener/ControllerPreDispatch/20140326.php' => 'aeb6464a3fbb3179dea259683b4ec1a1',
                'library/Waindigo/Listener/InitDependencies.php' => '5b755bcc0e553351c40871f4181ce5b0',
                'library/Waindigo/Listener/InitDependencies/20140401.php' => 'ad2422e10f1d880f569601c785c0b8d2',
                'library/Waindigo/Listener/LoadClass.php' => '1f9470e8129c18ec6ffea38a1a0b427e',
                'library/Waindigo/Listener/LoadClass/20131003.php' => 'e3cd73a6c98c045050a307426997d806',
                'library/Waindigo/Listener/Template.php' => 'b52cba9c298d9702b4536146d3ac4312',
                'library/Waindigo/Listener/Template/20140101.php' => '2522395ad7d95866de2b87576a60e9f6',
                'library/Waindigo/Listener/TemplateHook.php' => '37c6a882bfb9d790801c94051fe3eb0d',
                'library/Waindigo/Listener/TemplateHook/20130522.php' => '050322445ef811663bf40755d772947f',
                'library/Waindigo/Listener/TemplatePostRender.php' => '73d70bb432c859375b1b8c05ffd8d027',
                'library/Waindigo/Listener/TemplatePostRender/20130522.php' => '6309fdcf4496771bb7050ad03d91593e',
            ));
    } /* END fileHealthCheck */
}