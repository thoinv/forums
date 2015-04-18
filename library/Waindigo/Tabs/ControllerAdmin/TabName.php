<?php

/**
 * Admin controller for handling actions on tab names.
 */
class Waindigo_Tabs_ControllerAdmin_TabName extends XenForo_ControllerAdmin_Abstract
{

    /**
     * Shows a list of tab names.
     *
     * @return XenForo_ControllerResponse_View
     */
    public function actionIndex()
    {
        $tabNameModel = $this->_getTabNameModel();
        $tabNames = $tabNameModel->prepareTabNames($tabNameModel->getTabNames());

        $viewParams = array(
            'tabNames' => $tabNames
        );
        return $this->responseView('Waindigo_Tabs_ViewAdmin_TabName_List', 'waindigo_tab_name_list_tabs', $viewParams);
    } /* END actionIndex */

    /**
     * Helper to get the tab name add/edit form controller response.
     *
     * @param array $tabName
     *
     * @return XenForo_ControllerResponse_View
     */
    protected function _getTabNameAddEditResponse(array $tabName)
    {
        $tabNameModel = $this->_getTabNameModel();

        $viewParams = array(
            'tabName' => $tabName,
            'masterTitle' => $tabNameModel->getTabNameMasterTitlePhraseValue($tabName['tab_name_id'])
        );

        return $this->responseView('Waindigo_Tabs_ViewAdmin_TabName_Edit', 'waindigo_tab_name_edit_tabs', $viewParams);
    } /* END _getTabNameAddEditResponse */

    /**
     * Displays a form to add a new tab name.
     *
     * @return XenForo_ControllerResponse_View
     */
    public function actionAdd()
    {
        $tabName = $this->_getTabNameModel()->getDefaultTabName();

        return $this->_getTabNameAddEditResponse($tabName);
    } /* END actionAdd */

    /**
     * Displays a form to edit an existing tab name.
     *
     * @return XenForo_ControllerResponse_Abstract
     */
    public function actionEdit()
    {
        $tabNameId = $this->_input->filterSingle('tab_name_id', XenForo_Input::STRING);

        if (!$tabNameId) {
            return $this->responseReroute('Waindigo_Tabs_ControllerAdmin_TabName', 'add');
        }

        $tabName = $this->_getTabNameOrError($tabNameId);

        return $this->_getTabNameAddEditResponse($tabName);
    } /* END actionEdit */

    /**
     * Inserts a new tab name or updates an existing one.
     *
     * @return XenForo_ControllerResponse_Abstract
     */
    public function actionSave()
    {
        $this->_assertPostOnly();

        $tabNameId = $this->_input->filterSingle('tab_name_id', XenForo_Input::STRING);

        $titlePhrase = $this->_input->filterSingle('title', XenForo_Input::STRING);
        $displayOrder = $this->_input->filterSingle('display_order', XenForo_Input::UINT);

        $defaults = $this->_input->filterSingle('defaults', XenForo_Input::ARRAY_SIMPLE);

        $writer = XenForo_DataWriter::create('Waindigo_Tabs_DataWriter_TabName');
        if ($tabNameId) {
            $writer->setExistingData($tabNameId);
        }
        $writer->set('display_order', $displayOrder);
        $writer->setExtraData(Waindigo_Tabs_DataWriter_TabName::DATA_TITLE, $titlePhrase);
        $writer->setExtraData(Waindigo_Tabs_DataWriter_TabName::DATA_DEFAULTS, $defaults);
        $writer->save();

        if ($this->_input->filterSingle('reload', XenForo_Input::STRING)) {
            return $this->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED,
                XenForo_Link::buildAdminLink('tab-names/edit', $writer->getMergedData()));
        } else {
            return $this->responseRedirect(XenForo_ControllerResponse_Redirect::SUCCESS,
                XenForo_Link::buildAdminLink('tab-names') . $this->getLastHash($writer->get('tab_name_id')));
        }
    } /* END actionSave */

    /**
     * Deletes a tab name.
     *
     * @return XenForo_ControllerResponse_Abstract
     */
    public function actionDelete()
    {
        $tabNameId = $this->_input->filterSingle('tab_name_id', XenForo_Input::STRING);
        $tabName = $this->_getTabNameOrError($tabNameId);

        $writer = XenForo_DataWriter::create('Waindigo_Tabs_DataWriter_TabName');
        $writer->setExistingData($tabName);

        if ($this->isConfirmedPost()) { // delete tab name
            $writer->delete();

            return $this->responseRedirect(XenForo_ControllerResponse_Redirect::SUCCESS,
                XenForo_Link::buildAdminLink('tab-names'));
        } else { // show delete confirmation prompt
            $writer->preDelete();
            $errors = $writer->getErrors();
            if ($errors) {
                return $this->responseError($errors);
            }

            $viewParams = array(
                'tabName' => $tabName
            );

            return $this->responseView('Waindigo_Tabs_ViewAdmin_TabName_Delete', 'waindigo_tab_name_delete_tabs',
                $viewParams);
        }
    } /* END actionDelete */

    /**
     * Gets the specified tab name or throws an exception.
     *
     * @param string $id
     *
     * @return array
     */
    protected function _getTabNameOrError($id)
    {
        $tabNameModel = $this->_getTabNameModel();

        return $tabNameModel->prepareTabName(
            $this->getRecordOrError($id, $tabNameModel, 'getTabNameById', 'waindigo_requested_tab_name_not_found_tabs'));
    } /* END _getTabNameOrError */

    /**
     * Get the tab names model.
     *
     * @return Waindigo_Tabs_Model_TabName
     */
    protected function _getTabNameModel()
    {
        return $this->getModelFromCache('Waindigo_Tabs_Model_TabName');
    } /* END _getTabNameModel */
}