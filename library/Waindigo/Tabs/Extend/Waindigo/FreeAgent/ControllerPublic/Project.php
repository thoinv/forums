<?php

/**
 *
 * @see Waindigo_FreeAgent_ControllerPublic_Project
 */
class Waindigo_Tabs_Extend_Waindigo_FreeAgent_ControllerPublic_Project extends XFCP_Waindigo_Tabs_Extend_Waindigo_FreeAgent_ControllerPublic_Project
{

    /**
     *
     * @see Waindigo_FreeAgent_ControllerPublic_Project::actionEdit()
     */
    public function actionEdit()
    {
        $response = parent::actionEdit();

        if ($response instanceof XenForo_ControllerResponse_View) {
            if (isset($response->params['project']['tab_id']) && $response->params['project']['tab_id']) {
                /* @var $tabNameModel Waindigo_Tabs_Model_TabName */
                $tabNameModel = $this->getModelFromCache('Waindigo_Tabs_Model_TabName');
                $tabName = $tabNameModel->getTabNameForContent('project', $response->params['project']['project_id']);

                if ($tabName) {
                    $response->params['project']['tab_name_id'] = $tabName['tab_name_id'];
                    $response->params['tabNames'] = $tabNameModel->prepareTabNames($tabNameModel->getTabNames());
                }
            }
        }

        return $response;
    } /* END actionEdit */

    /**
     *
     * @see Waindigo_FreeAgent_ControllerPublic_Project::actionSave()
     */
    public function actionSave()
    {
        $GLOBALS['Waindigo_FreeAgent_ControllerPublic_Project'] = $this;

        return parent::actionSave();
    } /* END actionSave */

    public function actionAddTab()
    {
        $projectId = $this->_input->filterSingle('project_id', XenForo_Input::UINT);
        $project = $this->_getProjectOrError($projectId);

        $tab = array(
            'tab_id' => $project['tab_id']
        );

        $this->_assertCanAddExistingContentToTab($tab);

        /* @var $tabModel Waindigo_Tabs_Model_Tab */
        $tabModel = $this->getModelFromCache('Waindigo_Tabs_Model_Tab');

        $contentTypes = $tabModel->getContentTypes();

        $redirect = $this->getDynamicRedirect(XenForo_Link::buildPublicLink('projects', $project), true);

        $viewParams = array(
            'title' => $project['name'],
            'contentType' => 'freeagent_project',
            'contentId' => $projectId,

            'contentTypes' => $contentTypes,

            'redirect' => $redirect
        );

        return $this->responseView('Waindigo_Tabs_ViewPublic_Project_Add', 'waindigo_add_tab_tabs', $viewParams);
    } /* END actionAddTab */

    public function actionSelectExistingTab()
    {
        $tab = array();

        $this->_assertCanAddExistingContentToTab($tab);

        $visitor = XenForo_Visitor::getInstance();

        /* @var $projectModel Waindigo_FreeAgent_Model_FreeAgent_Project */
        $projectModel = $this->_getProjectModel();

        if ($visitor['freeagent_user_id']) {
            $conditions['user_id'] = $visitor['freeagent_user_id'];
            $projects = $projectModel->getProjects($conditions);
        } else {
            $projects = array();
        }

        if ($projects) {
            $projects = $projectModel->prepareProjects($projects['projects']);
        }

        $viewParams = array(
            'projects' => $projects
        );

        return $this->responseView('Waindigo_Tabs_ViewPublic_Project_SelectExisting_Project', '', $viewParams);
    } /* END actionSelectExistingTab */

    /**
     * Asserts that the currently browsing user can add existing content to this
     * project.
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