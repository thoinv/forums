<?php

class Waindigo_Tabs_TabHandler_Thread extends Waindigo_Tabs_TabHandler_Abstract
{

    public function getContentById($contentId)
    {
        /* @var $threadModel XenForo_Model_Thread */
        $threadModel = XenForo_Model::create('XenForo_Model_Thread');

        $fetchOptions = array(
            'join' => XenForo_Model_Thread::FETCH_FORUM,
            'permissionCombinationId' => XenForo_Visitor::getInstance()->permission_combination_id
        );

        return $threadModel->getThreadById($contentId, $fetchOptions);
    } /* END getContentById */

    public function getTabs(XenForo_ViewPublic_Base $view, array $tab)
    {
        $tab['link'] = XenForo_Link::buildPublicLink('threads', $tab['content']);
        return $view->createTemplateObject('waindigo_tab_tabs', $tab);
    } /* END getTabs */

    public function canViewContent(array $content)
    {
        /* @var $threadModel XenForo_Model_Thread */
        $threadModel = XenForo_Model::create('XenForo_Model_Thread');
        $errorPhraseKey = 'null';
        if (!$threadModel->canViewThreadAndContainer($content, $content, $errorPhraseKey,
            XenForo_Permission::unserializePermissions($content['node_permission_cache']))) {
            return false;
        }
        return true;
    } /* END canViewContent */

    public function createContent($tabId, $tabName, array $createCriteria, array $params)
    {
        if (!$createCriteria['node_id']) {
            return $tabId;
        }

        $forum = $this->getModelFromCache('XenForo_Model_Forum')->getForumById($createCriteria['node_id']);
        if (!$forum) {
            return $tabId;
        }

        /* @var $threadDw XenForo_DataWriter_Discussion_Thread */
        $threadDw = XenForo_DataWriter::create('XenForo_DataWriter_Discussion_Thread', XenForo_DataWriter::ERROR_SILENT);

        $threadDw->setExtraData(XenForo_DataWriter_Discussion_Thread::DATA_FORUM, $forum);
        $threadDw->bulkSet(
            array(
                'node_id' => $createCriteria['node_id'],
                'title' => $params['title'],
                'user_id' => $params['user_id'],
                'username' => $params['username'],
                'tab_id' => $tabId
            ));
        $threadDw->set('discussion_state',
            $this->getModelFromCache('XenForo_Model_Post')
                ->getPostInsertMessageState(array(), $forum));
        $threadDw->setOption(XenForo_DataWriter_Discussion::OPTION_PUBLISH_FEED, false);
        $threadDw->setOption(Waindigo_Tabs_Extend_XenForo_DataWriter_Discussion_Thread::OPTION_CHECK_TAB_RULES, false);

        $postWriter = $threadDw->getFirstMessageDw();
        $postWriter->set('message', $params['message']->render());
        $postWriter->setExtraData(XenForo_DataWriter_DiscussionMessage_Post::DATA_FORUM, $forum);
        $postWriter->setOption(XenForo_DataWriter_DiscussionMessage::OPTION_PUBLISH_FEED, false);

        if ($threadDw->hasErrors()) {
            return $tabId;
        }

        if (!$tabId) {
            $tabId = $this->getTabId();
            $threadDw->set('tab_id', $tabId);
        }

        if (!$threadDw->save()) {
            return $tabId;
        }

        $this->insertTab($tabId, 'thread', $threadDw->get('thread_id'), $tabName);

        $this->getModelFromCache('XenForo_Model_Thread')->markThreadRead($threadDw->getMergedData(), $forum,
            XenForo_Application::$time);

        return $tabId;
    } /* END createContent */

    protected function _getDefaultTabNameOptionName()
    {
        return 'waindigo_tabs_defaultTabNameThreads';
    } /* END _getDefaultTabNameOptionName */

    protected function _getControllerClass()
    {
        return 'XenForo_ControllerPublic_Thread';
    } /* END _getControllerClass */

    protected function _getDataWriterClass()
    {
        return 'XenForo_DataWriter_Discussion_Thread';
    } /* END _getDataWriterClass */
}