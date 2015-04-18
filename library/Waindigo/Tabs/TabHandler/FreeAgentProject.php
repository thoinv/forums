<?php

class Waindigo_Tabs_TabHandler_FreeAgentProject extends Waindigo_Tabs_TabHandler_Abstract
{

    public function getContentById($contentId)
    {
        /* @var $projectModel Waindigo_FreeAgent_Model_FreeAgent_Project */
        $projectModel = XenForo_Model::create('Waindigo_FreeAgent_Model_FreeAgent_Project');

        $fetchOptions = array(
        	'join' => Waindigo_FreeAgent_Model_FreeAgent_Project::FETCH_USER_ID
        );

        $project = $projectModel->getProjectById($contentId, $fetchOptions);

        if (!empty($project['project'])) {
            $project = $projectModel->prepareProject($project['project']);
        }

        return $project;
    } /* END getContentById */

    public function getTabs(XenForo_ViewPublic_Base $view, array $tab)
    {
        $tab['link'] = XenForo_Link::buildPublicLink('projects', $tab['content']);
        return $view->createTemplateObject('waindigo_tab_tabs', $tab);
    } /* END getTabs */

    public function canViewContent(array $content)
    {
        return true;
    } /* END canViewContent */

    public function createContent($tabId, $tabName, array $createCriteria, array $params)
    {
        return $tabId;
    } /* END createContent */

    protected function _getDefaultTabNameOptionName()
    {
        return 'waindigo_tabs_defaultTabNameProjects';
    } /* END _getDefaultTabNameOptionName */

    protected function _getControllerClass()
    {
        return 'Waindigo_FreeAgent_ControllerPublic_Project';
    } /* END _getControllerClass */

    public function changeTabId($contentId, $newTabId)
    {
        $db = XenForo_Application::getDb();

        $db->beginTransaction();

        $content = $this->getContentById($contentId);

        $db->update('xf_freeagent_user_project_waindigo', array(
        	'tab_id' => $newTabId
        ), 'freeagent_project_id = ' . $db->quote($contentId));

        $db->update('xf_tab_content', array(
            'tab_id' => $newTabId
        ), 'content_id = ' . $db->quote($content['tab_id']) . ' AND content_type = \'freeagent_project\'');

        $db->commit();
    } /* END changeTabId */

    protected function _getDataWriterClass()
    {
        return false;
    } /* END _getDataWriterClass */
}