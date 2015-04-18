<?php

class WidgetPortal_Listener_WidgetFrameworkReady
{
    public static function widget_framework_ready(array &$renderers)
    {
        $renderers[] = 'WidgetPortal_WidgetRenderer_PortalFrontendEdit';
        $renderers[] = 'WidgetPortal_WidgetRenderer_Carousel';
        $renderers[] = 'WidgetPortal_WidgetRenderer_RecentThreads';
    }
}