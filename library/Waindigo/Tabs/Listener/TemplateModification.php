<?php

class Waindigo_Tabs_Listener_TemplateModification extends Waindigo_Listener_TemplateModification
{

    public static function resourceViewTabs(array $matches)
    {
        $modification = new Waindigo_Tabs_Listener_TemplateModification($matches[0]);

        return $modification->_resourceViewTabs();
    } /* END resourceViewTabs */

    protected function _resourceViewTabs()
    {
        $viewParams = $this->_fetchViewParams();
        if ($viewParams['tabContents']) {
            $append = false;
            $prepend = '';
            foreach ($viewParams['tabContents'] as $tab) {
                if (empty($tab['template'])) {
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

        return $this->_contents;
    } /* END _resourceViewTabs */
}