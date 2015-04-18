<?php

class Waindigo_Tabs_Listener_TemplatePostRender extends Waindigo_Listener_TemplatePostRender
{

    protected function _getTemplates()
    {
        return array(
            'resource_add',
            'thread_edit',
            'thread_view'
        );
    } /* END _getTemplates */

    public static function templatePostRender($templateName, &$content, array &$containerData,
        XenForo_Template_Abstract $template)
    {
        $templatePostRender = new Waindigo_Tabs_Listener_TemplatePostRender($templateName, $content, $containerData,
            $template);
        list ($content, $containerData) = $templatePostRender->run();
    } /* END templatePostRender */

    protected function _resourceAdd()
    {
        $pattern = '#<dl class="ctrlUnit submitUnit">#';
        $this->_prependTemplateAtPattern($pattern, 'waindigo_edit_tab_name_tabs');
    } /* END _resourceAdd */

    protected function _threadEdit()
    {
        $pattern = '#<dl class="ctrlUnit submitUnit">#';
        $this->_prependTemplateAtPattern($pattern, 'waindigo_edit_tab_name_tabs');
    } /* END _threadEdit */

    protected function _threadView()
    {
        $viewParams = $this->_fetchViewParams();
        if (empty($viewParams['resources'])) {
            $this->_prependTemplate('waindigo_tabs_tabs');
        }
    } /* END _threadView */
}