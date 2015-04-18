<?php

/**
 *
 * @see XenForo_ControllerPublic_Conversation
 */
class Waindigo_Tabs_Extend_XenForo_ControllerPublic_Conversation extends XFCP_Waindigo_Tabs_Extend_XenForo_ControllerPublic_Conversation
{

    /**
     *
     * @see XenForo_ControllerPublic_Conversation::actionInsert()
     */
    public function actionInsert()
    {
        $GLOBALS['XenForo_ControllerPublic_Conversation'] = $this;

        return parent::actionInsert();
    } /* END actionInsert */

    /**
     *
     * @see XenForo_ControllerPublic_Conversation::actionEdit()
     */
    public function actionEdit()
    {
        $response = parent::actionEdit();

        if ($response instanceof XenForo_ControllerResponse_View) {
            if (isset($response->params['conversation']['tab_id']) && $response->params['conversation']['tab_id']) {
                /* @var $tabNameModel Waindigo_Tabs_Model_TabName */
                $tabNameModel = $this->getModelFromCache('Waindigo_Tabs_Model_TabName');
                $tabName = $tabNameModel->getTabNameForContent('conversation',
                    $response->params['conversation']['conversation_id']);

                if ($tabName) {
                    $response->params['conversation']['tab_name_id'] = $tabName['tab_name_id'];
                    $response->params['tabNames'] = $tabNameModel->prepareTabNames($tabNameModel->getTabNames());
                }
            }
        }

        return $response;
    } /* END actionEdit */

    /**
     *
     * @see XenForo_ControllerPublic_Conversation::actionUpdate()
     */
    public function actionUpdate()
    {
        $GLOBALS['XenForo_ControllerPublic_Conversation'] = $this;

        return parent::actionUpdate();
    } /* END actionUpdate */

    public function actionAddTab()
    {
        $conversationId = $this->_input->filterSingle('conversation_id', XenForo_Input::UINT);
        $conversation = $this->_getConversationOrError($conversationId);

        $tab = array(
            'tab_id' => $conversation['tab_id']
        );

        $this->_assertCanAddExistingContentToTab($tab);

        /* @var $tabModel Waindigo_Tabs_Model_Tab */
        $tabModel = $this->getModelFromCache('Waindigo_Tabs_Model_Tab');

        $contentTypes = $tabModel->getContentTypes();

        $redirect = $this->getDynamicRedirect(XenForo_Link::buildPublicLink('conversations', $conversation), true);

        $viewParams = array(
            'title' => $conversation['title'],
            'contentType' => 'conversation',
            'contentId' => $conversationId,

            'contentTypes' => $contentTypes,

            'redirect' => $redirect
        );

        return $this->responseView('Waindigo_Tabs_ViewPublic_Conversation_Add', 'waindigo_add_tab_tabs', $viewParams);
    } /* END actionAddTab */

    public function actionSelectExistingTab()
    {
        $tab = array();

        $this->_assertCanAddExistingContentToTab($tab);

        $userId = XenForo_Visitor::getUserId();

        /* @var $conversationModel XenForo_Model_Conversation */
        $conversationModel = $this->_getConversationModel();

        $conversations = $conversationModel->getConversationsForUser($userId);

        $viewParams = array(
            'conversations' => $conversations
        );

        return $this->responseView('Waindigo_Tabs_ViewPublic_Conversation_SelectExisting_Conversation', '', $viewParams);
    } /* END actionSelectExistingTab */

    /**
     * Asserts that the currently browsing user can add existing content to this
     * conversation.
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