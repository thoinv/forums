<?php

class WfTopUsers_Listener_LoadClassModel
{
        public static function loadClassListener($class, &$extend)
        {

                if ($class == 'XenForo_Model_User')
                {
                        $extend[] = 'WfTopUsers_Model_User';
                }

        }

}