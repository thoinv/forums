<?php

class Waindigo_SmilieImporter_Listener_FileHealthCheck
{

    public static function fileHealthCheck(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
    {
        $hashes = array_merge($hashes,
            array(
                'library/Waindigo/SmilieImporter/Extend/XenForo/ControllerAdmin/Smilie.php' => '8028473186e485a09c02025808a644a7',
                'library/Waindigo/SmilieImporter/Extend/XenForo/Model/Smilie.php' => 'af79f083f87d2acfc0dc2644d8582fa9',
                'library/Waindigo/SmilieImporter/Install/Controller.php' => '9d7b3571714384aeeca26a19b033f926',
                'library/Waindigo/SmilieImporter/Listener/LoadClass.php' => 'de1726a0c759b0ddd948cb1163d96fde',
                'library/Waindigo/SmilieImporter/Listener/TemplatePostRender.php' => 'e70f3fdb7561f7f74029f0194f2c28c8',
                'library/Waindigo/SmilieImporter/ViewAdmin/Smilie/Export.php' => 'b5714bb9faa39adf79abbab8a2bd0ca4',
                'library/Waindigo/Install.php' => '00d8b93ea3458f18752c348a09a16c50',
                'library/Waindigo/Install/20140131.php' => '48656e0767accc4a528b37fb484e31f5',
                'library/Waindigo/Deferred.php' => '4649953c0a44928b5e2d4a86e7d3f48a',
                'library/Waindigo/Deferred/20130725.php' => '699fb7a47bd443d53cb14f524321175a',
                'library/Waindigo/Listener/ControllerPreDispatch.php' => 'f51aeb4ef6c4acbce629188b04cd3643',
                'library/Waindigo/Listener/ControllerPreDispatch/20131003.php' => '7ad68f6ed984c7123cacf75e1093ff04',
                'library/Waindigo/Listener/InitDependencies.php' => '5b755bcc0e553351c40871f4181ce5b0',
                'library/Waindigo/Listener/InitDependencies/20140101.php' => 'b7745aba37ee138e7d6af5806599f21a',
                'library/Waindigo/Listener/LoadClass.php' => 'bfdfe90f8d484d81b05889037a4fb091',
                'library/Waindigo/Listener/LoadClass/20131003.php' => 'e3cd73a6c98c045050a307426997d806',
                'library/Waindigo/Listener/Template.php' => 'b52cba9c298d9702b4536146d3ac4312',
                'library/Waindigo/Listener/Template/20140101.php' => '2522395ad7d95866de2b87576a60e9f6',
                'library/Waindigo/Listener/TemplatePostRender.php' => '73d70bb432c859375b1b8c05ffd8d027',
                'library/Waindigo/Listener/TemplatePostRender/20130522.php' => '6309fdcf4496771bb7050ad03d91593e',
            ));
    } /* END fileHealthCheck */
}