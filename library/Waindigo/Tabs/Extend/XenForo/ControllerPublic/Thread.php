<?php

/**
 *
 * @see XenForo_ControllerPublic_Thread
 */
class Waindigo_Tabs_Extend_XenForo_ControllerPublic_Thread extends XFCP_Waindigo_Tabs_Extend_XenForo_ControllerPublic_Thread
{

    /**
     *
     * @see XenForo_ControllerPublic_Thread::actionEdit()
     */
    public function actionEdit()
    {
        $response = parent::actionEdit();

        if ($response instanceof XenForo_ControllerResponse_View) {
            if (isset($response->params['thread']['tab_id']) && $response->params['thread']['tab_id']) {
                /* @var $tabNameModel Waindigo_Tabs_Model_TabName */
                $tabNameModel = $this->getModelFromCache('Waindigo_Tabs_Model_TabName');
                $tabName = $tabNameModel->getTabNameForContent('thread', $response->params['thread']['thread_id']);

                if ($tabName) {
                    $response->params['thread']['tab_name_id'] = $tabName['tab_name_id'];
                    $response->params['tabNames'] = $tabNameModel->prepareTabNames($tabNameModel->getTabNames());
                }
            }
        }

        return $response;
    } /* END actionEdit */

    /**
     *
     * @see XenForo_ControllerPublic_Thread::actionSave()
     */
    public function actionSave()
    {
        $GLOBALS['XenForo_ControllerPublic_Thread'] = $this;

        return parent::actionSave();
    } /* END actionSave */

    public function actionAddTab()
    {
        $threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);

        $ftpHelper = $this->getHelper('ForumThreadPost');
        list ($thread, $forum) = $ftpHelper->assertThreadValidAndViewable($threadId);

        $tab = array(
            'tab_id' => $thread['tab_id']
        );

        $this->_assertCanAddExistingContentToTab($tab);

        /* @var $tabModel Waindigo_Tabs_Model_Tab */
        $tabModel = $this->getModelFromCache('Waindigo_Tabs_Model_Tab');

        $contentTypes = $tabModel->getContentTypes();

        $redirect = $this->getDynamicRedirect(XenForo_Link::buildPublicLink('threads', $thread), true);

        $viewParams = array(
            'title' => $thread['title'],
            'contentType' => 'thread',
            'contentId' => $threadId,

            'contentTypes' => $contentTypes,

            'redirect' => $redirect
        );

        return $this->responseView('Waindigo_Tabs_ViewPublic_Thread_Add', 'waindigo_add_tab_tabs', $viewParams);
    } /* END actionAddTab */

    public function actionSelectExistingTab()
    {
        $tab = array();

        $this->_assertCanAddExistingContentToTab($tab);

        $contentType = $this->_input->filter(
            array(
                '_value' => XenForo_Input::STRING,
                '_name' => XenForo_Input::STRING
            ));

        if ($contentType['_name'] == 'node_id') {
            /* @var $threadModel XenForo_Model_Thread */
            $threadModel = $this->_getThreadModel();

            $threads = $threadModel->getThreadsInForum($contentType['_value']);

            $viewParams = array(
                'threads' => $threads
            );

            return $this->responseView('Waindigo_Tabs_ViewPublic_Thread_SelectExisting_Thread', '', $viewParams);
        }

        /* @var $forumModel XenForo_Model_Forum */
        $forumModel = $this->_getForumModel();

        $forums = $forumModel->getForums();

        $viewParams = array(
            'forums' => $forums
        );

        return $this->responseView('Waindigo_Tabs_ViewPublic_Thread_SelectExisting_Forum', '', $viewParams);
    } /* END actionSelectExistingTab */

    /**
     * Asserts that the currently browsing user can add existing content to this
     * thread.
     *
     * @param array $tab
     */
    protected function _assertCanAddExistingContentToTab(array $tab)
    {
        if (!$this->_getTabModel()->canAddExistingContentToTab($tab, $errorPhraseKey)) {
            throw $this->getErrorOrNoPermissionResponseException($errorPhraseKey);
        }
    } /* END _assertCanAddExistingContentToTab */

    /**
     * Get the tabs model.
     *
     * @return Waindigo_Tabs_Model_Tab
     */
    protected function _getTabModel()
    {
        return $this->getModelFromCache('Waindigo_Tabs_Model_Tab');
    } /* END _getTabModel */
}