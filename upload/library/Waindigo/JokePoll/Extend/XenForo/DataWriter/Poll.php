<?php

/**
 *
 * @see XenForo_DataWriter_Poll
 */
class Waindigo_JokePoll_Extend_XenForo_DataWriter_Poll extends XFCP_Waindigo_JokePoll_Extend_XenForo_DataWriter_Poll
{

    /**
     * Post-save handling.
     */
    protected function _postSave()
    {
        parent::_postSave();

        if (isset($GLOBALS['XenForo_ControllerPublic_Thread'])) {
            $this->_processJokePollUpdate($GLOBALS['XenForo_ControllerPublic_Thread']);
        }

        if (isset($GLOBALS['XenForo_ControllerPublic_Forum'])) {
            $this->_processJokePollCreate($GLOBALS['XenForo_ControllerPublic_Forum']);
        }
    } /* END _postSave */

    /**
     *
     * @param XenForo_ControllerPublic_Thread $controller
     */
    protected function _processJokePollUpdate(XenForo_ControllerPublic_Thread $controller)
    {
        $jokePollInput = Waindigo_JokePoll_DataWriter_Helper_JokePoll::getJokePollInput($controller->getInput());
        $jokePollIds = Waindigo_JokePoll_DataWriter_Helper_JokePoll::getCurrentJokePollIds();

        $threadId = $controller->getInput()->filterSingle('thread_id', XenForo_Input::UINT);

        $ftpHelper = $controller->getHelper('ForumThreadPost');
        // TODO: probably should cache $thread and $forum
        list ($thread, $forum) = $ftpHelper->assertThreadValidAndViewable($threadId);

        if ($this->getModelFromCache('XenForo_Model_Forum')->canMakeJokePollInForum($forum)) {
            if (isset($jokePollInput['first_choice']) && $jokePollInput['first_choice']) {
                $jokePollIds['first_choice'][] = $this->get('poll_id');
            } elseif (in_array($this->get('poll_id'), $jokePollIds['first_choice'])) {
                unset($jokePollIds['first_choice'][array_search($this->get('poll_id'), $jokePollIds['first_choice'])]);
            }

            Waindigo_JokePoll_DataWriter_Helper_JokePoll::updateJokePollIdOptions($jokePollIds);
        }
    } /* END _processJokePollUpdate */

    /**
     *
     * @param XenForo_ControllerPublic_Forum $controller
     */
    protected function _processJokePollCreate(XenForo_ControllerPublic_Forum $controller)
    {
        $jokePollInput = Waindigo_JokePoll_DataWriter_Helper_JokePoll::getJokePollInput($controller->getInput());
        $jokePollIds = Waindigo_JokePoll_DataWriter_Helper_JokePoll::getCurrentJokePollIds();

        if (isset($GLOBALS['XenForo_DataWriter_Discussion_Thread'])) {
            /* @var $threadWriter XenForo_DataWriter_Discussion_Thread */
            $threadWriter = $GLOBALS['XenForo_DataWriter_Discussion_Thread'];
            $forum = $threadWriter->getExtraData(XenForo_DataWriter_Discussion_Thread::DATA_FORUM);
        } else {
            $forumId = $controller->getInput()->filterSingle('node_id', XenForo_Input::UINT);
            $forumName = $controller->getInput()->filterSingle('node_name', XenForo_Input::STRING);

            $ftpHelper = $controller->getHelper('ForumThreadPost');
            // TODO: probably should cache $forum
            $forum = $ftpHelper->assertForumValidAndViewable($forumId ? $forumId : $forumName);
        }

        if ($this->getModelFromCache('XenForo_Model_Forum')->canMakeJokePollInForum($forum)) {
            if (isset($jokePollInput['first_choice']) && $jokePollInput['first_choice']) {
                $jokePollIds['first_choice'][] = $this->get('poll_id');
            }

            Waindigo_JokePoll_DataWriter_Helper_JokePoll::updateJokePollIdOptions($jokePollIds);
        }
    } /* END _processJokePollCreate */

    /**
     * Post-delete handling.
     */
    protected function _postDelete()
    {
        parent::_postDelete();

        $jokePollIds = Waindigo_JokePoll_DataWriter_Helper_JokePoll::getCurrentJokePollIds();

        foreach ($jokePollIds as $jokePollKey => $pollIds) {
            if (in_array($this->get('poll_id'), $jokePollIds[$jokePollKey])) {
                unset($jokePollIds[$jokePollKey][array_search($this->get('poll_id'), $jokePollIds[$jokePollKey])]);
            }
        }

        Waindigo_JokePoll_DataWriter_Helper_JokePoll::updateJokePollIdOptions($jokePollIds);
    } /* END _postDelete */
}