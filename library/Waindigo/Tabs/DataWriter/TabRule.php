<?php

/**
 * Data writer for tab rules.
 */
class Waindigo_Tabs_DataWriter_TabRule extends XenForo_DataWriter
{

    /**
     * Constant for extra data that holds the value for the phrase
     * that is the custom message template for this rule.
     *
     * @var string
     */
    const DATA_CUSTOM_MESSAGE = 'phraseCustomMessage';

    /**
     * Title of the phrase that will be created when a call to set the
     * existing data fails (when the data doesn't exist).
     *
     * @var string
     */
    protected $_existingDataErrorPhrase = 'waindigo_requested_tab_rule_not_found_tabs';

    /**
     * Gets the fields that are defined for the table.
     * See parent for explanation.
     *
     * @return array
     */
    protected function _getFields()
    {
        return array(
            'xf_tab_rule' => array(
                'tab_rule_id' => array(
                    'type' => self::TYPE_UINT,
                    'autoIncrement' => true
                ), /* END 'tab_rule_id' */
                'title' => array(
                    'type' => self::TYPE_STRING,
                    'required' => true
                ), /* END 'title' */
                'match_content_type' => array(
                    'type' => self::TYPE_STRING,
                    'required' => true
                ), /* END 'match_content_type' */
                'match_criteria' => array(
                    'type' => self::TYPE_UNKNOWN,
                    'required' => true,
                    'verification' => array(
                        '$this',
                        '_verifyCriteria'
                    )
                ), /* END 'match_criteria' */
                'create_content_type' => array(
                    'type' => self::TYPE_STRING,
                    'required' => true
                ), /* END 'create_content_type' */
                'create_criteria' => array(
                    'type' => self::TYPE_SERIALIZED,
                    'required' => true
                ), /* END 'create_criteria' */
                'match_tab_name_id' => array(
                    'type' => self::TYPE_UINT
                ), /* END 'match_tab_name_id' */
                'tab_name_id' => array(
                    'type' => self::TYPE_UINT
                ), /* END 'tab_name_id' */
            ), /* END 'xf_tab_rule' */
        );
    } /* END _getFields */

    /**
     * Gets the actual existing data out of data that was passed in.
     * See parent for explanation.
     *
     * @param mixed
     *
     * @return array false
     */
    protected function _getExistingData($data)
    {
        if (!$tabRuleId = $this->_getExistingPrimaryKey($data, 'tab_rule_id')) {
            return false;
        }

        $tabRule = $this->_getTabRuleModel()->getTabRuleById($tabRuleId);
        if (!$tabRule) {
            return false;
        }

        return $this->getTablesDataFromArray($tabRule);
    } /* END _getExistingData */

    /**
     * Gets SQL condition to update the existing record.
     *
     * @return string
     */
    protected function _getUpdateCondition($tableName)
    {
        return 'tab_rule_id = ' . $this->_db->quote($this->getExisting('tab_rule_id'));
    } /* END _getUpdateCondition */

    /**
     * Verifies that the criteria is valid and formats is correctly.
     * Expected input format: [] with children: [rule] => name, [data] => info
     *
     * @param array|string $criteria Criteria array or serialize string; see
     * above for format. Modified by ref.
     *
     * @return boolean
     */
    protected function _verifyCriteria(&$criteria)
    {
        $criteriaFiltered = XenForo_Helper_Criteria::prepareCriteriaForSave($criteria);
        $criteria = serialize($criteriaFiltered);
        return true;
    } /* END _verifyCriteria */

    protected function _postSave()
    {
        $tabRuleId = $this->get('tab_rule_id');

        $customMessagePhrase = $this->getExtraData(self::DATA_CUSTOM_MESSAGE);
        if ($customMessagePhrase !== null) {
            $this->_insertOrUpdateMasterPhrase($this->_getCustomMessagePhraseName($tabRuleId), $customMessagePhrase, '');
        } else {
            $this->_deleteMasterPhrase($this->_getCustomMessagePhraseName($tabRuleId));
        }
    } /* END _postSave */

    /**
     * Post-delete handling.
     */
    protected function _postDelete()
    {
        $tabRuleId = $this->get('tab_rule_id');

        $this->_deleteMasterPhrase($this->_getCustomMessagePhraseName($tabRuleId));
    } /* END _postDelete */

    /**
     * Gets the name of the tab rule's custom message phrase.
     *
     * @param string $id
     *
     * @return string
     */
    protected function _getCustomMessagePhraseName($id)
    {
        return $this->_getTabRuleModel()->getTabRuleCustomMessagePhraseName($id);
    } /* END _getCustomMessagePhraseName */

    /**
     * Get the tab rules model.
     *
     * @return Waindigo_Tabs_Model_TabRule
     */
    protected function _getTabRuleModel()
    {
        return $this->getModelFromCache('Waindigo_Tabs_Model_TabRule');
    } /* END _getTabRuleModel */
}