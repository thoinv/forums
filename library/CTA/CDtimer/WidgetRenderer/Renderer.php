<?php

class CTA_CDtimer_WidgetRenderer_Renderer extends WidgetFramework_WidgetRenderer
{


    public static function widget_framework_ready(array &$renderers)
    {
        $renderers[] = 'CTA_CDtimer_WidgetRenderer_Renderer';
        return $renderers;       
    }

    protected function _getConfiguration()
    {
        return array(
            'name' => 'CTA Countdown Timer Widget',
            'useWrapper' => false,
        );
    }

    protected function _getOptionsTemplate()
    {
        return false;
    }

    protected function _getRenderTemplate(array $widget, $positionCode, array $params)
    {
        return 'cta_countdown_sidebar_wfw';
    }

    protected function _render(array $widget, $positionCode, array $params, XenForo_Template_Abstract $renderTemplateObject)
    {
        return $renderTemplateObject->render();
    }
}