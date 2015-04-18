<?php

/**
 * Model for tab names.
 */
class Waindigo_Tabs_Model_TabName extends XenForo_Model
{

    /**
     * Gets tab names that match the specified criteria.
     *
     * @param array $conditions List of conditions.
     * @param array $fetchOptions
     *
     * @return array [tab name id] => info.
     */
    public function getTabNames(array $conditions = array(), array $fetchOptions = array())
    {
        $whereClause = $this->prepareTabNameConditions($conditions, $fetchOptions);

        $sqlClauses = $this->prepareTabNameFetchOptions($fetchOptions);
        $limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

        return $this->fetchAllKeyed($this->limitQueryResults('
                SELECT tab_name.*
                    ' . $sqlClauses['selectFields'] . '
                FROM xf_tab_name AS tab_name
                ' . $sqlClauses['joinTables'] . '
                WHERE ' . $whereClause . '
                ' . $sqlClauses['orderClause'] . '
            ', $limitOptions['limit'], $limitOptions['offset']
        ), 'tab_name_id');
    } /* END getTabNames */

    /**
     * Gets the tab name that matches the specified criteria.
     *
     * @param array $conditions List of conditions.
     * @param array $fetchOptions Options that affect what is fetched.
     *
     * @return array|false
     */
    public function getTabName(array $conditions = array(), array $fetchOptions = array())
    {
        $tabNames = $this->getTabNames($conditions, $fetchOptions);

        return reset($tabNames);
    } /* END getTabName */

    /**
     * Gets a tab name by ID.
     *
     * @param integer $tabNameId
     * @param array $fetchOptions Options that affect what is fetched.
     *
     * @return array|false
     */
    public function getTabNameById($tabNameId, array $fetchOptions = array())
    {
        $conditions = array('tab_name_id' => $tabNameId);

        return $this->getTabName($conditions, $fetchOptions);
    } /* END getTabNameById */

