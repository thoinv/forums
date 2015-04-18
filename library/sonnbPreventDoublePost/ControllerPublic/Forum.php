<?php

/* Product: sonnb - Prevent Double Post
 * Author: sonnb
 * Version: 1.0.1
 * Released: 19th Jul 2012
 * Website: www.sonnb.com - www.underworldvn.com
 */
class sonnbPreventDoublePost_ControllerPublic_Forum extends XFCP_sonnbPreventDoublePost_ControllerPublic_Forum
{
    protected function _assertIsDoubleThread($threadTitle, $threadUserId, $threadForumId, $timeDiff)
    {
        if ($thread = $this->_getThreadModel()->isDoubleThread($threadTitle, $threadUserId, $threadForumId, $timeDiff))
        {
            throw $this->getErrorOrNoPermissionResponseException(new XenForo_Phrase('you_may_not_perform_this_action_because_double_thread', array('link_thread' => XenForo_Link::buildPublicLink('full:threads', $thread))), false);
        }
    }

    public function actionAddThread()
    {
        $forumId = $this->_input->filterSingle('node_id', XenForo_Input::UINT);
        $title = $this->_input->filterSingle('title', XenForo_Input::STRING);

        //Get visitor id and check for duplicate thread
        $visitorId = XenForo_Visitor::getUserId();
        $xenOptions = XenForo_Application::getOptions();
        $timeDiff = $xenOptions->sonnbPreventDoublePost_duration;
        $this->_assertIsDoubleThread($title, $visitorId, $forumId, $timeDiff);

        return parent::actionAddThread();
    }

}

?>
