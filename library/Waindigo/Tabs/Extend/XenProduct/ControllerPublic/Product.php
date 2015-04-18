<?php

/**
 *
 * @see XenProduct_ControllerPublic_Product
 */
class Waindigo_Tabs_Extend_XenProduct_ControllerPublic_Product extends XFCP_Waindigo_Tabs_Extend_XenProduct_ControllerPublic_Product
{

    /**
     *
     * @see XenProduct_ControllerPublic_Product::_getAddEditResponse()
     */
    protected function _getAddEditResponse(array $product = array(), array $version = array())
    {
        $response = parent::_getAddEditResponse($product, $version);

        if ($response instanceof XenForo_ControllerResponse_View) {
            if (isset($product['tab_id']) && $product['tab_id']) {
                /* @var $tabNameModel Waindigo_Tabs_Model_TabName */
                $tabNameModel = $this->getModelFromCache('Waindigo_Tabs_Model_TabName');
                $tabName = $tabNameModel->getTabNameForContent('xenproduct_product', $product['product_id']);

                if ($tabName) {
                    $response->params['product']['tab_name_id'] = $tabName['tab_name_id'];
                    $response->params['tabNames'] = $tabNameModel->prepareTabNames($tabNameModel->getTabNames());
                }
            }
        }

        return $response;
    } /* END _getAddEditResponse */

    /**
     *
     * @see XenProduct_ControllerPublic_Product::actionSave()
     */
    public function actionSave()
    {
        $GLOBALS['XenProduct_ControllerPublic_Product'] = $this;

        return parent::actionSave();
    } /* END actionSave */

    public function actionAddTab()
    {
        $productId = $this->_input->filterSingle('product_id', XenForo_Input::UINT);
        $productHelper = $this->_getProductHelper();
        list($product, $version) = $productHelper->assertProductValidAndViewable($productId);

        $tab = array(
            'tab_id' => $product['tab_id']
        );

        $this->_assertCanAddExistingContentToTab($tab);

        /* @var $tabModel Waindigo_Tabs_Model_Tab */
        $tabModel = $this->getModelFromCache('Waindigo_Tabs_Model_Tab');

        $contentTypes = $tabModel->getContentTypes();

        $redirect = $this->getDynamicRedirect(XenForo_Link::buildPublicLink('products', $product), true);

        $viewParams = array(
            'title' => $product['product_title'],
            'contentType' => 'xenproduct_product',
            'contentId' => $product['product_id'],

            'contentTypes' => $contentTypes,

            'redirect' => $redirect
        );

        return $this->responseView('Waindigo_Tabs_ViewPublic_Product_Add', 'waindigo_add_tab_tabs', $viewParams);
    } /* END actionAddTab */

    public function actionSelectExistingTab()
    {
        $tab = array();

        $this->_assertCanAddExistingContentToTab($tab);

        /* @var $productModel XenProduct_Model_Product */
        $productModel = $this->_getProductModel();

        $products = $productModel->getProducts();

        $viewParams = array(
            'products' => $products
        );

        return $this->responseView('Waindigo_Tabs_ViewPublic_Product_SelectExisting_Product', '', $viewParams);
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