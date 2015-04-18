<?php

/* Product: sonnb - Prevent Double Post
 * Author: sonnb
 * Version: 1.0.1
 * Released: 19th Jul 2012
 * Website: www.sonnb.com - www.underworldvn.com
 */
class sonnbPreventDoublePost_Listener
{

    public static function load_class ( $class, array &$extend )
    {
        switch ($class)
        {
            case 'XenForo_Model_Post':
                $extend[] = 'sonnbPreventDoublePost_Model_Post';
                break;
            case 'XenForo_Model_Thread':
                $extend[] = 'sonnbPreventDoublePost_Model_Thread';
                break;
            case 'XenForo_ControllerPublic_Thread':
                $extend[] = 'sonnbPreventDoublePost_ControllerPublic_Thread';
                break;
            case 'XenForo_ControllerPublic_Forum':
                $extend[] = 'sonnbPreventDoublePost_ControllerPublic_Forum';
                break;
        }
    }

}

?>
