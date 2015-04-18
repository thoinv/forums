<?php

/**
 * Provides the forum list for the widget portal options panel.
 */
class WidgetPortal_Option_ForumOptions extends XenForo_Option_NodeChooser
{
    /**
     * @static
     * @param XenForo_View $view
     * @param $fieldPrefix
     * @param array $preparedOption
     * @param $canEdit
     * @return XenForo_Template_Abstract
     */
    public static function renderForums( XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit )
    {
        $preparedOption['nodeFilter'] = 'Forum';
        return self::_render( 'widgetportal_option_list_option_multi', $view, $fieldPrefix, $preparedOption, $canEdit );
    }
}