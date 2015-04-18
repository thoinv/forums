<?php

class WidgetPortal_Helper_Permission_Permission
{
    const PERMISSIONS_GROUP = 'widgetportal';

    public static function canEditPortalWidgets()
    {
        $allowedPermissions = array();

        if( WidgetPortal_Helper_Permission_Carousel::canEditCarousel() )
        {
            $allowedPermissions[] = 'canEditCarousel';
        }

        return $allowedPermissions;
    }
}