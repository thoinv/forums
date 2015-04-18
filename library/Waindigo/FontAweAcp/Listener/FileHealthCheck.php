<?php

class Waindigo_FontAweAcp_Listener_FileHealthCheck
{

    public static function fileHealthCheck(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
    {
        $hashes = array_merge($hashes,
            array(
                'library/Waindigo/FontAweAcp/Install/Controller.php' => '7b24621a17ee5953d31fa5dbb4c98205',
                'library/Waindigo/FontAweAcp/Option.php' => 'b21a43e202bfecec6af5f579cd8fd4cb',
                'library/Waindigo/Install.php' => '00d8b93ea3458f18752c348a09a16c50',
                'library/Waindigo/Install/20130809.php' => '43dcb8949f5529ac84261c565bcf1545',
                'library/Waindigo/Deferred.php' => '4649953c0a44928b5e2d4a86e7d3f48a',
                'library/Waindigo/Deferred/20130725.php' => '699fb7a47bd443d53cb14f524321175a',
                'library/Waindigo/Listener/ControllerPreDispatch.php' => 'f51aeb4ef6c4acbce629188b04cd3643',
                'library/Waindigo/Listener/ControllerPreDispatch/20130731.php' => '66b2ddec3356603f7459ef9efa46a670',
                'library/Waindigo/Listener/InitDependencies.php' => '5b755bcc0e553351c40871f4181ce5b0',
                'library/Waindigo/Listener/InitDependencies/20130730.php' => '6da1c81293332515d37b4beda8147f43',
            ));
    } /* END fileHealthCheck */
}