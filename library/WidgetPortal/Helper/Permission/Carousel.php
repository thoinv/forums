<?php

/**
 * Provides static classes that check if a permission is available to the current user.
 */
class WidgetPortal_Helper_Permission_Carousel
{
    const PERMISSIONS_GROUP = 'widgetportal';

    public static function canEditCarousel()
    {
        $visitor = XenForo_Visitor::getInstance();

        // There's a 25 character limit so wp_ will have to do.
        return $visitor->hasPermission(
            self::PERMISSIONS_GROUP,
            'wp_canEditCarousel'
        );
    }


}