    /**
     * Gets tab name for specified content.
     *
     * @param string $contentType
     * @param integer $contentId
     *
     * @return array false
     */
    public function getTabNameForContent($contentType, $contentId)
    {
        return $this->_getDb()->fetchRow(
            '
            SELECT tab_name.*
            FROM xf_tab_content AS tab_content
            LEFT JOIN xf_tab_name AS tab_name ON (tab_content.tab_name_id = tab_name.tab_name_id)
            WHERE tab_content.content_type = ? AND tab_content.content_id = ?
            ', array($contentType, $contentId));
    } /* END getTabNameForContent */

    /**
     * Prepares a tab name for display.
     *
     * @param array $tabName
     *
     * @return array
     */
    public function prepareTabName(array $tabName)
    {
        $tabName['title'] = new XenForo_Phrase($this->getTabNameTitlePhraseName($tabName['tab_name_id']));

        return $tabName;
    } /* END prepareTabName */

    /**
     * Prepares a list of tab names for display.
     *
     * @param array $tabNames
     *
     * @return array
     */
    public function prepareTabNames(array $tabNames)
    {
        foreach ($tabNames AS &$tabName)
        {
            $tabName = $this->prepareTabName($tabName);
        }

        return $tabNames;
    } /* END prepareTabNames */

    /**
     * Gets the total number of a tab name that match the specified criteria.
     *
     * @param array $conditions List of conditions.
     *
     * @return integer
     */
    public function countTabNames(array $conditions = array())
    {
        $fetchOptions = array();

        $whereClause = $this->prepareTabNameConditions($conditions, $fetchOptions);
        $joinOptions = $this->prepareTabNameFetchOptions($fetchOptions);

        $limitOptions = $this->prepareLimitFetchOptions($fetchOptions);

        return $this->_getDb()->fetchOne('
            SELECT COUNT(*)
            FROM xf_tab_name AS tab_name
            ' . $joinOptions['joinTables'] . '
            WHERE ' . $whereClause . '
        ');
    } /* END countTabNames */

    /**
     * Gets all tab names titles.
     *
     * @return array [tab name id] => title.
     */
    public static function getTabNameTitles()
    {
        $tabNames = XenForo_Model::create(__CLASS__)->getTabNames();
        $titles = array();
        foreach ($tabNames as $tabNameId => $tabName) {
            $titles[$tabNameId] = $tabName['title'];
        }
        return $titles;
    } /* END getTabNameTitles */

    /**
     * Returns an array of all tab names, suitable for use in ACP template syntax as options source.
     *
     * @param $selectedId
     *
     * @return array
     */
    public function getTabNamesForOptionsTag($selectedId = null)
    {
        $tabNames = $this->getTabNames();

        $tabNames = $this->prepareTabNames($tabNames);

        $tabNameOptions = array(
        	0 => array(
        	    'value' => 0,
        	    'label' => '(' . new XenForo_Phrase('unspecified') . ')',
        	    'selected' => !$selectedId
            )
        );
        foreach ($tabNames as $tabNameId => $tabName)
        {
            $tabNameOptions[$tabNameId] = array(
                'value' => $tabNameId,
                'label' => $tabName['title'],
                'selected' => ($selectedId == $tabNameId)
            );
        }

        return $tabNameOptions;
    } /* END getTabNamesForOptionsTag */

    /**
     * Gets the default tab name record.
     *
     * @return array
     */
    public function getDefaultTabName()
    {
        return array(
            'tab_name_id' => '', /* END 'tab_name_id' */
        );
    } /* END getDefaultTabName */

    public function getDefaultTabNameForContentType($contentType)
    {
        $tabHandler = $this->_getTabHandlerFromCache($contentType);

        if ($tabHandler) {
            return $tabHandler->getDefaultTabName();
        }
    } /* END getDefaultTabNameForContentType */

    /**
     * Gets the name of a tab name's title phrase.
     *
     * @param integer $tabNameId
     *
     * @return string
     */
    public function getTabNameTitlePhraseName($tabNameId)
    {
        return 'waindigo_' . $tabNameId . '_title_tabs';
    } /* END getTabNameTitlePhraseName */

    /**
     * Gets a tab name's master title phrase text.
     *
     * @param integer $tabNameId
     *
     * @return string
     */
    public function getTabNameMasterTitlePhraseValue($tabNameId)
    {
        $phraseName = $this->getTabNameTitlePhraseName($tabNameId);
        return $this->_getPhraseModel()->getMasterPhraseValue($phraseName);
    } /* END getTabNameMasterTitlePhraseValue */

    /**
     * Prepares a set of conditions to select tab names against.
     *
     * @param array $conditions List of conditions.
     * @param array $fetchOptions The fetch options that have been provided. May be edited if criteria requires.
     *
     * @return string Criteria as SQL for where clause
     */
    public function prepareTabNameConditions(array $conditions, array &$fetchOptions)
    {
        $db = $this->_getDb();
        $sqlConditions = array();

        if (isset($conditions['tab_name_ids']) && !empty($conditions['tab_name_ids'])) {
            $sqlConditions[] = 'tab_name.tab_name_id IN (' . $db->quote($conditions['tab_name_ids']) . ')';
        } else if (isset($conditions['tab_name_id'])) {
            $sqlConditions[] = 'tab_name.tab_name_id = ' . $db->quote($conditions['tab_name_id']);
        }

        $this->_prepareTabNameConditions($conditions, $fetchOptions, $sqlConditions);

        return $this->getConditionsForClause($sqlConditions);
    } /* END prepareTabNameConditions */ /* END prepareTabNameConditions */

    /**
     * Method designed to be overridden by child classes to add to set of conditions.
     *
     * @param array $conditions List of conditions.
     * @param array $fetchOptions The fetch options that have been provided. May be edited if criteria requires.
     * @param array $sqlConditions List of conditions as SQL snippets. May be edited if criteria requires.
     */
    protected function _prepareTabNameConditions(array $conditions, array &$fetchOptions, array &$sqlConditions)
    {
    } /* END _prepareTabNameConditions */

    /**
     * Checks the 'join' key of the incoming array for the presence of the FETCH_x bitfields in this class
     * and returns SQL snippets to join the specified tables if required.
     *
     * @param array $fetchOptions containing a 'join' integer key built from this class's FETCH_x bitfields.
     *
     * @return string containing selectFields, joinTables, orderClause keys.
     *          Example: selectFields = ', user.*, foo.title'; joinTables = ' INNER JOIN foo ON (foo.id = other.id) '; orderClause = 'ORDER BY x.y'
     */
    public function prepareTabNameFetchOptions(array &$fetchOptions)
    {
        $selectFields = '';
        $joinTables = '';
        $orderBy = 'display_order ASC';

        $this->_prepareTabNameFetchOptions($fetchOptions, $selectFields, $joinTables, $orderBy);

        return array(
            'selectFields' => $selectFields,
            'joinTables'   => $joinTables,
            'orderClause'  => ($orderBy ? "ORDER BY $orderBy" : '')
        );
    } /* END prepareTabNameFetchOptions */


    /**
     * Method designed to be overridden by child classes to add to SQL snippets.
     *
     * @param array $fetchOptions containing a 'join' integer key built from this class's FETCH_x bitfields.
     * @param string $selectFields = ', user.*, foo.title'
     * @param string $joinTables = ' INNER JOIN foo ON (foo.id = other.id) '
     * @param string $orderBy = 'x.y ASC, x.z DESC'
     */
    protected function _prepareTabNameFetchOptions(array &$fetchOptions, &$selectFields, &$joinTables, &$orderBy)
    {
    } /* END _prepareTabNameFetchOptions */

    /**
     *
     * @param string $contentType
     * @return string
     */
    protected function _getTabHandlerForContent($contentType)
    {
        return $this->getContentTypeField($contentType, 'tab_handler_class');
    } /* END _getTabHandlerForContent */

    /**
     * Fetches an instance of the specified tab handler
     *
     * @param string $contentType
     *
     * @return Waindigo_Tabs_TabHandler_Abstract boolean
     */
    protected function _getTabHandlerFromCache($contentType)
    {
        $class = $this->_getTabHandlerForContent($contentType);
        if (!$class || !class_exists($class)) {
            return false;
        }

        if (!isset($this->_handlerCache[$contentType])) {
            $this->_handlerCache[$contentType] = Waindigo_Tabs_TabHandler_Abstract::create($class);
        }

        return $this->_handlerCache[$contentType];
    } /* END _getTabHandlerFromCache */

    /**
     * @return XenForo_Model_Phrase
     */
    protected function _getPhraseModel()
    {
        return $this->getModelFromCache('XenForo_Model_Phrase');
    } /* END _getPhraseModel */
}