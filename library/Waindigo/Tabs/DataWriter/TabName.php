<?php

/**
 * Data writer for tab names.
 */
class Waindigo_Tabs_DataWriter_TabName extends XenForo_DataWriter
{

    /**
     * Constant for extra data that holds the value for the phrase
     * that is the title of this section.
     *
     * This value is required on inserts.
     *
     * @var string
     */
    const DATA_TITLE = 'phraseTitle';

    /**
     * Constant for extra data that holds the value for default options.
     *
     * @var string
     */
    const DATA_DEFAULTS = 'defaults';

    /**
     * Title of the phrase that will be created when a call to set the
     * existing data fails (when the data doesn't exist).
     *
     * @var string
     */
    protected $_existingDataErrorPhrase = 'waindigo_requested_tab_name_not_found_tabs';

    /**
     * Gets the fields that are defined for the table.
     * See parent for explanation.
     *
     * @return array
     */
    protected function _getFields()
    {
        return array(
            'xf_tab_name' => array(
                'tab_name_id' => array(
                    'type' => self::TYPE_UINT,
                    'autoIncrement' => true
                ), /* END 'tab_name_id' */
                'display_order' => array(
                    'type' => self::TYPE_UINT,
                    'default' => 0
                ), /* END 'display_order' */
            )
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
        if (!$tabNameId = $this->_getExistingPrimaryKey($data, 'tab_name_id')) {
            return false;
        }

        $tabName = $this->_getTabNameModel()->getTabNameById($tabNameId);
        if (!$tabName) {
            return false;
        }

        return $this->getTablesDataFromArray($tabName);
    } /* END _getExistingData */

    /**
     * Gets SQL condition to update the existing record.
     *
     * @return string
     */
    protected function _getUpdateCondition($tableName)
    {
        return 'tab_name_id = ' . $this->_db->quote($this->getExisting('tab_name_id'));
    } /* END _getUpdateCondition */

    /**
     * Pre-save handling.
     */
    protected function _preSave()
    {
        $titlePhrase = $this->getExtraData(self::DATA_TITLE);
        if ($titlePhrase !== null && strlen($titlePhrase) == 0) {
            $this->error(new XenForo_Phrase('please_enter_valid_title'), 'title');
        }
    } /* END _preSave */

    /**
     * Post-save handling.
     */
    protected function _postSave()
    {
        $titlePhrase = $this->getExtraData(self::DATA_TITLE);
        if ($titlePhrase !== null) {
            $this->_insertOrUpdateMasterPhrase($this->_getTitlePhraseName($this->get('tab_name_id')), $titlePhrase, '');
        }

        $defaults = $this->getExtraData(self::DATA_DEFAULTS);
        if ($defaults !== null) {
            $this->_setDefaultOptions($defaults);
        }
    } /* END _postSave */

    /**
     * Post-delete handling.
     */
    protected function _postDelete()
    {
        $tabNameId = $this->get('tab_name_id');

        $db = $this->_db;

        $db->delete('xf_tab_content', 'tab_name_id = ' . $db->quote($tabNameId));

        $this->_deleteMasterPhrase($this->_getTitlePhraseName($tabNameId));
    } /* END _postDelete */

    /**
     * Gets the name of the tab name's title phrase.
     *
     * @param string $id
     *
     * @return string
     */
    protected function _getTitlePhraseName($id)
    {
        return $this->_getTabNameModel()->getTabNameTitlePhraseName($id);
    } /* END _getTitlePhraseName */

    protected function _setDefaultOptions(array $defaults)
    {
        $options = array(
        	'thread' => 'waindigo_tabs_defaultTabNameThreads',
            'resource' => 'waindigo_tabs_defaultTabNameResources',
            'conversation' => 'waindigo_tabs_defaultTabNameConversations',
            'project' => 'waindigo_tabs_defaultTabNameProjects',
            'media' => 'waindigo_tabs_defaultTabNameMedia',
            'product' => 'waindigo_tabs_defaultTabNameProducts',
        );

        /* @var $xenOptions XenForo_Options */
        $xenOptions = XenForo_Application::get('options');

        foreach ($options as $key => $optionName) {
            if ($xenOptions->$optionName == $this->get('tab_name_id') && !in_array($key, $defaults)) {
                $dw = XenForo_DataWriter::create('XenForo_DataWriter_Option');
                $dw->setExistingData($optionName);
                $dw->set('option_value', '');
                $dw->save();
            } elseif ($xenOptions->$optionName != $this->get('tab_name_id') && in_array($key, $defaults)) {
                $dw = XenForo_DataWriter::create('XenForo_DataWriter_Option');
                $dw->setExistingData($optionName);
                $dw->set('option_value', $this->get('tab_name_id'));
                $dw->save();
            }
        }
    } /* END _setDefaultOptions */

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