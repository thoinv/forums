<?php

/**
 *
 * @see XenResource_ControllerPublic_Resource
 */
class Waindigo_Tabs_Extend_XenResource_ControllerPublic_Resource extends XFCP_Waindigo_Tabs_Extend_XenResource_ControllerPublic_Resource
{

    /**
     *
     * @see XenResource_ControllerPublic_Resource::_getResourceAddOrEditResponse()
     */
    protected function _getResourceAddOrEditResponse(array $resource, array $category, array $attachments = array())
    {
        $response = parent::_getResourceAddOrEditResponse($resource, $category, $attachments);

        if ($response instanceof XenForo_ControllerResponse_View) {
            if (isset($resource['tab_id']) && $resource['tab_id']) {
                /* @var $tabNameModel Waindigo_Tabs_Model_TabName */
                $tabNameModel = $this->getModelFromCache('Waindigo_Tabs_Model_TabName');
                $tabName = $tabNameModel->getTabNameForContent('resource', $resource['resource_id']);

                if ($tabName) {
                    $response->params['resource']['tab_name_id'] = $tabName['tab_name_id'];
                    $response->params['tabNames'] = $tabNameModel->prepareTabNames($tabNameModel->getTabNames());
                }
            }
        }

        return $response;
    } /* END _getResourceAddOrEditResponse */

    /**
     *
     * @see XenResource_ControllerPublic_Resource::actionSave()
     */
    public function actionSave()
    {
        $GLOBALS['XenResource_ControllerPublic_Resource'] = $this;

        return parent::actionSave();
    } /* END actionSave */

    public function actionAddTab()
    {
        list($resource, $category) = $this->_getResourceViewInfo();

        $tab = array(
            'tab_id' => $resource['tab_id']
        );

        $this->_assertCanAddExistingContentToTab($tab);

        /* @var $tabModel Waindigo_Tabs_Model_Tab */
        $tabModel = $this->getModelFromCache('Waindigo_Tabs_Model_Tab');

        $contentTypes = $tabModel->getContentTypes();

        $redirect = $this->getDynamicRedirect(XenForo_Link::buildPublicLink('resources', $resource), true);

        $viewParams = array(
            'title' => $resource['title'],
            'contentType' => 'resource',
            'contentId' => $resource['resource_id'],

            'contentTypes' => $contentTypes,

            'redirect' => $redirect
        );

        return $this->responseView('Waindigo_Tabs_ViewPublic_Resource_Add', 'waindigo_add_tab_tabs', $viewParams);
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

        if ($contentType['_name'] == 'resource_category_id') {
            /* @var $resourceModel XenResource_Model_Resource */
            $resourceModel = $this->_getResourceModel();

            $resources = $resourceModel->getResources(array(
                'resource_category_id' => $contentType['_value']
            ));

            $viewParams = array(
                'resources' => $resources
            );

            return $this->responseView('Waindigo_Tabs_ViewPublic_Resource_SelectExisting_Resource', '', $viewParams);
        }

        /* @var $categoryModel XenResource_Model_Category */
        $categoryModel = $this->_getCategoryModel();

        $categories = $categoryModel->getAllCategories();

        $viewParams = array(
            'categories' => $categories
        );

        return $this->responseView('Waindigo_Tabs_ViewPublic_Resource_SelectExisting_Category', '', $viewParams);
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