<?php

class Waindigo_Tabs_TabHandler_XenProduct extends Waindigo_Tabs_TabHandler_Abstract
{

    public function getContentById($contentId)
    {
        /* @var $productModel XenProduct_Model_Product */
        $productModel = XenForo_Model::create('XenProduct_Model_Product');

        $fetchOptions = array(
            'join' => XenProduct_Model_Product::FETCH_VERSION,
            'permissionCombinationId' => XenForo_Visitor::getInstance()->permission_combination_id
        );

        $product = $productModel->getProductById($contentId, $fetchOptions);

        if ($product) {
            $product = $productModel->prepareProduct($product);
            return $product;
        }

        return false;
    } /* END getContentById */

    public function getTabs(XenForo_ViewPublic_Base $view, array $tab)
    {
        $tab['link'] = XenForo_Link::buildPublicLink('products', $tab['content']);
        return $view->createTemplateObject('waindigo_tab_tabs', $tab);
    } /* END getTabs */

    public function canViewContent(array $content)
    {
        /* @var $productModel XenProduct_Model_Product */
        $productModel = XenForo_Model::create('XenProduct_Model_Product');
        if (!$productModel->canViewProducts()) {
            return false;
        }
        return true;
    } /* END canViewContent */

    public function createContent($tabId, $tabName, array $createCriteria, array $params)
    {
        return $tabId;
    } /* END createContent */

    protected function _getDefaultTabNameOptionName()
    {
        return 'waindigo_tabs_defaultTabNameProducts';
    } /* END _getDefaultTabNameOptionName */

    protected function _getControllerClass()
    {
        return 'XenProduct_ControllerPublic_Product';
    } /* END _getControllerClass */

    public function changeTabId($contentId, $newTabId)
    {
        $dataWriterClass = $this->_getDataWriterClass();

        if (!$dataWriterClass) {
            return false;
        }

        $dw = XenForo_DataWriter::create($dataWriterClass);
        $dw->setExistingData($contentId);
        $dw->set('tab_id', $newTabId);

        // horrible workaround for weird datawriter behaviour
        $dw->preSave();
        $dw->set('product_thumbnail', $dw->getExisting('product_thumbnail', 0), '', array('setAfterPreSave' => true));

        return $dw->save();
    } /* END changeTabId */

    protected function _getDataWriterClass()
    {
        return 'XenProduct_DataWriter_Product';
    } /* END _getDataWriterClass */
}