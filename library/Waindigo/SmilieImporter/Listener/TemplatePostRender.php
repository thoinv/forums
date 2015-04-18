<?php

class Waindigo_SmilieImporter_Listener_TemplatePostRender extends Waindigo_Listener_TemplatePostRender
{

    protected function _getTemplates()
    {
        return array(
            'smilie_list'
        );
    } /* END _getTemplates */

    public static function templatePostRender($templateName, &$content, array &$containerData, XenForo_Template_Abstract $template)
    {
        $templatePostRender = new Waindigo_SmilieImporter_Listener_TemplatePostRender($templateName, $content, $containerData, $template);
        list($content, $containerData) = $templatePostRender->run();
    } /* END templatePostRender */

    protected function _smilieList()
    {
        $viewParams = $this->_fetchViewParams();
        $this->_appendTemplate('waindigo_import_export_topctrl_smilieimporter', $viewParams, $this->_containerData['topctrl']);
    } /* END _smilieList */
}