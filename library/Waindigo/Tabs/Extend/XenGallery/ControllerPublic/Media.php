<?php

/**
 *
 * @see XenGallery_ControllerPublic_Media
 */
class Waindigo_Tabs_Extend_XenGallery_ControllerPublic_Media extends XFCP_Waindigo_Tabs_Extend_XenGallery_ControllerPublic_Media
{

    /**
     *
     * @see XenGallery_ControllerPublic_Media::_getMediaAddOrEditResponse()
     */
    protected function _getMediaAddOrEditResponse(array $media, array $category, array $attachments = array())
    {
        $response = parent::_getMediaAddOrEditResponse($media, $category, $attachments);

        if ($response instanceof XenForo_ControllerResponse_View) {
            if (isset($media['tab_id']) && $media['tab_id']) {
                /* @var $tabNameModel Waindigo_Tabs_Model_TabName */
                $tabNameModel = $this->getModelFromCache('Waindigo_Tabs_Model_TabName');
                $tabName = $tabNameModel->getTabNameForContent('media', $media['media_id']);

                if ($tabName) {
                    $response->params['media']['tab_name_id'] = $tabName['tab_name_id'];
                    $response->params['tabNames'] = $tabNameModel->prepareTabNames($tabNameModel->getTabNames());
                }
            }
        }

        return $response;
    } /* END _getMediaAddOrEditResponse */

    /**
     *
     * @see XenGallery_ControllerPublic_Media::actionSaveMedia()
     */
    public function actionSaveMedia()
    {
        $GLOBALS['XenGallery_ControllerPublic_Media'] = $this;

        return parent::actionSaveMedia();
    } /* END actionSaveMedia */

    public function actionAddTab()
    {
        $mediaId = $this->_input->filterSingle('media_id', XenForo_Input::UINT);
        if (!$mediaId) {
            return $this->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL_PERMANENT,
                XenForo_Link::buildPublicLink('xengallery'));
        }

        $mediaHelper = $this->_getMediaHelper();
        $mediaModel = $this->_getMediaModel();

        $media = $mediaHelper->assertMediaValidAndViewable($mediaId);
        $media = $mediaModel->prepareMedia($media);

        $tab = array(
            'tab_id' => $media['tab_id']
        );

        $this->_assertCanAddExistingContentToTab($tab);

        /* @var $tabModel Waindigo_Tabs_Model_Tab */
        $tabModel = $this->getModelFromCache('Waindigo_Tabs_Model_Tab');

        $contentTypes = $tabModel->getContentTypes();

        $redirect = $this->getDynamicRedirect(XenForo_Link::buildPublicLink('xengallery', $media), true);

        $viewParams = array(
            'title' => $media['media_title'],
            'contentType' => 'xengallery_media',
            'contentId' => $media['media_id'],

            'contentTypes' => $contentTypes,

            'redirect' => $redirect
        );

        return $this->responseView('Waindigo_Tabs_ViewPublic_Media_Add', 'waindigo_add_tab_tabs', $viewParams);
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

        if ($contentType['_name'] == 'category_id') {
            /* @var $mediaModel XenGallery_Model_Media */
            $mediaModel = $this->_getMediaModel();
            $visitor = XenForo_Visitor::getInstance();

            $mediaConditions = array(
                'category_id' => $contentType['_value'],
                'media_state' => 'visible'
            );
            $mediaFetchOptions = array(
                'order' => 'new',
                'join' => XenGallery_Model_Media::FETCH_USER | XenGallery_Model_Media::FETCH_ATTACHMENT |
                     XenGallery_Model_Media::FETCH_ALBUM
            );

            $media = $mediaModel->getMedia($mediaConditions, $mediaFetchOptions);
            $media = $mediaModel->prepareMediaItems($media);

            $mediaCount = $mediaModel->countMedia($mediaConditions, $mediaFetchOptions);

            $tabRuleId = $this->_input->filterSingle('_tabRuleId', XenForo_Input::UINT);

            $viewParams = array(
                'media' => $media,
                'tabRuleId' => $tabRuleId
            );

            return $this->responseView('Waindigo_Tabs_ViewPublic_Media_SelectExisting_Media', '', $viewParams);
        }

        /* @var $categoryModel XenGallery_Model_Category */
        $categoryModel = $this->_getCategoryModel();

        $categories = $categoryModel->getAllCategories();

        $viewParams = array(
            'categories' => $categories
        );

        return $this->responseView('Waindigo_Tabs_ViewPublic_Media_SelectExisting_Category', '', $viewParams);
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