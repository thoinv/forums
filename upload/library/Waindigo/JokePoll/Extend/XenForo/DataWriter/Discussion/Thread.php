<?php

/**
 *
 * @see XenForo_DataWriter_Discussion_Thread
 */
class Waindigo_JokePoll_Extend_XenForo_DataWriter_Discussion_Thread_Base extends XFCP_Waindigo_JokePoll_Extend_XenForo_DataWriter_Discussion_Thread
{
}

if (XenForo_Application::$versionId < 1020000) {

    class Waindigo_JokePoll_Extend_XenForo_DataWriter_Discussion_Thread extends Waindigo_JokePoll_Extend_XenForo_DataWriter_Discussion_Thread_Base
    {

        /**
         *
         * @see XenForo_DataWriter_Discussion_Thread::_discussionPostSave()
         */
        protected function _discussionPostSave(array $messages)
        {
            if (isset($GLOBALS['XenForo_ControllerPublic_Forum'])) {
                $GLOBALS['XenForo_DataWriter_Discussion_Thread'] = $this;
            }
        } /* END _discussionPostSave */
    }
} else {

    class Waindigo_JokePoll_Extend_XenForo_DataWriter_Discussion_Thread extends Waindigo_JokePoll_Extend_XenForo_DataWriter_Discussion_Thread_Base
    {

        /**
         *
         * @see XenForo_DataWriter_Discussion_Thread::_discussionPostSave()
         */
        protected function _discussionPostSave()
        {
            if (isset($GLOBALS['XenForo_ControllerPublic_Forum'])) {
                $GLOBALS['XenForo_DataWriter_Discussion_Thread'] = $this;
            }
        } /* END _discussionPostSave */
    }
}