<?php

class Waindigo_Tabs_Listener_TemplateHook extends Waindigo_Listener_TemplateHook
{

    protected function _getHooks()
    {
        return array(
            'resource_view_tabs'
        );
    } /* END _getHooks */

    public static function templateHook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
    {
        $templateHook = new Waindigo_Tabs_Listener_TemplateHook($hookName, $contents, $hookParams, $template);
        $contents = $templateHook->run();
    } /* END templateHook */

    protected function _resourceViewTabs()
    {
        $viewParams = $this->_fetchViewParams();
        if ($viewParams['tabContents']) {
            $append = false;
            $prepend = '';
            foreach ($viewParams['tabContents'] as $tab) {
                if (!empty($tab['selected'])) {
                    $pattern = '#(<li class="resourceTabDescription[^"]*">\s*<a[^>]*>).*(</a>\s*</li>)#Us';
                    $replacement = '${1}' . $tab['title'] . '${2}';
                    $this->_patternReplace($pattern, $replacement);
                    $append = true;
                } elseif ($append) {
                    $this->_append($tab['template']);
                } else {
                    $prepend .= $tab['template'];
                }
            }
            $this->_prepend($prepend);
        }
    } /* END _resourceViewTabs */
}