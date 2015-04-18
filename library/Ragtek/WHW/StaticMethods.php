<?php

class Ragtek_WHW_StaticMethods
{
    public static function templateHooks($name, &$contents, array $params, XenForo_Template_Abstract $template)
    {
        if ($name == 'page_container_sidebar') {
            $search = '<!-- end block: sidebar_online_users -->';
            if (strpos($contents, $search))
            {
                $model =     XenForo_Model::create('Ragtek_WHW_Model_OnlineUser');
                $todayUsers = $model->getTodaysUsers();
                $addContent = $template->create($model->getWidgetTemplate(), array('todayOnlineUsers' => $todayUsers));
                $contents = str_replace($search, $search . $addContent, $contents);
            }
        }
    }

    public static function fileHashes(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
    {
        $fileHashes = Ragtek_WHW_Hashes::getHashes();
        $hashes += $fileHashes;
    }
}