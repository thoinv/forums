<?php

class Waindigo_JokePoll_Listener_TemplatePostRender extends Waindigo_Listener_TemplatePostRender
{

    protected function _getTemplates()
    {
        return array(
            'thread_poll_edit'
        );
    } /* END _getTemplates */

    public static function templatePostRender($templateName, &$content, array &$containerData,
        XenForo_Template_Abstract $template)
    {
        $templatePostRender = new Waindigo_JokePoll_Listener_TemplatePostRender($templateName, $content, $containerData,
            $template);
        list($content, $containerData) = $templatePostRender->run();
    } /* END templatePostRender */

    protected function _threadPollEdit()
    {
        $pattern = '#<li><label for="(ctrl_poll_public_votes|ctrl_multiple)">.*</li>#Us';
        if (!$this->_appendTemplateAtPattern($pattern, 'waindigo_joke_poll_checkboxes_jokepoll')) {
            $pattern = '#<dl class="ctrlUnit">\s*<dt></dt>\s*<dd>\s*<ul>#s';
            if (!$this->_appendTemplateAtPattern($pattern, 'waindigo_joke_poll_checkboxes_jokepoll')) {
                $codeSnippet = '<dl class="ctrlUnit submitUnit">';
                $this->_appendTemplateBeforeCodeSnippet($codeSnippet, 'waindigo_joke_poll_controlunit_jokepoll');
            }
        }
    } /* END _threadPollEdit */
}