<?php

class Waindigo_Tabs_TabHandler_XenGalleryMedia extends Waindigo_Tabs_TabHandler_Abstract
{

    public function getContentById($contentId)
    {
        /* @var $mediaModel XenGallery_Model_Media */
        $mediaModel = XenForo_Model::create('XenGallery_Model_Media');

        $media = $mediaModel->getMediaById($contentId);

        if ($media) {
            $media = $mediaModel->prepareMedia($media);
            $media = $mediaModel->prepareMediaCustomFields($media, $media);
            return $media;
        }

        return false;
    } /* END getContentById */

    public function getTabs(XenForo_ViewPublic_Base $view, array $tab)
    {
        $tab['link'] = XenForo_Link::buildPublicLink('xengallery', $tab['content']);
        return $view->createTemplateObject('waindigo_tab_tabs', $tab);
    } /* END getTabs */

    public function canViewContent(array $content)
    {
        /* @var $mediaModel XenGallery_Model_Media */
        $mediaModel = XenForo_Model::create('XenGallery_Model_Media');
        if (!$mediaModel->canViewMediaItem($content)) {
            return false;
        }
        return true;
    } /* END canViewContent */

    public function createContent($tabId, $tabName, array $createCriteria, array $params)
    {
        if (empty($params['existing_content_id'])) {
            return $tabId;
        }

        /* @var $mediaDw XenGallery_DataWriter_Media */
        $mediaDw = XenForo_DataWriter::create('XenGallery_DataWriter_Media', XenForo_DataWriter::ERROR_SILENT);
        if (!$mediaDw->setExistingData($params['existing_content_id'])) {
            return $tabId;
        }
        if ($tabId && $mediaDw->get('tab_id')) {
            $this->_getTabModel()->mergeTabIds($tabId, $mediaDw->get('tab_id'));
            return $tabId;
        }

        if (!$tabId) {
            if ($mediaDw->get('tab_id')) {
                $tabId = $mediaDw->get('tab_id');
            } else {
                $newTabId = $this->getTabId();
                $mediaDw->set('tab_id', $newTabId);
                if (!$mediaDw->save()) {
                    return $tabId;
                }
                $tabId = $newTabId;

                $this->insertTab($tabId, 'xengallery_media', $mediaDw->get('media_id'), $tabName);
            }
        }

        return $tabId;
    } /* END createContent */

    protected function _getDefaultTabNameOptionName()
    {
        return 'waindigo_tabs_defaultTabNameMedia';
    } /* END _getDefaultTabNameOptionName */

    protected function _getControllerClass()
    {
        return 'XenGallery_ControllerPublic_Media';
    } /* END _getControllerClass */

    protected function _getDataWriterClass()
    {
        return 'XenGallery_DataWriter_Media';
    } /* END _getDataWriterClass */

    protected function _getCreateTemplateName()
    {
        return 'waindigo_select_existing_media_category_tabs';
    } /* END _getCreateTemplateName */

    protected function _getCreateTemplateParams()
    {
        /* @var $categoryModel XenGallery_Model_Category */
        $categoryModel = $this->_getCategoryModel();

        $categories = $categoryModel->getAllCategories();

        return array(
            'categories' => $categories
        );
    } /* END _getCreateTemplateParams */

    /**
     *
     * @return XenGallery_Model_Category
     */
    protected function _getCategoryModel()
    {
        return $this->getModelFromCache('XenGallery_Model_Category');
    } /* END _getCategoryModel */
}