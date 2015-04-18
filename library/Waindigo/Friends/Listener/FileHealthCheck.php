<?php

class Waindigo_Friends_Listener_FileHealthCheck
{

    public static function fileHealthCheck(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
    {
        $hashes = array_merge($hashes,
            array(
                'library/Waindigo/Friends/AlertHandler/Friend.php' => 'd53966d2ee7e9b292ca389c2e48084d1',
                'library/Waindigo/Friends/DataWriter/Friend.php' => 'ecf6c1a8f911fa16153c0165bc6c464d',
                'library/Waindigo/Friends/Deferred/MutualFriend.php' => '436e7677be9100a85ff286011ca2ecd8',
                'library/Waindigo/Friends/Extend/XenForo/ControllerPublic/Member.php' => '7134251d399cd561b6181454852422e7',
                'library/Waindigo/Friends/Extend/XenForo/DataWriter/User.php' => 'd50510924fde731d75870f74f968c6af',
                'library/Waindigo/Friends/Extend/XenForo/Deferred/User.php' => '69b874b97a3eaf3ff0704e1d0b0c3f75',
                'library/Waindigo/Friends/Extend/XenForo/Model/User.php' => '546f3ea7165dd645cfb7951178ed76d9',
                'library/Waindigo/Friends/Install/Controller.php' => 'c5192882c3a4e1dd62f2f23d52b61fea',
                'library/Waindigo/Friends/Listener/LoadClass.php' => '64ac777f621f8b0814a390ec0d3e98b7',
                'library/Waindigo/Friends/Listener/TemplateHook.php' => 'cb7c7468d2d8301fe04b0a63baf895d3',
                'library/Waindigo/Friends/Listener/TemplatePostRender.php' => '4894f51601c9de82273f5485ac503349',
                'library/Waindigo/Install.php' => '00d8b93ea3458f18752c348a09a16c50',
                'library/Waindigo/Install/20150107.php' => '73e462d5de41666aa437bad306d8d719',
                'library/Waindigo/Deferred.php' => '4649953c0a44928b5e2d4a86e7d3f48a',
                'library/Waindigo/Deferred/20150106.php' => 'c886ad117aa0d601292bc1fa0b156544',
                'library/Waindigo/Listener/ControllerPreDispatch.php' => 'f51aeb4ef6c4acbce629188b04cd3643',
                'library/Waindigo/Listener/ControllerPreDispatch/20150106.php' => '394622904ac4a761ed35fa1a9d409d41',
                'library/Waindigo/Listener/InitDependencies.php' => '5b755bcc0e553351c40871f4181ce5b0',
                'library/Waindigo/Listener/InitDependencies/20150106.php' => 'f2f3698c99db0d8e05a9b6228708a021',
                'library/Waindigo/Listener/LoadClass.php' => 'bfdfe90f8d484d81b05889037a4fb091',
                'library/Waindigo/Listener/LoadClass/20150106.php' => 'a962cf203ee7efe8247366e5de3862a0',
                'library/Waindigo/Listener/Template.php' => 'b52cba9c298d9702b4536146d3ac4312',
                'library/Waindigo/Listener/Template/20150106.php' => '2bbe04f8b858a9dd2834a1ea6558d7b7',
                'library/Waindigo/Listener/TemplateHook.php' => '37c6a882bfb9d790801c94051fe3eb0d',
                'library/Waindigo/Listener/TemplateHook/20150106.php' => '49397da485e59bb06089c84ba60db5a7',
                'library/Waindigo/Listener/TemplatePostRender.php' => '73d70bb432c859375b1b8c05ffd8d027',
                'library/Waindigo/Listener/TemplatePostRender/20150106.php' => '41fc17661980130f039d011cc419fc9f',
            ));
    }
}