<?php

/**
 *
 * @see XenForo_ControllerPublic_Thread
 */
class Waindigo_JokePoll_Extend_XenForo_ControllerPublic_Thread extends XFCP_Waindigo_JokePoll_Extend_XenForo_ControllerPublic_Thread
{

    /**
     *
     * @see XenForo_ControllerPublic_Thread::actionPollEdit()
     */
    public function actionPollEdit()
    {
        $GLOBALS['XenForo_ControllerPublic_Thread'] = $this;

        $response = parent::actionPollEdit();

        if ($response instanceof XenForo_ControllerResponse_View) {
            $forum = $response->params['forum'];
            $response->params['canMakeJokePoll'] = $this->getModelFromCache('XenForo_Model_Forum')->canMakeJokePollInForum($forum);

            $response->params['poll']['joke'] = array();
            $jokePolls = XenForo_Application::get('options')->waindigo_jokePoll_firstChoicePollIds;
            if ($jokePolls) {
                $jokePolls = explode(',', $jokePolls);
                if (in_array($response->params['poll']['poll_id'], $jokePolls)) {
                    $response->params['poll']['joke']['first_choice'] = true;
                }
            }
        }

        return $response;
    } /* END actionPollEdit */
}