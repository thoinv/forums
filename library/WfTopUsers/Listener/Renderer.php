<?php
class WfTopUsers_Listener_Renderer
{
    public static function widget_framework_ready(array &$renderers)
    {
        $renderers[] = 'WfTopUsers_WidgetRenderer';
    }
}