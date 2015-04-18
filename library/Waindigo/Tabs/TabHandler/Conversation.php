<?php

class Waindigo_Tabs_TabHandler_Conversation extends Waindigo_Tabs_TabHandler_Abstract
{

    public function getContentById($contentId)
    {
        /* @var $conversationModel XenForo_Model_Conversation */
        $conversationModel = XenForo_Model::create('XenForo_Model_Conversation');

        $userId = XenForo_Visitor::getUserId();

        return $conversationModel->getConversationForUser($contentId, $userId);
    } /* END getContentById */

    public function getTabs(XenForo_ViewPublic_Base $view, array $tab)
    {
        $tab['link'] = XenForo_Link::buildPublicLink('conversations', $tab['content']);
        return $view->createTemplateObject('waindigo_tab_tabs', $tab);
    } /* END getTabs */

    public function canViewContent(array $content)
    {
        return true;
    } /* END canViewContent */

    public function createContent($tabId, $tabName, array $createCriteria, array $params)
    {
        if (!$createCriteria['username']) {
            return $tabId;
        }

        $visitor = XenForo_Visitor::getInstance();

        $conversation = array(
            'title' => $params['title'],
            'tab_id' => $tabId
        );
        $message = $params['message']->render();

        /* @var $conversationDw XenForo_DataWriter_ConversationMaster */
        $conversationDw = XenForo_DataWriter::create('XenForo_DataWriter_ConversationMaster', XenForo_DataWriter::ERROR_SILENT);
        $conversationDw->setExtraData(XenForo_DataWriter_ConversationMaster::DATA_ACTION_USER,
            $visitor->toArray());
        $conversationDw->setExtraData(XenForo_DataWriter_ConversationMaster::DATA_MESSAGE, $message);
        $conversationDw->setOption(Waindigo_Tabs_Extend_XenForo_DataWriter_ConversationMaster::OPTION_CHECK_TAB_RULES, false);
        $conversationDw->set('user_id', $visitor['user_id']);
        $conversationDw->set('username', $visitor['username']);
        $recipients = explode(',', $createCriteria['username']);
        $conversationDw->bulkSet($conversation);
        $conversationDw->set('open_invite', true);
        $conversationDw->set('conversation_open', true);

        $conversationDw->addRecipientUserNames($recipients); // checks permissions

        $messageDw = $conversationDw->getFirstMessageDw();
        $messageDw->set('message', $message);

        if ($conversationDw->hasErrors()) {
            return $tabId;
        }

        if (!$tabId) {
            $tabId = $this->getTabId();
            $conversationDw->set('tab_id', $tabId);
        }

        if (!$conversationDw->save()) {
            return $tabId;
        }

        $conversation = $conversationDw->getMergedData();

        $this->insertTab($tabId, 'conversation', $conversationDw->get('conversation_id'), $tabName);

        $this->getModelFromCache('XenForo_Model_Conversation')->markConversationAsRead($conversation['conversation_id'],
            XenForo_Visitor::getUserId(), XenForo_Application::$time);

        return $tabId;
    } /* END createContent */

    protected function _getDefaultTabNameOptionName()
    {
        return 'waindigo_tabs_defaultTabNameConversations';
    } /* END _getDefaultTabNameOptionName */

    protected function _getControllerClass()
    {
        return 'XenForo_ControllerPublic_Conversation';
    } /* END _getControllerClass */

    protected function _getDataWriterClass()
    {
        return 'XenForo_DataWriter_ConversationMaster';
    } /* END _getDataWriterClass */
}