<?php

class Waindigo_KeywordReplace_Listener_FileHealthCheck
{

    public static function fileHealthCheck(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
    {
        $hashes = array_merge($hashes,
            array(
                'library/Waindigo/KeywordReplace/Extend/XenForo/BbCode/Formatter/Base.php' => '63bca02ec51a3497fff84c3a06d77060',
                'library/Waindigo/KeywordReplace/Helper/String.php' => '84d6226ba4e7a186e77fae0eb2b375e9',
                'library/Waindigo/KeywordReplace/Install/Controller.php' => 'ebc7c3752dc9a6b0e83d66d083879127',
                'library/Waindigo/KeywordReplace/Listener/LoadClass.php' => 'dc723182526e8025146b7b4d26b6493a',
                'library/Waindigo/KeywordReplace/Option/KeywordReplace.php' => 'e6776e5be390fd58e132ec976dc5f0b0',
                'library/Waindigo/KeywordReplace/Option/UserGroupChooser.php' => 'd6e3cd8074c12cffdc801acee2795b35',
                'library/Waindigo/Install.php' => '00d8b93ea3458f18752c348a09a16c50',
                'library/Waindigo/Install/20130903.php' => '47a1ba4116a88ef6aa847285fd494803',
                'library/Waindigo/Deferred.php' => '4649953c0a44928b5e2d4a86e7d3f48a',
                'library/Waindigo/Deferred/20130725.php' => '699fb7a47bd443d53cb14f524321175a',
                'library/Waindigo/Listener/ControllerPreDispatch.php' => 'f51aeb4ef6c4acbce629188b04cd3643',
                'library/Waindigo/Listener/ControllerPreDispatch/20131003.php' => '7ad68f6ed984c7123cacf75e1093ff04',
                'library/Waindigo/Listener/InitDependencies.php' => '5b755bcc0e553351c40871f4181ce5b0',
                'library/Waindigo/Listener/InitDependencies/20131003.php' => '99bb42214e1e5f4836aff99ab334fb4b',
                'library/Waindigo/Listener/LoadClass.php' => '1f9470e8129c18ec6ffea38a1a0b427e',
                'library/Waindigo/Listener/LoadClass/20131003.php' => 'e3cd73a6c98c045050a307426997d806',
            ));
    } /* END fileHealthCheck */
}