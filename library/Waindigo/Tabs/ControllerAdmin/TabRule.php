<?php

/**
 * Admin controller for handling actions on tab rules.
 */
class Waindigo_Tabs_ControllerAdmin_TabRule extends XenForo_ControllerAdmin_Abstract
{

    /**
     * Shows a list of tab rules.
     *
     * @return XenForo_ControllerResponse_View
     */
    public function actionIndex()
    {
        $tabRuleModel = $this->_getTabRuleModel();
        $tabRules = $tabRuleModel->getTabRules();
        $viewParams = array(
            'tabRules' => $tabRules
        );
        return $this->responseView('Waindigo_Tabs_ViewAdmin_TabRule_List', 'waindigo_tab_rule_list_tabs', $viewParams);
    } /* END actionIndex */

    /**
     * Helper to get the tab rule add/edit form controller response.
     *
     * @param array $tabRule
     *
     * @return XenForo_ControllerResponse_View
     */
    protected function _getTabRuleAddEditResponse(array $tabRule)
    {
        /* @var $tabNameModel Waindigo_Tabs_Model_TabName */
        $tabNameModel = $this->getModelFromCache('Waindigo_Tabs_Model_TabName');
        $tabNames = $tabNameModel->prepareTabNames($tabNameModel->getTabNames());

        $tabModel = $this->_getTabModel();

        $matchContentTypes = $tabModel->getMatchContentTypes();
        $createContentTypes = $tabModel->getCreateContentTypes();

        $viewParams = array(
            'tabRule' => $tabRule,

            'matchCriteria' => array(
                $tabRule['match_content_type'] => XenForo_Helper_Criteria::prepareCriteriaForSelection(
                    $tabRule['match_criteria'])
            ),
            'matchCriteriaData' => Waindigo_Tabs_Helper_Criteria::getDataForMatchCriteriaSelection(),
            'matchContentTypes' => $matchContentTypes,

            'createCriteria' => array(
                $tabRule['create_content_type'] => $tabRule['create_criteria'] ? unserialize(
                    $tabRule['create_criteria']) : array()
            ),
            'createCriteriaData' => Waindigo_Tabs_Helper_Criteria::getDataForCreateCriteriaSelection(),
            'createContentTypes' => $createContentTypes,

            'tabNames' => $tabNames,

            'customMessage' => $this->_getTabRuleModel()->getTabRuleMasterCustomMessagePhraseValue(
                $tabRule['tab_rule_id'])
        );

        return $this->responseView('Waindigo_Tabs_ViewAdmin_TabRule_Edit', 'waindigo_tab_rule_edit_tabs', $viewParams);
    } /* END _getTabRuleAddEditResponse */

    /**
     * Displays a form to add a new tab rule.
     *
     * @return XenForo_ControllerResponse_View
     */
    public function actionAdd()
    {
        $tabRule = $this->_getTabRuleModel()->getDefaultTabRule();

        return $this->_getTabRuleAddEditResponse($tabRule);
    } /* END actionAdd */

    /**
     * Displays a form to edit an existing tab rule.
     *
     * @return XenForo_ControllerResponse_Abstract
     */
    public function actionEdit()
    {
        $tabRuleId = $this->_input->filterSingle('tab_rule_id', XenForo_Input::STRING);

        if (!$tabRuleId) {
            return $this->responseReroute('Waindigo_Tabs_ControllerAdmin_TabRule', 'add');
        }

        $tabRule = $this->_getTabRuleOrError($tabRuleId);

        return $this->_getTabRuleAddEditResponse($tabRule);
    } /* END actionEdit */

    /**
     * Inserts a new tab rule or updates an existing one.
     *
     * @return XenForo_ControllerResponse_Abstract
     */
    public function actionSave()
    {
        $this->_assertPostOnly();

        $tabRuleId = $this->_input->filterSingle('tab_rule_id', XenForo_Input::STRING);

        $input = $this->_input->filter(
            array(
                'title' => XenForo_Input::STRING,
                'match_content_type' => XenForo_Input::STRING,
                'create_content_type' => XenForo_Input::STRING,
                'match_criteria' => XenForo_Input::ARRAY_SIMPLE,
                'create_criteria' => XenForo_Input::ARRAY_SIMPLE,
                'match_tab_name_id' => XenForo_Input::UINT,
                'tab_name_id' => XenForo_Input::UINT
            ));

        $input['match_criteria'] = !empty($input['match_criteria'][$input['match_content_type']]) ? $input['match_criteria'][$input['match_content_type']] : array();
        $input['create_criteria'] = !empty($input['create_criteria'][$input['create_content_type']]) ? $input['create_criteria'][$input['create_content_type']] : array();

        $customMessagePhrase = $this->_input->filterSingle('custom_message', XenForo_Input::STRING);

        $writer = XenForo_DataWriter::create('Waindigo_Tabs_DataWriter_TabRule');
        if ($tabRuleId) {
            $writer->setExistingData($tabRuleId);
        }
        if ($customMessagePhrase) {
            $input['create_criteria']['use_custom_message'] = true;
            $writer->setExtraData(Waindigo_Tabs_DataWriter_TabRule::DATA_CUSTOM_MESSAGE, $customMessagePhrase);
        }
        $writer->bulkSet($input);
        $writer->save();

        if ($this->_input->filterSingle('reload', XenForo_Input::STRING)) {
            return $this->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED,
                XenForo_Link::buildAdminLink('tab-rules/edit', $writer->getMergedData()));
        } else {
            return $this->responseRedirect(XenForo_ControllerResponse_Redirect::SUCCESS,
                XenForo_Link::buildAdminLink('tab-rules') . $this->getLastHash($writer->get('tab_rule_id')));
        }
    } /* END actionSave */

    /**
     * Deletes a tab rule.
     *
     * @return XenForo_ControllerResponse_Abstract
     */
    public function actionDelete()
    {
        $tabRuleId = $this->_input->filterSingle('tab_rule_id', XenForo_Input::STRING);
        $tabRule = $this->_getTabRuleOrError($tabRuleId);

        $writer = XenForo_DataWriter::create('Waindigo_Tabs_DataWriter_TabRule');
        $writer->setExistingData($tabRule);

        if ($this->isConfirmedPost()) { // delete tab rule
            $writer->delete();

            return $this->responseRedirect(XenForo_ControllerResponse_Redirect::SUCCESS,
                XenForo_Link::buildAdminLink('tab-rules'));
        } else { // show delete confirmation prompt
            $writer->preDelete();
            $errors = $writer->getErrors();
            if ($errors) {
                return $this->responseError($errors);
            }

            $viewParams = array(
                'tabRule' => $tabRule
            );

            return $this->responseView('Waindigo_Tabs_ViewAdmin_TabRule_Delete', 'waindigo_tab_rule_delete_tabs',
                $viewParams);
        }
    } /* END actionDelete */

    /**
     * Gets a valid tab rule or throws an exception.
     *
     * @param string $tabRuleId
     *
     * @return array
     */
    protected function _getTabRuleOrError($tabRuleId)
    {
        $tabRule = $this->_getTabRuleModel()->getTabRuleById($tabRuleId);
        if (!$tabRule) {
            throw $this->responseException(
                $this->responseError(new XenForo_Phrase('waindigo_requested_tab_rule_not_found_tabs'), 404));
        }

        return $tabRule;
    } /* END _getTabRuleOrError */

    /**
     * Get the tab rules model.
     *
     * @return Waindigo_Tabs_Model_TabRule
     */
    protected function _getTabRuleModel()
    {
        return $this->getModelFromCache('Waindigo_Tabs_Model_TabRule');
    } /* END _getTabRuleModel */

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