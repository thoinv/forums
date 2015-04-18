<?php

/**
 * Listener for controllers.
 * Used to change the layouts of different parts of the site.
 */
class WidgetPortal_Listener_Controller
{
    public static function listen( $class, array &$extend )
    {
        switch ( $class )
        {
            case 'XenForo_ControllerPublic_Thread':
                $extend[] = 'WidgetPortal_ControllerPublic_Thread';
                break;
            /* TODO add back when layouts are controlled for Forums as well.
			case 'XenForo_ControllerPublic_Forum':
				$extend[] = 'WidgetPortal_ControllerPublic_Forum';
				break;
                        */
        }
    }
}