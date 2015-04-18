<?php

/* Product: sonnb - Prevent Double Post
 * Author: sonnb
 * Version: 1.0.1
 * Released: 19th Jul 2012
 * Website: www.sonnb.com - www.underworldvn.com
 */

class sonnbPreventDoublePost_ControllerPublic_Thread extends XFCP_sonnbPreventDoublePost_ControllerPublic_Thread
{
    protected function _assertIsDoublePost($postMessage, $postUserId, $postThreadId, $timeDiff)
    {
        if ($post = $this->_getPostModel()->isDoublePost($postMessage, $postUserId, $postThreadId, $timeDiff))
        {
            throw $this->getErrorOrNoPermissionResponseException(new XenForo_Phrase('you_may_not_perform_this_action_because_double_post', array('link_post' => XenForo_Link::buildPublicLink('full:posts', $post))), false);
        }
    }

    public function actionAddReply()
    {
        $this->_assertPostOnly();

        $threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);

        $message = $this->getHelper('Editor')->getMessageText('message', $this->_input);
        $message = XenForo_Helper_String::autoLinkBbCode($message);

        //Get visitor id and check for duplicate post
        $visitorId = XenForo_Visitor::getUserId();
        $xenOptions = XenForo_Application::getOptions();
        $timeDiff = $xenOptions->sonnbPreventDoublePost_duration;
        $this->_assertIsDoublePost($message, $visitorId, $threadId, $timeDiff);

        return parent::actionAddReply();
    }

}

?>
