<?php
/*======================================================================*\
|| #################################################################### ||
|| # Most Online User  1.2
|| # Build: 8
|| # ---------------------------------------------------------------- # ||
|| #################################################################### ||
\*======================================================================*/


    class Ragtek_MOU_StaticMethods
    {

        public static function extendController($class, array &$extend){
            if ($class =='XenForo_ControllerPublic_Misc'){
                $extend[] = 'Ragtek_MOU_Extend_ControllerMisc';
            }
        }

        public static function listener(array &$params, XenForo_Dependencies_Abstract $dependencies)
        {

            /** @var $model Ragtek_MOU_Model_OnlineUsers */
            $model = XenForo_Model::create('Ragtek_MOU_Model_OnlineUsers');

            list($users, $time) = $model->checkAndUpdate();

            $params['ragtek_mostOnlineUsersCounter'] = $users;
            $params['ragtek_mostOnlineUsersTime'] = $time;
        }

        public static function templateCache($templateName, array &$params, XenForo_Template_Abstract $template)
        {
            $template->preloadTemplate('ragtek_sidebarBlock_mostOnlineUsers');
        }

        /**
         * // TODO method descr.
         * @static
         * @param  $name
         * @param  $contents
         * @param  $params
         * @param XenForo_Template_Abstract $template
         * @return void
         */
        public static function templateHooks($name, &$contents, array $params, XenForo_Template_Abstract $template)
        {
            if ($name == 'page_container_sidebar') {

                $search = '<!-- slot: forum_stats_extra -->';

                $params = $template->getParams();
                $most = $template->create('ragtek_sidebarBlock_mostOnlineUsers', $params)->render();
                $replace = $search . $most;
                $contents = preg_replace('#' . $search . '#', $replace, $contents, 1);
            }
        }
    }