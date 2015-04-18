<?php

class Waindigo_Friends_Listener_TemplatePostRender extends Waindigo_Listener_TemplatePostRender
{

    protected function _getTemplates()
    {
        return array(
            'member_view',
            'member_card'
        );
    }

    public static function templatePostRender($templateName, &$content, array &$containerData,
        XenForo_Template_Abstract $template)
    {
        $templatePostRender = new Waindigo_Friends_Listener_TemplatePostRender($templateName, $content, $containerData,
            $template);
        list ($content, $containerData) = $templatePostRender->run();
    }

    protected function _memberView($li = true)
    {
        $viewParams = $this->_fetchViewParams();
        $viewParams['_noLi'] = !$li;
        $options = XenForo_Application::get('options');
        $unfollow = new XenForo_Phrase('unfollow');
        $follow = new XenForo_Phrase('follow');
        $pattern = array(
            '/(' . ($li ? '<li>' : '') . '<a(.*?)>' . $unfollow . '<\/a>' . ($li ? '<\/li>' : '') . ')/',
            '/(' . ($li ? '<li>' : '') . '<a(.*?)>' . $follow . '<\/a>' . ($li ? '<\/li>' : '') . ')/',
            '/<!-- waindigo_friends_follow_blocks_start -->\s*(?:<div class="followBlocks">(.*)<\/div>|(.*))\s*<!-- waindigo_friends_follow_blocks_end -->/s'
        );
        $friendsBlock = $this->_escapeDollars($this->_render('waindigo_member_view_friend_blocks_friend'));
        $replacement = array(
            '$1',
            '$1',
            '<div class="followBlocks">' . $friendsBlock . '${1}${2}</div>'
        );
        if (isset($viewParams['friend_record']['friend_state']) &&
             $viewParams['friend_record']['friend_state'] != 'rejected') {
            if ($viewParams['friend_record']['friend_state'] == 'confirmed') {
                $replacement[0] = $this->_render('waindigo_member_view_unfriend_link_friend', $viewParams) . '$1';
                $replacement[1] = $replacement[0];
            } else
                if ($viewParams['friend_record']['friend_state'] == 'pending') {
                    if ($viewParams['friend_record']['user_id'] == XenForo_Visitor::getUserId()) {
                        if ($li) {
                            $replacement[0] = $this->_render('waindigo_member_view_friend_request_pending_friend') . '$1';
                            $replacement[1] = $replacement[0];
                        }
                    } else {
                        $replacement[0] = $this->_render('waindigo_member_view_confirm_link_friend', $viewParams) . '$1';
                        if (!$options->waindigo_friends_requireFollow) {
                            $replacement[1] = $replacement[0];
                        }
                    }
                }
        } else {
            $replacement[0] = $this->_render('waindigo_member_view_friend_link_friend', $viewParams) . '$1';
            if (!$options->waindigo_friends_requireFollow) {
                $replacement[1] = $replacement[0];
            }
        }
        $this->_contents = preg_replace($pattern, $replacement, $this->_contents, 1);
    }

    protected function _memberCard()
    {
        $this->_memberView(false);
    }
}