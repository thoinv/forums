<?php

class Waindigo_Tabs_Option_TabNames
{

    /**
     * Renders the tab names chooser option as a <select>.
     *
     * @param XenForo_View $view View object
     * @param string $fieldPrefix Prefix for the HTML form field name
     * @param array $preparedOption Prepared option info
     * @param boolean $canEdit True if an "edit" link should appear
     *
     * @return XenForo_Template_Abstract Template object
     */
    public static function renderSelect(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
    {
        return self::_render('option_list_option_select', $view, $fieldPrefix, $preparedOption, $canEdit);
    } /* END renderSelect */

    /**
     * Renders the tab names option.
     *
     * @param string Name of template to render
     * @param XenForo_View $view View object
     * @param string $fieldPrefix Prefix for the HTML form field name
     * @param array $preparedOption Prepared option info
     * @param boolean $canEdit True if an "edit" link should appear
     *
     * @return XenForo_Template_Abstract Template object
     */
    protected static function _render($templateName, XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
    {
        $preparedOption['formatParams'] = XenForo_Model::create('Waindigo_Tabs_Model_TabName')->getTabNamesForOptionsTag(
            $preparedOption['option_value']);

        return XenForo_ViewAdmin_Helper_Option::renderOptionTemplateInternal($templateName, $view, $fieldPrefix,
            $preparedOption, $canEdit);
    } /* END _render */
}