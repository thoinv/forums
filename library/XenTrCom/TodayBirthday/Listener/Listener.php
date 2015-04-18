<?php
class XenTrCom_TodayBirthday_Listener_Listener
{
    public static function listen($class, array &$extend)
    {
        if ($class == 'XenForo_ControllerPublic_Index')
        {
            $extend[] = 'XenTrCom_TodayBirthday_Controller_Public';
        }
    }
}

?>