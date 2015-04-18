<?php

class Waindigo_Friends_Listener_TemplateHook extends Waindigo_Listener_TemplateHook
{
    protected function _getHooks()
    {
        return array(
            'member_view_sidebar_middle1',
            'member_view_sidebar_middle2',
        );
    }

    public static function templateHook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
    {
        $templateHook = new Waindigo_Friends_Listener_TemplateHook($hookName, $contents, $hookParams, $template);
        $contents = $templateHook->run();
    }

    protected function _memberViewSidebarMiddle1()
    {
        $this->_append('<!-- waindigo_friends_follow_blocks_start -->');
    } /* END _memberViewSidebarMiddle1 */
    
    protected function _memberViewSidebarMiddle2()
    {
    	$this->_append('<!-- waindigo_friends_follow_blocks_end -->');
    } /* END _memberViewSidebarMiddle2 */
}