<?php

/**
 * Data writer for leaderboards.
 */
class Waindigo_Leaderboards_DataWriter_Leaderboard extends XenForo_DataWriter
{

    /**
     * Title of the phrase that will be created when a call to set the
     * existing data fails (when the data doesn't exist).
     *
     * @var string
     */
    protected $_existingDataErrorPhrase = 'waindigo_requested_leaderboard_not_found_leaderboards';

    /**
     * Gets the fields that are defined for the table.
     * See parent for explanation.
     *
     * @return array
     */
    protected function _getFields()
    {
        return array(
            'xf_user_leaderboard_waindigo' => array(
                'leaderboard_id' => array(
                    'type' => self::TYPE_UINT,
                    'autoIncrement' => true
                ), /* END 'leaderboard_id' */
                'title' => array(
                    'type' => self::TYPE_STRING,
                    'required' => true
                ), /* END 'title' */
                'order' => array(
                    'type' => self::TYPE_STRING,
                    'default' => ''
                ), /* END 'order' */
                'user_criteria' => array(
                    'type' => self::TYPE_UNKNOWN,
                    'required' => true,
                    'verification' => array(
                        '$this',
                        '_verifyCriteria'
                    )
                ), /* END 'user_criteria' */
                'use_cached_value' => array(
                    'type' => self::TYPE_UINT,
                    'default' => false
                ), /* END 'use_cached_value' */
                'rebuild_frequency' => array(
                    'type' => self::TYPE_STRING,
                    'allowedValues' => array(
                        'hourly',
                        'daily',
                        'monthly'
                    ),
                    'default' => 'hourly'
                ), /* END 'rebuild_frequency' */
            ), /* END 'xf_user_leaderboard_waindigo' */
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
        if (!$leaderboardId = $this->_getExistingPrimaryKey($data, 'leaderboard_id')) {
            return false;
        }

        $leaderboard = $this->_getLeaderboardModel()->getLeaderboardById($leaderboardId);
        if (!$leaderboard) {
            return false;
        }

        return $this->getTablesDataFromArray($leaderboard);
    } /* END _getExistingData */

    /**
     * Gets SQL condition to update the existing record.
     *
     * @return string
     */
    protected function _getUpdateCondition($tableName)
    {
        return 'leaderboard_id = ' . $this->_db->quote($this->getExisting('leaderboard_id'));
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

    /**
     * Post-save handling.
     */
    protected function _postSave()
    {
        // if ($this->isInsert()) {
        XenForo_Application::defer('Waindigo_Leaderboards_Deferred_Leaderboard',
            array(
                'leaderboard_id' => $this->get('leaderboard_id')
            ), 'waindigoLeaderboard' . $this->get('leaderboard_id'));
        // }
    } /* END _postSave */

    /**
     * Get the leaderboards model.
     *
     * @return Waindigo_Leaderboards_Model_Leaderboard
     */
    protected function _getLeaderboardModel()
    {
        return $this->getModelFromCache('Waindigo_Leaderboards_Model_Leaderboard');
    } /* END _getLeaderboardModel */
}