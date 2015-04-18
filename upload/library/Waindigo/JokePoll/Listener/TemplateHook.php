<?php

class Waindigo_JokePoll_Listener_TemplateHook extends Waindigo_Listener_TemplateHook
{

    protected function _getHooks()
    {
        return array(
            'thread_create'
        );
    } /* END _getHooks */

    public static function templateHook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
    {
        $templateHook = new Waindigo_JokePoll_Listener_TemplateHook($hookName, $contents, $hookParams, $template);
        $contents = $templateHook->run();
    } /* END templateHook */

    protected function _threadCreate()
    {
        $pattern = '#<li><label for="ctrl_poll_public_votes">.*</li>#Us';
        $this->_appendTemplateAtPattern($pattern, 'waindigo_joke_poll_checkboxes_jokepoll');
    } /* END _threadCreate */
}